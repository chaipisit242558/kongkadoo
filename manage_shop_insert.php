<?php
include_once 'config.php';

if (isset($_POST['shop_name'])) {
    $shop_name = $_POST['shop_name'];
    $shop_phone = $_POST['shop_phone'];
    $shop_email = $_POST['shop_email'];
    $shop_explain = $_POST['shop_explain'];
    $shop_country = $_POST['country'];
    $shop_geography = $_POST['geography'];
    $shop_province = $_POST['province'];
    $shop_amphur = $_POST['amphur'];
    $shop_district = $_POST['district'];
    $shop_village = "";
    //$shop_pic = $_POST['fileUpload'];
    $shop_username = $_POST['shopusername'];

//################## เพิ่มข้อมูล #####################

//upload image
    $ext = pathinfo(basename($_FILES['fileUpload']['name']), PATHINFO_EXTENSION);
    $new_image_name = 'img_' . uniqid() . "." . $ext;
    $image_path = "Image/";
    $upload_path = $image_path . $new_image_name;

//uploading
    $success = move_uploaded_file($_FILES['fileUpload']['tmp_name'], $upload_path);
    if ($success == false) {
        //echo "ไม่สามารถ upload รูปภาพได้";
        //exit();
        $pic = "";
    } else {
        $pic = $new_image_name;

    }

    $sql = "insert into shop(shop_name,shop_phone,shop_email,shop_explain,shop_country,shop_geography,shop_province,shop_amphur,shop_district,shop_village,shop_pic,shop_username)";
    $sql .= "values('" . $shop_name . "','" . $shop_phone . "','" . $shop_email . "','" . $shop_explain . "','" . $shop_country . "','" . $shop_geography . "','" . $shop_province . "','" . $shop_amphur . "','" . $shop_district . "','" . $shop_village . "','" . $pic . "','" . $shop_username . "')";
    //echo $sql;
    $result = mysql_query($sql) or die(mysql_error());
    echo '<center><br>เพิ่มข้อมูลจำนวน ' . mysql_affected_rows() . ' record(s) เรียบร้อยแล้ว</center>';
    mysql_close($conn);

    echo "<META HTTP-EQUIV='Refresh' CONTENT='1;URL=index.php'>";

}