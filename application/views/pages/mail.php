<?php 
$rs3 = $this->action_model->GetData('notifications','',array('notification_id'=>$note));
$rw_msg = $rs3['data'][0];
$ord=$rw_msg['order_id'];



switch($rw_msg['action']){



		case 'order'	:	$title="OGTS-Order";
							
							if($rw_msg['notification']=='Order Failed'){
								$desc="Order Failed";
								$msg="Hi,<br/>Thank you for choosing us for your tracking needs.<br/>

								Order number - ".$rw_msg['order_id']."<br/>

								Order Date - ".$rw_msg['ts']."<br/>

								Your Order Failed.<br/>For further queries or assistance please contact our support team.<br/><br/><br/>

								Regards,<br/>

								OGTS Team	";
							}else{
								$desc="Order Placed";
								$msg="Hi,<br/>Thank you for choosing us for your tracking needs.<br/>

								Order number - ".$rw_msg['order_id']."<br/>

								Order Date - ".$rw_msg['ts']."<br/>

								You will receive payment confirmation and invoice shortly.<br/><br/><br/>

								Regards,<br/>

								OGTS Team	";
							}



							break;

		case 'payment'	:	$title="OGTS-Payment";
							if($rw_msg['notification']=='Payment Failed'){
								$desc="Payment Failed";

							$msg="Hi,<br/>Thank you for choosing us for your tracking needs.<br/>

							Your payment for order $ord on ".$rw_msg['ts']." Failed.<br/> For further queries or assistance please contact our support team. <br/><br/><br/>

							Regards,<br/>

							OGTS Team	";
							}
							else{

							$desc="Payment Received";

							$msg="Hi,<br/>Thank you for choosing us for your tracking needs.<br/>

							We have received payment for order $ord on ".$rw_msg['ts'].". We will process your order shortly. <br/><br/><br/>

							Regards,<br/>

							OGTS Team	";
							}

							break;

		case 'invoice'	:	$title="OGTS-Invoice";

							$desc="Invoice Generated";

							$msg="Hi,<br/>Thank you for choosing us for your tracking needs.<br/>

							Your Invoice for order $ord generated successfully.<br/>

							 <a href=\"".base_url()."profile/invoices/$id/$ord\">Invoice- INV$ord</a><br/><br/>

							Regards,<br/>

							OGTS Team	";

							break;

		case 'document'	:	$title="OGTS-Document Verification";

							$desc="Document Verified";

							$msg="Hi,<br/>Thank you for choosing us for your tracking needs.<br/>

							".$rw_msg['notification']."<br/><br/>		

							We will be assigning an engineer for installing your device shortly.<br/><br/>

							Regards,<br/>

							OGTS Team	";

							break;

		case 'engineer'	:	$title="OGTS-Assigned Engineer";

							$desc="Assigned Engineer For Device Installation";

							$msg="Hi,<br/>Thank you for choosing us for your tracking needs.<br/>

							We have assigned engineer for device installation.<br/>

							We will be installing your device shortly.<br/><br/>

							Regards,<br/>

							OGTS Team	";

							break;

		case 'installation'	:	$title="OGTS-Installation";

							$desc="Installed Device";

							$msg="Hi,<br/>Thank you for choosing us for your tracking needs.<br/>

							".$rw_msg['notification']."<br/><br/>							

							Regards,<br/>

							OGTS Team	";

							break;
							
		case 'r_exp'	:	$title="OGTS-Subscription Expiring";
							 $desc="Subscription is due for renewal";
							 $msg=$rw_msg['notification']."
								<br/><br/><br/>
							Regards,<br/>
							OGTS Team	";
							

							break;
							
		case 'r_expd'	:	$title="OGTS-Subscription Expired";
							 $desc="Disconnected the service";
							 $msg=$rw_msg['notification']."
								<br/><br/><br/>
							Regards,<br/>
							OGTS Team	";

							break;
		case 'renewed'	:	$title="OGTS-Subscription Renewed";
							 $desc="Payment Received and Renewed Subscription";
							 $msg=$rw_msg['notification']."
								<br/><br/><br/>
							Regards,<br/>
							OGTS Team	";

							break;
		case 'renew_fail'	:	$title="OGTS-Subscription Renewal Failed";
							 $desc="Payment was unsuccessful";
							 $msg=$rw_msg['notification']."
								<br/><br/><br/>
							Regards,<br/>
							OGTS Team	";

							break;	

	

}



/*	

	$title="GPS-Payment";

	$desc="Payment Received";

	$msg="Hi,<br/>Thank you for choosing us for your tracking needs.<br/>

	We have received payment for order $ord on ".$rw_msg['order_date'].". We will process your order shortly. <br/><br/><br/>

	Regards,<br/>

	OGTS Team	";

}

else if($type=='inv'){

	$title="GPS-Invoice";

	$desc="Invoice Generated";

	$msg="Hi,<br/>Thank you for choosing us for your tracking needs.<br/>

	Your Invoice for order $ord generated successfully.<br/>

	 <a href=\"index.php?page=invoices&id=1&inv=1\">Invoice- INV1</a><br/><br/>

	Regards,<br/>

	OGTS Team	";

}else{

$sq1="SELECT

*

FROM

v_notifications WHERE order_id=$ord AND device_id=".$type;

$rs=mysql_query($sq1);

$rw_msg=mysql_fetch_assoc($rs);



	$title="GPS-Order";

	$desc="Order Placed";

	$msg="Hi,<br/>Thank you for choosing us for your tracking needs.<br/>

	Order number - ".$rw_msg['order_id']."<br/>

	Order Date - ".$rw_msg['order_date']."<br/>

	You will receive payment confirmation and invoice shortly.<br/><br/><br/>

	Regards,<br/>

	OGTS Team	";

}

*/?>



			<div class="main-content">

				<div class="breadcrumbs" id="breadcrumbs">

					<ul class="breadcrumb">

						<li>

							<i class="icon-home home-icon"></i>

							<a href="index.php?page=profile&id=<?php echo $id; ?>">Home</a>



							<span class="divider">

								<i class="icon-angle-right arrow-icon"></i>

							</span>

						</li>



						<li class="active">Mail</li>

					</ul><!--.breadcrumb-->



					

				</div>



				<div class="page-content">

					<div class="row-fluid">

						<div class="span12">

							<!--PAGE CONTENT BEGINS-->



							<div class="error-container">

								<div class="well">

									<h1 class="grey lighter smaller">

										<?php echo $title; ?>

									</h1>



									<hr />

									<h3 class="lighter smaller">

										<?php echo $desc; ?>

									</h3>



									<div class="space"></div>



									<div>

										<h4 class="lighter smaller"><?php echo $msg; ?></h4>



									</div>



									<hr />

									<div class="space"></div>



									<div class="row-fluid">

										<div class="center">

											<a href="<?=base_url();?>profile/notifications/<?php echo $id; ?>" class="btn btn-grey">

												<i class="icon-arrow-left"></i>

												Go Back

											</a>



											<a href="<?=base_url();?>profile/index/<?php echo $id; ?>" class="btn btn-primary">

												<i class="icon-dashboard"></i>

												Dashboard

											</a>

										</div>

									</div>

								</div>

							</div>



							<!--PAGE CONTENT ENDS-->

						</div><!--/.span-->

					</div><!--/.row-fluid-->

				</div><!--/.page-content-->



			</div><!--/.main-content-->

		</div><!--/.main-container-->



		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">

			<i class="icon-double-angle-up icon-only bigger-110"></i>

		</a>





	</body>

</html>

