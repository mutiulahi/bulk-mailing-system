<?php
session_start();
include 'database.php';
if (isset($_POST['login'])) {

    $password = mysqli_real_escape_string($dbconnect, $_POST['password']);

    $matric = mysqli_real_escape_string($dbconnect, $_POST['matric']);
    
    if(empty($matric) && empty($password)){
        header('location:../index.php?msg=matric and password fields are required&type=error');
    }elseif (empty($password) && !empty($matric)) {
        header('location:../index.php?msg=password field is required&type=error');
    }elseif (empty($matric) && !empty($password)) {
        header('location:../index.php?msg=matric field is required&type=error');
    }
    else{
        $sql = "SELECT * FROM students WHERE matric = '$matric' AND password = '$password'";
        $result = mysqli_query($dbconnect, $sql);
        $queryResult = mysqli_num_rows($result);
        if ($queryResult > 0) {
            while ($loginAns = mysqli_fetch_array($result)) { 
                // check if the as changed the password
                if ($loginAns['first_time'] == 1) {
                    $_SESSION['first'] = $loginAns['id'];
                    header('location:../change_password.php?msg=Please change your password&type=success');
                }else {
                    $_SESSION['auth'] = $loginAns['id'];
                    header('location:../complaint.php');
                } 
            }  
        }else{
            header('location:../index.php?msg=matric or password is incorrect&type=error');
        }
    }
}

if (isset($_POST['change_password'])) {
    echo $password = mysqli_real_escape_string($dbconnect, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($dbconnect, $_POST['confirm_password']);

    $password_update = 0;
    
    if(empty($confirm_password) && empty($password)){
        header('location:../change_password.php?msg=confirm_password and password fields are required&type=error');
    }elseif (empty($password) && !empty($confirm_password)) {
        header('location:../change_password.php?msg=password field is required&type=error');
    }elseif (empty($confirm_password) && !empty($password)) {
        header('location:../change_password.php?msg=confirm_password field is required&type=error');
    }elseif ($confirm_password != $password) {
        header('location:../change_password.php?msg=confirm_password field is required&type=error');
    }
    else {
        
        $stmt_Update_Payment = $dbconnect->prepare("UPDATE students SET password = ?, first_time = ? WHERE id = ?");
        $stmt_Update_Payment->bind_param("ssi", $password, $password_update, $_SESSION['first']);
        $stmt_Update_Payment->execute();
        header('location:../index.php?msg=password changed successfully&type=success');
    }

}