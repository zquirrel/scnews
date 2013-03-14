<!doctype html>
<html>
    
  <head>
    <meta charset="utf8" />
    <title>管理中心</title>
    <link rel="stylesheet" href="<?=$base?>/assets/css/bootstrap.css" />
    <link rel="stylesheet" href="<?=$base?>/assets/css/home.css" />
    <link rel="stylesheet" href="<?=$base?>/assets/css/admin.css" />
    <script src="<?=$base?>/assets/js/jquery.js"></script>
<?php $export->tpl('head') ?>
  </head>
  
  <body>
    <div class="stage container">
      <h1>管理中心</h1>
      <div class="row box">
        <div class="span3 sidebar">
<?php $export->tpl('sidebar') ?>
        </div>
        <div class="span9">
          <div class="content">
<?php $export->tpl('module') ?>
          </div>
        </div>
      </div>
      <div class="footer">&copy; yfwz100</div>
    </div>
    <script src="<?=$base?>/assets/js/bootstrap.js"></script>
  </body>

</html>
