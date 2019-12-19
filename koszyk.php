<?php
if (!isset($_SESSION)) session_start();

if (!isset($_SESSION['user_id'])) {
    $_SESSION['login_error'] = "Musisz byc zalogowany, żeby wejść do koszyka!";
    header('location: ./login.php');
    die;
}

require_once("./catering_system/dbData.php");
$conn = getConnection();

$sql = 'SELECT * FROM potrawy RIGHT JOIN koszyk ON potrawy.id = koszyk.id_potrawy WHERE koszyk.id_uzytkownika =' . $_SESSION['user_id'];
$result = $conn->query($sql);


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
            <span class="bigtitle">Twój koszyk</span>

            <?php
            $cenaTotal = 0;
            if ($result && $result->num_rows > 0) : ?>
                <?php while ($row = $result->fetch_assoc()) :   ?>
                    <?php $cenaTotal += $row['cena'] ?>
                    <div class="koszykPozycja">
                        <img src="<?= $row["image_path"] ?>" height="50" width="50" />
                        <div class="koszykPozycjaInfo">
                            <h4 style="display:inline; padding:20px;"><?= $row["nazwa"] ?></h4>
                            Cena: <span style="color: red;"><b><?= $row["cena"] ?>,00 PLN</b></span>
                        </div>
                    </div>
                <?php endwhile; ?>
                <p>Cena całkowita zamówienia: <span style="color: red;"><b> <?= $cenaTotal ?>,00 PLN </b> </span></p>
                <a href="./zamowienie.php" style="font-size: 23; margin:20px;"><button>Przejdź do zamówienia</button></a>
            <?php else : ?>
                <p>Brak przedmiotów w koszyku :(</p>
            <?php endif;  ?>

        </div>
        <?php
        require_once("./partial/footer.php");
        ?>

    </div>

</body>

</html>