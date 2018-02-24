<?php
$sql="select * from alert_control where customer_id=$id";
$rs=mysql_query($sql);
$rw=mysql_fetch_assoc($rs);
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
						<li class="active">Payment Success</li>
					</ul><!--.breadcrumb-->

					
				</div>

				<div class="page-content">
					<div class="page-header position-relative">
						<h1>
							Renewal Success						
						</h1>
					</div>
                    <div class="row-fluid">
						<div class="span12">
							<!--PAGE CONTENT BEGINS-->
							<div class="alert alert-block alert-success">
										<button type="button" class="close" data-dismiss="alert">
											
										</button>

										<p>
											<strong>
												<i class="icon-ok"></i>
												Thank you 
											</strong>
											for your subscription renewal order for 6 months starting from <?php echo $rw['date']; ?>.
											
											<div style="margin-left: 100px">
											<br/><strong>Order Confirmation Details:</strong><br/>
											Order Number:<?php echo ""; ?><br/>
											Subscription Charges: Rs <?php echo ""; ?>
											</div>
										
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