<?php
include 'connect.php';
// $db= new PDO('mysql:dbname=ron;host=127.0.0.1','root','');
$page = isset($_GET['page'])?(int)$_GET['page']:1;
$perPage = isset($_GET['per-page'])&&$_GET['per-page']<=8 ? (int) $_GET['per-page'] : 8;
$start = ($page > 1)?($page*$perPage)-$perPage:0;

$sql = "SELECT * FROM Products LIMIT $start,$perPage";
$sql1 = "SELECT * FROM Products";
$res = mysqli_query($conn, $sql);
$res1 = mysqli_query($conn, $sql1);
$rows = mysqli_num_rows($res1);
$total=0;
$test = 0;
for ($i = 1; $i <= $rows; $i++) {
    if($i/8>$test){
        $total++;
    }
}

$pages = ceil($total / $perPage);
// $total = $db->query("SELECT FOUND_ROWS as total");

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Test</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Roboto:100,300,400,700|" rel="stylesheet" type="text/css">
		<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="fonts/lineo-icon/style.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
    <div class="product-list">
    <?php
    while($i=mysqli_fetch_assoc($res)){
        echo "<div class='product'>
											<div class='inner-product'>
											<div class='figure-image'>
												<a href='#'><img src='" . $i['pImage'] . "' alt='Game" . $i['pID'] . "'></a>
											</div>
											<h3 class='product-title'><a href='#'>" . $i['pTitle'] . "</a></h3>
											<p>" . mb_strimwidth($i['pDescription'], 0, 10, "...") . "</p>
											<a href='#' class='button'>Add to cart</a>
											<a href='#' class='button muted'>Read Details</a>
											</div>
											</div>
											";
    }
    ?>
    </div>
    <div class="pagination">
        <?php for ($x = 1;$x<=$pages;$x++): ?>
            <a href="?page=<?php echo $x; ?>& per-page=<?php echo $perPage ?>"><?php echo $x;?></a>
            <?php endfor; ?>
    </div>
</div>
    </body>
</html>