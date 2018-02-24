  <?php

	//$inv 

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

							<a href="#">Invoice</a>



							<span class="divider">

								<i class="icon-angle-right arrow-icon"></i>

							</span>

						</li>

						<li class="active">Payment</li>

					</ul><!--.breadcrumb-->



					

				</div>



				<div class="page-content">

					<div class="page-header position-relative">

						<h1>

							Payment

						</h1>

					</div><!--/.page-header-->



					<div class="row-fluid">

						<div class="span12">

							<!--PAGE CONTENT BEGINS-->



							<div class="row-fluid">

								<div class="span12">

									<div class="widget-box">

										<div class="widget-header widget-header-blue widget-header-flat">

											<h4 class="lighter">Pay Now to continue subscription</h4>



											<div class="widget-toolbar" style="display:none" >

												<label>

													<small class="green">

														<b>Validation</b>

													</small>



													<input id="skip-validation" type="checkbox" class="ace-switch ace-switch-4" checked />

													<span class="lbl"></span>

												</label>

											</div>

										</div>



										<div class="widget-body">

											<div class="widget-main">

												<div class="row-fluid">

													<div id="fuelux-wizard" class="row-fluid hide" data-target="#step-container">

														<ul class="wizard-steps">

															<li data-target="#step1" class="active">

																<span class="step">1</span>

																<span class="title">Confirm Order</span>

															</li>



<!--															<li data-target="#step2">

																<span class="step">2</span>

																<span class="title">Alerts</span>

															</li>

-->

															<li data-target="#step2">

																<span class="step">2</span>

																<span class="title">Payment Info</span>

															</li>



															<li data-target="#step3">

																<span class="step">3</span>

																<span class="title">Success</span>

															</li>

														</ul>

													</div>



													<hr />

													<div class="step-content row-fluid position-relative" id="step-container">

														<div class="step-pane active" id="step1">

													<div class="row-fluid">

														<table class="table table-striped table-bordered">

															<thead>

																<tr>

																	<th class="center">#</th>

																	<th>Product</th>

																	<th>Category</th>

																	<th>No of Devices</th>																	

																	<th>Subscription Cost</th>

                                                                    <th>Subscription Months</th>

                                                                    <th>Total</th>

																</tr>

															</thead>



															<tbody>

                                                            <?php

															$i=0;

															$subtot=0;

															$subs_cost=0;

															$inst_cost=0;

															$dev_cost_tot=0;

															

															$sql1="SELECT

od.category_id,

gps_categories.category_type,

od.device_id,

gps_devices.device_type,

od.noofdevice,

od.sub_month,

od.subcost,

gps_devices.device_cost,

gps_devices.installation_cost

FROM

customer_order_details od

INNER JOIN gps_categories ON od.category_id = gps_categories.category_id

INNER JOIN gps_devices ON gps_devices.device_id = od.device_id

WHERE od.id=$inv";

															$rs1=mysql_query($sql1);

															while($ord_det=mysql_fetch_assoc($rs1)){

															

$tot=($ord_det['noofdevice']*$ord_det['subcost']);

$subtot+=$tot;

$subs_cost+=($ord_det['noofdevice']*$ord_det['subcost']);

//$inst_cost+=($ord_det['noofdevice']*$ord_det['installation_cost']);

//$dev_cost_tot+=($ord_det['noofdevice']*$ord_det['device_cost']);



															?>

																<tr>

																	<td class="center"><?php echo ++$i; ?></td>

																	<td>

																		<?php echo $ord_det['device_type']; ?>

																	</td>

																	<td>

																		<?php echo $ord_det['category_type']; ?>

																	</td>

																	<td>

																		<?php echo $ord_det['noofdevice']; ?>

																	</td>																	

																	<td>

																		<?php echo $ord_det['subcost']; ?>

																	</td>

																	<td>

																		<?php echo $ord_det['sub_month']; ?>

																	</td>

																	<td>

																		<?php echo $tot; ?>

																	</td>

                                                                    

																</tr>

															<?php }

															

															

															$s_tax=($subs_cost*$s_tax_per)/100;

															//$vat=($dev_cost_tot*$vat_per)/100;

															$total=$subtot+$s_tax;//+$vat;

															 ?>

                                                            	<tr>

                                                                <td colspan="6" style="text-align:right">Sub-Total</td>

                                                                <td><?php echo $subtot; ?></td>

                                                                </tr>

                                                            	<tr>

                                                                <td colspan="6" style="text-align:right">Service Tax ( <?php echo $s_tax_per; ?>% )</td>

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

																<span class="red"><?php echo $total; ?></span>

															</h4>

														</div>

													</div>

												</div>



<!--														<div class="step-pane" id="step2">

															<div class="row-fluid">

																<div class="alert alert-success">

																	<button type="button" class="close" data-dismiss="alert">

																		<i class="icon-remove"></i>

																	</button>



																	<strong>

																		<i class="icon-ok"></i>

																		Well done!

																	</strong>



																	You successfully read this important alert message.

																	<br />

																</div>

															</div>

														</div>

-->

														<div class="step-pane" id="step2">

															<div class="center">

																<h3 class="blue lighter">Payment Method</h3>

<!--                                                                <form>

                                                                <input type="radio" name="pay_m" value="dd" checked/>Pay by DD

                                                                <input type="radio" name="pay_m" value="bank"/>Bank Transfer

                                                                </form>

