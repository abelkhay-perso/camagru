<?php
    session_start();
  include_once '../../config/database.php';
  
  try {
          $bdd = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
          $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $query= $bdd->prepare("SELECT * FROM users WHERE flag=:flag");
          $query->execute(array(':flag' => $_SESSION['flag']));
          $val = $query->fetch();
          if ($val == null) {
            $_SESSION['error'] = "error";
            $query->closeCursor();
            header("Location: ./profil.php");
            return(-1);
          }
        if ($val['notifcomment'] == 'Y')
            $notifcomment = 'N';
        else
            $notifcomment = 'Y';
          $query->closeCursor();
          $query= $bdd->prepare("UPDATE users SET notifcomment=:notifcomment WHERE flag=:flag");
          $query->execute(array(':notifcomment' => $notifcomment, ':flag' => $_SESSION['flag']));
          $_SESSION['change_success'] = true;
      } catch (PDOException $e) {
            $_SESSION['error'] = "ERROR: ".$e->getMessage();
            header("Location: ./profil.php");
      }
        header("Location: ./profil.php");

?>