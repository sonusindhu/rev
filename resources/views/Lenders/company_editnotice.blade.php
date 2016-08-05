<!---------------Create notice Popup----------->
<div class="modal-dialog" role="document">
    <div class="modal-content notice_dv">
        <div class="modal-header ">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><img alt="" src="<?php echo $this->webroot; ?>images/close_icon.png"></button>
            <h4 class="modal-title" id="myModalLabel">Lender Correspondence</h4>
        </div>
        <div class="modal-body  clearfix">

            <div data-example-id="togglable-tabs" class="bs-example bs-example-tabs">
                <ul role="tablist" class="nav nav-tabs" id="myTabs6"> 
                    <li class="active" role="presentation"><a aria-expanded="true" aria-controls="home" data-toggle="tab" role="tab" id="msg_setting" href="#msgsetting">Message Setting</a></li>
                    <li role="presentation" class=""><a aria-controls="profile" data-toggle="tab" id="msg_body" role="tab" href="#msgbody" aria-expanded="false">Message Body</a></li>
                    <li role="presentation" class=""><a aria-controls="profile" data-toggle="tab" id="preview" role="tab" href="#preview_dv" aria-expanded="false">Preview</a></li>
                    <li role="presentation" class=""><a aria-controls="profile" data-toggle="tab" id="Resourses" role="tab" href="#Resourses_dv" aria-expanded="false">Resources</a></li>

                </ul>
                <form id="editLenderNoticeForm" ng-submit="editLenderNotice('<?php echo $this->webroot; ?>company/lenders/editnotice/<?php echo $lendernotice['LenderNotice']['id']; ?>')">
                    <div class="tab-content" id="myTabContent6">
