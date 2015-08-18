<?php
/*Shows a single ad that has been clicked from the ads.index.php*/

require_once '../bootstrap.php';

    // Retrieve record with id matching the $_GET request in url
    $ad = Ad::find($_GET['id']);
    $adArray = $ad->attributes[0];
?>

<!DOCTYPE html>

<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
 
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="../css/wineseller.css">
     <meta charset="utf-8">
  <title>View of Wineseller Ad</title>
   <?php include ("../views/partials/header.php");?>
</head>

<body>
   <?php include ("../views/partials/navbar.php");?>


<div class="container">
  <h3 class = "adShow">Selected Wineseller Ad: <?= $adArray['title']; ?></h3>
  <div class="showForm"
   <p>Vendor: <?= $adArray['vendor']; ?></p>
   <p>Vendor city: <?= $adArray['city']; ?></p>
   <p>Vendor state: <?= $adArray['state']; ?></p>
   <p>Vendor zip code: <?= $adArray['zip']; ?></p>
   <p>Product category: <?= $adArray['category']; ?></p>
   <p>Product origin: <?= $adArray['origin']; ?></p>
   <p>Style: <?= $adArray['style']; ?></p>
   <p>Vintage: <?= $adArray['vintage']; ?></p>
   <p>Price: <?= $adArray['price']; ?></p>
   <p>Description: <?= $adArray['description']; ?></p>
   <p><img src="<?= $adArray['image']; ?>"></p>
 </div>
</div>

 <p class="view-ad">
  <a href="adsWineseller.index.php">Back to all ads</a>
</p>

<p class="edit-ad">
  <a href="../adsWineseller.edit.php"><img class = "displayed" src="../img/stockCellarPic.jpg"><h4 class = "stock Cellar">Edit Your Ad</h4></img></a></div>

<?php require_once '../views/partials/footer.php'; ?>

</body>
</html>