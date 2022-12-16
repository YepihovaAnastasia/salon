<?php

$driver = 'mysql';
$host = 'localhost';
$db_user = 'root';
$db_password = '';
$db_name = 'test';
$charset = 'utf8';
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

try {
    $pdo = new PDO("$driver:host=$host;dbname=$db_name;charset=$charset", 
    $db_user, $db_password, $options);
    //echo "Подключение к БД успешно!";
}
catch (PDOException $e) {
    echo "Ошибка: " . $e->getMessage();
    die();
}

?>