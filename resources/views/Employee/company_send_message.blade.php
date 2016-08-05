<div class="modal-dialog employe_Send_msg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><img src="<?php echo $this->webroot; ?>images/close_icon.png" alt=""/></span></button>
            <h4 class="modal-title text-center" id="myModalLabel">Send System Message</h4>
        </div>
        <form  id="sendSystemMesgToEmploee" ng-submit="sendMesg('<?php echo @$employeeDetail['EmployeeDetail']['id'];?>');">
            <div class="modal-body clearfix">    
                <div class="row">
                    <div class="col-md-12 res_cls1 ">
                        <div class="form-group  clearfix mrgnTop"> 
                            <input name="data[SendMessage][subject]" type="text" placeholder="Subject"  class="form-control" > 
                        </div>
                        <div class="form-group clearfix"> 
                            <textarea name="data[SendMessage][message]" rows="10" cols="25" placeholder="Message"></textarea> 
                        </div>
                        <div class="col-md-4 spc  clearfix">
                            <p>
                                <button class="snd_msg btm_btns" type="submit"><span><img alt="" src="<?php echo $this->webroot; ?>images/send_icon.png"></span>
                                    Send </button>
                            </p>
                        </div>

                    </div>
                </div
            </div>
        </form>
    </div>
</div>

<script>
    $('.selectpicker').selectpicker();
</script>