<?php
include 'connection.php';
$id = $_GET['name'];
$q = mysqli_query(mysqli_connect("localhost", "root", "", "ttms"),

    "UPDATE subjects  SET isAlloted = '0' , allotedto = '' WHERE subject_code = '$id' ");
    if ($q) {

    header("Location:allotsubjects.php");

} else {
    echo 'Error';
}
?>