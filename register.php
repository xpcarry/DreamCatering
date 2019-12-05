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

            <form method="post" action="./catering_system/register_system.php">
                <label>Nazwa uzytkownika: </label>
                <input type="text" name="login"> </br> </br>
                <label>Hasło: </label>
                <input type="password" name="password"> </br>
                <label>Potwierdz hasło: </label>
                <input type="password" name="confirmPassword"> </br>
                <button type="submit">Zarejestruj</button>  
            </form>            

            <div>
                <?php
                    if(isset($_SESSION['register_error'])) {
                        echo $_SESSION['register_error'];
                        unset($_SESSION['register_error']);
                    }
                    
                ?>
            </div>
            <div>
                <?php
                    if(isset($_SESSION['register_success'])) {
                        echo $_SESSION['register_success'];
                        unset($_SESSION['register_success']);
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