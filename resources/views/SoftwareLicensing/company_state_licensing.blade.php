<div class="col-md-12 companyadmin_outer ">
    <div class="col-md-12 spc form_fields spc  ">
        <form>
            <div class="col-md-12 spc paddbtm30 sep_div nmlsdv">
                <div class="form-group state_dv">
                    <label class="col-sm-5  spc control-label">Company NMLS License</label>
                    <div class="col-sm-7 high_width res_spc1">
                       <input ng-keyup="updateNmlsId('<?php echo @$_SESSION['Auth']['User']['id']; ?>');" type="text" value="<?php echo @$loggedUser['User']['nmls_id']; ?>" placeholder="NMLS License" class="form-control nmlsid">
                    </div>
                </div>
                <div class="clearfix"></div>
                <h3>Active State License <span>
                        <a class="com_admin_btns hding_span" ng-click="openPopUp('get', 'software_licensing/update_state_licensing', 're-assign statelicensedv updte_license')" href="javascript:void(0)">Update State Licenses</a></span> </h3>
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
                                        <td><?php echo $value['State']['state']; ?> </td>
                                        <td><?php echo $value['StateLicense']['license']; ?> </td>
                                        <td ng-click="openPopUp('get', 'software_licensing/show_state_license/<?php echo $value['State']['id']; ?>', 'licensing_branch')" href="javascript:void(0)">
                                            <!--<img src="<?php //echo $this->webroot; ?>images/license-copy.png" alt=""/>--> 
                                                <span><a href="javascript:void(0);"><?php echo $value['StateLicense']['count']; ?></a></span></td>
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
                        <a class="com_admin_btns hding_span" ng-click="openPopUp('get', 'software_licensing/add_branch', 'branch_dv')" href="javascript:void(0)">Add Branch Licenses</a>
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
                                    $id=$value['Branch']['id'];
                                    ?>
                                    <tr id="delRow<?php echo $key; ?>"> 
                                        <td ><?php echo $value['Branch']['office']; ?> </td>
                                        <td ><?php echo $value['Branch']['user_name']; ?> </td>
                                        <td>
                                            <?php echo $value['Branch']['address'];
                                                    if(!empty($value['Branch']['address_more'])){
                                                     echo '<br>'.$value['Branch']['address_more'];   
                                                    }
                                                 ?><br>
                                            <?php echo $value['Branch']['city']; ?>,
                                             <?php echo $value['State']['state']; ?>&nbsp;<?php echo $value['Branch']['zipcode']; ?>   <br> </td>
                                        <td ><?php echo $value['Branch']['phone']; ?> </td>
                                        <td ><?php echo $value['Branch']['nmls_number']; ?> </td>
                                        <td class="cus_pro_td">
                                            <a href="javascript:void(0);" ng-click="openPopUp('get', 'software_licensing/add_branch/<?php echo $value['Branch']['id'];?>', 'branch_dv')">
                                                <img src="<?php echo $this->webroot; ?>images/edit.png" alt=""/></a></td> 
                                                <td class="cus_pro_td">
                                    <a href="javascript:void(0);" >  
                                        <img src="<?php echo $this->webroot; ?>images/view_profile_icon.png" alt=""/>
                                         <span class="profileview stateview">
                                                <?php
                                        $src1 = $this->webroot . "images/default-avatar.png";
                                        if (!empty($value['Branch']['emp_image'])) {
                                            $src1 = $this->webroot . "upload/Employee/" . $value['Branch']['emp_image'];
                                        }
                                        ?>

                                        
                                         <h3><?php echo $value['Branch']['office']; ?> Office</h3>
                                      <img id="" src="<?php echo $src1; ?>" alt="user Image">
                                            <ul>
                                                <li><?php echo $value['Branch']['user_name']; ?>: Branch manager</li>
                                                <li> <?php echo $value['Branch']['address'];
                                                    if(!empty($value['Branch']['address_more'])){
                                                     echo '<br>'.$value['Branch']['address_more'];   
                                                    }
                                                 ?><br> <?php echo $value['Branch']['city']; ?>,
                                             <?php echo $value['State']['state']; ?>&nbsp;<?php echo $value['Branch']['zipcode']; ?></li>
                                                <li>Customer Phone <?php echo $value['Branch']['phone']; ?> <br> 
                                                Branch Phone <?php echo $value['Branch']['telephone']; ?>   </li>
                                                
                                              
                                            </ul>
                                             <ul class="new_ul">
                                                 <?php  if(!empty($value['Branch']['nmls_number'])){
                                                  ?>
                                                  <li>NMLS ID#  <span><?php echo $value['Branch']['nmls_number'];?></span></li>
                                                 <?php
                                                 }?>
                                                 <?php  if(!empty($value['Branch']['tax_id'])){
                                                  ?>
                                                    <li>Tax   <span><?php echo $value['Branch']['tax_id'];?></span></li>
                                                 <?php
                                                 }?>
                                                 <?php  if(!empty($value['Branch']['code'])){
                                                  ?>
                                                    <li>Code   <span><?php echo $value['Branch']['code']; ?></span></li>
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
                                                <img src="<?php echo $this->webroot; ?>images/trash.png" alt=""/></a></td>      
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

