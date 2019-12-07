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

            <form method="post" action="./catering_system/login_system.php">
            <div class="inputPanel">
                <h2>Zaloguj się</h2>
                <label>Nazwa uzytkownika:</label><br/>
                <input type="text" name="login" style="width: 100%"> </br> 
                <label>Hasło: </label><br/>
                <input type="password" name="password" style="width: 100%"></br> </br>
                <button type="submit" style="width: 100%; font-size: 23;">Zaloguj</button>
                <p style="font-size: 11px; color: gray;">Nie masz konta? <a href="./register.php" >Zarejestruj się</a></p>
            </div>
            </form>            

            <div>
                <?php
                    if(isset($_SESSION['login_error'])) {
                        echo $_SESSION['login_error'];
                        unset($_SESSION['login_error']);
                    }
                ?>
            </div>

        </div>

        <?php
        require_once("./partial/footer.php");
        ?>


    </div>

</body>

</html>