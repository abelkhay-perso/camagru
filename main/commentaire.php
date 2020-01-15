<?php 
    session_start();
    if (!$_POST['id'] || !$_POST['comment'] || !$_POST['flag'] || !$_POST['sendmail']) 
    {
        echo "You don't have access to this page";
        exit();
    }
    include_once '../config/database.php';
    include_once '../functiondb/mail.php';
    
    try {
        $bdd= new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query= $bdd->prepare("INSERT INTO comments  (idmontage, commentaire, flag) VALUES (:idmontage, :commentaire, :flag)");
        $query->execute(array(':idmontage' => $_POST['id'], ':commentaire' => $_POST['comment'], ':flag' => $_POST['flag']));
        $query->closeCursor();

        $query= $bdd->prepare("SELECT * FROM users WHERE flag=:flag");
        
        $query->execute(array(':flag' => $_POST['sendmail']));
        if (!$val = $query->fetch()) {
          $_SESSION['error'] = $_POST['sendmail'];
          $query->closeCursor();
          return(-1);
        }
        if ($val['notifcomment'] == 'Y')
            send_comment_mail($val['mail'], $val['username'], $_POST['comment']);
        $query->closeCursor();
        echo (0);
    } catch (PDOException $e) {
        echo ($e->getMessage());
    }

    header("Location: ./galerie.php")
?>