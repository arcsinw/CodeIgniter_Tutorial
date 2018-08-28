<div class="row">
    <article class="markdown-body col-md-8 col-md-offset-2" id="doc">

    </article>
</div>
<script>
    var converter = new showdown.Converter();
    //text      = '# hello, markdown!';
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '<?=base_url('/public/files/html.md');?>', true);
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