<?php
include 'connect.php';
$item = isset($_GET['item']) ? (int)$_GET['item'] : 1;
$slider = "SELECT * FROM Products WHERE pID=$item";
$res = mysqli_query($conn, $slider);
$num = mysqli_num_rows($res);

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title>Single</title>

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


	<body>
		
		<div id="site-content">
         <?php require 'nav.php'; ?>
			
			<main class="main-content">
				<div class="container">
					<div class="page">
						
						<div class="entry-content">
							<div class="row">
								<div class="col-sm-6 col-md-4">
									<div class="product-images">
										<figure class="large-image">
                                            <?php
											$i = mysqli_fetch_assoc($res);
											$j = $i['pID'];
											echo "<a href='".$i['pImage']."'><img src='".$i['pImage']."'></a>";
                                            ?>
											
										</figure>
										<!-- <div class="thumbnails">
											<a href="dummy/image-2.jpg"><img src="dummy/small-thumb-1.jpg" alt=""></a>
											<a href="dummy/image-3.jpg"><img src="dummy/small-thumb-2.jpg" alt=""></a>
											<a href="dummy/image-4.jpg"><img src="dummy/small-thumb-3.jpg" alt=""></a>
										</div> -->
									</div>
								</div>
								<div class="col-sm-6 col-md-8">
								<?php
											echo "<h2 class='entry-title'>".$i['pTitle']."</h2>
											<small class='price'>$".$i['pPrice']."</small>
											<p>".$i['pDescription']."</p>
											";

								?>
									<div class="addtocart-bar">
										<?php
										echo "<a href='cart.php?id=$j' class='button'>Add to cart</a>";
										?>
										<!-- <form action="#" method="post"> -->
											<!-- <label for="#">Quantity</label>
											<select name="selection">
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
											</select> -->
											<!-- <input type="submit" value="Add to cart" name="cart">
										</form> -->
										<div class="social-links square">
											<strong>Share</strong>
											<a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
											<a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>
						
					</div>
				</div> <!-- .container -->
			</main> <!-- .main-content -->

            
		</div>
<?php require 'footer.php'; ?>
		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>
		
	</body>

</html>