<div class="row">
    <div class="col-md-6">       
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

    <div id="doc" class="col-md-6">

    </div>
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