<?php

require_once __DIR__ . '\\functions.php';
require_once __DIR__ . '\\config.php';

$login = $_POST['login'];
$password = $_POST['password'];

echo 'login: ', $_POST['login'];
echo "<br>";
echo 'password: ', $_POST['password'];
echo "<br>";

if (!existent_login($login)) {
    // SQL INJECTION PROTECTION VIA SUBSTITUTION OF DATA THROUGH THE STATEMENT
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    $statement = $GLOBALS['connection']->prepare("INSERT INTO user (login, password) VALUES (?, ?)");
    $statement->bind_param("ss", $login, $hashed_password);
    $statement->execute();

    if ($statement->affected_rows == 1) {
        echo "successfull adding";
    } else {
        echo "failed adding";
    }
} else {
    echo 'such a login already exists';
}
echo "<br>";


// $stmt->close();
$GLOBALS['connection']->close();
