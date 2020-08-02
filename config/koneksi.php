<?php
$conn=@mysqli_connect("localhost","root","managersql") or die("Tidak Terkoneksi");
$db=@mysqli_select_db($conn,"db_sarma") or die ("Database Tidak Ditemukan");
?>
