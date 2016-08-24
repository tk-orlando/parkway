<?php
defined('_JEXEC') or die;



$this->items = $this->get('Items');


?>
<form action="<?php echo JRoute::_('index.php?option=com_parkway&view=vacancies&id=' . (int) $this->item->id); ?>"
      method="post" name="adminForm" id="adminForm">

    



    <table class="table table-striped" >
            <tr>
                <th>
                    
                </th>
                <th>
                    ID
                </th>
                <th>
                    Building
                </th>
                
                <th>
                    Floor
                </th>
                <th>
                    Suite
                </th>
            </tr>
        <?php  foreach ($this->items as $key => $value): ?>
            
        
            <tr>
                <td><input id="cb0" name="cid[]" value="<?php echo $value->id ?>" onclick="Joomla.isChecked(this.checked);" type="checkbox"></td>
                <td><div ><a href="index.php?option=com_parkway&view=vacancy&layout=edit&id=<?php echo $value->id  ?>"><?php echo $value->id ?></a></div></td>
                <td><div ><?php echo $value->building_name ?></div></td>
                
                <td><div ><?php echo $value->floor ?></div></td>
                <td><div ><?php echo $value->suite ?></div></td>
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

