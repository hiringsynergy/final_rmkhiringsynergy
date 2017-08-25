<?php
/**
 * Created by PhpStorm.
 * User: rmdec
 * Date: 21/06/17
 * Time: 12:37 PM
 */



     echo "cron smtp2go";



    $connect_mail=mysqli_connect("mysql.hostinger.com","u625007899_root3","rmkhiringsynergy","u625007899_login");
    $query_for_mail="SELECT * FROM mail_sender WHERE status='0'";
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


    echo "enter loop smtp2go";



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
        $attachment = $row['mail_attachment'];






        if ($row['mail_to'] != '' && $row['status'] == 0 )
        {


            if (preg_match('/rmd/', $database)) {


                // $connect=mysqli_connect("mysql.hostinger.com","u625007899_root","rmkhiringsynergy","$database");
                $mail->Username = 'campulse@rmkec.ac.in';                 // SMTP username
                $mail->Password = 'RMKEC123';// SMTP password

                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 2525;


                $mail->setFrom('rmdplacements@rmkcampulse.com', 'RMD Placements');
                $mail->addAddress($to, $to);     // Add a recipient

                $mail->addReplyTo('rmdplacements@rmkcampulse.com', 'Reply');
                $collegename = "RMD Engineering College";

            }
            if (preg_match('/rmk/', $database)) {


                // $connect=mysqli_connect("mysql.hostinger.com","u625007899_root","rmkhiringsynergy","$database");
                $mail->Username = 'campulse@rmkec.ac.in';                 // SMTP username
                $mail->Password = 'RMKEC123';// SMTP password

                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 2525;


                $mail->setFrom('rmkplacements@rmkcampulse.com', 'RMK Placements');
                $mail->addAddress($to, $to);     // Add a recipient

                $mail->addReplyTo('rmkplacements@rmkcampulse.com', 'Reply');
                $collegename = "RMK Engineering College";

            }

            if (preg_match('/cet/', $database)) {

                // $connect=mysqli_connect("mysql.hostinger.com","u625007899_root","rmkhiringsynergy","$database");
                $mail->Username = 'campulse@rmkec.ac.in';                  // SMTP username
                $mail->Password = 'RMKEC123';// SMTP password

                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 2525;


                $mail->setFrom('rmkcetplacements@rmkcampulse.com', 'RMKCET Placements');
                $mail->addAddress($to, $to);     // Add a recipient

                $mail->addReplyTo('rmkcetplacements@rmkcampulse.com', 'Reply');
                $collegename = "RMK College of Engineering and Technology";

            }


            if($attachment!=''){

                $array_attach = explode(", ", $attachment);

                foreach($array_attach as $attach){

                   /* $filename = 'public_html/admin_login/files/'.$attach;

                    if (file_exists($filename)) {
                        echo "The file $filename exists";
                    } else {
                        echo "The file $filename does not exist";
                    }

                    echo "current directory ";

                    echo getcwd()." ";
                    echo $_SERVER['DOCUMENT_ROOT'];*/
                    $mail->addAttachment('public_html/admin_login/files/'.$attach, $attach);

                }




            }


            $mail->isHTML(true);

            $mail->Subject = $subject;
            $mail->Body = $message;
            $mail->Body .= '<div class="gmail_default"><b><br><br><br><br></div><div class="gmail_default"><b>---------------------------------</b></div><div class="gmail_default"><b style="font-family:arial,sans-serif"><i><span style="font-family:arial,helvetica,sans-serif">With Regards,&nbsp;</span></i></b><b><br></b></div></div><div class="gmail_default" style="font-family:verdana,sans-serif;color:rgb(0,0,0)"><div class="gmail_default"><b><br>Training &amp; Placement Office,</b></div><div class="gmail_default"><b>' . $collegename . '</b></div>';






            if ($mail->send()) {


                echo "<br>";
                echo "mail send";


                $query_for_update = "UPDATE mail_sender SET status='1' WHERE student_id='$student_id' and job_id='$job_id'";
                $result_for_update = mysqli_query($connect_mail, $query_for_update);


            }

            else {

                echo "<br>";

                echo "failure" . $mail->ErrorInfo;

                $query_for_update = "UPDATE mail_sender SET status='2' WHERE student_id='$student_id' and job_id='$job_id'";
                $result_for_update = mysqli_query($connect_mail, $query_for_update);




                break;
            }



        }

        $mail->clearAddresses();
        $mail->clearAttachments();




    }






echo "<br>";

    echo "end cron";







?>

