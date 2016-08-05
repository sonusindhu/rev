<div class="modal-dialog contact_popup" role="document">
    <div class="modal-content notice_dv">
        <div class="modal-header ">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><img alt="" src="<?php echo $this->webroot; ?>images/close_icon.png"></button>
            <h4 class="modal-title" id="myModalLabel">Lender Contact Creator</h4>
        </div>

        <div class="modal-body clearfix">
            <form id="editLenderContactForm" ng-submit="editLenderContact('<?php echo $this->webroot; ?>company/lenders/editcontact/<?php echo $lendercontact['LenderContact']['id']; ?>')">
                <input type="hidden" value="<?php echo rand(10, 100000); ?>">
                <input type="hidden" value="<?php echo $lendercontact['LenderContact']['user_id']; ?>" name="data[LenderContact][user_id]">
                <input type="hidden" value="<?php echo $lendercontact['LenderContact']['lender_id']; ?>" name="data[LenderContact][lender_id]">
                <input type="hidden" value="<?php echo $lendercontact['LenderContact']['id']; ?>" name="data[LenderContact][id]">
                <div data-example-id="togglable-tabs" class="bs-example bs-example-tabs">
                    <ul role="tablist" class="nav nav-tabs" id="myTabs2"> 
                        <li class="active" role="presentation"><a aria-expanded="true" aria-controls="Contctinfo" data-toggle="tab" role="tab" id="Contact_info" href="#Contctinfo">Contact Information</a></li>
                        <li role="presentation" class=""><a aria-controls="States_Sec" data-toggle="tab" id="States_dv" role="tab" href="#States_Sec" aria-expanded="false">States</a></li>

                    </ul>
                    <div class="tab-content" id="myTabContent2"> 
                        <div aria-labelledby="Contact_info" id="Contctinfo" class="tab-pane fade active in" role="tabpanel"> 
                            <div class="col-md-12 general_dv popup_inner">
                                <h4>Lender Contacts</h4>
                                <div class="col-md-12 spc form_fields spc  ">
                                    <div class="row">
                                        <div class="col-md-6 lndr_contact_sec">

                                            <div class="form-group ">
                                                <label  class="col-sm-3 control-label">First name</label> 
                                                <div class="col-sm-9 res_spc1">
                                                    <input type="text" placeholder="Enter First name" class="form-control" name="data[LenderContact][firstname]" value="<?php echo $lendercontact['LenderContact']['firstname']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label  class="col-sm-3 control-label">Last Name</label> 
                                                <div class="col-sm-9 res_spc1">
                                                    <input type="text" placeholder="Enter last Name" class="form-control" name="data[LenderContact][lastname]" value="<?php echo $lendercontact['LenderContact']['lastname']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label  class="col-sm-3 control-label">Title</label> 
                                                <div class="col-sm-9 res_spc1">
                                                    <input type="text" placeholder="Enter Title" class="form-control" name="data[LenderContact][title]" value="<?php echo $lendercontact['LenderContact']['title']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label  class="col-sm-3 control-label">Type</label> 
                                                <div class="col-sm-9 res_spc1">
                                                    
                                                    <select class="selectpicker col-md-8 spc" name="data[LenderContact][types]">
                                                        <option value="Account Executive" <?php if($lendercontact['LenderContact']['types']=='Account Executive') echo 'selected' ?>>Account Executive</option>
                                                        <option value="Closing" <?php if($lendercontact['LenderContact']['types']=='Closing') echo 'selected' ?>>Closing</option>
                                                        <option value="Compliance" <?php if($lendercontact['LenderContact']['types']=='Compliance') echo 'selected' ?>>Compliance</option>
                                                        <option value="Development Doc Prep" <?php if($lendercontact['LenderContact']['types']=='Development Doc Prep') echo 'selected' ?>>Development Doc Prep</option>
                                                        <option value="Management" <?php if($lendercontact['LenderContact']['responsibility']=='Management') echo 'selected' ?>>Management</option>
                                                        <option value="Funding" <?php if($lendercontact['LenderContact']['types']=='Funding') echo 'selected' ?>>Funding</option>
                                                        <option value="Legal" <?php if($lendercontact['LenderContact']['types']=='Legal') echo 'selected' ?>>Legal</option>
                                                        <option value="Marketing" <?php if($lendercontact['LenderContact']['types']=='Marketing') echo 'selected' ?>>Marketing</option>
                                                        <option value="Processing" <?php if($lendercontact['LenderContact']['types']=='Processing') echo 'selected' ?>>Processing</option>
                                                        <option value="Servicing" <?php if($lendercontact['LenderContact']['types']=='Servicing') echo 'selected' ?>>Servicing</option>
                                                        <option value="Support" <?php if($lendercontact['LenderContact']['types']=='Support') echo 'selected' ?>>Support</option>
                                                        <option value="Training" <?php if($lendercontact['LenderContact']['types']=='Training') echo 'selected' ?>>Training</option>
                                                         <option value="Underwriting" <?php if($lendercontact['LenderContact']['types']=='Underwriting') echo 'selected' ?>>Underwriting</option>
                                                    </select>
                                                    
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="col-md-6 flt_ryt lndr_contact_sec">
                                            
                                            <div class="form-group ">
                                                <label  class="col-sm-3 control-label">Work Phone</label> 
                                                <div class="col-sm-9 res_spc1">
                                                    <input type="text" placeholder="Enter Work Phone Number" class="form-control phoneNo" name="data[LenderContact][workphone]" value="<?php echo $lendercontact['LenderContact']['workphone']; ?>">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group ">
                                                <label  class="col-sm-3 control-label">Cell Phone</label> 
                                                <div class="col-sm-9 res_spc1">
                                                    <input type="text" placeholder="Enter Cell Phone" class="form-control phoneNo" name="data[LenderContact][cellphone]" value="<?php echo $lendercontact['LenderContact']['cellphone']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label  class="col-sm-3 control-label">Fax</label> 
                                                <div class="col-sm-9 res_spc1">
                                                    <input type="text" placeholder="Enter Fax Number" class="form-control phoneNo" name="data[LenderContact][fax]" value="<?php echo $lendercontact['LenderContact']['fax']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label  class="col-sm-3 control-label">Email</label> 
                                                <div class="col-sm-9 res_spc1">
                                                    <input type="email" placeholder="Enter Email" class="form-control " name="data[LenderContact][email]" value="<?php echo $lendercontact['LenderContact']['email']; ?>" required="" title="Enter valid email address" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div aria-labelledby="States_dv" id="States_Sec" class="tab-pane fade " role="tabpanel"> 
                            <div class="col-md-12 general_dv docu popup_inner states_sel_all">
                                <h4>States <div class="checkbox">
                                        <label> 
                                            <input type="checkbox" class="all">  Select All 
                                        </label> 
                                    </div>
                                </h4>
                                <div class="col-md-12 states_checkbox spc">
                                    <div class="col-md-3 col-sm-6 col-xs-6 padd_left res_spc1 res_stat">
                                        <?php
                                        $i=1;
                                        if(isset($states) && !empty($states)){
                                            foreach ($states as $key => $value) {
                                                $checked = '';
                                                if(!empty($lendercontact['LenderContact']['states'])){
                                                    $stateDecoded = json_decode($lendercontact['LenderContact']['states']);
                                                    if(in_array($value['State']['state'], $stateDecoded)){
                                                        $checked = 'checked';
                                                    }
                                                }
                                                
                                                
                                                ?>
                                                <div class="checkbox">
                                                    <label> 
                                                        <input <?php echo $checked; ?> value="<?php echo $value['State']['state']; ?>" type="checkbox" class="check" name="data[LenderContact][states][]">
                                                                <?php echo $value['State']['state']; ?> 
                                                    </label> 
                                                </div>
                                                <?php
                                                
                                                if($i==14){
                                                    $i = 1;
                                                    ?>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6 col-xs-6 res_spc1 res_stat">
                                                    <?php
                                                }else{
                                                    $i++;
                                                }
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer mar15">
                    <div class="col-md-12 text-center spc btm_btns">
                        <button type="submit">Create</button>
                        <a class=" cncel_btn" data-dismiss="modal" aria-label="Close">Cancel</a>
                    </div>
                </div>
            </form>       
        </div>
    </div>
</div>
