<?php session_start();
include 'header.php';
?>

<nav class="navbar navbar-expand-lg  navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="index.php">Kongkadoo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">หน้าแรก <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="manage_review.php">สร้างรีวิว <span class="sr-only">(current)</span></a>
                </li>

                <!-- <li class="nav-item">
                    <a class="nav-link" href="shop_list.php">ร้านค้า <span class="sr-only">(current)</span></a>
                </li>

                <?php if ($idusername == "admine") {?>
                            <li class="nav-item">
                                <a class="nav-link" href="manage_shop.php">สร้างร้านค้า <span
                                        class="sr-only">(current)</span></a>
                            </li>
                            <?php }?>



            </ul>

            <ul class="navbar-nav ml-auto">
                <!-- ตรวจสอบเงื่อนไขที่ว่า ตัวแปร $_SESSION['id'] ได้ถูกกำหนดขึ้นมาหรือไม่ -->
                <?php if (isset($_SESSION['id'])) {?>



                <li class="nav-item">

                    <a class="nav-link" href=""><?php echo "ยินดีต้อนรับคุณ : " . $_SESSION['fullname']; ?> <span
                            class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><img src="Image/<?php echo $_SESSION['pic']; ?>" alt="" width="25"
                            height="25"> <span class="sr-only">(current)</span></a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="logout.php">ออกจากระบบ <span class="sr-only">(current)</span></a>
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


<?php include 'footer.php';?>