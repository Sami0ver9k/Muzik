<?php
include ("Includes/config.php");
if (isset($_SESSION['userloggedin'])) {
    $userloggedin = $_SESSION['userloggedin'];
} else
    header("Location: register.php");
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Hey there! Welcome to Muzik</title>
        <link rel="stylesheet" type="text/css"    href="Includes/Assets/CSS/style.css" >

    </head>
    <body>
        <div id="nowPlayingBarContainer" >
            <div id="nowPlayingBar" >

                <div id="nowPlayingBarLeft">
                    <div class="content"> 
                        <span class="albumLink">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ0eNSS8UtttEUmjs4pUyUYpdPamCd-4jwVB1mPxDQrISIqC5uC" class="albumArt">
                        </span>

                        <div class="trackInfo">

                            <span  class="trackName">
                                <span> hwello</span>
                            </span>


                            <span class="artistName">

                                <span>sami </span>    
                            </span>


                        </div>



                    </div>

                </div>

                <div id="nowPlayingBarCenter">

                    <div class="content  playerControls">
                        <div class="buttons">

                            <button class="controllButton shuffle" title="Shuffle button">
                                <img src="Includes/Assets/Images/icons/shuffle.png" alt="Shuffle">
                            </button>

                            <button class="controllButton previous" title="Previous Button">
                                <img src="Includes/Assets/Images/icons/previous.png" alt="Previous">
                            </button>

                            <button class="controllButton play" title="Play button">
                                <img src="Includes/Assets/Images/icons/play.png" alt="Play">
                            </button>


                            <button class="controllButton pause" title="Pause button">
                                <img src="Includes/Assets/Images/icons/pause.png" alt="Pause" style="display: none;">
                            </button>

                            <button class="controllButton next" title="Next button">
                                <img src="Includes/Assets/Images/icons/next.png" alt="Next">
                            </button>

                            <button class="controllButton repeat" title="Repeat button">
                                <img src="Includes/Assets/Images/icons/repeat.png" alt="Repeat">
                            </button>

                        </div>

                        <div class="playbackBar">

                            <span class="progressTime current">0.00</span>
                            <div class="progressBar">

                                <div class="progressBarBg">
                                    <div class="progress">

                                    </div>  

                                </div>


                            </div>
                            <span class="progressTime remaining"> 0.00</span>

                        </div>



                    </div>



                </div>

                <div id="nowPlayingBarRight">

                    <div class="volumeBar">

                        <button class="controllButton volume " title="Volume">
                            <img src="Includes/Assets/Images/icons/volume.png" alt="Volume"

                        </button>


                        <button class="controllButton mute" title="Mute">
                            <img src="Includes/Assets/Images/icons/volume-mute.png" alt="Mute" style="display: none;">
                        </button>

                        <div class="progressBar" >

                            <div class="progressBarBg">
                                <div class="progress">

                                </div>  

                            </div>
                        </div>



                    </div>


                </div>






            </div>



        </div>    





    </body>
</html>
