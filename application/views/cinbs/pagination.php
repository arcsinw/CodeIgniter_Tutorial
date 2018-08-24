<div class="row">
	<h1>示例：</h1>
	<div class="container">
		<div id="toolbar">
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
	</div>

	<div id="doc">
	</div>

	<div>

		<!--上一篇&下一篇-->
		<div class="one-pager">
			<a class="previous" href="<?=base_url('/cinbs/modal');?>">上一篇：CI和Bootstrap模态框</a>

			<a class="next disabled">下一篇：无</a>
		</div>
	</div>

</div>


<script>
	var converter = new showdown.Converter();
	var xhr = new XMLHttpRequest();
	xhr.open('GET', '<?=base_url('/public/files/cinbs/pagination.md');?>', false);
	xhr.onreadystatechange = function () {
		if (xhr.readyState == 4 && xhr.status == 200 || xhr.status == 304) {
			text = xhr.responseText;
			html = converter.makeHtml(text);
			document.getElementById('doc').innerHTML = html;
		}
	}
	xhr.send();


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


	$('.form_date').datetimepicker({
		language:  'zh-CN',
		weekStart: 1,
		todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
	});

</script>
