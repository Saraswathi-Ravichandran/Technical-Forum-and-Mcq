<!doctype html>
<html lang="en">
<head>
    <title>TFspot</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" type="icon/png" href="asset/img/logo/rail_icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">

    <!-- :start of optional css-->

    <!-- font-awesome for icon -->
    <link rel="stylesheet" href="asset/font-awesome/css/all.min.css">

    <!-- animation css -->
    <link rel="stylesheet" href="asset/css/animate.css">

    <!-- hover css animations -->
    <link rel="stylesheet" href="asset/css/hover-min.css">

    <!-- custom css -->
    <link rel="stylesheet" type="text/css" href="asset/css/custom.css">
    <link rel="stylesheet" type="text/css" href="asset/css/spot.css">

    <!-- :end of optional css -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="asset/js/jquery-3.4.1.slim.min.js"></script>
    <script src="asset/js/popper.min.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>

    <style>

        .bg-img{
            background-image: url('asset/img/img1.jpg');
            background-size: 100%;
            background-repeat: no-repeat;
        }
        input, textarea{
            background-color: transparent;
            border: none;
            margin-top: 20px;
            color: #ccc;
        }
        input:focus,textarea:focus{

            border-bottom:1px solid white;
            outline-style: none;
        }
        input[type=submit]{
            border-radius: 20px;
            background-color: #f4be85 ;
            color: black;
        }

    </style>
<!--alert message-->
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
        <div  class="navbar-collapse collapse" id="myNav" style="margin-left: 200px">
            <ul class="navbar-nav ">
                <li class="nav-item "><a href="index.php" class="nav-link">
                    <i class="fa fa-home">Home</i></a></li>
                <li class="nav-item "><a href="forum/forum.php" class="nav-link">Forum</a></li>
                <li class="nav-item "><a href="take_test.php" class="nav-link">Take Test</a></li>
                </li><li class="nav-item "><a href="contact-us.php" class="nav-link">Contact Us</a></li>
                <li class="nav-item "><a href="about.php" class="nav-link">About Us</a></li>
                <?php
                 include_once 'dbConnection.php';
                session_start();
                  if(!(isset($_SESSION['email']))){
                // header("location:index.php");
                  echo '<li class="nav-item "><a href="login.php" class="nav-link">Login</a></li>';
                  // header("location:index.php?w=you are not logged in");

                }
                else
                {
                $name = $_SESSION['name'];
                $email=$_SESSION['email'];

                include_once 'dbConnection.php';
                echo '<li class="nav-item "><a href="profile.php?=index.php" class="nav-link">'.$name.'</a></li>';
                echo '<li class="nav-item "><a href="logout.php?q=index.php" class="nav-link">Logout</a></li>';
                }?>
            </ul>
        </div>
    </nav>
<!-- </div> -->

<div class="container">
    <div class="row mb-5">
        <div class="col-12 text-center fs-24 text-light">
            <span>Contact Us</span>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <button class="alert alert-primary mb-2"><a href="mailto:user@tfspot.com">user@tfspot.com</a></button>
            <div class="mt-5 ">
                <a href="#"><img src="asset/icon/fb.jpg" width="40"></a>
                <a href="#"><img src="asset/icon/twitter.png" width="40"></a>
                <a href="#"><img src="asset/icon/skype.png" width="40"></a>
                <a href="#"><img src="asset/icon/insta2.png" width="45"></a>
            </div>
        </div>
        <div class="col-9">
            <div id="contact" class="container ">
             
                <form action="contact-us_action.php?q=contact-us.php" method="post" name="conForm"  class="login-box">
                  <div class="row">
                    <div class="col-sm-6 ">
                      <input type="text" class="" id="email" name="email" placeholder="Enter Email-Id"  >
                    </div>
                  </div>
                  <textarea class="" id="feedback" name="feedback" placeholder="Write Something here..." rows="5"></textarea><br>
                  <div class="row">
                    <div class="col-sm-12 ">
                      <input type="submit" value="Send" name="submit" class="btn btn-dark btn-block pull-right" >
                    </div>
                  </div>
                </form>
              </div>
            </div>
    </div>
</div>

</body>
</html>
