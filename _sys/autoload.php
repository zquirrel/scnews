<?php

/*
ini_set('include_path', 
  ini_get('include_path').PATH_SEPARATOR.dirname(__FILE__));
*/

function _my_autoload_($name) {
  $path = strtolower(str_replace('\\','/', $name));
  require_once dirname(__FILE__)."/$path.php";
}

spl_autoload_register('_my_autoload_');

