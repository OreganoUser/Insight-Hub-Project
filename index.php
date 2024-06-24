<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags for character encoding and viewport settings -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title of the web page -->
    <title>Insight Hub</title>
    <!-- Link to the external CSS stylesheet -->
    <link rel="stylesheet" href="CSS/startingpage-style.css">
</head>

<body>

    <!-- Container for the menu section -->
    <div class="menu-container">
        <!-- Menu icon container -->
        <div class="menu" id="menu">
            <img src="Images/bars.svg" alt="" id="menu">
        </div>
        <!-- Container for the menu bar items -->
        <div class="menu-bar" id="menu-bar">
            <!-- First item in the menu bar -->
            <div id="menu-bar-1">
                <img src="Images/accessibility-outline.svg" alt="" id="accessibility">
                <p>Do you need Help ?</p>
            </div>
            <!-- Second item in the menu bar -->
            <div id="menu-bar-2">
                <img src="Images/arrow-forward.svg" alt="" id="accessibility">
                <a href="Includes/main/luca.php">
                    <p>Laera Pierluca</p>
                </a>
            </div>
            <!-- Third item in the menu bar -->
            <div id="menu-bar-3">
                <img src="Images/arrow-forward.svg" alt="" id="accessibility">
                <a href="Includes/main/olaf.php">
                    <p>Kasztelan Olaf</p>
                </a>
            </div>
            <!-- Fourth item in the menu bar -->
            <div id="menu-bar-4">
                <img src="Images/arrow-forward.svg" alt="" id="accessibility">
                <a href="Includes/main/charel.php">
                    <p>Lejeune Charel</p>
                </a>
            </div>
        </div>
    </div>

    <!-- Container for the main content -->
    <div class="main-container">
        <!-- Background image -->
        <img src="Images/main-background.jpg" alt="background-Image" id="background-image">
        <!-- Container for the buttons -->
        <div class="buttons">
            <!-- Log in button -->
            <a href="Includes/login/login-page.php"><button>Log in</button></a>
            <!-- Sign up button -->
            <a href="Includes/signup/signup-page.php"><button>Sign up</button></a>
        </div>
    </div>

</body>

</html>