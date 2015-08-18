<!-- Displays a login form for the user, calls the Auth class, starts a session,and redirects to site upon success -->

<?php
	// Bootstrap includes classes and starts a session for page
	require_once '../bootstrap.php';
	// If user is already logged in, redirect to profile page
	if(Auth::check()){
		header("Location: users.show.php");
		exit();
	}
	// If user is not logged in, ask for username and password; ternary 
	$username = Input::has('username') ? Input::get('username') : '';
	$password = Input::has('password') ? Input::get('password') : '';
	$errorMessage = '';
	// Verify username and password; if match, refresh and exit 
	if(isset($_POST['login'])) {
		Auth::attempt($username, $password);
		if(isset($_SESSION['LOGGED_IN_USER'])){
			// Page needs to reload so browser can register $_SESSION sent from modal
			header("Location: http://adlister.dev" . $_SERVER['PHP_SELF']);
			exit();
	// If login fails, send error message to user
		} else {
			$errorMessage = "Username or password is incorrect";
		}
	}
?>


<?php if(!empty($errorMessage)): ?>
	<h1><?= $errorMessage; ?></h1>
<?php endif; ?>

<html>
<head>
  <title>adsWineseller.create</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
 
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="../css/wineseller.css">
     <meta charset="utf-8">
</head>
<body>
  <?php require_once '../views/partials/header.php'; ?>
  <?php include ("../views/partials/navbar.php");?> 

<h2 id="login">Log in to Wineseller</h2>
<form method="POST" action="">
	<label for="name">Username</label>
	<input type="text" name="username" id="name" />
	<label for="pswd">Password</label>
	<input type="password" name="password" id="pswd" />
	<!-- <label for="age">Password</label>
	<input type="text" name="password" id="age" /> -->
	<input type="submit" class="button small radius" name='login' value="Submit" />
</form>
</body>
</html>
 <div class = "footer">
    <?php include ("../views/partials/footer.php");?>
</div>
</body>
</html>
