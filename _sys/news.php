<?php

/**
 * The news module.
 */

class news {

  static function table($table, $count, $type, $tpl, $pic=false) {
    $select = "select * from `$table`";
    $where = $pic ? "`pic` != null" : "";
    $limit = "limit 0,$count";
    $orderby = "order by ";
    switch ($type) {
    case 'hot': case 'comments': $orderby .= "click"; break;
    case 'latest': case 'date': default: $orderby .= "date"; break;
    }
    $sql = $select . ' ' . $where . ' ' . $orderby . ' ' . $limit;
    return stq::echoSql($sql, $tpl);
  }

  static function catalog($catalog, $count, $type, $tpl, $pic=false) {
    $select = "select * from `gtf_page`";
    $where = 'where ';
    $where .= $pic ? "`pic` != null" : "1";
    $where .= " and `catalog_id`=:catalog";
    $limit = "limit 0,$count";
    $orderby = "order by ";
    switch ($type) {
    case 'hot': case 'comments': $orderby .= "`counter` desc"; break;
    case 'latest': case 'date': default: $orderby .= "`modified_date`"; break;
    }
    $sql = $select . ' ' . $where . ' ' . $orderby . ' ' . $limit;
    return stq::echoSql($sql, array(':catalog'=>$catalog), $tpl);
  }

  static function listNews($catalog, $page, $count, $tpl) {
    if (is_string($page)) {
      $start = isset($_GET[$page]) ? ($_GET[$page] - 1) * $count : 0;
    } else if (is_numeric($start)) {
      $start = ($page - 1) * length;
    }
    if (isset($start) and $start <0) $start = 0;
    $select = "select * from `gtf_page`";
    $where = "where `catalog_id`=:catalog";
    $limit = "limit $start,$count";
    $sql = $select . ' ' . $where . ' ' . $limit;
    return stq::echoSql($sql, array(
      ':catalog'=>$catalog
    ), $tpl);
  }

}
