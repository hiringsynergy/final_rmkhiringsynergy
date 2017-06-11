
<?php



session_start();
ob_start();





if(! isset($_SESSION['user']) && $_SESSION['user']==null && isset($_SESSION['user_role'])!='admin' ){

    header("Location: ../login");


}



?>

<?php

if(isset($_GET['id']) && isset($_SESSION['user_role'])=='admin' ){

    include "connect.php";
    $user=$_GET['id'];
    $pass=$_GET['value'];




    $pass=mysqli_real_escape_string($connect, $pass);
    $secured_pass=password_hash($pass, PASSWORD_BCRYPT  ,array("cost"=>14));


    $query="UPDATE login_admin SET password='{$secured_pass}' WHERE username='{$user}'";

    $result=mysqli_query($connect, $query);

    $row=mysqli_fetch_assoc($result);
    $pass=$row['password'];

    header("Location: ../admin_login/settings");


}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>RMK HIRING SYNERGY</title>

    <meta name="description" content="overview &amp; stats" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


    <!--button-navigation-->
    <script type="text/javascript">
        function myfuncreport() {
            location.href = "reports/reports";

        }
        function myfuncadmin() {
            location.href = "admin_panel/admin_panel";

        }
        function myfuncjobs() {
            location.href = "jobs/jobs_panel";

        }
        function myfuncsettings() {
            location.href = "settings";


        }



    </script>






    <!-- page specific plugin styles -->
    <link rel="stylesheet" href="assets/css/jquery-ui.min.css" />


    <style type="text/css">
        .test{

            margin-left: 20%;

        }

        #shadow{

            width: auto;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }




    </style>



    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

    <!-- page specific plugin styles -->
    <link rel="stylesheet" href="assets/css/jquery-ui.min.css" />

    <!-- text fonts -->
    <link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

    <!-- ace styles -->
    <link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
    <![endif]-->
    <link rel="stylesheet" href="assets/css/ace-skins.min.css" />
    <link rel="stylesheet" href="assets/css/ace-rtl.min.css" />

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
    <![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->
    <script src="assets/js/ace-extra.min.js"></script>

    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

    <!--[if lte IE 8]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>

<body class="no-skin  ">
<div id="navbar" class="navbar navbar-default          ace-save-state">
    <div class="navbar-container ace-save-state" id="navbar-container">
        <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
            <span class="sr-only">Toggle sidebar</span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>
        </button>

        <div class="navbar-header pull-left">
            <a href="index" class="navbar-brand">
                <small>
                    <i class=""></i>
                    <?php

                    $database=$_SESSION['database_name'];
                    if(preg_match('/rmd/', $database)){
                        ?>
                        <img src="images/rmd.jpg" style="height: 25px;">
                        <label style="font-size: large;">RMD Engineering College  </label>

                        <?php
                    }

                    if(preg_match('/rmk/', $database)){
                        ?>
                        <img src="images/rmk.jpg" style="height: 25px;">
                        <label style="font-size: large;">RMK Engineering College </label>

                        <?php
                    }

                    if(preg_match('/cet/', $database)){
                        ?>
                        <img src="images/rmkcet.jpg" style="height: 25px;">
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


                        
                         
                                include "connect.php";
                                //for getting change requests from change table
                                    $query_change = "SELECT * from st_change";
                                    $result_change = mysqli_query($connect, $query_change);
                                    $finfo = $result_change->fetch_fields();
                                        $count=0;
                                     while($rowr = mysqli_fetch_assoc($result_change)){


                                foreach ($finfo as $val) {


                                        if ($rowr[$val->name] != NULL && substr($rowr[$val->name], 0,1) != 'c' && substr($rowr[$val->name], 0,1) != 'a' && $val->name!="st_regno" && $val->name!="st_year" && $val->name!="st_time" && $val->name!="st_dept") {
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
                            <a href="approve">
                                See all notifications
                                <i class="ace-icon fa fa-arrow-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="light-blue dropdown-modal">
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">

                        <?php
                        include "connect.php";
                        $name=$_SESSION['user'];

                        $query="select * from login_admin where username='{$name}'";




                        $result=mysqli_query($connect,$query);

                        if(!$result){


                            mysqli_error($connect);
                        }

                        while($row=mysqli_fetch_assoc($result)){



                            ?>


                            <img class="nav-user-photo" src="images/<?php echo $row['admin_pic']; ?>" alt="Jason's Photo" />
                        <?php } ?>
                        <span class="user-info">
									<small>Welcome,</small>
									Admin
								</span>

                        <i class="ace-icon fa fa-caret-down"></i>
                    </a>

                    <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                        <li>
                            <a href="#">
                                <i class="ace-icon fa fa-cog"></i>
                                Settings
                            </a>
                        </li>

                        <li>
                            <a href="profile/profile">
                                <i class="ace-icon fa fa-user"></i>
                                Profile
                            </a>
                        </li>

                        <li class="divider"></li>

                        <li>
                            <a href="../login_out/logout">
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
        <!--side bar begins-->


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
                <a href="index">
                    <i class="menu-icon fa fa-tachometer"></i>
                    <span class="menu-text">Dashboard</span>
                </a>

                <b class="arrow"></b>
            </li>

            <li class="">
                <a href="profile/profile" >
                    <i class="menu-icon fa fa-user"></i>
                    <span class="menu-text">
							Your Profile
							</span>


                </a>

                <b class="arrow"></b>


            </li>

            <li class="">
                <a href="settings" >
                    <i class="menu-icon fa fa-list"></i>
                    <span class="menu-text"> Settings </span>


                </a>

                <b class="arrow"></b>


            </li>

            <li class="">
                <a href="admin_panel/admin_panel" >
                    <i class="menu-icon fa fa-pencil-square-o"></i>
                    <span class="menu-text"> Admin Panel </span>


                </a>

                <b class="arrow"></b>


            </li>

            <li class="">
                <a href="approve">
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
                        <a href="jobs/view_jobs">
                            <i class="menu-icon fa fa-caret-right"></i>
                            View all Jobs
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a href="jobs/post_jobs">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Post Job
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a href="jobs/jobs_panel">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Jobs Panel
                        </a>

                        <b class="arrow"></b>
                    </li>

                </ul>

            </li>


            <li class="">
                <a href="reports/reports">

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
                        <a href="company/create_company">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Create Company
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a href="company/companies">
                            <i class="menu-icon fa fa-caret-right"></i>
                            View Companies
                        </a>

                        <b class="arrow"></b>
                    </li>
                    <li class="">
                        <a href="company/companies">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Company Panel
                        </a>

                        <b class="arrow"></b>
                    </li>


                </ul>
            </li>

            <li class="active open">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-tag"></i>
                    <span class="menu-text"> More Pages </span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu">
                    <li class="">
                        <a href="search/advanced_search">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Advanced Search
                        </a>

                        <b class="arrow"></b>
                    </li>
                    <li class="">
                        <a href="email/email">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Email
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="active">
                        <a href="status">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Status
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a href="reportgeneration.php">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Report Generation
                        </a>

                        <b class="arrow"></b>
                    </li>






                </ul>
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
                        <a href="../index.html">Home</a>
                    </li>
                    <li class="active">Status</li>
                </ul><!-- /.breadcrumb -->
                <!-- /.nav-search -->
            </div>

            <div class="page-content">
                <!-- /.ace-settings-container -->

                <div class="page-header">
                    <h1>
                        Status

                    </h1>
                </div><!-- /.page-header -->

                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->


                        <div id="timeline-1">
                            <div class="row">
                                <div class="col-xs-12 col-sm-10 col-sm-offset-1">




                                    <?php

                                    include "connect.php";


                                    date_default_timezone_set('Asia/Kolkata');

                                    $previous=null;

                                    // echo "branch".$student_branch;

                                    $query="SELECT * FROM st_change";
                                    $result=mysqli_query($connect, $query);

                                    $finfo = $result->fetch_fields();
                                    while($rowr = mysqli_fetch_assoc($result)) {


                                        foreach ($finfo as $val) {


                                            if ($rowr[$val->name] != NULL && (substr($rowr[$val->name], 0, 1) == 'c' || substr($rowr[$val->name], 0, 1) == 'a') && $val->name != "st_regno" && $val->name != "st_year" && $val->name != "st_time" && $val->name != "st_dept") {
                                                $colname = $val->name;


                                                //for mapping column names
                                                // $query_changemap = "SELECT * from st_changetable where st_columnname='$colname'";
                                                // $result_changemap = mysqli_query($connect, $query_changemap);
                                                // $rowchangemap = mysqli_fetch_assoc($result_changemap);

                                                // $changemapname=$rowchangemap['st_columnnamemap'];

                                                // $oldcolumnname=$rowchangemap['st_oldname'];

                                                //for getting old values from student table

                                                $reg_no = $rowr['st_regno'];
                                                $year = $rowr['st_year'];
                                                $dept = $rowr['st_dept'];
                                                // $query_student = "SELECT * from students_".$rowr['st_year']." WHERE st_roll='$reg_no' ";
                                                // $result_student = mysqli_query($connect, $query_student);
                                                // $rowstudent = mysqli_fetch_assoc($result_student);
                                                // $oldcolumnvalue=$rowstudent[$oldcolumnname];

                                                // if(!$result_student){

                                                //     die(mysqli_error($connect));
                                                // }


                                                $time = substr($rowr[$val->name], 6, 10);

                                                $time_now = time();


                                                $date = date("M d, Y", $time);


                                                //calculating no. of days

                                                $date_now = date("Y-m-d", $time_now);
                                                $date_job_posted = date("Y-m-d", $time);

                                                $dateTime1 = date_create($date_now);
                                                $dateTime2 = date_create($date_job_posted);

                                                $date_diffe_job_posted = date_diff($dateTime1, $dateTime2);

                                                $no_of_days = $date_diffe_job_posted->format('%a');


                                                $get_time = date("G:i", $time);

                                                $diff = $time_now - $time;


                                                if ($no_of_days == 0) {

                                                    //today


                                                    ?>

                                                    <div class="timeline-container">

                                                    <?php if ($previous != 'today') { ?>
                                                        <div class="timeline-label">
                                                            <span class="label label-primary arrowed-in-right label-lg">
                                                                <b>Today</b>
                                                            </span>
                                                        </div>


                                                    <?php } ?>
                                                    <div class="timeline-items">
                                                    <div class="timeline-item clearfix">
                                                    <div class="timeline-info">


                                                        <?php

                                                        $database = $_SESSION['database_name'];

                                                        if (preg_match('/rmd/', $database)) {

                                                            ?>


                                                            <img src="images/rmd.jpg">

                                                            <?php

                                                        }
                                                        if (preg_match('/rmk/', $database)) {

                                                            ?>


                                                            <img src="images/rmk.jpg">

                                                            <?php

                                                        }
                                                        if (preg_match('/cet/', $database)) {

                                                            ?>


                                                            <img src="images/rmkcet.jpg">

                                                            <?php

                                                        }


                                                        ?>


                                                        <span class="label label-info label-sm"><?php echo $get_time ?></span>
                                                    </div>
                                                    <div class="widget-box transparent">
                                                    <div class="widget-header widget-header-small">
                                                        <h5 class="widget-title smaller">
                                                            <a href="#" class="blue">
                                                                <?php


                                                                $database = $_SESSION['database_name'];
                                                                if (preg_match('/rmd/', $database)) {
                                                                    ?>

                                                                    <label style="font-size: large;">RMD Engineering
                                                                        College </label>
                                                                    <?php
                                                                }
                                                                if (preg_match('/rmk/', $database)) {
                                                                    ?>

                                                                    <label style="font-size: large;">RMK Engineering
                                                                        College </label>
                                                                    <?php
                                                                }
                                                                if (preg_match('/cet/', $database)) {
                                                                    ?>

                                                                    <label style="font-size: large;">RMK College of
                                                                        Engineering and Technology </label>
                                                                    <?php
                                                                }
                                                                ?>


                                                            </a>
                                                            <span class="grey">Status Update</span>
                                                        </h5>
                                                        <span class="widget-toolbar no-border">
                                                                            <i class="ace-icon fa fa-clock-o bigger-110"></i>
                                                            <?php echo $get_time ?>
                                                                        </span>
                                                        <span class="widget-toolbar">

                                                                            <a href="#" data-action="collapse">
                                                                                <i class="ace-icon fa fa-chevron-up"></i>
                                                                            </a>
                                                                        </span>
                                                    </div>
                                                    <div class="widget-main">
                                                    The request given by <?php echo $reg_no; ?>,
                                                    was <?php if (substr($rowr[$val->name], 2, 3) == 'acc'){ echo "approved by ";
                                                        if (substr($rowr[$val->name], 0, 1) == 'a') echo "admin.";
                                                        else if (substr($rowr[$val->name], 0, 1) == 'c')
                                                            echo "coordinator";
                                                    }
                                                        else if (substr($rowr[$val->name], 2, 3) == 'dec') {
                                                            echo "declined by ";


                                                        if (substr($rowr[$val->name], 0, 1) == 'a') echo "admin. Reason :".substr($rowr[$val->name], 18);
                                                        else if (substr($rowr[$val->name], 0, 1) == 'c')
                                                            echo "coordinator. Reason :".substr($rowr[$val->name], 18);
                                                        }
                                                            ?>
                                                        <!-- <span class="red" style="font-size: 17px;"> <?php echo $row['job_title'] ?> </span> from company
                                                                      <span class="green" style="font-size: 17px;"><?php echo $row['company'] ?> </span>
                                                                      has been posted, Hurry up to checkout the status &hellip; -->
                                                        <div class="space-6"></div>
                                                        <div class="widget-toolbox clearfix">


                                                        </div>
                                                        </div>
                                                        </div>
                                                        </div>


                                                        </div>
                                                        </div>


                                                        <?php

                                                        $previous = 'today';



                                                } else if ($no_of_days == 1) {


                                                    //yesterday

                                                    ?>


                                                    <div class="timeline-container">



                                                    <?php if ($previous != 'yesterday') { ?>

                                                        <div class="timeline-label">
                                                            <span class="label label-success arrowed-in-right label-lg">
                                                                <b>Yesterday</b>
                                                            </span>
                                                        </div>

                                                    <?php } ?>
                                                    <div class="timeline-items">
                                                    <div class="timeline-item clearfix">
                                                    <div class="timeline-info">


                                                        <?php

                                                        $database = $_SESSION['database_name'];

                                                        if (preg_match('/rmd/', $database)) {

                                                            ?>


                                                            <img src="images/rmd.jpg">

                                                            <?php

                                                        }
                                                        if (preg_match('/rmk/', $database)) {

                                                            ?>


                                                            <img src="images/rmk.jpg">

                                                            <?php

                                                        }
                                                        if (preg_match('/cet/', $database)) {

                                                            ?>


                                                            <img src="images/rmkcet.jpg">

                                                            <?php

                                                        }


                                                        ?>


                                                        <span class="label label-info label-sm"><?php echo $get_time ?></span>
                                                    </div>
                                                    <div class="widget-box transparent">

                                                    <div class="widget-header widget-header-small">
                                                        <h5 class="widget-title smaller">
                                                            <a href="#" class="blue">
                                                                <?php


                                                                $database = $_SESSION['database_name'];
                                                                if (preg_match('/rmd/', $database)) {
                                                                    ?>

                                                                    <label style="font-size: large;">RMD Engineering
                                                                        College </label>
                                                                    <?php
                                                                }
                                                                if (preg_match('/rmk/', $database)) {
                                                                    ?>

                                                                    <label style="font-size: large;">RMK Engineering
                                                                        College </label>
                                                                    <?php
                                                                }
                                                                if (preg_match('/cet/', $database)) {
                                                                    ?>

                                                                    <label style="font-size: large;">RMK College of
                                                                        Engineering and Technology </label>
                                                                    <?php
                                                                }
                                                                ?>


                                                            </a>
                                                            <span class="grey">Status Update</span>
                                                        </h5>
                                                        <span class="widget-toolbar no-border">
                                                                            <i class="ace-icon fa fa-clock-o bigger-110"></i>
                                                            <?php echo $get_time ?>
                                                                        </span>
                                                        <span class="widget-toolbar">

                                                                            <a href="#" data-action="collapse">
                                                                                <i class="ace-icon fa fa-chevron-up"></i>
                                                                            </a>
                                                                        </span>
                                                    </div>
                                                    <div class="widget-main">
                                                    The request given by <?php echo $reg_no; ?>,
                                                    was <?php if (substr($rowr[$val->name], 2, 3) == 'acc'){ echo "approved by ";
                                                        if (substr($rowr[$val->name], 0, 1) == 'a') echo "admin.";
                                                        else if (substr($rowr[$val->name], 0, 1) == 'c')
                                                            echo "coordinator";
                                                    }
                                                        else if (substr($rowr[$val->name], 2, 3) == 'dec') {
                                                            echo "declined by ";


                                                        if (substr($rowr[$val->name], 0, 1) == 'a') echo "admin. Reason :".substr($rowr[$val->name], 18);
                                                        else if (substr($rowr[$val->name], 0, 1) == 'c')
                                                            echo "coordinator. Reason :".substr($rowr[$val->name], 18);
                                                        }
                                                            ?>
                                                        <!-- <span class="red" style="font-size: 17px;"> <?php echo $row['job_title'] ?> </span> from company
                                                                      <span class="green" style="font-size: 17px;"><?php echo $row['company'] ?> </span>
                                                                      has been posted, Hurry up to checkout the status &hellip; -->
                                                        <div class="space-6"></div>
                                                        <div class="widget-toolbox clearfix">


                                                        </div>
                                                        </div>
                                                        </div>
                                                        </div>


                                                        </div>
                                                        </div>


                                                        <?php


                                                        $previous = 'yesterday';

                                                    } else {

                                                        //other day


                                                        ?>




                                                        <div class="timeline-container">

                                                        <?php if ($previous != $date) { ?>
                                                            <div class="timeline-label">
                                                            <span class="label label-warning arrowed-in-right label-lg">
                                                                <b><?php echo $date ?></b>
                                                            </span>
                                                            </div>

                                                        <?php } ?>
                                                        <div class="timeline-items">
                                                        <div class="timeline-item clearfix">
                                                        <div class="timeline-info">


                                                            <?php

                                                            $database = $_SESSION['database_name'];

                                                            if (preg_match('/rmd/', $database)) {

                                                                ?>


                                                                <img src="images/rmd.jpg">

                                                                <?php

                                                            }
                                                            if (preg_match('/rmk/', $database)) {

                                                                ?>


                                                                <img src="images/rmk.jpg">

                                                                <?php

                                                            }
                                                            if (preg_match('/cet/', $database)) {

                                                                ?>


                                                                <img src="images/rmkcet.jpg">

                                                                <?php

                                                            }


                                                            ?>


                                                            <span class="label label-info label-sm"><?php echo $get_time ?></span>
                                                        </div>
                                                        <div class="widget-box transparent">
                                                        <div class="widget-header widget-header-small">
                                                            <h5 class="widget-title smaller">
                                                                <a href="#" class="blue">
                                                                    <?php


                                                                    $database = $_SESSION['database_name'];
                                                                    if (preg_match('/rmd/', $database)) {
                                                                        ?>

                                                                        <label style="font-size: large;">RMD Engineering
                                                                            College </label>
                                                                        <?php
                                                                    }
                                                                    if (preg_match('/rmk/', $database)) {
                                                                        ?>

                                                                        <label style="font-size: large;">RMK Engineering
                                                                            College </label>
                                                                        <?php
                                                                    }
                                                                    if (preg_match('/cet/', $database)) {
                                                                        ?>

                                                                        <label style="font-size: large;">RMK College of
                                                                            Engineering and Technology </label>
                                                                        <?php
                                                                    }
                                                                    ?>


                                                                </a>
                                                                <span class="grey">Status Update</span>
                                                            </h5>
                                                            <span class="widget-toolbar no-border">
                                                                            <i class="ace-icon fa fa-clock-o bigger-110"></i>
                                                                <?php echo $get_time ?>
                                                                        </span>
                                                            <span class="widget-toolbar">

                                                                            <a href="#" data-action="collapse">
                                                                                <i class="ace-icon fa fa-chevron-up"></i>
                                                                            </a>
                                                                        </span>
                                                        </div>
                                                        <div class="widget-body">
                                                        <div class="widget-main">
                                                        The request given by <?php echo $reg_no; ?>,
                                                        was <?php if (substr($rowr[$val->name], 2, 3) == 'acc'){ echo "approved by ";
                                                        if (substr($rowr[$val->name], 0, 1) == 'a') echo "admin.";
                                                        else if (substr($rowr[$val->name], 0, 1) == 'c')
                                                            echo "coordinator";
                                                    }
                                                        else if (substr($rowr[$val->name], 2, 3) == 'dec') {
                                                            echo "declined by ";


                                                        if (substr($rowr[$val->name], 0, 1) == 'a') echo "admin. Reason :".substr($rowr[$val->name], 18);
                                                        else if (substr($rowr[$val->name], 0, 1) == 'c')
                                                            echo "coordinator. Reason :".substr($rowr[$val->name], 18);
                                                        }
                                                            ?>
                                                            <!-- <span class="red" style="font-size: 17px;"> <?php echo $row['job_title'] ?> </span> from company
                                                                      <span class="green" style="font-size: 17px;"><?php echo $row['company'] ?> </span>
                                                                      has been posted, Hurry up to checkout the status &hellip; -->
                                                            <div class="space-6"></div>
                                                            <div class="widget-toolbox clearfix">


                                                            </div>
                                                            </div>
                                                            </div>
                                                            </div>
                                                            </div>
                                                            </div>
                                                            </div>


                                                            <?php


                                                            $previous = $date;
                                                        }


                                                    }
                                                }


                                    }
















                                            ?>




                            </div>
                            </div>
                        </div>




                        <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
                </div><!-- /.row-->
            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->


    <div class="footer ">
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
        <script src="assets/js/jquery-2.1.4.min.js"></script>

        <!-- <![endif]-->

        <!--[if IE]>
        <script src="assets/js/jquery-1.11.3.min.js"></script>
        <![endif]-->
        <script type="text/javascript">
            if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
        </script>
        <script src="assets/js/bootstrap.min.js"></script>

        <!-- page specific plugin scripts -->
        <script src="assets/js/jquery-ui.min.js"></script>
        <script src="assets/js/jquery.ui.touch-punch.min.js"></script>

        <!-- ace scripts -->
        <script src="assets/js/ace-elements.min.js"></script>
        <script src="assets/js/ace.min.js"></script>

        <!-- inline scripts related to this page -->


        <script type="application/javascript">



            jQuery(function($) {

                $('[data-rel=tooltip]').tooltip();

                $('.select2').css('width','200px').select2({allowClear:true})
                    .on('change', function(){
                        $(this).closest('form').validate().element($(this));
                    });
                $('#nextValue1').click(function(event){


                        var value1 = $('#form1').val();
                        if(value1!=""){

                            $('#modal-wizard-container')
                                .ace_wizard({
                                    step: 2 //optional argument. wizard will jump to step "2" at first
                                    //buttons: '.wizard-actions:eq(0)'
                                })

                        }
                        else{

                            bootbox.dialog({
                                message: "The Field Should not be Empty. Please Enter your New password",
                                buttons: {
                                    "success" : {
                                        "label" : "OK",
                                        "className" : "btn-sm btn-primary"
                                    }
                                }

                            } );

                            event.preventDefault();
                            event.stopPropagation();
                        }

                    }

                );
                $('#prevValue1').click(function(event){


//                    var value2 = $('#form2').val();
//                    if(value2!=null){
//
//                        $('#modal-wizard-container')
//                            .ace_wizard({
//                                step: 3 //optional argument. wizard will jump to step "2" at first
//                                //buttons: '.wizard-actions:eq(0)'
//                            })
//
//                    }
                        event.preventDefault();

                    }

                );


                $( "#progressbar" ).progressbar({
                    value: 90,
                    create: function( event, ui ) {
                        $(this).addClass('progress progress-striped active')
                            .children(0).addClass('progress-bar progress-bar-success');
                    }
                });


                $('#prevValue2').click(function(event){


                        $('#modal-wizard-container')
                            .ace_wizard({
                                step: 1 //optional argument. wizard will jump to step "2" at first
                                //buttons: '.wizard-actions:eq(0)'
                            })


                    }

                );
                $('#nextValue2').click(function(event){


                        var value2 = $('#form2').val();
                        var value1 = $('#form1').val();
                        if(value2==""){

                            bootbox.dialog({
                                message: " Please Enter Your Password Confirmation field  ",
                                buttons: {
                                    "success" : {
                                        "label" : "OK",
                                        "className" : "btn-sm btn-primary"
                                    }
                                }

                            } );

                            event.preventDefault();
                            event.stopPropagation();

                        }
                        else{

                            if(value1==value2){
                                $('#modal-wizard-container')
                                    .ace_wizard({
                                        step: 3 //optional argument. wizard will jump to step "2" at first
                                        //buttons: '.wizard-actions:eq(0)'
                                    })



                            }
                            else{

                                bootbox.dialog({
                                    message: "Please Check the Password you have Entered(Password Mismatch)",
                                    buttons: {
                                        "success" : {
                                            "label" : "OK",
                                            "className" : "btn-sm btn-primary"
                                        }
                                    }

                                } );
                                event.preventDefault();
                                event.stopPropagation();

                            }


                        }
//                    else{
//
//                        event.preventDefault();
//                        event.stopPropagation();
//                    }

                    }


                );
                $('#finish').click(function(event){



                        var value2 = $('#form2').val();

                        window.location.href="settings?id=<?php echo $username ?>&value="+value2+"";
//
//                        $('#modal-wizard-container')
//                            .ace_wizard({
//                                step: 3 //optional argument. wizard will jump to step "2" at first
//                                //buttons: '.wizard-actions:eq(0)'
//                            })


                    }


                );

                $('#form_proceed').keyup(function () {


                    var name=$('#form_proceed').val();
                    $('#process').val(name);

                });





                $('#proceed').click(function(event){






                        var value3 = $('#form_proceed').val();
                        var input= $('#process').val();


                        if(value3==""){

                            bootbox.dialog({
                                message: "The Field Should not be Empty. Please Enter your current password",
                                buttons: {
                                    "success" : {
                                        "label" : "OK",
                                        "className" : "btn-sm btn-primary"
                                    }
                                }

                            } );
                            event.preventDefault();
                            event.stopPropagation();


                        }




                        else {


                            $.ajax({

                                url: 'process',
                                type: 'GET',
                                data: {pass: input},
                                async: false,
                                success: function (data) {


                                    $('#copy').val(data);


                                }


                            });


                            var copy = $('#copy').val();


                            if (copy == "true") {


                            }

                            else {
                                bootbox.dialog({
                                    message: "Wrong Password. Please check your password",
                                    buttons: {
                                        "success": {
                                            "label": "OK",
                                            "className": "btn-sm btn-primary"
                                        }
                                    }

                                });
                                event.preventDefault();
                                event.stopPropagation();

                            }




                        }


                    }


                );


























                var $validation = false;
                $('#modal-wizard-container')
                    .ace_wizard({
                        // step: 2 //optional argument. wizard will jump to step "2" at first
                        //buttons: '.wizard-actions:eq(0)'
                    })
                    .on('actionclicked.fu.wizard' , function(e, info) {

                        var bla = $('#nextValue').val();




                    })
                    .on('changed.fu.wizard', function(event) {




                    })
                    .on('finished.fu.wizard', function(e) {
                        bootbox.dialog({
                            message: "Thank you! Your information was successfully saved!",
                            buttons: {
                                "success" : {
                                    "label" : "OK",
                                    "className" : "btn-sm btn-primary"
                                }
                            }

                        } );
                        window.location.href = "settings";


                    }).on('stepclick.fu.wizard', function(e){
                    e.preventDefault();//this will prevent clicking and selecting steps
                });


                //jump to a step
                /**
                 var wizard = $('#fuelux-wizard-container').data('fu.wizard')
                 wizard.currentStep = 3;
                 wizard.setState();
                 */

                //determine selected step
                //wizard.selectedItem().step



                //hide or show the other form which requires validation
                //this is for demo only, you usullay want just one form in your application
                $('#skip-validation').removeAttr('checked').on('click', function(){
                    $validation = this.checked;
                    if(this.checked) {
                        $('#sample-form').hide();
                        $('#validation-form').removeClass('hide');
                    }
                    else {
                        $('#validation-form').addClass('hide');
                        $('#sample-form').show();
                    }
                })










                /* $('#modal-wizard-container').ace_wizard();
                 $('#modal-wizard .wizard-actions .btn[data-dismiss=modal]').removeAttr('disabled');*/


                /**
                 $('#date').datepicker({autoclose:true}).on('changeDate', function(ev) {
					$(this).closest('form').validate().element($(this));
				});

                 $('#mychosen').chosen().on('change', function(ev) {
					$(this).closest('form').validate().element($(this));
				});
                 */


                $(document).one('ajaxloadstart.page', function(e) {
                    //in ajax mode, remove remaining elements before leaving page
                    $('[class*=select2]').remove();
                });
            })
        </script>



</body>
</html>
