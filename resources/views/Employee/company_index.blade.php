<div class="col-md-12 dash_table ">
    <div class="col-md-12 spc form_fields spc ">
        <h3 class="marg_btm0" >Licensed Users  <span>
                <a href="javascript:void(0);" ng-click="page.addTab('New Employee', 'employee/add', 'Employemanagement');activeStateCheck('Employemanagement');openByDefault();spouseOuter();" class="com_admin_btns hding_span" href="javascript:void(0)">New Employee</a>


            </span></h3>
        <div class="table-responsive  viewpro-dv" addpopup ng-init="getAllEmployees()" ng-bind-html="getAllEmployeeData">
            <table class="table table-hover">

                <thead> 
                    <tr> 
                        <th>User</th>
                        <th>Created</th>
                        <th >Last Activity</th> 
                        <th>User Type</th>
                        <th>Role</th>
                        <th>Profile</th>
                        <th> Account Type</th>
                        <th colspan="2" class="">Actions</th>
                    </tr> 
                </thead> 
                <tbody class="EmployeeContent" > 
                    <?php
                    if (!empty($allEmployee)) {
                        $i = 1;
                        foreach ($allEmployee as $key => $value) {
                            if ($i % 2 == 0) {
                                ?>
                                <tr class="" id="delRows<?php echo $key; ?>">
                                    <?php
                                } else {
                                    ?>
                                <tr class="rw_back" id="delRows<?php echo $key; ?>">
                                    <?php
                                }
                                ?>

                                <?php ?>
                                <?php
                                $statusSpouse = 'remove';
                                if (!empty($value['EmployeeDetail']['spouse_first_name'])) {
                                    $statusSpouse = 'add';
                                }
                                ?>


                                <td><a style="cursor:pointer !important;" ng-click="deleteTabByName('Employemanagement');  page.addTab('<?php echo $value['EmployeeDetail']['emp_first_name'] . ' ' . $value['EmployeeDetail']['emp_last_name']; ?>', 'employee/add/<?php echo $value['EmployeeDetail']['id']; ?>', 'Employemanagement');
                                            activeStateCheck('Employemanagement');
                                            editEmployeeRecord('<?php echo $value['EmployeeDetail']['id']; ?>');
                                                addSpouse('<?php echo $value['EmployeeDetail']['id']; ?>', '<?php echo $statusSpouse; ?>')"><?php echo $value['EmployeeDetail']['emp_first_name'] . ' ' . $value['EmployeeDetail']['emp_last_name']; ?> </a></td>
                                <td><?php echo date('M d, Y', strtotime($value['EmployeeDetail']['created'])); ?></td> 
                                <td><?php echo date('M d, Y', strtotime($value['EmployeeDetail']['created'])); ?></td> 
                                <td><?php echo @$value['EmployeeAssignment'][0]['user_type']; ?></td>
                                <td><?php echo @$value['EmployeeAssignment'][0]['title']; ?></td> 
                                <td>Senior Manager</td> 
                                <td>
                        <?php 
                        if(!empty($value['EmployeeDetail']['paid_status'])){
                            ?>
                        Paid
                        <?php
                        }else{
                            ?>
                        
                        <?php   
                        }
                        ?>
                        
                    </td>

                                <td class="cus_pro_td">
                                    <a href="javascript:void(0);" ng-click="deleteTabByName('Employemanagement'); page.addTab('<?php echo $value['EmployeeDetail']['emp_first_name'] . ' ' . $value['EmployeeDetail']['emp_last_name']; ?>', 'employee/add/<?php echo $value['EmployeeDetail']['id']; ?>', 'Employemanagement');
                                                activeStateCheck('Employemanagement');
                                                editEmployeeRecord('<?php echo $value['EmployeeDetail']['id']; ?>');
                                                    addSpouse('<?php echo $value['EmployeeDetail']['id']; ?>', '<?php echo $statusSpouse; ?>')"><img src="<?php echo $this->webroot; ?>images/edit.png" alt=""/><span class="icons_cls">Edit</span></a>
                                </td>
                                
                                
                                

                                <td class="cus_pro_td">
                                    <a  href="javascript:void(0);" >              
                                        <?php
                                        $src1 = $this->webroot . "images/default-avatar.png";
                                        if (!empty($value['EmployeeDetail']['emp_image'])) {
                                            $src1 = $this->webroot . "upload/Employee/" . $value['EmployeeDetail']['emp_image'];
                                        }
                                        ?>

                                        <img src="<?php echo $this->webroot; ?>images/view_profile_icon.png" alt=""/>

                                        <span class="profileview">


                                            <img alt="user Image" src="<?php echo $src1; ?>" id="">

                                            <ul>
                                                <li><b><?php echo $value['EmployeeDetail']['emp_first_name'] . ' ' . $value['EmployeeDetail']['emp_last_name']; ?></b></li>


                                                <li><?php echo @$value['EmployeeAssignment'][0]['title']; ?></li>                                    

                                                <li><?php echo $value['Branch']['office']; ?></li>    
                                                <li><b>Cell   :</b>     <?php echo $value['EmployeeDetail']['cell']; ?></li> 
                                                <li><b>Office : </b>    <?php echo $value['EmployeeDetail']['home']; ?></li> 

                                                <li><small>Lives in <?php echo $value['EmployeeDetail']['city']; ?></small></li> 
                                                <li>
                                                   <button type="button"  ng-click="openPopUp('get', 'employee/send_message/<?php echo $value['EmployeeDetail']['id']; ?>', 'trms_services send_msg')" class="snd_msg btm_btns"><span></span>
                                                Send Message</button>
                                                </li> 
                                            </ul>
                                            


                                        </span>
                                    </a>
                                </td>  
                                
                                
                                <td class="cus_pro_td">
                                    <a href="javascript:void(0);" ng-click="deleteRecords('delRows<?php echo $key; ?>', 'employee/delete_emploee/<?php echo $value['EmployeeDetail']['id']; ?>')"><img src="<?php echo $this->webroot; ?>images/trash.png" alt=""/><span class="icons_cls">Trash</span></a>                                </td>   
                            </tr>
                            <?php
                            $i++;
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="7" style="text-align: center; ">
                                No Employee(s) found.
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody> 
            </table>
        </div>

    </div>
</div>

