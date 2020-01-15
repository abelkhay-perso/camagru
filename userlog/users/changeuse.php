<?php
session_start();
include_once '../../functiondb/changeusername.php';

$mail = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$_SESSION['error'] = null;

if ($mail == "" || $mail == null || $username == "" || $username == null || $password == "" || $password == null) {
  $_SESSION['error'] = "You need to fill all fields";
  header("Location: ./changeusername.php");
  return;
}
if(!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
  $_SESSION['error'] = "You need to enter a valid email";
   header("Location: ./changeusername.php");
  return;
}
if (strlen($username) > 30 || strlen($username) < 3) {
  $_SESSION['error'] = "Username should be beetween 3 and 30 characters";
  header("Location: ./changeusername.php");
  return;
}
if (strlen($password) < 3) {
  $_SESSION['error'] = "Password should be beetween 3 and 50 characters";
   header("Location: ./changeusername.php");
  return;
}
if (changeuser($mail, $username, $password) == 0) {
    $_SESSION['username'] = $username;
    header("Location: ./changeusername.php");
}
header("Location: ./changeusername.php");
?>