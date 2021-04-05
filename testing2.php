<?php
session_start();
 require("Mysql/config.php");
 require("CSS/CSS.php");
if(!$_GET['subject_id']) {
	die("<h2>Require Subject ID</h2>");
}
?>


<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Testing Personality</title>
<style>
	@import "global.css";
	article {
		text-align:center;
		padding-bottom: 10px;
	}
	section#top span#title {
		display: inline-block;
		width: 680px;
	}
	section#top span#date-test {
		display:inline-block;
		width: 200px;
		font-size: smaller;
		color: navy;
		text-align: right;
	}
	section#top {
		margin-bottom: 10px;
		text-align: left !important;
	}
	div#table-container table {
		margin: auto;
		border-collapse: collapse;
	}
	td {
		vertical-align: top;
		border-radius: 5px;
		padding: 10px 0px 30px 0px;
		text-align: left !important;
	}
	td#content {
		width: 720px;
		background:#fdefef;
	}
	td#aside {
		width: 150px;
		background: #f9cacc;
		border-left: solid 3px white;
	}
	td#content div {
		display: inline-table;
		margin: 2px 1px;
	}
	div.number {
		width: 50px;
		text-align: right !important;
		font: bold 16px tahoma;
		color: brown;
	}
	div.question {
		width: 650px;
		text-align: left !important;
		font: bold 16px tahoma;
		color: blue;

	}
	div.radio {
		width: 80px;
		text-align: right !important;
	}
	div.choice {
		width: 620px;
		text-align: left !important;
	}
	div.question p {
		margin: 5px;
	}
	hr.separator {
		width: 95%;
	}
	td#aside > div#fin {
		text-align: center;
	}
	td#aside > div#fin > button {
		margin-bottom: 5px;
		background: #F30;
		border: solid 1px gray;
		padding: 3px 5px;
		color: yellow;
		font-weight: bold;
		border-radius: 5px;
	}
	td#aside > div#fin > button:hover {
		background: #b1e6ff;
		color: brown;
		cursor: pointer;
	}
	td#aside > div#fin > span {
		display:block;
	}
	td#aside > ul {
		padding-left: 30px;
	}
	td#aside ul  a {
		text-decoration: none;
		padding: 5px 0px;
	}
	td#aside ul  a:hover {
		color: red;
	}
	h3.red {
		color: red;
	}
</style>
<script src="js/jquery-2.1.1.min.js"> </script>
<script>
$(function() {
	$(':radio').change(function(event) {
		var subject_id = <?php echo $_GET['subject_id']; ?>;
		var question_id = event.target.name;
		var choice_id = event.target.value;

		$.ajax({
			url: 'select-choice.php',
			type: 'post',
			data: {'subject_id':subject_id, 'question_id':question_id, 'choice_id':choice_id},
			dataType: 'script',
			beforeSend: function() {
				$('body').css({cursor: 'wait'});
			},
			complete: function() {
				$('body').css({cursor: 'default'});
			}
		});
	});

	$('#bt-fin').click(function() {
		if(confirm('ยืนยันการเสร็จสิ้นการทำแบบทดสอบ?')) {
			var subject_id = <?php echo $_GET['subject_id']; ?>;
      var point = <?php echo $_GET['']; ?>;
			window.location = 'score.php?subject_id=' + subject_id;
		}
	});
});
</script>
</head>

<body>

<form>





<div id="container">
<?php
include "header.php";
include "dblink.php";

//อ่านค่าวันเวลาที่กำหนดในการทำแบบทดสอบเพื่อนำไปแสดงที่ section#top
$subject_id = $_GET['subject_id'];
$sql = "SELECT subject_text		FROM subject WHERE subject_id = $subject_id";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_array($result);
$subject = $row[0];

?>
<article>

<section id="top">
<center>	<h2>แบบทดสอบ</h2></center>
    <center><h3><span id="title"><b>ประเภท :</b> <?php echo $subject; ?></span></h3></center>

</section>

<?php

