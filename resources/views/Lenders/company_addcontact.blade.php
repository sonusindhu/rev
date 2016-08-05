<div class="modal-dialog contact_popup" role="document" >
    <div class="modal-content notice_dv">
        <div class="modal-header ">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><img alt="" src="<?php echo $this->webroot; ?>images/close_icon.png"></button>
            <h4 class="modal-title" id="myModalLabel">Lender Contact Creator</h4>
        </div>

        <div class="modal-body clearfix">
            <form id="addLenderContactForm" ng-submit="addLenderContact('<?php echo $this->webroot; ?>company/lenders/addcontact?lender_id=<?php echo $lenderid; ?>')">
                <input type="hidden" value="<?php echo rand(10, 100000); ?>">
                <input type="hidden" value="<?php echo $_SESSION['Auth']['User']['id']; ?>" name="data[LenderContact][user_id]">
                <input type="hidden" value="<?php echo $lenderid; ?>" name="data[LenderContact][lender_id]">
                <div data-example-id="togglable-tabs" class="bs-example bs-example-tabs">
                    <ul role="tablist" class="nav nav-tabs" id="myTabs2"> 
                        <li class="active" role="presentation"><a aria-expanded="true" aria-controls="Contctinfo" data-toggle="tab" role="tab" id="Contact_info" href="#Contctinfo">Contact Information</a></li>
                        <li role="presentation" class=""><a aria-controls="States_Sec" data-toggle="tab" id="States_dv" role="tab" href="#States_Sec" aria-expanded="false">States</a></li>

                    </ul>
                    <div class="tab-content" id="myTabContent2"> 
                        <div aria-labelledby="Contact_info" id="Contctinfo" class="tab-pane fade active in" role="tabpanel"> 
                            <div class="col-md-12 general_dv popup_inner">
                                <h4><span class="title_spn1">Lender Contacts</span></h4>
                                <div class="col-md-12 spc form_fields spc  ">
                                    <div class="row">
                                        <div class="col-md-6 lndr_contact_sec">

                                            <div class="form-group ">
                                                <label  class="col-sm-3 control-label">First name</label> 
                                                <div class="col-sm-9 res_spc1">
                                                    <input type="text" placeholder="Enter First name" class="form-control" name="data[LenderContact][firstname]">
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label  class="col-sm-3 control-label">Last Name</label> 
                                                <div class="col-sm-9 res_spc1">
                                                    <input type="text" placeholder="Enter last Name" class="form-control" name="data[LenderContact][lastname]">
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label  class="col-sm-3 control-label">Title</label> 
                                                <div class="col-sm-9 res_spc1">
                                                    <input type="text" placeholder="Enter Title" class="form-control" name="data[LenderContact][title]">
                                                </div>
                                            </div>
                                                  <div class="form-group send_msg">
                                                <label  class="col-sm-3 control-label">Type</label>
                                                <div class="col-sm-9 res_spc1">
                                                    <select class="selectpicker col-md-8 spc" name="data[LenderContact][types]">
                                                        <option value="Account Executive">Account Executive</option>
                                                        <option value="Closing">Closing</option>
                                                        <option value="Compliance">Compliance</option>
                                                        <option value="Development Doc Prep">Development Doc Prep</option>
                                                        <option value="Management">Management</option>
                                                        <option value="Funding">Funding</option>
                                                        <option value="Legal">Legal</option>
                                                        <option value="Marketing">Marketing</option>
                                                        <option value="Processing">Processing</option>
                                                        <option value="Servicing">Servicing</option>
                                                        <option value="Support">Support</option>
                                                        <option value="Training">Training</option>
                                                         <option value="Underwriting">Underwriting</option>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="col-md-6 flt_ryt lndr_contact_sec">
                                        <div class="form-group ">
                                                <label  class="col-sm-3 control-label">Work Phone</label> 
                                                <div class="col-sm-9 res_spc1">
                                                    <input type="text" placeholder="Enter Work Phone Number" class="form-control phoneNo" name="data[LenderContact][workphone]" >
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label  class="col-sm-3 control-label">Cell Phone</label> 
                                                <div class="col-sm-9 res_spc1">
                                                    <input type="text" placeholder="Enter Cell Phone" class="form-control phoneNo" name="data[LenderContact][cellphone]">
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label  class="col-sm-3 control-label">Fax</label> 
                                                <div class="col-sm-9 res_spc1">
                                                    <input type="text" placeholder="Enter Fax Number" class="form-control phoneNo" name="data[LenderContact][fax]">
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label  class="col-sm-3 control-label">Email</label> 
                                                <div class="col-sm-9 res_spc1">
                                                    <input type="email" placeholder="Enter Email" class="form-control" name="data[LenderContact][email]" required="" title="Enter valid email address" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
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
                                                ?>
                                                <div class="checkbox">
                                                    <label> 
                                                        <input value="<?php echo $value['State']['state']; ?>" type="checkbox" class="check" name="data[LenderContact][states][]">
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
                <div class="modal-footer">
                    <div class="col-md-12 text-center spc btm_btns">
                        <button type="submit">Create</button>
                        <a class=" cncel_btn" data-dismiss="modal" aria-label="Close">Cancel</a>
                    </div>
                </div>
            </form>       
        </div>
    </div>
</div>
