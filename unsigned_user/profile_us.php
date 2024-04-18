<?php
require_once __DIR__ . '\\session_us.php';
require_once __DIR__ . '\\..\\functions.php';

$GLOBALS['pet_data'] = get_pet_data($_SESSION['pet_nickname']);
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <title>Профиль питомчика</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../styles.css">
</head>

<body background="../images/background_animals_wide.png" link="white" alink="grey" vlink="white">
    <script src="../scripts.js"></script>
    <div id="wide_page">
        <div id="main_header">питомчики</div>
        <div id="caption_after_main_header">/Профиль
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
            <div id="center">
                Профиль питомчика
            </div>
        </div>
        <form action="" method="post">
            <table type="whole_profile">
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
                        </table>
                    </td>
                    <td type="right_profile_part">
                        <table type="pitomchik_characters" cellspacing="20">
                            <tr>
                                <td type="align_right">
                                    <div id="caption">Кличка</div>
                                </td>
                                <td>
                                    <?php
                                    echo '<input type="text" name="name" maxlength="50" value="' . $GLOBALS['pet_data'][1] . '" disabled="disabled">';
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
                                    echo '<input type="text" name="kind" value="' . $kind . '" disabled="disabled">';
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
                                    echo '<input type="number" name="year_of_birth" min="0" max="4000" value="' . $year_of_birth . '" disabled="disabled">';
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
                                    echo '<input type="number" name="month_of_birth" min="1" max="12" value="' . $month_of_birth . '" disabled="disabled">';
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
                                    echo '<input type="number" name="day_of_birth" min="1" max="31" value="' . $day_of_birth . '" disabled="disabled">';
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td type="align_right">
                                    <div id="caption">Длина</div>
                                </td>
                                <td>
                                    <select name="length_id" disabled="disabled">
                                        <?php
                                        $lengths = get_all_lengths();
                                        $length_id = $GLOBALS['pet_data'][7];
                                        $index = 1;
                                        while ($length_category = $lengths->fetch_row()[0]) {
                                            echo "<option value=\"$index\"" . ($index == $length_id ? " selected" : "") . ">$length_category</option disabled=\"disabled\">";
                                            $index++;
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td type="align_right">
                                    <div id="caption">Вес</div>
                                </td>
                                <td>
                                    <select name="weight_id" disabled="disabled">
                                        <?php
                                        // here could be some DRY mechanism but i'm too tired for such a small thing and no one will read it anyway
                                        $weights = get_all_weights();
                                        $weight_id = $GLOBALS['pet_data'][8];
                                        $index = 1;
                                        while ($weight_category = $weights->fetch_row()[0]) {
                                            echo "<option value=\"$index\"" . ($index == $weight_id ? " selected" : "") . ">$weight_category</option> disabled=\"disabled\"";
                                            $index++;
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td type="align_right">
                                    <div id="caption">Статус</div>
                                </td>
                                <td>
                                    <select name="status_id" disabled="disabled">
                                        <?php
                                        $statuses = get_all_statuses();
                                        $index = 1;
                                        $status_id = $GLOBALS['pet_data'][9];
                                        while ($status_category = $statuses->fetch_row()[0]) {
                                            echo "<option value=\"$index\"" . ($index == $status_id ? " selected" : "") . ">$status_category</option >";
                                            $index++;
                                        }
                                        ?>
                                    </select>
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