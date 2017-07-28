<?php

/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 5/17/2017
 * Time: 9:41 AM
 */
class Admin_Controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function set_content($view, $js_files = [], $css_files = [], $js_bower_files = [], $css_bower_files = []){
        $data['content'] = $view;
        $data['js_files'] = $js_files;
        $data['css_files'] = $css_files;
        $data['js_bower_files'] = $js_bower_files;
        $data['css_bower_files'] = $css_bower_files;
        $this->load->view('layout/admin', $data);
    }
}