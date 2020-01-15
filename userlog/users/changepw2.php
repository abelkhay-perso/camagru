<?php
session_start();
include_once '../../functiondb/changepw.php';

$mail = $_POST['email'];
$newpassword = $_POST['newpassword'];
$password = $_POST['password'];
$_SESSION['error'] = null;

if ($mail == "" || $mail == null || $newpassword == "" || $newpassword == null || $password == "" || $password == null) {
  $_SESSION['error'] = "You need to fill all fields";
  header("Location: changepw.php");
  return;
}
if(!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
  $_SESSION['error'] = "You need to enter a valid email";
   header("Location: changepw.php");
  return;
}
if (strlen($password) < 3 || strlen($newpassword) < 3) {
  $_SESSION['error'] = "Password should be beetween 3 and 50 characters";
   header("Location: changepw.php");
  return;
}
changepw($mail, $newpassword, $password);
header("Location:profil.php");

?>