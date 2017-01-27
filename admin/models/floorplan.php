<?php


// No direct access to this file
defined('_JEXEC') or die('Restricted access');


class ParkwayModelFloorplan extends JModelAdmin
{
    
    public function getTable($type = 'Floorplan', $prefix = 'ParkwayTable', $config = array())
    {
            return JTable::getInstance($type, $prefix, $config);
    }
    public function getForm($data = array(), $loadData = true)
    {
            // Get the form.
            $form = $this->loadForm(
                    'com_parkway.floorplan',
                    'floorplan',
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
                    'com_parkway.edit.floorplan.data',
                    array()
            );

            if (empty($data))
            {
                    $data = $this->getItem();
            }

            return $data;
    }
    
    
    public function getItem(){
        
        $floorplanID = JRequest::getVar('id', 0, 'get') ;
        
        try
        {
            
            
            if ($floorplanID > 0){
            $db = JFactory::getDbo();
            $query = $db->getQuery(true)
                ->select('*')
                ->from('#__parkway_floorplans')
                ->where("id = $floorplanID "   );

       
                $db->setQuery($query);
            
                $result = $db->loadObject();
                return $result;
                
            }else if ($floorplanID == 0){
                
                $result = new stdClass();
                $result->id = 0;
                       
                
                return $result;
                
            }
            
            
            
        }
        catch (RuntimeException $e)
        {
            JError::raiseWarning(500, $e->getMessage());
            
           
        }
        
        
        
    }
    
    
	
}








