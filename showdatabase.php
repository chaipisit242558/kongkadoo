<?php
require_once 'config.php';

function get_city($conn, $term)
{
    $query = "SELECT shop_name FROM shop WHERE shop_name LIKE '%" . $term . "%' ORDER BY shop_name ASC";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $data;
}

if (isset($_GET['term'])) {
    $getCity = get_city($conn, $_GET['term']);
    $cityList = array();
    foreach ($getCity as $city) {
        $cityList[] = $city['shop_name'];
    }
    echo json_encode($cityList);
}