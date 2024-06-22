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

$user_name = '';
$user_id = '';

// Check if user_id is set in session
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // SQL to fetch user's name based on user_id
    $sql = "SELECT name FROM Users WHERE id = $user_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User found, fetch the name
        $row = $result->fetch_assoc();
        $user_name = $row['name'];
    }
}
// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main page - Insight Hub</title>
    <link rel="stylesheet" href="../../CSS/main-page-style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <div class="menu-container">
        <div class="menu" id="menu">
            <img src="../../Images/bars.svg" alt="" id="menu">
        </div>
        <div class="menu-bar" id="menu-bar">
            <div id="menu-bar-1">
                <img src="../../Images/accessibility-outline.svg" alt="" id="accessibility">
                <p>Do you need Help ?</p>
            </div>
            <div id="menu-bar-2">
                <img src="../../Images/arrow-forward.svg" alt="" id="accessibility">
                <p><?php echo htmlspecialchars($user_name); ?></p>
            </div>
        </div>
    </div>
    <div class="main">
        <div class="container">
            <div class="header">
                <div class="welcom">
                    <h1>Welcome to the Grading-system <?php echo htmlspecialchars($user_name); ?>!</h1>
                    <h2>You can add your Subjects and grades here:</h2>
                </div>
                <div class="underHeader">
                    <h1>Subjects</h1>
                    <div class="subject-buttons">
                        <button id="add-subject">Add Subject</button>
                    </div>
                </div>
            </div>
            <ul class="subject-list" id="subject-list">
                <!-- Subjects will be dynamically inserted here by JavaScript -->
            </ul>
        </div>
    </div>
    <div class="footer">
        <div class="nav-bar">
            <a href="main-page.php"><button>Grades</button></a>
        </div>
    </div>
    <div id="subjectModal" class="modal">
        <!-- Modal content -->
    </div>

    <!-- Modal for adding/deleting grades -->
    <div id="gradeModal" class="modal">
        <!-- Modal content -->
    </div>

    <!-- Link to external JavaScript file -->
    <script src="../../JS/server.js"></script>
</body>

</html>