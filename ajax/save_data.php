<?php



include 'config.php';



$c = $_GET['c'];

$d=$_GET['dev'];

$f=$_GET['f'];

$cu=$_GET['cu'];


/*
$up="UPDATE geo_fence set fence_status='inactive' WHERE customer_id=$cu AND device_id=$d";

$qr=mysqli_query($con,$up);
*/


$q=mysqli_query($con,"INSERT INTO geo_fence (customer_id,device_id, points, fence_name, fence_status) VALUES ( '$cu','$d', '$c','$f','active');");

$fid=mysqli_insert_id();

if($q!=FALSE)

{

    echo $fid;	

}

else

{

	echo "error";

}



?>