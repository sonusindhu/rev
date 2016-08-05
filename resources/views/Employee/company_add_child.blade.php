 <div class="row childAdded selct_new">
                <div class="col-md-2  col-sm-4">
                    <div class="form-group">
                     
                        <input type="text" name="data[EmployeeChildren][<?php echo $child; ?>][first_name]" class="form-control"  placeholder=" <?php if($child==0){  echo "First Name";  } ?>
                               ">
                    </div>

                </div>
                <div class="col-md-2  col-sm-4">
                    <div class="form-group">
                     
                        <input name="data[EmployeeChildren][<?php echo $child; ?>][last_name]" type="text" class="form-control"  placeholder=" <?php if($child==0){
                                   echo "Last Name";
                               } ?>">
                    </div>

                </div>
                <div class="col-md-2  col-sm-4">
                    <div class="form-group">
                        <div class="send_msg">
                            <select  name="data[EmployeeChildren][<?php echo $child; ?>][relationship_status]" class="selectpicker spc">
                                <option value="">Select</option>
                                <option value="son">Son</option>
                                <option value="daughter">Daughter</option>
                               
                            </select>
                        </div>
                    </div>

                </div>
                <div class="col-md-2 col-sm-4">
                    <div class="form-group">
                     
                        <div class="input-group date  col-sm-12 bdy_dte" id="datetimepicker9">
                            <input  name="data[EmployeeChildren][<?php echo $child; ?>][birthday]" type="text" class="form-control datepicker2 datepickerAge" placeholder="<?php if($child==0){
                                   echo "mm/dd/yyyy";
                               } ?>">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-1  col-sm-4 text-center">

                    <div class="form-group">
                     
                        <span class="age_span age">0</span>
                    </div>
                </div>
                <div class="col-md-1 col-sm-4 text-center">
                    <a href="javascript:void(0)" id="delete_<?php echo $child; ?>" ng-click="deleteChild('delete_<?php echo $child; ?>')"  class=""><img src="<?php echo $this->webroot; ?>images/trash.png" alt="" /></a>
                </div>

            </div>