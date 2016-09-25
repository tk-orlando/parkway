<?php
defined('_JEXEC') or die;



class parkwayModelFloorplan extends JModelItem{
    
    

  
    protected function populateState()
	{
		$app = JFactory::getApplication('site');

		// Load state from the request.
		$building = $app->input->getInt('building');
		$this->setState('building.id', $building);

		// Load the parameters.
		$params = $app->getParams();
		$this->setState('params', $params);

		$user = JFactory::getUser();

		if ((!$user->authorise('core.edit.state', 'com_parkway')) &&  (!$user->authorise('core.edit', 'com_parkway')))
		{
			$this->setState('filter.published', 1);
			$this->setState('filter.archived', 2);
		}
	}
    
    
    
    public function getItems(){
        
        // Create a new query object.
        $db = $this->getDbo();
        $query = $db->getQuery(true);
        $user = JFactory::getUser();
        
        $building = $this->getState('building.id');
        

        // Select the required fields from the table.
        $query->select('*');
        

        $query->from($db->quoteName('#__parkway_buildings', 'b'));

        $query->where(
                                '(' . $db->quoteName('b.id') . ' =  '.$building.' )'
                        );
         
        $db->setQuery($query);
	$result = $db->loadObject();
        
        return $result ;
        
    }
    
            
        
   
    
    
}

