<!--marketing homepage-->
<?php

require_once 'AdModelWineseller.php';
require_once 'UserModelWineseller.php';
require_once '../bootstrap.php';

$input = Input::get('page');

$errorMessage = '';

$errors = [];

/*require post input for all fields*/
if(!empty($_POST)) {
	if (Input::has('vendor_name') && 
		Input::has('location_city_code') && 
		Input::has('state') &&
		Input::has('zip') && 
		Input::has('product_category') &&
		Input::has('product_style')&&
		Input::has('product_origin')&&
		Input::has('vintage_date')&&
		Input::has('price')&&
		Input::has('description')&&
		Input::has('image_url');
	

	) {
		$insertStmt = $dbc->prepare('INSERT INTO ads (vendor_name,location_city_code, state,zip,product_category, product_style, product_origin, vintage_date, price, description, image_url)
									VALUES (:vendor_name,:location_city_code, :state,:zip, :product_category :product_style, :product_origin, :vintage_date,:price, :description, :image_url)');
		$insertStmt->bindValue(':vendor_name', Input::get('vendor_name'), PDO::PARAM_STR);
		$insertStmt->bindValue(':location_city_code', Input::get('location_city_code'), PDO::PARAM_STR);
		$insertStmt->bindValue(':state', Input::get('state'), PDO::PARAM_STR);
		$insertStmt->bindValue(':zip', Input::get('zip'), PDO::PARAM_STR);
		$insertStmt->bindValue(':product_category', Input::get('product_category'), PDO::PARAM_STR);
		$insertStmt->bindValue(':product_style', Input::get('product_style'), PDO::PARAM_STR);	
		$insertStmt->bindValue(':Product_origin', Input::get('Product_origin'), PDO::PARAM_STR);
		$insertStmt->bindValue(':vintage_date', Input::get('vintage_date'), PDO::PARAM_STR);
		$insertStmt->bindValue(':price', Input::get('price'), PDO::PARAM_STR);
		$insertStmt->bindValue(':description', Input::get('description'), PDO::PARAM_STR);
		$insertStmt->bindValue(':image_url', Input::get('image_url'), PDO::PARAM_STR);
		
			$insertStmt->execute();
	} else {
		$errorMessage = "Missing Fields";
	}
}


/*You will need to determine the total number of ads in the database.
Modify your query to load only four ads at a time.*/

$limit = 4;
$offset = 0;



$ads = ad::all();



?>

<html>
<head>
	<title>National Parks List</title>
	 <link rel="stylesheet" href="/css/bootstrap.css">
</head>
<body>

<div class="container">
	<h1>National Parks</h1>

<?php foreach($errors as $error):?>
	<p><?php echo $error; ?></p>
<?php endforeach; ?>

<!-- On each page load, it should retrieve and display all records from the database -->	<table>
	<table class="table table-striped">
		<tr>
			<th>Vendor Name</strong></th>
			<th>Location</strong></th>
			<th>State</strong></th>
			<th>Zip</strong></th>
			<th>Product Category</strong></th>
			<th>Product Style</strong></th>
			<th>Product Origin</strong></th>
			<th>Vintage Date</strong></th>
			<th>Price</strong></th>
			<th>Description</strong></th>
		</tr>	
	<? foreach($ads as $ad): ?>
		
		<tr>
			<td><?= $ad['Vendor_name']; ?></td>
			<td><?= $ad['location_city_code']; ?></td>
			<td><?= $ad['state']; ?></td>
			<td><?= $ad['zip']; ?></td>
			<td><?= $ad['product_category']; ?></td>
			<td><?= $ad['product_style']; ?></td>
			<td><?= $ad['Product_origin']; ?></td>
			<td><?= $ad['vintage_date']; ?></td>
			<td><?= $ad['price']; ?></td>
			<td><?= $ad['description']; ?></td>
		</tr>
	<?php endforeach; ?>
	</table>
</div>

<div class="container nextPrevPage">
	<? if ($page >1 && $page <= $page_count): ?>
		<a href="?page=<?= $input -1; ?>">Previous page</a>
	<? endif; ?>
	<? if ($page < $page_count): ?>
		<a href="?page=<?= $input +1; ?>">Next page</a>
	<? endif; ?>
</div>

<div class="container">
	<h1>Make A New Ad</h1>
	<h3><?= $errorMessage ?></h3>
	<form  class="form-horizontal" method="POST" action="national_parks.php">
		<div class="form-group">
    		<label for="vendor_name" class="col-sm-2 control-label">Vendor Name</label>
    			<div class="col-sm-10">
      				<input type="text" class="form-control" name="name" id="name" placeholder="Enter Name/Vendor Name">
    			</div>
    		<label for="location_city_code" class="col-sm-2 control-label">City</label>
    			<div class="col-sm-10">
      				<input type="text" class="form-control" name="location" id="location_city_code" placeholder="Enter City">
    			</div>
    		<label for="state" class="col-sm-2 control-label">State</label>
    			<div class="col-sm-10">
      				<input type="state" class="form-control" name="state" id="state" placeholder="Enter State">
    			</div>
    		<label for="zip" class="col-sm-2 control-label">Zip Code</label>
    			<div class="col-sm-10">
      				<input type="text" class="form-control" name="zip" id="zip" placeholder="Enter area zip code">
    			</div>
    		<label for="product_category" class="col-sm-2 control-label">Category</label>
    			<div class="col-sm-10">
      				<input type="textarea" class="form-control" name="product_category" id="product_category" placeholder="Enter Category">
    			</div>
    		<label for="product_Style" class="col-sm-2 control-label">Style</label>
    			<div class="col-sm-10">
      				<input type="textarea" class="form-control" name="product_Style" id="product_Style" placeholder="Enter Style">
    			</div>
    		<label for="product_origin" class="col-sm-2 control-label">Origin</label>
    			<div class="col-sm-10">
      				<input type="textarea" class="form-control" name="product_origin" id="product_origin" placeholder="Enter Origin">
    			</div>
    		<label for="vintage_date" class="col-sm-2 control-label">Vintage Date</label>
    			<div class="col-sm-10">
      				<input type="textarea" class="form-control" name="vintage_date" id="vintage_date" placeholder="Enter Vintage Date/Year">
    			</div>
    		<label for="price" class="col-sm-2 control-label">Price</label>
    			<div class="col-sm-10">
      				<input type="textarea" class="form-control" name="price" id="price" placeholder="Enter Price">
    			</div>
    		<label for="Description" class="col-sm-2 control-label">Description</label>
    			<div class="col-sm-10">
      				<input type="textarea" class="form-control" name="Description" id="Description" placeholder="Enter Description">
    			</div>
    	</div>
    	<button type="submit" class="btn btn-primary">Add New Park</button>
	</form>
</div>
</body>
</html>
</body>
</html>