<?php session_start();
$idusername = $_SESSION["idusername"];
include 'header.php';
include_once 'config.php';

if ($idusername == "admin") {
    $sql = 'SELECT * FROM member  ORDER BY idmember desc';

} else {
    $sql = 'SELECT * FROM member WHERE username="' . $idusername . '" ORDER BY idmember desc';

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

<br><br>

<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto mt-5">
            <div class="card">
                <form action="member_insert.php" method="POST" enctype="multipart/form-data">
                    <div class="card-header text-center">
                        กรอกข้อมูลสมัครสมาชิก
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="username" class="col-sm-3 col-form-label">ชื่อผู้ใช้งาน</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-3 col-form-label">รหัสผ่าน</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fullname" class="col-sm-3 col-form-label">ชื่อ-สกุล</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="fullname" name="fullname" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label">อีเมลล์</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="email" name="email" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-sm-3 col-form-label">เบอร์โทรศัพท์</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="phone" name="phone" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-sm-3 col-form-label">ที่อยู่</label>
                            <div class="col-sm-9">
                                <textarea cols="10" rows="5" class="form-control" id="address" name="address"
                                    required></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fileUpload" class="col-sm-3 col-form-label">อัพโหลดรูปภาพ</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" id="fileUpload" name="fileUpload"
                                    onchange="readURL(this)">
                            </div>
                        </div>
                        <figure class="figure text-center d-none">
                            <img id="imgUpload" class="figure-img img-fluid rounded" alt="">
                        </figure>
                    </div>
                    <div class="card-footer text-center">
                        <input type="submit" name="submit" class="btn btn-success" value="สมัครสมาชิก">
                        <a class="btn btn-primary" href="index.php">ย้อนกลับไป</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<br>
<br>

<div class="container">
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                        <th class="style1" scope="col">ลำดับ</th>
                        <th scope="col" width="15%">Username</th>
                        <th scope="col" width="25%">ชื่อ-สกุล</th>
                        <th scope="col" width="15%">เบอร์โทรศัพท์</th>
                        <th scope="col" width="15%">อีเมลล์</th>
                        <th scope="col" width="10%">แก้ไข</th>
                        <th scope="col" width="10%">ลบ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
while ($row = mysql_fetch_assoc($result)) {

    echo "<tr>";
    echo "<td ><div align='center'>" . $i . "</div></td>";
    echo "<td ><a href='member_profile.php?idmember=" . $row['username'] . "'><div >" . $row['username'] . "</a></div></td>";
    echo "<td><a href='member_profile.php?idmember=" . $row['username'] . "'>" . $row['fullname'] . "</a></td>";
    echo "<td><a href='member_profile.php?idmember=" . $row['username'] . "'>" . $row['phone'] . "</a></td>";
    echo "<td><a href='member_profile.php?idmember=" . $row['username'] . "'>" . $row['email'] . "</a></td>";

    echo "<td><div ><a class='btn btn-warning' role='button' href='manage_member_update.php?idmember=" . $row['username'] . "'>แก้ไข</a></div></td>";
    echo "<td><div ><a class='btn btn-danger' role='button' href='manage_member_delete.php?idmember=" . $row['username'] . "' onClick=\"return confirm('ต้องการลบข้อมูล " . $row['fullname'] . "?');\"> ลบข้อมูล </a></div></td>";
    echo "</tr>";
    $i++;
}

$num = mysql_num_rows($result);
if ($num == 0) {
    echo "ไม่พบข้อมูล";
}

?>
                </tbody>
            </table>

        </div>
    </div>
</div>
<?php
mysql_free_result($result);
mysql_close($conn);
?>


<script>
/**
 * ประกาศ function readURL()
 * เพื่อทำการตรวจสอบว่า มีไฟล์ภาพที่กำหนดถูกอัพโหลดหรือไม่
 * ถ้ามีไฟล์ภาพที่กำหนดถูกอัพโหลดอยู่ ให้แสดงไฟล์ภาพนั้นผ่าน elements ที่มี id="imgUpload"
 */
function readURL(input) {
    if (input.files[0]) {
        var reader = new FileReader();
        $('.figure').addClass('d-block');
        reader.onload = function(e) {
            console.log(e.target.result)
            $('#imgUpload').attr('src', e.target.result).width(240);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>

<?php include 'footer.php';?>