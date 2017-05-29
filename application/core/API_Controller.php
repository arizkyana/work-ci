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
        $this->load->library('Oauth2');

    }

    protected function token(){
        $this->oauth2->client_credentials();
    }

    protected function authorize(){
        $this->oauth2->authorize();
    }

    protected function authorize_2(){
        $this->oauth2->authorize_code();
    }

    protected function refresh_token(){
        $this->oauth2->refresh_token();
    }

    public function to_json($data = []){
        header('Content-type: application/json');
        return json_encode($data);
    }

}