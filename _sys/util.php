<?php

class util {

  static function redirect($path, $message="完成！", $time=false) {
    global $base;
    include ROOT.'/redirect.php';
    exit();
  }

  static function error($path, $msg, $time=false, $statusCode=404) {
    global $base;
    header(':', true, $statusCode);
    static::redirect($path, $msg, $time);
  }
}
