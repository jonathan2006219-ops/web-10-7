<?php
// logout.php
session_start();
// 清除所有 session 資料
session_unset();
session_destroy();
// 回到登入頁
header("Location: login.php");
exit;
?>
