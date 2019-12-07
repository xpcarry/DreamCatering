<?php
require_once("./catering_system/dbData.php");
$conn = getConnection();

$sql = 'SELECT * FROM potrawy WHERE kategoria = "przystawki"';
$result = $conn->query($sql);

?>

<!DOCTYPE html>
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
      <div class="bigtitle">Oferta przystawek</div>
      <?php if ($result && $result->num_rows > 0) : ?>
        <?php while ($row = $result->fetch_assoc()) :   ?>
          <div class="oferta-card">
            <div class="oferta-card-2">
              <h2><?= $row["nazwa"]?></h2>
            </div>
            <div style="text-align: center;">
              <img src="<?=$row["image_path"]?>" height="220" width="220" />
            </div>
            <div class="oferta-card-2">
              Cena: <span style="color: red;"><b><?=$row["cena"]?>,00 /szt.</b></span>
              <p></p>
              <a href="#">Dodaj do koszyka</a>
            </div>
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