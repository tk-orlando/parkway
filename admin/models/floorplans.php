<?php


defined('_JEXEC') or die;



class parkwayModelFloorplans extends JModelList{
    
    
    public function __construct($config = array())
    {
            if (empty($config['filter_fields']))
            {
                    $config['filter_fields'] = array(
                            'id', 'f.id',
                            'title', 'f.title',
                            'building_id','f.building_id',
                            'property_id','b.property_id',
                            'title','f.title',
                         
                            
                    );

                    $assoc = JLanguageAssociations::isEnabled();

                    if ($assoc)
                    {
                            $config['filter_fields'][] = 'association';
                    }
            }

            parent::__construct($config);
    }

   
    protected function populateState($ordering = 'f.id', $direction = 'asc')
    {
            $app = JFactory::getApplication();

            // Adjust the context to support modal layouts.
            if ($layout = $app->input->get('layout'))
            {
                    $this->context .= '.' . $layout;
            }

            $search = $this->getUserStateFromRequest($this->context . '.filter.search', 'filter_search');
            $this->setState('filter.search', $search);
            
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
					'f.id, f.title, f.building_id, f.image, b.name, p.name'
					)
				)
			)
		);
		
		$query->from($db->quoteName('#__parkway_floorplans', 'f'));
                
                // Join over the building name.
		
                $query->select($db->quoteName('b.name', 'building_name'), 'b.property_id')
			->join(
				'LEFT',
				$db->quoteName('#__parkway_buildings', 'b') . ' ON ' . $db->quoteName('b.id') . ' = ' . $db->quoteName('f.building_id')
			);
                //Join over the property name
                $query->select($db->quoteName('p.name', 'property_name'))
			->join(
				'LEFT',
				$db->quoteName('#__parkway_properties', 'p') . ' ON ' . $db->quoteName('p.id') . ' = ' . $db->quoteName('b.property_id')
			);
                
                
                               
                //Filter by property.
                $building = $this->getState('filter.property');
                
                
                
                if (!empty( $building )){
                    
                    $query->where(
					'(' . $db->quoteName('b.property_id') . ' = ' . intval($building ). ')'
				);
                    
                }                

                //Filter by building.
                $building = $this->getState('filter.building');
                
                
                
                if (!empty( $building )){
                    
                    $query->where(
					'(' . $db->quoteName('f.building_id') . ' = ' . intval($building ). ')'
				);
                    
                }
                
                
                // Filter search by title.
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
					'(' . $db->quoteName('f.title') .' LIKE '.  $search .  ')'
				);
			}
		}
                
               
                
                return $query ;
        }
        
        
   
    
    
}



