<?php

namespace model;

class user {

  private static $_mdl = 'user.json';
  private static $_tbl = 'gtf_user';

  function model() {
    static $model = null;
    if ($model == null) {
      $model = json_decode(file_get_contents(dirname(__FILE__).'/'.static::$_mdl), true);
    }
    return $model;
  }

  static function getList() {
    $tbl = static::$_tbl;
    $rs = \stq::sql("select * from `{$tbl}`");
    return $rs;
  }

  static function get($name, $password) {
    $tbl = static::$_tbl;
    $sql = "select * from `{$tbl}` where name=:name and password=:password";
    $rs = \stq::sql($sql, array(
      ':name' => $name,
      ':password' => $password
    ));
    return $rs;
  }

  static function save($ent) {
    $tbl = static::$_tbl;
    $insert = "insert into `{$tbl}`";
    $keys = array();
    $placeholder = array();
    $values = array();
    foreach(static::model() as $key => $value) {
      if (isset($ent[$key])) {
        $keys[] = $key;
        $values[] = $ent[$key];
        $placeholder[] = '?';
      } else if (isset($value['require']) && $value['require']) {
        $keys[] = $key;
        $values[] = $value['default'];
        $placeholder[] = '?';
      }
    }
    $sql = $insert . ' (' . join(',',$keys) . ') values(' . join(',',$placeholder) . ')';
    $rs = \stq::update($sql, $values);
    return $rs;
  }

  static function update($ent) {
    $tbl = static::$_tbl;
    $update = "update `{$tbl}` set";
    $keys = array();
    $values = array();
    foreach(static::model() as $key => $value) {
      if (isset($ent[$key])) {
        $keys[] = "`$key`=?";
        $values[] = $ent[$key];
      } else if (isset($value['require']) && $value['require']) {
        $keys[] = "`$key`=?";
        $values[] = $value['default'];
      }
    }
    $rs = \stq::update($update . ' ' . join(',', $keys), $values);
    return $rs;
  }

}

