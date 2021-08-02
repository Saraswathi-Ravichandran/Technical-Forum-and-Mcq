<?php
include_once 'dbConnection.php';
session_start();
$email=$_SESSION['email'];

//delete feedback
if(isset($_SESSION['key'])){
if(@$_GET['fdid'] && $_SESSION['key']=='tfspot1101') {
$id=@$_GET['fdid'];
$result = $conn->query("DELETE FROM feedback WHERE id='$id' ");
header("location:admin/view_feedback.php");
}
}

//delete user
if(isset($_SESSION['key'])){
if(@$_GET['demail'] && $_SESSION['key']=='tfspot1101') {
$demail=@$_GET['demail'];
$r2 = $conn->query("DELETE FROM history WHERE email='$demail' ");
$result = $conn->query("DELETE FROM user WHERE email='$demail' ");
$result3 = $conn->query("DELETE FROM tbluser WHERE email='$demail' ");
header("location:admin/user.php");
}
}
//remove quiz
if(isset($_SESSION['key'])){ 
if(@$_GET['q']== 'rmquiz' && $_SESSION['key']=='tfspot1101') {
	echo '<script>alert("remove")</script>';
$eid=@$_GET['eid'];
$result = $conn->query("SELECT * FROM questions WHERE eid='$eid' ");
while($row = $result->fetch_array()) {
	$qid = $row['qid'];
$r1 = $conn->query("DELETE FROM options WHERE qid='$qid'") or die('Error');
$r2 = $conn->query("DELETE FROM answer WHERE qid='$qid' ") or die('Error');
}
$r3 = $conn->query("DELETE FROM questions WHERE eid='$eid' ") or die('Error');
$r4 = $conn->query("DELETE FROM quiz WHERE eid='$eid' ") or die('Error');
$r4 = $conn->query("DELETE FROM history WHERE eid='$eid' ") or die('Error');

header("location:admin/remove_quiz.php");
}
}

//add quiz
if(isset($_SESSION['key'])){
if(@$_GET['q']== 'addquiz' && $_SESSION['key']=='tfspot1101') {
	echo '<script>alert("addquiz")</script>';
$name = $_POST['name'];
$name= ucwords(strtolower($name));
$total = $_POST['total'];
$correct = $_POST['right'];
$wrong = $_POST['wrong'];
$time = $_POST['time'];
$id=uniqid();
$q3=$conn->query("INSERT INTO quiz VALUES  ('$id','$name' , '$correct' , '$wrong','$total','$time' , NOW())");

header("location:admin/add_quiz_action.php?q=4&step=2&eid=$id&n=$total");
}
}

//add question
if(isset($_SESSION['key'])){
if(@$_GET['q']== 'addqns' && $_SESSION['key']=='tfspot1101') {
$n=@$_GET['n'];
$eid=@$_GET['eid'];
$ch=@$_GET['ch'];

for($i=1;$i<=$n;$i++)
 {
 $qid=uniqid();
 $qns=$_POST['qns'.$i];
$q3=$conn->query("INSERT INTO questions VALUES  ('$eid','$qid','$qns' , '$ch' , '$i')");
  $oaid=uniqid();
  $obid=uniqid();
$ocid=uniqid();
$odid=uniqid();
$a=$_POST[$i.'1'];
$b=$_POST[$i.'2'];
$c=$_POST[$i.'3'];
$d=$_POST[$i.'4'];
$qa=$conn->query("INSERT INTO options VALUES  ('$qid','$a','$oaid')");
$qb=$conn->query("INSERT INTO options VALUES  ('$qid','$b','$obid')");
$qc=$conn->query("INSERT INTO options VALUES  ('$qid','$c','$ocid')");
$qd=$conn->query("INSERT INTO options VALUES  ('$qid','$d','$odid')");
$e=$_POST['ans'.$i];
switch($e)
{
case 'a':
$ansid=$oaid;
break;
case 'b':
$ansid=$obid;
break;
case 'c':
$ansid=$ocid;
break;
case 'd':
$ansid=$odid;
break;
default:
$ansid=$oaid;
}


$qans=$conn->query("INSERT INTO answer VALUES  ('$qid','$ansid')");

 }
header("location:admin/index.php");
}
}

