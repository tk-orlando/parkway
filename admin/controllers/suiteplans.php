<?php

defined('_JEXEC') or die;



class parkwayControllerSuiteplans extends JControllerForm{
    
   
	protected $text_prefix = 'COM_PARKWAY_SUITEPLANS';

	public function __construct($config = array())
        {
            parent::__construct($config);
            //...
            $this->registerTask('remove', 'deleteList');

        }
	

	public function getModel($name = 'Suiteplans', $prefix = 'ParkwayModel', $config = array())
	{
		$model = parent::getModel($name, $prefix, $config);
                
                return $model;
	}
        public function add(){
              //redirects user back to blog homepage with Cancellation Message
           
            $this->setRedirect( 'index.php?option=com_parkway&view=suiteplan&layout=add' );
        }
        public function deleteList(){
            
            $listItems = JRequest::getVar('cid');
            
            //print_r($form);
            
            foreach ($listItems as $key => $value){
                
                $db = JFactory::getDbo();
 
                $query = $db->getQuery(true);

                $condition = 'id ='.$value ;
                $query->delete($db->quoteName('#__parkway_suiteplans'));
                $query->where($condition);

                $db->setQuery($query);

                $result = $db->execute();
                
            }

            //redirects user back to blog homepage with Cancellation Message
            $msg = JText::_( 'COM_PARKWAY_POST_REMOVED' );
            $this->setRedirect( 'index.php?option=com_parkway&view=suiteplans', $msg );
        }
        
    
    
}





