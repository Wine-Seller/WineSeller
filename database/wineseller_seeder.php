<?php
require_once 'config.php';
require_once 'db_connect.php';

$dbc = new PDO('mysql:host=127.0.0.1;dbname=wineseller', 'wineseller_JB', '');

// Tell PDO to throw exceptions on error
$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

/*First, add a query to delete all the records from ads table*/
$deleteRecords = "TRUNCATE ads"; 

$dbc->exec($deleteRecords);

/*$adsList = [*/
/*    ['name' => 'Wrangell-St. Elias National Park', 'location' => 'Alaska', 'date_established' => '1980-12-02', 'area_in_acres' => '8323147.59', 'description' => 'Really cold'],*/    /*['name' => 'Gates Of The Arctic National Park', 'location' => 'Alaska', 'date_established' => '1980-12-02', 'area_in_acres' => '7523897.74', 'description' => 'Extremely cold'],
    ['name' => 'Denali National Park', 'location' => 'Alaska', 'date_established' => '1917-02-26', 'area_in_acres' => '4740911.72', 'description' => 'Mega cold'],
    ['name' => 'Katmai National Park', 'location' => 'Alaska', 'date_established' => '1980-12-02', 'area_in_acres' => '3674529.68', 'description' => 'Exceptionally cold'],
    ['name' => 'Death Valley National Park', 'location' => 'California', 'date_established' => '1994-10-31', 'area_in_acres' => '3372401.96', 'description' => 'Amazingly hot'],
    ['name' => 'Glacier Bay National Park', 'location' => 'Alaska', 'date_established' => '1980-12-02', 'area_in_acres' => '3372401.96', 'description' => 'Also cold'],
    ['name' => 'Lake Clark National Park', 'location' => 'Alaska', 'date_established' => '1980-12-02', 'area_in_acres' => '3224840.31', 'description' => 'Too cold'],
    ['name' => 'Yellowstone National Park', 'location' => 'Wyoming', 'date_established' => '1872-03-01', 'area_in_acres' => '2619733.21', 'description' => 'Beware of bears'],
    ['name' => 'Kobuk Valley National Park', 'location' => 'Alaska', 'date_established' => '1980-12-02', 'area_in_acres' => '2219790.71', 'description' => 'Low temps'],
    ['name' => 'Everglades National Park', 'location' => 'Florida', 'date_established' => '1947-12-06', 'area_in_acres' => '1508537.90', 'description' => 'Beware of the alligators']*/
/*];*/

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
        'image_url'             => '/img/vermentinoBendingBranch.jpg',
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
        'image_url'             => '/img/Lafite2010.jpg',
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
        'image_url'             => '/img/coravin.jpg',
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
        'image_url'             => '/img/coravin.jpg',
    ],

];


/*Update park_seeder.php to use prepare() rather than exec() - MySQL caches this statement*/
       /* ()*/

    $stmt = $dbc->prepare('INSERT INTO ads (vendor_name,location_city_code, location_state_code, location_zip_code, product_category, product_style, product_origin, vintage_date, price, description, image_url) 
        VALUES (:vendor_name, :location_city_code, :location_state_code, :location_zip_code, :product_category, :product_style, :product_origin, :vintage_date, :price, :description, :image_url)');

foreach ($adsList as $list) {
    $stmt->bindValue(':vendor_name', $list['vendor_name'], PDO::PARAM_STR);
    $stmt->bindValue(':location_city_code', $list['location_city_code'], PDO::PARAM_STR);
    $stmt->bindValue(':location_state_code', $list['location_state_code'], PDO::PARAM_STR);
    $stmt->bindValue(':location_zip_code', $list['location_zip_code'], PDO::PARAM_INT);
    $stmt->bindValue(':product_category', $list['product_category'], PDO::PARAM_STR);
    $stmt->bindValue(':product_origin', $list['product_origin'], PDO::PARAM_STR);
    $stmt->bindValue(':product_style', $list['product_style'], PDO::PARAM_STR);
    $stmt->bindValue(':vintage_year', $list['vintage_year'], PDO::PARAM_INT);       
    $stmt->bindValue(':price', $list['price'], PDO::PARAM_STR);
    $stmt->bindValue(':description', $list['description'], PDO::PARAM_STR);
    $stmt->bindValue(':image_url', $list['image_url'], PDO::PARAM_STR);
   /* $stmt->bindValue(':id', $list['id'], PDO::PARAM_STR);*/
    $stmt->execute();

    echo "Inserted ID: " . $dbc->lastInsertId() . PHP_EOL;
}

?>