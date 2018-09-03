-------

[TOC]

-------

# Bootstrap

Bootstrap是最受欢迎的HTML、CSS和JS框架，用于开发响应式布局、移动设备优先的WEB 项目。
> Bootstrap中文文档 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[Bootstrap文档](https://v3.bootcss.com/getting-started/)
>
> Bootstrap GitHub项目主页  &nbsp;&nbsp;&nbsp;&nbsp;[GitHub主页](https://github.com/twbs/bootstrap)



### 下载
从Bootstrap(v3.3.7)官网进行下载。
> [https://v3.bootcss.com/getting-started/](https://v3.bootcss.com/getting-started/)

下载完之后可以直接从本地引用Bootstrap的css，js，也可以使用BootCDN提供的免费CDN 加速服务。

```
<!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" 
integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- 可选的 Bootstrap 主题文件（一般不用引入） -->
<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" 
integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" 
integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
 crossorigin="anonymous"></script>
```

> Bootstrap为网页设置全局 CSS 样式；基本的 HTML 元素均可以通过 class 设置样式并得到增强效果；还有先进的栅格系统。

<br>
### 栅格系统
Bootstrap 提供了一套响应式、移动设备优先的流式栅格系统，随着屏幕或视口（viewport）尺寸的增加，系统会自动分为最多12列。

>它包含了易于使用的预定义类，还有强大的mixin用于生成更具语义的布局。

> 栅格系统用于通过一系列的行（row）与列（column）的组合来创建页面布局，你的内容就可以放入这些创建好的布局中。

![](/tutorial/public/images/2.png)

在上面案例的基础上，通过使用针对平板设备的`.col-sm-*`类，可以创建更加动态和强大的布局。
<br/>

```
<div class="row">
  <div class="col-xs-12 col-sm-6 col-md-8">.col-xs-12 .col-sm-6 .col-md-8</div>
  <div class="col-xs-6 col-md-4">.col-xs-6 .col-md-4</div>
</div>
<div class="row">
  <div class="col-xs-6 col-sm-4">.col-xs-6 .col-sm-4</div>
  <div class="col-xs-6 col-sm-4">.col-xs-6 .col-sm-4</div>
  <!-- Optional: clear the XS cols if their content doesn't match in height -->
  <div class="clearfix visible-xs-block"></div>
  <div class="col-xs-6 col-sm-4">.col-xs-6 .col-sm-4</div>
```
> 布局如下：

![](/tutorial/public/images/3.png)

> 详细介绍可参见&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[Bootstrap中文文档](https://v3.bootcss.com/css/#grid-intro)

<br>
### 组件
Bootstrap 拥有无数可复用的组件，包括下拉菜单、导航、标签页、弹出框、字体图标等更多功能。

<br>
#### 下拉菜单
用于显示链接列表的可切换、有上下文的菜单。下拉菜单的 JavaScript 插件让它具有了交互性。

> 将下拉菜单触发器和下拉菜单都包裹在 .dropdown 里，或者另一个声明了 position: relative; 的元素。
> 然后加入组成菜单的 HTML 代码。

```
<div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" 
  aria-haspopup="true" aria-expanded="true">
    Dropdown
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
    <li><a href="#">Action</a></li>
    <li><a href="#">Another action</a></li>
    <li><a href="#">Something else here</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="#">Separated link</a></li>
  </ul>
</div>
```
<a href="/tutorial/bootstrap/tryit/demo3" target="_blank">Try it!</a>

#### 标签页

> 可以通过以下两种方式启用标签页。

**通过 data 属性：**您需要添加 data-toggle="tab" 或 data-toggle="pill" 到锚文本链接中。

```
<ul class="nav nav-tabs">
    <li><a href="#identifier" data-toggle="tab">Home</a></li>
    ...
</ul>
```
**通过 JavaScript：**您可以使用 Javascript 来启用标签页。

```
$('#myTab a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
})
```
标签页示例：

```
<ul id="myTab" class="nav nav-tabs">
      <li role="presentation" class="active"><a href="#Home">Home</a></li>
      <li role="presentation"><a href="#Profile">Profile</a></li>
      <li role="presentation"><a href="#Messages">Messages</a></li>
    </ul>

    <div id="myTabContent" class="tab-content">
      <div role="tabpanel" class="tab-pane fade active in" id="Home" >
        <p>This is a Home Page!</p>
      </div>
      <div role="tabpanel" class="tab-pane fade" id="Profile" >
        <p>This is a Profile Page!</p>
      </div>
      <div role="tabpanel" class="tab-pane fade" id="Messages" >
        <p>This is a Messages Page!</p>
      </div>
    </div>

<script type="text/javascript">
      $('#myTab a').click(function (e) {
            e.preventDefault();
            $(this).tab('show');
        });
</script>
```
<a href="/tutorial/bootstrap/tryit/demo1" target="_blank">Try it!</a>

#### 胶囊式标签页
HTML 标记相同，但使用 .nav-pills 类：
```
<ul id="myTab" class="nav nav-pills">
      <li role="presentation" class="active"><a href="#Home">Home</a></li>
      <li role="presentation"><a href="#Profile">Profile</a></li>
      <li role="presentation"><a href="#Messages">Messages</a></li>
    </ul>
```
<a href="/tutorial/bootstrap/tryit/demo2" target="_blank">Try it!</a>

胶囊是标签页也是可以垂直方向堆叠排列的。只需添加 .nav-stacked 类。
```
<ul class="nav nav-pills nav-stacked">
  ...
</ul>
```
#### 添加下拉菜单
用一点点额外 HTML 代码并加入下拉菜单插件的 JavaScript 插件即可。

带下拉菜单的标签页:
```
<ul class="nav nav-tabs">
  ...
  <li role="presentation" class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
      Dropdown <span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
      ...
    </ul>
  </li>
  ...
</ul>
```
<!-- <a href="/tutorial/bootstrap/tryit/demo4" target="_blank">Try it!</a> -->

带下拉菜单的胶囊式标签页:
```
<ul class="nav nav-pills">
  ...
  <li role="presentation" class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
      Dropdown <span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
      ...
    </ul>
  </li>
  ...
</ul>
```

### 导航条
导航条是在应用或网站中作为导航页头的响应式基础组件。它们在移动设备上可以折叠(并且可开可关)，且在视口(viewport)宽度增加时逐渐变为水平展开模式。
<blockquote>两端对齐的导航条导航链接已经被弃用了。</blockquote>
> 导航条内所包含元素溢出。
> 
导航条中的内容折行的解决办法如下：

> - 减少导航条内所有元素所占据的宽度。
- 在某些尺寸的屏幕上（利用 响应式工具类）隐藏导航条内的一些元素。
- 修改导航条在水平排列和折叠排列互相转化时，触发这个转化的最小屏幕宽度值


```
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle=
      "collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Brand</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" 
          aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" 
          aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
```
