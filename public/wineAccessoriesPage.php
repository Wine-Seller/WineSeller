<?php
require_once '../bootstrap.php';

$query = "SELECT * FROM ads WHERE category = 'accessories'";

$stmt = $dbc->query($query);

$accessories = $stmt->fetch(PDO::FETCH_ASSOC);

print_r($stmt->fetchAll(PDO::FETCH_ASSOC));

$ads = Ad::all();

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

	<?php foreach($ads as $ad) : ?>
        <div class="large-4 medium-6 columns">
            <div class="post">
                <h3>
                    <!-- <a href="adsWineseller.show.php?id=<?= $ad['id']; ?>"> -->
                        <!-- <?= $ad['title']; ?> <h5><em>(Click to view this ad)</em></h5></a> -->
                </h3>
                <p>
                        <strong>Vendor: </strong>
                        <?= $ad['vendor']; ?>
                    </p>
                    <p><strong>Vendor Location: </strong>
                        <?= $ad['city']; ?>
                        <?= $ad['state']; ?>
                        <?= $ad['zip']; ?>
                    </p>
                    <p>
                        <strong>Description: </strong>
                        <?= $ad['description']; ?>
                    </p>
                    <p>
                        <strong>Product Category: </strong>
                        <?= $ad['category']; ?>
                    </p>
                     <p>
                        <strong>Product Style: </strong>
                        <?= $ad['style']; ?>
                    </p>
                     <p>
                        <strong>Vintage: </strong>
                        <?= $ad['vintage']; ?>
                    </p>
                    <p>
                        <strong>Price: </strong>
                        $<?= $ad['price']; ?>
                    </p>
                        <a href="adsWineseller.show.php?id=<?= $ad['id']; ?>">
                        <img src="<?= $ad['image']; ?>" alt="No image provided.">
                    </a>
            </div>
        </div>    
    <?php endforeach ; ?>


	    <a href="#"><img src="../img/wineAccessories.jpg"><h4 class = "accessories">Page Coming ~ View Accessories on Wineseller</h4></img></a>

<div class = "footer">
    <?php include ("../views/partials/footer.php");?>
</div>
</body>
</html>