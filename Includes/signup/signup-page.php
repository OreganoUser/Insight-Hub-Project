<!--
Luca
-->

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags for character encoding and viewport settings -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title of the signup page -->
    <title>Insight - Signup page</title>
    <!-- Link to the external CSS stylesheet -->
    <link rel="stylesheet" href="../../CSS/sign-up-page-style.css">
</head>

<body>
    <!-- Main container for the signup page -->
    <div class="main">
        <!-- Left container for the background image -->
        <div class="left-container">
            <img src="../../Images/slides-background.jpg" alt="" id="school-image">
        </div>
        <!-- Right container for the signup form and menu -->
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

            <!-- Bottom section containing the signup form -->
            <div class="bottom">
                <!-- Container for the signup form -->
                <div class="signup">
                    <!-- Signup header image -->
                    <img src="../../Images/signup-header.jpeg" alt="" id="signup-image">
                    <!-- Signup form -->
                    <form action="signup-script.php" method="POST">
                        <!-- Input fields for the signup form -->
                        <div class="inputs">
                            <input type="text" id="name" name="name" placeholder="Name">
                            <input type="text" id="surName" name="surName" placeholder="Surname">
                            <input type="text" id="Email" name="Email" placeholder="Email">
                            <input type="password" id="password1" name="password1" placeholder="Password">
                            <input type="password" id="password2" name="password2" placeholder="Confirm Password">
                            <!-- Submit button for the signup form -->
                            <div class="submit">
                                <input type="submit" id="submit" value="Sign up">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>