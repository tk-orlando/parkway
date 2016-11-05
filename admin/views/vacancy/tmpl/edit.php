<?php

//$this->item = $this->get('Item');

// No direct access
defined('_JEXEC') or die('Restricted access');
 
//print_r($this->item);
JHtml::_('behavior.formvalidator');
?>



<form action="<?php echo JRoute::_('index.php?option=com_parkway&view=vacancy&layout=edit&id=' . (int) $this->item->id); ?>"
    method="post" name="adminForm" id="adminForm" class="form-validate" enctype="multipart/form-data">
    <div class="form-horizontal">
        <fieldset class="adminform">
            <legend><?php echo JText::_('COM_PARKWAY_VACANCY_DETAILS'); ?></legend>
                <?php if (isset($this->item->image) &&  !empty($this->item->image)): ?>
                    <div class="control-group">
                        <img src="<?php echo JURI::root(true).'/media/com_parkway/'.$this->item->image ?>" >
                        <?php JToolbarHelper::custom('vacancy.deleteImage', 'delete', 'delete', 'Delete Image', false); ?>
                    </div>
                <?php endif;?>
                    
            <div class="row-fluid">
                <div class="span6">
                    <?php foreach ($this->form->getFieldset() as $field): ?>
                    
                        <div class="control-group">
                            <div class="control-label"><?php echo $field->label; ?></div>
                            <div class="controls"><?php echo $field->input; ?></div>
                        </div>
                    <?php endforeach; ?>
                <?php if (isset($this->item->pdf ) && !empty($this->item->pdf )): ?><div> 
                    <div class="control-group">
                        <div class="control-label"><a target="_blank" href="<?php echo JURI::root(true).'/media/com_parkway/'.$this->item->pdf ?>" ><img width="50px" src="<?php echo JURI::root(true).'/administrator/components/com_parkway/images/adobe-27964_640.png'; ?>"></a></div>
                        <?php JToolbarHelper::custom('vacancy.deletePDF', 'delete', 'delete', 'Delete PDF', false); ?>
                    </div>
                <?php endif;?>
                </div>
            </div>
        </fieldset>
    </div>
    <input type="hidden" name="task" value="vacancy.add" />
    <?php echo JHtml::_('form.token'); ?>
</form>
