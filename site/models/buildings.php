<?php
defined('_JEXEC') or die;



class parkwayModelBuildings extends JModelList{
    
    
    public function __construct($config = array())
    {
            if (empty($config['filter_fields']))
            {
                    $config['filter_fields'] = array(
                            'id', 'b.id',
                            'property_id', 'b.property_id', 
                            
                            
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
    protected function populateState($ordering = 'b.id', $direction = 'asc')
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
            
            
            
            
            // List state information.
            parent::populateState($ordering, $direction);
    }
    
    
    protected function getStoreId($id = '')
    {
            // Compile the store id.
            $id .= ':' . $this->getState('filter.search');
            $id .= ':' . $this->getState('filter.property');
            

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
					'list.select', 'b.id, b.name, b.address1, b.address2, b.city, b.state, b.zip, b.year_built, b.typical_floor_size, b.image'
					)
				)
			)
		);
		
		$query->from($db->quoteName('#__parkway_buildings', 'b'));
                
                
                 


                //Filter by properties 
                $property = $this->getState('filter.property');
                
                if (!empty( $property )){
                    
                    $query->where(
					'(' . $db->quoteName('b.property_id') . ' = ' . intval($property ). ')'
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
					'(' . $db->quoteName('b.name') . ' LIKE ' . $search . ' OR ' . $db->quoteName('b.address1') . ' LIKE ' . $search . ')'
				);
			}
		}
                
               
                
                return $query ;
        }
        
        
   
    
    
}

