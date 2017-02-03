<?php

//$this->item = $this->get('Item');

// No direct access
defined('_JEXEC') or die('Restricted access');
 
//print_r($this->item);
JHtml::_('behavior.formvalidator');

if (isset($this->item->image) && !empty($this->item->image)){
    
    JToolbarHelper::custom('floorplan.deleteImage', 'delete', 'delete', 'Delete Image', false);
}

?>

<?php if (isset($this->item->image) && !empty($this->item->image)): ?>
    <div><img src = "<?php echo "/media/com_parkway/".$this->item->image ?>"></div>
    
<?php endif; ?>
<form action="<?php echo JRoute::_('index.php?option=com_parkway&view=floorplan&layout=edit&id=' . (int) $this->item->id); ?>"
    method="post" name="adminForm" id="adminForm" class="form-validate"  enctype="multipart/form-data" >
    <div class="form-horizontal">
        <fieldset class="adminform">
            <legend><?php echo JText::_('COM_PARKWAY_FLOORPLAN_DETAILS'); ?></legend>
            <div class="row-fluid">
                <div class="span6">
                    <?php foreach ($this->form->getFieldset() as $field): ?>
                        <div class="control-group">
                            <div class="control-label"><?php echo $field->label; ?></div>
                            <div class="controls"><?php echo $field->input; ?></div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </fieldset>
    </div>
    <input type="hidden" name="task" value="floorplan.add" />
    <?php echo JHtml::_('form.token'); ?>
</form>
