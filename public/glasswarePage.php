<?php
require_once '../bootstrap.php';

$query = "SELECT * FROM ads WHERE category = 'glassware'";

$stmt = $dbc->query($query);

$glassware = $stmt->fetch(PDO::FETCH_ASSOC);
	
print_r($stmt->fetchAll(PDO::FETCH_ASSOC));

?>

<html>
<head>
	 <title>Glassware on Wineseller</title>

    <?php include ("../views/partials/header.php");?>
 
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="../css/wineseller.css">
	
</head>
<body>
	<?php require_once '../views/partials/navbar.php'; ?>

<h2>Glassware on Wineseller</h2>
   <a href="#"><img src="../img/glassesDecanter.jpg"><h4 class = "glassware">Page Coming ~ View Glassware on Wineseller</h4></img></a>
<div class = "footer">
    <?php include ("../views/partials/footer.php");?>
</div>
</body>
</html>