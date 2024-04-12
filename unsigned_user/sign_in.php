<?php

require_once __DIR__ . '\\..\\functions.php';
require_once __DIR__ . '\\..\\config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];

    // echo 'login: ', $_POST['login'];
    // echo "<br>";
    // echo 'password: ', $_POST['password'];
    // echo "<br>";

    if (is_correct_credential($login, $password)) {
        header('location: ..\\signed_user\\profile_s.php');
    } else {
        echo '<script>';
        echo ' alert("incorrect credentials")';
        echo '</script>';
    }

    $connection->close();
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <title>Вход в профиль</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../styles.css">
</head>

<body background="../images/background_animals.png" link="white" alink="grey" vlink="white">
    <div id="header">
        <div id="unreg_main_header">питомчики</div>
        <div id="unreg_caption_after_main_header">/Вход</div>
    </div>

    <div id="content_block">
        <div id="more_big_caption">Вход в профиль</div>
        <form action="" method="post">
            <table type="login_and_password" cellspacing="0">
                <tr>
                    <td type="align_right">
                        <div id="more_big_caption">Логин</div>
                    </td>
                    <td type="input_box">
                        <input type="text" name="login">
                    </td>
                </tr>
                <tr>
                    <td type="align_right">
                        <div id="more_big_caption">Пароль</div>
                    </td>
                    <td type="input_box">
                        <div id="usual_input">
                            <input type="text" name="password">
                        </div>
                    </td>
                </tr>
            </table>


            <input type="submit" name="submit" value="Вход">
        </form>


        <div id="more_big_caption">
            Нет профиля?
            <a href="registration.php">Создать</a>
        </div>
    </div>
</body>

</html>