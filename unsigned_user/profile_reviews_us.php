<?php
require_once __DIR__ . '\\session_us.php';
require_once __DIR__ . '\\..\\functions.php';

$GLOBALS['reviews'] = $reviews = get_all_reviews($_SESSION['pet_nickname']);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']) && $_POST['submit'] == true) {
    $content = $_POST['review'];
    $author = $_POST['author'];

    add_review($_SESSION['pet_nickname'], $content, $author);
    header('location: profile_reviews_us.php?state=new');
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

<body background="../images/background_animals_wide.png" link="white" alink="grey" vlink="white">
    <script src="../scripts.js"></script>
    <div id="wide_page">
        <div id="main_header">питомчики</div>
        <div id="caption_after_main_header">/Профиль @<?php echo $_SESSION['pet_nickname']; ?>/Отзывы
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
            <div id="center">Отзывы о питомчике</div>
        </div>
        <div id="reviews_block">
            <form action="" method="post">
                <input id="leave_review" name="review" type=text placeholder="Отзыв">
                <input id="leave_review" name="author" type=text placeholder="Имя">
                <input id="leave_review" name=submit type=submit value="Оставить">
            </form>
            <?php
            while (($review = $GLOBALS['reviews']->fetch_row()) != null) {
                echo $review[2]; # author name
                echo '&#183;'; # .
                echo '<div id="review_date">';
                echo $review[5]; # creation_date
                echo '&#183;'; # .
                if (is_null($review[4])) {
                    echo 'Неверифицированный';
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