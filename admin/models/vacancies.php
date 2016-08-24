<?php
defined('_JEXEC') or die;



class parkwayModelVacancies extends JModelItem{
    
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
                    $data = $this->getItem();
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
        
        
        
   
    
    
}

