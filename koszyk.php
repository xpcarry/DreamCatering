<?php
if (!isset($_SESSION)) session_start();

if(!isset($_SESSION['user_id'])){
    $_SESSION['login_error'] = "Musisz byc zalogowany, żeby wejść do koszyka!";
    header('location: ../login.php');
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

</head>

<body>
	
	<div class="container">
		
		<?php
			require_once("./partial/header.php");

		?>

		<div class="content">
            <span class="bigtitle">Twój koszyk</span>
            
            <?php if ($result && $result->num_rows > 0) : ?>
                <?php while ($row = $result->fetch_assoc()) :   ?>
                    <div>
                        <h2><?= $row["nazwa"] ?></h2>
                        <img src="<?= $row["image_path"] ?>" height="220" width="220" />
                        <p>Cena: <span style="color: red;"><b><?=$row["cena"] ?>,00 PLN</b></span> </p>
                    </div>
                <?php endwhile; ?>
            <?php endif;  ?>
			

        </div>
        <?php
			require_once("./partial/footer.php");
		?>

	</div>
		
</body>
</html>