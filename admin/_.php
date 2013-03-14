<?php
require_once dirname(__FILE__).'/../_.php';

if (! auth::checkLogin()) {
  return util::redirect($base.'/admin/login.php');
}
