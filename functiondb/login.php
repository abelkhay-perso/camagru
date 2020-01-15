<?php
function log_user($email, $password) {
  include_once '../config/database.php';
  try {
    echo $email . "\n";
    echo $password . "\n";
      $bdd = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
      $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $query= $bdd->prepare("SELECT id, username, flag FROM users WHERE mail=:mail AND password=:password AND verified='Y'");
      $email = strtolower($email);
      $password = hash("whirlpool", $password);
      echo $password . "\n";
      $query->execute(array(':mail' => $email, ':password' => $password));
      $val = $query->fetch();
      if ($val == null) {
          $query->closeCursor();
          return (-1);
      }
      $query->closeCursor();
      return ($val);
    } catch (PDOException $e) {
      $v['err'] = $e->getMessage();
      return ($v);
    }
}
?>