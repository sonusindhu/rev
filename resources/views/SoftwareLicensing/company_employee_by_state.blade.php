<select name="data[Branch][manager]" class="selectpicker col-md-12 spc">
    <?php
    if (!empty($employee)) {
        foreach ($employee as $key => $value) {
            ?>
            <option value="<?php echo $value['EmployeeDetail']['id']; ?>"><?php echo $value['EmployeeDetail']['emp_first_name'] . ' ' . $value['EmployeeDetail']['emp_last_name']; ?></option>
            <?php
        }
    }else{
        ?>
            <option value="">No Licensed MLOs</option>
            <?php
    }
    ?>
</select>