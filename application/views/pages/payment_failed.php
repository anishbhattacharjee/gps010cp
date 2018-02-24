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
						<li class="active">Payment Error</li>
					</ul><!--.breadcrumb-->

					
				</div>

				<div class="page-content">
					<div class="page-header position-relative">
						<h1>
							Renewal Failed						
						</h1>
					</div>
                    <div class="row-fluid">
						<div class="span12">
							<!--PAGE CONTENT BEGINS-->
                           
                    <div class="alert alert-error">
										<button type="button" class="close" data-dismiss="alert">
											
										</button>

										<strong>
											<i class="icon-remove"></i>
											Oops Failed.!
										</strong><br/><br>

										<p style="margin-left: 20px">We have noticed that you have not completed your online transaction with us. <br/>Please feel free to reach us at <strong>+91 80 49632200 / enquiry@ossgpstracking.com</strong> for any assistance required.</p>
									</div>
							
							<!--PAGE CONTENT ENDS-->
						</div><!--/.span-->
					</div><!--/.row-fluid-->
				</div><!--/.page-content-->

			</div><!--/.main-content-->
		</div><!--/.main-container-->
<?php include "include/footer.php"; ?>
</body>
</html>