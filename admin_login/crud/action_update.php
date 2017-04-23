
<?php
session_start();
ob_start();


if(isset($_POST['action_update'])){











}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>RMK HIRING SYNERGY </title>
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
            location.href = "reports";

        }
        function myfuncadmin() {
            location.href = "admin_panel/admin_pane_woexport";

        }
        function myfuncjobs() {
            location.href = "jobs/jobs_panel";

        }
        function myfuncsettings() {
            location.href = "settings";

        }
        function showreports(){

            var e = document.getElementById("form-field-select-3");
            var strUser = e.options[e.selectedIndex].value;

            location.href = "adminpanel?year="+strUser;

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
    <link rel="stylesheet" href="../assets/css/bootstrap-duallistbox.min.css" />
    <link rel="stylesheet" href="../assets/css/bootstrap-multiselect.min.css" />
    <link rel="stylesheet" href="../assets/css/select2.min.css" />



    <link rel="stylesheet" href="../assets/css/chosen.min.css" />

    <!-- text fonts -->
    <link rel="stylesheet" href="../assets/css/fonts.googleapis.com.css" />

    <!-- ace styles -->
    <link rel="stylesheet" href="../assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="../assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
    <![endif]-->
    <link rel="stylesheet" href="../assets/css/ace-skins.min.css" />
    <link rel="stylesheet" href="../assets/css/ace-rtl.min.css" />

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="../assets/css/ace-ie.min.css" />
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

<body class="no-skin">
<?php



if(! isset($_SESSION['user']) && $_SESSION['user']==null){

    header("Location: ../login");


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

        <div class="navbar-buttons navbar-header  pull-right"  role="navigation">
            <ul class="nav ace-nav" style="">
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
                        $admin_name=$_SESSION['user'];

                        $query="select * from login_admin where username='{$admin_name}'";




                        $result=mysqli_query($connect,$query);

                        if(!$result){


                            mysqli_error($connect);
                        }

                        while($row=mysqli_fetch_assoc($result)){



                            ?>


                            <img class="nav-user-photo" src="../images/<?php echo $row['admin_pic']; ?>" alt="Jason's Photo" />
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
            <li class="active">
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
                        <a href="../company/companies">
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
                        <a href="../../admin_login/search/advanced_search">
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
                        <a href="../../index.html">Home</a>
                    </li>
                    <li class="active">Dashboard</li>
                </ul><!-- /.breadcrumb -->

                <!-- /.nav-search -->
            </div>

            <div class="page-content">
                <!-- /.ace-settings-container -->

                <div class="page-header">
                    <h1>
                        Insert Records

                    </h1>
                </div><!-- /.page-header -->

                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->
                        <?php



                        if(isset($_FILES['file'])){


                            include "../connect.php";


                            $file_name = $_FILES['file']['name'];
                            $file_size = $_FILES['file']['size'];
                            $file_tmp = $_FILES['file']['tmp_name'];
                            $file_type = $_FILES['file']['type'];

                            $year=$_POST['hidden_field'];

                            $value = explode('.',$file_name);




                            $file_ext=strtolower(end($value));
                            $temp = explode(".", $file_name);
                            $newfilename = "file".time() . '.' . end($temp);

                            $extensions= array("xls","xlsx");


                            if(in_array($file_ext,$extensions)=== false){
                                $errors="extension not allowed, please choose a JPEG or PNG file.";
                            }

                            if($file_size > 2097152) {
                                $errors[]='File size must be excately 2 MB';
                            }

                            if(empty($errors)==true) {
                                move_uploaded_file($file_tmp,"files/".$newfilename);

                            }






                            include "../connect.php";
                            include ("PHPExcel/IOFactory.php");

                            $objPHPExcel = PHPExcel_IOFactory::load("files/$newfilename");
                            foreach ($objPHPExcel->getWorksheetIterator() as $worksheet)
                            {

                                $highestRow = $worksheet->getHighestRow();
                                for ($row=2; $row<=$highestRow; $row++)
                                {



                                    /* $id = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(0, $row)->getValue());
                                     $name = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(1, $row)->getValue());
                                     $position = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(2, $row)->getValue());*/


                                    $roll= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(0, $row)->getValue());
                                    $first_name= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(1, $row)->getValue());
                                    $middle_name= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(2, $row)->getValue());
                                    $last_name= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(3, $row)->getValue());
                                    $name= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(4, $row)->getValue());
                                    $gender= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(5, $row)->getValue());
                                    $father_name= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(6, $row)->getValue());
                                    $father_occupation= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(7, $row)->getValue());
                                    $mother_name= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(8, $row)->getValue());
                                    $mother_occupation= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(9, $row)->getValue());
                                    $email= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(10, $row)->getValue());
                                    $phone= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(11, $row)->getValue());
                                    $dob= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(12, $row)->getValue());
                                    $nationality= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(13, $row)->getValue());
                                    $caste= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(14, $row)->getValue());
                                    $college_name= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(15, $row)->getValue());
                                    $university= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(16, $row)->getValue());
                                    $_10percentage= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(17, $row)->getValue());
                                    $_10institution= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(18, $row)->getValue());
                                    $_10boardofstudy= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(19, $row)->getValue());
                                    $_10medium= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(20, $row)->getValue());
                                    $_10yearofpassing= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(21, $row)->getValue());
                                    $_12percentage= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(22, $row)->getValue());
                                    $_12institution= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(23, $row)->getValue());
                                    $_12boardofstudy= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(24, $row)->getValue());
                                    $_12medium= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(25, $row)->getValue());
                                    $_12yearofpassing= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(26, $row)->getValue());
                                    $dippercentage= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(27, $row)->getValue());
                                    $dipyearofpassing= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(28, $row)->getValue());
                                    $current= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(29, $row)->getValue());
                                    $ugdeg= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(30, $row)->getValue());
                                    $ugspecial= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(31, $row)->getValue());
                                    $ug1sem= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(32, $row)->getValue());
                                    $ug2sem= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(33, $row)->getValue());
                                    $ug3sem= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(34, $row)->getValue());
                                    $ug4sem= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(35, $row)->getValue());
                                    $ug5sem= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(36, $row)->getValue());
                                    $ug6sem= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(37, $row)->getValue());
                                    $ug7sem= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(38, $row)->getValue());
                                    $ug8sem= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(39, $row)->getValue());
                                    $cgpa= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(40, $row)->getValue());
                                    $ugyearofpassing= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(41, $row)->getValue());
                                    $pgdeg= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(42, $row)->getValue());
                                    $pgspecial= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(43, $row)->getValue());
                                    $pg1sem= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(44, $row)->getValue());
                                    $pg2sem= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(45, $row)->getValue());
                                    $pg3sem= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(46, $row)->getValue());
                                    $pg4sem= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(47, $row)->getValue());
                                    $pgcgpa= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(48, $row)->getValue());
                                    $pgyearofpassing= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(49, $row)->getValue());
                                    $ugcollegename= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(50, $row)->getValue());
                                    $dayhostel= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(51, $row)->getValue());
                                    $historyofarrears= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(52, $row)->getValue());
                                    $standingarrears= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(53, $row)->getValue());
                                    $hometown= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(54, $row)->getValue());
                                    $address1= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(55, $row)->getValue());
                                    $address2= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(56, $row)->getValue());
                                    $city= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(57, $row)->getValue());
                                    $state= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(58, $row)->getValue());
                                    $postal_code= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(59, $row)->getValue());
                                    $landline= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(60, $row)->getValue());
                                    $skill= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(61, $row)->getValue());
                                    $duration= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(62, $row)->getValue());
                                    $vendor= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(63, $row)->getValue());
                                    $coecertification= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(64, $row)->getValue());
                                    $gap= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(65, $row)->getValue());
                                    $reason= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(66, $row)->getValue());
                                    $english= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(67, $row)->getValue());
                                    $quantitative= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(68, $row)->getValue());
                                    $logical= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(69, $row)->getValue());
                                    $overall= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(70, $row)->getValue());
                                    $percentage= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(71, $row)->getValue());
                                    $candidate= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(72, $row)->getValue());
                                    $signature= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(73, $row)->getValue());
                                    $placement_status= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(74, $row)->getValue());











                                        $getupdate=$_POST['duallistbox_demo1'];
                                        $query_update="UPDATE ".$year." SET ";
                                         $count= count($getupdate);
                                        $i=1;
                                        foreach($_POST['duallistbox_demo1'] as $temp){


                                            switch($temp){

                                                case 'rollno': {  $query_update.="st_roll='$roll'";  break;}
                                                case 'first_name': {  $query_update.="st_firstname='$first_name'";  break;}
                                                case 'mid_name': {  $query_update.="st_middlename='$middle_name'";  break;}
			                                    case 'last_name': {  $query_update.="st_lastname='$last_name'";  break;}
                                                case 'full_name': {  $query_update.="full_name='$name'";  break;}
                                                case 'gender': {  $query_update.="st_gender='$gender'";  break;}
                                                case 'father_name': {  $query_update.="st_fathername='$father_name'";  break;}
                                                case 'father_occupation': {  $query_update.="st_fatheroccupation='$father_occupation'";  break;}
                                                case 'mother_name': {  $query_update.="st_mothername='$mother_name'";  break;}
                                                case 'mother_occupation': {  $query_update.="st_motheroccupation='$mother_occupation'";  break;}
                                                case 'email_id': {  $query_update.="st_email='$email'";  break;}
                                                case 'mobile_no': {  $query_update.="st_phone='$phone'";  break;}
                                                case 'dob': {  $query_update.="st_dob='$dob'";  break;}
                                                case 'nationality': {  $query_update.="st_nationality='$nationality'";  break;}
                                                case 'caste': {  $query_update.="st_caste='$caste'";  break;}
                                                case 'college_name': {  $query_update.="st_collegename='$college_name'";  break;}
                                                case 'university': {  $query_update.="st_university='$university'";  break;}
                                                case '10thpercent': {  $query_update.="st_10thpercentage='$_10percentage'";  break;}
                                                case '10thinstitution': {  $query_update.="st_10thpercentage='$_10institution'";  break;}
                                                case '10thboard_of_study': {  $query_update.="st_10thboardofstudy='$_10boardofstudy'";  break;}
                                                case '10thmedium': {  $query_update.="st_10thmedium='$_10medium'";  break;}
                                                case '10th_yearofpassing': {  $query_update.="st_10thyearofpassing='$_10yearofpassing'";  break;}
                                                case '12thpercent': {  $query_update.="st_12thpercentage='$_12percentage'";  break;}
                                                case '12thinstitution': {  $query_update.="st_12thpercentage='$_12institution'";  break;}
                                                case '12thboard_of_study': {  $query_update.="st_12thboardofstudy='$_12boardofstudy'";  break;}
                                                case '12thmedium': {  $query_update.="st_12thmedium='$_12medium'";  break;}
                                                case '12th_yearofpassing': {  $query_update.="st_12thyearofpassing='$_12yearofpassing'";  break;}
                                                case 'diploma_percent': {  $query_update.="st_dippercentage='$dippercentage'";  break;}
                                                case 'diploma_yearofpassing': {  $query_update.="st_dipyearofpassing='$dipyearofpassing'";  break;}
                                                case 'ug_pg': {  $query_update.="st_currentlypursuing='$current'";  break;}
                                                case 'ug_deg': {  $query_update.="st_ugdegree='$ugdeg'";  break;}
                                                case 'ug_dept': {  $query_update.="st_ugspecialization='$ugspecial'";  break;}
                                                case '1_sem': {  $query_update.="st_1stsem='$ug1sem'";  break;}
                                                case '2_sem': {  $query_update.="st_2ndsem='$ug2sem'";  break;}
                                                case '3_sem': {  $query_update.="st_3rdsem='$ug3sem'";  break;}
                                                case '4_sem': {  $query_update.="st_4thsem='$ug4sem'";  break;}
                                                case '5_sem': {  $query_update.="st_5thsem='$ug5sem'";  break;}
                                                case '6_sem': {  $query_update.="st_6thsem='$ug6sem'";  break;}
                                                case '7_sem': {  $query_update.="st_7thsem='$ug7sem'";  break;}
                                                case '8_sem': {  $query_update.="st_8thsem='$ug8sem'";  break;}
                                                case 'ug_cgpa': {  $query_update.="st_cgpa='$cgpa'";  break;}
                                                case 'ug_yearofpassing': {  $query_update.="st_ugyearofpassing='$ugyearofpassing'";  break;}
                                                case 'pg_deg': {  $query_update.="st_pgdegree='$pgdeg'";  break;}
                                                case 'pg_dept': {  $query_update.="st_pgspecialization='$pgspecial'";  break;}
                                                case 'pg_1_sem': {  $query_update.="st_pg1stsem='$pg1sem'";  break;}
                                                case 'pg_2_sem': {  $query_update.="st_pg2ndsem='$pg2sem'";  break;}
                                                case 'pg_3_sem': {  $query_update.="st_pg3rdsem='$pg3sem'";  break;}
                                                case 'pg_4_sem': {  $query_update.=" st_pg4thsem='$pg4sem'";  break;}
                                                case 'pg_cgpa': {  $query_update.="st_pgcgpa='$pgcgpa'";  break;}
                                                case 'pg_yearofpassing': {  $query_update.="st_pgyearofpassing='$pgyearofpassing'";  break;}
                                                case 'pg_ugcollegename': {  $query_update.="st_ugcollegename='$ugcollegename'";  break;}
                                                case 'dayscholar_hosteler': {  $query_update.="st_dayorhostel='$dayhostel'";  break;}
                                                case 'history_of_arreas': {  $query_update.="st_historyofarrears='$historyofarrears'";  break;}
                                                case 'standing_arrears': {  $query_update.="st_standingarrears='$standingarrears'";  break;}
                                                case 'home_town': {  $query_update.="st_hometown='$hometown'";  break;}
                                                case 'permanent_address_1': {  $query_update.="st_address1='$address1'";  break;}
                                                case 'permanent_address_2': {  $query_update.="st_address2='$address2'";  break;}
                                                case 'permanent_city': {  $query_update.="st_city='$city'";  break;}
                                                case 'state': {  $query_update.="st_state='$state'";  break;}
                                                case 'postal_code': {  $query_update.="st_posatlcode='$postal_code'";  break;}
                                                case 'contact_no': {  $query_update.="st_landline='$landline'";  break;}
                                                case 'skills': {  $query_update.="st_skillcertification='$skill'";  break;}
                                                case 'duration_of_course': {  $query_update.="st_duration='$duration'";  break;}
                                                case 'certification': {  $query_update.="st_vendor='$vendor'";  break;}
                                                case 'coe_certification': {  $query_update.="st_coecertification='$coecertification'";  break;}
                                                case 'gap_in_studies': {  $query_update.="st_gapinstudies='$gap'";  break;}
                                                case 'gap_in_studies_reason': {  $query_update.="st_reason='$reason'";  break;}
                                                case 'eng_percent': {  $query_update.="st_english='$english'";  break;}
                                                case 'quants_percent': {  $query_update.="st_quantitative='$quantitative'";  break;}
                                                case 'logical_percent': {  $query_update.="st_logical='$logical'";  break;}
                                                case 'overall_average': {  $query_update.="st_overall='$overall'";  break;}
                                                case 'percent': {  $query_update.="st_percentage='$percentage'";  break;}
                                                case 'candidate_id': {  $query_update.="st_candidateid='$candidate'";  break;}
                                                case 'signature': {  $query_update.="st_signature='$signature'";  break;}
                                                case 'placement_status': {  $query_update.="st_placementstatus='$placement_status'";  break;}
                                                //code to be written -- duplicate the cases for different coulumns in database




                                            }

                                            if($i<$count){

                                                $query_update.=", ";

                                            }
                                            else{
                                                $query_update.=" ";
                                            }


                                            $i++;


                                        }










                                        $sql = $query_update." WHERE st_roll='$roll'";








                                   $result= mysqli_query($connect, $sql);





                                    if(!$result){

                                        die("".mysqli_error($connect));
                                    }
                                }
                            }



                            unlink("files/$newfilename");
                            ?>

                            <div class="alert alert-block alert-success">
                                <button type="button" class="close" data-dismiss="alert">
                                    <i class="ace-icon fa fa-times"></i>
                                </button>

                                <i class="ace-icon fa fa-check green"></i>


                                <strong class="green">
                                    Successfully updated

                                </strong>


                            </div>
                            <div class="col-xs-6 bigger-120 ">

                                <a href="../index" class="btn btn-primary">
                                    Go Back

                                </a>

                            </div>
                            <div class="col-xs-6">



                            </div>

                            <?php




                        }












                        else {


                            ?>


                            <div class="col-xs-8">
                                <label for="form-field-select-3"
                                       style="color: #E75926; font-weight: bolder ; font-size: large;">Choose
                                    File</label>

                                <br>
                                <br>


                                <form action="action_update" method="post" enctype="multipart/form-data">


                                    <input type="hidden" value="<?php echo $_GET['year'] ?>" name="hidden_field" >
                                    <input type="file" name="file" id="id-input-file-2"/>

                                    <div class="space-32"></div>


                                    <label class="" for="duallist"
                                           style="color: #71BA51; font-weight: bolder ; font-size: large;">Select
                                        Column </label>

                                    <div class="space-6"></div>
                                    <div class="row">


                                        <div class="col-sm-12">
                                            <select multiple="multiple" size="10" name="duallistbox_demo1[]"
                                                    id="duallist">

                                                <?php


                                                include "../connect.php";


                                                ?>

                                                <option value="rollno">Roll No</option>
                                                <option value="first_name">First Name</option>
                                                <option value="mid_name">Middle Name</option>
                                                <option value="last_name">Last Name</option>
                                                <option value="full_name">Full Name</option>
                                                <option value="gender">Gender (Male/Female)</option>
                                                <option value="father_name">Father Name</option>
                                                <option value="father_occupation">Father Occupation</option>
                                                <option value="mother_name">Mother Name</option>
                                                <option value="mother_occupation">Mother Occupation</option>
                                                <option value="email_id">Email ID</option>
                                                <option value="mobile_no">Mobile Number</option>
                                                <option value="dob">Date of Birth (DD-MM-YYYY)</option>
                                                <option value="nationality">Nationality</option>
                                                <option value="caste">Caste</option>
                                                <option value="college_name">College Name</option>
                                                <option value="university">University</option>
                                                <option value="10thpercent">10th %</option>
                                                <option value="10thboard_of_study">Board of Study</option>
                                                <option value="10thmedium">Medium (Tamil/English/Telugu/Others)</option>
                                                <option value="10th_yearofpassing">10th - Year of Passing</option>
                                                <option value="12thpercent">12th %</option>
                                                <option value="12thboard_of_study">Board of Study</option>
                                                <option value="12thmedium">Medium (Tamil/English/Telugu/Others)</option>
                                                <option value="12th_yearofpassing">12th - Year of Passing</option>
                                                <option value="diploma_percent">Diploma %</option>
                                                <option value="diploma_yearofpassing">Diploma - Year of Passing</option>
                                                <option value="ug_pg">Currently Pursuing (UG/PG)</option>
                                                <option value="ug_deg">UG Degree</option>
                                                <option value="ug_dept">UG Department</option>
                                                <option value="1_sem">1st Sem</option>
                                                <option value="2_sem">2nd Sem</option>
                                                <option value="3_sem">3rd Sem</option>
                                                <option value="4_sem">4th Sem</option>
                                                <option value="5_sem">5th Sem</option>
                                                <option value="6_sem">6th Sem</option>
                                                <option value="7_sem">7th Sem</option>
                                                <option value="8_sem">8th Sem</option>
                                                <option value="ug_cgpa">UG Degree % or CGPA</option>
                                                <option value="ug_yearofpassing">UG - Year of Passing</option>
                                                <option value="pg_deg">PG Degree</option>
                                                <option value="pg_dept">PG Department</option>
                                                <option value="pg_1_sem">1st Sem</option>
                                                <option value="pg_2_sem">2nd Sem</option>
                                                <option value="pg_3_sem">3rd Sem</option>
                                                <option value="pg_4_sem">4th Sem</option>
                                                <option value="pg_cgpa">PG Degree % or CGPA</option>
                                                <option value="pg_yearofpassing">PG - Year of Passing</option>
                                                <option value="dayscholar_hosteler">Day Scholar/ Hosteler</option>
                                                <option value="history_of_arreas">No History of Arreas</option>
                                                <option value="standing_arrears">Current Degree. No of Standing
                                                    Arrears
                                                </option>
                                                <option value="home_town">Home Town</option>
                                                <option value="permanent_address_1">Permanent Address (Line 1)</option>
                                                <option value="permanent_address_2">Permanent Address (Line 2)</option>
                                                <option value="permanent_city">Permanent City</option>
                                                <option value="state">State</option>
                                                <option value="postal_code">Postal code</option>
                                                <option value="contact_no">Contact Number ( Landline)</option>
                                                <option value="skills">If any Skill Certifications Obtained Name the
                                                    Skill
                                                </option>
                                                <option value="duration_of_course">Duration of the course</option>
                                                <option value="certification">Certification Vendor/Authority/Agency
                                                    Name
                                                </option>
                                                <option value="coe_certification">CoE Certification</option>
                                                <option value="gap_in_studies">Gap in studies</option>
                                                <option value="gap_in_studies_reason">Gap in studies Reason</option>
                                                <option value="eng_percent">English Percentage</option>
                                                <option value="quants_percent">Quantitative Percentage</option>
                                                <option value="logical_percent">Logical Percentage</option>
                                                <option value="overall_average">Overall Average</option>
                                                <option value="percent">Percentage</option>
                                                <option value="candidate_id">Candidate ID</option>
                                                <option value="signature">Signature</option>
                                                <option value="placement_status">Placement Status</option>
                                            </select>

                                            <div class="hr hr-16 hr-dotted"></div>
                                        </div>

                                    </div>

                                    <div class="row col-sm-3">


                                        <div class="space-8"></div>

                                        <button name="action_update" type="submit" class="btn btn-lg btn-warning ">
                                            <i class="ace-icon fa fa-upload"></i>
                                            Update
                                        </button>
                                    </div>


                                </form>
                            </div>


                            <?php


                        }

                        ?>









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
    if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>
