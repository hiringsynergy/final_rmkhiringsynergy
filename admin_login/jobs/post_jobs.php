<?php session_start();
ob_start();


if (!isset($_SESSION['user']) && $_SESSION['user'] == null && isset($_SESSION['user_role'])!='admin' ) {

    header("Location: ../../login");


}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta charset="utf-8"/>
    <title>RMK Campulse </title>
    <link rel="icon" href="../../logos/rmklogo.JPG"  />
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
            location.href = "../reports/reports";

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


    </script>


    <!-- page specific plugin styles -->
    <link rel="stylesheet" href="../assets/css/jquery-ui.custom.min.css"/>
    <link rel="stylesheet" href="../assets/css/chosen.min.css"/>
    <link rel="stylesheet" href="../assets/css/bootstrap-datepicker3.min.css"/>
    <link rel="stylesheet" href="../assets/css/bootstrap-timepicker.min.css"/>
    <link rel="stylesheet" href="../assets/js/bootstrap-datepicker.min.js"/>
    <link rel="stylesheet" href="../assets/js/bootstrap-datetimepicker.min.js"/>
    <link rel="stylesheet" href="../assets/css/daterangepicker.min.css"/>
    <link rel="stylesheet" href="../assets/css/bootstrap-datetimepicker.min.css"/>
    <link rel="stylesheet" href="../assets/css/bootstrap-colorpicker.min.css"/>
    <link rel="stylesheet" href="../assets/css/select2.min.css"/>
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
    <!--    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.css"/>-->
    <link rel="stylesheet" href="../assets/css/bootstrapValidator.css"/>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css"/>

    <script type="text/javascript" src="../vendor/jquery/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrapValidator.js"></script>


    <!-- ace settings handler -->
    <script src="../assets/js/ace-extra.min.js"></script>

    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

    <!--[if lte IE 8]>
    <script src="../assets/js/html5shiv.min.js"></script>
    <script src="../assets/js/respond.min.js"></script>
    <![endif]-->
</head>

<body class="no-skin">

