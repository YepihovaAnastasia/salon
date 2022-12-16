<?php

require_once 'db.php';

$email = trim($_POST['email']);
$phone = trim($_POST['phone']);
$fio = filter_var(($_POST['fio']), FILTER_UNSAFE_RAW);
$select_servise = filter_var(($_POST['select_servise']), FILTER_UNSAFE_RAW);
$message = filter_var(($_POST['message']), FILTER_UNSAFE_RAW);

try {
    // if(preg_match('/^[a-zA-Z/\s\d]+$/i',$phone)){    
    //     echo "<script>alert('1');</script>";
    // } else {
    //     echo "<script>alert('2');</script>";
    // }

    // if(preg_match('/^[\p{L&} -]+$/u]+$/i',$fio)){    
    //     echo "<script>alert('1');</script>";
    // } else {
    //     echo "<script>alert('2');</script>";
    // }

    switch ($select_servise) {
        case 'Макияж':
            $select_servise = 'Макияж';
            break;
        case 'Стилистика':
            $select_servise = 'Стилистика';
            break;
        case 'Ногтевой сервис':
            $select_servise = 'Ногтевой сервис';
            break;
        default:
            echo "<script>alert('Проверьте правильность введенных данных! Выберите услугу.');</script>";
            die(); //??
            //echo "<script> location='index.html'; </script>";
    }

    $sql2 = 'INSERT INTO records(email, phone, fio, servise, message) VALUES (:email, :phone, :fio, :select_servise, :message)';
    $params2 = [':email' => $email, ':phone' => $phone, ':fio' => $fio, ':select_servise' => $select_servise, ':message' => $message];

    $stmt2 = $pdo->prepare($sql2);
    $stmt2->execute($params2);

    echo "<script>alert('Заявка успешно зарегистрирована!');</script>";
    echo "<script> location='index.html'; </script>";




    // else {
    // echo "<script>alert('Проверьте правильность введенных данных! Заполните все необходимые поля.');</script>";
    // echo "<script> location='index.html'; </script>";
    //echo "Ошибка: " . $e->getMessage();
    //}
} catch (PDOException $e) {
    echo "Ошибка: " . $e->getMessage();
    die();
}


