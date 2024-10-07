<?php

$host = 'localhost';
$db   = 'studyin';
$user = 'studyin';
$pass = 'studyin';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
try {
     $pdo = new PDO($dsn, $user, $pass);
} catch (\PDOException $e) {
     echo "database error";
}


$salt = 'lerkjth654dgk%$#$#FG';

?>