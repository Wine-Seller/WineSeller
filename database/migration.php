<?php
require 'config.php'
$dbc = new PDO('mysql:host=127.0.0.1;dbname=wineseller', 'wineseller_ao','');
$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";




'DROP table IF EXISTS wineseller';
$query = "wineseller";
$dbc->exec($query);

CREATE TABLE products (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    vendor_name VARCHAR(100) NOT NULL,
    location_city_code VARCHAR(100) NOT NULL,
    state VARCHAR(100) NOT NULL,
    zip INT(100) NOT NULL,
    Product_Category VARCHAR(100) NOT NULL,
    prtoduct_style  VARCHAR(100) NOT NULL,
    Product origin DECIMAL(10,2)NOT NULL,
    vintage_date DATE,
    Price CHAR(255)NOT NULL,
    description VARCHAR(100) NOT NULL,
    PRIMARY KEY (id),
);