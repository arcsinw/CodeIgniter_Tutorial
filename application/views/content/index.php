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

