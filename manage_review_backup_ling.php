<?php session_start();

include_once 'config.php';
$idusername = $_SESSION["idusername"];
//echo $_SESSION["idusername"];
if ($idusername == "admin") {
    $sql = 'SELECT s.shop_name,r.idreview,r.topic,r.content,r.pic FROM shop s, review r WHERE s.idshop=r.idshop ORDER BY r.idshop';

} else {
    $sql = 'SELECT s.shop_name,r.idreview,r.topic,r.content,r.pic FROM shop s, review r WHERE s.idshop=r.idshop and r.idmember="' . $idusername . '" ORDER BY r.idshop';

}

$result = mysql_query($sql) or die(mysql_error());
$i = 1;

if (isset($_GET['idshop'])) {
    $idshop = $_GET['idshop'];
    $sql2 = 'SELECT * from shop where idshop="' . $idshop . '" order by idshop desc';
    $result2 = mysql_query($sql2) or die(mysql_error());
    $row2 = mysql_fetch_array($result2); // ดึงข้อมูลออกมาแค่ row เดียว
    mysql_free_result($result2);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->


    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Document</title>



    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- jQuery UI -->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
</head>

<body>

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
                                    <a class="nav-link" href="index.php">หน้าแรก <span
                                            class="sr-only">(current)</span></a>
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

    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto mt-5">
                <div class="card">
                    <form action="manage_review_insert.php" method="POST" enctype="multipart/form-data">
                        <div class="card-header text-center">
                            สร้างรีวิว
                        </div>
                        <div class="card-body">

                            <div class="form-group row">
                                <label for="topic" class="col-sm-3 col-form-label">ชื่อเรื่อง/หมวดหมู่</label>
                                <div class="col-sm-9">
                                    <input type='text' id='autocomplete' name='autocomplete' class="form-control" re>

                                    <input type='hidden' id='selectuser_id' name='selectuser_id'>
                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="content" class="col-sm-3 col-form-label">เนื้อหารีวิว</label>
                                <div class="col-sm-9">
                                    <textarea cols="10" rows="5" class="form-control" id="content" name="content"
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
                        <div class="card-footer text-center">
                            <input type="submit" name="submit" class="btn btn-success" value="สร้างรีวิว">
                            <a class="btn btn-primary" href="index.php">ย้อนกลับไป</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




    <script type="text/javascript">
    $(document).ready(function() {
        $("#autocomplete").autocomplete({
            source: function(request, response) {
                // Fetch data
                $.ajax({
                    url: "fetchData.php",
                    type: 'post',
                    dataType: "json",
                    data: {
                        search: request.term
                    },
                    success: function(data) {
                        response(data);
                    }
                });
            },
            select: function(event, ui) {
                // Set selection
                $('#autocomplete').val(ui.item.label); // display the selected text
                $('#selectuser_id').val(ui.item.value); // save selected id to input
                return false;
            }
        });

    });
    </script>
</body>

</html>