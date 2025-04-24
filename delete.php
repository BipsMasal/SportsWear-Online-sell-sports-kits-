<?php
include 'connect.php';
$sql = "SELECT * FROM Products";
$res = mysqli_query($conn,$sql);
$num = mysqli_num_rows($res);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
    <?php
    if($num>0){
         echo "<table> ";
        while ($a=mysqli_fetch_assoc($res)) {
            $x = $a['pID'];
            echo " <tr>
            <td>".$a['pTitle']."</td>
            <td>".mb_strimwidth($a['pDescription'], 0, 50, "...")."</td>
            <td><a href='deletedb.php?id=$x'>Delete</td>
            </tr>
            ";
        }
        echo "</table>";
    }
    ?>

    </body>
</html>