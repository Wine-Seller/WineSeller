<?php
require_once '../bootstrap.php';

$query = "SELECT * FROM ads WHERE category = 'accessories'";

$stmt = $dbc->query($query);

$accessories = $stmt->fetch(PDO::FETCH_ASSOC);

print_r($stmt->fetchAll(PDO::FETCH_ASSOC));

?>

<html>
<head>
	 <title>Accessories on Wineseller</title>

    <?php include ("../views/partials/header.php");?>
 
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="../css/wineseller.css">
	
</head>
<body>
	<?php require_once '../views/partials/navbar.php'; ?>

	    <a href="#"><img src="../img/wineAccessories.jpg"><h4 class = "accessories">Page Coming ~ View Accessories on Wineseller</h4></img></a>

<div class = "footer">
    <?php include ("../views/partials/footer.php");?>
</div>
</body>
</html>