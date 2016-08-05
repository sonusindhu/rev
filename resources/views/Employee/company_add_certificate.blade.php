<div class="clearfix"></div>
<div class="row ">
    <div class="col-md-3 col-sm-6 clearfix">
        <div class="form-group">
           
            <input type="text" name="data[EmployeeCertification][<?php echo $child; ?>][name]" class="form-control" placeholder=" <?php if($child==0){
                echo "Enter Name";
            }; ?>">
        </div>

    </div>
    <div class="col-md-4 col-sm-6 clearfix">
        <div class="form-group">
           
            <input type="text" name="data[EmployeeCertification][<?php echo $child; ?>][acronym]"  class="form-control"  placeholder="">
        </div>

    </div>

    <div class="col-md-3 col-sm-6 clearfix">
        <div class="form-group">
         
            <div class="input-group date  col-sm-12 bdy_dte" id="datetimepicker11">
                <input name="data[EmployeeCertification][<?php echo $child; ?>][since]" type="text" class="form-control datepicker1" placeholder=" mm/dd/yyyy">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
    </div>


    <div class="col-md-1 col-sm-6 clearfix trshicon">
        <a href="javascript:void(0);" id="delete_certi_<?php echo $child; ?>" ng-click="deleteCerti('delete_certi_<?php echo $child; ?>','')"><img src="<?php echo $this->webroot; ?>images/trash.png" alt="" /></a>
    </div>

</div>