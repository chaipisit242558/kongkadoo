<?php
include 'config.php';
$sql = 'SELECT shop_name FROM shop';
$result = mysql_query($sql) or die(mysql_error());
echo $result;
$i = 1;

$row = mysql_fetch_array($result); // ดึงข้อมูลออกมาแค่ row เดียว
echo "<p>";
print_r($row);
echo "</p>";