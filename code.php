<?php
session_start();
require 'dbcon.php';
if (isset($_POST['save-student'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $course = mysqli_real_escape_string($con, $_POST['course']);

    $query= "INSERT INTO student_table (name, email, phone, course) VALUES
    ('$name', '$email', '$phone', '$course')";
    $query_run= mysqli_query($con, $query);
    if($query_run){
        $_SESSION['message'] = 'student inserted successfully';
        header("location: student-create.php");
        exit(0);
    }else{
        $_SESSION['message'] = 'student not created';
        header("location: student-create.php");
        exit(0);  
    }
}
