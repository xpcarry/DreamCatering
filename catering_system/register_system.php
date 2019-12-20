<?php
if (!isset($_SESSION)) session_start();

require_once "./dbData.php";

if (!isset($_POST['login']) || !isset($_POST['password']) || !isset($_POST['confirmPassword'])) {
    header("location: ../index.php");
    die;
}

$connection = getConnection();
$sql = 'SELECT * FROM klienci WHERE username="' . $_POST['login'] . '"';

$result = $connection->query($sql);

if ($result && $result->num_rows > 0) {
    $user = $result->fetch_assoc();

    $_SESSION['register_error'] = "Uzytkownik o takim loginie juz istnieje!";
    header("location: ../register.php");
    $connection->close();
    die;
}

if ($_POST['password'] !== $_POST['confirmPassword']){
    $_SESSION['register_error'] = "Hasla nie są takie same";
    header("location: ./register.php");
    $connection->close();
    die;
}
$username = $_POST['login'];
$password = sha1($_POST['password']);
$city = $_POST['miasto'];
$street = $_POST['ulica'];
$postalCode = $_POST['kod'];


$sql = 'INSERT INTO klienci (username, password, miasto, ulica, kod_pocztowy)
VALUES ("' . $username . '", "' . $password . '", "' . $city . '", "' . $street . '","' . $postalCode . '")';

$result = $connection -> query($sql);
if ($result){
    $_SESSION['register_success'] = "Konto zostało pomyślnie utworzone :)";
    header("location: ../register.php");
    $connection->close();
    die;
}
else{
    $_SESSION['register_error'] = "Ups, coś poszło nie tak :(((";
    header("location: ../register.php");
    $connection->close();
    die;
}
