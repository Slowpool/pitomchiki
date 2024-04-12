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

    if (!existent_login($login)) {
        // SQL INJECTION PROTECTION VIA SUBSTITUTION OF DATA THROUGH THE STATEMENT
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $statement = $GLOBALS['connection']->prepare("INSERT INTO user (login, password) VALUES (?, ?)");
        $statement->bind_param("ss", $login, $hashed_password);
        $statement->execute();

        if ($statement->affected_rows == 1) {
            header('location: ..\\signed_user\\profile_s.php');
        }
        $statement->close();
    } else {
        echo '<script>';
        echo ' alert("such a login already exists")';
        echo '</script>';
    }

    $GLOBALS['connection']->close();
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <title>Регистрация</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../styles.css">
</head>

<body background="../images/background_animals.png" link="white" alink="grey" vlink="white">
    <div id="header">
        <div id="unreg_main_header">питомчики</div>
        <div id="unreg_caption_after_main_header">/Регистрация</div>
    </div>

    <div id="content_block">
        <div id="more_big_caption">Регистрация</div>

        <form action="" method="post">
            <table type="login_and_password" cellspacing="0">
                <tr>
                    <td type="align_right">
                        <div id="caption">Придумайте ник питомчика</div>
                    </td>
                    <td type="input_box">
                        <input type="text" name="login">
                    </td>
                </tr>
                <tr>
                    <td type="align_right">
                        <div id="caption">Придумайте пароль</div>
                    </td>
                    <td type="input_box">
                        <div id="usual_input">
                            <input type="text" name="password">
                        </div>
                    </td>
                </tr>
            </table>
            <input type="submit" name="submit" value="Зарегистрироваться и перейти в профиль">
        </form>
        <div id="more_big_caption">
            Уже есть профиль?
            <a href="sign_in.php">Войти</a>
        </div>
    </div>
</body>

</html>