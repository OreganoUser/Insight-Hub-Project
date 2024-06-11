<?php

// Start the session
session_start();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "InsightHubUserDB";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Function to sanitize input
    function sanitize_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Fetch form data
    $email = sanitize_input($_POST["Email"]);
    $password = sanitize_input($_POST["password"]);

    // Validate inputs
    $errors = array();

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }

    if (empty($password)) {
        $errors[] = "Password is required";
    }

    // If there are no errors, proceed with database validation
    if (empty($errors)) {
        // SQL to search for the user with the email
        $sql = "SELECT email, password FROM Users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // User exists, fetch the hashed password from the database
            $row = $result->fetch_assoc();
            $hashed_password = $row['password'];

            // Verify the hashed password with the provided password
            if (!password_verify($password, $hashed_password)) {
                $errors[] = "Incorrect password or email";
            }
        } else {
            $errors[] = "User does not exist";
        }

        $stmt->close();
    }

    // Close connection
    $conn->close();

    // Store errors in session and redirect to this script
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
    } else {
        $_SESSION['errors'] = [];
    }

    //Redirect to login-validation.php
    header("Location: login-validation.php");

    exit();
}
