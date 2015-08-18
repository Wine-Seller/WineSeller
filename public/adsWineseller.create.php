<?php

require_once '../bootstrap.php';

/*code to enable upload of images; can check for certain image types and only allow - can take a timestamp, string to time index 
helps prevent duplicate uploads*/

/*var_dump($_FILES);*/

if($_FILES) {
    $uploads_directory = 'img/uploads/';
    $filename = $uploads_directory . basename($_FILES['somefile']['name']);
    if (move_uploaded_file($_FILES['somefile']['tmp_name'], $filename)) {
        echo '<p>The file '. basename( $_FILES['somefile']['name']). ' has been uploaded.</p>';
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

/*check if field has been submitted and input has correct value THEN make a new AD object
- assign properties and try to save to DB- build out in php - require post input for all fields*/

if(!empty($_POST)) {
  if (Input::has('title') && 
    Input::has('vendor') &&
    Input::has('category') &&
    Input::has('price') &&
    Input::has('description')) {
      $ad = new Ad();
      $ad->title = Input::get('title');
      $ad->vendor = Input::get('vendor');
      $ad->city = Input::get('city');
      $ad->state = Input::get('state');
      $ad->zip = Input::get('zip');
      $ad->category = Input::get('category');
      $ad->origin = Input::get('origin');
      $ad->style = Input::get('style');
      $ad->vintage = Input::get('vintage');
      $ad->price = Input::get('price');
      $ad->description = Input::get('description');
      $ad->image = $filename;
      $ad->post_date = date('Y-m-d h:i');
      $ad->insert();
      
    // $stmt->execute();

      /*   reset form and tell user their post was successfully added - send user to page which shows list of index page to see add*/
      /*echo "<h3>Your info was added to our cellar. You will be redirected to the show page to view your new ad.</h3>";*/
/*      a href="../adsWineseller.index.php"><img class = "displayed cellarImage" src="../img/visitWineCellar.jpg"><h4 class = "show Cellar">Visit the Cellar to View Your Ad</h4></img></a></div>;*/
      
      header("Location: /adsWineseller.index.php");
      exit();
    }
}



?>

<!DOCTYPE html>
<html>
<head>
  <title>adsWineseller.create - upload form with image</title>

  <link rel="stylesheet" href="bootstrap.css">
  <link rel="stylesheet" href="../css/wineseller.css">

</head>
<body>
  <?php require_once '../views/partials/header.php'; ?>

  <?php require_once '../views/partials/navbar.php';?> 

<div class="container">
  <div class="insertAd">
  <h3>Insert a New Wineseller Ad</h3> * Required field
</div>
  <form  class="form-horizontal" method="POST" action="adsWineseller.create.php" enctype="multipart/form-data">
    <div class="form-group">
      <label for="title" class="col-md-6 control-label">* Product Title</label>
          <div class="col-md-6">
              <input type="text" class="form-control" name="title" id="title" placeholder="Enter a brief title for your product | required field">
        </div>
        <label for="vendor" class="col-md-6 control-label">* Vendor Name</label>
          <div class="col-md-6">
              <input type="text" class="form-control" name="vendor" id="vendor" placeholder="Enter your vendor name | required field">
        </div>


          <label for="city" class="col-md-6 control-label">Vendor Location: City</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="city" id="city" placeholder="Enter city in which vendor is located">
          </div>

          <label for="state" class="col-md-6 control-label">Vendor Location: State</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="state" id="state" placeholder="Enter state in which vendor is located">
          </div>

          <label for="zip" class="col-md-6 control-label">Vendor Location: Zip Code</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="zip" id="zip" placeholder="Enter zip code in which vendor is located">
          </div>

          <label for="category" class="col-md-6 control-label">* Product Category</label>

         <!--  <select>
            <option value="Wine">Wine</option>
            <option value="Glassware">Glassware</option>
            <option value="Accessories">Accessories</option>
          </select> -->
            <div class = "col-md-6">
              <input type="text" class="form-control" name="category" id="category" placeholder="Enter product catgegory">
          </div>

          <label for="origin" class="col-md-6 control-label">Product Origin</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="origin" id="origin" placeholder="Enter product origin by country or location">
          </div>

          <label for="style" class="col-md-6 control-label">Product Style</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="style" id="style" placeholder="Enter product style">
          </div>

        <label for="vintage" class="col-md-6 control-label">Vintage Year</label>
          <div class="col-md-6">
              <input type="number" class="form-control" name="vintage_date" id="vintage_date" placeholder="Enter vintage year if applicable">
          </div>

        <label for="price" class="col-md-6 control-label">* Price</label>
          <div class="col-md-6">
              <input type="text" class="form-control" name="price" id="price" placeholder="Enter price of product">
          </div>

        <label for="description" class="col-md-6 control-label">* Description of Product</label>
          <div class="col-md-6">
              <input type="textarea" class="form-control" rows="10" name="description" id="description" placeholder="Enter description of product">
          </div>

        <label for="image" class="col-md-6 control-label"> Upload Product Image</label>
          <div class="col-md-6">             
            --> Browse <input type="file" name="somefile">
          </div>
          <p></p>
        <div class="btn btn-default btn-file createAd">
            <input type="submit" class="btn btn-primary btn-lg">Create New Wineseller Ad</button>
        </div>

  </form>
</div>

</body>
</html>
 <div class = "footer">
    <?php include ("../views/partials/footer.php");?>
</div>
</body>
</html>