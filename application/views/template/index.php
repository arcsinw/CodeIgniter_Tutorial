<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $title ?></title>
        <link rel="stylesheet" href="<?=base_url('/public/css/one.css');?>" type="text/css" />
        <link rel="stylesheet" href="<?=base_url('/public/bootstrap/css/bootstrap.min.css');?>" type="text/css" />
        <link rel="stylesheet" href="<?=base_url('/public/css/site.css');?>" type="text/css" /> 
        
        <script src="<?=base_url('/public/showdown/showdown.min.js');?>"></script>
        <script src="<?=base_url('/public/js/jquery-1.10.2.js');?>"></script> 
        <script src="<?=base_url('/public/bootstrap/js/bootstrap.js');?>"></script>
        <script src="<?=base_url('/public/js/modernizr-2.6.2.js');?>"></script>
        <script src="<?=base_url('/public/js/respond.js');?>"></script>
    </head>
    <body>
        <?php $this->load->view('template/page_header'); ?>
        
        <div class="render_body">
            <?php $this->load->view($page); ?>
        </div>

        <?php $this->load->view('template/page_footer'); ?>
    </body>
</html>