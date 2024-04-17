<?php
require_once __DIR__ . '\\session.php';
require_once __DIR__ . '\\..\\functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']) && $_POST['submit'] == true) {
    switch ($_POST['submit']) {
        case 'Добавить черту':
            add_appearance_feature($_POST['special_appearance_feature']);
            break;
        case 'Добавить особенность':
            add_behavior_pattern($_POST['behavior_pattern']);
            break;
        default:
            break;
    }
    header('location: profile_features_s.php?state=new');
    exit;
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
        <div id="caption_after_main_header">/Профиль/Особенности
            <a href="../log_out.php" role="button">Выйти</a>
        </div>

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
            <form type="features" action="" method="post">
                <input type=text name="special_appearance_feature" maxlength="30">
                <input type=submit name=submit value="Добавить черту">
                <ul>
                    <?php
                    while ($feature = $GLOBALS['appearance_features']->fetch_row()) {
                        echo "<li>" . $feature[0] . "</li>";
                    }
                    ?>
                </ul>
            </form>
            <br>
            Особенности поведения
            <form type="features" action="" method="post">
                <input type=text name="behavior_pattern" maxlength="70">
                <input type=submit name=submit value="Добавить особенность">
                <ul>
                    <?php
                    while ($behavior_pattern = $GLOBALS['behavior_patterns']->fetch_row()) {
                        echo "<li>" . $behavior_pattern[0] . "</li>";
                    }
                    ?>
                </ul>
            </form>
        </div>

    </div>
</body>

</html>