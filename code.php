<?php
session_start();
require 'dbcon.php';

if (isset($_POST['delete-student'])) {
    $student_id = mysqli_real_escape_string($con, $_POST['delete-student']);
    $query = "DELETE FROM student_table WHERE id= '$student_id'";
    $query_run= mysqli_query($con, $query);
    if($query_run){
        $_SESSION['message'] = 'student deleted successfully';
        header("location: index.php");
        exit(0);
    }else{
        $_SESSION['message'] = 'student not deleted';
        header("location: index.php");
        exit(0);

    }
}
if (isset($_POST['update-student'])) {

    $student_id = mysqli_real_escape_string($con, $_POST['student_id']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $course = mysqli_real_escape_string($con, $_POST['course']);

    $query = "UPDATE student_table SET name= '$name', email='$email', phone='$phone', course='$course' WHERE id =$student_id";
    $query_run = mysqli_query($con, $query);
    if ($query_run) {

        $_SESSION['message'] = 'student updated successfully';
        header("location: index.php");
        exit(0);
    } else {
        $_SESSION['message'] = 'student not updated';
        header("location: index.php");
        exit(0);
    }
}
if (isset($_POST['save-student'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $course = mysqli_real_escape_string($con, $_POST['course']);

    $query = "INSERT INTO student_table (name, email, phone, course) VALUES
    ('$name', '$email', '$phone', '$course')";
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        $_SESSION['message'] = 'student inserted successfully';
        header("location: student-create.php");
        exit(0);
    } else {
        $_SESSION['message'] = 'student not created';
        header("location: student-create.php");
        exit(0);
    }
}
