<?php

require_once 'db.php';

$row_id = $_GET['id'];

$sql = 'SELECT * FROM users WHERE id = :row_id';
$stmt = $pdo->prepare($sql);
$param = [':row_id' => $row_id];
$stmt->execute($param);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>!!!</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/media.css">
</head>
<body>
    <div id="modalUpdate">
        <form action="./upd.php" method="post">
            <h4>Измените запись</h4>
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <input type="text" name="name" value="<?= $row['name'] ?>">
            <input type="text" name="number" value="<?= $row['number'] ?>">
            <input type="submit" name="send_btn">
        </form>
    </div>
</body>
</html>
