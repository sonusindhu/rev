<div class="col-md-12 companyadmin_outer ">
    <div class="col-md-12 spc form_fields spc  ">
        <form>
            <div class="col-md-12 spc paddbtm30 sep_div nmlsdv">
                <div class="form-group state_dv">
                    <label class="col-sm-5  spc control-label">Company NMLS License</label>
                    <div class="col-sm-7 high_width res_spc1">
                       <input ng-keyup="updateNmlsId('<?php echo @$loginUser->id; ?>');" type="text" value="<?php  echo @$loginUser->nmls_id; ?>" placeholder="NMLS License" class="form-control nmlsid">
                    </div>
                </div>
                <div class="clearfix"></div>
                <h3>Active State License <span>
                        <a class="com_admin_btns hding_span" ng-click="openPopUp('get', 'company/software_licensing/update_state_licensing', 're-assign statelicensedv updte_license')" href="javascript:void(0)">Update State Licenses</a></span> </h3>
                <div ng-init="getAllActiveStates()" class="table-responsive manage_licsn_tabl license_user state_licensing" ng-bind-html="getAllActiveState" addpopup>
                    <table class="table table-striped table-hover">
                        <tr class="bg_white">
                            <th >State</th>
                            <th >License Number</th>
                            <th >MLOs </th>
                        </tr>
                        <tbody>
                            <?php
                            if (!empty($stateLicense)) {
                                  foreach ($stateLicense as $key => $value) {
                                  ?>
                                    <tr> 
                                        <td><?php echo $value['states']->state; ?> </td>
                                        <td><?php echo $value->license; ?> </td>
                                        <td>
                                         <span><a ng-click="openPopUp('get', 'company/software_licensing/show_state_license/<?php echo $value['states']->id; ?>', 'licensing_branch')" href="javascript:void(0)"><?php if(!empty($value->count)){
                 echo $value->count;                            
                                         }else{ echo "0";} ?></a></span></td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>

                        </tbody>
                    </table>
                </div> 

                <div class="clearfix"></div> 
            </div>                                                                                              <div class="col-md-12 spc paddbtm30 sep_div tab_mar">

                <h3>Branch Licenses<span>
                        <a class="com_admin_btns hding_span" ng-click="openPopUp('get', 'company/software_licensing/add_branch', 'branch_dv')" href="javascript:void(0)">Add Branch Licenses</a>
                    </span> </h3>
                <div class="table-responsive manage_licsn_tabl license_user statetable" ng-init="getAllBranches()" ng-bind-html="getAllBranche" addpopup>
                    <table class="table table-striped table-hover">
                        <tr class="bg_white">
                            <th class="padd_15lft">Branch Name</th>
                            <th  class="padd_15lft">Manager</th>
                            <th  class="padd_15lft" >Address </th>
                            <th  class="padd_15lft">Phone </th>
                            <th class="padd_15lft"> NMLS ID</th>
                           

                        </tr>

                        <tbody>
                            <?php
                            if (!empty($branch)) {
                                foreach ($branch as $key => $value) {
//                                    echo "<pre>";
//                                    print_r($value);
//                                    die;
                                    $id=$value->id;
                                    ?>
                                    <tr id="delRow<?php echo $key; ?>"> 
                                        <td ><?php echo $value->office; ?> </td>
                                        <td ><?php echo $value->user_name; ?> </td>
                                        <td>
                                            <?php echo $value->address;
                                                    if(!empty($value->address_more)){
                                                     echo '<br>'.$value->address_more;   
                                                    }
                                                 ?><br>
                                            <?php echo $value->city; ?>,
                                             <?php //echo $value['State']['state']; ?>&nbsp;<?php echo $value->zipcode; ?>   <br> </td>
                                        <td ><?php echo $value->phone; ?> </td>
                                        <td ><?php echo $value->nmls_number; ?> </td>
                                        <td class="cus_pro_td">
                                            <a href="javascript:void(0);" ng-click="openPopUp('get', 'software_licensing/add_branch/<?php echo $value->id;?>', 'branch_dv')">
                                                <img src="./images/edit.png" alt=""/></a></td> 
                                                <td class="cus_pro_td">
                                    <a href="javascript:void(0);" >  
                                        <img src="./images/view_profile_icon.png" alt=""/>
                                         <span class="profileview stateview">
                                                <?php
                                        $src1 = "./images/default-avatar.png";
                                        if (!empty($value->emp_image)) {
                                            $src1 = "upload/Employee/" . $value->emp_image;
                                        }
                                        ?>

                                        
                                         <h3><?php echo $value->office; ?> Office</h3>
                                      <img id="" src="<?php echo $src1; ?>" alt="user Image">
                                            <ul>
                                                <li><?php echo $value->user_name; ?>: Branch manager</li>
                                                <li> <?php echo $value->address;
                                                    if(!empty($value->address_more)){
                                                     echo '<br>'.$value->address_more;   
                                                    }
                                                 ?><br> <?php echo $value->city; ?>,
                                             <?php //echo $value['State']['state']; ?>&nbsp;<?php echo $value->zipcode; ?></li>
                                                <li>Customer Phone <?php echo $value->phone; ?> <br> 
                                                Branch Phone <?php echo $value->telephone; ?>   </li>
                                                
                                              
                                            </ul>
                                             <ul class="new_ul">
                                                 <?php  if(!empty($value->nmls_number)){
                                                  ?>
                                                  <li>NMLS ID#  <span><?php echo $value->nmls_number;?></span></li>
                                                 <?php
                                                 }?>
                                                 <?php  if(!empty($value->tax_id)){
                                                  ?>
                                                    <li>Tax   <span><?php echo $value->tax_id;?></span></li>
                                                 <?php
                                                 }?>
                                                 <?php  if(!empty($value->code)){
                                                  ?>
                                                    <li>Code   <span><?php echo $value->code; ?></span></li>
                                                 <?php
                                                 }?>
                                               <li> <button class="snd_msg btm_btns" ng-click="openPopUp('get', 'employee/send_message/89', 'trms_services send_msg')" type="button"><span></span>
                                            Send Message</button></li>
                                              
                                                 
                                              
                                            </ul>
                                      <!--   <button class="snd_msg btm_btns" ng-click="openPopUp('get', 'employee/send_message/89', 'trms_services send_msg')" type="button"><span></span>
                                            Send Message</button>-->
                                        </span>
                                    </a>
                                </td>   
                                                
                                                
                                                
                                                
                                                
                                        <td>
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            <a  ng-click="deleteRecords('delRow<?php echo $key; ?>','software_licensing/delete_branch/<?php echo $id ; ?>')"  href="javascript:void(0)">
                                                <img src="./images/trash.png" alt=""/></a></td>      
                                    </tr>
                                    <?php
                                }
                            }
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

