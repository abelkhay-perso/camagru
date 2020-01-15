<?php
function signup($mail, $username, $password, $host) {
  include_once '../config/database.php';
  include_once '../functiondb/mail.php';
  $mail = strtolower($mail);
  try {
          $bdd = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
          $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $query= $bdd->prepare("SELECT id FROM users WHERE username=:username OR mail=:mail");
          $query->execute(array(':username' => $username, ':mail' => $mail));
          if ($val = $query->fetch()) {
            $_SESSION['error'] = "user already exist";
            $query->closeCursor();
            return(-1);
          }
          $query->closeCursor();

          $password = hash("whirlpool", $password);
          $query= $bdd->prepare("INSERT INTO users (username, mail, password, flag) VALUES (:username, :mail, :password, :flag)");
          $flag = uniqid(rand(), true);
          $query->execute(array(':username' => $username, ':mail' => $mail, ':password' => $password, ':flag' => $flag));
          send_verification_email($mail, $username, $flag, $host);
          $_SESSION['signup_success'] = true;
          return (0);
      } catch (PDOException $e) {
          $_SESSION['error'] = "ERROR: ".$e->getMessage();
      }
}
?>