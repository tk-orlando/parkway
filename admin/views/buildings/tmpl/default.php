<?php
defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');

JHtml::_('bootstrap.tooltip');
JHtml::_('behavior.multiselect');
JHtml::_('behavior.formvalidator');
JHtml::_('formbehavior.chosen', 'select');

$app       = JFactory::getApplication();
$user      = JFactory::getUser();
$userId    = $user->get('id');
$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn  = $this->escape($this->state->get('list.direction'));
$archived  = $this->state->get('filter.published') == 2 ? true : false;
$trashed   = $this->state->get('filter.published') == -2 ? true : false;
$canOrder  = $user->authorise('core.edit.state', 'com_parkway.buildings');
$saveOrder = $listOrder == 'a.ordering';

$this->items = $this->get('Items');


?>
<div id="j-sidebar-container" class="span2">
    <?php echo $this->sidebar; ?>
</div>
<div id="j-main-container" class="span10">


<form action="<?php echo JRoute::_('index.php?option=com_parkway&view=buildings&id=' . (int) $this->items->id); ?>"
      method="post" name="adminForm" id="adminForm">

    
<?php echo JLayoutHelper::render('joomla.searchtools.default', array('view' => $this)); ?>  


    <table class="table table-striped" >
        
        <tr>
            <th></th>
            <th>Name</th>
						<th>Property</th>
            <th>Address</th>
						<th>Number of Floors</th>
            <th>Parking Ratio</th>
            <th>Typical Floor Size (Sq.Ft.)</th>
            <th>ID</th>
            
        </tr>
        
    
        <?php  foreach ($this->items as $key => $value): ?>
            <tr>
                <td><input id="cb0" name="cid[]" value="<?php echo $value->id ?>" onclick="Joomla.isChecked(this.checked);" type="checkbox"></td>
                <td><a href="index.php?option=com_parkway&view=building&layout=edit&id=<?php echo $value->id  ?>"><?php echo $value->building_name ?></a></td>
								<td><?php echo $value->property_name ?></td>
                <td><?php echo $value->address1 ?> <?php echo $value->address2 ?><?php echo $value->city ?> <?php echo $value->state ?> <?php echo $value->zip ?></td>
                <td><?php echo $value->number_of_floors ?></td>
								<td><?php echo $value->parking_ratio ?></td>
                <td><?php echo $value->typical_floor_size ?></td>
                <td><?php echo $value->id ?></td>
            </tr>
        <?php endforeach; ?>
    
    </table>

    <input type="hidden" name="view" value="buildings" />
    <input type="hidden" name="task" value="" />
    <input type="hidden" name="option" value="<?php echo JRequest::getVar( 'option' );?>"/>
       
       <input type="hidden" name="boxchecked" value="0"/>   
       <input type="hidden" name="hidemainmenu" value="0"/> 
    <?php echo JHtml::_('form.token'); ?>
</form>

</div>