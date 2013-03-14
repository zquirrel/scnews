<!DOCTYPE html>
<html>
  <?php include '_.php'; page::counter(+1) ?>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <script src="../assets/js/jquery.js"></script>
    <link rel="stylesheet" href="../assets/css/home.css">
    <!--[if IE lte 7]>
      <link rel="stylesheet" href="../assets/css/font-awesome-ie7.css">
    <![endif]-->
    <script src="../assets/js/slides.js"></script>
    <script>
      $(function() {
        $('#slides').slides({
          width: 380,
          height: 265
        });
      });
    </script>
    <title><?=page::name()?> - 校本部学习中心</title>
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
              <a href="http://localhost:3000/">首页</a>
              <span class="divider">&gt;</span>
            </li>
            <li>
            <a href="<?=$base?>/catalog.php<?=page::catalog('path')?>"><?=page::catalog('name')?></a>
              <span class="divider">&gt;</span>
            </li>
            <li class="active">
              <span><?=page::name()?></span>
            </li>
          </ul>
          <?php tpl::begin() ?>
          <h1 class="passage">$title</h1>
          <div class="meta">
            <span class="date">发表时间： $create_date </span>
            <span class="date">作者： $author_id </span>
          </div>
          <div class="content">
          $content 
          </div>
          <?php tpl::end('ctpl') ?>
          <?php page::content('ctpl'); ?>
        </div>
        <div class="span4 box">
          <div class="title">热门点击</div>
          <div class="content">
            <ul>
              <?php news::catalog(page::catalog('path'),10,'hot','date-list-item.php'); ?>
            </ul>
          </div>
          <div class="title">最新信息</div>
          <div class="content">
            <ul>
              <?php news::catalog(page::catalog('path'),10,null,'date-list-item.php'); ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="container footer">
      <div class="pull-right">使用的
        <a href="http://localhost:3000/license">技术</a>
      </div>
      <div class="pull-left">© 东北大学继续教育学院</div>
      <div class="clearfix"></div>
    </div>
    <script src="../assets/js/bootstrap.js"></script>
  </body>

</html>
