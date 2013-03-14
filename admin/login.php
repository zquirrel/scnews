<?php include '../_.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (! auth::login()) {
    util::redirect("$base/admin/login.php", '用户名、密码错误！');
  } else {
    util::redirect("$base/admin/", '成功登陆！', 5);
  }
}
?><!doctype html>
<html>
<head>
  <meta charset="utf8" />
  <title>登陆</title>
  <link rel="stylesheet" href="<?=$base?>/assets/css/bootstrap.css" />
  <link rel="stylesheet" href="<?=$base?>/assets/css/home.css" />
  <link rel="stylesheet" href="<?=$base?>/assets/css/info.css" />
  <script src="<?=$base?>/assets/js/jquery.js"></script>
</head>
<body>
  <div class="stage">
    <h1>登陆</h1>
    <div class="box">
      <form method="POST" class="form-horizontal">
        <div class="control-group">
          <label class="control-label" for="username">用户名：</label>
          <div class="controls">
            <input type="text" id="username" name="username" />
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="password">密码：</label>
          <div class="controls">
            <input type="password" id="password" name="password" />
          </div>
        </div>
        <div class="form-actions">
          <button class="btn btn-primary" type="submit">提交</button>
        </div>
      </form>
    </div>
    <div class="footer">
      &copy; yfwz100
    </div>
  </div>
</body>
</html>

