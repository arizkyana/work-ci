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

        $this->load->library('form_validation');
    }

    public function index()
    {

        $email = $this->input->post('email');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $confirm = $this->input->post('confirm');

        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[24]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('confirm', 'Confirm', 'trim|required|matches[password]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if ($username && $password && $email && $confirm) {
            if ($this->form_validation->run()) {
                alert('success', 'Registration Success!', 'Welcome ' . $username);
                $this->save($username, $password, $email);
                redirect('auth/register');
            } else {
                alert('danger', 'Registration Failed!', 'Sorry We Can\'t Accept Your Data');
                $this->template->generate('auth/register');
            }
        } else {
            $this->template->generate('auth/register');
        }

    }

    public function save($username, $password, $email){

        $this->db->insert('auth_users', [
            'username' => $username,
            'password' => $this->passwordhash->HashPassword($password),
            'email' => $email
        ]);

    }

}