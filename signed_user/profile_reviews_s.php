<?php
require_once __DIR__ . '\\session.php';
require_once __DIR__ . '\\..\\functions.php';

$GLOBALS['reviews'] = $reviews = get_all_review($_SESSION['login']);
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <title>Отзывы о питомчике</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../styles.css">
</head>

<body background="../images/home_sweet_home.jpg" link="white" alink="grey" vlink="white">
    <script src="../scripts.js"></script>
    <div id="wide_page">
        <div id="main_header">питомчики</div>
        <div id="caption_after_main_header">/Профиль/Отзывы</div>
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
            <div id="center">Отзывы о питомчике</div>
        </div>
        <div id="reviews_block">
            <?php
            foreach($GLOBALS['reviews'] as $review) {

                echo $review[3];
                echo '&#183;';
                echo '<div id="review_date">';
                echo $review[2];
                echo '&#183;';
                if ($review[5] == null) {
                    // buttons:
                    // Confirm / Refute 
                }
                else {
                    echo $review[5] ? 'Подтвержденный' : 'Опровергнутый';
                }
                echo '</div>';
                echo '<br>';
                echo $review[4];
                echo '<br>';
                echo '<br>';
        }
            ?>

        </div>

    </div>
</body>

</html>