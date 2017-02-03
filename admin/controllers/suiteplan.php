<?php

defined('_JEXEC') or die;




class ParkwayControllerSuiteplan extends JControllerAdmin
{
	
	protected $text_prefix = 'COM_PARKWAY_SUITEPLAN';

	
	

	public function getModel($name = 'Suiteplan', $prefix = 'ParkwayModel', $config = array())
	{
		$model = parent::getModel($name, $prefix, $config);
                
                return $model;
	}
        
        public function add(){
              
            $msg = JText::_( 'COM_PARKWAY_POST_ADDED' );
            $this->setRedirect( 'index.php?option=com_parkway&view=suiteplans', $msg );
        }
        
        
        
         public function save(){
             
            
            //get form variables
             $form = JRequest::getVar( 'jform' );
             
            $jinput = JFactory::getApplication()->input;
            $files = $jinput->files->get('jform'); 
            $file= $files['image'];
            
            $stamp = time().rand(0,999).'-';
            
             $data =new stdClass();
                $data->id                   = $form['id'];
                $data->floorplan_id          = $form['floorplan_id'];
                $data->title                = $form['title'];
                
                if (!empty($file['name'])){
                    $data->image                = $stamp.$file['name'];
                }
                
                
                
                
                $db = JFactory::getDBO();
            

            //save to database
            if ($data->id == 0){
                
               
                $db->insertObject( '#__parkway_suiteplans', $data, id );
                
                 
            }else if ($data->id > 0){

                    $db->updateObject( '#__parkway_suiteplans', $data, id );
            }
            
            
            
            if (!empty($file['name'])){
                
                $filename = JFile::makeSafe($file['name']); 

                // Create a new query object.
                $db = JFactory::getDbo();
                    $query = $db->getQuery(true);

                    $condition = "id = $data->floorplan_id ";
                    $query->select('building_id');
                    $query->from('#__parkway_floorplans');
                    $query->where( $condition )  ; 

                $db->setQuery($query);

                $building_id = $db->loadResult();

                $source = $file['tmp_name'];
                $destination = JPATH_ROOT . '/media/com_parkway/' . $stamp.$filename;

                if (JFile::upload($source, $destination)) 
                    {

                    }
                
            }

            
          
            
             
             $msg = JText::_( 'COM_PARKWAY_POST_SAVED' );
            $this->setRedirect( 'index.php?option=com_parkway&view=suiteplans', $msg );
        }
      
        public function cancel(){
            

            //redirects user back to blog homepage with Cancellation Message
            $msg = JText::_( 'COM_PARKWAY_POST_CANCELLED' );
            $this->setRedirect( 'index.php?option=com_parkway&view=suiteplans' );

        }
       

	
}





