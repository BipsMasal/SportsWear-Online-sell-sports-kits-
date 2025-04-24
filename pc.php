<?php
if (session_status() === PHP_SESSION_NONE) {
	ini_set('session.cookie_lifetime','31536000');
	session_start();
	// $_SESSION['loggedin']=false;
}
// if(!isset($_SESSION['page'])){
// 	$_SESSION['page'] = 0;
// }
include 'connect.php';
// $db= new PDO('mysql:dbname=ron;host=127.0.0.1','root','');
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if($page==0){
	$page = 1;
}
$perPage = isset($_GET['per-page']) && $_GET['per-page'] <= 8 ? (int) $_GET['per-page'] : 8;
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

$sql = "SELECT * FROM Products LIMIT $start,$perPage";
$sql1 = "SELECT * FROM Products";
$res = mysqli_query($conn, $sql);
$res1 = mysqli_query($conn, $sql1);
$rows = mysqli_num_rows($res1);
$total = 0;
$test = 0;
for ($i = 1; $i <= $rows; $i++) {
	if ($i / 8 > $test) {
		$total++;
	}
}

$pages = ceil($total / $perPage);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
	<link href="http://fonts.googleapis.com/css?family=Roboto:100,300,400,700|" rel="stylesheet" type="text/css">
	<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="fonts/lineo-icon/style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Gameology</title>
</head>

<body>
	<?php require 'nav.php'; ?>

	<main class="main-content">
		<div class="container">
			<div class="page">
				<div class="filter-bar">
					<!--	<div class="filter">
								<span>
									<label>Sort by:</label>
									<select name="#">
										<option value="#">Popularity</option>
										<option value="#">Highest Rating</option>
										<option value="#">Lowest price</option>
									</select>
								</span>
								<span>
									<label>Genre</label>
									<select name="#">
										<option value="#">Show All</option>
										<option value="#">Action</option>
										<option value="#">Racing</option>
										<option value="#">Strategy</option>
									</select>
								</span> -->
					<!-- <span>
									<label>Show:</label>
									<select name="#">
										<option value="#">8</option>
										<option value="#">16</option>
										<option value="#">24</option>
									</select>
								</span> -->
					<!-- </div> .filter -->

					<div class="pagination">
						<?php
						$y=$page;
						// echo $page;
						// echo $y;
						if($y<=0){
							$y=$pages;
							// $y=$page=$pages;
						}
						echo "<a href='?page=".--$y."&per-page=$perPage' class='page-number'><i class='fa fa-angle-left'></i></a>";
						// echo "<a href='?page=".--$y."&per-page=$perPage' class='page-number'><i class='fa fa-angle-left'></i></a>";
						?>
						<?php
						for ($x = 1; $x <= $pages; $x++) {
							
							if ($page == $x) {
								echo "<a href='?page=$x&per-page=$perPage'class='page-number current'>$x";
								$y++;
							} else {
								echo "<a href='?page=$x&per-page=$perPage'class='page-number'>$x";
							}
						}
						?>
						<?php
						$y=$page;
						if($y>=$pages){
							$y=$pages-1;
							// $y=$page=$pages-1;
						}
						echo "<a href='?page=".++$y."&per-page=$perPage' class='page-number'><i class='fa fa-angle-right'></i></a>";
						?>
					</div> <!-- .pagination -->
				</div> <!-- filterbar-->

				<div class="product-list">
					<?php
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


					?>
				</div> <!-- product list-->
				<div class="pagination-bar">
					<div class="pagination">
					<?php
						$y=$page;
						// echo $page;
						// echo $y;
						if($y<=0){
							$y=$pages;
							// $y=$page=$pages;
						}
						echo "<a href='?page=".--$y."&per-page=$perPage' class='page-number'><i class='fa fa-angle-left'></i></a>";
						// echo "<a href='?page=".--$y."&per-page=$perPage' class='page-number'><i class='fa fa-angle-left'></i></a>";
						?>
						<?php
						for ($x = 1; $x <= $pages; $x++) {
							
							if ($page == $x) {
								echo "<a href='?page=$x&per-page=$perPage'class='page-number current'>$x";
								$y++;
							} else {
								echo "<a href='?page=$x&per-page=$perPage'class='page-number'>$x";
							}
						}
						?>
						<?php
						$y=$page;
						if($y>=$pages){
							$y=$pages-1;
							// $y=$page=$pages-1;
						}
						echo "<a href='?page=".++$y."&per-page=$perPage' class='page-number'><i class='fa fa-angle-right'></i></a>";
						?>
					</div>
				</div>>
				</div> <!-- page-->
			</div> <!-- .container -->
	</main> <!-- .main-content -->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/app.js"></script>
	<?php require 'footer.php' ?>
</body>

</html>