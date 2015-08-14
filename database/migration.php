<?php

require_once '../bootstrap.php';

$dbc = new PDO('mysql:host=127.0.0.1;dbname=wineseller', 'wineseller_JB', '');
$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";

$dropTable = 'DROP TABLE IF EXISTS ads';

/*$query = "wineseller";*/
/*$dbc->exec($query);*/

$dbc->exec($dropTable);

/*Create the query and assign to var*/
$createTable = "CREATE TABLE ads (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    vendor_name VARCHAR(100),
    location_city_code VARCHAR(100),
    location_state_code VARCHAR(100),
    location_zip_code VARCHAR(100),
    product_category VARCHAR(100),
    product_style  VARCHAR(100),
    product_origin VARCHAR(100),
    vintage_date INT,
    price DOUBLE(10, 2),
    description TEXT,
    image_url VARCHAR(100),
    PRIMARY KEY (id)
)";

$dbc->exec($createTable);

?>

