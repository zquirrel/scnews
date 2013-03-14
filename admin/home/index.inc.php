<?php
function greeting() {
  date_default_timezone_set('Asia/Harbin');
  $m = date('H');
  if ($m >= 0 && $m < 6) {
    $msg = "凌晨了，还要加班吗？";
  } else if ($m < 11) {
    $msg = "早上好！";
  } else if ($m < 13) {
    $msg = "中午好！";
  } else if ($m < 18) {
    $msg = "下午好！";
  } else {
    $msg = "晚上好！";
  }
  return $msg;
}
function quickbar($tpl) {
  global $export;
  $mdl = json_decode(file_get_contents(dirname(__FILE__).'/quickbar.json'));
  foreach ($mdl as $it) {
    echo tpl::file($tpl, array(
      'path' => $export->module($it->path),
      'icon' => $it->icon
    ));
  }
}
?>
<div class="toolbar">
  <ul class="nav nav-pills">
    <?php tpl::begin() ?>
    <li><a href="$path"><i class="icon-$icon icon-2x"></i></a></li>
    <?php tpl::end('qb-item') ?>
    <?=quickbar('qb-item') ?>
  </ul>
</div>
<div class="pic-msg">
  <div class="top-left-msg"><?=greeting()?>欢迎登陆用户中心。</div>
  <img src="<?=$base?>/assets/img/header.png" />
</div>
<div class="content">
  <p>请于左侧选择管理项目进行项目。</p>
  <table class="table">
    <tbody>
      <tr>
        <th>作者</th><td>yfwz100</td>
      </tr>
      <tr>
        <th>版本</th><td>2013.3</td>
      </tr>
    <tbody>
  </table>
</div>
