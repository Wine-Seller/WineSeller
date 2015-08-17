<?php
require '../views/partials/navbar.php';

if(isset($_POST['submit'])){ 
if(isset($_GET['go'])){
$dbc = new PDO('mysql:host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_NAME'], $_ENV['DB_USER'], $_ENV['DB_PASS']);
$sql="SELECT * FROM ads WHERE vendor_name LIKE '%e%'";
$result=mysql_query($sql);
	
	}else{ 
	echo  "<p>Please enter a search query</p>"; 
}
}



?>