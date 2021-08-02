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
            background-image: url('../asset/img/img2.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .box{
            background-color: rgba(0,0,0,0.7);
            color: white;
            padding: 10px;
            border-radius: 10px;
            margin-bottom: 10px;
        }
       

    </style>

</head>
<body class="bg-img">
<!-- <div class="bg-img" > -->
<!-- <div class="layer"></div> -->
    <nav class="navbar  navbar-expand-sm">
        <div class="navbar-brand ml-auto fs-24">
            TFspot
        </div>        
        <div  class="navbar-collapse collapse" id="myNav" style="margin-left: 200px">
            <ul class="navbar-nav ">
                <li class="nav-item "><a href="../index.php" class="nav-link">
                    <i class="fa fa-home">Home</i></a></li>
                <li class="nav-item "><a href="#" class="nav-link">Forum</a></li>
                <li class="nav-item "><a href="../take_test.php" class="nav-link">Take Test</a></li>
                </li><li class="nav-item "><a href="../contact-us.php" class="nav-link">Contact Us</a></li>
                <li class="nav-item "><a href="../about.php" class="nav-link">About Us</a></li>
                <?php
                 include_once '../dbConnection.php';
                session_start();
                  if(!(isset($_SESSION['email']))){
                // header("location:index.php");
                  echo '<li class="nav-item "><a href="../login.php" class="nav-link">Login</a></li>';
                  header("location:../login.php?w=you are not logged in");

                }
                else
                {
                $name = $_SESSION['name'];
                $email=$_SESSION['email'];
                $userid=$_SESSION['userid'];

                include_once '../dbConnection.php';
                echo '<li class="nav-item "><a href="../profile.php?=index.php" class="nav-link">'.$name.'</a></li>';
                echo '<li class="nav-item "><a href="../logout.php?q=index.php" class="nav-link">Logout</a></li>';
                }?>
            </ul>
        </div>
    </nav>
<!-- </div> -->
    <div class="container" >
        <h4 class="col-2 text-center alert alert-dark" style="border-radius: 10px;">Discussion</h4>
    <button class="btn btn-dark offset-9" data-toggle="modal" data-target="#quest"> Post a Question</button>

        <hr>
        
        
                        <?php  include "../dbConnection.php";

                        $sel = $conn->query("SELECT * from category");
                        while($row=$sel->fetch_assoc()){
                            extract($row);
                           echo '<div class="panel box">
                                    <div class="panel-heading">
                                    <h4 class="panel-title">'.$category.'</h4>
                                    </div> 
                                    <div class="panel-body">
                                    <table class="table table-stripped text-light">
                                    <tr>
                                    <th>Topic title</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                    </tr>';
                                    $sel1 = $conn->query("SELECT * from tblpost where cat_id='$cat_id' ");
                                    while($row1=$sel1->fetch_assoc()){
                                        extract($row1);
                                        echo '<tr>';
                                        echo '<td>'.$title.'</td>';
                                        echo '<td>'.$category.'</td>';
                                        echo '<td><a href="content.php?post_id='.$post_Id.'"><button class="btn btn-success">View</button></td>';
                                        echo '</tr>';
                                    }


                                echo '</table>
                                    </div>
                                </div>';
                        }
                        ?>
                   



    <div class="modal fade" id="quest">
        <div class="modal-dialog">
            <div class="modal-content"> 
                <div class="modal-body">
                <form method="POST" action="question_function.php">
                        
                         <label>Category</label>
                        <select name="category" class="form-control">
                            <option></option>
                            <?php $sel = $conn->query("SELECT * from category");

                                if($sel==true){
                                    while($row=$sel->fetch_assoc()){
                                        extract($row);
                                        echo '<option value='.$cat_id.'>'.$category.'</option>';
                                    }
                                }
                            ?>
                            
                        </select>
                        <label>Topic Title</label>
                        <input type="text" class="form-control" name="title"required>
                        <label>Content</label>
                        <textarea name="content"class="form-control"></textarea>
                       <br>
                        <input type="hidden" name="userid" value=<?php echo $userid; ?>>
                        <input type="submit" class="btn btn-success pull-right" value="Post">
                   </form><br>
                <hr>
                  <a href="" class="pull-right">Close</a>
              </div>
          </div>
        </div>
    </div>

</body>
</html>
