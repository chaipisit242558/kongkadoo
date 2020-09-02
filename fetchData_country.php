<?php

include_once "config.php";

if (isset($_POST['search'])) {
    $search = $_POST['search'];
//$search = "ไทย";
    //$sql = "SELECT * FROM country WHERE country_name_th like'%" . $search . "%'";
    $sql = "SELECT * FROM country WHERE country_name_th like'%" . $search . "%'";

    $result = mysql_query($sql) or die(mysql_error());
    $response = array();
    while ($row = mysql_fetch_assoc($result)) {
        $response[] = array("label" => $row['country_name_th']);
    }
// echo "<pre>";
    // print_r($response);
    // echo "</pre>";
    echo json_encode($response);
}

exit;