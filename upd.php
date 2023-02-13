<?php

require_once 'db.php';

$id = trim($_POST['id']);
$name = trim($_POST['name']);
$number = trim($_POST['number']);

try {
    $sql = 'UPDATE users SET name = :name, number = :number WHERE users.id = :id';
    $params = [':name' => $name, ':number' => $number, ':id' => $id];

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);

    echo "<script>alert('Запись изменена.');</script>";
    echo "<script> location='../admin.php'; </script>";
} catch (PDOException $e) {
    echo "Ошибка: " . $e->getMessage();
    die();
}
