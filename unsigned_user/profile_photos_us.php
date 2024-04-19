<?php
require_once __DIR__ . '\\session_us.php';
require_once __DIR__ . '\\..\\functions.php';
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <title>Фотографии питомчика</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../styles.css">
</head>

<body background="../images/background_animals_wide.png" link="white" alink="grey" vlink="white">
    <script src="../scripts.js"></script>
    <div id="wide_page">
        <div id="main_header">питомчики</div>
        <div id="caption_after_main_header">/Профиль @<?php echo $_SESSION['pet_nickname']; ?>/Фотографии
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
        <div id="photos_block">
            <div id="more_big_caption">
                <div id="center">Фотографии питомчика</div>
            </div>
            <?php
            echo "<img type=\"photo\" src=../images/" . $_SESSION['pet_nickname'] . ".jpg width=300 height=300>";
            echo "<img type=\"photo\" src=../images/" . $_SESSION['pet_nickname'] . "2.jpg width=300 height=300>";
            echo "<img type=\"photo\" src=../images/" . $_SESSION['pet_nickname'] . "3.jpg width=300 height=300>";
            echo "<img type=\"photo\" src=../images/" . $_SESSION['pet_nickname'] . "4.jpg width=300 height=300>";
            ?>
        </div>
    </div>
</body>

</html>