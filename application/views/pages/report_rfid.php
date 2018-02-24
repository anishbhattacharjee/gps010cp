			<div class="main-content">
				<div class="breadcrumbs" id="breadcrumbs">

					<ul class="breadcrumb">

						<li>

							<i class="icon-home home-icon"></i>

							<a href="#">Home</a>

                            

							<span class="divider">

								<i class="icon-angle-right arrow-icon"></i>

							</span>



						</li>

						<li class="active">Reports</li>



					</ul><!--.breadcrumb-->

                    



				</div>
                



<link rel="stylesheet" type="text/css" href="media/css/TableTools.css">



				<div class="page-content">



					<div class="page-header position-relative">

						<h1>

							RFID Reports

                        </h1>

					</div>



				    <div class="row-fluid">

				   		 <div class="span12">

                         

							<div id="demo" style="background-color: #eff3f8;">

								

                                    

										<div class="widget-box">

											<div class="widget-header header-color-dark">

												<h4>Report Generator</h4>



												<span class="widget-toolbar">

													<a href="#" data-action="reload">

														<i class="icon-refresh"></i>

													</a>



													<a href="#" id="collapse_search" data-action="collapse">

														<i class="icon-chevron-up"></i>

													</a>



													<a href="#" data-action="close">

														<i class="icon-remove"></i>

													</a>

												</span>

											</div>



											<div class="widget-body">

												<div class="widget-main no-padding">

                                                

                                                <form id="v_d_d_r" method="post">

                                                <fieldset>

                                                <div class="row-fluid">

                                                <div class="span6">

													<div class="row-fluid">

														<label for="id-date-picker-1">From</label>

													</div>



													<div class="control-group">

														<div class="row-fluid input-append">

															<input class="span10 date-picker"  id="id-date-picker-1" type="text"  name="frmdate" data-date-format="dd-mm-yyyy" />

															<span class="add-on">

																<i class="icon-calendar"></i>

															</span>

														</div>

													</div>

                                                    </div>	<!--span6-->

                                                    
 												<div class="span6">

													<div class="row-fluid">

														<label for="id-date-picker-2">To</label>

													</div>



													<div class="control-group">

														<div class="row-fluid input-append">

															<input class="span10 date-picker" id="id-date-picker-2" type="text" name="todate" data-date-format="dd-mm-yyyy" />

															<span class="add-on">

																<i class="icon-calendar"></i>

															</span>

														</div>

													</div>

                                                    </div>	<!--span6-->
                                                  
										
													  
                                                    </div><!-----first row(frm)-->                                                   

                                                    

                                                    

                                                     

                                                    
													<input type="hidden" name="cid" value="<?php echo $id;?>"/>
													</fieldset>
                                                    
                                                    

													<div class="form-actions center">

														<button  class="btn btn-small btn-danger" onClick="v_d_d_r_submit();return false">

															Generate Report

															<i class="icon-arrow-right icon-on-right bigger-110"></i>

														</button> 

                                                        <i class="icon-spinner icon-spin orange bigger-125" id="load_spin" style="display:none;"></i>                                                       

													</div>

                                                    				

													</form>	



												</div>

											</div>

										</div>

								




								</div><!--/#demo-->







					</div><!--/.span12-->



					</div><!--/.row-fluid-->

                    

                    <div id="result" ></div>



					</div><!--/.page-content-->







			



			</div><!--/.main-content-->



		</div><!--/.main-container-->





	<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false">



</script>

	



	



		<!--basic scripts-->







		<!--[if !IE]>-->







		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>







		<!--<![endif]-->







		<!--[if IE]>



<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>



<![endif]-->







		<!--[if !IE]>-->







		<script type="text/javascript">



			window.jQuery || document.write("<script src='assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");



		</script>







		<!--<![endif]-->







		<!--[if IE]>



<script type="text/javascript">



 window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");



</script>



