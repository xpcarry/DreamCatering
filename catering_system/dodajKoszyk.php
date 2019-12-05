<?php
if (!isset($_SESSION)) session_start();

//echo $_GET ['id_prod'];
require_once "./dbData.php";

if(!isset($_SESSION['user_id'])){
    $_SESSION['login_error'] = "Musisz byc zalogowany, aby dodać potrawę do koszyka!";
    header('location: ../login.php');
    die;
}

$connection = getConnection();

$sql = 'SELECT * FROM potrawy WHERE id="' . $_GET['id_prod'] . '"';
$result = $connection->query($sql);

if ($result && $result->num_rows > 0) {
    $prod = $result->fetch_assoc();
}
else{   
    header("location: ../index.php");
    die;
}

$sql = 'INSERT INTO koszyk (id_potrawy, id_uzytkownika)
VALUES ("' . $prod['id'] . '", "' . $_SESSION['user_id'] .'")';
$result = $connection->query($sql);

if ($result) {
    
}


if ($prod['kategoria'] === 'dania_glowne'){
    header('location: ../dGlowne.php');
    $connection->close();
    die;

}
else {
    header('location: ../przystawki.php');
    $connection->close();
    die;
}




