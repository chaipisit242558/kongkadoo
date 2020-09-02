<?php session_start();
$idusername = $_SESSION["idusername"];
include 'header.php';
include_once 'config.php';

// $search = "%.$_POST['search'].%";
if (isset($_POST['search'])) {
    $search = '%' . $_POST['search'] . '%';
    $sql = 'SELECT * FROM shop';
    $sql .= ' WHERE (shop_name LIKE"' . $search . '") or (shop_phone LIKE "' . $search . '") or (shop_email LIKE "' . $search . '") or (shop_explain LIKE "' . $search . '") ';
    $sql .= ' and (shop_district LIKE"' . $search . '") or (shop_amphur LIKE "' . $search . '") or (shop_province LIKE "' . $search . '") or (shop_geography LIKE "' . $search . '") or (shop_country LIKE "' . $search . '") order by idshop desc';
    // $sql .= ' or (d.DISTRICT_NAME LIKE "' . $search . '") or (a.AMPHUR_NAME LIKE "' . $search . '") or (p.PROVINCE_NAME LIKE "' . $search . '") or (g.GEO_NAME LIKE "' . $search . '")';
    // $sql .= ' or (ct.country_name_th LIKE "' . $search . '") order by s.idshop desc';

    //echo $sql;

}
$result = mysql_query($sql) or die(mysql_error());
$i = 1;

?>
<div class="container">
    <div class="row">
        <div class="col-sm col-md col-lg col-xl">
            <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
                <div class="container">
                    <a class="navbar-brand" href="index.php">Kongkadoo</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="index.php">หน้าแรก <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="review.php">รีวิว <span class="sr-only">(current)</span></a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="manage_review.php">สร้างรีวิว <span
                                        class="sr-only">(current)</span></a>
                            </li>
                            <?php if ($idusername == "admin") {?>
                            <li class="nav-item">
                                <a class="nav-link" href="manage_shop.php">สร้างร้านค้า <span
                                        class="sr-only">(current)</span></a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="register_admin.php">จัดการสมาชิก <span
                                        class="sr-only">(current)</span></a>
                            </li>
                            <?php }?>


                        </ul>
                        <form id="formsearch" name="formsearch" method="post" action="search_file.php"
                            class="form-inline my-4 my-lg-0">
                            <input name="search" type="text" id="search" required class="form-control mr-sm-2"
                                placeholder="ค้นหาร้าน สถานที่" />
                            <button class="btn btn-success my-2 my-sm-0" type="submit"><i class="fa fa-search"
                                    aria-hidden="true"></i>ค้นหา</button>
                        </form>

                        <ul class="navbar-nav ml-auto">
                            <!-- ตรวจสอบเงื่อนไขที่ว่า ตัวแปร $_SESSION['id'] ได้ถูกกำหนดขึ้นมาหรือไม่ -->
                            <?php if (isset($_SESSION['id'])) {?>



                            <li class="nav-item">
                                <span class="navbar-text">
                                    <?php echo "ยินดีต้อนรับคุณ : " . $_SESSION['fullname']; ?>
                                </span>

                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href=""><img src="Image/<?php echo $_SESSION['pic']; ?>" alt=""
                                        width="25" height="25"> <span class="sr-only">(current)</span></a>
                            </li>


                            <li class="nav-item">

                                <a class="nav-link" href="logout.php">ออกจากระบบ <span
                                        class="sr-only">(current)</span></a>
                            </li>
                            <?php } else {?>
                            <li class="nav-item">
                                <a class="btn btn-primary" href="login.php">เข้าสู่ระบบ</a>
                                <a class="btn btn-warning" href="register.php">สมัครสมาชิก</a>
                            </li>
                            <?php }?>
                        </ul>


                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
<br>
<br>
<!-- <div align="center"> -->
<p></P>
<div class="container">
    <div class="row">
        <div class=col-2></div>
        <div class=col-8>

        </div>
    </div>

    <!-- <hr width="60%" />
  <p>&nbsp;</p> -->
    <!-- </div> -->
    <!-- <H3 align="center" class="style2">รายการข้อมูลรีวิว</H3>
-->
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <br>
            <?php

