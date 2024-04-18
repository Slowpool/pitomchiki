<?php
require_once __DIR__ . '\\session_us.php';
require_once __DIR__ . '\\..\\functions.php';

$GLOBALS['appearance_features'] = get_appearance_features($_SESSION['pet_nickname']);
$GLOBALS['behavior_patterns'] = get_behavior_patterns($_SESSION['pet_nickname']);
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <title>Особенности питомчика</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../styles.css">
</head>

<body background="../images/background_animals_wide.png" link="white" alink="grey" vlink="white">
    <script src="../scripts.js"></script>
    <div id="wide_page">
        <div id="main_header">питомчики</div>
        <div id="caption_after_main_header">/Профиль @<?php echo $_SESSION['pet_nickname'];?>/Особенности
            <a href="../log_out.php" role="button">На главную</a>
        </div>

        <table type="chapters" cellspacing="0">
            <tr>
                <td>
                    <button type="chapter_selector" onClick="openProfile(false)">Профиль</button>
                </td>
                <td>
                    <button type="chapter_selector" onClick="openProfilePhotos(false)">Фотографии</button>
                </td>
                <td>
                    <button type="chapter_selector" onClick="openProfileFeatures(false)">Особенности</button>
                </td>
                <td>
                    <button type="chapter_selector" onClick="openProfileReviews(false)">Отзывы</button>
                </td>
            </tr>
        </table>
        <div id="more_big_caption">
            <div id="center">Особенности питомчика</div>
        </div>
        <div id="appearance_features_caption">
            Особенности внешнего вида
            <ul>
                <?php
                while ($feature = $GLOBALS['appearance_features']->fetch_row()) {
                    echo "<li>" . $feature[0] . "</li>";
                }
                ?>
            </ul>
            <br>
            Особенности поведения
            <form type="features" action="" method="post">
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