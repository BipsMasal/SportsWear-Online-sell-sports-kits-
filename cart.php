<?php
if(session_status()===PHP_SESSION_NONE){
    ini_set('session.cookie_lifetime','31536000');
	session_start();
}
include 'connect.php';
$id = isset($_GET['id']) ? (int)$_GET['id'] : header('Location: index.php');
$_SESSION['id'] = $id;
// $_SESSION['countid'] = 0;
$_SESSION['countid']=isset($_SESSION['countid']) ? $_SESSION['countid'] : 0;
$sql = "SELECT * FROM Products WHERE pID=$id";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);
$_SESSION['itemid']=isset($_SESSION['itemid'])?$_SESSION['itemid']:1;
if(!$_SESSION['loggedin']){
    if($num==1){
        $i = mysqli_fetch_assoc($result);
        // Check if the product is already in the cart
    if(isset($_SESSION['cart'][$_SESSION['itemid']])) {
        // If it is, increment the quantity
        $_SESSION['cart'][$_SESSION['itemid']]['quantity']++;
        header('Location: itemcart.php');
    } else {
        // If it's not, add the product to the cart
        $product = array(
            'id' => $_SESSION['itemid'],
            'name' => $i['pTitle'],
            'image' => $i['pImage'],
            'price' => $i['pPrice'],
            'description' => mb_strimwidth($i['pDescription'], 0, 160, "..."),
            'quantity' => 1
        );
        // $_SESSION['cart'][$_GET['id']] = $product;
        $_SESSION['cart'][$_SESSION['itemid']] = $product;
        ++$_SESSION['itemid'];
        ++$_SESSION['countid'];
        header('Location: itemcart.php');
    }
    }
}
else{
    if($num==1){
        $j = mysqli_fetch_assoc($result);
        $iid = $_SESSION['itemid'];
        $un = $_SESSION['username'];
        $name = $j['pTitle'];
        $img = $j['pImage'];
        $price=$j['pPrice'];
        $desc=$j['pDescription'];

        $query = "INSERT INTO Cart(cID,cName,cImage,cPrice,cDescription,cQuantity,cUsername)
        VALUES($iid,'$name','$img',$price,'$desc',1,'$un')";
        $res = mysqli_query($conn, $query);
        ++$_SESSION['itemid'];

    }
    
}

// print_r($product);
// echo $_SESSION['cart'][$_GET['id']]['quantity'];
// echo $_SESSION['id'];
// print_r($_SESSION['cart']);
// Redirect the user back to the cart page
header('Location: itemcart.php');
?>