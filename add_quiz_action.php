<!doctype html>
<html lang="en">
<head>
    <title>TFspot</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" type="icon/png" href="../asset/img/logo/rail_icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../asset/css/bootstrap.min.css">

    <!-- :start of optional css-->

    <!-- font-awesome for icon -->
    <link rel="stylesheet" href="../asset/font-awesome/css/all.min.css">

    <!-- animation css -->
    <link rel="stylesheet" href="../asset/css/animate.css">

    <!-- hover css animations -->
    <link rel="stylesheet" href="../asset/css/hover-min.css">

    <!-- custom css -->
    <link rel="stylesheet" type="text/css" href="../asset/css/custom.css">
    <link rel="stylesheet" type="text/css" href="../asset/css/spot.css">

    <!-- :end of optional css -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../asset/js/jquery-3.4.1.slim.min.js"></script>
    <script src="../asset/js/popper.min.js"></script>
    <script src="../asset/js/bootstrap.min.js"></script>

    <style>

        .bg-img{
            background-image: url('../asset/img/NG.jpg');
            background-size: 100%;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

    </style>

</head>
<body class="bg-img">
<!-- <div class="bg-img" > -->
<div class="layer"></div>
    <nav class="navbar  navbar-expand-sm">
        <div class="navbar-brand ml-auto fs-24">
            TFspot
        </div>        
        <div  class="navbar-collapse collapse" id="myNav" style="margin-left: 100px">
            <ul class="navbar-nav ">
                <li class="nav-item "><a href="index.php" class="nav-link">
                    <i class="fa fa-home">Home</i></a></li>
                <li class="nav-item "><a href="add_quiz.php" class="nav-link">Add Quiz</a></li>
                <li class="nav-item "><a href="remove_quiz.php" class="nav-link">Remove Quiz</a></li>
                <li class="nav-item "><a href="View_feedback.php" class="nav-link">View Feedbacks</a></li>
                </li><li class="nav-item "><a href="user.php" class="nav-link">User</a></li>
                <?php
                 include_once '../dbConnection.php';
                session_start();
                $email=$_SESSION['email'];
                if(!(isset($_SESSION['email']))){
                    header("location:login.php");
                }
                else
                {
                $name = $_SESSION['name'];;

                include_once '../dbConnection.php';
                echo '<li class="nav-item "><a href="#" class="nav-link">'.$name.'</a></li>
                <li class="nav-item "><a href="../logout.php?q=index.php" class="nav-link">Logout</a></li>';
                }?>
            </ul>
        </div>
    </nav>
<!-- </div> -->
  
  <?php
echo ' 
<div class="row">
<span  style="margin-left:40%;font-size:28px;" class="text-light">Enter Question Details</span><br /><br />
 </div><div class="col-12 text-light p-2" style="background-color: rgba(0,0,0,0.7)"><form class="" name="form" action="../main_action.php?q=addqns&n='.@$_GET['n'].'&eid='.@$_GET['eid'].'&ch=4 "  method="POST">
<fieldset>
';
 
 for($i=1;$i<=@$_GET['n'];$i++)
 {
echo '<i class="offset-4">Question number&nbsp;'.$i.'&nbsp;:<!-- Text input-->
  <label class="col-6 offset-4 control-label" for="qns'.$i.' "></label>  
  <div class="col-6 offset-4">
  <textarea rows="3" cols="5" name="qns'.$i.'" class="form-control" placeholder="Write question number '.$i.' here..."></textarea>  
  </div>
<!-- Text input-->
  <label class="col-6 offset-4 control-label" for="'.$i.'1"></label>  
  <div class="col-6 offset-4">
  <input id="'.$i.'1" name="'.$i.'1" placeholder="Enter option a" class="form-control input-md" type="text">
 </div>
<!-- Text input-->
  <label class="col-6 offset-4 control-label" for="'.$i.'2"></label>  
  <div class="col-6 offset-4">
  <input id="'.$i.'2" name="'.$i.'2" placeholder="Enter option b" class="form-control input-md" type="text">
    
  </div>

<!-- Text input-->
  <label class="col-6 offset-4 control-label" for="'.$i.'3"></label>  
  <div class="col-6 offset-4">
  <input id="'.$i.'3" name="'.$i.'3" placeholder="Enter option c" class="form-control input-md" type="text">
    
  </div>

<!-- Text input-->
  <label class="col-6 offset-4 control-label" for="'.$i.'4"></label>  
  <div class="col-6 offset-4">
  <input id="'.$i.'4" name="'.$i.'4" placeholder="Enter option d" class="form-control input-md" type="text">
    
  </div>
<br />
<i class="offset-4">Correct answer</i>:<br />
<select class="col-6 offset-4 form-control" id="ans'.$i.'" name="ans'.$i.'" placeholder="Choose correct answer "  >
   <option value="a">Select answer for question '.$i.'</option>
  <option value="a">option a</option>
  <option value="b">option b</option>
  <option value="c">option c</option>
  <option value="d">option d</option> </select><br /><br />'; 
 }
    
echo '
  <label class="col-6 offset-4 control-label" for=""></label>
  <div class="col-6 offset-4"> 
    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
  </div>

</fieldset>
</form></div>';




?>

</body>
</html>



