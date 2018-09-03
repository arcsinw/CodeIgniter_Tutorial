<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim 和 Respond.js 是为了让 IE8 支持 HTML5 元素和媒体查询（media queries）功能 -->
    <!-- 警告：通过 file:// 协议（就是直接将 html 页面拖拽到浏览器中）访问页面时 Respond.js 不起作用 -->
    <!--[if lt IE 9]>
      <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <h1>这是一个标签页示例</h1>
    <ul id="myTab" class="nav nav-tabs">
      <li role="presentation" class="active"><a href="#Home">Home</a></li>
      <li role="presentation"><a href="#Profile">Profile</a></li>
      <li role="presentation"><a href="#Messages">Messages</a></li>
    </ul>

    <div id="myTabContent" class="tab-content">
      <div role="tabpanel" class="tab-pane fade active in" id="Home" >
        <br/>
        <p>This is a Home Page!</p>
      </div>
      <div role="tabpanel" class="tab-pane fade" id="Profile" >
        <br/>
        <p>This is a Profile Page!</p>
      </div>
      <div role="tabpanel" class="tab-pane fade" id="Messages" >
        <br/>
        <p>This is a Messages Page!</p>
      </div>
    </div>
    <!-- jQuery (Bootstrap 的所有 JavaScript 插件都依赖 jQuery，所以必须放在前边) -->
    <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
    <!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      $('#myTab a').click(function (e) {
            e.preventDefault();
            $(this).tab('show');
        });
</script>
  </body>
</html>