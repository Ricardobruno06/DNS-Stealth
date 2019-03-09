<?php
session_start();
$_SESSION['admin'] = "false";
$_SESSION['mgr'] = "false";
$_SESSION['cos'] = "false";
header("Location: login.php");
  ?>