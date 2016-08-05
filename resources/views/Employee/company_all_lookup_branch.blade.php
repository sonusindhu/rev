<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><img src="<?php echo $this->webroot; ?>images/close_icon.png" alt=""/></span></button>
            <h4 class="modal-title" id="myModalLabel">Look up branch</h4>
        </div>
        <div class="modal-body form_fields clearfix">
            <div class="table-responsive manage_licsn_tabl license_user">
                <table class="table table-striped table-hover">
                    <tbody><tr class="bg_white">

                            <th  colspan="2" class="padd_15lft">Branch Name</th>
                            <th class="padd_15lft">NMLS#</th>
                            <th class="padd_15lft">Address </th>
                            <th class="padd_15lft">Branch Manager</th>
                        </tr>
                    </tbody> 
                    <tbody>
                         <input type="hidden" id="id" >
                                                <input type="hidden" id="name" >
                        <?php
                        if (!empty($branch)) {
                            foreach ($branch as $key => $value) {
                                ?>
                                <tr> 
                                    <td colspan="2">
                                        <div class="checkbox"> <label> 
                                               
                                                <input data-name="<?php echo $value['Branch']['office']; ?> " data-id="<?php echo $value['Branch']['id']; ?>" value="<?php echo $value['Branch']['id']; ?>" name="data[Branch][check]" class="branch_detail" type="radio" >
                                            </label> 
                                        </div><?php echo $value['Branch']['office']; ?> 
                                    </td>
                                    <td><?php echo $user['LicenseDetail']['nmls']; ?></td>
                                    <td><?php echo $value['Branch']['city']; ?>
                                        <?php echo $value['State']['state']; ?> <br>
                                        <?php echo $value['Branch']['address']; ?>
                                        <?php echo $value['Branch']['zipcode']; ?>  </td>
                                    <td><?php echo $value['Branch']['manager']; ?></td> 
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </tbody> 
                </table>
            </div>

        </div>
        <div class="modal-footer">
            <div class="col-md-12 text-center spc btm_btns">
                <a href="javascript:void(0)" aria-label="Close" data-dismiss="modal"  class="btm_btns btnwidth saveBranch">Save</a>
                <a href="javascript:void(0)" aria-label="Close" data-dismiss="modal" class=" cncel_btn">Cancel</a>

            </div>
        </div>
    </div>
</div>
<script>
    $(document).on('ifChecked', '.branch_detail', function () {
        var name = $(this).attr('data-name');
        var id = $(this).attr('data-id');
        $('#id').val(id);
        $('#name').val(name);
    });
    $(document).on('click', '.saveBranch', function () {
        var name = $('#name').val();
        var id =  $('#id').val();
        $('.branch_id').val(id);
        $('.branch_name').val(name);
        $('#showpopup').modal('hide');
    });
    
</script>

