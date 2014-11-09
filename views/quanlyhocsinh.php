<?php
function qd_view_1($arg)
{
    $obj = $arg['obj'];
    ?>
<form action="" method="post">
<label for="qd_hoten">Họ tên:</label>
<input type="text" name="hoten" id="qd_hoten" value="<?php echo $obj->name; ?>" />
<label for="qd_lop">Lớp:</label>
<input type="text" name="lop" id="qd_lop" value="<?php echo $obj->lop->name; ?>" />
<input type="hidden" name="id" id="qd_id" value="<?php echo $obj->id; ?>" />
<input type="submit" name="submit" id="qd_submit" value="Submit" />
<div>
    <?php echo $arg['msg']; ?>
</div>
</form>
    <?php
}
qd_view_1($view_arg);
