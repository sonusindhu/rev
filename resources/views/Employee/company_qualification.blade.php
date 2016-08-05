<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><img src="<?php echo $this->webroot; ?>images/close_icon.png" alt=""/></span></button>
            <h4 class="modal-title" id="myModalLabel">
                <?php if($type=='qualification'){

                    $field='Qualification';
                   ?>
                Candidate Qualifications Review
                <?php
                }elseif($type=='legal'){
                      $field='Legal Documentation';
                  ?>
                Legal Documentation List
                      <?php  
                }
                else{
                     $field='New Employee Transition Checklist';
                    ?>
                <?php
                    
                }?>
                </h4>
        </div>
        <div class="modal-body clearfix">
            <h2>
                <a href="javascript:void(0);" ng-click="openPopUp('get', 'employee/add_qualification/<?php echo $type; ?>', 'hiring_popups')">Add <?php echo $field; ?></a>
            </h2>

            <div class="col-md-12 form_fields spc editqualificate">
                <div class="row">
                    <div id="sortable" class="col-md-6 col-sm-6 col-xs-6 spc qualificate_sec1 ">
                        <?php
                        if (!empty($qualification)) {
                            foreach ($qualification as $key => $value) {
                                ?>
                                <div id="<?php echo $value['HiringRequirement']['id']; ?>" class="form-group" >

                                    <div class="col-sm-10  col-xs-10 res_spc1  ">
                                        <input type="text" class="form-control" placeholder="<?php echo $value['HiringRequirement']['name']; ?>"><span>
                                            <a href="#">
                                                <img id="<?php echo $key + 1; ?>" src="<?php echo $this->webroot; ?>images/drag_icon.png" class="drag_img" alt=""/>
                                            </a>
                                        </span>
                                    </div>

                                    <div class="col-md-2 col-xs-2 del_icon  spc">
                                        <a href="javascript:void(0);" ng-click="inactiveRow($event,<?php echo $value['HiringRequirement']['id']; ?>);"><img src="<?php echo $this->webroot; ?>images/trash.png" alt=""/></a>
                                    </div>
                                </div>

                                <?php
                            }
                        }
                        ?>


                    </div>


                </div>
                <small> Will not affect any exiting employee record checklist</small>
            </div>

        </div>
        <div class="modal-footer">
            <div class="col-md-12 text-center spc btm_btns">
                
                <a data-dismiss="modal" aria-label="Close" class=" cncel_btn" href="javascript:void(0)">Close</a>
                <!--<a ng-click="openPopUp('get', 'employee/qualification/qualification', 'hiring_popups')" class=" cncel_btn" href="javascript:void(0)">Close</a>-->

            </div>
        </div>
    </div>
</div>
<script>
    
   $("#sortable").sortable({
        placeholder: "ui-state-highlight",
        update: function (event, ui) {
            var list_sortable = $(this).sortable('toArray').toString();
            $.ajax({
                url: 'employee/change_order',
                type: 'POST',
                data: {list_order: list_sortable},
                success: function (data) {
                    console.log(data);
                }
            });
        }
    });
</script>