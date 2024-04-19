<?php
require_once __DIR__ . '\\config.php';

function is_correct_credential($login, $password)
{
    return existent_login($login) && password_verify($password, get_hashed_password($login));
}

function existent_login($login)
{
    return count(get_password_as_row($login)) == 1;
}

function get_hashed_password($login)
{
    return get_password_as_row($login)[0];
}

function get_password_as_row($login)
{
    // SQL INJECTION PROTECTION VIA SUBSTITUTION OF DATA THROUGH THE STATEMENT
    $statement = $GLOBALS['connection']->prepare("SELECT password
                                                  FROM user
                                                  WHERE login = ?");
    $statement->bind_param('s', $login);
    $statement->execute();
    $result_set = $statement->get_result();
    $statement->close();
    return (array) $result_set->fetch_row();
}

function alert($message)
{
    echo '<script>', " alert('" . $message . "')", '</script>';
}

function get_pet_data($nickname)
{
    $statement = $GLOBALS['connection']->prepare("SELECT *
                                                  FROM pet
                                                  WHERE nickname = ?");
    $statement->bind_param('s', $nickname);
    $statement->execute();
    $result_set = $statement->get_result();
    $statement->close();
    return $result_set->fetch_row();
}

function get_all_lengths()
{
    return get_all_categories('length');
}

function get_all_weights()
{
    return get_all_categories('weight');
}

function get_all_statuses()
{
    return get_all_categories('status');
}

function get_all_categories($table)
{
    return $GLOBALS['connection']->query("SELECT category FROM $table");
}

function update_pet_info($new_pet_data)
{
    $statement = $GLOBALS['connection']->prepare(
        'UPDATE pet
         SET
         name = ?,
         kind = ?,
         year_of_birth = ?,
         month_of_birth = ?,
         day_of_birth = ?,
         length_id = ?,
         weight_id = ?,
         status_id = ?
         WHERE nickname = ?'
    );
    $statement->bind_param(
        'ssiiiiiis',
        $new_pet_data[0],
        $new_pet_data[1],
        $new_pet_data[2],
        $new_pet_data[3],
        $new_pet_data[4],
        $new_pet_data[5],
        $new_pet_data[6],
        $new_pet_data[7],
        $_SESSION['login']
    );
    $statement->execute();
    $affected_rows = $statement->affected_rows;
    $statement->close();
    return $affected_rows == 1;
}

function add_appearance_feature($appearance_feature)
{
    $statement = $GLOBALS['connection']->prepare("INSERT INTO special_appearance_features VALUES (?, ?)");
    $statement->bind_param('ss', $_SESSION['login'], $appearance_feature);
    $statement->execute();
    $affected_rows = $statement->affected_rows;
    $statement->close();
    return $affected_rows == 1;
}

function add_behavior_pattern($behavior_pattern)
{
    $statement = $GLOBALS['connection']->prepare("INSERT INTO behavior_patterns VALUES (?, ?)");
    $statement->bind_param('ss', $_SESSION['login'], $behavior_pattern);
    $statement->execute();
    $affected_rows = $statement->affected_rows;
    $statement->close();
    return $affected_rows == 1;
}

function get_appearance_features($pet_nickname)
{
    $statement = $GLOBALS['connection']->prepare("SELECT special_appearance_feature
                                                  FROM special_appearance_features
                                                  WHERE pet_nickname = ?");
    $statement->bind_param('s', $pet_nickname);
    $statement->execute();
    $result_set = $statement->get_result();
    $statement->close();
    return $result_set;
}

function get_behavior_patterns($pet_nickname)
{
    $statement = $GLOBALS['connection']->prepare("SELECT behavior_pattern
                                                  FROM behavior_patterns
                                                  WHERE pet_nickname = ?");
    $statement->bind_param('s', $pet_nickname);
    $statement->execute();
    $result_set = $statement->get_result();
    $statement->close();
    return $result_set;
}

function get_all_reviews($pet_nickname)
{
    $statement = $GLOBALS['connection']->prepare("SELECT *
                                                  FROM review
                                                  WHERE pet_nickname = ?
                                                  ORDER BY creation_date DESC");
    $statement->bind_param('s', $pet_nickname);
    $statement->execute();
    $result_set = $statement->get_result();
    $statement->close();
    return $result_set;
}

function mark_review($pet_nickname, $review_id, $confirmed)
{
    $statement = $GLOBALS['connection']->prepare('UPDATE review
                                                  SET verified = ?
                                                  WHERE pet_nickname = ? && id = ?'
    );
    $statement->bind_param('isi', $confirmed, $pet_nickname, $review_id);
    $statement->execute();
    $affected_rows = $statement->affected_rows;
    $statement->close();
    return $affected_rows == 1;
}

function insert_picture($pet_nickname, $image_content, $imagename)
{
    $statement = $GLOBALS['connection']->prepare("INSERT INTO other_pictures (pet_nickname, picture, name)
                                                  VALUES (?, ?, ?)");
    $statement->bind_param('sbs', $_SESSION['login'], $image_content, $imagename);
    $statement->execute();
    $affected_rows = $statement->affected_rows;
    $statement->close();
    return $affected_rows == 1;
}

function get_all_pictures($pet_nickname)
{
    $statement = $GLOBALS['connection']->prepare("SELECT *
                                                  FROM other_pictures
                                                  WHERE pet_nickname = ?
                                                  ORDER BY uploading_date DESC");
    $statement->bind_param('s', $pet_nickname);
    $statement->execute();
    $result_set = $statement->get_result();
    $statement->close();
    return $result_set;
}

function add_review($pet_nickname, $content, $author)
{
    $statement = $GLOBALS['connection']->prepare("INSERT INTO review (pet_nickname, author_name, content)
                                                  VALUES (?, ?, ?)");
    $statement->bind_param('sss', $pet_nickname, $author, $content);
    $statement->execute();
    $affected_rows = $statement->affected_rows;
    $statement->close();
    return $affected_rows == 1;
}