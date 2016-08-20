<?php
defined('_JEXEC') or die;



class parkwayModelBuildings extends JModelItem{
    
     public function getTable($type = 'Buildings', $prefix = 'ParkwayTable', $config = array())
    {
            return JTable::getInstance($type, $prefix, $config);
    }
    public function getForm($data = array(), $loadData = true)
    {
            // Get the form.
            $form = $this->loadForm(
                    'com_parkway.buildings',
                    'buildings',
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
                    'com_parkway.edit.buildings.data',
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
                ->select('*')
                ->from('#__parkway_buildings');

       
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