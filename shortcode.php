<?php
//[qd_hocsinh_link id="10"]
add_shortcode( 'qd_hocsinh_link', 'qd_fn_sc_hocsinh' );
function qd_fn_sc_hocsinh( $atts ) {

    $id = $atts['id'];
    return 'http://qd_hocsinh_link_'.$id.Hocsinh::find($id)->name;
}
