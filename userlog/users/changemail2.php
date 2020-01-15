<?php
session_start();
include_once '../../functiondb/changemail.php';

$mail = $_POST['email'];
$newmail = $_POST['newemail'];
$password = $_POST['password'];
$_SESSION['error'] = null;

if ($mail == "" || $mail == null || $newmail == "" || $newmail == null || $password == "" || $password == null) {
  $_SESSION['error'] = "You need to fill all fields";
  header("Location: ./changemail.php");
  return;
}
if(!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
  $_SESSION['error'] = "You need to enter a valid email";
   header("Location: ./changemail.php");
  return;
}
if(!filter_var($newmail, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error'] = "You need to enter a valid new email";
     header("Location: ./changemail.php");
    return;
}
if (strlen($password) < 3) {
  $_SESSION['error'] = "Password should be beetween 3 and 50 characters";
   header("Location: ./changemail.php");
  return;
}
changemail($mail, $newmail, $password);
  header("Location: ./profil.php");
?>