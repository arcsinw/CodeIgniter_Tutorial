<?php

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = '登录';
        $data['page'] = 'login/index';
        $this->load->view('template/index', $data);
    }

    public function login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        if ($email == 'root' && $password == "111111")
        {
            echo 0;
        }
        else
        {
            echo 1;
        }
    }
}