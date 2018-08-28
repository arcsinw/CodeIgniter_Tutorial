<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $title ?></title>
	<link rel="stylesheet" href="<?= base_url('/public/css/one.css'); ?>" type="text/css"/>
	<link rel="stylesheet" href="<?= base_url('/public/bootstrap/css/bootstrap.min.css'); ?>" type="text/css"/>
	<link rel="stylesheet" href="<?= base_url('/public/css/site.css'); ?>" type="text/css"/>
	<link rel="stylesheet" href="<?= base_url('/public/css/github_markdown.css'); ?>" type="text/css"/>
	<link rel="stylesheet" href="<?= base_url('/public/bootstrap/css/bootstrap-datetimepicker.min.css'); ?>"
		  type="text/css"/>

	<script src="<?= base_url('/public/showdown/showdown.min.js'); ?>"></script>
	<script src="<?= base_url('/public/js/jquery-1.10.2.js'); ?>"></script>
	<script src="<?= base_url('/public/bootstrap/js/bootstrap.js'); ?>"></script>
	<script src="<?= base_url('/public/js/modernizr-2.6.2.js'); ?>"></script>
	<script src="<?= base_url('/public/js/respond.js'); ?>"></script>
	<script src="<?= base_url('/public/bootstrap/js/bootstrap-datetimepicker.min.js'); ?>"></script>
	<script src="<?= base_url('/public/bootstrap/js/bootstrap-datetimepicker.zh-CN.js'); ?>"></script>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.12.1/bootstrap-table.min.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.12.1/bootstrap-table.min.js"></script>

	<!-- Latest compiled and minified Locales -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.12.1/locale/bootstrap-table-zh-CN.min.js"></script>

	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/default.min.css">
	<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
</head>
<body>
<div class="row">
	<div class="container-fluid">
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
			   data-url="<?= base_url('/cinbs/getAnswer'); ?>"
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
</div>
</body>
</html>

<script>
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
		language: 'zh-CN',
		weekStart: 1,
		todayBtn: 1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
	});

</script>
