<?php
//DB configuration
$host = 'localhost';
$dbname = 'mydb';
$username = 'root';
$password = '1234';

//Connect to DB
$conn = mysql_connect($host, $username, $password) or die("Could not connect database : " . mysql_error());
mysql_select_db($dbname, $conn);
mysql_query("SET NAMES UTF8");