<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');


class ParkwayModelProperties extends JModelAdmin
{
   
    
    public function getTable($type = 'Properties', $prefix = 'ParkwayTable', $config = array())
    {
            return JTable::getInstance($type, $prefix, $config);
    }
    public function getForm($data = array(), $loadData = true)
    {
            // Get the form.
            $form = $this->loadForm(
                    'com_parkway.properties',
                    'properties',
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
                    'com_parkway.edit.properties.data',
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
                ->from('#__parkway_properties');

       
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


