<?php

session_start();
ob_start();

$error=0;
if(isset($_GET['id']) && isset($_GET['hash'])) {


    $proceed_username = $_GET['id'];
    $hash = $_GET['hash'];


    $connect_database = mysqli_connect("localhost", "root", "", "login_database");


    //selecting admin database  and coordinator database........
    $query_selection = "SELECT * FROM admin_login WHERE username='{$proceed_username}'";
    $result_selection = mysqli_query($connect_database, $query_selection);
    if (!$result_selection == null) {


        $row_selection = mysqli_fetch_assoc($result_selection);


        if (!$row_selection == null) {


            $is_user_valid = true;

            $admin_database = $row_selection['database_name'];


            $connect = mysqli_connect("localhost", "root", "", "$admin_database");


            $query_student = "SELECT * FROM login_admin where username='$proceed_username' and admin_forgotpassword='$hash'";
            $result_student = mysqli_query($connect, $query_student);

            if (!$result_student == null) {


                $no_rows = mysqli_num_rows($result_student);


            }


            if (!$result_student == null && $no_rows != 0) {


                $student_database = $admin_database;


                //validating code

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

                    <link rel="stylesheet"
                          href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic&amp;subset=latin">
                    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
                    <link rel="stylesheet"
                          href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
                    <link rel="stylesheet" href="assets/bootstrap-material-design-font/css/material.css">
                    <link rel="stylesheet" href="assets/tether/tether.min.css">
                    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
                    <link rel="stylesheet" href="assets/animate.css/animate.min.css">
                    <link rel="stylesheet" href="assets/dropdown/css/style.css">
                    <link rel="stylesheet" href="assets/theme/css/style.css">
                    <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">


                </head>
                <body>
                <section id="menu-0">

                    <nav class="navbar navbar-dropdown bg-color transparent navbar-fixed-top">
                        <div class="container">

                            <div class="mbr-table">
                                <div class="mbr-table-cell">

                                    <div class="navbar-brand">
                                        <a href="index.html" class="navbar-logo"><img
                                                    src="assets/images/download-256x128-33.png" alt="Mobirise"></a>
                                        <a class="navbar-caption text-white" href="index.html">RMK HIRING SYNERGY</a>
                                    </div>

                                </div>
                                <div class="mbr-table-cell">

                                    <button class="navbar-toggler pull-xs-right hidden-md-up" type="button"
                                            data-toggle="collapse" data-target="#exCollapsingNavbar">
                                        <div class="hamburger-icon"></div>
                                    </button>

                                    <ul class="nav-dropdown collapse pull-xs-right nav navbar-nav navbar-toggleable-sm"
                                        id="exCollapsingNavbar">
                                        <li class="nav-item"><a class="nav-link link" href="index.html">Home</a></li>
                                        <li class="nav-item"><a class="nav-link link" href="login.php">Login</a></li>
                                        <li class="nav-item">
                                            <!-- <a class="nav-link link" href="about.html">About</a> --></li>
                                    </ul>
                                    <button hidden="" class="navbar-toggler navbar-close" type="button"
                                            data-toggle="collapse" data-target="#exCollapsingNavbar">
                                        <div class="close-icon"></div>
                                    </button>

                                </div>
                            </div>

                        </div>
                    </nav>

                </section>

                <section class="engine"><a rel="external" href="https://mobirise.com">simple mobile web site creator
                        software download</a></section>
                <section class="mbr-section mbr-parallax-background mbr-after-navbar" id="form1-4"
                         style="background-image: url(assets/images/full-unsplash-photo-1480435368253-39f2bad8843f-2000x1333-24.jpg); padding-top: 160px; padding-bottom: 120px;">
                    <div class="mbr-overlay" style="opacity: 0.4; background-color: rgb(34, 34, 34);">
                    </div>
                    <div class="mbr-section mbr-section__container mbr-section__container--middle">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-11 text-xs-center">
                                    <h3 class="mbr-section-title display-2">PASSWORD</h3>
                                    <small class="mbr-section-subtitle"></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mbr-section mbr-section-nopadding">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="col-sm-8 col-sm-offset-2">
                                        <form class="mbr-form" action="recover.php" method="post"
                                              data-form-title="SUBSCRIBE TO OUR NEWSLETTER">
                                            <input type="hidden"
                                                   value="4+KZ6DAOiZL+O+QQz5EueLQuEqNeyVsC4dAxGOAIgkyiY/9Qx7qypfBuHc1OiwSpb6o7HXnpk08dW5Jw2AWcy6tv+9OkilOSUXWfVukhUhEBXEbYCtpBWwMC5Rg9Vt7o"
                                                   data-form-email="true">

                                            <input type="hidden" name="database"
                                                   value="<?php echo $student_database; ?>">
                                            
                                            <input type="hidden" name="roll" value="<?php echo $proceed_username; ?>">
                                            <div class="row">
                                                <div class="col-xs-12 col-md-6">
                                                    <label for="pass" style="font-weight: 600; color:white;">NEW
                                                        PASSWORD:</label>
                                                    <input type="password" class="form-control" name="first_password"
                                                           style="width: 80%;" required=""
                                                           placeholder="Enter new Password" data-form-field="Email">
                                                </div>

                                                <div class="col-xs-12 col-md-6">
                                                    <label for="pass" style="font-weight: 600; color:white;">CONFIRM
                                                        PASSWORD:</label>
                                                    <input type="password" class="form-control" id="pass"
                                                           style="width: 80%;" name="second_password" required=""
                                                           placeholder="Confirm Password" data-form-field="Email">
                                                </div>
                                            </div>

                                            <br>

                                            <div class="col-xs-10 col-md-6 cmbr-buttons mbr-box__magnet--bottom-left ">
                                                <button type="submit" name="reset"
                                                        class="mbr-buttons__btn btn btn-lg btn-danger">RESET
                                                </button>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="mbr-section mbr-section-md-padding mbr-footer footer2" id="contacts2-z"
                         style="background-color: rgb(46, 46, 46); padding-top: 90px; padding-bottom: 90px;">

                    <div class="container">
                        <div class="row">
                            <div class="mbr-footer-content col-xs-12 col-md-3">
                                <p><strong>Address</strong><br>RSM Nagar, Gummidipoondi Taluk, Tiruvallur District,
                                    Kavaraipettai, Tamil Nadu 601206<br><br><br>
                                    <strong>Contacts</strong><br>Phone: +91-44-33303330<br>Phone: +91-44-33303030<br>Phone:
                                    +91-44-33303555<br></p>
                            </div>
                            <div class="mbr-footer-content col-xs-12 col-md-3"><p><strong>Links</strong></p>
                                <ul>
                                    <li><a class="text-white" href="https://www.rmkec.ac.in" target="_blank">www.rmkec.ac.in</a>
                                    </li>
                                    <li><a class="text-white" href="https://www.rmd.ac.in">www.rmd.ac.in</a></li>
                                    <li><a class="text-white" href="https://www.rmkcet.ac.in">www.rmkcet.ac.in</a></li>
                                </ul>
                                <p></p></div>
                            <div class="col-xs-12 col-md-6">
                                <div class="mbr-map">
                                    <iframe frameborder="0" style="border:0"
                                            src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0Dx_boXQiwvdz8sJHoYeZNVTdoWONYkU&amp;q=place_id:ChIJ4fcssGKATToRDsOS1Rj1S-4"
                                            allowfullscreen=""></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <footer class="mbr-small-footer mbr-section mbr-section-nopadding" id="footer1-1"
                        style="background-color: rgb(50, 50, 50); padding-top: 1.75rem; padding-bottom: 1.75rem;">

                    <div class="container">
                        <p class="text-xs-center">Copyright (c) 2016 Mobirise.</p>
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


                <?php

                $error = 1;


            }
        }


    }


    //selecting student database.........
    $student_user = $proceed_username[0] . $proceed_username[1] . $proceed_username[2] . $proceed_username[3];

    if ($student_user == '1115') {

        $database_session_set = 'rmd_database';
        $connect = mysqli_connect("localhost", "root", "", "rmd_database");


    } else if ($student_user == '1116') {

        $database_session_set = 'rmkcet_database';
        $connect = mysqli_connect("localhost", "root", "", "rmkcet_database");

    } else if ($student_user == '1117') {

        $database_session_set = 'rmk_database';
        $connect = mysqli_connect("localhost", "root", "", "rmk_database");

    }


    //student login

    $isstudent = $proceed_username[4] . $proceed_username[5];
    $isstudent += 4;


    $query_short = "SELECT * FROM table_map WHERE table_short='{$isstudent}'";
    if ($connect != null) {
        $result_short = mysqli_query($connect, $query_short);


        if (!$result_short == null) {


            $row_short = mysqli_fetch_assoc($result_short);
            $student_table = $row_short['table_name'];

            $query_student = "SELECT * FROM $student_table where st_roll='$proceed_username' and st_forgotpassword='$hash'";
            $result_student = mysqli_query($connect, $query_student);
            if (!$result_student == null) {


                $no_rows = mysqli_num_rows($result_student);


            }


            if (!$result_student == null && $no_rows != 0) {


                $student_database = $database_session_set;


                //validating code

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

                    <link rel="stylesheet"
                          href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic&amp;subset=latin">
                    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
                    <link rel="stylesheet"
                          href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
                    <link rel="stylesheet" href="assets/bootstrap-material-design-font/css/material.css">
                    <link rel="stylesheet" href="assets/tether/tether.min.css">
                    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
                    <link rel="stylesheet" href="assets/animate.css/animate.min.css">
                    <link rel="stylesheet" href="assets/dropdown/css/style.css">
                    <link rel="stylesheet" href="assets/theme/css/style.css">
                    <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">


                </head>
                <body>
                <section id="menu-0">

                    <nav class="navbar navbar-dropdown bg-color transparent navbar-fixed-top">
                        <div class="container">

                            <div class="mbr-table">
                                <div class="mbr-table-cell">

                                    <div class="navbar-brand">
                                        <a href="index.html" class="navbar-logo"><img
                                                    src="assets/images/download-256x128-33.png" alt="Mobirise"></a>
                                        <a class="navbar-caption text-white" href="index.html">RMK HIRING SYNERGY</a>
                                    </div>

                                </div>
                                <div class="mbr-table-cell">

                                    <button class="navbar-toggler pull-xs-right hidden-md-up" type="button"
                                            data-toggle="collapse" data-target="#exCollapsingNavbar">
                                        <div class="hamburger-icon"></div>
                                    </button>

                                    <ul class="nav-dropdown collapse pull-xs-right nav navbar-nav navbar-toggleable-sm"
                                        id="exCollapsingNavbar">
                                        <li class="nav-item"><a class="nav-link link" href="index.html">Home</a></li>
                                        <li class="nav-item"><a class="nav-link link" href="login.php">Login</a></li>
                                        <li class="nav-item">
                                            <!-- <a class="nav-link link" href="about.html">About</a> --></li>
                                    </ul>
                                    <button hidden="" class="navbar-toggler navbar-close" type="button"
                                            data-toggle="collapse" data-target="#exCollapsingNavbar">
                                        <div class="close-icon"></div>
                                    </button>

                                </div>
                            </div>

                        </div>
                    </nav>

                </section>

                <section class="engine"><a rel="external" href="https://mobirise.com">simple mobile web site creator
                        software download</a></section>
                <section class="mbr-section mbr-parallax-background mbr-after-navbar" id="form1-4"
                         style="background-image: url(assets/images/full-unsplash-photo-1480435368253-39f2bad8843f-2000x1333-24.jpg); padding-top: 160px; padding-bottom: 120px;">
                    <div class="mbr-overlay" style="opacity: 0.4; background-color: rgb(34, 34, 34);">
                    </div>
                    <div class="mbr-section mbr-section__container mbr-section__container--middle">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-11 text-xs-center">
                                    <h3 class="mbr-section-title display-2">PASSWORD</h3>
                                    <small class="mbr-section-subtitle"></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mbr-section mbr-section-nopadding">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="col-sm-8 col-sm-offset-2">
                                        <form class="mbr-form" action="recover.php" method="post"
                                              data-form-title="SUBSCRIBE TO OUR NEWSLETTER">
                                            <input type="hidden"
                                                   value="4+KZ6DAOiZL+O+QQz5EueLQuEqNeyVsC4dAxGOAIgkyiY/9Qx7qypfBuHc1OiwSpb6o7HXnpk08dW5Jw2AWcy6tv+9OkilOSUXWfVukhUhEBXEbYCtpBWwMC5Rg9Vt7o"
                                                   data-form-email="true">

                                            <input type="hidden" name="database"
                                                   value="<?php echo $student_database; ?>">
                                            <input type="hidden" name="table" value="<?php echo $student_table; ?>">
                                            <input type="hidden" name="roll" value="<?php echo $proceed_username; ?>">
                                            <div class="row">
                                                <div class="col-xs-12 col-md-6">
                                                    <label for="pass" style="font-weight: 600; color:white;">NEW
                                                        PASSWORD:</label>
                                                    <input type="password" class="form-control" name="first_password"
                                                           style="width: 80%;" required=""
                                                           placeholder="Enter new Password" data-form-field="Email">
                                                </div>

                                                <div class="col-xs-12 col-md-6">
                                                    <label for="pass" style="font-weight: 600; color:white;">CONFIRM
                                                        PASSWORD:</label>
                                                    <input type="password" class="form-control" id="pass"
                                                           style="width: 80%;" name="second_password" required=""
                                                           placeholder="Confirm Password" data-form-field="Email">
                                                </div>
                                            </div>

                                            <br>

                                            <div class="col-xs-10 col-md-6 cmbr-buttons mbr-box__magnet--bottom-left ">
                                                <button type="submit" name="reset"
                                                        class="mbr-buttons__btn btn btn-lg btn-danger">RESET
                                                </button>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="mbr-section mbr-section-md-padding mbr-footer footer2" id="contacts2-z"
                         style="background-color: rgb(46, 46, 46); padding-top: 90px; padding-bottom: 90px;">

                    <div class="container">
                        <div class="row">
                            <div class="mbr-footer-content col-xs-12 col-md-3">
                                <p><strong>Address</strong><br>RSM Nagar, Gummidipoondi Taluk, Tiruvallur District,
                                    Kavaraipettai, Tamil Nadu 601206<br><br><br>
                                    <strong>Contacts</strong><br>Phone: +91-44-33303330<br>Phone: +91-44-33303030<br>Phone:
                                    +91-44-33303555<br></p>
                            </div>
                            <div class="mbr-footer-content col-xs-12 col-md-3"><p><strong>Links</strong></p>
                                <ul>
                                    <li><a class="text-white" href="https://www.rmkec.ac.in" target="_blank">www.rmkec.ac.in</a>
                                    </li>
                                    <li><a class="text-white" href="https://www.rmd.ac.in">www.rmd.ac.in</a></li>
                                    <li><a class="text-white" href="https://www.rmkcet.ac.in">www.rmkcet.ac.in</a></li>
                                </ul>
                                <p></p></div>
                            <div class="col-xs-12 col-md-6">
                                <div class="mbr-map">
                                    <iframe frameborder="0" style="border:0"
                                            src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0Dx_boXQiwvdz8sJHoYeZNVTdoWONYkU&amp;q=place_id:ChIJ4fcssGKATToRDsOS1Rj1S-4"
                                            allowfullscreen=""></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <footer class="mbr-small-footer mbr-section mbr-section-nopadding" id="footer1-1"
                        style="background-color: rgb(50, 50, 50); padding-top: 1.75rem; padding-bottom: 1.75rem;">

                    <div class="container">
                        <p class="text-xs-center">Copyright (c) 2016 Mobirise.</p>
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


                <?php

                $error = 1;


            }


        }


    }
}

    

  else  if(isset($_POST['reset'])  &&   $_POST['first_password']==$_POST['second_password']  ){



 $first_get_password=$_POST['first_password'];
 $second_get_password=$_POST['second_password'];


$database='';



$database.= $_POST['database'];

 $roll=$_POST['roll'];


$database=trim($database," ");


//select table
if(!isset($_POST['table'])){   

    if(substr_count($roll, 'placements')==1){


        $table='login_admin';


echo "$table";



 $connect=mysqli_connect("localhost","root","","$database");


$secured_password=password_hash($first_get_password,PASSWORD_BCRYPT, array('cost' => 14));


 $query_validate=" UPDATE $table SET password = '$secured_password' ,admin_forgotpassword='' WHERE username='$roll' ";
 $result_validate=mysqli_query($connect,$query_validate);



if(!$result_validate==null ){



    $error=1;

$_SESSION['recover']=1;
header("Location: login.php");


}
else{







echo "not successfully updated";

}






    }

    //cood table
    else{

    


      $table='login_coordinator';

 $connect=mysqli_connect("localhost","root","","$database");


$secured_password=password_hash($first_get_password,PASSWORD_BCRYPT, array('cost' => 14));


 $query_validate=" UPDATE $table SET password = '$secured_password' ,cood_forgotpassword='' WHERE username='$roll' ";
 $result_validate=mysqli_query($connect,$query_validate);



if(!$result_validate==null ){



    $error=1;

$_SESSION['recover']=1;
header("Location: login.php");


}
else{







echo "not successfully updated";

}





    }
}

//student table

else {  














    $table= $_POST['table'];





 $connect=mysqli_connect("localhost","root","","$database");


$secured_password=password_hash($first_get_password,PASSWORD_BCRYPT, array('cost' => 14));


 $query_validate=" UPDATE $table SET st_pass = '$secured_password' ,st_forgotpassword='' WHERE st_roll='$roll' ";
 $result_validate=mysqli_query($connect,$query_validate);


if(!$result_validate==null ){



    $error=1;

$_SESSION['recover']=1;
header("Location: login.php");


}
else{







echo "not successfully updated";

}










echo "hurray";


    }
}






    //displaying error message
    if($error==0){



      include "error-404.php";

    }







 ?>
