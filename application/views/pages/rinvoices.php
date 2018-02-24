<?php 

//$inv =order detail id

$sq2="select 
i.*,

c.customer_first_name,

c.customer_middle_name,

c.customer_last_name,

c.customer_phone_no,

c.customer_emailid,

c.address,

c.comp_name,

c.comp_addr,

c.comp_teleph,

c.comp_email,

c.website,
d.device_type,
ca.category_type
from renew_invoice i 
INNER JOIN customers c ON i.customer_id = c.customer_id
INNER JOIN gps_categories ca ON i.category_id = ca.category_id
INNER JOIN gps_devices d ON d.device_id = i.device_id
 where i.id=".$inv;

$rs2=mysql_query($sq2);

$order=mysql_fetch_assoc($rs2);

$tot=($order['sub_cost'])+($order['simcharge_permonth']*$order['sub_month']);
$s_tax_per=$order['service_tax'];
$_SESSION['rinv_track_id']=$inv;
//echo $_SESSION['rinv_track_id']."test";
?>

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



						<li>

							<a href="index.php?page=invoices_list&id=<?php echo $id; ?>">Invoices</a>



							<span class="divider">

								<i class="icon-angle-right arrow-icon"></i>

							</span>

						</li>

						<li class="active">Invoice RINV<?php echo str_pad($inv, 4, '0', STR_PAD_LEFT); ?></li>

					</ul><!--.breadcrumb-->



					

				</div>



				<div class="page-content">

					<div class="row-fluid">

						<div class="span12">

							<!--PAGE CONTENT BEGINS-->



							<div class="space-6"></div>



							<div class="row-fluid">

								<div class="span10 offset1">

									<div class="widget-box transparent invoice-box">

										<div class="widget-header widget-header-large">

											<h3 class="grey lighter pull-left position-relative">

												<i class="icon-leaf green"></i>

												Customer Invoice

											</h3>



											<div class="widget-toolbar no-border invoice-info">

												<span class="invoice-info-label">Invoice:</span>

												<span class="red">#RINV<?php echo str_pad($inv, 4, '0', STR_PAD_LEFT); ?></span>



												<br />

												<span class="invoice-info-label">Date:</span>

												<span class="blue"><?php echo date("d-m-Y",strtotime($order['ts'])); ?></span>

											</div>



											

										</div>



										<div class="widget-body">

											<div class="widget-main padding-24">

												<div class="row-fluid">

													<div class="row-fluid">

														<div class="span6">

															<div class="row-fluid">

																<div class="span12 label label-large label-info arrowed-in arrowed-right">

																	<b>Company Info</b>

																</div>

															</div>



															<div class="row-fluid">

																<ul class="unstyled spaced">

																	<li>

																		<i class="icon-caret-right blue"></i>

																		<?php echo $order['comp_name']; ?>

																	</li>



																	<li>

																		<i class="icon-caret-right blue"></i>

																		<?php echo $order['comp_addr']; ?>

																	</li>



																	<li>

																		<i class="icon-caret-right blue"></i>

																		<?php echo $order['comp_email']; ?>

																	</li>



																	<li>

																		<i class="icon-caret-right blue"></i>

																		Phone:

																		<b class="red"><?php echo $order['comp_teleph']; ?></b>

																	</li>

                                                                    <li>													

																		<i class="icon-caret-right blue"></i>

																		Website:

																		<b class="green"><?php echo $order['website']; ?></b>

																	</li>





																	<li class="divider"></li>



																</ul>

															</div>

														</div><!--/span-->



														<div class="span6">

															<div class="row-fluid">

																<div class="span12 label label-large label-success arrowed-in arrowed-right">

																	<b>Customer Info</b>

																</div>

															</div>



															<div class="row-fluid">

																<ul class="unstyled spaced">

																	<li>

																		<i class="icon-caret-right green"></i>

																		<?php echo $order['customer_first_name']; ?> <?php echo $order['customer_middle_name']; ?> <?php echo $order['customer_last_name']; ?>

																	</li>



																	<li>

																		<i class="icon-caret-right green"></i>

																		<?php echo $order['address']; ?>

																	</li>



																	<li>

																		<i class="icon-caret-right green"></i>

																		<?php echo $order['customer_emailid']; ?>

																	</li>

																	<li>

																		<i class="icon-caret-right green"></i>

																		Phone: <b class="red"><?php echo $order['customer_phone_no']; ?></b>

																	</li>

																	<li class="divider"></li>



																</ul>

															</div>

														</div><!--/span-->

													</div><!--row-->



													<div class="space"></div>



													<div class="row-fluid">

														<table class="table table-striped table-bordered">

															<thead>

																<tr>

																	<th class="center">#</th>
																	<th>Device</th>
																	<th>Category</th>																	
																	<th>Subscription Cost</th>
                                                                    <th>Subscription Months</th>
                                                                    <th>Network</th>
                                                                    <th>Sim Charge/Month</th>
                                                                    <th>Total</th>

																</tr>

															</thead>



															<tbody>

                                                            <?php

															$i=0;


															?>

																<tr>

																	<td class="center"><?php echo ++$i; ?></td>

																	<td>

																		<?php echo $order['device_type']; ?>

																	</td>

																	<td>

																		<?php echo $order['category_type']; ?>

																	</td>

																																		

																	<td>

																		<?php echo $order['sub_cost']; ?>

																	</td>

																	<td>

																		<?php echo $order['sub_month']; ?>

																	</td>
                                                                    <td>

																		<?php
									$sq=mysql_query("select network_name from network where id=".$order['network']);
									$sqs=mysql_fetch_array($sq); echo $sqs['network_name']; ?>

																	</td>
                                                                    <td>

																		<?php echo $order['simcharge_permonth']; ?>

																	</td>

																	<td>

																		<?php echo $tot; ?>

																	</td>

                                                                    

																</tr>

															<?php 

															

															

															$s_tax=($tot*$s_tax_per)/100;

															//$vat=($dev_cost_tot*$vat_per)/100;

															$total=$tot+$s_tax;//+$vat;

															 ?>

                                                            	<tr>

                                                                <td colspan="7" style="text-align:right">Sub-Total</td>

                                                                <td><?php echo $tot; ?></td>

                                                                </tr>

                                                            	<tr>

                                                                <td colspan="7" style="text-align:right">Service Tax ( <?php echo $s_tax_per; ?>% )</td>

                                                                <td><?php echo $s_tax; ?></td>

                                                                </tr>

<!--                                                            	<tr>

                                                                <td colspan="8" style="text-align:right">VAT ( <?php echo $vat_per; ?>% )</td>

                                                                <td><?php echo $vat; ?></td>

                                                                </tr>

-->															</tbody>

														</table>

													</div>



													<div class="hr hr8 hr-double hr-dotted"></div>



													<div class="row-fluid">

														<div class="span5 pull-right">

															<h4 class="pull-right">

																Total amount : Rs.

																<span class="red"><?php echo round($total); ?></span>

															</h4>

														</div>

													</div>



													<div class="space-6"></div>



													<div class="row-fluid">

														<div class="span12 well">

															Thank you for choosing OGTS products.

						We believe you will be satisfied by our services.

														</div>

                                                        <p>

                                                        <a href="index.php?page=r_payment&id=<?php echo $id;?>&inv=<?php echo $inv;?>">

										<button class="btn btn-info btn-block">Confirm & Pay Now</button>

                                        </a>

									</p>

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



<?php include "include/footer.php";?>

	</body>

</html>

