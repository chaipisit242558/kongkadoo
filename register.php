<?php
include 'header.php';

?>


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