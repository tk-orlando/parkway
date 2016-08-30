<?php

defined('_JEXEC') or die;


class ParkwayViewProperties extends JViewLegacy
{
	
	public function display($tpl = null)
	{
		$this->addToolbar();

		return parent::display($tpl);
	}

	
	protected function addToolbar()
	{
            require_once JPATH_COMPONENT . '/helpers/menu.php';
            menuHelper::addSubmenu('properties');
            $this->sidebar = JHtmlSidebar::render();	
            
            JToolbarHelper::title(JText::_('Parkway: Properties'), 'properties');
                
            JToolbarHelper::addNew('properties.add');
            JToolbarHelper::deleteList('', 'properties.remove');
	}

	/**
	 * Returns an array of fields the table can be sorted by
	 *
	 * @return  array  Array containing the field name to sort by as the key and display text as value
	 *
	 * @since   
	 */
	protected function getSortFields()
	{
		
	}
}

