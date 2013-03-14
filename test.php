<?php

require_once '_.php';

trait A {
  static function get() {
    return "Unknown!";
  }
}

class B {
  use A;

  static function fetch() {
    return static::get();
  }
}

class C extends B {
  static function get() {
    return 'Catch me if you can.';
  }
}

echo C::fetch();

var_dump($_SERVER);
