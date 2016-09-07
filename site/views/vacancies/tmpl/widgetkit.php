<?php
// No direct access
defined('_JEXEC') or die('Restricted access');

$building = $this->getBuildingProfile();
    
?>
<?php echo  $building->name; ?>
<?php echo  $building->rentable_space; ?>
<?php echo  $building->number_of_floors; ?>
<?php echo  $building->address1; ?>
<?php echo  $building->address2; ?>
<?php echo  $building->city; ?>
<?php echo  $building->state; ?>
<?php echo  $building->zip; ?>
<?php echo  $building->typical_floor_size; ?>
<?php echo  $building->year_built; ?>

<?php 
$widget_id = 62;


// load widgetkit
include(JPATH_ADMINISTRATOR . '/components/com_widgetkit/widgetkit-app.php');
// render widget


	// get widgetkit
	$widgetkit = Widgetkit::getInstance();

	// render output
	$output = $widgetkit['widget']->render($widget_id);
	//$output = $app->renderWidget(json_decode($params->get('widgetkit', '[]'), true));
    echo $output === false ? $app['translator']->trans('Could not load widget') : $output;

 
print_r($output);

?>


{Gallery Profile here - 4 images}<br><br>




<form method="post" action="index.php?option=com_parkway&view=vacancies&layout=bybuilding">
    
<select name="filter_building">
  <option value="">---Select a Property---</option>
  <option value="1">CityWestPlace</option>
  <option value="2">CityWestPlace – Building 2</option>
  <option value="3">CityWestPlace – Building 3</option>
  <option value="4">CityWestPlace – Building 4</option>
</select> 
    Space: <input aria-invalid="false" class="active" name="filter[space][min]" maxlength="11" size="10" placeholder="min" style="width:60px;" type="text"> - <input class="active" name="filter[space][max]" maxlength="11" size="10" placeholder="max" style="width:60px;" type="text">SQ FT			
    <button type="submit">Submit</button>
</form>

<table border="1">
    <tr>
        <th>
            Suite Number
        </th>
        <th>
            Floor Number
        </th>
        <th>
            Available Sq. Ft.
        </th>
        <th>
            Divisible
        </th>
        <th>
            Market Rent
        </th>
        <th>
            Date Available
        </th>
        <th>
            PDF
        </th>
    </tr>

    <?php foreach ($this->items as $key => $value): ?>

        <tr>
            <td><?php echo $value->suite ?></td>
            <td><?php echo $value->floor ?></td>
            <td><?php echo $value->available_space ?></td>
            <td><?php echo $value->divisible ?></td>
            <td><?php echo $value->market_rent ?></td>
            <td><?php echo $this->formatDate($value->date_available) ?></td>
            
            <td> 
                <?php if (isset($value->pdf) && !empty($value->pdf)):?>
                    <?php echo $value->pdf ?>
                <?php endif; ?>
            </td>
        </tr>

        
    <?php endforeach; ?>

</table>




