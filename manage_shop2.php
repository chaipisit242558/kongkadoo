<?php session_start();
//include 'header.php';
include_once 'config.php';
$idusername = $_SESSION["idusername"];

//แสดงข้อมูล

$sql = 'SELECT * from shop';
$result = mysql_query($sql) or die(mysql_error());
$i = 1;

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>สร้างร้านค้า</title>
</head>



<script language=Javascript>
function Inint_AJAX() {
    try {
        return new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {} //IE
    try {
        return new ActiveXObject("Microsoft.XMLHTTP");
    } catch (e) {} //IE
    try {
        return new XMLHttpRequest();
    } catch (e) {} //Native Javascript
    alert("XMLHttpRequest not supported");
    return null;
};

function dochange(src, val) {
    var req = Inint_AJAX();
    req.onreadystatechange = function() {
        if (req.readyState == 4) {
            if (req.status == 200) {
                document.getElementById(src).innerHTML = req.responseText; //รับค่ากลับมา
            }
        }
    };
    req.open("GET", "localtion.php?data=" + src + "&val=" + val); //สร้าง connection
    req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8"); // set Header
    req.send(null); //ส่งค่า
}

window.onLoad = dochange('province', -1);
</script>

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
    <br>
    <br>


    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto mt-5">
                <div class="card">
                    <form action="member_insert.php" method="POST" enctype="multipart/form-data">
                        <div class="card-header text-center">
                            สร้างร้านค้า
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="username" class="col-sm-3 col-form-label">ชื่อร้านค้า</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="username" name="username" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-sm-3 col-form-label">เบอร์โทรศัพท์</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-sm-3 col-form-label">อีเมลล์</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="email" name="email" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-sm-3 col-form-label">รายละเอียดร้าน</label>
                                <div class="col-sm-9">
                                    <textarea cols="10" rows="5" class="form-control" id="address" name="address"
                                        required></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="country" class="col-sm-3 col-form-label">ประเทศ</label>
                                <div class="col-sm-9">
                                    <span id="type">
                                        <select>
                                            <option value="0">- เลือกประเทศ -</option>
                                        </select>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="geography" class="col-sm-3 col-form-label">ภูมิภาค</label>
                                <div class="col-sm-9">
                                    <span id="type">
                                        <select>
                                            <option value="0">- ภูมิภาค -</option>
                                        </select>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="province" class="col-sm-3 col-form-label">จังหวัด</label>
                                <div class="col-sm-9">
                                    <span id="type">
                                        <select>
                                            <option value="0">- จังหวัด -</option>
                                        </select>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="amphur" class="col-sm-3 col-form-label">อำเภอ</label>
                                <div class="col-sm-9">
                                    <span id="type">
                                        <select>
                                            <option value="0">- อำเภอ -</option>
                                        </select>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="district" class="col-sm-3 col-form-label">ตำบล</label>
                                <div class="col-sm-9">
                                    <span id="type">
                                        <select>
                                            <option value="0">- ตำบล -</option>
                                        </select>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="village" class="col-sm-3 col-form-label">หมู่บ้าน</label>
                                <div class="col-sm-9">
                                    <span id="type">
                                        <select>
                                            <option value="0">- หมู่บ้าน -</option>
                                        </select>
                                    </span>
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
                            <input type="submit" name="submit" class="btn btn-success" value="สร้างร้าน">
                            <a class="btn btn-primary" href="index.php">ย้อนกลับไป</a>
                            <input type="hidden" name="shopusername" value="<?php echo $idusername ?>">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <!-- <div align="center">
    <p class="style1"><u>ร้านค้า</u></p>
    <form id="form1" name="form1" method="post" class="form" action="manage_shop_insert_process.php"
        enctype="multipart/form-data">

        <p>
            <div align="center" class="input-box" checkfield="#shop_name" checkrule="text">
                <label>ชื่อร้าน</label>
                <input name="shop_name" type="text" id="shop_name" />
                <span class="check"></span>
                <span class="error"></span>
            </div>
        </p>

        <p>
            <div align="center" class="input-box" checkfield="#shop_phone" checkrule="text">
                <label>เบอร์โทร</label>
                <input name="shop_phone" type="text" id="shop_phone" />
                <span class="check"></span>
                <span class="error"></span>
            </div>
        </p>

        <p>
            <div align="center" class="input-box" checkfield="#shop_email" checkrule="text">
                <label>อีเมล์</label>
                <input name="shop_email" type="text" id="shop_email" />
                <span class="check"></span>
                <span class="error"></span>
            </div>
        </p>

        <p>
            <div align="center" class="input-box" checkfield="#shop_explain" checkrule="text">
                <label>คำอธิบาย</label>
                <textarea name="shop_explain" id="shop_explain" rows="3" cols="30"></textarea>
                <span class="check"></span>
                <span class="error"></span>
            </div>
        </p>
        <p>
            ประเภท :
            <span id="type">
                <select>
                    <option value="0">- เลือกประเภท -</option>
                </select>
            </span>
        </p>

        <p>
            ประเทศ :
            <span id="country">
                <select>
                    <option value="0">- เลือกประเทศ -</option>
                </select>
            </span>
        </p>

        <p>
            ภูมิภาค :
            <span id="geography">
                <select>
                    <option value="0">- เลือกภูมิภาค -</option>
                </select>
            </span>
        </p>

        <p>
            จังหวัด :
            <span id="province">
                <select>
                    <option value="0">- เลือกจังหวัด -</option>
                </select>
            </span>
        </p>
        <p>
            อำเภอ :
            <span id="amphur">
                <select>
                    <option value='0'>- เลือกอำเภอ -</option>
                </select>
            </span>
        </p>
        <p>
            ตำบล :
            <span id="district">
                <select>
                    <option value='0'>- เลือกตำบล -</option>
                </select>
            </span>
        </p>


        <div align="center" class="input-box" checkfield="#shop_address" checkrule="text">
            <label>ที่อยู่</label>
            <textarea name="shop_address" id="shop_address" rows="3" cols="30"></textarea>
            <span class="check"></span>
            <span class="error"></span>
        </div>
        </p>


        <p>
            <div align="center" class="input-box" checkfield="#shop_pic" checkrule="text">
                <label>รูปภาพ</label>
                <input name="shop_pic" type="file" id="shop_pic" />
                <span class="check"></span>
                <span class="error"></span>
            </div>
        </p>

        <p>


            <p>
                <div class="input-box">
                    <input type="submit" name="Submit" value="บันทึก"
                        onclick="javascript: return aw_check('#form1');" />
                    <input type="reset" name="Submit2" value="ล้างข้อมูล" />
                </div>
            </p>

    </form>
    <hr width="60%" />
    <p>&nbsp;</p> -->
    <!-- </div> -->
    <br>
    <div class="container">
        <div class="row">
            <div class="col">


                <table class="table">
                    <thead>
                        <tr>
                            <th width="8%" class="style1" scope="col">ลำดับ</th>

                            <th width="13%" scope="col">ชื่อร้าน</th>
                            <th width="14%" scope="col">เบอร์โทร</th>
                            <th width="14%" scope="col">อีเมล์</th>
                            <th width="11%" scope="col">รายละเอียดร้าน</th>
                            <th width="14%" scope="col">ที่อยู่</th>
                            <th width="14%" scope="col">รูปภาพ</th>
                            <th width="11%" scope="col">แก้ไข</th>
                            <th width="8%" scope="col">ลบ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
while ($row = mysql_fetch_assoc($result)) {

    echo "<tr>";
    echo "<td width='50'><div align='center'>" . $i . "</div></td>";

    echo "<td><a href='shop_profile.php?idshop=" . $row['idshop'] . "'>" . $row['shop_name'] . "</a></td>";
    echo "<td><a href='shop_profile.php?idshop=" . $row['idshop'] . "'>" . $row['shop_phone'] . "</a></td>";
    echo "<td><a href='shop_profile.php?idshop=" . $row['idshop'] . "'>" . $row['shop_email'] . "</a></td>";
    echo "<td><a href='shop_profile.php?idshop=" . $row['idshop'] . "'>" . $row['shop_explain'] . "</a></td>";
    echo "<td><a href='shop_profile.php?idshop=" . $row['idshop'] . "'>" . $row['shop_address'] . "</a></td>";
    echo "<td><a href='shop_profile.php?idshop=" . $row['idshop'] . "'><img width='100' height='100' src=" . 'Image/' . $row['shop_pic'] . ">" . "</a></td>";
    echo "<td><div ><a href='manage_shop_update.php?idshop=" . $row['idshop'] . "' >แก้ไข</a></div></td>";
    echo "<td><div ><a href='manage_shop_delete.php?idshop=" . $row['idshop'] . "' onClick=\"return confirm('ต้องการลบข้อมูล " . $row['idshop'] . "?');\"> ลบข้อมูล </a></div></td>";
    echo "</tr>";
    $i++;
}

$num = mysql_num_rows($result);
if ($num == 0) {
    echo "ไม่พบข้อมูล";
}

mysql_free_result($result);
mysql_close($conn);
?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php include 'footer.php';?>