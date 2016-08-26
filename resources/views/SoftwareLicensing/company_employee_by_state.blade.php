<select name="data[Branch][manager]" class="selectpicker col-md-12 spc">
    <?php
    if (!empty($employee)) {
        foreach ($employee as $key => $value) {
            ?>
            <option value="<?php echo $value->id; ?>"><?php echo $value->emp_first_name . ' ' . $value->emp_last_name; ?></option>
            <?php
        }
    } else {
        ?>
        <option value="">No Licensed MLOs</option>
        <?php
    }
    ?>
</select>