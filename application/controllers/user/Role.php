<?php

/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 8/1/2017
 * Time: 11:21 AM
 */
class Role extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->template->set_title('User');

        // datatable
        $this->template->set_bower_js('datatables/media/js/jquery.dataTables.min.js');
        $this->template->set_bower_js('datatables/media/js/dataTables.bootstrap.min.js');
        $this->template->set_bower_css('datatables/media/css/dataTables.bootstrap.min.css');

        // instance
        $this->template->set_js('user/main.js');

        $this->template->generate('user/main');
    }

}