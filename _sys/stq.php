<?php

class stq {

  static function init() {
    static::dbhandle();
  }

  private static function dbhandle() {
    static $dbh = null;
    if ($dbh == null) {
      $db = json_decode(file_get_contents(dirname(__FILE__).'/db.json'));
      try {
        $dbh = new PDO($db->dsn, $db->username, $db->password, array(
          PDO::MYSQL_ATTR_INIT_COMMAND=>'set names utf8'
        ));
      } catch (PDOException $e) {
        die('Error while connecting to database.');
      }
    }
    return $dbh;
  }

  static function sql($sql, $attr) {
    $dbh = static::dbhandle();
    $stat = $dbh->prepare($sql);
    $stat->execute($attr);
    $rs = array();
    while($prop = $stat->fetch(PDO::FETCH_ASSOC)) {
      $rs[] = $prop;
    }
    return $rs;
  }

  static function update($sql, $attr=array()) {
    $dbh = static::dbhandle();
    $stat = $dbh->prepare($sql);
    $stat->execute($attr); 
    return $stat->rowCount();
  }

  static function echoSql($sql, $attr, $tpl= null) {
    if ($tpl == null) {
      $tpl = $attr;
      $attr = array();
    }
    $dbh = static::dbhandle();
    $stat = $dbh->prepare($sql);
    $stat->execute($attr);
    while($prop = $stat->fetch(PDO::FETCH_ASSOC)) {
      echo tpl::file($tpl, $prop);
    }
  }

  static function quote($str) {
    $dbh = static::dbhandle();
    return $dbh->quote($str);
  }

}
