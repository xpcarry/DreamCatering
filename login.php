<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dream Catering</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <link rel="stylesheet" href="site.css" type="text/css" />

</head>

<body>

    <div class="container">

        <?php
        require_once("./partial/header.php");

        ?>


        <div class="content">

            <form method="post" action="./catering_system/login_system.php">
                <label>Nazwa uzytkownika: </label>
                <input type="text" name="login"> </br> </br>
                <label>Hasło: </label>
                <input type="password" name="password"> </br>
                <button type="submit">Zaloguj</button>  
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