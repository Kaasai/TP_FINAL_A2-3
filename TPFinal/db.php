<?php

$server = "localhost";
$user = "root";
$pass = "root";
$database = "tpfinal";

$conn = mysqli_connect($server, $user, $pass, $database);
if (!$conn) {
    die('erreur de connexion');
}


//$pdo= new PDO('mysql:dbname=$database;charset=utf8;host=$server','$user','$pass')
//if (!$pdo) {
//    die('erreur de connexion');
//}
?>