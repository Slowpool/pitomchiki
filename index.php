<?php
require_once __DIR__ . '\\functions.php';
require_once __DIR__ . '\\unsigned_user\\session_us.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pet_nickname = $_POST['pet_nickname'];
    if (existent_login($pet_nickname)) {
        $_SESSION['pet_nickname'] = $pet_nickname;
        header('location: unsigned_user\\profile_us.php');
    } else {
        alert('профиль питомчика с таким ником не найден :(');
        header('location: index.php');
    }
    exit;
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <title>Главная</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles.css">
    <meta name="description"
        content="Данный сайт поможет запечатлить вашего питомца во всей его красе и показать миру. Здесь питомцы уменьшительно-ласкательно называются как питомчики.">
    <meta name="keywords"
        content="питомчики, животные, звери, домашние, любимцы, домовые, питомцы, память, нежничи, братья, меньшие, коты, собаки, котята, щенки, хомячки, хомяк, крыса, крысы, кошки, собака, пес,">
</head>

<body background="images/background_animals.png" link="white" alink="grey" vlink="white">
    <div id="header_block">
        <div id="unreg_main_header">
            питомчики

            <!-- <a href="index.html"> -->
            <!-- </a> -->
        </div>
        <div id="unreg_caption_after_main_header">/Главная</div>
        <form action="" method="post">
            <table type="header_block" cellspacing="0">
                <tr>
                    <td rowspan="2">
                        <div>
                            <input type=text name="pet_nickname" placeholder="Поиск питомчика">
                        </div>
                    </td>
                    <td rowspan="2">
                        <button type="q_button">
                            <img type="q_image" src="images/paw.png">
                        </button>
                    </td>
                    <td>
                        <div id="caption">
                            <a href="unsigned_user/registration.php">Зарегистрироваться</a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div id="caption" style="padding-top: 10px;">
                            <a href="unsigned_user/sign_in.php">Войти в профиль</a>
                        </div>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <div id="content_block">

    </div>
</body>

</html>