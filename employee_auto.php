<?php
//2011 Script By php-for-ecommerce.blogspot.com
$conn = mysql_connect('localhost', 'root', '1234'); //เชื่อมต่อกับฐานข้อมูล
mysql_select_db('mydb'); //เลื่อกฐานข้อมูล
mysql_query("SET NAMES 'utf8'");
$rsShowCategory = mysql_query("SELECT shop_name FROM shop WHERE shop_name LIKE '%" . $_REQUEST['keyword'] . "%' ORDER BY shop_name ASC"); //ดึงข้อมูลล่าสุด10แถวจากเทเบิล
if (mysql_num_rows($rsShowCategory) > 0) {
    echo '<ul>';
    while ($ShowCategory = mysql_fetch_array($rsShowCategory)) {
        echo '<li>' . $ShowCategory[0] . '</li>';
    }
    echo '</ul>';
} else {
    echo 'ไม่่พบข้อมูล';
}
mysql_free_result($rsShowCategory);
mysql_close($conn);