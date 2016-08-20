<?php

defined('_JEXEC') or die;


class parkwayViewBuildings extends JViewLegacy{
    
    public function display($tpl = null)
	{
		$this->addToolbar();

		return parent::display($tpl);
	}

	
	protected function addToolbar()
	{
		JToolbarHelper::title(JText::_('Parkway: Buildings'), 'buildings');
                
                JToolbarHelper::addNew('buildings.add');
                 JToolbarHelper::deleteList('', 'buildings.remove');
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

