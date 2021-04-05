<?php require("Mysql/config.php");
      require("CSS/CSS.php");

      ?>
<html>
 <body>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <title>
     Perfume
   </title>
   <style>
   ul {
     list-style-type: none;
     margin: 0;
     padding: 0;
     overflow: hidden;
     background-color: #FFB6C1;
   }
   .ul1 {
     list-style-type: none;
     margin: 0;
     padding: 0;
     overflow: hidden;
     background-color: #333;
   }

   li {
     float: left;
   }

   li a {
     display: block;
     color: black;
     text-align: center;
     padding: 14px 16px;
     text-decoration: none;
   }

   li a:hover {
     background-color: #111;
   }
   </style>

  </head>
  <body>

     <nav class="navbar navbar-inverse navbar-fixed-top">
     <div class="container-fluid">
       <div class="navbar-header">
         <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
         </button>
         <a class="navbar-brand" >Personality</a>
       </div>
       <div class="collapse navbar-collapse" id="myNavbar">
         <ul1 class="nav navbar-nav navbar-right">
           <li><a href="welcome.php"><span class="glyphicon glyphicon-log-in"> Back</a></li>
         </ul1>
       </div>
     </div>
     </nav>
     <br><br>

<center>
  <center><h1><b>ผลลัพธ์จากการทำแบบทดสอบ</b></h1>
  <img src="images/logo2.gif" style="width:300px;"></center>

  <div class="div2">


    <form action="<?php echo($action);?>" method="post" enctype="multipart/form-data"
   name="UserForm" target="_self" onSubmit="return checkForm();" class="w3-container ">

   <ul class="nav nav-pills">
     <li class="nav-item">
       <a class="nav-link active "  href="javascript:history.go(-4); "><strong>แบบทดสอบ</strong></a>
     </li>
     <li class="nav-item">
       <a class="nav-link" href='javascript:history.go(-3);'><strong>ชื่อกลิ่น</strong></a>
     </li>
     <li class="nav-item">
       <a class="nav-link" href="javascript:history.go(-2);"><strong>ชื่อแบรนด์</strong></a>
     </li>
     <li class="nav-item">
       <a class="nav-link" href="javascript:window.history.back();"><strong>ชื่อน้ำหอม</strong></a>
     </li>
     </ul>


 <table border="1" cellspacing="0" cellpadding="5">
   <?php
   include "dblink.php";
  /* $sql = "SELECT perfume_photo FROM perfumes WHERE perfume_id = $perfume_id";
   $result = mysqli_query($link, $sql);
$first_row = true;
   while($data = mysqli_fetch_array($result)) {
     if(!$first_row) {
   		echo '<hr class="separator">';
   	}
   // คำถาม และรูปภาพ(ถ้ามี)

   	$perfume_id = $data['perfume_id'];

   	if($data['perfume_photo']!=null) {		//ถ้ามีรูปภาพประกอบ
   		echo '<p><img src="read-img.php?perfume_id='.$perfume_id.'"></p>';
   	}
   	echo '</div><br>';

  }*/

    if(isset($_GET['perfume_id'])) {
     $perfumeId = $_GET['perfume_id'];
     }
  /*   if(isset($_GET['perfume_name'])) {
     $perfumeName = $_GET['perfume_name'];

     }
*/
     $sql = "SELECT * FROM perfumes WHERE  perfume_id LIKE '%$perfumeId%' ";
     $result = mysqli_query($link, $sql) or die ($link->error );
     while($cx = mysqli_fetch_array($result)) {
  //    $link_perform = 'answerperfume.php?smell_id='.$smellId.'&brand_name='.$cx['brand_name'].'&perfume_name='.$cx['perfume_name'];
        //echo "<div>{$cx['perfume_name']}</div><br>";

         //echo "<a href='$link_perform'>{$cx['perfume_name']}</a><br>";
         $pic2 = 'read-img0.php?perfume_id='.$perfumeId.'';
         $pic = "<p><img src=$pic2>";
         $perfumeName = $cx['perfume_name'];
         $size = $cx['size'];
         $typeName = $cx['type_name'];
         $brandName = $cx['brand_name'];
         $detail = $cx['Detail'];
    /*      echo "<div>{$cx['perfume_id']}</div><br>";
          echo "<div>{$cx['brand_id']}</div><br>";
          echo "<div>{$cx['smell_id']}</div><br>";
          echo "<div>{$cx['perfume_name']}</div><br>";
          echo "<div>{$cx['type_name']}</div><br>";
          echo "<div>{$cx['size']}</div><br>";
          echo "<div>{$cx['brand_name']}</div><br>";
          echo "<div>{$cx['Detail']}</div><br>";
          */
        //  echo "<div>{$cx['perfume_photo	']}</div><br>";
        //  echo '<p><img src="read-img0.php?perfume_id='.$perfumeId.'"></p>';
      //    echo $pic;
        //  echo $perfumeName;

     //    echo "<div></div><br>";

     }



        /*   if(isset($_GET['Detail'])) {
           $Detail = $_GET['Detail'];

         }*/
     ?>
       <tr>
     <center>
       <td colspan="2" align="center" valign="top"  width="200" class="div2">
         <h3>รูปภาพ</h3>
        <img src="<?php echo $pic2; ?>" width="300" height="300"><br>

    <center>

     </tr>
     <tr>
       <td class="div2" align ="right" valign="top" >ชื่อแบรนด์:</td>
       <td class="div2" align ="left" valign="top" width="150px" >

        <?php echo($brandName);?></td>
     </tr>
     <tr>

       <td class="div2" align ="right" valign="top" >ชื่อยี่ห้อ:</td>
       <td class="div2" align ="left" valign="top">

        <?php echo($perfumeName);?></td>
     </tr>
     <tr>
       <td class="div2" align ="right" valign="top">ประเภท:</td>
       <td class="div2" align ="left" valign="top">

        <?php echo($typeName);?></td>
     </tr>
     <tr>
       <td class="div2" align ="right" valign="top">ขนาด:</td>
       <td class="div2" align ="left" valign="top">

        <?php echo($size);?></td>
     </tr>




       <fieldset>

         <tr>
         <td class="div2"colspan="2" align="center" valign="top">
                <h3>รายละเอียดเกี่ยวกับน้ำหอม</h3>
         </tr></td>
         <td colspan="2" align="center" valign="top" class="div2">
           <?php echo($detail);?>

    </td>

     </td ></tr>



       </fieldset><br>

  <tr><td colspan="2" align="center" valign="top" class="div2">
     <button type="submit" id="button3" class="btn btn-warning"><a href="javascript:window.history.back();">Back</a></button>
      <button type="submit"id="button4" class="btn btn-warning"><a href="welcome.php"> Home</a></button>
   </td>
   </tr>
   </table>
</div>
</form></center>

  </body>
</html>
