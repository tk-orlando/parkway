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
            
           

		return parent::display($tpl);
	}
    public function getBuildingProfile(){
        
        $jinput = JFactory::getApplication()->input;
        $propertyID = $jinput->get('filter_building');
         
         
         
         if (isset($propertyID) && !empty($propertyID)){
           
            $db = JFactory::getDbo();
            $query = $db->getQuery(true);

            $query->select('*')  ; 
            $query->from('#__parkway_buildings');
           
            
            
             $query->where("id = $propertyID"); 
                
            $db->setQuery($query);
            $result = $db->loadObject();
            
            return $result ;
            
         }
        
        
        
    }
    /*
     * Format date from YYYY-DD-MM to MM/DD/YYYY
     */
    public function formatDate($date){
        
        $now = time();
        $date = strtotime($date);
        
       
        
        if ($date > $now){
            
            $result = date("m/d/Y", $date);
            
        }else{
            
            $result = 'Now'; 
            
        }
          
        return $result ;
    }
    
    /*
     *  grab first 4 images of widgetkit gallery
     */
    
    public function getGallery($galleryID){
        
        
        
    }

	
	

	
    
    
}







