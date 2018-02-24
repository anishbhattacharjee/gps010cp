<?php
if(isset($_SESSION['rinv_track_id'])){
					$sql="select * from payment_direcpay where rinv=".$_SESSION['rinv_track_id']." order by ts desc";
					$r=mysql_query($sql);														
					$resp=mysql_fetch_assoc($r);
							
						
							

		
$txnResult = $resp['txnmsg'];
$txnTrackID= isset($resp['txnid']) ? $resp['txnid'] : '';
$transid= isset($resp['rinv']) ? $resp['rinv'] : '';
$ord_rinv="OID".$txnTrackID."_R".$transid;
$amt=$resp['amt'];

unset($_SESSION['rinv_track_id']);
}
?>			<div class="main-content">
				<div class="breadcrumbs" id="breadcrumbs">
					<ul class="breadcrumb">
						<li>
							<i class="icon-home home-icon"></i>
							<a href="#">Home</a>

							<span class="divider">
								<i class="icon-angle-right arrow-icon"></i>
							</span>
						</li>

						<li>
							<a href="#">GPS</a>

							<span class="divider">
								<i class="icon-angle-right arrow-icon"></i>
							</span>
						</li>
						<li class="active">Payment Status</li>
					</ul><!--.breadcrumb-->

					
				</div>

				<div class="page-content">
					<div class="page-header position-relative">
						<h1>
							Renewal Status						
						</h1>
					</div>
                    <div class="row-fluid">
						<div class="span12">
							<!--PAGE CONTENT BEGINS-->
							<div class="alert alert-block alert-info">
										<button type="button" class="close" data-dismiss="alert">
											
										</button>

										<p>
											
											<strong>Order Details:</strong>
											<div style="margin-left: 100px">
											
                                          
											Order Number:<?php echo $ord_rinv; ?><br/>
											Payment Amount: Rs <?php echo $amt; ?><br/>  
                                            Payment Status:<?php echo $txnResult; ?><br/>
											</div>
                                            <br/>
											<strong>
												<i class="icon-thumbs-up"></i>
												For any further assistance
											</strong>
											 please feel free to contact us at
		<span style='color:blue;'>+91 80 49632200 /</span><a style='color:blue;text-decoration:none;' href='mailto:support@ossgpstracking.com'> support@ossgpstracking.com.</a>
										</p>

										
									</div>
							
                       <h2></h2>    
                    <h4></h4>
							
							<!--PAGE CONTENT ENDS-->
						</div><!--/.span-->
					</div><!--/.row-fluid-->
				</div><!--/.page-content-->

			</div><!--/.main-content-->
		</div><!--/.main-container-->
<?php include "include/footer.php"; ?>
</body>
</html>