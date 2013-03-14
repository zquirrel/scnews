<?php

class stat {

  static function numberOfRecords($table) {
    return stq::update('select count(*) from `$table`');
  }

  static function loginTime() {
    return $_SESSION['last-login-date'];
  }
}
