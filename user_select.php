<?php
$sql="SELECT * FROM user WHERE userid='$userid'";
require("Mysql/connect.php"); //เรียก connection
$result=mysqli_query($conn,$sql);
$record=mysqli_fetch_array($result);
$userid=$record[0];
$uname=$record[1];
$upassword=$record[2];
$Sex=$record[3];
$Age=$record[4];
$Salary=$record[5];
$Email=$record[6];
$Education=$record[7];
$Status=$record[8];
$ephoto="images/".$userid.".jpg";
require("Mysql/unconn.php");
  ?>
