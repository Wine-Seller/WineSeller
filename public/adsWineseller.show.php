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
  <meta charset="utf-8">
  <title>View of Wineseller Ad</title>
   <?php include ("../views/partials/header.php");?>
</head>

<body>
   <?php include ("../views/partials/navbar.php");?>

   <h2><?= $adArray['vendor']; ?> Wineseller Ad</h2>

<div class="container">
  <h4>Vendor: <?= $adArray['vendor']; ?></h4>
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

 <p class="view-post">
  <a href="adsWineseller.index.php">Back to all ads</a>
</p>


<?php require_once '../views/partials/footer.php'; ?>

</body>
</html>