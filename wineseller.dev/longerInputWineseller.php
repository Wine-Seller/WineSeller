<?php

class Input
{
    /**
     * Check if a given value was passed in the request
     *
     * @param string $key index to look for in request
     * @return boolean whether value exists in $_POST or $_GET
     */

    public static function has($key)
    {
        // TODO: Fill in this function
        return isset($_REQUEST[$key]) ? true : false;
    }
        
    /**
     * Get a requested value from either $_POST or $_GET
     *
     * @param string $key index to look for in index
     * @param mixed $default default value to return if key not found
     * @return mixed value passed in request
     */

    public static function get($key, $default = null)
    {        
        // TODO: Fill in this function
        if (isset($_REQUEST[$key])){
            return $_REQUEST[$key];
        } else {
            return null;
        }   
    }
/*    Each of these methods should use the get() method 
internally to retrieve the value from $_POST or $_GET. 
If the values does not exist, or match the expected type, 
throw an exception.*/    
    
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
ensures applies to the same class; staticc::$whatever is just like $this->whatever
use static::get() on the class definition the way you would use this to refer to class itself
if any chance will extend function later to new children, use static*/

    /*Update your getString() and getNumber() methods to each take two optional parameters: $min and $max*/
    public static function getString($key, $min = '', $max = '')
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
        
        if(!is_numeric($value)) {
            throw new Exception('Input must be a string');
        }
        /*If a string is shorter than $min or longer than $max, throw a LengthException*/
        if (is_string <$min || is_string >$max) {
            throw new LengthException('Input out of number range. Input was: ' .$min . $max);

        }
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



    ///////////////////////////////////////////////////////////////////////////
    //                      DO NOT EDIT ANYTHING BELOW!!                     //
    // The Input class should not ever be instantiated, so we prevent the    //
    // constructor method from being called. We will be covering private     //
    // later in the curriculum.                                              //
    ///////////////////////////////////////////////////////////////////////////
    private function __construct() {}
}
