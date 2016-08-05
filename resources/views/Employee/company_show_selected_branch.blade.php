<div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><img src="<?php echo $this->webroot; ?>images/close_icon.png" alt=""/></span></button>
                <h4 class="modal-title" id="myModalLabel">Look up branch</h4>
            </div>
            <div class="modal-body form_fields clearfix">
                <div class="table-responsive manage_licsn_tabl license_user">
                    <table class="table table-striped table-hover">
                        <tbody><tr class="bg_white">

                                <th  colspan="2" class="padd_15lft">Branch Name</th>
                                <th class="padd_15lft">NMLS#</th>
                                <th class="padd_15lft">Address </th>
                                <th class="padd_15lft">Branch Manager</th>
                            </tr>
                        </tbody> 
                        <tbody>
                            <?php
                                   if (!empty($branch['Branch'])) {
                              
                                    ?>
                                    <tr> 
                                        <td colspan="2">
                                            <div class="checkbox"> <label> 
                                                    <!--<input value="<?php //echo $branch['Branch']['id']; ?>" name="data[Branch][check]" type="checkbox" >-->
                                                </label> 
                                            </div><?php echo @$branch['Branch']['office']; ?> 
                                        </td>
                                        <td><?php echo @$branch['Branch']['nmls_number']; ?></td>
                                        <td><?php echo @$branch['Branch']['city']; ?>
                                            <?php //echo $branch['State']['state']; ?> <br>
                                            <?php echo @$branch['Branch']['address']; ?>
                                            <?php echo @$branch['Branch']['zipcode']; ?>  </td>
                                        <td><?php echo @$branch['Branch']['username']; ?></td> 
                                    </tr>
                                    <?php
                              
                            }else{
                                ?> <tr> 
                                    <td colspan="5" style="text-align: center;">
                                        No Branch selected.
                                    </td>
                                </tr>
                                    <?php
                            }
                            ?>
                        </tbody> 
                    </table>
                </div>

            </div>
            <div class="modal-footer">
                <div class="col-md-12 text-center spc btm_btns">

                    <a href="javascript:void(0)" aria-label="Close" data-dismiss="modal" class=" cncel_btn">Cancel</a>

                </div>
            </div>
        </div>
    
</div>