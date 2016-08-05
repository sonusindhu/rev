
<div aria-labelledby="managelenders" id="manage_lenders" class="tab-pane fade active in  " role="tabpanel"> 

    <div class="col-md-12 companyadmin_outer ">
        <div class="col-md-12 spc form_fields spc  ">
            <form>
                <input type="hidden" value="<?php echo rand(10, 100000); ?>">
                <div class="col-md-12 spc paddbtm30 sep_div">
                    <h3>Lenders<span><a class="com_admin_btns" href="#"data-toggle="modal" data-target="#createnewlender" >Create New Lender</a></span> </h3>
                    <div class="table-responsive manage_licsn_tabl license_user lender">
                        <table class="table table-striped table-hover">
                            <tr class="bg_white">
                                <th class="padd_15lft">Lender</th>
                                <th  class="padd_15lft">Status</th>
                                <th  class="padd_15lft" >Action </th>
                            </tr>
                            <tbody>
                                <?php
                                if (isset($lenders) and ! empty($lenders)) {
                                    foreach ($lenders as $key => $value) {
                                        $status = '';
                                        if ($value['Lender']['status'])
                                            $status = "active";
                                        ?>
                                        <tr > 
                                            <td ><?php echo $value['Lender']['name']; ?></td>
                                            <td><button id="<?php echo $value['Lender']['id']; ?>" class="activeLenders btn btn-default <?php echo $status; ?>" type="button"></button></td>
                                            <td>
                                                <a class="editLenders" href="javascript:" id="<?php echo $value['Lender']['id']; ?>">
                                                    <img src="<?php echo BASE_URL ?>images/edit.png" alt=""/>
                                                </a>
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


            </form>
        </div>


    </div>


</div> 


<!-------Edit Lender popup--------->
<div class="modal fade new_lender" id="createnewlender" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header ">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><img alt="" src="<?php echo BASE_URL ?>images/close_icon.png"></button>
                <h4 class="modal-title" id="myModalLabel">Edit Lender</h4>
            </div>
            <div class="modal-body ">

                <div data-example-id="togglable-tabs" class="bs-example bs-example-tabs">
                    <ul role="tablist" class="nav nav-tabs" id="myTabs1"> 
                        <li class="active" role="presentation"><a aria-expanded="true" aria-controls="home" data-toggle="tab" role="tab" id="General_tab" href="#General">General</a></li>
                        <li role="presentation" class=""><a aria-controls="profile" data-toggle="tab" id="addresses_tab" role="tab" href="#address" aria-expanded="false">Addresses</a></li>
                        <li role="presentation" class=""><a aria-controls="profile" data-toggle="tab" id="Contacts_dv" role="tab" href="#Contact" aria-expanded="false">Contacts</a></li>
                        <li role="presentation" class=""><a aria-controls="profile" data-toggle="tab" id="notices_dv" role="tab" href="#notice" aria-expanded="false">Notices</a></li>
                        <li role="presentation" class=""><a aria-controls="profile" data-toggle="tab" id="tips_dv" role="tab" href="#tips" aria-expanded="false">Tips</a></li>

                        <li role="presentation" class=""><a aria-controls="profile" data-toggle="tab" id="Note_dv" role="tab" href="#Notes" aria-expanded="false">Notes</a></li>
                        <li role="presentation" class=""><a aria-controls="profile" data-toggle="tab" id="Docu_dv" role="tab" href="#Documents" aria-expanded="false">Documents</a></li>
                        <li role="presentation" class=""><a aria-controls="profile" data-toggle="tab" id="Fee_dv" role="tab" href="#Fees" aria-expanded="false">Fees</a></li>

                    </ul>
                    <div class="tab-content" id="myTabContent"> 
                        <div aria-labelledby="General_tab" id="General" class="tab-pane fade active in" role="tabpanel"> 
                            <div class="col-md-12 general_dv clearfix mCustomScrollbar _mCS_1">
                                <h4>General Information</h4>
                                <div class="col-md-3 col-sm-4 agg_log0">
                                    <img src="<?php echo BASE_URL ?>images/aag_logo.png" alt="" class="img-responsive"/>
                                    <div class="col-md-12 spc upimgae_btn ">
                                        <div class="fileUpload btn btn-primary">
                                            <span>Change Image</span>
                                            <input type="file" class="upload">
                                        </div>
                                    </div> 
                                </div>

                                <div class="col-md-9 col-sm-8   fields_padd ">
                                    <div class="col-md-12 spc form_fields spc  ">
                                        <form>
                                            <div class="form-group">
                                                <label>Name</label> 
                                                <input type="email" placeholder="" class="form-control">
                                            </div>

                                            <div class="form-group send_msg">
                                                <label>Relationship</label> 
                                                <select class="selectpicker col-md-8 spc">
                                                    <option>Broker</option>
                                                    <option>Broker</option>
                                                    <option>Broker</option>
                                                </select>
                                            </div>
                                            <div class="form-group send_msg">
                                                <label>Status</label> 
                                                <select class="selectpicker col-md-8 spc">
                                                    <option>Broker</option>
                                                    <option>Broker</option>
                                                    <option>Broker</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Broker Code</label> 
                                                <input type="email" placeholder="" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Approval date</label> 
                                                <input type="email" placeholder="" class="form-control">
                                            </div>

                                        </form>
                                    </div>
                                </div>









                            </div>


                        </div>
                        <div aria-labelledby="addresses_tab" id="address" class="tab-pane fade " role="tabpanel"> 
                            <div class="col-md-12 general_dv adrs mCustomScrollbar _mCS_1">
                                <h4>Lender URLs</h4>


                                <div class="col-md-12 spc form_fields  ">
                                    <form>

                                        <div class="table-responsive manage_licsn_tabl high_res ">
                                            <table class="table">
                                                <tr>
                                                    <th></th>
                                                    <th class="padd_lft">Login Id</th>
                                                    <th class="padd_lft">Password</th>
                                                </tr>
                                                <tbody>
                                                    <tr> 

                                                        <td>Retail</td>
                                                        <td>   <input type="email" class="form-control" placeholder=""></td>
                                                        <td>   <input type="email" class="form-control"  placeholder=""></td> 
                                                    </tr>
                                                    <tr> 

                                                        <td>Wholesale</td>
                                                        <td>   <input type="email" class="form-control"  placeholder=""></td>
                                                        <td>   <input type="email" class="form-control" placeholder=""></td> 
                                                    </tr>
                                                    <tr> 

                                                        <td>Borker Login</td> 
                                                        <td>   <input type="email" class="form-control"  placeholder=""></td>
                                                        <td>   <input type="email" class="form-control"  placeholder=""></td> 
                                                    </tr>
                                                    <tr> 

                                                        <td>Marketing</td> 
                                                        <td>   <input type="email" class="form-control"  placeholder=""></td>
                                                        <td>   <input type="email" class="form-control"  placeholder=""></td> 
                                                    </tr>
                                                </tbody> 
                                            </table>
                                        </div>


                                        <h4>Lender Mailing Address</h4>

                                        <div class="mailing_address ">
                                            <div class="form-group ">

                                                <label class="col-sm-4 res_spc1 control-label">Address1</label>
                                                <div class="col-sm-8 res_spc1 high_width">
                                                    <input type="email" placeholder="Enter Address1" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group ">

                                                <label class="col-sm-4 res_spc1  control-label">State</label>
                                                <div class="col-sm-8 res_spc1 ">
                                                    <input type="email" placeholder="State" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group ">

                                                <label class="col-sm-4  res_spc1  control-label">Address2</label>
                                                <div class="col-sm-8 res_spc1 ">
                                                    <input type="email" placeholder="Enter Address2" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group ">

                                                <label class="col-sm-4 res_spc1  control-label">Zip Code</label>
                                                <div class="col-sm-8 res_spc1 send_msg">
                                                    <select class="selectpicker col-md-8 spc">
                                                        <option>Zip Code</option>
                                                        <option>Zip Code</option>
                                                        <option>Zip Code</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group ">

                                                <label class="col-sm-4 res_spc1 control-label">City</label>
                                                <div class="col-sm-8 res_spc1 act_cls ">
                                                    <input type="email" placeholder="City" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12 spc">
                                                <h5>Notes for Administration</h5>
                                                <textarea rows-="" cols=""></textarea>
                                            </div>
                                        </div>











                                        <div class="clearfix"></div>






                                    </form>
                                </div>









                            </div>


                        </div>
                        <div aria-labelledby="Contacts_dv" id="Contact" class="tab-pane fade " role="tabpanel"> 
                            <div class="col-md-12 general_dv mCustomScrollbar _mCS_1">
                                <h4>Lender Contacts<span class="new_btn"> <a href="#" class="com_admin_btns" data-toggle="modal" data-target="#addcontacts">Add Contacts</a></span></h4>


                                <div class="table-responsive manage_licsn_tabl license_user">
                                    <table class="table table-striped table-hover contcts">
                                        <tr class="bg_white">
                                            <th class="padd_15lft">First</th>
                                            <th  class="padd_15lft">Last</th>
                                            <th  class="padd_15lft" > Email</th>
                                            <th  colspan="2" class="text-center">Actions</th>




                                        </tr>

                                        <tbody>
                                            <tr> 

                                                <td > <a href="#">Mack</a></td>
                                                <td >Jordan</td>
                                                <td ><a href="#"> jordan234@gmail.com</a></td>

                                                <td class="text-center" colspan="2"><a href="#"><img src="<?php echo BASE_URL ?>images/edit.png" alt=""/></a>

                                                    <a href="#"><img src="<?php echo BASE_URL ?>images/trash.png" alt=""/></a></td>

                                            </tr>
                                            <tr> 

                                                <td > <a href="#">Mack</a></td>
                                                <td >Jordan</td>
                                                <td ><a href="#"> jordan234@gmail.com</a></td>

                                                <td class="text-center" colspan="2"><a href="#"><img src="<?php echo BASE_URL ?>images/edit.png" alt=""/></a>

                                                    <a href="#"><img src="<?php echo BASE_URL ?>images/trash.png" alt=""/></a></td>

                                            </tr>
                                            <tr> 

                                                <td > <a href="#">Mack</a></td>
                                                <td >Jordan</td>
                                                <td ><a href="#"> jordan234@gmail.com</a></td>

                                                <td class="text-center" colspan="2"><a href="#"><img src="<?php echo BASE_URL ?>images/edit.png" alt=""/></a>

                                                    <a href="#"><img src="<?php echo BASE_URL ?>images/trash.png" alt=""/></a></td>

                                            </tr>
                                            <tr> 

                                                <td > <a href="#">Mack</a></td>
                                                <td >Jordan</td>
                                                <td ><a href="#"> jordan234@gmail.com</a></td>

                                                <td class="text-center" colspan="2"><a href="#"><img src="<?php echo BASE_URL ?>images/edit.png" alt=""/></a>

                                                    <a href="#"><img src="<?php echo BASE_URL ?>images/trash.png" alt=""/></a></td>

                                            </tr>


                                        </tbody> 
                                    </table>
                                </div> 

                                <h4>Lender Mortgagee Contacts<span class="new_btn mort_btn"> <a href="#" class="com_admin_btns" data-toggle="modal" data-target="#Mortgageecontacts">Add Mortgagee Contacts</a></span></h4>


                                <div class="table-responsive manage_licsn_tabl license_user">
                                    <table class="table table-striped table-hover contcts">
                                        <tr class="bg_white">
                                            <th class="padd_15lft">Name</th>

                                            <th  colspan="2" class="text-center">Actions</th>




                                        </tr>

                                        <tbody>
                                            <tr> 

                                                <td > <a href="#">Mack</a></td>


                                                <td class="text-center" colspan="2"><a href="#"><img src="<?php echo BASE_URL ?>images/edit.png" alt=""/></a>

                                                    <a href="#"><img src="<?php echo BASE_URL ?>images/trash.png" alt=""/></a></td>

                                            </tr>
                                            <tr> 

                                                <td > <a href="#">Mack</a></td>


                                                <td class="text-center" colspan="2"><a href="#"><img src="<?php echo BASE_URL ?>images/edit.png" alt=""/></a>

                                                    <a href="#"><img src="<?php echo BASE_URL ?>images/trash.png" alt=""/></a></td>

                                            </tr>
                                            <tr> 

                                                <td > <a href="#">Mack</a></td>


                                                <td class="text-center" colspan="2"><a href="#"><img src="<?php echo BASE_URL ?>images/edit.png" alt=""/></a>

                                                    <a href="#"><img src="<?php echo BASE_URL ?>images/trash.png" alt=""/></a></td>

                                            </tr>
                                            <tr> 

                                                <td > <a href="#">Mack</a></td>


                                                <td class="text-center" colspan="2"><a href="#"><img src="<?php echo BASE_URL ?>images/edit.png" alt=""/></a>

                                                    <a href="#"><img src="<?php echo BASE_URL ?>images/trash.png" alt=""/></a></td>

                                            </tr>


                                        </tbody> 
                                    </table>
                                </div> 







                            </div>


                        </div>

                        <div aria-labelledby="notices_dv" id="notice" class="tab-pane fade " role="tabpanel"> 
                            <div class="col-md-12 general_dv docu mCustomScrollbar _mCS_1">
                                <h4>Lender Notice Creator<span class="new_btn"> <a href="#" class="com_admin_btns" data-toggle="modal" data-target="#create_notice">Create Notice</a></span></h4>


                                <div class="table-responsive manage_licsn_tabl license_user">
                                    <table class="table table-striped table-hover contcts">
                                        <tr class="bg_white">
                                            <th class="padd_15lft">Date</th>
                                            <th  class="padd_15lft">Subject</th>

                                            <th  colspan="2" class="text-center">Actions</th>




                                        </tr>

                                        <tbody>
                                            <tr> 

                                                <td > <a href="#">23 March 2015</a></td>
                                                <td >Better rates for High Loan amount !!</td>


                                                <td class="text-center" colspan="2"><a href="#"><img src="<?php echo BASE_URL ?>images/edit.png" alt=""/></a>

                                                    <a href="#"><img src="<?php echo BASE_URL ?>images/trash.png" alt=""/></a></td>

                                            </tr>
                                            <tr> 

                                                <td > <a href="#">23 March 2015</a></td>
                                                <td >Better rates for High Loan amount !!</td>


                                                <td class="text-center" colspan="2"><a href="#"><img src="<?php echo BASE_URL ?>images/edit.png" alt=""/></a>

                                                    <a href="#"><img src="<?php echo BASE_URL ?>images/trash.png" alt=""/></a></td>

                                            </tr>
                                            <tr> 

                                                <td > <a href="#">23 March 2015</a></td>
                                                <td >Better rates for High Loan amount !!</td>


                                                <td class="text-center" colspan="2"><a href="#"><img src="<?php echo BASE_URL ?>images/edit.png" alt=""/></a>

                                                    <a href="#"><img src="<?php echo BASE_URL ?>images/trash.png" alt=""/></a></td>

                                            </tr>
                                            <tr> 

                                                <td > <a href="#">23 March 2015</a></td>
                                                <td >Better rates for High Loan amount !!</td>


                                                <td class="text-center" colspan="2"><a href="#"><img src="<?php echo BASE_URL ?>images/edit.png" alt=""/></a>

                                                    <a href="#"><img src="<?php echo BASE_URL ?>images/trash.png" alt=""/></a></td>

                                            </tr>

                                        </tbody> 
                                    </table>
                                </div> 












                            </div>


                        </div>
                        <div aria-labelledby="tips_dv" id="tips" class="tab-pane fade " role="tabpanel"> 
                            <div class="col-md-12 general_dv mCustomScrollbar _mCS_1">
                                <h4>Tips<span class="refreshbtn"> <a href="#" class="com_admin_btns">Refresh</a></span><span class="new_btn"> <a href="#" class="com_admin_btns" data-toggle="modal" data-target="#Createnew_tip">Create New Tip</a></span></h4>


                                <div class="table-responsive manage_licsn_tabl license_user">
                                    <table class="table table-striped table-hover contcts">
                                        <tr class="bg_white">
                                            <th class="padd_15lft">Posted </th>
                                            <th  class="padd_15lft">Tip</th>

                                            <th  colspan="2" class="text-center">Actions</th>




                                        </tr>

                                        <tbody>
                                            <tr> 

                                                <td > <a href="#">23 March 2015</a></td>
                                                <td >Lender Paid 2/1 buydown  </td>


                                                <td class="text-center" colspan="2"><a href="#"><img src="<?php echo BASE_URL ?>images/edit.png" alt=""/></a>

                                                    <a href="#"><img src="<?php echo BASE_URL ?>images/trash.png" alt=""/></a></td>

                                            </tr>
                                            <tr> 

                                                <td > <a href="#">23 March 2015</a></td>
                                                <td >Lender Paid 2/1 buydown  </td>


                                                <td class="text-center" colspan="2"><a href="#"><img src="<?php echo BASE_URL ?>images/edit.png" alt=""/></a>

                                                    <a href="#"><img src="<?php echo BASE_URL ?>images/trash.png" alt=""/></a></td>

                                            </tr>
                                            <tr> 

                                                <td > <a href="#">23 March 2015</a></td>
                                                <td >Lender Paid 2/1 buydown  </td>


                                                <td class="text-center" colspan="2"><a href="#"><img src="<?php echo BASE_URL ?>images/edit.png" alt=""/></a>

                                                    <a href="#"><img src="<?php echo BASE_URL ?>images/trash.png" alt=""/></a></td>

                                            </tr>
                                            <tr> 

                                                <td > <a href="#">23 March 2015</a></td>
                                                <td >Lender Paid 2/1 buydown  </td>


                                                <td class="text-center" colspan="2"><a href="#"><img src="<?php echo BASE_URL ?>images/edit.png" alt=""/></a>

                                                    <a href="#"><img src="<?php echo BASE_URL ?>images/trash.png" alt=""/></a></td>

                                            </tr>

                                        </tbody> 
                                    </table>
                                </div> 












                            </div>


                        </div>
                        <div aria-labelledby="Note_dv" id="Notes" class="tab-pane fade " role="tabpanel"> 
                            <div class="col-md-12 general_dv mCustomScrollbar _mCS_1">
                                <h4>Notes<span class="refreshbtn"> <a href="#" class="com_admin_btns">Refresh</a></span><span class="new_btn"> <a href="#" class="com_admin_btns" data-toggle="modal" data-target="#addnotes">Add Notes</a></span></h4>


                                <div class="table-responsive manage_licsn_tabl license_user">
                                    <table class="table table-striped table-hover contcts">
                                        <tr class="bg_white">
                                            <th class="padd_15lft">Posted </th>
                                            <th  class="padd_15lft">Tip</th>

                                            <th  colspan="2" class="text-center">Actions</th>




                                        </tr>

                                        <tbody>
                                            <tr> 

                                                <td > <a href="#">23 March 2015</a></td>
                                                <td >Lender Paid 2/1 buydown  </td>


                                                <td class="text-center" colspan="2"><a href="#"><img src="<?php echo BASE_URL ?>images/edit.png" alt=""/></a>

                                                    <a href="#"><img src="<?php echo BASE_URL ?>images/trash.png" alt=""/></a></td>

                                            </tr>
                                            <tr> 

                                                <td > <a href="#">23 March 2015</a></td>
                                                <td >Lender Paid 2/1 buydown  </td>


                                                <td class="text-center" colspan="2"><a href="#"><img src="<?php echo BASE_URL ?>images/edit.png" alt=""/></a>

                                                    <a href="#"><img src="<?php echo BASE_URL ?>images/trash.png" alt=""/></a></td>

                                            </tr>
                                            <tr> 

                                                <td > <a href="#">23 March 2015</a></td>
                                                <td >Lender Paid 2/1 buydown  </td>


                                                <td class="text-center" colspan="2"><a href="#"><img src="<?php echo BASE_URL ?>images/edit.png" alt=""/></a>

                                                    <a href="#"><img src="<?php echo BASE_URL ?>images/trash.png" alt=""/></a></td>

                                            </tr>
                                            <tr> 

                                                <td > <a href="#">23 March 2015</a></td>
                                                <td >Lender Paid 2/1 buydown  </td>


                                                <td class="text-center" colspan="2"><a href="#"><img src="<?php echo BASE_URL ?>images/edit.png" alt=""/></a>

                                                    <a href="#"><img src="<?php echo BASE_URL ?>images/trash.png" alt=""/></a></td>

                                            </tr>

                                        </tbody> 
                                    </table>
                                </div> 












                            </div>


                        </div>
                        <div aria-labelledby="Docu_dv" id="Documents" class="tab-pane fade " role="tabpanel"> 
                            <div class="col-md-12 general_dv docu mCustomScrollbar _mCS_1">
                                <h4>Lender Documents<span class="new_btn"> <a href="#" class="com_admin_btns" data-toggle="modal" data-target="#Adddocumnts">Add Documents</a></span></h4>


                                <div class="table-responsive manage_licsn_tabl license_user">
                                    <table class="table table-striped table-hover contcts">
                                        <tr class="bg_white">
                                            <th class="padd_15lft">Date</th>
                                            <th  class="padd_15lft">Name</th>
                                            <th  class="padd_15lft">Size</th>

                                            <th  colspan="2" class="text-center">Actions</th>




                                        </tr>

                                        <tbody>
                                            <tr> 

                                                <td > <a href="#">23 March 2015</a></td>
                                                <td >Broker Agreement 2015  </td>
                                                <td>491KB</td>

                                                <td class="text-center" colspan="2"><a href="#"><img src="<?php echo BASE_URL ?>images/lockgreen.png" alt=""/></a>

                                                    <a href="#"><img src="<?php echo BASE_URL ?>images/trash.png" alt=""/></a></td>

                                            </tr>
                                            <tr> 

                                                <td > <a href="#">23 March 2015</a></td>
                                                <td >Broker Agreement 2015  </td>
                                                <td>491KB</td>

                                                <td class="text-center" colspan="2"><a href="#"><img src="<?php echo BASE_URL ?>images/lockgreen.png" alt=""/></a>

                                                    <a href="#"><img src="<?php echo BASE_URL ?>images/trash.png" alt=""/></a></td>
                                            </tr>
                                            <tr> 

                                                <td > <a href="#">23 March 2015</a></td>
                                                <td >Broker Agreement 2015  </td>
                                                <td>491KB</td>

                                                <td class="text-center" colspan="2"><a href="#"><img src="<?php echo BASE_URL ?>images/lockgreen.png" alt=""/></a>

                                                    <a href="#"><img src="<?php echo BASE_URL ?>images/trash.png" alt=""/></a></td>

                                            </tr>
                                            <tr> 

                                                <td > <a href="#">23 March 2015</a></td>
                                                <td >Broker Agreement 2015  </td>
                                                <td>491KB</td>

                                                <td class="text-center" colspan="2"><a href="#"><img src="<?php echo BASE_URL ?>images/lockgreen.png" alt=""/></a>

                                                    <a href="#"><img src="<?php echo BASE_URL ?>images/trash.png" alt=""/></a></td>
                                            </tr>

                                        </tbody> 
                                    </table>
                                </div> 












                            </div>


                        </div><div aria-labelledby="Fee_dv" id="Fees" class="tab-pane fade " role="tabpanel"> 
                            <div class="col-md-12 general_dv docu mCustomScrollbar _mCS_1">
                                <div class="col-md-12 spc form_fields   "> 
                                    <form>
                                        <h4>Loan Fees</h4>
                                        <div class="row">
                                            <div class="form-group ">

                                                <label class="col-sm-4  control-label">Minimum LOC Balance</label>
                                                <div class="col-sm-6 high_width">
                                                    <input type="email" class="form-control" placeholder="S100.00">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group ">

                                                <label class="col-sm-4  control-label">Loan Servicing Charge</label>
                                                <div class="col-sm-6 high_width">
                                                    <input type="email" class="form-control" placeholder="S25.00">
                                                </div>
                                            </div>
                                        </div>


                                        <h4 class="martp20">Loan Fees<span class="new_btn"> <a href="#" class="com_admin_btns" data-toggle="modal" data-target="#addfees">Add Fees</a></span></h4>


                                        <div class="table-responsive manage_licsn_tabl license_user">
                                            <table class="table  contcts">
                                                <tr class="bg_white">
                                                    <th >HUD#</th>
                                                    <th  class="padd_15lft">Description </th>
                                                    <th  class="padd_15lft">Amount</th>

                                                    <th></th>




                                                </tr>

                                                <tbody>
                                                    <tr> 

                                                        <td >808</td>
                                                        <td >Doc Prep </td>
                                                        <td> <input type="email" placeholder="$100.00" class="form-control"></td>

                                                        <td><a href="#"><img src="<?php echo BASE_URL ?>images/trash.png" alt=""/></a></td>

                                                    </tr>
                                                    <tr> 

                                                        <td >808</td>
                                                        <td ><input type="email" placeholder="" class="form-control"> </td>
                                                        <td> <input type="email" placeholder="$0.00" class="form-control"></td>

                                                        <td><a href="#"><img src="<?php echo BASE_URL ?>images/trash.png" alt=""/></a></td>

                                                    </tr>
                                                    <tr> 

                                                        <td >808</td>
                                                        <td >Doc Prep </td>
                                                        <td> <input type="email" placeholder="$100.00" class="form-control"></td>

                                                        <td><a href="#"><img src="<?php echo BASE_URL ?>images/trash.png" alt=""/></a></td>

                                                    </tr>
                                                    <tr> 

                                                        <td >808</td>
                                                        <td >Doc Prep </td>
                                                        <td> <input type="email" placeholder="$100.00" class="form-control"></td>

                                                        <td><a href="#"><img src="<?php echo BASE_URL ?>images/trash.png" alt=""/></a></td>

                                                    </tr>

                                                </tbody> 
                                            </table>
                                        </div> 


                                    </form>
                                </div>








                            </div>


                        </div>
                    </div>



                </div>
                <div class="modal-footer mar15">

                    <div class="col-md-12 text-center spc btm_btns">

                        <a href="#">Save</a>
                        <a class=" cncel_btn" href="#">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-------Edit Lender popup End--------->



<!---------------Add Contacts Popup----------->
<div class="modal fade new_lender" id="addcontacts" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header ">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><img alt="" src="<?php echo BASE_URL ?>images/close_icon.png"></button>
                <h4 class="modal-title" id="myModalLabel">Lender Contact Creator</h4>
            </div>
            <div class="modal-body">

                <div data-example-id="togglable-tabs" class="bs-example bs-example-tabs">
                    <ul role="tablist" class="nav nav-tabs" id="myTabs1"> 
                        <li class="active" role="presentation"><a aria-expanded="true" aria-controls="home" data-toggle="tab" role="tab" id="Contact_info" href="#Contctinfo">Contact Information</a></li>
                        <li role="presentation" class=""><a aria-controls="profile" data-toggle="tab" id="States_dv" role="tab" href="#States_Sec" aria-expanded="false">States</a></li>

                    </ul>
                    <div class="tab-content" id="myTabContent"> 



                        <div aria-labelledby="Contact_info" id="Contctinfo" class="tab-pane fade active in" role="tabpanel"> 
                            <div class="col-md-12 general_dv mCustomScrollbar _mCS_1">
                                <h4>Lender Contacts</h4>



                                <div class="col-md-12 spc form_fields spc  ">
                                    <form>
                                        <div class="form-group send_msg">
                                            <label  class="col-sm-3 control-label">Type</label>
                                            <div class="col-sm-9">
                                                <select class="selectpicker col-md-8 spc">
                                                    <option>Sales Manager</option>
                                                    <option>Sales Manager</option>
                                                    <option>Sales Manager</option>
                                                </select>
                                            </div>

                                        </div>

                                        <div class="form-group ">
                                            <label  class="col-sm-3 control-label">Title</label> 
                                            <div class="col-sm-9">
                                                <input type="email" placeholder="Enter Title" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label  class="col-sm-3 control-label">First name</label> 
                                            <div class="col-sm-9">
                                                <input type="email" placeholder="Enter First name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label  class="col-sm-3 control-label">Last Name</label> 
                                            <div class="col-sm-9">
                                                <input type="email" placeholder="Enter last Name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label  class="col-sm-3 control-label">Work Phone</label> 
                                            <div class="col-sm-9">
                                                <input type="email" placeholder="Enter Work Phone Number" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label  class="col-sm-3 control-label">Cell Phone</label> 
                                            <div class="col-sm-9">
                                                <input type="email" placeholder="Enter Cell Phone" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <label  class="col-sm-3 control-label">Fax</label> 
                                            <div class="col-sm-9">
                                                <input type="email" placeholder="Enter Fax Number" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label  class="col-sm-3 control-label">Email</label> 
                                            <div class="col-sm-9">
                                                <input type="email" placeholder="Enter Email" class="form-control">
                                            </div>
                                        </div>

                                    </form>
                                </div>










                            </div>


                        </div>
                        <div aria-labelledby="States_dv" id="States_Sec" class="tab-pane fade " role="tabpanel"> 
                            <div class="col-md-12 general_dv docu mCustomScrollbar _mCS_1">
                                <h4>States</h4>


                                <div class="col-md-12 states_checkbox spc">
                                    <div class="col-md-4 padd_left">

                                        <div class="checkbox">
                                            <label> Alabama<input type="checkbox"> </label> 
                                        </div>

                                        <div class="checkbox">
                                            <label> Alabama<input type="checkbox"> </label> 
                                        </div>
                                        <div class="checkbox">
                                            <label> Alabama<input type="checkbox"> </label> 
                                        </div>

                                        <div class="checkbox">
                                            <label> Alabama<input type="checkbox"> </label> 
                                        </div>
                                        <div class="checkbox">
                                            <label> Alabama<input type="checkbox"> </label> 
                                        </div>

                                        <div class="checkbox">
                                            <label> Alabama<input type="checkbox"> </label> 
                                        </div>
                                        <div class="checkbox">
                                            <label> Alabama<input type="checkbox"> </label> 
                                        </div>

                                        <div class="checkbox">
                                            <label> Alabama<input type="checkbox"> </label> 
                                        </div>
                                        <div class="checkbox">
                                            <label> Alabama<input type="checkbox"> </label> 
                                        </div>

                                        <div class="checkbox">
                                            <label> Alabama<input type="checkbox"> </label> 
                                        </div>
                                    </div>



                                    <div class="col-md-4 ">

                                        <div class="checkbox">
                                            <label> Alabama<input type="checkbox"> </label> 
                                        </div>

                                        <div class="checkbox">
                                            <label> Alabama<input type="checkbox"> </label> 
                                        </div>
                                        <div class="checkbox">
                                            <label> Alabama<input type="checkbox"> </label> 
                                        </div>

                                        <div class="checkbox">
                                            <label> Alabama<input type="checkbox"> </label> 
                                        </div>
                                        <div class="checkbox">
                                            <label> Alabama<input type="checkbox"> </label> 
                                        </div>

                                        <div class="checkbox">
                                            <label> Alabama<input type="checkbox"> </label> 
                                        </div>
                                        <div class="checkbox">
                                            <label> Alabama<input type="checkbox"> </label> 
                                        </div>

                                        <div class="checkbox">
                                            <label> Alabama<input type="checkbox"> </label> 
                                        </div>
                                        <div class="checkbox">
                                            <label> Alabama<input type="checkbox"> </label> 
                                        </div>

                                        <div class="checkbox">
                                            <label> Alabama<input type="checkbox"> </label> 
                                        </div>
                                    </div>



                                    <div class="col-md-4 padd_right">

                                        <div class="checkbox">
                                            <label> Alabama<input type="checkbox"> </label> 
                                        </div>

                                        <div class="checkbox">
                                            <label> Alabama<input type="checkbox"> </label> 
                                        </div>
                                        <div class="checkbox">
                                            <label> Alabama<input type="checkbox"> </label> 
                                        </div>

                                        <div class="checkbox">
                                            <label> Alabama<input type="checkbox"> </label> 
                                        </div>
                                        <div class="checkbox">
                                            <label> Alabama<input type="checkbox"> </label> 
                                        </div>

                                        <div class="checkbox">
                                            <label> Alabama<input type="checkbox"> </label> 
                                        </div>
                                        <div class="checkbox">
                                            <label> Alabama<input type="checkbox"> </label> 
                                        </div>

                                        <div class="checkbox">
                                            <label> Alabama<input type="checkbox"> </label> 
                                        </div>
                                        <div class="checkbox">
                                            <label> Alabama<input type="checkbox"> </label> 
                                        </div>

                                        <div class="checkbox">
                                            <label> Alabama<input type="checkbox"> </label> 
                                        </div>
                                    </div>


                                </div>









                            </div>


                        </div>

                    </div>



                </div>
                <div class="modal-footer mar15">

                    <div class="col-md-12 text-center spc btm_btns">

                        <a  href="#">Create</a><a class=" cncel_btn" href="#">CANCEL</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!---------------Add Contacts Popup End----------->




<!---------------Mortgagee Popup----------->
<div class="modal fade new_lender" id="Mortgageecontacts" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header ">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><img alt="" src="<?php echo BASE_URL ?>images/close_icon.png"></button>
                <h4 class="modal-title" id="myModalLabel">Lender Contact Creator</h4>
            </div>
            <div class="modal-body">

                <div data-example-id="togglable-tabs" class="bs-example bs-example-tabs">
                    <ul role="tablist" class="nav nav-tabs" id="myTabs1"> 
                        <li class="active" role="presentation"><a aria-expanded="true" aria-controls="home" data-toggle="tab" role="tab" id="motgagee_Contact_info" href="#mortgageeContctinfo">Contact Information</a></li>
                        <li role="presentation" class=""><a aria-controls="profile" data-toggle="tab" id="States_dv" role="tab" href="#States_Sec" aria-expanded="false">States</a></li>

                    </ul>
                    <div class="tab-content" id="myTabContent"> 



                        <div aria-labelledby="motgagee_Contact_info" id="mortgageeContctinfo" class="tab-pane fade active in" role="tabpanel"> 
                            <div class="col-md-12 general_dv mCustomScrollbar _mCS_1">
                                <h4>Lender Mortgagee Contact Creator</h4>



                                <div class="col-md-12 spc form_fields spc  ">
                                    <form>


                                        <div class="form-group ">
                                            <label  class="col-sm-3 control-label">Full Name</label> 
                                            <div class="col-sm-9">
                                                <input type="email" placeholder="Enter Full Name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label  class="col-sm-3 control-label">Address1</label> 
                                            <div class="col-sm-9">
                                                <input type="email" placeholder="Enter Address1" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label  class="col-sm-3 control-label">Address2</label> 
                                            <div class="col-sm-9">
                                                <input type="email" placeholder="Enter Address2" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label  class="col-sm-3 control-label">City</label> 
                                            <div class="col-sm-9">
                                                <input type="email" placeholder="Enter City" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label  class="col-sm-3 control-label">State</label> 
                                            <div class="col-sm-9">
                                                <input type="email" placeholder="Enter State" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <label  class="col-sm-3 control-label">Zip Code</label> 
                                            <div class="col-sm-9">
                                                <input type="email" placeholder="Enter Zip Code" class="form-control">
                                            </div>
                                        </div>


                                    </form>
                                </div>










                            </div>


                        </div>
                        <div aria-labelledby="States_dv" id="States_Sec" class="tab-pane fade " role="tabpanel"> 
                            <div class="col-md-12 general_dv docu mCustomScrollbar _mCS_1">
                                <h4>States</h4>


                                <div class="col-md-12 states_checkbox spc">
                                    <div class="col-md-4 padd_left">

                                        <div class="checkbox">
                                            <label> Alabama<input type="checkbox"> </label> 
                                        </div>

                                        <div class="checkbox">
                                            <label> Alabama<input type="checkbox"> </label> 
                                        </div>
                                        <div class="checkbox">
                                            <label> Alabama<input type="checkbox"> </label> 
                                        </div>

                                        <div class="checkbox">
                                            <label> Alabama<input type="checkbox"> </label> 
                                        </div>
                                        <div class="checkbox">
                                            <label> Alabama<input type="checkbox"> </label> 
                                        </div>

                                        <div class="checkbox">
                                            <label> Alabama<input type="checkbox"> </label> 
                                        </div>
                                        <div class="checkbox">
                                            <label> Alabama<input type="checkbox"> </label> 
                                        </div>

                                        <div class="checkbox">
                                            <label> Alabama<input type="checkbox"> </label> 
                                        </div>
                                        <div class="checkbox">
                                            <label> Alabama<input type="checkbox"> </label> 
                                        </div>

                                        <div class="checkbox">
                                            <label> Alabama<input type="checkbox"> </label> 
                                        </div>
                                    </div>



                                    <div class="col-md-4 ">

                                        <div class="checkbox">
                                            <label> Alabama<input type="checkbox"> </label> 
                                        </div>

                                        <div class="checkbox">
                                            <label> Alabama<input type="checkbox"> </label> 
                                        </div>
                                        <div class="checkbox">
                                            <label> Alabama<input type="checkbox"> </label> 
                                        </div>

                                        <div class="checkbox">
                                            <label> Alabama<input type="checkbox"> </label> 
                                        </div>
                                        <div class="checkbox">
                                            <label> Alabama<input type="checkbox"> </label> 
                                        </div>

                                        <div class="checkbox">
                                            <label> Alabama<input type="checkbox"> </label> 
                                        </div>
                                        <div class="checkbox">
                                            <label> Alabama<input type="checkbox"> </label> 
                                        </div>

                                        <div class="checkbox">
                                            <label> Alabama<input type="checkbox"> </label> 
                                        </div>
                                        <div class="checkbox">
                                            <label> Alabama<input type="checkbox"> </label> 
                                        </div>

                                        <div class="checkbox">
                                            <label> Alabama<input type="checkbox"> </label> 
                                        </div>
                                    </div>



                                    <div class="col-md-4 padd_right">

                                        <div class="checkbox">
                                            <label> Alabama<input type="checkbox"> </label> 
                                        </div>

                                        <div class="checkbox">
                                            <label> Alabama<input type="checkbox"> </label> 
                                        </div>
                                        <div class="checkbox">
                                            <label> Alabama<input type="checkbox"> </label> 
                                        </div>

                                        <div class="checkbox">
                                            <label> Alabama<input type="checkbox"> </label> 
                                        </div>
                                        <div class="checkbox">
                                            <label> Alabama<input type="checkbox"> </label> 
                                        </div>

                                        <div class="checkbox">
                                            <label> Alabama<input type="checkbox"> </label> 
                                        </div>
                                        <div class="checkbox">
                                            <label> Alabama<input type="checkbox"> </label> 
                                        </div>

                                        <div class="checkbox">
                                            <label> Alabama<input type="checkbox"> </label> 
                                        </div>
                                        <div class="checkbox">
                                            <label> Alabama<input type="checkbox"> </label> 
                                        </div>

                                        <div class="checkbox">
                                            <label> Alabama<input type="checkbox"> </label> 
                                        </div>
                                    </div>


                                </div>









                            </div>


                        </div>

                    </div>



                </div>
                <div class="modal-footer mar15">

                    <div class="col-md-12 text-center spc btm_btns">

                        <a href="#">Create</a><a class=" cncel_btn" href="#">CANCEL</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!---------------Mortgagee Popup----------->




<!---------------Create New Tip Popup----------->
<div class="modal fade new_lender" id="Createnew_tip" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header ">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><img alt="" src="<?php echo BASE_URL ?>images/close_icon.png"></button>
                <h4 class="modal-title" id="myModalLabel">Lender Contact Creator</h4>
            </div>
            <div class="modal-body">

                <div data-example-id="togglable-tabs" class="bs-example bs-example-tabs">
                    <ul role="tablist" class="nav nav-tabs" id="myTabs1"> 
                        <li class="active" role="presentation"><a aria-expanded="true" aria-controls="home" data-toggle="tab" role="tab" id="Create_new_tip" href="#createnewtip">Create New Tip</a></li>
                        <li role="presentation" class=""><a aria-controls="profile" data-toggle="tab" id="Resourse_dv" role="tab" href="#Resourses" aria-expanded="false">Resourses</a></li>

                    </ul>
                    <div class="tab-content" id="myTabContent"> 



                        <div aria-labelledby="Create_new_tip" id="createnewtip" class="tab-pane fade active in" role="tabpanel"> 
                            <div class="col-md-12 general_dv mCustomScrollbar _mCS_1">
                                <form>


                                    <div class="col-md-12  tip_textarea spc ">
                                        <label>Delete Tip On</label>
                                        <div class="form-group send_msg">
                                            <div id="datetimepicker1" class="input-group date res_mar">
                                                <input type="text" class="form-control">
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                        </div>



                                        <label>Tip</label>
                                        <textarea rows="" cols=""></textarea>





                                        <div class="col-md-12 ckeditor spc mar50">
                                            <label> CK Editor (It will be created by developer) </label>
                                        </div>





                                    </div>

                                </form>








                            </div>

                            <div class="mar30">
                                <div class="col-md-12 text-center spc btm_btns ">

                                    <a  href="#">Create</a><a class=" cncel_btn" href="#">CANCEL</a>
                                </div>
                            </div>

                        </div>
                        <div aria-labelledby="Resourse_dv" id="Resourses" class="tab-pane fade " role="tabpanel"> 
                            <div class="col-md-12 general_dv docu mCustomScrollbar _mCS_1">


                                <div class="col-md-12 tip_textarea spc">

                                    <form>
                                        <label>File</label>
                                        <textarea rows="" cols=""></textarea>





                                    </form>








                                </div>









                            </div>

                            <div class="mar30">
                                <div class="col-md-12 text-center spc btm_btns ">

                                    <a  href="#">Add File</a><a class="cncel_btn" href="#">Remove Selected</a>
                                </div>
                            </div>
                        </div>

                    </div>



                </div>
                <div class="modal-footer mar15">

                    <!--  <div class="col-md-12 text-center spc btm_btns">
               
              <a class="com_admin_btns" href="#">Create</a><a class="com_admin_btns cncel_btn" href="#">CANCEL</a>
              </div>-->
                </div>
            </div>
        </div>
    </div>

</div>
<!---------------Create New Tip Popup end----------->


<!---------------Create notice Popup----------->
<div class="modal fade new_lender" id="create_notice" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header ">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><img alt="" src="<?php echo BASE_URL ?>images/close_icon.png"></button>
                <h4 class="modal-title" id="myModalLabel">Edit lender</h4>
            </div>
            <div class="modal-body">

                <div data-example-id="togglable-tabs" class="bs-example bs-example-tabs">
                    <ul role="tablist" class="nav nav-tabs" id="myTabs1"> 
                        <li class="active" role="presentation"><a aria-expanded="true" aria-controls="home" data-toggle="tab" role="tab" id="msg_setting" href="#msgsetting">Message Setting</a></li>
                        <li role="presentation" class=""><a aria-controls="profile" data-toggle="tab" id="msg_body" role="tab" href="#msgbody" aria-expanded="false">Message Body</a></li>
                        <li role="presentation" class=""><a aria-controls="profile" data-toggle="tab" id="preview" role="tab" href="#preview_dv" aria-expanded="false">Preview</a></li>
                        <li role="presentation" class=""><a aria-controls="profile" data-toggle="tab" id="Resourses" role="tab" href="#Resourses_dv" aria-expanded="false">Resources</a></li>

                    </ul>
                    <div class="tab-content" id="myTabContent"> 



                        <div aria-labelledby="msg_setting" id="msgsetting" class="tab-pane fade active in" role="tabpanel"> 
                            <div class="col-md-12 general_dv mCustomScrollbar _mCS_1">
                                <form>
                                    <div class="col-md-12 spc form_fields spc  ">

                                        <div class="form-group">
                                            <label class="col-sm-3">Subject</label> 
                                            <div class="col-sm-9">
                                                <input type="email" placeholder="Enter subject here" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group send_msg">
                                            <label class="col-sm-3">Category </label> 
                                            <div class="col-sm-9">
                                                <select class="selectpicker col-md-8 spc">
                                                    <option>General Announcement</option>
                                                    <option>General Announcement</option>
                                                    <option>General Announcement</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group send_msg">
                                            <label class="col-sm-3">Importance</label> 
                                            <div class="col-sm-9">
                                                <select class="selectpicker col-md-8 spc">
                                                    <option>Affects Current Loan</option>
                                                    <option>Affects Current Loan</option>
                                                    <option>Affects Current Loan</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group top0 send_msg ">
                                            <label class="col-sm-3">Auto Delete on</label>
                                            <div class="col-sm-6"> 
                                                <div id="datetimepicker3" class="input-group date res_mar">
                                                    <input type="text" class="form-control">
                                                    <span class="input-group-addon">
                                                        <span class="glyphicon glyphicon-calendar"></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group top0 send_msg ">
                                            <label class="col-sm-3">Send Email</label>
                                            <div class="col-sm-9"> 
                                                <div class="checkbox"> <label> <input type="checkbox">
                                                    </label> </div>
                                            </div>
                                        </div>
                                    </div>



                                </form>








                            </div>

                            <div class="mar30">
                                <div class="col-md-12 text-center spc btm_btns ">

                                    <a  href="#">Send correspondence</a><a class=" cncel_btn" href="#">CANCEL</a>
                                </div>
                            </div>

                        </div>
                        <div aria-labelledby="msg_body" id="msgbody" class="tab-pane fade " role="tabpanel"> 
                            <div class="col-md-12 general_dv docu mCustomScrollbar _mCS_1">


                                <div class="col-md-12 tip_textarea spc">

                                    <form>

                                        <textarea rows="" cols=""></textarea>



                                        <div class="col-md-12 ckeditor spc mar50">
                                            <label> CK Editor (It will be created by developer) </label>
                                        </div>



                                    </form>








                                </div>









                            </div>

                            <div class="mar30">
                                <div class="col-md-12 text-center spc btm_btns ">

                                    <a  href="#">Create Correspondence</a><a class=" cncel_btn" href="#">Cancel</a>
                                </div>
                            </div>
                        </div>
                        <div aria-labelledby="preview" id="preview_dv" class="tab-pane fade " role="tabpanel"> 
                            <div class="col-md-12 general_dv docu mCustomScrollbar _mCS_1">


                                <div class="col-md-12 tip_textarea spc">

                                    <form>
                                        <label>Preview</label>
                                        <textarea rows="" cols=""></textarea>





                                    </form>








                                </div>









                            </div>

                            <div class="mar30">
                                <div class="col-md-12 text-center spc btm_btns ">

                                    <a  href="#">Create Correspondence</a><a class=" cncel_btn" href="#">Cancel</a>
                                </div>
                            </div>
                        </div>
                        <div aria-labelledby="Resourses" id="Resourses_dv" class="tab-pane fade " role="tabpanel"> 
                            <div class="col-md-12 general_dv docu mCustomScrollbar _mCS_1">


                                <div class="col-md-12 tip_textarea spc">

                                    <form>
                                        <label>File</label>
                                        <textarea rows="" cols=""></textarea>





                                    </form>








                                </div>









                            </div>

                            <div class="mar30">
                                <div class="col-md-12 text-center spc btm_btns ">

                                    <a  href="#">Create Correspondence</a><a class=" cncel_btn" href="#">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
                <div class="modal-footer mar15">


                </div>
            </div>
        </div>
    </div>

</div>
<!---------------Create notice Popup end----------->





<!---------------add notes Popup----------->
<div class="modal fade new_lender" id="addnotes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header ">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><img alt="" src="<?php echo BASE_URL ?>images/close_icon.png"></button>
                <h4 class="modal-title" id="myModalLabel">Edit Lender</h4>
            </div>
            <div class="modal-body">

                <div class="col-md-12 general_dv mCustomScrollbar _mCS_1 act_cls">

                    <h4>Create Notes For SunTrust Mortgagee</h4>



                    <div class="col-md-12  tip_textarea spc ">

                        <form> 


                            <label>Tip</label>
                            <textarea rows="" cols=""></textarea>







                        </form>



                    </div>










                </div>








                <div class="modal-footer mar15">
                    <div class="col-md-12 text-center spc btm_btns">

                        <a  href="#">Create</a><a class=" cncel_btn" href="#">CANCEL</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!---------------add notes popup end----------->


<!---------------Add Documents Popup----------->
<div class="modal fade new_lender" id="Adddocumnts" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header ">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><img alt="" src="<?php echo BASE_URL ?>images/close_icon.png"></button>
                <h4 class="modal-title" id="myModalLabel">Edit Lender</h4>
            </div>
            <div class="modal-body">

                <div class="col-md-12 general_dv ">

                    <h4>Upload Document</h4>



                    <div class="col-md-12   spc form_fields ">

                        <form class="updoc_sec"> 

                            <div class="form-group">
                                <label>Name</label>
                                <input type="email" placeholder="" class="form-control">
                            </div>
                            <div class="form-group updocuments">
                                <label>Upload</label>  
                                <input type="email" placeholder="" class="form-control">
                                <div class="fileUpload btn btn-primary">
                                    <span><img src="<?php echo BASE_URL ?>images/fileupicon.png" alt=""/></span>
                                    <input type="file" class="upload">
                                </div>

                            </div>       



                        </form>



                    </div>










                </div>








                <div class="modal-footer mar15">
                    <div class="col-md-12 text-center spc btm_btns">

                        <a  href="#">Save </a><a class=" cncel_btn" href="#">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!---------------Add Documents popup end----------->



<!---------------Add fees Popup----------->
<div class="modal fade new_lender" id="addfees" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header ">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><img alt="" src="<?php echo BASE_URL ?>images/close_icon.png"></button>
                <h4 class="modal-title" id="myModalLabel">Add HUD Fees for Sally Fields</h4>
            </div>
            <div class="modal-body">

                <div class="col-md-12 general_dv addfee_slidr mCustomScrollbar _mCS_1 ">

                    <h4>800 Items Payable in Connection with Loan</h4>



                    <div class="slider8 ">
                        <div class="slide">        <div class="col-md-12 spc form_fields   ">    <div class="table-responsive manage_licsn_tabl license_user">
                                    <table class="table  contcts">
                                        <tr class="bg_white">
                                            <th>HUD#</th>
                                            <th>Description </th>
                                            <th>Tolerance</th>

                                            <th >Select</th>




                                        </tr>

                                        <tbody>
                                            <tr> 

                                                <td >808</td>
                                                <td >Broker compensation </td>
                                                <td><span class="blnk_info">0%</span></td>

                                                <td >   <div class="checkbox"> <label> <input type="checkbox">
                                                        </label> </div></td>

                                            </tr>
                                            <tr> 

                                                <td >808</td>
                                                <td >Broker compensation </td>
                                                <td><span class="smal_info">10%</span></td>

                                                <td >   <div class="checkbox"> <label> <input type="checkbox">
                                                        </label> </div></td>

                                            </tr>
                                            <tr> 

                                                <td >808</td>
                                                <td >Broker compensation </td>
                                                <td><span class="smal_info">10%</span></td>

                                                <td >   <div class="checkbox"> <label> <input type="checkbox">
                                                        </label> </div></td>

                                            </tr>
                                            <tr> 

                                                <td >808</td>
                                                <td >Broker compensation </td>
                                                <td><span class="smal_info">10%</span></td>

                                                <td >   <div class="checkbox"> <label> <input type="checkbox">
                                                        </label> </div></td>

                                            </tr>

                                        </tbody> 
                                    </table>
                                </div> </div></div>
                        <div class="slide">        <div class="col-md-12 spc form_fields   ">    <div class="table-responsive manage_licsn_tabl license_user">
                                    <table class="table  contcts">
                                        <tr class="bg_white">
                                            <th >Hud#</th>
                                            <th  class="padd_15lft">Description </th>
                                            <th  class="padd_15lft">Tolerance</th>

                                            <th >Select</th>




                                        </tr>

                                        <tbody>
                                            <tr> 

                                                <td >808</td>
                                                <td >Broker compensation </td>
                                                <td><span class="blnk_info">0%</span></td>

                                                <td >   <div class="checkbox"> <label> <input type="checkbox">
                                                        </label> </div></td>

                                            </tr>
                                            <tr> 

                                                <td >808</td>
                                                <td >Broker compensation </td>
                                                <td><span class="smal_info">10%</span></td>

                                                <td >   <div class="checkbox"> <label> <input type="checkbox">
                                                        </label> </div></td>

                                            </tr>
                                            <tr> 

                                                <td >808</td>
                                                <td >Broker compensation </td>
                                                <td><span class="smal_info">10%</span></td>

                                                <td >   <div class="checkbox"> <label> <input type="checkbox">
                                                        </label> </div></td>

                                            </tr>
                                            <tr> 

                                                <td >808</td>
                                                <td >Broker compensation </td>
                                                <td><span class="smal_info">10%</span></td>

                                                <td >   <div class="checkbox"> <label> <input type="checkbox">
                                                        </label> </div></td>

                                            </tr>

                                        </tbody> 
                                    </table>
                                </div> </div></div>
                        <div class="slide">        <div class="col-md-12 spc form_fields   ">    <div class="table-responsive manage_licsn_tabl license_user">
                                    <table class="table  contcts">
                                        <tr class="bg_white">
                                            <th>Hud#</th>
                                            <th  class="padd_15lft">Description </th>
                                            <th  class="padd_15lft">Tolerance</th>

                                            <th >Select</th>




                                        </tr>

                                        <tbody>
                                            <tr> 

                                                <td >808</td>
                                                <td >Broker compensation </td>
                                                <td><span class="blnk_info">0%</span></td>

                                                <td >   <div class="checkbox"> <label> <input type="checkbox">
                                                        </label> </div></td>

                                            </tr>
                                            <tr> 

                                                <td >808</td>
                                                <td >Broker compensation </td>
                                                <td><span class="smal_info">10%</span></td>

                                                <td >   <div class="checkbox"> <label> <input type="checkbox">
                                                        </label> </div></td>

                                            </tr>
                                            <tr> 

                                                <td >808</td>
                                                <td >Broker compensation </td>
                                                <td><span class="smal_info">10%</span></td>

                                                <td >   <div class="checkbox"> <label> <input type="checkbox">
                                                        </label> </div></td>

                                            </tr>
                                            <tr> 

                                                <td >808</td>
                                                <td >Broker compensation </td>
                                                <td><span class="smal_info">10%</span></td>

                                                <td >   <div class="checkbox"> <label> <input type="checkbox">
                                                        </label> </div></td>

                                            </tr>

                                        </tbody> 
                                    </table>
                                </div> </div></div>
                        <div class="slide">        <div class="col-md-12 spc form_fields   ">    <div class="table-responsive manage_licsn_tabl license_user">
                                    <table class="table  contcts">
                                        <tr class="bg_white">
                                            <th>Hud#</th>
                                            <th  class="padd_15lft">Description </th>
                                            <th  class="padd_15lft">Tolerance</th>

                                            <th >Select</th>




                                        </tr>

                                        <tbody>
                                            <tr> 

                                                <td >808</td>
                                                <td >Broker compensation </td>
                                                <td><span class="blnk_info">0%</span></td>

                                                <td >   <div class="checkbox"> <label> <input type="checkbox">
                                                        </label> </div></td>

                                            </tr>
                                            <tr> 

                                                <td >808</td>
                                                <td >Broker compensation </td>
                                                <td><span class="smal_info">10%</span></td>

                                                <td >   <div class="checkbox"> <label> <input type="checkbox">
                                                        </label> </div></td>

                                            </tr>
                                            <tr> 

                                                <td >808</td>
                                                <td >Broker compensation </td>
                                                <td><span class="smal_info">10%</span></td>

                                                <td >   <div class="checkbox"> <label> <input type="checkbox">
                                                        </label> </div></td>

                                            </tr>
                                            <tr> 

                                                <td >808</td>
                                                <td >Broker compensation </td>
                                                <td><span class="smal_info">10%</span></td>

                                                <td >   <div class="checkbox"> <label> <input type="checkbox">
                                                        </label> </div></td>

                                            </tr>

                                        </tbody> 
                                    </table>
                                </div> </div></div>

                    </div>










                </div>








                <div class="modal-footer mar15">
                    <div class="col-md-12 text-center spc btm_btns">

                        <a  href="#">Save </a><a class=" cncel_btn" href="#">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!---------------Add fees popup end----------->




<!---------------Terms & services popup----------->
<div class="modal fade trms_services" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><img src="<?php echo BASE_URL ?>images/close_icon.png" alt=""/></span></button>
                <h4 class="modal-title" id="myModalLabel">Term & Privacy</h4>
            </div>
            <div class="modal-body trms_list">
                <ul>
                    <li>Lorem Ipsum is also known as: Greeked text, blind text, placeholder text, 
                        dummy content,and mock-content.</li>
                    <li>Lorem Ipsum is also known as: Greeked text, blind text, placeholder text, 
                        dummy content,and mock-content. Lorem Ipsum is also known as: Greeked 
                        text, blind text, placeholder text and mock-content.</li>
                    <li>Lorem Ipsum is also known as: Greeked text, blind text, placeholder text, 
                        dummy content,and mock-content.</li>
                    <li>Lorem Ipsum is also known as: Greeked text, blind text, placeholder text, 
                        dummy content,and mock-content. Lorem Ipsum is also known as: Greeked 
                        text, blind text, placeholder text and mock-content.</li>


                </ul>
            </div>

        </div>
    </div>
</div>
<!---------------Terms & services popup end----------->




<!--------------Add Branch popup----------->
<div class="modal fade  trms_services statelicensedv branch_dv " id="addbranch" tabindex="-1" role="dialog" >
    <div class="modal-dialog " role="document">
        <div class="modal-content clearfix">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><img src="<?php echo BASE_URL ?>images/close_icon.png" alt=""/></span></button>
                <h4 class="modal-title" id="myModalLabel">Add Branch</h4>
            </div>
            <div class="modal-body mCustomScrollbar _mCS_1  clearfix">
                <div class="col-md-12 spc form_fields create_license   ">
                    <form>

                        <div class="row">
                            <div class="form-group">
                                <label class="col-sm-4  control-label">Branch Office</label>
                                <div class="col-sm-8 ">
                                    <input type="email" placeholder="Enter Branch office Name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">    <label class="col-sm-4  control-label">Description</label>
                                <div class="col-sm-8 ">
                                    <input type="email" placeholder="Description" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-sm-4  control-label">Address Line 1</label>
                                <div class="col-sm-8 ">
                                    <input type="email" placeholder="Address Line 1" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4  control-label">Address Line 2 </label>
                                <div class="col-sm-8 ">
                                    <input type="email" placeholder="Address Line 2" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-sm-4  control-label">City</label>
                                <div class="col-sm-8 ">
                                    <input type="email" placeholder="Enter City" class="form-control">
                                </div>
                            </div>
                            <div class="form-group send_msg">
                                <label class="col-sm-4  control-label">State</label>
                                <div class="col-sm-8 ">
                                    <select class="selectpicker col-md-12 spc">
                                        <option>States</option>
                                        <option>States</option>
                                        <option>States</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-sm-4  control-label">Zip Code</label>
                                <div class="col-sm-8 ">
                                    <input type="email" placeholder="Enter Zip Code" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4  control-label">Phone for Customer</label>
                                <div class="col-sm-8 ">
                                    <input type="email" placeholder="Enter Number" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <label class="col-sm-4  control-label">Number</label>
                                <div class="col-sm-8 ">
                                    <input type="email" placeholder="Enter Number" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4  control-label">Code</label>
                                <div class="col-sm-8 ">
                                    <input type="email" placeholder="Enter Code" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-sm-4  control-label">NMLS Number</label>
                                <div class="col-sm-8 ">
                                    <input type="email" placeholder="Enter NMLS Number" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4  control-label">Branch Manage</label>
                                <div class="col-sm-8 ">
                                    <input type="email" placeholder="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-sm-4  control-label">Tax Id (EIN)</label>
                                <div class="col-sm-8 ">
                                    <input type="email" placeholder="Enter Tax Id" class="form-control">
                                </div>
                            </div>
                        </div>



                    </form>
                </div>
                <div class="clearfix"></div>


            </div>

            <div class="modal-footer text-left clearfix">

                <a class=" com_admin_btns " href="#">Save</a>     </div>
        </div>
    </div>
</div>
<!---------------Add Branch popup end----------->



<script src="<?php echo BASE_URL; ?>js/jquery.mCustomScrollbar.js"></script>
<script>
    $(document).ready(function () {
        $(window).load(function () {
            $(".content").mCustomScrollbar();
        });

        $('.slider8').bxSlider({
            mode: 'vertical',
            minSlides: 1,
            slideMargin: 0
        });
        $('slider8').width('100%');
//        raconfig.success('Good Job!', 'You will not be able to recover this imaginary file!');
    });
</script>


