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
$canOrder  = $user->authorise('core.edit.state', 'com_parkway.vacancies');
$saveOrder = $listOrder == 'a.ordering';

$this->items = $this->get('Items');


?>

<div id="j-sidebar-container" class="span2">
    <?php echo $this->sidebar; ?>
</div>
<div id="j-main-container" class="span10">
    
  
<form action="<?php echo JRoute::_('index.php?option=com_parkway&view=vacancies&id=' . (int) $this->items->id); ?>"
      method="post" name="adminForm" id="adminForm" class="form-validate">   
    
  <?php echo JLayoutHelper::render('joomla.searchtools.default', array('view' => $this)); ?>  
   
<table class="table table-striped" >
            <tr>
                <th>
                    
                </th>
                
                <th>
                    Building
                </th>
                <th>
										Property
								</th>
                <th>
                    Floor
                </th>
                <th>
                    Suite
                </th>
                <th>
                    Available Space (Sq.Ft.)
                </th>
                <th>
                    PDF
                </th>
                <th>
                    ID
                </th>
            </tr>
        <?php  foreach ($this->items as $key => $value): ?>
            
        
            <tr>
                <td><input id="cb0" name="cid[]" value="<?php echo $value->id ?>" onclick="Joomla.isChecked(this.checked);" type="checkbox"></td>
                
                
                <td><div ><a href="index.php?option=com_parkway&view=vacancy&layout=edit&id=<?php echo $value->id  ?>"><?php echo $value->building_name ?></a></div></td>
                <td><div><?php echo $value->property_name ?></div></td>
                <td><div ><?php echo $value->floor_level ?></div></td>
                <td><div ><?php echo $value->suite ?></div></td>
                <td><div ><?php echo $value->available_space ?></div></td>
                <td><div ><?php if (!empty($value->pdf)): ?>
                        <img width="20px" height="10px" src="/administrator/components/com_parkway/images/adobe-27964_640.png">
                        
                        <?php endif; ?>
                    </div></td>
                <td><?php echo $value->id ?></td>
            </tr>
        <?php endforeach; ?>
    
    </table>
    
    <input type="hidden" name="view" value="vacancies" />
    <input type="hidden" name="task" value="" />
    <input type="hidden" name="option" value="<?php echo JRequest::getVar( 'option' );?>"/>
       
       <input type="hidden" name="boxchecked" value="0"/>   
       <input type="hidden" name="hidemainmenu" value="0"/> 
    <?php echo JHtml::_('form.token'); ?>
       </form>

</div>