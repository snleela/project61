<html lang="en">
<?php

 require("Mysql/config.php");
      require("CSS/CSS.php");
  session_start();
?>
  <head>
  <title>Personality Perfume</title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


<style>
hr {

  margin-top: 0.5em;
  margin-bottom: 0.5em;
  margin-left: 100px;
  margin-right: 100px;
  border-style: inset;
  border-width: 1px;
  color: pink;
}
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
  <script src="js/jquery-2.1.1.min.js"></script>
  <body>
  <form action="smell0.php" method="post">
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div >
      <div class="navbar-header">
      <a class="navbar-brand" >Personality</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul1 class="nav navbar-nav navbar-right">
  <li><a href="welcome.php"><span class="glyphicon glyphicon-log-in"> HOME</a></li>
          &nbsp;  &nbsp;  &nbsp;
        </ul1>
      </div></div></nav>
  <br>
    <center>
      <div class="div5" >

        <ul class="nav nav-pills ">
          <li class="nav-item">
            <a class="nav-link active" href="javascript:window.history.back();"><strong>แบบทดสอบ</strong></a>
          </li>
          </ul>

                  <center>

          <h2>กลิ่นที่เหมาะสำหรับคุณผู้หญิง </h2>


<table class="table" >
<tr>
  <td colspan="1" align="center" valign="top" class="div2">กลิ่น</td>
  </tr>

  <td colspan="1" align="center" valign="top" class="div4">
    <br>
                 <!--  โค้ดสำหรับการเอาค่ามาเซ็ตค่าคะแนนจากหน้า testing -->
                <?php

                include "dblink.php";
                if(isset($_GET['resultToSmell'])) {
                  $ew = $_GET['resultToSmell'];
                 $newOne = mb_substr($ew,0,-1);
                  } else {
                  $newOne = '';
                  $ew = '';
                }
                if($newOne != null){
                $sql = "SELECT smell_id, smell_name FROM smelly WHERE smell_id in ($newOne) ";
                $result = mysqli_query($link, $sql);
  	            while($ch = mysqli_fetch_array($result)) {

                  $link_perform = 'smell00.php?&smell_id='.$ch['smell_id'].'&resultToSmell=';
              //  $link_perform = 'smell.php?smell_id='.$test.'&smell_name='.$ch['smell_name'];
                echo "<a href='$link_perform'>{$ch['smell_name']}</a><br><br><br>";
              }
             }

                ?>
              </td>
            <?php
              include "dblink.php";
              if(isset($_GET['resultToSmell'])) {

                $ew = $_GET['resultToSmell'];

               $newOne = mb_substr($ew,0,-1);

                } else {
                $newOne = '';
                $ew = '';
              }

              if($newOne != null){
              $sql = "SELECT smell_id, smell_name FROM smelly WHERE smell_id in ($newOne) ";
              $result = mysqli_query($link, $sql);
              while($ch = mysqli_fetch_array($result)) {
            /**  $gender = "";
                if($ch['smell_id'] == "11" || $ch['smell_id'] == "12" || $ch['smell_id'] == "13"|| $ch['smell_id'] == "14"|| $ch['smell_id'] == "15" || $ch['smell_id'] == "16"){
                  $gender = "(กลุ่มน้ำหอมสำหรับผู้ชาย)";
                }else {
                  $gender = "(กลุ่มน้ำหอมสำหรับผู้หญิง)";
                }*/


                $link_perform = 'smell0.php?&smell_id='.$ch['smell_id'].'&resultToSmell=';


            /*  echo "<a href='$link_perform'>$gender</a><br><br><br>";*/


              }
           }  ?>

                  </table>

                                  <?php
                                  if(isset($_GET['resultToSmell'])) {

                                    $ew = $_GET['resultToSmell'];

                                  } else {
                                    $ew = '';

                                  }
                                  if(isset($_GET['smell_id'])) {
                                    $test = $_GET['smell_id'];
                                    } else {
                                        $test = '';
                                      }
                                  if($test != null){
                                    $sql2 = "SELECT smell_id, smell_name FROM smelly WHERE smell_id in ($test) ";
                                    $result2 = mysqli_query($link, $sql2);
                                    while($ch2 = mysqli_fetch_array($result2)) {

                                  //   echo "<h2>{$ch2['smell_name']}";

                                    }  }

                                  ?>

                            <?php
                            if(isset($_GET['resultToSmell'])) {

                              $ew = $_GET['resultToSmell'];

                            } else {
                              $ew = '';

                            }
                            if(isset($_GET['smell_id'])) {
                              $test = $_GET['smell_id'];
                              } else {
                                  $test = '';
                                }
                            if($test != null){
                              $sql2 = "SELECT smell_id, smell_name FROM smelly WHERE smell_id in ($test) ";
                              $result2 = mysqli_query($link, $sql2);
                              while($ch2 = mysqli_fetch_array($result2)) {


                              }
                            $sql = "SELECT distinct brand_name FROM perfumes WHERE smell_id = $test " ;
                            $result = mysqli_query($link, $sql);
                            $count = 0;
                            while($ch = mysqli_fetch_array($result)) {
                                $count++;
                                  $link_perform = 'smell0.php?smell_id='.$test.'&brand_name='.$ch['brand_name'];
                                  echo "<a href='$link_perform'>{$ch['brand_name']}</a>";
                                  echo "<br><br>";
                                //  echo "<div>{br$ch['brand_name']}</div><br>";
                            //    echo "<div></div><br>";
                            }
                            if($count < 1){
                              echo "ไม่มีข้อมูล";
                            }}


                         ?>



  <?php

  if(isset($_GET['brand_name'])) {
    $brandName = $_GET['brand_name'];

    } else {
        $brandName = '';
      }
  if(isset($_GET['smell_id'])) {
    $smellId = $_GET['smell_id'];

    } else {
        $smellId = '';
      }
  if($smellId != null){

    $sql = "SELECT * FROM perfumes WHERE brand_name in('$brandName') and smell_id = $smellId";
    $result = mysqli_query($link, $sql) or die ($link->error );

    while($cx = mysqli_fetch_array($result)) {

      $link_perform = 'answerperfume.php?perfume_id='.$smellId.'&perfume_id='.$cx['perfume_id'];

       //echo "<div>{$cx['perfume_name']}</div><br>";

        echo "<a href='$link_perform'>{$cx['perfume_name']}</a><br><br>";

        //  echo "<div>{$ch['brand_name']}</div><br>";


    }

 }

  ?>
