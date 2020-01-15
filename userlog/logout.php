<?php
session_start();
$_SESSION['error'] = null;
$_SESSION['id'] = null;
$_SESSION['username'] = null;
$_SESSION['flag'] = null;
session_destroy();
header("Location: ../index.php");
?>