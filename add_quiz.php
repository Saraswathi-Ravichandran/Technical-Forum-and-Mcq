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
    <div class="container"><!--container start-->
<div class="row">
<div class="col-md-12">
<!--home start-->

  <div class="row">
<span class="title1 text-light" ><b>Enter Quiz Details</b></span><br /><br />
 <div class="col-md-3"></div><div class="col-md-6">   <form class="form-horizontal title1" name="form" action="../main_action.php?q=addquiz"  method="POST">
<fieldset>


<!-- Text input-->
  <div class="col-md-12">
  <input id="name" name="name" placeholder="Enter Quiz title" class="form-control input-md" type="text">
</div>



<!-- Text input-->
  <div class="col-md-12">
  <input id="total" name="total" placeholder="Enter total number of questions" class="form-control input-md" type="number">
</div>

<!-- Text input-->
  <div class="col-md-12">
  <input id="right" name="right" placeholder="Enter marks on right answer" class="form-control input-md" min="0" type="number">
    
</div>

<!-- Text input-->
  <div class="col-md-12">
  <input id="wrong" name="wrong" placeholder="Enter minus marks on wrong answer without sign" class="form-control input-md" min="0" type="number">
</div>

<!-- Text input-->
 <!-- <div class="col-md-12">
  <input id="time" name="time" placeholder="Enter time limit for test in minute" class="form-control input-md" min="1" type="number">
</div>-->

<!-- Text input-->
 


  <div class="col-md-12"> 
    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit"/>
</div>

</fieldset>
</form></div>';

</div>
</div>
</body>
</html>



