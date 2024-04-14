<?php
require_once __DIR__ . '\\session.php';
require_once __DIR__ . '\\..\\functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    if ($_POST['action'] == 'Добавить черту') {
        $special_appearance_feature = $_POST['special_appearance_feature'];
        add_appearance_feature($special_appearance_feature);
    } else {
        $behavior_pattern = $_POST['behavior_pattern'];
        add_behavior_pattern($behavior_pattern);
    }
}

$GLOBALS['appearance_features'] = get_appearance_features($_SESSION['login']);
$GLOBALS['behavior_patterns'] = get_behavior_patterns($_SESSION['login']);
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <title>Особенности питомчика</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../styles.css">
</head>

<body background="../images/home_sweet_home.jpg" link="white" alink="grey" vlink="white">
    <script src="../scripts.js"></script>
    <div id="wide_page">
        <div id="main_header">питомчики</div>
        <div id="caption_after_main_header">/Профиль/Особенности</div>
        <table type="chapters" cellspacing="0">
            <tr>
                <td>
                    <button type="chapter_selector" onClick="openProfile(true)">Профиль</button>
                </td>
                <td>
                    <button type="chapter_selector" onClick="openProfilePhotos(true)">Фотографии</button>
                </td>
                <td>
                    <button type="chapter_selector" onClick="openProfileFeatures(true)">Особенности</button>
                </td>
                <td>
                    <button type="chapter_selector" onClick="openProfileReviews(true)">Отзывы</button>
                </td>
            </tr>
        </table>
        <div id="more_big_caption">
            <div id="center">Особенности питомчика</div>
        </div>
        <div id="appearance_features_caption">
            Особенности внешнего вида
            <br>
            <br>
            <form action="" method="post">
                <input type=text name="special_appearance_feature" maxlength="30">
                <input type=submit name=action value="Добавить черту">
                <ul>
                    <?php
                    echo '<li>haha<li>'
                        ?>
                </ul>
            </form>

            Особенности поведения
            <br>
            <br>
            <form action="" method="post">
                <input type=text name="behavior_pattern" maxlength="70">
                <input type=submit value="Добавить особенность">
                <ul>
                    <?php
                    echo '<li>haha<li>'
                        ?>
                </ul>
            </form>
        </div>

    </div>
</body>

</html>