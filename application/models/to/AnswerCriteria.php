<?php
/**
 * Created by PhpStorm.
 * User: Charles
 * Date: 2018-8-24
 * Time: 15:25
 *
 * 查询条件类
 */

class AnswerCriteria
{
	// 字段查询条件 begin
	public $id;
	public $questionTitle;
	public $answerTitle;
	public $makeTimeBegin;
	public $makeTimeEnd;
	public $askerName;
	public $authorName;
	// 字段查询条件 end

	public $offset; // 数据偏移量，用于分页
	public $limit; // 数据数量，即每页大小
	public $orderBy; // 排序字段
	public $orderDirection; // 排序方向
}
