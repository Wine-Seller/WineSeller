<?php

require_once '../bootstrap.php';
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
        could paste contents of configUser_db.php here instead of requiring once at top*/
        if(!self::$dbc)
        {
            /*    @TODO: Connect to database: user_db; name codeup; password codeup*/    
            self::$dbc = new PDO('mysql:host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_NAME'], $_ENV['DB_USER'], $_ENV['DB_PASS']);


        // Make sure that instance will use exceptions rather than failing silently.
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



        /*     * Persist the object to the database*/ 
    public function save()
    {
        // Ensure there are attributes before attempting to save
        if(isset($this->attributes)) {
        // Perform the proper action - if the `id` is set, this is an update, if not it is a insert
        // Ensure that update is properly handled with the id key
            if (isset($this->attributes['id'])) {
                $this->update();
            } else {
                $this->insert();
            }
        }
        /*need for when add data, need new connection to save it*/
        self::dbConnect();
    }

}

?>