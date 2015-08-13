
<?php

?>
<!DOCTYPE html>

<html>

<head>
    <title>Welcome To The Wine Seller</title>

</head>

    <?php include ("../views/partials/header.php");?>
    <?php include ("../views/partials/navbar.php");?>

    <link rel="stylesheet" href="../css/wineseller.css">
    <link rel="stylesheet" href="bootstarp.css">
    <link rel="stylesheet" href="bootstarp.min.css">

</head>

<body>

    <li><a href="/adsWineseller.index.php">View the Cellar</a></li>
    <li><a href="/adsWineseller.create.php">Add An Item To The Cellar</a></li>
    <li><a href="/users.create.php">Join The Cellar</a></li>

    <h4><a href="#">Wine</a></h4>
    <h4><a href="#">Glassware</a></h4>
    <h4><a href="#">Accessories</a></h4>

    <?php include ("../views/partials/footer.php");?>

</body>

</html>
