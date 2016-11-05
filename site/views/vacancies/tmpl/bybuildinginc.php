<div class="uk-grid">
                <div class="uk-width-1-1">
								<div class="uk-overflow-container">
                    <table  class="uk-table results-table">
                        <tbody>
                            <tr class="results-top">
                                <th>
                                    Suite
                                </th>
                                <th>
                                    Floor
                                </th>
                                <th>
                                    Available Sq. Ft.
                                </th>
                                <th>
                                    Divisible?
                                </th>
                                <th>
                                    Market Rent
                                </th>
                                <th>
                                    Date Available
                                </th>
                                <!--<th>
                                    PDF
                                </th>-->
                            </tr>

                            <?php foreach ($this->items as $key => $value): ?>

                            <tr>
                                <td><?php echo $value->suite ?></td>
                                <td><?php echo $value->floor_level ?></td>
                                <td><?php echo number_format($value->available_space, 0, '.', ',') ?></td>
                                <td><?php if ($value->divisible == 1){ echo 'Yes'; }else{ echo 'No'; }?></td>
                                <td><?php echo '$'.$value->market_rent ?></td>
                                <td><?php echo $this->formatDate($value->date_available) ?></td>
                                
                                <!--<td> 
                                    <?php if (isset($value->pdf) && !empty($value->pdf)):?>
                                        <a href="<?php echo "/media/com_parkway/$value->pdf" ?>" class="uk-icon-file-pdf-o"></a>
                                    <?php endif; ?>
                                </td>-->
                            </tr>
   
                            <?php endforeach; ?>
                        </tbody>
                    </table>
								</div>
                </div>
            </div>

