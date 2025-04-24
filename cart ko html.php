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
								<tr>
									<td class="product-name">
										<div class="product-thumbnail">
											<img src="dummy/cart-thumb-1.jpg" alt="">
										</div>
										<div class="product-detail">
											<h3 class="product-title">GTA V</h3>
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure nobis architecto dolorum, alias laborum sit odit, saepe expedita similique eius enim quasi obcaecati voluptates, autem eveniet ratione veniam omnis modi.</p>
										</div>
									</td>
									<td class="product-price">$150.00</td>
									<td class="product-qty">
										<select name="#">
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
										</select>
									</td>
									<td class="product-total">$150.00</td>
									<td class="action"><a href="#"><i class="fa fa-times"></i></a></td>
								</tr>

							</tbody>
						</table> <!-- .cart -->

						<div class="cart-total">
							<p><strong>Subtotal:</strong> $650.00</p>
							<p><strong>Shipment:</strong> $15.00</p>
							<p class="total"><strong>Total</strong><span class="num">$665.00</span></p>
							<p>
								<a href="#" class="button muted">Continue Shopping</a>
								<a href="#" class="button">Finalize and pay</a>
							</p>
						</div> <!-- .cart-total -->
						
					</div>
                   
				</div> <!-- .container -->
			</main> <!-- .main-content -->
 <?php require 'footer.php'; ?>
		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>
		
	</body>

</html>