<![endif]-->







		<script type="text/javascript">



			if("ontouchend" in document) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");



		</script>



		<script src="assets/js/bootstrap.min.js"></script>







		<!--page specific plugin scripts-->







		<!--[if lte IE 8]>



		  <script src="assets/js/excanvas.min.js"></script>



		<![endif]-->







		<script src="assets/js/jquery-ui-1.10.3.custom.min.js"></script>











		<!--ace scripts-->







		<script src="assets/js/ace-elements.min.js"></script>



		<script src="assets/js/ace.min.js"></script>







		<!--inline scripts related to this page-->



		<link rel="stylesheet" href="assets/css/datepicker.css" />

		<link rel="stylesheet" href="assets/css/bootstrap-timepicker.css" />



		<script src="assets/js/jquery-ui-1.10.3.custom.min.js"></script>

		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="assets/js/chosen.jquery.min.js"></script>
		<script src="assets/js/jquery.gritter.min.js"></script>
        <script src="assets/js/jquery.hotkeys.min.js"></script>
        

		<script src="assets/js/bootbox.min.js"></script>

		<script src="assets/js/date-time/bootstrap-datepicker.min.js"></script>

		<script src="assets/js/date-time/bootstrap-timepicker.min.js"></script>

<script src="http://cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/js/jquery.dataTables.bootstrap.js"></script>

<script type="text/javascript" charset="utf-8" src="media/js/ZeroClipboard.js"></script>
<script src="media/js/TableTools.js"></script>


   

   <script type="text/javascript">



			function v_d_d_r_submit(){			
				
				var postData=$("#v_d_d_r").serializeArray();//alert(postData);
                var formURL = "ajax/report_rfid.php";
				$("#load_spin").show();
				$("#result").html("");
				$.ajax(
						{
							url : formURL,
							type: "POST",
							data : postData,
							success:function(response, textStatus, jqXHR) 
							{$("#load_spin").hide();
								//alert(response);
								//$('#collapse_search').click();
								//if(!($( "#sidebar" ).hasClass( "menu-min" ))){$(".sidebar-collapse").click();}
								$(".page-header").hide();
								//$("#breadcrumbs").hide();
								//$(".main-content").css("margin-left","30px");
								$("#result").html(response);
								var t = $('.sample-table-2').DataTable( {
								"sDom": 'T<"clear">lfrtip',
										"oTableTools": {
											"aButtons": [
												{
													"sExtends": "copy",
													"sButtonText": "Copy",
													"mColumns": [1,2,3,4,5,6]								
												},
												{
													"sExtends": "csv",
													"sButtonText": "CSV",
													"mColumns": [1,2,3,4,5,6],			
													"sFileName":"<?php echo 'RFIDReport'.date('d-m-Y'); ?>"+".csv",
												},
												{
													"sExtends": "xls",
													"sButtonText": "Excel",
													"mColumns": [1,2,3,4,5,6],	
													"sFileName":"<?php echo 'RFIDReport'.date('d-m-Y'); ?>"+".xls",
												},
												{
													"sExtends": "pdf",
													"sPdfOrientation": "landscape",
													"sPdfMessage": "RFIDReport.",
													"mColumns": [1,2,3,4,5,6],	
													"sFileName":"<?php echo 'RFIDReport'.date('d-m-Y'); ?>"+".pdf",
												},
												"print"
											]
										}
								} );
								t.on( 'order.dt search.dt', function () {
							        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
							            cell.innerHTML = i+1;
							        } );
							    } ).draw();
								
							},

							error: function(jqXHR, textStatus, errorThrown) 
							{

								$("#load_spin").hide();
								alert("Change a few things up and try submitting again.");
							}

						});

				

			}




	$(function(){

		$("#load_spin").hide();

		$('.date-picker').datepicker({
			startDate: '-2m',
			endDate: '+2d'
			}).next().on(ace.click_event, function(){

					$(this).prev().focus();

				}); 

				var d=new Date();

				var day=d.getDate();

				var month=d.getMonth() + 1;

				var yr=d.getFullYear();

				var cur=day+"-"+month+"-"+yr;

				

 				$("#id-date-picker-1").val(cur);

				$("#id-date-picker-2").val(cur);
				
				$(".chzn-select").chosen(); 
				
//	$('#demo').before( oTableTools.dom.container );



} );



</script

        






</body></html>