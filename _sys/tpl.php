<?php

/**
 * Generate content from simple template.
 */

class tpl {

  private static $tpl = array();

  static function begin() {
    ob_start();
  }

  static function end($attr=null) {
    $tpl = ob_get_clean();
    if (is_array($attr)) {
      static::text($tpl, $attr); 
    } else if (is_string($attr)) {
      static::$tpl[$attr] = $tpl;
    }
  }

  static function text($code, $attr=null) {
    if ($attr) extract($attr);
    return eval('return "'.preg_replace('/(\")/','\"',$code).'";');
  }

  static function file($name, $attr=null) {
    if (! array_key_exists($name, static::$tpl)) {
      ob_start();
      include $name;
      static::$tpl[$name] = ob_get_clean();
    }
    return static::text(static::$tpl[$name], $attr);
  }

}
