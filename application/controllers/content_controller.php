<?php
class Content_Controller extends CI_Controller
{ 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Content');
        $this->load->helper('url_helper');
        $this->load->database();
    }

    public function index()
    {
        $data['content'] = $this->Content->get_contents();
        
        $this->load->view('content/index', $data);
    }

    public function view($page = 'Content')
    {
        //echo APPPATH. 'views\\'.$page.'.php';
        if (!file_exists(APPPATH.'views\\'.$page.'.php'))
        {
            show_404();
        }

        $data['title'] = ucfirst($page);
        $data['news_item'] = $this->content->get_contents();

        $this->load->view($page, $data);
    }

    public function about()
    {
        echo 'about';
    }
}