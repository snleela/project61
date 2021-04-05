<html>
<head>
<title>save</title>
</head>
<body>
<?php
include("DB.php");
$DB = new DB();
$DB->openConnection();

	$Username = $_POST['Username'];
	$day = $_POST['day'];
	$month = $_POST['month'];
	$year = $_POST['year'];

	echo $day."<br>".$month."<br>".$year;

	$age = 2561 - $year;
	$sql = " SELECT * FROM user WHERE Username = '$Username' ";
	$sqlquery = mysqli_query($con,$sql);
	$num = mysqli_num_rows($sqlquery);

	if($num<=0){
		echo "Register sucess";
		$sql = " INSERT INTO user(Username,Password,sex,Age,Salary,Email,Telephone,Education,State,Status)
				VALUES ('$Username','".($_POST['Password'])."','".$_POST['sex']."','$age'
				,'".$_POST['Salary']."','".$_POST['Email']."','".$_POST['Telephone']."','".$_POST['Education']."'
				,'".$_POST['State']."',1)";
	$sqlquery = mysqli_query($con,$sql);
	}else{
		while($user1 = mysqli_fetch_array($sqlquery)){
			if($user1['Username'] == $day){
				echo "Username duplicate";
			}

		}
	}
	//header ('location:index.php?$id=1');


?>
<script language="javascript">
var num = <?php echo($v1);?>;
if(v1<=0){
  alert("การบันทึกข้อมูลเสร็จสิ้น");
  window.location.replace("user_detail.php?userid=<?php echo($userid);?>");
}else{
  alert("การบันทึกข้อมูลผิดพลาด");
  window.history.back();
}
</script>
</body>
</html>
