<?php
function verify($flag) {
  include_once '../config/database.php';
try {
    $bdd = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query= $bdd->prepare("SELECT id FROM users WHERE flag=:flag");
    $query->execute(array(':flag' => $flag));
    $val = $query->fetch();
    if ($val == null) {
        return (-1);
    }
    $query->closeCursor();
    $query= $bdd->prepare("UPDATE users SET verified='Y' WHERE id=:id");
    $query->execute(array('id' => $val['id']));
    $query->closeCursor();
    return (0);
  } catch (PDOException $e) {
    return (-2);
  }
}
?>