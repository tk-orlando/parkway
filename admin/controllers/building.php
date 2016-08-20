<?php

defined('_JEXEC') or die;




class ParkwayControllerBuilding extends JControllerAdmin
{
	
	protected $text_prefix = 'COM_PARKWAY_BUILDING';

	
	

	public function getModel($name = 'Building', $prefix = 'ParkwayModel', $config = array())
	{
		$model = parent::getModel($name, $prefix, $config);
                
                return $model;
	}
        
        public function add(){
              //redirects user back to blog homepage with Cancellation Message
            $msg = JText::_( 'COM_PARKWAY_POST_ADDED' );
            $this->setRedirect( 'index.php?option=com_parkway&view=buildings', $msg );
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
                $data->id                   = $form['id'];
                $data->name                 = $form['name'];
                $data->property_id           = $form['property_id'];
                $data->address1             = $form['address1'];
                $data->address2             = $form['address2'];
                $data->city                 = $form['city'];
                $data->state                = $form['state'];
                $data->zip                  = $form['zip'];
                $data->floor_size           = $form['floor_size'];
                $data->year_built           = $form['year_built'];
                $data->typical_floor_size   = $form['typical_floor_size'];
                $data->parking_ratio        = $form['parking_ratio'];
                $data->amenities            = $form['amenities'];
                
                $db = JFactory::getDBO();
            

            //save to database
            if ($data->id == 0){
                
               
                $db->insertObject( '#__parkway_buildings', $data, id );
                
                 
            }else if ($data->id > 0){

                    $db->updateObject( '#__parkway_buildings', $data, id );
            }
            
            
          
            
             
             $msg = JText::_( 'COM_PARKWAY_POST_SAVED' );
            $this->setRedirect( 'index.php?option=com_parkway&view=buildings', $msg );
        }
      
        public function cancel(){
            

            //redirects user back to blog homepage with Cancellation Message
            $msg = JText::_( 'COM_PARKWAY_POST_CANCELLED' );
            $this->setRedirect( 'index.php?option=com_parkway&view=buildings' );

        }
       

	
}

