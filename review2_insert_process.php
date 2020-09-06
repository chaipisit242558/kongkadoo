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
    $username = $_POST['idmember'];
    $idshop = $_POST['idshop'];
    $idreview = $_POST['idreview'];
    $type = $_POST['type'];
    $idreview1 = $_POST['idreview1'];
    $idreview2 = $_POST['idreview2'];

    //echo $tarcomment;
    //echo $idreview;

}

$date = date('Y-m-d H:i:s');
//$username = $_POST['username'];
//echo $username;
$sql = "insert into  review3 (topic,content,datetime,pic,username,type,idreview,idshop,idreview1,idreview2)";
$sql .= "values('" . $topic . "','" . $tarcomment . "','" . $date . "','','" . $username . "','" . $type . "','" . $idreview . "','" . $idshop . "','" . $idreview1 . "','" . $idreview2 . "')";
//$sql .= "values('".$_POST['topic']."','".$_POST['content']."','".$date."','',".$_POST['idmember'].")";

$result = mysql_query($sql) or die(mysql_error());
//echo '<center><br>เพิ่มข้อมูลจำนวน '.mysql_affected_rows().' record(s) เรียบร้อยแล้ว</center>';
mysql_close($conn);

echo "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=review2_profile.php?idreview2=$idreview2'>";