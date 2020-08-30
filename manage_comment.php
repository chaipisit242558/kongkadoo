<?php session_start();
include 'header.php';
include_once 'config.php';
$idusername = $_SESSION["username"];
//===========================  select table review ===============================

if (isset($_GET['idreview'])) {
    $idreview = $_GET['idreview'];

    $sql = 'SELECT * FROM review WHERE idreview=' . $idreview . '';

    $result = mysql_query($sql) or die(mysql_error());

    $row = mysql_fetch_array($result); // ดึงข้อมูลออกมาแค่ row เดียว
    mysql_free_result($result);
}

//=================================================================================
$sql2 = 'SELECT * from comment WHERE idreview=' . $idreview . '';

$result2 = mysql_query($sql2) or die(mysql_error());
$j = 1;

//============================== select table comment ================================

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

ิ<br>
<br>
<br>
ิ<br>


<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">




            <div class="card">
                <div class="card-header text-white bg-success mb-3">
                    <?php echo "หัวข้อรีวิว : " . $row['topic']; ?>
                </div>
                <div class="card-body">

                    <p class="card-text"><?php echo $row['content']; ?></p>
                    <img width="200" height="200" src="Image/<?php echo $row['pic']; ?>" alt="..."
                        class="img-thumbnail">
                    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                </div>
                <div class="card-footer text-white bg-success">
                    <?php echo "รีวิวโดย : " . $row['idmember']; ?>
                </div>
            </div>

            <!-- // form Comment -->
            <p>
                <!-- <H4>แสดงความคิดเห็น</H4> -->
                <a class="btn btn-primary" href="manage_review.php" role="button">แสดงความคิดเห็น</a>
                <!-- <form name="comment" action="manage_comment_insert.php" method="post" class="form-horizontal">
                    <textarea name="tarcomment" class="form-control"></textarea>
                    <p></p> -->
                <!-- <button type="button" class="btn btn-primary">แสดงความคิดเห็น</button> -->
                <!-- <input type="hidden" id="idreview" name="idreview" value="<?php echo $idreview ?>">
                </form> -->
            </p>

            <?php

mysql_free_result($result2);
mysql_close($conn);

?>

        </div>
    </div>
</div>


<?php include 'footer.php';?>