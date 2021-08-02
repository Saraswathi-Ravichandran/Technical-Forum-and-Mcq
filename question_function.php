<?php

include "../dbConnection.php";
                    date_default_timezone_set("Asia/Kolkata");
                        $datetime=date("Y-m-d h:i:sa");
                        
extract($_POST);
$userid = $_POST['userid'];
$sql = "INSERT INTO tblpost(title,content, cat_id,datetime,user_Id) VALUES ('$title','$content','$category','$datetime','$userid')";
$res = $conn->query($sql);

                        if($res==true)
                            {
                                   echo '<script language="javascript">';
                                    echo 'alert("Post Successfully")';
                                    echo '</script>';
                                    echo '<meta http-equiv="refresh" content="0;url=forum.php" />';
                            }
                            else{
                                echo '<script language="javascript">';
                                    echo 'alert("not")';
                                    echo '</script>';
                                    echo '<meta http-equiv="refresh" content="0;url=forum.php" />';
                            }


?>