<?php

/*listing of all ads*/
/*in the ads.index.php file, you should have a listing of 3-5 hard-coded sample ads*/

require_once '../models/AdModelWineseller.php';
require_once '../bootstrap.php';
   
/*class example*/
/*$search = Input::get('search');
$ads = Ad::categorySearch($search);*/

$ads = [
    [
        'vendor_name'     		=> Bending Branch Winery,
        'location_city_code'    => 'Comfort',
        'location_state_code'	=> 'Texas',
        'location_zip_code'		=> '78013',
        'product_category'		=> 'wine',
        'product_origin'		=> 'US Texas',
        'product_style'			=> 'Dry White',
        'vintage_year'			=> '2014',
        'price'       			=> 20.00,
		'description' 			=> 'Vermentino is among the most popular grapes in Italy. We harvest these grapes from Las Brisas Vineyard in Carneros, California. The wine offers acidity and minerality, and it pairs well with lighter fare, such as seafood.',
        'image_url'   			=> '/img/vermentinoBendingBranch.jpg',
    ],

 	[
        'vendor_name'     		=> Total Wine and More ,
        'location_city_code'    => 'Atlanta',
        'location_state_code'	=> 'Georgia',
        'location_zip_code'		=> '30346',
        'product_category'		=> 'wine',
        'product_origin'		=> 'France Bordeaux Left Bank Pauillac',
        'product_style'			=> 'Dry Red Bordeaux Blend',
        'vintage_year'			=> '2010',
        'price'       			=> 999.99,
		'description' 			=> 'Chateau Lafite Rothschild - 1st Growth - 100 point rating from Wine Enthusiast - Concentrated, Plum, Currant, Full-bodied - "Almost black in color, this stunning wine is gorgeous, rich and dense, grand and powerful, with a strong sense of its own importance. The beautiful tannins and the fragrant black currant fruits are palpable.',
        'image_url'   			=> '/img/Lafite2010.jpg',
    ],

     [

        'vendor_name'     		=> Wine Enthusiast,
        'location_city_code'    => 'New York',
        'location_state_code'	=> 'New York',
        'location_zip_code'		=> '10003',
        'product_category'		=> 'Accessories',
        'product_origin'		=> 'US',
        'product_style'			=> 'Wine Preservation System',
        'vintage_year'			=> 'N/A',
        'price'       			=> 299.95,
		'description' 			=> 'Coravin 1000 Wine Access System. For centuries, the cork had to be removed in order to enjoy a glass of wine-that era is over. The Coravin System is a transformational new technology that allows users to pour wine whiling keeping the cork in the bottle, where it has been since it was ﬁrst sealed in the winery. Now you can enjoy your favorite and ﬁnest wines by the glass whenever you like, and feel conﬁdent that your wine will be protected until the next glass is poured. Now you can share and enjoy the same bottle, or bottles on multiple occasions, over weeks, months, or even longer - without wasting a drop. How do we do it? When the Coravin System is put in place, a thin, hollow needle is inserted through the cork to extract the wine. The bottle is then pressurized with argon, an inert gas that is in the air we breathe. Once the bottle has been pressurized, the wine flows through the needle and pours into your glass. Once your wine is poured, the needle is removed, and the cork reseals itself.',
        'image_url'   			=> '/img/coravin.jpg',
    ],

     [

        'vendor_name'     		=> Crystal Classics,
        'location_city_code'    => 'Columbus',
        'location_state_code'	=> 'Ohio',
        'location_zip_code'		=> '10003',
        'product_category'		=> 'Accessories',
        'product_origin'		=> 'US',
        'product_style'			=> 'Wine Glasses Red Burgundy',
        'vintage_year'			=> 'N/A',
        'price'       			=> 135.15,
		'description' 			=> 'Riedel Sommeliers Black Series Collector Edition Red Stem Burgundy Grand Cru',
        'image_url'   			=> '/img/coravin.jpg',
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

<div class="container">
	<h1>Index Listing Wineseller Ads</h1>

<!-- On each page load, retrieve and display all records from the database
skipping description and vendor city/state to avoid lengthy records -->	

<!-- On each page load, retrieve and display all records from the database -->

	<? foreach($ads as $ad): ?>
		
		<tr>
			<td><?= $ad['vendor_name']; ?></td>
			<td><?= $ad['location_city_code']; ?></td>
			<td><?= $ad['location_state_code']; ?></td>
			<td><?= $ad['location_zip_code']; ?></td>
			<td><?= $ad['product_category']; ?></td>
			<td><?= $ad['product_style']; ?></td>
			<td><?= $ad['product_origin']; ?></td>
			<td><?= $ad['vintage_date']; ?></td>
			<td><?= $ad['price']; ?></td>
			<td><?= $ad['description']; ?></td>
		</tr>

	<?php endforeach; ?>
	
</div>

<div class="table-responsive">
	<table class="table table-hover">
		<tr>
			<th>Vendor Name</strong></th>
			<th>Vendor Location: Zip Code</strong></th>
			<th>Product Category</strong></th>
			<th>Product Origin</strong></th>
			<th>Product Style</strong></th>
			<th>Vintage Year</strong></th>
			<th>Price</strong></th>
		</tr>	
	</table>

</body>
</html>