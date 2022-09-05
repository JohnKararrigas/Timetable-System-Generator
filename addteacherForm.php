<?php
include 'connection.php';
if (isset($_POST['TN']) && isset($_POST['TF']) && isset($_POST['AL'])) {         //name,id,nickname 

    $name = $_POST['TN'];
    $facno = $_POST['TF'];
    $alias = $_POST['AL'];
  
} else {
    $message = "dead.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    die();
}
$q = mysqli_query(mysqli_connect("localhost", "root", "", "ttms"), "INSERT INTO teachers VALUES ('$facno','$name','$alias')");  
$sql = "CREATE TABLE " . $facno . " ( 
day VARCHAR(10) PRIMARY KEY, 
period1 VARCHAR(30),
period2 VARCHAR(30),
period3 VARCHAR(30),
period4 VARCHAR(30),
period5 VARCHAR(30),
period6 VARCHAR(30)
)"; //create table in database
mysqli_query(mysqli_connect("localhost", "root", "", "ttms"), $sql);
$days = array('monday', 'tuesday', 'wednesday', 'thursday', 'friday');           
for ($i = 0; $i < 5; $i++) {               
    $day = $days[$i];
    $sql = "INSERT into " . $facno . " VALUES('$day','','','','','')";       
    mysqli_query(mysqli_connect("localhost", "root", "", "ttms"), $sql);
}
if (!$q) {
  $message = "Username or ID incorrect.\\nTry again.";
  echo "<script type='text/javascript'>alert('$message');</script>";
}
?>