<input type="hidden" value="<?php echo rand(10, 100000); ?>">

                        <input type="hidden" value="<?php echo $lendernotice['LenderNotice']['user_id']; ?>" name="data[LenderNotice][user_id]">
                        <input type="hidden" value="<?php echo $lendernotice['LenderNotice']['lender_id']; ?>" name="data[LenderNotice][lender_id]">
                        <input type="hidden" value="<?php echo $lendernotice['LenderNotice']['id']; ?>" name="data[LenderNotice][id]">

                        <div aria-labelledby="msg_setting" id="msgsetting" class="tab-pane fade active in" role="tabpanel"> 
                            <div class="col-md-12 general_dv ">
                                <div class="col-md-12 spc form_fields spc  popup_inner">
                                    <div class="form-group">
                                        <label class="col-sm-3">Subject</label> 
                                        <div class="col-sm-9 res_spc1">
                                            <input type="text" placeholder="Enter subject here" class="form-control" name="data[LenderNotice][subject]" value="<?php echo $lendernotice['LenderNotice']['subject']; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group send_msg">
                                        <label class="col-sm-3">Category </label> 
                                        <div class="col-sm-9 res_spc1">
                                            <select class="selectpicker col-md-8 spc" name="data[LenderNotice][category]">
                                                <option <?php if ($lendernotice['LenderNotice']['category'] == 'General Announcement') echo 'selected'; ?> >General Announcement</option>
                                                <option <?php if ($lendernotice['LenderNotice']['category'] == 'Lender Policy') echo 'selected'; ?>>Lender Policy</option>
                                                <option <?php if ($lendernotice['LenderNotice']['category'] == 'Lender Training') echo 'selected'; ?>>Lender Training</option>
                                                <option <?php if ($lendernotice['LenderNotice']['category'] == 'Marketing Information') echo 'selected'; ?>>Marketing Information</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group send_msg">
                                        <label class="col-sm-3">Importance</label> 
                                        <div class="col-sm-9 res_spc1">
                                            <select class="selectpicker col-md-8 spc" name="data[LenderNotice][importance]">
                                                <option <?php if ($lendernotice['LenderNotice']['importance'] == 'Affects Current Loan') echo 'selected'; ?>>Affects Current Loan</option>
                                                <option <?php if ($lendernotice['LenderNotice']['importance'] == 'Critical') echo 'selected'; ?>>Critical</option>
                                                <option <?php if ($lendernotice['LenderNotice']['importance'] == 'Important') echo 'selected'; ?>>Important</option>
                                                <option <?php if ($lendernotice['LenderNotice']['importance'] == 'Recommended') echo 'selected'; ?>>Recommended</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group top0 send_msg  res_datepick">
                                        <label class="col-sm-3">Auto Delete on</label>
                                        <div class="col-sm-6 res_spc1"> 
                                            <div id="datetimepicker3" class="input-group date res_mar">
                                                <input type="text" class="form-control datepicker" name="data[LenderNotice][delete_on]" id="datepicker" value="<?php echo $lendernotice['LenderNotice']['delete_on']; ?>">
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group top0 send_msg ">
                                        <label class="col-sm-3">Send Email</label>
                                        <div class="col-sm-9 res_spc1"> 
                                            <div class="checkbox" > <label> 
                                                    <input type="checkbox" value="1" name="data[LenderNotice][send_mail]" <?php if ($lendernotice['LenderNotice']['send_mail']) echo 'checked'; ?>>
                                                </label> </div>
                                        </div>
                                    </div>
                                </div>
                             
                                <div class="col-md-12 text-center spc btm_btns btmmar">
                                    <button type="submit">Send correspondence</button>
                                    <a class=" cncel_btn" data-dismiss="modal" aria-label="Close">Cancel</a>
                                </div>
                             
                            </div>
                        </div>
                        <div aria-labelledby="msg_body" id="msgbody" class="tab-pane fade msgcls" role="tabpanel"> 
                            <div class="col-md-12 general_dv docu clearfix">

                                <div class="col-md-12 tip_textarea spc popup_inner">

                                    <textarea style="display: none;" id="ckeditordefault" ><?php echo $lendernotice['LenderNotice']['message']; ?></textarea>

                                    <textarea ck_editor rows="" cols="" name="data[LenderNotice][message]" ng-model="a.b" ng-bind-html="showPreview"><?php echo $lendernotice['LenderNotice']['message']; ?></textarea>
                                    <div class="col-md-12 ckeditor spc ">
                                    </div>
                                </div>
                              <div class="modal-footer">
                                <div class="col-md-12 text-center spc btm_btns ">
                                    <button type="submit">Send correspondence</button>
                                    <a class=" cncel_btn" data-dismiss="modal" aria-label="Close">Cancel</a>
                                </div>
                               </div>

                            </div>
                        </div>
                        <div aria-labelledby="preview" id="preview_dv" class="tab-pane fade " role="tabpanel"> 
                            <div class="col-md-12 general_dv docu popup_inner clearfix">
                                <div class="col-md-12 tip_textarea spc">
                                    <label>Preview</label>
                                    <div class="col-md-12 Preview_dv spc clearfix" ng-bind-html="showPreview"></div>
                               
     <div class="modal-footer">
                                    <div class="col-md-12 text-center spc btm_btns  ">
                                        <button type="submit">Send correspondence</button>
                                        <a class=" cncel_btn" data-dismiss="modal" aria-label="Close">Cancel</a>
                                    </div> </div>
                                
                                </div>
                            </div>
                        </div>
                        <div aria-labelledby="Resourses" id="Resourses_dv" class="tab-pane fade  " role="tabpanel"> 
                            <div class="col-md-12 general_dv docu  popup_inner clearfix">
                                <div class="col-md-12 tip_textarea spc">
                                    <label>File</label>
                                    <div class="col-md-12 Preview_dv spc">
                                        <table class="table">
                                            <tbody>
                                                <?php
                                                foreach ($lendernotice['LenderResource'] as $key => $value) {
                                                    ?> 
                                                    <tr id="resources_<?php echo $value['id']; ?>">
                                                        <td>
                                                            <strong><?php echo $value['file']; ?></strong>
                                                        </td>
                                                        <td nowrap>
                                                            <button type="button" class="btn btn-danger btn-xs" ng-click="removeResources(<?php echo $value['id']; ?>)">
                                                                <span class="glyphicon glyphicon-trash"></span> Remove
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
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

     <div class="modal-footer">
                                    <div class="col-md-12 text-center spc btm_btns form_fields ">
                                        <div class="fileUpload btn btn-primary">
                                            <span>Add File</span>
                                            <input type="file" class="upload" nv-file-select="" uploader="uploader" multiple >

                                        </div>
                                        </div>
<!--                                        <button type="submit">
                                            Submit
                                        </button>-->
                                        
                                    </div>
                                </div>   
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!---------------Create notice Popup end----------->