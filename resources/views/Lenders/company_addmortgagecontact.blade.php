
<div class="modal-dialog" role="document">
    <div class="modal-content notice_dv">
        <div class="modal-header ">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><img alt="" src="<?php echo $this->webroot; ?>images/close_icon.png"></button>
            <h4 class="modal-title" id="myModalLabel">Mortgagee Clause</h4>
        </div>
        <div class="modal-body clearfix">
            <form id="addLenderMortgageContactForm" ng-submit="addLenderMortgageContact('<?php echo $this->webroot; ?>company/lenders/addmortgagecontact?lender_id=<?php echo $lenderid; ?>')">
                <input type="hidden" value="<?php echo rand(10, 100000); ?>">
                <input type="hidden" value="<?php echo $_SESSION['Auth']['User']['id']; ?>" name="data[LenderMortgageContact][user_id]">
                <input type="hidden" value="<?php echo $lenderid; ?>" name="data[LenderMortgageContact][lender_id]">
                
                <div data-example-id="togglable-tabs" class="bs-example bs-example-tabs">
                    <ul role="tablist" class="nav nav-tabs" id="myTabs5"> 
                        <li class="active" role="presentation"><a aria-expanded="true" aria-controls="home" data-toggle="tab" role="tab" id="motgagee_Contact_info" href="#mortgageeContctinfo">Contact Information</a></li>
                        <li role="presentation" class=""><a aria-controls="profile" data-toggle="tab" id="mortgagee_stat_dv" role="tab" href="#mortgagee_states" aria-expanded="false">States</a></li>

                    </ul>
                    <div class="tab-content" id="myTabContent5"> 
                        <div aria-labelledby="motgagee_Contact_info" id="mortgageeContctinfo" class="tab-pane fade active in" role="tabpanel"> 
                            <div class="col-md-12 general_dv popup_inner">
                                <h4>Mortgagee Clause</h4>
                                <div class="col-md-12 spc form_fields spc  ">

                                    <div class="row">
                                        <div class="col-md-6 col-sm-12   lndr_contact_sec">
                                            <div class="form-group ">
                                                <label  class="col-sm-4 control-label">Mortgagee Clause</label> 
                                                <div class="col-sm-8 res_spc1">
                                                    <input type="text" placeholder="Enter Mortgagee" class="form-control" name="data[LenderMortgageContact][fullname]">
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label  class="col-sm-4 control-label">Address 1</label> 
                                                <div class="col-sm-8 res_spc1">
                                                    <input type="text" placeholder="Enter Address 1" class="form-control" name="data[LenderMortgageContact][address1]">
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label  class="col-sm-4 control-label">Address 2</label> 
                                                <div class="col-sm-8 res_spc1">
                                                    <input type="text" placeholder="Enter Address 2" class="form-control" name="data[LenderMortgageContact][address2]">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12   lndr_contact_sec">

                                            <div class="form-group ">
                                                <label  class="col-sm-4 control-label">City</label> 
                                                <div class="col-sm-8 res_spc1 ">
                                                    <input type="text" placeholder="Enter City" class="form-control" name="data[LenderMortgageContact][city]">
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label  class="col-sm-4 control-label">State</label> 
                                                <div class="col-sm-8 res_spc1">
                                                    <!--<input type="text" placeholder="Enter State" class="form-control" name="data[LenderMortgageContact][state]">-->
                                                    
                                                    
                                               <select class="selectpicker col-md-8 spc" name="data[LenderMortgageContact][state_id]">
                                                   <option value="0">Select State</option>
                                                <?php
                                                foreach ($states as $key => $value) {
//                                                    $selected = "";
//                                                    if($value['State']['id']==$lender['State']['id']){
//                                                        $selected = "selected";
//                                                    }
                                                    ?> 
                                                <option value="<?php echo $value['State']['id']; ?>"><?php echo $value['State']['state']; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                                    
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label  class="col-sm-4 control-label">Zip Code</label> 
                                                <div class="col-sm-8 res_spc1">
                                                    <input type="text" placeholder="Enter Zip Code" class="form-control" name="data[LenderMortgageContact][zipcode]" pattern="[0-9]{1,5}" title="Zip Code should be 5 number only" required="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div aria-labelledby="mortgagee_stat_dv" id="mortgagee_states" class="tab-pane fade " role="tabpanel"> 

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
                                        $i = 1;
                                        if (isset($states) && !empty($states)) {
                                            foreach ($states as $key => $value) {
                                                ?>
                                                <div class="checkbox">
                                                    <label> 
                                                        <input value="<?php echo $value['State']['state']; ?>" type="checkbox" class="check" name="data[LenderMortgageContact][states][]">
                                                        <?php echo $value['State']['state']; ?> 
                                                    </label> 
                                                </div>
                                                <?php
                                                if ($i == 14) {
                                                    $i = 1;
                                                    ?>
                                                </div>
                                                <div class="col-md-3 col-sm-6 col-xs-6 res_spc1 res_stat">
                                                    <?php
                                                } else {
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
                <div class="modal-footer ">

                    <div class="col-md-12 text-center spc btm_btns">

                        <!--<a href="#">Create</a>-->
                        <button type="submit">Create</button>
                        <a class=" cncel_btn" data-dismiss="modal" aria-label="Close">Cancel</a>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>