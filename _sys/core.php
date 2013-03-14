<?php

class tpl {

  static function localEval($code, $attr=null) {
    if ($attr) extract($attr);
    return eval('return "'.preg_replace('/(\")/','\"',$code).'";');
  }

  static function text($text, $attr=null) {
    return static::localEval($text, $attr);
  }

  static function file($name, $attr=null) {
    static $tpl = array();
    if (! array_key_exists($name, $tpl)) {
      $tpl[$name] = include $name;
    }
    return static::localEval($tpl[$name], $attr);
  }

}
