<?php

/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 5/26/2017
 * Time: 3:56 PM
 */



class Admin_Controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        // load library 'Auth' that using Zend ACL
        $this->load->library('Auth');
    }
}