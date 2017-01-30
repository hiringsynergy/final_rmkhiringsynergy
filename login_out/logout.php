<?php
/**
 * Created by PhpStorm.
 * User: Akash
 * Date: 17-12-2016
 * Time: 09:13
 */

session_start();

$_SESSION['user']=null;
$_SESSION['pass']=null;
$_SESSION['database_name']=null;
$_SESSION['student_name']=null;
$_SESSION['student_roll']=null;
$_SESSION['student_branch']=null;
$_SESSION['table_name']=null;
$_SESSION['database_name']=null;
$_SESSION['user_role']=null;
$_SESSION['cood_branch']=null;
$_SESSION['$student_year']=null;

header("Location: ../login.php");
?>