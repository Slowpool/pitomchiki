<?php
require_once __DIR__ . '\\config.php';

function is_correct_credential($login, $password)
{
    return existent_login($login) && password_verify($password, get_hashed_password($login));
}

function existent_login($login)
{
    return count(select_row($login)) == 1;
}

function get_hashed_password($login)
{
    return select_row($login)[0];
}

function select_row($login)
{
    // SQL INJECTION PROTECTION VIA SUBSTITUTION OF DATA THROUGH THE STATEMENT
    $statement = $GLOBALS['connection']->prepare("SELECT password
                                                  FROM user
                                                  WHERE login = (?)");
    $statement->bind_param('s', $login);
    $statement->execute();
    $result_set = $statement->get_result();
    return (array)$result_set->fetch_row();
}
