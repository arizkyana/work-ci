<?php

/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 7/28/2017
 * Time: 3:52 PM
 */
class Dashboard extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){

        $this->template->set_title('Dashboard');
        $this->template->generate('dashboard/main');
    }


}