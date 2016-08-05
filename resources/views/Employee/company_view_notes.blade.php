<!---------------Note Popup----------->

<div class="modal-dialog view_note_popup" role="document">
    <div class="modal-content notice_dv">
        <div class="modal-header ">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><img alt="" src="<?php echo $this->webroot; ?>images/close_icon.png"></button>
            <h4 class="modal-title" id="myModalLabel">View Note</h4>
        </div>
        <div class="modal-body  clearfix">
            <div class="col-md-12 general_dv spc full_note">
            
             <h4><?php echo $view['EmployeeNote']['subject']; ?></h4>
             <h5><b><?php echo $view['EmployeeNote']['name']; ?></b></h5>
               <h6><?php echo date("F d, Y",strtotime($view['EmployeeNote']['created']))." at ". date(" h:i A",strtotime($view['EmployeeNote']['created']));?> </h6>
               
               <p><?php echo $view['EmployeeNote']['notes']; ?></p>

               
            </div>
        </div>

        <div class="modal-footer">
            <div class="col-md-12 text-center spc btm_btns">
                <a class=" cncel_btn" data-dismiss="modal" aria-label="Close">Close</a>
            </div>
        </div>

    </div>
</div>
<!---------------Note Popup end----------->  
