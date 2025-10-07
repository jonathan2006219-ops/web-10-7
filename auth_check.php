<?php
// auth_check.php
session_start();
if (!isset($_SESSION['user_role']) || !in_array($_SESSION['user_role'], ['老師', '學生'])) {
    $redirect = urlencode($_SERVER['REQUEST_URI']);
    header("Location: login.php?redirect=$redirect");
    exit;
}
?>
