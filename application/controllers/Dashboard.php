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

        // highcharts graph
        $this->template->set_bower_css('highcharts/css/highcharts.css');
        $this->template->set_bower_js('highcharts/js/highcharts.js');

        // instance graph
        $this->template->set_js('dashboard/main.js');

        $this->template->generate('dashboard/main');
    }


}