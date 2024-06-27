<!-- 
 Olaf
-->

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags for character encoding and viewport settings -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title of the login page -->
    <title>Insight - Login page</title>
    <!-- Link to the external CSS stylesheet -->
    <link rel="stylesheet" href="../../CSS/log-in-page-style.css">
</head>

<body>
    <!-- Main container for the login page -->
    <div class="main">
        <!-- Left container for the background image -->
        <div class="left-container">
            <img src="../../Images/slides-background.jpg" alt="" id="school-image">
        </div>
        <!-- Right container for the login form and menu -->
        <div class="right-container">

            <!-- Top section containing menu and logo -->
            <div class="top">
                <!-- Top-left section for the menu -->
                <div class="top-left">
                    <!-- Container for the menu -->
                    <div class="menu-container">
                        <!-- Menu icon -->
                        <div class="menu" id="menu">
                            <img src="../../Images/bars.svg" alt="" id="menu">
                        </div>
                        <!-- Container for the menu bar items -->
                        <div class="menu-bar" id="menu-bar">
                            <!-- First item in the menu bar -->
                            <div id="menu-bar-1">
                                <img src="../../Images/accessibility-outline.svg" alt="" id="accessibility">
                                <p>Do you need Help ?</p>
                            </div>
                            <!-- Second item in the menu bar -->
                            <div id="menu-bar-2">
                                <img src="../../Images/arrow-forward.svg" alt="" id="accessibility">
                                <a href="../main/luca.php">
                                    <p>Laera Pierluca</p>
                                </a>
                            </div>
                            <!-- Third item in the menu bar -->
                            <div id="menu-bar-3">
                                <img src="../../Images/arrow-forward.svg" alt="" id="accessibility">
                                <a href="../main/olaf.php">
                                    <p>Kasztelan Olaf</p>
                                </a>
                            </div>
                            <!-- Fourth item in the menu bar -->
                            <div id="menu-bar-4">
                                <img src="../../Images/arrow-forward.svg" alt="" id="accessibility">
                                <a href="../main/charel.php">
                                    <p>Lejeune Charel</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Top-right section for the logo -->
                <div class="top-right">
                    <a href="../../index.php"><img src="../../Images/Insight-Hub-logo.jpeg" alt="" id="logo-image"></a>
                </div>
            </div>

            <!-- Bottom section containing the login form -->
            <div class="bottom">
                <!-- Container for the login form -->
                <div class="login">
                    <!-- Login header image -->
                    <img src="../../Images/login-header.jpeg" alt="" id="login-image">
                    <!-- Instructions for the user -->
                    <h2>Please enter your credentials here.</h2>
                    <!-- Login form -->
                    <form action="login-script.php" method="POST">
                        <!-- Input field for email -->
                        <input type="text" id="Email" name="Email" placeholder="Email">
                        <!-- Input field for password -->
                        <input type="password" id="password" name="password" placeholder="Password">
                        <!-- Submit button for the login form -->
                        <div class="submit">
                            <input type="submit" id="submit" value="Login">
                            <!-- Link to the signup page for new users -->
                            <h4>If you have no account yet, <a href="../signup/signup-page.php">sign up</a> here.</h4>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>