while ($row = mysql_fetch_assoc($result)) {

    if ($i == 1) {
        echo "<div class='card'>";
        echo "<div class='card-header text-white bg-info mb-3'>";
        echo "ชื่อร้าน : <a href='shop_profile.php?idshop=" . $row['idshop'] . "'>" . $row['shop_name'] . "</a>";
        echo "</div>";
        echo "<div class='card-body text-white'>";
        //echo "<h6 class='card-title'>".'ความคิดเห็น'.$i."</h6>";
        echo "<img width='200' height='200' src='Image/" . $row['shop_pic'] . "' class='img-thumbnail'>";

        //echo "<H5 class='card-text'><a href='shop_profile.php?idshop=" . $row['idshop'] . "'>" . $row['sn'] . "</a></H5>";
        echo "<p class='card-text'><a href='shop_profile.php?idshop=" . $row['idshop'] . "'>" . $row['shop_explain'] . "</a></p>";
        echo "<p class='card-text'><a href='shop_profile.php?idshop=" . $row['idshop'] . "'>" . $row['shop_phone'] . "  " . $row['shop_email'] . "</a></p>";
        echo "<p class='card-text'><a href='shop_profile.php?idshop=" . $row['idshop'] . "'>" . $row['shop_district'] . "  " . $row['shop_amphur'] . "  " . $row['shop_province'] . "  " . $row['shop_geography'] . "  " . $row['shop_country'] . "</a></p>";
        //echo "<p class='card-text'><a href='shop_profile.php?idshop=" . $row['idshop'] . "'>" .$row['shop_phone'] . "  " . $row['shop_email'] . "</a></p>" ;
        //echo "<p class='card-text'><a href='shop_profile.php?idshop=" . $row['idshop'] . "'>" . $row['shop_email'] . "</a></p>" ;
        //echo "<p class='card-text'><a href='manage_review.php?idshop=" . $row['idshop'] . "'>" . $row['shop_address'] . "</a></p>" ; echo "</div>" ; echo "</div>" ;
        echo "</div>";
        echo "</div>";
        echo "<p></p>";
        echo "<p></p>";
    } else {
        echo "<div class='card'>";
        echo "<div class='card-body text-white bg-light'>";
        //echo "<h6 class='card-title'>".'ความคิดเห็น'.$i."</h6>";
        echo "<H5 class='card-text'><a href='shop_profile.php?idshop=" . $row['idshop'] . "'>" . $row['shop_name'] . "</a></H5>";
        echo "<p class='card-text'><a href='shop_profile.php?idshop=" . $row['idshop'] . "'>" . $row['shop_explain'] . "</a></p>";
        echo "<p class='card-text'><a href='shop_profile.php?idshop=" . $row['idshop'] . "'>" . $row['shop_phone'] . "  " . $row['shop_email'] . "</a></p>";
        echo "<p class='card-text'><a href='shop_profile.php?idshop=" . $row['idshop'] . "'>" . $row['shop_district'] . "  " . $row['shop_amphur'] . "  " . $row['shop_province'] . "  " . $row['shop_geography'] . "  " . $row['shop_country'] . "</a></p>";
        //echo "<p class='card-text'><a href='shop_profile.php?idshop=" . $row['idshop'] . "'>" . $row['shop_phone'] . "  " . $row['shop_email'] . "</a></p>" ;
        //echo "<p class='card-text'><a href='shop_profile.php?idshop=" . $row['idshop'] . "'>" . $row['shop_email'] . "</a></p>" ;
        //echo "<p class='card-text'><a href='manage_review.php?idshop=" . $row['idshop'] . "'>" . $row['shop_address'] . "</a></p>" ; echo "</div>" ;
        echo "</div>";
        echo "</div>";
        echo "<p></p>";
        echo "<p></p>";
    }
/*
echo "<div class='card'>";
echo "<div class='card-header text-white bg-info mb-3'>";
echo "ชื่อร้าน : <a href='shop_profile.php?idshop=" . $row['idshop'] . "'>" . $row['topic'] . "</a>";
echo "</div>";
echo "<div class='card-body'>";
echo "<p class='card-text'><a href='shop_profile.php?idshop="
. $row['idshop'] . "'>" . $row['content'] . "</a></p>";
echo "<p class='card-text'>";
//echo "<p class='card-text'><a href='shop_profile.php?idshop=" . $row['idshop'] . "'>" . $row['shop_phone'] . "  " . $row['shop_email'] . "</a></p>";

//echo"<img width='200' height='200' src="Image/"". $row['shop_pic']". class='img-thumbnail'>";

echo " </div>";
echo "<div class='card-footer text-white bg-info'>";
// echo "<?php echo "ร้านคุณ : <a href='member_profile.php?idmember=" . $row['shop_username'] . "'>" . $row['shop_username'] . "</a>"";
echo "</div>";
echo "</div>";
 */
    $i++;
}
$num = mysql_num_rows($result);
if ($num == 0) {
    echo "<div class='card'>";
    echo "<div class='card-body text-primary bg-light'>";
    echo "<h6 class='card-title' align='center'>" . 'ไม่พบข้อมูล!!!' . "</h6>";
    // echo "<H5 class='card-text'><a href='shop_profile.php?idshop=" . $row['idshop'] . "'>" . $row['shop_name'] . "</a></H5>";
    // echo "<p class='card-text'><a href='shop_profile.php?idshop=" . $row['idshop'] . "'>" . $row['shop_explain'] . "</a></p>";
    // echo "<p class='card-text'><a href='shop_profile.php?idshop=" . $row['idshop'] . "'>" . $row['shop_phone'] . "  " . $row['shop_email'] . "</a></p>";
    // echo "<p class='card-text'><a href='shop_profile.php?idshop=" . $row['idshop'] . "'>" . $row['shop_district'] . "  " . $row['shop_amphur'] . "  " . $row['shop_province'] . "  " . $row['shop_geography'] . "  " . $row['shop_country'] . "</a></p>";
    //echo "<p class='card-text'><a href='shop_profile.php?idshop=" . $row['idshop'] . "'>" . $row['shop_phone'] . "  " . $row['shop_email'] . "</a></p>" ;
    //echo "<p class='card-text'><a href='shop_profile.php?idshop=" . $row['idshop'] . "'>" . $row['shop_email'] . "</a></p>" ;
    //echo "<p class='card-text'><a href='manage_review.php?idshop=" . $row['idshop'] . "'>" . $row['shop_address'] . "</a></p>" ; echo "</div>" ;
    echo "</div>";
    echo "</div>";
    echo "<p></p>";
    echo "<p></p>";

}
mysql_free_result($result);
mysql_close($conn);
?>

        </div>
    </div>
</div>


<?php include 'footer.php';?>