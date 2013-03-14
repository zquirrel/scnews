<?php

setlocale(LC_TIME, 'zh_CN.utf8');
date_default_timezone_set('Asia/Chungking');

class auth {

  static function checkLogin() {
    return array_key_exists('user', $_SESSION);
  }

  static function login() {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $rs = \model\user::get($username, $password);
    if (count($rs) == 1) {
      $_SESSION['user'] = $rs[0];
      $_SESSION['last-login-date'] = strftime('%c');
      return true;
    } else {
      return false;
    }
  }

  static function logout() {
    unset($_SESSION['user']);
  }

}
