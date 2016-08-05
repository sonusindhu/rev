<div class="col-md-12 spc  sep_div new_lender form_fields">

    <div data-example-id="togglable-tabs" class="bs-example bs-example-tabs">
        <ul role="tablist" class="nav nav-tabs" id="myTabs1"> 
            <li class="active" role="presentation"><a aria-expanded="true" aria-controls="General" data-toggle="tab" role="tab" id="General_tab" href="#General">General</a></li>
            <li role="presentation" class=""><a aria-controls="address" data-toggle="tab" id="addresses_tab" role="tab" href="#address" aria-expanded="false">Addresses</a></li>
            <li role="presentation" class=""><a aria-controls="Contact" data-toggle="tab" id="Contacts_dv" role="tab" href="#Contact" aria-expanded="false">Contacts</a></li>
            <li role="presentation" class=""><a aria-controls="notice" data-toggle="tab" id="notices_dv" role="tab" href="#notice" aria-expanded="false">Notices</a></li>
            <li role="presentation" class=""><a aria-controls="tips" data-toggle="tab" id="tips_dv" role="tab" href="#tips" aria-expanded="false">Tips</a></li>

            <li role="presentation" class=""><a aria-controls="Notes" data-toggle="tab" id="Note_dv" role="tab" href="#Notes" aria-expanded="false">Notes</a></li>
            <li role="presentation" class=""><a aria-controls="Documents" data-toggle="tab" id="Docu_dv" role="tab" href="#Documents" aria-expanded="false">Documents</a></li>
            <li role="presentation" class=""><a aria-controls="Fees" data-toggle="tab" id="Fee_dv" role="tab" href="#Fees" aria-expanded="false">Fees</a></li>

        </ul>
        <div class="tab-content" id="myTab1Content"> 


            <!---general_tab--->
            <div aria-labelledby="General_tab" id="General" class="tab-pane fade active in gnrl title_head" role="tabpanel"> 


                <form id="myLenderFormGeneral" ng-submit="submitFormData('company/lenders/edit/<?php echo $lender->id; ?>', 'myLenderFormGeneral')" enctype="multipart/form-data">
                    <div class="col-md-12 general_dv clearfix ">
                        <input type="hidden" value="<?php echo rand(10, 100000); ?>">

                        <input type="hidden" name="data[Lender][id]" id="submittedId" value="<?php echo $lender->id; ?>" >
                        <h4 class="res_pdng">
                            <span class="title_spn1 ">General Information</span>
                        </h4>
                        <div class="col-md-3 col-sm-4 agg_log0 spc">
                            <div id="lenderLogo">
                                <?php
                                if (!empty($lender->logo)) {
                                    ?> 
                                    <img src="upload/Lenders/<?php echo $lender->logo; ?>" class="img-responsive"/>
                                    <?php
                                }
                                ?>
                            </div>
                            <div class="col-md-12 spc upimgae_btn ">

                                <div class="fileUpload btn btn-primary"> <!-- fileUpload -->
                                    <span>Change Image</span>
                                    <input id="uploadLenderLogo" type="file" class="upload" name="data[Lender][logo]" >

                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-sm-12 form_fields  ">


                                <div class="form-group">
                                    <label>Name</label> 
                                    <input type="text" placeholder="" class="form-control" name="data[Lender][name]" value="<?php echo $lender->name; ?>" >
                                </div>

                                <div class="form-group send_msg">
                                    <label>Relationship</label> 
                                    <select class="selectpicker col-md-8 spc" name="data[Lender][relationship]" >
                                        <option <?php if ($lender->relationship == 'broker') echo 'selected'; ?> value="broker">Broker</option>
                                        <option <?php if ($lender->relationship == 'correspondent') echo 'selected'; ?> value="correspondent">Correspondent</option>
                                        <option <?php if ($lender->relationship == 'principal_agent') echo 'selected'; ?> value="principal_agent">Principal Agent</option>
                                    </select>
                                </div>
                                <div class="form-group send_msg">
                                    <label>Status</label> 
                                    <select class="selectpicker col-md-8 spc" name="data[Lender][status]" >
                                        <option <?php if ($lender->status == '1') echo 'selected'; ?> value="1">Active</option>
                                        <option <?php if ($lender->status == '0') echo 'selected'; ?> value="0">Inactive</option>
                                    </select>
                                </div>



                            </div>     
                            <div class="col-md-4 col-sm-12  form_fields ">
                                <div class="form-group">
                                    <label>Broker Code</label> 
                                    <input type="text" name="data[Lender][broker_code]" placeholder="" class="form-control" value="<?php echo $lender->broker_code; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Approval date</label> 
                                    <input type="text" class="form-control datepicker" name="data[Lender][approval_date]" value="<?php echo $lender->approval_date; ?>">
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 text-center spc btm_btns marg_5">
                        <input type="submit" class="btm_btns"  value="Save" />
                        <!--<a class=" cncel_btn" href="#">Cancel</a>-->
                    </div>
                </form>

            </div>
            <!---general_tab end--->


            <!---Address_Tab--->
            <div aria-labelledby="addresses_tab" id="address" class="tab-pane fade title_head" role="tabpanel"> 
                <form id="myLenderFormAddress" ng-submit="submitFormData('company/lenders/edit/<?php echo $lender->id; ?>', 'myLenderFormAddress')" enctype="multipart/form-data">
                    <input type="hidden" name="data[Lender][id]" id="submittedId" value="<?php echo $lender->id; ?>" >
                    <div class="col-md-12 general_dv adrs adres_tab">

                        <h4 class="res_pdng"> <span class="title_spn1 ">Lender URLs</span></h4>

                        <div class="col-md-12 spc form_fields  ">
                            <div class="width_res_reso">
                                <div class="table-responsive manage_licsn_tabl high_res ">
                                    <table class="table">
                                        <tr>
                                            <th></th>
                                            <th class="padd_lft" >URL</th>
                                            <th class="padd_lft">Login ID</th>
                                            <th class="padd_lft">Password</th>
                                        </tr>
                                        <tbody>
                                            <tr> 
                                                <td>Retail</td>
                                                <td>   
                                                    <input type="text" class="form-control" placeholder="Enter URL" name="data[Lender][retail_url]" value="<?php echo $lender->retail_url; ?>">
                                                </td>
                                                <td>   
                                                    <input type="text" class="form-control" placeholder="Enter Login ID" name="data[Lender][retail_login_id]" value="<?php echo $lender->retail_login_id; ?>">
                                                </td>
                                                <td>   
                                                    <input type="text" class="form-control"  placeholder="Enter Password" name="data[Lender][retail_password]" value="<?php echo $lender->retail_password; ?>">
                                                </td> 
                                            </tr>
                                            <tr> 
                                                <td>Wholesale</td>
                                                <td>   
                                                    <input type="text" class="form-control" placeholder="Enter URL" name="data[Lender][wholesale_url]" value="<?php echo $lender->wholesale_url; ?>">
                                                </td>
                                                <td>   
                                                    <input type="text" class="form-control" placeholder="Enter Login ID" name="data[Lender][wholesale_login_id]" value="<?php echo $lender->wholesale_login_id; ?>">
                                                </td>
                                                <td>   
                                                    <input type="text" class="form-control"  placeholder="Enter Password" name="data[Lender][wholesale_password]" value="<?php echo $lender->wholesale_password; ?>">
                                                </td>
                                            </tr>
                                            <tr> 
                                                <td>Borker Login</td> 
                                                <td>   
                                                    <input type="text" class="form-control" placeholder="Enter URL" name="data[Lender][borker_url]" value="<?php echo $lender->borker_url; ?>">
                                                </td>
                                                <td>   
                                                    <input type="text" class="form-control" placeholder="Enter Login ID" name="data[Lender][borker_login_id]" value="<?php echo $lender->borker_login_id; ?>">
                                                </td>
                                                <td>   
                                                    <input type="text" class="form-control"  placeholder="Enter Password" name="data[Lender][borker_password]" value="<?php echo $lender->borker_password; ?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Marketing</td> 
                                                <td>   
                                                    <input type="text" class="form-control" placeholder="Enter URL" name="data[Lender][marketing_url]" value="<?php echo $lender->marketing_url; ?>">
                                                </td>
                                                <td>   
                                                    <input type="text" class="form-control" placeholder="Enter Login ID" name="data[Lender][marketing_login_id]" value="<?php echo $lender->marketing_login_id; ?>">
                                                </td>
                                                <td>   
                                                    <input type="text" class="form-control"  placeholder="Enter Password" name="data[Lender][marketing_password]" value="<?php echo $lender->marketing_password; ?>">
                                                </td> 
                                            </tr>
                                        </tbody> 
                                    </table>
                                </div>
                            </div>
                            <h4><span class="title_spn1 ">Lender Mailing Address</span></h4>
                            <div class="width_res_reso">
                                <div class="col-md-6 spc mailing_address  clearfix">
                                    <div class="form-group ">
                                        <label class="col-sm-4 res_spc1 control-label">Address 1</label>
                                        <div class="col-sm-8 res_spc1 high_width">
                                            <input type="text" placeholder="Enter Address 1" class="form-control" name="data[Lender][address1]" value="<?php echo $lender->address1; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group ">

                                        <label class="col-sm-4  res_spc1  control-label">Address 2</label>
                                        <div class="col-sm-8 res_spc1 ">
                                            <input type="text" placeholder="Enter Address 2" class="form-control" name="data[Lender][address2]" value="<?php echo $lender->address2; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="col-sm-4 res_spc1 control-label">City</label>
                                        <div class="col-sm-8 res_spc1 act_cls ">
                                            <input type="text" placeholder="City" class="form-control" name="data[Lender][city]" value="<?php echo $lender->city; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="col-sm-4 res_spc1  control-label">State</label>
                                        <div class="col-sm-8 res_spc1 send_msg">
                                            <select class="selectpicker col-md-8 spc" name="data[Lender][state_id]">
                                                <option value="0">Select State</option>
                                                <?php
                                                foreach ($states as $key => $value) {
                                                    $selected = "";
                                                    if ($value->id == $lender->id) {
                                                        $selected = "selected";
                                                    }
                                                    ?> 
                                                    <option <?php echo $selected; ?> value="<?php echo $value->id; ?>"><?php echo $value->state; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="col-sm-4 res_spc1  control-label">Zip Code</label>
                                        <div class="col-sm-8 res_spc1 send_msg">
                                            <input type="text" placeholder="Zip Code" class="form-control" name="data[Lender][zipcode]" value="<?php echo $lender->zipcode; ?>" pattern="[0-9]{1,5}" title="Zip Code should be 5 number only">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-10 spc clearfix">
                                    <h5>Notes for Administration</h5>
                                    <textarea rows-="" cols="" name="data[Lender][notes]"><?php echo $lender->notes; ?></textarea>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                    </div>
                    <div class="col-md-12 text-center spc btm_btns">
                        <input type="submit" class="btm_btns"  value="Save" />
                        <!--<a class=" cncel_btn" href="#">Cancel</a>-->
                    </div>
                </form>
            </div>

            <!---Address_Tab end--->



            <!---Contact Tab-->
            <div aria-labelledby="Contacts_dv" id="Contact" class="tab-pane fade title_head" role="tabpanel"> 
                <div class="col-md-12 general_dv ">
                    <h4><span class="title_spn1">Lender Contacts</span><span class="new_btn"> 
                            <a ng-click="openPopUp('get', 'company/lenders/addcontact?lender_id=<?php echo $lender->id; ?>', 'new_lender ad_cntcts')" href="#" class="com_admin_btns" data-toggle="modal" data-target="#addcontacts">Add Contact</a>
                        </span>
                    </h4>
                    <div class="table-responsive manage_licsn_tabl license_user">
                        <table class="table table-striped table-hover ">
                            <tr class="bg_white">
                                <th class="padd_15lft">Name</th>
                                <th  class="padd_15lft">Type</th>
                                <th  class="padd_15lft" > Title</th>
                                <th  class="padd_15lft" > Cell Phone</th>
                                <th  colspan="2" class="padd_15lft">Actions</th>
                            </tr>
                            <tbody id="allcontacts" >
                                <?php
                                if (isset($contacts) && !empty($contacts)) {
                                    foreach ($contacts as $key => $value) {
                                        $getstates = json_decode($value->states);
//                                        pr($getstates);
                                        ?> 
                                        <tr id="lenderContactUnit<?php echo $value->id; ?>">


                                            <td> 
                                                <a class="name myTooltip" href="javascript:" id="myTooltip_<?php echo $value->id; ?>"><?php echo $value->firstname; ?> <?php echo $value->lastname; ?></a>
                                                <span id="review_<?php echo $value->id; ?>" style="display: none;">
                                                    <p>Name : <?php echo $value->firstname; ?> <?php echo $value->lastname; ?></p>
                                                    <p>Title : <?php echo $value->title; ?></p>
                                                    <p>Type : <?php echo $value->types; ?></p>
                                                    <p>Work Phone : <?php echo $value->workphone; ?></p>
                                                    <p>Cell Phone : <?php echo $value->cellphone; ?></p>
                                                    <p>Fax : <?php echo $value->fax; ?></p>
                                                    <p>Email : <?php echo $value->email; ?></p>
                                                    <p>State Assigned <br><?php
                                                        if ($getstates) {
                                                            if(count($getstates)==51){
                                                                echo 'All Selected';
                                                            }else{
                                                                echo implode('<br>', $getstates);
                                                            }
                                                            
                                                        } else {
                                                            echo "No State";
                                                        }
                                                        ?></p>
                                                    
                                                </span>
                                                <script type="text/javascript">
                                                $(document).ready(function () {
                                                    $("#myTooltip_<?php echo $value->id; ?>").tooltip({
                                                        title: $("#review_<?php echo $value->id; ?>").html(),
                                                        html: true,
                                                        placement: 'right'
                                                    });
                                                });
                                            </script>
                                            </td>
                                            <td class="types"> <?php echo $value->types; ?></td>
                                            <td ><a href="#" class="title"><?php echo $value->title; ?> </a></td>
                                            <td class="cellphone"><?php echo $value->cellphone; ?></td>
                                            <td class="text-center cus_pro_td">
                                                <a href="javascript:" ng-click="openPopUp('get', 'company/lenders/editcontact/<?php echo $value->id; ?>', 'new_lender ad_cntcts')">
                                                    <img alt="" src="images/edit.png"> <span class="icons_cls">Edit</span>
                                                </a>
                                            </td>
                                            <td class="text-center cus_pro_td">
                                                <a href="javascript:" ng-click="deleteRecords('lenderContactUnit<?php echo $value->id; ?>', 'company/lenders/deletecontact/<?php echo $value->id; ?>')">
                                                    <img alt="" src="images/trash.png"><span class="icons_cls">Trash</span>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <tr id="nolendercontact"> 
                                        <td colspan="5" style="text-align: center;"> No Record Found!</td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody> 
                        </table>

                        

                    </div> 

                    <h4><span class="title_spn1">Mortgage Clauses</span><span class="new_btn mort_btn"> 
                            <a ng-click="openPopUp('get', 'company/lenders/addmortgagecontact?lender_id=<?php echo $lender->id; ?>', 'new_lender mortgagee')" href="#" class="com_admin_btns" data-toggle="modal" data-target="#Mortgageecontacts">Add Mortgagee Clause</a>
                        </span></h4>
                    <div class="table-responsive manage_licsn_tabl license_user">
                        <table class="table table-striped table-hover ">
                            <tr class="bg_white">
                                <th class="padd_15lft">Name</th>
                                <th  colspan="2" class="padd_15lft">Actions</th>
                            </tr>
                            <tbody id="allmortgagecontacts">
                                <?php
                                if (isset($mortgagecontacts) && !empty($mortgagecontacts)) {
                                    foreach ($mortgagecontacts as $key => $value) {
                                        $getstates = json_decode($value->states);
                                        ?> 
                                        <tr id="lenderMortgageContactsUnit<?php echo $value->id; ?>"> 
                                            <td> 
                                                <a class="fullname" href="javascript:" id="myTooltip1_<?php echo $value->id; ?>" >
        <?php echo $value->fullname; ?> 
                                                </a>
                                                
                                                
                                                <span id="review1_<?php echo $value->id; ?>" style="display: none;">
                                                    <p>Name : <?php echo $value->fullname; ?> </p>
                                                    <p>Address 1 : <?php echo $value->address1; ?></p>
                                                    <p>Address 2 : <?php echo $value->address2; ?></p>
                                                    <p>City : <?php echo $value->city; ?></p>
                                                    <p>State : <?php echo $value->state; ?></p>
                                                    <p>Zip : <?php echo $value->zipcode; ?></p>
                                                    <p>State Assigned <br><?php
                                                        if ($getstates) {
                                                            if(count($getstates)==51){
                                                                echo 'All Selected';
                                                            }else{
                                                                echo implode('<br>', $getstates);
                                                            }
                                                            
                                                        } else {
                                                            echo "No State";
                                                        }
                                                        ?>
                                                    </p>
                                                    
                                                </span>
                                                
                                                
                                                <script type="text/javascript">
                                                $(document).ready(function () {
                                                    $("#myTooltip1_<?php echo $value->id; ?>").tooltip({
                                                        title: $("#review1_<?php echo $value->id; ?>").html(),
                                                        html: true,
                                                        placement: 'right'
                                                    });
                                                });
                                            </script>
                                                
                                                
                                            </td>
                                            <td class="text-center cus_pro_td">
                                                <a href="javascript:" ng-click="openPopUp('get', 'company/lenders/editmortgagecontact/<?php echo $value->id; ?>', 'new_lender ad_cntcts')"><img src="images/edit.png" alt=""> <span class="icons_cls">Edit</span></a>
                                            </td>
                                            <td class="text-center cus_pro_td">
                                                <a href="javascript:" ng-click="deleteRecords('lenderMortgageContactsUnit<?php echo $value->id; ?>', 'company/lenders/deletemortgagecontact/<?php echo $value->id; ?>')"><img alt="" src="images/trash.png"><span class="icons_cls">Trash</span></a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <tr id="nolendermortgagecontact"> 
                                        <td colspan="5" style="text-align: center;"> No Record Found!</td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody> 
                        </table>
                    </div> 
                </div>
            </div>
            <!---Contact Tab end-->   


            <!---notice Tab-->
            <div aria-labelledby="notices_dv" id="notice" class="tab-pane fade title_head" role="tabpanel"> 
                <div class="col-md-12 general_dv docu noticediv ">
                    <h4><span class="title_spn1">Lender Notice Creator</span><span class="new_btn"> <a ng-click="openPopUp('get', '/developer/company/lenders/addnotice?lender_id=<?php echo $lender->id; ?>', 'new_lender createnotice')" data-target="#create_notice" data-toggle="modal" class="com_admin_btns" href="javascript:">Create Notice</a></span></h4>
                    <div class="table-responsive manage_licsn_tabl license_user">
                        <table class="table table-striped table-hover ">
                            <tbody><tr class="bg_white">
                                    <th class="padd_15lft">Date</th>
                                    <th class="padd_15lft">Subject</th>
                                    <th class="text-left padd_15lft" colspan="2">Actions</th>
                                </tr>

                            </tbody>
                            <tbody id="allnotices">

                                <?php
                                if (isset($notices) && !empty($notices)) {
                                    foreach ($notices as $key => $value) {
                                        ?> 
                                        <tr id="lenderNoticeUnit<?php echo $value->id; ?>"> 
                                            <td class="date"> <?php echo date('M d, Y', strtotime($value->created)); ?></td>
                                            <td class="subject"><?php echo $value->subject; ?></td>
                                            <td class="text-center cus_pro_td">
                                                <a href="javascript:" ng-click="openPopUp('get', 'company/lenders/editnotice/<?php echo $value->id; ?>', 'new_lender createnotice')"><img src="images/edit.png" alt=""> <span class="icons_cls">Edit</span></a>
                                            </td>
                                            <td class="text-center cus_pro_td">
                                                <a href="javascript:" ng-click="deleteRecords('lenderNoticeUnit<?php echo $value->id; ?>', 'company/lenders/deletenotice/<?php echo $value->id; ?>')"><img alt="" src="images/trash.png"><span class="icons_cls">Trash</span></a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <tr id="nolendernotice"> 
                                        <td colspan="4" style="text-align: center;"> No Record Found!</td>
                                    </tr>
                                    <?php
                                }
                                ?>


                            </tbody> 
                        </table>
                    </div> 
                </div>
            </div>

            <!---notice Tab end---->


            <!---Tips Tab-->
            <div aria-labelledby="tips_dv" id="tips" class="tab-pane fade title_head" role="tabpanel"> 
                <div class="col-md-12 general_dv mCustomScrollbar _mCS_1">
                    <h4><span class="title_spn1 ">Tips</span> <span class="new_btn"> 
                            <a href="#" class="com_admin_btns" ng-click="openPopUp('get', 'company/lenders/addtips?lender_id=<?php echo $lender->id; ?>', 'new_lender newtip')">Create New Tip</a>
                        </span></h4>
                    <div class="table-responsive manage_licsn_tabl license_user">
                        <table class="table table-striped table-hover ">
                            <tr class="bg_white">
                                <th class="padd_15lft">Posted </th>
                                <th  class="padd_15lft">Tip</th>
                                <th class="padd_15lft"  class="text-center">
                                    Actions
                                </th>
                            </tr>
                            <tbody id="alltips">
                                <?php
                                if (isset($tips) && !empty($tips)) {
                                    foreach ($tips as $key => $value) {
                                        ?> 
                                        <tr id="lenderTipsUnit<?php echo $value->id; ?>"> 
                                            <td class="date"> <?php echo date('m-d-Y', strtotime($value->created)); ?></td>
                                            <td class="message"><?php echo $value->message; ?></td>
                                               <td class="text-center cus_pro_td">
                                                <a href="javascript:" ng-click="openPopUp('get', 'company/lenders/edittips/<?php echo $value->id; ?>', 'new_lender ad_cntcts')"><img src="images/edit.png" alt=""> <span class="icons_cls">Edit</span></a>
                                            </td>
                                            <td class="text-center cus_pro_td">
                                                <a href="javascript:" ng-click="deleteRecords('lenderTipsUnit<?php echo $value->id; ?>', 'company/lenders/deletetips/<?php echo $value->id; ?>')"><img alt="" src="images/trash.png"><span class="icons_cls">Trash</span></a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <tr id="nolendertips"> 
                                        <td colspan="4" style="text-align: center;"> No Record Found!</td>
                                    </tr>
                                    <?php
                                }
                                ?>

                            </tbody> 
                        </table>
                    </div>
                </div>
            </div>
            <!---Tips Tab end-->


            <!---Note Tab-->
            <div aria-labelledby="Note_dv" id="Notes" class="tab-pane fade title_head" role="tabpanel"> 
                <div class="col-md-12 general_dv clearfix">
                    <h4><span class="title_spn1 ">Notes</span><span class="new_btn"> 
                            <a href="#" class="com_admin_btns" ng-click="openPopUp('get', 'company/lenders/addnotes?lender_id=<?php echo $lender->id; ?>', 'new_lender adnote')">Add Note</a>
                        </span></h4>
                    <div class="table-responsive manage_licsn_tabl license_user">
                        <table class="table table-striped table-hover ">
                            <tr class="bg_white">
                                <th class="padd_15lft">Posted </th>
                                <th  class="padd_15lft">Notes</th>
                                <th  class="padd_15lft" colspan="2" class="text-center">Actions</th>
                            </tr>
                            <tbody id="allnotes">

                                <?php
                                if (isset($notes) && !empty($notes)) {
                                    foreach ($notes as $key => $value) {
                                        ?> 
                                        <tr id="lenderNotesUnit<?php echo $value->id; ?>"> 
                                            <td class="date"> <?php echo date('M d, Y', strtotime($value->created)); ?></td>
                                            <td class="tips">
                                                 
                                                    <a href="javascript:" ng-click="openPopUp('get', '/developer/company/lenders/fullnote/<?php echo $value->id; ?>', 'new_lender adnote')" >
                                 <?php echo substr($value->tips,0,200);  ?>  
                                                    </a>
                                            </td>
                                            <td class="text-center cus_pro_td">
                                                <a href="javascript:" ng-click="openPopUp('get', 'company/lenders/editnotes/<?php echo $value->id; ?>', 'new_lender adnote')"><img src="images/edit.png" alt=""> <span class="icons_cls">Edit</span></a>
                                            </td>
                                            <td class="text-center cus_pro_td">
                                                <a href="javascript:" ng-click="deleteRecords('lenderNotesUnit<?php echo $value->id; ?>', 'company/lenders/deletenotes/<?php echo $value->id; ?>')"><img alt="" src="images/trash.png"><span class="icons_cls">Trash</span></a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <tr id="nolendernotes"> 
                                        <td colspan="4" style="text-align: center;"> No Record Found!</td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody> 
                        </table>
                    </div> 
                </div>
            </div>
            <!----Note Tab end-->



            <!------Document Tab---->
            <div aria-labelledby="Docu_dv" id="Documents" class="tab-pane fade title_head" role="tabpanel"> 
                <div class="col-md-12 general_dv docu mCustomScrollbar _mCS_1">
                    <h4><span class="title_spn1 ">Lender Documents</span><span class="new_btn"> 
                            <a href="#" class="com_admin_btns" ng-click="openPopUp('get', 'company/lenders/adddocument?lender_id=<?php echo $lender->id; ?>', 'new_lender addoc')">Add Document</a>
                        </span></h4>
                    <div class="table-responsive manage_licsn_tabl license_user">
                        <table class="table table-striped table-hover ">
                            <tr class="bg_white">
                                <th class="padd_15lft">Date</th>
                                <th  class="padd_15lft">Document Description</th>
                                <th  class="padd_15lft">Size</th>
                                <th  class="padd_15lft">Type</th>
                                <th class="padd_15lft "  colspan="2" class="text-center">Actions</th>
                            </tr>
                            <tbody id="alldocuments">
                                <?php
                                if (isset($documents) && !empty($documents)) {
                                    foreach ($documents as $key => $value) {
                                        ?> 
                                        <tr id="lenderDocumentUnit<?php echo $value->id; ?>"> 
                                            <td class="date"> 
                                                <?php echo date('M d, Y', strtotime($value->created)); ?>
                                            </td>
                                            <td class="name">
                                                <?php echo $value->name; ?>
                                            </td>
                                            <td class="size">
                                                <?php 
                                                //echo $this->Custom->convertSize($value->size); 
                                                if ($value->size > 0) {
                                                    $unit = intval(log($value->size, 1024));
                                                    $units = array('B', 'KB', 'MB', 'GB');
                                                    if (array_key_exists($unit, $units) === true) {
                                                        echo sprintf('%d %s', $value->size / pow(1024, $unit), $units[$unit]);
                                                    }
                                                }
                                                
                                                ?>
                                            <td class="size">
        <?php echo $value->extension; ?>
                                            </td>
                                            <td class="text-center cus_pro_td">
                                                <a href="company/lenders/opendocument/<?php echo $value->id; ?>" target="_blank"><img src="images/openfile.png" alt=""> <span class="icons_cls">Open File</span></a>
                                            </td>
                                            <td class="text-center cus_pro_td">
                                                <a href="javascript:" ng-click="deleteRecords('lenderDocumentUnit<?php echo $value->id; ?>', 'company/lenders/deletedocument/<?php echo $value->id; ?>')"><img alt="" src="images/trash.png"><span class="icons_cls">Trash</span></a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <tr id="nolenderdoc"> 
                                        <td colspan="5" style="text-align: center;"> No Record Found!</td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody> 
                        </table>
                    </div> 
                </div>
            </div>
            <!------Document Tab end---->


            <!------fee Tab---->
            <div aria-labelledby="Fee_dv" id="Fees" class="tab-pane fade  feedv title_head" role="tabpanel"> 
                <div class="col-md-12 general_dv clearfix">

                    <div class="col-md-12 spc form_fields"> 
                        <h4 class="res_pdng"><span class="title_spn1">Servicing and Loan Fees</span></h4>
                        <div class="row">
                            <div class="form-group ">

                                <label class="col-sm-3  control-label">Minimum LOC Balance</label>
                                <div class="col-sm-3 high_width">
                                    <input type="text" class="form-control currency" placeholder="S100.00" value="<?php echo $lender->min_loc_balance; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group ">

                                <label class="col-sm-3  control-label">Loan Servicing Charge</label>
                                <div class="col-sm-3 high_width">
                                    <input type="text" class="form-control currency" placeholder="S25.00" value="<?php echo $lender->loan_servicing_charge; ?>">
                                </div>
                            </div>
                        </div>
                        <h4 class="martp20 fee_title">
                            <span class="title_spn1">Loan Fees
                            </span>
                            <span class="new_btn"> 
                                <a class="com_admin_btns" ng-click="openPopUp('get', 'company/lenders/addfees?lender_id=<?php echo $lender->id; ?>', 'new_lender addfee_popup')" href="javascript:" >Add Fees
                                </a>
                            </span>
                        </h4>
                        <div class="table-responsive manage_licsn_tabl license_user">
                            <table class="table table_wdth" >
                                <tr class="bg_white">
                                    <th >HUD#</th>
                                    <th  class="padd_15lft wid-100">Description </th>
                                    <th  class="padd_15lft wid-100" >Amount</th>
                                    <th class="padd_15lft width_td"></th>
                                </tr>
                                <tbody ng-init="getHudLenderFee('<?php echo $lender->id; ?>')" ng-bind-html="lenderHudFees" addpopup>
                                </tbody> 
                            </table>
                        </div> 
                    </div>

                </div>
            </div>

            <!------fee Tab end---->


        </div>
    </div>

    <div class="clearfix"></div> 
</div>