<?php
// Start session
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


// Perform SQL query
$sql = "SELECT * FROM Grades WHERE user_id = '" . $user_id . "';";
$result = $conn->query($sql);

// Initialize an array to hold results
$rows = array();

// Process the result (fetch data, etc.)
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Push each row of data into the $rows array
        $rows[] = $row;
    }
} else {
    // No results found
    $rows = array();
}

// Close connection
$conn->close();

// Output JSON encoded data
echo json_encode($rows);
