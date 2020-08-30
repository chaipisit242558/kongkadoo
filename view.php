<?php
function autolink($temp)
{

    //สร้างลิงค์อีเมล์
    $temp = preg_replace("#(^|[\n ])([a-z0-9&\-_.]+?)@([\w\-]+\.([\w\-\.]+\.)*[\w]+)#i", "\\1<a href=\"mailto:\\2@\\3\"><font color=#FF6600>\\2@\\3</font></a>", $temp);

    // สร้างลิ้งค์ http://
    $temp = preg_replace("#(^|[\n ])([\w]+?://[^ \"\n\r\t<]*)#is", "\\1<a href=\"\\2\" target=\"_blank\"><font color=#FF6600>\\2</font></a>", $temp);

    //สร้างลิ้ล์ www.
    $temp = preg_replace("#(^|[\n ])((www|ftp)\.[^ \"\t\n\r<]*)#is", "\\1<a href=\"http://\\2\" target=\"_blank\"><font color=#FF6600>\\2</font></a>", $temp);

    return ($temp);

}
$string = "gkdfs www.win";
echo autolink($string);