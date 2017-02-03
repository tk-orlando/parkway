<?php
defined('_JEXEC') or die;



class parkwayControllerSearch extends JController{
    protected $text_prefix = 'COM_PARKWAY_SEARCH';

	public function __construct($config = array())
        {
            parent::__construct($config);
            
            

        }
	

	public function getModel($name = 'Search', $prefix = 'parkwayModel', $config = array())
	{
		$model = parent::getModel($name, $prefix, $config);
                
                return $model;
	}
    
}

?>

