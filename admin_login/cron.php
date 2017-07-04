<?php
/**
 * Created by PhpStorm.
 * User: rmdec
 * Date: 21/06/17
 * Time: 12:37 PM
 */



     echo "cron smtp2go";



    $connect_mail=mysqli_connect("mysql.hostinger.com","u625007899_root3","rmkhiringsynergy","u625007899_login");
    $query_for_mail="SELECT * FROM mail_sender WHERE status='0' LIMIT 100";
    $result_mail=mysqli_query($connect_mail,$query_for_mail);

    $query_delete_mail="DELETE FROM mail_sender WHERE status='1'";
    $result_mail_delete=mysqli_query($connect_mail, $query_delete_mail);



if(!$result_mail){


        echo "die.....";

        die("die...".mysqli_error($connect_mail));

}
else{

        echo "not while die.........";

}


    echo "enter loop";



require "email/PHPMailer/PHPMailerAutoload.php";
$mail=new PHPMailer();



$mail->isSMTP();
$mail->Host = 'mail.smtp2go.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;// Enable SMTP authentication




    while ($row = mysqli_fetch_assoc($result_mail)) {














        $to = $row['mail_to'];

        $subject = $row['mail_subject'];
        $message = $row['mail_message'];
        $student_id=$row['student_id'];
        $job_id=$row['job_id'];
        $database = $row['database_name'];

        echo "to... " . $to;
        echo "subject.. " . $subject;
        echo "message .." . $message;
        echo "database ..." . $database;





        if ($row['mail_to'] != '' && $row['status'] ==0 )
        {


            if (preg_match('/rmd/', $database)) {


                // $connect=mysqli_connect("mysql.hostinger.com","u625007899_root","rmkhiringsynergy","$database");
                $mail->Username = 'karthickakash17@gmail.com';                 // SMTP username
                $mail->Password = 'rmkec123';// SMTP password

                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 2525;


                $mail->setFrom('brad@sandbox0094f7e058324697b4a39b30e2725a8e.mailgun.org', 'RMD Placements');
                $mail->addAddress($to, $to);     // Add a recipient

                $mail->addReplyTo('rmdplacements@rmkhiringsynergy.xyz', 'Reply');
                $collegename = "RMD Engineering College";

            }
            if (preg_match('/rmk/', $database)) {


                //  $connect=mysqli_connect("mysql.hostinger.com","u625007899_root1","rmkhiringsynergy","$database");
                $mail->Username = 'rmkplacements@rmkhiringsynergy.xyz';                 // SMTP username
                $mail->Password = 'rmk123';                           // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;


                $mail->setFrom('rmkplacements@rmkhiringsynergy.xyz', 'RMK Placements');
                $mail->addAddress($to, $to);     // Add a recipient

                $mail->addReplyTo('rmkplacements@rmkhiringsynergy.xyz', 'Reply');
                $collegename = "RMk Engineering College";

            }

            if (preg_match('/cet/', $database)) {

                //   $connect=mysqli_connect("mysql.hostinger.com","u625007899_root2","rmkhiringsynergy","$database");
                $mail->Username = 'rmkcetplacements@rmkhiringsynergy.xyz';                 // SMTP username
                $mail->Password = 'rmkcet123';                           // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;


                $mail->setFrom('rmkcetplacements@rmkhiringsynergy.xyz', 'RMKCET Placements');
                $mail->addAddress($to, $to);     // Add a recipient

                $mail->addReplyTo('rmkcetplacements@rmkhiringsynergy.xyz', 'Reply');
                $collegename = "RMK College of Engineering and Technology";

            }


            $mail->isHTML(true);

            $mail->Subject = $subject;
            $mail->Body = $message." ".$student_id;
            $mail->Body .= '<div class="gmail_default"><b><br><br><br><br></div><div class="gmail_default"><b>---------------------------------</b></div><div class="gmail_default"><b style="font-family:arial,sans-serif"><i><span style="font-family:arial,helvetica,sans-serif">With Regards,&nbsp;</span></i></b><b><br></b></div></div><div class="gmail_default" style="font-family:verdana,sans-serif;color:rgb(0,0,0)"><div class="gmail_default"><b><br>Training &amp; Placement Office,</b></div><div class="gmail_default"><b>' . $collegename . '</b></div>';


            if ($mail->send()) {


                echo "mail send";


                $query_for_update = "UPDATE mail_sender SET status='1' WHERE student_id='$student_id' and job_id='$job_id'";
                $result_for_update = mysqli_query($connect_mail, $query_for_update);


            }

            else {

                echo "failure" . $mail->ErrorInfo;


                break;
            }



        }




    }






    echo "end cron";







?>

