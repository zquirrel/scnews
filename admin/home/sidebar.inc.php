<div class="accordion-inner">
  <p>当前登陆：<?=$_SESSION['user']['name']?></p>
  <p>上次登陆：<?=stat::loginTime()?></p>
  <p>
    <a class="btn btn-primary btn-mini" href="logout.php">退出系统</a>
  </p>
</div>
