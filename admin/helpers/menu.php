<?php





defined('_JEXEC') or die;

class menuHelper extends JHelperContent
{
	
	public static function addSubmenu($viewName)
    {
            
        JHtmlSidebar::addEntry(
                JText::_('COM_PARKWAY_SUBMENU_PROPERTIES'), 'index.php?option=com_parkway&view=properties', $viewName == 'properties' 
                );
        JHtmlSidebar::addEntry(
                JText::_('COM_PARKWAY_SUBMENU_BUILDINGS'), 'index.php?option=com_parkway&view=buildings', $viewName == 'buildings' 
                );
        JHtmlSidebar::addEntry(
                JText::_('COM_PARKWAY_SUBMENU_FLOORPLANS'), 'index.php?option=com_parkway&view=floorplans', $viewName == 'floorplans' 
                );
        JHtmlSidebar::addEntry(
                JText::_('COM_PARKWAY_SUBMENU_VACANCIES'), 'index.php?option=com_parkway&view=vacancies', $viewName == 'vacancies' 
                );
        
        JHtmlSidebar::addEntry(
                JText::_('COM_PARKWAY_SUBMENU_TAGS'), 'index.php?option=com_parkway&view=tags', $viewName == 'tags' 
                );
        
        
        
            
            
            
    }
}


