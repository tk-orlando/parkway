<?php

$max = 9999999;

if (isset($this->state->{'filter.space'}['max']) && !empty($this->state->{'filter.space'}['max'])) {
    //Filter by max space.
    $max = (int)$this->state->{'filter.space'}['max'];
    $session = JFactory::getSession();
    $session->set('max', $max);
}

$mycount = 0;
$buildingcount = 0;
$jinput = JFactory::getApplication()->input;
$Itemid = $jinput->getInt('Itemid');
$buildingcount = count($this->items);


?>

<article class="uk-article">
    <?php echo '<h1 class="uk-article-title"> Building List </h1>' ?>

    <?php if ($buildingcount > 0): ?>
        <?php foreach ($this->items as $key => $value): ?>
            <?php include('buildinginclude.php'); ?>
        <?php endforeach; ?>
    <?php else:
        //check vacancy in larger amount
        $this->state->{'filter.space'}['max'] = 9999999;
        $this->items = $this->get('AllVacancies');
        if (count($this->items) > 0): ?>
            There are no vacancy matching your search for max sqft: <?php echo  $session->get('max');?>.  Here are a few suggestions that may interest you:<br><br><br>

            <?php foreach ($this->items as $key => $value): ?>
            <?php include('buildinginclude.php'); ?>
        <?php endforeach; ?>
        <?php else:?>
            There are no vacancies in this building. Try searching another property:
           <?php
            $position = 'top-a';
            $modules =& JModuleHelper::getModules($position);
            foreach ($modules as $module) {
                echo JModuleHelper::renderModule($module);
            }
            ?>
        <?php endif; ?>
    <?php endif; ?>
</article>
