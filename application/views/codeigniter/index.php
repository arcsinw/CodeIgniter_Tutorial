<div class="row">
    <div class="col-md-2">
    </div> 

    <article class="markdown-body col-md-8" id="doc">

    </article>
    
     <a href="#" class="btn btn-default" title="返回顶部" 
        style="position: fixed;bottom: 30px;right: 30px;"
        href="javascript:$('body').animate( {scrollTop: 0}, 500);">      
        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="12" style="text-align: center;line-height: 22px;">        
            <path d="M9.314 0l9.313 9.314-2.12 2.121-7.193-7.192-7.193 7.192L0 9.314z"></path>
        </svg>    
    </a>
</div>

<script>
    var converter = new showdown.Converter();
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
</script>