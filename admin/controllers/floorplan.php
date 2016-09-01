<?php

defined('_JEXEC') or die;




class ParkwayControllerFloorplan extends JControllerAdmin
{
	
	protected $text_prefix = 'COM_PARKWAY_FLOORPLAN';

	
	

	public function getModel($name = 'Floorplan', $prefix = 'ParkwayModel', $config = array())
	{
		$model = parent::getModel($name, $prefix, $config);
                
                return $model;
	}
        
        public function add(){
              
            $msg = JText::_( 'COM_PARKWAY_POST_ADDED' );
            $this->setRedirect( 'index.php?option=com_parkway&view=floorplans', $msg );
        }
        
        
        
         public function save(){
             
            
            //get form variables
             $form = JRequest::getVar( 'jform' );
            
            $jinput = JFactory::getApplication()->input;
            $files = $jinput->files->get('jform'); 
            $file= $files['image'];
            
             $data =new stdClass();
                $data->id                   = $form['id'];
                
                $data->building_id          = $form['building_id'];
                $data->floor_level                = $form['floor_level'];
                $data->title                = $form['title'];
                
                if (!empty($file['name'])){
                    $data->image                = $file['name'];
                }
                
                $data->coordinates      = $form['coordinates'];
                
                
                
                $db = JFactory::getDBO();
            

            //save to database
            if ($data->id == 0){
                
               
                $db->insertObject( '#__parkway_floorplans', $data, id );
                
                 
            }else if ($data->id > 0){

                    $db->updateObject( '#__parkway_floorplans', $data, id );
            }
            
            
            
            if (!empty($file['name'])){
                $filename = JFile::makeSafe($file['name']); 

                $source = $file['tmp_name'];
                $destination = JPATH_ROOT . '/media/com_parkway/'.$data->building_id.'/' . $filename;

               


                if (JFile::upload($source, $destination)) 
                {

                }
            }
            
          
            
             
             $msg = JText::_( 'COM_PARKWAY_POST_SAVED' );
            $this->setRedirect( 'index.php?option=com_parkway&view=floorplans', $msg );
        }
      
        public function cancel(){
            

            //redirects user back to blog homepage with Cancellation Message
            $msg = JText::_( 'COM_PARKWAY_POST_CANCELLED' );
            $this->setRedirect( 'index.php?option=com_parkway&view=floorplans' );

        }
       

	
}



