<div class="row">

	<!-- <h1>Bootstrap</h1>
	<ul>
		<li><a href="<?= base_url('/cinbs/modal'); ?>">CI和Bootstrap模态框</a></li>
		<li><a href="<?= base_url('/cinbs/pagination'); ?>">CI和Bootstrap分页</a></li>
	</ul> -->

	<article class="markdown-body col-md-6 col-md-offset-2" id="doc">

    </article>
</div>

<script>
    var converter = new showdown.Converter(
    {
        tables: 'true',
        extensions: ['toc'],
    });
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '<?=base_url('/public/files/bootstrap.md');?>', true);
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