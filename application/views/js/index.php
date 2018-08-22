<div id="doc">
</div>

<script>
    var converter = new showdown.Converter();
    //text      = '# hello, markdown!';
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '<?=base_url('/public/files/js.md');?>', true);
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