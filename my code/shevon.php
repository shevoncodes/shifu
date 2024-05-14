<?php
session_start();
include 'header.php';
require('config.php');

if(isset($_POST["login"])){
    $name = $_POST['name'];
    $password = $_POST['password'];

    $mysqml = "SELECT id, name,registration_no FROM students WHERE name='$name' AND password='$password'";
    $result = mysqli_query($connect, $mysqml);

    if(mysqli_num_rows($result) > 0){
        // Student exists, fetch user data
        $rowData = mysqli_fetch_array($result);

        // Set session variables
        $_SESSION['user_id'] = $rowData['id'];
        $_SESSION['user_name'] = $rowData['name'];
        $_SESSION['user_reg'] = $rowData['registration_no'];

        header('location: dashboard.php');
        exit();
    } else {
        echo '<script>alert("Student does not exist");</script>';
        header('location: index.php');
        exit();
    }
}
?>