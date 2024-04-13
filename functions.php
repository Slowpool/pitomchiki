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
    return $GLOBALS['connection']->query('SELECT category FROM length');
}