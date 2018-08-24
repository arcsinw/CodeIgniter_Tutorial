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

	public function getAnswer()
	{

		include_once('application/models/to/AnswerCriteria.php');
		include_once('application/models/to/AnswerTO.php');
		$criteria = new AnswerCriteria();

		$criteria->id = $this->input->post('id');
		$criteria->questionTitle = $this->input->post('questionTitle');
		$criteria->answerTitle = $this->input->post('answerTitle');
		$criteria->makeTimeBegin = $this->input->post('makeTimeBegin');
		$criteria->makeTimeEnd = $this->input->post('makeTimeEnd');
		$criteria->askerName = $this->input->post('askerName');
		$criteria->authorName = $this->input->post('authorName');

		$criteria->orderBy = $this->input->post('sort');
		$criteria->orderDirection = $this->input->post('order');

		$offset = $this->input->post('offset');
		$limit = $this->input->post('limit');
		$criteria->offset = isset($offset) ? $offset : 0;
		$criteria->limit = isset($limit) ? $limit : 10;

		$this->load->model('Answer_Model', 'answerModel');
		$count = $this->answerModel->selectAnswerCount($criteria);
		$answers = $this->answerModel->selectAnswer($criteria);

		$data["total"] = $count;
		$data["rows"] = $answers;

		parent::json($data);
	}
}
