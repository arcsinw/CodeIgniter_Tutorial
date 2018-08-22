<?php
class Git extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $data['page'] = 'git/index';
        $data['title'] = 'Git';
        $this->load->view('template/index', $data);
    }
}