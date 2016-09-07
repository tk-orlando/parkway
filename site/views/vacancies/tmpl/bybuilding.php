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
            
            <div id="wk-grid60c" class="uk-grid-width-1-2 uk-grid uk-grid-match uk-grid-medium " data-uk-grid-match="{target:'> div > .uk-panel', row:true}" data-uk-grid-margin="">
                <div class="uk-row-first">
                    <div style="min-height: 119px;" class="uk-panel">
                        <div class="uk-panel-teaser">
                            <figure class="uk-overlay uk-overlay-hover ">
                                <img style="" src="/media/widgetkit/cwp-01-ent-drive-c283a0fdacfb8c150b551b42162950c6.jpg" class="uk-overlay-scale" alt="cwp-01-ent-drive" height="120" width="120">
                                <div class="uk-overlay-panel uk-overlay-background uk-overlay-fade"></div>
                                <div class="uk-overlay-panel uk-overlay-icon uk-overlay-fade"></div>
                                <a class="uk-position-cover" href="/images/properties/houston/citywestplace/gallery/bldg-01/cwp-01-ent-drive.jpg" data-lightbox-type="image" data-uk-lightbox="{group:'.wk-160c'}"></a>
                            </figure>
                        </div>
                    </div>
                </div>
                   
                <div>
                    <div style="min-height: 119px;" class="uk-panel">
                        <div class="uk-panel-teaser">
                            <figure class="uk-overlay uk-overlay-hover ">
                                <img style="" src="/media/widgetkit/cwp-01-ent-dusk-18829d14a8a525381c836416798b4c43.jpg" class="uk-overlay-scale" alt="cwp-01-ent-dusk" height="120" width="120">
                                <div class="uk-overlay-panel uk-overlay-background uk-overlay-fade"></div>
                                <div class="uk-overlay-panel uk-overlay-icon uk-overlay-fade"></div>
                                <a class="uk-position-cover" href="/images/properties/houston/citywestplace/gallery/bldg-01/cwp-01-ent-dusk.jpg" data-lightbox-type="image" data-uk-lightbox="{group:'.wk-160c'}"></a>
                            </figure>
                        </div>
                    </div>
                </div>
                     
                <div class="uk-grid-margin uk-row-first">
                    <div style="min-height: 119px;" class="uk-panel">
                        <div class="uk-panel-teaser">
                            <figure class="uk-overlay uk-overlay-hover ">
                                <img style="" src="/media/widgetkit/cwp-01-escalators-266a22a53011107eeb9a5be89a030196.jpg" class="uk-overlay-scale" alt="cwp-01-escalators" height="120" width="120">
                                <div class="uk-overlay-panel uk-overlay-background uk-overlay-fade"></div>
                                <div class="uk-overlay-panel uk-overlay-icon uk-overlay-fade"></div>
                                <a class="uk-position-cover" href="/images/properties/houston/citywestplace/gallery/bldg-01/cwp-01-escalators.jpg" data-lightbox-type="image" data-uk-lightbox="{group:'.wk-160c'}"></a>
                            </figure>
                        </div>
                    </div>
                </div>

                <div class="uk-grid-margin">
                    <div style="min-height: 119px;" class="uk-panel">
                        <div class="uk-panel-teaser">
                            <figure class="uk-overlay uk-overlay-hover ">
                                <img style="" src="/media/widgetkit/cwp-01-fountain-269071c2584991438c46ac16dc1e0c73.jpg" class="uk-overlay-scale" alt="cwp-01-fountain" height="120" width="120">
                                <div class="uk-overlay-panel uk-overlay-background uk-overlay-fade"></div>
                                <div class="uk-overlay-panel uk-overlay-icon uk-overlay-fade"></div>
                                <a class="uk-position-cover" href="/images/properties/houston/citywestplace/gallery/bldg-01/cwp-01-fountain.jpg" data-lightbox-type="image" data-uk-lightbox="{group:'.wk-160c'}"></a>                                  
                            </figure>
                        </div>
                    </div>
                </div>
                   
                <div class="uk-grid-margin uk-row-first">
                    <div class="uk-panel">
                        <div class="uk-panel-teaser">
                            <figure class="uk-overlay uk-overlay-hover ">
                                <img style="" src="/media/widgetkit/cwp-01-lobby-56f7fbf71a5b3b449050b1adf2beb1de.jpg" class="uk-overlay-scale" alt="cwp-01-lobby" height="120" width="120">
                                <div class="uk-overlay-panel uk-overlay-background uk-overlay-fade"></div>
                                <div class="uk-overlay-panel uk-overlay-icon uk-overlay-fade"></div>
                                <a class="uk-position-cover" href="/images/properties/houston/citywestplace/gallery/bldg-01/cwp-01-lobby.jpg" data-lightbox-type="image" data-uk-lightbox="{group:'.wk-160c'}"></a>
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
                                    <?php echo  $building->typical_floor_size; ?>
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
                                <td><?php echo $value->available_space ?></td>
                                <td><?php echo $value->divisible ?></td>
                                <td><?php echo $value->market_rent ?></td>
                                <td><?php echo $this->formatDate($value->date_available) ?></td>
                                
                                <td> 
                                    <?php if (isset($value->pdf) && !empty($value->pdf)):?>
                                        <a href="<?php echo "/media/com_parkway/$value->building_id/$value->pdf" ?>" class="uk-icon-file-pdf-o"></a>
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
</article>



















