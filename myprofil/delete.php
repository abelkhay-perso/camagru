<?php
    session_start();
    if (!$_POST['id'] || !$_SESSION['flag'])
    {
        echo "You don't have access to this page";
        exit();
    }
    $imagetodel = $_POST['id'];
    unlink($imagetodel);
    include_once '../config/database.php';
    try {
        $bdd = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query= $bdd->prepare("SELECT * FROM montages WHERE montage=:montage AND flag=:flag");
        $query->execute(array(':montage' => $_POST['id'], ':flag' => $_SESSION['flag']));
    
        $val = $query->fetch();
        if ($val == null) {
            $query->closeCursor();
        }

        $query= $bdd->prepare("DELETE FROM montages WHERE montage=:montage AND flag=:flag");
        $query->execute(array(':montage' => $_POST['id'], ':flag' => $_SESSION['flag']));
        $query->closeCursor();

        $query= $bdd->prepare("DELETE FROM comments WHERE idmontage=:id");
        $query->execute(array(':id' => $val['id']));
        $query->closeCursor();
        } catch (PDOException $e) {
    }
    
    header("Location: ./miniatures.php")
?>