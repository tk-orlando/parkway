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
             //$form = JRequest::getVar( 'jform' );
             $form = JRequest::getVar( 'jform','','post', 'array', JREQUEST_ALLOWHTML );
            
            $jinput = JFactory::getApplication()->input;
            $files = $jinput->files->get('jform'); 
            $file= $files['image'];
            
            $stamp = time().rand(0,999).'-';
            
             $data =new stdClass();
                $data->id                   = $form['id'];
                
                $data->building_id          = $form['building_id'];
                $data->floor_level          = $form['floor_level'];
                $data->title                = $form['title'];
                $data->alias               = $form['alias'];
                $data->tooltip               = $form['tooltip'];
                
                
                //upload image
                if (!empty($file['name'])){

                    $this->deleteImage() ; //delete previous image
                    
                    $data->image  = $stamp.$file['name'];

                    $filename = JFile::makeSafe($file['name']); 

                    $source = $file['tmp_name'];
                    $destination = JPATH_ROOT . '/media/com_parkway/' . $stamp.$filename;
                    if (JFile::upload($source, $destination)) 
                    {

                    }

                }
                
                
                $data->coordinates      = $form['coordinates'];
                
                $db = JFactory::getDBO();
            

            //save to database
            if ($data->id == 0){
                
               
                $db->insertObject( '#__parkway_floorplans', $data, id );
                
                 
            }else if ($data->id > 0){

                    $db->updateObject( '#__parkway_floorplans', $data, id );
            }
            
            
            
            
          
            
             
             $msg = JText::_( 'COM_PARKWAY_POST_SAVED' );
            $this->setRedirect( 'index.php?option=com_parkway&view=floorplans', $msg );
        }
      
        public function cancel(){
            

            //redirects user back to blog homepage with Cancellation Message
            $msg = JText::_( 'COM_PARKWAY_POST_CANCELLED' );
            $this->setRedirect( 'index.php?option=com_parkway&view=floorplans' );

        }
        public function deleteImage(){
            $form   = JRequest::getVar( 'jform','','post', 'array', JREQUEST_ALLOWHTML );
            $id     = $form['id'];
            
            //find factsheet
            $db = JFactory::getDbo();
            $query = $db->getQuery(true);
            $query->select('*');
            $query->from('#__parkway_floorplans');  
            $query->where('id = '.$id);
            
            $db->setQuery($query);
            $result = $db->loadObject();    
            
                      
            //delete file
            JFile::delete(JPATH_ROOT.'/media/com_parkway/'.$result->image);
            
            //delete image in database
            $db = JFactory::getDbo();
            $query = $db->getQuery(true);
            $query->update('#__parkway_floorplans');
            $query->set('image = "" ');  
            $query->where('id = '.$id);
            
            $db->setQuery($query);
            $result = $db->execute();
            
            //redirects user back to building form
            $msg = JText::_( 'COM_PARKWAY_POST_DELETEIMAGE' );
            $this->setRedirect( 'index.php?option=com_parkway&view=floorplan&layout=edit&id='.$id );
        }
       

	
}



