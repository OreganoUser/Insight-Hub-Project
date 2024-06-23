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
    <script src="../../JS/server.js"></script>
</head>

<body>
    <div class="main">
        <div class="container">
            <div class="header">
                <div class="welcom">
                    <h1>Welcome to the Grading-system <?php echo htmlspecialchars($user_name); ?>!</h1>
                    <h2>You can add your Subjects and grades here:</h2>
                </div>
                <div class="underHeader">
                    <h1>Subjects</h1>
                    <div class="edit-button">
                        <button id="edit-button">Edit Grades/Subjects</button>
                    </div>
                </div>
            </div>
            <ul class="subject-list" id="Semester1-subject-list">
                <h1>Semester 1:</h1>
                <!-- Subjects will be dynamically inserted here by JavaScript -->
            </ul>
            <ul class="subject-list" id="Semester2-subject-list">
                <h1>Semester 2:</h1>
                <!-- Subjects will be dynamically inserted here by JavaScript -->
            </ul>
        </div>
    </div>

    <!-- Modal -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Manage Grades/Subjects</h2>
            <form id="modal-form">
                <label for="semester">Choose Semester:</label>
                <select id="semester" name="semester">
                    <option value="Semester 1">Semester 1</option>
                    <option value="Semester 2">Semester 2</option>
                </select>

                <label for="type">Choose Type:</label>
                <select id="type" name="type">
                    <option value="subject">Subject</option>
                    <option value="grade">Grade</option>
                </select>

                <label for="action">Choose Action:</label>
                <select id="action" name="action">
                    <option value="add">Add</option>
                    <option value="delete">Delete</option>
                </select>

                <label for="subject">Subject Input:</label>
                <input type="text" id="subject" name="subject" required>

                <label for="grade">Grade Input:</label>
                <input type="number" id="grade" name="grade" required>

                <button type="submit">Submit</button>
            </form>
        </div>
    </div>

    <div class="footer">
        <div class="nav-bar">
            <a href="main-page.php"><button>Grades</button></a>
            <a href="lol.php"><button>Luca</button></a>
            <a href="lol.php"><button>Olaf</button></a>
            <a href="lol.php"><button>Charel</button></a>
            <a href="logout.php"><button>Logout</button></a>
        </div>
    </div>
</body>

</html>