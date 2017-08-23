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
        
        
        echo $username." ".$password;
        
        
        $connect_database=mysqli_connect("mysql.hostinger.com","u625007899_root3","rmkhiringsynergy","u625007899_login");
        
        
        
        //selecting admin database  and coordinator database........
        $query_selection="SELECT * FROM admin_login WHERE username='{$username}'";
        $result_selection=mysqli_query($connect_database, $query_selection);
        if(!$result_selection==null){
            $row_selection=mysqli_fetch_assoc($result_selection);
            
            if(!$row_selection==null) {
                
                $admin_database = $row_selection['database_name'];
                
                
                if(preg_match('/rmd/', $admin_database)){
                    
                    $connect=mysqli_connect("mysql.hostinger.com","u625007899_root","rmkhiringsynergy","$admin_database");
                }
                if(preg_match('/rmk/', $admin_database)){
                    
                    $connect=mysqli_connect("mysql.hostinger.com","u625007899_root1","rmkhiringsynergy","$admin_database");
                }
                
                if(preg_match('/cet/', $admin_database)){
                    
                    $connect=mysqli_connect("mysql.hostinger.com","u625007899_root2","rmkhiringsynergy","$admin_database");
                }
                
            }
        }
        
        
        
        //selecting student database.........
        $student_user=$username[0].$username[1].$username[2].$username[3];
        if($student_user=='1115'){
            
            $database_session_set='u625007899_rmd';
            $connect=mysqli_connect("mysql.hostinger.com","u625007899_root","rmkhiringsynergy","u625007899_rmd");
            
            
        }
        else if($student_user=='1116'){
            
            $database_session_set='u625007899_cet';
            $connect=mysqli_connect("mysql.hostinger.com","u625007899_root2","rmkhiringsynergy","u625007899_cet");
            
        }
        else if($student_user=='1117'){
            
            $database_session_set='u625007899_rmk';
            $connect=mysqli_connect("mysql.hostinger.com","u625007899_root1","rmkhiringsynergy","u625007899_rmk");
            
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
            $cood_deg=$row_coordinator['cood_deg'];
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
        if($admin_name==$username && password_verify($password, $admin_password)){
            
            
            
            $_SESSION['database_name']=$admin_database;
            $_SESSION['user_role']='admin';
            
            $_SESSION['user']=$username;
            
            header("Location: ../admin_login/index");
        }
        
        
        
        
        //coordinator validation
        
        else if($coordinator_name == $username && password_verify($password, $coordinator_password)){
            
            
            
            $_SESSION['database_name']=$admin_database;
            $_SESSION['cood_deg']=$cood_deg;
            
            $_SESSION['user_role']='coordinator';
            $_SESSION['user']=$username;
            $_SESSION['cood_branch']=$coordinator_branch;
            
            
            
            header("Location: ../coordinator_login/index");
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
            
            
            header("Location: ../student_login/index");
            
        }
        
        
        
        
        else{
            
            //header("Location: ../login");
            
        }
        
        
        
        
        
    }
    
    else if(isset($_POST['proceed'])){
        
        
        $proceed_username=$_POST['username'];
        $is_user_valid=false;
        $connect=null;
        
        
        $connect_database=mysqli_connect("mysql.hostinger.com","u625007899_root3","rmkhiringsynergy","u625007899_login");
        
        //selecting admin database  and coordinator database........
        $query_selection="SELECT * FROM admin_login WHERE username='{$proceed_username}'";
        $result_selection=mysqli_query($connect_database, $query_selection);
        if(!$result_selection==null){
            
            
            
            
            
            $row_selection=mysqli_fetch_assoc($result_selection);
            if(!$row_selection==null) {
                
                
                
                $is_user_valid=true;
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                $admin_database = $row_selection['database_name'];
                
                echo $admin_database;
                
                
                if(preg_match('/rmd/', $admin_database)){
                    
                    $connect=mysqli_connect("mysql.hostinger.com","u625007899_root","rmkhiringsynergy","$admin_database");
                }
                if(preg_match('/rmk/', $admin_database)){
                    
                    $connect=mysqli_connect("mysql.hostinger.com","u625007899_root1","rmkhiringsynergy","$admin_database");
                }
                
                if(preg_match('/cet/', $admin_database)){
                    
                    $connect=mysqli_connect("mysql.hostinger.com","u625007899_root2","rmkhiringsynergy","$admin_database");
                }
                
                
                
                
                
                if(substr_count($proceed_username, 'placements')==1){
                    
                    
                    
                    
                    
                    
                    
                    
                    echo "  admin";
                    
                    
                    $string='hithisisakash';
                    $hash= password_hash($string, PASSWORD_BCRYPT);
                    $hash=mysqli_real_escape_string($connect_database, $hash);
                    
                    
                    echo $hash;
                    echo " username: ".$proceed_username;
                    $query_student = "UPDATE login_admin SET admin_forgotpassword='$hash' WHERE username='$proceed_username'";
                    $result_student = mysqli_query($connect, $query_student);
                    
                    
                    if (!$result_student == null) {
                        
                        $query_student_select="SELECT * FROM login_admin WHERE username='{$proceed_username}'";
                        
                        
                        $result_student_select=mysqli_query($connect, $query_student_select);
                        if(!$result_student_select==null){
                            
                            $row_student_select=mysqli_fetch_assoc($result_student_select);
                            
                            
                            
                            $to = $row_student_select['admin_emailid'];
                            $user_mail=$row_student_select['username'];
                            
                            
                            
                            require "../admin_login/email/PHPMailer/PHPMailerAutoload.php";
                            
                            
                            
                            $mail->SMTPDebug = 3;
                            
                            
                            $mail=new PHPMailer();
                            
                            $mail->isSMTP();
                            $mail->Host = 'mx1.hostinger.com';  // Specify main and backup SMTP servers
                            $mail->SMTPAuth = true;
                            
                            
                            
                            $mail->Username = 'recovery@rmkcampulse.com';                 // SMTP username
                            $mail->Password = 'RMKEC123';                           // SMTP password
                            $mail->SMTPSecure='tls';                            // Enable TLS encryption, `ssl` also accepted
                            $mail->Port = 	587;
                            
                            
                            $mail->setFrom('recovery@rmkcampulse.com', 'RMK Group of Institutions');
                            
                            
                            $mail->addReplyTo('recovery@rmkcampulse.com', 'Reply');
                            
                            
                            $mail->addAddress($to, $to);     // Add a recipient
                            
                            
                            
                            
                            
                            
                            $mail->isHTML(true);
                            
                            $mail->Subject = "Password Recovery";
                            $mail->Body    = 'https://www.rmkcampulse.com/recover?id='.$user_mail."&hash=".$hash;
                            
                            
                            
                            if(!$mail->send()) {
                                
                                
                                
                                $_SESSION['user_valid']=1;
                                // echo "send";
                                
                                die("mail not sent");
                                
                               // header("Location: ../reset");
                                
                                
                                
                            }
                            else{
                                
                                
                                
                                
                                $_SESSION['reset']=1;
                               // header("Location: ../login ");
                                
                                echo "Successfully sent";
                                
                                
                                
                            }
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            echo "The user is admin";
                            $is_user_valid = true;
                            
                            
                            
                        }
                        
                        
                        
                        
                    }
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                }
                
                else{
                    
                    
                    
                    
                    
                    
                    
                    echo "coordinator";
                    
                    
                    
                    $string='hithisisakash';
                    $hash= password_hash($string, PASSWORD_BCRYPT);
                    $hash=mysqli_real_escape_string($connect_database, $hash);
                    
                    
                    echo $hash;
                    echo " username: ".$proceed_username;
                    $query_student = "UPDATE login_coordinator SET cood_forgotpassword='$hash' WHERE username='$proceed_username'";
                    $result_student = mysqli_query($connect, $query_student);
                    
                    
                    if (!$result_student == null) {
                        
                        $query_student_select="SELECT * FROM login_coordinator WHERE username='{$proceed_username}'";
                        
                        
                        $result_student_select=mysqli_query($connect, $query_student_select);
                        if(!$result_student_select==null){
                            
                            $row_student_select=mysqli_fetch_assoc($result_student_select);
                            
                            
                            
                            $to = $row_student_select['cood_emailid'];
                            $user_mail=$row_student_select['username'];
                            
                            
                            
                            require "../admin_login/email/PHPMailer/PHPMailerAutoload.php";
                            
                            
                            
                            $mail->SMTPDebug = 3;
                            
                            
                            $mail=new PHPMailer();
                            
                            $mail->isSMTP();
                            $mail->Host = 'mx1.hostinger.com';  // Specify main and backup SMTP servers
                            $mail->SMTPAuth = true;
                            
                            
                            
                            $mail->Username = 'recovery@rmkcampulse.com';                 // SMTP username
                            $mail->Password = 'RMKEC123';                           // SMTP password
                            $mail->SMTPSecure='tls';                            // Enable TLS encryption, `ssl` also accepted
                            $mail->Port = 	587;
                            
                            
                            $mail->setFrom('recovery@rmkcampulse.com', 'RMK Group of Institutions');
                            
                            
                            $mail->addReplyTo('recovery@rmkcampulse.com', 'Reply');
                            
                            
                            $mail->addAddress($to, $to);     // Add a recipient
                            
                            
                            
                            
                            
                            
                            $mail->isHTML(true);
                            
                            $mail->Subject = "Password Recovery";
                            $mail->Body    = 'https://www.rmkcampulse.com/recover?id='.$user_mail."&hash=".$hash;
                            
                            
                            if(!$mail->send()) {
                                
                                
                                
                                $_SESSION['user_valid']=1;
                                 echo "not send 0";
                                
                                die("mail not sent");
                                
                               // header("Location: ../reset");
                                
                                
                                
                            }
                            else{
                                
                                
                                
                                
                                $_SESSION['reset']=1;
                               // header("Location: ../login ");
                                
                                echo "Successfully sent";
                                
                                
                                
                            }
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            echo "The user is coordinator";
                            $is_user_valid = true;
                            
                            
                            
                        }
                        
                        
                        
                        
                    }
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                }
                
                
                
                
                
                
                
                
                
                
                
            }
            
        }
        
        
        
        //selecting student database.........
        $student_user=$proceed_username[0].$proceed_username[1].$proceed_username[2].$proceed_username[3];
        
        if($student_user=='1115'){
            
            $database_session_set='rmd';
            $connect=mysqli_connect("mysql.hostinger.com","u625007899_root","rmkhiringsynergy","u625007899_rmd");
            
            
        }
        else if($student_user=='1116'){
            
            $database_session_set='cet';
            $connect=mysqli_connect("mysql.hostinger.com","u625007899_root2","rmkhiringsynergy","u625007899_cet");
            
        }
        else if($student_user=='1117'){
            
            $database_session_set='rmk';
            $connect=mysqli_connect("mysql.hostinger.com","u625007899_root1","rmkhiringsynergy","u625007899_rmk");
            
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
                        
                        
                        
                        $to = $row_student_select['st_clgemail'];
                        $user_mail=$row_student_select['st_roll'];
                        
                        
                        require "../admin_login/email/PHPMailer/PHPMailerAutoload.php";
                        
                        
                        
                        $mail->SMTPDebug = 3;
                        
                        
                        $mail=new PHPMailer();
                        
                        $mail->isSMTP();
                        $mail->Host = 'mx1.hostinger.com';  // Specify main and backup SMTP servers
                        $mail->SMTPAuth = true;
                        
                        
                        
                        $mail->Username = 'recovery@rmkcampulse.com';                 // SMTP username
                        $mail->Password = 'RMKEC123';                           // SMTP password
                        $mail->SMTPSecure='tls';                            // Enable TLS encryption, `ssl` also accepted
                        $mail->Port = 	587;
                        
                        
                        $mail->setFrom('recovery@rmkcampulse.com', 'RMK Group of Institutions');
                        
                        
                        $mail->addReplyTo('recovery@rmkcampulse.com', 'Reply');
                        
                        
                        $mail->addAddress($to, $to);     // Add a recipient
                        
                        
                        
                        
                        
                        
                        $mail->isHTML(true);
                        
                        $mail->Subject = "Password Recovery";
                        $mail->Body    = 'https://www.rmkcampulse.com/recover?id='.$user_mail."&hash=".$hash;
                        
                        if(!$mail->send()) {
                            
                            
                            
                            $_SESSION['user_valid']=1;
                            echo "not send";
                            
                           // header("Location: ../reset");
                            
                            
                            
                        }
                        else{
                            
                            
                            
                            
                            $_SESSION['reset']=1;
                           // header("Location: ../login");
                            
                            echo "Successfully sent";
                            
                            
                            
                        }
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        echo "The user is student";
                        $is_user_valid = true;
                        
                        
                        
                    }
                    
                    
                    
                    
                }
                
                
            }
            
        }
        
        
        
        
        if($is_user_valid==false){
            
            
            $_SESSION['user_valid']=1;
            
            echo "is_valid";
          //  header("Location: ../reset");
            
            
        }
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
    }
    else{
        
        
       // header("Location: ../login");
        
        
        
    }
    
    
    
    ?>

