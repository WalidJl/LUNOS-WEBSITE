<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planet</title>
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
</head>

<body>

    <div class="loader_bg">
        <div class="loader">

        </div>
    </div>
    <div class="first page">
        <div class="LOGO_NAVBAR">
            <div class="logo">
                <img src="Images/lunos.png">
            </div>
            <div class="nav_bar">
                <ul>
                    <li> <a href="#" class="home" alt="">Home</a></li>
                    <li> <a href="PLANETView/index.php" alt="">Our Planet</a></li>
                    <li> <a href="../NEWLOGIN/index.php" alt="">Login</a></li>
                </ul>
            </div>
        </div>
        <div id="selections" class="screen">
            <div id="scene">
                <div data-depth="0.1" class="bg">
                    <img src="Images/background.png">
                </div>
                <div data-depth="0.2" class="rock1">
                    <img src="Images/rock.png">
                </div>
                <div data-depth="1.2" class="earth">
                    <img src="Images/earth.png">
                </div>
                <div data-depth="0.1" class="text">
                    <h1>PLANET</h1>
                </div>
                <div data-depth="0.4" class="mid">
                    <img src="Images/mid.png">
                </div>
                <div data-depth="0.1" class="for">
                    <img src="Images/foreground.png">
                </div>
            </div>
        </div>
    </div>
    <!---<div id="sectiontwo" class="screen">
        <div class="ALL" id="earth">
            <div class="slide-img">
                <img src="/Images/earth1.png">
            </div>
            <div class="swiper-slide">
                <div class="slide-name">
                    <h1>Earth</h1>
                </div>
                <div class="slide-detail">
                    <p>
                        Earth is the third planet from the Sun and the fifth largest
                        planet in the Solar System with the highest density. It is
                        currently the only known location where life is present.
                    </p>
                </div>
                <div class="slide-detail-facts">
                    <div>
                        <h5>
                            ORBIT PERIOD:
                            <span style="opacity: 0.8">365.26 Earth days</span>
                        </h5>
                        <h5>KNOWN MOONS: <span style="opacity: 0.8">1</span></h5>
                    </div>
                </div>

            </div>
        </div>
        <div class="earth_control">
            <button id="play" class="buttons">PLAY</button>
            <button id="pause" class="buttons">PAUSE</button>
            <button id="resume" class="buttons">RESUME</button>
            <button id="reserver" class="buttons">RESERVE</button>
            <button id="restart" class="buttons">RESTART</button>
        </div>
    </div>--->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parallax/3.1.0/parallax.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="index.js" type="text/javascript"></script>
    <script src="anime.min.js"></script>
</body>

</html>