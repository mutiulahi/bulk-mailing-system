<?php
// $db_connect = mysqli_connect("summituniversity.edu.ng", "teslim", "Mr_tesliM", "suno_hostel");
// if(!$db_connect){
//     die("Connection failed: " . mysqli_connect_error());
// }

$dbconnect = mysqli_connect("localhost", "root", "Tescode902", "hostel_complain");
if (!$dbconnect){
        die("Connection failed: " . mysqli_connect_error());
    }
?>