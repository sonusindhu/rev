<div class="modal-dialog" role="document">
    <form>
        <div class="modal-content clearfix">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><img src="images/close_icon.png" alt=""/></span></button>
                <h4 class="modal-title" id="myModalLabel">State License- <?php echo $stateLicense['states']['state']; ?></h4>
            </div>
            <div class="modal-body  clearfix  mCustomScrollbar _mCS_1">
                <div class="col-md-12 spc form_fields spc ">
                    <div class="table-responsive  manage_licsn_tabl license_user">
                        <table class="table table-hover table-striped">

                            <?php
                            if (!empty($EmployeeDetail)) {
                                ?>
                                <tr class="bak_clr">
                                    <th class="padd_15lft">LOs/Employee Users</th>
                                    <th class="padd_15lft">License Number</th>
                                </tr>
                                <?php
                                foreach ($EmployeeDetail as $key => $value) {
                                    ?>
                                    <tr>
                                        <td>
                                            <a ng-click="openPopUp('get', 'company/software_licensing/view_branch/<?php echo $value->id; ?>', 'licensing_branch view_branch')" href="javascript:void(0)">
                                                <?php
                                                if (!empty($value->emp_image)) {
                                                    $src = 'upload/Employee/' . $value->emp_image;
                                                } else {
                                                    $src = "images/default-avatar.png";
                                                }
                                                ?>                           
                                                <img width="20px" src="<?php echo $src; ?>" alt=""/> <?php echo $value->emp_first_name . ' ' . $value->emp_last_name; ?></a></td>
                                        <td><?php echo @$value->license_number_id; ?></td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                ?>
                                <tr colspan="2" style="text-align:center;">
                                    <td>No Data found.</th>
                                </tr> 
                                <?php
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>