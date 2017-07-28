<?php

/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 5/17/2017
 * Time: 9:41 AM
 */
class Clean_Controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->template->set_layout('layout/clean');
    }

}