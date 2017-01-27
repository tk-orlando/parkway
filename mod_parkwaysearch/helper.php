<?php

class ModParkwaySearchHelper
{

    public static function getProperties()
    {

		// Obtain a database connection
		$db = JFactory::getDbo();
		// Retrieve the shout - note we are now retrieving the id not the lang field.

        $query="SELECT * FROM #__parkway_properties";
		// Prepare the query
		$db->setQuery($query);
		// Load the row.
		$result =$db->loadObjectList();
		return $result;


    }
}