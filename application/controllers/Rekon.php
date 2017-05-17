<?php

/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 5/17/2017
 * Time: 9:15 AM
 */
class Rekon extends Clean_Controller
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

        $this->set_content('rekon/index', $js_files, [], $js_bower_files, $css_bower_files);
    }

    public function add(){
        $this->set_content('rekon/add');
    }

    public function update(){
        $this->set_content('rekon/update');
    }

    public function remove(){
        $this->set_content('rekon/remove');
    }

    public function view(){
        $this->set_content('rekon/view');
    }
}