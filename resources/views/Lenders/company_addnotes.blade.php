<!---------------add notes Popup----------->

<div class="modal-dialog" role="document">
    <div class="modal-content notice_dv">
        <div class="modal-header ">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><img alt="" src="<?php echo $this->webroot; ?>images/close_icon.png"></button>
            <h4 class="modal-title" id="myModalLabel">NEW LENDER NOTE</h4>
        </div>
        <div class="modal-body clearfix">
            
            
            <div data-example-id="togglable-tabs" class="bs-example bs-example-tabs">
                <ul role="tablist" class="nav nav-tabs" id="myTabsNotes"> 
                    <li class="active" role="presentation">
                        <a aria-expanded="true" aria-controls="home" data-toggle="tab" role="tab" id="Create_new_notes" href="#createnewnotes">Create New Note</a></li>
                    <li role="presentation" class="">
                        <a aria-controls="profile" data-toggle="tab" id="Resourse_dv_notes" role="tab" href="#Resourses" aria-expanded="false">Resources</a>
                    </li>
                </ul>
                <form id="addLenderNotesForm" ng-submit="addLenderNotes('<?php echo $this->webroot; ?>company/lenders/addnotes?lender_id=<?php echo $lenderid; ?>')">
                    <input type="hidden" value="<?php echo rand(10, 100000); ?>">
                    <input type="hidden" value="<?php echo $_SESSION['Auth']['User']['id']; ?>" name="data[LenderNote][user_id]">
                    <input type="hidden" value="<?php echo $lenderid; ?>" name="data[LenderNote][lender_id]">
                    
                    <div class="tab-content" id="myTabContentNotes"> 
                        <div aria-labelledby="Create_new_tip" id="createnewnotes" class="tab-pane fade active in" role="tabpanel"> 
                            <div class="col-md-12 general_dv popup_inner clearfix">  
                                
                                
                               <div class="col-md-12  tip_textarea spc ">
                                <textarea rows="" cols="" ck_editor name="data[LenderNote][tips]" ng-model="a.b" ng-bind-html="showPreview"></textarea>
                                <div class="col-md-12 ckeditor spc "></div>
                            </div>
                                
                               <div class="col-md-12 text-center spc btm_btns btmmar">
                                <button type="submit">Create</button>
                                <a class=" cncel_btn" data-dismiss="modal" aria-label="Close">Cancel</a>
                            </div> 
                                
                                
                            </div>
                        </div>
                        <div aria-labelledby="Resourse_dv_notes" id="Resourses" class="tab-pane fade " role="tabpanel"> 
                            <div class="col-md-12 general_dv docu popup_inner clearfix ">
                                <div class="col-md-12 tip_textarea spc">
                                    <label>File</label>
                                    <div class="col-md-12 Preview_dv spc">
                                        <table class="table">
                                            <tbody>
                                                <tr ng-repeat="item in uploader.queue">
                                                    <td>
                                                        <strong>{{ item.file.name}}</strong>
                                                    </td>
                                                    <td nowrap>
                                                        <button type="button" class="btn btn-danger btn-xs" ng-click="item.remove()">
                                                            <span class="glyphicon glyphicon-trash"></span> Remove
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-12 text-center spc btm_btns btmmar form_fields">
                                    <div class="fileUpload btn btn-primary">
                                        <span>Add File</span>
                                        <input type="file" class="upload" nv-file-select="" uploader="uploader" multiple >
                                    </div>
                                        <button type="submit">
                                            Submit
                                        </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!---------------add notes popup end----------->