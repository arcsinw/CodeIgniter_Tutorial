# 目录
[1. Create your first CodeIgniter project](#1)

- [1.1. Model](#1.1)

- [1.2 Controller](#1.2)
    
    - [1.2.1 路由](#1.2.1)

    - [1.2.2 传参](#1.2.2)

- [1.3 View](#1.3)

    - [1.3.1 使用模板页](#1.3.1)

- [1.4 其他](#1.4)

    - [1.4.1 辅助函数](#1.4.1)

    - [1.4.2 钩子](#1.4.2)

    - [1.4.3 错误处理](#1.4.3)

    - [1.4.4 网页缓存](#1.4.4)

    - [1.4.5 多环境处理](#1.4.4)

---

<h2 id="1">1. Create your first CodeIgniter project</h1>

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

![flow](/tutorial/public/images/appflowchart.gif)

MVC的结构我习惯Model->Controller->view这样写

---

<h3 id="1.1">1.1 Model</h3>

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

---

<h3 id="1.2">1.2 Controller</h3>

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

<h4 id="1.2.1">1.2.1 路由</h4>

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

<h4 id="1.2.2">1.2.2 传参</h4>

上面的代码有两种传参

1.给`controller`内的函数传参

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

---

<h3 id="1.3">1.3 View</h3>

数据有了就可以开始写页面了，按下面的文件结构创建好文件（无后缀的是文件夹）

```txt
--views
    --content
        --index.php
```

（只是一部分代码，最终版本可从Github上下载）

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

<h4 id="1.3.1">使用模板页</h4>

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
            <a class="navbar-brand" href="content">CAC</a>
        </div>

        <div class="navbar-collapse collapse ">
            <ul class="nav navbar-nav">
                <li><a href="<?=base_url('codeigniter');?>">CodeIgniter</a></li>
                <li><a href="<?=base_url('git');?>">Git</a></li>
                <li><a href="<?=base_url('css');?>">CSS</a></li>
                <li><a href="<?=base_url('js');?>">JavaScript</a></li>
            </ul>

            <div class="navbar-right nav navbar-nav">
                <!-- <li><a href="admin">Admin</a></li> -->
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
        <p style="text-align: center">&copy; <?php echo date('Y')?> - CAC</p>
    </footer>
</div>
```

`index.php`

整合前面的`header`和`footer`，其中的`$page`是通过`controller`传递过来的参数

```php
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $title ?></title>
        <link rel="stylesheet" href="<?=base_url('/public/css/one.css');?>" type="text/css" />
        <link rel="stylesheet" href="<?=base_url('/public/bootstrap/css/bootstrap.min.css');?>" type="text/css" />
        <link rel="stylesheet" href="<?=base_url('/public/css/site.css');?>" type="text/css" /> 

        <script src="<?=base_url('/public/showdown/showdown.min.js');?>"></script>
        <script src="<?=base_url('/public/js/jquery-1.10.2.js');?>"></script> 
        <script src="<?=base_url('/public/bootstrap/js/bootstrap.js');?>"></script>
        <script src="<?=base_url('/public/js/modernizr-2.6.2.js');?>"></script>
        <script src="<?=base_url('/public/js/respond.js');?>"></script>
    </head>
    <body>
        <?php $this->load->view('template/page_header'); ?>

        <div class="render_body">
            <?php $this->load->view($page); ?>
        </div>

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

---

<h3 id="1.4">1.4 其他</h4>

<h4 id="1.4.1">1.4.1 辅助函数</h5>

即其他网页框架中自己创建的Helper类，一般是一些常用的方法，CI中的Helper类加载之后不需要类名可直接使用

比如`helpers/cac_time_helper.php`中实现了时间字符串的格式化，在Controller中load后可直接在View中使用

<h4 id="1.4.2">1.4.2 钩子</h5>

钩子可以用来在程序执行流程中加入自己的动作，比如在执行需要登陆的操作前检测用户是否登陆

1.启用钩子

**application/config/config.php**

```php
$config['enable_hooks'] = TRUE;
```

2.定义钩子

$hook['post_controller_constructor'] = array(
    'class' => 'UserCheck',
    'function' => 'check_login_state',
    'filename' => 'UserCheck.php',
    'filepath' => 'hooks',
    'params' => '',
);

- class 你希望调用的类名，如果你更喜欢使用过程式的函数的话，这一项可以留空。
- function 你希望调用的方法或函数的名称。
- filename 包含你的类或函数的文件名。
- filepath 包含你的脚本文件的目录名。 注意： 你的脚本必须放在 application/ 目录里面，所以 filepath 是相对 application/ 目录的路径，举例来说，如果你的脚本位于 application/hooks/ ，那么 filepath 可以简单的设置为 'hooks' ，如果你的脚本位于 application/hooks/utilities/ ， 那么 filepath 可以设置为 'hooks/utilities' ，路径后面不用加斜线。
- params 你希望传递给你脚本的任何参数，可选。

`post_controller_constructor`时挂钩点，指定钩子被触发的场景

具体的场景参考 [钩子 - 扩展框架核心](http://codeigniter.org.cn/user_guide/general/hooks.html)

<h4 id="1.4.3">1.4.3 错误处理</h5>

当网页出错时可以选择跳转error page或404，在CI中都有默认的模板可以修改样式

```php
//展示错误页面 默认是application/views/errors/html/error_general.php
show_error($message, $status_code, $heading = 'An Error Was Encountered')

//展示404页面 默认是application/views/errors/html/error_404.php
show_404($page = '', $log_error = TRUE)
```

写日志

```php
/**
* @param $level log level 'error' 'debug' 'info'
* @param $message
**/
log_message($level, $message)

//要保证日志文件正常写入，logs/目录可写，设置config.php

//0 禁用日志
//1 错误
//2 调试
//3 一般信息
$config['log_threshold'] = 1;
```

<h4 id="1.4.4">1.4.4 网页缓存</h5>

当网页的内容更新频率不高时可以开启缓存减轻一些服务器压力（主要是数据库），产生类似静态网页的效果

>当页面第一次加载时，缓存将被写入到 application/cache 目录下的文件中去。 之后请求这个页面时，就可以直接从缓存文件中读取内容并输出到用户的浏览器。 如果缓存过期，会在输出之前被删除并重新刷新。

```php
$expire_time = 60;
$this->output->cache($expire_time); //缓存每60分钟过期

// Deletes cache for the currently requested URI
$this->output->delete_cache();

// Deletes cache for /foo/bar
$this->output->delete_cache('/foo/bar');
```

<h4 id="1.4.5">1.4.5 处理多环境 (development or production)</h5>

对当前环境判断来产生不同的表现，比如开发时的错误界面显示详细信息，上线时则简单地显示信息
