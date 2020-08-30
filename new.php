<?php
function tags_autolink($text)
{

    $text = " $text ";
    $query_tags_autolink = "SELECT tag from tags";
    $rs_tags_autolink = mysql_query($query_tags_autolink) or print "error getting tags";

    while ($row_tags_autolink = mysql_fetch_array($rs_tags_autolink)) {
        $tag_name = trim($row_tags_autolink['tag']);
        $tag_url = "http://www.domain.com/tag/" . createLink(trim(htmlentities($tag_name))) . "/";
        $text = preg_replace("|(?!<[^<>]*?)(?<![?./&])\b($tag_name)\b(?!:)(?![^<>]*?>)|imsU", "<a
    href=\"$tag_url\">$1</a>", $text);
}

return trim($text);
}
$word = "ร้านอิงดอย";
echo tags_autolink($word);