<?php

session_start();

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

$user_id = $_SESSION['user_id'];
$subjectName = $_POST['subjectName'];
$semester = $_POST['semester'];

if (isset($_POST['addSubject'])) {
    // SQL to add subject
    $sql = "INSERT INTO Subjects (user_id, semester, subject_name) VALUES ($user_id, $semester, '$subjectName')";

    if ($conn->query($sql) === TRUE) {
        echo "Subject added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} elseif (isset($_POST['deleteSubject'])) {
    // SQL to delete subject
    $sql = "DELETE FROM Subjects WHERE user_id = $user_id AND semester = $semester AND subject_name = '$subjectName'";

    if ($conn->query($sql) === TRUE) {
        echo "Subject deleted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
