<?php

require_once '../bootstrap.php';

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

    // reset form and tell user their post was successfully added
/*      $savedInput = ['title'=>'', 'description'=>'', 'price'=>'', 'contactName'=>'', 'contactEmail'=>'', 'contactPhone'=>''];
      echo "<div class='row'>
          <div class='large-12 columns'>
            <h3>Your info was added to our cellar.</h3>
            <a href='ads.index.php'>
              <button type='button' class='btn'>View your new ad</button>
            </a>
          </div>
        </div>";*/

}

?>

<html>
<head>
  <title>adsWineseller.create</title>
  <!-- <link rel="stylesheet" href="../css/bootstrap.css">  -->
  <?php require_once '../views/partials/header.php'; ?>
</head>
<body>
  <?php include ("../views/partials/navbar.php");?> 
  <h1>Insert a New Ad</h1>
<!-- <h3><?= $errorMessage ?></h3> -->
<div class="container">
  <fieldset>

	<form  class="form-horizontal" method="POST" action="adsWineseller.create.php">
    <div class="form-group">
        <label for="vendor_name" class="col-md-6 control-label">Vendor Name</label>
         <div class="col-md-6">
              <input type="text" class="form-control" name="vendor_name" id="vendor_name" placeholder="Enter your vendor name">
        </div>
        <label for="location_city_code" class="col-md-6 control-label">Vendor Location: City</label>
          <div class="col-md-6">
              <input type="text" class="form-control" name="location_city_code" id="location_city_code" placeholder="Enter city in which vendor is located">
          </div>
          <label for="location_state_code" class="col-md-6 control-label">Vendor Location: State</label>
          <div class="col-md-6">
              <input type="text" class="form-control" name="location_state_code" id="location_state_code" placeholder="Enter state in which vendor is located">
          </div>
          <label for="location_zip_code" class="col-md-6 control-label">Vendor Location: Zip Code</label>
          <div class="col-md-6">
              <input type="text" class="form-control" name="location_zip_code" id="location_zip_code" placeholder="Enter zip code in which vendor is located">
          </div>
          <label for="product_category" class="col-md-6 control-label">Product Category</label>
          <div class="col-md-6">
              <input type="text" class="form-control" name="product_category" id="product_category" placeholder="Enter product catgegory">
          </div>
          <label for="product_origin" class="col-md-6 control-label">Product Origin</label>
          <div class="col-md-6">
              <input type="text" class="form-control" name="product_origin" id="product_origin" placeholder="Enter product origin by country or location">
          </div>
          <label for="product_style" class="col-md-6 control-label">Product Style</label>
          <div class="col-md-6">
              <input type="text" class="form-control" name="product_style" id="product_style" placeholder="Enter product style">
          </div>
        <label for="vintage_year" class="col-md-6 control-label">Vintage Year</label>
          <div class="col-md-6">
              <input type="number" class="form-control" name="vintage_date" id="vintage_date" placeholder="Enter date park was established">
          </div>
        <label for="price" class="col-md-6 control-label">Price</label>
          <div class="col-md-6">
              <input type="text" class="form-control" name="price" id="price" placeholder="Enter area in acres without commas">
          </div>
        <label for="description" class="col-md-6 control-label">Description of Product</label>
          <div class="col-md-6">
              <input type="textarea" class="form-control" rows="10" name="description" id="description" placeholder="Enter description of park">
          </div>
             <label for="image" class="col-md-6 control-label">Upload Product Image</label>
          <div class="col-md-6">
          </div>
                <p>
  <!--<button type="submit" class="btn btn-primary btn-lg">Create New Wineseller Ad</button>--> 
        <span class="btn btn-default btn-file">
          Browse <input type="file">
        </span>
          
      </div>

  </form>
  </fieldset>      
</div>

</body>
</html>
 <div class = "footer">
    <?php include ("../views/partials/footer.php");?>
</div>
</body>
</html>