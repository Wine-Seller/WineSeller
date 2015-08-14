<?php
/*The ads.show.php page will have hard-coded data showing view of one single ad
may add a button for edit form or to contact seller e.g.*/

require_once '../bootstrap.php';

if(Input::has('id')) {
	$id = Input::get('id');
	$ad = Ad::find($id);
} else {
	header('');
	exit();
}

?>

<html>
<head>
  <title>View of Wineseller Ad</title>
</head>

<body>

<div class="container">
  <h1>Vendor is: <?= $ad->vendor_name; ?></h1>
   <p>Vendor city is: <?= $ad->location_city_code; ?></p>
   <p>Vendor state is: <?= $ad->location_state_code; ?></p>
   <p>Vendor city is: <?= $ad->location_zip_code; ?></p>
   <p>Category of product is: <?= $ad->product_category; ?></p>
   <p>Product comes from: <?= $ad->product_origin; ?></p>
   <p>Style is: <?= $ad->product_style; ?></p>
   <p>vintage_year is: <?= $ad->vintage_year; ?></p>
   <p>price is: <?= $ad->price; ?></p>
   <p>description is: <?= $ad->description; ?></p>
	<!-- <img src="<?= $ad->image_url ?>"; --> 
</div>
	
</body>
</html>

