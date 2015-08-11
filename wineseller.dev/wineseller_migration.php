<?php
require 'db_connect.php';

$dbc = new PDO('mysql:host=127.0.0.1;dbname=wineseller_db', 'wineseller_JB', '');

/*Use exec() to delete a table named national_parks using DROP TABLE IF EXISTS.*/

$dropTable = 'DROP TABLE IF EXISTS national_parks ()';

$dbc->exec($dropTable);

?>