<?php

class Log
{
	public static $filename;
	public static $handle;

	public function __construct($prefix = 'log') {
		/*Set the $filename property of the class to $prefix-YYYY-MM-DD.log
		$this->filename lets you access filename*/
		self::filename = $prefix . date('Y-m-d') . '.log';
	
/*Open the $filename for appending and assign the file pointer 
to the property $handle - $handle is a local variable, can't access from other functions
$this->handles allows access*/
		self::handle = fopen(self::filename, 'a');
	}

	public static function logMessage($logLevel, $message) 
/*	Update logMessage(); it should no longer need to open and close 
its own file handle, instead use the $handle property.*/
	{
		/*Each entry is formatted YYYY-MM-DD HH:MM:SS [LEVEL] MESSAGE */
		$stringToWrite = PHP_EOL . "[{$logLevel}] $message";
		fwrite(self::handle, $stringToWrite);
	}

/*	Add a destructor to close $handle when the class is destroyed.*/
	public function __destruct() 
	{
		fclose(self::handle);
	}
}

$log = new Log();
$log->logMessage('INFO', 'this info message is working');
unset($log);

?>