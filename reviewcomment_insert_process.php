<?php
include_once 'config.php';

//################## เพิ่มข้อมูล #####################
if (isset($_POST['tarcomment'])) {

    $tarcomment = $_POST['tarcomment'];
    $idcreatereview = $_POST['idcreatereview'];
    $idmember = $_POST['idmember'];

    //echo $tarcomment;
    //echo $idreview;

}

$date = date('Y-m-d H:i:s');
//$username = $_POST['username'];
//echo $username;
$sql = "insert into  comment (comment_content,datetime,idreview)";
$sql .= "values('" . $tarcomment . "','" . $date . "','" . $_POST['idcreatereview'] . "')";
//$sql .= "values('".$_POST['topic']."','".$_POST['content']."','".$date."','',".$_POST['idmember'].")";

$result = mysql_query($sql) or die(mysql_error());
//echo '<center><br>เพิ่มข้อมูลจำนวน '.mysql_affected_rows().' record(s) เรียบร้อยแล้ว</center>';
mysql_close($conn);

echo "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=review_profile.php?idcreatereview=$idcreatereview'>";