<div aria-labelledby="Generalinfo_tab" id="GeneralInfo" class="tab-pane fade active in title_head" role="tabpanel">       
    <div class="col-md-12 general_dv  clearfix employe_link  form_fields">
         <?php
        if (!empty($employeeDetail['EmployeeDetail']['id'])) {
            ?>
            <div class="row" compile_template>
                <ul class="employe_li">
                    <li class="{{personel_info}} active"><a ng-click="addTabMenu('personel_info', 'employee/personel_info/<?php echo $employeeDetail['EmployeeDetail']['id']; ?>', 'personel_info');
                                                            <?php 
                                                            if(!empty($employeeDetail['EmployeeDetail']['spouse_first_name'])){
                                                                ?>
                                                                    addSpouse('<?php echo $employeeDetail['EmployeeDetail']['id']; ?>');
                                                                    <?php
                                                                
                                                            }?>" id="personel_info" href="javascript:void(0);">Personal info</a></li>
                    <li class="{{professional_info}}" ><a ng-click="addTabMenu('professional_info', 'employee/personel_info/<?php echo $employeeDetail['EmployeeDetail']['id']; ?>', 'professional_info')"  id="professional_info" href="javascript:void(0);">Professional Info</a></li>
                    <li class="{{contact_info}}" ><a ng-click="addTabMenu('contact_info', 'employee/personel_info/<?php echo $employeeDetail['EmployeeDetail']['id']; ?>', 'contact_info')" id="contact_info" href="javascript:void(0);">Contact Detail</a></li>
                    <li class="{{activity}}" ><a  ng-click="addTabMenu('activity', 'employee/personel_info/<?php echo $employeeDetail['EmployeeDetail']['id']; ?>', 'activity')" id="activity" href="javascript:void(0);">Activity</a></li>
                </ul>
            </div>
            <?php
        } else {
            echo $this->element('company_employee_tabs_li');
        }
        ?>
    </div>
    <div class="clearfix"></div>
  <div class="table-responsive manage_licsn_tabl license_user">
                    <table class="table table-striped table-hover">
                        <tbody><tr class="bg_white">
                            <th class="padd_15lft">Login per day</th>
                            <th class="padd_15lft">Last login</th>
                            <th class="padd_15lft">Time per sesion</th>
                          <th  class="padd_15lft">Record of previous data</th>
                           
                        </tr>
                        </tbody><tbody>
                                                        <tr class=""> 
                                <td><a href="javascript:;">2 times</a></td>
                                <td>Apr 27, 2016 10:44:44 am</td>
                                <td>50 minutes</td>
                                <td> Data Here</td> 
                              
                            </tr>
                                                      
                                                       
                                                       </tbody> 
                    </table>
                </div>
</div>