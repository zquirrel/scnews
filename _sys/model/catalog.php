<?php

namespace model;

class catalog {

  private static $_mdl = 'catalog.json';
  private static $_tbl = 'gtf_catalog';

  static function model() {
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

  static function get($path) {
    $tbl = static::$_tbl;
    $sql = "select * from `{$tbl}` where path=:path";
    $rs = \stq::sql($sql, array(
      ':path' => $path
    ));
    if (count($rs) > 0) {
      return $rs[0];
    } else {
      return null;
    }
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

  static function update($ent, $path) {
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
    $where = "where path=?";
    $values[] = $path;
    $rs = \stq::update($update . ' ' . join(',', $keys) . ' ' . $where, $values);
    return $rs;
  }

  static function remove($path) {
    $tbl = static::$_tbl;
    $sql = "delete from $tbl where path=:path";
    return \stq::update($sql, array(
      ':path'=> $path
    ));
  }

}

