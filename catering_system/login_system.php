<?php
if (!isset($_SESSION)) session_start();

require_once "./dbData.php";

if (!isset($_POST['login']) || !isset($_POST['password'])) {
    header("location: ../index.php");
    die;
}

$connection = getConnection();

$sql = 'SELECT * FROM klienci WHERE username="' . $_POST['login'] . '" AND password="' . sha1($_POST['password']) . '"';

$result = $connection->query($sql);

if ($result && $result->num_rows === 1) {
    $user = $result->fetch_assoc();
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];

    header("location: ../index.php");
    $connection->close();
    die;
} else {
    $_SESSION['login_error'] = "Złe dane logowania";
    header("location: ../login.php");
    $connection->close();
    die;
}












































































