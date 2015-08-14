<?php

require_once '../bootstrap.php';

  // If user is already logged in, redirect to profile page
  if(Auth::check()){
    header("Location: users.show.php");
    exit();
  }

    // if there is data submited from form, save it to the array 
    $savedInput = ['username'=>'', 'password'=>'', 'checkPswd'=>'', 'contactEmail'=>''];
    if(isset($_POST['create'])) {
        // replace initial values of user input array with $_POST data
        $savedInput = array_replace($savedInput, $_POST);   
    }

      // initialize an array to catch all the generic errors, and another to hold any custom messages for display
    $errors = [];
    $errorMessages = ['username'=>'', 'password'=>'', 'checkPswd'=>'', 'contactEmail'=>''];


    // Retrieve and sanitize user input into 'Create an Ad' form, retrieve and display any errors that occur
    if (!empty($_POST)) {

        try {

            $newUsername = Input::getString('username', 2, 25);

        } catch (DomainException $e) {
            $errors[] = $e->getMessage();
            $errorMessages['username'] = "The username must be an alphanumeric string of characters.";
        } catch (LengthException $e) {
            $errors[] = $e->getMessage();
            $errorMessages['username'] = "The username must be between 2 and 75 characters long.";
        } catch (Exception $e) {
            $errors[] = $e->getMessage();
            $errorMessages['username'] = "Woops, an error occured, please try entering a different username.";
        }

        try {

            $newPassword = Input::getString('password', 8, 75);

        } catch (DomainException $e) {
            $errors[] = $e->getMessage();
            $errorMessages['password'] = "The password must be an alphanumeric string of characters.";
        } catch (LengthException $e) {
            $errors[] = $e->getMessage();
            $errorMessages['password'] = "The password must be at least 8 characters long.";
        } catch (Exception $e) {
            $errors[] = $e->getMessage();
            $errorMessages['password'] = "Woops! An error occured, please try again.";
        }

        try {
            // Make sure both passwords entered are identical
            Input::areIdentical('password', 'checkPswd');

        } catch (Exception $e) {
            $errors[] = $e->getMessage();
            $errorMessages['checkPswd'] = "Woops, passwords don't match.";
        }

        try {

            $newEmail = Input::validateEmail('contactEmail');

        } catch (Exception $e) {
            $errors[] = $e->getMessage();
            $errorMessages['contactEmail'] = "Invalid email format";
        }

        if (empty($errors)) {

            $user = new User;
            $user->username = $newUsername;
            $user->password = password_hash($newPassword, PASSWORD_DEFAULT);
            // add a try/catch and a method in BaseModel that checks to see if email already exists
            $user->contact_email = $newEmail;   
            $user->date_created = date('l\, F jS\, Y \a\t h:i:s A');    // current date/time of submission
            $user->save();

            // Reset the $savedInput array back to its original content so the form appears blank.
            $savedInput = ['username'=>'', 'password'=>'', 'contactEmail'=>''];

            // Log them in automatically, and take them to their profile page.
            Auth::attempt($newUsername, $newPassword);
            header("Location: users.show.php");
        }
    }
?>

<!doctype html>
<html lang="en-US" class="no-js">
<head>
  <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <!-- <link rel="stylesheet" href="../css/wineseller.css"> -->

    <meta charset="utf-8" />
<!--     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
 -->    <title>Create an Account with Wineseller</title>

<?php require_once '../views/partials/header.php'; ?>
</head>
<body>

<?php require_once '../views/partials/navbar.php'; ?>

<!-- HTML for create user form -->

<section class="form">
    <div class="row">
        <div class="small-12 columns">
            <h2>Create an Account</h2>
                <?php if(!empty($errors)){
                            echo "<span class='error'>*See errors below:</span>";
                    }
                ?>
            <form method="POST" action=''>
            <input type='text' name='username' value="<?= $savedInput['username']; ?>" placeholder='Username' required />
                 <?php if(!empty($errorMessages['username'])){
                                echo "<span class='error'>" . $errorMessages['username'] . "</span>";
                         }
                    ?>
            <input type='password' name='password' value="<?= $savedInput['password']; ?>" placeholder='Password' required />
                 <?php if(!empty($errorMessages['password'])){
                                echo "<span class='error'>" . $errorMessages['password'] . "</span>";
                         }
                    ?>
            <input type='password' name='checkPswd' value="<?= $savedInput['checkPswd']; ?>" placeholder='Confirm Password' required />
                 <?php if(!empty($errorMessages['checkPswd'])){
                                echo "<span class='error'>" . $errorMessages['checkPswd'] . "</span>";
                         }
                    ?>
            <input type='text' name='contactEmail' value="<?= $savedInput['contactEmail']; ?>" placeholder='Email' required />
                 <?php if(!empty($errorMessages['contactEmail'])){
                                echo "<span class='error'>" . $errorMessages['contactEmail'] . "</span>";
                         }
                    ?>

                <div class="row">
                    <div class="large-8 columns">
                        <input type='submit' name='create' value='Submit' class="button small radius">
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<?php require_once '../views/partials/footer.php'; ?>

</body>
</html>
