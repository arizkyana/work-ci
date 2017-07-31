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
        $this->load->library('form_validation');
    }

    public function index()
    {

        $email = $this->input->post('email');

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if ($email) {
            if ($this->form_validation->run()) {
                alert('success', 'Request Success!', 'Please Check Your Email');
                redirect('auth/forgot');
            } else {
                alert('danger', 'Request Failed!', 'Sorry We Can\'t Accept Your Request');
                $this->template->generate('auth/forgot');
            }
        } else {
            $this->template->generate('auth/forgot');
        }


    }

}