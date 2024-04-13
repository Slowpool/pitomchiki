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

function get_all_lengths() {
    return get_all_categories('length');
}

function get_all_weights() {
    return get_all_categories('weight');
}

function get_all_statuses() {
    return get_all_categories('status');
}

function get_all_categories($table) {
    return $GLOBALS['connection']->query("SELECT category FROM $table");
}

function update_pet_info($name, $kind, $year_of_birth, $month_of_birth, $day_of_birth, $length_id, $weight_id, $status_id) {
    $statement = $GLOBALS['connection']->prepare(
        'UPDATE pet
         SET name = ?,
         kind = ?,
         year_of_birth = ?,
         month_of_birth = ?,
         day_of_birth = ?,
         length_id = ?,
         weight_id = ?,
         status_id = ?
         WHERE nickname = ?');
    $statement->bind_param('ssiiiiiis', $name, $kind, $year_of_birth, $month_of_birth, $day_of_birth, $length_id, $weight_id, $status_id, $_SESSION['login']);
    $statement->execute();
    $affected_rows = $statement->affected_rows;
    $statement->close();
    return $affected_rows == 1;
}