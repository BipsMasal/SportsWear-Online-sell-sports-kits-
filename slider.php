<?php
include 'connect.php';
$slider = "SELECT * FROM Products ORDER BY pID DESC LIMIT 0,3";
$res = mysqli_query($conn, $slider);
$num = mysqli_num_rows($res);
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
    <div class="home-slider">
				<ul class="slides">
					
								<?php
								if($num>0){
									while ($i = mysqli_fetch_assoc($res)) {
										$j = $i['pID'];
										// echo "<li data-bg-image='".$i['pImage']."'>
										echo "<li data-bg-image='products/slide1.jpg'>
										<div class='container ron'>
											<div class='slide-content'>";
										echo "<h2 class='slide-title'>".$i['pTitle']."</h2>";
										echo "<small class='slide-subtitle'>$".$i['pPrice']."</small>";
										echo "<p>".mb_strimwidth($i['pDescription'], 0, 60, "...")."</p>";
										echo "<a href='cart.php?id=$j' class='button'>Add to cart</a>";
										echo "</div>";
										echo "<img src='".$i['pImage']."' class='slide-image'>";
									}
								}
								?>
							

							
						</div>
					</li>
				</ul> <!-- .slides -->
			</div> <!-- .home-slider -->
        <script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>
		
	</body>
</html>