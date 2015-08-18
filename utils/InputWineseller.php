<?php

class Input
{
    /*Check if a given value was passed in the request; Get a requested value from either $_POST or $_GET
    @param string $key index to look for in request
    @return boolean which tells whether value exists in $_POST or $_GET*/

    public static function has($key)
    {
        return isset($_REQUEST[$key]) ? true : false;
    }

    /* param mixed; $default sets null default value to return if key not found*/
    public static function get($key, $default = NULL)
    {               
    /* return mixed value passed in request*/
        if (isset($_REQUEST[$key])){
            return $_REQUEST[$key];
        } else {
            return null;
        }  
    }
        /*    Each of these methods should use the get() method internally to retrieve the value from $_POST or $_GET. 
        If the values does not exist, or match the expected type, throw an exception.*/    
    
    public static function getDate($key)
    {
            $value = static::get($key);
            $format = 'Y-m-d';

            $dateObject = DateTime::createfromFormat($format, $value);

            if($dateObject) {
                return $dateObject->date;
            } else {
                throw new Exception('This must be a valid date. Date format must be Y-m-d');
            }
    }
        /*static works like $this but for static methods and properties
        ensures applies to the same class; static::$something is just like $this->something
        use static::get() on the class definition the way you would use this to refer to class itself
        if any chance will extend function later to new children, use static*/

        /*Update your getString() and getNumber() methods to each take two optional parameters: $min and $max*/
    public static function getString($key, $min = NULL, $max = NULL)
    {
        /*trim removes spaces on left and right*/
        $value = trim(static::get($key));

        /*        If $key is not a string, or $min & $max are not numbers, 
        throw an InvalidArgumentException.*/

        if(!is_int($min))
            throw new InvalidArgumentException('$min only accepts integers. Input was: '.$min);

        if(!is_int($max))
            throw new InvalidArgumentException('$max only accepts integers. Input was: '.$max);

        if(!is_string($key))
            throw new InvalidArgumentException('key must be a string. Input was: '.$key);

        $isString = settype($value, 'string');
        if (!isset($value)) {
            throw new Exception('Input cannot be null');
        }
        if(!is_string($value) || !isset($value) || is_numeric($value)){
            throw new DomainException("$key input must be a string!");
        }

       /* if(!is_numeric($value)) {
            throw new Exception('Input must be a string');
        }*/
        /*If a string is shorter than $min or longer than $max, throw a LengthException*/
        if(strlen($value) < $min || strlen($value) > $max){
            throw new LengthException("$key input must be between $min and $max characters long.");
        }
       /* if (is_string <$min || is_string >$max) {
            throw new LengthException('Input out of number range. Input was: ' .$min . $max);

        }*/
        return $value;
    }

    public static function getNumber($key, $min = '', $max = '') 
    {
        $value = trim(static::get($key));
        
        /*strip commas if user enters numbers with commas*/
        $value = str_replace(',', '', static::get($key));

         if(!is_int($min))
            throw new InvalidArgumentException('$min only accepts integers. Input was: '.$min);

        if(!is_int($max))
            throw new InvalidArgumentException('$max only accepts integers. Input was: '.$max);

        if(!is_string($key))
            throw new InvalidArgumentException('key must be a string. Input was: '.$key);

        $value = static::get($key);
        /*If the requested key is missing from the input, throw an OutOfRangeException*/
        /*Exception thrown when an illegal index was requested.*/
        if (!isset($value)) {
            throw new OutOfRangeException('Input cannot be null');
        }
        /*If the value is the wrong type, throw a DomainException*/
        if(!is_numeric($value)) {
            throw new DomainException('Input must be a number Input was: ' . $value);
        }
        /*If a number is less than $min or larger than $max, throw a RangeException*/
        if (is_number <$min || is_number >$max) {
            throw new RangeException('Input out of number range.');
        }
        return $value;

    }

    public static function validateEmail($key)    
    {
        $email = self::get($key);
        // Check for @ symbol, and confirm lengths are the same or throw exception for invalid email format
        if (!preg_match("/^[^@]{1,64}@[^@]{1,255}$/", $email)) {
            throw new Exception ('Invalid email format');
        }
        
        $email_array = explode("@", $email);
        $local_array = explode(".", $email_array[0]);
        for ($i = 0; $i < sizeof($local_array); $i++) {
            if (!preg_match("/^(([A-Za-z0-9!#$%&'*+\/=?^_`{|}~-][A-Za-z0-9!#$%&'*+\/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$/", $local_array[$i])) {
                throw new Exception ('Invalid email format');
            }
        }
        if (!preg_match("/^\[?[0-9\.]+\]?$/", $email_array[1])) { // Check if domain is IP. If not, it should be valid domain name
            $domain_array = explode(".", $email_array[1]);
            if (sizeof($domain_array) < 2) {
                throw new Exception ('Invalid email domain'); // Not enough parts to domain
            }
            for ($i = 0; $i < sizeof($domain_array); $i++) {
                if (!preg_match("/^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$/", $domain_array[$i])) {
                    throw new Exception ('Invalid email format');
                }
            }
        }
        return $email;
     
    }

        public static function areIdentical($key1, $key2)
    {
        $value1 = self::get($key1);
        $value2 = self::get($key2);
        if ($value1 === $value2) {
            return true;
        } else {
            throw new Exception("{$key1}: $value1 and {$key2}: $value2 are not identical.");
        }
    }


    ///////////////////////////////////////////////////////////////////////////
    //                      DO NOT EDIT ANYTHING BELOW!!                     //
    // The Input class should not ever be instantiated, so we prevent the    //
    // constructor method from being called. We will be covering private     //
    // later in the curriculum.                                              //
    ///////////////////////////////////////////////////////////////////////////
    private function __construct() {}
}