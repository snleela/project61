<?php require("Mysql/config.php");?>
<html>
<body>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <title>Personality</title>
</head>

<body>
  <?php

  $day = $_POST['day'];
	$month = $_POST['month'];
	$year = $_POST['year'];

	echo $day."<br>".$month."<br>".$year;

	$Age = 2561 - $year;
$userid=$_POST['userid'];
$uname=$_POST['uname'];
$upassword=$_POST['upassword'];
$Sex=$_POST['Sex'];
$Salary=$_POST['Salary'];
$Email=$_POST['Email'];
$Education=$_POST['Education'];
$Status=$_POST['Status'];
$photo="images/".$userid.".jpg";
$nullphoto = "images/null.jpg";

$sql="INSERT INTO user(userid,uname,upassword,Sex,Age,Salary,Email,Education,Status)
VALUES ('$userid','$uname','$upassword','$Sex','$Age','$Salary','$Email','$Education',1)";
require("Mysql/connect.php"); //เรียก connection
$result=mysqli_query($conn,$sql);

if($result == 1){ //เงื่อนไขในการอัพโหลดรูปลงในเว็บ
  $v1=1;
  if(!move_uploaded_file($_FILES['ephoto']['tmp_name'],$photo)){
    copy($nullphoto,$photo);
  }
}else{
  $v1=0;
}
require("Mysql/unconn.php");
  ?>

  <script language="javascript">
  var v1 = <?php echo($v1);?>;
  if(v1==1){
    alert("การบันทึกข้อมูลเสร็จสิ้น");
    window.location.replace("user_detail.php?userid=<?php echo($userid);?>");
  }else{
    alert("การบันทึกข้อมูลผิดพลาด");
    window.history.back();
  }
</script>
</body>
</html>
