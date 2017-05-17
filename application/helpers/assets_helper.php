<?php



function bower_url($assets){

    return base_url('assets/bower_components/' . $assets);
}

function js_url($js_file){
    return base_url('assets/js/' . $js_file);
}

function css_url($css_file){
    return base_url('assets/css/' . $css_file);
}