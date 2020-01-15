<?php
session_start();
if (!$_POST['height'] || !$_POST['width'] || !$_POST['url'] || !$_SESSION['flag'])
{
    echo "You don't have access to this page";
    exit();
}
    session_start();
    function getnumber()
    {
        $numero = 0;
        $files = glob('../images/montages/*.png', GLOB_BRACE);
        foreach($files as $file) {
            $nom = str_replace('../images/montages/' . $_SESSION['flag'], '', $file);
            $nom = str_replace('.png', '', $nom);
            if ($nom >= $numero)
                $numero = $nom + 1;
        }
        return ($numero);
    }
    if ($_SESSION['flag'] != NULL)
    {
        $img = $_POST['url'];
        $img = str_replace('data:image/png;base64', '', $img);
        $img = str_replace(' ','+', $img);
        $destination = imagecreatefromstring(base64_decode($img));
        $filename =  $_SESSION['flag'] . getnumber() . '.png';

        $i = 0;
        while ($_POST['filtre' . $i])
        {
            $source = imagecreatefrompng($_POST['filtre' . $i]);
            $largeur_source = imagesx($source);
            $hauteur_source = imagesy($source);
            imagecopyresized($destination, $source, 0, 0, 0, 0, $_POST['width'],$_POST['height'], $largeur_source, $hauteur_source);
            $i++;
        }
        imagepng($destination, "../images/montages/" . $filename); 
    }
    function add_montage($montage) {

        include_once '../config/database.php';
      
        try {
            $bdd= new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query= $bdd->prepare("INSERT INTO montages  (montage, username, flag) VALUES (:montage, :username, :flag)");
            $query->execute(array(':montage' => $montage, ':username' => $_SESSION['username'], ':flag' => $_SESSION['flag']));
            return (0);
          } catch (PDOException $e) {
            return ($e->getMessage());
          }
      }
    add_montage("../images/montages/" . $filename);
   
    header("Location: ./indexmontage.php")
?>