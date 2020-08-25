<nav class="navbar navbar-expand-lg  navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Kongkadoo</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                   <span class="navbar-toggler-icon"></span>
            </button>
           <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                 <li class="nav-item active">
                    <a class="nav-link" href="#">หน้าแรก <span class="sr-only">(current)</span></a>
                 </li>

                 <li class="nav-item">
                    <a class="nav-link" href="#">สร้างรีวิว <span class="sr-only">(current)</span></a>
                 </li>

                 <li class="nav-item">
                    <a class="nav-link" href="#">ร้านค้า <span class="sr-only">(current)</span></a>
                 </li>

                 <li class="nav-item">
                    <a class="nav-link" href="#">สร้างร้านค้า <span class="sr-only">(current)</span></a>
                 </li>


                </ul>

                

                <ul class="navbar-nav ml-auto">
                    <!-- ตรวจสอบเงื่อนไขที่ว่า ตัวแปร $_SESSION['id'] ได้ถูกกำหนดขึ้นมาหรือไม่ -->
                    <?php if (isset($_SESSION['id'])) {?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     ยินดีต้อนรับ คุณ <?php echo $_SESSION['first_name']; ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="logout.php">ออกจากระบบ</a>
                        </div>
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