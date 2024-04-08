<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "pitomchiki";

$connection = mysqli_connect($hostname, $username, $password, $dbname);
if (!$connection) {
    die("Connection failed!" . mysqli_connect_error());
} else {
    echo "Successfull connection! <br>";
}

$login = $_POST['login'];
$password = $_POST['password'];

$loginHash = password_hash($password, PASSWORD_BCRYPT);

// Подготовленный запрос для вставки данных
$stmt = $mysqli->prepare("INSERT INTO Users (userID, userlogin, userpassword) VALUES (?, ?, ?)");
$stmt->bind_param("iss", $userID, $login, $password);
$stmt->execute();

// Проверка успешности выполнения запроса
if ($stmt->affected_rows > 0) {
    echo "Данные успешно добавлены в таблицу Users.";
} else {
    echo "Произошла ошибка при добавлении данных.";
}

// Закрытие соединения с базой данных
$stmt->close();
$mysqli->close();
?>