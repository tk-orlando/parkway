<?php
// No direct access
defined('_JEXEC') or die; ?>

<div class="uk-panel find-space-mod">
    <h3 class="uk-panel-title">Find Your Space</h3>
    <form method="post"
          action="<?php echo JRoute::_('index.php?option=com_parkway&view=buildings&layout=byproperty'); ?>">
        <select name="filter_property">
            <option selected="" disabled="">Property</option>
            <?php foreach ($properties as $property) { ?>
                <option value="<?php echo $property->id ?>"><?php echo $property->name ?></option>
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
        <input name="Itemid" type="hidden" value="599">
    </form>
</div>
