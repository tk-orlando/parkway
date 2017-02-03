<?php
// No direct access
defined('_JEXEC') or die('Restricted access');

$building = $this->getBuildingProfile();
        
  
?>

<article class="uk-article" data-permalink="http://joomla.tko-orlando.com/index.php/building-details-list">  
    <h1 class="uk-article-title"> Building Details </h1>
    <div class="uk-grid">
        <div class="uk-width-medium-1-4">
            <a href="#" class="uk-button uk-margin-bottom" style="width:100%;">View Floor Plans</a>
            <!-- var buildingDetailGallery from widgetkit -->
            
            <div id="wk-grida9d" class="uk-grid-width-1-2 uk-grid uk-grid-match uk-grid-medium " data-uk-grid-match="{target:'> div > .uk-panel', row:true}" data-uk-grid-margin="">
				<div class="uk-row-first">
					<div class="uk-panel" style="min-height: 119px;">
						<div class="uk-panel-teaser">
							<figure class="uk-overlay uk-overlay-hover uk-border-rounded">
								<img src="/media/widgetkit/sfp-cafe-828bd4b049a7f4bcbea002d5a626918a.jpg" class="uk-overlay-scale" alt="sfp-cafe" width="120" height="120">
								<div class="uk-overlay-panel uk-overlay-background uk-overlay-fade"></div>
								<div class="uk-overlay-panel uk-overlay-icon uk-overlay-fade"></div>
								<a class="uk-position-cover" href="/images/properties/houston/sanfelipeplaza/gallery/amenities/sfp-cafe.jpg" data-lightbox-type="image" data-uk-lightbox="{group:'.wk-1a9d'}"></a>
							</figure>
						</div>
					</div>
				</div>
				<div>
					<div class="uk-panel" style="min-height: 119px;">
						<div class="uk-panel-teaser">
							<figure class="uk-overlay uk-overlay-hover uk-border-rounded">
								<img src="/media/widgetkit/sfp-collab-fb4edc6e27741ca8f50da07881887ba5.jpg" class="uk-overlay-scale" alt="sfp-collab" width="120" height="120">
								<div class="uk-overlay-panel uk-overlay-background uk-overlay-fade"></div>
								<div class="uk-overlay-panel uk-overlay-icon uk-overlay-fade"></div>
								<a class="uk-position-cover" href="/images/properties/houston/sanfelipeplaza/gallery/amenities/sfp-collab.jpg" data-lightbox-type="image" data-uk-lightbox="{group:'.wk-1a9d'}"></a>
							</figure>
						</div>
					</div>
				</div>
				<div class="uk-grid-margin uk-row-first">
					<div class="uk-panel" style="min-height: 119px;">
						<div class="uk-panel-teaser">
							<figure class="uk-overlay uk-overlay-hover uk-border-rounded">
								<img src="/media/widgetkit/sfp-east-conf-5a9d50ed22e05785ef16d2e122bffd67.jpg" class="uk-overlay-scale" alt="sfp-east-conf" width="120" height="120">
								<div class="uk-overlay-panel uk-overlay-background uk-overlay-fade"></div>
								<div class="uk-overlay-panel uk-overlay-icon uk-overlay-fade"></div>
								<a class="uk-position-cover" href="/images/properties/houston/sanfelipeplaza/gallery/amenities/sfp-east-conf.jpg" data-lightbox-type="image" data-uk-lightbox="{group:'.wk-1a9d'}"></a>
							</figure>
						</div>
					</div>
				</div>
				<div class="uk-grid-margin">
					<div class="uk-panel" style="min-height: 119px;">
						<div class="uk-panel-teaser">
							<figure class="uk-overlay uk-overlay-hover uk-border-rounded">
								<img src="/media/widgetkit/sfp-fitness-49e0cd57a4febc6476138b1e5d5932c1.jpg" class="uk-overlay-scale" alt="sfp-fitness" width="120" height="120">
								<div class="uk-overlay-panel uk-overlay-background uk-overlay-fade"></div>
								<div class="uk-overlay-panel uk-overlay-icon uk-overlay-fade"></div>
								<a class="uk-position-cover" href="/images/properties/houston/sanfelipeplaza/gallery/amenities/sfp-fitness.jpg" data-lightbox-type="image" data-uk-lightbox="{group:'.wk-1a9d'}"></a>
							</figure>
						</div>
					</div>
				</div>
				<div class="uk-grid-margin uk-row-first">
					<div class="uk-panel" style="min-height: 119px;">
						<div class="uk-panel-teaser">
							<figure class="uk-overlay uk-overlay-hover uk-border-rounded">
								<img src="/media/widgetkit/sfp-starbucks-65fc6991d9d769308c4af156e1ba98bb.jpg" class="uk-overlay-scale" alt="sfp-starbucks" width="120" height="120">
								<div class="uk-overlay-panel uk-overlay-background uk-overlay-fade"></div>
								<div class="uk-overlay-panel uk-overlay-icon uk-overlay-fade"></div>
								<a class="uk-position-cover" href="/images/properties/houston/sanfelipeplaza/gallery/amenities/sfp-starbucks.jpg" data-lightbox-type="image" data-uk-lightbox="{group:'.wk-1a9d'}"></a>
							</figure>
						</div>
					</div>
				</div>
				<div class="uk-grid-margin">
					<div class="uk-panel" style="min-height: 119px;">
						<div class="uk-panel-teaser">
							<figure class="uk-overlay uk-overlay-hover uk-border-rounded">
								<img src="/media/widgetkit/sfp-west-conf-f1ec4021e57de91b3b0d41911ccfbf16.jpg" class="uk-overlay-scale" alt="sfp-west-conf" width="120" height="120">
								<div class="uk-overlay-panel uk-overlay-background uk-overlay-fade"></div>
								<div class="uk-overlay-panel uk-overlay-icon uk-overlay-fade"></div>
								<a class="uk-position-cover" href="/images/properties/houston/sanfelipeplaza/gallery/amenities/sfp-west-conf.jpg" data-lightbox-type="image" data-uk-lightbox="{group:'.wk-1a9d'}"></a>
							</figure>
						</div>
					</div>
				</div>
			</div>

            <script>
            (function($){

                // get the images of the gallery and replace it by a canvas of the same size to fix the problem with overlapping images on load.
                $('img[width][height]:not(.uk-overlay-panel)', $('#wk-grid60c')).each(function() {

                    var $img = $(this);

                    if (this.width == 'auto' || this.height == 'auto' || !$img.is(':visible')) {
                        return;
                    }

                    var $canvas = $('<canvas class="uk-responsive-width"></canvas>').attr({width:$img.attr('width'), height:$img.attr('height')}),
                        img = new Image,
                        release = function() {
                            $canvas.remove();
                            $img.css('display', '');
                            release = function(){};
                        };

                    $img.css('display', 'none').after($canvas);

                    $(img).on('load', function(){ release(); });
                    setTimeout(function(){ release(); }, 1000);

                    img.src = this.src;

                });

            })(jQuery);
            </script>


            <!-- email, print, view map, share functions -->
            <p class="building-links uk-margin-top">
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
                        <tbody>
                            <tr>
                                <td colspan="2">
                                    <strong><?php echo  $building->name; ?></strong>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php echo  $building->address1; ?>
                                    
                                    <?php if( empty($value->address2) ): ?>
                                            
                                            <br />

                                        <?php elseif( isset($value->address2) ): ?>

                                            <br /><?php echo $value->address2 ?><br />

                                        <?php endif; ?>
                                        
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php echo  $building->city; ?>, <?php echo  $building->state; ?> <?php echo  $building->zip; ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>    
                </div>
                <div class="uk-width-small-1-3">
                    <table class="uk-table results-table">
                        <tbody>
                            <tr>
                                <td>No. Floors</td>
                                <td>
                                    <?php echo  $building->number_of_floors; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Typical Floor Size</td>
                                <td>
                                    <?php echo  number_format($building->typical_floor_size, 0, '.', ',')  ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="uk-width-small-1-3">
                    <table class="uk-table results-table">
                        <tbody>
                            <!-- <tr>
                                <td>Rentable Sq. Ft.</td>
                                <td class="uk-text-bold">
                                    <?php echo  $building->rentable_space; ?>
                                </td>
                            </tr> -->
                            <tr>
                                <td>Year Built</td>
                                <td>
                                    <?php echo  $building->year_built; ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="uk-grid">
                <div class="uk-width-1-1">
								<div class="uk-overflow-container">
                    <table  class="uk-table results-table">
                        <tbody>
                            <tr class="results-top">
                                <th>
                                    Suite
                                </th>
                                <th>
                                    Floor
                                </th>
                                <th>
                                    Available Sq. Ft.
                                </th>
                                <th>
                                    Divisible?
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
                                <td><?php echo number_format($value->available_space, 0, '.', ',') ?></td>
                                <td><?php if ($value->divisible == 1){ echo 'Yes'; }else{ echo 'No'; }?></td>
                                <td><?php echo $value->market_rent ?></td>
                                <td><?php echo $this->formatDate($value->date_available) ?></td>
                                
                                <td> 
                                    <?php if (isset($value->pdf) && !empty($value->pdf)):?>
                                        <a href="<?php echo "/media/com_parkway/$value->pdf" ?>" class="uk-icon-file-pdf-o"></a>
                                    <?php endif; ?>
                                </td>
                            </tr>
   
                            <?php endforeach; ?>
                        </tbody>
                    </table>
								</div>
                </div>
            </div>
        </div>
    </div>   
</article>




