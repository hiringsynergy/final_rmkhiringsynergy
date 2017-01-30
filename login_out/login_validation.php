<?php

ob_start();
session_start();


if(isset($_POST['login'])){

//value initialization
    $connect=null;
    $student_branch=null;
    $student_table=null;
    $admin_database=null;
    $coordinator_branch=null;
    $student_year=null;
    $student_roll=null;
    $admin_name="initialize";
    $admin_password="initialize";
    $student_name="initialize";
    $student_password="initialize";
    $coordinator_name="initialize";
    $coordinator_password="initialize";



    $username=$_POST['username'];
    $password=$_POST['password'];

    $connect_database=mysqli_connect("localhost","root","","login_database");



    //selecting admin database  and coordinator database........
    $query_selection="SELECT * FROM admin_login WHERE username='{$username}'";
    $result_selection=mysqli_query($connect_database, $query_selection);
    if(!$result_selection==null){
        $row_selection=mysqli_fetch_assoc($result_selection);

        if(!$row_selection==null) {

            $admin_database = $row_selection['database_name'];


            $connect = mysqli_connect("localhost", "root", "", "$admin_database");

        }
    }



    //selecting student database.........
    $student_user=$username[0].$username[1].$username[2].$username[3];
    if($student_user=='1115'){

        $database_session_set='rmd_database';
        $connect=mysqli_connect("localhost","root","","rmd_database");


    }
    else if($student_user=='1116'){

        $database_session_set='rmkcet_database';
        $connect=mysqli_connect("localhost","root","","rmkcet_database");

    }
    else if($student_user=='1117'){

        $database_session_set='rmk_database';
        $connect=mysqli_connect("localhost","root","","rmk_database");

    }




    // admin login

    $query_admin="SELECT * FROM login_admin WHERE username='{$username}'";
    $result_admin=mysqli_query($connect, $query_admin);
    if(!$result_admin==null){
        $row_admin=mysqli_fetch_assoc($result_admin);
        $admin_name=$row_admin['username'];
        $admin_password=$row_admin['password'];
    }


    //coordinator login

    $query_coordinator="SELECT * FROM login_coordinator WHERE username='{$username}'";
    $result_coordinator=mysqli_query($connect, $query_coordinator);
    if(!$result_coordinator==null){
        $row_coordinator=mysqli_fetch_assoc($result_coordinator);
        $coordinator_name=$row_coordinator['username'];
        $coordinator_password=$row_coordinator['password'];
        $coordinator_branch=$row_coordinator['cood_branch'];
    }





    //student login

    $isstudent=$username[4].$username[5];
    $isstudent+=4;

    $query_short="SELECT * FROM table_map WHERE table_short='{$isstudent}'";
    $result_short=mysqli_query($connect, $query_short);


    if(!$result_short==null){

        $row_short=mysqli_fetch_assoc($result_short);
        $student_table=$row_short['table_name'];
        $student_year=$row_short['table_value'];
        $query_student="SELECT * FROM $student_table WHERE st_roll='{$username}'";
        $result_student=mysqli_query($connect, $query_student);


        if(!$result_student==null){
            $row_student=mysqli_fetch_assoc($result_student);

            $student_roll=$row_student['st_roll'];
            $student_name=$row_student['st_name'];
            $student_password=$row_student['st_pass'];
            $student_branch=$row_student['st_ugspecialization'];


        }




    }















    //admin validation
    if($admin_name==$username ){



        $_SESSION['database_name']=$admin_database;
        $_SESSION['user_role']='admin';

        $_SESSION['user']=$username;

        header("Location: ../admin_login/index.php");
    }




    //coordinator validation

    else if($coordinator_name == $username && password_verify($password, $coordinator_password)){



        $_SESSION['database_name']=$admin_database;

        $_SESSION['user_role']='coordinator';
        $_SESSION['user']=$username;
        $_SESSION['cood_branch']=$coordinator_branch;



        header("Location: ../coordinator_login/index.php");
    }




    //student validation


    else if($student_roll == $username && password_verify($password, $student_password)){






        $_SESSION['user_role']='student';

        $_SESSION['user'] = $username;

        $_SESSION['student_name']=$student_name;
        $_SESSION['student_year']=$student_year;

        $_SESSION['student_roll']=$student_roll;
        $_SESSION['student_branch']=$student_branch;
        $_SESSION['table_name']=$student_table;
        $_SESSION['database_name']=$database_session_set;

        $graduation=explode('_',$student_table);

        $_SESSION['year_of_graduation']= end($graduation);


        header("Location: ../student_login/index.php");

    }




    else{

        header("Location: ../login.php");

    }





}

