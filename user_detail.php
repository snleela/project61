<?php require("Mysql/config.php");
require("CSS/CSS.php");?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <title>
     Personality
   </title>


  </head>
  <body>
    <?php
   $userid =$_GET['userid'];
    require("user_select.php");
     ?>
     <center>
       <h3>ข้อมูลส่วนตัวของผู้ใช้</h3>
    <table border="2" cellspacing="0" cellpadding="3" class="div3">

      <tr>
        <td colspan="2" align="center" valign="top" class="div2">
         <img src="<?php echo($ephoto);?>" width="128" height="133"> </td>
      </tr>
        <tr>
        <td align ="center" vallgn="top" class="div3">ID:</td>
        <td align ="center" vallgn="top" class="div3"><?php echo ($userid);?></td>
      </tr>
      <tr>
      <td align ="center" vallgn="top" class="div3">Username:</td>
      <td align ="center" vallgn="top" class="div3"><?php echo ($uname);?></td>
    </tr>
    <tr>
    <td align ="center" vallgn="top" class="div3">Password:</td>
    <td align ="center" vallgn="top" class="div3"><?php echo ($upassword);?></td>
  </tr>
  <tr>
  <td align ="center" vallgn="top" class="div3">Sex:</td>
  <td align ="center" vallgn="top" class="div3"><?php echo ($Sex);?></td>
</tr>
<tr>
<td align ="center" vallgn="top" class="div3">Age:</td>
<td align ="center" vallgn="top" class="div3"><?php echo ($Age);?></td>
</tr>
<tr>
<td align ="center" vallgn="top" class="div3">Salary:</td>
<td align ="center" vallgn="top"class="div3"><?php echo ($Salary);?></td>
</tr>
<tr>
<td align ="center" vallgn="top" class="div3">Email:</td>
<td align ="center" vallgn="top" class="div3"><?php echo ($Email);?></td>
</tr>

<tr>
<td align ="center" vallgn="top" class="div3">Education:</td>
<td align ="center" vallgn="top" class="div3"><?php echo ($Education);?></td>
</tr>
<tr>
<td align ="center" vallgn="top" class="div3">Status:</td>
<td align ="center" vallgn="top" class="div3"><?php echo ($Status);?></td>
</tr>

  <tr>
  <td colspan="2" align="center" valign="top" class="div2">
    <a href="user_form.php?userid=<?php echo($userid);?>">Edit</a>
    <a href="javascript:removedata();">Remove </a>
  </td>
</tr>
<tr>
<td colspan="2" align="center" valign="top" class="div2">
  <a href="javascript:window.history.back();">Back</a>
  <a href="user_list.php">Home</a>
</td>
</tr>
    </table>
  </center>
    <script language="javascript">
      function removedata(){
        if(confirm("ยืนยันการลบข้อมูล")== true){
          window.location.href="user_delete.php?userid=<?php echo($userid);?>";
        }
      }
    </script>
  </body>
</html>
