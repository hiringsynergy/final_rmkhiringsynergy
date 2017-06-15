
<?php
session_start();
ob_start();


if(isset($_GET['create']) && isset($_SESSION['user_role'])=='admin' ) {


$tablename=$_GET['tablename'];


    include "connect.php";



    $query="CREATE TABLE students_".$tablename."  (

    

    st_roll varchar(12) PRIMARY KEY,
  st_firstname varchar(255)  ,
  st_middlename varchar(255)  ,
  st_lastname varchar(255)  ,
  st_name varchar(255)  ,
  st_gender varchar(255)  ,
  st_fathername varchar(255)  ,
  st_fatheroccupation varchar(255)  ,

   st_fathernumber varchar(255)  ,

  st_mothername varchar(255)  ,
  st_motheroccupation varchar(255)  ,

   st_mothernumber varchar(255)  ,
   st_clgemail varchar(255),

  st_email varchar(255) NOT NULL,
  st_phone char(15) NOT NULL,
  st_dob date NOT NULL  ,
  st_nationality varchar(255)  ,
  st_caste varchar(255)  ,
  st_collegename varchar(255)  ,
  st_university varchar(255)  ,
  st_10thpercentage varchar(255)  ,
  st_10thinstitution varchar(255),
  st_10thboardofstudy varchar(255)  ,
  st_10thmedium varchar(255)  ,
  st_10thyearofpassing varchar(255)  ,
  st_12thpercentage varchar(255)  ,
  st_12thinstitution varchar(255),
  st_12thboardofstudy varchar(255)  ,
  st_12thmedium varchar(255)  ,
  st_12thyearofpassing varchar(255)  ,
  st_dippercentage varchar(255)  ,



  st_dipspecialization varchar(255)  ,
  st_dipinstitution varchar(255)  ,


  st_dipyearofpassing varchar(255)  ,
  st_currentlypursuing varchar(255)  ,
  st_ugdegree varchar(255)  ,
  st_ugspecialization varchar(255)  ,
  st_1stsem varchar(255)  ,
  st_2ndsem varchar(255)  ,
  st_3rdsem varchar(255)  ,
  st_4thsem varchar(255)  ,
  st_5thsem varchar(255)  ,
  st_6thsem varchar(255)  ,
  st_7thsem varchar(255)  ,
  st_8thsem varchar(255)  ,
  st_cgpa varchar(255)  ,
  st_ugyearofpassing varchar(255)  ,
  st_pgdegree varchar(255)  ,
  st_pgspecialization varchar(255)  ,
  st_pg1stsem varchar(255)  ,
  st_pg2ndsem varchar(255)  ,
  st_pg3rdsem varchar(255)  ,
  st_pg4thsem varchar(255)  ,
  st_pgcgpa varchar(255)  ,
  st_pgyearofpassing varchar(255)  ,
  st_ugcollegename varchar(255),

  st_ughistoryofarrears varchar(255),

  st_dayorhostel varchar(255)  ,
  st_historyofarrears varchar(255)  ,
  st_standingarrears varchar(255)  ,
  st_hometown varchar(255)  ,
  st_address1 varchar(255)  ,
  st_address2 varchar(255)  ,
  st_city varchar(255)  ,
  st_state varchar(255)  ,
  st_posatlcode varchar(255)  ,
  st_landline varchar(255)  ,
  st_skillcertification varchar(255)  ,
  st_duration varchar(255)  ,
  st_vendor varchar(255)  ,
  st_coecertification varchar(255)  ,
  st_gapinstudies varchar(255)  ,
  st_reason varchar(255)  ,
  st_english varchar(255)  ,
  st_quantitative varchar(255)  ,
  st_logical varchar(255)  ,
  st_overall varchar(255)  ,
  st_percentage varchar(255)  ,
  st_candidateid varchar(255)  ,
  st_signature varchar(255)  ,
  st_placementstatus varchar(255)  ,

  st_aadharno varchar(255),
  st_passportno varchar(255),
  st_panno varchar(255),

  
  st_pass varchar(255)  ,
  st_pic varchar(255),
  st_jobtype varchar(255),
  st_dorh varchar(255),
  st_changemail varchar(255),
  st_changephone varchar(255),
  st_forgotpassword varchar(255)
 
 
)ENGINE=MyISAM DEFAULT CHARSET=latin1";

    $query_alter="ALTER TABLE students_".$tablename."
    ENGINE=InnoDB
    ROW_FORMAT=COMPRESSED 
    KEY_BLOCK_SIZE=9000s";
    mysqli_query($connect, $query_alter);

