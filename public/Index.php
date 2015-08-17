
<?php

?>
<!DOCTYPE html>

<html>

<head>
    <title>Welcome To The Wine Seller</title>

    <?php include ("../views/partials/header.php");?>
 
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="../css/wineseller.css">
   
</head>

<body>
    <?php include ("../views/partials/navbar.php");?>
    <a name="topOfPage"></a> 

<div class = "linkBoxes">

    <div class="row">
        <p></p>
        <div class="col-md-4"><a href="../adsWineseller.index.php"><img src="../img/visitCellar.jpg"><h4 class = "show Cellar">Visit the Cellar</h4></img></a></div>
        <p></p>
        <div class="col-md-3"><a href="../adsWineseller.create.php"><img src="../img/wineStore.jpg"><h4 class = "stock Cellar">Stock the Cellar</h4></img></a></div>
        <p></p>
        <div class="col-md-3"><a href="../users.create.php"><img src="../img/join.jpg"><h4 class = "join Cellar">Join the Cellar</h4></img></a></div>
    </div>

    <div class="row">
     <div class="col-md-4"><a href="winePage.php"><img src="../img/wines.jpg"><h4 class = "wine Box">Wine</h4></img></a></div>

     <div class="col-md-3"><a href="glasswarePage.php"><img src="../img/glassesDecanter.jpg"><h4 class = "glassware Box">Glassware</h4></img></a></div>

     <div class="col-md-3"><a href="wineAccessoriesPage.php"><img src="../img/wineAccessories.jpg"><h4 class = "accessories Box">Accessories</h4></img></a></div>
    </div>
</div>

<div class = "footer">
    <?php include ("../views/partials/footer.php");?>
</div>

</body>

</html>
