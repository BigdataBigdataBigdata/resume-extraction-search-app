<?php
session_start();
require_once 'database.php';
global $uid;
$uid = $_SESSION['uid'];
global $user_name;
$user_name  = $_SESSION['user_name'];
?>
