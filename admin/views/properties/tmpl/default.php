<?php

defined('_JEXEC') or die;



$this->items = $this->get('Items');


?>
<form action="<?php echo JRoute::_('index.php?option=com_parkway&view=properties&id=' . (int) $this->item->id); ?>"
      method="post" name="adminForm" id="adminForm">

    



    <table>
    
        <?php  foreach ($this->items as $key => $value): ?>
            <tr>
                <td><input id="cb0" name="cid[]" value="<?php echo $value->id ?>" onclick="Joomla.isChecked(this.checked);" type="checkbox"></td>
                <td><a href="index.php?option=com_parkway&view=property&layout=edit&id=<?php echo $value->id  ?>"><?php echo $value->name ?></a></td>
            </tr>
        <?php endforeach; ?>
    
    </table>

    <input type="hidden" name="view" value="properties" />
    <input type="hidden" name="task" value="" />
    <input type="hidden" name="option" value="<?php echo JRequest::getVar( 'option' );?>"/>
       
       <input type="hidden" name="boxchecked" value="0"/>   
       <input type="hidden" name="hidemainmenu" value="0"/> 
    <?php echo JHtml::_('form.token'); ?>
</form>