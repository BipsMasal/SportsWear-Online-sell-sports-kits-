<?php
include 'connect.php';
$id = isset($_GET['idr']) ? (int)$_GET['idr'] : header('Location: index.php');
$sql = "DELETE FROM Cart WHERE cID=$id";
$res = mysqli_query($conn,$sql);
if(!$res){
    die(mysqli_error($conn));
}
else{
    echo "<script> alert('Successfully removed item from cart'); </script>";
    echo "<script> location.replace('itemcart.php'); </script>";
}

?>