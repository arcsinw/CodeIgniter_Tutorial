<div class="row">

	<div id="doc">
	</div>

	<div>

		<!--上一篇&下一篇-->
		<div class="one-pager">
			<a class="previous" href="<?=base_url('/cinbs/modal');?>">上一篇：CI和Bootstrap模态框</a>

			<a class="next disabled">下一篇：无</a>
		</div>
	</div>

</div>


<script>
	var converter = new showdown.Converter();
	var xhr = new XMLHttpRequest();
	xhr.open('GET', '<?=base_url('/public/files/cinbs/pagination.md');?>', false);
	xhr.onreadystatechange = function () {
		if (xhr.readyState == 4 && xhr.status == 200 || xhr.status == 304) {
			text = xhr.responseText;
			html = converter.makeHtml(text);
			document.getElementById('doc').innerHTML = html;
		}
	}
	xhr.send();
</script>
