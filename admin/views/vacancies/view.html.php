<?php

defined('_JEXEC') or die;


class parkwayViewVacancies extends JViewLegacy{
    
    public function display($tpl = null)
	{
		$this->addToolbar();

		return parent::display($tpl);
	}

	
	protected function addToolbar()
	{
		JToolbarHelper::title(JText::_('Parkway: Vacancies'), 'vacancies');
                
                JToolbarHelper::addNew('vacancies.add');
                 JToolbarHelper::deleteList('', 'vacancies.remove');
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

