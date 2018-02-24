<?php

header('Content-type: text/xml');

echo '<?xml version="1.0" encoding="utf-8"?>';



include 'config.php';



//$imei = $_GET['imei'];
$op="<master>";
$cid = $_GET['cid'];

$sqinst="SELECT
installation.imie_no
FROM
installation
INNER JOIN gps_model_details ON installation.model_id = gps_model_details.model_id
INNER JOIN gps_categories ON installation.category_id = gps_categories.category_id
INNER JOIN gps_devices ON gps_devices.device_id = installation.device_id
WHERE customer_id=$cid AND installation_status='completed' and gps_categories.category_id!=4  order by installation.device_name";
$rsinst=mysqli_query($con,$sqinst);
if($rsinst && mysql_num_rows($rsinst) > 0){
while($rwinst=mysqli_fetch_assoc($rsinst)){
	


$vid = $rwinst['imie_no'];

/*

$q=mysqli_query($con,"SELECT ifnull(temp,0) as temp,ifnull(temp2,0) as temp2 FROM gps_master where imei='$vid' and YEAR(device_time)=YEAR(NOW()) AND device_status='A' AND  lat between 7 and 35 and lng between 65 and 95 ORDER BY device_time desc LIMIT 1");
$rw=mysqli_fetch_array($q);
*/
	

	
$door="";
$doordt="";
$t1="NA";$t2="NA";
//$sqd="SELECT door_status,device_time FROM `gps_master` where imei='$vid' and door_status !='' ORDER BY `device_time`  DESC limit 1";
$sqd="SELECT temp1, temp2,door_status,device_time FROM `latest_records` where imei='$vid'";
$rsd=mysqli_query($con,$sqd);
if($rsd && mysql_num_rows($rsd)>0){
	$rwd=mysqli_fetch_assoc($rsd);
	$t1=round($rwd['temp1'],1);
	$t2=round($rwd['temp2'],1);
	$door=$rwd['door_status'];
	$doordt=" from ".date("d-m-Y H:i:s",strtotime($rwd['device_time']));
}
/*
if($t1<=0){
	$t1="NA";
}
if($t2<=0){
	$t2="NA";
}*/

	


$op.="<marker>
<t1>".$t1."</t1>
<t2>".$t2."</t2>
<door>".$door."</door>
<doordt>".$doordt."</doordt>
<devtime>".date("d-m-Y H:i:s",strtotime($rwd['device_time']))."</devtime>
</marker>";	
/*
$op.="<marker>
<t1>".round($rw['temp'],1)."</t1>
<t2>".round($rw['temp2'],1)."</t2>
</marker>";
*/
}
}

	echo $op."</master>";	







?>