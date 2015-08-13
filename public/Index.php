
<?php

?>
<!DOCTYPE html>

<html>
<head>
    <title>Welcome To The Wine Seller</title>

</head>

<?php include ("../views/partials/header.php");?>
<?php include ("../views/partials/navbar.php");?>

<link rel="stylesheet" href="../css/wineseller.css">
<link rel="stylesheet" href="bootstarp.css">
<link rel="stylesheet" href="bootstarp.min.css">

</head>
<body>

<li><a href="/adsWineseller.index.php">View the Cellar</a></li>

<a href="something.css">Wine</a>
<a href="something.css">Glassware</a>
<a href="something.css">Accessories</a>

<div>
<!--Search Box-->
<p> Looking for something Specific? </p>
        <form method="POST" action="ads.show.php">
        <label for="Search">Search</label>
        <input id="Search" name="Search" type="text">
<p> In </p>
        <form method="POST" action="ads.show.php">
        <label for="Location">Location</label>
        <input id="Location" name="Location" type="text">
</div>

<button type="submit" class="btn btn-primary">Search The Cellar</button>

<div class = "Most_Popular">Most Popular Items</div>
    <label for="Most_popular">Select Our Most Popular: </label>
<select id="Mst_popular" name="Most_popular">
    <option>Chardonnay</option>
    <option>Pinot Noir</option>
    <option>Wine Aerator</option>
    <option>Wine Rack</option>

</select>


<div class = "Lucky">I'm Feeling Lucky</div>
<div class = "New_Arrivals">New Arrivals</div>

<?php include ("../views/partials/footer.php");?>

</body>
</html>
