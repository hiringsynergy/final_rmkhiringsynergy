<?php

session_start();
ob_start();


?>



<!DOCTYPE html>
<html>
<head>
    <title>RMK Hiring Synergy</title>
    <!-- Site made with Mobirise Website Builder v3.10.4, https://mobirise.com -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="generator" content="Mobirise v3.10.4, mobirise.com">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="assets/images/download-256x128-45.png" type="image/x-icon">
    <meta name="description" content="">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic&amp;subset=latin">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/bootstrap-material-design-font/css/material.css">
    <link rel="stylesheet" href="assets/tether/tether.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/animate.css/animate.min.css">
    <link rel="stylesheet" href="assets/dropdown/css/style.css">
    <link rel="stylesheet" href="assets/theme/css/style.css">
    <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
    <link rel="stylesheet" href="admin_login/assets/font-awesome/4.5.0/css/font-awesome.min">

<style type="text/css">
@import "bourbon";

$button-height: 50px;
$button-width: 160px;
$button-spacing: 15px;
$button-transition-speed: 0.25s;

.button-row {
  @include display(inline-flex);
  
  > div {
    position: relative;
    width: $button-width;
    height: $button-height;
    margin: 0 $button-spacing;
    @include perspective(1000px);

    > a {
      margin: 0;
      padding: 0;
      width: 100%;
      height: 100%;
      position: absolute;
      @include transform-style(preserve-3d);
      @include transform(
        translateZ(-($button-height / 2))
      );
      @include transition(
        transform $button-transition-speed
      );

      &::before, &::after {
        justify-content: center;
        align-items: center;
        margin: 0;
        width: $button-width;
        height: $button-height;
        position: absolute;
        border: 5px solid black;
        box-sizing: border-box;
        content: attr(title);
        @include display(flex);
      }

      &::before {
        background-color: #000;
        color: #fff;
        @include transform(
          rotateY(0deg)
          translateZ($button-height / 2)
        );
      }

      &::after {
        background-color: #fff;
        border-color: #000;
        color: #000;
        @include transform(
          rotateX(90deg)
          translateZ($button-height / 2)
        );
      }

      &:hover {
        @include transform(
          translateZ(-($button-height / 2)) 
          rotateX(-90deg)
        )
      }
    }
  }
}

/* this is just icing */
body {
  font-family: "Oswald", Helvetica, Arial, sans-serif;
  font-weight: 300;
  text-transform: uppercase;
  padding: 0;
  margin: 0;
}

.main, h1 {
  flex-direction: column;
  justify-content: center;
  align-items: center;
  @include display(flex);
}

html, body, .main {
  height: 100%;
}

</style>


</head>
<body>
<section id="menu-0">

    <nav class="navbar navbar-dropdown bg-color transparent navbar-fixed-top">
        <div class="container">

            <div class="mbr-table">
                <div class="mbr-table-cell">

                    <div class="navbar-brand">
                        <a href="index" class="navbar-logo"><img src="assets/images/download-256x128-33.png" alt="Mobirise"></a>
                        <a class="navbar-caption text-white" href="index">RMK HIRING SYNERGY</a>
                    </div>

                </div>
  
                <div class="mbr-table-cell">

                    <button class="navbar-toggler pull-xs-right hidden-md-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="hamburger-icon"></div>
                    </button>

                    <ul class="nav-dropdown collapse pull-xs-right nav navbar-nav navbar-toggleable-sm" id="exCollapsingNavbar"><li class="nav-item fa fa-home"><a class="nav-link link fa fa-home" href="index.html"><i  class="fa fa-home"  aria-hidden="true"></i>Home</a></li><li class="nav-item"><!-- <a class="nav-link link" href="login">Login</a> --></li></ul>
                    <button hidden="" class="navbar-toggler navbar-close" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="close-icon"></div>
                    </button>

                </div>
            </div>

        </div>
    </nav>

</section>

