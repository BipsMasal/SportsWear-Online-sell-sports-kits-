<?php
include 'connect.php';
$id=isset($_GET['id'])? $_GET['id']: header('location:delete.php');;
$sql = "DELETE FROM Products WHERE pID=$id";
$res = mysqli_query($conn,$sql);
if(!$res){
    die(mysqli_error($conn));
}
else{
    $sql1 = "SET  @num := 0";
						$result1 = (mysqli_query($conn, $sql1));
						$sql1="UPDATE Products SET pID = @num := (@num+1)";
						$result1 = (mysqli_query($conn, $sql1));
						$sql1="ALTER TABLE `Products` AUTO_INCREMENT = 1;";
						$result1 = (mysqli_query($conn, $sql1));
    echo "Deleted";
    echo "<br><a href='delete.php'>Go Back</a>";
}
?>
