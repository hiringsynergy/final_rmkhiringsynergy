  <!DOCTYPE html>
<html lang="en">
<head>
  <title>Parallax Images Scroll</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="Parallax-img-scroll-master/demo/js/jquery.js" type="text/javascript"></script>
  <script src="Parallax-img-scroll-master/demo/js/jquery.nicescroll.min.js" type="text/javascript"></script>
  <script src="Parallax-img-scroll-master/demo/js/parallaxImg.js" type="text/javascript"></script>
  <link rel="stylesheet" type="text/css" href="Parallax-img-scroll-master/demo/css/demotheme.css">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <script type="text/javascript">
    $(document).on("ready", function() {
      var parallaxSettings = {
        initialOpacity: 1, //from 0 to 1, e.g. 0.34 is a valid value. 0 = transparent, 1 = Opaque
        opacitySpeed: 0.1, //values from 0.01 to 1 -> 0.01: slowly appears on screen; 1: appears as soon as the user scrolls 1px
        pageLoader: true
      };

      parallaxImgScroll(parallaxSettings);
    });
  </script>
 
</head>
<body style="background-color: rgb(50, 50, 50)">
  <!-- <header>
    <nav>
      <a href="http://cyntss.github.io/Parallax-img-scroll/">Home</a><a href="http://cynt.co.nf/">Cyntss Page</a><a href="">Documentation</a>
    </nav>
  </header> -->
  <section>
    <article class="parallax-img-container">
      <h1 style="color: black;font-weight:600px; ">RMK Hiring Synergy</h1>
      <h3 style="color: purple;">Get the job done right!</h3>
      <a style="color: black;font-weight:bold; " class="btn-download-init" href="login">Login</a>
      <!-- images for parallax -->
      <img src="Parallax-img-scroll-master/demo/img/assassins/smoke-01.png" id="i1"  style="max-width:100%; height: auto; positoin :absolute" class="parallax-move" data-ps-z-index="1" data-ps-speed="1" data-ps-vertical-position="1580" data-ps-horizontal-position="1360" />
      <img src="Parallax-img-scroll-master/demo/img/assassins/smoke-02.png" id="i2" style="max-width:100%; height: auto; "class="parallax-move" data-ps-z-index="1" data-ps-speed="0.5" data-ps-vertical-position="700" data-ps-horizontal-position="220" />
      <!-- <img src="img/assassins/smoke-03.png" class="parallax-move" data-ps-z-index="1" data-ps-speed="1" data-ps-vertical-position="1680" data-ps-horizontal-position="1160" /> -->
      <!-- <img src="img/assassins/smoke-04.png" class="parallax-move" data-ps-z-index="1" data-ps-speed="0.5" data-ps-vertical-position="1080" data-ps-horizontal-position="220" /> -->
      <!-- <img src="Parallax-img-scroll-master/demo/img/assassins/smoke-05.gif" id="i3"class="parallax-move" style="max-width:100%; height: auto; " data-ps-z-index="1" data-ps-speed="1" data-ps-vertical-position="1120" data-ps-horizontal-position="100" /> -->
      <!-- <img src="Parallax-img-scroll-master/demo/img/assassins/smoke-06.gif" id="i4"class="parallax-move" style="max-width:100%; height: auto; " data-ps-z-index="1" data-ps-speed="0.4" data-ps-vertical-position="1250" data-ps-horizontal-position="250" /> -->
      <!-- <img src="img/assassins/smoke-07.png" class="parallax-move" data-ps-z-index="1" data-ps-speed="0.3" data-ps-vertical-position="300" data-ps-horizontal-position="320" /> -->
      <!-- <img src="img/assassins/smoke-06.png" class="parallax-move" data-ps-z-index="1" data-ps-speed="0.2" data-ps-vertical-position="-900" data-ps-horizontal-position="220" /> -->
      <!-- <img src="img/assassins/smoke-05.png" class="parallax-move" data-ps-z-index="1" data-ps-speed="0.3" data-ps-vertical-position="-600" data-ps-horizontal-position="150" /> -->
      <!-- <img src="Parallax-img-scroll-master/demo/img/assassins/stick.png" id="i5" class="parallax-move image-responsive" style="max-width:100%; height: auto; position:relative; right:30%; top:30%; padding-bottom:30%;" data-ps-speed="1" data-ps-vertical-position="1600" data-ps-horizontal-position="520" /> -->
      <!-- <img src="img/assassins/003.png" class="parallax-move" data-ps-z-index="2" data-ps-speed="0.4" data-ps-vertical-position="-200" data-ps-horizontal-position="0" /> -->
      <!-- <img src="img/assassins/002.png" class="parallax-move" data-ps-z-index="3" data-ps-speed="0.5" data-ps-vertical-position="-400" data-ps-horizontal-position="0" /> -->
      <img src="Parallax-img-scroll-master/demo/img/assassins/birds.png" id="i6"class="parallax-move" style="max-width:100%; height: auto; " data-ps-z-index="4" data-ps-speed="1" data-ps-vertical-position="-300" data-ps-horizontal-position="600" />
<!--       <img src="img/assassins/black-cloud.png" class="parallax-move" data-ps-z-index="5" data-ps-speed="0.35" data-ps-vertical-position="-400" data-ps-horizontal-position="0">
 -->    </article>
  </section>
  <section>
    <article class="parallax-img-container">
      <h2 style="color: black;">Company sponsored laboratories</h2>
     <!--  <p>All the content inside the article will not be affected by parallaximg.js</p>
      <h3>I made this inspired by PlayStation and Assassins Unity</h3> -->
      <img id="parallax-img-2" class="parallax-move" src="Parallax-img-scroll-master/demo/img/triangle.png" />
      <img id="parallax-img-3" class="parallax-move" src="Parallax-img-scroll-master/demo/img/square.png" />
      <img id="parallax-img-4" class="parallax-move" src="Parallax-img-scroll-master/demo/img/circle.png" />
      <img id="parallax-img-5" class="parallax-move" src="Parallax-img-scroll-master/demo/img/ex.png" />
      <img id="parallax-img-6" class="parallax-move" src="Parallax-img-scroll-master/demo/img/triangle.png" />
      <img id="parallax-img-7" class="parallax-move" src="Parallax-img-scroll-master/demo/img/square.png" />
      <img id="parallax-img-7" class="parallax-move" src="Parallax-img-scroll-master/demo/img/circle.png" />
      <img id="parallax-img-5" class="parallax-move" src="Parallax-img-scroll-master/demo/img/ex.png" />
      <img id="parallax-img-1" class="parallax-move" src="Parallax-img-scroll-master/demo/img/triangle.png" />
      <img id="parallax-img-4" class="parallax-move" src="Parallax-img-scroll-master/demo/img/square.png" />
      <img id="parallax-img-3" class="parallax-move" data-ps-vertical-position="200" data-ps-horizontal-position="500" src="Parallax-img-scroll-master/demo/img/circle.png" />
    </article>

  </section>
  <footer class="mbr-small-footer mbr-section mbr-section-nopadding" id="footer1-2" style="background-color: rgb(50, 50, 50); padding-top: 4px; padding-bottom: 0px;">
    
    <div class="container">
        <p class="text-xs-center" style="color: white;">Copyright (c) 2017 RMK Hiring Synergy.</p>
    </div>
</footer>
</body>
</html>
