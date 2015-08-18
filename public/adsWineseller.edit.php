<?php

require_once '../bootstrap.php';

/*edit file is index and show files together*/  


$id=Input::get('id');

$ad=Ad::find($id);

/*On each page load, retrieve and display all records from the database; code as in adsWinesellerIndex.php*/
  
foreach($ads as $ad) {
    $ad['title']; 
    $ad['vendor']; 
    $ad['state']; 
    $ad['zip']; 
    $ad['category']; 
    $ad['style']; 
    $ad['origin']; 
    $ad['vintage']; 
    $ad['price']; 
    $ad['description']; 
  }

  unset($ad);

/*if input has name and location then submit call to update method or call save*/

if(Input::has('title') && Input::has('vendor')) {
    $ad = new Ad();
    try {
      $ad->vendor = Input::getString('vendor', 1, 100);
      } catch(Exception $e) {
        /*below is the same as calling array push*/
        $errors[] = $e->getMessage();
      }
    try {
      $ad->city = Input::getString('city', 1, 100);
      } catch(Exception $e) {
        $errors[] = $e->getMessage();
      }
    try {
      $ad->state = Input::getString('state', 1, 100);
      } catch(Exception $e) {
        $errors[] = $e->getMessage();
      }
    try {
      $ad->zip = Input::getString('zip', 1, 100);
      } catch(Exception $e) {
        $errors[] = $e->getMessage();
      }
    try {
      $ad->category = Input::getNumber('category', 4, 8);
      } catch(Exception $e) {
        $errors[] = $e->getMessage();
      }

    try {
      $ad->style = Input::getNumber('style', 1, 25);
      } catch(Exception $e) {
        $errors[] = $e->getMessage();
      }

      try {
      $ad->origin = Input::getNumber('origin', 1, 25);
      } catch(Exception $e) {
        $errors[] = $e->getMessage();
      }

      try {
      $ad->vintage = Input::getNumber('vintage', 1, 25);
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

      $ad->post_date = date('Y-m-d h:i');

    $ad->save();
    /*model then handles the save on object*/
  }

  var_dump($_REQUEST);

?>


<html>
<head>
  <title>Edit an Existing Wineseller Ad</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
        
            <link rel="stylesheet" href="bootstrap.css">
            <link rel="stylesheet" href="bootstrap.min.css">
            <link rel="stylesheet" href="../css/wineseller.css">
      <meta charset="utf-8">
</head>
<body>
  <?php require_once '../views/partials/header.php'; ?>
  <?php require_once '../views/partials/navbar.php'; ?>
<div class="container">
  <h1>Edit an Existing Ad</h1>
  <!-- <h3><?= $errorMessage ?></h3> -->

<!--   set value attribute on each input inside the actual input element; id is coming from get request -->
  <form  class="form-horizontal" method="POST" action="adsWinesellerEdit.php">
    <div class="form-group">
      <label for="title" class="col-sm-2 control-label">Vendor Name</label>
          <div class="col-sm-10">
              <input type="text" class="form-control" name="title" id="title" value="<?= Input::get('title')?>" placeholder="Enter a brief product title">
          </div>
        <label for="vendor" class="col-sm-2 control-label">Vendor Name</label>
          <div class="col-sm-10">
              <input type="text" class="form-control" name="vendor" id="vendor" value="<?= Input::get('vendor')?>" placeholder="Enter your vendor name">
          </div>
        <label for="city" class="col-sm-2 control-label">Vendor Location: City</label>
          <div class="col-sm-10">
              <Input type="text" class="form-control" name="city" id="city" value="<?= Input::get('city')?>" placeholder="Enter city in which vendor is located">
          </div>
          <label for="state" class="col-sm-2 control-label">Vendor Location: State</label>
          <div class="col-sm-10">
              <Input type="text" class="form-control" name="state" id="state" value="<?= Input::get('state')?>" placeholder="Enter state in which vendor is located">
          </div>
          <label for="zip" class="col-sm-2 control-label">Vendor Location: Zip Code</label>
          <div class="col-sm-10">
              <Input type="text" class="form-control" name="zip" id="zip" value="<?= Input::get('zip')?>" placeholder="Enter zip code in which vendor is located">
          </div>
          <label for="category" class="col-sm-2 control-label">Product Category</label>
          <div class="col-sm-10">
              <Input type="text" class="form-control" name="category" id="category" value="<?= Input::get('category')?>" placeholder="Enter product catgegory">
          </div>
          <label for="origin" class="col-sm-2 control-label">Product Origin</label>
          <div class="col-sm-10">
              <Input type="text" class="form-control" name="origin" id="origin" value="<?= Input::get('origin')?>" placeholder="Enter product origin by country or location">
          </div>
          <label for="style" class="col-sm-2 control-label">Product Style</label>
          <div class="col-sm-10">
              <Input type="text" class="form-control" name="style" id="style" value="<?= Input::get('style')?>" placeholder="Enter product style">
          </div>
    		<label for="vintage" class="col-sm-2 control-label">Vintage Year</label>
    			<div class="col-sm-10">
      				<Input type="date" class="form-control" name="vintage" id="vintage" value="<?= Input::get('vintage')?>" placeholder="Enter date park was established">
    			</div>
    		<label for="price" class="col-sm-2 control-label">Price</label>
    			<div class="col-sm-10">
      				<Input type="text" class="form-control" name="price" id="price" value="<?= Input::get('price')?>" placeholder="Enter area in acres without commas">
    			</div>
    		<label for="description" class="col-sm-2 control-label">Description of Product</label>
    			<div class="col-sm-10">
      				<Input type="textarea" class="form-control" name="description" id="description" value="<?= Input::get('description')?>" placeholder="Enter description of park">
    			</div>
    	</div>
    	<button type="submit" class="btn btn-primary">Submit to Update Ad</button>
	</form>
</div>
<div class = "footer">
    <?php include ("../views/partials/footer.php");?>
</div>
</body>
</html>
