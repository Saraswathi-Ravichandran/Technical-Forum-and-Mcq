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
        }

    </style>
<?php if(@$_GET['w'])
{echo'<script>alert("'.@$_GET['w'].'");</script>';}
?>
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
            </ul>
        </div>
    </nav>
<!-- </div> -->
    <div class="login-box">
        <div class="top-name">   
            <a href="#" class="mr-4 text-black">Login</a>
            <!-- <a href="register.php" class="text-black">Register</a> -->
        </div>
        <form class="form" id="form" action="admin_action.php?q=login.php" method="post">
            <input id="email" name="uname" type="text" class="" placeholder="userid" ><br>
            <input id="password" class="" placeholder="password" type="password" name="password"><br>
            <!-- <input type="checkbox" name="remember_me" ><span style="color: #999">Remember Me</span> -->
            <input class="btn btn-block btn-warning" value="Log in" type="submit" name="login">
        </form>
    </div>
</body>
</html>
