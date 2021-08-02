<?php
session_start();
if(isset($_SESSION["email"])){
session_destroy();
}
include_once 'dbConnection.php';
$ref=@$_GET['q'];
$email = $_POST['email'];
$password = $_POST['password'];

$email = stripslashes($email);
$email = addslashes($email);
$password = stripslashes($password); 
$password = addslashes($password);
$password=md5($password); 
$result = $conn->query("SELECT name FROM user WHERE email = '$email' and password = '$password'");
$count=$result->num_rows;
if($count==1){
while($row = $result->fetch_array()) {
	$name = $row['name'];
}

$result2 = $conn->query("SELECT user_Id FROM tbluser WHERE email = '$email'");
if($result2->num_rows == 1){
	while($row2 = $result2->fetch_array()) {
		$userid = $row2['user_Id'];
	}	
}
$_SESSION["userid"] = $userid;
$_SESSION["name"] = $name;
$_SESSION["email"] = $email;
// echo "<script>alert(".$_SESSION["userid"].");</script>";
header("location:index.php");
}
else
header("location:login.php?w=Wrong Username or Password");


?>