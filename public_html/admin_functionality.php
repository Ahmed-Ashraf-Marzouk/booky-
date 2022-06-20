<?php


include 'config.php';
session_start();
error_reporting(0);
$username = $_SESSION['username'];
if (!isset($username)){
    header("Location: login.php");
    
}

$sql = "SELECT * FROM ADMIN WHERE  username='$username'";
$result = mysqli_query($conn, $sql);
if ($result->num_rows != 1) {
header("Location: index.php");
}


if (isset( $_POST['submitNewAdmin'])){
        $name = $_POST['newAdminName'];
        $admin_username = $_POST['newAdminUsername'];
        $password = md5($_POST['newAdminPassword']);
        $email = $_POST['newAdminEmail'];
        
        $sql = "SELECT * FROM ADMIN WHERE email='$email' OR username = $admin_username";
        $result = mysqli_query($conn, $sql);
        echo mysqli_num_rows($result);
        if ((mysqli_num_rows($result) == 0)) {
            $sql = "INSERT INTO ADMIN (username,name, email, password)
            VALUES ('$admin_username','$name', '$email', '$password') ";
            $result = mysqli_query($conn, $sql);
            
        }
    
}
if (isset( $_GET['banUser'])){
        $banUser = $_GET['banUser'];
        
        $sql = "SELECT * FROM USER WHERE username = '$banUser'";
        $result = mysqli_query($conn, $sql);
        if ((mysqli_num_rows($result) == 1)) {
            $sql = "UPDATE USER 
                    SET banned_by = '$username',
                     ban_message = 'You have banned from books because you may have violated our terms of service.'
                    WHERE username = '$banUser' ";
            $result = mysqli_query($conn, $sql);
        }
    
}

header("Location: admin_dashboard.php");



?>