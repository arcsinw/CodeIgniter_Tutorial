<?php
class Answer_Model extends CI_Model
{
    public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	/**
	 * 查询给定条件下的条目数据
	 *
	 * Date: 2018-8-28 Time: 17:19
	 * @param $answerCriteria 查询条件
	 * @return array Answer数组
	 */
	public function selectAnswer($answerCriteria)
	{
		$this->db->select("*");
		$this->db->from("answer");

		// 设置查询条件
		$this->setCriteria($answerCriteria);

		// 设置排序数据
		if(isset($answerCriteria->orderBy)){
			if(!isset($answerCriteria->orderDirection))
				$answerCriteria->orderDirection = "ASC";
			$this->db->order_by($answerCriteria->orderBy, $answerCriteria->orderDirection);
		}else{
			$this->db->order_by("Id", "ASC");
		}

		// 设置分页数据
		$this->db->limit($answerCriteria->limit, $answerCriteria->offset);

		$query = $this->db->get();
		$answers = array();

		// 将从数据库中查询出来的数据设置到AnswerTO对象数组中
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

	/**
	 * 查询给定条件下的条目数量
	 *
	 * Date: 2018-8-28 Time: 17:18
	 * @param $answerCriteria 查询条件类
	 * @return 条目数量
	 */
	public function selectAnswerCount($answerCriteria)
	{
		$this->db->select("*");
		$this->db->from("answer");

		// 设置查询条件
		$this->setCriteria($answerCriteria);

		return $this->db->count_all_results();
	}

	/**
	 *
	 * 设置查询条件
	 * Date: 2018-8-28 Time: 17:17
	 * @param $answerCriteria 查询条件类
	 */
	private function setCriteria($answerCriteria)
	{
		if (isset($answerCriteria->id) and $answerCriteria->id != "") {
			$this->db->where("Id", $answerCriteria->id);
		}
		if (isset($answerCriteria->questionTitle) and $answerCriteria->questionTitle != "") {
			$this->db->like("QuestionTitle", $answerCriteria->questionTitle);
		}
		if (isset($answerCriteria->answerSummary) and $answerCriteria->answerSummary != "") {
			$this->db->like("AnswerTitle", $answerCriteria->answerTitle);
		}
		if (isset($answerCriteria->makeTimeBegin) and $answerCriteria->makeTimeBegin != "") {
			$this->db->where("MakeTime >", $answerCriteria->makeTimeBegin);
		}
		if (isset($answerCriteria->makeTimeEnd) and $answerCriteria->makeTimeEnd != "") {
			$this->db->where("MakeTime <", $answerCriteria->makeTimeEnd);
		}
		if (isset($answerCriteria->askerName) and $answerCriteria->askerName != "") {
			$this->db->where("AskerName", $answerCriteria->askerName);
		}
		if (isset($answerCriteria->authorName) and $answerCriteria->authorName != "") {
			$this->db->where("AuthorName", $answerCriteria->authorName);
		}
	}
}
