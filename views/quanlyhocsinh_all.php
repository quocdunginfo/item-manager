<?php
function qd_view_1($arg)
{
    $list_obj = $arg['obj'];
    $tmp_hocsinh_page = 'qd_sub_page_1';
    foreach($list_obj as $item)
    {
        ?>
        
        <hr />
        <a href="<?php echo admin_url("admin.php?page=".$tmp_hocsinh_page.'&hocsinh_id='.$item->id) ?>">
            <?php echo $item->id . ' | ' . $item->name . ' | '. ($item->lop==null?'(null)':$item->lop->name); ?>
        </a>
        <?php
    }
    
}
qd_view_1($view_arg);
