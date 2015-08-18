<?php

/*listing of all ads*/

require_once '../bootstrap.php';
   

/*in the ads.index.php file, you should have a listing of 3-5 hard-coded sample ads*/
$adsList = [

    [
        'title'         => 'Vermentino White Wine 750 ml',
        'vendor'        => 'Bending Branch Winery',
        'city'          => 'Comfort',
        'state'         => 'Texas',
        'zip'           => '78013',
        'category'      => 'wine',
        'origin'        => 'US Texas',
        'style'         => 'Dry White',
        'vintage'       => '2014',
        'price'         => '20.00',
        'description'   => 'Vermentino is among the most popular grapes in Italy. We harvest these grapes from Las Brisas Vineyard in Carneros, California. The wine offers acidity and minerality, and it pairs well with lighter fare, such as seafood.',
        'image'         => '/img/vermentinoBendingBranch.jpg'
    ],

    [
        'title'         => 'Lafite Bordeaux Left Bank 750 ml',
        'vendor'        => 'Total Wine and More',
        'city'          => 'Atlanta',
        'state'         => 'Georgia',
        'zip'           => '30346',
        'category'      => 'wine',
        'origin'        => 'France Bordeaux Left Bank Pauillac',
        'style'         => 'Dry Red Bordeaux Blend',
        'vintage'       => '2010',
        'price'         => '999.99',
        'description'   => 'Chateau Lafite Rothschild - 1st Growth - 100 point rating from Wine Enthusiast - Concentrated, Plum, Currant, Full-bodied - "Almost black in color, this stunning wine is gorgeous, rich and dense, grand and powerful, with a strong sense of its own importance. The beautiful tannins and the fragrant black currant fruits are palpable.',
        'image'         => '/img/Lafite2010.jpg'
    ],

     [

        'title'         => 'Coravin Wine Storage System',
        'vendor'        => 'Wine Enthusiast',
        'city'          => 'New York',
        'state'         => 'New York',
        'zip'           => '10003',
        'category'      => 'Accessories',
        'origin'        => 'US',
        'style'         => 'Wine Preservation System',
        'vintage'       => 'N/A',
        'price'         => '299.95',
        'description'   => 'Coravin 1000 Wine Access System. For centuries, the cork had to be removed in order to enjoy a glass of wine-that era is over. The Coravin System is a transformational new technology that allows users to pour wine whiling keeping the cork in the bottle, where it has been since it was ﬁrst sealed in the winery. Now you can enjoy your favorite and ﬁnest wines by the glass whenever you like, and feel conﬁdent that your wine will be protected until the next glass is poured. Now you can share and enjoy the same bottle, or bottles on multiple occasions, over weeks, months, or even longer - without wasting a drop. How do we do it? When the Coravin System is put in place, a thin, hollow needle is inserted through the cork to extract the wine. The bottle is then pressurized with argon, an inert gas that is in the air we breathe. Once the bottle has been pressurized, the wine flows through the needle and pours into your glass. Once your wine is poured, the needle is removed, and the cork reseals itself.',
        'image'         => 'img/coravin.jpg'
    ],

     [

        'title'         => 'Riedel Burgundy Glasses Set',
        'vendor'        => 'Crystal Classics',
        'city'          => 'Columbus',
        'state'         => 'Ohio',
        'zip'           => '10003',
        'category'      => 'Accessories',
        'origin'        => 'US',
        'style'         => 'Wine Glasses Red Burgundy',
        'vintage'       => 'N/A',
        'price'         => '135.15',
        'description'   => 'Riedel Sommeliers Black Series Collector Edition Red Stem Burgundy Grand Cru',
        'image'         => 'img/glasses.jpg'
    ],

];
/*class example - $search = Input::get('search') - $ads = Ad::categorySearch($search);*/

$ads = Ad::all();

?>

<!-- display results in html -->

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
</head>
<body>
    <?php include ("../views/partials/header.php");?>
    <?php require_once '../views/partials/navbar.php'; ?>
<div class="container">

<!-- On each page load, retrieve and display all records from the database
(skipping description and vendor city/state to avoid lengthy records) --> 

<div class="small-12 columns container">
        <h3>Contents of the Wine Cellar</h3>
    <!--  <a name="topOfPage"></a>  -->
    <div class="row container">
    <?php foreach($ads as $ad) : ?>
        <div class="large-4 medium-6 columns">
            <div class="post">
                <h3>
                    <a href="adsWineseller.show.php?id=<?= $ad['id']; ?>">
                        <?= $ad['title']; ?> <h5><em>(Click to view this ad)</em></h5></a>
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
    </div>
</div>

    <?php require_once '../views/partials/footer.php'; ?>
</body>
</html>