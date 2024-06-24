<?php

// Start the session
session_start();

// Check for errors in session and retrieve them
if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
    // Clear errors from session after retrieving
    unset($_SESSION['errors']);
} else {
    $errors = array();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags for character encoding and viewport settings -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title of the signup validation page -->
    <title>Sign up validation</title>
    <!-- Link to the external CSS stylesheet -->
    <link rel="stylesheet" href="../../CSS/signup-validation-style.css">
</head>

<body>
    <!-- Main container for the signup validation page -->
    <div class="main">
        <!-- Background image -->
        <img src="../../Images/slides-background.jpg" alt="" id="background-img">
        <!-- Display container for messages -->
        <div class="display">
            <?php
            if (!empty($errors)) {
                // If there are errors, display them
                ?>
                <div class="header">
                    <h1>Error 404:</h1>
                    <h2>Sanity not found. Check your inputs!</h2>
                </div>
                <?php
                // List each error
                echo '<ul class="error">';
                foreach ($errors as $error) {
                    echo '<li>' . htmlspecialchars($error) . '</li>';
                }
                echo '</ul>';

                ?>
                <!-- Button to go back to signup page -->
                <div class="login">
                    <a href="signup-page.php"><button>Go back</button></a>
                </div>
                <?php
            } else {
                // If there are no errors, display success message
                ?>
                <div class="header">
                    <h1>Congrats!</h1>
                    <h3>Your account was successfully created.</h3>
                </div>
                <!-- Button to go to login page -->
                <div class="login">
                    <a href="../login/login-page.php"><button>Login now</button></a>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</body>

</html>