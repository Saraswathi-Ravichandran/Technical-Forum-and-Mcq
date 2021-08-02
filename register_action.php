<?php
include_once 'dbConnection.php';
ob_start();
$name = $_POST['name'];
$name= ucwords(strtolower($name));
$gender = $_POST['gender'];
$email = $_POST['email'];
$category = $_POST['category'];
$mob = $_POST['mob'];
$password = $_POST['password'];
$name = stripslashes($name);
$name = addslashes($name);
$name = ucwords(strtolower($name));
// $gender = stripslashes($gender);
// $gender = addslashes($gender);
$email = stripslashes($email);
$email = addslashes($email);
// $college = stripslashes($college);
// $college = addslashes($college);
$mob = stripslashes($mob);
$mob = addslashes($mob);

$password = stripslashes($password);
$password = addslashes($password);
$password = md5($password);

$q3=$conn->query("INSERT INTO user VALUES  ('$name' , '$gender' , '$category','$email' ,'$mob', '$password')");
$q4=$conn->query("INSERT INTO tbluser VALUES  ('','$name' ,'$email')");
if($q3)
{
session_start();
$_SESSION["email"] = $email;
$_SESSION["name"] = $name;

header("location:login.php");
}
else
{
header("location:index.php?q7=Email Already Registered!!!");
}
ob_end_flush();
?>