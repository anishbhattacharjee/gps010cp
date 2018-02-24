<?php
include '../../gpsfront/dbcon.php';
$customer_id=$_POST['customer_id'];
$device=$_POST['device'];
$id=$_POST['id'];
foreach($device as $devices)
{
$qq=mysql_query("select * from installation where instatllation_id='$devices'");
while($rq=mysql_fetch_array($qq))
{
	$sim=$rq['sim_no'];
	$modelid=$rq['model_id'];
	$imieno=$rq['imie_no'];
	$category_id=$rq['category_id'];
	$device_type=$rq['device_id'];
	$orderid=$rq['order_id'];
	$devicesnm=$rq['device_name'];
	$apdtt=$rq['device_date_time'];

	$submonth=$rq['submonth'];

	$customer_type=$rq['customer_type'];
	
	$instdt=$rq['installed_date'];
	
	$q=mysql_query("INSERT INTO installation (customer_id,allocation_status, sim_no, model_id,imie_no,category_id,device_id,order_id,device_name,device_date_time,assign_device_status,submonth,order_date,customer_type,demo_device_type,assign_engineer,installation_status,installed_date) VALUES ('$customer_id','completed','$sim', '$modelid','$imieno','$category_id','$device_type','$orderid','$devicesnm','$apdtt','assigned','$submonth','','$customer_type','notdemo','assigned','completed','$instdt')");
} }
if(isset($q))
{
	$msg="success";
	header("Location: ../index.php?page=assign_device&id=$id&msg=$msg");
}
?>