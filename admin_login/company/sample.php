
<?php session_start();
ob_start();





if(! isset($_SESSION['user']) && $_SESSION['user']==null && isset($_SESSION['user_role'])!='admin' ){

    header("Location: ../../login.php");


}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>Student Interaction</title>

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
            location.href = "../reports.php";

        }
        function myfuncadmin() {
            location.href = "../admin_panel/admin_panel.php";

        }
        function myfuncjobs() {
            location.href = "../jobs/jobs_panel.php";

        }
        function myfuncsettings() {
            location.href = "../settings.php";

        }



    </script>








    <!-- page specific plugin styles -->
    <link rel="stylesheet" href="../assets/css/colorbox.min.css" />

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

    <script type="application/javascript">

        function showUser(str) {
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
                xmlhttp.open("GET","../company/getcompany.php?id="+str,true);
                xmlhttp.send();
            }
        }



    </script>
</head>

<body class="no-skin">



<?php

if(isset($_POST['update_submit'])) {


    $get_id= $_POST['company_id'];
    $get_name= $_POST['company_name'];
    $get_website= $_POST['company_website'];
    $get_description= $_POST['company_description'];


   include "../connect.php";

    $query = "UPDATE company_list SET company_name='{$get_name}', company_website='{$get_website}',company_description='{$get_description}' where company_id={$get_id}";

    $result = mysqli_query($connect, $query);

    if (!$connect) {

        die(" " . mysqli_error($connect));


    }

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
            <a href="../index.php" class="navbar-brand">
                <small>
                    <i class="fa fa-leaf"></i>
                    RMK Group of Institutions
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
                                                                <a href="../approve.php?roll=<?php  echo $row1['st_roll']; ?>">
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
                            <a href="../approve.php">
                                See all notifications
                                <i class="ace-icon fa fa-arrow-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>



                <li class="light-blue dropdown-modal">
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                        <img class="nav-user-photo" src="../assets/images/avatars/user.jpg" alt="Jason's Photo" />
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
                            <a href="profile.html">
                                <i class="ace-icon fa fa-user"></i>
                                Profile
                            </a>
                        </li>

                        <li class="divider"></li>

                        <li>
                            <a href="../../login_out/logout.php">
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
                <a href="../index.php">
                    <i class="menu-icon fa fa-tachometer"></i>
                    <span class="menu-text"> Student Interaction </span>
                </a>

                <b class="arrow"></b>
            </li>

            <li class="">
                <a href="../profile/profile.php" >
                    <i class="menu-icon fa fa-user"></i>
                    <span class="menu-text">
							Your Profile
							</span>


                </a>

                <b class="arrow"></b>


            </li>

            <li class="">
                <a href="../settings.php" >
                    <i class="menu-icon fa fa-list"></i>
                    <span class="menu-text"> Settings </span>


                </a>

                <b class="arrow"></b>


            </li>

            <li class="">
                <a href="../admin_panel/admin_panel.php" >
                    <i class="menu-icon fa fa-pencil-square-o"></i>
                    <span class="menu-text"> Admin Panel </span>


                </a>

                <b class="arrow"></b>


            </li>

            <li class="">
                <a href="../approve.php">
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
                        <a href="../jobs/view_jobs.php">
                            <i class="menu-icon fa fa-caret-right"></i>
                            View all Jobs
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a href="../jobs/post_jobs.php">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Post Job
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a href="../jobs/jobs_panel.php">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Jobs Panel
                        </a>

                        <b class="arrow"></b>
                    </li>

                </ul>

            </li>

            <li class="">
                <a href="../reports/reports.php">

                    <i class="menu-icon fa fa-bar-chart"></i>

                    <span class="menu-text"> Reports </span>
                </a>

                <b class="arrow"></b>
            </li>
            <li class="active open">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-laptop"></i>
                    <span class="menu-text"> Companies </span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu">
                    <li class="">
                        <a href="../company/create_company.php">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Create Company
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="active">
                        <a href="../company/companies.php">
                            <i class="menu-icon fa fa-caret-right"></i>
                            View Companies
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
                        <a href="../search/advanced_search.php">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Advanced Search
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a href="../Status.php">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Status
                        </a>

                        <b class="arrow"></b>
                    </li>


                    <li class="">
                        <a href="#">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Invoice
                        </a>

                        <b class="arrow"></b>
                    </li>


                    <li class="">
                        <a href="#">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Search Results
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
                        <a href="#">Home</a>
                    </li>
                    <li class="active">Sample</li>
                </ul><!-- /.breadcrumb -->

                <div class="nav-search" id="nav-search">
                    <form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
                    </form>
                </div><!-- /.nav-search -->
            </div>

            <div class="page-content">


                <div class="page-header">
                    <h1>
                        Student Interaction
                        <small>
                            <i class="ace-icon fa fa-angle-double-right"></i>
                            overview &amp; stats
                        </small>
                    </h1>
                </div><!-- /.page-header -->

                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->




                        <div class="row">

                            <div class="col-xs-6 ">
                                <ul class="ace-thumbnails clearfix">



                                    <li>
                                        <a href="../../logos/1482066285_asdfgasdfg.jpg" data-rel="colorbox">
                                            <img width="auto" height="150" alt="150x150" src="../../logos/1482066285_asdfgasdfg.jpg" />
                                            <div class="text">
                                                <div class="inner">Click here to View</div>
                                            </div>
                                        </a>

                                        <div class="tools tools-bottom">
                                            <a href="#">
                                                <i class="ace-icon fa fa-link"></i>
                                            </a>

                                            <a href="#">
                                                <i class="ace-icon fa fa-paperclip"></i>
                                            </a>

                                            <a href="#">
                                                <i class="ace-icon fa fa-pencil"></i>
                                            </a>

                                            <a href="#">
                                                <i class="ace-icon fa fa-times red"></i>
                                            </a>
                                        </div>
                                    </li>










                                </ul>
                            </div>





                            <div class="col-xs-6 col-xs-pull-3  widget-container-col blue" id="widget-container-col-1">

                                <div class="widget-box widget-color-blue" id="widget-box-1">
                                    <div class="widget-header">
                                        <h5 class="widget-title">Default Widget Box</h5>

                                        <div class="widget-toolbar">
                                            <div class="widget-menu">
                                                <a href="#" data-action="settings" data-toggle="dropdown">
                                                    <i class="ace-icon fa fa-bars"></i>
                                                </a>

                                                <ul class="dropdown-menu dropdown-menu-right dropdown-light-blue dropdown-caret dropdown-closer">
                                                    <li>
                                                        <a data-toggle="tab" href="#dropdown1">Option#1</a>
                                                    </li>

                                                    <li>
                                                        <a data-toggle="tab" href="#dropdown2">Option#2</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <a href="#" data-action="fullscreen" class="orange2">
                                                <i class="ace-icon fa fa-expand"></i>
                                            </a>

                                            <a href="#" data-action="reload">
                                                <i class="ace-icon fa fa-refresh"></i>
                                            </a>

                                            <a href="#" data-action="collapse">
                                                <i class="ace-icon fa fa-chevron-up"></i>
                                            </a>

                                            <a href="#" data-action="close">
                                                <i class="ace-icon fa fa-times"></i>
                                            </a>
                                        </div>

                                    </div>

                                    <div class="widget-body">
                                        <div class="widget-main">
                                            <p class="alert alert-info">
                                                Nunc aliquam enim ut arcu aliquet adipiscing. Fusce dignissim volutpat justo non consectetur. Nulla fringilla eleifend consectetur.
                                            </p>
                                            <p class="alert alert-success">
                                                Raw denim you probably haven't heard of them jean shorts Austin.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="space-10"></div>

                        <div class="row">


                            <div class="col-xs-12 widget-container-col blue" id="widget-container-col-1" >
                            <div class="widget-box widget-color-blue" id="widget-box-1">
                                <div class="widget-header">
                                    <h5 class="widget-title">Default Widget Box</h5>

                                    <div class="widget-toolbar">
                                        <div class="widget-menu">
                                            <a href="#" data-action="settings" data-toggle="dropdown">
                                                <i class="ace-icon fa fa-bars"></i>
                                            </a>

                                            <ul class="dropdown-menu dropdown-menu-right dropdown-light-blue dropdown-caret dropdown-closer">
                                                <li>
                                                    <a data-toggle="tab" href="#dropdown1">Option#1</a>
                                                </li>

                                                <li>
                                                    <a data-toggle="tab" href="#dropdown2">Option#2</a>
                                                </li>
                                            </ul>
                                        </div>

                                        <a href="#" data-action="fullscreen" class="orange2">
                                            <i class="ace-icon fa fa-expand"></i>
                                        </a>

                                        <a href="#" data-action="reload">
                                            <i class="ace-icon fa fa-refresh"></i>
                                        </a>

                                        <a href="#" data-action="collapse">
                                            <i class="ace-icon fa fa-chevron-up"></i>
                                        </a>

                                        <a href="#" data-action="close">
                                            <i class="ace-icon fa fa-times"></i>
                                        </a>
                                    </div>

                                </div>

                                <div class="widget-body">
                                    <div class="widget-main">
                                        <p class="alert alert-info">
                                            Nunc aliquam enim ut arcu aliquet adipiscing. Fusce dignissim volutpat justo non consectetur. Nulla fringilla eleifend consectetur.
                                        </p>
                                        <p class="alert alert-success">
                                            Raw denim you probably haven't heard of them jean shorts Austin.
                                        </p>
                                        <p class="alert alert-info">
                                            Nunc aliquam enim ut arcu aliquet adipiscing. Fusce dignissim volutpat justo non consectetur. Nulla fringilla eleifend consectetur.
                                        </p>
                                        <p class="alert alert-success">
                                            Raw denim you probably haven't heard of them jean shorts Austin.
                                        </p>
                                    </div>
                                </div>


                            </div>
                        </div>
                        </div>









                    </div>
                </div>



                             <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div>
    <!-- /.main-content -->

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
<!-- /.main-container -->

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
<script src="../assets/js/jquery.colorbox.min.js"></script>



<script src="../../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="../../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="../../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="../../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="../../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="../../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="../../vendors/datatables.net-scroller/js/datatables.scroller.min.js"></script>
<script src="../../vendors/jszip/dist/jszip.min.js"></script>
<script src="../../vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="../../vendors/pdfmake/build/vfs_fonts.js"></script>

















<!-- ace scripts -->
<script src="../assets/js/ace-elements.min.js"></script>
<script src="../assets/js/ace.min.js"></script>

<!-- inline scripts related to this page -->
<script type="text/javascript">

    jQuery(function($) {
        var $overflow = '';
        var colorbox_params = {
            rel: 'colorbox',
            reposition:true,
            scalePhotos:true,
            scrolling:false,
            previous:'<i class="ace-icon fa fa-arrow-left"></i>',
            next:'<i class="ace-icon fa fa-arrow-right"></i>',
            close:'&times;',
            current:'{current} of {total}',
            maxWidth:'100%',
            maxHeight:'100%',
            onOpen:function(){
                $overflow = document.body.style.overflow;
                document.body.style.overflow = 'hidden';
            },
            onClosed:function(){
                document.body.style.overflow = $overflow;
            },
            onComplete:function(){
                $.colorbox.resize();
            }
        };

        $('.ace-thumbnails [data-rel="colorbox"]').colorbox(colorbox_params);
        $("#cboxLoadingGraphic").html("<i class='ace-icon fa fa-spinner orange fa-spin'></i>");//let's add a custom loading icon


        $(document).one('ajaxloadstart.page', function(e) {
            $('#colorbox, #cboxOverlay').remove();
        });
    });







</script>

</body>
</html>