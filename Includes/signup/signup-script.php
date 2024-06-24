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

    // Create connection to the database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection for any errors
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

    // Fetch and sanitize form data
    $name = sanitize_input($_POST["name"]);
    $surName = sanitize_input($_POST["surName"]);
    $email = sanitize_input($_POST["Email"]);
    $password1 = sanitize_input($_POST["password1"]);
    $password2 = sanitize_input($_POST["password2"]);

    // Array to store validation errors
    $errors = array();

    // Validate name
    if (empty($name)) {
        $errors[] = "Name is required";
    } else if (!preg_match("/^[a-zA-Z ]{1,40}$/", $name)) {
        $errors[] = "Name must be between 1 and 40 characters and contain only letters and spaces";
    }

    // Validate surname
    if (empty($surName)) {
        $errors[] = "Surname is required";
    } else if (!preg_match("/^[a-zA-Z ]{1,40}$/", $surName)) {
        $errors[] = "Surname must be between 1 and 40 characters and contain only letters and spaces";
    }

    // Validate email
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }

    // Validate password
    if (empty($password1) || strlen($password1) < 8 || !preg_match("/[A-Z]/", $password1) || !preg_match("/[0-9]/", $password1) || !preg_match("/[!@#\$%\^\&*\)\(+=._-]/", $password1)) {
        $errors[] = "Password must be at least 8 characters long and contain at least one uppercase letter, one special character, and some numbers";
    }

    // Check if passwords match
    if ($password1 != $password2) {
        $errors[] = "Passwords do not match";
    }

    // Check if email already exists in the database
    if (empty($errors)) {
        $sql = "SELECT email FROM Users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $errors[] = "Email already exists";
        }

        $stmt->close();
    }

    // If there are no errors, proceed with database insertion
    if (empty($errors)) {
        // Hash the password for security
        $hashed_password = password_hash($password1, PASSWORD_DEFAULT);
        // SQL to insert data into Users table
        $sql = "INSERT INTO Users (name, surName, email, password)
                VALUES (?, ?, ?, ?)";

        // Prepare and execute the statement
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $name, $surName, $email, $hashed_password);
        $stmt->execute();
        $stmt->close();
    }

    // Close database connection
    $conn->close();

    // Store errors in session if any
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
    } else {
        $_SESSION['errors'] = [];
    }

    // Redirect to signup-validation.php
    header("Location: signup-validation.php");

    exit();
}