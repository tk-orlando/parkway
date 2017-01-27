<?php


// No direct access to this file
defined('_JEXEC') or die('Restricted access');


class ParkwayModelSuiteplan extends JModelAdmin
{
    
    public function getTable($type = 'Suiteplan', $prefix = 'ParkwayTable', $config = array())
    {
            return JTable::getInstance($type, $prefix, $config);
    }
    public function getForm($data = array(), $loadData = true)
    {
            // Get the form.
            $form = $this->loadForm(
                    'com_parkway.suiteplan',
                    'suiteplan',
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
                    'com_parkway.edit.suiteplan.data',
                    array()
            );

            if (empty($data))
            {
                    $data = $this->getItem();
            }

            return $data;
    }
    
    
    public function getItem(){
        
        $suiteplanID = JRequest::getVar('id', 0, 'get') ;
        
        try
        {
            
            
            if ($suiteplanID > 0){
            $db = JFactory::getDbo();
            $query = $db->getQuery(true)
                ->select('*')
                ->from('#__parkway_suiteplans')
                ->where("id = $suiteplanID "   );

       
                $db->setQuery($query);
            
                $result = $db->loadObject();
                return $result;
                
            }else if ($suiteplanID == 0){
                
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








