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
            <form method="post" action="./catering_system/register_system.php">
                <div class="inputPanel">
                    <h2>Zarejestruj się</h2>
                    <label>Nazwa uzytkownika: </label>
                    <input type="text" name="login" style="width: 100%"> </br>
                    <label>Hasło: </label>
                    <input type="password" name="password" style="width: 100%"> </br>
                    <label>Potwierdz hasło: </label>
                    <input type="password" name="confirmPassword" style="width: 100%"> </br>
                    <h3>Dane dostawy:</h3>
                    <label>Miasto </label>
                    <input type="text" name="miasto" style="width: 100%"> </br>
                    <label>Ulica </label>
                    <input type="text" name="ulica" style="width: 100%"> </br>
                    <label>Kod pocztowy: </label>
                    <input type="text" name="kod" style="width: 100%"> </br> </br>
                    <button type="submit" style="width: 100%; font-size: 23;">Zarejestruj</button>
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
            </form>

        </div>

        <?php
        require_once("./partial/footer.php");
        ?>


    </div>

</body>

</html>