<?php

defined('_JEXEC') or die;




class ParkwayControllerProperty extends JControllerAdmin
{
	
	protected $text_prefix = 'COM_PARKWAY_PROPERTY';

	
	

	public function getModel($name = 'Property', $prefix = 'ParkwayModel', $config = array())
	{
		$model = parent::getModel($name, $prefix, $config);
                
                return $model;
	}
        
        public function add(){
              //redirects user back to blog homepage with Cancellation Message
            $msg = JText::_( 'COM_PARKWAY_POST_ADDED' );
            $this->setRedirect( 'index.php?option=com_parkway', $msg );
        }
        
        /*
        public function apply(){
              //redirects user back to blog homepage with Cancellation Message
            $msg = JText::_( 'COM_PARKWAY_POST_APPLIED' );
            $this->setRedirect( 'index.php?option=com_parkway', $msg );
        }
        */
        
         public function save(){
              //redirects user back to blog homepage with Cancellation Message
            
            //get form variables
             $form = JRequest::getVar( 'jform' );
            
             $data =new stdClass();
                $data->id = $form['id'];
                $data->name = $form['name'];
                
                $db = JFactory::getDBO();
            

            //save to database
            if ($data->id == 0){
                
               
                $db->insertObject( '#__parkway_properties', $data, id );
                
                 
            }else if ($data->id > 0){

                    $db->updateObject( '#__parkway_properties', $data, id );
            }
            
            
          
            
             
             $msg = JText::_( 'COM_PARKWAY_POST_SAVED' );
            $this->setRedirect( 'index.php?option=com_parkway', $msg );
        }
      
        public function cancel(){
            

            //redirects user back to blog homepage with Cancellation Message
            $msg = JText::_( 'COM_PARKWAY_POST_CANCELLED' );
            $this->setRedirect( 'index.php?option=com_parkway' );

        }
       

	
}

