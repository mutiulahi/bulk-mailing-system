<?php
session_start();
include 'database.php';
if(!isset($_SESSION['auth'])){
// header('location:index.php');
header('location:index.php?msg=Please login to access the dashboad&type=error');
}
$session = "SELECT * FROM students WHERE id = '".$_SESSION['auth']."'";
$result_session = mysqli_query($dbconnect, $session);
while ($row_re = mysqli_fetch_array($result_session)) {
    $name = $row_re['name'];
    $role = $row_re['role'];
}

?>