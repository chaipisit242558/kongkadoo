<?php
// header("content-type: text/html; charset=utf-8");
// header("Expires: Wed, 21 Aug 2013 13:13:13 GMT");
// header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
// header("Cache-Control: no-cache, must-revalidate");
// header("Pragma: no-cache");

include "config.php";
//conndb();

$data = $_GET['data'];
$val = $_GET['val'];

if ($data == 'country') {
    echo "<select name='country' onChange=\"dochange('geography', this.value)\">";
    echo "<option value='0'>- เลือกจังหวัด -</option>\n";
    $result = mysql_query("select * from country order by country_name_th");
    while ($row = mysql_fetch_array($result)) {
        //echo "<option value='$row[country_name_th]' >$row[country_name_th]</option>";
        echo "<option value='$row[idcountry]' >$row[country_name_th]</option>";
    }
} else if ($data == 'geography') {
    echo "<select name='geography' onChange=\"dochange('province', this.value)\">";
    echo "<option value='0'>- เลือกจังหวัด -</option>\n";
    $result = mysql_query("select * from geography WHERE idcountry= '$val' order by GEO_NAME");
    while ($row = mysql_fetch_array($result)) {
        //echo "<option value='$row[GEO_NAME]' >$row[GEO_NAME]</option>";
        echo "<option value='$row[GEO_ID]' >$row[GEO_NAME]</option>";
    }
} else if ($data == 'province') {
    echo "<select name='province' onChange=\"dochange('amphur', this.value)\">";
    echo "<option value='0'>- เลือกจังหวัด -</option>\n";
    $result = mysql_query("select * from  province WHERE GEO_ID= '$val' order by PROVINCE_NAME");
    while ($row = mysql_fetch_array($result)) {
        //echo "<option value='$row[PROVINCE_NAME]' >$row[PROVINCE_NAME]</option>";
        echo "<option value='$row[PROVINCE_ID]' >$row[PROVINCE_NAME]</option>";
    }
} else if ($data == 'amphur') {
    echo "<select name='amphur' onChange=\"dochange('district', this.value)\">";
    echo "<option value='0'>- เลือกอำเภอ -</option>\n";
    $result = mysql_query("SELECT * FROM amphur WHERE PROVINCE_ID= '$val' ORDER BY AMPHUR_NAME");
    while ($row = mysql_fetch_array($result)) {
        //echo "<option value=\"$row[AMPHUR_NAME]\" >$row[AMPHUR_NAME]</option> ";
        echo "<option value=\"$row[AMPHUR_ID]\" >$row[AMPHUR_NAME]</option> ";
    }
} else if ($data == 'district') {
    echo "<select name='district'>\n";
    echo "<option value='0'>- เลือกตำบล -</option>\n";
    $result = mysql_query("SELECT * FROM district WHERE AMPHUR_ID= '$val' ORDER BY DISTRICT_NAME");
    while ($row = mysql_fetch_array($result)) {
        //echo "<option value=\"$row[DISTRICT_NAME]\" >$row[DISTRICT_NAME]</option> \n";
        echo "<option value=\"$row[DISTRICT_ID]\" >$row[DISTRICT_NAME]</option> \n";
    }
}
echo "</select>\n";

echo mysql_error();
mysql_close($conn);
//closedb();