</td>

</table>




              <?php
              if(isset($_GET['answer'])) {
               $answer = $_GET['answer'];
               }else {
                   $answer = '';
                 }
            /*   if(isset($_GET['perfume_name'])) {
               $perfumeName = $_GET['perfume_name'];

               }
            */
              if($answer != null){
                $sql = "SELECT * FROM perfumes WHERE  perfume_id LIKE '%$answer%' ";
                $result = mysqli_query($link, $sql) or die ($link->error );
                while($cx = mysqli_fetch_array($result)) {

                    //echo "<a href='$link_perform'>{$cx['perfume_name']}</a><br>";
                    $pic2 = 'read-img0.php?perfume_id='.$answer.'';
                    $pic = "<p><img src=$pic2>";
                    $perfumeName = $cx['perfume_name'];
                    $size = $cx['size'];
                    $typeName = $cx['type_name'];
                    $brandName = $cx['brand_name'];
                    $detail = $cx['Detail'];

                  }
            }
               ?>

              </div >
</form>
<tr><td colspan="2" align="center" valign="top" class="div2">
   <button type="submit" id="button3" class="btn btn-warning"><a href="javascript:window.history.back();">Back</a></button>
    <button type="submit"id="button4" class="btn btn-warning"><a href="welcome.php"> Home</a></button>
 </td>
 </tr>
 </table>
</body>
</html>
