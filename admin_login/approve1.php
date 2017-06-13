
<?php session_start();
ob_start();





if(! isset($_SESSION['user']) && $_SESSION['user']==null && isset($_SESSION['user_role'])!='admin' ){

    header("Location: ../login");


}

if (isset($_GET['approve']) && isset($_SESSION['user_role'])=='admin' ) {

    include "connect.php";

    $rollno = $_GET['rollno'];
    $tname = $_GET['tname'];
    $select = "SELECT * from $tname where st_roll='{$rollno}'";
    $select_result = mysqli_query($connect, $select);
    $row = mysqli_fetch_assoc($select_result);

    if($row['st_changemail']!=''){

        $new_mail = $row['st_changemail'];
        $query_change_mail = "UPDATE $tname SET  st_email='{$new_mail}',st_changemail='' WHERE st_roll='{$rollno}'";
        $result_change_mail = mysqli_query($connect, $query_change_mail);

        if (!$result_change_mail) {

            die("" . mysqli_error($connect));
        }
    }
    if($row['st_changephone']!=''){

        $new_phone = $row['st_changephone'];
        $query_change_phone = "UPDATE $tname SET  st_phone='{$new_phone}',st_changephone='' WHERE st_roll='{$rollno}'";
        $result_change_phone = mysqli_query($connect, $query_change_phone);

        if ( !$result_change_phone) {

            die("" . mysqli_error($connect));
        }
    }






    header("Location: approve");

}
if (isset($_GET['decline']) && isset($_SESSION['user_role'])=='admin' ) {

    include "connect.php";

    $rollno = $_GET['rollno'];
    $tname = $_GET['tname'];
    $select = "SELECT * from $tname where st_roll='{$rollno}'";
    $select_result = mysqli_query($connect, $select);
    $row = mysqli_fetch_assoc($select_result);



    $query_old_mail_phone = "UPDATE $tname SET  st_changephone='',st_changemail='' WHERE st_roll='{$rollno}'";
    $result_old_mail_phone = mysqli_query($connect, $query_old_mail_phone);

    if (!$result_old_mail_phone) {

        die("" . mysqli_error($connect));
    }





    header("Location: approve");



}








