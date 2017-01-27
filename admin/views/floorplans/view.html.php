<?php

defined('_JEXEC') or die;

class parkwayViewFloorPlans extends JViewLegacy {
     /**
	 * An array of items
	 *
	 * @var  array
	 */
	protected $items;

	/**
	 * The pagination object
	 *
	 * @var  JPagination
	 */
	protected $pagination;

	/**
	 * The model state
	 *
	 * @var  object
	 */
	protected $state;

	/**
	 * Form object for search filters
	 *
	 * @var  JForm
	 */
	public $filterForm;

	/**
	 * The active search filters
	 *
	 * @var  array
	 */
	public $activeFilters;

	/**
	 * The sidebar markup
	 *
	 * @var  string
	 */
	protected $sidebar;
    
    
    public function display($tpl = null)
	{
		
            $this->items            = $this->get('Items');
            $this->pagination       = $this->get('Pagination');
            $this->state            = $this->get('State');
            $this->filterForm       = $this->get('FilterForm');
            $this->activeFilters    = $this->get('ActiveFilters');

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

	
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}

