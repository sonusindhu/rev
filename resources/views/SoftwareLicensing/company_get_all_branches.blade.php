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