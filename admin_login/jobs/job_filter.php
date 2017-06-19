<?php  session_start();
ob_start();

if (!isset($_SESSION['user']) && $_SESSION['user'] == null && isset($_SESSION['user_role'])!='admin' ) {

    header("Location: ../../login");


}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>RMK Campulse</title>
    <link rel="icon" href="../logos/rmklogo.JPG"  />
    <meta name="description" content="overview &amp; stats" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/font-awesome/4.5.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../assets/css/jquery-ui.min.css" />
    <link rel="stylesheet" href="../assets/css/jquery-ui.custom.min.css" />


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


    <!--button-navigation-->
    <script type="text/javascript">
        function myfuncreport() {
            location.href = "../reports";

        }




var mouseDown = false

$("#rangevalue").mousedown(function() {
    mouseDown = true;
    updateSlider()
});

$("#rangevalue").mouseup(function() {
    mouseDown = false;
});

function updateSlider(){
    if(mouseDown){
        $("#text").text($("#rangevalue").val());
        setTimeout(updateSlider, 50);
    }
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
    <script src="../assets/js/jquery-1.11.3.min.js"></script>
    <script src="../assets/js/jquery.mobile.custom.min.js"></script>

    <![endif]-->
</head>

<body class="no-skin" >


<?php



if(isset($_GET['filter_job'])){



        $pg_branch='';
        $pgcgpa='';

    include "../connect.php";


     //initialize
    $check_1="initialize";
    $check_2="initialize";
    $check_3="initialize";

    $id=time();
    $job_title=$_GET['job_title'];

    $company_id=$_GET['company_id'];
    $venue=$_GET['venue'];
    $salary=$_GET['salary'];
    $campus_date=$_GET['campus_date'];
    $apply_before=$_GET['apply_before'];
    $year_of_graduation=$_GET['year_of_graduation'];
    $joining_location=$_GET['joining_location'];
    $job_description=$_GET['job_description'];
    $job_type=$_GET['job_type'];
    $skill_set=$_GET['skill_set'];
    $sort=strtotime($apply_before);
    $cgpa=$_GET['ugcgpa'];
    $_10percentage=$_GET['10percentage'];
    $_12percentage=$_GET['12percentage'];
    $standingarrears=$_GET['standingarrears'];
    $historyofarrears=$_GET['historyofarrears'];
    $lateral=$_GET['lateral'];
    $gender=$_GET['gender'];
    $gapinstudy=$_GET['gapinstudy'];


    $get_branch= $_GET['ugbranch'];

    $has_job=$_GET['hasjob'];

    if(isset($_GET['pgbranch']) && isset($_GET['pgcgpa']))
    {
    $pg_branch=$_GET['pgbranch'];
    $pgcgpa=$_GET['pgcgpa'];

    }


    if(isset($_GET['dontselect1'])){

        $check_1=$_GET['dontselect1'];
    }
    if(isset($_GET['dontselect2'])){

        $check_2=$_GET['dontselect2'];
    }
    if(isset($_GET['dontselect3'])){

        $check_3=$_GET['dontselect3'];
    }



    if($campus_date==''){

        $campus_date="To be announced later";

    }



    if($check_1=='on'){
        $check_1='Core';

    }

    if($check_2=='on'){
        $check_2='Product';

    }

    if($check_3=='on'){
        $check_3='Service';

    }








    //ug branch

    if(current($get_branch)=="all"){


             if(preg_match('/rmd/', $database)){


              $temp_branch_insert="cse'',''it'',''eee'',''ece'',''eie";
               $temp_branch_update="cse','it','eee','ece','eie";
              }

            if(preg_match('/rmk/', $database)){


               $temp_branch_insert="cse'',''it'',''eee'',''ece'',''eie'',''mech'',''civil";
                $temp_branch_update="cse','it','eee','ece','eie','mech','civil";

           }

        if(preg_match('/cet/', $database)) {


               $temp_branch_insert="cse'',''eee'',''ece'',''eie'',''mech";
                 $temp_branch_update="cse','eee','ece','eie','mech";

               }


    }

    else {
        $temp_branch_insert=implode("'',''",$get_branch);
        $temp_branch_update=implode("','",$get_branch);
    }


    //pg branch

    if(current($pg_branch)=="all"){


        if(preg_match('/rmd/', $database)){


            $temp_pg_branch_insert="cse'',''it'',''eee'',''ece'',''eie";
            $temp_pg_branch_update="cse','it','eee','ece','eie";
        }

        if(preg_match('/rmk/', $database)){


            $temp_pg_branch_insert="cse'',''ae'',''pde'',''vlsi";
            $temp_pg_branch_update="cse','ae','pde','vlsi";

        }

        if(preg_match('/cet/', $database)) {


            $temp_pg_branch_insert="cse'',''eee'',''ece'',''eie";
            $temp_pg_branch_update="cse','eee','ece','eie";

        }


    }

    else {

        $temp_pg_branch_insert=implode("'',''",$pg_branch);
        $temp_pg_branch_update=implode("','",$pg_branch);
    }














    $query2="SELECT * FROM company_list where company_id='$company_id'";
        $get_company_name=mysqli_query($connect, $query2);
        $company_name=mysqli_fetch_assoc($get_company_name);
        $company_name_string=$company_name['company_name'];

 echo "query for insert";
        $query="INSERT INTO jobs VALUES ('$id','$job_title', '{$company_name['company_name']}','$campus_date','$salary','$venue','$apply_before','$year_of_graduation','$joining_location','$job_description','$job_type','$skill_set', '$sort' , '$temp_branch_insert','$temp_pg_branch_insert','$pgcgpa' , '$_10percentage','$_12percentage','$cgpa','$standingarrears','$historyofarrears','$company_id','1')";



        $result=mysqli_query($connect, $query);


        if(!$result){

            die("".mysqli_error($connect));


        }

    echo "query for insert passed hurray";

        //Alter students table

        $query_for_tablemap="SELECT * FROM table_map WHERE table_value={$year_of_graduation}";
        $result_for_tablemap=mysqli_query($connect,$query_for_tablemap);
        $row_for_tablemap=mysqli_fetch_assoc($result_for_tablemap);

        $students_table_name=$row_for_tablemap['table_name'];




        $query_for_alter='ALTER TABLE '.$students_table_name.' ADD _'.$id.'  VARCHAR(255) NOT NULL DEFAULT \'not eligible\'';
        $result_for_alter=mysqli_query($connect, $query_for_alter);




//create new column for count placed

        $query_alter="ALTER TABLE ".$students_table_name." ADD job_count VARCHAR(255)";
        $result_alter=mysqli_query($connect,$query_alter);



//query for get students roll no

        $query_get_student="Select * from ".$students_table_name."";
        $result_get_student=mysqli_query($connect,$query_get_student);
        while($row_get_student=mysqli_fetch_assoc($result_get_student)){

            $roll_no=$row_get_student['st_roll'];


            //count no.jobs placed

    $query_count="select * from ".$students_table_name." where st_roll='$roll_no'";
    $ne_count=mysqli_query($connect,$query_count);
    $row_job_type=mysqli_fetch_assoc($ne_count);
    $new_count=$row_job_type['st_jobtype'];


            if($new_count==''){

                $count_comma=0;
            }
            else {

                $count_comma = substr_count($new_count, ',');



            }








    //update count value in column


    $query_column="UPDATE ".$students_table_name." SET  job_count='$count_comma' WHERE st_roll='$roll_no'";
    $result_column=mysqli_query($connect,$query_column);










        }






        echo "1232";

        //update table
    $str='';

    if($historyofarrears!='na'){

        $str.=' and st_historyofarrears<='.$historyofarrears;




    }
    if($standingarrears!='na'){

        $str.=' and st_standingarrears<='.$standingarrears;


    }
    if($has_job!='na'){

        $str.=' and job_count<='.$has_job;

    }

    if($gapinstudy!='na'){


        $str.=' and st_gapinstudies<='.$gapinstudy;






    }






    //job for ug update
       echo $query_for_update="UPDATE $students_table_name SET _".$id."='appliable' WHERE st_ugspecialization IN ('$temp_branch_update')  and st_cgpa>=$cgpa and st_10thpercentage>= $_10percentage and st_12thpercentage>=$_12percentage $str and st_gender in ('$gender') and st_jobtype NOT LIKE '%".$check_1."%' and st_jobtype NOT LIKE '%".$check_2."%' and st_jobtype NOT LIKE '%".$check_3."%'  and st_dorh='h'" ;
        $result_for_update=mysqli_query($connect, $query_for_update);
    $query_for_update1="UPDATE $students_table_name SET _".$id."='appliable' WHERE st_ugspecialization IN ('$temp_branch_update')  and st_cgpa>=$cgpa and st_10thpercentage>= $_10percentage $str and st_gender in ('$gender') and st_dippercentage>=$lateral and st_jobtype NOT LIKE '%".$check_1."%' and st_jobtype NOT LIKE '%".$check_2."%' and st_jobtype NOT LIKE '%".$check_3."%'  and st_dorh='d'";
    $result_for_update1=mysqli_query($connect, $query_for_update1);
    $query_for_update2="UPDATE $students_table_name SET _".$id."='appliable' WHERE st_ugspecialization IN ('$temp_branch_update')  and st_cgpa>=$cgpa and st_10thpercentage>= $_10percentage $str and st_gender in ('$gender') and st_12thpercentage>=$_12percentage and st_dippercentage>=$lateral and st_jobtype NOT LIKE '%".$check_1."%' and st_jobtype NOT LIKE '%".$check_2."%' and st_jobtype NOT LIKE '%".$check_3."%'  and st_dorh='dh'";
    $result_for_update2=mysqli_query($connect, $query_for_update2);

        //job for pg update
         $query_for_pg_update="UPDATE $students_table_name SET _".$id."='appliable' WHERE  st_pgspecialization IN ('$temp_pg_branch_update') and st_pgcgpa>=$pgcgpa  and st_10thpercentage>= $_10percentage and st_12thpercentage>=$_12percentage and st_standingarrears<=$standingarrears and st_historyofarrears<=$historyofarrears and job_count<=$has_job and st_jobtype NOT LIKE '%".$check_1."%' and st_jobtype NOT LIKE '%".$check_2."%' and st_jobtype NOT LIKE '%".$check_3."%' ";
         $result_for_pg_update=mysqli_query($connect, $query_for_pg_update);





        //drop column

         $query_alter="ALTER TABLE ".$students_table_name." DROP job_count";
        $result_alter=mysqli_query($connect,$query_alter);




/*

        set_time_limit(0);

        //send mail to recipients
        $query_mail="SELECT * FROM   $students_table_name WHERE _".$id."='eligible'";
        $result_mail=mysqli_query($connect,$query_mail);
        while($row_mail=mysqli_fetch_assoc($result_mail)){


             $to=$row_mail['st_email'];

            $subject= "Eligible for ".$company_name_string;

            $message='<h4> You are Eligiblie for '.$company_name_string.' Please check RMKhiringSynergy to apply for the job   </h4>';

            $headers="From: RMD Placements<karthickakash17@gmail.com>\r\n";
            $headers.="Reply-To: karthickakash17@gmail.com\r\n";
            $headers.="Content-type: text/html\r\n";

            mail($to,$subject,$message,$headers);




        }

*/






        echo "success";

    if(!$result_for_tablemap){

        die("1".mysqli_error($connect));


    }
    if(!$result_for_alter){

        die("2".mysqli_error($connect));


    }
    if(!$result_for_update){


        die("3".mysqli_error($connect));


    }



        echo "547567";

        header("Location: filter_result?jid=$id");






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
            <a href="../index" class="navbar-brand">
                <small>
                    <i class=""></i>
                    <img src="../../logos/rmklogo.JPG" style="height: 25px;">
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
                                                                <a href="../approve?roll=<?php  echo $row1['st_roll']; ?>">
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

                <ul class="submenu ">
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
                    <li class="active">Post Job</li>
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



                <form class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->
                        <form action="job_filter" method="get" >

                            <?php







                            $job_title=$_GET['job_title'];
                            $company_id=$_GET['company_id'];
                            $venue=$_GET['venue'];
                            $salary=$_GET['salary'];
                            $campus_date=$_GET['campus_date'];
                            $apply_before=$_GET['apply_before'];
                            $year_of_graduation=$_GET['year_of_graduation'];
                            $joining_location=$_GET['joining_location'];
                            $job_description=$_GET['job_description'];
                            $job_type=$_GET['job_type'];
                            $skill_set=$_GET['skill_set'];
                            $sort=strtotime($apply_before);




                            ?>



                            <input type="hidden" name="job_title"  value="<?php echo $job_title ?>">
                            <input type="hidden" name="year_of_graduation" value="<?php echo $year_of_graduation ?>">
                            <input type="hidden" name="company_id" value="<?php echo $company_id ?>">
                            <input type="hidden" name="venue" value="<?php echo $venue ?>">
                            <input type="hidden" name="joining_location" value="<?php echo $joining_location ?>">
                            <input type="hidden" name="job_description" value="<?php echo $job_description?>">
                            <input type="hidden" name="campus_date" value="<?php echo $campus_date ?>">
                            <input type="hidden" name="apply_before" value="<?php echo $apply_before ?>">
                            <input type="hidden" name="salary" value="<?php echo $salary ?>">
                            <input type="hidden" name="job_type" value="<?php echo $job_type ?>">
                            <input type="hidden" name="skill_set" value="<?php echo $skill_set ?>">







                            <div class="row">





                            </div>
                            <div class="row">
                                <div class="col-xs-12">

                                    <div class="widget-box widget-color-orange" id="widget-box-2">
                                        <div class="widget-header widget-header-small">
                                            <h6 class="widget-title">
                                                UG Candidates
                                            </h6>
                                        </div>
                                        <div class="widget-body">
                                            <div class="widget-main">
                                                <div id="fuelux-wizard-container">

                                                    <div class="step-content pos-rel">


                                                        <div class="row">

                                                            <div class="col-xs-8 col-sm-5 ">

                                                                <h5><label class="control-label bolder orange"for="form-field-select-4">Select Branch</label></h5>


                                                                 <div >
                                                            <?php

                                                                $database = $_SESSION['database_name'];


                                                                if (preg_match('/rmd/',$database)) {
                                                              ?>

                                                               <select multiple="" name="ugbranch[]" class="chosen-select  form-control dept" id="tag1" data-placeholder="Choose a Branch...">
                                                                    <option value="all">All</option>
                                                                    <option value="cse">Computer science and Engineering</option>
                                                                    <option value="eee">Electrical and Electronic Engineering</option>
                                                                    <option value="eie">Electrical and Intrumentation Engineering</option>

                                                                    <option value="it">Information Technology</option>
                                                                    <option value="ece">Electrical and Communicaton Engineering</option>
                                                                </select>
                                                            


                                                                <?php
                                                                }
                                                              else  if (preg_match('/rmk/',$database)) {
                                                                ?>

                                                            <select multiple="" name="ugbranch[]" class="chosen-select  form-control dept" id="tag2" data-placeholder="Choose a Branch...">
                                                                <option value="all">All</option>
                                                                <option value="cse">Computer science and Engineering</option>
                                                                <option value="eee">Electrical and Electronic Engineering</option>
                                                                <option value="eie">Electrical and Intrumentation Engineering</option>

                                                                <option value="it">Information Technology</option>
                                                                <option value="ece">Electrical and Communicaton Engineering</option>
                                                                <option value="mech">Mechanical Engineering</option>
                                                                <option value="civil">Civil Engineering</option>
                                                            </select>
                                                      


                                                        <?php
                                                        }
                                                        else if (preg_match('/cet/',$database)) {
                                                        ?>

                                                         <select multiple="" name="ugbranch[]" class="chosen-select  form-control dept" id="tag3" data-placeholder="Choose a Branch...">
                                                            <option value="all">All</option>
                                                            <option value="cse">Computer science and Engineering</option>
                                                            <option value="eee">Electrical and Electronic Engineering</option>
                                                            <option value="mech">Mechanical Engineering</option>
                                                            <option value="ece">Electrical and Communicaton Engineering</option>
						            <option value="it">Information Technology</option>
                                                        </select>
                                                    


                                                    <?php
                                                    }
                                                        ?>
                                                        </div>













                                                            </div>
                                                            <div class="col-xs-6 col-xs-push-1">

                                                        <h5 class="orange bolder smaller"> Don't Select Placed Students From</h5>
                                                        <div class="space-10"></div>
                                                                     <fieldset data-role="controlgroup" class="col-xs-push-3">
                                                                    <input type="checkbox" name="dontselect1" class="c0l=sm-3"  id="checkbox-1a">
                                                                    <label for="checkbox-1a">Core</label>

                                                                    <input type="checkbox" name="dontselect2"  id="checkbox-2a">
                                                                    <label for="checkbox-2a">Dream</label>
                                                                    <input type="checkbox" name="dontselect3"  id="checkbox-3a">
                                                                    <label for="checkbox-3a">Soft</label>
                                                                  </fieldset>
                                                    </div>


                                                        </div>
                                                                


                                                        

                                                        <div class="row">

                                                            <div class="col-xs-8 col-sm-6">



                                                                <h5 class="orange bolder smaller">CGPA</h5>
                                                                <input type="text"  name="ugcgpa" value="0" id="slide-text1" class="col-xs-1">
                                                                <div id="slider-eq1" class="col-xs-12 col-md-10 col-sm-8">
                                                                    <span class="ui-slider-orange">0</span>
                                                                </div>
                                                            </div>

                                                            <div class="col-xs-8 col-sm-3 ">
                                                        <h5><label class="control-label bolder orange" for="form-field-select-3">Number of companies placed </label></h5>
                                                         

                                                        <select class="chosen-select"  name="hasjob"  id="form-field-select-3" data-placeholder="Please Select...">
                                                                <option value="na">Please Select</option>
                                                                <option value="0">0</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                            </select>
                                                        </div>
                                                        
                                                        </div>
                                                        <div class="row">

                                                            <div class="col-xs-8 col-sm-6">




                                                                <h5 class="orange bolder smaller">Salary(Lakhs Per Annum)</h5>
                                                                <input type="text"  name="Salary" value="0" id="slide-text7" class="col-xs-1 col-sm-1 col">
                                                                <div id="slider-eq7" class="col-xs-12 col-md-10 col-sm-8">
                                                                    <span class="ui-slider-orange">0</span>
                                                                </div>


                                                            </div>
                                                            <div class="col-xs-8 col-sm-3 ">
                                                                <div class="radio">
                                                                <br/>
                                                                    <br/>
                                                                    <label>
                                                                        <input name="form-field-radio" type="radio" name="above" class="ace" />
                                                                        <span class="lbl">Above</span>
                                                                    </label>
                                                                    <label>
                                                                        <input name="form-field-radio" type="radio" name="below" class="ace" />
                                                                        <span class="lbl">Below</span>
                                                                    </label>
                                                                </div>
                                                            </div>


                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">

                                    <div class="widget-box widget-color-blue" id="widget-box-2">
                                        <div class="widget-header widget-header-small">
                                            <h6 class="widget-title">
                                                UG Semester wise CGPA
                                            </h6>
                                        </div>
                                        <div class="widget-body">
                                            <div class="widget-main">
                                                <div id="fuelux-wizard-container">

                                                    <div class="step-content pos-rel">


                                                        <div class="row">
                                                            <div class="col-xs-8 col-sm-5">
                                                                <h5><label class="control-label bolder blue"for="form-field-select-2 slider-fill-mini">Select 10th Percentage</label></h5>
                                                                <input type="text" name="10percentage"  value="0" id="slide-text3" class="col-xs-1">
                                                                <div id="slider-eq3" class="col-xs-12 col-md-10 col-sm-8">
                                                                    <span class="ui-slider-blue">0</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-8 col-sm-5">
                                                                <h5><label class="control-label bolder blue"for="form-field-select-2 slider-fill-mini">Select 12th Percentage</label></h5>
                                                                <input type="text" name="12percentage"  value="0" id="slide-text2" class="col-xs-1">
                                                                <div id="slider-eq2" class="col-xs-12 col-md-10 col-sm-8">
                                                                    <span class="ui-slider-blue">0</span>
                                                                </div>
                                                            </div>
<!--                                                            <div class="col-xs-8 col-sm-5">-->
<!--                                                                <h5><label class="control-label bolder blue"for="form-field-select-2 slider-fill-mini">Select 10th Percentage</label></h5>-->
<!--                                                                <input type="text" name="10percentage"  value="0" id="slide-text3" class="col-xs-1">-->
<!--                                                                <div id="slider-eq3" class="col-xs-12 col-md-10 col-sm-8">-->
<!--                                                                    <span class="ui-slider-blue">0</span>-->
<!--                                                                </div>-->
<!--                                                            </div>-->

                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xs-8 col-sm-5">
                                                                <h5><label class="control-label bolder blue" for="form-field-select-3">Standing Arrears</label></h5>

                                                                <select class="chosen-select form-control" name="standingarrears" id="form-field-select-3" data-placeholder="Please Select...">
                                                                    <option value="na">Please Select</option>
                                                                    <option value="0">0</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                    <option value="7">7</option>
                                                                    <option value="8">8</option>
                                                                    <option value="9">9</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-xs-8 col-sm-5">
                                                                <h5><label class="control-label bolder blue" for="form-field-select-3">History of Arrears</label></h5>
                                                               
                                                                 <select class="chosen-select form-control" name="historyofarrears" id="form-field-select-3" data-placeholder="Please Select...">
                                                                    <option value="na">Please Select</option>
                                                                     <option value="0">0</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                    <option value="7">7</option>
                                                                    <option value="8">8</option>
                                                                    <option value="9">9</option>
                                                                </select>








                                                            </div>

                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xs-8 col-sm-5">
                                                                <h5><label class="control-label bolder blue" for="form-field-select-3">Lateral Entry(Optional)</label></h5>
                                                                <input type="text" name="lateral"  value="0" id="slide-text4" class="col-xs-1">
                                                                <div id="slider-eq4" class="col-xs-12 col-md-10 col-sm-8">
                                                                    <span class="ui-slider-blue">0</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-8 col-sm-5">
                                                                <h5><label class="control-label bolder blue" for="form-field-select-3">Gender</label></h5>

                                                                <select class="chosen-select form-control" name="gender" id="form-field-select-3" data-placeholder="Please Select...">
                                                                    <option value="male','female">All</option>
                                                                    <option value="male">Male</option>
                                                                    <option value="female">Female</option>
                                                                </select>
                                                            </div>

                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xs-8 col-sm-5">
                                                                <h5><label class="control-label bolder blue" for="form-field-select-3">Gap in Study</label></h5>

                                                                <select class="chosen-select form-control" name="gapinstudy" id="form-field-select-3" data-placeholder="Please Select...">
                                                                    <option value="na">Please Select</option>
                                                                    <option value="0">0</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                    <option value="7">7</option>
                                                                    <option value="8">8</option>
                                                                    <option value="9">9</option>
                                                                    <option value="10">10</option>

                                                                </select>
                                                            </div>

                                                        </div>






                                                    </div>




                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12">

                                <div class="widget-box widget-color-green" id="widget-box-2">
                                                <div class="widget-header widget-header-small">
                                                    <h6 class="widget-title">
                                                        PG Candidates
                                                    </h6>
                                                </div>
                                    <div class="widget-body">
                                        <div class="widget-main">
                                            <div id="fuelux-wizard-container">

                                                <div class="step-content pos-rel">


                                                    <div class="row">

                                                        <div class="col-xs-8 col-sm-5">

                                                            <h5><label class="control-label bolder orange"for="form-field-select-4">Select Branch</label></h5>

                                                 




                                                            <div >
                                                            <?php

                                                                $database = $_SESSION['database_name'];


                                                                if (preg_match('/rmd/',$database)) {
                                                              ?>

                                                               <select multiple="" name="nobranch[]" class="chosen-select  form-control pgdept" id="form-field-select-5" data-placeholder="Choose a Branch...">


                                                                    <option value="0">No PG Branches Available</option>
                                                                   
                                                                </select>
                                                            


                                                                <?php
                                                                }
                                                              else  if (preg_match('/rmk/',$database)) {
                                                                ?>

                                                           <select multiple="" name="pgbranch[]" class="chosen-select  form-control pgdept pgdept" id="form-field-select-5" data-placeholder="Choose a Branch...">
                                                                <option value="all">All</option>
                                                                <option value="cse">Computer science and Engineering</option>
                                                                <option value="ae">Applied Electronics</option>
                                                                <option value="ped">Power Electronics and Drives</option>

                                                                <option value="vlsi">VLSI Design</option>
                                                               
                                                            </select>
                                                      


                                                        <?php
                                                        }
                                                        else if (preg_match('/cet/',$database)) {
                                                        ?>

                                                         <select multiple="" name="nobranch" class="chosen-select  form-control pgdept" id="form-field-select-5" data-placeholder="Choose a Branch...">
                                                            <option value="0">No PG Branches Available</option>
                                                            </select>
                                                    


                                                    <?php
                                                    }
                                                        ?>
                                                        </div>




























                                                        </div>

                                                    </div>
                                                    <div class="space-16"></div>
                                                <div class="row">
                                                <div class="col-xs-12 col-sm-5">

                                                        <h5 class="green bolder smaller">CGPA</h5>
                                                                                    <input type="text" name="pgcgpa" value="0" id="slide-text6" class="col-xs-1">
                                                                                    <div id="slider-eq6" class="col-xs-12 col-md-10 col-sm-8">
                                                                                            <span class="ui-slider-green">0</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                            <div class="space-16"></div>
                            <div class="center ">
                                <button name="filter_job" id="bootbox-confirm" type="submit" class="btn btn-lg btn-success">
                                    <i class="ace-icon fa fa-check"></i>
                                    Filter
                                </button>

                            </div>


                        </form>


                    </div>






                    <!-- PAGE CONTENT ENDS -->
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


        $('[data-rel=tooltip]').tooltip({container:'body'});
        $('[data-rel=popover]').popover({container:'body'});

        autosize($('textarea[class*=autosize]'));

        $('textarea.limited').inputlimiter({
            remText: '%n character%s remaining...',
            limitText: 'max allowed : %n.'
        });

        $.mask.definitions['~']='[+-]';
        $('.input-mask-date').mask('99/99/9999');
        $('.input-mask-phone').mask('(999) 999-9999');
        $('.input-mask-eyescript').mask('~9.99 ~9.99 999');
        $(".input-mask-product").mask("a*-999-a999",{placeholder:" ",completed:function(){alert("You typed the following: "+this.val());}});



        $( "#input-size-slider" ).css('width','200px').slider({
            value:1,
            range: "min",
            min: 1,
            max: 8,
            step: 1,
            slide: function( event, ui ) {
                var sizing = ['', 'input-sm', 'input-lg', 'input-mini', 'input-small', 'input-medium', 'input-large', 'input-xlarge', 'input-xxlarge'];
                var val = parseInt(ui.value);
                $('#form-field-4').attr('class', sizing[val]).attr('placeholder', '.'+sizing[val]);
            }
        });

        $( "#input-span-slider" ).slider({
            value:1,
            range: "min",
            min: 1,
            max: 12,
            step: 1,
            slide: function( event, ui ) {
                var val = parseInt(ui.value);
                $('#form-field-5').attr('class', 'col-xs-'+val).val('.col-xs-'+val);
            }
        });



        //"jQuery UI Slider"
        //range slider tooltip example
        $( "#slider-range" ).css('height','200px').slider({
            orientation: "vertical",
            range: true,
            min: 0,
            max: 100,
            values: [ 17, 67 ],
            slide: function( event, ui ) {
                var val = ui.values[$(ui.handle).index()-1] + "";

                if( !ui.handle.firstChild ) {
                    $("<div class='tooltip right in' style='display:none;left:16px;top:-6px;'><div class='tooltip-arrow'></div><div class='tooltip-inner'></div></div>")
                        .prependTo(ui.handle);
                }
                $(ui.handle.firstChild).show().children().eq(1).text(val);
            }
        }).find('span.ui-slider-handle').on('blur', function(){
            $(this.firstChild).hide();
        });


        $( "#slider-range-max" ).slider({
            range: "max",
            min: 1,
            max: 10,
            value: 2
        });

        $( "#slider-eq1 > span" ).css({width:'90%', 'float':'left', margin:'15px 0px'}).each(function() {
            // read initial values from markup and remove that
            var value = parseInt( $( this ).text(), 10 );
            $( this ).empty().slider({
                value: value,
                range: "min",
                min:0,
                max:10,
                step:0.1,

                animate: true,
                slide: function(event,ui){
                    $('#slide-text1').val(ui.value);
                }

            });
        });

        $('#form-field-select-4').addClass('tag-input-style');
        $('#form-field-select-5').addClass('tag-input-style');
        $( "#slider-eq2 > span" ).css({width:'90%', 'float':'left', margin:'15px 0px'}).each(function() {
            // read initial values from markup and remove that
            var value = parseInt( $( this ).text(), 10 );
            $( this ).empty().slider({
                value: value,
                range: "min",
                min:0,
                max:100,
                step:1,

                animate: true,
                slide: function(event,ui){
                    $('#slide-text2').val(ui.value);
                }

            });
        });

        $( "#slider-eq3 > span" ).css({width:'90%', 'float':'left', margin:'15px 0px'}).each(function() {
            // read initial values from markup and remove that
            var value = parseInt( $( this ).text(), 10 );
            $( this ).empty().slider({
                value: value,
                range: "min",
                min:0,
                max:100,
                step:1,

                animate: true,
                slide: function(event,ui){
                    $('#slide-text3').val(ui.value);
                }

            });
        });

        $( "#slider-eq4 > span" ).css({width:'90%', 'float':'left', margin:'15px 0px'}).each(function() {
            // read initial values from markup and remove that
            var value = parseInt( $( this ).text(), 10 );
            $( this ).empty().slider({
                value: value,
                range: "min",
                min:0,
                max:100,
                step:1,

                animate: true,
                slide: function(event,ui){
                    $('#slide-text4').val(ui.value);
                }

            });
        });

        $( "#slider-eq5 > span" ).css({width:'90%', 'float':'left', margin:'15px 0px'}).each(function() {
            // read initial values from markup and remove that
            var value = parseInt( $( this ).text(), 10 );
            $( this ).empty().slider({
                value: value,
                range: "min",
                min:0,
                max:60,
                step:1,

                animate: true,
                slide: function(event,ui){
                    $('#slide-text5').val(ui.value);
                }

            });
        });

        $( "#slider-eq6 > span" ).css({width:'90%', 'float':'left', margin:'15px 0px'}).each(function() {
            // read initial values from markup and remove that
            var value = parseInt( $( this ).text(), 10 );
            $( this ).empty().slider({
                value: value,
                range: "min",
                min:0,
                max:10,
                step:0.1,

                animate: true,
                slide: function(event,ui){
                    $('#slide-text6').val(ui.value);
                }

            });
        });

        $( "#slider-eq7 > span" ).css({width:'90%', 'float':'left', margin:'15px 0px'}).each(function() {
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
                    $('#slide-text7').val(ui.value);
                }

            });
        });

        //$("#slider-eq > span.ui-slider-purple").slider('disable');//disable third item


        $('#id-input-file-1 , #id-input-file-2').ace_file_input({
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
            preview_error : function(filename, error_code) {
                //name of the file that failed
                //error_code values
                //1 = 'FILE_LOAD_FAILED',
                //2 = 'IMAGE_LOAD_FAILED',
                //3 = 'THUMBNAIL_FAILED'
                //alert(error_code);
            }

        }).on('change', function(){
            //console.log($(this).data('ace_input_files'));
            //console.log($(this).data('ace_input_method'));
        });


        //$('#id-input-file-3')
        //.ace_file_input('show_file_list', [
        //{type: 'image', name: 'name of image', path: 'http://path/to/image/for/preview'},
        //{type: 'file', name: 'hello.txt'}
        //]);




        //dynamically change allowed formats by changing allowExt && allowMime function
        $('#id-file-format').removeAttr('checked').on('change', function() {
            var whitelist_ext, whitelist_mime;
            var btn_choose
            var no_icon
            if(this.checked) {
                btn_choose = "Drop images here or click to choose";
                no_icon = "ace-icon fa fa-picture-o";

                whitelist_ext = ["jpeg", "jpg", "png", "gif" , "bmp"];
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
                .on('file.error.ace', function(e, info) {
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

        $('#spinner1').ace_spinner({value:0,min:0,max:200,step:10, btn_up_class:'btn-info' , btn_down_class:'btn-info'})
            .closest('.ace-spinner')
            .on('changed.fu.spStatus', function(){
                //console.log($('#spinner1').val())
            });
        $('#spinner2').ace_spinner({value:0,min:0,max:10000,step:100, touch_spinner: true, icon_up:'ace-icon fa fa-caret-up bigger-110', icon_down:'ace-icon fa fa-caret-down bigger-110'});
        $('#spinner3').ace_spinner({value:0,min:-100,max:100,step:10, on_sides: true, icon_up:'ace-icon fa fa-plus bigger-110', icon_down:'ace-icon fa fa-minus bigger-110', btn_up_class:'btn-success' , btn_down_class:'btn-danger'});
        $('#spinner4').ace_spinner({value:0,min:-100,max:100,step:10, on_sides: true, icon_up:'ace-icon fa fa-plus', icon_down:'ace-icon fa fa-minus', btn_up_class:'btn-purple' , btn_down_class:'btn-purple'});

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
            .next().on(ace.click_event, function(){
            $(this).prev().focus();
        });

        //or change it into a date range picker
        $('.input-daterange').datepicker({autoclose:true});


        //to translate the daterange picker, please copy the "examples/daterange-fr.js" contents here before initialization
        $('input[name=date-range-picker]').daterangepicker({
            'applyClass' : 'btn-sm btn-success',
            'cancelClass' : 'btn-sm btn-default',
            locale: {
                applyLabel: 'Apply',
                cancelLabel: 'Cancel',
            }
        })
            .prev().on(ace.click_event, function(){
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
        }).on('focus', function() {
            $('#timepicker1').timepicker('showWidget');
        }).next().on(ace.click_event, function(){
            $(this).prev().focus();
        });




        if(!ace.vars['old_ie']) $('#date-timepicker1').datetimepicker({
            //format: 'MM/DD/YYYY h:mm:ss A',//use this option to display seconds
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
        }).next().on(ace.click_event, function(){
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
            $tag_obj.add('Programmatically Added');

            var index = $tag_obj.inValues('some tag');
            $tag_obj.remove(index);
        }
        catch(e) {
            //display a textarea for old IE, because it doesn't support this plugin or another one I tried!
            tag_input.after('<textarea id="'+tag_input.attr('id')+'" name="'+tag_input.attr('name')+'" rows="3">'+tag_input.val()+'</textarea>').remove();
            //autosize($('#form-field-tags'));
        }


        /////////
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
         //or you can activate the chosen plugin after modal is shown
         //this way select element becomes visible with dimensions and chosen works as expected
         $('#modal-form').on('shown', function () {
					$(this).find('.modal-chosen').chosen();
				})
         */



        $(document).one('ajaxloadstart.page', function(e) {
            autosize.destroy('textarea[class*=autosize]')

            $('.limiterBox,.autosizejs').remove();
            $('.daterangepicker.dropdown-menu,.colorpicker.dropdown-menu,.bootstrap-datetimepicker-widget.dropdown-menu').remove();
        });

        $('#bootbox-confirm').click(function(event){
            var bla = $('.dept').val();
            var bla1 = $('.pgdept').val();
//            var blb = $('#tag2').val();
//            var hidden_input =
//                $('<input type="hidden" name="description" />')
//                    .appendTo('#validate-form');
//
//            var blc = $('#editor1').val();
//            // var blc=hidden_input.val( html_content );



            if(bla==null && bla1==null)
            {

                bootbox.dialog({
                    message: "Please select the department",
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


        });

    });
</script>
</body>
</html>
