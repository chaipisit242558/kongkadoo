<?php session_start();
$idusername = $_SESSION["idusername"];
include 'header.php';
include_once 'config.php';
//================== select review =======================
if (isset($_POST['search'])) {
    $sql = 'SELECT * FROM shop where shop_username="' . $idusername . '"ORDER BY idshop DESC';
} else {

    $sql = 'SELECT * FROM shop where shop_username="' . $idusername . '"ORDER BY idshop DESC';
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
        <div class="col-2"></div>
        <div class="col-4">
            <form class="form-inline" action="index.php" method="POST">
                <input type="text" class="form-control" id="" placeholder="Search">
                <input type="submit" name="submit" class="btn btn-success " value="ค้นหา">
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
                <div class="card-header text-white bg-info mb-3">
                    <?php echo "ชื่อร้าน : <a href='shop_profile.php?idshop=" . $row['idshop'] . "'>" . $row['shop_name'] . "</a>"; ?>
                </div>
                <div class="card-body">

                    <p class="card-text">
                        <?php echo "<a href='shop_profile.php?idshop=" . $row['idshop'] . "'>" . $row['shop_explain'] . "</a>" ?>
                    </p>
                    <p class="card-text">
                        <?php echo "<a href='shop_profile.php?idshop=" . $row['idshop'] . "'>" . $row['shop_address'] . "</a>" ?>
                    </p>
                    <p class="card-text">
                        <?php echo "<a href='shop_profile.php?idshop=" . $row['idshop'] . "'>" . $row['shop_email'] . "</a>" ?>
                    </p>
                    <p class="card-text">
                        <?php echo "<a href='shop_profile.php?idshop=" . $row['idshop'] . "'>" . $row['shop_phone'] . "</a>" ?>
                    </p>
                    <img width="200" height="200" src="Image/<?php echo $row['shop_pic']; ?>" alt="..."
                        class="img-thumbnail">
                    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                </div>
                <div class="card-footer text-white bg-info">
                    <?php echo "ร้านคุณ : " . $row['shop_username']; ?>
                    <?php echo "<a href='shop_profile.php?idshop=" . $row['idshop'] . "'>แสดงความคิดเห็น </a>"; ?>
                </div>
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