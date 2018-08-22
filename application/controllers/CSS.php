<?php
class CSS extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $data['page'] = 'css/index';
        $data['title'] = 'CSS';
        $this->load->view('template/index', $data);
    }
}