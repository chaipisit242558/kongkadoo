
<?php
include_once('config.php');

//################## ตรวจสอบ PK ซ้ำหรือไม่ #####################
if(isset($_POST['username'])){
$username=$_POST['username'];
$password=$_POST['password'];
$fullname=$_POST['fullname'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$address=$_POST['address'];


$sql = 'SELECT * from member ';
$sql .= 'where username = "'.$_POST['username'].'"';
$result = mysql_query($sql) or die(mysql_error());
$num = mysql_num_rows($result);
if($num > 0) 
{
?>
	<script> alert("Username มีอยู่ในระบบแล้วกรุณาเปลี่ยนใหม่!!"); </script>
<?php
	echo "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=register.php'>";
	exit;
}
//################## เพิ่มข้อมูล #####################

//upload image
$ext = pathinfo(basename($_FILES['fileUpload']['name']), PATHINFO_EXTENSION);
$new_image_name = 'img_'.uniqid().".".$ext;
$image_path = "Image/";
$upload_path = $image_path.$new_image_name;

//uploading
$success = move_uploaded_file($_FILES['fileUpload']['tmp_name'],$upload_path);
if($success == false){
	echo "ไม่สามารถ upload รูปภาพได้";
	exit();
}
$pic = $new_image_name;


$sql = "insert into member(username,password,fullname,email,phone,address,pic)";
$sql .= "values('".$username."','".$password."','".$fullname."','".$email."','".$phone."','".$address."','".$pic."')";
$result = mysql_query($sql) or die(mysql_error());
echo '<center><br>เพิ่มข้อมูลจำนวน '.mysql_affected_rows().' record(s) เรียบร้อยแล้ว</center>';
mysql_close($conn);		

echo "<META HTTP-EQUIV='Refresh' CONTENT='1;URL=index.php'>";

}

?>

