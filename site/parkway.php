<?php
defined('_JEXEC') or die;

jimport('joomla.application.component.controller');

require_once JPATH_COMPONENT . '/helpers/route.php';


$controller = JControllerLegacy::getInstance('Parkway');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();