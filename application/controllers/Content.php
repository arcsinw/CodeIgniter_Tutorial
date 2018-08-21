<?php
class Content extends CI_Controller
{ 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Content_Model');
        $this->load->helper('url_helper');
    }

    public function index($id = -1)
    {
        if ($id == -1)
        {
            $data['current'] = $this->Content_model->get_contents();
        }
        else
        {
            $data['current'] = $this->Content_model->get_content($id);
        }

        $data['page'] = "content/index";
        $data['title'] = $data['current']['Title'];
        $this->load->view('template/index', $data);
    }
}