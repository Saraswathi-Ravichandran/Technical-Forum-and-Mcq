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
            background-image: url('asset/img/back.jpg');
            background-size: cover;
            background-repeat: no-repeat;
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
                
        <div  class="navbar-collapse collapse" id="myNav" style="margin-left: 200px">
            <ul class="navbar-nav ">
                <li class="nav-item "><a href="index.php" class="nav-link">
                    <i class="fa fa-home">Home</i></a></li>
                <li class="nav-item "><a href="forum/forum.php" class="nav-link">Forum</a></li>
                <li class="nav-item "><a href="take_test.php" class="nav-link">Take Test</a></li>
                </li><li class="nav-item "><a href="contact-us.php" class="nav-link">Contact Us</a></li>
                <li class="nav-item "><a href="about.php" class="nav-link">About Us</a></li>
                <li class="nav-item "><a href="#" class="nav-link">Login</a></li>
            </ul>
        </div>
    </nav>
<!-- </div> -->

<!-- <div class="container"> -->
    <div class="login-box">
        <div class="top-name">   
            <a href="login.php" class="mr-4 text-black">Login</a>
            <a href="#" class="text-black">Register</a>
        </div>
        <form class="form" id="form" name="form" action="register_action.php?q=register.php" onSubmit="return validateForm()" method="POST">
            <input id="name" name="name" placeholder="Enter your name" type="text"><br>
            <input id="email" name="email" placeholder="Enter your email-id" type="email"><br>
            <input id="password" name="password" placeholder="Enter your password" type="password"><br>
            <input id="cpassword" name="cpassword" placeholder="Conform Password" type="password"><br>
            <span style="color: #aaa">Gender: </span>
            <input type="radio" id="gender" name="gender" value="M"  ><span style="color: #aaa">Male</span>
            <input type="radio" id="gender" name="gender" value="F" ><span style="color: #aaa">Female</span>
            <input type="radio" id="gender" name="gender" value="O"><span style="color: #aaa">Others</span><br>
            <span style="color: #aaa">Category: </span>
            <input type="radio" id="category" name="category" value="student"><span style="color: #aaa">Student</span>
            <input type="radio" id="category" name="category" value="staff"><span style="color: #aaa">Staff</span>
            <input type="radio" id="category" name="category" value="professional"><span style="color: #aaa">Professional</span><br>
            <input id="mob" name="mob" placeholder="Enter Phone no." type="text"><br>
            <input type="checkbox" name="terms" ><span style="color: #aaa">agree term and conditions</span>
            <input class="btn btn-block btn-warning" value="Register" type="submit" name="register">
        </form>
    </div>
</div>

</body>
</html>

<script>
function validateForm() {
    var y = document.forms["form"]["name"].value;  
    var letters = /^[A-Za-z]+$/;
    if (y == null || y == "") 
        {
            alert("Name must be filled out.");
            return false;
        } 
        var x = document.forms["form"]["email"].value;
        var atpos = x.indexOf("@");
        var dotpos = x.lastIndexOf(".");
        if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) 
            {
                alert("Not a valid e-mail address.");
                return false;
            }
            var a = document.forms["form"]["password"].value;
            if(a == null || a == "")
                {
                    alert("Password must be filled out");
                    return false;
                }
            if(a.length<5 || a.length>25)
                {
                    alert("Passwords must be 5 to 25 characters long.");
                    return false;
                }
            var b = document.forms["form"]["cpassword"].value;
            if (a!=b)
                {
                    alert("Passwords must match.");
                    return false;
                }
            }
</script>
