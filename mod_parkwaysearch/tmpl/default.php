<?php
// No direct access
defined('_JEXEC') or die;
$jinput = JFactory::getApplication()->input;
$Itemid = $jinput->getInt('Itemid');
//echo "itemid is $Itemid";
?>

<div class="uk-panel find-space-mod">
    <h3 class="uk-panel-title">Find Your Space</h3>
    <form id="parkway-search-form" method="post"
          action="<?php echo JRoute::_('index.php?option=com_parkway&view=buildings&layout=byproperty&Itemid=265'); ?>">
        <select name="filter_property"
                onchange="updateItemId(this.options[this.selectedIndex].getAttribute('attr-url'))">
            <option selected="" disabled="">Property</option>
            <?php foreach ($properties as $property) { ?>
                <option attr-url="<?php echo $property->path ?>" attr-item-id="<?php echo $property->item_id ?>"
                        value="<?php echo $property->id ?>"><?php echo $property->name ?></option>
            <?php } ?>
        </select>
        <select name="filter[space][max]">
            <option selected="" disabled="">Max SqFt</option>
            <option value="5000">5,000</option>
            <option value="10000">10,000</option>
            <option value="25000">25,000</option>
            <option value="50000">50,000</option>
            <option value="100000">100,000</option>
        </select>
        <button type="submit" class="uk-button">Search Now</button>
    </form>
</div>
<script>
    function updateItemId(url) {
        console.log(url);
        jQuery('#parkway-search-form').attr('action','/'+url+'/buildings/byproperty/')
    }
</script>