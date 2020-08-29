<?php session_start();
$idusername = $_SESSION["idusername"];
include 'header.php';
include_once 'config.php';
//================== select review =======================
echo $_POST['search'];
if (isset($_POST['search'])) {
    $search = $_POST['search'];
    $sql = 'SELECT * FROM review where (topic LIKE"' . $search . '") or (content LIKE "' . $search . '") and idmember="' . $idusername . '"ORDER BY idreview DESC';
} else {

    $sql = 'SELECT * FROM review where idmember="' . $idusername . '"ORDER BY idreview DESC';
}

$result = mysql_query($sql) or die(mysql_error());

//================== select comment review ==================
// $sql = 'SELECT * FROM comment where idmember="' . $idusername . '"';
// $result = mysql_query($sql) or die(mysql_error());
//$row = mysql_fetch_array($result); // ดึงข้อมูลออกมาแค่ row เดียว

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
                                <a class="nav-link" href="#">ร้านค้า <span class="sr-only">(current)</span></a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="manage_shop.php">สร้างร้านค้า <span
                                        class="sr-only">(current)</span></a>
                            </li> -->



                        </ul>

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
        <div class=col-6>
            <form id="formsearch" name="formsearch" method="POST" action="index.php" class="form-inline my-4 my-lg-0">
                <input name="search" type="text" id="search" class="form-control mr-sm-2" placeholder="ค้นหารีวิว" />
                <button class="btn btn-success my-2 my-sm-0" type="submit"><i class="fa fa-search"
                        aria-hidden="true"></i>ค้นหา</button>
            </form>
        </div>
    </div>
</div>

<br>
<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-10">



            <?php while ($row = mysql_fetch_assoc($result)) {?>
            <div class="card">
                <!-- <div class="card-header text-white bg-success mb-3">
                    <?php //echo "หัวข้อรีวิว : <a href='manage_comment.php?idreview=" . $row['idreview'] . "'>" . $row['topic'] . "</a>"; ?>
                </div> -->
                <div class="card-body">
                    <h5 class="card-title">
                        <?php echo " <a href='manage_comment.php?idreview=" . $row['idreview'] . "'>" . $row['topic'] . "</a>"; ?>
                    </h5>
                    <p class="card-text">
                        <?php echo "<a href='manage_comment.php?idreview=" . $row['idreview'] . "'>" . $row['content'] . "</a>"; ?>
                    </p>
                    <!-- <img width="200" height="200" src="Image/<?php// echo $row['pic']; ?>" alt="..."
                        class="img-thumbnail"> -->
                    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                </div>
                <!-- <div class="card-footer text-white bg-success">
                    <?php// echo "รีวิวโดย : " . $row['idmember']; ?>
                    <?php// echo "<a href='manage_comment.php?idreview=" . $row['idreview'] . "'>แสดงความคิดเห็น </a>"; ?>
                </div> -->
            </div>
            <p></p>

            <?php
}
mysql_free_result($result);
mysql_close($conn);

?>

        </div>
    </div>
</div>








<?php include 'footer.php';?>