<script src="../assets/js/bootstrap.min.js"></script>

<!-- page specific plugin scripts -->
<script src="../assets/js/jquery.bootstrap-duallistbox.min.js"></script>
<script src="../assets/js/jquery.raty.min.js"></script>
<script src="../assets/js/bootstrap-multiselect.min.js"></script>
<script src="../assets/js/select2.min.js"></script>
<script src="../assets/js/jquery-typeahead.js"></script>

<!--[if lte IE 8]>
<script src="../assets/js/excanvas.min.js"></script>
<![endif]-->
<script src="../assets/js/jquery-ui.custom.min.js"></script>
<script src="../assets/js/jquery.ui.touch-punch.min.js"></script>
<script src="../assets/js/jquery.easypiechart.min.js"></script>

<script src="../assets/js/chosen.jquery.min.js"></script>
<script src="../assets/js/jquery.sparkline.index.min.js"></script>
<script src="../assets/js/jquery.flot.min.js"></script>
<script src="../assets/js/jquery.flot.pie.min.js"></script>
<script src="../assets/js/jquery.flot.resize.min.js"></script>

<!-- ace scripts -->
<script src="../assets/js/ace-elements.min.js"></script>
<script src="../assets/js/ace.min.js"></script>

<!-- inline scripts related to this page -->
<script type="text/javascript">
    jQuery(function($) {





        var demo1 = $('select[name="duallistbox_demo1[]"]').bootstrapDualListbox({infoTextFiltered: '<span class="label label-purple label-lg">Filtered</span>'});
        var container1 = demo1.bootstrapDualListbox('getContainer');
        container1.find('.btn').addClass('btn-white btn-primary btn-bold');




        //in ajax mode, remove remaining elements before leaving page
        $(document).one('ajaxloadstart.page', function(e) {
            $('[class*=select2]').remove();
            $('select[name="duallistbox_demo1[]"]').bootstrapDualListbox('destroy');
            $('.rating').raty('destroy');
            $('.multiselect').multiselect('destroy');
        });











    $('#id-disable-check').on('click', function() {
            var inp = $('#form-input-readonly').get(0);
            if(inp.hasAttribute('disabled')) {
                inp.setAttribute('readonly' , 'true');
                inp.removeAttribute('disabled');
                inp.value="This text field is readonly!";
            }
            else {
                inp.setAttribute('disabled' , 'disabled');
                inp.removeAttribute('readonly');
                inp.value="This text field is disabled!";
            }
        });

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
                if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
                else $('#form-field-select-4').removeClass('tag-input-style');
            });
        }
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
         //or you can activate the chosen plugin after modal is shown
         //this way select element becomes visible with dimensions and chosen works as expected
         $('#modal-form').on('shown', function () {
					$(this).find('.modal-chosen').chosen();
				})
         */


        $('[data-rel=tooltip]').tooltip({container:'body'});
        $('[data-rel=popover]').popover({container:'body'});

        autosize($('textarea[class*=autosize]'));





    });
</script>



</body>
</html>
