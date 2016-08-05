
<div class="col-md-12 companyadmin_outer ">
    <div class="col-md-12 spc form_fields spc  ">
        <input type="hidden" value="<?php echo rand(10, 100000); ?>">
        <div class="col-md-12 spc paddbtm30 sep_div">
            <h3>
                Lenders<span>
                    <a ng-click="openPopUp('get', 'company/lenders/add', ' new_licensee trms_services')" class="com_admin_btns hding_span" href="#">Create New Lender</a>

                </span> 
            </h3>
            <div class="table-responsive manage_licsn_tabl license_user lender manage-lender lender_tabble">
                <table class="table table-striped table-hover ">
                    <tr class="bg_white">
                        <th class="padd_15lft res_width_cls">Lenders</th>
                        <th  class="padd_15lft wdth_cls">Status</th>
                        <th    class="padd_15lft wdth_cls" >Action </th>
                    </tr>
                    <tbody>

                        <?php
                        if (isset($lenders) and ! empty($lenders)) {
                            foreach ($lenders as $key => $value) {
                                $updateStatusId = "Lender_" . $value->id;
                                $status = '';
                                $updatestatus = 1;
                                if ($value->status) {
                                    $status = "active";
                                    $updatestatus = 0;
                                }
                                ?>
                                <tr id="Unit_<?php echo $updateStatusId; ?>"> 
                                    <td class="text-left" ><?php echo $value->name; ?></td>
                                    <td class="text-left">
                                        <a ng-click="updateStatus('company/lenders/updatestatus/Lender/<?php echo $value->id; ?>', '<?php echo $updateStatusId; ?>')" class="activeLenders btn btn-default <?php echo $status; ?>" statusid="<?php echo $updatestatus; ?>" id="<?php echo $updateStatusId; ?>" href="javascript:"></a>
                                    </td>
                                    <td class="text-left">
                                        <a ng-click="refreshTab('Edit Lender : <?php echo $value->name; ?>', 'edit_lender', 'company/lenders/edit/<?php echo $value->id; ?>')" class="editLenders" href="javascript:" id="<?php echo $value->id; ?>">
                                            <img src="images/edit.png" alt=""/>
                                        </a>
                                    </td>
                                    <td class="text-left">
                                        <a ng-click="deleteRecords('Unit_<?php echo $updateStatusId; ?>', 'company/lenders/delete/<?php echo $value->id; ?>')" href="javascript:"><img src="images/trash.png" alt=""></a>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            ?>
                            <tr > 
                                <td style="text-align: center" colspan="3">No record Found!</td>
                            </tr>
                        <?php }
                        ?>
                    </tbody> 
                </table>
            </div> 
            <div class="clearfix"></div> 
        </div>
        <div class="clearfix"></div>
    </div>
</div>