else if(isset($_POST['proceed'])){


    $proceed_username=$_POST['username'];
    $is_user_valid=false;
    $connect=null;


    $connect_database=mysqli_connect("localhost","root","","login_database");

    //selecting admin database  and coordinator database........
    $query_selection="SELECT * FROM admin_login WHERE username='{$proceed_username}'";
    $result_selection=mysqli_query($connect_database, $query_selection);
    if(!$result_selection==null){





        $row_selection=mysqli_fetch_assoc($result_selection);
        if(!$row_selection==null) {

            echo "The user is admin or coordinator";
            $is_user_valid=true;

            $admin_database = $row_selection['database_name'];


            $connect = mysqli_connect("localhost", "root", "", "$admin_database");
        }

    }



    //selecting student database.........
    $student_user=$proceed_username[0].$proceed_username[1].$proceed_username[2].$proceed_username[3];

    if($student_user=='1115'){

        $database_session_set='rmd_database';
        $connect=mysqli_connect("localhost","root","","rmd_database");


    }
    else if($student_user=='1116'){

        $database_session_set='rmkcet_database';
        $connect=mysqli_connect("localhost","root","","rmkcet_database");

    }
    else if($student_user=='1117'){

        $database_session_set='rmk_database';
        $connect=mysqli_connect("localhost","root","","rmk_database");

    }





    //student login

    $isstudent=$proceed_username[4].$proceed_username[5];
    $isstudent+=4;

    $query_short="SELECT * FROM table_map WHERE table_short='{$isstudent}'";
    if($connect!=null) {
        $result_short = mysqli_query($connect, $query_short);


        if (!$result_short == null) {

            $row_short = mysqli_fetch_assoc($result_short);
            $student_table = $row_short['table_name'];

            $string='hithisisakash';
            $hash= password_hash($string, PASSWORD_BCRYPT);
            $hash=mysqli_real_escape_string($connect_database, $hash);


            $query_student = "UPDATE $student_table SET st_forgotpassword='$hash' WHERE st_roll='{$proceed_username}'";
            $result_student = mysqli_query($connect, $query_student);


            if (!$result_student == null) {

                $query_student_select="SELECT * FROM $student_table WHERE st_roll='{$proceed_username}'";
                $result_student_select=mysqli_query($connect, $query_student_select);
                if(!$result_student_select==null){

                    $row_student_select=mysqli_fetch_assoc($result_student_select);



                     $to = $row_student_select['st_email'];
                     $user_mail=$row_student_select['st_roll'];


                   require "../admin_login/email/PHPMailer/PHPMailerAutoload.php";

                    $mail=new PHPMailer();

                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                    $mail->SMTPAuth = true;                               // Enable SMTP authentication
                    $mail->Username = 'dhoni.singh1703@gmail.com';                 // SMTP username
                    $mail->Password = 'akash170397';                           // SMTP password
                    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
                    $mail->Port = 465;


                    $mail->setFrom('dhoni.singh1703@gmail.com', 'RMD Placements');
                    $mail->addAddress($to, $to);     // Add a recipient

                    $mail->addReplyTo('dhoni.singh1703@gmail.com', 'Reply');


                    

                    $mail->isHTML(true);

                    $mail->Subject = "test mail";
                    $mail->Body    = 'http://localhost/new_rmkhiringsynergy/recover.php?id='.$user_mail."&hash=".$hash;



                    if(!$mail->send()) {

                        echo "error in sending mail";
                    }
                    else{




                        $_SESSION['reset']=1;
                        header("Location: ../login.php ");

                        echo "Successfully sent";



                    }















                    echo "The user is student";
                    $is_user_valid = true;



                }




            }


        }

    }




    if($is_user_valid==false){

        header("Location: ../reset.php");


    }



















}
else{


    header("Location: ../login.php");



}



?>

