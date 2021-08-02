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
            background-image: url('asset/img/img3.jpg');
            background-size: 100%;
            background-repeat: no-repeat;
        }
        .box{
            border-radius: 10px;
            background-color: rgba(0,0,0,0.7);
            color: white;
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
                  header("location:index.php?w=you are not logged in");

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
    <div class="container">
       <!--  <h5 align="right">
            Time Remaining : <span id='timer'></span>
        </h5> -->
        <?php 
            $title=@$_GET['title'];
            echo '<h2 class="text-dark">'.$title.'</h2>'
        ?>
        <div class="row">
            <div class="col-8 offset-2 box p-5">
                
                <?php
                $eid=@$_GET['eid'];
                $time=@$_GET['time'];
                // echo '<span id="time">'.$time.'</span>';
                $sn=@$_GET['n'];
                $total=@$_GET['t'];
                $q=$conn->query("SELECT * FROM questions WHERE eid='$eid' AND sn='$sn' " );
                while($row=$q->fetch_array())
                {
                    $qns=$row['qns'];
                    $qid=$row['qid'];
                    echo '<span>Q&nbsp;'.$sn.'. '.$qns.'.</span>';
                }
                $q=$conn->query("SELECT * FROM options WHERE qid='$qid' " );
                echo '<form action="main_action.php?q=quiz&step=2&eid='.$eid.'&n='.$sn.'&t='.$total.'&qid='.$qid.'&title='.$title.'" method="POST"  class="mt-3">';

                while($row=$q->fetch_array() )
                {
                    $option=$row['option'];
                    $optionid=$row['optionid'];
                    echo'<input type="radio" name="ans" value="'.$optionid.'">&nbsp;'.$option.'<br/>';
                }
                echo'<button type="submit" id="next" class="btn btn-warning offset-6">Next</button></form>';
                //header("location:dash.php?q=4&step=2&eid=$id&n=$total");
                ?>
                
                   
                </form>
            </div>
        </div>
    </div>
</div>



 <script type="text/javascript" src="jquery-1.6.2.min.js"></script>


<script>
    //define your time in second
     // = document.getElementById['time'];
    // alert();
        var c=60*(<?php echo $time ?>);
        var t;
        timedCount();

        function timedCount()
        {

            var hours = parseInt( c / 3600 ) % 24;
            var minutes = parseInt( c / 60 ) % 60;
            var seconds = c % 60;

            var result = (hours < 10 ? "0" + hours : hours) + ":" + (minutes < 10 ? "0" + minutes : minutes) + ":" + (seconds  < 10 ? "0" + seconds : seconds);

            var dataString = (hours*60)+minutes;



            $('#timer').html(result);
                // $.ajax({
                //      type: "POST",
                //      url: "main_action.php",
                //      data: dataString,
                //      success: function(r) 
                //       {
                //         // window.location = 'new.php';//window.location.href = 'new.php';
                //         //$("#div").html(r);
                //       },
                //     });

            if(c == 0 )
            {
                //setConfirmUnload(false);
                //$("#quiz_form").submit();
                window.location="take_test.php?w=Your Exam Time Over";
            }
            c = c - 1;
            t = setTimeout(function()
            {
             timedCount()
            },
            1000);
        }
    </script>

</body>
</html>


