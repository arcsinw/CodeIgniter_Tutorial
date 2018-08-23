<div class="row">

	<div id="doc">
	</div>

	<div>

		<!--上一篇&下一篇-->
		<div class="one-pager">
			<a class="previous disabled">上一篇：无</a>

			<a class="next" href="<?=base_url('/cinbs/pagination');?>">下一篇：CI和Bootstrap分页</a>
		</div>
	</div>

</div>

<!-- 提示框 begin -->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
						aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel1">提示框示例</h4>
			</div>
			<div class="modal-body">
				提示信息<br>
				提示信息<br>
				提示信息<br>
				提示信息<br>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">确认</button>
			</div>
		</div>
	</div>
</div>
<!-- 提示框 end -->

<!-- 确认框 begin -->
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
<!-- 确认框 end -->

<!-- 填写信息框 begin -->
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
<!-- 填写信息框 end -->

<!-- 动态加载模态框内容 begin -->
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
<!-- 动态加载模态框内容 end -->


<script>
	var converter = new showdown.Converter();
	var xhr = new XMLHttpRequest();
	xhr.open('GET', '<?=base_url('/public/files/cinbs/model.md');?>', false);
	xhr.onreadystatechange = function () {
		if (xhr.readyState == 4 && xhr.status == 200 || xhr.status == 304) {
			text = xhr.responseText;
			html = converter.makeHtml(text);
			document.getElementById('doc').innerHTML = html;
		}
	}
	xhr.send();

	$('pre code').each(function (i, block) {
		hljs.highlightBlock(block);
	});

	//提示框代码 begin
	$("#exampleButton1").on("click", function () {
		$("#myModal1").modal('show');
	});
	//提示框代码 end

	//确认框代码 begin
	$("#exampleButton2").on("click", function () {
		$("#myModal2").modal('show');
	});
	$("#myModal2 .confirm").on("click", function () {
		alert("点击了确定按钮，确认框将关闭");

		//点击确认后执行的代码

		$("#myModal2").modal('hide');
	});
	//确认框代码 end

	//填写信息框代码 begin
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
	//填写信息框代码 end

	//动态加载模态框代码 begin
	$("#exampleButton4").on("click", function () {

		$("#myModal4 .modal-body").html("<p>正在加载...</p>");
		$("#myModal4 .modal-body").load("<?=base_url('/cinbs/remote');?>");

		$("#myModal4").modal('show');
	});
	//动态加载模态框代码 end

	//多层模态框代码 begin

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
		$($modal).on('hidden.bs.modal', function (e) {
			$modal.remove();
		});
        return $modal;
	}

	$("#exampleButton5").on("click", function () {
		generateModal(1).modal("show");
	});

	//多层模态框代码 end

</script>
