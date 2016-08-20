<?php

defined('_JEXEC') or die;


class ParkwayHelper extends JHelperContent
{
	
	public static function addSubmenu($vName)
	{
		JHtmlSidebar::addEntry(
			JText::_('COM_PARKWAY_SUBMENU_PROPERTIES'),
			'index.php?option=com_parkway&view=properties',
			$vName == 'properties'
		);

		JHtmlSidebar::addEntry(
			JText::_('COM_PARKWAY_SUBMENU_BUILDINGS'),
			'index.php?option=com_parkway&view=buildings',
			$vName == 'buildings'
		);

		

		
	}

	
	
	
}


