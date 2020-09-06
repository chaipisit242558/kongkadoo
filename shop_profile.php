<?php session_start();
include 'header.php';
include_once 'config.php';
$idusername = $_SESSION["idusername"];

//===========================  select table shop ===============================

if (isset($_GET['idshop'])) {
    $idshop = $_GET['idshop'];
    $sql = 'SELECT * from shop WHERE idshop="' . $idshop . '"';
    $result = mysql_query($sql) or die(mysql_error());
    $i = 1;

    $row = mysql_fetch_array($result); // ดึงข้อมูลออกมาแค่ row เดียว
    mysql_free_result($result);
}

//================================select table shopcomment=================================================
$sql2 = 'SELECT * from review WHERE idshop=' . $idshop . ' order by idreview desc';
$result2 = mysql_query($sql2) or die(mysql_error());
$j = 1;

function autolink($temp)
{

    //สร้างลิงค์อีเมล์
    $temp = preg_replace("#(^|[\n ])([a-z0-9&\-_.]+?)@([\w\-]+\.([\w\-\.]+\.)*[\w]+)#i", "\\1<a href=\"mailto:\\2@\\3\"><font color=#FF6600>\\2@\\3</font></a>", $temp);

    // สร้างลิ้งค์ http://
    $temp = preg_replace("#(^|[\n ])([\w]+?://[^ \"\n\r\t<]*)#is", "\\1<a href=\"\\2\" target=\"_blank\"><font color=#FF6600>\\2</font></a>", $temp);

    //สร้างลิ้ล์ www.
    $temp = preg_replace("#(^|[\n ])((www|ftp)\.[^ \"\t\n\r<]*)#is", "\\1<a href=\"http://\\2\" target=\"_blank\"><font color=#FF6600>\\2</font></a>", $temp);

//สร้างลิ้ล์ ร้าน.
    $temp = preg_replace("#(^|[\n ])((ร้าน)\.[^ \"\t\n\r<]*)#is", "\\1<a href=\"http://\\2\" target=\"_blank\"><font color=#FF6600>\\2</font></a>", $temp);

    return ($temp);

}

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
<!-- <div align="center"> -->
<br>
<br>

<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">

            <!-- <p align="center"> -->
            <div class="card">
                <div class="card-header text-white bg-info mb-3">
                    <?php echo "หัวข้อ : <a href='shop_profile.php?idshop=" . $row['idshop'] . "'>" . $row['shop_name'] . "</a>" ?>
                </div>
                <div class="card-body">
                    <!-- <h5 class="card-title"><?php// echo $row['topic']; ?></h5> -->
                    <p class="card-text">
                        <?php echo "<a href='shop_profile.php?idshop=" . $row['idshop'] . "'>" . $row['shop_explain'] . "</a>" ?>
                    </p>
                    <p class="card-text">
                        <?php echo "<a href='shop_profile.php?idshop=" . $row['idshop'] . "'>E-mail : " . $row['shop_email'] . "  " . "โทรศัพท์ : " . $row['shop_phone'] . "</a>" ?>
                    </p>

                    <img width="200" height="200" src="Image/<?php echo $row['shop_pic']; ?>" alt="..."
                        class="img-thumbnail">
                    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                </div>
                <!-- <div class="card-footer text-white bg-info">
                    <?php //echo "ร้านคุณ : <a href='member_profile.php?idmember=" . $row['shop_username'] . "'>" . $row['shop_username'] . "</a>" ?>
                </div> -->
            </div>

            <!--<img src=".'Image/'.<?php //$row['pic']?>." alt="..." class="img-thumbnail">-->
            <!-- </p> -->

            <!-- // form Comment -->
            <!-- <p>
            <H5>แสดงความคิดเห็นต่อร้านค้า</H5>
            <form name="comment" action="shopcomment_insert_process.php" method="post" class="form-horizontal">
                <textarea name="tarcomment" class="form-control"></textarea>
                <p></p>
                <button type="submit" class="btn btn-primary">แสดงความคิดเห็น</button>
                <input type="hidden" id="idshop" name="idshop" value="<?php //echo $idshop ?>">
                <input type="hidden" id="idshop" name="topic" value="<?php //echo $row['shop_name'] ?>">
                <input type="hidden" id="idshop" name="idmember" value="<?php //echo $idusername ?>">

            </form>
            </p> -->

        </div>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto mt-5">
            <div class="card">
                <form action="shopreview_insert_process.php" method="POST" enctype="multipart/form-data">
                    <div class="card-header text-center text-white bg-info">
                        แสดงความคิดเห็น
                    </div>
                    <div class="card-body">

                        <div class="form-group row">
                            <label for="topic" class="col-sm-2 col-form-label">หัวข้อ</label>
                            <div class="col-sm-9">
                                <input type='text' id='topic' name='topic' class="form-control" required>

                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="content" class="col-sm-2 col-form-label">เนื้อหา</label>
                            <div class="col-sm-9">
                                <textarea cols="10" rows="5" class="form-control" id="tarcomment" name="tarcomment"
                                    required></textarea>
                            </div>
                        </div>
                        <!-- <div class="form-group row">
                                <label for="fileUpload" class="col-sm-3 col-form-label">อัพโหลดรูปภาพ</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" id="fileUpload" name="fileUpload"
                                        onchange="readURL(this)">
                                </div>
                            </div> -->
                        <figure class="figure text-center d-none">
                            <img id="imgUpload" class="figure-img img-fluid rounded" alt="">
                        </figure>
                    </div>
                    <div class="card-footer text-center text-white bg-info">
                        <input type="submit" name="submit" class="btn btn-success" value="แสดงความคิดเห็น">
                        <input type="hidden" id="idshop" name="idshop" value="<?php echo $idshop ?>">
                        <input type="hidden" id="idmember" name="idmember" value="<?php echo $idusername ?>">
                        <input type="hidden" id="type" name="type" value="<?php echo $row['shop_type']; ?>">
                        <!-- <a class="btn btn-primary" href="index.php">ย้อนกลับไป</a> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<br>
<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <?php

while ($row2 = mysql_fetch_assoc($result2)) {
    $keyword = $row2['content'];
    echo "<div class='card'>";
    echo "<div class='card-body text-white bg-info'>";
    echo "<h5 class='card-title'><a href='review_profile.php?idreview=" . $row2['idreview'] . "'>" . $row2['topic'] . "</h5>";
    echo "<p class='card-text'> <a href='review_profile.php?idreview=" . $row2['idreview'] . "'>" . $row2['content'] . "</a></p>";
    //echo "<p class='card-text'> " . autolink($keyword) . "</p>";
    echo "</div>";
    echo "</div>";
    echo "<p></p>";
    $j++;

}

mysql_free_result($result2);
//mysql_close($conn);

?>

        </div>
    </div>
</div>


<?php mysql_close($conn);
include 'footer.php';
?>