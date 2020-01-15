<?php
session_start();
include '../functiondb/login.php';

$email = $_POST['mail'];
$password = $_POST['password'];


if (($val = log_user($email, $password)) == -1) {
  $_SESSION['error'] = "user not found";
  header("Location: ./login.php");
} else if (isset($val['err'])) {
  $_SESSION['error'] = $val['err'];
  header("Location: ./login.php");
} else {
  $_SESSION['id'] = $val['id'];
  $_SESSION['flag'] = $val['flag'];
  $_SESSION['username'] = $val['username'];
  header("Location: ../index.php");
}

?>