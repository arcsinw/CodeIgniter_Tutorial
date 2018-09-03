# HTML/CSS Tutorial

-------

[TOC]

-------
## HTML

<h4>什么是 HTML？</h4>

> 
> HTML 是用来描述网页的一种语言。
> 
> - HTML 指的是超文本标记语言 (Hyper Text Markup Language)
- HTML 不是一种编程语言，而是一种标记语言 (markup language)
- 标记语言是一套标记标签 (markup tag)
- HTML 使用标记标签来描述网页

<h4>HTML 标签</h4>
> HTML 标记标签通常被称为 HTML 标签 (HTML tag)
> 
> - HTML 标签是由尖括号包围的关键词，比如`<html>`
- HTML 标签通常是成对出现的，比如`<b>`和`</b>`
- 标签对中的第一个标签是开始标签，第二个标签是结束标签
- 开始和结束标签也被称为开放标签和闭合标签

简单的`html`模板。

```
<!DOCTYPE html>
<html>
<head>
    <title>Hello World!</title>
</head>
<body>
</body>
</html>>
```
> HTML速查手册&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [HTML 4.01 快速参考](http://www.w3school.com.cn/html/html_quick.asp)
> 
> HTML w3chool教程&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [w3chool HTML](http://www.w3school.com.cn/html/index.asp)

### HTML基本标签
#### HTML标题
HTML 标题（Heading）是通过`<h1>-<h6>`等标签进行定义的。
```
<h1>This is a h1 heading</h1>
<h2>This is a h2 heading</h2>
<h3>This is a h3 heading</h3>
```
> 实例:
> <h1>This is a h1 heading</h1>
<h2>This is a h2 heading</h2>
<h3>This is a h3 heading</h3>  

#### HTML 段落
HTML 段落是通过`<p>`标签进行定义的。
```
<p>This is a paragraph.</p>
<p>This is another paragraph.</p>
```
> 实例：
> <p>This is a paragraph.</p>
<p>This is another paragraph.</p>
#### HTML 链接
HTML 链接是通过`<a>`标签进行定义的。
```
<a href="http://www.w3school.com.cn">This is a link</a>
```
> 实例：
> 
> <a href="http://www.w3school.com.cn">This is a link</a>

#### HTML 图像
HTML 图像是通过`<img>`标签进行定义的。
```
<img src="w3school.jpg" width="104" height="142" />
```
> 实例
<img src="/tutorial/public/images/1.png" width="274" height="142" />

#### HTML 表格

表格由`<table>`标签来定义。每个表格均有若干行,由`<tr>` 标签定义,每行被分割为若干单元格,由`<td>`标签定义。字母 td 指表格数据,即数据单元格的内容。数据单元格可以包含文本、图片、列表、段落、表单、水平线、表格等等。
```
<table>
<tr>
<td>row 1, cell 1</td>
<td>row 1, cell 2</td>
</tr>
<tr>
<td>row 2, cell 1</td>
<td>row 2, cell 2</td>
</tr>
</table>
```
> 实例
> <table>
<tr>
<td>row 1, cell 1</td>
<td>row 1, cell 2</td>
</tr>
<tr>
<td>row 2, cell 1</td>
<td>row 2, cell 2</td>
</tr>
</table>

table标签还可以设置表头、边框、单元格间距等属性，可以参见
> [w3chool Table 教程](http://www.w3school.com.cn/html/html_tables.asp)。

#### HTML 列表
HTML 支持有序、无序和定义列表。

**无序列表** 是一个项目的列表，此列项目使用粗体圆点进行标记。无序列表始于`<ul>`标签。每个列表项始于`<li>`。
```
<ul>
<li>Coffee</li>
<li>Milk</li>
</ul>
```
> 实例：
> <ul>
<li>Coffee</li>
<li>Tea</li>
</ul>

**有序列表** 也是一列项目，列表项目使用数字进行标记。有序列表始于`<ol>`标签。每个列表项始于`<li>`标签。
```
<ol>
<li>Coffee</li>
<li>Milk</li>
</ol>
```
> 实例：
> <ol>
<li>Coffee</li>
<li>Tea</li>
</ol>

**定义列表** 不仅仅是一列项目，而是项目及其注释的组合。自定义列表以`<dl>`标签开始。每个自定义列表项以`<dt>`开始。每个自定义列表项的定义以`<dd>`开始。
```
<dl>
<dt>Coffee</dt>
<dd>Black hot drink</dd>
<dt>Milk</dt>
<dd>White cold drink</dd>
</dl>
```
> 实例：
> <dl>
<dt>Coffee</dt>
<dd>Black hot drink</dd>
<dt>Milk</dt>
<dd>White cold drink</dd>
</dl>

#### HTML 框架
通过使用框架，你可以在同一个浏览器窗口中显示不止一个页面。每份HTML文档称为一个框架，并且每个框架都独立于其他的框架。

> 使用框架的坏处：

> 
> - 开发人员必须同时跟踪更多的HTML文档
- 很难打印整张页面

框架结构标签`<frameset>`
框架结构标签`<frameset>`定义如何将窗口分割为框架。

框架标签`Frame`标签定义了放置在每个框架中的`HTML`文档。
```
<frameset cols="25%,75%">
   <frame src="frame_a.htm">
   <frame src="frame_b.htm">
</frameset>
```
内联框架`<iframe>`用于在网页内显示网页。
```
<iframe src="demo.html" width="200" height="200" frameborder="0"></iframe>
```
> 实例：

<iframe src="https://www.baidu.com" width="600" height="300"></iframe>

#### HTML表单

HTML 表单用于搜集不同类型的用户输入。
`<form>`元素定义 HTML 表单：
```
<form action="action_page.php">
First name:<br>
<input type="text" name="firstname" value="Mickey">
<br>
Last name:<br>
<input type="text" name="lastname" value="Mouse">
<br><br>
<input type="submit" value="Submit">
</form> 
```
> 实例：
> <form action="action_page.php">
First name:<br>
<input type="text" name="firstname" value="Mickey">
<br>
Last name:<br>
<input type="text" name="lastname" value="Mouse">
<br><br>
<input type="submit" value="Submit">
</form> 

`HTML`表单包含表单元素。表单元素指的是不同类型的`input`元素、复选框、单选按钮、提交按钮等等。

<h3>input</h3>


`input`元素最是重要的表单元素。
`<input>`元素根据不同的 type 属性，可以变化为多种形态。

**文本输入**
`<input type="text">`定义用于文本输入的单行输入字段：
```
<form>
 First name:<br>
<input type="text" name="firstname">
<br>
 Last name:<br>
<input type="text" name="lastname">
</form> 
```
> 实例：
> <form>
 First name:<br>
<input type="text" name="firstname">
<br>
 Last name:<br>
<input type="text" name="lastname">
</form> 

**单选按钮输入**`<input type="radio">`定义单选按钮。单选按钮允许用户在有限数量的选项中选择其中之一：
```
<form>
<input type="radio" name="sex" value="male" checked>Male
<br>
<input type="radio" name="sex" value="female">Female
</form> 
```
> 实例：
> <form>
<input type="radio" name="sex" value="male" checked>Male
<br>
<input type="radio" name="sex" value="female">Female
</form> 

**提交按钮** `<input type="submit">`定义用于向表单处理程序提交表单的按钮。表单处理程序通常是包含用来处理输入数据的脚本的服务器页面。表单处理程序在表单的 action 属性中指定：
```
<form action="action_page.php">
First name:<br>
<input type="text" name="firstname" value="Mickey">
<br>
Last name:<br>
<input type="text" name="lastname" value="Mouse">
<br><br>
<input type="submit" value="Submit">
</form> 
```
> 实例：
> <form action="action_page.php">
First name:<br>
<input type="text" name="firstname" value="Mickey">
<br>
Last name:<br>
<input type="text" name="lastname" value="Mouse">
<br><br>
<input type="submit" value="Submit">
</form> 

**Action 属性** 定义在提交表单时执行的动作。向服务器提交表单的通常做法是使用提交按钮。通常，表单会被提交到 web 服务器上的网页。在上面的例子中，指定了某个服务器脚本来处理被提交表单：
```
<form action="action_page.php">
```

<h3>select</h3>

`<select>`元素定义下拉列表：
```
<select name="cars">
<option value="volvo">Volvo</option>
<option value="saab">Saab</option>
<option value="fiat">Fiat</option>
<option value="audi">Audi</option>
</select>
```
> 实例
> 
<select name="cars">
<option value="volvo">Volvo</option>
<option value="saab">Saab</option>
<option value="fiat">Fiat</option>
<option value="audi">Audi</option>
</select>

其中`<option>`元素用于定义待选择的选项。

<h3>textarea</h3>

`<textarea>`元素定义多行输入字段（文本域）：

```
<textarea name="message" rows="10" cols="30">
The cat was playing in the garden.
</textarea>
```

> 实例
> 
<textarea name="message" rows="6" cols="100">
Please input some words you like.
</textarea>

<h3>button</h3>

`<button>`元素定义可点击的按钮：
```
<button type="button" onclick="alert('Hello World!')">Click Me!</button>
```
> 实例
> 
<button type="button" onclick="alert('Hello World!')">Click Me!</button>


<br/>

<br/>
<h5>至此HTML的内容已经结束！如果你想继续了解html的知识，请参考下面的网站</h5>
<br/>
> 
> HTML 5 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[w3chool html5教程](http://www.w3school.com.cn/html5/index.asp)
> 
> 一份完美的前端开发清单&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[前端开发清单](https://github.com/johnsenzhou/front-end-checklist)


<br/><br/><br/><br/><br/>
## CSS
<br/>
#### CSS 概述
CSS 指层叠样式表 (Cascading Style Sheets)，定义如何显示 HTML 元素。

> CSS (Cascading Style Sheets)
> 
> - 把样式添加到 HTML 4.0 中，是为了解决内容与表现分离的问题
> - 样式通常存储在样式表中
> - 外部样式表可以极大提高工作效率
> - 外部样式表通常存储在 CSS 文件中
> - 多个样式定义可层叠为一

**如何插入样式表？** 
> 当读到一个样式表时，浏览器会根据它来格式化 HTML 文档。插入样式表的方法有外部样式表、内部样式表、内联样式表。

**外部样式表** 

> 当样式需要应用于很多页面时，外部样式表将是理想的选择。外部样式表通过新建一个`.css`文件将外部样式引入 html 页面，外部样式表在`<head></head>`中通过`<link>`标签引入。

```
<head>
<link rel="stylesheet" type="text/css" href="mystyle.css" />
</head>
```
> 浏览器会从文件 mystyle.css 中读到样式声明，并根据它来格式文档。

**内部样式表**

> 当单个文档需要特殊的样式时，就应该使用内部样式表。你可以使用`<style>`标签在文档头部定义内部样式表。

```
<head>
<style type="text/css">
  hr {color: sienna;}
  p {margin-left: 20px;}
  body {background-image: url("images/back40.gif");}
</style>
</head>
```

**内联样式**

> 由于要将表现和内容混杂在一起，内联样式会损失掉样式表的许多优势。

> 要使用内联样式，你需要在相关的标签内使用样式（style）属性。

```
<p style="color: sienna; margin-left: 20px">
This is a paragraph
</p>
```

**层叠次序**

> 当同一个 HTML 元素被不止一个样式定义时，会使用哪个样式呢？

一般而言，所有的样式会根据下面的规则层叠于一个新的虚拟样式表中，优先权顺序如下，内联样式拥有最高的优先权。
> - 浏览器缺省设置
- 外部样式表
- 内部样式表（位于`<head>`标签内部）
- 内联样式（在`HTML`元素内部）

<br/>


#### CSS选择器

CSS 规则由两个主要的部分构成：选择器，以及一条或多条声明。
选择器通常是您需要改变样式的 HTML 元素。
##### 元素选择器
> 元素选择器通常将是某个 HTML 元素，比如 p、h1、em、a，甚至可以是 html 本身。

```
html {color:black;}
h1 {color:blue;}
h2 {color:silver;}
```
##### 类选择器

> 类选择器允许以一种独立于文档元素的方式来指定样式。<br/>
> 该选择器可以单独使用，也可以与其他元素结合使用。<br/>
> 在使用类选择器之前，需要修改具体的文档标记，以便类选择器正常工作。

为了将类选择器的样式与元素关联，必须将 `class` 指定为一个适当的值。
```
<h1 class="important">
This heading is very important.
</h1>

<p class="important">
This paragraph is very important.
</p>
```
然后我们使用以下语法向这些归类的元素应用样式，即类名前有一个点号` . `。
```
.important {color:red;}
```

##### ID 选择器

> id 选择器可以为标有特定 id 的 HTML 元素指定特定的样式。
> 
> id 选择器以 "#" 来定义。

```
#intro {font-weight:bold;}
```
ID 选择器不引用 class 属性的值，毫无疑问，它要引用 id 属性中的值。
```
<p id="intro">This is a paragraph of introduction.</p>
```

##### 属性选择器
> 对带有指定属性的 HTML 元素设置样式。
> 
> 可以为拥有指定属性的 HTML 元素设置样式，而不仅限于 class 和 id 属性。

下面的例子为带有 title 属性的所有元素设置样式：
```
[title]
{
color:red;
}
```

#### CSS 盒子模型(Box Model)
所有HTML元素可以看作盒子，在CSS中，"box model"这一术语是用来设计和布局时使用。
CSS盒模型本质上是一个盒子，封装周围的HTML元素，它包括：边距，边框，填充，和实际内容。
盒模型允许我们在其它元素和周围元素边框之间的空间放置元素。

使用 `<div>` 元素的 HTML 布局。`<div>` 元素常用作布局工具，因为能够轻松地通过 CSS 对其进行定位。
下面是一个圣杯布局的展示。
```
<!DOCTYPE html>
<html>
<head>
    <style type="text/css">
        .header{
            width: 100%;
            height: 40px;
            background-color: aqua;
        }
        .container{
            height: 600px;
            overflow: hidden;
            padding: 0 200px;
            background-color: black;
            margin-bottom: -20px;
        }
        .middle{
            width: 100%;
            height: 600px;
            background-color: cornsilk;
            float: left;
        }
        .left{
            width: 200px;
            height: 600px;
            background-color: crimson;
            float: left;
            margin-left: -100%;
            position: relative;
            left: -200px;
        }
        .right{
            width: 200px;
            height: 600px;
            background-color: darkviolet;
            float: left;
            margin-left: -200px;
            position: relative;
            right: -200px;
        }
        .footer{
            width: 100%;
            height: 50px;
            background-color: dodgerblue;
        }

    </style>
    <title></title>
</head>
<body>
    <div class="header"><h2>This Is Header</h2></div>
    <div class="container">
        <div class="middle"><h3>This is Content Welcome to this Website</h3></div>
        <div class="left"><h3>This Is Left</h3></div>
        <div class="right"><h3>This Is Right</h3></div>
    </div>
    <div class="footer"><h3>This Is Footer</h3></div>
</body>
</html>
```
[try it!](C:\Users\cc\Desktop\test.html)



#### CSS定位
<br/>
CSS 为定位和浮动提供了一些属性，利用这些属性，可以建立列式布局，将布局的一部分与另一部分重叠，还可以完成多年来通常需要使用多个表格才能完成的任务。

定位的基本思想很简单，它允许你定义元素框相对于其正常位置应该出现的位置，或者相对于父元素、另一个元素甚至浏览器窗口本身的位置。显然，这个功能非常强大，也很让人吃惊。要知道，用户代理对 CSS2 中定位的支持远胜于对其它方面的支持，对此不应感到奇怪。

另一方面，CSS1 中首次提出了浮动，它以 Netscape 在 Web 发展初期增加的一个功能为基础。
##### CSS 定位机制
CSS 有三种基本的定位机制：相对定位、浮动和绝对定位。

除非专门指定，否则所有框都在普通流中定位。也就是说，普通流中的元素的位置由元素在 (X)HTML 中的位置决定。

块级框从上到下一个接一个地排列，框之间的垂直距离是由框的垂直外边距计算出来。

行内框在一行中水平布置。可以使用水平内边距、边框和外边距调整它们的间距。但是，垂直内边距、边框和外边距不影响行内框的高度。由一行形成的水平框称为行框（Line Box），行框的高度总是足以容纳它包含的所有行内框。不过，设置行高可以增加这个框的高度。
##### CSS position 属性
通过使用 position 属性，我们可以选择 4 种不同类型的定位，这会影响元素框生成的方式。

**position** 属性值的含义：

- **static**元素框正常生成。块级元素生成一个矩形框，作为文档流的一部分，行内元素则会创建一个或多个行框，置于其父元素中。

- **relative**元素框偏移某个距离。元素仍保持其未定位前的形状，它原本所占的空间仍保留。

- **absolute**元素框从文档流完全删除，并相对于其包含块定位。包含块可能是文档中的另一个元素或者是初始包含块。元素原先在正常文档流中所占的空间会关闭，就好像元素原来不存在一样。元素定位后生成一个块级框，而不论原来它在正常流中生成何种类型的框。

- **fixed**元素框的表现类似于将 position 设置为 absolute，不过其包含块是视窗本身。


-------
参考文章

[一份完美的前端开发清单](https://github.com/johnsenzhou/front-end-checklist)

[w3chool css 教程](http://www.w3school.com.cn/css/index.asp)

-------