-->															

																<div class="control-group">

																	

																	<div class="controls">

																		<span class="span12">

																			

																				<input name="pay_m" value="1" type="radio" checked />

																				<span class="lbl"> Pay by DD</span>

																			



																			

																				<input name="pay_m" value="2" type="radio" />

																				<span class="lbl"> Bank Transfer</span>

																			

																		</span>

																	</div>

																</div>

															</div>

														</div>



														<div class="step-pane" id="step3">

															<div class="center">

																<h3 class="green">Congrats!</h3>

																Your subscription has renewed for next 6 months.

                                                                

															</div>

														</div>

													</div>



													<hr />

													<div class="row-fluid wizard-actions">

														<button class="btn btn-prev">

															<i class="icon-arrow-left"></i>

															Prev

														</button>



														<button class="btn btn-success btn-next" data-last="Finish ">

															Next

															<i class="icon-arrow-right icon-on-right"></i>

														</button>

													</div>

												</div>

											</div><!--/widget-main-->

										</div><!--/widget-body-->

									</div>

								</div>

							</div>





						</div><!--/.span-->

					</div><!--/.row-fluid-->

				</div><!--/.page-content-->



			</div><!--/.main-content-->

		</div><!--/.main-container-->



<?php include "include/footer.php";?>

		<!--inline scripts related to this page-->



		<script type="text/javascript">

			$(function() {

			

				$('[data-rel=tooltip]').tooltip();

			

				$(".select2").css('width','150px').select2({allowClear:true})

				.on('change', function(){

					$(this).closest('form').validate().element($(this));

				}); 

			

			

				var $validation = false;

				$('#fuelux-wizard').ace_wizard().on('change' , function(e, info){

					if(info.step == 1 && $validation) {

						if(!$('#validation-form').valid()) return false;

					}

				}).on('finished', function(e) {

/*					bootbox.dialog("Thank you! Your information was successfully saved!", [{

						"label" : "OK",

						"class" : "btn-small btn-primary",

						}]

					);

*/					

					window.parent.location="ajax/renewal.php?id=<?php echo $id; ?>&oid=<?php echo $inv; ?>";

					

				}).on('stepclick', function(e){

					//return false;//prevent clicking on steps

				});

			

			

				//$('#validation-form').hide();

				$('#sample-form').hide();

/*				$('#skip-validation').removeAttr('checked').on('click', function(){

					$validation = this.checked;

					if(this.checked) {

						$('#sample-form').hide();

						$('#validation-form').show();

					}

					else {

						$('#validation-form').hide();

						$('#sample-form').show();

					}

				});

*/			

			

			

				//documentation : http://docs.jquery.com/Plugins/Validation/validate

			

			

				$.mask.definitions['~']='[+-]';

				$('#phone').mask('(999) 999-9999');

			

				jQuery.validator.addMethod("phone", function (value, element) {

					return this.optional(element) || /^\(\d{3}\) \d{3}\-\d{4}( x\d{1,6})?$/.test(value);

				}, "Enter a valid phone number.");

			

				$('#validation-form').validate({

					errorElement: 'span',

					errorClass: 'help-inline',

					focusInvalid: false,

					rules: {

						email: {

							required: true,

							email:true

						},

						password: {

							required: true,

							minlength: 5

						},

						password2: {

							required: true,

							minlength: 5,

							equalTo: "#password"

						},

						name: {

							required: true

						},

						phone: {

							required: true,

							phone: 'required'

						},

						url: {

							required: true,

							url: true

						},

						comment: {

							required: true

						},

						state: {

							required: true

						},

						platform: {

							required: true

						},

						subscription: {

							required: true

						},

						gender: 'required',

						agree: 'required'

					},

			

					messages: {

						email: {

							required: "Please provide a valid email.",

							email: "Please provide a valid email."

						},

						password: {

							required: "Please specify a password.",

							minlength: "Please specify a secure password."

						},

						subscription: "Please choose at least one option",

						gender: "Please choose gender",

						agree: "Please accept our policy"

					},

			

					invalidHandler: function (event, validator) { //display error alert on form submit   

						$('.alert-error', $('.login-form')).show();

					},

			

					highlight: function (e) {

						$(e).closest('.control-group').removeClass('info').addClass('error');

					},

			

					success: function (e) {

						$(e).closest('.control-group').removeClass('error').addClass('info');

						$(e).remove();

					},

			

					errorPlacement: function (error, element) {

						if(element.is(':checkbox') || element.is(':radio')) {

							var controls = element.closest('.controls');

							if(controls.find(':checkbox,:radio').length > 1) controls.append(error);

							else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));

						}

						else if(element.is('.select2')) {

							error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));

						}

						else if(element.is('.chzn-select')) {

							error.insertAfter(element.siblings('[class*="chzn-container"]:eq(0)'));

						}

						else error.insertAfter(element);

					},

			

					submitHandler: function (form) {

					},

					invalidHandler: function (form) {

					}

				});

			

				

				

				

				$('#modal-wizard .modal-header').ace_wizard();

				$('#modal-wizard .wizard-actions .btn[data-dismiss=modal]').removeAttr('disabled');

			})

		</script>

	</body>

</html>

