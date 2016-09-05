<?php

defined('_JEXEC') or die;


jimport('joomla.application.component.controller');

/*
$controller = JControllerLegacy::getInstance('Parkway');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
*/


class parkwayController extends JControllerLegacy {
    
    
    public function display($cachable = false, $urlparams = array())
	{
		$cachable = true;

		// Set the default view name and format from the Request.
		$vName = $this->input->get('view', 'categories');
		$this->input->set('view', $vName);

		$safeurlparams = array('catid' => 'INT', 'id' => 'INT', 'cid' => 'ARRAY', 'year' => 'INT', 'month' => 'INT',
			'limit' => 'UINT', 'limitstart' => 'UINT', 'showall' => 'INT', 'return' => 'BASE64', 'filter' => 'STRING',
			'filter_order' => 'CMD', 'filter_order_Dir' => 'CMD', 'filter-search' => 'STRING', 'print' => 'BOOLEAN',
			'lang' => 'CMD');

		parent::display($cachable, $safeurlparams);

		return $this;
	}
    
    
    
    
    
    
}