?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>RMK Campulse</title>

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
            <a href="approve" class="navbar-brand">
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
                </small>            </a>
        </div>
        <div class="navbar-buttons navbar-header pull-right" role="navigation">
            <ul class="nav ace-nav">
                                <li class="purple dropdown-modal">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">



	         <?php


                        include "connect.php";
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



                        include "connect.php";
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
                                    <a href="approve?roll=<?php  echo $row1['st_roll']; ?>">
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
                            <a href="#">
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
                            <a href="settings">
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
                    <span class="menu-text"> Dashboard </span>
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

            <li class="active">
                <a href="approve">
                    <i class="menu-icon fa fa-list-alt"></i>
                    <span class="menu-text"> Approve </span>
                </a>

                <b class="arrow"></b>
            </li>

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



            <li class="">
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
                        <a href="Status">
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
                        <a href="../index">Home</a>
                    </li>
                    <li class="active">Approve</li>
                </ul><!-- /.breadcrumb -->
                <!-- /.nav-search -->
            </div>

            <div class="page-content">
                <!-- /.ace-settings-container -->

                <div class="page-header">
                    <h1>
                       Approve

                    </h1>
                </div><!-- /.page-header -->

                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->



                            <?php





                            if(isset($_GET['roll']) && isset($_SESSION['user_role'])=='admin' ){




                                $roll=$_GET['roll'];



                                include "connect.php";
                                $query_table = "SELECT * FROM table_map";
                                $result_table = mysqli_query($connect, $query_table);

                                while ($row = mysqli_fetch_assoc($result_table)) {
                                    $tname = $row['table_name'];
                                    $query_year = "SELECT * from $tname WHERE st_roll='$roll'";
                                    $result_year = mysqli_query($connect, $query_year);
                                    while ($row1 = mysqli_fetch_assoc($result_year)) {


                                        if ($row1['st_changemail'] != NULL || $row1['st_changephone']!= NULL) {


                                            ?>

                                            <div class="">
                                                <div class="col-xs-12 ">

                                                    <div class="widget-box widget-color-orange " id="widget-box-3">
                                                        <div class="widget-header widget-header-small">
                                                            <h6 class="widget-title">
                                                                <i class="ace-icon fa fa-sort"></i>
                                                                Change request
                                                            </h6>

                                                            <div class="widget-toolbar">

                                                                <a href="#" data-action="collapse">
                                                                    <i class="ace-icon fa fa-minus" data-icon-show="fa-plus"
                                                                       data-icon-hide="fa-minus"></i>
                                                                </a>


                                                            </div>
                                                        </div>

                                                        <div class="widget-body">
                                                            <form class="modal-content" action="approve" method="get"
                                                                  enctype="multipart/form-data">
                                                                <div class="widget-main">
                                                                    <p>
                                                                        <label style="font-size: large" class="green"><?php echo $row1['st_roll'] ?>
                                                                            , <?php echo $row1['st_name'] ?> </label>
                                                                        <label style="font-size: large">has
                                                                            requested for the change of
                                                                        </label>
                                                                        <label class="orange">


                                                                            <?php if ($row1['st_changemail'] != NULL) {
                                                                            echo "<label style='font-size: large;'>Email id : ";
                                                                            echo $row1['st_email'];
                                                                            ?></label>
                                                                        to <label style="font-size: large" class="orange">
                                                                            <?php echo $row1['st_changemail'];



                                                                            }

                                                                            ?>





                                                                            <?php



                                                                            if($row1['st_changephone'] != NULL && $row1['st_changemail'] != NULL ){


                                                                                echo " <label style='font-size: large; color: black;'> and  </label>";

                                                                            }






                                                                            if($row1['st_changephone'] != NULL) {



                                                                            echo "<label style='font-size: large;'> Phone No : ";
                                                                            echo $row1['st_phone'];
                                                                            ?></label>
                                                                        <label style="font-size: large; color: black;">to</label>
                                                                        <label style="font-size: large"  class="orange">
                                                                            <?php echo $row1['st_changephone'] ?></label>


                                                                        <?php } ?>


                                                                        </label></p>
                                                                    <input type="hidden" name="rollno"
                                                                           value="<?php echo $row1['st_roll'] ?>"/>
                                                                    <input type="hidden" name="tname"
                                                                           value="<?php echo $row['table_name'] ?>"/>
                                                                    <button class=" btn btn-success col-xs-push-9"
                                                                            type="submit" name="approve">
                                                                        Approve
                                                                    </button>


                                                                    <button class=" btn btn-danger col-xs-push-9"
                                                                            type="submit" name="decline">
                                                                        Decline
                                                                    </button>


                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                            <?php
                                        }


                                    }


                                }














                            }

                            else {









                            include "connect.php";
                            $query_table = "SELECT * FROM table_map";
                            $result_table = mysqli_query($connect, $query_table);

                            while ($row = mysqli_fetch_assoc($result_table)) {
                                $tname = $row['table_name'];
                                $query_year = "SELECT * from $tname";
                                $result_year = mysqli_query($connect, $query_year);
                                while ($row1 = mysqli_fetch_assoc($result_year)) {


                                    if ($row1['st_changemail'] != NULL || $row1['st_changephone'] != NULL) {


                                        ?>

                                        <div class="">
                                            <div class="col-xs-12 ">

                                                <div class="widget-box widget-color-orange " id="widget-box-3">
                                                    <div class="widget-header widget-header-small">
                                                        <h6 class="widget-title">
                                                            <i class="ace-icon fa fa-sort"></i>
                                                            Change request
                                                        </h6>

                                                        <div class="widget-toolbar">

                                                            <a href="#" data-action="collapse">
                                                                <i class="ace-icon fa fa-minus" data-icon-show="fa-plus"
                                                                   data-icon-hide="fa-minus"></i>
                                                            </a>


                                                        </div>
                                                    </div>

                                                    <div class="widget-body">
                                                        <form class="modal-content" action="approve" method="get"
                                                              enctype="multipart/form-data">
                                                            <div class="widget-main">
                                                                <p>
                                                                    <label style="font-size: large"
                                                                           class="green"><?php echo $row1['st_roll'] ?>
                                                                        , <?php echo $row1['st_name'] ?> </label>
                                                                    <label style="font-size: large">has
                                                                        requested for the change of
                                                                    </label>
                                                                    <label class="orange">


                                                                        <?php if ($row1['st_changemail'] != NULL) {
                                                                        echo "<label style='font-size: large;'>Email id : ";
                                                                        echo $row1['st_email'];
                                                                        ?></label>
                                                                    to <label style="font-size: large" class="orange">
                                                                        <?php echo $row1['st_changemail'];


                                                                        }

                                                                        ?>


                                                                        <?php


                                                                        if ($row1['st_changephone'] != NULL && $row1['st_changemail'] != NULL) {


                                                                            echo " <label style='font-size: large; color: black;'> and  </label>";

                                                                        }


                                                                        if ($row1['st_changephone'] != NULL) {


                                                                        echo "<label style='font-size: large;'> Phone No : ";
                                                                        echo $row1['st_phone'];
                                                                        ?></label>
                                                                    <label style="font-size: large; color: black;">to</label>
                                                                    <label style="font-size: large" class="orange">
                                                                        <?php echo $row1['st_changephone'] ?></label>


                                                                    <?php } ?>


                                                                    </label></p>
                                                                <input type="hidden" name="rollno"
                                                                       value="<?php echo $row1['st_roll'] ?>"/>
                                                                <input type="hidden" name="tname"
                                                                       value="<?php echo $row['table_name'] ?>"/>
                                                                <button class=" btn btn-success col-xs-push-9"
                                                                        type="submit" name="approve">
                                                                    Approve
                                                                </button>


                                                                <button class=" btn btn-danger col-xs-push-9"
                                                                        type="submit" name="decline">
                                                                    Decline
                                                                </button>


                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                        <?php
                                    }


                                }
                            }


                            }


                            ?>
                        </div>

                        <!--                            <div class="space-14"></div>-->






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

<!--[if lte IE 8]>
<script src="assets/js/excanvas.min.js"></script>
<![endif]-->
<script src="assets/js/jquery-ui.custom.min.js"></script>
<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
<script src="assets/js/jquery.easypiechart.min.js"></script>
<script src="assets/js/jquery.sparkline.index.min.js"></script>
<script src="assets/js/jquery.flot.min.js"></script>
<script src="assets/js/jquery.flot.pie.min.js"></script>
<script src="assets/js/jquery.flot.resize.min.js"></script>

<!-- ace scripts -->
<script src="assets/js/ace-elements.min.js"></script>
<script src="assets/js/ace.min.js"></script>

<!-- inline scripts related to this page -->

</body>
</html>
