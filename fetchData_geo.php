<?php

include_once "config.php";

if (isset($_POST['search'])) {
    //$search = mysqli_real_escape_string($conn, $_POST['search']);
    $search = $_POST['search'];

    //$query = "SELECT * FROM shop WHERE shop_name like'%" . $search . "%'";
    $sql = "SELECT * FROM shop WHERE shop_name like'%" . $search . "%'";
    //$sql = 'SELECT * from shop WHERE idshop="' . $idshop . '"';
    //ec= 'SELECT * from shop WHERE idshop="' . $idshop . '"';
    //$result = mysqli_query($conn, $query);
    $result = mysql_query($sql) or die(mysql_error());

    $response = array();
    //while ($row = mysqli_fetch_array($result)) {
    while ($row = mysql_fetch_assoc($result)) {
        $response[] = array("value" => $row['idshop'], "label" => $row['shop_name']);
    }

    echo json_encode($response);
}

exit;