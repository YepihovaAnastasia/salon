<?php

require_once 'db.php';

$id = $_GET['id'];

try {
    $sql = "DELETE FROM users WHERE users.id = :id";
    $params = [':id' => $id];

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);

    echo "<script>alert('Запись удалена.');</script>";
    echo "<script> location='../admin.php'; </script>";
} catch (PDOException $e) {
    echo "Ошибка: " . $e->getMessage();
    die();
}