//ถ้าเป็นผู้ทำแบบทดสอบ และเคยทำแบบทดสอบหัวข้อนี้ไปแล้ว ก็จะไม่อนุญาตให้ทำซ้ำอีก
if(isset($_SESSION['testee_id'])) {
	$testee_id = $_SESSION['testee_id'];
	$sql = "SELECT COUNT(*) FROM score WHERE subject_id = $subject_id AND testee_id = $testee_id";
	$result = mysqli_query($link, $sql);
	$row = mysqli_fetch_array($result);
	if($row[0] !=0) {
		mysqli_close($link);
		echo "<h4>ท่านได้ทำแบบสอบทดสอบหัวข้อนี้ไปแล้ว ไม่สามารถทำซ้ำได้อีก</h4>
				</article>";
		include "footer.php";
		echo "</div></body></html>";
		exit;
	}
}
//ตรวจสอบว่ามีคำถามของหัวข้อนี้หรือไม่
$sql = "SELECT COUNT(*) FROM question WHERE subject_id = $subject_id";
$result = mysqli_query($link, $sql);
if(mysqli_num_rows($result) == 0) {
	mysqli_close($link);
	echo "<h4>ยังไม่มีคำถามสำหรับแบบทดสอบหัวข้อนี้</h4>
			</article>";
	include "footer.php";
	echo "</div></body></html>";
	exit;
}
?>
<div id="table-container">
<table>
<tr><td id="content">
<?php
$begin = 1;   //แถวเริ่มต้นในการอ่านข้อมูล
if($_GET['begin']) {
	$begin = $_GET['begin'];
}
$length = 10;	//จำนวนคำถามในการอ่านข้อมูลแต่ละช่วง
if($_GET['length']) {
	$length = $_GET['length'];
}

$begin--;   //ลำดับแถวใน MySQL เริ่มจาก 0
$sql = "SELECT * FROM question WHERE subject_id = $subject_id LIMIT $begin, $length";
$result = mysqli_query($link, $sql);
$num = $begin + 1;
$first_row = true;
while($data = mysqli_fetch_array($result)) {
	if(!$first_row) {
		echo '<hr class="separator">';
	}
	//แสดงลำดับข้อ, คำถาม และรูปภาพ(ถ้ามี)
	$question_text = $data['question_text'];
	$question_id = $data['question_id'];
	$sql = "SELECT * FROM choice WHERE question_id = $question_id ORDER BY choice_id ASC";
	$r = mysqli_query($link, $sql);

	echo'<div class="number">'.$num.'.</div>
	 		<div class="question">'.$question_text;

	if($data['image']!=null) {		//ถ้ามีรูปภาพประกอบ
		echo '<p><img src="read-img.php?question_id='.$question_id.'"></p>';
	}
	echo '</div><br>';

	//แสดง radio และตัวเลือกของคำถามนั้นๆ
	while($ch = mysqli_fetch_array($r)) {
		//ถ้าเป็นผู้ทำแบบทดสอบ จะตรวจสอบว่าเคยเลือกตัวเลือกของคำถามข้อนั้นไว้ก่อนหรือไม่
		$checked = "";
		if(isset($_SESSION['testee_id'])) {
			$testee_id = $_SESSION['testee_id'];
			$sql = "SELECT choice_id FROM testing WHERE testee_id = $testee_id AND question_id = $question_id";  //AND subject_id = $subject_id
			$choose = mysqli_query($link, $sql);
			$row = mysqli_fetch_array($choose);
			$id = $row[0];
			if($id == $ch['choice_id']) { //ถ้าเคยเลือกตัวเลือกนั้น ให้เติมแอตทริบิวต์ checked ไว้ในแท็กของ radio
				$checked = " checked";
			}
		}
//		echo "<div class=\"radio\"><input type=\"radio\"name=\"$question_id\" value=\"{$ch['$answer']}\"$checked></div>
	//			<div class=\"choice\">{$ch['answer']}</div><br>";

        	echo "<input type=\"radio\" name=\"$question_id\" value=\"{$ch['answer']}\"> {$ch['choice_text']}<br>";
	}
	$num++;
	$first_row = false;
}
?>
</td>
<td id="aside">
<div id="fin">

	<span>คำถามลำดับที่:</span>
