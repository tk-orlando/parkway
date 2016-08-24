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
            
             $data =new stdClass();
                $data->id                   = $form['id'];
                $data->name                 = $form['name'];
                $data->property_id          = $form['property_id'];
                $data->building_id          = $form['building_id'];
                $data->floor                = $form['floor'];
                $data->suite                = $form['suite'];
                $data->available_space      = $form['available_space'];
                $data->date_available       = $form['date_available'];
                
                
                $db = JFactory::getDBO();
            

            //save to database
            if ($data->id == 0){
                
               
                $db->insertObject( '#__parkway_vacancies', $data, id );
                
                 
            }else if ($data->id > 0){

                    $db->updateObject( '#__parkway_vacancies', $data, id );
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


