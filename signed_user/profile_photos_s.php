<?php
require_once __DIR__ . '\\session.php';
require_once __DIR__ . '\\..\\functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $imagename = $_FILES["uploaded_image"]["name"];
    $image_content = file_get_contents($_FILES['uploaded_image']['tmp_name']);
    insert_picture($_SESSION['login'], $image_content, $imagename);
    header('location: profile_photos_s.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <title>Фотографии питомчика</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../styles.css">
</head>

<body background="../images/home_sweet_home.jpg" link="white" alink="grey" vlink="white">
    <script src="../scripts.js"></script>
    <div id="wide_page">
        <div id="main_header">питомчики</div>
        <div id="caption_after_main_header">/Профиль/Фотографии
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
        <div id="photos_block">
            <table>
                <tr>
                    <td width="340">
                        <form method="POST" action="" enctype="multipart/form-data">
                            <input type="file" name="uploaded_image">
                            <input type="submit" name="input_submit" style="margin-bottom: 0px;" value="Загрузить">
                        </form>
                    </td>
                    <td width="400">
                        <div id="more_big_caption">
                            <div id="center">Фотографии питомчика</div>
                        </div>
                    </td>
                </tr>
            </table>
            <?php
            echo "<img type=\"photo\" src=../images/" . $_SESSION['login'] . ".jpg width=300 height=300>";
            echo "<img type=\"photo\" src=../images/" . $_SESSION['login'] . "2.jpg width=300 height=300>";
            echo "<img type=\"photo\" src=../images/" . $_SESSION['login'] . "3.jpg width=300 height=300>";
            echo "<img type=\"photo\" src=../images/" . $_SESSION['login'] . "4.jpg width=300 height=300>";
            ?>
        </div>
    </div>
</body>

</html>