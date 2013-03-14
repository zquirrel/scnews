<?php 

include '_.php'; 
$export=new AdminController(dirname(__FILE__));

if (! isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
  include 'home/html.php';
} else {
  include 'home/ajax.php';
}

