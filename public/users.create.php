<!-- Displays a form to create a user in the database -->

<?php
    // Require Classes and start a session for the page
    require_once '../bootstrap.php';
    // If user is already logged in, redirect to profile page and don't run rest of PHP
    if(Auth::check()){
        header("Location: users.show.php");
        exit();
    }
    // Array to hold user input in case of errors
    $savedInput = ['username'=>'', 'password'=>'', 'verifyPassword'=>'', 'email'=>'', 'age'=>''];
    // if there is data submited from form, save it to the array above
    if(isset($_POST['create'])) {
        $savedInput = array_replace($savedInput, $_POST);   // replace initial values of user input array with $_POST data
    }
    // initialize an array to catch all the generic errors, and another to hold any custom messages for display
    $errors = [];
    $errorMessages = ['username'=>'', 'password'=>'', 'verifyPassword'=>'', 'email'=>'', 'age'=>''];
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
            $errorMessages['username'] = "Sorry, username does not match";
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
            $errorMessages['password'] = "Sorry, password does not match";
        }
        try {
            // verify password
            Input::areIdentical('password', 'verifyPassword');
        } catch (Exception $e) {
            $errors[] = $e->getMessage();
            $errorMessages['verifyPassword'] = "Your password does not match";
        }
        try {
            $newEmail = Input::validateEmail('email');
        } catch (Exception $e) {
            $errors[] = $e->getMessage();
            $errorMessages['email'] = "Email is incorrect";
        }
        // insert if no errors
        if (empty($errors)) {
            $user = new User;
            $user->username = $newUsername;
            $user->password = password_hash($newPassword, PASSWORD_DEFAULT);
            $user->email = $newEmail;   
            $user->save();
            // Reset the $savedInput array to empty form fields 
            $savedInput = ['username'=>'', 'password'=>'', 'email'=>'', 'age'=>''];
            // Log user in and send to profile page.
            Auth::attempt($newUsername, $newPassword);
            header("Location: users.show.php");
        }
    }
?>

<!doctype html>
<html lang="en-US" class="no-js">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Create a Profile on Wineseller</title>

<?php require_once '../views/partials/header.php'; ?>
</head>
<body>

<?php require_once '../views/partials/navbar.php'; ?>

<section class="form">
    <div class="row">
        <div class="small-12 columns">
            <h2>Create a Profile on Wineseller</h2>
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
                <input type='password' name='verifyPassword' value="<?= $savedInput['verifyPassword']; ?>" placeholder='Confirm Password' required />
                   <?php if(!empty($errorMessages['verifyPassword'])){
                                echo "<span class='error'>" . $errorMessages['verifyPassword'] . "</span>";
                         }
                    ?>
                <input type='text' name='contactEmail' value="<?= $savedInput['email']; ?>" placeholder='Email' required />
                   <?php if(!empty($errorMessages['email'])){
                                echo "<span class='error'>" . $errorMessages['contactEmail'] . "</span>";
                         }
                    ?>

                <div class="row">
                    <div class="large-8 columns">
                        <input type='submit' name='create' value='Become a member of Wineseller' class="button small radius">
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<?php require_once '../views/partials/footer.php'; ?>

</body>
</html>