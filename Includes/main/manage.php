<?php
// Start the session
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

// Get the POST data
$semester = $conn->real_escape_string($_POST['semester']);
$type = $conn->real_escape_string($_POST['type']);
$action = $conn->real_escape_string($_POST['action']);
$subject = $conn->real_escape_string($_POST['subject']);
$grade = $conn->real_escape_string($_POST['grade']);

// Initialize status
$status = 'unknown';

// Check the type of operation: subject or grade
if ($type == 'subject') {
    if ($action == 'add') {
        // SQL to add a new subject
        $sql = "INSERT INTO Grades (user_id, semester_name, subject_name, grade) 
                VALUES (" . $_SESSION['user_id'] . ", '$semester', '$subject', $grade)";
        $conn->query($sql);
    } elseif ($action == 'delete') {
        // SQL to delete a subject
        $sql = "DELETE FROM Grades WHERE user_id = " . $_SESSION['user_id'] . " AND semester_name = '" . $semester . "' AND subject_name = '" . $subject . "'";
        $conn->query($sql);
    }
} elseif ($type == 'grade') {
    if ($action == 'add') {
        // SQL to add a new grade
        $sql = "INSERT INTO Grades (user_id, semester_name, subject_name, grade) 
                VALUES (" . $_SESSION['user_id'] . ", '$semester', '$subject', $grade)";
        $conn->query($sql);
    } elseif ($action == 'delete') {
        // SQL to delete a grade
        $sql = "DELETE FROM Grades WHERE user_id = " . $_SESSION['user_id'] . " AND semester_name = '" . $semester . "' AND subject_name = '" . $subject . "' AND grade = " . $grade . "";
        $conn->query($sql);
    }
}

// Close the connection
$conn->close();
