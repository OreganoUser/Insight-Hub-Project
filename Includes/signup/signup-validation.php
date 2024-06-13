<?php

//Start the session
session_start();

//Errors are being displayed if there are any

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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up validation</title>
    <link rel="stylesheet" href="../../CSS/signup-validation-style.css">
</head>

<body>
    <div class="main">
        <img src="../../Images/slides-background.jpg" alt="" id="background-img">
        <div class="display">
            <?php
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
                <div class="login">
                    <a href="signup-page.php"><button>Go back</button></a>
                </div>
                <?php
            } else {
                ?>
                <div class="header">
                    <h1>Congrats!</h1>
                    <h3>Your account was successfully created.</h3>
                </div>
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