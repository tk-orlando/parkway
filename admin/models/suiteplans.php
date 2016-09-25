<?php


defined('_JEXEC') or die;



class parkwayModelSuiteplans extends JModelList{
    
    
    public function __construct($config = array())
    {
            if (empty($config['filter_fields']))
            {
                    $config['filter_fields'] = array(
                            'id','s.id',
                            'title','s.title',
                        'floorplan','s.floorplan_id',
                        'building','f.building_id',
                        'property','b.property_id'
                            
                            
                    );

                    $assoc = JLanguageAssociations::isEnabled();

                    if ($assoc)
                    {
                            $config['filter_fields'][] = 'association';
                    }
            }

            parent::__construct($config);
    }

   
    protected function populateState($ordering = 's.id', $direction = 'asc')
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
            
            
           
            // List state information.
            parent::populateState($ordering, $direction);
    }
    
    
    protected function getStoreId($id = '')
    {
            // Compile the store id.
            $id .= ':' . $this->getState('filter.search');
            $id .= ':' . $this->getState('filter.space');
            $id .= ':' . $this->getState('filter.property');
            $id .= ':' . $this->getState('filter.building');

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
					'list.select',
					's.id, s.floorplan_id, f.title, s.title, s.image, f.building_id, b.name, p.name'
					)
				)
			)
		);
		
		$query->from($db->quoteName('#__parkway_suiteplans', 's'));
                
                // Join over the floorplan title.
		
                $query->select($db->quoteName('f.title', 'floor_title'), 'f.building_id')
			->join(
				'LEFT',
				$db->quoteName('#__parkway_floorplans', 'f') . ' ON ' . $db->quoteName('f.id') . ' = ' . $db->quoteName('s.floorplan_id')
			);
                
                // Join over the building name.
                $query->select($db->quoteName('b.name', 'building_name'), 'b.property_id')
			->join(
				'LEFT',
				$db->quoteName('#__parkway_buildings', 'b') . ' ON ' . $db->quoteName('b.id') . ' = ' . $db->quoteName('f.building_id')
			);
                
                

               // Join over the property name.
                 $query->select($db->quoteName('p.name', 'property_name'))
			->join(
				'LEFT',
				$db->quoteName('#__parkway_properties', 'p') . ' ON ' . $db->quoteName('p.id') . ' = ' . $db->quoteName('b.property_id')
			);



                //Filter by available space.
                $space = $this->getState('filter.space');
                
              
                
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
                
               
                
                return $query ;
        }
        
        
   
    
    
}



