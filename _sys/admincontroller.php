<?php

define('MODULE_SEPARATOR', '-');

class admin {

  static function loc() {
    static $loc = null;
    if ($loc == null) {
      $loc = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : (isset($_GET['route']) ? $_GET['route'] : '/home');
    }
    return $loc;
  }

}

class AdminController extends admin {

  private $_head = array();
  private $_basePath;
  private $_module;

  function __construct($basePath) {
    $this->_basePath = $basePath;
    $this->route();
  }

  function head($str=null) {
    $this->_head[] = $str;
  }

  function tpl($mod) {
    switch ($mod) {
    case 'head':
      foreach($this->_head as $key=>$val) {
        echo $val;
      }
      break;
    case 'content': case 'module':
      global $base;
      $export = $this;
      $path = implode('/', $this->_module);
      include "{$this->_basePath}/{$path}.inc.php";
      break;
    case 'sidebar':
      global $base;
      $export = $this;
      $modules = json_decode(file_get_contents("{$this->_basePath}/sidebar.json"), true);
      include "{$this->_basePath}/sidebar.php";
    }
  }

  function module($path = null) {
    if ($path !== null) {
      global $base;
      return $base . '/admin/' . str_replace('/', MODULE_SEPARATOR, $path);
    } else {
      return $this->_module;
    }
  }

  private function route() {
    $loc = static::loc();
    preg_match('/^\/([^\/]+)/', $loc, $matches);
    if (count($matches) > 1) {
      $this->_module = explode(MODULE_SEPARATOR, $matches[1]);
    } else {
      die("Error while fetching $loc...");
    }
  }

}
