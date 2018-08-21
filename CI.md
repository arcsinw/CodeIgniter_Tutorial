
# CodeIgniter Jump Start

## 1. Create your first CodeIgniter project

> 需预先配置好PHP和Apache环境

将下载好的CI框架复制到`Apache`的`www`或者`htdocs`目录（视个人配置而定），更改CI框架的文件名为`Tutorial`

>由于每次新建CI项目都要一份CI框架代码，要保留一份原始的CI框架代码

项目的文件夹结构如下，其中的user_guide可以删除以减小项目大小，我们只需关注`application`部分

```txt
-Tutorial
    --application
    --system
    --user_guide
```

进入`application`，首先关注`controller`、`models`、`views`这三个文件夹，显然这是个`MVC`(Model-View-Controller)的结构

![flow](appflowchart.gif)

MVC的结构我习惯Model->Controller->view这样写

### Model

`model`负责和数据库交互，包含很多数据库相关方法

要连接数据库，先要填写好数据库的信息

**config/database.php**

```php
$active_group = 'default'; // 可以有多个数据库配置信息，此行指定当前使用的数据库配置名

$db['default'] = array(
	'dsn'	=> '',
	'hostname' => 'localhost',
	'username' => 'root',
	'password' => 'root',
	'database' => 'one_db',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8mb4',
	'dbcollat' => 'utf8mb4_0900_ai_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'port' => 3306,
	'failover' => array(),
	'save_queries' => TRUE
);
```

填写好信息后，在`models`目录下新建一个`Content_model.php`文件

```php
<?php
class Content_model extends CI_Model // 要继承CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database(); // 通过配置文件中的信息连接数据库
    }

    public function get_contents()
    {
        $query = $this->db->get('content'); //查询构造器类，相当于select * from content
        return current($query->result_array());
    }

    public function get_content($id)
    {
        $query = $this->db->query("select * from content where id = $id"); // 熟悉的sql查询
        return current($query->result_array());
    }
}
```

数据库查询当然是直接用sql语句直观，但CI也提供了[查询构造器类](http://codeigniter.org.cn/user_guide/database/query_builder.html)，感兴趣的就自己去看

### Controller

`controller`连接`View`和`Model`，内部有很多函数，配合数据库处理用户的请求

新建的controller需要继承`CI_Controller`

**controllers/Content.php**

```php
<?php
class Content extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Content_model');  // 加载model，用来访问数据库
        $this->load->helper('url_helper');
    }

    public function index($id = -1)
    {
        if ($id == -1)
        {
            $data['current'] = $this->Content_model->get_contents();
        }
        else
        {
            $data['current'] = $this->Content_model->get_content($id);
        }

        $data['page'] = "content/index";
        $data['title'] = $data['current']['Title'];
        $this->load->view('template/index', $data); //这里将$data传到template/index中
    }
}
```

上面的代码有两种传参

1.给`controller`内的函数传参（配合路由)

先说下路由，路由是`controller`中重要的部分，决定URL和`controller`中的方法的映射关系

可以参考RESTful风格的url来设置路由

```txt
//GET   获取所有的content
localhost/contents
//GET   获取指定的content
localhost/content/3
//PUT   修改一个content（只需发送要修改的属性）
localhost/content/3
//POST  增加一个content
localhost/content/
```

路由的设置在`config/routes.php`中

localhost/tutorial/index.php/content/128
localhost/tutorial/index.php/content/index/128

现在希望上面这些url能访问到Content_Controller中的index函数，并且参数$id=128

对应的路由应该修改成下面这样

**config/router.php**

```php
$route['default_controller'] = 'content/index';
$route['(.*)?/(.*)?/(:num)'] = '$1/$2/$3'; //(:num)匹配的是数字，如上面的128
$route['(.*)?/(.*)?'] = '$1/$2'; //content/index -> content_controller/index
$route['(.*)?/(:num)'] = '$1/index/$2'; // content/2 -> content_controller/index/2
$route['(.*)'] = '$1/index'; // content -> content/index 设置默认方法为index
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
```

2.`controller`给`view`传参

```php
$data['title'] = 'Once';
$this->load->view('template/index', $data);
```

`view`中接收`controller`传过来的参

注意是直接用key访问，不要写错

```php
<title><?php echo $title ?></title>
```

### View

