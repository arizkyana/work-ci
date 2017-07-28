<?php

/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 7/28/2017
 * Time: 2:55 PM
 */
class Register extends Clean_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->template->generate('auth/register');
    }

}