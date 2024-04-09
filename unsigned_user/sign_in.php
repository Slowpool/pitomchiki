<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "pitomchiki";

$connection = mysqli_connect($hostname, $username, $password, $dbname);
if ($connection) {
    // echo "Successfull connection";
} else {
    // echo "Connection failed";
    die("Connection failed" . mysqli_connect_error());
}

$login = $_POST['login'];
$password = $_POST['password'];

$result_set = $connection->query("SELECT login
                    FROM user
                    WHERE login = '$login'"); // TODO SQL INJECTION PROTECTION MUST BE RIGHT HERE

echo 'num_rows: ', (int)$result_set->num_rows;
echo "<br>";

if ($result_set->num_rows) {
    echo 'successful sign in';
}
else {
    echo 'sign in failed: wrong login';
}
echo "<br>";

echo 'login: ', $_POST['login'];
echo "<br>";
echo 'password: ', $_POST['password'];
echo "<br>";

// $login = $_POST['login'];
// $password = $_POST['password'];

// $loginHash = password_hash($password, PASSWORD_BCRYPT);
// password_hash();
// // Подготовленный запрос для вставки данных
// $stmt = $mysqli->prepare("INSERT INTO user (userlogin, userpassword) VALUES (?, ?, ?)");
// $stmt->bind_param("iss", $userID, $login, $password);
// $stmt->execute();

// // Проверка успешности выполнения запроса
// if ($stmt->affected_rows > 0) {
//     echo "Данные успешно добавлены в таблицу Users.";
// } else {
//     echo "Произошла ошибка при добавлении данных.";
// }

// // Закрытие соединения с базой данных
// $stmt->close();
// $mysqli->close();
