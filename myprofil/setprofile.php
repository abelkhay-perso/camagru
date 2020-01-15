<?php
  session_start();
  $imagetocpy = $_POST['id'];
  if (!$_POST['id'] || !$_SESSION['flag'])
  {
      echo "You don't have access to this page";
      exit();
  }
  copy($imagetocpy, "../images/profiles/" . $_SESSION['flag'] . ".png");
  header("Location: ./profile.php")
?>