<section class="mbr-section mbr-parallax-background mbr-after-navbar" id="form1-4" style="background-image: url(assets/images/full-unsplash-photo-1480435368253-39f2bad8843f-2000x1333-24.jpg); padding-top: 160px; padding-bottom: 120px;">
    <div class="mbr-overlay" style="opacity: 0.4; background-color: rgb(34, 34, 34);">
    </div>
    <div class="mbr-section mbr-section__container mbr-section__container--middle">
        <div class="container">
            <div class="row">

                <?php

                if(isset($_SESSION['reset'])==1){

                    ?>


                    <div class="col-xs-11 text-xs-center" style="color: white; font-size: large; font-weight: 600;" >

                        Please Check your mail to reset the password
                        <br>
                        <br>
                        <br>

                    </div>



                    <?php



                    $_SESSION['reset']=null;
                }





                if(isset($_SESSION['recover'])==1){

                    ?>


                    <div class="col-xs-11 text-xs-center" style="color: white; font-size: large; font-weight: 600;" >

                        Your Password has been updated successfully
                        <br>
                        <br>
                        <br>

                    </div>



                    <?php



                    $_SESSION['recover']=null;
                }





                ?>



                <div class="col-xs-11 text-xs-center">
                    <h3 class="mbr-section-title display-2">LOGIN</h3>
                    <small class="mbr-section-subtitle"></small>
                </div>
            </div>
        </div>
    </div>
    <div class="mbr-section mbr-section-nopadding">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="col-sm-8 col-sm-offset-2" >
                        <form class="mbr-form" action="login_out/login_validation.php" method="post" data-form-title="SUBSCRIBE TO OUR NEWSLETTER">
                            <input type="hidden" value="4+KZ6DAOiZL+O+QQz5EueLQuEqNeyVsC4dAxGOAIgkyiY/9Qx7qypfBuHc1OiwSpb6o7HXnpk08dW5Jw2AWcy6tv+9OkilOSUXWfVukhUhEBXEbYCtpBWwMC5Rg9Vt7o" data-form-email="true">

                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <label for="pass" style="font-weight: 600; color:white;">USERNAME:</label>
                                    <input type="text" class="form-control" name="username" style="width: 80%;"  required="" placeholder="Enter Username" data-form-field="Email">
                                </div>

                                <div class="col-xs-12 col-md-6">
                                    <label for="pass" style="font-weight: 600; color:white;">PASSWORD:</label>
                                    <input type="password" class="form-control" id="pass" style="width: 80%;" name="password" required="" placeholder="Enter Password" data-form-field="Email">
                                </div>
                            </div>

                            <br>

                            <div class="col-xs-10 col-md-6 cmbr-buttons mbr-box__magnet--bottom-left ">
                                <button type="submit" name="login" class="mbr-buttons__btn btn btn-lg btn-danger">LOGIN</button>
                            </div>

                            <div class="col-xs-12 col-md-6" >
                                <a href="reset.php" style="color: floralwhite">Forgot password?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="mbr-section mbr-section-md-padding mbr-footer footer2" id="contacts2-z" style="background-color: rgb(46, 46, 46); padding-top: 90px; padding-bottom: 90px;">

    <div class="container">
        <div class="row">
            <div class="mbr-footer-content col-xs-12 col-md-3">
                <p><strong>Address</strong><br>RSM Nagar, Gummidipoondi Taluk, Tiruvallur District, Kavaraipettai, Tamil Nadu 601206<br><br><br>
                    <strong>Contacts</strong><br>Phone: +91-44-33303330<br>Phone: +91-44-33303030<br>Phone: +91-44-33303555<br></p>
            </div>
            <div class="mbr-footer-content col-xs-12 col-md-3"><p><strong>Links</strong></p><ul><li><a class="text-white" href="https://www.rmkec.ac.in" target="_blank">www.rmkec.ac.in</a></li><li><a class="text-white" href="https://www.rmd.ac.in">www.rmd.ac.in</a></li><li><a class="text-white" href="https://www.rmkcet.ac.in">www.rmkcet.ac.in</a></li></ul><p></p></div>
            <div class="col-xs-12 col-md-6">
                <div class="mbr-map"><iframe frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0Dx_boXQiwvdz8sJHoYeZNVTdoWONYkU&amp;q=place_id:ChIJ4fcssGKATToRDsOS1Rj1S-4" allowfullscreen=""></iframe></div>
            </div>
        </div>
    </div>
</section>

<footer class="mbr-small-footer mbr-section mbr-section-nopadding" id="footer1-1" style="background-color: rgb(50, 50, 50); padding-top: 1.75rem; padding-bottom: 1.75rem;">

    <div class="container">
        <p class="text-xs-center">Copyright (c) 2017 RMK Hiring Synergy.</p>
    </div>
</footer>


<script src="assets/web/assets/jquery/jquery.min.js"></script>
<script src="assets/tether/tether.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/smooth-scroll/SmoothScroll.js"></script>
<script src="assets/viewportChecker/jquery.viewportchecker.js"></script>
<script src="assets/dropdown/js/script.min.js"></script>
<script src="assets/touchSwipe/jquery.touchSwipe.min.js"></script>
<script src="assets/jarallax/jarallax.js"></script>
<script src="assets/theme/js/script.js"></script>
<script src="assets/formoid/formoid.min.js"></script>


<input name="animation" type="hidden">
</body>
</html>