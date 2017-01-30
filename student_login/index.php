
<?php

session_start();
ob_start();

if(! isset($_SESSION['user']) && $_SESSION['user']==null && isset($_SESSION['user_role'])!='student'){

    header("Location: ../login.php");


}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>RMK Hiring Synergy</title>

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
        function myfuncprofile() {
            location.href = "profile/profile.php";
        }
        function myfuncjobs() {
            location.href = "jobs/view_jobs.php";
        }
        function myfuncsettings() {
            location.href = "settings.php";
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
<?php
if(! isset($_SESSION['user']) && $_SESSION['user']==null && isset($_SESSION['user_role'])=='student'){
    header("Location: ../login.php");
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

        <div class="navbar-header pull-left" ">
        <a href="index.php" class="navbar-brand">
            <small>
                <i class=""></i>
                <?php
                $database=$_SESSION['database_name'];
                if(preg_match('/rmd_database/', $database)){
                    ?>
                    <img src="images/rmd.jpg" style="height: 25px;">
                    <label style="font-size: large;">RMD Engineering College  </label>
                    <?php
                }
                if(preg_match('/rmk_database/', $database)){
                    ?>
                    <img src="images/rmk.jpg" style="height: 25px;">
                    <label style="font-size: large;">RMK Engineering College </label>
                    <?php
                }
                if(preg_match('/rmkcet_database/', $database)){
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

                        $student_branch= $_SESSION['student_branch'];
                        $student_year=$_SESSION['student_year'];


                        $query_notification="SELECT * FROM jobs WHERE job_branch LIKE '%".$student_branch."%' and year_of_graduation='$student_year' and job_session='1'";
                        $result_notification=mysqli_query($connect, $query_notification);
                        $no_of_rows=mysqli_num_rows($result_notification);



                        ?>


                        <i class="ace-icon fa fa-bell icon-animated-bell"></i>
                        <span class="badge badge-important"><?php echo $no_of_rows; ?></span>
                    </a>

                    <ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
                        <li class="dropdown-header">
                            <i class="ace-icon fa fa-exclamation-triangle"></i>
                            <?php echo $no_of_rows; ?> Notifications
                        </li>

                        <li class="dropdown-content">
                            <ul class="dropdown-menu dropdown-navbar navbar-pink">

                                <?php

                                while($row_notification=mysqli_fetch_assoc($result_notification)) {


                                    ?>


                                    <li>
                                        <a href="jobs/view_jobs.php?job_id=<?php echo $row_notification['job_id'] ;?>">
                                            <div class="clearfix">
                                                    <span class="pull-left" style="font-weight: 600; font-size: 12px;">
                                                        <i class="btn btn-xs no-hover btn-pink fa fa-comment "></i>

                                                       You got a new job posted from <label style="color: red;"><?php  echo $row_notification['company'] ?>  </label>
                                                       check your status


                                                    </span>

                                            </div>
                                        </a>
                                    </li>

                                    <?php


                                }

                                ?>


                            </ul>
                        </li>

                        <li class="dropdown-footer">
                            <a href="jobs/view_jobs.php">
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
                        //$connect=mysqli_connect("localhost","root","","rmd_database");
                        $name=$_SESSION['user'];

                        $student_table=$_SESSION['table_name'];
                        $query="select * from $student_table where st_roll='{$name}'";

                        $result=mysqli_query($connect,$query);

                        if(!$result){


                            mysqli_error($connect);
                        }

                        while($row=mysqli_fetch_assoc($result)){



                            ?>


                            <img class="nav-user-photo" src="images/<?php echo $row['st_pic']; ?>" alt="No Photo" />

                        <span class="user-info">
                                    <small>Welcome,</small>
                                   <?php echo $row['st_name']; ?>
                                </span>
                        <?php } ?>

                        <i class="ace-icon fa fa-caret-down"></i>
                    </a>

                    <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                        <li>
                            <a href="settings.php">
                                <i class="ace-icon fa fa-cog"></i>
                                Settings
                            </a>
                        </li>

                        <li>
                            <a href="profile/profile.php">
                                <i class="ace-icon fa fa-user"></i>
                                Profile
                            </a>
                        </li>

                        <li class="divider"></li>

                        <li>
                            <a href="../login_out/logout.php">
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
                <button class="btn btn-info"  onclick="myfuncprofile()" id="myButton2">
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

                <span class="btn btn-warning"></span>
                <span class="btn btn-danger"></span>
            </div>
        </div><!-- /.sidebar-shortcuts -->
        <ul class="nav nav-list">
            <li class="active">
                <a href="index.php">
                    <i class="menu-icon fa fa-tachometer"></i>
                    <span class="menu-text">Dashboard</span>
                </a>
                <b class="arrow"></b>
            </li>
            <li class="">
                <a href="profile/profile.php" >
                    <i class="menu-icon fa fa-user"></i>
                    <span class="menu-text">
							Your Profile
							</span>
                </a>
                <b class="arrow"></b>
            </li>
            <li class="">
                <a href="settings.php" >
                    <i class="menu-icon fa fa-list"></i>
                    <span class="menu-text"> Settings </span>
                </a>
                <b class="arrow"></b>
            </li>
            <li class="">
                <a href="jobs/view_jobs.php">
                    <i class="menu-icon fa fa-briefcase"></i>
                    <span class="menu-text"> Jobs</span>
                </a>
                <b class="arrow"></b>
            </li>
            <li class="">
                <a href="company/companies.php">
                    <i class="menu-icon fa fa-laptop"></i>
                    <span class="menu-text">Companies</span>
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
                        <a href="index.php">Home</a>
                    </li>
                    <li class="hidden">Dashboard</li>
                </ul><!-- /.breadcrumb -->
                <!-- /.nav-search -->
            </div>
            <div class="page-content">
                <!-- /.ace-settings-container -->
                <div class="page-header">
                    <h1>
                        Dashboard
                    </h1>
                </div><!-- /.page-header -->
                <div class="row">

                        <!-- PAGE CONTENT BEGINS -->
                            <div class="col-xs-12">

                        <div id="timeline-1">
                            <div class="row">
                                <div class="col-xs-12 col-sm-10 col-sm-offset-1">




                                    <?php

                                    include "connect.php";


                                    date_default_timezone_set('Asia/Kolkata');

                                    $previous=null;
                                    $student_branch=$_SESSION['student_branch'];
                                    $year_of_graduation=$_SESSION['year_of_graduation'];

                                    // echo "branch".$student_branch;

                                    $query="SELECT * FROM jobs WHERE job_branch LIKE '%".$student_branch."%'  and year_of_graduation='$year_of_graduation' ORDER BY job_id DESC ";
                                    $result=mysqli_query($connect, $query);
                                    while($row=mysqli_fetch_assoc($result)){



                                        $time=$row['job_id'];

                                        $time_now=time();


                                        $date=date("M d, Y",$time);


                                        //calculating no. of days

                                         $date_now=date("Y-m-d",$time_now);
                                         $date_job_posted=date("Y-m-d",$time);

                                        $dateTime1=date_create($date_now);
                                        $dateTime2=date_create($date_job_posted);

                                        $date_diffe_job_posted=date_diff($dateTime1,$dateTime2);

                                        $no_of_days=$date_diffe_job_posted->format('%a');



                                       $get_time=date("G:i",$time);

                                         $diff=$time_now-$time;



                                      if($no_of_days==0){

                                          //today





                                          ?>

                                          <div class="timeline-container">

                                              <?php  if($previous!= 'today')   {    ?>
                                              <div class="timeline-label">
													<span class="label label-primary arrowed-in-right label-lg">
														<b>Today</b>
													</span>
                                              </div>


                                              <?php }     ?>
                                              <div class="timeline-items">
                                                  <div class="timeline-item clearfix">
                                                      <div class="timeline-info">


                                                          <?php

                                                          $database=$_SESSION['database_name'];

                                                          if(preg_match('/rmd_database/', $database)) {

                                                              ?>


                                                              <img src="images/rmd.jpg" >

                                                              <?php

                                                          }
                                                          if(preg_match('/rmk_database/', $database)){

                                                              ?>


                                                              <img src="images/rmk.jpg" >

                                                              <?php

                                                          }
                                                          if(preg_match('/rmkcet_database/', $database)){

                                                              ?>


                                                              <img src="images/rmkcet.jpg" >

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


                                                                      $database=$_SESSION['database_name'];
                                                                      if(preg_match('/rmd_database/', $database)){
                                                                          ?>

                                                                          <label style="font-size: large;">RMD Engineering College  </label>
                                                                          <?php
                                                                      }
                                                                      if(preg_match('/rmk_database/', $database)){
                                                                          ?>

                                                                          <label style="font-size: large;">RMK Engineering College </label>
                                                                          <?php
                                                                      }
                                                                      if(preg_match('/rmkcet_database/', $database)){
                                                                          ?>

                                                                          <label style="font-size: large;">RMK College of Engineering and Technology </label>
                                                                          <?php
                                                                      }
                                                                      ?>





                                                                  </a>
                                                                  <span class="grey">Posted a New Job</span>
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
                                                              Hi, <?php echo $_SESSION['student_name']; ?>,
                                                              a new job
                                                              <span class="red" style="font-size: 17px;"> <?php echo $row['job_title']  ?> </span> from company
                                                              <span class="green" style="font-size: 17px;"><?php echo $row['company']    ?> </span>
                                                              has been posted, Hurry up to checkout the status &hellip;
                                                              <div class="space-6"></div>
                                                              <div class="widget-toolbox clearfix">


                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>



                                              </div>
                                          </div>









                                    <?php

                                          $previous='today';


                                      }
                                      else if($no_of_days==1){



                                          //yesterday

                                          ?>


                                          <div class="timeline-container">



                                              <?php   if($previous !='yesterday') {     ?>

                                              <div class="timeline-label">
													<span class="label label-success arrowed-in-right label-lg">
														<b>Yesterday</b>
													</span>
                                              </div>

                                              <?php  } ?>
                                              <div class="timeline-items">
                                                  <div class="timeline-item clearfix">
                                                      <div class="timeline-info">


                                                          <?php

                                                          $database=$_SESSION['database_name'];

                                                          if(preg_match('/rmd_database/', $database)) {

                                                              ?>


                                                              <img src="images/rmd.jpg" >

                                                              <?php

                                                          }
                                                          if(preg_match('/rmk_database/', $database)){

                                                              ?>


                                                              <img src="images/rmk.jpg" >

                                                              <?php

                                                          }
                                                          if(preg_match('/rmkcet_database/', $database)){

                                                              ?>


                                                              <img src="images/rmkcet.jpg" >

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


                                                                      $database=$_SESSION['database_name'];
                                                                      if(preg_match('/rmd_database/', $database)){
                                                                          ?>

                                                                          <label style="font-size: large;">RMD Engineering College  </label>
                                                                          <?php
                                                                      }
                                                                      if(preg_match('/rmk_database/', $database)){
                                                                          ?>

                                                                          <label style="font-size: large;">RMK Engineering College </label>
                                                                          <?php
                                                                      }
                                                                      if(preg_match('/rmkcet_database/', $database)){
                                                                          ?>

                                                                          <label style="font-size: large;">RMK College of Engineering and Technology </label>
                                                                          <?php
                                                                      }
                                                                      ?>





                                                                  </a>
                                                                  <span class="grey">Posted a Job</span>
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
                                                              Hi, <?php echo $_SESSION['student_name']; ?>,
                                                              a new job
                                                              <span class="red" style="font-size: 17px;"> <?php echo $row['job_title']  ?> </span> from company
                                                              <span class="green" style="font-size: 17px;"><?php echo $row['company']    ?> </span>
                                                              has been posted, Hurry up to checkout the status &hellip;
                                                              <div class="space-6"></div>
                                                              <div class="widget-toolbox clearfix">


                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>



                                              </div>
                                          </div>




                                    <?php




                                          $previous='yesterday';

                                      }
                                      else{

                                          //other day


                                          ?>




                                          <div class="timeline-container">

                                              <?php   if($previous!= $date) {   ?>
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

                                                          $database=$_SESSION['database_name'];

                                                          if(preg_match('/rmd_database/', $database)) {

                                                              ?>


                                                              <img src="images/rmd.jpg" >

                                                              <?php

                                                          }
                                                          if(preg_match('/rmk_database/', $database)){

                                                              ?>


                                                              <img src="images/rmk.jpg" >

                                                              <?php

                                                          }
                                                          if(preg_match('/rmkcet_database/', $database)){

                                                              ?>


                                                              <img src="images/rmkcet.jpg" >

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


                                                                      $database=$_SESSION['database_name'];
                                                                      if(preg_match('/rmd_database/', $database)){
                                                                          ?>

                                                                          <label style="font-size: large;">RMD Engineering College  </label>
                                                                          <?php
                                                                      }
                                                                      if(preg_match('/rmk_database/', $database)){
                                                                          ?>

                                                                          <label style="font-size: large;">RMK Engineering College </label>
                                                                          <?php
                                                                      }
                                                                      if(preg_match('/rmkcet_database/', $database)){
                                                                          ?>

                                                                          <label style="font-size: large;">RMK College of Engineering and Technology </label>
                                                                          <?php
                                                                      }
                                                                      ?>





                                                                  </a>
                                                                  <span class="grey">Posted a Job</span>
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
                                                                  Hi, <?php echo $_SESSION['student_name']; ?>,
                                                                  a new job
                                                                  <span class="red" style="font-size: 17px;"> <?php echo $row['job_title']  ?> </span> from company
                                                                  <span class="green" style="font-size: 17px;"><?php echo $row['company']    ?> </span>
                                                                  has been posted, Hurry up to checkout the status &hellip;
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




                                          $previous=$date;
                                      }







                                    }
















                                    ?>



















                                </div>
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