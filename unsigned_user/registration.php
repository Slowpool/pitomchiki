<?php

require_once __DIR__ . '\\..\\functions.php';
require_once __DIR__ . '\\..\\config.php';
require_once __DIR__ . '\\..\\signed_user\\session.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];

    if (!existent_login($login)) {
        mysqli_begin_transaction($GLOBALS['connection']);
        // SQL INJECTION PROTECTION VIA SUBSTITUTION OF DATA THROUGH THE STATEMENT
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $statement = $GLOBALS['connection']->prepare("INSERT INTO user (login, password) VALUES (?, ?)");
        $statement->bind_param("ss", $login, $hashed_password);
        $statement->execute();

        $statement2 = $GLOBALS['connection']->prepare("INSERT INTO pet (nickname) VALUES (?)");
        $statement2->bind_param("s", $login);
        $statement2->execute();

        if ($statement->affected_rows == 1 && $statement2->affected_rows == 1) {
            mysqli_commit($GLOBALS['connection']);
            $_SESSION["login"] = $login;
            header('location: ..\\signed_user\\profile_s.php');
        } else {
            mysqli_rollback($GLOBALS['connection']);
            alert('Ошибка регистрации');
        }
        $statement->close();
    } else {
        alert('Введенный логин занят');
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
                        <input type="text" name="login" maxlength="30">
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