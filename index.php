<!DOCTYPE html>
<html>
  <?php include '_.php'; ?>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <script src="assets/js/jquery.js"></script>
    <link rel="stylesheet" href="assets/css/home.css">
    <!--[if IE lte 7]>
      <link rel="stylesheet" href="assets/css/font-awesome-ie7.css">
    <![endif]-->
    <script src="assets/js/slides.js"></script>
    <script type="text/javascript">
      $(function() {
        $('#slides').slides({
          width: 380,
          height: 265
        });
      });
    </script>
    <title>校本部学习中心</title>
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
      <div class="stage-inner">
        <div class="row">
          <div class="span5 pics box">
            <div id="slides">
              <div class="slides_container">
                <div>
                  <img src="assets/img/0000_0000_0000.jpg" width="500">
                  <p>测试一</p>
                </div>
                <div>
                  <img src="assets/img/0001_0000_0019.jpg" width="500">
                  <p>测试二</p>
                </div>
              </div>
            </div>
          </div>
          <div class="span7 news box">
            <div class="title">新闻公告</div>
            <div class="content">
              <ul>
<?php news::catalog('/intro',10,null,'date-list-item.php'); ?>
              </ul>
            </div>
          </div>
        </div>
        <div class="links nav">
          <li class="link">
            <a href="catalog.php/register" class="red"> <i class="icon-flag icon-2x"></i><span>我要报名</span></a>
          </li>
          <li class="link">
            <a href="catalog.php/home" class="green"><i class="icon-home icon-2x"></i><span>校本部之家</span></a>
          </li>
          <li class="link">
            <a href="order" class="blue"><i class="icon-list-ol icon-2x"></i><span>排行榜</span></a>
          </li>
          <li class="link">
            <a href="catalog.php/downloads" class="yellow"><i class="icon-cloud-download icon-2x"></i><span>下载中心</span></a>
          </li>
          <div class="clearfix"></div>
        </div>
        <div class="row">
          <div class="span4 intro box">
            <div class="title">招生入学</div>
            <div class="content">
              <ul>
<?php news::catalog('/enrollment',10,'','date-list-item.php'); ?>
              </ul>
            </div>
          </div>
          <div class="span4 guide box">
            <div class="title">学习指引</div>
            <div class="content">
              <ul>
<?php news::catalog('guide',10,'','date-list-item.php'); ?>
              </ul>
            </div>
          </div>
          <div class="span4 life box">
            <div class="title">中心生活</div>
            <div class="content">
              <ul>
<?php news::catalog('life',10,'','date-list-item.php'); ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
    <div class="container footer">
      <div class="pull-right">使用的
        <a href="<?=$base?>/license">技术</a>
      </div>
      <div class="pull-left">© 东北大学继续教育学院</div>
      <div class="clearfix"></div>
    </div>
    <script src="assets/js/bootstrap.js"></script>
  </body>

</html>
