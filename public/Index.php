
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

<ul class = "linkBoxes">

    <div class="row">
        <p></p>
        <div class="col-md-4"><a href="../adsWineseller.index.php"><img src="../img/filterEffectsWineCellar.png"><h4 class = "showCellar">View the Cellar</h4></img></a></div>
        <p></p>
        <div class="col-md-4"><a href="../adsWineseller.create.php"><img src="../img/filterEffectsWineCellar.png"><h4 class = "stockCellar">Stock the Cellar</h4></img></a></div>
        <p></p>
        <div class="col-md-4"><a href="../users.create.php"><img src="../img/filterEffectsWineCellar.png"><h4 class = "joinCellar">Join the Cellar</h4></img></a></div>
    </div>

    <div class="row">
     <div class="col-md-4"><a href="winePage.php"><img src="../img/redWineGlasses.jpg"><h4 class = "wineBox">Wine</h4></img></a></div>

     <div class="col-md-4"><a href="glasswarePage.php"><img src="../img/glassware.jpg"><h4 class = "glasswareBox">Glassware</h4></img></a></div>

     <div class="col-md-4"><a href="wineAccessoriesPage.php"><img src="../img/wineAccessories.jpg"><h4 class = "accessoriesBox">Accessories</h4></img></a></div>
    </div>

<div class = "footer">
    <?php include ("../views/partials/footer.php");?>
</div>

</body>

</html>
