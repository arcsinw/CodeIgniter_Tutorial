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
        $data['title'] = 'CI&BootStrap';
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
		$this->load->view('cinbs/pagination', $data);
	}

	public function getAnswer()
	{

		include_once('application/models/to/AnswerCriteria.php'); // 引入查询条件类文件
		include_once('application/models/to/AnswerTO.php'); // 引入实体类文件
		$criteria = new AnswerCriteria();

		// 获取前端传来的查询条件数据
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
