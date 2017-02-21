<?php session_start();
ob_start();


if (!isset($_SESSION['user']) && $_SESSION['user'] == null && isset($_SESSION['user_role'])!='admin' ) {

    header("Location: ../../login");


}

if(isset($_POST['placed'])){


$flag=$_POST['flag'];
$jid=$_POST['jid'];
$checkbox=$_POST['checkbox'];

include "../connect.php";



$query_get_year="SELECT * FROM jobs WHERE job_id='$jid'";
$result_get_year=mysqli_query($connect, $query_get_year);
$row_get_year=mysqli_fetch_assoc($result_get_year);

$year_of_graduation=$row_get_year['year_of_graduation'];





foreach($checkbox as $list){
    
    $query_placed="UPDATE students_".$year_of_graduation." SET _"."$jid='placed' WHERE st_roll='$list'";
    $result_placed=mysqli_query($connect, $query_placed);
    




}

header("Location: show_lists?jid=$jid&flag=$flag");




}


if(isset($_POST['mail']) && isset($_SESSION['user_role'])=='admin' ){


$flag=$_POST['flag'];
$jid=$_POST['jid'];
$checkbox=$_POST['checkbox'];

    $message=$_POST['message'];
    $subject=$_POST['subject'];

   


    //uploading file if exists
    if(isset($_FILES['attachment']) && isset($_SESSION['user_role'])=='admin' ){


      echo  $file_name = $_FILES['attachment']['name'];
      echo  $file_size = $_FILES['attachment']['size'];
       echo $file_tmp = $_FILES['attachment']['tmp_name'];
       echo $file_type = $_FILES['attachment']['type'];



        $value = explode('.',$file_name);




        $file_ext=strtolower(end($value));

        $newfilename = current($value).'_'.time() . '.' . $file_ext;


        move_uploaded_file($file_tmp,"files/$newfilename");



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

$query_get_year="SELECT * FROM jobs WHERE job_id='$jid'";
$result_get_year=mysqli_query($connect, $query_get_year);
$row_get_year=mysqli_fetch_assoc($result_get_year);

$year_of_graduation=$row_get_year['year_of_graduation'];





foreach($checkbox as $list){
    
    $query_mail="SELECT * FROM students_".$year_of_graduation." WHERE st_roll='$list'";
    $result_mail=mysqli_query($connect, $query_mail);
    $row_roll_mail=mysqli_fetch_assoc($result_mail);












        $to=$row_roll_mail['st_email'];

















        $mail->setFrom('dhoni.singh1703@gmail.com', 'RMD Placements');
        $mail->addAddress($to, $to);     // Add a recipient

        $mail->addReplyTo('dhoni.singh1703@gmail.com', 'Reply');





        if(isset($_FILES['attachment']) && isset($_SESSION['user_role'])=='admin' ){



            $mail->addAttachment('files/$newfilename', $newfilename);



        }














        $mail->isHTML(true);

        $mail->Subject = $subject;
        $mail->Body    = '<h3> '.$message.' </h3>';



        if(!$mail->send()) {


            echo 'Mailer Error: ' . $mail->ErrorInfo;

        } else {

            echo 'Message has been sent';

        }


        if(isset($_FILES['attachment']) && isset($_SESSION['user_role'])=='admin' ){



          //  unlink("files/$newfilename");



        }













    }
    // header("Location: show_lists?jid=$jid&flag=$flag");



}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta charset="utf-8"/>
    <title>RMK HIRING SYNERGY</title>

    <meta name="description" content="overview &amp; stats"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../assets/font-awesome/4.5.0/css/font-awesome.min.css"/>


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>


    <!--button-navigation-->
    <script type="text/javascript">
        function myfuncreport() {
            location.href = "reports";

        }
        function myfuncadmin() {
            location.href = "../admin_panel/admin_panel";

        }
        function myfuncjobs() {
            location.href = "../jobs/jobs_panel";

        }
        function myfuncsettings() {
            location.href = "../settings";

        }
        function check1(str) {



            location.href = "show_lists?jid="+str+"&flag=0";

        }
        function check2(str) {



            location.href = "show_lists?jid="+str+"&flag=1";
        }
        function check3(str) {



            location.href = "show_lists?jid="+str+"&flag=2";
        }

        function check4(str) {



            location.href = "show_lists?jid="+str+"&flag=3";
        }
        function placed(){


            var x = document.createElement("INPUT");
            x.setAttribute("type", "hidden");
            x.setAttribute("name", "placed");
            x.setAttribute("value", "placed");
            document.getElementById('form-id').appendChild(x);

            document.getElementById('form-id').submit();
        }

        function mail(){




                var x = document.createElement("INPUT");
                x.setAttribute("type", "hidden");
                x.setAttribute("name", "mail");
                x.setAttribute("value", "mail");
                document.getElementById('form-id').appendChild(x);

                document.getElementById('form-id').submit();




        }

    </script>


    <!-- page specific plugin styles -->

    <!-- text fonts -->
    <link rel="stylesheet" href="../assets/css/fonts.googleapis.com.css"/>

    <!-- ace styles -->
    <link rel="stylesheet" href="../assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style"/>

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="../assets/css/ace-part2.min.css" class="ace-main-stylesheet"/>
    <![endif]-->
    <link rel="stylesheet" href="../assets/css/ace-skins.min.css"/>
    <link rel="stylesheet" href="../assets/css/ace-rtl.min.css"/>

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
        .test {
            width: 13px;
            height: 50px;
            padding: 20px;
            margin: 0px 240px;

            position: relative;
            top: -47px;
            *overflow: hidden;

        }

        .myfont {

            font-size: 22px;
        }


    </style>


</head>

<body class="no-skin">


<div id="navbar" class="navbar navbar-default          ace-save-state">
    <div class="navbar-container ace-save-state" id="navbar-container">
        <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
            <span class="sr-only">Toggle sidebar</span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>
        </button>

        <div class="navbar-header pull-left">
            <a href="show_lists" class="navbar-brand">
                <small>
                    <i class=""></i>
                    <?php

                    $database=$_SESSION['database_name'];
                    if(preg_match('/rmd_database/', $database)){
                        ?>
                        <img src="../images/rmd.jpg" style="height: 25px;">
                        <label style="font-size: large;">RMD Engineering College  </label>

                        <?php
                    }

                    if(preg_match('/rmk_database/', $database)){
                        ?>
                        <img src="../images/rmk.jpg" style="height: 25px;">
                        <label style="font-size: large;">RMK Engineering College </label>

                        <?php
                    }

                    if(preg_match('/rmkcet_database/', $database)){
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
                        $query_table = "SELECT * FROM table_map";
                        $result_table = mysqli_query($connect, $query_table);

                        $no_notification=0;
                        while ($row = mysqli_fetch_assoc($result_table)) {
                            $tname = $row['table_name'];
                            $query_year = "SELECT * from $tname WHERE NOT  st_changephone='' OR NOT st_changemail=''";
                            $result_year = mysqli_query($connect, $query_year);

                            $no_notification  = $no_notification + mysqli_num_rows($result_year);


                        }



                        ?>











                        <i class="ace-icon fa fa-bell icon-animated-bell"></i>
                        <span class="badge badge-important"><?php echo $no_notification ?></span>
                    </a>

                    <ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
                        <li class="dropdown-header">
                            <i class="ace-icon fa fa-exclamation-triangle"></i>
                            <?php echo $no_notification ?> Notifications
                        </li>


                        <li class="dropdown-content">


                            <ul class="dropdown-menu dropdown-navbar navbar-pink">

                                <?php



                                include "../connect.php";
                                $query_table = "SELECT * FROM table_map";
                                $result_table = mysqli_query($connect, $query_table);

                                while ($row = mysqli_fetch_assoc($result_table)) {
                                    $tname = $row['table_name'];
                                    $query_year = "SELECT * from $tname";
                                    $result_year = mysqli_query($connect, $query_year);

                                    $no_notification=mysqli_num_rows($result_year);


                                    while ($row1 = mysqli_fetch_assoc($result_year)) {


                                        if ($row1['st_changemail'] != NULL || $row1['st_changephone']!= NULL) {


                                            ?>

                                            <li>
                                                <a href="../approve?roll=<?php  echo $row1['st_roll']; ?>">
                                                    <div class="clearfix">

		             <span class="pull-left">
			               <i class="btn btn-xs no-hover btn-pink fa fa-comment"></i>
                         <?php  $content= $row1['st_roll'] ;
                         $content.= "," ;
                         $content.= $row1['st_name'];

                         $content.= " has  requested for the change of";

                         if ($row1['st_changemail'] != NULL) {
                             $content.= " Email id : ";
                             $content.=$row1['st_email'];

                             $content.="to : ";
                             $content.=$row1['st_changemail'];



                         }

                         if($row1['st_changephone'] != NULL && $row1['st_changemail'] != NULL ){


                             $content.= " and  ";

                         }






                         if($row1['st_changephone'] != NULL) {



                             $content.= " Phone No : ";
                             $content.= $row1['st_phone'];

                             $content.= "to : ";
                             $content.= $row1['st_changephone'] ;
                         }




                         echo substr($content, 0,25)."......";


                         ?>


                         </p>
				</span>


                                                    </div>
                                                </a>
                                            </li>




                                            <?php
                                        }


                                    }


                                }


                                ?>




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

                        $query="select * from login_admin where username='{$name}'";




                        $result=mysqli_query($connect,$query);

                        if(!$result){


                            mysqli_error($connect);
                        }

                        while($row=mysqli_fetch_assoc($result)){



                            ?>


                            <img class="nav-user-photo" src="../images/<?php echo $row['admin_pic']; ?>" alt="Photo" />
                        <?php } ?>
                        <span class="user-info">
									<small>Welcome,</small>
									Admin
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
        </div>    </div><!-- /.navbar-container -->
</div>

<div class="main-container ace-save-state" id="main-container">
    <script type="text/javascript">
        try {
            ace.settings.loadState('main-container')
        } catch (e) {
        }
    </script>

    <div id="sidebar" class="sidebar                  responsive                    ace-save-state">
        <script type="text/javascript">
            try {
                ace.settings.loadState('sidebar')
            } catch (e) {
            }
        </script>

        <div class="sidebar-shortcuts" id="sidebar-shortcuts">
            <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">


                <button class="btn btn-success" onclick="myfuncreport()" id="myButton1">

                    <i class="ace-icon fa fa-signal"></i>


                </button>


                <button class="btn btn-info" onclick="myfuncadmin()" id="myButton2">
                    <i class="ace-icon fa fa-pencil"></i>
                </button>

                <button class="btn btn-warning" onclick="myfuncjobs()" id="myButton3">
                    <i class="ace-icon fa fa-users"></i>
                </button>

                <button class="btn btn-danger" onclick="myfuncsettings()" id="myButton4">
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
                    <span class="menu-text"> Dashboard </span>
                </a>

                <b class="arrow"></b>
            </li>

            <li class="">
                <a href="../profile/profile">
                    <i class="menu-icon fa fa-user"></i>
                    <span class="menu-text">
							Your Profile
							</span>


                </a>

                <b class="arrow"></b>


            </li>

            <li class="">
                <a href="../settings">
                    <i class="menu-icon fa fa-list"></i>
                    <span class="menu-text"> Settings </span>


                </a>

                <b class="arrow"></b>


            </li>

            <li class="">
                <a href="../admin_panel/admin_panel">
                    <i class="menu-icon fa fa-pencil-square-o"></i>
                    <span class="menu-text"> Admin Panel </span>


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
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-briefcase"></i>
                    <span class="menu-text"> Jobs </span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu">
                    <li class="">
                        <a href="../jobs/view_jobs">
                            <i class="menu-icon fa fa-caret-right"></i>
                            View all Jobs
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a href="../jobs/post_jobs">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Post Job
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a href="../jobs/jobs_panel">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Jobs Panel
                        </a>

                        <b class="arrow"></b>
                    </li>

                </ul>

            </li>


            <li class="active">
                <a href="../reports/reports">

                    <i class="menu-icon fa fa-bar-chart"></i>

                    <span class="menu-text"> Reports </span>
                </a>

                <b class="arrow"></b>
            </li>


            <li class="">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-laptop"></i>
                    <span class="menu-text"> Companies </span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu">
                    <li class="">
                        <a href="../company/create_company">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Create Company
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a href="../company/view_companies">
                            <i class="menu-icon fa fa-caret-right"></i>
                            View Companies
                        </a>

                        <b class="arrow"></b>
                    </li>
                    <li class="">
                        <a href="../company/companies">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Company Panel
                        </a>

                        <b class="arrow"></b>
                    </li>


                </ul>
            </li>

            <li class="">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-tag"></i>
                    <span class="menu-text"> More Pages </span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu">
                    <li class="">
                        <a href="../search/advanced_search">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Advanced Search
                        </a>

                        <b class="arrow"></b>
                    </li>
                    <li class="">
                        <a href="../email/email">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Email
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a href="../status">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Status
                        </a>

                        <b class="arrow"></b>
                    </li>


                </ul>
            </li>


        </ul><!-- /.nav-list -->


        <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
            <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state"
               data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
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
                    <li class="active">Reports</li>
                </ul><!-- /.breadcrumb -->
                <!-- /.nav-search -->
            </div>

            <div class="page-content">
                <!-- /.ace-settings-container -->

                <!--                <div class="page-header">-->
                <!---->
                <!--                </div><!-- /.page-header -->

                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->



                        <div class="row">
                            <div class="col-xs-12">
                                <h3 class="header smaller lighter blue">Reports</h3>

                                    <div class="btn-group pull-right">
                                                <button data-toggle="dropdown" class="btn btn-success btn-lg dropdown-toggle">
                                                    Action
                                                    <i class="ace-icon fa fa-caret-right fa-angle-down icon-on-right"></i>
                                                </button>

                                                <ul class="dropdown-menu dropdown-success dropdown-menu-right">

                                                    <?php

                                                    if(isset($_GET['flag']) && $_GET['flag']==1){



                                                    ?>
                                                    <li>
                                                        <a type="submit"  onclick="placed()">Placed</a>
                                                    </li>

                                                    <?php } ?>
                                                    <li>
                                                     <a href="#modal-form" data-toggle="modal" type="submit"  > Mail</a>
                                                    </li>

                                                </ul>
                                            </div>
                            
                                

                                             
                                <div class="row">
                                    <div class="col-xs-12">
                                       
                                        <div class="tabbable">
                                            <?php

                                            if($_GET['flag']==0) {
                                                ?>

                                                <ul class="nav nav-tabs" id="myTab">
                                                <li class="active" onclick="check1(<?php  echo $_GET['jid'] ?>)">
                                                    <a data-toggle="tab" href="#home">
                                                        <i class="green ace-icon fa fa-user bigger-120 hidden-480"></i>
                                                Eligible
                                                        <span class="badge badge-success">

                                                    <?php
                                                    $jid=$_GET['jid'];

                                                    $query_eligible_year = "SELECT * FROM jobs WHERE job_id='$jid'";
                                                    $result_eligible_year = mysqli_query($connect, $query_eligible_year);
                                                    $row_eligible_year = mysqli_fetch_assoc($result_eligible_year);

                                                    $year_of_gradudation = $row_eligible_year['year_of_graduation'];

                                                    $query_count = " SELECT * FROM students_".$year_of_gradudation." WHERE _" .$jid. "='eligible' OR  _" .$jid. "='accepted'";
                                                    $result_count = mysqli_query($connect, $query_count);
                                                    $eligible = mysqli_num_rows($result_count);


                                                    echo $eligible;




                                                    ?>




                                                </span>
                                                    </a>
                                                </li>

                                                <li class="" onclick="check2(<?php  echo $_GET['jid'] ?>)">
                                                    <a data-toggle="tab" href="#home">
                                                        <i class="blue ace-icon fa fa-user bigger-120 hidden-480"></i>
                                                    Accepted
                                                        <span class="badge badge-primary">
                                                            <?php


                                                            $query_count_accepted = " SELECT * FROM students_".$year_of_gradudation." WHERE _" . $_GET['jid'] . "='accepted'";
                                                            $result_count_accepted = mysqli_query($connect, $query_count_accepted);
                                                            $accepted = mysqli_num_rows($result_count_accepted);


                                                            echo $accepted;

                                                            ?>

                                                        </span>
                                                    </a>
                                                </li>
                                                <li onclick="check3(<?php  echo $_GET['jid'] ?>)">
                                                    <a data-toggle="tab" href="#home">
                                                        <i class="red ace-icon fa fa-user bigger-120 hidden-480"></i>
                                                    Not Accepted
                                                <span class="badge badge-danger">

                                                    <?php

                                                    $query_count = " SELECT * FROM students_".$year_of_gradudation." WHERE _" .$jid. "='eligible'";
                                                    $result_count = mysqli_query($connect, $query_count);
                                                    $eligible = mysqli_num_rows($result_count);


                                                    echo $eligible;




                                                    ?>




                                                </span>
                                                    </a>
                                                </li>
                                                <li class="" onclick="check4(<?php  echo $_GET['jid'] ?>)">
                                                    <a data-toggle="tab" href="#home">
                                                        <i class="green ace-icon fa fa-user bigger-120 hidden-480"></i>
                                                Placed
                                                        <span class="badge badge-success">

                                                    <?php
                                                    $jid=$_GET['jid'];

                                                    $query_eligible_year = "SELECT * FROM jobs WHERE job_id='$jid'";
                                                    $result_eligible_year = mysqli_query($connect, $query_eligible_year);
                                                    $row_eligible_year = mysqli_fetch_assoc($result_eligible_year);

                                                    $year_of_gradudation = $row_eligible_year['year_of_graduation'];

                                                    $query_count = " SELECT * FROM students_".$year_of_gradudation." WHERE _" .$jid. "='placed'";
                                                    $result_count = mysqli_query($connect, $query_count);
                                                    $placed = mysqli_num_rows($result_count);


                                                    echo $placed;




                                                    ?>




                                                </span>
                                                    </a>
                                                </li>


                                            </ul>
                                            <?php

                                            }
                                            else if($_GET['flag']==1){

                                                ?>

                                                <ul class="nav nav-tabs" id="myTab">
                                                    <li class="" onclick="check1(<?php  echo $_GET['jid'] ?>)">
                                                        <a data-toggle="tab" href="#home">
                                                            <i class="green ace-icon fa fa-user bigger-120 hidden-480"></i>
                                                            Eligible
                                                            <span class="badge badge-success">

                                                    <?php
                                                    $jid=$_GET['jid'];

                                                    $query_eligible_year = "SELECT * FROM jobs WHERE job_id='$jid'";
                                                    $result_eligible_year = mysqli_query($connect, $query_eligible_year);
                                                    $row_eligible_year = mysqli_fetch_assoc($result_eligible_year);

                                                    $year_of_gradudation = $row_eligible_year['year_of_graduation'];

                                                    $query_count = " SELECT * FROM students_".$year_of_gradudation." WHERE _" .$jid. "='eligible' OR  _" .$jid. "='accepted'";
                                                    $result_count = mysqli_query($connect, $query_count);
                                                    $eligible = mysqli_num_rows($result_count);


                                                    echo $eligible;




                                                    ?>




                                                </span>
                                                        </a>
                                                    </li>

                                                    <li class="active" onclick="check2(<?php  echo $_GET['jid'] ?>)">
                                                        <a data-toggle="tab" href="#home">
                                                            <i class="blue ace-icon fa fa-user bigger-120 hidden-480"></i>
                                                            Accepted
                                                            <span class="badge badge-primary">
                                                            <?php


                                                            $query_count_accepted = " SELECT * FROM students_".$year_of_gradudation." WHERE _" . $_GET['jid'] . "='accepted'";
                                                            $result_count_accepted = mysqli_query($connect, $query_count_accepted);
                                                            $accepted = mysqli_num_rows($result_count_accepted);


                                                            echo $accepted;

                                                            ?>

                                                        </span>
                                                        </a>
                                                    </li>
                                                    <li onclick="check3(<?php  echo $_GET['jid'] ?>)">
                                                        <a data-toggle="tab" href="#home">
                                                            <i class="red ace-icon fa fa-user bigger-120 hidden-480"></i>
                                                            Not Accepted
                                                            <span class="badge badge-danger">

                                                    <?php

                                                    $query_count = " SELECT * FROM students_".$year_of_gradudation." WHERE _" .$jid. "='eligible'";
                                                    $result_count = mysqli_query($connect, $query_count);
                                                    $eligible = mysqli_num_rows($result_count);


                                                    echo $eligible;




                                                    ?>




                                                </span>
                                                        </a>
                                                    </li>
                                                    <li class="" onclick="check4(<?php  echo $_GET['jid'] ?>)">
                                                    <a data-toggle="tab" href="#home">
                                                        <i class="green ace-icon fa fa-user bigger-120 hidden-480"></i>
                                                Placed
                                                        <span class="badge badge-success">

                                                    <?php
                                                    $jid=$_GET['jid'];

                                                    $query_eligible_year = "SELECT * FROM jobs WHERE job_id='$jid'";
                                                    $result_eligible_year = mysqli_query($connect, $query_eligible_year);
                                                    $row_eligible_year = mysqli_fetch_assoc($result_eligible_year);

                                                    $year_of_gradudation = $row_eligible_year['year_of_graduation'];

                                                    $query_count = " SELECT * FROM students_".$year_of_gradudation." WHERE _" .$jid. "='placed'";
                                                    $result_count = mysqli_query($connect, $query_count);
                                                    $placed = mysqli_num_rows($result_count);


                                                    echo $placed;




                                                    ?>




                                                </span>
                                                    </a>
                                                </li>


                                                </ul>

                                                <?php
                                            }

                                            else if($_GET['flag']==2) {

                                                ?>

                                                <ul class="nav nav-tabs" id="myTab">
                                                    <li class="" onclick="check1(<?php  echo $_GET['jid'] ?>)">
                                                        <a data-toggle="tab" href="#home">
                                                            <i class="green ace-icon fa fa-user bigger-120 hidden-480"></i>
                                                            Eligible
                                                            <span class="badge badge-success">

                                                    <?php
                                                    $jid=$_GET['jid'];

                                                    $query_eligible_year = "SELECT * FROM jobs WHERE job_id='$jid'";
                                                    $result_eligible_year = mysqli_query($connect, $query_eligible_year);
                                                    $row_eligible_year = mysqli_fetch_assoc($result_eligible_year);

                                                    $year_of_gradudation = $row_eligible_year['year_of_graduation'];

                                                    $query_count = " SELECT * FROM students_".$year_of_gradudation." WHERE _" .$jid. "='eligible' OR  _" .$jid. "='accepted'";
                                                    $result_count = mysqli_query($connect, $query_count);
                                                    $eligible = mysqli_num_rows($result_count);


                                                    echo $eligible;




                                                    ?>




                                                </span>
                                                        </a>
                                                    </li>

                                                    <li class="" onclick="check2(<?php  echo $_GET['jid'] ?>)">
                                                        <a data-toggle="tab" href="#home">
                                                            <i class="blue ace-icon fa fa-user bigger-120 hidden-480"></i>
                                                            Accepted
                                                            <span class="badge badge-primary">
                                                            <?php


                                                            $query_count_accepted = " SELECT * FROM students_".$year_of_gradudation." WHERE _" . $_GET['jid'] . "='accepted'";
                                                            $result_count_accepted = mysqli_query($connect, $query_count_accepted);
                                                            $accepted = mysqli_num_rows($result_count_accepted);


                                                            echo $accepted;

                                                            ?>

                                                        </span>
                                                        </a>
                                                    </li >
                                                    <li class="active" onclick="check3(<?php  echo $_GET['jid'] ?>)">
                                                        <a data-toggle="tab" href="#home">
                                                            <i class="red ace-icon fa fa-user bigger-120 hidden-480"></i>
                                                            Not Accepted
                                                            <span class="badge badge-danger">

                                                    <?php

                                                    $query_count = " SELECT * FROM students_".$year_of_gradudation." WHERE _" .$jid. "='eligible'";
                                                    $result_count = mysqli_query($connect, $query_count);
                                                    $eligible = mysqli_num_rows($result_count);


                                                    echo $eligible;




                                                    ?>




                                                </span>
                                                        </a>
                                                    </li>
                                                    <li class="" onclick="check4(<?php  echo $_GET['jid'] ?>)">
                                                    <a data-toggle="tab" href="#home">
                                                        <i class="green ace-icon fa fa-user bigger-120 hidden-480"></i>
                                                Placed
                                                        <span class="badge badge-success">

                                                    <?php
                                                    $jid=$_GET['jid'];

                                                    $query_eligible_year = "SELECT * FROM jobs WHERE job_id='$jid'";
                                                    $result_eligible_year = mysqli_query($connect, $query_eligible_year);
                                                    $row_eligible_year = mysqli_fetch_assoc($result_eligible_year);

                                                    $year_of_gradudation = $row_eligible_year['year_of_graduation'];

                                                    $query_count = " SELECT * FROM students_".$year_of_gradudation." WHERE _" .$jid. "='placed'";
                                                    $result_count = mysqli_query($connect, $query_count);
                                                    $placed = mysqli_num_rows($result_count);


                                                    echo $placed;




                                                    ?>




                                                </span>
                                                    </a>
                                                </li>


                                                </ul>

                                                <?php

                                            }

                                            else if($_GET['flag']==3) {
                                                ?>

                                                <ul class="nav nav-tabs" id="myTab">
                                                <li class="" onclick="check1(<?php  echo $_GET['jid'] ?>)">
                                                    <a data-toggle="tab" href="#home">
                                                        <i class="green ace-icon fa fa-user bigger-120 hidden-480"></i>
                                                Eligible
                                                        <span class="badge badge-success">

                                                    <?php
                                                    $jid=$_GET['jid'];

                                                    $query_eligible_year = "SELECT * FROM jobs WHERE job_id='$jid'";
                                                    $result_eligible_year = mysqli_query($connect, $query_eligible_year);
                                                    $row_eligible_year = mysqli_fetch_assoc($result_eligible_year);

                                                    $year_of_gradudation = $row_eligible_year['year_of_graduation'];

                                                    $query_count = " SELECT * FROM students_".$year_of_gradudation." WHERE _" .$jid. "='eligible' OR  _" .$jid. "='accepted'";
                                                    $result_count = mysqli_query($connect, $query_count);
                                                    $eligible = mysqli_num_rows($result_count);


                                                    echo $eligible;




                                                    ?>




                                                </span>
                                                    </a>
                                                </li>

                                                <li class="" onclick="check2(<?php  echo $_GET['jid'] ?>)">
                                                    <a data-toggle="tab" href="#home">
                                                        <i class="blue ace-icon fa fa-user bigger-120 hidden-480"></i>
                                                    Accepted
                                                        <span class="badge badge-primary">
                                                            <?php


                                                            $query_count_accepted = " SELECT * FROM students_".$year_of_gradudation." WHERE _" . $_GET['jid'] . "='accepted'";
                                                            $result_count_accepted = mysqli_query($connect, $query_count_accepted);
                                                            $accepted = mysqli_num_rows($result_count_accepted);


                                                            echo $accepted;

                                                            ?>

                                                        </span>
                                                    </a>
                                                </li>
                                                <li onclick="check3(<?php  echo $_GET['jid'] ?>)">
                                                    <a data-toggle="tab" href="#home">
                                                        <i class="red ace-icon fa fa-user bigger-120 hidden-480"></i>
                                                    Not Accepted
                                                <span class="badge badge-danger">

                                                    <?php

                                                    $query_count = " SELECT * FROM students_".$year_of_gradudation." WHERE _" .$jid. "='eligible'";
                                                    $result_count = mysqli_query($connect, $query_count);
                                                    $eligible = mysqli_num_rows($result_count);


                                                    echo $eligible;




                                                    ?>




                                                </span>
                                                    </a>
                                                </li>
                                                <li class="active" onclick="check4(<?php  echo $_GET['jid'] ?>)">
                                                    <a data-toggle="tab" href="#home">
                                                        <i class="green ace-icon fa fa-user bigger-120 hidden-480"></i>
                                                Placed
                                                        <span class="badge badge-success">

                                                    <?php
                                                    $jid=$_GET['jid'];

                                                    $query_eligible_year = "SELECT * FROM jobs WHERE job_id='$jid'";
                                                    $result_eligible_year = mysqli_query($connect, $query_eligible_year);
                                                    $row_eligible_year = mysqli_fetch_assoc($result_eligible_year);

                                                    $year_of_gradudation = $row_eligible_year['year_of_graduation'];

                                                    $query_count = " SELECT * FROM students_".$year_of_gradudation." WHERE _" .$jid. "='placed'";
                                                    $result_count = mysqli_query($connect, $query_count);
                                                    $placed = mysqli_num_rows($result_count);


                                                    echo $placed;




                                                    ?>




                                                </span>
                                                    </a>
                                                </li>



                                            </ul>
                                            <?php

                                            }

                                            ?>
                                            <form action="show_lists.php" method="post" enctype="multipart/form-data" id="form-id">


                                                                <div id="modal-form" class="modal" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            

                                        <div class="modal-body">

                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12">

                                                        <div class="space-4"></div>


                                                        

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
                                                <button  type="submit" class="btn btn-sm btn-primary" onclick="mail()">
                                                    <i class="ace-icon fa fa-send"></i>
                                                    SEND
                                                </button>
                                            </div>
                                          
                                        </div>
                                    </div>

                        <!-- PAGE CONTENT ENDS -->
                    </div>
                            

                                            <div class="tab-content">
                                                <div id="home" class="tab-pane fade in active">


                                                    <div class="clearfix">
                                                        <div class="pull-right tableTools-container hello"></div>
                                                    </div>
                                                    <div class="table-header">
                                                        Students List
                                                    </div>


                                                    <div>
                                                        <table id="dynamic-table"
                                                               class="dynamic-table table table-striped table-bordered table-hover">
                                                            <thead>
                                                            <tr>
                                                                <th class="center">
                                                                    <label class="pos-rel">
                                                                        <input type="checkbox" class="ace" />
                                                                        <span class="lbl"></span>
                                                                    </label>
                                                                </th>
                                                                <th>
                                                                    Roll No
                                                                </th>
                                                                <th>Name</th>
                                                                <th>Email</th>


                                                                <th>
                                                                    <i class="ace-icon fa fa-phone bigger-110   "></i>
                                                                    Phone
                                                                </th>
                                                                <th class="  ">CGPA</th>


                                                            </tr>
                                                            </thead>

                                                            <tbody>



                                                            <!--eligible-->
                                                            <?php


                                                            if (isset($_GET['jid']) && $_GET['flag']==0 && isset($_SESSION['user_role'])=='admin' ) {

                                                                $jid = $_GET['jid'];

                                                                include "../connect.php";
                                                                $query_eligible_year = "SELECT * FROM jobs WHERE job_id='$jid'";
                                                                $result_eligible_year = mysqli_query($connect, $query_eligible_year);
                                                                $row_eligible_year = mysqli_fetch_assoc($result_eligible_year);

                                                                $year_of_gradudation = $row_eligible_year['year_of_graduation'];

                                                                $query_job = "SELECT * FROM students_" . $year_of_gradudation . " WHERE  _" . $jid . "='eligible' OR _" . $jid . "='accepted'";
                                                                $result_job = mysqli_query($connect, $query_job);

                                                                ?>

                                                                <input type="text" name="flag" value="0" hidden>
                                                                <input type="text" name="jid" value="<?php echo $jid; ?>" hidden>

                                                                <?php


                                                                while ($row_job = mysqli_fetch_assoc($result_job)) {

                                                                    ?>


                                                                    <tr>
                                                                        <td class="center">
                                                                            <label class="pos-rel">
                                                                                <input type="checkbox" name="checkbox[]" value="<?php echo $row_job['st_roll'] ?>" class="ace" />
                                                                                <span class="lbl"></span>
                                                                            </label>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $row_job['st_roll'] ?>
                                                                        </td>

                                                                        <td>
                                                                            <?php echo $row_job['st_name'] ?>
                                                                        </td>

                                                                        <td class="  "> <?php echo $row_job['st_email'] ?></td>
                                                                        <td> <?php echo $row_job['st_phone'] ?></td>

                                                                        <td class="  ">
                                                                            <span class="label label-sm label-warning"> <?php echo $row_job['st_cgpa'] ?></span>
                                                                        </td>



                                                                    </tr>


                                                                    <?php

                                                                }

                                                            }


                                                            ?>


                                                            <!--Accepted-->


                                                            <?php


                                                            if (isset($_GET['jid']) && $_GET['flag']==1 && isset($_SESSION['user_role'])=='admin' ) {



                                                                $jid = $_GET['jid'];

                                                                include "../connect.php";
                                                                $query_eligible_year = "SELECT * FROM jobs WHERE job_id='$jid'";
                                                                $result_eligible_year = mysqli_query($connect, $query_eligible_year);
                                                                $row_eligible_year = mysqli_fetch_assoc($result_eligible_year);

                                                                $year_of_gradudation = $row_eligible_year['year_of_graduation'];

                                                                $query_job = "SELECT * FROM students_" . $year_of_gradudation . " WHERE   _" . $jid . "='accepted'";
                                                                $result_job = mysqli_query($connect, $query_job);


                                                                ?>

                                                                <input type="text" name="flag" value="1" hidden>
                                                                <input type="text" name="jid" value="<?php echo $jid; ?>" hidden>

                                                                <?php

                                                              

                                                                while ($row_job = mysqli_fetch_assoc($result_job)) {

                                                                    ?>







                                                                    <tr>
                                                                        <td class="center">
                                                                            <label class="pos-rel">
                                                                                <input type="checkbox" name="checkbox[]" value="<?php echo $row_job['st_roll'] ?>" class="ace" />

                                                                                <span class="lbl"></span>
                                                                            </label>

                                                                        </td>
                                                                        <td>
                                                                            <?php echo $row_job['st_roll'] ?>
                                                                        </td>

                                                                        <td>
                                                                            <?php echo $row_job['st_name'] ?>
                                                                        </td>

                                                                        <td class="  "> <?php echo $row_job['st_email'] ?></td>
                                                                        <td> <?php echo $row_job['st_phone'] ?></td>

                                                                        <td class="  ">
                                                                            <span class="label label-sm label-warning"> <?php echo $row_job['st_cgpa'] ?></span>
                                                                        </td>




                                                                    </tr>

                                                                          

                                                                    <?php

                                                                }


                                                            }


                                                            ?>
                                                            <!--not accepted-->

                                                            <?php


                                                            if (isset($_GET['jid']) && $_GET['flag']==2 && isset($_SESSION['user_role'])=='admin' ) {

                                                                $jid = $_GET['jid'];

                                                                include "../connect.php";
                                                                $query_eligible_year = "SELECT * FROM jobs WHERE job_id='$jid'";
                                                                $result_eligible_year = mysqli_query($connect, $query_eligible_year);
                                                                $row_eligible_year = mysqli_fetch_assoc($result_eligible_year);

                                                                $year_of_gradudation = $row_eligible_year['year_of_graduation'];

                                                                $query_job = "SELECT * FROM students_" . $year_of_gradudation . " WHERE   _" . $jid . "='eligible'";
                                                                $result_job = mysqli_query($connect, $query_job);
                                                                ?>

                                                                <input type="text" name="flag" value="2" hidden>
                                                                <input type="text" name="jid" value="<?php echo $jid; ?>" hidden>

                                                                <?php

                                                                while ($row_job = mysqli_fetch_assoc($result_job)) {

                                                                    ?>
                                                                    <tr>
                                                                        <td class="center">
                                                                            <label class="pos-rel">
                                                                                <input type="checkbox" name="checkbox[]" value="<?php echo $row_job['st_roll'] ?>" class="ace" />
                                                                                <span class="lbl"></span>
                                                                            </label>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $row_job['st_roll'] ?>
                                                                        </td>

                                                                        <td>
                                                                            <?php echo $row_job['st_name'] ?>
                                                                        </td>

                                                                        <td class="  "> <?php echo $row_job['st_email'] ?></td>
                                                                        <td> <?php echo $row_job['st_phone'] ?></td>

                                                                        <td class="  ">
                                                                            <span class="label label-sm label-warning"> <?php echo $row_job['st_cgpa'] ?></span>
                                                                        </td>
                                                                    </tr>


                                                                    <?php

                                                                }


                                                            }

                                                            if (isset($_GET['jid']) && $_GET['flag']==3 && isset($_SESSION['user_role'])=='admin' ) {

                                                                $jid = $_GET['jid'];

                                                                include "../connect.php";
                                                                $query_eligible_year = "SELECT * FROM jobs WHERE job_id='$jid'";
                                                                $result_eligible_year = mysqli_query($connect, $query_eligible_year);
                                                                $row_eligible_year = mysqli_fetch_assoc($result_eligible_year);

                                                                $year_of_gradudation = $row_eligible_year['year_of_graduation'];

                                                                $query_job = "SELECT * FROM students_" . $year_of_gradudation . " WHERE   _" . $jid . "='placed'";
                                                                $result_job = mysqli_query($connect, $query_job);
                                                                ?>

                                                                <input type="text" name="flag" value="2" hidden>
                                                                <input type="text" name="jid" value="<?php echo $jid; ?>" hidden>

                                                                <?php

                                                                while ($row_job = mysqli_fetch_assoc($result_job)) {

                                                                    ?>
                                                                    <tr>
                                                                        <td class="center">
                                                                            <label class="pos-rel">
                                                                                <input type="checkbox" name="checkbox[]" value="<?php echo $row_job['st_roll'] ?>" class="ace" />
                                                                                <span class="lbl"></span>
                                                                            </label>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $row_job['st_roll'] ?>
                                                                        </td>

                                                                        <td>
                                                                            <?php echo $row_job['st_name'] ?>
                                                                        </td>

                                                                        <td class="  "> <?php echo $row_job['st_email'] ?></td>
                                                                        <td> <?php echo $row_job['st_phone'] ?></td>

                                                                        <td class="  ">
                                                                            <span class="label label-sm label-warning"> <?php echo $row_job['st_cgpa'] ?></span>
                                                                        </td>
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
                                            </form>
                                        </div>
                                    </div><!-- /.col -->


                                </div>

                                <!-- div.table-responsive -->

                                <!-- div.dataTables_borderWrap -->


                            </div>
                        </div>

                        <div id="modal-form" class="modal" tabindex="-1">

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
    if ('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
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


<script src="../../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="../../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="../../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="../../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="../../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="../../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="../../vendors/jszip/dist/jszip.min.js"></script>
<script src="../../vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="../../vendors/pdfmake/build/vfs_fonts.js"></script>


<!-- ace scripts -->
<script src="../assets/js/ace-elements.min.js"></script>
<script src="../assets/js/ace.min.js"></script>

<!-- inline scripts related to this page -->
<script type="text/javascript">


    jQuery(function ($) {
        //initiate dataTables plugin
        var myTable =
            $('#dynamic-table')
            //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
                .DataTable({
                    bAutoWidth: false,
                    "aoColumns": [
                        { "bSortable": false },
                        null, null, null,null,
                        { "bSortable": false }
                    ],
                    "aaSorting": [],


                    //"bProcessing": true,
                    //"bServerSide": true,
                    //"sAjaxSource": "http://127.0.0.1/table"	,

                    //,
                    //"sScrollY": "200px",
                    //"bPaginate": false,

                    //"sScrollX": "100%"
                    //"sScrollXInner": "120%",
                    //"bScrollCollapse": true,
                    //Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
                    //you may want to wrap the table inside a "div.dataTables_borderWrap" element

                    //"iDisplayLength": 50

//
//                    select: {
//                        style: 'multi'
//                    }
                });


        $.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';

        new $.fn.dataTable.Buttons(myTable, {
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
                    "extend": "pdf",
                    "text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Export to PDF</span>",
                    "className": "btn btn-white btn-primary btn-bold"
                },
                {
                    "extend": "print",
                    "text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'>Print</span>",
                    "className": "btn btn-white btn-primary btn-bold",
                    autoPrint: false,
                    message: 'This print was produced using the Print button for DataTables'
                }
            ]
        });
        myTable.buttons().container().appendTo($('.tableTools-container'));


        //style the message box
        var defaultCopyAction = myTable.button(1).action();
        myTable.button(1).action(function (e, dt, button, config) {
            defaultCopyAction(e, dt, button, config);
            $('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
        });


        var defaultColvisAction = myTable.button(0).action();
        myTable.button(0).action(function (e, dt, button, config) {

            defaultColvisAction(e, dt, button, config);


            if ($('.dt-button-collection > .dropdown-menu').length == 0) {
                $('.dt-button-collection')
                    .wrapInner('<ul class="dropdown-menu dropdown-light dropdown-caret dropdown-caret" />')
                    .find('a').attr('href', '#').wrap("<li />")
            }
            $('.dt-button-collection').appendTo('.tableTools-container .dt-buttons')
        });

        ////

        setTimeout(function () {
            $($('.tableTools-container')).find('a.dt-button').each(function () {
                var div = $(this).find(' > div').first();
                if (div.length == 1) div.tooltip({container: 'body', title: div.parent().text()});
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




    });
</script>

</body>
</html>