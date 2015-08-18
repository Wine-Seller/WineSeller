<!-- Displays a form to create a user in the database -->

<?php
    // Require Classes and start a session for the page
    require_once '../bootstrap.php';
    // If user is already logged in, redirect to profile page and don't run rest of PHP
    /*if(Auth::check()){
        header("Location: users.show.php");
        exit();
    }*/
    // if there is data submited from form, save it to the array above

    /*check if field has been submitted and input has correct value THEN make a new User object
    - assign properties and try to save to DB- build out in php - require post input for all fields*/
    if(!empty($_POST)) {
      if (Input::has('username') && 
        Input::has('password') &&
        Input::has('email') &&
        Input::has('age')) {
          $user = new User();
          $user->username = Input::get('username');
          $user->password = Input::get('password');
          $user->email = Input::get('email');
          $user->age = Input::get('age');
          $user->insert();
        }
    }

    var_dump($_POST);
    

?>

<!doctype html>
<html lang="en-US" class="no-js">
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
 
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="../css/wineseller.css">
     <meta charset="utf-8">
    <title>Create a User Profile on Wineseller</title>


</head>
<body>
<?php require_once '../views/partials/header.php'; ?>
<?php require_once '../views/partials/navbar.php'; ?>

<section class="form">
    <div class="row">
        <div class="small-12 columns">
            <h2>Create a Profile on Wineseller</h2>
               
            <form method="POST" action=''>

                <input type='text' name='username' value="['username']; ?>" placeholder='Username' required />
               
                <input type='password' name='password' value="['password']; ?>" placeholder='Password' required />
                  
                <input type='text' name='email' value="['email']; ?>" placeholder='Email' required />
                  
               <input type='text' name='age' value="['age']; ?>" placeholder='age' required />
                   
                    ?>
                <input type='submit' name='create' value='Become a member of Wineseller' class="button medium radius">
            </form>
        </div>
    </div>
</section>
<p></p>
<div>
<button><a href="../users.show.php"><img src="../img/visitCellar.jpg"><h4>Show Cellar Members</h4></img></a></button>
</div>


<?php require_once '../views/partials/footer.php'; ?>

</body>
</html>