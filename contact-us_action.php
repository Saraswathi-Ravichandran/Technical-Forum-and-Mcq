<?php
include_once 'dbConnection.php';
$ref=@$_GET['q'];
$email = $_POST['email'];
$id=uniqid();
$date=date("Y-m-d");
$feedback = $_POST['feedback'];
$q=$conn->query("INSERT INTO feedback VALUES  ('$id' , '$email' , '$feedback' , '$date' )")or die ("Error");
header("location:$ref?w=Thank you for your valuable feedback");
?>