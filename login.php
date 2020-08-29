<?php session_start();
include 'header.php';
?>

<?php
require_once 'config.php'; // ดึงไฟล์เชื่อมต่อ Database เข้ามาใช้งาน
/**
 * ตรวจสอบเงื่อนไขที่ว่า ตัวแปร $_POST['submit'] ได้ถูกกำหนดขึ้นมาหรือไม่
 */
if (isset($_POST['submit'])) {
    /**
     * กำหนดตัวแปรเพื่อมารับค่า
     */
    $username = $_POST['username'];

    $password = $_POST['password'];
    /**
     * สร้างตัวแปร $sql เพื่อเก็บคำสั่ง Sql
     * จากนั้นให้ใช้คำสั่ง $conn->query($sql) เพื่อที่จะประมาณผลการทำงานของคำสั่ง sql
     */
    $sql = 'SELECT * from member ';
    $sql .= "where  username ='" . $username . "'";
    $sql .= "and password ='" . $password . "'";
    //echo $sql;
    $result = mysql_query($sql) or die(mysql_error());
    $num_rows = mysql_num_rows($result);

    if ($num_rows > 0) {
        $row = mysql_fetch_array($result);
        mysql_free_result($result);
        $_SESSION["idusername"] = $row['username'];
        $_SESSION["password"] = $row['password'];
        $_SESSION['idmember'] = $row['idmember'];
        $_SESSION['fullname'] = $row['fullname'];
        $_SESSION['pic'] = $row['pic'];
        $_SESSION['id'] = $row['idmember'];

        header('location:index.php');
    } else {
        ?>
<script>
alert("Username or Password ไม่ถูกต้อง กรุณาใส่ใหม่!!!");
</script>
<?php
}

}
?>
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto mt-5">
            <div class="card">
                <form action="login.php" method="POST">
                    <div class="card-header text-center">
                        กรุณาเข้าสู่ระบบ
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
                    </div>
                    <div class="card-footer text-center">
                        <input type="submit" name="submit" class="btn btn-success" value="เข้าสู่ระบบ">
                        <a class="btn btn-primary" href="index.php">ย้อนกลับไป</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
mysql_close($conn);
include 'footer.php';
?>