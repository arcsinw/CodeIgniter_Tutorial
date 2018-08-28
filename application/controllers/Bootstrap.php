<?php
class Bootstrap extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $data['page'] = 'bootstrap/index';
        $data['title'] = 'BootStrap';
        $this->load->view('template/index', $data);
    }
}
