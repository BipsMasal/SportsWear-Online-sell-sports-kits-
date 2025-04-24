<?php
if(session_status()===PHP_SESSION_NONE){
	ini_set('session.cookie_lifetime','31536000');
	session_start();
}
include 'connect.php';
// if(!isset($_SESSION['loggedin'])){
//     echo "FALSE";
//     $_SESSION['loggedin'] = false;
// }
$_SESSION['countid']=isset($_SESSION['countid']) ? $_SESSION['countid'] : 0;
isset($_SESSION['loggedin']) ? $check=true : $check=false;
$totalall = 0;
$_SESSION['loggedin'] = isset($_SESSION['loggedin']) ? $_SESSION['loggedin'] : false;
if($_SESSION['loggedin']){
	$un=$_SESSION['username'];
	$sql = "SELECT * FROM Cart where cUsername='$un'";
	$res = mysqli_query($conn,$sql);
	$num = mysqli_num_rows($res);
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title>Cart</title>

		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Roboto:400,700|" rel="stylesheet" type="text/css">
		<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="fonts/lineo-icon/style.css" rel="stylesheet" type="text/css">
        <style>
           td+.product-price,.product-qty,.product-total{
            text-align: center;
           }
           th+.product-price,.product-qty,.product-total{
            text-align: left;
           }
        </style>
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
						
						<table class="cart">
							<thead>
								<tr>
									<th class="product-name">Product Name</th>
									<th class="product-price">Price</th>
									<th class="product-qty">Quantity</th>
									<th class="product-total">Total</th>
									<th class="action"></th>
								</tr>
							</thead>
							<tbody> 
								<?php
								if(isset($_SESSION['cart'])):
								?>
								<?php foreach($_SESSION['cart'] as $key =>$value): ?>
									<?php
									if (!$check || !$_SESSION['loggedin']) {
										echo "<tr>
										<td class='product-name'>
										<div class='product-thumbnail'>
										<img src='".$_SESSION['cart'][$key]['image']."'>
										</div>
										<div class='product-detail'>
										<h3 class='product-title'>".$_SESSION['cart'][$key]['name']."</h3>
                                                <p>".$_SESSION['cart'][$key]['description']."</p>
												</div>
												</td>

										";
										echo "<td class='product-price'>$".$_SESSION['cart'][$key]['price']."</td>";
                                                echo "<td class='product-qty'>".$_SESSION['cart'][$key]['quantity']."</td>";
                                                echo "<td class='product-total'>$".$_SESSION['cart'][$key]['quantity']*$_SESSION['cart'][$key]['price']."</td>";
                                                $totalall += $_SESSION['cart'][$key]['quantity'] * $_SESSION['cart'][$key]['price'];
												echo "<td class='action'><a href='remcart.php?idr=$key'><i class='fa fa-times'></i></a></td>
												</tr>";
												
									}
									?>
								<?php endforeach ?>
								<?php endif ?>
								<?php if($_SESSION['loggedin']): ?>
									<?php
									if($num>0):
										if(!isset($res)){
											header('Refresh:1;URL=index.php');
										}
									while($i=mysqli_fetch_assoc($res)){
										echo "<tr>
									<td class='product-name'>
									<div class='product-thumbnail'>
									<img src='".$i['cImage']."'>
									</div>
									<div class='product-detail'>
									<h3 class='product-title'>".$i['cName']."</h3>
											<p>".$i['cDescription']."</p>
											</div>
											</td>

									";
									echo "<td class='product-price'>$".$i['cPrice']."</td>";
											echo "<td class='product-qty'>".$i['cQuantity']."</td>";
											echo "<td class='product-total'>$".$i['cQuantity']*$i['cPrice']."</td>";
											$totalall += $i['cQuantity'] * $i['cPrice'];
											echo "<td class='action'><a href='remdbcart.php?idr=".$i['cID']."'><i class='fa fa-times'></i></a></td>
											</tr>";
									}
									endif;
									?>
								<?php endif ?>
							</tbody>
						</table> <!-- .cart -->
						<?php
						if($_SESSION['countid']>0&& !$_SESSION['loggedin']){
							echo "<div class='cart-total'>
							<p><strong>Subtotal:</strong>$". $totalall."</p>
						<p><strong>Shipment:</strong> $15.00</p>
						<p class='total'><strong>Total</strong><span class='num'>$".($totalall+15)."</span></p>
						<p>
							<a href='pc.php' class='button muted'>Continue Shopping</a>
							<a href='#' class='button'>Finalize and pay</a>
						</p> </div>";
						}
						?>
						
						
					</div>
                   
				</div> <!-- .container -->
			</main> <!-- .main-content -->
 <?php require 'footer.php'; ?>
		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>
		
	</body>

</html>