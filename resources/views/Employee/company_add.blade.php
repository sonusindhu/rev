<div class="col-md-12 companyadmin_outer " >
    <div class="col-md-12 spc form_fields spc  ">
        <div class="col-md-12 spc  sep_div new_lender">
            <div data-example-id="togglable-tabs" class="bs-example bs-example-tabs">
                <?php
                if (!empty($employee_id)) {
                    ?>
                    <ul role="tablist" class="nav nav-tabs" id="myTabs1"> 
                        <li class="active" role="presentation">
                            <a   href="javascript:void(0)"  id="Generalinfo_tab" ng-click="addTabModule('Generalinfo_tab', 'employee/generalinfo_tab/<?php echo $employee_id; ?>')">General</a>
                        </li>
                        <li role="presentation" class="">
                            <a id="Humanresourse_tab" role="tab" href="javascript:void(0)" ng-click="addTabModule('Humanresourse_tab', 'employee/humanresourse_tab/<?php echo $employee_id; ?>')">Human Resources </a>
                        </li>
                        <li role="presentation" class="">
                            <a  ng-click="addTabModule('admin_tab', 'employee/admin_tab/<?php echo $employee_id; ?>');"  id="admin_tab" href="javascript:void(0)">Admin</a>
                        </li>
                    </ul>
                    <?php
                } else {
                    echo $this->element('company_tabs');
                }
                ?>

                <div class="tab-content" id="myTabContent"> 
                    <input type="hidden" name="data[EmployeeDetail][id]" class="employee_id"  value="{{employee_id}}" />

                    <div aria-labelledby="Generalinfo_tab" id="GeneralInfo" class="tab-pane fade active in title_head" role="tabpanel"> 

                        <div class="col-md-12 general_dv clearfix employe_link" ng-bind-html="addTabsData" addpopup compile_template >
                            <?php
                            if (!empty($employee_id)) {
                                ?>
                                <div class="row" compile_template>
                                    <ul class="employe_li">
                                        <li class="{{personel_info}} active"><a ng-click="addTabMenu('personel_info', 'employee/personel_info/<?php echo $employee_id; ?>', 'personel_info')" id="personel_info" href="javascript:void(0);">Personal info</a></li>
                                        <li class="{{professional_info}}" ><a ng-click="addTabMenu('professional_info', 'employee/personel_info/<?php echo $employee_id; ?>', 'professional_info')"  id="professional_info" href="javascript:void(0);">Professional Info</a></li>
                                        <li class="{{contact_info}}" ><a ng-click="addTabMenu('contact_info', 'employee/personel_info/<?php echo $employee_id; ?>', 'contact_info')" id="contact_info" href="javascript:void(0);">Contact Detail</a></li>
                                        <li class="{{activity}}" ><a  ng-click="addTabMenu('activity', 'employee/personel_info/<?php echo $employee_id; ?>', 'activity')" id="activity" href="javascript:void(0);">Activity</a></li>
                                    </ul>
                                </div>
                                <?php
                            } else {
                                echo $this->element('company_employee_tabs_li');
                            }
                            ?>

                        </div>

                    </div>
                    <!---generalinfo_tab--->
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div> 
</div>
