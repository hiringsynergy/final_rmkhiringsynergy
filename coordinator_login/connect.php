<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    ob_start();
}
if(isset($_SESSION['database_name'])){

    $database=$_SESSION['database_name'];

    if(preg_match('/rmd/', $database)){

        $connect=mysqli_connect("mysql.hostinger.com","u552198179_root","rmkhiringsynergy","$database");
    }
    if(preg_match('/rmk/', $database)){

        $connect=mysqli_connect("mysql.hostinger.com","u552198179_root1","rmkhiringsynergy","$database");
    }

    if(preg_match('/cet/', $database)){

        $connect=mysqli_connect("mysql.hostinger.com","u552198179_root2","rmkhiringsynergy","$database");
    }

}

