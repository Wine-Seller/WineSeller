<?php
/*clicking on login links to this login authorization page*/

require_once '../bootstrap.php';

	class Auth
	{
		// create a logged-in session if user provides the correct username and password
		public static function attempt($username, $password)
		{
			$correctCredentials = User::verifyLogin($username, $password);
			if(!$correctCredentials){
				// log result to a log tracking file
				$logInFailure = new Log;
				$logInFailure->logError("User $username failed to log in!");
				return false;
			} else {
				// clear session array of any data from previous sessions
				$_SESSION = array();
				// store user's username to pass to next page
				$_SESSION['LOGGED_IN_USER'] = $username;
				// log result to a log tracking file
				$loggedIn = new Log;
				$loggedIn->logInfo("User $username logged in successfully.");
				return true;
			}
		}
		// boolean true or false - is user logged in?
		public static function check()
		{
			return isset($_SESSION['LOGGED_IN_USER']);
		}
		// return username 
		public static function user()
		{
			$username = $_SESSION['LOGGED_IN_USER'];
			// obtain user_id and email through username
			$userArray = User::getUserInfo($username);
			return $userArray;
		}
		public static function logout()
		{
			// Unset session variables.
		    $_SESSION = array();
		    
		    // Destroy  session and delete cookies
		    if (ini_get("session.use_cookies")) {
		        $params = session_get_cookie_params();
		        setcookie(session_name(), '', time() - 42000,
		            $params["path"], $params["domain"],
		            $params["secure"], $params["httponly"]
		        );
		    }
		    session_destroy();
		}
	}
?>