$result=mysqli_query($connect,$query);


    if(!$result) {

        die(" " . mysqli_error($connect));


    }



    $table_name="students_".$tablename;
    $short_name=$tablename[2].$tablename[3];
    $short_name+=0;


    $query2="INSERT  INTO table_map VALUES ('$table_name','{$tablename}',$short_name)";
    $result2=mysqli_query($connect, $query2);




    header("Location: index");

}

if(isset($_GET['delete']) && isset($_SESSION['user_role'])=='admin' )

{

    $tab_name=$_GET['delete'];


    include "connect.php";

    $query_jobs="DELETE FROM jobs WHERE year_of_graduation={$tab_name}";
    $result_jobs=mysqli_query($connect, $query_jobs);



    $query="DROP TABLE students_".$tab_name." ";
    $result=mysqli_query($connect, $query);

    $query2="DELETE FROM table_map WHERE table_value=$tab_name";
    $result2=mysqli_query($connect, $query2);



    header("Location: index");


}



?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
        <title>RMK Campulse </title>
        <link rel="icon" href="../logos/rmklogo.JPG"  />

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

        <style>

            #shadow{

                width: auto;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

            }

        </style>





		<!-- page specific plugin styles -->

        <link rel="stylesheet" href="assets/css/jquery-ui.min.css" />
        <link rel="stylesheet" href="assets/css/jquery-ui.custom.min.css" />
        <link rel="stylesheet" href="assets/css/chosen.min.css" />
        <link rel="stylesheet" href="assets/css/bootstrap-datepicker3.min.css" />
        <link rel="stylesheet" href="assets/css/bootstrap-timepicker.min.css" />
        <link rel="stylesheet" href="assets/css/daterangepicker.min.css" />
        <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css" />
        <link rel="stylesheet" href="assets/css/bootstrap-colorpicker.min.css" />


        <link rel="stylesheet" href="assets/css/chosen.min.css" />

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



    if(! isset($_SESSION['user']) && $_SESSION['user']==null  && isset($_SESSION['user_role'])!='admin' )

    {

        header("Location: ../login");


    }

    ?>



		<div id="navbar" class="navbar navbar-default    ace-save-state" >
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

				<div class="navbar-buttons navbar-header pull-right  "  role="navigation">
					<ul class="nav ace-nav" style="">
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



	                      <li class="light-blue dropdown-modal " >

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


                                    <img class="nav-user-photo" src="images/<?php echo $row['admin_pic']; ?>" alt="Photo" />
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
						<a href="index">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard</span>
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

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-tag"></i>
							<span class="menu-text"> More Pages </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="../admin_login/search/advanced_search">
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

							<li class="">
								<a href="status">
									<i class="menu-icon fa fa-caret-right"></i>
									Status
								</a>

								<b class="arrow"></b>
							</li>
                            <li class="">
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
								<a href="../index">Home</a>
							</li>
							<li class="active">Dashboard</li>
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
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="alert alert-block alert-success">
									<button type="button" class="close" data-dismiss="alert">
										<i class="ace-icon fa fa-times"></i>
									</button>

									<i class="ace-icon fa fa-check green"></i>

									Welcome to
									<strong class="green">
										RMK Campulse

									</strong>,

									RMK Group of Institutions
								</div>
                                <div class="row">






                                    <div class="col-xs-5 pricing-box">
                                        <form action="index" method="get">


                                            <div class="widget-box widget-color-orange" id="shadow">
                                                <div class="widget-header">
                                                    <h5 class="widget-title bigger white">Create N ew Student Table</h5>
                                                </div>

                                                <div class="widget-body">
                                                    <div class="widget-main">
                                                        <ul class="list-unstyled spaced2">
                                                            <li class="red bigger-120">
                                                                <div class="form-group">
                                                                    <h5><label class="col-xs-12 control-label orange bolder" for="form-field-1">Year of Graduation</label></h5>
                                                                    <div class="col-xs-12 col-md-7">
                                                                        <input type="text" align="centre" name="tablename" id="create-textbox" placeholder="Year of Graduation" class="col-xs-10 " />

                                                                    </div>
                                                                </div>

                                                            </li>

                                                        </ul><hr/>
                                                    </div>


                                                    <div class="space-16"> </div>
                                                    <div class="space-16"></div>


                                                    <div>
                                                        <button type="submit" id="bootbox-create" name="create" class="btn btn-block btn-warning">
                                                            <span>Create</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-xs-1"></div>

                                    <div class="col-xs-5 pricing-box">
                                        <form action="crud/action_update">


                                        <div class="widget-box widget-color-blue" id="shadow">
                                            <div class="widget-header">
                                                <h5 class="widget-title bigger white">Update Student Table</h5>
                                            </div>

                                            <div class="widget-body">
                                                <div class="widget-main">
                                                    <ul class="list-unstyled spaced2">
                                                        <li class="red bigger-120">
                                                            <div class="form-group">
										<h5><label class="col-xs-12 control-label blue bolder" for="form-field-1">Year of Graduation</label></h5>
											<div class="col-xs-12 col-md-7">
												<select class="col-xs-7 chosen-select form-control" name="year"  id="update-textbox" data-placeholder="Select a Year...">
												<option value=""></option>
                                                    <?php

                                                    include "connect.php";
                                                    $query_insert="SELECT * FROM table_map";
                                                    $result_insert=mysqli_query($connect, $query_insert);
                                                    while ($row=mysqli_fetch_assoc($result_insert)){




                                                        ?>



                                                        <option value="<?php echo $row['table_name']  ?>"><?php echo $row['table_value'] ?></option>
                                                    <?php } ?>
															</select>

										</div>
									</div>

                                                        </li>

                                                    </ul><hr/>
                                                </div>


                                                <div class="space-16"> </div>
                                                <div class="space-16"></div>


                                                <div>
                                                    <button type="submit" id="bootbox-update" name="update" class="btn btn-block btn-primary">
                                                        <span>Update</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        </form>
                                    </div>

                                </div>

                                <div class="space-16"> </div>

				                <div class="row">

                                    <div class="col-xs-5 pricing-box">
                                        <form action="crud/action_insert" method="get">
                                        <div class="widget-box widget-color-green" id="shadow">
                                            <div class="widget-header">
                                                <h5 class="widget-title bigger white">Insert Into Student Table</h5>
                                            </div>

                                            <div class="widget-body">
                                                <div class="widget-main">
                                                    <ul class="list-unstyled spaced2">
                                                        <li class="red bigger-120">
                                                            <div class="form-group">
										<h5><label class="col-xs-12 control-label green bolder" for="form-field-1">Year of Graduation</label></h5>
											<div class="col-xs-12 col-md-7">
												<select class="col-xs-7 chosen-select form-control" name="insert_year" id="insert-textbox" data-placeholder="Select a Year...">
												<option value=""></option>

                                                    <?php

                                                    include "connect.php";
                                                    $query_insert="SELECT * FROM table_map";
                                                    $result_insert=mysqli_query($connect, $query_insert);
                                                    while ($row=mysqli_fetch_assoc($result_insert)){




                                                    ?>



                                                                <option value="<?php echo $row['table_value']  ?>"><?php echo $row['table_value'] ?></option>
                                                    <?php } ?>
															</select>

										</div>
									</div>

                                                        </li>

                                                    </ul><hr/>
                                                </div>
                                                <div class="space-16"> </div>
                                                <div class="space-16"></div>

                                                <div>
                                                    <button type="submit" id="bootbox-insert" name="insert" value="insert" class="btn btn-block btn-success">
                                                        <span>Insert</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                    <div class="col-xs-1"></div>
                                    <div class="col-xs-5 pricing-box">
                                        <div class="widget-box widget-color-red" id="shadow">
                                            <div class="widget-header">
                                                <h5 class="widget-title bigger white">Delete Student Table</h5>
                                            </div>
                                            <form action="index" method="get"  >

                                            <div class="widget-body">

                                                <div class="widget-main">

                                                    <ul class="list-unstyled spaced2">
                                                        <li class="red bigger-120">
                                                            <div class="form-group">
										<h5><label class="col-xs-12 control-label red bolder" for="form-field-1">Year of Graduation</label></h5>
											<div class="col-xs-12 col-md-7">
												<select class="col-xs-7 chosen-select form-control" name="delete" id="delete-textbox" data-placeholder="Select a Year...">
												<option value=""></option>
                                                    <?php

                                                    include "connect.php";
                                                    $query_insert="SELECT * FROM table_map";
                                                    $result_insert=mysqli_query($connect, $query_insert);
                                                    while ($row=mysqli_fetch_assoc($result_insert)){




                                                        ?>



                                                        <option value="<?php echo $row['table_value']  ?>"><?php echo $row['table_value'] ?></option>
                                                    <?php } ?>
															</select>

										</div>
									</div>

                                                        </li>

                                                    </ul><hr/>
                                                </div>


                                                <div class="space-16"> </div>
                                                <div class="space-16"></div>
                                                <div>


                                                    <a href="#" id="id-btn-dialog2" class="btn btn-block btn-danger">Delete</a>
