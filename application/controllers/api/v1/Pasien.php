<?php

/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 5/29/2017
 * Time: 9:18 AM
 */
class Pasien extends API_Controller
{

    public function __construct()
    {
        parent::__construct();

        // authorize token
        parent::authorize();
    }

    public function index(){
        echo $this->to_json(['id' => 1, 'nama' => 'Ujang', 'no_rekam_medis' => '123123123']);
    }





}