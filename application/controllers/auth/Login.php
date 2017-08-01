<?php

/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 7/28/2017
 * Time: 2:55 PM
 */
class Login extends Clean_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if (isset($this->session->userdata('user')->username)) {
            redirect('dashboard');
        }

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        if ($username && $password) {
            $user = $this->login($username, $password);

            if (empty($user)) {
                alert('danger', 'Login Failed!', 'User not found');
                redirect('auth/login');
            } else {

                $this->session->set_userdata('user', $user);

                redirect('dashboard');
            }

        } else {

            $this->template->generate('auth/login');
        }

    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }


    private function login($username, $password)
    {
        $this->db->select('auth_users.*, auth_roles.name as role_name');
        $this->db->join('auth_roles', 'auth_users.role_id = auth_roles.id', 'left');
        $user = $this->db->get_where('auth_users', [
            'username' => $username,
        ])->row();

        if (!empty($user)) {
            // check password
            $pass = $this->passwordhash->CheckPassword($password, $user->password);
            if (!$pass) return null;
        } else {
            return null;
        }
        return $user;
    }


}