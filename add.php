<?php

require_once 'db.php';

$name = trim($_POST['name']);
$number = trim($_POST['number']);

try {
    if (!empty($name) && !empty($number)) {

        $sql = 'INSERT INTO users(name, number) VALUES(:name, :number)';
        $params = [':name' => $name, ':number' => $number];

        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);

        echo "<script>alert('Запись добавлена.');</script>";
        echo "<script> location='../admin.php'; </script>";
    } else {
        echo "<script>alert('Данные введены неверно!');</script>";
        echo "<script> location='../admin.php'; </script>";
    }
} catch (PDOException $e) {
    echo "Ошибка: " . $e->getMessage();
    die();
}
