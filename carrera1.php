<?php

// error_reporting(E_ALL | E_STRICT);
// ini_set('display_errors', 1);

try {
    $pdo = new PDO("mysql:host=localhost; dbname=universidad;","root", "password");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // $stm = $pdo->query("SELECT VERSION()");
    // $version = $stm->fetch();
    // echo $version[0] . PHP_EOL;

    $nombre = "EHelen Reynoso";
   $matricula = "1920154";
  $edad = "30";

    $stm = $pdo->prepare("INSERT INTO estudiante (nombre, matricula, edad) VALUES (:nombre,:matricula,:edad)");
    $stm->bindParam(":nombre", $nombre);
   $stm->bindParam(":matricula", $matricula);
   $stm->bindParam(":edad", $edad);

    $data = $stm->execute();
    print_r($data);

    echo "Trabajando";
} catch (PDOException $e){
    echo $e->getMessage();
}