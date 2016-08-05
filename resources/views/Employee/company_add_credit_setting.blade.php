<tr> 
    <td class="send_msg">
        <input  name="data[<?php echo $child; ?>][EmployeeCreditSetting][credit]" value="" type="text" placeholder="" class="form-control">

    </td>

    <td>   <input  name="data[<?php echo $child; ?>][EmployeeCreditSetting][account]" value="" type="text" placeholder="" class="form-control"></td>
    <td>   <input  name="data[<?php echo $child; ?>][EmployeeCreditSetting][username]" value="" type="text" placeholder="" class="form-control"></td>
    <td>   <input  name="data[<?php echo $child; ?>][EmployeeCreditSetting][password]" type="text" value=""  placeholder="" class="form-control"></td>


    <td>   
        <div class="checkbox"> 
            <label> 
               


                <input type="checkbox" value="1" name="data[<?php echo $child; ?>][EmployeeCreditSetting][status]" >
            </label> 
        </div>
    </td>
    <td class="cus_pro_td">
        <a href="javascript:void(0);" ng-click="deleteCreditSetting($event,'')">
            <img alt="" src="<?php echo $this->webroot; ?>images/trash.png">
            <span class="icons_cls">Trash</span>
        </a>
    </td>


</tr>