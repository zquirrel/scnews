<?php

class catalog {

  static function id() {
    static $path = null;
    if ($path == null) {
      $path = isset($_GET['catalog']) ? $_GET['catalog'] : (isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '');
    }
    return $path;
  }

  static function name() {
    static $name = null;
    if ($name == null) {
      $path = static::id();
      $rs = stq::sql("select * from `gtf_catalog` where `path`=:path", array(
        ':path'=> $path
      ));
      $name = $rs[0]['name'];
    }
    return $name;
  }

  static function listNews($page, $count, $tpl) {
    return news::listNews(static::id(), $page, $count, $tpl);
  }

  static function numberOfCatalogs() {
    $select = "select count(*) as n from `gtf_catalog`";
    $rs = stq::sql($select);
    return $rs[0]['n'];
  }

  static function numberOfPages($num=10) {
    $select = "select count(*) as n from `gtf_page` where catalog_id=:id";
    $rs = stq::sql($select, array(
      ':id'=> static::id()
    ));
    return ceil($rs[0]['n'] / $num);
  }

  static function pagination($tpl, $param='page', $num=10) {
    $curUrl = $_SERVER['PHP_SELF'];
    $qs = array();
    unset($_GET['page']);
    foreach ($_GET as $key => $val) {
      $qs[] = urlencode($key).'='.urlencode($val);
    }
    $qs[] = $param.'=';
    $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
    $prev = $page > 1 && $page <= static::numberOfPages($num) ? $page-1 : $page;
    $next = $page > 1 && $page <= static::numberOfPages($num) ? $page+1 : $page;
    return tpl::file($tpl, array(
      'next' => "$curUrl?".join('&',$qs).$next,
      'prev' => "$curUrl?".join('&',$qs).$prev,
      'curpage'=>$page,
      'allpages'=>static::numberOfPages()
    ));
  }

  static function echoOthers($tpl, $catalog=null) {
    if ($catalog == null) {
      $catalog = static::id();
    }
    $select = "select * from `gtf_catalog` where path!=:path";
    return stq::echoSql($select, array(
      ':path' => $catalog
    ), $tpl);
  }

  static function echoAll($tpl) {
    $select = "select * from `gtf_catalog`";
    return stq::echoSql($select, $tpl);
  }

  static function all() {
    $select = "select * from `gtf_catalog`";
    return stq::sql($select);
  }

}
