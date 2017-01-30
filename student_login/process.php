<?php

session_start();
ob_start();





if(isset($_GET['pass']) && isset($_SESSION['user_role'])=='student'){





   $get_pass=$_GET['pass'];

    if($get_pass==''){


        echo 'false';
    }

    else {


        include "connect.php";

        $username = $_SESSION['user'];

        $student_table = $_SESSION['table_name'];
        $query = "SELECT * FROM $student_table  WHERE st_roll='{$username}'";

        $result = mysqli_query($connect, $query);

        $row = mysqli_fetch_assoc($result);
        $pass = $row['st_pass'];


        if (password_verify($get_pass, $pass)) {


            echo 'true';


        } else {

            echo 'false';

        }
    }


}


