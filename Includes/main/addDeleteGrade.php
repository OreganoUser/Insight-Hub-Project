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
$grade = $_POST['grade'];
$subjectName = $_POST['subjectName'];
$semester = $_POST['semester'];

if (isset($_POST['addGrade'])) {
    // SQL to add grade
    $sql = "INSERT INTO Grades (user_id, semester, subject_name, grade) VALUES ($user_id, $semester, '$subjectName', $grade)";

    if ($conn->query($sql) === TRUE) {
        echo "Grade added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} elseif (isset($_POST['deleteGrade'])) {
    // SQL to delete grade
    $sql = "DELETE FROM Grades WHERE user_id = $user_id AND semester = $semester AND subject_name = '$subjectName' AND grade = $grade";

    if ($conn->query($sql) === TRUE) {
        echo "Grade deleted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
