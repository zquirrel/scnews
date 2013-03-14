<?php

namespace model;

setlocale(LC_TIME, 'zh_CN.utf8');
date_default_timezone_set('Asia/Chungking');

class page {

  static function getList() {
    $rs = \stq::sql('select * from `gtf_page`');
    return $rs;
  }

  static function get($id) {
    $rs = \stq::sql('select * from gtf_page where page_id=:id', array(
      ':id' => $id
    ));
    return $rs;
  }

  static function preprocess(&$page) {
    $page['create_date'] = 'NOW()';
    $page['content'] = strip_tags($page['content'], '<strong><strike><em><blockquote><h1><h2><h3><img><table><tr><td><th><li><ol><ul><b><i><u><a><br><br/><hr><hr/><p><div><span>');
    return $page;
  }

  static function save($page) {
    $page = static::preprocess($page);

    $insert = 'insert into gtf_page';
    $column = array();
    $values = array();
    foreach($page as $key => $value) {
      if ($key != 'create_date') {
        $column[] = $key;
        $values[] = \stq::quote($value);
      } else {
        $column[] = $key;
        $values[] = $value;
      }
    }
    $sql = $insert . ' (' . join(',',$column) . ') values(' . join(',',$values) . ')';
    $rs = \stq::update($sql);
    return $rs;
  }
  
  static function update($id, $page) {
    $page = static::preprocess($page);

    $update = 'update `gtf_page` set';
    $set = array();
    $values = array();
    foreach($page as $key => $value) {
      if ($key != 'create_date') {
        $set[] = "$key=?";
        $values[] = $value;
      } else {
        $set[] = "create_date=NOW()";
      }
    }
    $where = "where page_id=?";
    $values[] = $id;
    $sql = $update . ' ' . join(',', $set) . ' ' . $where;
    $rs = \stq::update($sql, $values);
    return $rs;
  }
}
