<?php
require_once("./catering_system/dbData.php");
$conn = getConnection();

$sql = 'SELECT * FROM potrawy WHERE kategoria = "dania_glowne"';
$result = $conn->query($sql);

?>

<!DOCTYPE html>
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
      <div class="bigtitle">Oferta dań głównych</div>
      <?php if ($result && $result->num_rows > 0) : ?>
        <?php while ($row = $result->fetch_assoc()) :   ?>
          <div class="oferta-card">
            <div class="oferta-card-2">
              <h2><?= $row["nazwa"] ?></h2>
            </div>
            <div style="text-align: center;">
              <img src="<?= $row["image_path"] ?>" height="220" width="220" />
            </div>
            <div class="oferta-card-2">
              Cena: <span style="color: red;"><b><?=$row["cena"] ?>,00 PLN</b></span> 
              <p><a href=<?= "./catering_system/dodajKoszyk.php?id_prod=" . $row['id']?> > Dodaj do koszyka </a></p>
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