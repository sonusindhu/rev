<div class="modal-dialog" role="document" ng-app="autocompleteDemo">
    <form id="addUserLicense" ng-submit="addUserLicense('<?php
    if (!empty($employeeDetail['EmployeeDetail']['id'])) {
        echo @$employeeDetail['EmployeeDetail']['id'];
    } else {
        echo @$test;
    }
    ?>')">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">
                        <img src="./images/close_icon.png" alt=""/>
                    </span>
                </button>
                <h4 class="modal-title">
                    Add User License
                </h4>
            </div>
            <div class="modal-body form_fields  rolenew clearfix">
                <div class="form-group">
                    <label>Number of Licenses to add</label>
                    <input ng-keyup="licensePrice($event);" type="text" value="<?php
                    if (isset($employeeDetail[0]->number_of_licenses) and ! empty($employeeDetail[0]->number_of_licenses)) {
                        echo @$employeeDetail[0]->number_of_licenses;
                    } else {
                        echo @$employeeDetail[0]->number_of_licenses;
                    }
                    ?>" name="data[EmployeeDetail][number_of_licenses]" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label id="labl">Amount Billed <?php
                           if (!empty($employeeDetail[0]->timing)) {
                               echo @ucfirst($employeeDetail[0]->timing);
                           } elseif (isset($employeeDetail[0]->timing) and ! empty($employeeDetail[0]->timing)) {
                               echo @ucfirst($employeeDetail[0]->timing);
                           } else {
                        ?>Monthly/Anually
                            <?php
                        }
                        ?></label>
                    <br>
                    <span id="adedValue1"><?php
                        if (isset($employeeDetail[0]->amount_billed) and ! empty($employeeDetail[0]->amount_billed)) {
                            echo '$' . @$employeeDetail[0]->amount_billed;
                        } else {
                            echo '$' . @$employeeDetail[0]->amount_billed;
                        }
                        ?></span>
                    <input id="adedValue" type="hidden" value="<?php
                        if (isset($employeeDetail[0]->amount_billed) and ! empty($employeeDetail[0]->amount_billed)) {
                            echo '$' . @$employeeDetail[0]->amount_billed;
                        } else {
                            echo '$' . @$employeeDetail[0]->amount_billed;
                        }
                        ?>" name="data[EmployeeDetail][amount_billed]" class="form-control" placeholder="">
                    <input id="timing" type="hidden" value="<?php
                    if (isset($employeeDetail[0]->timing) and ! empty($employeeDetail[0]->timing)) {
                        echo @$employeeDetail[0]->timing;
                    } else {
                        echo @$employeeDetail[0]->timing;
                    }
                        ?>" name="data[EmployeeDetail][timing]" class="form-control" placeholder="">
                    <% csrf_field() %>
                </div>
            </div>
            <div class="modal-footer mar15">
                <div class="col-md-12 text-center spc btm_btns">
                    <button type="submit">Save</button>
                    <a class=" cncel_btn" data-dismiss="modal" aria-label="Close" href="javascript:void(0)">Cancel</a>
                </div>
            </div>
        </div>
    </form>
</div>

