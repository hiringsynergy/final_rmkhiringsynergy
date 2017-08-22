
<?php session_start();
ob_start();





if(! isset($_SESSION['user']) && $_SESSION['user']==null && isset($_SESSION['user_role'])!='admin' ){

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

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
        function showstudent(){

            var e = document.getElementById("student");
            var strUser = e.options[e.selectedIndex].value;

            location.href = "reportgeneration_student?year="+strUser;

        }
        function showcompany(){

            var e = document.getElementById("company");
            var strUser = e.options[e.selectedIndex].value;

            location.href = "reportgeneration_company?year="+strUser;

        }
        function showdept(){

            var e = document.getElementById("dept");
            var strUser = e.options[e.selectedIndex].value;

            location.href = "reportgeneration_dept?year="+strUser;

        }





    </script>





    <!-- page specific plugin styles -->
    <link rel="stylesheet" href="../assets/css/jquery-ui.custom.min.css" />
    <link rel="stylesheet" href="../assets/css/chosen.min.css" />
    <link rel="stylesheet" href="../assets/css/bootstrap-datepicker3.min.css" />
    <link rel="stylesheet" href="../assets/css/bootstrap-timepicker.min.css" />
    <link rel="stylesheet" href="../assets/css/daterangepicker.min.css" />
    <link rel="stylesheet" href="../assets/css/bootstrap-datetimepicker.min.css" />
    <link rel="stylesheet" href="../assets/css/bootstrap-colorpicker.min.css" />

    <link rel="stylesheet" href="../assets/css/jquery-ui.custom.min.css" />
    <link rel="stylesheet" href="../assets/css/chosen.min.css" />
    <link rel="stylesheet" href="../assets/css/bootstrap-datepicker3.min.css" />
    <link rel="stylesheet" href="../assets/css/bootstrap-timepicker.min.css" />
    <link rel="stylesheet" href="../assets/css/daterangepicker.min.css" />
    <link rel="stylesheet" href="../assets/css/bootstrap-datetimepicker.min.css" />
    <link rel="stylesheet" href="../assets/css/bootstrap-colorpicker.min.css" />





    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
    <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
    <script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js">"></script>


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
</head>

<body class="no-skin" >
<div id="navbar" class="navbar navbar-default          ace-save-state">
    <div class="navbar-container ace-save-state" id="navbar-container">
        <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
            <span class="sr-only">Toggle sidebar</span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>
        </button>

        <div class="navbar-header pull-left">
            <a href="reports" class="navbar-brand">
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
                <a href="../index">
                    <i class="menu-icon fa fa-tachometer"></i>
                    <span class="menu-text"> Dashboard </span>
                </a>

                <b class="arrow"></b>
            </li>

            <li class="">
                <a href="../profile/profile" >
                    <i class="menu-icon fa fa-user"></i>
                    <span class="menu-text">
                            Your Profile
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
                <a href="../admin_panel/admin_panel" >
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


            <li class="">
                <a href="reports">

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

            <li class="active open">
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
                    <li class="active">
                        <a href="reportgeneration">
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
                        <a href="../../index">Home</a>
                    </li>
                    <li class="active">Reports</li>
                </ul><!-- /.breadcrumb -->
                <!-- /.nav-search -->
            </div>

            <div class="page-content">
                <!-- /.ace-settings-container -->


                <div class="bigger-170 blue">
                    Reports Generation



                </div>
                <div class="space-16"></div>












                <!-- /.page-header -->

                <div class="row">

                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->

                        <div class="row">
                            <div class="col-xs-12">
                                <h3 class="header smaller lighter blue">Department Reports</h3>



                                <?php
                                if(isset($_GET['year']) && isset($_SESSION['user_role'])=='admin' ){


                                    include "../connect.php";

                                    $table=$_GET['year'];



                                    ?>
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
                                                <!--                                            <th class="center">-->
                                                <!--                                                <label class="pos-rel">-->
                                                <!--                                                    <input type="checkbox" class="ace" />-->
                                                <!--                                                    <span class="lbl"></span>-->
                                                <!--                                                </label>-->
                                                <!--                                            </th>-->

                                                <th>Serial No.</th>

                                                <th>Department</th>

                                                <th>No. of Students registered for placement</th>

                                                <th>Effective Placement</th>
                                                <th>Single Offer</th>
                                                <th>Double Offer</th>
                                                <th>Triple Offer</th>
                                                <th>Four Offer</th>
                                                <th>Percentage</th>
                                                <th>Boys</th>
                                                <th>Girls</th>
                                                <th>Dayscholar</th>
                                                <th>Hosteller</th>
                                               

                                            </tr>
                                            </thead>

                                            <tbody>
                                            <tr>

                                             <td>1</td>
                                             <td>CSE</td>
                                             <td>
                                                 <?php

                                                 //calculate total count
                                   

                                                    $query_students_cse = "SELECT * FROM students_".$table."  WHERE st_ugspecialization='cse'";


                                                    $result_students_cse = mysqli_query($connect,$query_students_cse);

                                                  
                                                    $count_cse =  mysqli_num_rows($result_students_cse);

                                                 echo $count_cse;




                                                 ?>

                                             </td>
                                             <td>
                                                 

                                                 <?php


                                                 

                                                  //single

                                               $query_single_cse = " SELECT * FROM students_".$table." WHERE st_jobcounts = 1 AND st_ugspecialization = 'cse' ";
                                              $result_single_cse = mysqli_query($connect,$query_single_cse);

                                               $count_single_cse = mysqli_num_rows($result_single_cse);


                                             //double
                                              $query_double_cse = "SELECT * FROM students_".$table." WHERE st_jobcounts = 2 AND st_ugspecialization = 'cse' ";
                                              $result_double_cse = mysqli_query($connect,$query_double_cse);

                                              $count_double_cse = mysqli_num_rows($result_double_cse);


                                              //triple

                                                $query_double_cse = "SELECT * FROM students_".$table." WHERE st_jobcounts = 2 AND st_ugspecialization = 'cse' ";
                                              $result_double_cse = mysqli_query($connect,$query_double_cse);

                                               $count_double_cse = mysqli_num_rows($result_double_cse);

                                              //four


                                              $query_four_cse = "SELECT * FROM students_".$table." WHERE st_jobcounts = 4 AND st_ugspecialization = 'cse' ";
                                              $result_four_cse = mysqli_query($connect,$query_four_cse);

                                               $count_four_cse = mysqli_num_rows($result_four_cse);

                                               echo $effective_cse  = $count_single_cse +$count_double_cse + $count_triple_cse + $count_four_cse ;







                                            



                                                 ?>
                                             </td>
                                             <td>
                                             <?php 

                                             include "../connect.php";

                                             //calculate single 

                                             $query_single_cse = " SELECT * FROM students_".$table." WHERE st_jobcounts = 1 AND st_ugspecialization = 'cse' ";
                                             $result_single_cse = mysqli_query($connect,$query_single_cse);

                                              if($result_single_cse==''){

                                                die("error ".mysqli_error($connect));
                                             }

                                             echo $count_single_cse = mysqli_num_rows($result_single_cse);

                                            




                                             ?>
                                                 
                                             </td>
                                             <td>
                                                 <?php 


                                                 //calculate double 

                                             $query_double_cse = "SELECT * FROM students_".$table." WHERE st_jobcounts = 2 AND st_ugspecialization = 'cse' ";
                                             $result_double_cse = mysqli_query($connect,$query_double_cse);

                                             echo $count_double_cse = mysqli_num_rows($result_double_cse);




                                             ?>

                                             </td>
                                             <td>
                                                 <?php 


                                                 //calculate triple

                                             $query_triple_cse = "SELECT * FROM students_".$table." WHERE st_jobcounts = 3 AND st_ugspecialization = 'cse' ";
                                             $result_triple_cse = mysqli_query($connect,$query_triple_cse);

                                             echo $count_triple_cse = mysqli_num_rows($result_triple_cse);




                                             ?>

                                             </td>
                                             <td>
                                                 <?php 


                                                 //calcylate four 

                                             $query_four_cse = "SELECT * FROM students_".$table." WHERE st_jobcounts = 4 AND st_ugspecialization = 'cse' ";
                                             $result_four_cse = mysqli_query($connect,$query_four_cse);

                                             echo $count_four_cse = mysqli_num_rows($result_four_cse);


                                             ?>

                                             </td>
                                             <td>
                                              <?php

                                       //calculate percentage


                                                    $query_students_cse = "SELECT * FROM students_".$table."  WHERE st_ugspecialization='cse'";


                                                    $result_students_cse = mysqli_query($connect,$query_students_cse);

                                                  
                                                    $count_cse =  mysqli_num_rows($result_students_cse);

                                                  


                                                $percent = $effective_cse/$count_cse; 

                                                $percent = $percent * 100 ;
                                                


                                                 echo number_format((float)$percent, 2, '.', '');


                                            


                                              




                                               ?>

                                             </td>
                                             <td>
                                              <?php

                                              //calculate boys 
                                                $query_students_boys = "SELECT * FROM students_".$table."  WHERE st_ugspecialization='cse' AND st_gender = 'MALE' ";


                                                    $result_students_boys = mysqli_query($connect,$query_students_boys);

                                                  
                                                    $count_boys =  mysqli_num_rows($result_students_boys);

                                                 echo $count_boys;





                                                 ?>

                                             </td>
                                             <td>
                                              <?php

                                               //calculate girls
                                                $query_students_girls = "SELECT * FROM students_".$table."  WHERE st_ugspecialization='cse' AND st_gender = 'FEMALE' ";


                                                    $result_students_girls = mysqli_query($connect,$query_students_girls);

                                                  
                                                    $count_girls =  mysqli_num_rows($result_students_girls);

                                                 echo $count_girls;




                                              ?>
                                             </td>
                                             <td>
                                               <?php



                                               //calculate dayscholar
                                                $query_students_day = "SELECT * FROM students_".$table."  WHERE st_ugspecialization='cse' AND st_dayorhostel='DAY SCHOLAR' ";


                                                    $result_students_day = mysqli_query($connect,$query_students_day);

                                                  
                                                    $count_day =  mysqli_num_rows($result_students_day);

                                                 echo $count_day;





                                              ?>

                                             </td>
                                             <td>
                                              <?php




                                               //calculate hostel
                                                $query_students_day = "SELECT * FROM students_".$table."  WHERE st_ugspecialization='cse' AND st_dayorhostel='HOSTELER' ";


                                                    $result_students_day = mysqli_query($connect,$query_students_day);

                                                  
                                                    $count_day =  mysqli_num_rows($result_students_day);

                                                 echo $count_day;





                                              ?>


                                             </td>

                                             </tr>

                                             <tr>

                                             <td>2</td>
                                             <td>IT</td>
                                             <td>
                                                 <?php
                                   

                                                    $query_students_it = "SELECT * FROM students_".$table."  WHERE st_ugspecialization='it'";


                                                    $result_students_it = mysqli_query($connect,$query_students_it);

                                                  
                                                    $count_it = $count_it + mysqli_num_rows($result_students_it);

                                                 echo $count_it;




                                                 ?>

                                             </td>
                                             <td>
                                                 

                                                 <?php

                                                  //single

                                               $query_single_cse = " SELECT * FROM students_".$table." WHERE st_jobcounts = 1 AND st_ugspecialization = 'it' ";
                                              $result_single_cse = mysqli_query($connect,$query_single_cse);

                                               $count_single_cse = mysqli_num_rows($result_single_cse);


                                             //double
                                              $query_double_cse = "SELECT * FROM students_".$table." WHERE st_jobcounts = 2 AND st_ugspecialization = 'it' ";
                                              $result_double_cse = mysqli_query($connect,$query_double_cse);

                                              $count_double_cse = mysqli_num_rows($result_double_cse);


                                              //triple

                                                $query_double_cse = "SELECT * FROM students_".$table." WHERE st_jobcounts = 2 AND st_ugspecialization = 'it' ";
                                              $result_double_cse = mysqli_query($connect,$query_double_cse);

                                               $count_double_cse = mysqli_num_rows($result_double_cse);

                                              //four


                                              $query_four_cse = "SELECT * FROM students_".$table." WHERE st_jobcounts = 4 AND st_ugspecialization = 'it' ";
                                              $result_four_cse = mysqli_query($connect,$query_four_cse);

                                               $count_four_cse = mysqli_num_rows($result_four_cse);

                                               echo $effective_cse  = $count_single_cse +$count_double_cse + $count_triple_cse + $count_four_cse ;








                                                 ?>
                                             </td>
                                             <td>
                                             <?php 

                                             include "../connect.php";

                                             //echo $table;

                                             $query_single_it = " SELECT * FROM students_".$table." WHERE st_jobcounts = 1 AND st_ugspecialization = 'it' ";
                                             $result_single_it = mysqli_query($connect,$query_single_it);

                                              if($result_single_it==''){

                                                die("error ".mysqli_error($connect));
                                             }

                                             echo $count_single_it = mysqli_num_rows($result_single_it);

                                            




                                             ?>
                                                 
                                             </td>
                                             <td>
                                                 <?php 

                                             $query_double_it = "SELECT * FROM students_".$table." WHERE st_jobcounts = 2 AND st_ugspecialization = 'it' ";
                                             $result_double_it = mysqli_query($connect,$query_double_it);

                                             echo $count_double_it= mysqli_num_rows($result_double_it);




                                             ?>

                                             </td>
                                             <td>
                                                 <?php 

                                             $query_triple_it = "SELECT * FROM students_".$table." WHERE st_jobcounts = 3 AND st_ugspecialization = 'it' ";
                                             $result_triple_it = mysqli_query($connect,$query_triple_it);

                                             echo $count_triple_it = mysqli_num_rows($result_triple_it);




                                             ?>

                                             </td>
                                             <td>
                                                 <?php 

                                             $query_four_it = "SELECT * FROM students_".$table." WHERE st_jobcounts = 4 AND st_ugspecialization = 'it' ";
                                             $result_four_it = mysqli_query($connect,$query_four_it);

                                             echo $count_four_it = mysqli_num_rows($result_four_it);


                                             ?>

                                             </td>
                                            <td>
                                              <?php

                                                //calculate percentage


                                                    $query_students_cse = "SELECT * FROM students_".$table."  WHERE st_ugspecialization='it'";


                                                    $result_students_cse = mysqli_query($connect,$query_students_cse);

                                                  
                                                    $count_cse = $count_cse + mysqli_num_rows($result_students_cse);

                                                  


                                                $percent = $effective_cse / $result_single_cse;

                                                $percent = $percent * 100;
                                                


                                                 echo number_format((float)$percent, 2, '.', '');


                                            


                                              




                                               ?>

                                             </td>
                                             <td>
                                              <?php

                                              //calculate boys 
                                                $query_students_boys = "SELECT * FROM students_".$table."  WHERE st_ugspecialization='it' AND st_gender = 'MALE' ";


                                                    $result_students_boys = mysqli_query($connect,$query_students_boys);

                                                  
                                                    $count_boys =  mysqli_num_rows($result_students_boys);

                                                 echo $count_boys;





                                                 ?>

                                             </td>
                                             <td>
                                              <?php

                                               //calculate girls
                                                $query_students_girls = "SELECT * FROM students_".$table."  WHERE st_ugspecialization='it' AND st_gender = 'FEMALE' ";


                                                    $result_students_girls = mysqli_query($connect,$query_students_girls);

                                                  
                                                    $count_girls =  mysqli_num_rows($result_students_girls);

                                                 echo $count_girls;




                                              ?>
                                             </td>
                                             <td>
                                               <?php



                                               //calculate dayscholar
                                                $query_students_day = "SELECT * FROM students_".$table."  WHERE st_ugspecialization='it' AND st_dayorhostel='DAY SCHOLAR' ";


                                                    $result_students_day = mysqli_query($connect,$query_students_day);

                                                  
                                                    $count_day =  mysqli_num_rows($result_students_day);

                                                 echo $count_day;





                                              ?>

                                             </td>
                                             <td>
                                              <?php




                                               //calculate hostel
                                                $query_students_day = "SELECT * FROM students_".$table."  WHERE st_ugspecialization='it' AND st_dayorhostel='HOSTELER' ";


                                                    $result_students_day = mysqli_query($connect,$query_students_day);

                                                  
                                                    $count_day =  mysqli_num_rows($result_students_day);

                                                 echo $count_day;





                                              ?>


                                             </td>


                                             </tr>

                                             <tr>

                                             <td>3</td>
                                             <td>ECE</td>
                                             <td>
                                                 <?php
                                   

                                                    $query_students_ece = "SELECT * FROM students_".$table."  WHERE st_ugspecialization='ece'";


                                                    $result_students_ece = mysqli_query($connect,$query_students_ece);

                                                  
                                                    $count_ece = $count_ece + mysqli_num_rows($result_students_ece);

                                                 echo $count_ece;




                                                 ?>

                                             </td>
                                             <td>
                                                 

                                                 <?php

                                                
                                                  //single

                                               $query_single_cse = " SELECT * FROM students_".$table." WHERE st_jobcounts = 1 AND st_ugspecialization = 'ece' ";
                                              $result_single_cse = mysqli_query($connect,$query_single_cse);

                                               $count_single_cse = mysqli_num_rows($result_single_cse);


                                             //double
                                              $query_double_cse = "SELECT * FROM students_".$table." WHERE st_jobcounts = 2 AND st_ugspecialization = 'ece' ";
                                              $result_double_cse = mysqli_query($connect,$query_double_cse);

                                              $count_double_cse = mysqli_num_rows($result_double_cse);


                                              //triple

                                                $query_double_cse = "SELECT * FROM students_".$table." WHERE st_jobcounts = 2 AND st_ugspecialization = 'ece' ";
                                              $result_double_cse = mysqli_query($connect,$query_double_cse);

                                               $count_double_cse = mysqli_num_rows($result_double_cse);

                                              //four


                                              $query_four_cse = "SELECT * FROM students_".$table." WHERE st_jobcounts = 4 AND st_ugspecialization = 'ece' ";
                                              $result_four_cse = mysqli_query($connect,$query_four_cse);

                                               $count_four_cse = mysqli_num_rows($result_four_cse);

                                               echo $effective_cse  = $count_single_cse +$count_double_cse + $count_triple_cse + $count_four_cse ;







                                                 ?>
                                             </td>
                                             <td>
                                             <?php 

                                             include "../connect.php";

                                             //echo $table;

                                             $query_single_ece = " SELECT * FROM students_".$table." WHERE st_jobcounts = 1 AND st_ugspecialization = 'ece' ";
                                             $result_single_ece = mysqli_query($connect,$query_single_ece);

                                              if($result_single_ece==''){

                                                die("error ".mysqli_error($connect));
                                             }

                                             echo $count_single_ece = mysqli_num_rows($result_single_ece);

                                            




                                             ?>
                                                 
                                             </td>
                                             <td>
                                                 <?php 

                                             $query_double_ece = "SELECT * FROM students_".$table." WHERE st_jobcounts = 2 AND st_ugspecialization = 'ece' ";
                                             $result_double_ece = mysqli_query($connect,$query_double_ece);

                                             echo $count_double_ece = mysqli_num_rows($result_double_ece);




                                             ?>

                                             </td>
                                             <td>
                                                 <?php 

                                             $query_triple_ece = "SELECT * FROM students_".$table." WHERE st_jobcounts = 3 AND st_ugspecialization = 'ece' ";
                                             $result_triple_ece = mysqli_query($connect,$query_triple_ece);

                                             echo $count_triple_ece = mysqli_num_rows($result_triple_ece);




                                             ?>

                                             </td>
                                             <td>
                                                 <?php 

                                             $query_four_ece = "SELECT * FROM students_".$table." WHERE st_jobcounts = 4 AND st_ugspecialization = 'ece' ";
                                             $result_four_ece = mysqli_query($connect,$query_four_ece);

                                             echo $count_four_ece = mysqli_num_rows($result_four_ece);


                                             ?>

                                             </td>
                                             <td>
                                              <?php

                                                //calculate percentage






                                              $query_students_cse = "SELECT * FROM students_".$table."  WHERE st_ugspecialization='ece'";


                                              $result_students_cse = mysqli_query($connect,$query_students_cse);


                                              $count_cse = $count_cse + mysqli_num_rows($result_students_cse);



                                              $percent = $effective_cse/ $result_single_cse;

                                              $percent = $percent * 100;



                                              echo number_format((float)$percent, 2, '.', '');














                                              ?>

                                             </td>
                                             <td>
                                              <?php

                                              //calculate boys 
                                                $query_students_boys = "SELECT * FROM students_".$table."  WHERE st_ugspecialization='ece' AND st_gender = 'MALE' ";


                                                    $result_students_boys = mysqli_query($connect,$query_students_boys);

                                                  
                                                    $count_boys =  mysqli_num_rows($result_students_boys);

                                                 echo $count_boys;





                                                 ?>

                                             </td>
                                             <td>
                                              <?php

                                               //calculate girls
                                                $query_students_girls = "SELECT * FROM students_".$table."  WHERE st_ugspecialization='ece' AND st_gender = 'FEMALE' ";


                                                    $result_students_girls = mysqli_query($connect,$query_students_girls);

                                                  
                                                    $count_girls =  mysqli_num_rows($result_students_girls);

                                                 echo $count_girls;




                                              ?>
                                             </td>
                                             <td>
                                               <?php



                                               //calculate dayscholar
                                                $query_students_day = "SELECT * FROM students_".$table."  WHERE st_ugspecialization='ece' AND st_dayorhostel='DAY SCHOLAR' ";


                                                    $result_students_day = mysqli_query($connect,$query_students_day);

                                                  
                                                    $count_day =  mysqli_num_rows($result_students_day);

                                                 echo $count_day;





                                              ?>

                                             </td>
                                             <td>
                                              <?php




                                               //calculate hostel
                                                $query_students_day = "SELECT * FROM students_".$table."  WHERE st_ugspecialization='ece' AND st_dayorhostel='HOSTELER' ";


                                                    $result_students_day = mysqli_query($connect,$query_students_day);

                                                  
                                                    $count_day =  mysqli_num_rows($result_students_day);

                                                 echo $count_day;





                                              ?>


                                             </td>



                                             </tr>

                                             <tr>

                                             <td>4</td>
                                             <td>EEE</td>
                                             <td>
                                                 <?php
                                   

                                                    $query_students_eee = "SELECT * FROM students_".$table."  WHERE st_ugspecialization='eee'";


                                                    $result_students_eee = mysqli_query($connect,$query_students_eee);

                                                  
                                                    $count_eee = $count_eee + mysqli_num_rows($result_students_eee);

                                                 echo $count_eee;




                                                 ?>

                                             </td>
                                             <td>
                                                 

                                                 <?php

                                                  //single

                                               $query_single_cse = " SELECT * FROM students_".$table." WHERE st_jobcounts = 1 AND st_ugspecialization = 'eee' ";
                                              $result_single_cse = mysqli_query($connect,$query_single_cse);

                                               $count_single_cse = mysqli_num_rows($result_single_cse);


                                             //double
                                              $query_double_cse = "SELECT * FROM students_".$table." WHERE st_jobcounts = 2 AND st_ugspecialization = 'eee' ";
                                              $result_double_cse = mysqli_query($connect,$query_double_cse);

                                              $count_double_cse = mysqli_num_rows($result_double_cse);


                                              //triple

                                                $query_double_cse = "SELECT * FROM students_".$table." WHERE st_jobcounts = 2 AND st_ugspecialization = 'eee' ";
                                              $result_double_cse = mysqli_query($connect,$query_double_cse);

                                               $count_double_cse = mysqli_num_rows($result_double_cse);

                                              //four


                                              $query_four_cse = "SELECT * FROM students_".$table." WHERE st_jobcounts = 4 AND st_ugspecialization = 'eee' ";
                                              $result_four_cse = mysqli_query($connect,$query_four_cse);

                                               $count_four_cse = mysqli_num_rows($result_four_cse);

                                               echo $effective_cse  = $count_single_cse +$count_double_cse + $count_triple_cse + $count_four_cse ;







                                                 ?>
                                             </td>
                                             <td>
                                             <?php 

                                             include "../connect.php";

                                             //echo $table;

                                             $query_single_eee = " SELECT * FROM students_".$table." WHERE st_jobcounts = 1 AND st_ugspecialization = 'eee' ";
                                             $result_single_eee = mysqli_query($connect,$query_single_eee);

                                              if($result_single_eee==''){

                                                die("error ".mysqli_error($connect));
                                             }

                                             echo $count_single_eee = mysqli_num_rows($result_single_eee);

                                            




                                             ?>
                                                 
                                             </td>
                                             <td>
                                                 <?php 

                                             $query_double_eee = "SELECT * FROM students_".$table." WHERE st_jobcounts = 2 AND st_ugspecialization = 'eee' ";
                                             $result_double_eee = mysqli_query($connect,$query_double_eee);

                                             echo $count_double_eee = mysqli_num_rows($result_double_eee);




                                             ?>

                                             </td>
                                             <td>
                                                 <?php 

                                             $query_triple_eee = "SELECT * FROM students_".$table." WHERE st_jobcounts = 3 AND st_ugspecialization = 'eee' ";
                                             $result_triple_eee = mysqli_query($connect,$query_triple_eee);

                                             echo $count_triple_eee = mysqli_num_rows($result_triple_eee);




                                             ?>

                                             </td>
                                             <td>
                                                 <?php 

                                             $query_four_eee = "SELECT * FROM students_".$table." WHERE st_jobcounts = 4 AND st_ugspecialization = 'eee' ";
                                             $result_four_eee = mysqli_query($connect,$query_four_eee);

                                             echo $count_four_eee = mysqli_num_rows($result_four_eee);


                                             ?>

                                             </td>
                                            <td>
                                              <?php

                                                //calculate percentage


                                                    $query_students_cse = "SELECT * FROM students_".$table."  WHERE st_ugspecialization='eee'";


                                                    $result_students_cse = mysqli_query($connect,$query_students_cse);

                                                  
                                                    $count_cse = $count_cse + mysqli_num_rows($result_students_cse);

                                                 

                                                $percent = $effective_cse/ $result_single_cse;

                                                $percent = $percent * 100;
                                                


                                                 echo number_format((float)$percent, 2, '.', '');


                                            


                                              




                                               ?>

                                             </td>
                                             <td>
                                              <?php

                                              //calculate boys 
                                                $query_students_boys = "SELECT * FROM students_".$table."  WHERE st_ugspecialization='eee' AND st_gender = 'MALE' ";


                                                    $result_students_boys = mysqli_query($connect,$query_students_boys);

                                                  
                                                    $count_boys =  mysqli_num_rows($result_students_boys);

                                                 echo $count_boys;





                                                 ?>

                                             </td>
                                             <td>
                                              <?php

                                               //calculate girls
                                                $query_students_girls = "SELECT * FROM students_".$table."  WHERE st_ugspecialization='eee' AND st_gender = 'FEMALE' ";


                                                    $result_students_girls = mysqli_query($connect,$query_students_girls);

                                                  
                                                    $count_girls =  mysqli_num_rows($result_students_girls);

                                                 echo $count_girls;




                                              ?>
                                             </td>
                                             <td>
                                               <?php



                                               //calculate dayscholar
                                                $query_students_day = "SELECT * FROM students_".$table."  WHERE st_ugspecialization='eee' AND st_dayorhostel='DAY SCHOLAR' ";


                                                    $result_students_day = mysqli_query($connect,$query_students_day);

                                                  
                                                    $count_day =  mysqli_num_rows($result_students_day);

                                                 echo $count_day;





                                              ?>

                                             </td>
                                             <td>
                                              <?php




                                               //calculate hostel
                                                $query_students_day = "SELECT * FROM students_".$table."  WHERE st_ugspecialization='eee' AND st_dayorhostel='HOSTELER' ";


                                                    $result_students_day = mysqli_query($connect,$query_students_day);

                                                  
                                                    $count_day =  mysqli_num_rows($result_students_day);

                                                 echo $count_day;





                                              ?>


                                             </td>


                                             </tr>

                                             <tr>

                                             <td>5</td>
                                             <td>EIE</td>
                                             <td>
                                                 <?php
                                   

                                                    $query_students_eie = "SELECT * FROM students_".$table."  WHERE st_ugspecialization='eie'";


                                                    $result_students_eie = mysqli_query($connect,$query_students_eie);

                                                  
                                                    $count_eie = $count_eie + mysqli_num_rows($result_students_eie);

                                                 echo $count_eie;




                                                 ?>

                                             </td>
                                             <td>
                                                 

                                                 <?php

                                                  //single

                                               $query_single_cse = " SELECT * FROM students_".$table." WHERE st_jobcounts = 1 AND st_ugspecialization = 'eie' ";
                                              $result_single_cse = mysqli_query($connect,$query_single_cse);

                                               $count_single_cse = mysqli_num_rows($result_single_cse);


                                             //double
                                              $query_double_cse = "SELECT * FROM students_".$table." WHERE st_jobcounts = 2 AND st_ugspecialization = 'eie' ";
                                              $result_double_cse = mysqli_query($connect,$query_double_cse);

                                              $count_double_cse = mysqli_num_rows($result_double_cse);


                                              //triple

                                                $query_double_cse = "SELECT * FROM students_".$table." WHERE st_jobcounts = 2 AND st_ugspecialization = 'eie' ";
                                              $result_double_cse = mysqli_query($connect,$query_double_cse);

                                               $count_double_cse = mysqli_num_rows($result_double_cse);

                                              //four


                                              $query_four_cse = "SELECT * FROM students_".$table." WHERE st_jobcounts = 4 AND st_ugspecialization = 'eie' ";
                                              $result_four_cse = mysqli_query($connect,$query_four_cse);

                                               $count_four_cse = mysqli_num_rows($result_four_cse);

                                               echo $effective_cse  = $count_single_cse +$count_double_cse + $count_triple_cse + $count_four_cse ;








                                                 ?>
                                             </td>
                                             <td>
                                             <?php 

                                             include "../connect.php";

                                             //echo $table;

                                             $query_single_eie = " SELECT * FROM students_".$table." WHERE st_jobcounts = 1 AND st_ugspecialization = 'eie' ";
                                             $result_single_eie = mysqli_query($connect,$query_single_eie);

                                              if($result_single_eie==''){

                                                die("error ".mysqli_error($connect));
                                             }

                                             echo $count_single_eie = mysqli_num_rows($result_single_eie);

                                            




                                             ?>
                                                 
                                             </td>
                                             <td>
                                                 <?php 

                                             $query_double_eie = "SELECT * FROM students_".$table." WHERE st_jobcounts = 2 AND st_ugspecialization = 'eie' ";
                                             $result_double_eie = mysqli_query($connect,$query_double_eie);

                                             echo $count_double_eie = mysqli_num_rows($result_double_eie);




                                             ?>

                                             </td>
                                             <td>
                                                 <?php 

                                             $query_triple_eie = "SELECT * FROM students_".$table." WHERE st_jobcounts = 3 AND st_ugspecialization = 'eie' ";
                                             $result_triple_eie = mysqli_query($connect,$query_triple_eie);

                                             echo $count_triple_eie = mysqli_num_rows($result_triple_eie);




                                             ?>

                                             </td>
                                             <td>
                                                 <?php 

                                             $query_four_eie = "SELECT * FROM students_".$table." WHERE st_jobcounts = 4 AND st_ugspecialization = 'eie' ";
                                             $result_four_eie = mysqli_query($connect,$query_four_eie);

                                             echo $count_four_eie = mysqli_num_rows($result_four_eie);


                                             ?>

                                             </td>
                                            <td>
                                              <?php

                                                //calculate percentage


                                                    $query_students_cse = "SELECT * FROM students_".$table."  WHERE st_ugspecialization='eie'";


                                                    $result_students_cse = mysqli_query($connect,$query_students_cse);

                                                  
                                                    $count_cse = $count_cse + mysqli_num_rows($result_students_cse);

                                                  

                                                $percent = $effective_cse / $result_single_cse;

                                                $percent = $percent * 100;
                                                


                                                 echo number_format((float)$percent, 2, '.', '');


                                            


                                              




                                               ?>

                                             </td>
                                             <td>
                                              <?php

                                              //calculate boys 
                                                $query_students_boys = "SELECT * FROM students_".$table."  WHERE st_ugspecialization='eie' AND st_gender = 'MALE' ";


                                                    $result_students_boys = mysqli_query($connect,$query_students_boys);

                                                  
                                                    $count_boys =  mysqli_num_rows($result_students_boys);

                                                 echo $count_boys;





                                                 ?>

                                             </td>
                                             <td>
                                              <?php

                                               //calculate girls
                                                $query_students_girls = "SELECT * FROM students_".$table."  WHERE st_ugspecialization='eie' AND st_gender = 'FEMALE' ";


                                                    $result_students_girls = mysqli_query($connect,$query_students_girls);

                                                  
                                                    $count_girls =  mysqli_num_rows($result_students_girls);

                                                 echo $count_girls;




                                              ?>
                                             </td>
                                             <td>
                                               <?php



                                               //calculate dayscholar
                                                $query_students_day = "SELECT * FROM students_".$table."  WHERE st_ugspecialization='eie' AND st_dayorhostel='DAY SCHOLAR' OR st_dayorhostel='DAYSCHOLAR' ";


                                                    $result_students_day = mysqli_query($connect,$query_students_day);

                                                  
                                                    $count_day =  mysqli_num_rows($result_students_day);

                                                 echo $count_day;





                                              ?>

                                             </td>
                                             <td>
                                              <?php




                                               //calculate hostel
                                                $query_students_day = "SELECT * FROM students_".$table."  WHERE st_ugspecialization='eie' AND st_dayorhostel='HOSTELER' ";


                                                    $result_students_day = mysqli_query($connect,$query_students_day);

                                                  
                                                    $count_day =  mysqli_num_rows($result_students_day);

                                                 echo $count_day;





                                              ?>


                                             </td>



                                             </tr>

                                             <tr>

                                             <td>6</td>
                                             <td>MECH</td>
                                             <td>
                                                 <?php
                                   

                                                    $query_students_mech = "SELECT * FROM students_".$table."  WHERE st_ugspecialization='mech'";


                                                    $result_students_mech = mysqli_query($connect,$query_students_mech);

                                                  
                                                    $count_mech= $count_mech+ mysqli_num_rows($result_students_mech);

                                                 echo $count_mech;




                                                 ?>

                                             </td>
                                             <td>
                                                 

                                                 <?php

                                                  //single

                                               $query_single_cse = " SELECT * FROM students_".$table." WHERE st_jobcounts = 1 AND st_ugspecialization = 'mech' ";
                                              $result_single_cse = mysqli_query($connect,$query_single_cse);

                                               $count_single_cse = mysqli_num_rows($result_single_cse);


                                             //double
                                              $query_double_cse = "SELECT * FROM students_".$table." WHERE st_jobcounts = 2 AND st_ugspecialization = 'mech' ";
                                              $result_double_cse = mysqli_query($connect,$query_double_cse);

                                              $count_double_cse = mysqli_num_rows($result_double_cse);


                                              //triple

                                                $query_double_cse = "SELECT * FROM students_".$table." WHERE st_jobcounts = 2 AND st_ugspecialization = 'mech' ";
                                              $result_double_cse = mysqli_query($connect,$query_double_cse);

                                               $count_double_cse = mysqli_num_rows($result_double_cse);

                                              //four


                                              $query_four_cse = "SELECT * FROM students_".$table." WHERE st_jobcounts = 4 AND st_ugspecialization = 'mech' ";
                                              $result_four_cse = mysqli_query($connect,$query_four_cse);

                                               $count_four_cse = mysqli_num_rows($result_four_cse);

                                               echo $effective_cse  = $count_single_cse +$count_double_cse + $count_triple_cse + $count_four_cse ;







                                                 ?>
                                             </td>
                                             <td>
                                             <?php 

                                             include "../connect.php";

                                             //echo $table;

                                             $query_single_mech = " SELECT * FROM students_".$table." WHERE st_jobcounts = 1 AND st_ugspecialization = 'mech' ";
                                             $result_single_mech= mysqli_query($connect,$query_single_mech);

                                              if($result_single_mech==''){

                                                die("error ".mysqli_error($connect));
                                             }

                                             echo $count_single_mech = mysqli_num_rows($result_single_mech);

                                            




                                             ?>
                                                 
                                             </td>
                                             <td>
                                                 <?php 

                                             $query_double_mech= "SELECT * FROM students_".$table." WHERE st_jobcounts = 2 AND st_ugspecialization = 'mech' ";
                                             $result_double_mech = mysqli_query($connect,$query_double_mech);

                                             echo $count_double_mech= mysqli_num_rows($result_double_mech);




                                             ?>

                                             </td>
                                             <td>
                                                 <?php 

                                             $query_triple_mech= "SELECT * FROM students_".$table." WHERE st_jobcounts = 3 AND st_ugspecialization = 'mech' ";
                                             $result_triple_mech= mysqli_query($connect,$query_triple_mech);

                                             echo $count_triple_mech = mysqli_num_rows($result_triple_mech);




                                             ?>

                                             </td>
                                             <td>
                                                 <?php 

                                             $query_four_mech = "SELECT * FROM students_".$table." WHERE st_jobcounts = 4 AND st_ugspecialization = 'mech' ";
                                             $result_four_mech = mysqli_query($connect,$query_four_mech);

                                             echo $count_four_mech= mysqli_num_rows($result_four_mech);


                                             ?>

                                             </td>
                                             <td>
                                              <?php

                                                //calculate percentage


                                                    $query_students_cse = "SELECT * FROM students_".$table."  WHERE st_ugspecialization='mech'";


                                                    $result_students_cse = mysqli_query($connect,$query_students_cse);

                                                  
                                                    $count_cse = $count_cse + mysqli_num_rows($result_students_cse);

                                                  


                                                $percent = $effective_cse/ $result_single_cse;

                                                $percent = $percent * 100;
                                                


                                                 echo number_format((float)$percent, 2, '.', '');


                                            


                                              




                                               ?>

                                             </td>
                                             <td>
                                              <?php

                                              //calculate boys 
                                                $query_students_boys = "SELECT * FROM students_".$table."  WHERE st_ugspecialization='mech' AND st_gender = 'MALE' ";


                                                    $result_students_boys = mysqli_query($connect,$query_students_boys);

                                                  
                                                    $count_boys =  mysqli_num_rows($result_students_boys);

                                                 echo $count_boys;





                                                 ?>

                                             </td>
                                             <td>
                                              <?php

                                               //calculate girls
                                                $query_students_girls = "SELECT * FROM students_".$table."  WHERE st_ugspecialization='mech' AND st_gender = 'FEMALE' ";


                                                    $result_students_girls = mysqli_query($connect,$query_students_girls);

                                                  
                                                    $count_girls =  mysqli_num_rows($result_students_girls);

                                                 echo $count_girls;




                                              ?>
                                             </td>
                                             <td>
                                               <?php



                                               //calculate dayscholar
                                                $query_students_day = "SELECT * FROM students_".$table."  WHERE st_ugspecialization='mech' AND st_dayorhostel='DAY SCHOLAR' ";


                                                    $result_students_day = mysqli_query($connect,$query_students_day);

                                                  
                                                    $count_day =  mysqli_num_rows($result_students_day);

                                                 echo $count_day;





                                              ?>

                                             </td>
                                             <td>
                                              <?php




                                               //calculate hostel
                                                $query_students_day = "SELECT * FROM students_".$table."  WHERE st_ugspecialization='mech' AND st_dayorhostel='HOSTELER' ";


                                                    $result_students_day = mysqli_query($connect,$query_students_day);

                                                  
                                                    $count_day =  mysqli_num_rows($result_students_day);

                                                 echo $count_day;





                                              ?>


                                             </td>

                                             </tr>

                                             </tr>


                                             <tr>

                                             <td>7</td>
                                             <td>CIVIL</td>
                                             <td>
                                                 <?php
                                   

                                                    $query_students_civil = "SELECT * FROM students_".$table."  WHERE st_ugspecialization='civil'";


                                                    $result_students_civil = mysqli_query($connect,$query_students_civil);

                                                  
                                                    $count_civil = $count_civil+ mysqli_num_rows($result_students_civil);

                                                 echo $count_civil;




                                                 ?>

                                             </td>
                                             <td>
                                                 

                                                 <?php

                                                 //single

                                                 $query_single_cse = " SELECT * FROM students_".$table." WHERE st_jobcounts = 1 AND st_ugspecialization = 'eie' ";
                                                 $result_single_cse = mysqli_query($connect,$query_single_cse);

                                                 $count_single_cse = mysqli_num_rows($result_single_cse);


                                                 //double
                                                 $query_double_cse = "SELECT * FROM students_".$table." WHERE st_jobcounts = 2 AND st_ugspecialization = 'civil' ";
                                                 $result_double_cse = mysqli_query($connect,$query_double_cse);

                                                 $count_double_cse = mysqli_num_rows($result_double_cse);


                                                 //triple

                                                 $query_double_cse = "SELECT * FROM students_".$table." WHERE st_jobcounts = 2 AND st_ugspecialization = 'civil' ";
                                                 $result_double_cse = mysqli_query($connect,$query_double_cse);

                                                 $count_double_cse = mysqli_num_rows($result_double_cse);

                                                 //four


                                                 $query_four_cse = "SELECT * FROM students_".$table." WHERE st_jobcounts = 4 AND st_ugspecialization = 'civil' ";
                                                 $result_four_cse = mysqli_query($connect,$query_four_cse);

                                                 $count_four_cse = mysqli_num_rows($result_four_cse);

                                                 echo $effective_cse  = $count_single_cse +$count_double_cse + $count_triple_cse + $count_four_cse ;



                                                 ?>
                                             </td>
                                             <td>
                                             <?php 

                                             include "../connect.php";

                                             //echo $table;

                                             $query_single_civil = " SELECT * FROM students_".$table." WHERE st_jobcounts = 1 AND st_ugspecialization = 'civil' ";
                                             $result_single_civil= mysqli_query($connect,$query_single_civil);

                                              if($result_single_civil==''){

                                                die("error ".mysqli_error($connect));
                                             }

                                             echo $count_single_civil= mysqli_num_rows($result_single_civil);

                                            




                                             ?>
                                                 
                                             </td>
                                             <td>
                                                 <?php 

                                             $query_double_civil= "SELECT * FROM students_".$table." WHERE st_jobcounts = 2 AND st_ugspecialization = 'civil' ";
                                             $result_double_civil = mysqli_query($connect,$query_double_civil);

                                             echo $count_double_civil= mysqli_num_rows($result_double_civil);




                                             ?>

                                             </td>
                                             <td>
                                                 <?php 

                                             $query_triple_civil = "SELECT * FROM students_".$table." WHERE st_jobcounts = 3 AND st_ugspecialization = 'civil' ";
                                             $result_triple_civil = mysqli_query($connect,$query_triple_civil);

                                             echo $count_triple_civil= mysqli_num_rows($result_triple_civil);




                                             ?>

                                             </td>
                                             <td>
                                                 <?php 

                                             $query_four_civil = "SELECT * FROM students_".$table." WHERE st_jobcounts = 4 AND st_ugspecialization = 'civil' ";
                                             $result_four_civil= mysqli_query($connect,$query_four_civil);

                                             echo $count_four_civil= mysqli_num_rows($result_four_civil);


                                             ?>

                                             </td>
                                           <td>
                                              <?php

                                                //calculate percentage



                                              $query_students_cse = "SELECT * FROM students_".$table."  WHERE st_ugspecialization='civil'";


                                              $result_students_cse = mysqli_query($connect,$query_students_cse);


                                              $count_cse = $count_cse + mysqli_num_rows($result_students_cse);



                                              $percent = $effective_cse / $result_single_cse;

                                              $percent = $percent * 100;



                                              echo number_format((float)$percent, 2, '.', '');










                                              ?>

                                             </td>
                                             <td>
                                              <?php

                                              //calculate boys 
                                                $query_students_boys = "SELECT * FROM students_".$table."  WHERE st_ugspecialization='civil' AND st_gender = 'MALE' ";


                                                    $result_students_boys = mysqli_query($connect,$query_students_boys);

                                                  
                                                    $count_boys =  mysqli_num_rows($result_students_boys);

                                                 echo $count_boys;





                                                 ?>

                                             </td>
                                             <td>
                                              <?php

                                               //calculate girls
                                                $query_students_girls = "SELECT * FROM students_".$table."  WHERE st_ugspecialization='civil' AND st_gender = 'FEMALE' ";


                                                    $result_students_girls = mysqli_query($connect,$query_students_girls);

                                                  
                                                    $count_girls =  mysqli_num_rows($result_students_girls);

                                                 echo $count_girls;




                                              ?>
                                             </td>
                                             <td>
                                               <?php



                                               //calculate dayscholar
                                                $query_students_day = "SELECT * FROM students_".$table."  WHERE st_ugspecialization='civil' AND st_dayorhostel='DAY SCHOLAR' ";


                                                    $result_students_day = mysqli_query($connect,$query_students_day);

                                                  
                                                    $count_day =  mysqli_num_rows($result_students_day);

                                                 echo $count_day;





                                              ?>

                                             </td>
                                             <td>
                                              <?php




                                               //calculate hostel
                                                $query_students_day = "SELECT * FROM students_".$table."  WHERE st_ugspecialization='civil' AND st_dayorhostel='HOSTELER' ";


                                                    $result_students_day = mysqli_query($connect,$query_students_day);

                                                  
                                                    $count_day =  mysqli_num_rows($result_students_day);

                                                 echo $count_day;





                                              ?>


                                             </td>



                                             </tr>

                                             </tr>


                                             <tr>

                                             <td>8</td>
                                             <td>ME-CSE</td>
                                             <td></td>
                                             <td></td>
                                             <td></td>
                                             <td></td>
                                             <td></td>
                                             <td></td>
                                             <td></td>
                                             <td></td>
                                             <td></td>
                                             <td></td>
                                             <td></td>

                                             </tr>


                                             <tr>

                                             <td>9</td>
                                             <td>ME-PED</td>
                                             <td></td>
                                             <td></td>
                                             <td></td>
                                             <td></td>
                                             <td></td>
                                             <td></td>
                                             <td></td>
                                             <td></td>
                                             <td></td>
                                             <td></td>
                                             <td></td>

                                             </tr>


                                             <tr>

                                             <td>10</td>
                                             <td>ME-VLSI</td>
                                             <td></td>
                                             <td></td>
                                             <td></td>
                                             <td></td>
                                             <td></td>
                                             <td></td>
                                             <td></td>
                                             <td></td>
                                             <td></td>
                                             <td></td>
                                             <td></td>

                                             </tr>
                                             <tr>

                                             <td>11</td>
                                             <td>ME-APPD</td>
                                             <td></td>
                                             <td></td>
                                             <td></td>
                                             <td></td>
                                             <td></td>
                                             <td></td>
                                             <td></td>
                                             <td></td>
                                             <td></td>
                                             <td></td>
                                             <td></td>

                                             </tr>

                                             <tr>

                                             <td colspan="2">TOTAL</td>
                                             <td ></td>
                                             <td></td>
                                             <td></td>
                                             <td></td>
                                             <td></td>
                                             <td></td>
                                             <td></td>
                                             <td></td>
                                             <td></td>
                                             <td></td>
                                             <td></td>
                                             <td class="hidden"></td>

                                             </tr>

                                           
                                            </tbody>


                                        </table>

                                        <div id="modal-form" class="modal" tabindex="-1">

                                        </div>



                                    </div>
                                <?php } ?>

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







    jQuery(function($) {


        if(!ace.vars['touch']) {
            $('.chosen-select').chosen({allow_single_deselect:true});
            //resize the chosen on window resize

            $(window)
                .off('resize.chosen')
                .on('resize.chosen', function() {
                    $('.chosen-select').each(function() {
                        var $this = $(this);
                        $this.next().css({'width': $this.parent().width()});
                    })
                }).trigger('resize.chosen');
            //resize chosen on sidebar collapse/expand
            $(document).on('settings.ace.chosen', function(e, event_name, event_val) {
                if(event_name != 'sidebar_collapsed') return;
                $('.chosen-select').each(function() {
                    var $this = $(this);
                    $this.next().css({'width': $this.parent().width()});
                })
            });


            $('#chosen-multiple-style .btn').on('click', function(e){
                var target = $(this).find('input[type=radio]');
                var which = parseInt(target.val());
                if(which == 2) $('#form-field-select-4').addClass('tag-input-style').backgroundColor('red');
                else $('#form-field-select-4').removeClass('tag-input-style');
            });
        }





        //initiate dataTables plugin
        var myTable =
            $('#dynamic-table')
            //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
                .DataTable( {
                    bAutoWidth: false,
                    "aoColumns": [



                        null, null, null, null, null, null, null, null, null, null, null, null, null


                    ],
                    "aaSorting": [],



                    //"bProcessing": true,
                    //"bServerSide": true,
                    //"sAjaxSource": "http://127.0.0.1/table"   ,

                    //,
                    //"sScrollY": "200px",
                    //"bPaginate": false,

                    "sScrollX": "100%",
                    //"sScrollXInner": "120%",
                    //"bScrollCollapse": true,
                    //Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
                    //you may want to wrap the table inside a "div.dataTables_borderWrap" element

                    "iDisplayLength": 25

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
                    "extend": "pdf",
                    "text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Export to PDF</span>",
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
                location.href="admin_panel"
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
