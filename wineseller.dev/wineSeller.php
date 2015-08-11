<?php

/*require_once 'configUser_db.php';*/
/*require_once '../Input.php';
require_once 'wineSellerDBmodel.php';*/

define("DB_HOST", '127.0.0.1');
define("DB_NAME", 'wineseller_db');
define("DB_USER", 'jb_user');
define("DB_PASS", '');

class Model 
{
    protected static $dbc;
    protected static $table;

    public $attributes = array();

    /*Constructor*/
    public function __construct()
    {
        self::dbConnect();
    }

    /*changing private to protected so allows inheritance & can define which DB table points to without hard coding per specific table name*/
    protected static function dbConnect()
    {
        /* if not already connected, go to next line & connect; singleton pattern - only want one instance of db connection
        if changed to static would allow override which we don't want
        could past contents of configUser_db.php here instead of requiring once at top*/
        if(!self::$dbc)
        {
            /*    @TODO: Connect to database: user_db; name codeup; password codeup*/    
            self::$dbc = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);

            /*<!-- Make sure that instance will use exceptions rather than failing silently.-->*/
            self::$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    }

    /* * Get a value from attributes based on name*/ 
    // Magic getter to retrieve values from $data

    public function __get($name)
    {
    // @TODO: Return the value from attributes with a matching $name, if it exists
    // Check for existence of array key $name
        if (array_key_exists($name, $this->attributes)) {
            return $this->attributes[$name];    
        }
        return null;
    }

    /* * Set a new attribute for the object*/
    public function __set($name, $value)
    {
    // @TODO: Store name/value pair in attributes array
    // Magic setter to populate $data array - will reassign value of key if doesn't exist
        $this->attributes[$name] = $value;
    }
}

?>