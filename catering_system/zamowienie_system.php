<?php
if (!isset($_SESSION)) session_start();

if(!isset($_SESSION['user_id'])){
    $_SESSION['login_error'] = "Musisz byc zalogowany, żeby złożyć zamówienie!";
    header('location: ../login.php');
    die;
}

require_once "./dbData.php";
$dateNow = date("d-m-Y h:i");

if (
    !isset($_POST['miasto']) || !isset($_POST['ulica']) || !isset($_POST['kod']) || !isset($_POST['cenaTotal']) || !isset($_POST['potrawyIds']) ||
    !isset($_POST['data'])
) {
    $_SESSION["order_error"] = "Wszystkie pola są wymagane";
    header("location: ../zamowienie.php");
    die;
}
if ((strtotime($_POST['data']) - 3600 < strtotime($dateNow))) {
    $_SESSION["order_error"] = "Przy zamówieniu należy uwzględnić to aby nie była starsza od czasu składania zamówienia + 1h";
    header("location: ../zamowienie.php");
    die;
}
$potrawy = $_POST['potrawyIds'];
$miasto = $_POST['miasto'];
$ulica = $_POST['ulica'];
$kod = $_POST['kod'];
$cena = $_POST['cenaTotal'];
$termin_dostawy = $_POST['data'];
$id_klienta = $_SESSION['user_id'];

$connection = getConnection();
$query = " INSERT INTO zamowienia ( potrawy, id_klienta, termin_dostawy, miasto, ulica, kod, cena)  
VALUES ( '$potrawy', '$id_klienta', '$termin_dostawy', '$miasto', '$ulica', '$kod', '$cena' ) ";
$connection->query($query);

$queryKoszyk = "DELETE FROM koszyk WHERE id_uzytkownika = ". $_SESSION['user_id'];
$connection->query($queryKoszyk);


$_SESSION["order_success"] = "Zamówienie zostało wysłane! :)";

header("location: ../index.php");

// $result = $connection->query($sql);

// if ($result && $result->num_rows > 0) {
//     $user = $result->fetch_assoc();

//     $_SESSION['register_error'] = "Uzytkownik o takim loginie juz istnieje!";
//     header("location: ../register.php");
//     $connection->close();
//     die;
// }

// if ($_POST['password'] !== $_POST['confirmPassword']){
//     $_SESSION['register_error'] = "Hasla nie są takie same";
//     header("location: ./register.php");
//     $connection->close();
//     die;
// }
// $username = $_POST['login'];
// $password = sha1($_POST['password']);
// $city = $_POST['miasto'];
// $street = $_POST['ulica'];
// $postalCode = $_POST['kod'];


// $sql = 'INSERT INTO klienci (username, password, miasto, ulica, kod_pocztowy)
// VALUES ("' . $username . '", "' . $password . '", "' . $city . '", "' . $street . '","' . $postalCode . '")';

// $result = $connection -> query($sql);
// if ($result){
//     $_SESSION['register_success'] = "Konto zostało pomyślnie utworzone :)";
//     header("location: ../register.php");
//     $connection->close();
//     die;
// }
// else{
//     $_SESSION['register_error'] = "Ups, coś poszło nie tak :(((";
//     header("location: ../register.php");
//     $connection->close();
//     die;
// }
