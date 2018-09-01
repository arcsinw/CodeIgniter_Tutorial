<div class="row">
    <div class="col-md-4 category">
        <ul>
            <li>
                <p><a href="#1introducecodeigniter">1. Introduce CodeIgniter</a></p>
                <ul>
                    <li>
                        <p><a href="#11codeigniter">1.1 下载CodeIgniter</a></p>
                    </li>
                </ul>
                <p></p>
            </li>
            <li>
                <p><a href="#2createyourfirstcodeigniterproject">2. Create your first CodeIgniter project</a></p>
                <ul>
                    <li>
                        <p><a href="#21loginphp">2.1 写一个静态登录页面login.php</a></p>
                    </li>
                    <li>
                        <p><a href="#22controllerloginphp">2.2 通过controller打开login.php</a></p>
                        <ul>
                            <li>
                                <p><a href="#221">2.2.1 修改路由</a></p>
                            </li>
                            <li>
                                <p><a href="#222urlindexphp">2.2.2 移除url中的index.php</a></p>
                            </li>
                        </ul>
                        <p></p>
                    </li>
                    <li>
                        <p><a href="#23loginphp">2.3 给login.php加上登录功能</a></p>
                    </li>
                    <li>
                        <p><a href="#23contentphp">2.3 增加一个content.php页面</a></p>
                        <ul>
                            <li>
                                <p><a href="#231">2.3.1 增加一个数据库</a></p>
                            </li>
                        </ul>
                        <p></p>
                    </li>
                    <li>
                        <p><a href="#24h4">2.4 其他</a></p>
                        <ul>
                            <li>
                                <p><a href="#241view">2.4.1 在View中使用模板页</a></p>
                            </li>
                            <li>
                                <p><a href="#242h5">2.4.2 辅助函数</a></p>
                            </li>
                            <li>
                                <p><a href="#243">2.4.3 钩子</a></p>
                            </li>
                            <li>
                                <p><a href="#244">2.4.4 错误处理</a></p>
                            </li>
                            <li>
                                <p><a href="#245">2.4.5 网页缓存</a></p>
                            </li>
                            <li>
                                <p><a href="#246">2.4.6 存放资源文件</a></p>
                            </li>
                        </ul>
                        <p></p>
                    </li>
                </ul>
                <p></p>
            </li>
        </ul>
    </div>

    <article class="markdown-body col-md-8" id="doc">

    </article>

    <a href="#" id="top-btn" class="btn btn-default" title="返回顶部" style="position: fixed;bottom: 30px;right: 30px;display: none;"
        href="javascript:$('body').animate( {scrollTop: 0}, 500);">
        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="12" style="text-align: center;line-height: 22px;">
            <path d="M9.314 0l9.313 9.314-2.12 2.121-7.193-7.192-7.193 7.192L0 9.314z"></path>
        </svg>
    </a>
</div>

<script>
    var converter = new showdown.Converter(
        {
            tables: 'true',
            extensions: ['toc'],
        });

    var xhr = new XMLHttpRequest();
    xhr.open('GET', '<?=base_url('/public/files/ci.md');?>', true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200 || xhr.status == 304) {
            text = xhr.responseText;
            html = converter.makeHtml(text);
            document.getElementById('doc').innerHTML = html;
        }
    }
    xhr.send();

    $(function () {
        $(window).scroll(function () {
            t = $(document).scrollTop();
            if (t > 1000) {
                $('#top-btn').fadeIn();
            }
            else {
                $('#top-btn').fadeOut();
            }
        })
    })

    var $root = $('html, body');

    $('a[href^="#"]').click(function () {
        var href = $.attr(this, 'href');
        var a = document.getElementById(href);
        $root.animate({
            scrollTop: a.offset().top
        }, 500, function () {
            window.location.hash = href;
        });

        return false;
    });

    // $('#top-btn').on('click', function()
    // {
    //     $('body,html').animate({
    //         scrollTop: 0
    //     }, 500);

    // })
</script>