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
        <div id="caption_after_main_header">/Профиль @<?php echo $_SESSION['pet_nickname'];?>
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
                                <img src=<?php echo "../images/" . $_SESSION['pet_nickname'] . "2.jpg"?> height="350" width="350">
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
                                <div id="profile_data_us">
                                    <?php
                                    echo $GLOBALS['pet_data'][1];
                                    ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td type="align_right">
                                <div id="caption">Вид животного</div>
                            </td>
                            <td>
                                <div id="profile_data_us">
                                    <?php
                                    echo $GLOBALS['pet_data'][2];
                                    ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td type="align_right">
                                <div id="caption">Год рождения</div>
                            </td>
                            <td>
                                <div id="profile_data_us">
                                    <?php
                                    echo $GLOBALS['pet_data'][3];
                                    ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td type="align_right">
                                <div id="caption">Месяц рождения</div>
                            </td>
                            <td>
                                <div id="profile_data_us">
                                    <?php
                                    echo $GLOBALS['pet_data'][4];
                                    ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td type="align_right">
                                <div id="caption">День рождения</div>
                            </td>
                            <td>
                                <div id="profile_data_us">
                                    <?php
                                    echo $GLOBALS['pet_data'][5];
                                    ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td type="align_right">
                                <div id="caption">Длина</div>
                            </td>
                            <td>
                                <div id="profile_data_us">
                                    <?php
                                    $lengths = get_all_lengths();
                                    $length_id = $GLOBALS['pet_data'][7];
                                    $index = 1;
                                    while ($length_category = $lengths->fetch_row()) {
                                        $length_category = $length_category[0];
                                        echo $length_id == $index ? $length_category : "";
                                        $index++;
                                    }
                                    ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td type="align_right">
                                <div id="caption">Вес</div>
                            </td>
                            <td>
                                <div id="profile_data_us">
                                    <?php
                                    $weights = get_all_weights();
                                    $weight_id = $GLOBALS['pet_data'][8];
                                    $index = 1;
                                    while ($weight_category = $weights->fetch_row()) {
                                        $weight_category = $weight_category[0];
                                        echo $weight_id == $index ? $weight_category : "";
                                        $index++;
                                    }
                                    ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td type="align_right">
                                <div id="caption">Статус</div>
                            </td>
                            <td>
                                <div id="profile_data_us">
                                    <?php
                                    $statuses = get_all_statuses();
                                    $status_id = $GLOBALS['pet_data'][9];
                                    $index = 1;
                                    while ($status_category = $statuses->fetch_row()) {
                                        $status_category = $status_category[0];
                                        echo $status_id == $index ? $status_category : "";
                                        $index++;
                                    }
                                    ?>
                                </div>
                            </td>
                        </tr>

                    </table>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>