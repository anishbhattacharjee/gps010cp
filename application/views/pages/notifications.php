			<div class="main-content">

				<div class="breadcrumbs" id="breadcrumbs">

					<ul class="breadcrumb">

						<li>

							<i class="icon-home home-icon"></i>

							<a href="<?=base_url()?>profile/<?php echo $id; ?>">Home</a>



							<span class="divider">

								<i class="icon-angle-right arrow-icon"></i>

							</span>

						</li>

						<li class="active">Notifications</li>

					</ul><!--.breadcrumb-->



					

				</div>



				<div class="page-content">

					<div class="page-header position-relative">

						<h1>

							Notifications

                            <small>

								<i class="icon-double-angle-right"></i>

								Customer CID<?php echo $id; ?>

							</small>

						</h1>

					</div><!--/.page-header-->



					<div class="row-fluid">

						<div class="span12">

							<!--PAGE CONTENT BEGINS-->



							<div class="row-fluid">

								<div class="span12">

									<div class="space"></div>



										<div class="widget-box transparent">



											<div class="widget-body">

												<div class="widget-main padding-8">

													<div id="profile-feed-1" class="profile-feed">

                                                    

                                                    <?php

	$rs3 = $this->action_model->GetData('notifications','',array('customer_id'=>$id),'','ts desc,notification_id desc');
$rs3 = $rs3['data'];					
										foreach($rs3 as $nots){
//if(($nots['customer_id']==255  || $nots['customer_id']==270 || $nots['customer_id']==237 || $nots['customer_id']==317  || $nots['customer_id']==335 || $nots['customer_id']==338 || $nots['customer_id']==350 || $nots['customer_id']==217 || $nots['customer_id']==216 || $nots['customer_id']==438) && $nots['action']=='invoice'){}else{

$rsinv = $this->action_model->GetData('customers',array('dealers_customer'),array('customer_id'=>$id));			
$rwinv=$rsinv['data'][0];	
if($rwinv['dealers_customer']==1 && ($nots['action']=='invoice' || $nots['action']=='payment' || $nots['action']=='r_exp' || $nots['action']=='r_expd' || $nots['action']=='renewed' || $nots['action']=='renew_fail')){}else{												

/*													if($nots['action']=='order'){

																	 	$type=$nots['order_id'];

																	 }else if($nots['action']=='payment'){

																		$type='pay';

																	 }else if($nots['action']=='invoice'){

																		 $type='inv';

																	 }

*/													?>

                                                    <a href="<?=base_url()?>profile/mail/<?php echo $id; ?>/<?php echo $nots['notification_id']; ?>" style="text-decoration:none;">

														<div class="profile-activity clearfix">

															<div>

																

																

																<?php  

																echo $this->commonfunctions_model->limit_words($nots['notification'],8)."...";																

																echo "<i class=\"pull-left thumbicon ".$this->commonfunctions_model->get_nots_icon($nots['action'])." no-hover\"></i>";



/*																	if($nots['action']=='order'){

																	 	echo "Ordered device ".$nots['device_type']." (".$nots['count_cost'].") for ".$nots['category_type'];

																		echo "<i class=\"pull-left thumbicon icon-ok btn-success no-hover\"></i>";

																	 }else if($nots['action']=='payment'){

																		 echo "Payment processed successfully for Order ".$nots['order_id']." (Rs.".$nots['count_cost'].")";

																		 echo "<i class=\"pull-left thumbicon icon-credit-card btn-info no-hover\"></i>";

																	 }else if($nots['action']=='invoice'){

																		 echo "Generated Invoice for Order ".$nots['order_id']." (Rs.".$nots['count_cost'].")";

																		 echo "<i class=\"pull-left thumbicon icon-list btn-pink no-hover\"></i>";

																	 }

*/																 ?> 

																



																<div class="time">

																	<i class="icon-time bigger-110"></i>

                                                                    

                                                                    <?php

																	$tstamp = strtotime($nots['ts']); 

																	$hours = $this->commonfunctions_model->time_elapsed_string($tstamp);

																	echo $hours;

																	?>

																	

																</div>

															</div>



													</div>

                                                    </a>

<?php }} ?>

														



													</div>

												</div>

											</div>

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



<script>
$(function(){
	
	$('#profile-feed-1').slimScroll({

				height: '400px',

				alwaysVisible : true

				});
});

</script>

		<!--inline scripts related to this page-->



	</body>

</html>

