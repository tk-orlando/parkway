<?php
defined('_JEXEC') or die;



class parkwayModelVacancies extends JModelList{
    
    
    public function __construct($config = array())
    {
            if (empty($config['filter_fields']))
            {
                    $config['filter_fields'] = array(
                            'id', 'v.id',
                            'floor', 'v.floor_level', 
                            //'building_name','b.name',
                            'suite', 'v.suite', 
                            
                    );

                    $assoc = JLanguageAssociations::isEnabled();

                    if ($assoc)
                    {
                            $config['filter_fields'][] = 'association';
                    }
            }

            parent::__construct($config);
    }

    /**
     * Method to auto-populate the model state.
     *
     * Note. Calling getState in this method will result in recursion.
     *
     * @param   string  $ordering   An optional ordering field.
     * @param   string  $direction  An optional direction (asc|desc).
     *
     * @return  void
     *
     * @since   1.6
     */
    protected function populateState($ordering = 'v.id', $direction = 'asc')
    {
            $app = JFactory::getApplication();

            // Adjust the context to support modal layouts.
            if ($layout = $app->input->get('layout'))
            {
                    $this->context .= '.' . $layout;
            }

            $search = $this->getUserStateFromRequest($this->context . '.filter.search', 'filter_search');
            $this->setState('filter.search', $search);
            
            $space = $this->getUserStateFromRequest($this->context . '.filter.space', 'filter_space');
            $this->setState('filter.space', $space);
            
            $property = $this->getUserStateFromRequest($this->context . '.filter.property', 'filter_property');
            $this->setState('filter.property', $property);
            
            $building = $this->getUserStateFromRequest($this->context . '.filter.building', 'filter_building');
            $this->setState('filter.building', $building);
            
            $tag = $this->getUserStateFromRequest($this->context . '.filter.tag', 'filter_tag', '');
            $this->setState('filter.tag', $tag);
            
           

            // List state information.
            parent::populateState($ordering, $direction);
    }
    
    
    protected function getStoreId($id = '')
    {
            // Compile the store id.
            $id .= ':' . $this->getState('filter.search');
            $id .= ':' . $this->getState('filter.property');
            $id .= ':' . $this->getState('filter.building');
            $id .= ':' . $this->getState('filter.tag');

            return parent::getStoreId($id);
    }
    
    
    protected function getListQuery()
	{
		// Create a new query object.
		$db = $this->getDbo();
		$query = $db->getQuery(true);
		$user = JFactory::getUser();

		// Select the required fields from the table.
		$query->select(
			$db->quoteName(
				explode(', ', $this->getState(
					'list.select', 'v.id, v.floorplan_id, b.property_id, v.suite, v.available_space, v.divisible, v.market_rent, v.date_available, v.pdf, p.name'
					)
				)
			)
		);
		
		$query->from($db->quoteName('#__parkway_vacancies', 'v'));
                
                
                // Join over the floorplan.
		
                $query->select($db->quoteName('f.floor_level') )
			->join(
				'LEFT',
				$db->quoteName('#__parkway_floorplans', 'f') . ' ON ' . $db->quoteName('f.id') . ' = ' . $db->quoteName('v.floorplan_id')
			);

                // Join over the building name and property id from the buildings table.
		
                $query->select($db->quoteName('b.name', 'building_name'), $db->quoteName('b.property_id','property_id') )
			->join(
				'LEFT',
				$db->quoteName('#__parkway_buildings', 'b') . ' ON ' . $db->quoteName('b.id') . ' = ' . $db->quoteName('f.building_id')
			);
                 
                // Join over the property name.
		
                $query->select($db->quoteName('p.name', 'property_name'), $db->quoteName('p.id','id') )
			->join(
				'LEFT',
				$db->quoteName('#__parkway_properties', 'p') . ' ON ' . $db->quoteName('p.id') . ' = ' . $db->quoteName('b.property_id')
			);


                //Filter by properties 
                $property = $this->getState('filter.property');
                
                if (!empty( $property )){
                    
                    $query->where(
					'(' . $db->quoteName('b.property_id') . ' = ' . intval($property ). ')'
				);
                    
                }
                                                   
                //Filter by Building
                $building = $this->getState('filter.building');
                
                
                
                if (!empty( $building )){
                    
                    $query->where(
					'(' . $db->quoteName('f.building_id') . ' = ' . intval($building ). ')'
				);
                    
                }

                //Filter by available space.
                $space = $this->getState('filter.space');
                
                
                $session = JFactory::getSession();
                if ($session->get( 'max')){
                    
                    $space['max'] = (int) $session->get( 'max', $max );
                }
              
                
                if (!empty($space['min']) && !empty($space['max']))
		{
                            
                    
				$query->where(
					'(' . $db->quoteName('v.available_space') . ' BETWEEN ' . intval($space['min'] ) . ' AND ' . intval($space['max'] ). ')'
				);
                    
                    
                    
                }else if (empty($space['min']) && !empty($space['max'])){
                    
                    
                    
                    
				$query->where(
					'(' . $db->quoteName('v.available_space') . ' BETWEEN 0 AND ' . intval($space['max'] ). ')'
				);
                               
                                
                    
                }else if (!empty($space['min']) && empty($space['max'])){
                    
                   
                    
				$query->where(
					'(' . $db->quoteName('v.available_space') . ' BETWEEN ' . intval($space['min']) . ' AND 999999999 )'
				);
                                 
                    
                }
                
                
                // Filter by search in name.
		$search = $this->getState('filter.search');

		if (!empty($search))
		{
			if (stripos($search, 'id:') === 0)
			{
				$query->where('v.id = ' . (int) substr($search, 3));
			}
			elseif (stripos($search, 'author:') === 0)
			{
				$search = $db->quote('%' . $db->escape(substr($search, 7), true) . '%');
				$query->where(
					'(' . $db->quoteName('uc.name') . ' LIKE ' . $search . ' OR ' . $db->quoteName('uc.username') . ' LIKE ' . $search . ')'
				);
			}
			else
			{
				$search = $db->quote('%' . str_replace(' ', '%', $db->escape(trim($search), true) . '%'));
				$query->where(
					'(' . $db->quoteName('b.name') . ' LIKE ' . $search . ' OR ' . $db->quoteName('v.keywords') . ' LIKE ' . $search . ')'
				);
			}
		}
                // Filter by published status
               
                $query->where(
                        '(' . $db->quoteName('v.published') . ' = 1 )'
                );
                
                // Add the list ordering clause.
		$orderCol = $this->state->get('list.ordering', 'f.floor_level');
		$orderDirn = $this->state->get('list.direction', 'asc');

		if ($orderCol == 'a.ordering' || $orderCol == 'category_title')
		{
			$orderCol = $db->quoteName('c.title') . ' ' . $orderDirn . ', ' . $db->quoteName('a.ordering');
		}

		$query->order('f.floor_level','asc');
                $query->order('v.suite','asc');
                
                return $query ;
        }
        
        
   
    
    
}



