<?php if( $mycount % 2 == 0 ): ?>
            <div class="uk-grid">
<?php endif; ?>

                <div class="uk-width-small-1-2">
                        <div class="uk-grid">
                                <div class="uk-width-medium-1-2">


            <?php if( isset($value->imagethumb) && !empty($value->imagethumb) ): ?>

                                                <img class="results-thumb" src="<?php echo '/media/com_parkway/' . $value->imagethumb ?>" alt="<?php echo $value->imagethumb ?>">				
             <?php elseif( isset($value->image) && !empty($value->image) ): ?>

                                                <img class="results-thumb" src="<?php echo '/media/com_parkway/' . $value->image ?>" alt="<?php echo $value->image ?>">
            <?php else: ?>

                                                <img class="results-thumb" src="/components/com_parkway/images/thumb-placeholder.jpg" alt="placeholder">

            <?php endif; ?>

                                </div>
                                <div class="uk-width-medium-1-2 uk-margin-bottom">
                                        <table class="uk-table profile-table uk-margin-small-bottom">
                                                <tr>
                                                        <td colspan="2">
                                                                <h4> <?php echo $this->getPropertyName($value->property_id); ?> </h4>
                                                                <h5> <?php echo $value->building_name?> </h5>
                                                                <p class="uk-margin-bottom-remove">	
                                                                        <?php echo $value->address1 ?>

                                                                        <?php if( empty($value->address2) ): ?>

                                                                                <br />

                                                                        <?php elseif( isset($value->address2) ): ?>

                                                                                <br /><?php echo $value->address2 ?><br />

                                                                        <?php endif; ?>

                                                                        <?php echo $value->city?>, <?php echo $value->state?> <?php echo $value->zip?>
                                                                </p>
                                                        </td>
                                                </tr>
                                                <!-- <tr>
                                                        <td>Rentable Sq. Ft.</td>
                                                        <td class="uk-text-bold">
                                                                ...
                                                        </td>
                                                </tr> -->
                                                <tr>
                                                        <td>Number of Floors</td>
                                                        <td class="uk-text-bold">
                                                                <!-- var numFloors -->
                                                                <?php echo $value->number_of_floors ?>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <td>Building Size</td>
                                                        <td class="uk-text-bold">
                                                                <!-- var availableSqFt -->
                                                                <?php echo number_format($value->building_size, 0, '.', ',') ?>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <td>Typical Floor Size</td>
                                                        <td class="uk-text-bold">
                                                                <!-- var typicalFloorSize -->
                                                                <?php echo number_format($value->typical_floor_size, 0, '.', ',') ?>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <td>Parking</td>
                                                        <td class="uk-text-bold">
                                                                <!-- var yearBuilt -->
                                                                <?php echo $value->parking_ratio ?>
                                                        </td>
                                                </tr>
                                        </table>
                <p class="results-links">
                                        <a class="uk-button" href="<?php echo JURI::base()."index.php?option=com_parkway&view=vacancies&layout=bybuilding&filter_building=$value->id&Itemid=$Itemid" ?>">View Listings</a><br>
                                        </p>
                                        <p class="results-links ie">
                                        <a class="uk-button" href="<?php echo JURI::base()."index.php?option=com_parkway&view=floorplan&building=$value->id&Itemid=$Itemid" ?>">View Floor Plans</a>
                                        </p>

                                        <?php if( isset($value->fact_sheet) && !empty($value->fact_sheet) && ($value->show_fact_sheet == 1)): ?>

                                                        <a class="uk-icon-file-pdf-o uk-margin-small-bottom" href="<?php echo JRoute::_('/media/com_parkway/' . $value->fact_sheet) ?>"><span class="uk-h5">Fact Sheet</span></a> <br />

                                        <?php endif; ?>

                                        <?php if( isset($value->leed_cert) && !empty($value->leed_cert) ): ?>

                                                <?php if( $value->leed_cert == 1 ): ?>

                                                        <img src="/components/com_parkway/images/leed.png" alt="LEED Certified" />

                                                <?php endif; ?>

                                        <?php endif; ?>

                                </div>
                        </div>
                </div>

        <?php if( $mycount % 2 != 0 ): ?>

        </div>

        <?php endif; ?>	

        <?php $mycount++; ?>

