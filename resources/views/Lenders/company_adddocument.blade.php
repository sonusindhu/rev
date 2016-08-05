<!---------------Add Documents Popup----------->

<div role="document" class="modal-dialog">
    <div class="modal-content notice_dv">
        <div class="modal-header ">
            <button aria-label="Close" data-dismiss="modal" class="close" type="button"><img src="../images/close_icon.png" alt=""></button>
            <h4 id="myModalLabel" class="modal-title">Lender Documents</h4>
        </div>
        <div class="modal-body clearfix">
            <div class="col-md-12 general_dv popup_inner clearfix ">
                <h4>Upload Document</h4>
                <form class="updoc_sec" id="addLenderDocumentForm" ng-submit="addLenderDocument('<?php echo $this->webroot; ?>company/lenders/adddocument?lender_id=<?php echo $lenderid; ?>')" enctype="multipart/form-data">
                    <input type="hidden" value="<?php echo rand(10, 100000); ?>">
                    <input type="hidden" value="<?php echo $_SESSION['Auth']['User']['id']; ?>" name="data[LenderDocument][user_id]">
                    <input type="hidden" value="<?php echo $lenderid; ?>" name="data[LenderDocument][lender_id]">
                    <div class="col-md-12   spc form_fields cust_padd">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" placeholder="" name="data[LenderDocument][name]">
                        </div>
                        <div class="form-group updocuments ">
                            <label>Upload</label>  
                            <input id="uploadDocFileName" type="text" disabled="" class="form-control" placeholder="">
                            <div class="fileUpload btn btn-primary">
                                <span><img alt="" src="<?php echo $this->webroot; ?>images/fileupicon.png"></span>
                                <input type="file" class="upload uploadDocFile" name="data[LenderDocument][file]">
                            </div>

                        </div>  
                        <div class="form-group doc_check">
                            <label>

                            </label>
                            <div class="checkbox"> 
                                <label> 
                                    <input type="radio" value="0" name="data[LenderDocument][security]">Private
                                </label> 
                            </div>
                            <div class="checkbox"> 
                                <label> 
                                    <input value="1" type="radio" name="data[LenderDocument][security]">Public
                                </label> 
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 text-center spc btm_btns mar-20  btmmar">
                        <button type="submit">Save</button>
                        <a class=" cncel_btn" data-dismiss="modal" class="close" type="button">Cancel</a>
                    </div>    
                </form>
            </div>

        </div>
    </div>
</div>

<!---------------Add Documents popup end----------->