<?php require("Mysql/config.php");
      require("CSS/CSS.php");
      ?>
<html>
 <body>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <title>
     Personality
   </title>


  </head>
  <body>
    <?php
  if(isset($_GET['userid'])){
    $userid =$_GET['userid'];
    require("user_select.php");
    $action="user_update.php";
  }  else {
    $userid="";
    $uname="";
    $upassword="";
      $ephoto="images/null.jpg";
      $action="user_insert.php";

        }

     ?>
     <nav class="navbar navbar-inverse navbar-fixed-top">
     <div class="container-fluid">
       <div class="navbar-header">
         <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
         </button>
         <a class="navbar-brand" href="index.php">Project</a>
       </div>
       <div class="collapse navbar-collapse" id="myNavbar">
         <ul class="nav navbar-nav navbar-right">
           <li><a href="Logon.php"><span class="glyphicon glyphicon-log-in"> Login</a></li>
         </ul>
       </div>
     </div>
     </nav>
     <br><br>

<center>
  <center><h1><b>Register</b></h1>
  <img src="images/logo2.gif" style="width:300px;"></center>
  <div class="div2">
  <fieldset>

    <form action="<?php echo($action);?>" method="post" enctype="multipart/form-data"
   name="UserForm" target="_self" onSubmit="return checkForm();" class="w3-container ">

 <table border="1" cellspacing="0" cellpadding="5">


       <tr>
     <center>
       <td colspan="2" align="center" valign="top"  width="200" class="div2">
         <h3>ส่วนที่ 1 : Username และ Password</h3>
        <img src="<?php echo($ephoto);?>" width="120" height="133"><br>
      <input type="hidden" name="ouserid" id="ouserid"
      value="<?php echo($userid);?>">
    <center>  <input type="file" name="ephoto" id="ephoto"></td>

     </tr>

     <tr>
       <td class="div2" align ="right" valign="top" >ID:</td>
       <td class="div2" align ="left" valign="top">
         <input name="userid" type="text" id="userid"
         value="<?php echo($userid);?>"></td>
     </tr>
     <tr>
       <td class="div2" align ="right" valign="top">Username:</td>
       <td class="div2" align ="left" valign="top">
         <input name="uname" type="text" id="uname"
          value="<?php echo($uname);?>"></td>
     </tr>
     <tr>
       <td class="div2" align ="right" valign="top">Password:</td>
       <td class="div2" align ="left" valign="top">
         <input name="upassword" type="text" id="upassword"
         value="<?php echo($upassword);?>"></td>
     </tr>


     </fieldset>

       <fieldset>

         <tr>
         <td class="div2"colspan="2" align="center" valign="top">
                <h3>ส่วนที่ 2 : ข้อมูลส่วนตัว และ ข้อมูลการติดต่อ</h3>
         </tr></td>
         <td colspan="1" align="center" valign="top" class="div2">
       <b>Sex [เพศ]:</b><br>
       <i class="fa fa-male" style="font-size:36px"></i>
       <input type="radio" name="Sex" required value="male">
       <i class="fa fa-female" style="font-size:36px"></i>
       <input type="radio" name="Sex" required value="female"><br><br>
     </td>
     <td colspan="1" align="center" valign="top" class="div2">
       <b>Age:</b><br><br>
       วันที่ :
       <select name="day" required  >
           <option value="">วันที่</option>
           <option value="1">1 </option>
           <option value="2">2</option>
           <option value="3">3</option>
           <option value="4">4</option>
           <option value="5">5 </option>
           <option value="6">6</option>
           <option value="7">7</option>
           <option value="8">8</option>
           <option value="9">9 </option>
           <option value="10">10</option>
           <option value="11">11</option>
           <option value="12">12</option>
           <option value="13">13 </option>
           <option value="14">14</option>
           <option value="15">15</option>
           <option value="16">16</option>
           <option value="17">17 </option>
           <option value="18">18</option>
           <option value="19">19</option>
           <option value="20">20</option>
           <option value="21">21 </option>
           <option value="22">22</option>
           <option value="23">23</option>
           <option value="24">24</option>
           <option value="25">25 </option>
           <option value="26">26</option>
           <option value="27">27</option>
           <option value="28">28</option>
           <option value="29">29 </option>
           <option value="30">30</option>
           <option value="31">31</option>

       </select>

       เดือน :

        <select name="month" required  >
           <option value="">เดือน</option>
           <option value="มกราคม">มกราคม</option>
           <option value="กุมภาพันธ์">กุมภาพันธ์</option>
           <option value="มีนาคม">มีนาคม</option>
           <option value="เมษายน">เมษายน</option>
           <option value="พฤษภาคม">พฤษภาคม</option>
           <option value="มิถุนายน">มิถุนายน</option>
           <option value="กรกฎาคม">กรกฎาคม</option>
           <option value="สิงหาคม">สิงหาคม</option>
           <option value="กันยายน">กันยายน</option>
           <option value="ตุลาคม">ตุลาคม</option>
           <option value="พฤศจิกายน">พฤศจิกายน</option>
           <option value="ธันวาคม">ธันวาคม</option>
       </select>


       ปี :
       <select name="year" required  >
       <option value="">ปี</option>
           <option value="2490">2490 </option>
           <option value="2491">2491</option>
           <option value="2492">2492</option>
           <option value="2493">2493</option>
           <option value="2494">2494</option>
           <option value="2495">2495</option>
           <option value="2496">2496</option>
           <option value="2497">2497</option>
           <option value="2498">2498</option>
           <option value="2499">2499</option>
           <option value="2500">2500</option>
           <option value="2501">2501</option>
           <option value="2502">2502</option>
           <option value="2503">2503</option>
           <option value="2504">2504</option>
           <option value="2505">2505</option>
           <option value="2506">2506</option>
           <option value="2507">2507</option>
           <option value="2508">2508</option>
           <option value="2509">2509</option>
           <option value="2510">2510</option>
           <option value="2511">2511</option>
           <option value="2512">2512</option>
           <option value="2513">2513</option>
           <option value="2514">2514</option>
           <option value="2515">2515</option>
           <option value="2516">2516</option>
           <option value="2517">2517</option>
           <option value="2518">2518</option>
           <option value="2519">2519</option>
           <option value="2520">2520</option>
           <option value="2521">2521</option>
           <option value="2522">2522</option>
           <option value="2523">2523</option>
           <option value="2524">2524</option>
           <option value="2525">2525</option>
           <option value="2526">2526</option>
           <option value="2527">2527</option>
           <option value="2528">2528</option>
           <option value="2529">2529</option>
           <option value="2530">2530</option>
           <option value="2531">2531</option>
           <option value="2532">2532</option>
           <option value="2533">2533</option>
           <option value="2534">2534</option>
           <option value="2535">2535</option>
           <option value="2536">2536</option>
           <option value="2537">2537</option>
           <option value="2538">2538</option>
           <option value="2539">2539</option>
           <option value="2540">2540</option>
           <option value="2541">2541</option>
           <option value="2542">2542</option>
           <option value="2543">2543</option>
           <option value="2544">2544</option>
           <option value="2545">2545</option>
           <option value="2546">2546</option>
           <option value="2547">2547</option>
           <option value="2548">2548</option>
           <option value="2549">2549</option>
           <option value="2550">2550</option>
           <option value="2551">2551</option>
           <option value="2552">2552</option>
           <option value="2553">2553</option>
           <option value="2554">2554</option>
           <option value="2555">2555</option>
           <option value="2556">2556</option>
           <option value="2557">2557</option>
           <option value="2558">2558</option>
           <option value="2559">2559</option>
       </select> </td>
      <tr><td colspan="1" align="center" valign="top" class="div2">
       <b>Education:</b><br>
        <select name="Education" required id="Education" >
           <option value="">ระบุวุฒิการศึกษา</option>
           <option value="ต่ำกว่าปริญญาตรี">ต่ำกว่าปริญญาตรี </option>
           <option value="ปริญญาตรี">ปริญญาตรี</option>
           <option value="ปริญญาโท">ปริญญาโท</option>
           <option value="ปริญญาเอก">ปริญญาเอก</option>
       </select> </td>
       <td colspan="1" align="center" valign="top" class="div2">
       <b>Salary:</b><br>
       <select name="Salary" required id="Salary" >
           <option value="">ระบุเงินช่วงเงินเดือน</option>
           <option value="ต่ำกว่า 15,000">ต่ำกว่า 15,000 </option>
           <option value="15,000-35,000">15,000-35,000</option>
           <option value="35,001-55,000">35,001-55,000</option>
           <option value="สูงกว่า 55,000 ">สูงกว่า 95,000 </option>
       </select> บาท / เดือน</td></tr>
