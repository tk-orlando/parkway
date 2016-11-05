<?php
defined('_JEXEC') or die;



class parkwayModelVacancies extends JModelList{
    
    
    public function __construct($config = array())
    {
            if (empty($config['filter_fields']))
            {
                    $config['filter_fields'] = array(
                            'id', 'v.id',
                            'building_id','f.building_id',
                            'property_id','b.property_id',
                            'floor_level', 'f.floor_level', 
                            'suite', 'v.suite', 
                            'available_space','v.available_space',
                            'pdf','v.pdf',
                            
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
            
            /*
            $access = $this->getUserStateFromRequest($this->context . '.filter.access', 'filter_access', 0, 'int');
            $this->setState('filter.access', $access);

            $published = $this->getUserStateFromRequest($this->context . '.filter.published', 'filter_published', '');
            $this->setState('filter.published', $published);

            $categoryId = $this->getUserStateFromRequest($this->context . '.filter.category_id', 'filter_category_id');
            $this->setState('filter.category_id', $categoryId);

            $language = $this->getUserStateFromRequest($this->context . '.filter.language', 'filter_language', '');
            $this->setState('filter.language', $language);
            
            // Force a language.
            $forcedLanguage = $app->input->get('forcedLanguage');

            if (!empty($forcedLanguage))
            {
                    $this->setState('filter.language', $forcedLanguage);
                    $this->setState('filter.forcedLanguage', $forcedLanguage);
            }

            $tag = $this->getUserStateFromRequest($this->context . '.filter.tag', 'filter_tag', '');
            $this->setState('filter.tag', $tag);
*/
            // List state information.
            parent::populateState($ordering, $direction);
    }
    /*
    public function getTable($type = 'Vacancies', $prefix = 'ParkwayTable', $config = array())
    {
            return JTable::getInstance($type, $prefix, $config);
    }
    public function getForm($data = array(), $loadData = true)
    {
            // Get the form.
            $form = $this->loadForm(
                    'com_parkway.vacancies',
                    'vacancies',
                    array(
                            'control' => 'jform',
                            'load_data' => $loadData
                    )
            );
            
            

            if (empty($form))
            {
                    return false;
            }

            return $form;
    }
    
    protected function loadFormData()
    {
            // Check the session for previously entered form data.
            $data = JFactory::getApplication()->getUserState(
                    'com_parkway.edit.vacancies.data',
                    array()
            );

            if (empty($data))
            {
                    $data = $this->getItems();
            }

            return $data;
    }    
   
    public function getItems(){
        
        $db = JFactory::getDbo();
        $query = $db->getQuery(true)
                //->select('*')
                //->from('#__parkway_vacancies')
                ->select('vacancies.id, vacancies.building_id, vacancies.floorplan_id,vacancies.floor, vacancies.suite, buildings.name as building_name')
                ->from('#__parkway_vacancies as vacancies')
                ->leftjoin('#__parkway_buildings as buildings ON buildings.id = vacancies.building_id')
               
                ;
        $db->setQuery($query);
        try
        {
            $result = $db->loadObjectList();
            return $result;
        }
        catch (RuntimeException $e)
        {
            JError::raiseWarning(500, $e->getMessage());
            
           
        }
    }
    */
    
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
					'list.select', 'v.id, f.building_id, v.suite, v.available_space, v.pdf, p.name, b.name, f.floor_level'
					)
				)
			)
		);
		
		$query->from($db->quoteName('#__parkway_vacancies', 'v'));
                
                //join over the floor plan table
                $query->select($db->quoteName('f.title', 'floor_title'), 'f.building_id', 'f.floor_level')
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
                // Add the list ordering clause.
		$orderCol = $this->state->get('list.ordering', 'f.building_id');
		$orderDirn = $this->state->get('list.direction', 'asc');

		if ($orderCol == 'a.ordering' || $orderCol == 'category_title')
		{
			$orderCol = $db->quoteName('c.title') . ' ' . $orderDirn . ', ' . $db->quoteName('a.ordering');
		}

		$query->order($db->escape($orderCol . ' ' . $orderDirn));

		return $query;
               
                
                return $query ;
        }
        
        
   
    
    
}

