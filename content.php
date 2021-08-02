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
    <!-- <link rel="stylesheet" href="../asset/css/bootstrap-theme.min.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="../asset/css/global.css"> -->


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
    <script src="../asset/js/jquery.js"></script>
    <script src="../asset/js/jquery.min.js"></script>
    <!-- <script src="../asset/js/jquery-3.4.1.slim.min.js"></script> -->
    <script src="../asset/js/popper.min.js"></script>
    <script src="../asset/js/bootstrap2.js"></script>
    <script src="../asset/js/bootstrap.min2.js"></script>

    <style>

        .bg-img{
            background-image: url('../asset/img/img3.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .box{
            background-color: rgba(0,0,0,0.8);
            color: white;
            padding: 10px;
            border-radius: 10px;
            margin-bottom: 10px;
        }
        label{
            font-weight: 500;
            color: #ccc;
        }
        .well{
            padding: 20px;
            background-color: rgba(60,60,60,0.9);
            border-radius: 10px;
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
                <li class="nav-item "><a href="forum.php" class="nav-link">Forum</a></li>
                <li class="nav-item "><a href="../take_test.php" class="nav-link">Take Test</a></li>
                </li><li class="nav-item "><a href=".../contact-us.php" class="nav-link">Contact Us</a></li>
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

        <hr>
        
        
            <div class="panel box">
                <div class="panel-heading">
                    <h3 class="panel-title ">Programming</h3>
                    <hr class="bg-light">
                </div> 
                <div class="panel-body">
         
              
                
                <?php

                     $id = $_GET['post_id'];
                     
                
                $sql = $conn->query("SELECT * from tblpost as tp join category as c on tp.cat_id=c.cat_id where tp.post_Id='$id' ");
                if($sql==true){
                  while($row=$sql->fetch_assoc()){
                    extract($row);
                    if($user_Id==000){
                       echo "<label>Topic Title: </label> ".$title."<br>";
                       echo "<label>Topic Category: </label> ".$category."<br>";
                       echo "<label>Date time posted: </label> ".$datetime;
                       echo "<p class='well'>".$content."</p>";
                       echo "<label>Posted By: </label> Admin";
                    }
                    else{
                      $sel = $conn->query("SELECT * from tbluser where user_Id='$user_Id' ");
                      while($row=$sel->fetch_assoc()){
                        extract($row);
                        echo "<label>Topic Title: </label> ".$title."<br>";
                       echo "<label>Topic Category: </label> ".$category."<br>";
                       echo "<label>Date time posted: </label> ".$datetime;
                       echo "<p class='well'>".$content."</p>";
                       echo '<label>Posted By: </label>'.$fname;
                      }
                      
                    }
                    
         
                }
                }
                
              
                    
              ?>
              <hr class="bg-light">
              <br><label>Comments</label><br>
              <div id="comments">
              <?php 
              $postid= $_GET['post_id'];
              $sql = $conn->query("SELECT * from tblcomment as c join tbluser as u on c.user_Id=u.user_Id where post_Id='$postid' order by datetime");
              $num = $sql->num_rows;
              if($num>0){
              while($row=$sql->fetch_assoc()){
                    echo "<label>Comment by: </label> ".$row['fname']."<br>";
                     echo '<label class="pull-right">'.$row['datetime'].'</label>';
                     echo "<p class='well'>".$row['comment']."</p>";
              }

            }

              ?>
            </div>
              </div>
          </div>
          <hr>
            <div class="col-sm-5 col-md-5 sidebar">
          <h3>Comment</h3>
          <form method="POST">
            <textarea type="text" class="form-control well" name="comment" id="commenttxt"></textarea><br>
            <input type="hidden" id="postid" name="postid" value="<?php echo $_GET['post_id']; ?>">
            <input type="hidden" id="userid" name="userid" value="<?php echo $_SESSION['userid']; ?>">
            <input type="submit" id="save" class="btn btn-success pull-right" value="Comment">
          </form>
        </div>
    </div>
                   

</body>

<script>

$("#save").click(function(){
var postid = $("#postid").val();
var userid = $("#userid").val();
var comment = $("#commenttxt").val();
var datastring = 'postid=' + postid + '&userid=' + userid + '&comment=' + comment;
if(!comment){
  alert("Please enter some text comment");
}
else{
  $.ajax({
    type:"POST",
    url: "addcomment.php",
    data: datastring,
    cache: false,
    success: function(result){
      document.getElementById("commenttxt").value=' ';
      $("#comments").append(result);
    }
  });
}
return false;
});

</script>

</html>
