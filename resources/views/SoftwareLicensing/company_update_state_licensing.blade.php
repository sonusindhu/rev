<div class="modal-dialog" role="document">
    <form id="updateLicense" ng-submit="addNote('software_licensing/update_state_licensing', 'updateLicense', 'StateLicense')">
        <div class="modal-content clearfix">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><img src="<?php echo $this->webroot; ?>images/close_icon.png" alt=""/></span></button>
                <h4 class="modal-title" id="myModalLabel">Update State licensing</h4>
            </div>
            <div class="modal-body  clearfix mCustomScrollbar">
                <div class="col-md-12 spc form_fields spc ">


                    <div class="table-responsive manage_licsn_tabl license_user">
                        <table class="table ">

                            <tr class="bg_Clr">
                                <th class="padd_15lft">State</th>
                                <th  class="padd_15lft">License</th>
                                <th  class="text-center" >Activate</th>
                            </tr>

                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <?php
                                if (!empty($states)) {
                                    foreach ($states as $keys => $value) {
                                         $checked = "";
                                        if(!empty($value['State']['active_status']))
                                        {
                                            $checked="checked";
                                        }
                                       
                                     ?>
                                      <tr> 
                                         <input type="hidden" name="data[<?php echo $value['State']['id']; ?>][StateLicense][state_id]" value="<?php echo $value['State']['id']; ?>" />
                                        <input type="hidden" name="data[<?php echo $value['State']['id']; ?>][StateLicense][comp_id]" value="<?php echo $_SESSION['Auth']['User']['id']; ?>" />
                                        <td><?php echo $value['State']['state']; ?> </td>
                                        <td>
                                            <input type="text" value="<?php echo $value['State']['license']; ?>" name="data[<?php echo $value['State']['id']; ?>][StateLicense][license]" class="form-control"  placeholder="">

                                        </td>
                                        <td>
                                           
                                            <div class="checkbox">
                                                <label> <input <?php echo $checked; ?>   type="checkbox" name="data[<?php echo $value['State']['id']; ?>][StateLicense][active_status]">
                                                </label>
                                            </div>
                                        </td>
                                        </tr>
                                        <?php
                                   
                                }
                            }
                            ?>
                            </tbody> 
                        </table>
                    </div>

                </div>
            </div>
            <div class="col-md-12 text-center spc btm_btns clearfix">
                <button type="submit">Save</button>
                <a aria-label="Close" data-dismiss="modal" class=" cncel_btn" href="#">CANCEL</a>
            </div>
        </div>
    </form>
</div>