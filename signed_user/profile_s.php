<?php
require_once __DIR__ . '\\session.php';
require_once __DIR__ . '\\..\\functions.php';

// TODO maybe it'll be better to select it to special function like download_pet_info()
$GLOBALS['pet_data'] = get_pet_data($_SESSION['login']);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $name = $_POST['name'];
    $kind = $_POST['kind'];
    $year_of_birth = $_POST['year_of_birth'];
    $month_of_birth = $_POST['month_of_birth'];
    $day_of_birth = $_POST['day_of_birth'];
    // $main_picture = $_POST['main_picture'];
    $length_id = $_POST['length_id'];
    $weight_id = $_POST['weight_id'];
    $status_id = $_POST['status_id'];


}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <title>Профиль питомчика</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../styles.css">
</head>

<body background="../images/home_sweet_home.jpg" link="white" alink="grey" vlink="white">
    <script src="../scripts.js"></script>
    <div id="wide_page">
        <div id="main_header">питомчики</div>
        <div id="caption_after_main_header">/Профиль
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
            <div id="center">
                Профиль питомчика
            </div>
        </div>
        <form action="" method="post">
            <table type="whole_profile" border="1">
                <tr>
                    <td type="left_profile_part">
                        <table cellspacing="20">
                            <tr>
                                <td type="align_center">
                                    <div id="caption">Фото питомчика</div>
                                </td>
                            </tr>
                            <tr>
                                <td type="align_center">
                                    <img src="../images/shpatel.jpg" height="350" width="350">
                                </td>
                            </tr>
                            <tr>
                                <td type="align_center">
                                    <button type="width_expanded_button">Изменить фото</button>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td type="right_profile_part">
                        <table type="pitomchik_characters" cellspacing="20" border="1">
                            <tr>
                                <td type="align_right">
                                    <div id="caption">Кличка</div>
                                </td>
                                <td>
                                    <?php
                                    $name = $GLOBALS['pet_data'][1];
                                    echo '<input type="text" name="name" maxlength="50" value="' . $name . '">';
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td type="align_right">
                                    <div id="caption">Вид животного</div>
                                </td>
                                <td>
                                    <?php
                                    $kind = $GLOBALS['pet_data'][2];
                                    echo '<input type="text" name="kind" value="' . $kind . '">';
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td type="align_right">
                                    <div id="caption">Год рождения</div>
                                </td>
                                <td>
                                    <?php
                                    $year_of_birth = $GLOBALS['pet_data'][3];
                                    echo '<input type="number" name="year_of_birth" min="0" max="4000" value="' . $year_of_birth . '">';
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td type="align_right">
                                    <div id="caption">Месяц рождения</div>
                                </td>
                                <td>
                                    <?php
                                    $month_of_birth = $GLOBALS['pet_data'][4];
                                    echo '<input type="number" name="month_of_birth" min="1" max="12" value="' . $month_of_birth . '">';
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td type="align_right">
                                    <div id="caption">День рождения</div>
                                </td>
                                <td>
                                    <?php
                                    $day_of_birth = $GLOBALS['pet_data'][5];
                                    echo '<input type="number" name="day_of_birth" min="1" max="31" value="' . $day_of_birth . '">';
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td type="align_right">
                                    <div id="caption">Длина</div>
                                </td>
                                <td>
                                    <select>
                                        <?php
                                        // TODO implement via length of row instead of $index
                                        $lengths = get_all_lengths();
                                        $index = 1;
                                        do {
                                            $length = $lengths->fetch_row()[0];
                                            echo "<option value=\"$index\">$length</option>";
                                            $index++;
                                        }
                                        while ($length != null);
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td type="align_right">
                                    <div id="caption">Вес</div>
                                </td>
                                <td>
                                    <select>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td type="align_right">
                                    <div id="caption">Статус</div>
                                </td>
                                <td>
                                    <select>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <input name="submit" type="submit" value="Сохранить изменения"></input>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>