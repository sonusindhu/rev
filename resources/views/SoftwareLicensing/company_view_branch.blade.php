<div class="modal-dialog view_brnch_modal" role="document">
    <div class="modal-content clearfix">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><img src="images/close_icon.png" alt=""/></span></button>
            <h4 class="modal-title" id="myModalLabel"><?php   
                    echo $branchDetail['Branch']['office']; ?>  Profile</h4>
        </div>
        <div class="modal-body  clearfix  ">
            <div class="col-md-12 spc ">
                    <h4>Branch detail</h4>
                <div class="col-md-4 head_row">
                    <h5>Branch Manager</h5>
                    <p><?php
                    
                  
                    echo $branchDetail->emp_first_name.' '.$branchDetail->emp_last_name; ?></p>
                    <div class="clearfix"></div>
                    <h5>Address</h5>
                    <p><?php echo $branchDetail['Branch']['address']; ?><br>
                       <?php echo $branchDetail['State']['state']; ?>,<?php echo $branchDetail['Branch']['zipcode']; ?></p>

                </div>
                <div class="col-md-4  head_row">
                    <h5>NMLS Number</h5>
                    <p><?php echo $branchDetail['Branch']['nmls_number'];?></p>
                    <div class="clearfix"></div>
                    <h5>Tax Id (EIN)</h5>
                    <p>#<?php echo $branchDetail['Branch']['tax_id']; ?></p>

                </div>
                <div class="col-md-4 head_row">
                    <h5>Code</h5>
                    <p><?php echo $branchDetail['Branch']['code']; ?></p>
                    <div class="clearfix"></div>
                    <h5>Phone for Customer</h5>
                    <p><?php echo $branchDetail['Branch']['phone']; ?>
                        <br>
                        <?php echo $branchDetail['Branch']['telephone']; ?></p>

                </div> 
                <h4> Contact Detail</h4>
                <div class="col-md-4 head_row">
                    <h5> Email : </h5>
                    <p> <?php echo $branchDetail->business_email;?></p>
                    <div class="clearfix"></div>
                    <h5>Phone :</h5>
                    <p> <?php echo $branchDetail->cell;?>
                       </p>

                </div>
                
                       <div class="col-md-4 head_row">
                    <h5>Address :</h5>
                    <p> <?php echo $branchDetail->address;?></p>
                    <div class="clearfix"></div>
                    <h5>State : </h5>
                    <p> <?php echo $branchDetail['State']['state'];?>
                       </p>

                </div>
                
                    <div class="col-md-4 head_row">
                    <h5>City :</h5>
                    <p> <?php echo $branchDetail->city;?></p>
                    <div class="clearfix"></div>
                    <h5>Code :</h5>
                    <p><?php echo $branchDetail->code;?></p>
                      </div>
                 </div>
        </div>

    </div>
</div>