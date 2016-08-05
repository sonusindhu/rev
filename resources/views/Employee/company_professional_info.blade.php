 <input type="hidden" name="data[EmployeeDetail][id]" class="employee_id"  value="{{employee_id}}" />
<div aria-labelledby="Generalinfo_tab" id="GeneralInfo" class="tab-pane fade active in title_head" role="tabpanel"> 
    <form id="idforForm" ng-submit="AddEmployee('<?php echo @$employeeDetail['EmployeeDetail']['id']; ?>')">
        <!--<form id="addCertificationDetail" ng-submit="addCertificationDetail()">-->
        <input type="hidden" name="data[EmployeeDetail][id]" class="employee_id"  value="{{employee_id}}" />
        <div class="col-md-12 general_dv  clearfix employe_link ">
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
            <div class="clearfix"></div>
            <div class="col-md-10 tip_textarea spc">
                <label>Professional Bio</label>
                <textarea name="data[EmployeeDetail][professional_bio]" cols="" rows=""><?php echo @$employeeDetail['EmployeeDetail']['professional_bio']; ?></textarea>

            </div>
            <div class="clearfix"></div>
            <h4> <span class="title_spn1">Certifications </span>
                <?php
                $style = "";
                if (!empty($view_employeeDetail)) {
                    $style = "display:none";
                }
                ?>
                <span  style="<?php echo $style; ?>">
                    <a href="javascript:void(0)" ng-click="addCertificate(certificate)" class="com_admin_btns">Add New</a>
                </span>
            </h4>
            <div class="col-md-12 spc childrn_sec clearfix addCerti" addpopup compile-template>
                <input type="hidden" ng-init="certificate = '0'" ng-model="certificate" id="certiVal" value="<?php echo count(@$employeeDetail['EmployeeCertification']); ?>"/>
                <?php
                if (!empty($employeeDetail['EmployeeCertification'])) {
                    foreach ($employeeDetail['EmployeeCertification'] as $key => $value) {
                        ?>
                        <div class="row">
                            <div class="col-md-3 col-sm-6 clearfix">
                                <div class="form-group">
                                    <?php if($key==0){
                                       ?>
                                    <label for="exampleInputEmail1">Certification Name</label>
                                    <?php
                                    }?>
                                    
                                    <input type="text" name="data[EmployeeCertification][<?php echo $key; ?>][name]" class="form-control"  value="<?php echo $value['name']; ?>" placeholder="Enter Name">
                                </div>

                            </div>
                            <div class="col-md-4 col-sm-6 clearfix">
                                <div class="form-group">
                                      <?php if($key==0){
                                       ?>
                                  <label for="exampleInputEmail1">Acronym</label>
                                    <?php
                                    }?>
                                   
                                    <input type="text" name="data[EmployeeCertification][<?php echo $key; ?>][acronym]"  class="form-control"  value="<?php echo $value['acronym']; ?>"  placeholder="">
                                </div>

                            </div>
                            <div class="col-md-3 col-sm-6 clearfix">
                                <div class="form-group">
                                      <?php if($key==0){
                                       ?>
                                     <label for="exampleInputEmail1">Since</label>
                                    <?php
                                    }?>
                                  
                                    <div class="input-group date  col-sm-12 bdy_dte" id="datetimepicker11">
                                        <input  value="<?php echo $value['since']; ?>"  name="data[EmployeeCertification][<?php echo $key; ?>][since]" type="text" class="form-control datepicker1" placeholder="mm/dd/yyyy">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <?php if($key==0){
                                       ?>
                                  <div class="col-md-1 col-sm-6 clearfix  trsh">
                                    <?php
                                    }else{
                                       ?>
                                       <div class="col-md-1 col-sm-6 clearfix  trshicon">
                                      <?php
                                    }?>
                            
                                
                                <a style="<?php echo $style; ?>" href="javascript:void(0);" id="delete_certi_0" ng-click="deleteCerti('delete_certi_0', '<?php echo $value['id']; ?>')"><img src="<?php echo $this->webroot; ?>images/trash.png" alt="" /></a>
                            </div>
                        </div>
    <?php }
} else {
    ?>
                    <div class="row">
                        <div class="col-md-3 col-sm-6 clearfix">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Certification Name</label>
                                <input type="text" name="data[EmployeeCertification][0][name]" class="form-control" placeholder="Enter Name">
                            </div>

                        </div>
                        <div class="col-md-4 col-sm-6 clearfix">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Acronym</label>
                                <input type="text" name="data[EmployeeCertification][0][acronym]"  class="form-control"  placeholder="">
                            </div>

                        </div>
                        <div class="col-md-3 col-sm-6 clearfix">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Since</label>
                                <div class="input-group date  col-sm-12 bdy_dte" id="datetimepicker11">
                                    <input name="data[EmployeeCertification][0][since]" type="text" class="form-control datepicker1" placeholder="mm/dd/yyyy">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1 col-sm-6 clearfix  trsh">
                            <a href="javascript:void(0);" id="delete_certi_0" ng-click="deleteCerti('delete_certi_0', '')"><img src="<?php echo $this->webroot; ?>images/trash.png" alt="" /></a>
                        </div>
                    </div>
                    <?php }
                ?>
            </div>
        </div>
        <div class="col-md-12 text-center spc btm_btns">
            <button type="submit">Save</button>
            <a class=" cncel_btn" href="javascript:void(0);">Cancel</a>
        </div>
    </form>
    <div class="clearfix"></div>
    <div style="display:none;"  class="alert alert-success ResponseDiv">
        <a title="close" aria-label="close" data-dismiss="alert" class="close" href="javascript:void(0);">&times;</a>
        <strong>Success!</strong> Employee Professional details added successfully.
    </div>
</div>
