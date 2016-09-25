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
             
             $form = JRequest::getVar( 'jform','','post', 'array', JREQUEST_ALLOWHTML );
            
            $jinput = JFactory::getApplication()->input;
            $files = $jinput->files->get('jform'); 
            $file= $files['image'];
						$pdfFile= $files['fact_sheet'];
             
            $stamp = time().rand(0,999).'-';
             
             $data =new stdClass();
                $data->id                   = $form['id'];
                $data->name                 = $form['name'];
                $data->property_id          = $form['property_id'];
                $data->address1             = $form['address1'];
                $data->address2             = $form['address2'];
                $data->city                 = $form['city'];
                $data->state                = $form['state'];
                $data->zip                  = $form['zip'];
                //$data->floor_size           = $form['floor_size'];
		$data->number_of_floors     = $form['number_of_floors'];
                $data->year_built           = $form['year_built'];
                $data->typical_floor_size   = $form['typical_floor_size'];
                $data->parking_ratio        = $form['parking_ratio'];
                $data->amenities            = $form['amenities'];
								$data->leed_cert            = $form['leed_cert'];
								$data->building_size        = $form['building_size'];
								
								if (!empty($pdfFile['name'])){
                    $data->fact_sheet                 = $stamp.$pdfFile['name'];
                }
                
                if (!empty($file['name'])){
                    $data->image            = $stamp.$file['name'];
                }
                
                $data->coordinates          = $form['coordinates']; 
                 
                $data->published            = $form['published'];
                        
                $db = JFactory::getDBO();
            

            //save to database
            if ($data->id == 0){
                
               
                $db->insertObject( '#__parkway_buildings', $data, id );
                
                 
            }else if ($data->id > 0){

                    $db->updateObject( '#__parkway_buildings', $data, id );
            }
            
            
            if (!empty($file['name'])){
                $filename = JFile::makeSafe($file['name']); 

                $source = $file['tmp_name'];
                $destination = JPATH_ROOT . '/media/com_parkway/' . $stamp.$filename;

                if (JFile::upload($source, $destination)) 
                {

                } 
            }

            
						 //upload PDF file   
            if (!empty($pdfFile['name'])){

                $filename = JFile::makeSafe($pdfFile['name']); 

                $source = $pdfFile['tmp_name'];
                $destination = JPATH_ROOT . '/media/com_parkway/' . $stamp.$filename;

                if (JFile::upload($source, $destination)) 
                {

                }
                
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

