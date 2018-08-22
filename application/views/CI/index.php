<div class="row">
    <div class="col-md-6">

    </div>

    <div id="doc" class="col-md-6 col-md-offset-6">

    </div>
</div>

<script>
    var converter = new showdown.Converter();
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '<?=base_url('/public/files/ci_2.md');?>', true);
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