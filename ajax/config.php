<?php 
$host='localhost';

$user='root';

$pwd='';

$db='gps';

error_reporting(E_ALL ^ E_DEPRECATED);

$con = mysqli_connect($host,$user,$pwd,$db) or die("Could not connect to database");

date_default_timezone_set("Asia/Kolkata");
?>