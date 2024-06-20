<?php

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

// Perform SQL query
$sql = "SELECT * FROM your_table";
$result = $conn->query($sql);

// Process the result (fetch data, etc.)
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Process each row of data
        echo "ID: " . $row["id"] . " - Name: " . $row["name"] . "<br>";
    }
} else {
    echo "0 results";
}

// Close connection
$conn->close();

