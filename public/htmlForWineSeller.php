
<!DOCTYPE html>

<html>
<head>
	<title>Welcome To The Wine Seller</title>

</head>
<p><h2>Welcome To The Wine Seller</h2></p>

</head>
<body>

<div class='Wine'>Wine</div>
<!--picture-->
<div class ="Glassware">Glassware</div>
<!--picture-->
<div class ="Accessories">Accessories</div>
<!--picture-->
<div class ="Featured Listings">Featured Listings</div>
<!--pictures in a carosel?-->

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


</body>
</html>
