<?php require("Mysql/config.php");?>
<html>
<body>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <title>Personality</title>
</head>

<body>
  <?php
$userid=$_GET['userid'];
$photo="images/".$userid."jpg";

$sql="DELETE FROM user WHERE userid='$userid'";
require("Mysql/connect.php"); //เรียก connection
$result=mysqli_query($conn,$sql);

if($result == 1){ //เงื่อนไขในการอัพโหลดรูปลงในเว็บ
  $v1=1;
  unlink($photo);
  }else{
  $v1=0;
}
require("Mysql/unconn.php");
  ?>

  <script languange="javascript">
  var v1 = <?php echo($v1);?>;
  if(v1==1){
    alert("การลบข้อมูลเสร็จสิ้น");
    window.location.replace("user_list.php");
  }else{
    alert("การลบข้อมูลผิดพลาด");
    window.history.back();
  }
</script>
</body>
</html>
