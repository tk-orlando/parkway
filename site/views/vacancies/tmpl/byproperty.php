<?php
// No direct access
defined('_JEXEC') or die('Restricted access');

$building = $this->getBuildingProfile();
        
  
?>

{Building Profile here}<br><br>

<table border="1">
    <tr>
        <th>
            Suite Number
        </th>
        <th>
            Floor Number
        </th>
        <th>
            Available Sq. Ft.
        </th>
        <th>
            Divisible
        </th>
        <th>
            Market Rent
        </th>
        <th>
            Date Available
        </th>
        <th>
            PDF
        </th>
    </tr>

    <?php foreach ($this->items as $key => $value): ?>

        <tr>
            <td><?php echo $value->suite ?></td>
            <td><?php echo $value->floor ?></td>
            <td><?php echo $value->available_space ?></td>
            <td><?php echo $value->divisible ?></td>
            <td><?php echo $value->market_rent ?></td>
            <td><?php echo $this->formatDate($value->date_available) ?></td>
            
            <td> 
                <?php if (isset($value->pdf) && !empty($value->pdf)):?>
                    <?php echo $value->pdf ?>
                <?php endif; ?>
            </td>
        </tr>

        
    <?php endforeach; ?>

</table>




