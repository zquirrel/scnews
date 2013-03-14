<?php
include '../_.php';

auth::logout();
util::redirect("$base/admin/login.php", '成功退出！', 5);
