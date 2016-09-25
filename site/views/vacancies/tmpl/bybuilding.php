<?php
// No direct access
defined('_JEXEC') or die('Restricted access');

$building = $this->getBuildingProfile();

$jinput = JFactory::getApplication()->input;
$Itemid = $jinput->getInt('Itemid');
    
?>


<article class="uk-article" data-permalink="http://joomla.tko-orlando.com/index.php/building-details-list">  
    <h1 class="uk-article-title"> Building Details </h1>
    <div class="uk-grid">
        <div class="uk-width-medium-1-4">
            <a href="<?php echo "http://joomla.tko-orlando.com/index.php?option=com_parkway&view=floorplan&building=" . $building->id . "&Itemid=" . $Itemid ?>" class="uk-button uk-margin-bottom" style="width:100%;">View Floor Plans</a>
            <!-- var buildingDetailGallery from widgetkit -->
            
            <?php echo JHTML::_('content.prepare', '{loadposition building-gallery}');?>

            <!-- email, print, view map, share functions -->
            <ul class="building-links uk-margin-top">
								<li><span style="cursor:pointer;" title="Print This Page" onclick="javascript:window.print()">Print Page</span></li>
								<li><a class="a2a_dd" href="https://www.addtoany.com/share">Share</a></li>
            </ul>
        </div>
        <div class="uk-width-medium-3-4">
            <div class="uk-grid">
                <div class="uk-width-small-1-3">
                    <table class="uk-table profile-table">
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
                    <table class="uk-table profile-table">
                        <tbody>
                            <tr>
                                <td>No. Floors</td>
                                <td>
                                    <strong><?php echo  $building->number_of_floors; ?></strong>
                                </td>
                            </tr>
                            <tr>
                                <td>Typical Floor Size</td>
                                <td>
                                    <strong><?php echo  number_format($building->typical_floor_size, 0, '.', ',')  ?></strong>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="uk-width-small-1-3">
                    <table class="uk-table profile-table">
                        <tbody>
                            <!-- <tr>
                                <td>Rentable Sq. Ft.</td>
                                <td class="uk-text-bold">
                                    <?php echo  $building->rentable_space; ?>
                                </td>
                            </tr> -->
                            <tr>
                                <td>Parking</td>
                                <td>
                                    <strong><?php echo  $building->parking_ratio; ?></strong>
                                </td>
                            </tr>
														
														<?php if( isset($building->fact_sheet) && !empty($building->fact_sheet) ): ?>
														
															<tr>
																<td>Fact Sheet</td>
																<td><a class="uk-icon-file-pdf-o" href="<?php echo '/media/com_parkway/' . $building->fact_sheet ?>"></td>
															</tr>
														
														<?php endif; ?>
														
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
                                <!--<th>
                                    PDF
                                </th>-->
                            </tr>

                            <?php foreach ($this->items as $key => $value): ?>

                            <tr>
                                <td><?php echo $value->suite ?></td>
                                <td><?php echo $value->floor_level ?></td>
                                <td><?php echo number_format($value->available_space, 0, '.', ',') ?></td>
                                <td><?php if ($value->divisible == 1){ echo 'Yes'; }else{ echo 'No'; }?></td>
                                <td><?php echo '$'.$value->market_rent.' sq/ft' ?></td>
                                <td><?php echo $this->formatDate($value->date_available) ?></td>
                                
                                <!--<td> 
                                    <?php if (isset($value->pdf) && !empty($value->pdf)):?>
                                        <a href="<?php echo "/media/com_parkway/$value->pdf" ?>" class="uk-icon-file-pdf-o"></a>
                                    <?php endif; ?>
                                </td>-->
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

<script type="text/javascript" src="//static.addtoany.com/menu/page.js"></script>

















