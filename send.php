<?php

//запрашиваем файл дб.пхп
require_once 'db.php';

$name = trim( $_POST['name'] ); //трим удаляет пробелы из начала и конца строки
$number = trim( $_POST['number'] );


if( !empty($name) && !empty($number) ){

    $sql = 'INSERT INTO users(name, number) VALUES(:name, :number)';
    $params = [ ':name' => $name, ':number' => $number ];

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);

    echo "<script>alert('Заявка успешно зарегистрирована.');</script>";
    echo "<script> location='index.html'; </script>";
}
else{
    echo "<script>alert('Проверьте правильность введенных данных!');</script>";
    //echo "<script> location='index.html'; </script>";
    echo "Ошибка: " . $e->getMessage();
    
}

