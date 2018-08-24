# CI和Bootstrap分页

本文首先需要学习Bootstrap Table控件，[点击学习](http://bootstrap-table.wenzhixin.net.cn/zh-cn/)

主要给出服务端代码，完整代码可自行查看源代码。

## AnswerTO.php

该类是Answer的实体类，用于存放查询的Answer数据

```php
<?php
class AnswerTO
{

	public $id;
	public $questionTitle;
	public $questionContent;
	public $answerTitle;
	public $answerContent;
	public $answerSummary;
	public $makeTime;
	public $askerName;
	public $askerAvatar;
	public $authorName;
	public $authorAvatar;
	public $chargeEditor;

}

```

## AnswerCriteria.php

该类是查询条件类，用于存放查询条件。

```php
<?php
class AnswerCriteria
{
	public $id;
	public $questionTitle;
	public $answerTitle;
	public $makeTimeBegin;
	public $makeTimeEnd;
	public $askerName;
	public $authorName;

	public $offset;
	public $limit;
	public $orderBy;
	public $orderDirection;

}
```

## Answer_Model.php

该类是Answer的Model，负责对数据库进行操作，其中selectAnswerCount是查询总条目数方法，selectAnswer是查询Answer数据方法。

selectAnswer方法可以根据传入的AnswerCriteria对象按条件查询出满足条件的记录，包括分页，一些字段的搜索等。

```php

<?php
class Answer_Model extends CI_Model
{
    public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function selectAnswer($answerCriteria)
	{
		$this->db->select("*");
		$this->db->from("answer");

		if(isset($answerCriteria->id) and $answerCriteria->id != ""){
			$this->db->where("Id", $answerCriteria->id);
		}
		if(isset($answerCriteria->questionTitle) and $answerCriteria->questionTitle != ""){
			$this->db->like("QuestionTitle", $answerCriteria->questionTitle);
		}
		if(isset($answerCriteria->answerSummary) and $answerCriteria->answerSummary != ""){
			$this->db->like("AnswerTitle", $answerCriteria->answerTitle);
		}
		if(isset($answerCriteria->makeTimeBegin) and $answerCriteria->makeTimeBegin != ""){
			$this->db->where("MakeTime >", $answerCriteria->makeTimeBegin);
		}
		if(isset($answerCriteria->makeTimeEnd) and $answerCriteria->makeTimeEnd != ""){
			$this->db->where("MakeTime <", $answerCriteria->makeTimeEnd);
		}
		if(isset($answerCriteria->askerName) and $answerCriteria->askerName != ""){
			$this->db->where("AskerName", $answerCriteria->askerName);
		}
		if(isset($answerCriteria->authorName) and $answerCriteria->authorName != ""){
			$this->db->where("AuthorName", $answerCriteria->authorName);
		}

		if(isset($answerCriteria->orderBy)){
			if(!isset($answerCriteria->orderDirection))
				$answerCriteria->orderDirection = "ASC";
			$this->db->order_by($answerCriteria->orderBy, $answerCriteria->orderDirection);
		}else{
			$this->db->order_by("Id", "ASC");
		}

		$this->db->limit($answerCriteria->limit, $answerCriteria->offset);

		$query = $this->db->get();
		$answers = array();
		foreach ($query->result_array() as $index=>$row)
		{
			$answer = new AnswerTO();
			$answer->id = $row['Id'];
			$answer->questionTitle = $row['QuestionTitle'];
			$answer->questionContent = $row['QuestionContent'];
			$answer->answerTitle = $row['AnswerTitle'];
			$answer->answerContent = $row['AnswerContent'];
			$answer->answerSummary = $row['AnswerSummary'];
			$answer->makeTime = $row['MakeTime'];
			$answer->askerName = $row['AskerName'];
			$answer->askerAvatar = $row['AskerAvatar'];
			$answer->authorName = $row['AuthorName'];
			$answer->authorAvatar = $row['AuthorAvatar'];
			$answer->chargeEditor = $row['ChargeEditor'];

			$answers[$index] = $answer;
		}
		return $answers;
	}

	public function selectAnswerCount($answerCriteria)
	{
		$this->db->select("*");
		$this->db->from("answer");

		if(isset($answerCriteria->id) and $answerCriteria->id != ""){
			$this->db->where("Id", $answerCriteria->id);
		}
		if(isset($answerCriteria->questionTitle) and $answerCriteria->questionTitle != ""){
			$this->db->like("QuestionTitle", $answerCriteria->questionTitle);
		}
		if(isset($answerCriteria->answerSummary) and $answerCriteria->answerSummary != ""){
			$this->db->like("AnswerTitle", $answerCriteria->answerTitle);
		}
		if(isset($answerCriteria->makeTimeBegin) and $answerCriteria->makeTimeBegin != ""){
			$this->db->where("MakeTime >", $answerCriteria->makeTimeBegin);
		}
		if(isset($answerCriteria->makeTimeEnd) and $answerCriteria->makeTimeEnd != ""){
			$this->db->where("MakeTime <", $answerCriteria->makeTimeEnd);
		}
		if(isset($answerCriteria->askerName) and $answerCriteria->askerName != ""){
			$this->db->where("AskerName", $answerCriteria->askerName);
		}
		if(isset($answerCriteria->authorName) and $answerCriteria->authorName != ""){
			$this->db->where("AuthorName", $answerCriteria->authorName);
		}

		return $this->db->count_all_results();
	}
}
```

## Controller

```php
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
```
