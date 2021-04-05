<?php require("Mysql/config.php");?>
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
    $sql = "SELECT * FROM user";
if(isset($_GET['keyword'])){
  $keyword=$_GET['keyword'];
  $sql.=" WHERE userid='$keyword' OR uname LIKE '%$keyword%'";
}else{
  $keyword="";
}
require("Mysql/connect.php");
$result=mysqli_query($conn,$sql);

?>

<center>
  <form action="user_list.php" method="get" name="SearchForm" target="_self" id="SearchForm" >
     ค้นหา : <input name="keyword" type="text"  id="keyword" value="<?php echo ($keyword);?>">
<input type="submit" name="button" id="button" value="submit">
<a href="user_list.php"> ALL </a>
<a href="user_form.php"> Addnew </a>
</form>
  <table border="0" cellspacing="0" cellpadding="5">
<!-- หัวตาราง -->
      <tr>
        <td align ="center" vallgn="top" bgcolor= "#CCCCCC">Manage</td>
      <td align ="center" vallgn="top" bgcolor= "#CCCCCC">ID</td>
      <td align ="center" vallgn="top" bgcolor= "#CCCCCC">Name</td>
      <td align ="center" vallgn="top" bgcolor= "#CCCCCC">Password</td>
    </tr>
<!-- เนื้อตาราง -->
<?php
 while ($record=mysqli_fetch_array($result)){
   $userid=$record[0];
   $uname=$record[1];
   $upassword=$record[2];
   ?>
      <tr>
          <td align ="left" vallgn="top">
        <a href="user_detail.php?userid=<?php echo $userid; ?>"> View </a>
        <a href="user_form.php?userid=<?php echo $userid; ?>">    Edit </a>
        <a href="javascript:removedata('<?php echo $userid; ?>')">   Remove </a>
         </td>
      <td align ="left" vallgn="top"><?php echo $userid; ?></td>
      <td align ="left" vallgn="top"><?php echo $uname; ?></td>
      <td align ="left" vallgn="top"><?php echo $upassword; ?></td>
    </tr>
  <?php  } ?>

  </table>
  <?php
  require("Mysql/unconn.php");
  ?>
  <script language="javascript">
    function removedata(userid){
      if(confirm("ยืนยันการลบข้อมูล")==true){
        window.location.href="user_delete.php?userid="+userid;
      }
    }
  </script>
  </body>
</html>