</div>
<?php
//นับจำนวนคำถามว่ามีกี่ข้อ
$sql = "SELECT COUNT(*) FROM question WHERE subject_id = $subject_id";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_array($result);
$num_question = $row[0];

//ค่า $length จำนวนข้อในแต่ละช่วง ซึ่งตัวแปรนี้กำหนดค่าไว้ตั้งแต่ขั้นตอนก่อนนี้แล้ว
$group = intval($num_question / $length);
$remain = $num_question % $length;  //เศษที่ไม่ถึงค่า $length
echo "<ul>";
for($i = 1; $i <= $group; $i++) {
	$begin = (($i - 1) * $length) + 1;  //เช่นถ้า $length = 5 ค่า $begin จะเป็น 1, 6, 11, 16, ...
	$end = $i  * $length;  //เช่นถ้า $length = 5 ค่า $end จะเป็น 5, 10, 15, 20, ...
	question_range($begin, $end);
}
if($remain > 0) {  //กรณีมีเศษที่ไม่ถึงค่า $length
	$begin = $num_question-$remain+1;
	$end = $num_question;
	question_range($begin, $end);
}
echo "</ul>";
function question_range($begin, $end) {
	global $subject_id, $length;
	$url = $_SERVER['PHP_SELF'];
	echo "<li><a href=\"$url?subject_id=$subject_id&begin=$begin&length=$length\">$begin - $end</a></li>";
}
mysqli_close($link);
?>
</td>
</tr>
</table>

</div>
<center>


  <a href="testing.php?subject_id=1&begin=1&length=10"><input type="button" value="หัวข้อที่ 1"></a>
	<a href="testing.php?subject_id=2&begin=1&length=15"><input type="button" value="หัวข้อที่ 2"></a>
	<a href="testing.php?subject_id=3&begin=1&length=10"><input type="button" value="หัวข้อที่ 3"></a>
	<a href="testing.php?subject_id=4&begin=1&length=10"><input type="button" value="หัวข้อที่ 4"></a>
  <a href="testing.php?subject_id=5&begin=1&length=10"><input type="button" value="หัวข้อที่ 5"></a>
  <a href="home.php"><input type="button" value="ย้อนกลับไปหน้า HOME"></a><br><br>

<!-- <p><button onclick="includePoint()" type="button">ส่งคำตอบหัวข้อลำดับที่ (<?php echo $subject_id; ?>)</button></p> -->
 <p><button onclick="includePoint()" type="button">ถัดไป</button></p>
 <p><button onclick="resetPoint()" type="button">Clear Point</button></p>

<!-- <button type="button" id="bt-fin">ส่งคำตอบหัวข้อลำดับที่ (<?php echo $subject_id; ?>)</button>
<div id="result1"></div>
<div id="result2"></div>
<div id="result3"></div>
<div id="result4"></div>
<div id="result5"></div> -->
</article>
<?php include "footer.php"; ?>
</div>
</form>
</body>
</html>

<script>
var sessPoint1 = 0;
var sessPoint2 = 0;
var sessPoint3 = 0;
var sessPoint4 = 0;
var sessPoint5 = 0;
var total = 0;

function resetPoint() {
  sessionStorage.setItem("point[1]", 0);
  sessionStorage.setItem("point[2]", 0);
  sessionStorage.setItem("point[3]", 0);
  sessionStorage.setItem("point[4]", 0);
  sessionStorage.setItem("point[5]", 0);
}

