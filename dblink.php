<?php
$link = @mysqli_connect("localhost", "root", "1234", "webtest") or die(mysqli_connect_error());
//$link = @mysqli_connect("localhost", "bamossza_namhom1", "rtNJPBMo", "bamossza_namhom1") or die(mysqli_connect_error());
mysqli_query($link,"SET CHARACTER SET UTF8");
?>
