<?php

//$this->item = $this->get('Item');

// No direct access
defined('_JEXEC') or die('Restricted access');
 JHtml::_('behavior.formvalidator');
//print_r($this->item);

 
 
?>

    <img src = "<?php echo "/media/com_parkway/".$this->item->id."/".$this->item->image ?>">
    

    
    
<form action="<?php echo JRoute::_('index.php?option=com_parkway&view=building&layout=edit&id=' . (int) $this->item->id); ?>"
    method="post" name="adminForm" id="adminForm" class="form-validate" enctype="multipart/form-data" >
    <div class="form-horizontal">
        <fieldset class="adminform">
            <legend><?php echo JText::_('COM_PARKWAY_BUILDING_DETAILS'); ?></legend>
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
    <input type="hidden" name="task" value="building.add" />
    <?php echo JHtml::_('form.token'); ?>
</form>
