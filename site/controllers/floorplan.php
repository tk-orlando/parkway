<?php


class parkwayControllerFloorplan extends JController{
    
    
    protected $text_prefix = 'COM_PARKWAY_FLOORPLAN';

	public function __construct($config = array())
        {
            parent::__construct($config);
            

        }
	

	public function getModel($name = 'Floorplan', $prefix = 'ParkwayModel', $config = array())
	{
		$model = parent::getModel($name, $prefix, $config);
                
                return $model;
	}
    
    
    
}

