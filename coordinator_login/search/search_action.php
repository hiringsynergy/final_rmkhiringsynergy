
<?php session_start();
ob_start();





if(! isset($_SESSION['user']) && $_SESSION['user']==null && isset($_SESSION['user_role'])!='coordinator'){

    header("Location: ../../login");



}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>RMK Campulse</title>
    <link rel="icon" href="../../logos/rmklogo.JPG"  />
    <meta name="description" content="overview &amp; stats" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/font-awesome/4.5.0/css/font-awesome.min.css" />


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


    <!--button-navigation-->
    <script type="text/javascript">
        function myfuncreport() {
            location.href = "../reports/reports";

        }
        function myfuncadmin() {
            location.href = "../admin_panel/admin_panel_woexport";

        }
        function myfuncjobs() {
            location.href = "../jobs/jobs_panel";

        }
        function myfuncsettings() {
            location.href = "../settings";

        }function btnclick(){

            location.href = "../admin_panel/admin_panel";

        }
        function showStudent(str) {
            if (str == "") {
                document.getElementById("modal-form").innerHTML = "";
                return;
            } else {
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("modal-form").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET","../admin_panel/getstudent_export?id="+str,true);
                xmlhttp.send();
            }
        }




    </script>



    <!-- page specific plugin styles -->
    <script type="application/javascript" src="../assets/bootstrap-toggle-master/js/bootstrap-toggle.js"></script>
    <script type="application/javascript" src="../assets/bootstrap-toggle-master/js/bootstrap-toggle.min.js"></script>
    <script type="application/javascript" src="../assets/bootstrap-toggle-master/js/bootstrap2-toggle.js"></script>
    <script type="application/javascript" src="../assets/bootstrap-toggle-master/js/bootstrap2-toggle.min.js"></script>

    <link rel="stylesheet" href="../assets/bootstrap-toggle-master/css/bootstrap-toggle.css">
    <link rel="stylesheet" href="../assets/bootstrap-toggle-master/css/bootstrap-toggle.min.css">
    <link rel="stylesheet" href="../assets/bootstrap-toggle-master/css/bootstrap2-toggle.css">
    <link rel="stylesheet" href="../assets/bootstrap-toggle-master/css/bootstrap2-toggle.min.css">





    <!-- text fonts -->
    <link rel="stylesheet" href="../assets/css/fonts.googleapis.com.css" />

    <!-- ace styles -->
    <link rel="stylesheet" href="../assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="../assets/css/ace-part2.min.css" class="ace-main-stylesheet"/>
    <![endif]-->
    <link rel="stylesheet" href="../assets/css/ace-skins.min.css" />
    <link rel="stylesheet" href="../assets/css/ace-rtl.min.css" />

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="../assets/css/ace-ie.min.css"/>
    <![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->
    <script src="../assets/js/ace-extra.min.js"></script>

    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

    <!--[if lte IE 8]>
    <script src="../assets/js/html5shiv.min.js"></script>
    <script src="../assets/js/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
        .test{
            width: 13px;
            height: 50px;
            padding: 20px;
            margin: 0 240px;

            position: relative;
            top: -47px;
            *overflow: hidden;

        }

        .myfont{

            font-size: 22px;
        }


    </style>





</head>

<body class="no-skin">




<?php







if(isset($_GET['filter']) && isset($_SESSION['user_role'])=='coordinator'){


    include "../connect.php";
    $get_year= $_GET['year'];
    $get_cgpa= $_GET['ugcgpa'];
    $get_12thpercentage= $_GET['12percentage'];
    $get_10thpercentage= $_GET['10percentage'];
    $get_historyofarrears= $_GET['historyofarrears'];
    $get_standingarrears= $_GET['standingarrears'];

    $temp_branch= $_SESSION['cood_branch'];

   /* if(current($get_branch)=="all"){
        $temp_branch="cse','it','eee','ece','eie";
    }

    else {
        $temp_branch=implode("','",$get_branch);
    }
*/


   $get_historyofarrears  = $_GET['historyofarrears'];
    $get_standingarrears= $_GET['standingarrears'];



}

if(isset($_POST['send_mail']) && isset($_POST['filter'])  && isset($_SESSION['user_role'])=='coordinator'){


    //get value from form
    include "../connect.php";


    $get_year= $_POST['get_year'];
    $get_cgpa= $_POST['get_cgpa'];
    $get_12thpercentage= $_POST['get_12thpercentage'];
    $get_10thpercentage= $_POST['get_10thpercentage'];
    $get_historyofarrears=$_POST['get_historyofarrears'];
    $get_standingarrears=$_POST['get_standingarrears'];
    $temp_branch=$_POST['temp_branch'];

    $subject= $_POST['subject'];
    $message=$_POST['message'];





    //uploading file if exists
    if(isset($_FILES['attachment']) && isset($_SESSION['user_role'])=='coordinator'){


        $file_name = $_FILES['attachment']['name'];
        $file_size = $_FILES['attachment']['size'];
        $file_tmp = $_FILES['attachment']['tmp_name'];
        $file_type = $_FILES['attachment']['type'];



        $value = explode('.',$file_name);




        $file_ext=strtolower(end($value));

        $newfilename = $file_name.'_'.time() . '.' . $file_ext;


        move_uploaded_file($file_tmp,"files/".$newfilename);



    }














    //sending mails

    require "../email/PHPMailer/PHPMailerAutoload.php";

    $mail=new PHPMailer();

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'dhoni.singh1703@gmail.com';                 // SMTP username
    $mail->Password = 'akash170397';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;





    set_time_limit(0);

    //sending mail to selected students

    $query_mail = "select * from students_".$get_year." where st_ugspecialization in ('$temp_branch') and st_cgpa>='$get_cgpa' and st_12thpercentage>='$get_12thpercentage' and st_10thpercentage>='$get_10thpercentage' and st_historyofarrears<='$get_historyofarrears' and st_standingarrears<='$get_standingarrears'";

    $result_mail = mysqli_query($connect, $query_mail);
    while($row_mail=mysqli_fetch_assoc($result_mail)){




        $to=$row_mail['st_email'];







        $mail->setFrom('dhoni.singh1703@gmail.com', 'RMD Placements');
        $mail->addAddress($to, $to);     // Add a recipient

        $mail->addReplyTo('dhoni.singh1703@gmail.com', 'Reply');





        if(isset($_FILES['attachment']) && isset($_SESSION['user_role'])=='coordinator'){



            $mail->addAttachment('files/'.$newfilename, $newfilename);



        }














        $mail->isHTML(true);

        $mail->Subject = $subject;
        $mail->Body    = '<h3> '.$message.' </h3>';



        if(!$mail->send()) {


            echo 'Mailer Error: ' . $mail->ErrorInfo;

        } else {

            echo 'Message has been sent';

        }


        if(isset($_FILES['attachment']) && isset($_SESSION['user_role'])=='coordinator'){



            unlink("files/$newfilename");



        }










    }

    header("Location: advanced_search");

}

else if(isset($_POST['send_mail']) && isset($_POST['search']) && isset($_SESSION['user_role'])=='coordinator'){


    $get_roll= $_POST['get_roll'];

    $message=$_POST['message'];
    $subject=$_POST['subject'];

    $stud_roll= explode(', ', $get_roll);








    //uploading file if exists
    if(isset($_FILES['attachment']) && isset($_SESSION['user_role'])=='coordinator'){


        $file_name = $_FILES['attachment']['name'];
        $file_size = $_FILES['attachment']['size'];
        $file_tmp = $_FILES['attachment']['tmp_name'];
        $file_type = $_FILES['attachment']['type'];



        $value = explode('.',$file_name);




        $file_ext=strtolower(end($value));

        $newfilename = $file_name.'_'.time() . '.' . $file_ext;


        move_uploaded_file($file_tmp,"files/".$newfilename);



    }






    //sending mails

    require "../email/PHPMailer/PHPMailerAutoload.php";

    $mail=new PHPMailer();

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'dhoni.singh1703@gmail.com';                 // SMTP username
    $mail->Password = 'akash170397';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;












    include "../connect.php";

    foreach ($stud_roll as $roll_no){





        $roll_year=$roll_no[4].$roll_no[5];
        $year=(int)$roll_year+4;

        $query_get_tablename="SELECT * FROM table_map where table_short='$year'";
        $result_get_tablename=mysqli_query($connect, $query_get_tablename);
        $row_get_talbename=mysqli_fetch_assoc($result_get_tablename);

        $students_table=$row_get_talbename['table_name'];


        $query_fetch_values="SELECT * FROM ".$students_table." where st_roll='$roll_no'";
        $result_fetch_values=mysqli_query($connect, $query_fetch_values);
        $row_roll_mail=mysqli_fetch_assoc($result_fetch_values);




        $to=$row_roll_mail['st_email'];

















        $mail->setFrom('dhoni.singh1703@gmail.com', 'RMD Placements');
        $mail->addAddress($to, $to);     // Add a recipient

        $mail->addReplyTo('dhoni.singh1703@gmail.com', 'Reply');





        if(isset($_FILES['attachment']) && isset($_SESSION['user_role'])=='coordinator'){



            $mail->addAttachment('files/'.$newfilename, $newfilename);



        }














        $mail->isHTML(true);

        $mail->Subject = $subject;
        $mail->Body    = '<h3> '.$message.' </h3>';



        if(!$mail->send()) {


            echo 'Mailer Error: ' . $mail->ErrorInfo;

        } else {

            echo 'Message has been sent';

        }


        if(isset($_FILES['attachment']) && isset($_SESSION['user_role'])=='coordinator'){



            unlink("files/$newfilename");



        }













    }
    header("Location: advanced_search");



}



?>









<div id="navbar" class="navbar navbar-default          ace-save-state">
    <div class="navbar-container ace-save-state" id="navbar-container">
        <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
            <span class="sr-only">Toggle sidebar</span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>
        </button>

        <div class="navbar-header pull-left">
            <a href="search_action" class="navbar-brand">
                <small>
                    <i class=""></i>
                    <?php

                    $database=$_SESSION['database_name'];
                    if(preg_match('/rmd/', $database)){
                        ?>
                        <img src="../images/rmd.jpg" style="height: 25px;">
                        <label style="font-size: large;">RMD Engineering College  </label>

                        <?php
                    }

                    if(preg_match('/rmk/', $database)){
                        ?>
                        <img src="../images/rmk.jpg" style="height: 25px;">
                        <label style="font-size: large;">RMK Engineering College </label>

                        <?php
                    }

                    if(preg_match('/cet/', $database)){
                        ?>
                        <img src="../images/rmkcet.jpg" style="height: 25px;">
                        <label style="font-size: large;">RMK College of Engineering and Technology </label>

                        <?php
                    }


                    ?>
                </small>
            </a>
        </div>
        <div class="navbar-buttons navbar-header pull-right" role="navigation">
            <ul class="nav ace-nav">
            <li class="purple dropdown-modal">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">



             <?php


                        
                         
                                include "../connect.php";
                                //for getting change requests from change table
                                    $query_change = "SELECT * from st_change";
                                    $result_change = mysqli_query($connect, $query_change);
                                    $finfo = $result_change->fetch_fields();
                                        $count=0;
                                     $branch=$_SESSION['cood_branch'];
                                     while($rowr = mysqli_fetch_assoc($result_change)){


                                foreach ($finfo as $val) {


                                        if ($rowr[$val->name] != NULL && substr($rowr[$val->name], 0,1) != 'c' && substr($rowr[$val->name], 0,1) != 'a' && $val->name!="st_regno" && $val->name!="st_year" && $val->name!="st_time" && $val->name!="st_dept" && strcasecmp($rowr['st_dept'], $branch)==0) {
                                            $count++;
                                        }
                                    }
                                }



                        ?>
                        <i class="ace-icon fa fa-bell icon-animated-bell"></i>
                        <span class="badge badge-important"><?php echo $count ?></span>
                    </a>

                    <ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
                        <li class="dropdown-header">
                            <i class="ace-icon fa fa-exclamation-triangle"></i>
                            <?php echo $count ?> Notifications
                        </li>


                        <li class="dropdown-content">


                            <ul class="dropdown-menu dropdown-navbar navbar-pink">

                            </ul>
                        </li>

                        <li class="dropdown-footer">
                            <a href="../approve">
                                See all notifications
                                <i class="ace-icon fa fa-arrow-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="light-blue dropdown-modal">
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">

                        <?php
                        include "../connect.php";
                        $name=$_SESSION['user'];

                        $query="select * from login_coordinator where username='{$name}'";

                        $result=mysqli_query($connect,$query);

                        if(!$result){


                            mysqli_error($connect);
                        }

                        while($row=mysqli_fetch_assoc($result)){



                            ?>


                            <img class="nav-user-photo" src="../images/<?php echo $row['coordinator_pic']; ?>" alt="Jason's Photo" />
                        <?php } ?>
                        <span class="user-info">
									<small>Welcome,</small>
                            <?php echo strtoupper($_SESSION['cood_branch']); ?> Coordinator
								</span>

                        <i class="ace-icon fa fa-caret-down"></i>
                    </a>

                    <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                        <li>
                            <a href="../settings">
                                <i class="ace-icon fa fa-cog"></i>
                                Settings
                            </a>
                        </li>

                        <li>
                            <a href="../profile/profile">
                                <i class="ace-icon fa fa-user"></i>
                                Profile
                            </a>
                        </li>

                        <li class="divider"></li>

                        <li>
                            <a href="../../login_out/logout">
                                <i class="ace-icon fa fa-power-off"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

    </div><!-- /.navbar-container -->
</div>

<div class="main-container ace-save-state" id="main-container">
    <script type="text/javascript">
        try{ace.settings.loadState('main-container')}catch(e){}
    </script>

    <div id="sidebar" class="sidebar                  responsive                    ace-save-state">
        <script type="text/javascript">
            try{ace.settings.loadState('sidebar')}catch(e){}
        </script>

        <div class="sidebar-shortcuts" id="sidebar-shortcuts">
            <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">


                <button class="btn btn-success"  onclick="myfuncreport()" id="myButton1" >

                    <i class="ace-icon fa fa-signal" ></i>


                </button>


                <button class="btn btn-info"  onclick="myfuncadmin()" id="myButton2">
                    <i class="ace-icon fa fa-pencil"></i>
                </button>

                <button class="btn btn-warning"  onclick="myfuncjobs()" id="myButton3">
                    <i class="ace-icon fa fa-users"></i>
                </button>

                <button class="btn btn-danger"  onclick="myfuncsettings()" id="myButton4">
                    <i class="ace-icon fa fa-cogs"></i>
                </button>




            </div>

            <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
                <span class="btn btn-success"></span>

                <span class="btn btn-info"></span>

                <span class="btn btn-warning"></span>

                <span class="btn btn-danger"></span>
            </div>
        </div><!-- /.sidebar-shortcuts -->


        <ul class="nav nav-list">
            <li class="">
                <a href="../index">
                    <i class="menu-icon fa fa-tachometer"></i>
                    <span class="menu-text"> Dashboard</span>
                </a>

                <b class="arrow"></b>
            </li>

            <li class="">
                <a href="../profile/profile" >
                    <i class="menu-icon fa fa-user"></i>
                    <span class="menu-text">
							Profile
							</span>
                </a>

                <b class="arrow"></b>
            </li>

            <li class="">
                <a href="../settings" >
                    <i class="menu-icon fa fa-list"></i>
                    <span class="menu-text"> Settings </span>
                </a>

                <b class="arrow"></b>
            </li>

            <li class="">
                <a href="../approve">
                    <i class="menu-icon fa fa-list-alt"></i>
                    <span class="menu-text"> Approve </span>
                </a>

                <b class="arrow"></b>
            </li>

            <li>
                <a href="../jobs/view_jobs" >
                    <i class="menu-icon fa fa-briefcase"></i>
                    <span class="menu-text"> Jobs </span>

                </a>

                <b class="arrow"></b>

            </li>


            <li class="">
                <a href="../reports/reports">

                    <i class="menu-icon fa fa-bar-chart"></i>

                    <span class="menu-text"> Reports </span>
                </a>

                <b class="arrow"></b>
            </li>




            <li class="">
                <a href="../company/view_companies" >

                    <i class="menu-icon fa fa-laptop"></i>
                    <span class="menu-text"> Companies </span>

                </a>

                <b class="arrow"></b>
            </li>


            <li class="active">
                <a href="../../coordinator_login/search/advanced_search">
                    <i class="menu-icon fa fa-search"></i>
                    Advanced Search
                </a>

                <b class="arrow"></b>
            </li>
        </ul><!-- /.nav-list -->


        <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
            <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
        </div>
    </div>

    <div class="main-content">
        <div class="main-content-inner">
            <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                <ul class="breadcrumb">
                    <li>
                        <i class="ace-icon fa fa-home home-icon"></i>
                        <a href="../../index">Home</a>
                    </li>
                    <li class="active">Filtered Results</li>
                </ul><!-- /.breadcrumb -->
                <!-- /.nav-search -->
            </div>

            <div class="page-content">


                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->

                        <div class="row">
                            <div class="col-xs-12">
                                <h3 class="header smaller lighter blue">Advanced Search</h3>






                                <div class="clearfix">
                                    <div class="pull-right tableTools-container"></div>
                                </div>

                                <div class="table-header">
                                    Results for "Students List"
                                </div>

                                <!-- div.table-responsive -->

                                <!-- div.dataTables_borderWrap -->
                                <div>
                                    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>

                                            <th>Roll No</th>
                                            <th>First Name</th>
                                            <th>Middle Name</th>
                                            <th>Last Name (Mandatory)</th>
                                            <th>Full Name</th>
                                            <th>Gender (Male/Female)</th>
                                            <th>Father Name</th>
                                            <th>Father Occupation</th>
                                            <th>Mother Name</th>
                                            <th>Mother Occupation</th>
                                            <th>Email ID</th>
                                            <th>Mobile Number (10 digits)</th>
                                            <th>Date of Birth (DD-MM-YYYY)</th>
                                            <th>Nationality</th>
                                            <th>Caste</th>
                                            <th>College Name</th>
                                            <th>University</th>
                                            <th>10th %</th>
                                            <th>Board of Study</th>
                                            <th>Medium (Tamil/English/Telugu/Others)</th>
                                            <th>10th - Year of Passing</th>
                                            <th>12th %</th>
                                            <th>Board of Study</th>
                                            <th>Medium (Tamil/English/Telugu/Others)</th>
                                            <th>12th - Year of Passing</th>
                                            <th>Diploma  %</th>
                                            <th>Diploma - Year of Passing</th>
                                            <th>Currently Pursuing (UG/PG)</th>
                                            <th>UG Degree</th>
                                            <th>UG Specialization</th>
                                            <th>1st Sem</th>
                                            <th>2nd Sem</th>
                                            <th>3rd Sem</th>
                                            <th>4th Sem</th>
                                            <th>5th Sem</th>
                                            <th>6th Sem</th>
                                            <th>7th Sem</th>
                                            <th>8th Sem</th>
                                            <th>UG Degree % or CGPA (uptolast semester for which results announced)</th>
                                            <th>UG - Year of Passing</th>
                                            <th>PG Degree</th>
                                            <th>PG Specialization</th>
                                            <th>1st Sem</th>
                                            <th>2nd Sem</th>
                                            <th>3rd Sem</th>
                                            <th>4th Sem</th>
                                            <th>PG Degree % or CGPA (upto last semester for which results announced)</th>
                                            <th>PG - Year of Passing</th>
                                            <th>Day Scholar/ Hosteler</th>
                                            <th>No History of Arreas</th>
                                            <th>Current Degree. No of Standing Arrears</th>
                                            <th>Home Town</th>
                                            <th>Permanent Address (Line 1)</th>
                                            <th>Permanent Address (Line 2)</th>
                                            <th>Permanent City</th>
                                            <th>State</th>
                                            <th>Postal code</th>
                                            <th>Contact Number ( Landline)</th>
                                            <th>If any Skill Certifications Obtained Name the Skill</th>
                                            <th>Duration of the course</th>
                                            <th>Certification Vendor/Authority/Agency Name</th>
                                            <th>CoE Certification</th>
                                            <th>Gap in studies</th>
                                            <th>Gap in studies Reason</th>
                                            <th>English Percentage</th>
                                            <th>Quantitative  Percentage</th>
                                            <th>Logical Percentage</th>
                                            <th>Overall Average</th>
                                            <th>Percentage</th>
                                            <th>Candidate ID</th>
                                            <th>Signature</th>
                                            <th>Placement Status</th>






                                        </tr>
                                        </thead>

                                        <tbody>

                                        <?php



                                        include "../connect.php";


                                        if(isset($_GET['search']) && isset($_SESSION['user_role'])=='coordinator'){


                                            include "../connect.php";
                                            $tags= $_GET['tags'];

                                            $values= explode(', ', $tags);




                                            foreach ($values as $temp){

                                                $get_year=$temp[4].$temp[5];
                                                $year=(int)$get_year+4;


                                                //echo $temp." ".$year;

                                                $query_get_tablename="SELECT * FROM table_map where table_short='$year'";
                                                $result_get_tablename=mysqli_query($connect, $query_get_tablename);
                                                $row_get_talbename=mysqli_fetch_assoc($result_get_tablename);

                                                $students_table=$row_get_talbename['table_name'];
                                                $temp_branch=$_SESSION['cood_branch'];


                                                $query_fetch_values="SELECT * FROM ".$students_table." where st_roll='$temp'  and st_ugspecialization='$temp_branch'";
                                                $result_fetch_values=mysqli_query($connect, $query_fetch_values);
                                                $row=mysqli_fetch_assoc($result_fetch_values);

                                                $roll=$row['st_roll'];
                                                $first_name=$row['st_firstname'];
                                                $middle_name=$row['st_middlename'];
                                                $last_name=$row['st_lastname'];
                                                $name=$row['st_name'];
                                                $gender=$row['st_gender'];
                                                $father_name=$row['st_fathername'];
                                                $father_occupation=$row['st_fatheroccupation'];
                                                $mother_name=$row['st_mothername'];
                                                $mother_occupation=$row['st_motheroccupation'];
                                                $email=$row['st_email'];
                                                $phone=$row['st_phone'];
                                                $dob=$row['st_dob'];
                                                $nationality=$row['st_nationality'];
                                                $caste=$row['st_caste'];
                                                $college_name=$row['st_collegename'];
                                                $university=$row['st_university'];
                                                $_10percentage=$row['st_10thpercentage'];
                                                $_10boardofstudy=$row['st_10thboardofstudy'];
                                                $_10medium=$row['st_10thmedium'];
                                                $_10yearofpassing=$row['st_10thyearofpassing'];
                                                $_12percentage=$row['st_12thpercentage'];
                                                $_12boardofstudy=$row['st_12thboardofstudy'];
                                                $_12medium=$row['st_12thmedium'];
                                                $_12yearofpassing=$row['st_12thyearofpassing'];
                                                $dippercentage=$row['st_dippercentage'];
                                                $dipyearofpassing=$row['st_dipyearofpassing'];
                                                $current=$row['st_currentlypursuing'];
                                                $ugdeg=$row['st_ugdegree'];
                                                $ugspecial=$row['st_ugspecialization'];
                                                $ug1sem=$row['st_1stsem'];
                                                $ug2sem=$row['st_2ndsem'];
                                                $ug3sem=$row['st_3rdsem'];
                                                $ug4sem=$row['st_4thsem'];
                                                $ug5sem=$row['st_5thsem'];
                                                $ug6sem=$row['st_6thsem'];
                                                $ug7sem=$row['st_7thsem'];
                                                $ug8sem=$row['st_8thsem'];
                                                $cgpa=$row['st_cgpa'];
                                                $ugyearofpassing=$row['st_ugyearofpassing'];
                                                $pgdeg=$row['st_pgdegree'];
                                                $pgspecial=$row['st_pgspecialization'];
                                                $pg1sem=$row['st_pg1stsem'];
                                                $pg2sem=$row['st_pg2ndsem'];
                                                $pg3sem=$row['st_pg3rdsem'];
                                                $pg4sem=$row['st_pg4thsem'];
                                                $pgcgpa=$row['st_pgcgpa'];
                                                $pgyearofpassing=$row['st_pgyearofpassing'];
                                                $dayhostel=$row['st_dayorhostel'];
                                                $historyofarrears=$row['st_historyofarrears'];
                                                $standingarrears=$row['st_standingarrears'];
                                                $hometown=$row['st_hometown'];
                                                $address1=$row['st_address1'];
                                                $address2=$row['st_address2'];
                                                $city=$row['st_city'];
                                                $state=$row['st_state'];
                                                $postal_code=$row['st_posatlcode'];
                                                $landline=$row['st_landline'];
                                                $skill=$row['st_skillcertification'];
                                                $duration=$row['st_duration'];
                                                $vendor=$row['st_vendor'];
                                                $coecertification=$row['st_coecertification'];
                                                $gap=$row['st_gapinstudies'];
                                                $reason=$row['st_reason'];
                                                $english=$row['st_english'];
                                                $quantitative=$row['st_quantitative'];
                                                $logical=$row['st_logical'];
                                                $overall=$row['st_overall'];
                                                $percentage=$row['st_percentage'];
                                                $candidate=$row['st_candidateid'];
                                                $signature=$row['st_signature'];
                                                $placement_status=$row['st_placementstatus'];



                                                ?>


                                                <tr>

                                                    <td>

                                                        <?php echo $roll ?>

                                                    </td>
                                                    <td>
                                                        <?php echo $first_name ?>
                                                    </td>
                                                    <td class=" "><?php echo $middle_name ?></td>

                                                    <td><?php echo $last_name  ?></td>
                                                    <td><?php echo $name  ?></td>
                                                    <td><?php echo  $gender ?></td>
                                                    <td><?php echo $father_name ?></td>
                                                    <td><?php echo $father_occupation ?></td>
                                                    <td><?php echo $mother_name ?></td>
                                                    <td><?php echo $mother_occupation ?></td>
                                                    <td><?php echo $email ?></td>
                                                    <td><?php echo $phone ?></td>
                                                    <td><?php echo $dob ?></td>
                                                    <td><?php echo $nationality ?></td>
                                                    <td><?php echo $caste ?></td>
                                                    <td><?php echo $college_name ?></td>
                                                    <td><?php echo $university ?></td>
                                                    <td><?php echo $_10percentage ?></td>
                                                    <td><?php echo $_10boardofstudy ?></td>
                                                    <td><?php echo $_10medium ?></td>
                                                    <td><?php echo $_10yearofpassing ?></td>
                                                    <td><?php echo $_12percentage ?></td>
                                                    <td><?php echo $_12boardofstudy ?></td>
                                                    <td><?php echo $_12medium ?></td>
                                                    <td><?php echo $_12yearofpassing ?></td>
                                                    <td><?php echo $dippercentage ?></td>
                                                    <td><?php echo $dipyearofpassing ?></td>
                                                    <td><?php echo $current ?></td>
                                                    <td><?php echo $ugdeg ?></td>
                                                    <td><?php echo $ugspecial ?></td>
                                                    <td><?php echo $ug1sem ?></td>
                                                    <td><?php echo $ug2sem ?></td>
                                                    <td><?php echo $ug3sem ?></td>
                                                    <td><?php echo $ug4sem ?></td>
                                                    <td><?php echo $ug5sem ?></td>
                                                    <td><?php echo $ug6sem ?></td>
                                                    <td><?php echo $ug7sem ?></td>
                                                    <td><?php echo $ug8sem ?></td>
                                                    <?php

                                                    if($cgpa>8){


                                                        ?>
                                                        <td class=" ">
                                                            <span class="label label-sm label-success"><?php echo $cgpa ?></span>
                                                        </td>
                                                        <?php

                                                    }

                                                    else{

                                                        ?>
                                                        <td class=" ">
                                                            <span class="label label-sm label-important"><?php echo $cgpa ?></span>
                                                        </td>
                                                        <?php

                                                    }

                                                    ?>

                                                    <td><?php echo $ugyearofpassing ?></td>
                                                    <td><?php echo $pgdeg ?></td>
                                                    <td><?php echo $pgspecial ?></td>
                                                    <td><?php echo $pg1sem ?></td>
                                                    <td><?php echo $pg2sem ?></td>
                                                    <td><?php echo $pg3sem ?></td>
                                                    <td><?php echo $pg4sem ?></td>
                                                    <td><?php echo $pgcgpa ?></td>
                                                    <td><?php echo $pgyearofpassing ?></td>
                                                    <td><?php echo $dayhostel ?></td>
                                                    <td><?php echo $historyofarrears ?></td>
                                                    <td><?php echo $standingarrears ?></td>
                                                    <td><?php echo $hometown ?></td>
                                                    <td><?php echo $address1 ?></td>
                                                    <td><?php echo $address2 ?></td>
                                                    <td><?php echo $city ?></td>
                                                    <td><?php echo $state ?></td>
                                                    <td><?php echo $postal_code ?></td>
                                                    <td><?php echo $landline ?></td>
                                                    <td><?php echo $skill ?></td>
                                                    <td><?php echo $duration ?></td>
                                                    <td><?php echo $vendor ?></td>
                                                    <td><?php echo $coecertification ?></td>
                                                    <td><?php echo $gap ?></td>
                                                    <td><?php echo $reason ?></td>
                                                    <td><?php echo $english ?></td>
                                                    <td><?php echo $quantitative ?></td>
                                                    <td><?php echo $logical ?></td>
                                                    <td><?php echo $overall ?></td>
                                                    <td><?php echo $percentage ?></td>
                                                    <td><?php echo $candidate ?></td>
                                                    <td><?php echo $signature ?></td>
                                                    <td><?php echo $placement_status ?></td>












                                                </tr>



                                                <?php
                                            }




                                        }


                                        else if(isset($_GET['filter']) && isset($_SESSION['user_role'])=='coordinator') {


                                            $get_year=$_GET['year'];

                                            include "../connect.php";

                                            //st_ugyearofpassing='$get_year' and

                                            $query = "select * from students_".$get_year." where st_ugspecialization in ('$temp_branch') and st_cgpa>='$get_cgpa' and st_12thpercentage>='$get_12thpercentage' and st_10thpercentage>='$get_10thpercentage' and st_historyofarrears<='$get_historyofarrears' and st_standingarrears<='$get_standingarrears'";

                                            $result = mysqli_query($connect, $query);

                                            if (!$result) {
                                                die("" . mysqli_error($connect));
                                            }
                                            if (!$connect) {
                                                die("" . mysqli_error($connect));
                                            }


                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $roll = $row['st_roll'];
                                                $first_name = $row['st_firstname'];
                                                $middle_name = $row['st_middlename'];
                                                $last_name = $row['st_lastname'];
                                                $name = $row['st_name'];
                                                $gender = $row['st_gender'];
                                                $father_name = $row['st_fathername'];
                                                $father_occupation = $row['st_fatheroccupation'];
                                                $mother_name = $row['st_mothername'];
                                                $mother_occupation = $row['st_motheroccupation'];
                                                $email = $row['st_email'];
                                                $phone = $row['st_phone'];
                                                $dob = $row['st_dob'];
                                                $nationality = $row['st_nationality'];
                                                $caste = $row['st_caste'];
                                                $college_name = $row['st_collegename'];
                                                $university = $row['st_university'];
                                                $_10percentage = $row['st_10thpercentage'];
                                                $_10boardofstudy = $row['st_10thboardofstudy'];
                                                $_10medium = $row['st_10thmedium'];
                                                $_10yearofpassing = $row['st_10thyearofpassing'];
                                                $_12percentage = $row['st_12thpercentage'];
                                                $_12boardofstudy = $row['st_12thboardofstudy'];
                                                $_12medium = $row['st_12thmedium'];
                                                $_12yearofpassing = $row['st_12thyearofpassing'];
                                                $dippercentage = $row['st_dippercentage'];
                                                $dipyearofpassing = $row['st_dipyearofpassing'];
                                                $current = $row['st_currentlypursuing'];
                                                $ugdeg = $row['st_ugdegree'];
                                                $ugspecial = $row['st_ugspecialization'];
                                                $ug1sem = $row['st_1stsem'];
                                                $ug2sem = $row['st_2ndsem'];
                                                $ug3sem = $row['st_3rdsem'];
                                                $ug4sem = $row['st_4thsem'];
                                                $ug5sem = $row['st_5thsem'];
                                                $ug6sem = $row['st_6thsem'];
                                                $ug7sem = $row['st_7thsem'];
                                                $ug8sem = $row['st_8thsem'];
                                                $cgpa = $row['st_cgpa'];
                                                $ugyearofpassing = $row['st_ugyearofpassing'];
                                                $pgdeg = $row['st_pgdegree'];
                                                $pgspecial = $row['st_pgspecialization'];
                                                $pg1sem = $row['st_pg1stsem'];
                                                $pg2sem = $row['st_pg2ndsem'];
                                                $pg3sem = $row['st_pg3rdsem'];
                                                $pg4sem = $row['st_pg4thsem'];
                                                $pgcgpa = $row['st_pgcgpa'];
                                                $pgyearofpassing = $row['st_pgyearofpassing'];
                                                $dayhostel = $row['st_dayorhostel'];
                                                $historyofarrears = $row['st_historyofarrears'];
                                                $standingarrears = $row['st_standingarrears'];
                                                $hometown = $row['st_hometown'];
                                                $address1 = $row['st_address1'];
                                                $address2 = $row['st_address2'];
                                                $city = $row['st_city'];
                                                $state = $row['st_state'];
                                                $postal_code = $row['st_posatlcode'];
                                                $landline = $row['st_landline'];
                                                $skill = $row['st_skillcertification'];
                                                $duration = $row['st_duration'];
                                                $vendor = $row['st_vendor'];
                                                $coecertification = $row['st_coecertification'];
                                                $gap = $row['st_gapinstudies'];
                                                $reason = $row['st_reason'];
                                                $english = $row['st_english'];
                                                $quantitative = $row['st_quantitative'];
                                                $logical = $row['st_logical'];
                                                $overall = $row['st_overall'];
                                                $percentage = $row['st_percentage'];
                                                $candidate = $row['st_candidateid'];
                                                $signature = $row['st_signature'];
                                                $placement_status = $row['st_placementstatus'];


                                                ?>


                                                <tr>

                                                    <td>

                                                        <?php echo $roll ?>

                                                    </td>
                                                    <td>
                                                        <?php echo $first_name ?>
                                                    </td>
                                                    <td class=" "><?php echo $middle_name ?></td>

                                                    <td><?php echo $last_name ?></td>
                                                    <td><?php echo $name ?></td>
                                                    <td><?php echo $gender ?></td>
                                                    <td><?php echo $father_name ?></td>
                                                    <td><?php echo $father_occupation ?></td>
                                                    <td><?php echo $mother_name ?></td>
                                                    <td><?php echo $mother_occupation ?></td>
                                                    <td><?php echo $email ?></td>
                                                    <td><?php echo $phone ?></td>
                                                    <td><?php echo $dob ?></td>
                                                    <td><?php echo $nationality ?></td>
                                                    <td><?php echo $caste ?></td>
                                                    <td><?php echo $college_name ?></td>
                                                    <td><?php echo $university ?></td>
                                                    <td><?php echo $_10percentage ?></td>
                                                    <td><?php echo $_10boardofstudy ?></td>
                                                    <td><?php echo $_10medium ?></td>
                                                    <td><?php echo $_10yearofpassing ?></td>
                                                    <td><?php echo $_12percentage ?></td>
                                                    <td><?php echo $_12boardofstudy ?></td>
                                                    <td><?php echo $_12medium ?></td>
                                                    <td><?php echo $_12yearofpassing ?></td>
                                                    <td><?php echo $dippercentage ?></td>
                                                    <td><?php echo $dipyearofpassing ?></td>
                                                    <td><?php echo $current ?></td>
                                                    <td><?php echo $ugdeg ?></td>
                                                    <td><?php echo $ugspecial ?></td>
                                                    <td><?php echo $ug1sem ?></td>
                                                    <td><?php echo $ug2sem ?></td>
                                                    <td><?php echo $ug3sem ?></td>
                                                    <td><?php echo $ug4sem ?></td>
                                                    <td><?php echo $ug5sem ?></td>
                                                    <td><?php echo $ug6sem ?></td>
                                                    <td><?php echo $ug7sem ?></td>
                                                    <td><?php echo $ug8sem ?></td>
                                                    <?php

                                                    if ($cgpa > 8) {


                                                        ?>
                                                        <td class=" ">
                                                            <span class="label label-sm label-success"><?php echo $cgpa ?></span>
                                                        </td>
                                                        <?php

                                                    } else {

                                                        ?>
                                                        <td class=" ">
                                                            <span class="label label-sm label-important"><?php echo $cgpa ?></span>
                                                        </td>
                                                        <?php

                                                    }

                                                    ?>

                                                    <td><?php echo $ugyearofpassing ?></td>
                                                    <td><?php echo $pgdeg ?></td>
                                                    <td><?php echo $pgspecial ?></td>
                                                    <td><?php echo $pg1sem ?></td>
                                                    <td><?php echo $pg2sem ?></td>
                                                    <td><?php echo $pg3sem ?></td>
                                                    <td><?php echo $pg4sem ?></td>
                                                    <td><?php echo $pgcgpa ?></td>
                                                    <td><?php echo $pgyearofpassing ?></td>
                                                    <td><?php echo $dayhostel ?></td>
                                                    <td><?php echo $historyofarrears ?></td>
                                                    <td><?php echo $standingarrears ?></td>
                                                    <td><?php echo $hometown ?></td>
                                                    <td><?php echo $address1 ?></td>
                                                    <td><?php echo $address2 ?></td>
                                                    <td><?php echo $city ?></td>
                                                    <td><?php echo $state ?></td>
                                                    <td><?php echo $postal_code ?></td>
                                                    <td><?php echo $landline ?></td>
                                                    <td><?php echo $skill ?></td>
                                                    <td><?php echo $duration ?></td>
                                                    <td><?php echo $vendor ?></td>
                                                    <td><?php echo $coecertification ?></td>
                                                    <td><?php echo $gap ?></td>
                                                    <td><?php echo $reason ?></td>
                                                    <td><?php echo $english ?></td>
                                                    <td><?php echo $quantitative ?></td>
                                                    <td><?php echo $logical ?></td>
                                                    <td><?php echo $overall ?></td>
                                                    <td><?php echo $percentage ?></td>
                                                    <td><?php echo $candidate ?></td>
                                                    <td><?php echo $signature ?></td>
                                                    <td><?php echo $placement_status ?></td>


                                                </tr>


                                                <?php
                                            }


                                        }








                                        ?>

                                        </tbody>


                                    </table>




                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-xs-12 ">
                                <div class="form-actions center">


                                    <a href="#modal-form" role="button" class="btn btn-success" data-toggle="modal">SEND MAIL <i class="ace-icon fa fa-envelope icon-on-right bigger-130"></i></a>


                                </div>
                            </div>

                            <div id="modal-form" class="modal" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="search_action" method="post" enctype="multipart/form-data">

                                            <div class="modal-body">

                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-12">

                                                        <div class="space-4"></div>


                                                        <?php   if(isset($_GET['filter']) && isset($_SESSION['user_role'])=='coordinator'){

                                                            ?>

                                                            <input type="hidden" value="<?php echo $get_year ?>" name="get_year">
                                                            <input type="hidden" value="<?php echo $get_cgpa ?>" name="get_cgpa">
                                                            <input type="hidden" value="<?php echo $get_12thpercentage ?>" name="get_12thpercentage">
                                                            <input type="hidden" value="<?php echo $get_10thpercentage ?>" name="get_10thpercentage">
                                                            <input type="hidden" value="<?php echo $get_historyofarrears ?>" name="get_historyofarrears">
                                                            <input type="hidden" value="<?php echo $get_standingarrears ?>" name="get_standingarrears">
                                                            <input type="hidden" value="<?php echo $temp_branch ?>" name="temp_branch">
                                                            <input type="hidden" value="filter" name="filter">







                                                            <?php


                                                        }
                                                        else if(isset($_GET['search']) && isset($_SESSION['user_role'])=='coordinator'){

                                                            $tags= $_GET['tags'];
                                                            ?>

                                                            <input type="hidden" value="<?php echo $tags ?>" name="get_roll">

                                                            <input type="hidden" value="search" name="search">







                                                            <?php


                                                        }

                                                        ?>


                                                        <div class="form-group">
                                                            <label for="form-field-username">Subject</label>

                                                            <div>
                                                                <input type="text" name="subject" id="form-field-username" class="col-xs-8" placeholder="Enter Subject" value="" />
                                                            </div>
                                                        </div>
                                                        <br/>
                                                        <div class="space-16"></div>


                                                        <div class="form-group">
                                                            <label for="form-field-first">Message</label>

                                                            <div>
                                                                <textarea id="form-field-11" name="message" rows="6" cols="9"class="autosize-transition form-control"></textarea>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="space-16"></div>


                                                    <div class="col-xs-8 col-sm-12 ">

                                                        <div class="space-16"></div>
                                                        <label for="id-input-file-2">Attachment</label>



                                                        <input type="file" id="id-input-file-2" name="attachment" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="space-16"></div>
                                            <div class="modal-footer center">
                                                <button class="btn btn-sm" data-dismiss="modal">
                                                    <i class="ace-icon fa fa-times"></i>
                                                    Cancel
                                                </button>
                                                <button name="send_mail" type="submit" class="btn btn-sm btn-primary">
                                                    <i class="ace-icon fa fa-send"></i>
                                                    SEND
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <!-- PAGE CONTENT ENDS -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.page-content -->
                </div>
            </div><!-- /.main-content -->

            <div class="footer">
                <div class="footer-inner">
                    <div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">RMK</span>
							Group of Institutions
						</span>

                        &nbsp; &nbsp;

                    </div>
                </div>
            </div>

            <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
                <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
            </a>
        </div><!-- /.main-container -->

        <!-- basic scripts -->

        <!--[if !IE]> -->
        <script src="../assets/js/jquery-2.1.4.min.js"></script>

        <!-- <![endif]-->

        <!--[if IE]>
        <script src="../assets/js/jquery-1.11.3.min.js"></script>
        <![endif]-->
        <script type="text/javascript">
            if('ontouchstart' in document.documentElement) document.write("<script src='../assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
        </script>
        <script src="../assets/js/bootstrap.min.js"></script>

        <!-- page specific plugin scripts -->
        <script src="../assets/js/jquery.dataTables.min.js"></script>
        <script src="../assets/js/jquery.dataTables.bootstrap.min.js"></script>
        <script src="../assets/js/dataTables.buttons.min.js"></script>
        <script src="../assets/js/buttons.flash.min.js"></script>
        <script src="../assets/js/buttons.html5.min.js"></script>
        <script src="../assets/js/buttons.print.min.js"></script>
        <script src="../assets/js/buttons.colVis.min.js"></script>
        <script src="../assets/js/dataTables.select.min.js"></script>


        <script src="../assets/js/bootbox.js"></script>

        <script src="../assets/js/autosize.min.js"></script>


        <script src="../../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
        <script src="../../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="../../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="../../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
        <script src="../../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
        <script src="../../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="../../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
        <script src="../../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
        <script src="../../vendors/jszip/dist/jszip.min.js"></script>
        <script src="../../vendors/pdfmake/build/pdfmake.min.js"></script>
        <script src="../../vendors/pdfmake/build/vfs_fonts.js"></script>

















        <!-- ace scripts -->
        <script src="../assets/js/ace-elements.min.js"></script>
        <script src="../assets/js/ace.min.js"></script>

        <!-- inline scripts related to this page -->
        <script type="text/javascript">


            ;






            jQuery(function($) {
                //initiate dataTables plugin
                var myTable =
                    $('#dynamic-table')
                        .wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
                        .DataTable( {
                            bAutoWidth: false,
                            "aoColumns": [

                                null, null, null, null, null, null, null, null, null, null,
                                null, null, null, null, null, null, null, null, null ,null,
                                null, null,null, null, null, null, null, null, null, null,
                                null, null,null, null, null, null, null, null, null, null,
                                null, null,null, null, null, null, null, null, null, null,
                                null, null,null, null, null, null, null, null, null, null,
                                null, null,null, null, null, null, null, null, null, null,
                                null,null




                            ],
                            "aaSorting": [],



                            //"bProcessing": true,
                            //"bServerSide": true,
                            //"sAjaxSource": "http://127.0.0.1/table"	,

                            //,
                            //"sScrollY": "200px",
                            //"bPaginate": false,

                            "sScrollX": "100px"
                            //"sScrollXInner": "120%",
                            //"bScrollCollapse": true
                            //Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
                            //you may want to wrap the table inside a "div.dataTables_borderWrap" element

                            //"iDisplayLength": 50

//
//                    select: {
//                        style: 'multi'
//                    }
                        } );



                $.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';

                new $.fn.dataTable.Buttons( myTable, {
                    buttons: [
                        {
                            "extend": "colvis",
                            "text": "<i class='fa fa-search bigger-110 blue'></i> <span class='hidden'>Show/hide columns</span>",
                            "className": "btn btn-white btn-primary btn-bold",
                            columns: ':not(:first):not(:last)'
                        },
                        {
                            "extend": "copy",
                            "text": "<i class='fa fa-copy bigger-110 pink'></i> <span class='hidden'>Copy to clipboard</span>",
                            "className": "btn btn-white btn-primary btn-bold"
                        },
                        {
                            "extend": "csv",
                            "text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'>Export to CSV</span>",
                            "className": "btn btn-white btn-primary btn-bold"


                        },
//                {
//                    extend: 'excelHtml5',
//                    "text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
//                   "className": "btn btn-white btn-primary btn-bold"
//
//                },
                        {
                            "extend": "excel",
                            "text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
                            "className": "btn btn-white btn-primary btn-bold"
                        },

                        {
                            "extend": "print",
                            "text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'>Print</span>",
                            "className": "btn btn-white btn-primary btn-bold",
                            autoPrint: false,
                            message: ''
                        }
                    ]
                } );
                myTable.buttons().container().appendTo( $('.tableTools-container') );



                //style the message box
                var defaultCopyAction = myTable.button(1).action();
                myTable.button(1).action(function (e, dt, button, config) {
                    defaultCopyAction(e, dt, button, config);
                    $('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
                });


                var defaultColvisAction = myTable.button(0).action();
                myTable.button(0).action(function (e, dt, button, config) {

                    defaultColvisAction(e, dt, button, config);


                    if($('.dt-button-collection > .dropdown-menu').length == 0) {
                        $('.dt-button-collection')
                            .wrapInner('<ul class="dropdown-menu dropdown-light dropdown-caret dropdown-caret" />')
                            .find('a').attr('href', '#').wrap("<li />")
                    }
                    $('.dt-button-collection').appendTo('.tableTools-container .dt-buttons')
                });

                ////

                setTimeout(function() {
                    $($('.tableTools-container')).find('a.dt-button').each(function() {
                        var div = $(this).find(' > div').first();
                        if(div.length == 1) div.tooltip({container: 'body', title: div.parent().text()});
                        else $(this).tooltip({container: 'body', title: $(this).text()});
                    });
                }, 500);



                $(' #id-input-file-2').ace_file_input({
                    no_file:'No File ...',
                    btn_choose:'Choose',
                    btn_change:'Change',
                    droppable:false,
                    onchange:null,
                    thumbnail:false //| true | large
                    //whitelist:'gif|png|jpg|jpeg'
                    //blacklist:'exe|php'
                    //onchange:''
                    //
                });









                $("#bootbox-regular").on(ace.click_event, function() {
                    bootbox.prompt("What is your name?", function(result) {
                        if (result === null) {

                        } else {

                        }
                    });
                });

                $('#modal-form input[type=file]').ace_file_input({
                    style:'well',
                    btn_choose:'Drop files here or click to choose',
                    btn_change:null,
                    no_icon:'ace-icon fa fa-cloud-upload',
                    droppable:true,
                    thumbnail:'large'
                })

                //chosen plugin inside a modal will have a zero width because the select element is originally hidden
                //and its width cannot be determined.
                //so we set the width after modal is show
                $('#modal-form').on('shown.bs.modal', function () {
                    if(!ace.vars['touch']) {
                        $(this).find('.chosen-container').each(function(){
                            $(this).find('a:first-child').css('width' , '210px');
                            $(this).find('.chosen-drop').css('width' , '210px');
                            $(this).find('.chosen-search input').css('width' , '200px');
                        });
                    }
                })
                /**
                 //or you can activate the chosen plugin after modal is shown
                 //this way select element becomes visible with dimensions and chosen works as expected
                 $('#modal-form').on('shown', function () {
					$(this).find('.modal-chosen').chosen();
				})
                 */

                $('[data-rel=tooltip]').tooltip({container:'body'});
                $('[data-rel=popover]').popover({container:'body'});

                autosize($('textarea[class*=autosize]'));

                $('textarea.limited').inputlimiter({
                    remText: '%n character%s remaining...',
                    limitText: 'max allowed : %n.'
                });


                $.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';

                new $.fn.dataTable.Buttons( myTable, {
                    buttons: [
                        {
                            "extend": "colvis",
                            "text": "<i class='fa fa-search bigger-110 blue'></i> <span class='hidden'>Show/hide columns</span>",
                            "className": "btn btn-white btn-primary btn-bold",
                            columns: ':not(:first):not(:last)'
                        },
                        {
                            "extend": "copy",
                            "text": "<i class='fa fa-copy bigger-110 pink'></i> <span class='hidden'>Copy to clipboard</span>",
                            "className": "btn btn-white btn-primary btn-bold"
                        },
                        {
                            "extend": "csv",
                            "text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'>Export to CSV</span>",
                            "className": "btn btn-white btn-primary btn-bold"


                        },
//                {
//                    extend: 'excelHtml5',
//                    "text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
//                   "className": "btn btn-white btn-primary btn-bold"
//
//                },
                        {
                            "extend": "excel",
                            "text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
                            "className": "btn btn-white btn-primary btn-bold"
                        },

                        {
                            "extend": "print",
                            "text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'>Print</span>",
                            "className": "btn btn-white btn-primary btn-bold",
                            autoPrint: false,
                            message: ''
                        }
                    ]
                } );
                myTable.buttons().container().appendTo( $('.tableTools-container') );


                $('#chk1').click(function(){
                    $("button").toggle(200, function(){
                        location.href="../admin_panel/admin_panel_woexport"
                    });
                });

                //style the message box
                var defaultCopyAction = myTable.button(1).action();
                myTable.button(1).action(function (e, dt, button, config) {
                    defaultCopyAction(e, dt, button, config);
                    $('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
                });


                var defaultColvisAction = myTable.button(0).action();
                myTable.button(0).action(function (e, dt, button, config) {

                    defaultColvisAction(e, dt, button, config);


                    if($('.dt-button-collection > .dropdown-menu').length == 0) {
                        $('.dt-button-collection')
                            .wrapInner('<ul class="dropdown-menu dropdown-light dropdown-caret dropdown-caret" />')
                            .find('a').attr('href', '#').wrap("<li />")
                    }
                    $('.dt-button-collection').appendTo('.tableTools-container .dt-buttons')
                });

                ////

                setTimeout(function() {
                    $($('.tableTools-container')).find('a.dt-button').each(function() {
                        var div = $(this).find(' > div').first();
                        if(div.length == 1) div.tooltip({container: 'body', title: div.parent().text()});
                        else $(this).tooltip({container: 'body', title: $(this).text()});
                    });
                }, 500);





                myTable.on( 'select', function ( e, dt, type, index ) {
                    if ( type === 'row' ) {
                        $( myTable.row( index ).node() ).find('input:checkbox').prop('checked', true);
                    }
                } );
                myTable.on( 'deselect', function ( e, dt, type, index ) {
                    if ( type === 'row' ) {
                        $( myTable.row( index ).node() ).find('input:checkbox').prop('checked', false);
                    }
                } );




                /////////////////////////////////
                //table checkboxes
                $('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);



                //select/deselect all rows according to table header checkbox
                $('#dynamic-table > thead > tr > th input[type=checkbox], #dynamic-table_wrapper input[type=checkbox]').eq(0).on('click', function(){
                    var th_checked = this.checked;//checkbox inside "TH" table header

                    $('#dynamic-table').find('tbody > tr').each(function(){
                        var row = this;
                        if(th_checked) myTable.row(row).select();
                        else  myTable.row(row).deselect();
                    });
                });


                //select/deselect a row when the checkbox is checked/unchecked
                $('#dynamic-table').on('click', 'tr input[type=checkbox]' , function(){
                    var $row = $(this).closest('tr');
                    if(this.checked) $row.addClass("selected highlight");
                    else $row.removeClass("selected highlight");
                });



                $(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
                    e.stopImmediatePropagation();
                    e.stopPropagation();
                    e.preventDefault();
                });



                //And for the first simple table, which doesn't have TableTools or dataTables
                //select/deselect all rows according to table header checkbox
                var active_class = 'active';
                $('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
                    var th_checked = this.checked;//checkbox inside "TH" table header

                    $(this).closest('table').find('tbody > tr').each(function(){
                        var row = this;
                        if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
                        else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
                    });
                });

                //select/deselect a row when the checkbox is checked/unchecked
                $('#simple-table').on('click', 'td input[type=checkbox]' , function(){
                    var $row = $(this).closest('tr');
                    if($row.is('.detail-row ')) return;
                    if(this.checked) $row.addClass(active_class);
                    else $row.removeClass(active_class);
                });



                /********************************/
                //add tooltip for small view action buttons in dropdown menu
                $('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});

                //tooltip placement on right or left
                function tooltip_placement(context, source) {
                    var $source = $(source);
                    var $parent = $source.closest('table')
                    var off1 = $parent.offset();
                    var w1 = $parent.width();

                    var off2 = $source.offset();
                    //var w2 = $source.width();

                    if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
                    return 'left';
                }




                /***************/
                $('.show-details-btn').on('click', function(e) {
                    e.preventDefault();
                    $(this).closest('tr').next().toggleClass('open');
                    $(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
                });
                /***************/



                $('#modal-form input[type=file]').ace_file_input({
                    style:'well',
                    btn_choose:'Drop files here or click to choose',
                    btn_change:null,
                    no_icon:'ace-icon fa fa-cloud-upload',
                    droppable:true,
                    thumbnail:'large'
                });

                //chosen plugin inside a modal will have a zero width because the select element is originally hidden
                //and its width cannot be determined.
                //so we set the width after modal is show
                $('#modal-form').on('shown.bs.modal', function () {
                    if(!ace.vars['touch']) {
                        $(this).find('.chosen-container').each(function(){
                            $(this).find('a:first-child').css('width' , '210px');
                            $(this).find('.chosen-drop').css('width' , '210px');
                            $(this).find('.chosen-search input').css('width' , '200px');
                        });
                    }
                });



                /**
                 //add horizontal scrollbars to a simple table
                 $('#simple-table').css({'width':'2000px', 'max-width': 'none'}).wrap('<div style="width: 1000px;" />').parent().ace_scroll(
                 {
                   horizontal: true,
                   styleClass: 'scroll-top scroll-dark scroll-visible',//show the scrollbars on top(default is bottom)
                   size: 2000,
                   mouseWheelLock: true
                 }
                 ).css('padding-top', '12px');
                 */


            })
        </script>

</body>
</html>