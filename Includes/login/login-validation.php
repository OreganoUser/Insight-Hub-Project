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
    <link rel="stylesheet" href="../../CSS/login-validation-style.css">
</head>

<body>
    <h1>Form Submission Errors</h1>

    <?php
    if (!empty($errors)) {
        echo '<ul class="error">';
        foreach ($errors as $error) {
            echo '<li>' . htmlspecialchars($error) . '</li>';
        }
        echo '</ul>';
    } else {
        echo '<p>No errors found.</p>';
    }
    ?>
</body>

</html>