<tr> <td colspan="1" align="center" valign="top" class="div2">

       <b>Status:</b><br><br>
       <select name="Salary" required id="Salary" >
           <option value="">ระบุสถานะผู้ใช้งาน</option>
           <option value="1"> USER </option>
       </select>
    </td>
      <td colspan="1" align="center" valign="top" class="div2">
       <b>E-mail:</b><br><input type="text" name="Email" required placeholder="Email);?>" ><br>
     </td ></tr>



       </fieldset><br>
        </tr></td>
        <tr><td colspan="2" align="center" valign="top" class="div2">
       <input  type="submit" name="button" id="button"
       value="Submit">
       &nbsp;
       <input  type="reset" name="button2" id="button2"
       value="Reset">
</td></tr>
  <tr><td colspan="2" align="center" valign="top" class="div2">
     <button type="submit" id="button3"><a href="javascript:window.history.back();">Back</a></button>
      <button type="submit"id="button4"><a href="user_list.php"> Home</a></button>
   </td>
   </tr>
   </table>
</div>
</form></center>

 <script language="javascript">
   function checkForm(){
    var v1 = document.getElementById('userid').value;
    var v2 = document.getElementById('uname').value;
    var v3 = document.getElementById('upassword').value;
    if(v1.length<1){
      alert("กรอก ID:");
      document.getElementById('userid').focus();
      return false;
    }else if(v2.length<1){
      alert("กรอก Name:");
      document.getElementById('uname').focus();
      return false;
    } else if (v3.length<1){
      alert("กรอก Password:");
      document.getElementById('upassword').focus();
      return false;
    }else {
      return true;
    }
   }
 </script>
  </body>
</html>
