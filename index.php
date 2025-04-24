<?php 
if(session_status()===PHP_SESSION_NONE){
    ini_set('session.cookie_lifetime','31536000');
	session_start();
	// $_SESSION['loggedin']=false;
}
// if(!isset($_SESSION['page'])){
//     $_SESSION['page'] = 0;
// }
// if($_SESSION['page']!=0){
// 	$_SESSION['page'] = 0;
// }

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
        <title>SportsWear</title>
    </head>
    <body>
        <?php require 'nav.php'; ?>
        <?php require 'slider.php'; ?>
        <?php require 'maincontent.php'; ?>
                <script src="js/jquery-1.11.1.min.js"></script>
                <script src="js/plugins.js"></script>
                <script src="js/app.js"></script>
        <?php require 'footer.php'; ?>
    </body>
</html>