
<?php

?>
<!DOCTYPE html>

<html>

<head>
    <title>Welcome To The Wine Seller</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
 
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="../css/wineseller.css">
     <meta charset="utf-8">
</head>

<body>
    
    <?php include ("../views/partials/header.php");?>
    <?php include ("../views/partials/navbar.php");?>
    
<div class = "linkBoxes">

    <div class="row topRow">
        <p></p>
        <div class="col-md-4"><a href="../adsWineseller.index.php"><img class = "displayed cellarImage" src="../img/visitWineCellar.jpg"><h4 class = "show Cellar">Visit the Cellar</h4></img></a></div>
        <p></p>
        <div class="col-md-4"><a href="../adsWineseller.create.php"><img class = "displayed" src="../img/stockCellarPic.jpg"><h4 class = "stock Cellar">Stock the Cellar</h4></img></a></div>
        <p></p>
        <div class="col-md-4"><a href="../users.create.php"><img class = "displayed" src="../img/join.jpg"><h4 class = "join Cellar">Join the Cellar</h4></img></a></div>


    <div class="bottomRow">
       <div class="col-md-4"><a href="winePage.php"><img class = "displayed wineImage" src="../img/wines2.jpg"><h4 class = "wine Box">Wine</h4></img></a></div>

       <div class="col-md-4"><a href="glasswarePage.php"><img class = "displayed" src="../img/glassesDecanter.jpg"><h4 class = "glassware Box">Glassware</h4></img></a></div>

       <div class="col-md-4"><a href="wineAccessoriesPage.php"><img class = "displayed" src="../img/wineAccessories.jpg"><h4 class = "accessories Box">Accessories</h4></img></a></div>
    </div>
</div>

<div class = "footer">
    <?php include ("../views/partials/footer.php");?>
</div>

</body>

</html>
