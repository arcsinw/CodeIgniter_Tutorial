<?php
class CodeIgniter extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $data['page'] = 'ci/index';
        $data['title'] = 'CodeIgniter';
        $this->load->view('template/index', $data);
    }
}