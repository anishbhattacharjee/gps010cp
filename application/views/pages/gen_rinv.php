<?php
if(isset($_POST['submit']) && $_POST['submit']=='Renew'){
	//echo "submit";
	$submonth=(isset($_POST['submonth']))?$_POST['submonth']:'';
	$subcost=(isset($_POST['subcost']))?$_POST['subcost']:'';
	$rid=(isset($_POST['rid']))?$_POST['rid']:'';
	$sql="select * from r_installation where r_id=$rid";//echo $sql;
	$rs=mysql_query($sql);
	$rw=mysql_fetch_assoc($rs);
	$customer_id=$rw['customer_id'];
	$orderid=$rw['order_id'];
	$category_id=$rw['category_id'];
	$device_id=$rw['device_id'];
	$network=isset($_POST['network'])?$_POST['network']:'';
	$simcharge=isset($_POST['simcharge'])?$_POST['simcharge']:'';
	$servicetax=isset($_POST['servicetax'])?$_POST['servicetax']:'';
	$finalcost=isset($_POST['finalcost'])?$_POST['finalcost']:'';
	
	
	//print_r($_POST);
	$iq=mysql_query("INSERT INTO renew_invoice (r_id, customer_id, order_id, category_id, device_id, sub_month, sub_cost, network, simcharge_permonth, service_tax, final_total) VALUES ($rid,'$customer_id', '$orderid', '$category_id', '$device_id', '$submonth', '$subcost', '$network', '$simcharge', '$servicetax', '$finalcost')");
	$rinv=mysql_insert_id();
	//$iq=mysql_query("INSERT INTO renew_invoice (sub_month, sub_cost) values ('$submonth', '$subcost')");
	$iqs=mysql_query("update r_installation set r_invoice=$rinv where r_id=$rid");
	
	redirect("index.php?page=rinvoices&id=$id&inv=$rinv");
}

function redirect($url) {

	if(headers_sent()){

	?>

		<html><head>

			<script language="javascript" type="text/javascript">

				window.self.location='<?php print($url);?>';

			</script>

		</head></html>

	<?php

		exit;

	} else {

		header("Location: ".$url);

		exit;

	}

}

?>