//quiz start
if(@$_GET['q']== 'quiz' && @$_GET['step']== 2) {
$title=@$_GET['title'];
$eid=@$_GET['eid'];
$sn=@$_GET['n'];
$total=@$_GET['t'];
$ans=$_POST['ans'];
$qid=@$_GET['qid'];
$q=$conn->query("SELECT * FROM answer WHERE qid='$qid' " );
while($row=$q->fetch_array() )
{
	$ansid=$row['ansid'];
}
if($ans == $ansid)
{
	$q=$conn->query("SELECT * FROM quiz WHERE eid='$eid' " );
	while($row=$q->fetch_array() )
	{
		$right=$row['correct'];
	}
	if($sn == 1)
	{
		$q=$conn->query("INSERT INTO history VALUES('$email','$eid' ,'0','0','0','0','0',NOW())");
	}
	$q=$conn->query("SELECT * FROM history WHERE eid='$eid' AND email='$email' ");

	while($row=$q->fetch_array() )
	{
		$s=$row['score'];
		$r=$row['correct'];
	}
	$r++;
	$s=$s+$right;
	$q=$conn->query("UPDATE `history` SET `score`=$s,`level`=$sn,`correct`=$r, date= NOW()  WHERE  email = '$email' AND eid = '$eid'");

} 
else
{
	$q=$conn->query("SELECT * FROM quiz WHERE eid='$eid' " );

	while($row=$q->fetch_array())
	{
		$wrong=$row['wrong'];
	}
	if($sn == 1)
	{
		$q=$conn->query("INSERT INTO history VALUES('$email','$eid' ,'0','0','0','0','0',NOW() )");
	}
	$q=$conn->query("SELECT * FROM history WHERE eid='$eid' AND email='$email' " );
	while($row=$q->fetch_array())
	{
		$s=$row['score'];
		$w=$row['wrong'];
	}
	$w++;
	$s=$s-$wrong;
	$q=$conn->query("UPDATE `history` SET `score`=$s,`level`=$sn,`wrong`=$w, date=NOW() WHERE  email = '$email' AND eid = '$eid'");
}
if($sn != $total)
{
	$sn++;
	header("location:exam.php?q=quiz&step=2&eid=$eid&n=$sn&t=$total&title=$title");
}
else if( $_SESSION['key']!='tfspot1101 ')
{
	$q=$conn->query("SELECT score FROM history WHERE eid='$eid' AND email='$email'" );
	while($row=$q->fetch_array())
	{
		$s=$row['score'];
	}
	$q=$conn->query("SELECT * FROM rank WHERE email='$email'" );
	$rowcount=$q->num_rows;
	if($rowcount == 0)
	{
		$q2=$conn->query("INSERT INTO rank VALUES('$email','$s',NOW())");
	}
	else
	{
		while($row=$q->fetch_array() )
		{
			$sun=$row['score'];
		}
		$sun=$s+$sun;
		$q=$conn->query("UPDATE `rank` SET `score`=$sun ,time=NOW() WHERE email= '$email'");
	}
	header("location:score.php?q=result&eid=$eid");
}
else
{
header("location:score.php?q=result&eid=$eid");
}
}

//restart quiz
// if(@$_GET['q']== 'quizre' && @$_GET['step']== 25 ) {
// $eid=@$_GET['eid'];
// $n=@$_GET['n'];
// $t=@$_GET['t'];
// $q=$conn->query("SELECT score FROM history WHERE eid='$eid' AND email='$email'" );
// while($row=$q->fetch_array())
// {
// $s=$row['score'];
// }
// $q=$conn->query("DELETE FROM `history` WHERE eid='$eid' AND email='$email' " );
// $q=$conn->query("SELECT * FROM rank WHERE email='$email'" );
// while($row=$q->fetch_array() )
// {
// $sun=$row['score'];
// }
// $sun=$sun-$s;
// $q=$conn->query("UPDATE `rank` SET `score`=$sun ,time=NOW() WHERE email= '$email'");
// header("location:account.php?q=quiz&step=2&eid=$eid&n=1&t=$t");
// }

?>



