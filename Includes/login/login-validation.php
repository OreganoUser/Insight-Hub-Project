<?php

// Start the session
session_start();

// Check for and retrieve errors from the session
if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
    unset($_SESSION['errors']); // Clear errors from session after retrieving
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
    <!-- Title of the login validation page -->
    <title>Login validation</title>
    <!-- Link to the external CSS stylesheet -->
    <link rel="stylesheet" href="../../CSS/signup-validation-style.css">
</head>

<body>
    <!-- Main container for the validation page -->
    <div class="main">
        <!-- Background image for the validation page -->
        <img src="../../Images/slides-background.jpg" alt="" id="background-img">
        <!-- Container for displaying validation messages -->
        <div class="display">
            <?php
            // Check if there are errors and display them
            if (!empty($errors)) {
                ?>
                <div class="header">
                    <h1>Error 404:</h1>
                    <h2>Sanity not found. Check your inputs!</h2>
                </div>
                <?php
                echo '<ul class="error">';
                foreach ($errors as $error) {
                    echo '<li>' . htmlspecialchars($error) . '</li>';
                }
                echo '</ul>';

                ?>
                <!-- Button to go back to the login page -->
                <div class="login">
                    <a href="login-page.php"><button>Go back</button></a>
                </div>
                <?php
            } else {
                // Display success message if no errors
                ?>
                <div class="header">
                    <h1>Congrats!</h1>
                    <h3>You are successfully logged in.</h3>
                </div>
                <!-- Button to proceed to the main page -->
                <div class="login">
                    <a href="../main/main-page.php"><button>Go on!</button></a>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</body>

</html>