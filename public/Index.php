
<?php

?>
<!DOCTYPE html>

<html>

<head>
    <title>Wine Seller</title>

    <?php include ("../views/partials/header.php");?>
 
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="../css/wineseller.css">
   
</head>

<body>
    <?php include ("../views/partials/navbar.php");?>

<ul class = "linkBoxes">
    <li class = "viewCellar"><a href="/adsWineseller.index.php">View the Cellar</a></li>
    <li class = "addProduct"><a href="/adsWineseller.create.php">Add An Item To The Cellar</a></li>
    <li "joinCellar"><a href="/users.create.php">Join The Cellar</a></li>
</ul>

    <a href="winePage.php"><img src="../img/redWineGlasses.jpg"><h4 class = "wineBox">Wine</h4></img></a>

    <a href="#"><h4 class = "glasswareBox">Glassware</h4></a>
    <a href="#"><h4 class = "accessories">Accessories</h4></a>

<div class = "footer">
    <?php include ("../views/partials/footer.php");?>
</div>

</body>

</html>
