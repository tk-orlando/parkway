<?php

defined('_JEXEC') or die;


class ParkwayHelperRoute
{
	
	public static function &getItems()
	{
		static $items;

		// Get the menu items for this component.
		if (!isset($items))
		{
			$app   = JFactory::getApplication();
			$menu  = $app->getMenu();
			$com   = JComponentHelper::getComponent('com_parkway');
			$items = $menu->getItems('component_id', $com->id);

			// If no items found, set to empty array.
			if (!$items)
			{
				$items = array();
			}
		}

		return $items;
	}

	public static function getLoginRoute()
	{
		// Get the items.
		$items  = self::getItems();
		$itemid = null;

		// Search for a suitable menu id.
		foreach ($items as $item)
		{
			if (isset($item->query['view']) && $item->query['view'] === 'login')
			{
				$itemid = $item->id;
				break;
			}
		}

		return $itemid;
	}
        public static function getBuildingsRoute()
        {
            // Get the items.
		$items  = self::getItems();
		$itemid = null;

		// Search for a suitable menu id.
		// Menu link can only go to users own profile.

		foreach ($items as $item)
		{
			if (isset($item->query['view']) && $item->query['view'] === 'profile')
			{
				$itemid = $item->id;
				break;
			}
		}

		return $itemid;
        }
}
