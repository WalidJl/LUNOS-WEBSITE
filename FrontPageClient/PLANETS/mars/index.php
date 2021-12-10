<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles2.css" />
</head>

<body>
    <div id="sectiontwo" class="screen">
        <div class="ALL" id="earth">
            <div class="slide-img">
                <img src="images/mars.png">
            </div>
            <div class="swiper-slide">
                <div class="slide-name">
                    <h1>Mars</h1>
                </div>
                <br>
                <div class="slide-detail">
                    <p>
                    Mars is the fourth planet from the Sun and the second-smallest planet in the Solar System, 
                    being larger than only Mercury. 
                    In English, Mars carries the name of the Roman god of war and is often referred to as the "Red Planet"
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
        <div class="wrapper">
                <input type="checkbox">
                <div class="video">
                    <video src="https://www.robmillsarchitects.com/files/land/city/RMA_Web_land_city_1.mp4" loop muted autoplay playsinline></video>
                </div>
                <div class="text">
                    <span data-text="Watch the video"></span>
                </div>
        </div>



        <!---------------BACK----------------------->
        <div class="backbut">
            <a href="../../PLANETView/index.php">
                <span class="left">
                <span class="circle-left"></span>
                <span class="circle-right"></span>
                </span>
                <span class="right">
                <span class="circle-left"></span>
                <span class="circle-right"></span>
                </span>
            </a>
        </div>
<!---------------BACK----------------------->


    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parallax/3.1.0/parallax.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="index.js" type="text/javascript"></script>
    <script src="anime.min.js"></script>
</body>

</html>