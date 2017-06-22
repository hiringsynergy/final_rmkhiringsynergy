
<?php

    session_start();
    ob_start();

    if(! isset($_SESSION['user']) && $_SESSION['user']==null && isset($_SESSION['user_role'])!='student'){

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
        function myfuncprofile() {
            location.href = "../profile/profile";

        }
        function myfuncjobs() {
            location.href = "../jobs/view_jobs";

        }
        function myfuncsettings() {
            location.href = "../settings";

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
                xmlhttp.open("GET","../company/getcompany?id="+str,true);
                xmlhttp.send();
            }
        }



    </script>
</head>

<body class="no-skin">



<?php

if(isset($_POST['update_submit']) && isset($_SESSION['user_role'])=='student') {


    $get_id= $_POST['company_id'];
    $get_name= $_POST['company_name'];
    $get_website= $_POST['company_website'];
    $get_description= $_POST['company_description'];

    include "../connect.php";
    //$connect = mysqli_connect("mysql.hostinger.com","u552198179_root","rmkhiringsynergy", "u552198179_rmd");

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

        <div class="navbar-header pull-left" ">
        <a href="company_details" class="navbar-brand">
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
                                        <a href="../jobs/view_jobs?job_id=<?php echo $row_notification['job_id'] ;?>">
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
                            <a href="../jobs/view_jobs">
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
                        //$connect=mysqli_connect("mysql.hostinger.com","u552198179_root","rmkhiringsynergy","u552198179_rmd");
                        $name=$_SESSION['user'];

                        $student_table=$_SESSION['table_name'];
                        $query="select * from $student_table where st_roll='{$name}'";

                        $result=mysqli_query($connect,$query);

                        if(!$result){


                            mysqli_error($connect);
                        }

                        while($row=mysqli_fetch_assoc($result)){



                            ?>


                            <img class="nav-user-photo" src="../images/<?php echo $row['st_pic']; ?>" alt="No Photo" />

                            <span class="user-info">
                                    <small>Welcome,</small>
                                <?php echo $row['st_name']; ?>
                                </span>
                        <?php } ?>

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
                <a href="../jobs/view_jobs">
                    <i class="menu-icon fa fa-briefcase"></i>
                    <span class="menu-text"> Jobs</span>


                </a>

                <b class="arrow"></b>


            </li>


            <li class="active">
                <a href="companies">

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
                        <a href="#">Home</a>
                    </li>
                    <li class="active">Company Details</li>
                </ul><!-- /.breadcrumb -->

                
            </div>

            <div class="page-content">


  <!--              <div class="page-header">
                    <h1>
                        Company Details

                    </h1>
                </div><!-- /.page-header -->
                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->

                        <?php
                        if(isset($_GET['cid']) && isset($_SESSION['user_role'])=='student'){

                            include "../connect.php";

                            $company_id=$_GET['cid'];

                            $query_company="SELECT * FROM company_list WHERE company_id='$company_id'";
                            $result_company=mysqli_query($connect, $query_company);
                            $row_company=mysqli_fetch_assoc($result_company);








                            ?>

                            <div class="row">
                                <div class="col-xs-9 col-sm-9">
                                    <h1 class="black bolder thinner bigger-180"><?php echo $row_company['company_name'] ?></h1>

                                    <div class="space-10"></div>
                                    <div class="space-10"></div><br/>


                                    <p class="dark bigger-130"><?php echo $row_company['company_description'] ?>
                                    </p><br/><br/><br/><br/><br/><br/>

                                    <div class="col-xs-8 col-sm-8"> <h5 class="red  bolder"><b>MAIL : </b><a href="#">Not Mentioned</a></h5></div>

                                    <h5 class=" red bolder">Website : <a href="http://<?php echo $row_company['company_website'] ?>"><?php echo $row_company['company_website'] ?></a></h5>
                                </div>
                                <div class="col-xs-3 col-sm-3 ">
                                    <div class="padding-right" ></div>

                                    <ul class="ace-thumbnails clearfix">



                                        <li>

                                            <a class="" href="../../logos/<?php echo $row_company['company_logo'] ?>" data-rel="colorbox">
                                                <img style="max-height: 150px; max-width: 150px;" alt="150x150" src="../../logos/<?php echo $row_company['company_logo'] ?>" />
                                                <div class="text">
                                                    <div class="inner">Click here to View</div>
                                                </div>
                                            </a>
                                            <div class="tools tools-bottom">

                                                <a href="#">
                                                    <i class="ace-icon fa fa-pencil"></i>
                                                </a>


                                            </div>

                                        </li>
                                    </ul>
                                </div>
                            </div>
                        <?php } ?>
                    </div>


                    <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
                </div><!-- /.row -->

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