<?php


// No direct access to this file
defined('_JEXEC') or die('Restricted access');


class ParkwayModelProperty extends JModelAdmin
{
    
    public function getTable($type = 'Property', $prefix = 'ParkwayTable', $config = array())
    {
            return JTable::getInstance($type, $prefix, $config);
    }
    public function getForm($data = array(), $loadData = true)
    {
            // Get the form.
            $form = $this->loadForm(
                    'com_parkway.property',
                    'property',
                    array(
                            'control' => 'jform',
                            'load_data' => $loadData
                    )
            );
            
            

            if (empty($form))
            {
                echo '!!!!!!!!!!!!!!!!!!!!!';    
                return false;
            }

            return $form;
    }
    
    protected function loadFormData()
    {
            // Check the session for previously entered form data.
            $data = JFactory::getApplication()->getUserState(
                    'com_parkway.edit.property.data',
                    array()
            );

            if (empty($data))
            {
                    $data = $this->getItem();
            }

            return $data;
    }
    
    
    public function getItem(){
        
        $propertyID = JRequest::getVar('id', 0, 'get') ;
        $params = JComponentHelper::getParams('com_parkway');
        
        
        
       

        try
        {
            
            
            if ($propertyID > 0){
            $db = JFactory::getDbo();
            $query = $db->getQuery(true)
                ->select('*')
                ->from('#__parkway_properties')
                ->where("id = $propertyID "   );

       
                $db->setQuery($query);
            
                $result = $db->loadObject();
                return $result;
                
            }else if ($propertyID == 0){
                
                $result = new stdClass();
                $result->id = 0;
                $result->name = '';        
                
                return $result;
                
            }
            
            
            
        }
        catch (RuntimeException $e)
        {
            JError::raiseWarning(500, $e->getMessage());
            
           
        }
        
        
        
    }
    
    
	
}




