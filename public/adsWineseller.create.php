<?php
require_once '../database/db_connect.php';
require_once '../database/config.php';
require_once '../models/AdModelWineseller.php';

/*check if field has been submitted and input has correct value THEN make a new AD object


- assign properties and try to save to DB- build out in php - require post input for all fields*/

if(!empty($_POST)) {
  if (Input::has('vendor_name') && 
    Input::has('location_zip_code') && 
    Input::has('product_category') &&
    Input::has('price') &&
    Input::has('description')) {
      $ad = new Ad();
      $ad->vendor_name = Input::get('vendor_name');
      $ad->location_city_code = Input::get('location_city_code');
      $ad->location_state_code = Input::get('location_state_code');
      $ad->location_zip_code = Input::get('location_zip_code');
      $ad->product_category = Input::get('product_category');
      $ad->product_origin = Input::get('product_origin');
      $ad->product_style = Input::get('product_style');
      $ad->bvintage_year = Input::get('vintage_year');
      $ad->price = Input::get('price');
      $ad->description = Input::get('description');
      $ad->save();
  }
}

?>

<html>
<head>
  <title>adsWineseller.create</title>
</head>
<body>
<div class="container">
	<h1>Insert a New Ad</h1>
<!-- <h3><?= $errorMessage ?></h3> -->

	<form  class="form-horizontal" method="POST" action="adsWineseller.create.php">
    <div class="form-group">
        <label for="vendor_name" class="col-sm-2 control-label">Vendor Name</label>
          <div class="col-sm-10">
              <input type="text" class="form-control" name="vendor_name" id="vendor_name" placeholder="Enter your vendor name">
          </div>
        <label for="location_city_code" class="col-sm-2 control-label">Vendor Location: City</label>
          <div class="col-sm-10">
              <input type="text" class="form-control" name="location_city_code" id="location_city_code" placeholder="Enter city in which vendor is located">
          </div>
          <label for="location_state_code" class="col-sm-2 control-label">Vendor Location: State</label>
          <div class="col-sm-10">
              <input type="text" class="form-control" name="location_state_code" id="location_state_code" placeholder="Enter state in which vendor is located">
          </div>
          <label for="location_zip_code" class="col-sm-2 control-label">Vendor Location: Zip Code</label>
          <div class="col-sm-10">
              <input type="text" class="form-control" name="location_zip_code" id="location_zip_code" placeholder="Enter zip code in which vendor is located">
          </div>
          <label for="product_category" class="col-sm-2 control-label">Product Category</label>
          <div class="col-sm-10">
              <input type="text" class="form-control" name="product_category" id="product_category" placeholder="Enter product catgegory">
          </div>
          <label for="product_origin" class="col-sm-2 control-label">Product Origin</label>
          <div class="col-sm-10">
              <input type="text" class="form-control" name="product_origin" id="product_origin" placeholder="Enter product origin by country or location">
          </div>
          <label for="product_style" class="col-sm-2 control-label">Product Style</label>
          <div class="col-sm-10">
              <input type="text" class="form-control" name="product_style" id="product_style" placeholder="Enter product style">
          </div>
        <label for="vintage_year" class="col-sm-2 control-label">Vintage Year</label>
          <div class="col-sm-10">
              <input type="date" class="form-control" name="vintage_year" id="vintage_year" placeholder="Enter date park was established">
          </div>
        <label for="price" class="col-sm-2 control-label">Price</label>
          <div class="col-sm-10">
              <input type="text" class="form-control" name="price" id="price" placeholder="Enter area in acres without commas">
          </div>
        <label for="description" class="col-sm-2 control-label">Description of Product</label>
          <div class="col-sm-10">
              <input type="textarea" class="form-control" name="description" id="description" placeholder="Enter description of park">
          </div>
      </div>
	
    	<button type="submit" class="btn btn-primary">Create New Wineseller Ad</button>

	</form>
</div>
</body>
</html>
</body>
</html>