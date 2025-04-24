<?php
if(session_status()===PHP_SESSION_NONE){
	ini_set('session.cookie_lifetime','31536000');
	session_start();
	// $_SESSION['loggedin']=false;
}
$_SESSION['countid']=isset($_SESSION['countid']) ? $_SESSION['countid'] : 0;
$_SESSION['loggedin'] = isset($_SESSION['loggedin']) ? $_SESSION['loggedin'] : false;
include 'connect.php';
if($_SESSION['loggedin']){
	// $unam=$_SESSION['username'];
	$cartcount=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM Cart WHERE cUsername='".$_SESSION['username']."'"));
}
else{
	$cartcount=$_SESSION['countid'];
}
?>
<html>
    <head>
    <link href="http://fonts.googleapis.com/css?family=Roboto:100,300,400,700|" rel="stylesheet" type="text/css">
		<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="fonts/lineo-icon/style.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="style.css">
        <!-- <link rel="stylesheet" type="text/css" href="css/nav.css"> -->
    </head>
    <body>
    <div class="site-header">
				<div class="container">
					<a href="index.php" id="branding">
						<img src="images/logo.png" alt="" class="logo">
						<div class="logo-text">
							<h1 class="site-title">SportsWear</h1>
							<small class="site-description">For Sports Lover</small>
						</div>
					</a> <!-- #branding -->

					<div class="right-section pull-right">
					<?php echo "<a href='itemcart.php' class='cart'><i class='icon-cart'></i>". $cartcount." items in cart </a>" ?>
						
						<?php
						if(isset($_SESSION['loggedin'])){
							if(!$_SESSION['loggedin']){
								echo "<a href='#' class='login-button'>Login</a>
							<a href='#' class='regis-button'>Register</a>";
							}
							else{
								echo "<a href='myaccount.php'>My Account</a>
								<a href='logout.php'>Logout <small>(".$_SESSION['username'].")</small></a>";
								// echo $_SESSION['username'];
							}
						}
						else{
							echo "<a href='#' class='login-button'>Login</a>
							<a href='#' class='regis-button'>Register</a>";
						}
						
						?>
						
					</div> <!-- .right-section -->

					<div class="main-navigation">
						<button class="toggle-menu"><i class="fa fa-bars"></i></button>
						<ul class="menu">
                            <?php if($_SERVER['PHP_SELF']=='/gameology/index.php'){
								echo "<li class='menu-item home current-menu-item'><a href='index.php'><i class='icon-home'></i></a></li>";
							}
							else{
								echo "<li class='menu-item home'><a href='index.php'><i class='icon-home'></i></a></li>";
							}
							
							?>
							<?php if($_SERVER['PHP_SELF']=='/gameology/pc.php'){
								echo "<li class='menu-item current-menu-item' ><a href='pc.php'>Products</a></li> ";
							}
							else{
								echo "<li class='menu-item' ><a href='pc.php'>Products</a></li> ";
							}
							
							?>
							<?php if($_SERVER['PHP_SELF']=='/gameology/own.php'){
								echo "<li class='menu-item current-menu-item' ><a href='#'>About us</a></li> ";
							}
							else{
								echo "<li class='menu-item' ><a href='#'>About us</a></li> ";
							}
							
							?>
							
						</ul> <!-- .menu -->
						<div class="search-form">
							<label><img src="images/icon-search.png"></label>
							<input type="text" placeholder="Search...">
						</div> <!-- .search-form -->

						<div class="mobile-navigation"></div> <!-- .mobile-navigation -->
					</div> <!-- .main-navigation -->
				</div> <!-- .container -->
			</div> <!-- .site-header -->
            <div class="overlay"></div>
            <div class="overlay1"></div>
		<div class="auth-popup popup">
			<a href="#" class="close"><i class="fa fa-times"></i></a>
			<div class="row">
					<h2 class="section-title">Login</h2>
					<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
						<input type="text" placeholder="Username..." name="username">
						<input type="password" placeholder="Password..." name="password">
						<input type="submit" value="Login" name="login">
					</form>
			</div> 
		</div> 
		<div class="auth-popup1 popup1">
			<a href="#" class="close1"><i class="fa fa-times"></i></a>
			<div class="row">
					<h2 class="section-title">Create an account</h2>
					<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
						<input type="text" placeholder="Full Name..." name="fullname">
						<input type="text" placeholder="Username..." name="username">
						<input type="text" placeholder="Email address..." name="email">
						<input type="password" placeholder="Password..." name="password">
						<input type="password" placeholder="Repassword..." name="repassword">
						<input type="submit" value="Register" name="register">
					</form>
			</div> <!-- .row -->
		</div> 
		<!-- Login  -->
		<?php
			include 'connect.php';
			if($_SERVER["REQUEST_METHOD"]=="POST"){
				if(isset($_POST['login'])){
					$username=$_POST['username'];
					$password=$_POST['password'];

					if($username==NULL){
						echo "<script>alert('Enter Username')</script>";
					}
					else if($password==NULL){
						echo "<script>alert('Enter Password')</script>";
					}
					else{
						$sql="SELECT * FROM users
						where Username='$username' AND Password='$password' ";
						$result=mysqli_query($conn,$sql);
						$num=mysqli_num_rows($result);
						if($num==1){
							$_SESSION['username']=$username;
							$_SESSION['loggedin']=true;
						$p = $_SERVER['PHP_SELF'];
						echo "<script> location.replace('index.php'); </script>";
						}
						else{
							echo "<script>alert('User not found, Please register')</script>";
						}
					}
				}
			}
		?>

		<!-- Register  -->
		<?php
			include 'connect.php';
			if($_SERVER["REQUEST_METHOD"]=="POST"){
				if(isset($_POST['register'])){
					$username=$_POST['username'];
					$fullname=$_POST['fullname'];
					$email=$_POST['email'];
					$password=$_POST['password'];
					$repassword=$_POST['repassword'];

					if($username==NULL){
						echo "<script>alert('Enter Username')</script>";
						
					}
					else if($fullname==NULL){
						echo "<script>alert('Enter your name')</script>";
						
					}
					else if($email==NULL){
						echo "<script>alert('Enter your email')</script>";
						
					}
					else if($password==NULL){
						echo "<script>alert('Enter your password')</script>";
						
					}
					else if($repassword==NULL){
						echo "<script>alert('Enter your re-password')</script>";
						
					}
					else if($password!=$repassword){
						echo "<script>alert('Passwords does not match, Try Again')</script>";
					}
				
					else{
						$sql="INSERT INTO users(FullName,Username,Email,Password)
					values('$fullname','$username','$email','$password')
					";
					
					$result=mysqli_query($conn,$sql);
					if($result){
						$sql1 = "SET  @num := 0";
						$result1 = (mysqli_query($conn, $sql1));
						$sql1="UPDATE users SET uID = @num := (@num+1)";
						$result1 = (mysqli_query($conn, $sql1));
						$sql1="ALTER TABLE `users` AUTO_INCREMENT = 1;";
						$result1 = (mysqli_query($conn, $sql1));
						echo "<script>alert('Account Created, Please Login In')</script>";

					}
					else{
						echo "<script>alert('Error, Please Register Again')</script>";
					}
					
					}

				}
			}
		?>
        <script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>
    </body>
</html>