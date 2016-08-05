<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><img src="<?php echo $this->webroot; ?>images/close_icon.png" alt=""/></span></button>
            <h4 class="modal-title" id="myModalLabel">Credit Bureaus</h4>
        </div>
        <div class="modal-body form_fields clearfix">
            <div class="table-responsive manage_licsn_tabl license_user">
                <table class="table table-striped table-hover">
                    <tbody><tr class="bg_white">

                            <th  colspan="2" class="padd_15lft">Credit Bureaus</th>
                            <th  colspan="2" class="padd_15lft">Account</th>
                            <th class="padd_15lft">Username</th>
                            <th class="padd_15lft">Corporate </th>
                            <th class="padd_15lft">Status</th>
                        </tr>
                    </tbody> 
                    <tbody>
                        <?php
                        if (!empty($EmployeeCredit)) {
                            foreach ($EmployeeCredit as $key => $value) {
                                ?>
                                <tr> 
                                    <td colspan="2">
                                        <?php echo $value['EmployeeCredit']['credit_bureas']; ?>
                                    </td>
                                    <td colspan="2">  
                                        <?php echo $value['EmployeeCredit']['account']; ?>
                                    </td>                                      
                                    <td>
                                        <?php echo $value['EmployeeCredit']['username']; ?> 
                                    </td>
                                    <td>
                                        <?php
                                        $select = "";
                                        if (!empty($value['EmployeeCredit']['corporate'])) {
                                            $select = "checked";
                                        }
                                        ?>
                                        <input ng-disabled="true" type="checkbox" <?php echo $select; ?>/>
                                    </td>
                                    <td>

                                        <input type="checkbox" checked ng-disabled="true"/>
                                    </td>
                                   
                                </tr>
                                <?php
                            }
                        } else {
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