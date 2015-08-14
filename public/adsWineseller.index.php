<?php

/*listing of all ads*/
/*in the ads.index.php file, you should have a listing of 3-5 hard-coded sample ads*/

require_once '../bootstrap.php';
   
/*class example*/
/*$search = Input::get('search');
$ads = Ad::categorySearch($search);*/

$adsList = [

    [
        'vendor_name'           => 'Bending Branch Winery',
        'location_city_code'    => 'Comfort',
        'location_state_code'   => 'Texas',
        'location_zip_code'     => '78013',
        'product_category'      => 'wine',
        'product_origin'        => 'US Texas',
        'product_style'         => 'Dry White',
        'vintage_year'          => '2014',
        'price'                 => '20.00',
        'description'           => 'Vermentino is among the most popular grapes in Italy. We harvest these grapes from Las Brisas Vineyard in Carneros, California. The wine offers acidity and minerality, and it pairs well with lighter fare, such as seafood.',
        'image_url'             => '/img/vermentinoBendingBranch.jpg'
    ],

    [
        'vendor_name'           => 'Total Wine and More',
        'location_city_code'    => 'Atlanta',
        'location_state_code'   => 'Georgia',
        'location_zip_code'     => '30346',
        'product_category'      => 'wine',
        'product_origin'        => 'France Bordeaux Left Bank Pauillac',
        'product_style'         => 'Dry Red Bordeaux Blend',
        'vintage_year'          => '2010',
        'price'                 => '999.99',
        'description'           => 'Chateau Lafite Rothschild - 1st Growth - 100 point rating from Wine Enthusiast - Concentrated, Plum, Currant, Full-bodied - "Almost black in color, this stunning wine is gorgeous, rich and dense, grand and powerful, with a strong sense of its own importance. The beautiful tannins and the fragrant black currant fruits are palpable.',
        'image_url'             => '/img/Lafite2010.jpg'
    ],

     [

        'vendor_name'           => 'Wine Enthusiast',
        'location_city_code'    => 'New York',
        'location_state_code'   => 'New York',
        'location_zip_code'     => '10003',
        'product_category'      => 'Accessories',
        'product_origin'        => 'US',
        'product_style'         => 'Wine Preservation System',
        'vintage_year'          => 'N/A',
        'price'                 => '299.95',
        'description'           => 'Coravin 1000 Wine Access System. For centuries, the cork had to be removed in order to enjoy a glass of wine-that era is over. The Coravin System is a transformational new technology that allows users to pour wine whiling keeping the cork in the bottle, where it has been since it was ﬁrst sealed in the winery. Now you can enjoy your favorite and ﬁnest wines by the glass whenever you like, and feel conﬁdent that your wine will be protected until the next glass is poured. Now you can share and enjoy the same bottle, or bottles on multiple occasions, over weeks, months, or even longer - without wasting a drop. How do we do it? When the Coravin System is put in place, a thin, hollow needle is inserted through the cork to extract the wine. The bottle is then pressurized with argon, an inert gas that is in the air we breathe. Once the bottle has been pressurized, the wine flows through the needle and pours into your glass. Once your wine is poured, the needle is removed, and the cork reseals itself.',
        'image_url'             => 'img/coravin.jpg'
    ],

     [

        'vendor_name'           => 'Crystal Classics',
        'location_city_code'    => 'Columbus',
        'location_state_code'   => 'Ohio',
        'location_zip_code'     => '10003',
        'product_category'      => 'Accessories',
        'product_origin'        => 'US',
        'product_style'         => 'Wine Glasses Red Burgundy',
        'vintage_year'          => 'N/A',
        'price'                 => '135.15',
        'description'           => 'Riedel Sommeliers Black Series Collector Edition Red Stem Burgundy Grand Cru',
        'image_url'             => 'img/glasses.jpg'
    ],

];

$ads = Ad::all();

?>

<!-- display results in html -->

<html>
<head>
	<title>Wineseller Ads List</title>
	 <link rel="stylesheet" href="bootstrap.css">
</head>
<body>
<?php require_once '../views/partials/navbar.php'; ?>
<div class="container">
    <h1>Index Listing Wineseller Ads</h1>

<!-- On each page load, retrieve and display all records from the database
(skipping description and vendor city/state to avoid lengthy records) --> 

<div class="small-12 columns">
        <h5 class="featured">All Wineseller Listings</h5>
</div>
    <div class="row">
    <?php foreach($ads as $ad) : ?>
        <div class="large-4 medium-6 columns">
            <div class="post">
                <h2>
                    <a href="ads.show.php?id=<?= $ad['id']; ?>">
                        <?= $ad['vendor_name']; ?></a>
                </h2>
                    <p><strong>Vendor Location: </strong>
                        <?= $ad['location_city_code']; ?>
                        <?= $ad['location_state_code']; ?>
                        <?= $ad['location_zip_code']; ?>
                    </p>
                    <p>
                        <strong>Product Category: </strong>
                        <?= $ad['product_category']; ?>
                    </p>
                     <p>
                        <strong>Product Style: </strong>
                        <?= $ad['product_style']; ?>
                    </p>
                     <p>
                        <strong>Vintage: </strong>
                        <?= $ad['vintage_date']; ?>
                    </p>
                    <p>
                        <strong>Price: </strong>
                        $<?= $ad['price']; ?>
                    </p>
                    <p>
                        <strong>Description: </strong>
                        <?= $ad['description']; ?>
                    </p>
                        <a href="ads.show.php?id=<?= $ad['id']; ?>">
                        <img src="<?= $ad['image_url']; ?>" alt="No image provided.">
                    </a>
            </div>
        </div>    
    <?php endforeach ; ?>
    </div>

<?php require_once '../views/partials/footer.php'; ?>
</body>
</html>