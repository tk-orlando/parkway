<?php
// No direct access
defined('_JEXEC') or die('Restricted access');


?>
<article class="uk-article">
<h2>
	<!-- var buildingName -->
	One Greenway Plaza
</h2>
<div class="uk-grid">
	<div class="uk-width-medium-1-4">
		<a href="#" class="uk-button uk-margin-bottom" style="width:100%;">View Floor Plans</a>
		<!-- var buildingDetailGallery from widgetkit -->
		[widgetkit id="60"]

		<!-- email, print, view map, share functions -->
		<p class="results-links building-links">
			<a href="#">Email Link</a>
			<a href="#">Print Page</a>
			<a href="#">View Map</a>
			<a href="#">Share</a>
		</p>
	</div>
	<div class="uk-width-medium-3-4">
		<div class="uk-grid">
			<div class="uk-width-small-1-3">
				<table class="uk-table results-table">
					<tr>
						<td colspan="2">
							<!-- var buildingName -->
							<strong>One Greenway Plaza</strong>
						</td>
					</tr>
					<tr>
						<td>
							<!-- var suiteNumber -->
							Suite <strong>650</strong>
						</td>
					</tr>
					<tr>
						<td>
							<!-- var(s) city, state, zip -->
							Houston, TX 77046
						</td>
					</tr>
				</table>	
			</div>
			<div class="uk-width-small-1-3">
				<table class="uk-table results-table">
					<tr>
						<td>Rentable Sq. Ft.</td>
						<td class="uk-text-bold">
							<!-- var RentableSqFt -->
							35,000
						</td>
					</tr>
					<tr>
						<td>Typical Floor Size</td>
						<td>
							<!-- var typlicalFloorSize -->
							30,000
						</td>
					</tr>
				</table>
			</div>
			<div class="uk-width-small-1-3">
				<table class="uk-table results-table">
					<tr>
						<td>No. Floors</td>
						<td>
							<!-- var numFloors -->
							10
						</td>
					</tr>
					<tr>
						<td>Year Built</td>
						<td>
							<!-- var yearBuilt -->
							1982
						</td>
					</tr>
				</table>
			</div>
		</div>
		<div class="uk-grid">
			<div class="uk-width-1-1">
				<table class="uk-table results-table">
					<tr class="results-top">
						<th>Suite<br />Number</th>
						<th>Floor<br />Number</th>
						<th>Available<br />Sq. Ft.</th>
						<th>Divisible</th>
						<th>Market<br />Rent</th>
						<th>Date<br />Available</th>
						<th>PDF</th>
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
			                    
													<p class="results-links"><a href="<?php echo "/media/com_parkway/$value->building_id/$value->pdf" ?>" class="uk-icon-file-pdf-o" target="_blank"></a></p>
													
			                <?php endif; ?>
			            </td>
			        </tr>

			        
			    <?php endforeach; ?>
				</table>
			</div>
		</div>
	</div>
</div>
</article>