
<?php session_start();
ob_start();





if(! isset($_SESSION['user']) && $_SESSION['user']==null && isset($_SESSION['user_role'])!='admin' ){

    header("Location: ../../login");


}

if(isset($_POST['update']) && isset($_SESSION['user_role'])=='admin'  )
{



    include "../connect.php";

    echo $jobid = $_POST['job_id'];
    $roll = $_POST['tags'];
    $array_roll=explode(",", $roll);
    print_r($array_roll);


    foreach ($array_roll as $temp){

        $temp=trim($temp," ");

      echo  $get_year=$temp[4].$temp[5];
        $year=(int)$get_year+4;

        $query_get_tablename="SELECT * FROM table_map where table_short='$year'";
        $result_get_tablename=mysqli_query($connect, $query_get_tablename);
        $row_get_talbename=mysqli_fetch_assoc($result_get_tablename);

        $students_table=$row_get_talbename['table_name'];


        $query_update_values="UPDATE ".$students_table." SET _".$jobid."='eligible' where st_roll='$temp'";

        $result=mysqli_query($connect, $query_update_values);

        echo "updated";
        if(!$result){

            die("".mysqli_error($connect));
        }
    }



    header("Location: view_jobs");

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
            location.href = "../admin_panel/admin_panel";

        }
        function myfuncjobs() {
            location.href = "jobs_panel";

        }
        function myfuncsettings() {
            location.href = "../settings";

        }
        function getjobid(str){


      //  alert(str);
            document.getElementById("j_id").value=str;


        }
        function selectyear(){

            var e = document.getElementById("form-field-select-3");
            var strUser = e.options[e.selectedIndex].value;

            location.href = "view_jobs?year="+strUser;

        }


    </script>




    <!-- page specific plugin styles -->

    <link rel="stylesheet" href="../assets/css/jquery-ui.custom.min.css" />
    <link rel="stylesheet" href="../assets/css/select2.min.css" />
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
<div id="navbar" class="navbar navbar-default          ace-save-state">
    <div class="navbar-container ace-save-state" id="navbar-container">
        <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
            <span class="sr-only">Toggle sidebar</span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>
        </button>

        <div class="navbar-header pull-left">
            <a href="view_jobs" class="navbar-brand">
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
                    <span class="menu-text">Dashboard </span>
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


            <li class="active open">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-briefcase"></i>
                    <span class="menu-text"> Jobs </span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu">
                    <li class="active">
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


                </ul>            </li>

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
                    <li class="active">view Jobs</li>
                </ul><!-- /.breadcrumb -->
                <!-- /.nav-search -->
            </div>

            <div class="page-content">
                <!-- /.ace-settings-container -->

                <div class="page-header">
                    <h1>
                       View Jobs

                    </h1>
                </div><!-- /.page-header -->

                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->

                        <div class="col-xs-12 col-md-7">
                                                <select class="chosen-select form-control center" id="form-field-select-3"  onchange="selectyear()" name="year" data-placeholder="Select Year of Graduation">


                                                    <option value=""></option>

                                                    <?php


                                                    include "../connect.php";
                                                    $query_option="SELECT * FROM table_map ORDER BY table_value ASC";
                                                    $result_option=mysqli_query($connect, $query_option);
                                                    while($row_option=mysqli_fetch_assoc($result_option)){




                                                            ?>

                                                            <option value="<?php echo $row_option['table_value'] ?>"><?php echo $row_option['table_value'] ?>        </option>


                                                            <?php

                                                    }

                                                    ?>



                                                </select>

                                            </div>

                                            <div class="space-32"></div>
                                        <div class="space-32"></div>
                        <?php


                        if(isset($_FILES['placement_file']) && isset($_SESSION['user_role'])=='admin' )
                        {

                            include "../connect.php";
                            $job_id=$_POST['hidden'];

                            $query_get_year="SELECT * FROM jobs WHERE job_id='$job_id'";
                            $result_get_year=mysqli_query($connect, $query_get_year);
                            $row_get_year=mysqli_fetch_assoc($result_get_year);

                            $get_year=$row_get_year['year_of_graduation'];
                            $get_title=$row_get_year['company'];









                            $file_name = $_FILES['placement_file']['name'];
                            $file_size = $_FILES['placement_file']['size'];
                            $file_tmp = $_FILES['placement_file']['tmp_name'];
                            $file_type = $_FILES['placement_file']['type'];



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
                                move_uploaded_file($file_tmp,"placement_files/".$newfilename);

                            }






                            include "../connect.php";
                            include ("../crud/PHPExcel/IOFactory.php");

                            $objPHPExcel = PHPExcel_IOFactory::load("placement_files/$newfilename");
                            foreach ($objPHPExcel->getWorksheetIterator() as $worksheet)
                            {

                                $highestRow = $worksheet->getHighestRow();
                                for ($row=2; $row<=$highestRow; $row++)
                                {





                                    $roll= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(0, $row)->getValue());



                                    $query_get_status="SELECT * FROM students_".$get_year." WHERE st_roll='$roll'";
                                    $result_status=mysqli_query($connect, $query_get_status);
                                    $row_status=mysqli_fetch_assoc($result_status);

                                    $placement_status=$row_status['st_placementstatus'];
                                    $placement_id=$row_status['st_placementid'];



//                                    $placement_status=null;
//                                    $placement_id=null;
                                    if($placement_status!=null){


                                        $placement_status.=', ';
                                        $placement_status.=$get_title;
                                        $placement_id.=',';
                                        $placement_id.=$job_id;



                                    }
                                    else{
                                        $placement_status=$get_title;
                                        $placement_id=$job_id;
                                    }










                                    $sql = "UPDATE students_".$get_year." SET st_placementstatus='".$placement_status."' , st_placementid='$placement_id', _".$job_id."='eligible'  WHERE st_roll='$roll'";








                                    $result= mysqli_query($connect, $sql);





                                    if(!$result){

                                        die("".mysqli_error($connect));
                                    }
                                }
                            }



                              unlink("placement_files/".$newfilename);
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

                            <div class="col-xs-6">



                            </div>

                            <?php






                        }

                        include "../connect.php";

                        if(isset($_GET['year']) && isset($_SESSION['user_role'])=='admin' )
                        {
                            echo $year=$_GET['year'];
                            $query="SELECT * FROM jobs WHERE year_of_graduation = '$year' ";
                        }
                        else
                        {
                            $query="SELECT * FROM jobs ORDER BY sort DESC";
                        }
                        
                        $result= mysqli_query($connect, $query);
                        die(mysqli_error($connect));
                        $i=0;

                        while($row=mysqli_fetch_assoc($result))

                        {
                            $company_id=$row['company_id'];

                           $widget_color=array(' widget-color-blue','widget-color-green','widget-color-orange','widget-color-red','widget-color-pink','widget-color-green','widget-color-purple','widget-color-blue2','widget-color-red3','widget-color-blue3');

                           $i=$i%sizeof($widget_color);




                            ?>



                        <div class="row">
                            <div class="col-xs-12 widget-container-col"  id="widget-container-col-2">
                                <div  class="<?php echo $widget_color[$i] ?>"   id="widget-box-1">
                                    <div class="widget-header"><h5 class="widget-title bigger" style="color: white">Job</h5>

                                    </div>

                                    <div class="widget-body">
                                        <div class="widget-main">


                                            <div class="row">
                                            <div class="table-responsive ">

                        <table class="table table-striped table-hover "  id="simple-table" cellpadding="1">
                            <thead class="thin-border-bottom">
                            <tr>
                                <th>
                                    <font size="3">

                                        <i class="ace-icon fa fa-user"></i>
                                        Job Title
                                    </font>
                                </th>
                                <th>
                                    <font size="3">
                                        Job Posted Time
                                    </font>
                                </th>
                                <th  class=" left" >
                                    <font size="3">
                                        MoreDetails

                                    </font>

                                </th>

                                <th>
                                    <font size="3">
                                        Campus Date

                                    </font>

                                </th><th>
                                    <font size="3">

                                        Salary
                                    </font>
                                </th>

                                <th>
                                    <font size="3">


                                        Apply Date
                                    </font>
                                </th>
                                <th class="  "><font size="3">Status</font></th>
                                <th class="  "><font size="3"></font></th>
                                <th class="  "><font size="3"></font></th>

                            </tr>
                            </thead>

                            <tbody>
                            <tr>







                                <td   height="80" width="370" class="">

                                    <b>
                                        <a href="#" class="job " style="text-decoration:none; font-size: 18px" data-action="reload">

                                            <?php  echo $row['company']  ?>


                                        </a>
                                        <br><br>



                                    </b>
                                    <div class="row col-md-12" style="font-size: 17px; font-weight: bold;">

                                        <label class="label label-warning center middle" style="size: 40px;"><b> Job:   </b></label>

                                        <div>
                                            <?php  echo $row['job_title']  ?>(<?php  echo $row['job_type']  ?>)

                                        </div>


                                    </div>


                                </td><?php
                                $sec=$row['job_id'];  ?>

                                <td>

                                    <font size="3">
                                        <b>  <?php  echo date("d-m-Y g:i a", $sec);  ?></b>

                                    </font>

                                </td>



                                <td >
                                    <div class="action-buttons col-lg-offset-3">
                                        <a href="#" class="green bigger-140 show-details-btn" title="Show Details">
                                            <i class="ace-icon fa fa-angle-double-down"></i>
                                            <span class="sr-only">Details</span>
                                        </a>
                                    </div>
                                </td>

                                <td>
                                    <font size="3">
                                        <b>  <?php  echo $row['campus_date']  ?></b>

                                    </font>
                                    <br>
                                    <br>
                                    <div class="row col-md-12" style="font-size: large; font-weight: bold;">

                                        <label class="label label-info center middle" style="size: 40px;"><b>Venue:</b></label>

                                        <div>
                                            <?php  echo $row['venue']  ?>


                                        </div>


                                    </div>



                                </td>


                                <td>

                                    <font size="3">
                                        <b>  <?php  echo $row['salary']  ?></b>

                                    </font>

                                </td>
                                <td>
                                    <font size="3">
                                        <b>  <?php  echo $row['apply_before']  ?></b>

                                    </font>

                                </td>
                                <?php

                                $dt = new DateTime("now", new DateTimeZone('Asia/Kolkata'));
                                $date1=$dt->format('d-m-Y H:i A');
                                $date2=$row['apply_before'];


//                                echo strtotime($date2);

                                $temp_current=explode(" ", $date1);
                                $temp_before=explode(" ", $date2);

                              $calc_date=strtotime($temp_before[0])-strtotime($temp_current[0])."<br>";


                               if($temp_before[2]=="PM"){

                                   $tmp=$temp_before[1];
                                   $tmp_value=explode(":", $tmp);

                                   $temp_before[1]=$tmp_value[0]+12 .":".$tmp_value[1];

                               }


//                               echo $temp_before[1]." ".$temp_current[1]."<br>";
//
//
                               $calc_time=strtotime($temp_before[1])-strtotime($temp_current[1])."<br>";
//
//
//
//
//                                print_r($temp_current);
//                                print_r($temp_before);





                                if($calc_date>0 ){





                                ?>



                                <td class="  ">
                                    <span class="label label-success" style="height: 40px; width: 80px; font-size: 18px; padding-top: 10px;">Open</span>
                                </td>

                              <?php


                                }
                                else if( $calc_date==0 && $calc_time>=0){
                                    ?>

                                    <td class="  ">
                                    <span class="label label-success" style="height: 40px; width: 80px; font-size: 18px; padding-top: 10px;">Open</span>
                                </td>


                                   <?php


                                }

                                else{

                                    ?>

                                    <td class="  ">
                                        <span class="label label-danger" style="height: 40px; width: 80px; font-size: 18px; padding-top: 10px;">Closed</span>
                                    </td>




                                  <?php
                                   }

                                  ?>
                                <td>
                                    <a href="#modal-form" class="btn btn-primary" data-toggle="modal" onclick="getjobid(<?php echo $row['job_id'] ?>)">Update Details</a>


                                </td>
                                <td>
                                    <a href="../reports/show_lists?jid=<?php echo $row['job_id']; ?>&flag=1" class="btn btn-warning">Reports</a>

                                </td>


                            </tr>

                            <tr class="detail-row">
                                <?php

                                $query_company="SELECT * FROM company_list where company_id='$company_id'";
                                $result_company= mysqli_query($connect, $query_company);
                                $row_company=mysqli_fetch_assoc($result_company);


                                ?>
                                <td colspan="8">
                                    <div class="table-detail">
                                        <div class="row">
                                            <div class="col-xs-7 col-sm-2">
                                                <div class="text-center ">
                                                    <img height="150" class="thumbnail inline no-margin-bottom " alt="Domain Owner's Avatar" src="../../logos/<?php echo $row_company['company_logo']; ?>" />

                                                </div>
                                            </div>


                                            <div class="col-xs-12 col-sm-10">
                                                <div class="space visible-xs"></div>

                                                <div class="profile-user-info  profile-user-info-striped">
                                                    <div class="profile-info-row  ">
                                                        <div class="profile-info-name " style="min-width: 140px;"> Company Name </div>

                                                        <div class="profile-info-value">
                                                            <span><?php echo $row_company['company_name']; ?></span>
                                                        </div>
                                                    </div>

                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name"> Website </div>

                                                        <div class="profile-info-value">
                                                            <span><?php echo $row_company['company_website']; ?></span>
                                                        </div>
                                                    </div>

                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name"> Mail </div>

                                                        <div class="profile-info-value">
                                                            <span><?php echo $row_company['company_website']; ?></span>
                                                        </div>
                                                    </div>

                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name" > Eligibility </div>

                                                        <div class="profile-info-value">
                                                            <span>above <?php echo $row['job_cgpa']; ?> cgpa</span>
                                                        </div>
                                                    </div>

                                                    <div class="profile-info-row ">
                                                        <div class="profile-info-name "  >Company's Presentation </div>

                                                        <div class="profile-info-value col-xs-6">
                                                            <a href="download?file=<?php echo $row['company_id'] ?>" name="presentation" class="btn btn-yellow bold" >Download Presentation</a>
                                                        </div>
                                                    </div>
                                                    <div id="download">


                                                    </div>

                                                </div>

                                            </div>



                                    </div>


                                                </td>

                                                </tr>


                            </tbody>
                        </table>





                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                            </div>
                        </div> 

                        



                            <div id="modal-form" class="modal" tabindex="-1">
                                <form action="view_jobs" method="post" enctype="multipart/form-data">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="blue bigger">Please fill the following form fields</h4>
                                            </div>

                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-12">



                                                        <input id="j_id" name="job_id"  type="hidden" >

                                                        <div class="space"></div>
                                                        <div class="row">
                                                            <div class="col-xs-8 col-sm-5">

                                                                <h5 class="red bolder smaller">Register No:</h5>
                                                                <div class="">
                                                                    <input type="text" name="tags" id="form-field-tags"  placeholder="Enter Register No ..." />
                                                                </div>
                                                                <div class="space-16"></div>

                                                                <button  type="submit" id="bootbox-search" name="update"  value="filter" class="btn btn-default btn-round btn-danger">
                                                                    Update
                                                                    <i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i>
                                                                </button>
                                                            </div>

                                                        </div>
                                                        <!--  <input type="file" name="placement_file" />-->
                                                    </div>


                                                </div>
                                            </div>







                                        </div>
                                    </div>
                                </form>
                            </div>

                    <?php

                            $i++;




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
<script src="../assets/js/wizard.min.js"></script>
<script src="../assets/js/jquery.validate.min.js"></script>
<script src="../assets/js/jquery-additional-methods.min.js"></script>
<script src="../assets/js/bootbox.js"></script>
<script src="../assets/js/jquery.maskedinput.min.js"></script>
<script src="../assets/js/select2.min.js"></script>
<script src="../assets/js/jquery-ui.custom.min.js"></script>
<script src="../assets/js/jquery.ui.touch-punch.min.js"></script>
<script src="../assets/js/chosen.jquery.min.js"></script>
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
        //initiate dataTables plugin





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


        $('#bootbox-search').click(function(event) {



            var blc = $('#form-field-tags').val();







            if (blc == '') {



                bootbox.dialog({
                    message: "Please enter the search value",
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
            else
            {

            }
        });




        $(".knob").knob();


        var tag_input = $('#form-field-tags');
        try{
            tag_input.tag(
                {
                    placeholder:tag_input.attr('placeholder'),
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
            <!-- $tag_obj.add('Programmatically Added');-->

            var index = $tag_obj.inValues('some tag');
            $tag_obj.remove(index);
        }
        catch(e) {
            //display a textarea for old IE, because it doesn't support this plugin or another one I tried!
            tag_input.after('<textarea id="'+tag_input.attr('id')+'" name="'+tag_input.attr('name')+'" rows="3">'+tag_input.val()+'</textarea>').remove();
            //autosize($('#form-field-tags'));
        }




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


    });
</script>
</body>
</html>