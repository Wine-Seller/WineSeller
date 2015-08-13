<?php

require_once '../models/AdModelWineseller.php';
require_once '../bootstrap.php';

/*edit file is index and show files together*/  

$id=Input::get('id');

$ad=Ad::find($id);

/*On each page load, retrieve and display all records from the database; code as in adsWinesellerIndex.php*/

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

<!-- if input has name and location then submit call to update method or call save --> 
<?php

if(Input::has('vendor_name') && Input::has('location')) {
    $ad = new Ad();
    try {
      $ad->vendor_name = Input::getString('vendor_name', 1, 100);
      } catch(Exception $e) {
        /*below is the same as calling array push*/
        $errors[] = $e->getMessage();
      }
    try {
      $ad->location_city_code = Input::getString('location_city_code', 1, 100);
      } catch(Exception $e) {
        $errors[] = $e->getMessage();
      }
    try {
      $ad->location_state_code = Input::getString('location_state_code', 1, 100);
      } catch(Exception $e) {
        $errors[] = $e->getMessage();
      }
    try {
      $ad->location_zip_code = Input::getString('location_zip_code', 1, 100);
      } catch(Exception $e) {
        $errors[] = $e->getMessage();
      }
    try {
      $ad->product_category = Input::getNumber('product_category', 4, 8);
      } catch(Exception $e) {
        $errors[] = $e->getMessage();
      }

    try {
      $ad->product_style = Input::getNumber('product_style', 1, 25);
      } catch(Exception $e) {
        $errors[] = $e->getMessage();
      }

      try {
      $ad->product_origin = Input::getNumber('product_origin', 1, 25);
      } catch(Exception $e) {
        $errors[] = $e->getMessage();
      }

      try {
      $ad->vintage_date = Input::getNumber('vintage_date', 1, 25);
      } catch(Exception $e) {
        $errors[] = $e->getMessage();
      }
    
      try {
      $ad->price = Input::getString('price', 1, 1000);
      } catch(Exception $e) {
        $errors[] = $e->getMessage();
      }

    try {
      $ad->description = Input::getString('description', 1, 1000);
      } catch(Exception $e) {
        $errors[] = $e->getMessage();
      }

    $ad->save();
    /*model then handles the save on object*/
  }

  var_dump($_REQUEST);

?>


<html>
<head>
  <title></title>
</head>
<body>
<div class="container">
  <h1>Insert a New Ad</h1>
  <!-- <h3><?= $errorMessage ?></h3> -->

<!--   set value attribute on each input inside the actual input element; id is coming from get request -->
  <form  class="form-horizontal" method="POST" action="adsWinesellerEdit.php">
    <div class="form-group">
        <label for="vendor_name" class="col-sm-2 control-label">Vendor Name</label>
          <div class="col-sm-10">
              <input type="text" class="form-control" name="vendor_name" id="vendor_name" value="<?= Input::get('vendor_name')?>" placeholder="Enter your vendor name">
          </div>
        <label for="location_city_code" class="col-sm-2 control-label">Vendor Location: City</label>
          <div class="col-sm-10">
              <Input type="text" class="form-control" name="location_city_code" id="location_city_code" value="<?= Input::get('location_city_code')?>" placeholder="Enter city in which vendor is located">
          </div>
          <label for="location_state_code" class="col-sm-2 control-label">Vendor Location: State</label>
          <div class="col-sm-10">
              <Input type="text" class="form-control" name="location_state_code" id="location_state_code" value="<?= Input::get('location_state_code')?>" placeholder="Enter state in which vendor is located">
          </div>
          <label for="location_zip_code" class="col-sm-2 control-label">Vendor Location: Zip Code</label>
          <div class="col-sm-10">
              <Input type="text" class="form-control" name="location_zip_code" id="location_zip_code" value="<?= Input::get('location_zip_code')?>" placeholder="Enter zip code in which vendor is located">
          </div>
          <label for="product_category" class="col-sm-2 control-label">Product Category</label>
          <div class="col-sm-10">
              <Input type="text" class="form-control" name="product_category" id="product_category" value="<?= Input::get('product_category')?>" placeholder="Enter product catgegory">
          </div>
          <label for="product_origin" class="col-sm-2 control-label">Product Origin</label>
          <div class="col-sm-10">
              <Input type="text" class="form-control" name="product_origin" id="product_origin" value="<?= Input::get('product_origin')?>" placeholder="Enter product origin by country or location">
          </div>
          <label for="product_style" class="col-sm-2 control-label">Product Style</label>
          <div class="col-sm-10">
              <Input type="text" class="form-control" name="product_style" id="product_style" value="<?= Input::get('product_style')?>" placeholder="Enter product style">
          </div>
    		<label for="vintage_year" class="col-sm-2 control-label">Vintage Year</label>
    			<div class="col-sm-10">
      				<Input type="date" class="form-control" name="vintage_year" id="vintage_year" value="<?= Input::get('vintage_year')?>" placeholder="Enter date park was established">
    			</div>
    		<label for="price" class="col-sm-2 control-label">Price</label>
    			<div class="col-sm-10">
      				<Input type="text" class="form-control" name="price" id="price" value="<?= Input::get('price')?>" placeholder="Enter area in acres without commas">
    			</div>
    		<label for="description" class="col-sm-2 control-label">Description of Product</label>
    			<div class="col-sm-10">
      				<Input type="textarea" class="form-control" name="description" id="description" value="<?= Input::get('decription')?>" placeholder="Enter description of park">
    			</div>
    	</div>
    	<button type="submit" class="btn btn-primary">Add New Ad</button>
	</form>
</div>
</body>
</html>
</body>
</html>