<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    ob_start();
}

if(isset($_SESSION['database_name'])){

    $database=$_SESSION['database_name'];
    $connect=mysqli_connect("localhost","root","","$database");

}

