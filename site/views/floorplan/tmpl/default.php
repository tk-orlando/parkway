<?php
// No direct access
defined('_JEXEC') or die('Restricted access');

//JFactory::getDocument()->addStyleSheet(JURI::root().'/tmpl/default.css');
//JHtml::script(JURI::base() . '/tmpl/jquery-ui-1.10.3.custom.js');
//JHtml::_('bootstrap.framework');
//JHtml::_('jquery.framework',true, true); // load jquery
//JHtml::_('jquery.ui'); // load jquery ui
JFactory::getDocument()->addScript('https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js');
//JFactory::getDocument()->addScript(JURI::root().'components/com_parkway/js/jquery.imagemapster.js');

$floorPlan = $this->getFloorplan(); 


$suitePlan = $this->getVacancy();


//get image dimensions for SVG display
$floorplanImageSize = getImagesize( JPATH_BASE.'/'.$floorPlan->image);
$buildingImageSize = getImagesize( JPATH_BASE.'/media/com_parkway/' . $this->items->image );

$buildingTooltips = $this->getTooltips($type = 'building');
$floorplanTooltips = $this->getTooltips($type = 'floorplan') ;  

$jinput = JFactory::getApplication()->input;
$Itemid = $jinput->getInt('Itemid');
$building = $jinput->getInt('building');


?>

<script type="text/javascript">
    
    
$(document).ready(function() {
  $().click(showSuitePlan('<?php echo $suitePlan{0}->alias ?>'));
});
$(document).ready(function() {
  $().click(showSuiteOverlay('<?php echo $suitePlan{0}->alias ?>'));
});
    function showSuite(thechosenone){
        showSuitePlan(thechosenone);
        showSuiteOverlay(thechosenone);
        
    }
    
    function showSuitePlan(thechosenone) {

       $('.uk-width-large-2-3').each(function(index) {

             if ($(this).attr("id") == thechosenone) {

                   $(this).show();

              }else {

                   $(this).hide();

              }

         });

    } 
   function showSuiteOverlay(thechosenone) {

       $('.polygon').each(function(index) {

             if ($(this).attr("id") == thechosenone) {

                $(this).attr("class", "polygon polygondefault");        
                

              }else {

                    $(this).attr("class", "polygon");      
              }

         });

    }  
    

</script>   

<h2 id="buildingTitleHeader"><?php echo $this->getBuildingName(); ?></h2>
<p class="results-links"><a class="uk-button" href="index.php?option=com_parkway&view=vacancies&layout=bybuilding&filter_building=<?php echo $building ?>&Itemid=<?php echo $Itemid ?>">View Building Listings</a></p>
<div class="uk-grid">
    <div class="uk-width-large-1-3 uk-margin-bottom image-container">
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 <?php echo $floorplanImageSize[0]?> <?php echo $floorplanImageSize[1]?>" preserveAspectRatio="xMinYMin meet" >    
        <image width="100%" height="100%" xlink:href="<?php echo $floorPlan->image ; ?>"></image>
        <?php echo $this->parseFloorplanMap($floorPlan->map, $floorplanTooltips) ; ?>
        </svg>
        <?php if( isset($this->items->image) && !empty($this->items->image) ): ?>
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 <?php echo $buildingImageSize[0]?> <?php echo $buildingImageSize[1]?>" preserveAspectRatio="xMinYMin meet" >
                <image id="building"  width="100%" height="100%" xlink:href="<?php echo '/media/com_parkway/' . $this->items->image ?>" ></image>
                    <?php echo $this->parseBuildingMap($this->items->coordinates,$buildingTooltips ) ; ?>
        </svg>  
        <div>Please hover or tap on the highlighted floors to view available space</div>
        
        <?php else: ?>
            
            <img class="results-thumb" src="/components/com_parkway/images/thumb-placeholder.jpg" alt="placeholder">
                        
        <?php endif; ?>
    </div>
    
 <?php foreach($suitePlan as $key=>$value): ?>
    
    <div id="<?php echo $value->alias ;?>" class="uk-width-large-2-3 newboxes">
        <h4>Space Summary</h4>
        <div class="uk-grid uk-margin-bottom">
            <div class="uk-width-small-1-2">
                <table class="uk-table profile-table">
                    <tr>
                        <td>Suite Number</td>
                        <td class="uk-text-bold">
                            <!-- var suiteNumber -->
                            <?php echo $value->suite ;?>
                        </td>
                    </tr>
                    <tr>
                        <td>Floor</td>
                        <td class="uk-text-bold">
                            <!-- var floorNum -->
                            <?php echo $value->floor_level ;?>
                        </td>
                    </tr>
                    <tr>
                        <td>Available Sq. Ft.</td>
                        <td class="uk-text-bold">
                            <!-- var availSqFt -->
                            <?php echo number_format($value->available_space) ;?>
                        </td>
                    </tr>
                    <tr>
                        <td>Divisible</td>
                        <td class="uk-text-bold">
                            <!-- Bool divisible -->
                            <?php 
                                                        if ($value->divisible = 1){
                                                            echo 'Yes';
                                                        }else{
                                                            echo 'No';
                                                        }
                                                         ;?>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="uk-width-small-1-2">
                <table class="uk-table profile-table">
                    <tr>
                        <td>Market Rent</td>
                        <td class="uk-text-bold">
                            <!-- var marketRent -->
                            $<?php echo $value->market_rent ;?>
                        </td>
                    </tr>
                    <tr>
                        <td>Date Available</td>
                        <td class="uk-text-bold">
                            <!-- var dateAvailable -->
                            <?php echo $this->formatDate($value->date_available) ;?>
                        </td>
                    </tr>
                    <tr>
                        <td>PDF</td>
                        <td>
                            <?php if (isset($value->pdf) && !empty($value->pdf)):?>
                                <a href="<?php echo "/media/com_parkway/$value->pdf" ?>" class="uk-icon-file-pdf-o" target="_blank"></a>
                            <?php endif; ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <!-- site plan -->
        <img class="suiteplan" alt="suiteplan" src="/media/com_parkway/<?php  echo $value->image ?>">
    </div>
    
    
    <?php endforeach;?>
    
</div>



