<?php
include 'connection.php';
if (isset($_POST['SN']) && isset($_POST['SC']) && isset($_POST['SS']) && isset($_POST['SD'])) {       //name,code,semester,dep
    $name = $_POST['SN'];
    $code = $_POST['SC'];
    $sem = $_POST['SS'];
    $course = $_POST['ST'];
    $dept = $_POST['SD'];
    
} else {
    $message = "dead.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    header("Location:addsubjects.php");
}
$q = mysqli_query(mysqli_connect("localhost", "root", "", "ttms"), "INSERT INTO subjects VALUES ('$code','$name','$course','$sem','$dept',0,'')");//,'',''
if (!$q) {
    $message = "Username and/or Password incorrect.\\nTry again.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    header("Location:addsubjects.php");
}
?>