<?php


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
            <a href="post_jobs" class="navbar-brand">
                <small>
                    <i class=""></i>
                    <?php

                    $database = $_SESSION['database_name'];
                    if (preg_match('/rmd/', $database)) {
                        ?>
                        <img src="../images/rmd.jpg" style="height: 25px;">
                        <label style="font-size: large;">RMD Engineering College </label>

                        <?php
                    }

                    if (preg_match('/rmk/', $database)) {
                        ?>
                        <img src="../images/rmk.jpg" style="height: 25px;">
                        <label style="font-size: large;">RMK Engineering College </label>

                        <?php
                    }

                    if (preg_match('/cet/', $database)) {
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
                        $name = $_SESSION['user'];

                        $query = "select * from login_admin where username='{$name}'";


                        $result = mysqli_query($connect, $query);

                        if (!$result) {


                            mysqli_error($connect);
                        }

                        while ($row = mysqli_fetch_assoc($result)) {


                            ?>


                            <img class="nav-user-photo" src="../images/<?php echo $row['admin_pic']; ?>"
                                 alt="Photo"/>
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
        </div>
    </div><!-- /.navbar-container -->
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


            <li class="active open">
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

                    <li class="active">
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


            <li class="">
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
                        <a href="../Status">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Status
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a href="../reports/reportgeneration.php">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Report Generation
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
                    <li class="active">Job Posting</li>
                </ul><!-- /.breadcrumb -->

            </div>
            <div class="page-content">

                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->

                        <form onsubmit=" return validate()" class="form-horizontal" id="validation-form"
                              action="job_filter" method="get"
                              role="form">
                            <div class="row">

                            </div>
                            <div class="row">


                                <?php

                                include "../connect.php";
                                $query = "SELECT * FROM company_list ";
                                $result = mysqli_query($connect, $query);


                                ?>


                                <div class="col-xs-10 col-sm-3 hello form-group" style="padding-left: 30px;">

                                    <h5><label class="control-label bolder orange" for="form-field-select-3">Select
                                            Company</label></h5>

                                    <select class="chosen-select form-control" id="form-field-select-3"
                                            name="company_id" data-placeholder="Choose a Company...">
                                        <option value=""></option>

                                        <?php

                                        while ($row = mysqli_fetch_assoc($result)) {


                                            ?>
                                            <option value="<?php echo $row['company_id'] ?>"><?php echo $row['company_name'] ?></option>
                                        <?php } ?>

                                    </select>

                                </div>
                                <br/><br/>

                                <div class="col-xs-4" style="padding-top:3px;">
                                    <a href="../company/create_company" class=" btn btn-sm btn-yellow">
                                        <i class="ace-icon "></i>
                                        Create New Company
                                    </a>
                                </div>

                            </div>
                            <div class="row">


                                <div class="space-10"></div>


                                <div class="col-xs-10 col-sm-6  hello form-group" style="padding-left: 30px;">


                                    <div>
                                        <h5><label class="control-label bolder orange " for="form-field-1">Job
                                                Title</label></h5>


                                        <span class="block input-icon input-icon-right  ">

                                             <input type="text" id="job" name="job_title"
                                                    placeholder="Enter Job Title"
                                                    class="col-xs-12  "/>
										<i class="find" id="title" ></i>
																	</span>


                                    </div>
                                </div>

                                <div class="col-xs-10  col-sm-6 hello form-group" style="padding-left: 30px;">
                                    <h5><label class="control-label bolder orange" for="form-field-1">Year of
                                            Graduation</label></h5>
                                    <select class="col-xs-7 chosen-select form-control" name="year_of_graduation"
                                            id="form-field-select-33" data-placeholder="Select a Year...">
                                        <option value=""></option>
                                        <?php

                                        include "../connect.php";
                                        $query_insert = "SELECT * FROM table_map ORDER BY table_value ASC";
                                        $result_insert = mysqli_query($connect, $query_insert);
                                        while ($row = mysqli_fetch_assoc($result_insert)) {


                                            ?>


                                            <option value="<?php echo $row['table_value'] ?>"><?php echo $row['table_value'] ?></option>
                                        <?php } ?>
                                    </select>


                                </div>
                            </div>
                            <div class="space-10"></div>

                            <div class="row">
                                <div class="col-xs-10  col-sm-6 hello form-group" style="padding-left: 30px;">
                                    <div>
                                        <h5><label class="control-label bolder orange" for="form-field-15">Venue</label>
                                        </h5>

                                        <span class="block input-icon input-icon-right  ">


                                        <input type="text" id="form-field-1" name="venue" placeholder="Enter Venue"
                                               class="col-xs-12"/>
										<i class="find" id="venue"></i>
																	</span>


                                    </div>
                                </div>
                                <div class="col-xs-10 col-sm-6  hello form-group" style="padding-left: 30px;">
                                    <div>
                                        <h5><label class="control-label bolder orange" for="form-field-1">Joining
                                                Location</label></h5>

                                        <span class="block input-icon input-icon-right  ">

                                        <input type="text" id="form-field-145" name="joining_location"
                                             placeholder="Enter Location" class="col-xs-12"/>
										<i class="find" id="location"></i>
																	</span>


                                    </div>
                                </div>
                            </div>
                            <div class="space-10"></div>
                            <div class="row">
                                <div class="col-xs-10 col-sm-6 hello form-group" style="padding-left: 30px;">


                                    <label class="control-label bolder orange" for="date-timepicker1">Campus on
                                        Date</label>

                                    <div class="space-6"></div>
                                    <div class="input-group">




                                        <input class="form-control" name="campus_date" id="date-timepicker1"
                                               type="text"/>
                                        <span class="block input-icon input-icon-right  ">
                                        <i class="find" id="campus"></i>

                                         </span>

                                        <span class="input-group-addon">
                                        <i class="fa fa-calendar bigger-110"></i>
                                        </span>



                                    </div>

                                </div>
                                <div class="col-xs-10 col-sm-6 hello form-group" style="padding-left: 30px;">


                                    <label class="control-label bolder orange" for="date-timepicker2">Apply
                                        Before</label>

                                    <div class="space-6"></div>
                                    <div class="input-group">
                                        <input class="form-control" name="apply_before" id="date-timepicker2"
                                               type="text"/>
                                        <span class="block input-icon input-icon-right  ">
                                        <i class="find" id="apply" ></i>
                                        </span>
                                        <span class="input-group-addon">
                                <i class="fa fa-calendar bigger-110"></i>
                                        </span>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
<!--                                <div class="col-xs-10 col-sm-6 hello form-group" style="padding-left: 30px;">-->
<!--                                    <div><h5><label class="control-label bolder orange" for="form-field-16">Job Description</label></h5>-->
<!---->
<!--                                        <textarea id="form-field-16" name="job_description" rows="7"-->
<!--                                                  class="autosize-transition form-control"-->
<!--                                                  placeholder="Type something about job....."></textarea>-->
<!--                                    </div>-->
<!--                                </div>-->
                                <div class="col-xs-10 col-sm-6 hello form-group" style="padding-left: 30px;">
                                    <div><h5><label class="control-label bolder orange" for="form-field-34">Job Description</label></h5>
                                        <textarea id="form-field-34" rows="7" name="job_description" class="col-xs-12"

                                                  placeholder="Type something about Skill Set....."></textarea>
                                    </div>
                                </div>
                                <div class="col-xs-10 col-sm-6  form-group hello" style="padding-left: 30px;">
                                    <div ><h5><label class="control-label bolder orange" for="form-field-16">Skill
                                                Set</label></h5>
                                        <textarea class="col-xs-12" id="form-field-16" rows="7"  name="skill_set"

                                                  placeholder="Type something about Skill Set....."></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-10 col-sm-6 hello form-group" style="padding-left: 30px;">
                                    <div>
<!--                                        <h5><label class="control-label bolder orange" for="form-field-1">Salary(per-->
<!--                                                Annum)</label></h5>-->
<!---->
<!--                                        <span class="block input-icon input-icon-right  ">-->
<!---->
<!--                                       <input type="text" id="form-field-13" name="salary" placeholder="Enter Salary"-->
<!--                                              class="col-xs-12"/>-->
<!--										<i class="find" id="salary"></i>-->
<!--																	</span>-->

                                        <h5 class="orange bolder smaller">Salary(Lakhs Per Annum)</h5>
                                        <input type="text"  name="salary" value="0" id="slide-text1" class="col-xs-1 col-sm-1 col">
                                        <div id="slider-eq1" class="col-xs-12 col-md-10 col-sm-8">
                                            <span class="ui-slider-orange">0</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-10 col-sm-6 hello form-group" style="padding-left: 30px;">
                                    <h5><label class="control-label bolder orange" for="form-field-1">Job Type</label>
                                    </h5>
                                    <select class="col-xs-7 chosen-select form-control" name="job_type"  data-placeholder="select job type..."
                                            id="form-field-select-333">
                                        <option value=""></option>
                                        <option value="Product">Product</option>
                                        <option value="Service">Service</option>
                                        <option value="Core">Core</option>
                                    </select>

                                </div>
                            </div>
                  
                            <div class="row">
                                <div class="">
                                    <div class="form-actions center">
                                        <button type="submit" name="submit" value="post"
                                                class="btn btn-default btn-round btn-success">
                                            Post
                                            <i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i>
                                        </button>
                                        <button class="btn btn-danger btn-default btn-round">
                                            <i class="ace-icon fa fa-times red3"></i>
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                        </form>
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
            if ('ontouchstart' in document.documentElement) document.write("<script src='../assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
        </script>
        <script src="../assets/js/bootstrap.min.js"></script>

        <!-- page specific plugin scripts -->
        <script src="../assets/js/wizard.min.js"></script>
        <script src="../assets/js/jquery.validate.min.js"></script>
        <script src="../assets/js/jquery-additional-methods.min.js"></script>
        <script src="../assets/js/bootbox.js"></script>
        <script src="../assets/js/jquery.maskedinput.min.js"></script>
        <script src="../assets/js/select2.min.js"></script>

        <!--[if lte IE 8]>
        <script src="../assets/js/excanvas.min.js"></script>
        <![endif]-->
        <script src="../assets/js/jquery-ui.custom.min.js"></script>
        <script src="../assets/js/jquery.ui.touch-punch.min.js"></script>
        <script src="../assets/js/jquery.easypiechart.min.js"></script>
        <script src="../assets/js/jquery.sparkline.index.min.js"></script>
        <script src="../assets/js/jquery.flot.min.js"></script>
        <script src="../assets/js/jquery.flot.pie.min.js"></script>
        <script src="../assets/js/jquery.flot.resize.min.js"></script>

        <!-- ace scripts -->
        <script src="../assets/js/ace-elements.min.js"></script>
        <script src="../assets/js/ace.min.js"></script>

        <!-- inline scripts related to this page -->
        <!--[if lte IE 8]>
        <script src="../assets/js/excanvas.min.js"></script>
        <![endif]-->
        <script src="../assets/js/jquery-ui.custom.min.js"></script>
        <script src="../assets/js/jquery.ui.touch-punch.min.js"></script>
        <script src="../assets/js/chosen.jquery.min.js"></script>
        <script src="../assets/js/spStatus.min.js"></script>
        <script src="../assets/js/bootstrap-datepicker.min.js"></script>
        <script src="../assets/js/bootstrap-timepicker.min.js"></script>
        <script src="../assets/js/moment.min.js"></script>
        <script src="../assets/js/daterangepicker.min.js"></script>
        <script src="../assets/js/bootstrap-datetimepicker.min.js"></script>
        <script src="../assets/js/bootstrap-colorpicker.min.js"></script>
        <script src="../assets/js/jquery.knob.min.js"></script>
        <script src="../assets/js/autosize.min.js"></script>
        <script src="../assets/js/jquery.inputlimiter.min.js"></script>
        <script src="../assets/js/jquery.maskedinput.min.js"></script>
        <script src="../assets/js/bootstrap-tag.min.js"></script>

        <!-- ace scripts -->
        <script src="../assets/js/ace-elements.min.js"></script>
        <script src="../assets/js/ace.min.js"></script>

        <!-- inline scripts related to this page -->
        <script type="text/javascript">
            jQuery(function ($) {


                $( "#slider-eq1 > span" ).css({width:'90%', 'float':'left', margin:'15px 0px'}).each(function() {
                    // read initial values from markup and remove that
                    var value = parseInt( $( this ).text(), 10 );
                    $( this ).empty().slider({
                        value: value,
                        range: "min",
                        min:0,
                        max:20,
                        step:0.1,

                        animate: true,
                        slide: function(event,ui){
                            $('#slide-text1').val(ui.value);
                        }

                    });
                });
                $('#id-disable-check').on('click', function () {
                    var inp = $('#form-input-readonly').get(0);
                    if (inp.hasAttribute('disabled')) {
                        inp.setAttribute('readonly', 'true');
                        inp.removeAttribute('disabled');
                        inp.value = "This text field is readonly!";
                    }
                    else {
                        inp.setAttribute('disabled', 'disabled');
                        inp.removeAttribute('readonly');
                        inp.value = "This text field is disabled!";
                    }
                });


                if (!ace.vars['touch']) {
                    $('.chosen-select').chosen({allow_single_deselect: true});
                    //resize the chosen on window resize

                    $(window)
                        .off('resize.chosen')
                        .on('resize.chosen', function () {
                            $('.chosen-select').each(function () {
                                var $this = $(this);
                                $this.next().css({'width': $this.parent().width()});
                            })
                        }).trigger('resize.chosen');
                    //resize chosen on sidebar collapse/expand
                    $(document).on('settings.ace.chosen', function (e, event_name, event_val) {
                        if (event_name != 'sidebar_collapsed') return;
                        $('.chosen-select').each(function () {
                            var $this = $(this);
                            $this.next().css({'width': $this.parent().width()});
                        })
                    });


                    $('#chosen-multiple-style .btn').on('click', function (e) {
                        var target = $(this).find('input[type=radio]');
                        var which = parseInt(target.val());
                        if (which == 2) $('#form-field-select-4').addClass('tag-input-style');
                        else $('#form-field-select-4').removeClass('tag-input-style');
                    });
                }


                $('[data-rel=tooltip]').tooltip({container: 'body'});
                $('[data-rel=popover]').popover({container: 'body'});

                autosize($('textarea[class*=autosize]'));

                $('textarea.limited').inputlimiter({
                    remText: '%n character%s remaining...',
                    limitText: 'max allowed : %n.'
                });

                $.mask.definitions['~'] = '[+-]';
                $('.input-mask-date').mask('99/99/9999');
                $('.input-mask-phone').mask('(999) 999-9999');
                $('.input-mask-eyescript').mask('~9.99 ~9.99 999');
                $(".input-mask-product").mask("a*-999-a999", {
                    placeholder: " ", completed: function () {
                        alert("You typed the following: " + this.val());
                    }
                });


                $("#input-size-slider").css('width', '200px').slider({
                    value: 1,
                    range: "min",
                    min: 1,
                    max: 8,
                    step: 1,
                    slide: function (event, ui) {
                        var sizing = ['', 'input-sm', 'input-lg', 'input-mini', 'input-small', 'input-medium', 'input-large', 'input-xlarge', 'input-xxlarge'];
                        var val = parseInt(ui.value);
                        $('#form-field-4').attr('class', sizing[val]).attr('placeholder', '.' + sizing[val]);
                    }
                });

                $("#input-span-slider").slider({
                    value: 1,
                    range: "min",
                    min: 1,
                    max: 12,
                    step: 1,
                    slide: function (event, ui) {
                        var val = parseInt(ui.value);
                        $('#form-field-5').attr('class', 'col-xs-' + val).val('.col-xs-' + val);
                    }
                });


                //"jQuery UI Slider"
                //range slider tooltip example
                $("#slider-range").css('height', '200px').slider({
                    orientation: "vertical",
                    range: true,
                    min: 0,
                    max: 100,
                    values: [17, 67],
                    slide: function (event, ui) {
                        var val = ui.values[$(ui.handle).index() - 1] + "";

                        if (!ui.handle.firstChild) {
                            $("<div class='tooltip right in' style='display:none;left:16px;top:-6px;'><div class='tooltip-arrow'></div><div class='tooltip-inner'></div></div>")
                                .prependTo(ui.handle);
                        }
                        $(ui.handle.firstChild).show().children().eq(1).text(val);
                    }
                }).find('span.ui-slider-handle').on('blur', function () {
                    $(this.firstChild).hide();
                });


                $("#slider-range-max").slider({
                    range: "max",
                    min: 1,
                    max: 10,
                    value: 2
                });

                $("#slider-eq > span").css({width: '90%', 'float': 'left', margin: '15px'}).each(function () {
                    // read initial values from markup and remove that
                    var value = parseInt($(this).text(), 10);
                    $(this).empty().slider({
                        value: value,
                        range: "min",
                        animate: true

                    });
                });

                $("#slider-eq > span.ui-slider-purple").slider('disable');//disable third item


                $('#id-input-file-1 , #id-input-file-2').ace_file_input({
                    no_file: 'No File ...',
                    btn_choose: 'Choose',
                    btn_change: 'Change',
                    droppable: false,
                    onchange: null,
                    thumbnail: false //| true | large
                    //whitelist:'gif|png|jpg|jpeg'
                    //blacklist:'exe|php'
                    //onchange:''
                    //
                });
                //pre-show a file name, for example a previously selected file
                //$('#id-input-file-1').ace_file_input('show_file_list', ['myfile.txt'])


                $('#id-input-file-3').ace_file_input({
                    style: 'well',
                    btn_choose: 'Drop files here or click to choose',
                    btn_change: null,
                    no_icon: 'ace-icon fa fa-cloud-upload',
                    droppable: true,
                    thumbnail: 'small'//large | fit
                    //,icon_remove:null//set null, to hide remove/reset button
                    /**,before_change:function(files, dropped) {
						//Check an example below
						//or examples/file-upload.html
						return true;
					}*/
                    /**,before_remove : function() {
						return true;
					}*/
                    ,
                    preview_error: function (filename, error_code) {
                        //name of the file that failed
                        //error_code values
                        //1 = 'FILE_LOAD_FAILED',
                        //2 = 'IMAGE_LOAD_FAILED',
                        //3 = 'THUMBNAIL_FAILED'
                        //alert(error_code);
                    }

                }).on('change', function () {
                    //console.log($(this).data('ace_input_files'));
                    //console.log($(this).data('ace_input_method'));
                });


                //$('#id-input-file-3')
                //.ace_file_input('show_file_list', [
                //{type: 'image', name: 'name of image', path: 'http://path/to/image/for/preview'},
                //{type: 'file', name: 'hello.txt'}
                //]);


                //dynamically change allowed formats by changing allowExt && allowMime function
                $('#id-file-format').removeAttr('checked').on('change', function () {
                    var whitelist_ext, whitelist_mime;
                    var btn_choose
                    var no_icon
                    if (this.checked) {
                        btn_choose = "Drop images here or click to choose";
                        no_icon = "ace-icon fa fa-picture-o";

                        whitelist_ext = ["jpeg", "jpg", "png", "gif", "bmp"];
                        whitelist_mime = ["image/jpg", "image/jpeg", "image/png", "image/gif", "image/bmp"];
                    }
                    else {
                        btn_choose = "Drop files here or click to choose";
                        no_icon = "ace-icon fa fa-cloud-upload";

                        whitelist_ext = null;//all extensions are acceptable
                        whitelist_mime = null;//all mimes are acceptable
                    }
                    var file_input = $('#id-input-file-3');
                    file_input
                        .ace_file_input('update_settings',
                            {
                                'btn_choose': btn_choose,
                                'no_icon': no_icon,
                                'allowExt': whitelist_ext,
                                'allowMime': whitelist_mime
                            })
                    file_input.ace_file_input('reset_input');

                    file_input
                        .off('file.error.ace')
                        .on('file.error.ace', function (e, info) {
                            //console.log(info.file_count);//number of selected files
                            //console.log(info.invalid_count);//number of invalid files
                            //console.log(info.error_list);//a list of errors in the following format

                            //info.error_count['ext']
                            //info.error_count['mime']
                            //info.error_count['size']

                            //info.error_list['ext']  = [list of file names with invalid extension]
                            //info.error_list['mime'] = [list of file names with invalid mimetype]
                            //info.error_list['size'] = [list of file names with invalid size]


                            /**
                             if( !info.dropped ) {
							//perhapse reset file field if files have been selected, and there are invalid files among them
							//when files are dropped, only valid files will be added to our file array
							e.preventDefault();//it will rest input
						}
                             */


                            //if files have been selected (not dropped), you can choose to reset input
                            //because browser keeps all selected files anyway and this cannot be changed
                            //we can only reset file field to become empty again
                            //on any case you still should check files with your server side script
                            //because any arbitrary file can be uploaded by user and it's not safe to rely on browser-side measures
                        });


                    /**
                     file_input
                     .off('file.preview.ace')
                     .on('file.preview.ace', function(e, info) {
						console.log(info.file.width);
						console.log(info.file.height);
						e.preventDefault();//to prevent preview
					});
                     */

                });

                $('#spinner1').ace_spinner({
                    value: 0,
                    min: 0,
                    max: 200,
                    step: 10,
                    btn_up_class: 'btn-info',
                    btn_down_class: 'btn-info'
                })
                    .closest('.ace-spinner')
                    .on('changed.fu.spStatus', function () {
                        //console.log($('#spinner1').val())
                    });
                $('#spinner2').ace_spinner({
                    value: 0,
                    min: 0,
                    max: 10000,
                    step: 100,
                    touch_spinner: true,
                    icon_up: 'ace-icon fa fa-caret-up bigger-110',
                    icon_down: 'ace-icon fa fa-caret-down bigger-110'
                });
                $('#spinner3').ace_spinner({
                    value: 0,
                    min: -100,
                    max: 100,
                    step: 10,
                    on_sides: true,
                    icon_up: 'ace-icon fa fa-plus bigger-110',
                    icon_down: 'ace-icon fa fa-minus bigger-110',
                    btn_up_class: 'btn-success',
                    btn_down_class: 'btn-danger'
                });
                $('#spinner4').ace_spinner({
                    value: 0,
                    min: -100,
                    max: 100,
                    step: 10,
                    on_sides: true,
                    icon_up: 'ace-icon fa fa-plus',
                    icon_down: 'ace-icon fa fa-minus',
                    btn_up_class: 'btn-purple',
                    btn_down_class: 'btn-purple'
                });

                //$('#spinner1').ace_spinner('disable').ace_spinner('value', 11);
                //or
                //$('#spinner1').closest('.ace-spinner').spinner('disable').spinner('enable').spinner('value', 11);//disable, enable or change value
                //$('#spinner1').closest('.ace-spinner').spinner('value', 0);//reset to 0


                //datepicker plugin
                //link
                $('.date-picker').datepicker({
                    autoclose: true,
                    todayHighlight: true
                })
                //show datepicker when clicking on the icon
                    .next().on(ace.click_event, function () {
                    $(this).prev().focus();
                });

                //or change it into a date range picker
                $('.input-daterange').datepicker({autoclose: true});


                //to translate the daterange picker, please copy the "examples/daterange-fr.js" contents here before initialization
                $('input[name=date-range-picker]').daterangepicker({
                    'applyClass': 'btn-sm btn-success',
                    'cancelClass': 'btn-sm btn-default',
                    locale: {
                        applyLabel: 'Apply',
                        cancelLabel: 'Cancel',
                    }
                })
                    .prev().on(ace.click_event, function () {
                    $(this).next().focus();
                });


                $('#timepicker1').timepicker({
                    minuteStep: 1,
                    showSeconds: true,
                    showMeridian: false,
                    disableFocus: true,
                    icons: {
                        up: 'fa fa-chevron-up',
                        down: 'fa fa-chevron-down'
                    }
                }).on('focus', function () {
                    $('#timepicker1').timepicker('showWidget');
                }).next().on(ace.click_event, function () {
                    $(this).prev().focus();
                });


                if (!ace.vars['old_ie']) $('#date-timepicker1').datetimepicker({
                    format: 'DD-MM-YYYY h:mm A',//use this option to display seconds
                    icons: {
                        time: 'fa fa-clock-o',
                        date: 'fa fa-calendar',
                        up: 'fa fa-chevron-up',
                        down: 'fa fa-chevron-down',
                        previous: 'fa fa-chevron-left',
                        next: 'fa fa-chevron-right',
                        today: 'fa fa-arrows ',
                        clear: 'fa fa-trash',
                        close: 'fa fa-times'
                    }
                }).next().on(ace.click_event, function () {
                    $(this).prev().focus();
                });
                if (!ace.vars['old_ie']) $('#date-timepicker2').datetimepicker({
                    format: 'DD-MM-YYYY h:mm A',//use this option to display seconds
                    icons: {
                        time: 'fa fa-clock-o',
                        date: 'fa fa-calendar',
                        up: 'fa fa-chevron-up',
                        down: 'fa fa-chevron-down',
                        previous: 'fa fa-chevron-left',
                        next: 'fa fa-chevron-right',
                        today: 'fa fa-arrows ',
                        clear: 'fa fa-trash',
                        close: 'fa fa-times'
                    }
                }).next().on(ace.click_event, function () {
                    $(this).prev().focus();
                });


                $('#colorpicker1').colorpicker();
                //$('.colorpicker').last().css('z-index', 2000);//if colorpicker is inside a modal, its z-index should be higher than modal'safe

                $('#simple-colorpicker-1').ace_colorpicker();
                //$('#simple-colorpicker-1').ace_colorpicker('pick', 2);//select 2nd color
                //$('#simple-colorpicker-1').ace_colorpicker('pick', '#fbe983');//select #fbe983 color
                //var picker = $('#simple-colorpicker-1').data('ace_colorpicker')
                //picker.pick('red', true);//insert the color if it doesn't exist


                $(".knob").knob();


                var tag_input = $('#form-field-tags');
                try {
                    tag_input.tag(
                        {
                            placeholder: tag_input.attr('placeholder'),
                            //enable typeahead by specifying the source array
                            source: ace.vars['US_STATES'],//defined in ace.js >> ace.enable_search_ahead
                            /**
                             //or fetch data from database, fetch those that match "query"
                             source: function(query, process) {
						  $.ajax({url: 'remote_source?q='+encodeURIComponent(query)})
						  .done(function(result_items){
							process(result_items);
						  });
						}
                             */
                        }
                    )

                    //programmatically add/remove a tag
                    var $tag_obj = $('#form-field-tags').data('tag');
                    $tag_obj.add('Programmatically Added');

                    var index = $tag_obj.inValues('some tag');
                    $tag_obj.remove(index);
                }
                catch (e) {
                    //display a textarea for old IE, because it doesn't support this plugin or another one I tried!
                    tag_input.after('<textarea id="' + tag_input.attr('id') + '" name="' + tag_input.attr('name') + '" rows="3">' + tag_input.val() + '</textarea>').remove();
                    //autosize($('#form-field-tags'));
                }


                /////////
                $('#modal-form input[type=file]').ace_file_input({
                    style: 'well',
                    btn_choose: 'Drop files here or click to choose',
                    btn_change: null,
                    no_icon: 'ace-icon fa fa-cloud-upload',
                    droppable: true,
                    thumbnail: 'large'
                })

                //chosen plugin inside a modal will have a zero width because the select element is originally hidden
                //and its width cannot be determined.
                //so we set the width after modal is show
                $('#modal-form').on('shown.bs.modal', function () {
                    if (!ace.vars['touch']) {
                        $(this).find('.chosen-container').each(function () {
                            $(this).find('a:first-child').css('width', '210px');
                            $(this).find('.chosen-drop').css('width', '210px');
                            $(this).find('.chosen-search input').css('width', '200px');
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



                $(document).one('ajaxloadstart.page', function (e) {
                    autosize.destroy('textarea[class*=autosize]')

                    $('.limiterBox,.autosizejs').remove();
                    $('.daterangepicker.dropdown-menu,.colorpicker.dropdown-menu,.bootstrap-datetimepicker-widget.dropdown-menu').remove();
                });


                $('#validation-form').validate({
                    errorElement: 'div',
                    errorClass: 'help-block',
                    focusInvalid: true,
                    ignore: "",
                    rules: {

                        job_title: {
                            required: true
                        },
                        venue: {
                            required: true
                        },
                        company_id: {
                            required: true
                        },
                        year_of_graduation: {
                            required: true
                        },
                        joining_location: {
                            required: true
                        },
//                         campus_date: {
//                             required: true
//                         },
                        apply_before: {
                            required: true
                        },
                        job_description: {
                            required: true
                        },
                        skill_set: {
                            required: true
                        },
                        salary: {
                            required: true
                        },
                        job_type: {
                            required: true
                        }

                    },

                    messages: {
                        job_title: {
                            required: "Please provide a title."

                        },
                        venue: {
                            required: "Please provide a venue."

                        },
                        company_id: {
                            required: "Please provide a Company name."
                        },
                        year_of_graduation: {
                            required: "Please provide a year of graduation."
                        },
                        joining_location: {
                            required: "Please provide a Joining Location."
                        },
//                         campus_date: {
//                             required: "Please provide Campus Date."
//                         },
                        apply_before: {
                            required: "Please provide Apply before Date."
                        },
                        job_description: {
                            required: "Please provide a Job Description."
                        },
                        skill_set: {
                            required: "Please provide a Skill Set."
                        },
                        salary: {
                            required: "Please provide a Salary."
                        },
                        job_type: {
                            required: "Please provide a Job type."
                        }
                    },


                    highlight: function (e) {
                        $(e).closest('.hello').removeClass('has-info').addClass('has-error');





                    },

                    success: function (e) {
                        $(e).closest('.hello').removeClass('has-error ').addClass('has-success');

                        $(e).remove();
                    },


                    errorPlacement: function (error, element) {
                        if (element.is('.chosen-select')) {
                            error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
                        }
//                        else if(element.is('.hello')) {
//                            error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
//                        }
                        else error.insertAfter(element.parent());
                    }

//                    submitHandler: function (form) {
//                    },
//                    invalidHandler: function (form) {
//                    }
                });


            })


        </script>


</body>
</html>
