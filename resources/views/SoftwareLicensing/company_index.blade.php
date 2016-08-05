<?php 
//echo "<pre>";
//print_r($getAllFees); die;?>
<div class="col-md-12 companyadmin_outer ">
    <div class="col-md-12 spc form_fields spc  ">
        <form>

            <div class="col-md-12 spc sep_div ">
                <h3>Usage  <span><a class="com_admin_btns hding_span"  ng-click="openPopUp('get', 'company/employee/add_user_license/software_license', 'new_role_popup')"  href="javascript:void(0);">Add License</a></span></h3>
                <div class="table-responsive manage_licsn_tabl soft_license_table">
                    <table class="table ">
                        <tr>
                            <th class="first_td"></th>
                            <th class=" nthtd padd_lft">Licenses</th>
                            <th class="padd_lft">Monthly </th>
                            <th class="padd_lft">Annually</th>
                            <th class="padd_lft">Active</th>
                        </tr>
                        <tbody>
                            <tr> 
                                <td>Monthly Company User Fee</td>
                                <td> 
                                   
<!--                                    <input  disabled type="text" class="form-control"   value="<?php //echo @number_format($getAllFees[0]['LicenseApplicableFee']['use_fee'],2); ?>" />-->
                                  <?php echo $allEmployeeCount; ?>/<?php echo $allCount; ?>
                                </td>
                                <td>   <input disabled type="text" class="form-control"  value="<?php  if(@$getAllFees[0]->default_fee_field=="monthly"){ echo "$".number_format(@$getAllFees[0]->use_fee,2);} ?>"></td>
                                <td>   <input disabled type="text" class="form-control"   value="<?php  if(@$getAllFees[0]->default_fee_field=="annual"){ echo "$".number_format(@$getAllFees[0]->use_fee,2);} ?>"></td> 
                                <td  class="text-center"><div class="checkbox"> <label> <input   type="checkbox"  ng-disabled="true" <?php if (@$getAllFees['0']->status == "on") {
    echo 'checked';
} ?> >
                                        </label> </div></td>
                            </tr>
                            <tr> 

                                <td>Create Client User Accounts</td>
                                <td>   
<!--                                    <input disabled type="text" class="form-control"   value="<?php //echo @number_format($getAllFees['2']['LicenseApplicableFee']['use_fee'],2); ?>">-->
                                    0/0
                                </td>
                                <td>   <input disabled type="text" class="form-control"   value="<?php  if(@$getAllFees[2]->default_fee_field=="monthly"){ echo "$".number_format(@$getAllFees[2]->use_fee,2);}?>"></td>
                                <td>   <input disabled type="text" class="form-control"   value="<?php  if(@$getAllFees[2]->default_fee_field=="annual"){ echo "$".number_format(@$getAllFees[2]->use_fee,2);}?>"></td> 
                                <td  class="text-center"><div class="checkbox"> <label> <input  type="checkbox" ng-disabled="true" <?php if (@$getAllFees['2']->status == "on") {
    echo 'checked';
} ?> >
                                        </label> </div></td>
                            </tr>




                            <tr> 

                                <td>Unlimited Client Records</td>
                                <td>   
<!--                                    <input disabled type="text" class="form-control"   value="<?php //echo @number_format($getAllFees['1']['LicenseApplicableFee']['use_fee'],2); ?>">-->
                                    0/0
                                </td>
                                <td>   <input disabled type="text" class="form-control" value="<?php  if(@$getAllFees[1]->default_fee_field=="monthly"){ echo "$".number_format(@$getAllFees[1]->use_fee,2);}?>"></td>
                                
                                <td>   <input disabled type="text" class="form-control" value="<?php  if(@$getAllFees[1]->default_fee_field=="annual"){ echo "$".number_format(@$getAllFees[1]->use_fee,2);}?>"></td> 
                                <td  class="text-center"><div class="checkbox"> <label> <input  type="checkbox" ng-disabled="true" <?php if (@$getAllFees['1']->status == "on") {
    echo 'checked';
} ?>>
                                        </label> </div></td>
                            </tr>






                        </tbody> 
                    </table>
                </div>  
                <div class="clearfix"></div> 
            </div>



            <div class="col-md-12 spc sep_div mar22">
                <h3>Integrations<span><a class="com_admin_btns hding_span" href="#">Manage licenses</a></span></h3>
                <div class="table-responsive manage_licsn_tabl soft_license_table">
                    <table class="table ">
                        <tr>
                            <th class="first_td"></th>
                            <th class=" nthtd padd_lft">Licenses</th>
                            <th class="padd_lft">Monthly </th>
                            <th class="padd_lft">Annually</th>
                            <th class="padd_lft">Active</th>


                        </tr>

                        <tbody>
                            <tr> 

                                <td>Salesforce Integration</td>
                                <td>   
