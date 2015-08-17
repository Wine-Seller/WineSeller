<?php
// site initialization
$_ENV = require_once '.env.php';


$dbc = new PDO('mysql:host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_NAME'], $_ENV['DB_USER'], $_ENV['DB_PASS']);


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