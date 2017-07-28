<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Welcome extends Clean_Controller
{
    public function index()
    {
        $this->template->set_bower_js('datatables/media/js/jquery.dataTables.min.js');
        $this->template->generate('welcome');
    }

}
