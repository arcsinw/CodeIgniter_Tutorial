<?php
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $content['Title'] ?></title>
        <link rel="stylesheet" href="../../public/css/one.css" type="text/css" />
        <link rel="stylesheet" href="../../public/css/bootstrap.css" type="text/css" />
        <link rel="stylesheet" href="../../public/css/site.css" type="text/css" /> 

        <script src="../../public/js/jquery-1.10.2.js"></script> 
        <script src="../../public/js/bootstrap.js"></script>
        <script src="../../public/js/modernizr-2.6.2.js"></script>
        <script src="../../public/js/respond.js"></script>
    </head>
    <body>
        <div class="container body-content">
            <div class="container">
                <div class="col-md-12 content">
                    <div class="one-image">
                        <img class="img-rounded" src="<?php echo $content['ImgUrl'] ?>" alt="">
                    </div>

                    <div class="one-image-footer">
                        <div class="one-image-footer-left">
                            <?php echo $content['Title'] ?>
                        </div>
                        <div class="one-image-footer-right">
                            <?php echo $content['PictureAuthor'] ?>
                        </div>

                        <div class="clearfix"></div>
                    </div>

                    <div class="one-cita-wrapper">
                        <div class="one-cita"><?php echo $content['Text'] ?></div>

                        <div class="one-pubdate">
                            <p class="dom">
                                <?php $content['PostDate'] ?>
                            </p>
                            <p class="may">
                                <?php $content['PostDate'] ?>
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
            </div>
        </div>
        <hr />
        <footer>
            <p style="text-align: center">&copy; <?php echo date('Y')?> - ARCSINW</p>
        </footer>
    </body>
</html>

