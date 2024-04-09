<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "pitomchiki";

$GLOBALS['connection'] = mysqli_connect($hostname, $username, $password, $dbname);

if ($connection) {
    // echo "Successfull connection";
} else {
    // echo "Connection failed";
    die("Connection failed" . mysqli_connect_error());
}

$login = $_POST['login'];
$password = $_POST['password'];

echo 'login: ', $_POST['login'];
echo "<br>";
echo 'password: ', $_POST['password'];
echo "<br>";

if (is_correct_credential($login, $password)) {
    echo 'correct credential';
}
else {
    echo 'incorrect credential';
}
echo "<br>";


// Закрытие соединения с базой данных
// $stmt->close();
$connection->close();


function is_correct_credential($login, $password) {
    if (non_existent_login($login)) {
        return false;
    }
    else {
        return password_verify($password, get_hashed_password($login));
    }
}

function non_existent_login($login) {
    // TODO SQL INJECTION PROTECTION MUST BE RIGHT HERE
    return $GLOBALS['connection']->query("SELECT 1
    FROM user
    WHERE login = '$login'")->num_rows;
}

// TODO finish it dude
function get_hashed_password($login) {
    // TODO SQL INJECTION PROTECTION MUST BE RIGHT HERE
    $result_set = $GLOBALS['connection']->query("SELECT password
                    FROM user
                    WHERE login = '$login'
                    && password = '$hashed_password'"); 
    return $result_set->num_rows;
}

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


