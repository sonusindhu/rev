<!---------------Create New Tip Popup----------->

<div class="modal-dialog" role="document">
    <div class="modal-content notice_dv">
        <div class="modal-header ">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><img alt="" src="<?php echo $this->webroot; ?>images/close_icon.png"></button>
            <h4 class="modal-title" id="myModalLabel">Lender Tip</h4>
        </div> 
        <div class="modal-body clearfix">
            <div data-example-id="togglable-tabs" class="bs-example bs-example-tabs">
                <ul role="tablist" class="nav nav-tabs" id="myTabsTips"> 
                    <li class="active" role="presentation"><a aria-expanded="true" aria-controls="home" data-toggle="tab" role="tab" id="Create_new_tip" href="#createnewtip">Create New Tip</a></li>
                    <li role="presentation" class=""><a aria-controls="profile" data-toggle="tab" id="Resourse_dv" role="tab" href="#Resourses" aria-expanded="false">Resources</a></li>
                </ul>
                <form id="editLenderTipsForm" ng-submit="editLenderTips('<?php echo $this->webroot; ?>company/lenders/edittips/<?php echo $lendertips['LenderTip']['id']; ?>')">
                    <input type="hidden" value="<?php echo rand(10, 100000); ?>">
                    <input type="hidden" value="<?php echo $_SESSION['Auth']['User']['id']; ?>" name="data[LenderTip][user_id]">
                    <input type="hidden" value="<?php echo $lendertips['LenderTip']['id']; ?>" name="data[LenderTip][id]">
                    <input type="hidden" value="<?php echo $lendertips['LenderTip']['lender_id']; ?>" name="data[LenderTip][lender_id]">
                    <div class="tab-content" id="myTabContentTips"> 
                        <div aria-labelledby="Create_new_tip" id="createnewtip" class="tab-pane fade active in" role="tabpanel"> 
                            <div class="col-md-12 general_dv popup_inner clearfix">  
                                <div class="col-md-12  tip_textarea spc ">
                                    <label>Auto Delete On</label>
                                    <div class="form-group send_msg">
                                        <div id="datetimepicker4" class="input-group date res_mar">
                                            <input type="text" class="form-control datepicker" name="data[LenderTip][delete_on]" value="<?php echo date('d/m/Y', strtotime($lendertips['LenderTip']['created'])); ?>">
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                    <label> Tip</label>
                                    <textarea style="display: none;" id="ckeditordefault" ><?php echo $lendertips['LenderTip']['message']; ?></textarea>
                                    <textarea rows="" cols="" ck_editor name="data[LenderTip][message]" ng-model="a.b" ng-bind-html="showPreview"><?php echo $lendertips['LenderTip']['message']; ?></textarea>
                                    <div class="col-md-12 ckeditor spc ">

                                    </div>
                                </div>
                                <div class="col-md-12 text-center spc btm_btns btmmar ">
                                    <!--<a  href="#">Create</a>-->
                                    <button type="submit">Create</button>
                                    <a class=" cncel_btn" data-dismiss="modal" aria-label="Close">Cancel</a>
                                </div>
                            </div>
                        </div>
                        <div aria-labelledby="Resourse_dv" id="Resourses" class="tab-pane fade " role="tabpanel"> 
                            <div class="col-md-12 general_dv docu popup_inner clearfix ">
                                <div class="col-md-12 tip_textarea spc">
                                    <label>File</label>
                                    <!--<textarea rows="" cols=""></textarea>-->
                                    <div class="col-md-12 Preview_dv spc">
                                        <table class="table">
                                            <tbody>
                                                <?php
                                                foreach ($lendertips['LenderResource'] as $key => $value) {
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
                                </div>
                                <div class="col-md-12 text-center spc btm_btns btmmar form_fields">

                                    <div class="fileUpload btn btn-primary">
                                        <span>Add File</span>
                                        <input type="file" class="upload" nv-file-select="" uploader="uploader" multiple >

                                    </div>
<!--                                    <button type="submit">
                                        Submit
                                    </button>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!---------------Create New Tip Popup end----------->