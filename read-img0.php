<?php
include "dblink.php";
$perfumeId = $_GET['perfume_id'];
$sql = "SELECT perfume_photo FROM perfumes WHERE perfume_id LIKE '%$perfumeId%' ";
$result = mysqli_query($link, $sql);
$data = mysqli_fetch_array($result);
header("Content-Type: perfume_photo/jpeg");
echo $data['perfume_photo'];
@mysqli_close($link);
?>
