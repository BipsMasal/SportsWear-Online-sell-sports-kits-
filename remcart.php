<?php
if(session_status()===PHP_SESSION_NONE){
    ini_set('session.cookie_lifetime','31536000');
	session_start();
}
include 'connect.php';
// print_r(($_SESSION['cart']));
// echo "<br>";
$id = isset($_GET['idr']) ? (int)$_GET['idr'] : header('Location: index.php');
$_SESSION['loggedin']=isset($_SESSION['loggedin'])?$_SESSION['loggedin']:false;
if(!$_SESSION['loggedin']){
    unset($_SESSION['cart'][$id]);
// unset($_SESSION['cart'][$id]['name']);
// unset($_SESSION['cart'][$id]['id']);
// unset($_SESSION['cart'][$id]['image']);
// unset($_SESSION['cart'][$id]['price']);
// unset($_SESSION['cart'][$id]['description']);
// unset($_SESSION['cart'][$id]['quantity']);
--$_SESSION['countid'];
// print_r($product);
// echo $_SESSION['cart'][$_GET['id']]['quantity'];
// echo $_SESSION['id'];
// print_r($_SESSION['cart']);
// Redirect the user back to the cart page
header('Location: itemcart.php');
}
else{
    echo "<script> alert('Error'); </script>";
    echo "<script> location.replace('index.php'); </script>";
}
?>