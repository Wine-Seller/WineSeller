<?php
// site initialization
define("DB_HOST", '127.0.0.1');
define("DB_NAME", 'wineseller');
define("DB_USER", 'wineseller_JB');
define("DB_PASS", '');

$dbc = new PDO('mysql:host=127.0.0.1;dbname=wineseller', 'wineseller_JB', '');

/*$dbc = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);*/
$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

/*require_once '/database/db_connect.php';*/
/*require_once '/database/config.php';*/
require_once 'utils/InputWineseller.php';
require_once 'utils/AuthWineseller.php';
require_once 'utils/LoggerWineseller.php';
require_once 'models/AdModelWineseller.php';
require_once 'models/UserModelWineseller.php';
require_once 'models/baseModelWineseller.php';
?>