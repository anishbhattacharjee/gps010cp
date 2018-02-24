<?php
include '../../gpsfront/dbcon.php';
$username=$_POST['username'];
$password=$_POST['password'];
$customer_name=$_POST['customer_name'];
$id=$_POST['id'];
$uid=$_POST['uid'];
$q=mysql_query("insert into customers(customer_emailid,password,customer_first_name,sub_login_createdby,customer_uid,type,account_type)values('$username','$password','$customer_name','$id','$uid','company','live')");
$cid=mysql_insert_id();
$qq=mysql_query("insert into alert_control(customer_id)values('$cid')");
if($id!=504){	

$cq=mysql_query("INSERT INTO `customer_pages` (`customer_id`, `page`, `folder`) VALUES
( $cid, 'live', 'narayana'),
( $cid, 'dashboard', 'narayana'),
( $cid, 'playback', 'narayana'),
( $cid, 'playback_print', 'narayana'),
( $cid, 'overview', 'narayana'),
( $cid, 'report', 'narayana'),
( $cid, 'reportleft', 'narayana')");
}
if($q)
{
	$msg="success";
	header("Location: ../track.php?page=newlogins&id=$id&msg=$msg");
	//header("Location: hdfc_emi/PerformREQuest.php?ip=$ip");
}

?>