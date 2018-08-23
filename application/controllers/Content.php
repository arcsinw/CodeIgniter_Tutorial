<?php
class Content extends CI_Controller
{ 
    public $expire_time = 60 * 12; //minutes
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Content_Model');
        $this->load->helper('url');
        $this->load->helper('cac_time');
        //$this->output->cache($this->expire_time);
    }

    public function index($id = -1)
    {
        if ($id == -1)
        {
            $result = $this->Content_Model->get_lastest_contents();
            
            if (count($result) == 3)
            {
                $data['next'] = $result[0];
                $data['current'] = $result[1];
                $data['prev'] = $result[2];
            }
        }
        else
        {
            $prev = $id - 1;
            $next = $id + 1;
            $data['current'] = $this->Content_Model->get_contents_by_id($id);
            if ($id - 1 >= 0)
            {
                $data['next'] = $this->Content_Model->get_contents_by_id($prev);
            }

            $data['prev'] = $this->Content_Model->get_contents_by_id($next);
        }

        $data['page'] = "content/index";
        $data['title'] = $data['current']['Title'];
        $this->load->view('template/index', $data);
    }
}