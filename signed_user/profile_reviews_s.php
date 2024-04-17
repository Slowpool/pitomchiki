<?php
require_once __DIR__ . '\\session.php';
require_once __DIR__ . '\\..\\functions.php';

$GLOBALS['reviews'] = $reviews = get_all_reviews($_SESSION['login']);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']) && $_POST['submit'] == true) {
    alert('submit got');
    $review_id = $_POST['review_id'];
    switch ($_POST['submit']) {
        case 'Подтвердить':
            $confirmed = true;
            break;
        case 'Опровергнуть':
            $confirmed = false;
            break;
        default:
            alert('unknown value: ' . $_POST['submit']);
            exit;
    }
    mark_review($_SESSION['login'], $review_id, $confirmed);
    header('location: profile_reviews_s.php?state=new');
    exit;
}
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
        <div id="caption_after_main_header">/Профиль/Отзывы
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
            <div id="center">Отзывы о питомчике</div>
        </div>
        <div id="reviews_block">
            <?php
            while (($review = $GLOBALS['reviews']->fetch_row()) != null) {
                echo $review[2]; # author name
                echo '&#183;'; # .
                echo '<div id="review_date">';
                echo $review[5]; # creation_date
                echo '&#183;'; # .
                if (is_null($review[4])) {
                    echo '<form action="" method="post" style="display:inline">';
                    echo '<input id="review_verification_button" name=submit type=submit value="Подтвердить">';
                    echo '<input type="hidden" value="' . $review[0] . '" name="review_id" />';
                    echo '<input id="review_verification_button" name=submit type=submit value="Опровергнуть">';
                    echo '</form>';
                } else {
                    echo $review[4] ? 'Подтвержденный' : 'Опровергнутый';
                }
                echo '<br>';
                echo '</div>';
                echo $review[3];
                echo '<br>';
                echo '<br>';
            }
            ?>
        </div>
    </div>
</body>

</html>