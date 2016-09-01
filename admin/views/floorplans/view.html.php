<?php

class parkwayViewFloorPlans extends JViewLegacy {
    
    
    
    public function display($tpl = null)
	{
		$this->addToolbar();

		return parent::display($tpl);
	}

	
	protected function addToolbar()
	{
            require_once JPATH_COMPONENT . '/helpers/menu.php';
            menuHelper::addSubmenu('floorplans');
            $this->sidebar = JHtmlSidebar::render();
            
            JToolbarHelper::title(JText::_('Parkway: Floor Plans'), 'floorplans');
                
            JToolbarHelper::addNew('floorplans.add');
             JToolbarHelper::deleteList('', 'floorplans.remove');
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

