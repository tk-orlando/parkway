<?php

?>

Find your Space


<?php foreach ($this->items as $key => $value): ?>

<div>
    <?php if( isset($value->image) && !empty($value->image) ): ?>
        
        <img src="<?php echo '/media/com_parkway/'.$value->id.'/' . $value->image ?>">
    <?php endif; ?>
        <?php $value->name?>
        <div>
            <?php echo $value->address1 ?> <?php echo $value->address2 ?> <?php echo $value->city?> <?php echo $value->state?> <?php echo $value->zip?>
       
        </div>
             <br>
        <?php $this->items->typical_floor_size?><br>
        <a href="index.php?option=com_parkway&view=vacancies&bid=">View All Listings</a>
        <br>Interactive Floor Plan
</div>



<?php endforeach; ?>



