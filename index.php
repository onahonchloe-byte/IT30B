<?php
//Datatbase Connection
$host =
$db =
$user =
$pass =
$charset ="utf"

$dsn = "mysql:host=$host; dbname=$db; charset=$charset";

$options = [
    PDO::ATTR_ERR => PDO::ERRMODE_EXCEPTION,
    PDO:: ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO:: => PDO;
];

try{
    $pdo = new PDO($user,$pass, $options);
    echo 'connection successful';
}catch (PDOException $e){
    die("Database connection failed".  $e->getMessage());
}


?>