<!--                                                    <button type="submit" href="index" id="bootbox-delete" name="delete" class="btn btn-block btn-danger">-->
<!--                                                        <span>Delete</span>-->
                                                    </button>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>


                                </div>


                                <div id="dialog-confirm" class="hide">
                                    <div class="alert alert-info bigger-110">
                                        These items will be permanently deleted and cannot be recovered.
                                    </div>

                                    <div class="space-6"></div>

                                    <p class="bigger-110 bolder center grey">
                                        <i class="ace-icon fa fa-hand-o-right blue bigger-120"></i>
                                        Are you sure?
                                    </p>
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
		<script src="assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

    <script src="assets/js/jquery-ui.custom.min.js"></script>
    <script src="assets/js/jquery.ui.touch-punch.min.js"></script>
    <script src="assets/js/chosen.jquery.min.js"></script>
    <script src="assets/js/spStatus.min.js"></script>
    <script src="assets/js/bootstrap-datepicker.min.js"></script>
    <script src="assets/js/bootstrap-timepicker.min.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/daterangepicker.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/js/bootstrap-colorpicker.min.js"></script>
    <script src="assets/js/jquery.knob.min.js"></script>
    <script src="assets/js/autosize.min.js"></script>
    <script src="assets/js/jquery.inputlimiter.min.js"></script>
    <script src="assets/js/jquery.maskedinput.min.js"></script>
    <script src="assets/js/bootstrap-tag.min.js"></script>
    <script src="assets/js/jquery-ui.custom.min.js"></script>
    <script src="assets/js/jquery.ui.touch-punch.min.js"></script>
    <script src="assets/js/markdown.min.js"></script>
    <script src="assets/js/bootstrap-markdown.min.js"></script>
    <script src="assets/js/jquery.hotkeys.index.min.js"></script>
    <script src="assets/js/bootstrap-wysiwyg.min.js"></script>
    <script src="assets/js/bootbox.js"></script>



    <!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->
    <script src="assets/js/wizard.min.js"></script>
    <script src="assets/js/jquery.validate.min.js"></script>
    <script src="assets/js/jquery-additional-methods.min.js"></script>
    <script src="assets/js/bootbox.js"></script>
    <script src="assets/js/jquery.maskedinput.min.js"></script>
    <script src="assets/js/select2.min.js"></script>

    <script src="assets/js/jquery-ui.min.js"></script>
    <script src="assets/js/jquery.ui.touch-punch.min.js"></script>

    <!-- page specific plugin styles -->


		<!--[if lte IE 8]>
		  <script src="assets/js/excanvas.min.js"></script>
		<![endif]-->
		<script src="assets/js/jquery-ui.custom.min.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="assets/js/jquery.easypiechart.min.js"></script>

		<script src="assets/js/chosen.jquery.min.js"></script>
		<script src="assets/js/jquery.sparkline.index.min.js"></script>
		<script src="assets/js/jquery.flot.min.js"></script>
		<script src="assets/js/jquery.flot.pie.min.js"></script>
		<script src="assets/js/jquery.flot.resize.min.js"></script>

		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
	<script type="text/javascript">
    	jQuery(function($) {







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

        $( "#id-btn-dialog2" ).on('click', function(e) {
            e.preventDefault();

            $( "#dialog-confirm" ).removeClass('hide').dialog({
                resizable: false,
                width: '320',
                modal: true,

                title_html: true,
                buttons: [
                    {
                        html: "<i class='ace-icon fa fa-trash-o bigger-110'></i>&nbsp; Delete the Table",
                        "class" : "btn btn-danger btn-minier",
                        click: function() {



                            var table=$('#delete-textbox :selected').text();
                            window.location.href="index?delete="+table;
                            $( this ).dialog( "close" );
                        }
                    }
                    ,
                    {
                        html: "<i class='ace-icon fa fa-times bigger-110'></i>&nbsp; Cancel",
                        "class" : "btn btn-minier",
                        click: function() {
                            $( this ).dialog( "close" );
                        }
                    }
                ]
            });
        });


                $('[data-rel=tooltip]').tooltip({container:'body'});
                    $('[data-rel=popover]').popover({container:'body'});

                    autosize($('textarea[class*=autosize]'))




            $('#bootbox-create').click(function(event){



                var bla = $('#create-textbox').val();
                <?php

                include "connect.php";
                $query1_insert="SELECT * FROM table_map";
                $result1_insert=mysqli_query($connect, $query1_insert);
                while ($row=mysqli_fetch_assoc($result1_insert)){




                ?>



                var temp=<?php echo $row['table_value'] ?>;
                if(bla==temp)
                {
                    bootbox.dialog({
                        message: "The year already exists",
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
                <?php } ?>
                else if(bla=='') {

                    bootbox.dialog({
                        message: "Please enter the year of graduation",
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
                    else  if(bla.length!=4) {

                    bootbox.dialog({
                        message: "Please enter the correct year of graduation",
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

                else  if(!($.isNumeric(bla))) {

                    bootbox.dialog({
                        message: "Years must be numerical",
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



            $('#bootbox-update').click(function(event){



                var blb = $('#update-textbox').val();
                if(blb=='')
                {

                    bootbox.dialog({
                        message: "Please select the year of graduation",
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
                else
                {


                }
            });


            $('#bootbox-insert').click(function(event){



                var blc = $('#insert-textbox').val();
                if(blc=='')
                {

                    bootbox.dialog({
                        message: "Please select the year of graduation",
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
                else
                {


                }
            });


            $('#bootbox-delete').click(function(event){



                var bld = $('#delete-textbox').val();
                if(bld=='')
                {

                    bootbox.dialog({
                        message: "Please select the year of graduation",
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
                else
                {




                }
            });









    });

</script>



	</body>
</html>
