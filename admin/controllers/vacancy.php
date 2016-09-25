<?php

defined('_JEXEC') or die;




class ParkwayControllerVacancy extends JControllerAdmin
{
	
	protected $text_prefix = 'COM_PARKWAY_VACANCY';

	
	

	public function getModel($name = 'Vacancy', $prefix = 'ParkwayModel', $config = array())
	{
		$model = parent::getModel($name, $prefix, $config);
                
                return $model;
	}
        
        public function add(){
              
            $msg = JText::_( 'COM_PARKWAY_POST_ADDED' );
            $this->setRedirect( 'index.php?option=com_parkway&view=vacancies', $msg );
        }
        
        
        
         public function save(){
             
            
            //get form variables
             $form = JRequest::getVar( 'jform' );
             
            $jinput = JFactory::getApplication()->input;
            $files = $jinput->files->get('jform'); 
            $imageFile= $files['image'];
            $pdfFile= $files['pdf'];
            
            $stamp = time().rand(0,999).'-';
            
             $data =new stdClass();
                $data->id                   = $form['id'];
                $data->name                 = $form['name'];
                
                if (!empty($imageFile['name'])){
                    $data->image                = $stamp.$imageFile['name'];
                }
                
                $data->published                 = $form['published'];
                
                $data->floorplan_id         = $form['floorplan_id'];
                $data->floor                = $form['floor'];
                $data->suite                = $form['suite'];
                $data->alias               = $form['alias'];
                $data->available_space      = $form['available_space'];
                $data->divisible            = $form['divisible'];
                $data->market_rent          = $form['market_rent'];
                $data->date_available       = $form['date_available'];
                
                if (!empty($pdfFile['name'])){
                    $data->pdf                 = $stamp.$pdfFile['name'];
                }
                 
                
                
                $db = JFactory::getDBO();
            

            //save to database
            if ($data->id == 0){
                
               
                $db->insertObject( '#__parkway_vacancies', $data, id );
                
                 
            }else if ($data->id > 0){

                    $db->updateObject( '#__parkway_vacancies', $data, id );
            }
            
            
             //upload Image file   
            if (!empty($imageFile['name'])){

                $filename = JFile::makeSafe($imageFile['name']); 

                $source = $imageFile['tmp_name'];
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
            $this->setRedirect( 'index.php?option=com_parkway&view=vacancies', $msg );
        }
      
        public function cancel(){
            

            //redirects user back to blog homepage with Cancellation Message
            $msg = JText::_( 'COM_PARKWAY_POST_CANCELLED' );
            $this->setRedirect( 'index.php?option=com_parkway&view=vacancies' );

        }
       

	
}


