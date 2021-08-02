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
                <li class="nav-item "><a href="user.php" class="nav-link">User</a></li>
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

    <div class="card" >
                <div class="card-header">Users Feedback</div>
                <div class="card-body">
                    <table class="table  table-hover ">
                        <tr>
                            <th>SN</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Date</th>
                        </tr>
                        <?php 
                        $result = $conn->query("SELECT * FROM `feedback` ORDER BY `feedback`.`date` DESC");
                       
                        $c=1;
                        while($row = $result->fetch_array()) {
                            $id = $row['id'];
                            $email = $row['email'];
                            $feedback = $row['feedback'];
                            $date = $row['date'];

                            echo '<tr>
                            <td>'.$c++.'</td>
                            <td>'.$email.'</td>
                            <td>'.$feedback.'</td>
                            <td>'.$date.'</td>
                            <td><button class="btn btn-danger"><a class="text-light" href="../main_action.php?fdid='.$id.'">Remove</a></button></td>
                            </tr>';
                        }
                        $c=0; ?>
                        
                        
                    </table>
                </div>
            </div>

</div>
</div>
    </div>
    </body>
</html>
