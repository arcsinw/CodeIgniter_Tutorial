# JavaScript

JavaScript 是世界上最流行的脚本语言。

## script 标签

如需在 HTML 页面中插入 JavaScript，请使用 `<script>` 标签。`<script>` 和 `</script>` 会告诉 JavaScript 在何处开始和结束。
```
<!DOCTYPE html>
<html>

<head>
<script>
function myFunction()
{
document.getElementById("demo").innerHTML="My First JavaScript Function";
}
</script>
</head>

<body>

<h1>My Web Page</h1>

<p id="demo">A Paragraph</p>

<button type="button" onclick="myFunction()">Try it</button>

</body>
</html>
```
#### 操作 HTML 元素
如需从 JavaScript 访问某个 HTML 元素，可以使用 document.getElementById(id) 方法。

```
<!DOCTYPE html>
<html>
<body>

<h1>我的第一张网页</h1>

<p id="demo">我的第一个段落</p>

<script>
document.getElementById("demo").innerHTML="我的第一段 JavaScript";
</script>

</body>
</html>
```
#### JavaScript 函数
函数是由事件驱动的或者当它被调用时执行的可重复使用的代码块。
```
<!DOCTYPE html>
<html>
<head>
<script>
function myFunction()
{
alert("Hello World!");
}
</script>
</head>

<body>
<button onclick="myFunction()">点击这里</button>
</body>
</html>
```
#### JavaScript 对象
JavaScript 中的所有事物都是对象：字符串、数值、数组、函数。此外，JavaScript 允许自定义对象。
属性是与对象相关的值。访问对象属性的语法是：
```
objectName.propertyName
```
#### jQuery
jQuery 是目前最受欢迎的 JavaScript 框架。它使用 CSS 选择器来访问和操作网页上的 HTML 元素（DOM 对象）。jQuery 同时提供 companion UI（用户界面）和插件。

jQuery 库位于一个 `JavaScript` 文件中，其中包含了所有的 jQuery 函数。可以通过下面的标记把 jQuery 添加到网页中：
```
<head>
<script type="text/javascript" src="jquery.js"></script>
</head>
```
请注意，`<script>` 标签应该位于页面的 `<head>` 部分。
如果您不愿意在自己的计算机上存放 jQuery 库，那么可以从 Google 或 Microsoft 加载 CDN jQuery 核心文件。
```
<head>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs
/jquery/1.4.0/jquery.min.js"></script>
</head>
```
##### jQuery 元素选择器
jQuery 使用 CSS 选择器来选取 HTML 元素。

$("p") 选取`<p>`元素。

$("p.intro") 选取所有 class="intro" 的`<p>`元素。

$("p#demo") 选取所有 id="demo" 的`<p>`元素。

##### jQuery 属性选择器
jQuery 使用 XPath 表达式来选择带有给定属性的元素。

$("[href]") 选取所有带有 href 属性的元素。

$("[href='#']") 选取所有带有 href 值等于 "#" 的元素。

$("[href!='#']") 选取所有带有 href 值不等于 "#" 的元素。

$("[href$='.jpg']") 选取所有 href 值以 ".jpg" 结尾的元素。

##### jQuery CSS 选择器
jQuery CSS 选择器可用于改变 HTML 元素的 CSS 属性。

下面的例子把所有 p 元素的背景颜色更改为红色：

实例
$("p").css("background-color","red");
##### jQuery 事件函数
jQuery 事件处理方法是 jQuery 中的核心函数。

事件处理程序指的是当`HTML`中发生某些事件时所调用的方法。术语由事件“触发”（或“激发”）经常会被使用。
通常会把 jQuery 代码放到`<head>`部分的事件处理方法中：
```
<html>
<head>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $("button").click(function(){
    $("p").hide();
  });
});
</script>
</head>

<body>
<h2>This is a heading</h2>
<p>This is a paragraph.</p>
<p>This is another paragraph.</p>
<button>Click me</button>
</body>

</html>
```
------
参考文章

[w3chool JS 教程](http://www.w3school.com.cn/js/index.asp)

------