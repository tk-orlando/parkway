<?php

class parkwayViewSuitePlans extends JViewLegacy {
    
    
    
    public function display($tpl = null)
	{
		$this->addToolbar();

		return parent::display($tpl);
	}

	
	protected function addToolbar()
	{
            require_once JPATH_COMPONENT . '/helpers/menu.php';
            menuHelper::addSubmenu('suiteplans');
            $this->sidebar = JHtmlSidebar::render();
            
            JToolbarHelper::title(JText::_('Parkway: Suite Plans'), 'suiteplans');
                
            JToolbarHelper::addNew('suiteplans.add');
             JToolbarHelper::deleteList('', 'suiteplans.remove');
	}
        function getBuildingName($floorplan_id){
            
             // Create a new query object.
           $db = JFactory::getDbo();
                $query = $db->getQuery(true);
            
                $condition = "f.id = $floorplan_id ";
                $query->select('b.name');
                $query->from('#__parkway_floorplans as f');
                $query->leftjoin('#__parkway_buildings as b ON f.building_id = b.id');
                $query->where( $condition )  ;
            
            $db->setQuery($query);
            
            return $db->loadResult();
        }

	
 
    
    
}

