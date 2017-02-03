<?php
defined('_JEXEC') or die;



class parkwayViewSearch extends JViewLegacy{
public function display($tpl = null)
	{
		
            $this->items            = $this->get('Items');
            $this->pagination       = $this->get('Pagination');
            $this->state            = $this->get('State');
            $this->filterForm       = $this->get('FilterForm');
            $this->activeFilters    = $this->get('ActiveFilters');
            
           

		return parent::display($tpl);
	}
}

?>