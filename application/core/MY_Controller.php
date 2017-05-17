<?php

/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 5/17/2017
 * Time: 9:52 AM
 */
class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
}

include_once(APPPATH . '/core/Clean_Controller.php');
include_once(APPPATH . '/core/API_Controller.php');