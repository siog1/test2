<?php

//connexion a la bdd

$host = '185.98.131.90';
$user = 'katma918629_1qae4k';
$pass = 'WorldofSIODATA';
$db = 'katma918629_1qae4k';
$charset = 'utf8';
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
try {
	global $pdo;
	$GLOBALS['pdo'] = new PDO($dsn, $user, $pass, $options);
} catch(PDOException $e){
  die( "Connection failed: " . $e->getMessage());
}

$url = 'https://world-of-sio.katmakov.com';
$error = "https://world-of-sio.katmakov.com/view/error.php";
