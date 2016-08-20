<?php


defined('_JEXEC') or die;

JHtml::_('behavior.tabstate');

if (!JFactory::getUser()->authorise('core.manage', 'com_parkway'))
{
	return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
}

// Execute the task.
$controller = JControllerLegacy::getInstance('Parkway');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();


