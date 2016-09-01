<?php


defined('_JEXEC') or die;



$this->items = $this->get('Items');


?>
<div id="j-sidebar-container" class="span2">
    <?php echo $this->sidebar; ?>
</div>
<div id="j-main-container" class="span10">


<form action="<?php echo JRoute::_('index.php?option=com_parkway&view=suiteplans&id=' . (int) $this->item->id); ?>"
      method="post" name="adminForm" id="adminForm">

    



    <table class="table table-striped" >
        
        <tr>
            <th></th>
            
            <th>Suite Title</th>
            <th>Building</th>
            <th>Floor</th>
            
            <th>ID</th>
            
        </tr>
        
    
        <?php  foreach ($this->items as $key => $value): ?>
            <tr>
                <td><input id="cb0" name="cid[]" value="<?php echo $value->id ?>" onclick="Joomla.isChecked(this.checked);" type="checkbox"></td>
                
                <td><a href="index.php?option=com_parkway&view=suiteplan&layout=edit&id=<?php echo $value->id  ?>"><?php echo $value->title ?></a></td>
                <td><?php echo $this->getBuildingName($value->floorplan_id) ?></td>
                <td><?php echo $value->floor_title ?></td>
                
                <td><?php echo $value->id ?></td>
            </tr>
        <?php endforeach; ?>
    
    </table>

    <input type="hidden" name="view" value="suiteplans" />
    <input type="hidden" name="task" value="" />
    <input type="hidden" name="option" value="<?php echo JRequest::getVar( 'option' );?>"/>
       
       <input type="hidden" name="boxchecked" value="0"/>   
       <input type="hidden" name="hidemainmenu" value="0"/> 
    <?php echo JHtml::_('form.token'); ?>
</form>

</div>

