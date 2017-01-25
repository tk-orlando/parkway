<?php


defined('_JEXEC') or die;
//JRouter::setMode(0);

class ParkwayRouter extends JComponentRouterBase
{

	public function build(&$query)
	{
        $segments = array();
        if (isset($query['view']))
        {
            $segments[] = $query['view'];
            unset($query['view']);
        }
        if (isset($query['layout']))
        {
            $segments[] = $query['layout'];
            unset($query['layout']);
        };
        if (isset($query['filter_building']))
        {
            $segments[] = $query['filter_building'];
            unset($query['filter_building']);
        };
        if (isset($query['building']))
        {
            $segments[] = $query['building'];
            unset($query['building']);
        };
        if (isset($query['planid']))
        {
            $segments[] = $query['planid'];
            unset($query['planid']);
        };
        return $segments;
	}


	public function parse(&$segments)
	{
        $vars = array();
        switch($segments[0])
        {
            case 'vacancies':
                $vars['view'] = 'vacancies';
                $vars['filter_building'] =$segments[2];
                break;
            case'floorplan':
                $vars['view'] = 'floorplan';
                $vars['building'] =$segments[1];
                if(isset($segments[2])){ 
                    $vars['planid'] =$segments[2];
                }
                break;
        }
        switch($segments[1])
        {
            case 'bybuilding':
                $vars['layout'] = 'bybuilding';
                break;
        }

        return $vars;
	}
}


function parkwayBuildRoute(&$query)
{
	$router = new ParkwayRouter;

	return $router->build($query);
}


function parkwayParseRoute($segments)
{
	$router = new ParkwayRouter;

	return $router->parse($segments);
}
