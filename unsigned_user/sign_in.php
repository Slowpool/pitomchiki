<?php

require_once __DIR__ . '\\..\\functions.php';
require_once __DIR__ . '\\..\\config.php';

$login = $_POST['login'];
$password = $_POST['password'];

echo 'login: ', $_POST['login'];
echo "<br>";
echo 'password: ', $_POST['password'];
echo "<br>";

if (is_correct_credential($login, $password)) {
    echo 'correct credential';
} else {
    echo 'incorrect credential';
}
echo "<br>";


// $statement->close();
$connection->close();
