<?php
require_once __DIR__ . '\\session.php';
require_once __DIR__ . '\\..\\functions.php';

// TODO maybe it'll be better to select it to special function like download_pet_info()
$GLOBALS['pet_data'] = get_pet_data($_SESSION['login']);

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
                        <tr>
                            <td type="align_center">
                                <button type="width_expanded_button">Изменить фото</button>
                            </td>
                        </tr>
                    </table>
                </td>
                <td>
                    <table type="pitomchik_characters" cellspacing="20">
                        <tr>
                            <td type="align_right">
                                <div id="caption">Кличка</div>
                            </td>
                            <td>
                                <?php
                                $pet_name = $GLOBALS['pet_data']['name'];
                                echo '<input type="usual_input" value="' . $pet_name . '">';
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td type="align_right">
                                <div id="caption">Вид животного</div>
                            </td>
                            <td>
                                <input type="usual_input">
                            </td>
                        </tr>
                        <tr>
                            <td type="align_right">
                                <div id="caption">Год рождения</div>
                            </td>
                            <td>
                                <input type="usual_input">
                            </td>
                        </tr>
                        <tr>
                            <td type="align_right">
                                <div id="caption">Месяц рождения</div>
                            </td>
                            <td>
                                <input type="usual_input">
                            </td>
                        </tr>
                        <tr>
                            <td type="align_right">
                                <div id="caption">День рождения</div>
                            </td>
                            <td>
                                <input type="usual_input">
                            </td>
                        </tr>
                        <tr>
                            <td type="align_right">
                                <div id="caption">Длина</div>
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
                            <td>
                                <button type="width_expanded_button" onClick="saveChanges()">Сохранить
                                    изменения</button>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>