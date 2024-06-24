<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insight - Signup page</title>
    <link rel="stylesheet" href="../../CSS/sign-up-page-style.css">
</head>

<body>
    <div class="main">
        <div class="left-container">
            <img src="../../Images/slides-background.jpg" alt="" id="school-image">
        </div>
        <div class="right-container">

            <div class="top">
                <div class="top-left">
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
                                <a href="../main/luca.php">
                                    <p>Laera Pierluca</p>
                                </a>
                            </div>
                            <div id="menu-bar-3">
                                <img src="../../Images/arrow-forward.svg" alt="" id="accessibility">
                                <a href="../main/olaf.php">
                                    <p>Kasztelan Olaf</p>
                                </a>
                            </div>
                            <div id="menu-bar-4">
                                <img src="../../Images/arrow-forward.svg" alt="" id="accessibility">
                                <a href="../main/charel.php">
                                    <p>Lejeune Charel</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="top-right">
                    <a href="../../index.php"><img src="../../Images/Insight-Hub-logo.jpeg" alt="" id="logo-image"></a>
                </div>
            </div>
            <div class="bottom">
                <div class="signup">
                    <img src="../../Images/signup-header.jpeg" alt="" id="signup-image">
                    <form action="signup-script.php" method="POST">
                        <div class="inputs">
                            <input type="text" id="name" name="name" placeholder="Name">
                            <input type="text" id="surName" name="surName" placeholder="Surname">
                            <input type="text" id="Email" name="Email" placeholder="Email">
                            <input type="password" id="password1" name="password1" placeholder="Password">
                            <input type="password" id="password2" name="password2" placeholder="Confirm Password">
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