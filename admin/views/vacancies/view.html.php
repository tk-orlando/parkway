<?php

defined('_JEXEC') or die;


class parkwayViewVacancies extends JViewLegacy{
    
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
            
            
                
                //menuHelper::addSubmenu('vacancies');
                
                

		return parent::display($tpl);
	}

	
	protected function addToolbar()
	{
                require_once JPATH_COMPONENT . '/helpers/menu.php';
                menuHelper::addSubmenu('vacancies');
		$this->sidebar = JHtmlSidebar::render();
            
            
            JToolbarHelper::title(JText::_('Parkway: Vacancies'), 'vacancies');
                JToolbarHelper::addNew('vacancies.add');
                JToolbarHelper::deleteList('', 'vacancies.remove');
	}

	
    
    
}

