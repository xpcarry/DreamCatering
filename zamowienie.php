<?php
if (!isset($_SESSION)) session_start();

if (!isset($_SESSION['user_id'])) {
    $_SESSION['login_error'] = "Musisz byc zalogowany, żeby wyświetlić zamówienie!";
    header('location: ./login.php');
    die;
}

require_once("./catering_system/dbData.php");
$conn = getConnection();

$sql = 'SELECT * FROM potrawy RIGHT JOIN koszyk ON potrawy.id = koszyk.id_potrawy WHERE koszyk.id_uzytkownika =' . $_SESSION['user_id'];
$result_potrawy = $conn->query($sql);

$sql = 'SELECT * FROM klienci WHERE id =' . $_SESSION['user_id'];
$result_user = $conn->query($sql);

$conn->close();
$user_data = $result_user->fetch_assoc();

?>

<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dream Catering</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <link rel="stylesheet" href="site.css" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">


</head>

<body>

    <div class="container">

        <?php
        require_once("./partial/header.php");

        ?>

        <div class="content">
            <div>
                <span class="bigtitle">Zamówienie</span>
            </div>
            <div style=" width: calc(50% - 1px); float: left; border-right: 1px solid black; padding: 5px; box-sizing: border-box;">

                <div class="" style="text-align:left;">
                    <h3>Dane dostawy:</h3>
                    <label>Miasto </label>
                    <input type="text" name="miasto" style="width: 95%" value="<?= $user_data["Miasto"] ?>"> </br>
                    <label>Ulica </label>
                    <input type="text" name="ulica" style="width: 95%" value="<?= $user_data["Ulica"] ?>"> </br>
                    <label>Kod pocztowy: </label>
                    <input type="text" name="kod" style="width: 95%" value="<?= $user_data["kod_pocztowy"] ?>"> </br> </br>

                    <div>
                        <?php
                        if (isset($_SESSION['register_error'])) {
                            echo $_SESSION['register_error'];
                            unset($_SESSION['register_error']);
                        }

                        ?>
                    </div>
                    <div>
                        <?php
                        if (isset($_SESSION['register_success'])) {
                            echo $_SESSION['register_success'];
                            unset($_SESSION['register_success']);
                        }
                        ?>
                    </div>
                </div>


            </div>

            <div style="width: calc(50% - 1px); float: left; border-left: 1px solid black; transform: translate(-1px); padding: 10px; box-sizing: border-box; ">
                <?php
                $cenaTotal = 0;
                if ($result_potrawy && $result_potrawy->num_rows > 0) : ?>
                    <?php while ($row = $result_potrawy->fetch_assoc()) : ?>
                        <?php $cenaTotal += $row['cena'] ?>
                        <div class="">
                            <div class="">
                                <h4 style="display:inline; padding:20px;"><?= $row["nazwa"] ?></h4>
                                Cena: <span style="color: red;"><b><?= $row["cena"] ?>,00 PLN</b></span>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <p>Cena całkowita zamówienia: <span style="color: red;"><b> <?= $cenaTotal ?>,00 PLN </b> </span></p>
                <?php else : ?>
                    <?php
                        header('location: ./index.php');
                        die; ?>
                <?php endif; ?>
            </div>

        </div>



        <?php
        require_once("./partial/footer.php");
        ?>

    </div>
</body>