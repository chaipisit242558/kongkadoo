<?php
include_once 'config.php';

//Connect to DB
$conn = mysql_connect($host, $username, $password) or die("Could not connect database : " . mysql_error());
mysql_select_db($dbname, $conn);
mysql_query("SET NAMES UTF8");

//################## เพิ่มข้อมูล #####################
if (isset($_POST['tarcomment'])) {
    $topic = $_POST['topic'];
    $tarcomment = $_POST['tarcomment'];
    $idmember = $_POST['idmember'];
    $idshop = $_POST['idshop'];

    //echo $tarcomment;
    //echo $idreview;

}

$date = date('Y-m-d H:i:s');
//$username = $_POST['username'];
//echo $username;
$sql = "insert into  review (topic,content,datetime,pic,idmember,idshop)";
$sql .= "values('" . $topic . "','" . $tarcomment . "','" . $date . "','','" . $_POST['idmember'] . "','" . $_POST['idshop'] . "')";
//$sql .= "values('".$_POST['topic']."','".$_POST['content']."','".$date."','',".$_POST['idmember'].")";

$result = mysql_query($sql) or die(mysql_error());
//echo '<center><br>เพิ่มข้อมูลจำนวน '.mysql_affected_rows().' record(s) เรียบร้อยแล้ว</center>';
mysql_close($conn);

echo "<META HTTP-EQUIV='Refresh' CONTENT='1;URL=shop_profile.php?idshop=$idshop'>";