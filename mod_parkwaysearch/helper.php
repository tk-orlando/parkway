<?php

class ModParkwaySearchHelper
{

    public static function getProperties()
    {

		// Obtain a database connection
		$db = JFactory::getDbo();
		// Retrieve the shout - note we are now retrieving the id not the lang field.

        $query="SELECT * FROM #__parkway_properties as p LEFT JOIN #__menu as m ON p.item_id=m.id ";
		// Prepare the query
		$db->setQuery($query);
		// Load the row.
		$result =$db->loadObjectList();

		return $result;


    }
}