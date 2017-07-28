<?php

/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 7/28/2017
 * Time: 3:17 PM
 */
class Forgot extends Clean_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->template->generate('auth/forgot');
    }

}