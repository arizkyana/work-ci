<?php

/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 5/17/2017
 * Time: 10:31 AM
 */
class API_Controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        header('Content-type: application/json');
    }
}