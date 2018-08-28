# CI和Bootstrap模态框

本文是使用CI作为后台，前台使用bootstrap，实现模态框效果，故首先需要学习bootstrap相关知识，[点击学习](https://v3.bootcss.com/)。

本文基于bootstrap的模态框插件，[点击学习bootstrap模态框](https://v3.bootcss.com/javascript/#modals)。

## 提示框

弹出模态框，为用户显示一些提示信息，用户可以点击确认关闭。

前端代码：

```html
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
```

```javascript
$("#exampleButton1").on("click", function () {
		$("#myModal1").modal('show');
	});
```

**效果示例，<a href="javascript:;" id="exampleButton1">点击查看</a>**

## 确认框

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

## 填写信息框

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

## 动态加载模态框内容

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


## 多层模态框

显示一层模态框后继续弹出更多模态框。

前端代码：

```javascript
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
```

**效果示例，<a href="javascript:;" id="exampleButton5">点击查看</a>**
