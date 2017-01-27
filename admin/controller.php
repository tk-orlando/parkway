<?php

/**
 * @version     0.0.1
 * @package     com_parkway
 * @copyright   Copyright (C) 2016. All rights reserved.
 * @license     Private; see LICENSE.txt
 * @author      Support <support@tkorlando.com> - http://tkorlando.com
 */

defined('_JEXEC') or die;




class ParkwayController extends JControllerLegacy
{
    
    
    protected $default_view = 'properties';
	
	public function display($cachable = false, $urlparams = array())
	{
		//ParkwayHelper::updateReset();

		$view   = $this->input->get('view', 'properties');
		$layout = $this->input->get('layout', 'default');
		$id     = $this->input->getInt('id');

		

		parent::display();
                
                return $this;
	}
}
