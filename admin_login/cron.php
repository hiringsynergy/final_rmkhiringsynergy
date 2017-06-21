<?php
/**
 * Created by PhpStorm.
 * User: rmdec
 * Date: 21/06/17
 * Time: 12:37 PM
 */

if(isset($_POST['email'])) {

    include "connect.php";
    $jid = $_POST['jid'];
    $students_table_name=$_POST['year'];
    $check=$_POST['check'];

    $connect_mail=mysqli_connect("mysql.hostinger.com","u552198179_root3","rmkhiringsynergy","u552198179_login");
    $query_for_mail="SELECT * FROM mail_sender";
    $result_mail=mysqli_query($connect_mail,$query_for_mail);

    $count=0;



    while($row = mysqli_fetch_assoc($result_mail) && $count<=50){






    if($row['mail_to']!='' && $row['status']==0) {



            $subject = $row['mail_subject'];
            $message = $row['mail_message'];
            $to = $row['mail_to'];
            $database =$row['database_name'];



        require "email/PHPMailer/PHPMailerAutoload.php";

        $mail=new PHPMailer();

        $mail->isMail();
        $mail->Host = 'mx1.hostinger.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;// Enable SMTP authentication



        if(preg_match('/rmd/', $database)){




            // $connect=mysqli_connect("mysql.hostinger.com","u552198179_root","rmkhiringsynergy","$database");
            $mail->Username = 'rmdplacements@rmkhiringsynergy.xyz';                 // SMTP username
            $mail->Password = 'rmd123';                           // SMTP password
            $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 	587;


            $mail->setFrom('rmdplacements@rmkhiringsynergy.xyz', 'RMD Placements');
            $mail->addAddress($to, $to);     // Add a recipient

            $mail->addReplyTo('rmdplacements@rmkhiringsynergy.xyz', 'Reply');
            $collegename="RMD Engineering College";

        }
        if(preg_match('/rmk/', $database)){



            //  $connect=mysqli_connect("mysql.hostinger.com","u552198179_root1","rmkhiringsynergy","$database");
            $mail->Username = 'rmkplacements@rmkhiringsynergy.xyz';                 // SMTP username
            $mail->Password = 'rmk123';                           // SMTP password
            $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 	587;


            $mail->setFrom('rmkplacements@rmkhiringsynergy.xyz', 'RMK Placements');
            $mail->addAddress($to, $to);     // Add a recipient

            $mail->addReplyTo('rmkplacements@rmkhiringsynergy.xyz', 'Reply');
            $collegename="RMk Engineering College";

        }

        if(preg_match('/cet/', $database)){

            //   $connect=mysqli_connect("mysql.hostinger.com","u552198179_root2","rmkhiringsynergy","$database");
            $mail->Username = 'rmkcetplacements@rmkhiringsynergy.xyz';                 // SMTP username
            $mail->Password = 'rmkcet123';                           // SMTP password
            $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 	587;


            $mail->setFrom('rmkcetplacements@rmkhiringsynergy.xyz', 'RMKCET Placements');
            $mail->addAddress($to, $to);     // Add a recipient

            $mail->addReplyTo('rmkcetplacements@rmkhiringsynergy.xyz', 'Reply');
            $collegename="RMK College of Engineering and Technology";

        }






        $mail->isHTML(true);

        $mail->Subject =$subject;
        $mail->Body    = $message;
        $mail->Body .= '<div class="gmail_default"><b><br><br><br><br></div><div class="gmail_default"><b>---------------------------------</b></div><div class="gmail_default"><b style="font-family:arial,sans-serif"><i><span style="font-family:arial,helvetica,sans-serif">With Regards,&nbsp;</span></i></b><b><br></b></div></div><div class="gmail_default" style="font-family:verdana,sans-serif;color:rgb(0,0,0)"><div class="gmail_default"><b><br>Training &amp; Placement Office,</b></div><div class="gmail_default"><b>'.$collegename.'</b></div>';



        if($mail->send()){


            $query_for_update = "UPDATE mail_sender SET status='1' ";
            $result_for_update = mysqli_query($connect, $query_for_update);


        }




        ++$count;




        }
    }








}

?>

