<!---------------Add fees Popup----------->

<div class="modal-dialog" role="document">
    <div class="modal-content notice_dv">
        <div class="modal-header "> 
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><img alt="" src="<?php echo $this->webroot; ?>images/close_icon.png"></button>
            <h4 class="modal-title" id="myModalLabel">DEFAULT HUD FEES FOR THIS LENDER</h4>
        </div>
        <div class="modal-body clearfix">
            <form id="addLenderLoanFeeForm" ng-submit="addLenderLoanFee('<?php echo $this->webroot; ?>company/lenders/insert/<?php echo $lenderid; ?>')">
                    
                <input type="hidden" value="<?php echo rand(10, 100000); ?>">
                    <input type="hidden" value="<?php echo $_SESSION['Auth']["User"]['id']; ?>" name="data[LenderHudFee][user_id]">
                    <input type="hidden" value="<?php echo $lenderid; ?>" name="data[LenderHudFee][lender_id]">
                <div class="col-md-12 general_dv popup_inner mCustomScrollbar _mCS_1  ">
                    <?php
                    foreach ($dataList as $key => $value) {
                        ?> 
                        <h4>
                            <?php echo $value['Hud']['id']; ?> 
                            <?php echo $this->Custom->charset($value['Hud']['value']); ?>
                        </h4>

                        <div class="col-md-12 spc form_fields   ">    
                            <div class="table-responsive manage_licsn_tabl license_user add_fee">
                                <table class="table  ">
                                    <tr class="bg_white">
                                        <th>HUD#</th>
                                        <th class="des-td">Description </th>
                                        <th>Tolerance</th>
                                        <th >Select</th>
                                    </tr>

                                    <tbody>
                                        <?php
                                        foreach ($value['Loanfee'] as $key => $value) {
                                            ?> 
                                            <tr> 
                                                <td><?php echo $value['Loanfee']['hud']; ?></td>
                                                <td>
                                                    <?php
                                                    echo $value['Loanfee']['value'];
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($value['Loanfee']['tolerance'] != '') {
                                                        switch ($value['Loanfee']['tolerance']) {
                                                            case -1:
                                                                echo '<span class="infinty"><img class="mCS_img_loaded" src="' . $this->webroot . 'images/infinite.png" alt=""></span>';
                                                                break;
                                                            case 0:
                                                                echo '<span class="blnk_info">' . $value['Loanfee']['tolerance'] . '%</span>';
                                                                break;
                                                            case 10:
                                                                echo '<span class="smal_info">' . $value['Loanfee']['tolerance'] . '%</td>';
                                                                break;
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                                <td>   
                                                    <div class="checkbox"> 
                                                        <label> 
                                                            <input name="data[LenderHudFee][id][]" value="<?php echo $value['Loanfee']['id']; ?>" type="checkbox" <?php if (in_array($value['Loanfee']['hud'], $LenderHudFees)) echo 'checked'; ?>>
                                                        </label> 
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody> 
                                </table>
                            </div> 
                        </div>

                        <div class="clearfix"></div>
                        <?php
                    }
                    ?>

                </div>

                <div class="col-md-12 text-center spc btm_btns marbtm20">
                    <button type="submit">Save</button>
                    <a class=" cncel_btn" class="close" data-dismiss="modal" aria-label="Close">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

<!---------------Add fees popup end----------->