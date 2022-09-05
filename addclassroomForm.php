<?php
include 'connection.php';
if (isset($_POST['CN'])) {              //sends name as package
    $name = $_POST['CN'];
    
} else {
    $message = "dead.";
    echo "<script type='text/javascript'>alert('$message');</script>";     //
    die();
}
$q = mysqli_query(mysqli_connect("localhost", "root", "", "ttms"), "INSERT INTO classrooms VALUES ('$name',0)");
if ($q) {
    $message = "Classroom added.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    header("Location:addclassrooms.php");
} else {
    $message = "This Classroom exists.\\nTry again.";
    echo "<script type='text/javascript'>alert('$message');</script>";
}
?>