<?php
// No direct access
defined('_JEXEC') or die('Restricted access');

$building = $this->getBuildingProfile();

$jinput = JFactory::getApplication()->input;
$Itemid = $jinput->getInt('Itemid');

if ($building->widgetkit_id > 0){
    $widget = JHtmlContent::prepare(' [widgetkit id="'.$building->widgetkit_id.'"]');
}else{
    $widget = '';
}

$count= count((array)$this->items);

?>


<article class="uk-article" data-permalink="/index.php/building-details-list">  
    <h1 class="uk-article-title"> Building Details </h1>
    <div class="uk-grid">
        <div class="uk-width-medium-1-4">
            <a href="<?php echo JRoute::_( "index.php?option=com_parkway&view=floorplan&building=" . $building->id ."&planid=&Itemid=$Itemid") ?>?" class="uk-button uk-margin-bottom" style="width:100%;">View Floor Plans</a>
            <!-- //var buildingDetailGallery from widgetkit -->
            <?php echo $widget; ?>
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
                                <td>
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
            
            
            
            
            <?php if ($count > 0):?>
            
                <?php include('bybuildinginc.php')?>
            <?php else: ?>
            <br>Sorry, there are no matches to your search. Here are a few vacancies that may interest you:<br><br><br>
            
            <?php $session = JFactory::getSession();
                if ($session->get( 'max')){
                    
                    $session->set( 'max', 999999) ;
                } ?>
            <?php endif;?>
        
        
        
        
        
        
        
        
        </div>
    </div>   



</article>

<script type="text/javascript" src="//static.addtoany.com/menu/page.js"></script>

















