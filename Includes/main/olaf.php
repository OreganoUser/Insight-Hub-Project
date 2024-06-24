<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags for character encoding and viewport settings -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title of the page -->
    <title>Get recked noob</title>
    <!-- Link to the external CSS stylesheet -->
    <link rel="stylesheet" href="../../CSS/lol-style.css">
</head>

<body>
    <!-- Main container for the page content -->
    <div class="main">
        <!-- Embed a GIF using Tenor -->
        <div class="tenor-gif-embed" data-postid="25570609" data-share-method="host" data-aspect-ratio="1"
            data-width="100%">
            <a href="https://tenor.com/view/cr7-sipping-gif-25570609">Cr7 Sipping Sticker</a> from
            <a href="https://tenor.com/search/cr7-stickers">Cr7 Stickers</a>
        </div>
        <script type="text/javascript" async src="https://tenor.com/embed.js"></script>

        <!-- Button to play sound -->
        <button id="play-sound-btn">Play Sound</button>
        <!-- Audio player for the sound -->
        <audio id="audio-player">
            <source src="../../Images/ronaldo-siuuuu.mp3" type="audio/mpeg">
        </audio>

        <!-- Script to handle the play sound button click event -->
        <script>
            document.getElementById('play-sound-btn').addEventListener('click', function () {
                var audio = document.getElementById('audio-player');
                audio.play();
            });
        </script>
    </div>

    <!-- Footer navigation bar -->
    <div class="footer">
        <div class="nav-bar">
            <a href="main-page.php"><button>Grades</button></a>
            <a href="luca.php"><button>Luca</button></a>
            <a href="olaf.php"><button>Olaf</button></a>
            <a href="charel.php"><button>Charel</button></a>
            <a href="logout.php"><button>Logout</button></a>
        </div>
    </div>
</body>

</html>