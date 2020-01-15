<?php 
    session_start();

    if (!$_POST['id'] || !$_POST['flag'] || !$_SESSION['flag'])
    {
        echo "You don't have access to this page";
        exit();
    }
    include_once '../config/database.php';

    try {
        $bdd = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query= $bdd->prepare("SELECT * FROM likes WHERE idmontage=:idmontage AND flag=:flag");
        $query->execute(array(':idmontage' => $_POST['id'], ':flag' => $_POST['flag']));
    
        $val = $query->fetch();
        if ($val == null) {
            $querylike= $bdd->prepare("INSERT INTO likes  (idmontage, flag) VALUES (:idmontage, :flag)");
            $querylike->execute(array(':idmontage' => $_POST['id'], ':flag' => $_POST['flag']));
            $querylike->closeCursor();
            echo ("Like added");
        }
        else
        {
            $querylike= $bdd->prepare("DELETE FROM likes WHERE idmontage=:idmontage AND flag=:flag");
            $querylike->execute(array(':idmontage' => $_POST['id'], ':flag' => $_POST['flag']));
            $querylike->closeCursor();
        }
        $query->closeCursor();
        } catch (PDOException $e) {
        echo ($e->getMessage());
    }
    header("Location: ./galerie.php")
?>