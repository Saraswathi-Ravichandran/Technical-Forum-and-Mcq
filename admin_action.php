<?php
include_once '../dbConnection.php';
$ref=@$_GET['q'];
$email = $_POST['uname'];
$password = $_POST['password'];

$email = stripslashes($email);
$email = addslashes($email);
$password = stripslashes($password); 
$password = addslashes($password);
$result = $conn->query("SELECT email FROM admin WHERE email = '$email' and password = '$password'");
$count=$result->num_rows;
if($count==1){
session_start();
if(isset($_SESSION['email'])){
session_unset();}
$_SESSION["name"] = 'Admin';
$_SESSION["key"] ='tfspot1101';
$_SESSION["email"] = $email;
header("location:index.php");
}
else header("location:login.php?w=Warning : Access denied");
?>