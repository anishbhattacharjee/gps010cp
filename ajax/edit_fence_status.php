<?php

include 'config.php';//print_r($_REQUEST);
$cu=$_REQUEST['cust'];
$d=$_REQUEST['dev'];
/**/if($_REQUEST['value']=='active'){
$up="UPDATE geo_fence set fence_status='inactive' WHERE customer_id=$cu AND device_id=$d";//echo $up;
$qr=mysqli_query($con,$up);
}

$sql="UPDATE geo_fence SET ".$_REQUEST['name']."='".$_REQUEST['value']."' WHERE fence_id=".$_REQUEST['pk'];
$rs=mysqli_query($con,$sql);



?>