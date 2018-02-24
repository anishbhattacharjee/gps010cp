<?php 
include 'config.php';

$idn=$_GET['inst'];
$sql="SELECT
installation.device_name,
installation.speed_limit,
installation.idle_limit,
installation.tank_capacity,
installation.formula,
installation.device_password
FROM

installation

WHERE instatllation_id=$idn";

$rs=mysqli_query($con,$sql);
$rw=mysqli_fetch_assoc($rs);

echo $rw['device_name'].",".$rw['speed_limit'].",".$rw['idle_limit'].",".$rw['tank_capacity'].",".$rw['device_password'].",".$rw['formula'];


//echo $sql;	





?>