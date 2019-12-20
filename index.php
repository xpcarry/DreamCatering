<?php
if (!isset($_SESSION)) session_start();
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
		<?php if (isset($_SESSION['order_success'])) : ?>
			<div style="width: 50%; background-color: rgba(153, 255, 125, .5); position: absolute; top: 5px; left: 25%; padding: 25px; box-sizing: border-box; border: 1px solid black; text-align: center;">
				<?php
					echo $_SESSION['order_success'];
					unset($_SESSION['order_success']);
					?>
			</div>
		<?php endif; ?>
		<div>

		</div>

		<div class="content">
			<span class="bigtitle">Co możemy zaoferować?</span>

			<div class="dottedline"></div>

			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean lacinia mollis odio eu bibendum. Praesent non hendrerit risus. Nulla id semper sem. Mauris risus mauris, ultrices sed ullamcorper sed, vulputate vel nisi. Aliquam augue ante, mattis in pulvinar vitae, ultrices nec leo. Nulla ultricies augue enim, sit amet semper tellus vulputate sit amet. Maecenas tincidunt, ex eu viverra scelerisque, quam lectus auctor nunc, at pretium nibh lacus in ligula. Cras condimentum felis ac aliquet tristique. Sed elementum eu nulla vel rutrum. Cras feugiat nulla non congue malesuada.

			<br /><br />
			Cras et nulla vehicula, efficitur enim non, fermentum tortor. Curabitur id elementum leo. Sed eget turpis accumsan dolor mollis imperdiet. Praesent pellentesque laoreet lectus, at commodo magna varius vitae. Aliquam erat volutpat. Curabitur commodo, tortor laoreet sagittis cursus, nulla enim laoreet libero, et egestas risus ante vel orci. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nunc quis posuere massa, sed sollicitudin lorem. Mauris lacinia, massa efficitur malesuada luctus, arcu ex mattis erat, a venenatis magna risus nec neque. Nulla vulputate nisl urna, quis egestas orci suscipit tristique. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras auctor nec elit at ultricies. Morbi aliquam pharetra diam, vitae porta felis. Pellentesque vel arcu tincidunt, luctus justo quis, ultrices erat. Vivamus efficitur leo vitae dui molestie, eu varius sapien iaculis. In quis pharetra mauris.

			<br /><br />
			Nam ullamcorper turpis non tristique sollicitudin. Etiam id magna lacus. Pellentesque vestibulum ex eget quam consectetur, sit amet luctus erat feugiat. Sed gravida tellus tempus consequat rhoncus. Phasellus lobortis magna et risus pharetra, facilisis blandit sapien tristique. Vivamus aliquam interdum arcu, eget facilisis ante gravida ut. Proin nec nisl ut lacus finibus sagittis id non nibh. Donec volutpat pretium libero. Sed fermentum vel ante vitae mattis. Curabitur porttitor turpis at scelerisque auctor. Sed vitae iaculis risus, ut iaculis nibh.
		</div>

		<?php
		require_once("./partial/footer.php");
		?>


	</div>

</body>

</html>