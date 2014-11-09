<?php
function qd_view_1($arg)
{
    $list_obj = $arg['obj'];
    foreach($list_obj as $item)
    {
        ?>
        
        <hr />
        <a href="">
            <?php echo $item->id . ' | ' . $item->name; ?>
        </a>
        <?php
    }
}
qd_view_1($view_arg);
