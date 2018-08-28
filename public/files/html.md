# HTML/CSS

## HTML

#### Meta 标签

**Doctype :**

`Doctype`标签声明HTML5，需要写在HTML文件的顶部。

```html
<!-- Doctype HTML5 -->
<!doctype html>
```

接下来三个 meta 标签 (Charset, X-UA Compatible, Viewport) 需要首先在head中声明:

**Charset（字符类型）:**

正确声明`Charset meta` (UTF-8)。

```html
RSS feed（RSS 订阅）: Low 如果你的项目是一个博客或者有大量的文章，可以添加一个RSS链接。
<!-- 设置文档的字符编码 -->
<meta charset="utf-8">
```

**X-UA-Compatible（IE相关设定）:**

正确声明`X-UA-Compatible` meta。

```html
<!-- 指示Internet Explorer使用其最新的渲染引擎 -->
meta http-equiv="x-ua-compatible" content="ie=edge"
```

**Viewport（视口）:**

正确声明`viewport` meta。

```html
<!-- 响应式网页设计viewpoint声明 -->
<meta name="viewport" content="width=device-width, initial-scale=1">
```

**Title（标题）:**

所有页面都必须使用`title`标签（SEO:Google会计算标题中使用的字符的像素宽度，范围在472和482像素之间，所以平均字符数限制大约在55个字符左右）。

```html
<!-- 文档标题 -->
<title>网站标题不超过55个字符</title>
```

**Description（描述）:**

提供`description`标签， 它是唯一的同时内容不能超过150个字符。

```html
<!-- Meta Description -->
<meta name="description" content="Description of the page less than 150 characters">
```

**Favicons :**

每个`favicon`都被创建并正确显示，如果你只有一个`favicon.ico`，把它放在你网站的根目录下。 通常来说你不需要做任何操作他就能正常显示。 然而, 使用一下示例中的方法是比较好的做法。不过现在我们推荐使用PNG格式，相比.ico格式有较好的优势（推荐尺寸: 32x32px）。

```html
<!-- 标准favicon -->
<link rel="icon" type="image/x-icon" href="https://example.com/favicon.ico">
<!-- 推荐favicon格式 -->
<link rel="icon" type="image/png" href="https://example.com/favicon.png">
```

**Canonical:**

使用`rel="canonical"`以避免重复的内容。

```html
<!-- 帮助防止重复内容出现 -->
<link rel="canonical" href="http://example.com/2017/09/a-new-article-to-red.html">
```

**Language tag（语言标签）:**

指定你网站的语言标签并与当前页面语言相关联。

```html
<html lang="zh_cn">
 Direction tag（方向标签）: `direction`属性规定元素内容的文本方向。(可以在另一个HTML标签上使用)
<html dir="rtl">
```

**Alternate language（备用语言）:**

指定网站的语言标签并与当前页面的语言相关联。

```html
<link rel="alternate" href="https://es.example.com/" hreflang="es">
```

**RSS feed（RSS 订阅）:**

如果你的项目是一个博客或者有大量的文章，可以添加一个RSS链接。

**Inline critical CSS（最小 CSS 合集）:**

`CSS critical`收集并呈现当前页面可见部分的核心CSS。在主要的CSS调用渲染之前以单行(最小化)在`<style><style/>`中嵌入。

**HTML5 Semantic Elements（HTML5语义化元素）: **正确的使用HTML5语义化标签（header, section, footer, main...）。

**Error pages（错误页面）:** 

404页面和5xx错误的存在。5xx错误页面需要集成其CSS（在当前服务器上无外部调用）。

## CSS
CSS 指层叠样式表 (Cascading Style Sheets)，定义如何显示 HTML 元素。

#### CSS定位

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

#### CSS选择器

##### 元素选择器

元素选择器通常将是某个 HTML 元素，比如 p、h1、em、a，甚至可以是 html 本身：

```html
html {color:black;}
h1 {color:blue;}
h2 {color:silver;}
```

##### CSS 类选择器

类选择器允许以一种独立于文档元素的方式来指定样式。
该选择器可以单独使用，也可以与其他元素结合使用。
在使用类选择器之前，需要修改具体的文档标记，以便类选择器正常工作。

为了将类选择器的样式与元素关联，必须将 `class` 指定为一个适当的值。请看下面的 HTML 代码：

```html
<h1 class="important">
This heading is very important.
</h1>

<p class="important">
This paragraph is very important.
</p>
```

在上面的代码中，两个元素的 `class` 都指定为 `important`：第一个标题（ h1 元素），第二个段落（p 元素）。
然后我们使用以下语法向这些归类的元素应用样式，即类名前有一个点号（.），然后结合通配选择器：

```css
*.important {color:red;}
```

如果您只想选择所有类名相同的元素，可以在类选择器中忽略通配选择器，这没有任何不好的影响：

```css
.important {color:red;}
```

##### CSS ID 选择器

首先，ID 选择器前面有一个 # 号 - 也称为棋盘号或井号。

```css
#intro {font-weight:bold;}
```

ID 选择器不引用 class 属性的值，毫无疑问，它要引用 id 属性中的值。

```html
<p id="intro">This is a paragraph of introduction.</p>
```

#### CSS 盒子模型(Box Model)

所有HTML元素可以看作盒子，在CSS中，"box model"这一术语是用来设计和布局时使用。
CSS盒模型本质上是一个盒子，封装周围的HTML元素，它包括：边距，边框，填充，和实际内容。
盒模型允许我们在其它元素和周围元素边框之间的空间放置元素。

使用 `<div>` 元素的 HTML 布局。`<div>` 元素常用作布局工具，因为能够轻松地通过 CSS 对其进行定位。

```html
<body>

<div id="header">
<h1>City Gallery</h1>
</div>

<div id="nav">
London<br>
Paris<br>
Tokyo<br>
</div>

<div id="section">
<h1>London</h1>
<p>
London is the capital city of England. It is the most populous city in the United Kingdom,
with a metropolitan area of over 13 million inhabitants.
</p>
<p>
Standing on the River Thames, London has been a major settlement for two millennia,
its history going back to its founding by the Romans, who named it Londinium.
</p>
</div>

<div id="footer">
Copyright W3School.com.cn
</div>

</body>
```

-------
参考文章

[一份完美的前端开发清单](https://github.com/johnsenzhou/front-end-checklist)

[w3chool css 教程](http://www.w3school.com.cn/css/index.asp)

-------