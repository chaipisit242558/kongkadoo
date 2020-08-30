<?php session_start();
include 'header.php';
include_once 'config.php';
$idusername = $_SESSION["idusername"];

//===========================  select table shop ===============================
// $search = "%.$_POST['search'].%";
if (isset($_GET['idreview'])) {
    $idreview = $_GET['idreview'];
    //echo $idreview;
    $sql = 'SELECT * from review WHERE idreview="' . $idreview . '"';
    //echo $sql;
    $result = mysql_query($sql) or die(mysql_error());
    $i = 1;

    $row = mysql_fetch_array($result); // ดึงข้อมูลออกมาแค่ row เดียว
    mysql_free_result($result);

}

//================================select table shopcomment=================================================
// $sql2 = 'SELECT * from review WHERE idshop=' . $idshop . '';
// //echo $sql2;
// $result2 = mysql_query($sql2) or die(mysql_error());
// $j = 1;

//==============================================================
/*
//===========================  select table review ===============================
if (isset($_GET['idreview'])) {
$idreview = $_GET['idreview'];
$sql3 = 'SELECT s.idshop as sids,s.shop_name as sn,r.idreview as rid,r.topic as rt,r.content as rc,r.pic as rp, r.idmember as idm FROM shop s, review r WHERE s.idshop=r.idshop and r.idreview="' . $idreview . '" ORDER BY r.idshop';
$result3 = mysql_query($sql3) or die(mysql_error());
$row3 = mysql_fetch_array($result3); // ดึงข้อมูลออกมาแค่ row เดียว
mysql_free_result($result3);

//============================== select table comment ===================================================
$sql4 = 'SELECT * from comment WHERE idreview=' . $idreview . '';
$result4 = mysql_query($sql4) or die(mysql_error());
$j4 = 1;

//==============================================================
} else {

$sql3 = 'SELECT s.idshop as sids,s.shop_name as sn,r.idreview as rid,r.topic as rt,r.content as rc,r.pic as rp, r.idmember as idm FROM shop s, review r WHERE s.idshop=r.idshop and r.idshop="' . $idshop . '" ORDER BY r.idshop';
$result3 = mysql_query($sql3) or die(mysql_error());
$row3 = mysql_fetch_array($result3); // ดึงข้อมูลออกมาแค่ row เดียว
$num = mysql_num_rows($result3);

//============================== select table comment ===================================================
$sql4 = 'SELECT * from comment WHERE idreview=' . $idreview . '';
$result4 = mysql_query($sql4) or die(mysql_error());
$j4 = 1;

}
 */
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
                                <a class="nav-link" href="manage_review.php">สร้างรีวิว <span
                                        class="sr-only">(current)</span></a>
                            </li>

                            <!-- <li class="nav-item">
                                <a class="nav-link" href="shop_list.php">ร้านค้า <span
                                        class="sr-only">(current)</span></a>
                            </li> -->
                            <?php if ($idusername == "admine") {?>
                            <li class="nav-item">
                                <a class="nav-link" href="manage_shop.php">สร้างร้านค้า <span
                                        class="sr-only">(current)</span></a>
                            </li>
                            <?php }?>



                        </ul>
                        <form id="formsearch" name="formsearch" method="post" action="index.php"
                            class="form-inline my-4 my-lg-0">
                            <input name="search" type="text" id="search" class="form-control mr-sm-2"
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
                <div class="card-header text-white bg-success mb-3">
                    <?php echo "ชื่อร้าน : <a href='shop_profile.php?idshop=" . $row['idshop'] . "'>" . $row['topic'] . "</a>" ?>
                </div>
                <div class="card-body">
                    <!-- <h5 class="card-title"><?php// echo $row['topic']; ?></h5> -->
                    <p class="card-text"><?php echo $row['content']; ?></p>
                    <!-- <p class="card-text">
                        <?php //echo "E-mail : " . $row['shop_email'] . "  " . "โทรศัพท์ : " . $row['shop_phone']; ?></p>

                    <img width="200" height="200" src="Image/<?php //echo $row['shop_pic']; ?>" alt="..."
                        class="img-thumbnail"> -->
                    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                </div>
                <div class="card-footer text-white bg-success">
                    <?php //echo "ร้านคุณ : " . $row['shop_username']; ?>
                </div>
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

            <?php

/*
while ($row2 = mysql_fetch_assoc($result2)) {
echo "<div class='card'>";
echo "<div class='card-body text-white bg-info'>";
//echo "<h6 class='card-title'>" . 'ความคิดเห็น' . $j . "</h6>";
echo "<p class='card-text'> <a href='shop_profile.php?idshop=" . $row['idshop'] . "'>" . $row2['content'] . "</a></p>";

echo "</div>";
echo "</div>";
echo "<p></p>";
$j++;

}

mysql_free_result($result2);

 */

?>



        </div>
    </div>
</div>

<!-- ============================ start review ==================================== -->
<!-- <div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <?php
// if($num == 0){
//     echo "ไม่พบข้อมูล";
//   }else{

?>
            <div class="card">
                <div class="card-header text-white bg-success mb-3">
                    <?php// echo "ชื่อสถานที่ : " . $row3['sn'] . "" ?>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?php// echo $row3['rt']; ?></h5>
                    <p class="card-text"><?php// echo $row3['rc']; ?></p>
                    <img width="200" height="200" src="Image/<?php// echo $row3['rp']; ?>" alt="..."
                        class="img-thumbnail">
                </div>
                <div class="card-footer text-white bg-success">
                    <?php// echo "รีวิวโดย : " . $row3['idm']; ?>
                </div>
            </div>

            <p>
                <H4>แสดงความคิดเห็นต่อรีวิว</H4>
                <form name="comment" action="manage_comment_insert_process2.php" method="post" class="form-horizontal">
                    <textarea name="tarcomment" class="form-control"></textarea>
                    <p></p>
                    <button type="submit" class="btn btn-primary">แสดงความคิดเห็น</button>
                    <input type="hidden" id="idreview" name="idreview" value="<?php //echo $idreview ?>">
                </form>
            </p>
            <?php/*
while ($row4 = mysql_fetch_assoc($result4)) {
    echo "<div class='card'>";
    echo "<div class='card-body text-white bg-info'>";
    echo "<h6 class='card-title'>" . 'ความคิดเห็น' . $j4 . "</h6>";
    echo "<p class='card-text'>" . $row4['comment_content'] . "</p>";

    echo "</div>";
    echo "</div>";
    echo "<p></p>";

    $j4++;

}

mysql_free_result($result3);
mysql_free_result($result4);
// }

*/
?>



        </div>
    </div>
</div> -->


<?php mysql_close($conn);
include 'footer.php';
?>