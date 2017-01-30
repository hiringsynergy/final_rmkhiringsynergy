<?php

session_start();
ob_start();




if(isset($_GET['pass']) && isset($_SESSION['user_role'])=='coordinator'){






    $get_pass=$_GET['pass'];

    if($get_pass==''){


        echo 'false';
    }

    else {


        include "connect.php";

        $username = $_SESSION['user'];

        $student_table = $_SESSION['table_name'];

        $query = "SELECT * FROM login_coordinator  WHERE username='{$username}'";

        $result = mysqli_query($connect, $query);

        $row = mysqli_fetch_assoc($result);
        $pass = $row['password'];


        if (password_verify($get_pass, $pass)) {


            echo 'true';


        } else {

            echo 'false';

        }
    }


}


