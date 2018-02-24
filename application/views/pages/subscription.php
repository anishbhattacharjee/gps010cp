
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

						<li class="active">Subscription Renewal</li>

					</ul><!--.breadcrumb-->



					
				</div>



				<div class="page-content">

					<div class="page-header position-relative">

						<h1>

							Renew Subscriptions

                            <small>

								<i class="icon-double-angle-right"></i>

								Customer CID<?php echo $id; ?>

							</small>

						</h1>

                        

					</div><!--/.page-header-->



					<div class="row-fluid">

						<div class="span12">

							<!--PAGE CONTENT BEGINS--><!--/row-->







							<div class="row-fluid">

								<div class="table-header">

									Expiring and Expired Subscriptions

								</div>



								<table cellpadding="0" cellspacing="3" border="0" class="table table-striped table-bordered" id="example">

									<thead>

										<tr>

											<th class="center">

												<label>

													

													<span class="lbl">Sl No</span>

												</label>

											</th>

										

											

											<th>Order ID</th>

											<th>Category</th>

											<th>Device Type</th>

											<th>Subscription Start Date</th>

											<th>Subscription Months</th>

											<th>Expiry Date</th>

											<th>Status</th>

																	

										</tr>

									</thead>



									<tbody>

									<?php 

								

						$slno=1;

						$qo=mysql_query("Select *,DATE_ADD(installed_date, INTERVAL submonth MONTH) as expiry_date from r_installation i join customers c on c.customer_id=i.customer_id where i.installation_status='completed' and i.renew_status='renew' and c.customer_id=$id");
if(mysql_num_rows($qo) > 0){
						while($srs=mysql_fetch_array($qo))

						{

							$instatllation_id=$srs['r_id'];

							$customer_id=$srs['customer_id'];

							$order_id=$srs['order_id'];

							$catid=$srs['category_id'];

									$devid=$srs['device_id'];

									$order_date=$srs['order_date'];

									$submonth=$srs['submonth'];

										$expiry_date=$srs['expiry_date'];

								$s=mysql_query("select * from customers where customer_id='$customer_id'");

									while($r=mysql_fetch_array($s))

									{

											$uid=$r['customer_uid'];

										$cfrist=$r['customer_first_name'];

										$compname=$r['comp_name'];

									}

								

									?>

									

									<tr>

										<td><?php echo $slno;?></td>

										
										<td><?php echo "OD".$order_id;?></td>

										

										<?php



								



									$sq=mysql_query("select * from gps_categories where category_id='$catid'");



									while($sqss=mysql_fetch_array($sq))



									{ ?>

								<td><?php echo  $sqss['category_type'];?></td>

										

						<?php 

						

						} 

						

						?>

						

						<?php

	$qq=mysql_query("select * from gps_devices where device_id='$devid'");



while($sqss=mysql_fetch_array($qq))



									{



										?> <td><?php echo  $sqss['device_type'];?></td>

									

							



										<?php



									}

									?>

										

								<td><?php echo date("d M Y",strtotime($srs['installed_date']));?></td>

									<td><?php echo $srs['submonth'];?></td>

									

								

										<td><?php echo date("d-m-Y",strtotime($expiry_date));?></td>

						

									

										<td>
                                        <?php if($srs['r_invoice'] > 0){ ?>
                                        <a href="index.php?page=rinvoices&id=<?php echo $id;?>&inv=<?php echo $srs['r_invoice']; ?>"  >Confirm & Pay</a>
                                        <?php } else{ ?>
                             <a href="index.php?page=renew&id=<?php echo $id;?>&rid=<?php echo $instatllation_id;?>"  >Renew</a>           
                                        <?php } ?>
                                        </td>

										

										</tr>

							<?php

								$slno++;

							 } 
							 }else{
								 echo "<tr><td colspan='8'>No expiring subscriptions found</td></tr>";
							 }?>	

							

								

								

									

									</tbody>

								</table>

							</div>





						</div><!--/.span-->

					</div><!--/.row-fluid-->

				</div><!--/.page-content-->



			</div><!--/.main-content-->

		</div><!--/.main-container-->



<?php include "include/footer.php"; ?>

		<!--inline scripts related to this page-->



		<script type="text/javascript">

			$(function() {

				var oTable1 = $('#example').dataTable( {

				"aoColumns": [

			      { "bSortable": false },

			      null, null,null, null, null,null,

				  { "bSortable": false }

				] } );

				

				

				$('table th input:checkbox').on('click' , function(){

					var that = this;

					$(this).closest('table').find('tr > td:first-child input:checkbox')

					.each(function(){

						this.checked = that.checked;

						$(this).closest('tr').toggleClass('selected');

					});

						

				});

			

			

				$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});

				function tooltip_placement(context, source) {

					var $source = $(source);

					var $parent = $source.closest('table')

					var off1 = $parent.offset();

					var w1 = $parent.width();

			

					var off2 = $source.offset();

					var w2 = $source.width();

			

					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';

					return 'left';

				}

			})

		</script>

	</body>

</html>

