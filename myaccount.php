<?php
if(session_status()===PHP_SESSION_NONE){
	ini_set('session.cookie_lifetime','31536000');
	session_start();
}
include 'connect.php';
if(!$_SESSION['loggedin']){
    header('location:index.php');
}
else{
	$un = $_SESSION['username'];
    $account = "SELECT * FROM users WHERE Username='$un'";
    $res = mysqli_query($conn, $account);
    $num = mysqli_num_rows($res);
    if($num!=1){
        header('location:index.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title>My Account</title>

		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Roboto:100,300,400,700|" rel="stylesheet" type="text/css">
		<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="fonts/lineo-icon/style.css" rel="stylesheet" type="text/css">
<style>
	td,th{
		text-align: left;
		padding-left: 20px;
	}
	th{
		color: green;
		font-weight: 800;
		font-size:x-large;
	}
	td{
		font-weight: 500;
		font-size: larger;
		text-align: left;
		vertical-align: bottom;
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
    <?php require 'nav.php'; ?>
		<div id="site-content">
			<main class="main-content">
				<div class="container">
					<div class="page">
						<h1 style=font-weight:800>Your Information</h1>
						<?php
                        $info = mysqli_fetch_assoc($res);
						echo "<table>
						<tr>
						<th>Name:</h2></th>
						<td>".$info['FullName']."</td>
						</tr>
						<tr>
						<th>Username:</h2></th>
						<td>".$info['Username']."</td>
						</tr>
						<th>Email:</h2></th>
						<td>".$info['Email']."</td>
						</tr>
						</table>
						";
                        ?>

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