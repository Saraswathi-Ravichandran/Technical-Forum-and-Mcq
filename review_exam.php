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
            background-image: url('asset/img/img4.jpg');
            background-size: 100%;
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
                <?php
                 include_once 'dbConnection.php';
                session_start();
                  if(!(isset($_SESSION['email']))){
                // header("location:index.php");
                  echo '<li class="nav-item "><a href="login.php" class="nav-link">Login</a></li>';

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
            <span>General knowledge MCQ's Question and Answer</span>
        </div>
    </div>
    <div class="card" style="background-color: rgba(0,0,0,0.7); color: white">
				<div class="card-header">Exam Details</div>
				<div class="card-body">
                <table class="table table-striped table-bordered text-light">

                    <?php 
                    $title = $_GET['title'];
                    $eid = $_GET['eid'];
                    $result = $conn->query("SELECT * FROM quiz WHERE title='$title' AND eid='$eid'");
                    
                    $c=1;
                    while($row = $result->fetch_array()) {
                        $title = $row['title'];
                        $total = $row['total'];
                        $right = $row['correct'];
                        $time = $row['time'];
                        $eid = $row['eid'];
                        
                    $q12=$conn->query("SELECT score FROM history WHERE eid='$eid' AND email='$email'" );
                    $rowcount=$q12->num_rows;   
                    if($rowcount == 0){
                        echo '<tr>
                            <td><b>Exam Title</b></td>
                            <td>'.$title.'</td>
                        </tr>
                        <tr>
                            <td><b>Total Question</b></td>
                            <td>'.$total.'</td>
                        </tr>
                        <tr>
                            <td><b>Total Marks</b></td>
                            <td>'.$right*$total.'</td>
                        </tr>
                        <tr>
                            <td><b>Exam Duration</b></td>
                            <td>'.$time.'&nbsp;min</td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                                <button type="button"  class="btn btn-warning" ><a href="exam.php?q=quiz&eid='.$eid.'&n=1&t='.$total.'&title='.$title.'&time='.$time.'" class="text-dark">Enroll it</a></button>
                            </td>
                        </tr>';
                    }
                    else
                    {
                    echo '<tr>
                            <td><b>Exam Title</b></td>
                            <td>'.$title.'</td>
                        </tr>
                        <tr>
                            <td><b>Total Question</b></td>
                            <td>'.$total.'</td>
                        </tr>
                        <tr>
                            <td><b>Total Marks</b></td>
                            <td>'.$right*$total.'</td>
                        </tr>
                        <tr>
                            <td><b>Exam Duration</b></td>
                            <td>'.$time.'</td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                                <button type="button"  class="btn btn-warning disabled" ><a href="#" class="text-dark">Alredy Enrolled </a></button>
                            </td>
                        </tr>';
                    }
                    $c=0;
                    }?>
						
					</table>
				</div>
			</div>
</div>

</body>
</html>


