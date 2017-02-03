<?php
// No direct access
 defined('_JEXEC') or die('Restricted access');
 
 // Load tooltip behavior
 JHtml::_('behavior.tooltip');
 $listOrder	= $this->escape($this->state->get('list.ordering'));
 $listDirn	= $this->escape($this->state->get('list.direction'));
 
 $function = JFactory::getApplication()->input->getCmd('function', 'jSelectBook');
?>
<form action="<?php echo $this->action; ?>" method="post" name="adminForm" id="adminForm">
<?php echo JLayoutHelper::render('joomla.searchtools.default', array('view' => $this)); ?> 
    <table class="adminlist table table-striped">
    <thead>
        <tr>
            <th>
                <?php echo JHtml::_('grid.sort', 'COM_PARKWAY_FLOORPLANS_HEADING_TITLE', 'title', $listDirn, $listOrder); ?>
            </th>
            <th>
                <?php echo JHtml::_('grid.sort', 'COM_PARKWAY_FLOORPLANS_HEADING_BUILDINGNAME', 'building_name', $listDirn, $listOrder); ?>
            </th>
            <th>
                <?php echo JHtml::_('grid.sort', 'COM_PARKWAY_FLOORPLANS_HEADING_PROPERTYNAME', 'property_name', $listDirn, $listOrder); ?>
            </th>
            
            <th width="5">
                <?php echo JHtml::_('grid.sort', 'COM_PARKWAY_FLOORPLANS_HEADING_ID', 'id', $listDirn, $listOrder); ?>
            </th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <td colspan="6"><?php echo $this->pagination->getListFooter(); ?></td>
        </tr>
    </tfoot>
    <tbody>
<?php foreach ($this->items as $i => $item) : ?>
        <tr class="row<?php echo $i % 2; ?>">
            <td>
                <a class="pointer" onclick="if (window.parent) window.parent.<?php echo $this->escape($function);?>('<?php echo $item->id; ?>', '<?php echo $this->escape(addslashes($item->title)); ?>');"><?php echo $this->escape($item->title); ?></a>
            </td>
            
            <td align="right"><?php echo $item->building_name; ?></td>
            <td align="right"><?php echo $item->property_name; ?></td>
            
            <td><?php echo $item->id; ?></td>
        </tr>
<?php endforeach; ?>
    </tbody>
</table>
<div>
    <input type="hidden" name="task" value="" />
    <input type="hidden" name="boxchecked" value="0" />
    <input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
    <input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" />
    <?php echo JHtml::_('form.token'); ?>
</div>
</form>

