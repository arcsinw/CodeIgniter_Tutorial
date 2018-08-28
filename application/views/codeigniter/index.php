<div class="row">
    <div class="col-md-3">
        <h1 id="category">目录</h1>
        <p><a href="#1">1. Create your first CodeIgniter project</a></p>
        <ul>
            <li><p><a href="#1.1">1.1. Model</a></p></li>
            <li><p><a href="#1.2">1.2 Controller</a></p>
            <ul>
            <li><p><a href="#1.2.1">1.2.1 路由</a></p></li>
            <li><p><a href="#1.2.2">1.2.2 传参</a></p></li></ul></li>
            <li><p><a href="#1.3">1.3 View</a></p>
            <ul>
            <li><a href="#1.3.1">1.3.1 使用模板页</a></li></ul></li>
            <li><p><a href="#1.4">1.4 其他</a></p>
            <ul>
            <li><p><a href="#1.4.1">1.4.1 辅助函数</a></p></li>
            <li><p><a href="#1.4.2">1.4.2 钩子</a></p></li>
            <li><p><a href="#1.4.3">1.4.3 错误处理</a></p></li>
            <li><p><a href="#1.4.4">1.4.4 网页缓存</a></p></li>
            <li><p><a href="#1.4.4">1.4.5 多环境处理</a></p></li></ul></li>
        </ul>
    </div> 

    <article class="markdown-body col-md-8" id="doc">

    </article>
    
     <a href="#" id="top-btn" class="btn btn-default" title="返回顶部" 
        style="position: fixed;bottom: 30px;right: 30px;display: none;"
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
    xhr.onreadystatechange = function()
    {
        if (xhr.readyState == 4 && xhr.status == 200 || xhr.status == 304)
        {
            text = xhr.responseText;
            html      = converter.makeHtml(text);
            document.getElementById('doc').innerHTML = html;
        }
    }
    xhr.send();

    $(function()
    {
        $(window).scroll(function(){
            t = $(document).scrollTop();
            if (t > 1000)
            {
                $('#top-btn').fadeIn();
            }
            else
            {
                $('#top-btn').fadeOut();
            }
        })        
    })

    var $root = $('html, body');
  
    $('a[href^="#"]').click(function() {
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

