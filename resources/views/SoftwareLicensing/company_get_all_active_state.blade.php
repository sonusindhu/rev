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
                                        <td><?php echo $value['State']['state']; ?> </td>
                                        <td><?php echo $value['StateLicense']['license']; ?> </td>
                                        <td>
                                         <span><a ng-click="openPopUp('get', 'software_licensing/show_state_license/<?php echo $value['State']['id']; ?>', 'licensing_branch')" href="javascript:void(0)"><?php if(!empty($value['StateLicense']['count'])){
                 echo $value['StateLicense']['count'];                            
                                         }else{ echo "0";} ?></a></span></td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>

                        </tbody>
                    </table>