<?php session_start();
$idusername = $_SESSION["idusername"];

?>


<?php
include_once 'config.php';

//################## เพิ่มข้อมูล #####################
//upload image
/*
$ext = pathinfo(basename($_FILES['fileUpload']['name']), PATHINFO_EXTENSION);
$new_image_name = 'img_' . uniqid() . "." . $ext;
$image_path = "Image/";
$upload_path = $image_path . $new_image_name;

//uploading
$success = move_uploaded_file($_FILES['fileUpload']['tmp_name'], $upload_path);
if ($success == false) {
echo "ไม่สามารถ upload รูปภาพได้";
exit();
}
$pro_image = $new_image_name;
 */
$date = date('Y-m-d H:i:s');

$sql = "insert into  review (topic,content,datetime,pic,idmember,idshop)";
$sql .= "values('" . $_POST['topic'] . "','" . $_POST['content'] . "','" . $date . "','','" . $idusername . "','')";

$result = mysql_query($sql) or die(mysql_error());
//echo '<center><br>เพิ่มข้อมูลจำนวน ' . mysql_affected_rows() . ' record(s) เรียบร้อยแล้ว</center>';
mysql_close($conn);

echo "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=index.php'>";
?>
<br />
</body>

</html>