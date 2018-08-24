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
