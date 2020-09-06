<?php session_start();
$idusername = $_SESSION["idusername"];
include 'header.php';
include_once 'config.php';

// $search = "%.$_POST['search'].%";
if (isset($_POST['search'])) {
    $search = '%' . $_POST['search'] . '%';
    $sql = 'SELECT * from review where (topic LIKE"' . $search . '")';
    $sql .= 'or (content LIKE "' . $search . '")order by idreview desc';

    // $sql = 'SELECT * from shop s,review r WHERE s.idshop=r.idshop and  (s.shop_name LIKE"' . $search . '") or (s.shop_phone LIKE "' . $search . '")';
    // $sql .= 'or (s.shop_email LIKE "' . $search . '")or (s.shop_explain LIKE "' . $search . '")or (r.topic LIKE "' . $search . '") ';
    // $sql .= 'or (r.content LIKE "' . $search . '")order by s.idshop desc';
    //echo $sql;

} else {
    $sql = 'SELECT * from shop order by idshop desc';

    // //$sql = 'SELECT * from shop order by idshop desc';
    // $sql = 'SELECT s.idshop as idshop,s.shop_name as sn,s.shop_explain as sex,s.shop_email as sem,s.shop_phone as sph,d.DISTRICT_NAME as sdi,a.AMPHUR_NAME as sam,p.PROVINCE_NAME as spr,g.GEO_NAME as sgn,ct.country_name_th as scn';
    // $sql .= ' FROM shop s ,district d,amphur a,province p,geography g,country ct';
    // $sql .= ' WHERE s.shop_district=d.DISTRICT_ID and s.shop_amphur=a.AMPHUR_ID and s.shop_province=p.PROVINCE_ID and s.shop_geography=g.GEO_ID and s.shop_country=ct.idcountry order by s.idshop desc';

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

                            <!-- <li class="nav-item">
                                <a class="nav-link" href="review.php">รีวิว <span class="sr-only">(current)</span></a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="manage_review.php">สร้างรีวิว <span
                                        class="sr-only">(current)</span></a>
                            </li> -->
                            <?php if ($idusername == "admin") {?>
                            <li class="nav-item">
                                <a class="nav-link" href="manage_shop.php">สร้างคีย์เวิร์ด <span
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

<div class="container">
    <div class="row">
        <div class=col-2></div>
        <div class=col-4>
            <div class="alert alert-primary" role="alert">
                <h4>รายการร้านค้า สถานที่ ...</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <br>
            <?php

while ($row = mysql_fetch_assoc($result)) {

    echo "<div class='card'>";
    echo "<div class='card-body text-white '>";
    //echo "<h6 class='card-title'>".'ความคิดเห็น'.$i."</h6>";
    echo "<H5 class='card-text'><a href='shop_profile.php?idshop=" . $row['idshop'] . "'>" . $row['shop_name'] . "</a></H5>";
    echo "<p class='card-text'><a href='shop_profile.php?idshop=" . $row['idshop'] . "'>" . $row['shop_explain'] . "</a></p>";
    echo "<p class='card-text'><a href='shop_profile.php?idshop=" . $row['idshop'] . "'>" . $row['shop_phone'] . "  " . $row['shop_email'] . "</a></p>";
    echo "<p class='card-text'><a href='shop_profile.php?idshop=" . $row['idshop'] . "'>" . $row['shop_district'] . "  " . $row['shop_amphur'] . "  " . $row['shop_province'] . "  " . $row['shop_geography'] . "  " . $row['shop_country'] . "</a></p>";
    //echo "<p class='card-text'><a href='shop_profile.php?idshop=" . $row['idshop'] . "'>" . $row['shop_phone'] . "  " . $row['shop_email'] . "</a></p>";
    //echo "<p class='card-text'><a href='shop_profile.php?idshop=" . $row['idshop'] . "'>" . $row['shop_email'] . "</a></p>";
    //echo "<p class='card-text'><a href='manage_review.php?idshop=" . $row['idshop'] . "'>" . $row['shop_address'] . "</a></p>";

    echo "</div>";
    echo "</div>";
    echo "<p></p>";
    echo "<p></p>";

    $i++;

}

mysql_free_result($result);
mysql_close($conn);
?>

        </div>
    </div>
</div>


<?php include 'footer.php';?>