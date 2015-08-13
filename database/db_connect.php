<?php
require_once "config.php"; 
/**
 * Get new instance of PDO object
 * DB_* Constants should be defined in the script before db_connect.php is required.
 */
$dbc = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);

// Tell PDO to throw exceptions on error
/*$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);*/