<!--                                    <input disabled type="text" class="form-control"  value="<?php //echo @number_format($getAllFees['3']['LicenseApplicableFee']['use_fee'],2); ?>">-->
                                   0/0
                                </td>
                                <td>   <input disabled type="text" class="form-control"  value="<?php  if(@$getAllFees[3]->default_fee_field=="monthly"){ echo "$".number_format(@$getAllFees[3]->use_fee,2);}?>"></td>
                                <td>   <input disabled type="text" class="form-control"  value="<?php  if(@$getAllFees[3]->default_fee_field=="annual"){ echo "$".number_format(@$getAllFees[3]->use_fee,2);}?>"></td> 
                                <td class="text-center"><div class="checkbox"> <label> <input  type="checkbox" ng-disabled="true" <?php if (@$getAllFees['3']->status == "on") {
    echo 'checked';
} ?>>
                                        </label> </div></td>
                            </tr>
                            <tr> 

                                <td>DocuSign Integration</td>
                                <td>   
<!--                                    <input disabled type="text" class="form-control"  value="<?php //echo @number_format($getAllFees['4']['LicenseApplicableFee']['use_fee'],2); ?>">-->
                                    0/0
                                </td>
                                <td>   <input disabled type="text" class="form-control"   value="<?php  if(@$getAllFees[4]->default_fee_field=="monthly"){ echo "$".number_format(@$getAllFees[4]->use_fee,2);}?>"></td>
                                <td>   <input disabled type="text" class="form-control"  value="<?php  if(@$getAllFees[4]->default_fee_field=="annual"){ echo "$".number_format(@$getAllFees[4]->use_fee,2);}?>"></td> 
                                <td  class="text-center"><div class="checkbox"> <label> <input  type="checkbox" ng-disabled="true" <?php if (@$getAllFees['4']->status == "on") {
    echo 'checked';
} ?>>
                                        </label> </div></td>
                            </tr>




                            <tr> 

                                <td>Credit Bureau integation</td>
                                <td>   
<!--                                    <input  disabled type="text" class="form-control"   value="<?php //echo @number_format($getAllFees['5']['LicenseApplicableFee']['use_fee'],2); ?>">-->
                                    0/0
                                </td>
                                <td>   <input  disabled type="text" class="form-control"  value="<?php  if(@$getAllFees[5]->default_fee_field=="monthly"){ echo "$".number_format(@$getAllFees[5]->use_fee,2);}?>"></td>
                                <td>   <input  disabled type="text" class="form-control"  value="<?php  if(@$getAllFees[5]->default_fee_field=="annual"){ echo "$".number_format(@$getAllFees[5]->use_fee,2);}?>"></td> 
                                <td  class="text-center"><div class="checkbox"> <label> <input   type="checkbox"  ng-disabled="true" <?php if (@$getAllFees['5']->status == "on") {
    echo 'checked';
} ?>>
                                        </label> </div></td>
                            </tr>
                        </tbody> 
                    </table>
                </div>   


                <div class="clearfix"></div>


            </div>
            <div class="col-md-12 spc sep_div ">
                <h3>Software Features  <small> (Coming Soon) </small></h3>

            </div>

        </form>
    </div>


</div> 




