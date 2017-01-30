<?php

defined('_JEXEC') or die;


class parkwayViewBuildings extends JViewLegacy{
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
        //$db = JFactory::getDBO(); echo $db->getQuery();
            $this->pagination       = $this->get('Pagination');
            $this->state            = $this->get('State');
            $this->filterForm       = $this->get('FilterForm');
            $this->activeFilters    = $this->get('ActiveFilters');


		return parent::display($tpl);
	}
        
     public function getPropertyName($propertyID){
         
         
         if (isset($propertyID) && !empty($propertyID)){
           
            $db = JFactory::getDbo();
            $query = $db->getQuery(true);

            $query->select('name')  ; 
            $query->from('#__parkway_properties');
            $query->where("id = $propertyID");    
            
            $db->setQuery($query);
            $result = $db->loadResult();   
           
           return $result;
         }
         
         return ;
     }   
     public function getAllBuildings(){
         
          $db = JFactory::getDbo();
            $query = $db->getQuery(true);

            $query->select('*')  ;
            $query->select('b.name as building_name')  ;
            $query->from('#__parkway_buildings AS b');
            $query->leftjoin('#__parkway_properties AS p  ON b.property_id = p.id');
            
            
            $db->setQuery($query);
            $result = $db->loadObjectList(); 
            
            
            return $result; 
            
           
           
         
     }
	

	
    
    
}




