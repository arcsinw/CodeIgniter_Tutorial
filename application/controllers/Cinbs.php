<?php
class Cinbs extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $data['page'] = 'cinbs/index';
        $data['title'] = 'BootStrap目录';
        $this->load->view('template/index', $data);
    }
    public function modal()
    {
        $data['page'] = 'cinbs/modal';
        $data['title'] = 'CI和Bootstrap模态框';
        $this->load->view('template/index', $data);
    }

	public function remote()
	{
		sleep(1);
		echo "<h1>我是从服务端动态加载出来的！</h1>";
	}

	public function pagination()
	{
		$data['page'] = 'cinbs/pagination';
		$data['title'] = 'CI和Bootstrap分页';
		$this->load->view('template/index', $data);
	}
}
