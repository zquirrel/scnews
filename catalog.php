<!DOCTYPE html>
<html>
  <?php include '_.php';  ?>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta charset="utf8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="stylesheet" href="<?=$base?>/assets/css/bootstrap.css" />
    <script src="<?=$base?>/assets/js/jquery.js"></script>
    <link rel="stylesheet" href="<?=$base?>/assets/css/home.css" />
    <!--[if IE lte 7]>
      <link rel="stylesheet" href="<?=$base?>/assets/css/font-awesome-ie7.css">
    <![endif]-->
    <script src="<?=$base?>/assets/js/slides.js"></script>
    <script>
      $(function() {
        $('#slides').slides({
            width: 380,
            height: 265
          });
        });
    </script>
    <title><?php echo catalog::name() ?> - 校本部学习中心</title>
  </head>
  
  <body>
    <div class="header">
      <div class="container">
        <div class="logo">
          <h1 class="text">校本部学习中心</h1>
        </div>
        <?php include 'navbar.php' ?>
      </div>
    </div>
    <div class="stage container">
      <div class="row">
        <div class="span8 box">
          <ul class="breadcrumb">
            <li>
              <a href="<?=$base?>">首页</a>
              <span class="divider">/</span>
            </li>
            <li>
              <a href="../catalog.php<?=catalog::id()?>"><?=catalog::name()?></a>
            </li>
          </ul>
          <h1><?php echo catalog::name() ?></h1>
          <div class="content">
            <ul>
<?php catalog::listNews('page', 10, 'date-list-item.php'); ?>
            </ul>
<?php tpl::begin() ?>
              <div class="pagination pagination-centered">
              <ul>
                <li><a href="$prev">&laquo;</a></li>
                <li><span>$curpage / $allpages</span></li>
                <li><a href="$next">&raquo;</a></li>
              </ul>
            </div>
<?php tpl::end('pagination') ?>
<?= catalog::pagination('pagination'); ?>
          </div>
        </div>
        <div class="span4 sidebar">
          <div class="box">
            <div class="title">热点排行</div>
            <div class="content">
              <ul>
<?php catalog::listNews('page', 5, 'date-list-item.php'); ?>
              </ul>
            </div>
          </div>
          <div class="box">
            <div class="title">最新信息</div>
            <div class="content">
              <ul>
<?php catalog::listNews('page', 5, 'date-list-item.php'); ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container footer">
      <div class="pull-right">使用的
        <a href="page.php/technology">技术</a>
      </div>
      <div class="pull-left">© 东北大学继续教育学院</div>
      <div class="clearfix"></div>
    </div>
    <script src="../assets/js/bootstrap.js"></script>
  </body>

</html>
