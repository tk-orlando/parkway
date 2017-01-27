<?php
$mycount = 0;

// Get the route .
/*
$itemid = ParkwayHelperRoute::getBuildingsRoute();
$itemid = $itemid !== null ? '&Itemid=' . $itemid : '';
$route  = 'index.php?option=com_users&view=remind' . $itemid;
echo '------------------>'.$route.'<-------------------';
*/

$jinput = JFactory::getApplication()->input;
$Itemid = $jinput->getInt('Itemid');



?>

<article class="uk-article">

<h1 class="uk-article-title"> Find Your Space </h1>

<?php foreach ($this->items as $key => $value): ?>

<?php if( $mycount % 2 == 0 ): ?>

<div class="uk-grid">

<?php endif; ?>

	<div class="uk-width-medium-1-2">
		<div class="uk-grid">
			<div class="uk-width-medium-1-2">
			
    <?php if( isset($value->image) && !empty($value->image) ): ?>
		
					<img class="results-thumb" src="<?php echo '/media/com_parkway/' . $value->image ?>" alt="<?php echo $value->image ?>">
					
		<?php elseif( empty($value->image) ): ?>
		
					<img class="results-thumb" src="/components/com_parkway/images/thumb-placeholder.jpg" alt="placeholder">
					
    <?php endif; ?>
		
			</div>
			<div class="uk-width-medium-1-2 uk-margin-bottom">
				<table class="uk-table results-table">
					<tr>
						<td colspan="2">
							<h4> <?php echo $value->property_name ?> </h4>
							<h5> <?php echo $value->building_name ?> </h5>
							<p>	
								<?php echo $value->address1 ?>
								
								<?php if( empty($value->address2) ): ?>
									
									<br />

								<?php elseif( isset($value->address2) ): ?>

									<br /><?php echo $value->address2 ?><br />

								<?php endif; ?>

								<?php echo $value->city?>, <?php echo $value->state?> <?php echo $value->zip?>
							</p>
						</td>
					</tr>
					<tr>
						<td>Rentable Sq. Ft.</td>
						<td class="uk-text-bold">  
							<!-- var rentableSqFt -->
							128,400
						</td>
					</tr>
					<tr>
						<td>Number of Floors</td>
						<td class="uk-text-bold">
							<!-- var numFloors -->
							10
						</td>
					</tr>
					<tr>
						<td>Available Sq. Ft.</td>
						<td class="uk-text-bold">
							<!-- var availableSqFt -->
							14,000
						</td>
					</tr>
					<tr>
						<td>Typical Floor Size</td>
						<td class="uk-text-bold">
							<!-- var typicalFloorSize -->
							<?php echo $value->typical_floor_size?>
						</td>
					</tr>
					<tr>
						<td>Year Built</td>
						<td class="uk-text-bold">
							<!-- var yearBuilt -->
							<?php echo $value->year_built?>
						</td>
					</tr>
				</table>
                            <p class="results-links"><a href="<?php echo JURI::base()."index.php?option=com_parkway&view=vacancies&layout=bybuilding&filter_building=$value->id&Itemid=$Itemid " ; ?>">View Listings</a><br><a href="<?php echo JURI::base()."index.php?option=com_parkway&view=floorplan&building=$value->id&Itemid=$Itemid" ?>">Interactive Floor Plan</a></p>
			</div>
		</div>
	</div>
	
<?php if( $mycount % 2 != 0 ): ?>

</div>

<?php endif; ?>	

<?php $mycount++; ?>

<?php endforeach; ?>

</article>

