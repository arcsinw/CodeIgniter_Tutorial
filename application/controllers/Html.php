<?php
class Html extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $data['page'] = 'html/index';
        $data['title'] = 'Html/CSS';
        $this->load->view('template/index', $data);
    }
}