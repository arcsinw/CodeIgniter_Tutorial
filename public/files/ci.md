# 1. Introduce CodeIgniter

CodeIgniter 是一套给 PHP 网站开发者使用的应用程序开发框架和工具包。 它的目标是让你能够更快速的开发，它提供了日常任务中所需的大量类库， 以及简单的接口和逻辑结构。通过减少代码量，CodeIgniter 让你更加专注于你的创造性工作。

> CodeIngiter中国&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[CodeIngiter中国](http://codeigniter.org.cn/)

使用CodeIgniter之前，需要会php以及有相关的运行环境

> [Learn PHP in Y Minutes](https://learnxinyminutes.com/docs/php/)

> [php, apache, VS Code安装与配置](https://www.cnblogs.com/arcsinw/p/9416318.html)

> 本项目的完整代码&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[CodeIgniter_Tutorial](https://github.com/arcsinw/CodeIgniter_Tutorial)

## 1.1 下载CodeIgniter

选择3.1.5版本

[下载 CodeIgniter &mdash; CodeIgniter 3.1.5 中文手册|用户手册|用户指南|中文文档](http://codeigniter.org.cn/user_guide/installation/downloads.html)

解压后的CodeIgniter的目录结构如下

```txt
-CodeIgniter
    -application
    -system
    -user_guide
    -editorconfig
    -composer.json
    -index.php
```

`system` 如其名字一样，CodeIgniter的核心部分，不要去动

`user_guide` 离线版的文档，可以留着看看或者直接删掉

`application` 开发者需要关注的部分，整个项目所在

进入`application` 首先看到`controllers`、`models`、`views`这三个文件夹，显然这是个`MVC(Model-View-Controller)`的结构

![application](/tutorial/public/images/application_folder.png)

MVC 是一种 用于将应用程序的逻辑层和表现层分离出来的软件方法。在实践中，由于这种分离 所以你的页面中只包含很少的 PHP 脚本

- Model 代表你的数据结构。通常来说，模型类将包含帮助你对数据库进行增删改查的方法
- View 是要展现给用户的信息。一个视图通常就是一个网页，但是在 CodeIgniter 中， 一个视图也可以是一部分页面（例如页头、页尾），它也可以是一个 RSS 页面， 或其他任何类型的页面
- Controller 是模型、视图以及其他任何处理 HTTP 请求所必须的资源之间的中介，并生成网页

下图说明了整个系统的数据流程：

![flow](/tutorial/public/images/appflowchart.gif)

1. index.php 文件作为前端控制器，初始化运行 CodeIgniter 所需的基本资源
2. Router 检查 HTTP 请求，以确定如何处理该请求
3. 如果存在缓存文件，将直接输出到浏览器，不用走下面正常的系统流程
4. 在加载应用程序控制器之前，对 HTTP 请求以及任何用户提交的数据进行安全检查
5. 控制器加载模型、核心类库、辅助函数以及其他所有处理请求所需的资源
6. 最后一步，渲染视图并发送至浏览器，如果开启了缓存，视图被会先缓存起来用于 后续的请求

# 2. Create your first CodeIgniter project

将下载好的代码复制到`Apache`的`www`或者`htdocs`目录（视个人配置而定），更改代码的文件名为`Tutorial`

>由于每次新建CI项目都要一份CI框架代码，要保留一份原始的CI框架代码

项目的文件夹结构如下，其中的user_guide被删除以减小项目大小

```txt
-C盘
    --Apache24
        ---htdocs
            ----Tutorial
                -----application
                -----system
```

---

## 2.1 写一个静态登录页面login.php

在`application/views`文件夹下新建一个页面，按下面的文件结构创建好文件（无后缀的是文件夹）

```txt
--views
    --login
        --index.php
```

代码如下

```html
<html>
    <head>
        <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" />
    </head>
    <body>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="email" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Password">
        </div>

        <p id="message_block" style="display: none">Example block-level help text here.</p>

        <button id="login_btn" class="btn btn-default">Submit</button>
    </body>
</html>
```

得到的效果是下面这样的

<html>
    <body>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="email" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Password">
        </div>
        <p id="message_block" style="display: none">Example block-level help text here.</p>
        <button id="login_btn" class="btn btn-default">Submit</button>
    </body>
</html>

为了项目代码的安全性，`application`和`system`目录是不允许通过浏览器直接访问的，所以
通过`localhost/tutorial/application/views/login/index.php`无法访问到刚写的页面

不过你可以将这个页面复制到`Apache24/htdocs`目录下，直接使用`localhost/index.php`访问就能看到效果

---

## 2.2 通过controller打开login.php

当然实际项目中不可能这么干，接下来写controller来正确打开view

在`controller/demo`目录下新建一个`Login.php`作为controller

```txt
-controller
    --demo
        ---login.php
```

新建的controller需要继承`CI_Controller`，增加一个`index`方法

通过这行代码加载view

```php
$this->load->view('login/index');
```

完整代码

**controllers/demo/Login.php**

```php
<?php

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index()
    {
        $this->load->view('login/index');
    }
}
```

### 2.2.1 修改路由

要想通过`localhost/tutorial/index.php/demo/login/index`打开登录界面，还有一个步骤是修改路由

路由决定URL和`controller`中的方法的映射关系

可以参考RESTful风格的url来设置路由

```txt
// 获取所有的content
GET localhost/contents
// 获取指定的content
GET localhost/content/3
// 修改一个content（只需发送要修改的属性）
PUT localhost/content/3
// 增加一个content
POST localhost/content/
// 删除一个content
DELETE localhost/content/10
```

路由的设置在`config/routes.php`中

对应的路由应该修改成下面这样

**config/router.php**

```php
$route['default_controller'] = 'html/index';
$route['(.*)?/(.*)?/(:num)'] = '$1/$2/$3'; //(:num)匹配的是数字
$route['(.*)?/(:num)'] = '$1/index/$2'; // content/2 -> content/index/2
$route['(.*)'] = '$1/index'; // login -> login/index 设置默认方法为index
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
```

然后就能通过`localhost/tutorial/index.php/login/index`访问到登录页面了

### 2.2.2 移除url中的index.php

url中的index.php有点难看，下面从url中移除index.php

打开`Apache24/conf/httpd.conf`

```txt
#LoadModule rewrite_module modules/mod_rewrite.so
```

改成

```txt
LoadModule rewrite_module modules/mod_rewrite.so
```

```txt
# AllowOverride controls what directives may be placed in .htaccess files.
    # It can be "All", "None", or any combination of the keywords:
    #   AllowOverride FileInfo AuthConfig Limit
    #
    AllowOverride None
```

改成

```txt
# AllowOverride controls what directives may be placed in .htaccess files.
    # It can be "All", "None", or any combination of the keywords:
    #   AllowOverride FileInfo AuthConfig Limit
    #
    AllowOverride All
```

把`Tutorial/.htaccess`的内容改成下面的

```txt
<IfModule mod_rewrite.c>
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ /tutorial/index.php/$1 [L]
</IfModule>
```

接下来就可以用`localhost/tutorial/demo/login`访问登录页面了

localhost 本地主机
tutorial 项目名
login controller名
index 函数名

## 2.3 给login.php加上登录功能

接下来给登录页面加上登录功能

通过`Post`方式

还是刚刚那个登录页面

先修改controller，增加一个login方法，由于还没有数据库这里先做一个简单的判断

**controller/login.php**

```php
public function login()
{
    $email = $this->input->post('email'); //获取参数
    $password = $this->input->post('password');

    if ($email == 'root' && $password == "111111")
    {
        echo 0;
    }
    else
    {
        echo 1;
    }
}
```

需要和js配合一起实现登录的功能，js获取用户输入的账号和密码，然后ajax传到login控制器的login方法中，在回调函数中获取控制器login方法的返回值并做相应处理（登录成功则跳转到`demo/content`，否则显示错误信息）

```javascript
<script>
  var g_site = '/tutorial/demo';
  $('#login_btn').on('click', function () {
    var email = $('#email').val();
    var pwd = $('#password').val();

    $.ajax({
      url: g_site + '/login/login',
      type: 'POST',
      data: {
        password: pwd,
        email: email
      },
      dataType: 'text',
      success: function (data) {
        var message_block = document.getElementById('message_block');
        if (data === '1') {
          message_block.style.display = 'block';
          message_block.style.color = 'red';
          message_block.textContent = '用户名或登录密码错误！';
          console.log(data);
        } else {
          message_block.style.display = 'none';
          console.log(data);
          window.location.href = g_site + '/content';
        }
      },
      error: function (data) {
        message_block.style.display = 'block';
          message_block.textContent = 'Unexpected Error';
        console.log(data);
      }
    });
  });
</script>
```

## 2.3 增加一个content.php页面

到这里一个简单的登录方法就做好了，接下来写`demo/content`页面

![content.php](/tutorial/public/images/demo.png)

**views/content/index.php**

```php
<div class="row">
    <div class="col-md-6 col-md-offset-3">
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
                    <?php echo date('d', strtotime($current['PostDate'])) ?>
                </p>
                <p class="may">
                    <?php echo time_convert($current['PostDate']) ?>
                </p>
            </div>
            <div class="clearfix"></div>
        </div>
        <!--上一篇&下一篇-->
        <div class="one-pager">
            <?php if (isset($prev)) :?>
                <a class="previous" href="<?=base_url('content/'.$prev['Id']);?>">上一篇：<?php echo $prev['Title']?></a>
            <?php else:?>
                <a class="previous disabled">上一篇：无</a>
            <?php endif?>

            <?php if (isset($next)) :?>
                <a class="next" href="<?=base_url('content/'.$next['Id']);?>">下一篇：<?php echo $next['Title']?></a>
            <?php else:?>
                <a class="next disabled">下一篇：无</a>
            <?php endif?>
        </div>
    </div>
</div>
```

注意到这行代码，使用了一个`time_convert`函数，这是自己写的辅助函数，用来将月转成Jan, Feb这样的格式，辅助函数要在控制器里加载，稍后将提到

```php
<p class="may">
    <?php echo time_convert($current['PostDate']) ?>
</p>
```

### 2.3.1 增加一个数据库

接下来写model，负责和数据库交互，包含很多数据库相关方法

如果对数据库不了解，[MySQL 教程 | 菜鸟教程](http://www.runoob.com/mysql/mysql-tutorial.html)

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

**models/Content_Model.php**

```php
<?php
class Content_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_contents()
    {
        $query = $this->db->get('content');
        return current($query->result_array());
    }

    public function get_contents_by_id($id)
    {
        $query = $this->db->query("select * from content where Id = $id");
        return current($query->result_array());
    }

    /**
     * 获取最新content(3条)
     */
    public function get_lastest_contents()
    {
        $query = $this->db->query("select * from content order by PostDate desc limit 0,3");
        return $query->result_array();
    }
}
```

数据库查询当然是直接用sql语句直观，但CI也提供了[查询构造器类](http://codeigniter.org.cn/user_guide/database/query_builder.html)，感兴趣的就自己去看

接下来写控制器，连接model和view

**controllers/demo/Content.php**

```php
<?php
class Content extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Content_Model');
        $this->load->helper('url');
        $this->load->helper('cac_time'); //加载辅助函数
    }

    public function index($id = -1)
    {
        if ($id == -1)
        {
            $result = $this->Content_Model->get_lastest_contents();

            if (count($result) == 3)
            {
                $data['next'] = $result[0];
                $data['current'] = $result[1];
                $data['prev'] = $result[2];
            }
        }
        else
        {
            $prev = $id - 1;
            $next = $id + 1;
            $data['current'] = $this->Content_Model->get_contents_by_id($id);
            if ($id - 1 >= 0)
            {
                $data['next'] = $this->Content_Model->get_contents_by_id($prev);
            }

            $data['prev'] = $this->Content_Model->get_contents_by_id($next);
        }

        $data['page'] = "content/index";
        $data['title'] = $data['current']['Title'];
        $this->load->view('template/index', $data); //$data传到view中
    }
}
```

到这/demo/content就写完了，通过
localhost/tutorial/index.php/content/128 或
localhost/tutorial/index.php/content/index/128
就能访问到Content.php中的index函数，并且参数$id=128

`Get` vs `Post`
||Get|Post|
|:--:|:--:|:--:|
|后退按钮/刷新|无害|数据会被重新提交|
|书签| 可收藏为书签 | 不可收藏为书签|
|缓存| 能被缓存 |不能缓存|
|编码类型| application/x-www-form-urlencoded |application/x-www-form-urlencoded 或 multipart/form-data|
|历史| 参数保留在浏览器历史中| 参数不会保存在浏览器历史中|
|对数据长度的限制| 受URL的长度限制（2048 个字符）|无限制|
|对数据类型的限制|只允许 ASCII 字符|无限制|
|安全性|较POST差，因为所发送的数据是 URL 的一部分在发送密码或其他敏感信息时绝不要使用 GET |较GET安全，因为参数不会被保存在浏览器历史或 web 服务器日志中|
|可见性|数据在 URL 中对所有人都是可见的|数据不会显示在 URL 中|

`controller`给`view`传参

controller通过调用model得到的数据传回到view中

```php
$data['page'] = "content/index";
$data['title'] = $data['current']['Title'];
$this->load->view('template/index', $data);
```

`view`中接收`controller`传过来的参

注意是直接用key访问，不要写错

```php
<title><?php echo $title ?></title>
```

最后的效果是
`localhost/tutorial/demo/login`打开登录界面，输入`root`, `111111`就能进入`demo/content`页面，否则显示账号或密码输入错误

---

## 2.4 其他</h4>

### 2.4.1 在View中使用模板页

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

### 2.4.2 辅助函数</h5>

即其他网页框架中自己创建的Helper类，一般是一些常用的方法，CI中的Helper类加载之后不需要类名可直接使用

比如`helpers/cac_time_helper.php`中实现了时间字符串的格式化，在Controller中load后可直接在View中使用

### 2.4.3 钩子

钩子可以用来在程序执行流程中加入自己的动作，比如在执行需要登陆的操作前检测用户是否登陆

1.启用钩子

**application/config/config.php**

```php
$config['enable_hooks'] = TRUE;
```

2.定义钩子

```php
$hook['post_controller_constructor'] = array(
    'class' => 'UserCheck',
    'function' => 'check_login_state',
    'filename' => 'UserCheck.php',
    'filepath' => 'hooks',
    'params' => '',
);
```

- class 你希望调用的类名，如果你更喜欢使用过程式的函数的话，这一项可以留空。
- function 你希望调用的方法或函数的名称。
- filename 包含你的类或函数的文件名。
- filepath 包含你的脚本文件的目录名。 注意： 你的脚本必须放在 application/ 目录里面，所以 filepath 是相对 application/ 目录的路径，举例来说，如果你的脚本位于 application/hooks/ ，那么 filepath 可以简单的设置为 'hooks' ，如果你的脚本位于 application/hooks/utilities/ ， 那么 filepath 可以设置为 'hooks/utilities' ，路径后面不用加斜线。
- params 你希望传递给你脚本的任何参数，可选。

`post_controller_constructor`时挂钩点，指定钩子被触发的场景

具体的场景参考 [钩子 - 扩展框架核心](http://codeigniter.org.cn/user_guide/general/hooks.html)

### 2.4.4 错误处理

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

### 2.4.5 网页缓存

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

### 2.4.6 存放资源文件

浏览器的请求中很大一部分是在获取js和css，可以通过加快这些元素的获取来加快网页加载，从别人的CDN或服务器上获取虽然方便但不可控，推荐自己下载一份到服务器上，或者放到自己的CDN中，下面是将js和css放在服务器本地

由于`application`文件夹为了提高网站安全性默认不开启文件访问（也不建议开启）

所以在与`application`同级的位置新建`public`文件夹

```txt
-Tutorial
    --application
    --system
    --public
        --css
        --images
        --js
```

引用资源的时候通过`url_helper`的`base_url`方法将相对路径转成绝对路径

css的引用路径写成了这样，可以看到css不在`application`文件夹中

```html
<link rel="stylesheet" href="<?=base_url('/public/bootstrap/css/bootstrap.min.css');?>" type="text/css" />
```

在网页中引用时调用`url_helper`的`base_url`函数将相对路径转成绝对路径

```php
<script src="<?=base_url('/public/js/bootstrap.js');?>"></script>
```

>对css的修改需要清除浏览器缓存才能生效