数据有了就可以开始写页面了，按下面的文件结构创建好文件（无后缀的是文件夹）

```txt
--views
    --content
        --index.php
```

（只是一部分代码）

```php
<html>
    <head></head>
    <body>
        <div class="container body-content">
            <div class="container">
                <div class="col-md-12 content">
                    <div class="one-image">
                        <img class="img-rounded" src="<?php echo $current['ImgUrl'] ?>" alt="">
                    </div>

                    <div class="one-image-footer">
                        <div class="one-image-footer-left">
                            <?php echo $current['Title'] ?>
                        </div>
                        <div class="one-image-footer-right">
                            <?php echo $current['PictureAuthor'] ?>
                        </div>

                        <div class="clearfix"></div>
                    </div>

                    <div class="one-cita-wrapper">
                        <div class="one-cita"><?php echo $current['Text'] ?></div>

                        <div class="one-pubdate">
                            <p class="dom">
                                <?php $current['PostDate'] ?>
                            </p>
                            <p class="may">
                                <?php $current['PostDate'] ?>
                            </p>
                        </div>

                        <div class="clearfix"></div>
                    </div>

                    <!--上一篇&下一篇-->
                    <div class="one-pager">
                        <a class="previous">上一篇：无</a>
                        <a class="next disabled">下一篇：无</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
```

考虑到网页的一些部分是固定不变的，比如`header`（顶部的导航栏）和`footer`（顶部的版权信息），每个页面里都把代码重新抄一遍没有必要，可以考虑写一个模板页，

在`views`文件夹中新建一个`template`文件夹

新建`page_header.php`，header里一般是导航栏

```php
<nav class="navbar navbar-inverse navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="#">Once</a>
        </div>

        <div class="navbar-collapse collapse ">
            <ul class="nav navbar-nav">
                <li><a href="/">首页</a></li>
                <li><a href="/essays">文章</a></li>
                <li><a href="/movies">电影</a></li>
            </ul>

            <div class="navbar-right nav navbar-nav">
                <li><a href="/admin">Admin</a></li>
            </div>
        </div>
    </div>
</nav>

```

`page_footer.php`

footer一般放一些版权信息

```php
<div id="footer">
    <footer>
        <p style="text-align: center">&copy; <?php echo date('Y')?> - ARCSINW</p>
    </footer>
</div>
```

`index.php`

整合前面的`header`和`footer`，其中的`$page`是通过`controller`传递过来的参数

```php
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $title ?></title>
        <link rel="stylesheet" href="<?=base_url('/public/css/one.css');?>" type="text/css" />
        <link rel="stylesheet" href="<?=base_url('/public/css/bootstrap.css');?>" type="text/css" />
        <link rel="stylesheet" href="<?=base_Url('/public/css/site.css');?>" type="text/css" />

        <script src="<?=base_url('/public/js/jquery-1.10.2.js');?>"></script> 
        <script src="<?=base_url('/public/js/bootstrap.js');?>"></script>
        <script src="<?=base_url('/public/js/modernizr-2.6.2.js');?>"></script>
        <script src="<?=base_url('/public/js/respond.js');?>"></script>
    </head>
    <body>
        <?php $this->load->view('template/page_header'); ?>
        <?php $this->load->view($page); ?>
        <?php $this->load->view('template/page_footer'); ?>
    </body>
</html>
```

JS & CSS & Images的存放与使用

在与`application`同级的位置新建`public`文件夹

```txt
-Tutorial
    --application
    --system
    --public
        --css
        --images
        --js
```

在网页中引用

```php
<script src="<?=base_url('/public/js/bootstrap.js');?>"></script>
```

> 猜测：这样`application`可以不用开启文件访问，提高网站安全性

>对css的修改需要清除浏览器缓存才能生效

试试[localhost/tutorial/index.php/content](localhost/tutorial/index.php/content)
现在就得到了一个简单的动态网页

## 2. 项目相关

### [Bootstrap Table](http://bootstrap-table.wenzhixin.net.cn/zh-cn/)

### 模态框

-

### 标签页

- [Tabs](https://v3.bootcss.com/javascript/#tabs)

### 导航栏

    纯CSS的简单导航栏

    bootstrap的导航栏

### 树形菜单

- [metisMenu.js](http://mm.onokumus.com/mm-vertical.html)

### 分页

    从数据库取数据的时候就分好页