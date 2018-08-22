<?php
class JS extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $data['page'] = 'js/index';
        $data['title'] = 'JavaScript';
        $this->load->view('template/index', $data);
    }
}