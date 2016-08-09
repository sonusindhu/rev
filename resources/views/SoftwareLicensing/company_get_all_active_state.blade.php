   <table class="table table-striped table-hover">
                        <tr class="bg_white">
                            <th >State</th>
                            <th >License Number</th>
                            <th >MLOs </th>
                        </tr>
                        <tbody>
                            <?php
                            if (!empty($stateLicense)) {
                               foreach ($stateLicense as $key => $value) {
                                    ?>
                                    <tr> 
                                        <td><?php echo $value['states']->state; ?> </td>
                                        <td><?php echo $value->license; ?> </td>
                                        <td>
                                         <span><a ng-click="openPopUp('get', 'software_licensing/show_state_license/<?php echo $value['states']->id; ?>', 'licensing_branch')" href="javascript:void(0)"><?php if(!empty($value->count)){
                 echo $value->count;                            
                                         }else{ echo "0";} ?></a></span></td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>

                        </tbody>
                    </table>