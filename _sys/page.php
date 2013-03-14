<?php

class page {

  static function id() {
    static $path = null;
    if ($path == null) {
      $path = isset($_GET['page_id']) ? $_GET['page_id'] : (isset($_SERVER['PATH_INFO']) ? substr($_SERVER['PATH_INFO'],1) : '');
    }
    return $path;
  }
  
  static function catalog($attr) {
    static $name = null;
    if ($name == null) {
      $sql = "select * from `gtf_catalog` join `gtf_page` on(gtf_catalog.path=gtf_page.catalog_id) where `page_id`=:id";
      $rs = stq::sql($sql, array(
        ':id'=> static::id()
      ));
      $name = $rs[0];
    }
    return $name[$attr];
  }

  static function author($attr) {
    static $name = null;
    if ($name == null) {
      $sql = "select * from `gtf_page` join `gtf_user` on(gtf_user.id=gtf_page.author_id) where `page_id`=:id";
      $rs = stq::sql($sql, array(
        ':id'=> static::id()
      ));
      $name = $rs[0];
    }
    return $name[$attr];
  }

  static function name() {
    static $name = null;
    if ($name == null) {
      $rs = stq::sql("select * from `gtf_page` where `page_id`=:id", array(
        ':id'=> static::id()
      ));
      $name = $rs[0]['title'];
    }
    return $name;
  }

  static function content($tpl=null) {
    $select = "select * from `gtf_page` where page_id=:id";
    if (! $tpl) {
      return stq::sql($select, array(
        ':id' => static::id()
      ));
    } else {
      return stq::echoSql($select, array(
        ':id' => static::id()
      ), $tpl);
    }
  }

  static function counter($i=null) {
    static $counter = null;
    if ($counter == null) {
      $sql = 'update gtf_page set counter=counter+1 where page_id=:id';
      stq::update($sql, array(
        ':id' => static::id()
      ));
      $sql = 'select counter from `gtf_page` where page_id=:id';
      $rs = stq::sql($sql, array(
        ':id' => static::id()
      ));
      $counter = (int) $rs[0]['counter'];
    }
    return $counter;
  }

}
