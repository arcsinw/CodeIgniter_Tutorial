<?php

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $data['page'] = 'admin/index';
        $data['title'] = 'The one';
        $this->load->view('template/index', $data);
    }
}