

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

						<li class="active">Orders</li>

					</ul><!--.breadcrumb-->



					
				</div>



				<div class="page-content">

					<div class="page-header position-relative">

						<h1>

							Orders 

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

									Results for "Latest Orders "

								</div>



								<table id="sample-table-2" class="table table-striped table-bordered table-hover">

									<thead>

										<tr>

											<th class="center">

												<label>

													<input type="checkbox" />

													<span class="lbl"></span>

												</label>

											</th>

											<th>Sl.No.</th>

											<th>OrderID</th>

											<th class="hidden-480">Device Category</th>



											<th class="hidden-phone">

												Device Model

											</th>

											<th class="hidden-480">No.of Devices</th>

											<th class="hidden-480">Invoice</th>

										</tr>

									</thead>



									<tbody>

                                    

                                    <?php
									

									$i=0;

									$sql="SELECT

od.order_id,

od.category_id,

od.device_id,

od.noofdevice,

od.sub_month,

od.subcost,

od.final_cost,

gps_devices.device_type,

gps_categories.category_type

FROM

customer_order_details od

INNER JOIN gps_devices ON od.device_id = gps_devices.device_id

INNER JOIN gps_categories ON od.category_id = gps_categories.category_id

INNER JOIN payment_master r on od.order_id=r.order_id

WHERE customer_id=$id  and r.response='success'";

$rs=mysql_query($sql);

while($ordrs=mysql_fetch_assoc($rs)){

	

									

									?>

										<tr>

											<td class="center">

												<label>

													<input type="checkbox" />

													<span class="lbl"></span>

												</label>

											</td>



											<td>

												<?php echo ++$i; ?>

											</td>

											<td>OID<?php echo $ordrs['order_id']; ?></td>

											<td class="hidden-480"><?php echo $ordrs['category_type']; ?></td>

											<td class="hidden-phone"><?php echo $ordrs['device_type']; ?></td>



											<td class="hidden-480">

												<?php echo $ordrs['noofdevice']; ?>

											</td>



											<td ><?php
											$sqinv="select dealers_customer from customers where customer_id=$id";
$rsinv=mysql_query($sqinv);
$rwinv=mysql_fetch_assoc($rsinv);
if($rwinv['dealers_customer']!=1){
  // if($id!=255  && $id!=270 && $id!=237 && $id!=317  && $id!=335 && $id!=338 && $id!=350 && $id!=217 && $id!=216 && $id!=438){
  	if($id!=530){ ?>

													<a class="green" href="index.php?page=invoices&id=<?php echo $id; ?>&inv=<?php echo $ordrs['order_id']; ?>">

														Invoice INV<?php echo str_pad($ordrs['order_id'], 4, '0', STR_PAD_LEFT); ?>

													</a>

<?php }} ?>

											</td>

										</tr>

<?php } ?>

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

				var oTable1 = $('#sample-table-2').dataTable( {

				"aoColumns": [

			      { "bSortable": false },

			      null, null,null, null, null,

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

