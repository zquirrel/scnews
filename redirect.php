<!doctype html>
<html>
<head>
  <meta charset="utf8" />
  <title>提示</title>
  <link rel="stylesheet" href="<?=$base?>/assets/css/bootstrap.css" />
  <link rel="stylesheet" href="<?=$base?>/assets/css/home.css" />
  <link rel="stylesheet" href="<?=$base?>/assets/css/info.css" />
  <script src="<?=$base?>/assets/js/jquery.js"></script>
  <?php if (isset($time) && $time != false): ?>
  <meta http-equiv="Refresh" content="<?=$time?>; <?=$path?>" />
  <script type="text/javascript">
    $(function () {
      function refreshTimer() {
        var t = parseInt($('#secs').text());
        $('#secs').text(--t);
        setTimeout(refreshTimer, 1000);
      }
      setTimeout(refreshTimer, 1000);
    });
  </script>
  <?php endif; ?>
</head>
<body>
  <div class="stage">
    <h1>提示</h1>
    <div class="box">
      <div class="content">
        <div class="well">
          <p><?=$message?></p>
        </div>
        <p>
        <?php if (isset($time) && $time != false): ?>
          在 <span id="secs">5</span> 秒后，
        <?php else: ?>
        <?php endif; ?>
        页面将跳转到 <a href="<?=$path?>"><?=$path?></a>。
        </p>
      </div>
    </div>
  </div>
</body>
</html>
