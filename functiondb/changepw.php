<?php
function changepw($mail, $newpassword, $password) {
  include_once '../config/database.php';

  $password = hash("whirlpool", $password);
  $mail = strtolower($mail);
  try {
          $bdd = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
          $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $query= $bdd->prepare("SELECT id, username FROM users WHERE mail=:mail AND password=:password");
          $query->execute(array(':mail' => $mail, ':password' => $password));
          $val = $query->fetch();
          if ($val == null) {
            $_SESSION['error'] = "user not found";
            $query->closeCursor();
            return(-1);
          }
          $query->closeCursor();
          $newpassword = hash("whirlpool", $newpassword);
          $query= $bdd->prepare("UPDATE users SET password=:password WHERE mail=:mail");
          $query->execute(array(':password' => $newpassword, ':mail' => $mail));
          $_SESSION['change_success'] = true;
          return (0);
      } catch (PDOException $e) {
          $_SESSION['error'] = "ERROR: ".$e->getMessage();
          return (-1);
      }
}
?>