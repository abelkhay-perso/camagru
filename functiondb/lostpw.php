<?php
function reset_password($email) {
  include_once '../config/database.php';
  include_once '../functiondb/mail.php';
  try {
      $bdd = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
      $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $query= $bdd->prepare("SELECT id, username FROM users WHERE mail=:mail AND verified='Y'");
      $email = strtolower($email);
      $query->execute(array(':mail' => $email));
      $val = $query->fetch();
      if ($val == null) {
          $query->closeCursor();
          return (-1);
      }
      $query->closeCursor();
      $password = uniqid('');
      $passEncrypt = hash("whirlpool", $password);
      $query= $bdd->prepare("UPDATE users SET password=:password WHERE mail=:mail");
      $query->execute(array(':password' => $passEncrypt, ':mail' => $email));
      $query->closeCursor();
      send_forget_mail($email, $val['username'], $password);
      return (0);
    } catch (PDOException $e) {
      return ($e->getMessage());
    }
}
?>
