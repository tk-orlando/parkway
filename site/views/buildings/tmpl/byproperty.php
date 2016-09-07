<?php

$mycount = 0;

$propertyName = $this->getPropertyName();

?>

<article class="uk-article">

<h1 class="uk-article-title"> Building List </h1>

<?php foreach ($this->items as $key => $value): ?>

<?php if( $mycount % 2 == 0 ): ?>

<div class="uk-grid">

<?php endif; ?>

	<div class="uk-width-medium-1-2">
		<div class="uk-grid">
			<div class="uk-width-medium-1-2">
			
    <?php if( isset($value->image) && !empty($value->image) ): ?>
		
					<img class="results-thumb" src="<?php echo '/media/com_parkway/'.$value->id.'/' . $value->image ?>" alt="<?php echo $value->image ?>">
					
		<?php elseif( empty($value->image) ): ?>
		
					<img class="results-thumb" src="/components/com_parkway/images/thumb-placeholder.jpg" alt="placeholder">
					
    <?php endif; ?>
		
			</div>
			<div class="uk-width-medium-1-2 uk-margin-bottom">
				<table class="uk-table results-table">
					<tr>
						<td colspan="2">
							<h4> <?php echo $propertyName ?> </h4>
							<h5> <?php echo $value->building_name?> </h5>
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
					<!-- <tr>
						<td>Rentable Sq. Ft.</td>
						<td class="uk-text-bold">
							...
						</td>
					</tr> -->
					<tr>
						<td>Number of Floors</td>
						<td class="uk-text-bold">
							<!-- var numFloors -->
							<?php echo $value->number_of_floors ?>
						</td>
					</tr>
					<tr>
						<td>Available Sq. Ft.</td>
						<td class="uk-text-bold">
							<!-- var availableSqFt -->
							need input
						</td>
					</tr>
					<tr>
						<td>Typical Floor Size</td>
						<td class="uk-text-bold">
							<!-- var typicalFloorSize -->
							<?php echo $value->typical_floor_size ?>
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
        <p class="results-links"><a href="<?php echo JURI::base()."index.php?option=com_parkway&view=vacancies&layout=bybuilding&filter_building=$value->id&Itemid=604" ?>">View Listings</a><br><a href="#">Interactive Floor Plan</a></p>
			</div>
		</div>
	</div>
	
<?php if( $mycount % 2 != 0 ): ?>

</div>

<?php endif; ?>	

<?php $mycount++; ?>

<?php endforeach; ?>

</article>





