<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles6.css" />
</head>

<body>
    <div id="sectiontwo" class="screen">
        <div class="ALL" id="earth">
            <div class="slide-img">
                <img src="images/uranus.png">
            </div>
            <div class="swiper-slide">
                <div class="slide-name">
                    <h1>Uranus</h1>
                </div>
                <br>
                <div class="slide-detail">
                    <p>
                    Mercury is the smallest planet in the Solar System. 
                    It is the closest planet to the sun. 
                    It makes one trip around the Sun once every 87.969 days.
                    Mercury is bright when we can see it from Earth.
                    </p>
                </div>
                <br>
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
        <div class="links">
            <button id="next" class="link_button">NEXT</button>
            <button id="back" class="link_button">BACK</button>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parallax/3.1.0/parallax.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="index.js" type="text/javascript"></script>
    <script src="anime.min.js"></script>
</body>

</html>