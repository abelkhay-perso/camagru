<?php
session_start();
include_once '../functiondb/signup.php';

$mail = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$_SESSION['error'] = null;

if ($mail == "" || $mail == null || $username == "" || $username == null || $password == "" || $password == null) {
  $_SESSION['error'] = "You need to fill all fields";
  header("Location: ./signupform.php");
  return;
}
if(!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
  $_SESSION['error'] = "You need to enter a valid email";
  header("Location: ./signupform.php");
  return;
}
if (strlen($username) > 30 || strlen($username) < 3) {
  $_SESSION['error'] = "Username should be beetween 3 and 30 characters";
  header("Location: ./signupform.php");
  return;
}
if (strlen($password) < 3) {
  $_SESSION['error'] = "Password should be beetween 3 and 50 characters";
  header("Location: ./signupform.php");
  return;
}
$url = $_SERVER['HTTP_HOST'] . str_replace("/signup.php", "", $_SERVER['REQUEST_URI']);
signup($mail, $username, $password, $url);
header("Location: ./signupform.php");
?>