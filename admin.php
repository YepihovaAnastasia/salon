<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif:wght@400;700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" type="text/css" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/jquery.formstyler.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <header class="header">
        <div class="header_top">
            <div class="container">
                <div class="header_contacts">

                    <span class="header_btnAdmin">Admin</span>
                </div>
            </div>
        </div>

        <div class="header_content">
            <div class="container">
                <div class="header_content-inner">
                    <div class="header_logo">
                        <a href="#">
                            <img src="img/logo.png" alt="" height="36px" width="100px">
                        </a>
                    </div>

                    <nav class="menu">
                        <div class="header_btn-menu">
                            <span class="icon-bars"></span>
                        </div>
                        <ul>
                            <li><a href="#">Таблица1</a></li>
                            <li><a href="#">Таблица2</a></li>
                            <li><a href="#">Таблица3</a></li>
                            <li><a href="#">Таблица4</a></li>
                            <li><a href="#">Таблица5</a></li>
                        </ul>
                    </nav>
                </div>
            </div>

        </div>
    </header>

    <main>
        <div class="container">
            <div class="admin_panel">
                <table>
                    <tbody>
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>phone</th>
                            <th></th>
                            <th></th>
                        </tr>

                        <?php

                        require_once 'db.php';

                        $sql = "SELECT * FROM `users`";

                        foreach ($pdo->query($sql) as $row) {
                        ?>

                            <tr>
                                <td><?= $row[0] ?></td>
                                <td><?= $row[1] ?></td>
                                <td><?= $row[2] ?></td>
                                <td><a href="update.php?id=<?= $row[0] ?>" class="main_btnAdmin header_btnAdmin">Изменить</a></td>
                                <td><a href="delete.php?id=<?= $row[0] ?>" class="main_btnAdmin header_btnAdmin">Удалить</a></td>
                            </tr>

                        <?php
                        }
                        ?>
                    </tbody>
                </table>

                <div class="main_btnAdmin-inner">
                    <a data-fancybox data-src="#modal" href="javascript:;" class="main_btnAdmin header_btnAdmin" href="#">Создать</a>
                </div>
                
            </div>
        </div>


    </main>


    <div id="modal">
        <form action="./add.php" method="post">
            <h4>Добавьте новую запись</h4>
            <input type="text" name="name" placeholder="Имя">
            <input type="text" name="number" placeholder="Телефон">
            <input type="submit" name="send_btn">
        </form>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/jquery.formstyler.min.js"></script>
    <script src="js/mail.js"></script>
</body>

</html>