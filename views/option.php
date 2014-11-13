<?php
function qd_view_1($arg)
{
    $obj = $arg['obj'];
    ?>
<form action="" method="post">
<label for="qd_default_avatar_value">DEFAULT AVATAR ID:</label>
<input name="default_avatar_key" type="hidden" value="<?=$obj->key?>" />    
<input name="default_avatar_value" id="qd_default_avatar_value" type="text" value="<?=$obj->value?>" />
<img width="100" height="100" src="<?=wp_get_attachment_url($obj->value)?>" />
<input class="upload_image_button" type="button" value="Choose..." id='qd_myButton'/>
<?php qd_media_choose('qd_myButton', 'qd_default_avatar_value', true); ?>
<hr />
<input type="submit" name="submit" id="qd_submit" value="Submit" />
<div>
    <?php echo $arg['msg']; ?>
</div>
</form>
    <?php
}
qd_view_1($view_arg);
