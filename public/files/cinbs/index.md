
# 目录

[TOC]

# CI与BootStrap整合简介

本文主要介绍前台使用BootStrap控件如何与后台CI进行整合。

本文需要一定的BootStrap、html、css、js和CI知识，可以学习本教程的相关内容， 或访问[CI官方文档](https://v3.bootcss.com/getting-started/)，[BootStrap官方文档](http://codeigniter.org.cn/user_guide/index.html)。

本文包括两部分：

- CI与BootStrap模态框

    该部分主要讲解BootStrap的模态框如何与CI后台进行交互，利用模态框可以使页面功能更加丰富，页面更加简洁直观。

- CI与BootStrap分页

    该部分主要讲解在展示多条数据时如何对数据进行分页，请求分页数据时如何包含多个不同的查询条件。前台利用BootStrap table控件来展示数据。

# CI和Bootstrap模态框

模态框是页面的一个弹框，当模态框弹出时，用户只能操作模态框内部区域，模态框以外的区域不可操作。

该部分内容使用CI作为后台，前台使用bootstrap，实现模态框效果，并与后台进行交互，故首先需要学习bootstrap相关知识，[点击学习](https://v3.bootcss.com/)。

本文基于bootstrap的模态框插件，[点击学习bootstrap模态框](https://v3.bootcss.com/javascript/#modals)。

## 准备工作

页面中引入必须文件

```html
<!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- JQuery javascript 模态框依赖JQuery，故需在BootStrap JS文件之前引入-->
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
```
## 模态框常用方法

BootStrap利用JQuery的插件机制在JQuery上注册了`$('selector').modal('modal function')`方法，该方法可以调用模态框的方法。


方法 | 作用 | 例子
---|---|---
`.modal('toggle')` | 手动打开或关闭模态框 | `$('#myModal').modal('toggle')`
`.modal('show')` | 手动打开模态框 | `$('#myModal').modal('show')`
`.modal('hide')` | 手动隐藏模态框 | `$('#myModal').modal('hide')`
`.modal('handleUpdate')` | 重新调整模态框当模态框的大小发生变化时调用 | `$('#myModal').modal('handleUpdate')`

## 模态框的事件
Bootstrap 的模态框类提供了一些事件用于监听并执行你自己的代码。

事件类型 |	描述
--- | ---
`show.bs.modal` |	`show` 方法调用之后立即触发该事件。如果是通过点击某个作为触发器的元素，则此元素可以通过事件的 `relatedTarget` 属性进行访问。
`shown.bs.modal` | 此事件在模态框已经显示出来（并且同时在 CSS 过渡效果完成）之后被触发。如果是通过点击某个作为触发器的元素，则此元素可以通过事件的 `relatedTarget` 属性进行访问。
`hide.bs.modal` |	`hide` 方法调用之后立即触发该事件。
`hidden.bs.modal` | 此事件在模态框被隐藏（并且同时在 CSS 过渡效果完成）之后被触发。
`loaded.bs.modal` | 从远端的数据源加载完数据之后触发该事件。

例子：
```javascript
$('#myModal').on('hidden.bs.modal', function (e) {
  // do something...
});
```
## 模态框示例
### 提示框

弹出模态框，为用户显示一些提示信息，用户可以点击确认关闭。

前端代码：

```html
<!-- 模态框最外层DIV 其中id可以更改，利用该id可以控制该模态框，要将该段代码放到页面最外层，aria-labelledby保持和内部的<h4>的id一致-->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
    			<!-- 关闭按钮 -->
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<!-- 模态框标题-->
				<h4 class="modal-title" id="myModalLabel1">提示框示例</h4>
			</div>
			<!-- 模态框内容 -->
			<div class="modal-body">
				提示信息<br>
				提示信息<br>
				提示信息<br>
				提示信息<br>
			</div>
			<div class="modal-footer">
    			<!-- 模态框底部按钮部分 -->
				<button type="button" class="btn btn-default" data-dismiss="modal">确认</button>
			</div>
		</div>
	</div>
</div>
```

```javascript
// 使用JQuery ID选择器选中弹出模态框的按钮，利用JQuery的on方法给要弹出模态框的按钮添加点击事件
$("#exampleButton1").on("click", function () {
        // 用JQuery选中了模态框后调用了modal方法，该方法是BootStrap注册在Jquery上的插件方法，可以对模态框调用模态框的方法，这里调用了模态框的 show 方法
		$("#myModal1").modal('show');
	});
```

**效果示例，<a href="javascript:;" id="exampleButton1">点击查看</a>**

### 确认框

当用户需要进行某些需要慎重考虑的操作时，为防止用户误操作，弹出模态框，显示一些提示信息，用户点击确认继续操作或点击取消。

前端代码：

```html
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
						aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel2">确认框示例</h4>
			</div>
			<div class="modal-body">
				确定？
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
				<button type="button" class="btn btn-primary confirm">确定</button>
			</div>
		</div>
	</div>
</div>
```

```javascript
	$("#exampleButton2").on("click", function () {
		$("#myModal2").modal('show');
	});
	$("#myModal2 .confirm").on("click", function () {
		alert("点击了确定按钮，确认框将关闭");

		//点击确认后执行的代码

		$("#myModal2").modal('hide');
	});
```

**效果示例，<a href="javascript:;" id="exampleButton2">点击查看</a>**

### 填写信息框

弹出模态框，要求用户填写表单，点击确认后提交用户填写的信息到后台。

前端代码：

```html
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
						aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel3">填写信息框示例</h4>
			</div>
			<div class="modal-body">
				<form method="post">
					<div class="form-group">
						<label for="recipient-name" class="control-label">姓名:</label>
						<input type="text" class="form-control" name="name">
					</div>
					<div class="form-group">
						<label for="message-text" class="control-label">电话:</label>
						<input class="form-control" name="phone">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
				<button type="button" class="btn btn-primary confirm">确定</button>
			</div>
		</div>
	</div>
</div>
```

```javascript
	$("#exampleButton3").on("click", function () {
		$("#myModal3").modal('show');
	});

	$("#myModal3 .confirm").on("click", function () {
		var name = $("#myModal3 input[name='name']").val();
		var phone = $("#myModal3 input[name='phone']").val();
		alert("点击了确定按钮，姓名：" + name + "，电话：" + phone);

		//异步提交表单的代码

		$("#myModal3").modal('hide');
	});
```

**效果示例，<a href="javascript:;" id="exampleButton3">点击查看</a>**

### 动态加载模态框内容

动态地从服务端加载模态框需要显示的内容，将会显示到`<div class="modal-content"></div>`内。

前端代码：

```html
<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel4">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
						aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel4">动态加载模态框示例</h4>
			</div>
			<div class="modal-body"></div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
			</div>
		</div>
	</div>
</div>
```

```javascript
	$("#exampleButton4").on("click", function () {

		$("#myModal4 .modal-body").html("<p>正在加载...</p>");
		$("#myModal4 .modal-body").load("<?=base_url('/cinbs/remote');?>");

		$("#myModal4").modal('show');
	});
```

后端代码：

```php
	public function remote()
	{
		sleep(1);
		echo "<h1>我是从服务端动态加载出来的！</h1>";
	}
```

**效果示例，<a href="javascript:;" id="exampleButton4">点击查看</a>**


### 多层模态框

显示一层模态框后继续弹出更多模态框。

只需要简单地弹出其它的模态框即可。

前端代码：

```javascript
	var modal_count = 0;

	function generateModal(no) {
		
		var $modal = $('<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"' + no + '>\n' +
			'\t<div class="modal-dialog" role="document">\n' +
			'\t\t<div class="modal-content">\n' +
			'\t\t\t<div class="modal-header">\n' +
			'\t\t\t\t<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span\n' +
			'\t\t\t\t\t\taria-hidden="true">&times;</span></button>\n' +
			'\t\t\t\t<h4 class="modal-title" id="myModalLabel"' + no + '>多层模态框示例（第' + no + '个）</h4>\n' +
			'\t\t\t</div>\n' +
			'\t\t\t<div class="modal-body">\n' +
			'\t\t\t\t多层模态框\n' +
			'\t\t\t</div>\n' +
			'\t\t\t<div class="modal-footer">\n' +
			'\t\t\t\t<button type="button" class="btn btn-default cancel" data-dismiss="modal">取消</button>\n' +
			'\t\t\t\t<button type="button" class="btn btn-primary confirm">打开第' + (no+1) + '个模态窗</button>\n' +
			'\t\t\t</div>\n' +
			'\t\t</div>\n' +
			'\t</div>\n' +
			'</div>');
		$modal.find(".confirm").on("click", function () {
			generateModal(no + 1).modal("show");
		});

		$modal.on('shown.bs.modal', function()
		{
			modal_count++;
		});

		$modal.on('hidden.bs.modal', function () {
			$modal.remove();
			
			if (--modal_count > 0)
			{
				$('body').addClass('modal-open');
			}
		});
        return $modal;
	}

	$("#exampleButton5").on("click", function () {
		generateModal(1).modal("show");
	});
```

**效果示例，<a href="javascript:;" id="exampleButton5">点击查看</a>**

# CI与BootStrap分页

**效果示例，<a href="javascript:;" class="exampleButton6">点击查看</a>**

该部分主要讲解在展示多条数据时如何对数据进行分页，请求分页数据时如何包含多个不同的查询条件。前台利用BootStrap table控件来展示数据。

BootStrap table是基于BootStrap的第三方组件并非BootStrap官方组件，本部分内容着重讲解如何对数据进行分页和条件查询，故读者需要自行学习[BootStrap table的基础知识](http://bootstrap-table.wenzhixin.net.cn/zh-cn/)。

## 准备工作

引入相关文件

```html
<!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- JQuery javascript 模态框依赖JQuery，故需在BootStrap JS文件之前引入-->
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- 最新的BootStrap table CSS -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.12.1/bootstrap-table.min.css">

<!-- 最新的BootStrap table JavaScript -->
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.12.1/bootstrap-table.min.js"></script>

<!-- 最新的BootStrap table 中文包 -->
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.12.1/locale/bootstrap-table-zh-CN.min.js"></script>

```
## 前端代码
```html
<div id="toolbar"><!-- 条件工具栏 -->
	<div class="form-inline" role="form">
		<div class="form-group">
			<span>ID: </span>
			<input name="id" class="form-control" type="text" placeholder="Search">
		</div>
		<div class="form-group">
			<span>Question Title: </span>
			<input name="questionTitle" class="form-control" type="text" placeholder="Search">
		</div>
		<div class="form-group">
			<span>Asker Name: </span>
			<input name="askerName" class="form-control" type="text" placeholder="Search">
		</div>
		<div class="form-group">
			<span>Make Time After: </span>
			<input name="makeTimeBegin" class="form-control form_date" type="text" placeholder="Search">
		</div>
		<div class="form-group">
			<span>Make Time Before: </span>
			<input name="makeTimeEnd" class="form-control form_date" type="text" placeholder="Search">
		</div>
		<button id="ok" type="submit" class="btn btn-default">OK</button>
	</div>
</div>
<!-- 表格 -->
<table id="table"
	   data-toggle="table"
	   data-toolbar="#toolbar"
	   data-method="post"
	   data-query-params="queryParams"
	   data-content-type="application/x-www-form-urlencoded"
	   data-url="<?=base_url('/cinbs/getAnswer');?>"
	   data-height="400"
	   data-side-pagination="server"
	   data-pagination="true"
	   data-page-list="[5, 10, 20, 50]">
	<thead>
	<tr>
		<th data-field="state" data-checkbox="true"></th>
		<th data-field="id" data-sortable="true">ID</th>
		<th data-field="questionTitle">Question Title</th>
		<th data-field="answerTitle">Answer Title</th>
		<th data-field="makeTime" data-sortable="true">Make Time</th>
		<th data-field="askerName" data-sortable="true">Asker Name</th>
		<th data-field="authorName" data-sortable="true">Author Name</th>
		<th data-field="chargeEditor" data-sortable="true">Charge Editor</th>
	</tr>
	</thead>
</table>
```
```javascript
function queryParams(params) {
	$('#toolbar').find('input[name]').each(function () {
		params[$(this).attr('name')] = $(this).val();
	});
	return params;
}

$(function () {
	$("#ok").click(function () {
		$('#table').bootstrapTable('refresh');
	});
});
```

## 后端代码

### AnswerTO.php

路径`application/models/to/AnswerTO.php`

该类是Answer的实体类，用于存放查询的Answer数据，类的字段和数据库表的字段对应。

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

### AnswerCriteria.php

路径`application/models/to/AnswerCriteria.php`

该类是查询条件类，用于存放查询条件。

```php
<?php
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
```

### Answer_Model.php

路径`application/models/Answer_Model.php`

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

```

### Controller

路径`application/controllers/Cinbs.php/Cinbs::getAnswer`

```php
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
```
**效果示例，<a href="javascript:;" class="exampleButton6">点击查看</a>**
