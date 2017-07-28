<?php

/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 5/30/2017
 * Time: 10:17 AM
 */
class Buku extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index(){

        $js_bower_files = [
            'datatables/media/js/jquery.dataTables.min.js',
            'datatables/media/js/dataTables.bootstrap.min.js'
        ];

        $css_bower_files = [
            'datatables/media/css/dataTables.bootstrap.min.css'
        ];

        $js_files = [
            'rekon/index.js'
        ];

        $this->set_content('master/buku/index', $js_files, [], $js_bower_files, $css_bower_files);
    }

}