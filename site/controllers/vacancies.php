<?php


class parkwayControllerVacancies extends JControllerForm{
    
    
    protected $text_prefix = 'COM_PARKWAY_VACANCIES';

	public function __construct($config = array())
        {
            parent::__construct($config);
            //...
            //$this->registerTask('remove', 'deleteList');

        }
	

	public function getModel($name = 'Vacancies', $prefix = 'ParkwayModel', $config = array())
	{
		$model = parent::getModel($name, $prefix, $config);
                
                return $model;
	}
    
    
    
}


