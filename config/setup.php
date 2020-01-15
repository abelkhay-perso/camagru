#!/usr/bin/php
<?php
  include './database.php';

  try {
      $bdd = new PDO($DB_DSN_LIGHT, $DB_USER, $DB_PASSWORD);
      $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "CREATE DATABASE IF NOT EXISTS `$DB_NAME`";
      $bdd->exec($sql);
      echo "Database created successfully<br/>";
  } catch(PDOException $e) {
      echo 'Connection failed: <br/> ' . $e->getMessage(). "<br/>";
      exit(-1);
  }

  try {
      $bdd = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
      $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "CREATE TABLE IF NOT EXISTS `users` (
        `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        `username` VARCHAR(30) NOT NULL,
        `mail` VARCHAR(100) NOT NULL,
        `password` VARCHAR(256) NOT NULL,
        `flag`  VARCHAR(50)NOT NULL,
        `verified` VARCHAR(1) NOT NULL DEFAULT 'N',
        `notifcomment` VARCHAR(1) NOT NULL DEFAULT 'Y'
      )";
      $bdd->exec($sql);
      echo "Table users created successfully<br/>";
      } catch (PDOException $e) {
      echo "ERROR CREATING TABLE: ".$e->getMessage(). "<br/>";
      }
      
      try {
        $bdd = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE TABLE IF NOT EXISTS `montages` (
          `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
          `montage` VARCHAR(256) NOT NULL,
          `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
          `username` VARCHAR(30) NOT NULL,
          `flag`  VARCHAR(50)NOT NULL
        )";
        $bdd->exec($sql);
        echo "Table montages created successfully<br/>";
        } catch (PDOException $e) {
        echo "ERROR CREATING TABLE: ".$e->getMessage(). "<br/>";
        }

        try {
          $bdd = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
          $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sql = "CREATE TABLE IF NOT EXISTS `comments` (
            `idmontage` VARCHAR(30) NOT NULL,
            `commentaire` VARCHAR(256) NOT NULL,
            `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
            `flag`  VARCHAR(50)NOT NULL
          )";
          $bdd->exec($sql);
          echo "Table comments created successfully<br/>";
          } catch (PDOException $e) {
          echo "ERROR CREATING TABLE: ".$e->getMessage(). "<br/>";
          }

          try {
            $bdd = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "CREATE TABLE IF NOT EXISTS `likes` (
              `idmontage` VARCHAR(30) NOT NULL,
              `flag`  VARCHAR(50)NOT NULL
            )";
            $bdd->exec($sql);
            echo "Table comments likes successfully<br/>";
            } catch (PDOException $e) {
            echo "ERROR CREATING TABLE: ".$e->getMessage(). "<br/>";
            }
?>

