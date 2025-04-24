<?php
include 'connect.php';
$new = "SELECT * FROM Products ORDER BY pID DESC LIMIT 0,4";
$promo = "SELECT * FROM Products ORDER BY pID ASC LIMIT 0,4";
$res = mysqli_query($conn, $new);
$res1 = mysqli_query($conn, $promo);
$num = mysqli_num_rows($res);
$num1 = mysqli_num_rows($res1);
$item = isset($_GET['item']) ? (int)$_GET['item'] : 1;
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Roboto:100,300,400,700|" rel="stylesheet" type="text/css">
		<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="fonts/lineo-icon/style.css" rel="stylesheet" type="text/css">

		<!-- Loading main css file -->
		<link rel="stylesheet" href="style.css">
		
		<!--[if lt IE 9]>
		<script src="js/ie-support/html5.js"></script>
		<script src="js/ie-support/respond.js"></script>
		<![endif]-->

	</head>

<body class="slider-collapse">
        <main class="main-content">
				<div class="container">
					<div class="page">
						<section>
							<header>
								<h2 class="section-title">New Products</h2>
								<!-- <a href="#" class="all">Show All</a> -->
							</header>

							<div class="product-list">
							<?php
							if($num>0){

							
								while ($i = mysqli_fetch_assoc($res)) {
									$j = $i['pID'];
								echo "<div class='product'>
																	<div class='inner-product'>
																	<div class='figure-image'>
																		<a href='single.php?item=$j'><img src='" . $i['pImage'] . "' alt='Game" . $i['pID'] . "'></a>
																	</div>
																	<h3 class='product-title'><a href='single.php?item=$j'>" . $i['pTitle'] . "</a></h3>
																	<p>" . mb_strimwidth($i['pDescription'], 0, 50, "...") . "</p>
																	<h3 class='product-title' style=color:green;>$" . $i['pPrice'] . "</h3> <br>
																	<a href='cart.php?id=$j' class='button'>Add to cart</a>
																	<a href='single.php?item=$j' class='button muted'>Read Details</a>
																	</div>
																	</div>
																	";
							}
						}
					?>
							</div> <!-- .product-list -->

						</section>

						<section>
							<header>
								<h2 class="section-title">Promotion</h2>
								<!-- <a href="#" class="all">Show All</a> -->
							</header>

							<div class="product-list">
								
							<?php
							if($num>0){

							
								while ($p = mysqli_fetch_assoc($res1)) {
									$j = $p['pID'];
								echo "<div class='product'>
																	<div class='inner-product'>
																	<div class='figure-image'>
																		<a href='single.php?item=$j'><img src='" . $p['pImage'] . "' alt='Game" . $p['pID'] . "'></a>
																	</div>
																	<h3 class='product-title'><a href='single.php?item=$j'>" . $p['pTitle'] . "</a></h3>
																	<p>" . mb_strimwidth($p['pDescription'], 0, 50, "...") . "</p>
																	<h3 class='product-title' style=color:green;>$" . $p['pPrice'] . "</h3> <br>
																	<a href='cart.php?id=$j' class='button'>Add to cart</a>
																	<a href='single.php?item=$j' class='button muted'>Read Details</a>
																	</div>
																	</div>
																	";
							}
						}
					?>
								
								
							</div> <!-- .product-list -->

						</section>
					</div>
				</div> <!-- .container -->
			</main> <!-- .main-content -->
        <script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>
		
	</body>
</html>