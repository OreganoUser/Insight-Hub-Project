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
    <div class="display">
        <?php
        if (!empty($errors)) {
            echo '<ul class="error">';
            foreach ($errors as $error) {
                echo '<li>' . htmlspecialchars($error) . '</li>';
            }
            echo '</ul>';
        } else {
            ?>
            <div class="header">
                <h1>Congrats!</h1>
                <h3>Your account was successfully created.</h3>
            </div>
            <div class="login">
                <a href="../login/login-page.php"><button id="redirect">Login now</button></a>
            </div>
            <?php
        }
        ?>
    </div>
</body>

</html>