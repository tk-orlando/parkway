<?php

defined('_JEXEC') or die;


class parkwayViewFloorplan extends JViewLegacy{
    /**
	 * An array of items
	 *
	 * @var  array
	 */
	protected $items;

	

	protected $state;

	
	

	
    
    
    public function display($tpl = null)
	{
		
            $this->items            = $this->get('Items');
            $this->pagination       = $this->get('Pagination');
            $this->state            = $this->get('State');
            $this->filterForm       = $this->get('FilterForm');
            $this->activeFilters    = $this->get('ActiveFilters');
            
           

		return parent::display($tpl);
	}
        
     public function getPropertyName(){
         
         $jinput = JFactory::getApplication()->input;
         $propertyID = $jinput->get('filter_property');
         
         
         
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
     public function getBuildingName(){
         
         $jinput = JFactory::getApplication()->input;
         $buildingID = (int) $jinput->get('building');
         
         
         
         if (isset($buildingID) && !empty($buildingID)){
           
            $db = JFactory::getDbo();
            $query = $db->getQuery(true);

            $query->select('name')  ; 
            $query->from('#__parkway_buildings');
            $query->where("id = $buildingID");    
            
            $db->setQuery($query);
            $result = $db->loadResult();   
           
           return $result;
         }
         
         return ;
     }
     public function getFloorplan(){
         
          $jinput = JFactory::getApplication()->input;
         $buildingID = (int) $jinput->get('building');
         $floorPlanID = $jinput->get('planid');
         
         if (isset($buildingID ) && !empty($buildingID )){
           
            $db = JFactory::getDbo();
            $query = $db->getQuery(true);
             
             if (isset($floorPlanID ) && !empty($floorPlanID )){
                 
                 //get the first floorplan for the building 
                $query->select('*')  ; 
                $query->from('#__parkway_floorplans');
                $query->where("alias = '$floorPlanID' LIMIT 1"); 
                 
             }else{
               

                //get the first floorplan for the building 
                $query->select('*')  ; 
                $query->from('#__parkway_floorplans');
                $query->where("building_id = $buildingID LIMIT 1");   
             }
              
            
            $db->setQuery($query);
            $result = $db->loadObject();  
            
             
             
           
            if ($result){
               
                $object = new stdClass();
                $object->image = 'media/com_parkway/'.$result->image ;
                $object->map = '<map name="floorplan_map">'.$result->coordinates.'</map>';
                
                return $object;
            }
            
            
           
         }
         
         return ;
         
         
         
     }
     /*
      * Get all suite plans based on URL parameter 
      */
      public function getVacancy(){
         
        $jinput = JFactory::getApplication()->input;
        $buildingID = $jinput->get('building');
        $floorPlan = $jinput->get('planid');
        //$suitePlan = $jinput->get('suite');
         
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        $db->setQuery($query);
        
         
        if (isset($floorPlan) && !empty($floorPlan)){
            
            $query->select('v.id, v.image, v.suite, f.floor_level, v.alias, v.available_space, v.divisible, v.market_rent, v.date_available, v.pdf, v.published ')  ; 
            $query->from('#__parkway_vacancies as v');
            $query->leftJoin('#__parkway_floorplans as f ON v.floorplan_id = f.id');
            //$query->where("f.alias = '$floorPlan' ");  
            // Filter by floor alias
            $query->where( 'f.alias = "'.$floorPlan. '" ' );
            // Filter by published status
            $query->where( $db->quoteName('v.published') . ' = 1 ' );
            
             $db->setQuery($query);
            $result = $db->loadObjectList();
             
        }else if (isset($buildingID) && !empty($buildingID)){
            
            $query->select('v.id, v.image, v.suite,f.floor_level, v.alias, v.available_space, v.divisible, v.market_rent, v.date_available, v.pdf, v.published ')  ; 
            $query->from('#__parkway_vacancies as v');
            $query->leftJoin('#__parkway_floorplans as f ON v.floorplan_id = f.id');
            //$query->where("f.building_id = $buildingID ");
            // Filter by published status
            $query->where('f.building_id = '.$buildingID);
            // Filter by published status
            $query->where( $db->quoteName('v.published') . ' = 1 ' );
            
             $db->setQuery($query);
            $result = $db->loadObjectList();
            
        }        

        
        
        
         
        if (count((array)$result ) > 0  ){
            return  $result;
        }
         
       
         
         return;
         
         
         
     }
     /*
      * Tag formatting for building overlays
      */
     public function parseBuildingMap($imageMaps, $tooltips){
         
       
        $jinput = JFactory::getApplication()->input;
        $buildingID = (int) $jinput->get('building');
        $floorPlanID = (string) $jinput->get('planid');
        
        libxml_use_internal_errors(true);
        
        $dom = new DOMDocument();
        $dom->loadHTML($imageMaps);
        
        $searchNode = $dom->getElementsByTagName( "polygon" ); 
        
        $result = "";
        $class = 'polygon';
        
       
        
        foreach( $searchNode as $key=>$value )
        {
            $data_group = (string) trim($value->getAttribute('id'));
            
            $coords = $value->getAttribute('points');
            $href = JRoute::_('index.php?option=com_parkway&view=floorplan&building='.$buildingID.'&planid='.$data_group.'#buildingTitleHeader');
            
            $tooltip = '';
            
            foreach ( $tooltips as $key=>$value ) {
                if ( $data_group == $value->alias ) {
                    $tooltip = $value->tooltip;
                    
                }
            }
            
            
            if (($floorPlanID == $data_group) || (!$floorPlanID && ($key == 0))){
                
                $class = 'polygondefault';
            }else{
                $class='polygon';
            }
             
            
            //$href2 = $searchNode->setAttribute("href", "index.php?option=com_parkway&view=floorplan&fid=");

           //$result .= '<polygon data-group="'.$data_group.'" class="'.$class.'" href="'.$href.'" shape="'.$shape.'" target="_self" coords="'.$coords .'" >'."\r";
           
           $result .= '<a xlink:href="'.$href.'" target="_self">';
            $result .= '<g><title>' . $tooltip . '</title><polygon id="'.$data_group.'" class="'.$class.'" points="'.$coords .'" ></polygon></g>'."\r";
            $result .= '</a>';
           
        } 
        return $result;
         
     }
	/*
         * Tag formatting for floorplan overlays
         */
     public function parseFloorplanMap($imageMaps, $tooltips){
         
        libxml_use_internal_errors(true);
         
        $dom = new DOMDocument();
        $dom->loadHTML($imageMaps);
        
        $searchNode = $dom->getElementsByTagName( "polygon" ); 
        
        $result = "";
        
        $jinput = JFactory::getApplication()->input;
        $buildingID = (int) $jinput->get('building');
        $floorPlanID = $jinput->get('planid');
        $suite = JRequest::getVar('suite', '', 'get');
        
        $class = 'polygon';
        
        foreach( $searchNode as $searchNode )
        {
            $data_group = $searchNode->getAttribute('id');
            
            //$href = $searchNode->getAttribute('href');
            $coords = $searchNode->getAttribute('points');
            
            $anchor = '#'.$data_group;
            
            $href = JRoute::_('index.php?option=com_parkway&view=floorplan&building='.$buildingID.'&planid='.$floorPlanID.'&suite='.$data_group.'');
            $tooltip = '';
            
            foreach ( $tooltips as $key=>$value ) {
                if ( $data_group == $value->alias ) {
                    $tooltip = $value->tooltip;
                    
                }
            }
            
            
            $result .= '<a xlink:href="javascript:showSuite(\''.$data_group.'\');" >'."\r";
            $result .= '<g><title>'.$tooltip.'</title><polygon id="'.$data_group.'" class="'.$class.'" points="'.$coords .'" ></polygon></g>'."\r";
            $result .= '</a>'."\r";
        } 
        return $result;
         
     }
     /*
      * Get building or floor plan tooltips
      */
     public function getTooltips($type = 'building'){
         
         $jinput = JFactory::getApplication()->input;
         
         $building = $jinput->get('building');
         $floorplanName = $jinput->get('planid');
         
         
         switch ($type) {
             case 'building':
                if (isset($building) && !empty($building)){

                    $db = JFactory::getDbo();
                    $query = $db->getQuery(true);

                    $query->select('title, alias, tooltip')  ; 
                    $query->from('#__parkway_floorplans');
                    $query->where("building_id = $building");    

                    $db->setQuery($query);
                    $result = $db->loadObjectList();   

                   return $result;
                 }

                 break;
            case 'floorplan':
                if (isset($floorplanName) && !empty($floorplanName)){

                    $db = JFactory::getDbo();
                    $query = $db->getQuery(true);

                    //get database id of current floorplan
                    $query->select('id')  ; 
                    $query->from('#__parkway_floorplans');
                    $query->where("building_id = $building AND alias LIKE '$floorplanName'");    
                    $db->setQuery($query);
                    $floorplanID = $db->loadResult();
                     
                    
                    
                    //get all tooltips 
                    
                    $db = JFactory::getDbo();
                    $query = $db->getQuery(true);
                    $query->select('suite, alias, tooltip')  ; 
                    $query->from('#__parkway_vacancies');
                    $query->where("floorplan_id = '$floorplanID'");    

                    $db->setQuery($query);
                    $result = $db->loadObjectList();   

                   return $result;
                 }

                 break;
             default:
                 break;
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
	

	
    
    
}




