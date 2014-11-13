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
<hr />
<label for="qd_avatar">Avatar ID:</label>    
<input name="avatar" id="qd_avatar" type="text" value="<?=$obj->avatar?>" />
<img width="100" height="100" src="<?=$obj->qd_getAvatarLink()?>" />
<input class="upload_image_button" type="button" value="Choose..." id='qd_myButton'/>
<?php qd_media_choose('qd_myButton', 'qd_avatar', true); ?>
<hr />
<input type="submit" name="submit" id="qd_submit" value="Submit" />
<div>
    <?php echo $arg['msg']; ?>
</div>
</form>
    <?php
}
qd_view_1($view_arg);
