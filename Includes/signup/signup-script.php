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
    $name = sanitize_input($_POST["name"]);
    $surName = sanitize_input($_POST["surName"]);
    $email = sanitize_input($_POST["Email"]);
    $password1 = sanitize_input($_POST["password1"]);
    $password2 = sanitize_input($_POST["password2"]);

    // Validate inputs
    $errors = array();

    if (empty($name)) {
        $errors[] = "Name is required";
    } else if (!preg_match("/^[a-zA-Z ]{1,40}$/", $name)) {
        $errors[] = "Name must be between 1 and 40 characters and contain only letters and spaces";
    }

    if (empty($surName)) {
        $errors[] = "Surname is required";
    } else if (!preg_match("/^[a-zA-Z ]{1,40}$/", $surName)) {
        $errors[] = "Surname must be between 1 and 40 characters and contain only letters and spaces";
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }

    if (empty($password1) || strlen($password1) < 8 || !preg_match("/[A-Z]/", $password1) || !preg_match("/[0-9]/", $password1) || !preg_match("/[!@#\$%\^\&*\)\(+=._-]/", $password1)) {
        $errors[] = "Password must be at least 8 characters long and contain at least one uppercase letter, one special character, and some numbers";
    }

    if ($password1 != $password2) {
        $errors[] = "Passwords do not match";
    }

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
        // Create table name
        $tableName = $surName . " " . $name;

        // SQL to create table Users
        $sql = "CREATE TABLE IF NOT EXISTS Users (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(40) NOT NULL,
            surName VARCHAR(40) NOT NULL,
            email VARCHAR(50) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL
        )";

        if ($conn->query($sql) === TRUE) {
            // SQL to insert data into Users table
            $hashed_password = password_hash($password1, PASSWORD_DEFAULT); // Hash the password for security
            $sql = "INSERT INTO Users (name, surName, email, password)
            VALUES ('$name', '$surName', '$email', '$hashed_password')";

            if ($conn->query($sql) != TRUE) {
                $errors[] = "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            $errors[] = "Error creating table: " . $conn->error;
        }
    }

    // Close connection
    $conn->close();

    // Store errors in session and redirect to this script
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
    } else {
        $_SESSION['errors'] = [];
    }

    //Redirect to signup-validation.php
    header("Location: signup-validation.php");

    exit();
}
