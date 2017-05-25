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

        // load oauth library
        $this->load->library('oauth');
    }

    protected function token(){
        $this->oauth->client_credentials();
    }

    protected function authorize(){
        $this->oauth->authorize();
    }

    protected function refresh_token(){
        $this->oauth->refresh_token();
    }

}