function includePoint() {
  var arrPoint = [];
  var form = document.forms[0];
 //var milk = "";
  var txt = 0;
  var i;
  var count = 0;
  var quiz = <?php echo $subject_id; ?>;
  for (i = 0; i < form.length; i++) {
    if (form[i].checked) {
      txt += parseFloat(form[i].value);
      count++;
    }

  }
    console.log("count : " + count);
    console.log("quiz : " + quiz);
if(quiz == 1 && count == 10) {
window.location.href="testing.php?subject_id=2&begin=1&length=15";
} else if(quiz == 2 && count == 15) {
window.location.href="testing.php?subject_id=3&begin=1&length=10";
} else if(quiz == 3 && count == 10) {
window.location.href="testing.php?subject_id=4&begin=1&length=14";
} else if(quiz == 4 && count == 14) {
window.location.href="testing.php?subject_id=5&begin=1&length=16";
} else if(quiz == 5 && count == 16) {
window.location.href="smell0.php";
}
else {
  alert('กรุณาใส่ ทำแบบทดสอบให้ครบ');
}

  arrPoint[<?php echo $subject_id-1; ?>] = txt;
  sessionStorage.setItem("point[<?php echo $subject_id; ?>]", arrPoint[<?php echo $subject_id-1; ?>]);
//  document.getElementById("order").value = "Your Point : " + sessPoint1;
/* console.log(sessionStorage.getItem("point[<?php echo $subject_id; ?>]"));
 console.log("point1 : " + sessionStorage.getItem("point[1]"));
 console.log("point2 : " + sessionStorage.getItem("point[2]"));
 console.log("point3 : " + sessionStorage.getItem("point[3]"));
 console.log("point4 : " + sessionStorage.getItem("point[4]"));
 console.log("point5 : " + sessionStorage.getItem("point[5]"));*/

 var neuroticism = (parseFloat(sessionStorage.getItem("point[1]"))/30)*100;
 var extraversion = (parseFloat(sessionStorage.getItem("point[2]"))/45)*100;
 var openness = (parseFloat(sessionStorage.getItem("point[3]"))/30)*100;
 var agreeableness = (parseFloat(sessionStorage.getItem("point[4]"))/42)*100;
 var conscientiousness = (parseFloat(sessionStorage.getItem("point[5]"))/48)*100;
 var textNeuroticism = "";
 var textExtraversion = "";
 var textOpenness = "";
 var textAgreeableness = "";
 var textConscientiousness = "";
if(neuroticism > 0){
   if(neuroticism > 55.56){
     textNeuroticism = "เด่น";
   } else if (neuroticism >= 40.00){
     textNeuroticism = "ปานกลาง";
   } else {
     textNeuroticism = "ด้อย";
   }
   sessionStorage.setItem("textNeuroticism", textNeuroticism);
   document.getElementById("result1").innerHTML = "You Point :" + neuroticism.toFixed(2) + " % Status : " + textNeuroticism + "<br>";

 }
 if(extraversion > 0){
   if(extraversion >= 88.89){
     textExtraversion = "เด่น";
   } else if (extraversion > 72.23){
     textExtraversion = "ปานกลาง";
   } else {
     textExtraversion = "ด้อย";
   }
   sessionStorage.setItem("textExtraversion", textExtraversion);
    document.getElementById("result2").innerHTML = "You Point :" + extraversion.toFixed(2) + " % Status : " + textExtraversion + "<br>";
 }
 if(openness > 0){
   if(openness >= 82.22){
     textOpenness = "เด่น";
   } else if (openness > 68.89){
     textOpenness = "ปานกลาง";
   } else {
     textOpenness = "ด้อย";
   }

     sessionStorage.setItem("textOpenness", textOpenness);
     document.getElementById("result3").innerHTML = "You Point :" + openness.toFixed(2) + " % Status : " + textOpenness + "<br>";
 }

if(agreeableness > 0){
 if(agreeableness >= 82.35){
   textAgreeableness = "เด่น";
 } else if (agreeableness > 68.63){
   textAgreeableness = "ปานกลาง";
 } else {
   textAgreeableness = "ด้อย";
 }
  sessionStorage.setItem("textAgreeableness", textAgreeableness);
 document.getElementById("result4").innerHTML = "You Point :" + agreeableness.toFixed(2) + " % Status : " + textAgreeableness+ "<br>";
}

if(conscientiousness > 0){
 if(conscientiousness >= 82.35){
   textConscientiousness = "เด่น";
 } else if (conscientiousness > 68.63){
   textConscientiousness = "ปานกลาง";
 } else {
   textConscientiousness = "ด้อย";
 }
 sessionStorage.setItem("textConscientiousness", textConscientiousness);
  document.getElementById("result5").innerHTML = "You Point :" + conscientiousness.toFixed(2) + " % Status : " + textConscientiousness + "<br>";
  }
}





</script>
