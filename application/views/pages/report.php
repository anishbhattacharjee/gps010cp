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

						<li class="active">Gps</li>



					</ul><!--.breadcrumb-->

                    



				</div>
                 <style>

		small img{

*width: 60%;

margin-top: -12px;

padding: 0px;

margin-bottom: -12px;

}

		</style>




<?php
if(isset($report[0]) && $report[0]){
	$report = $report['data'][0];
}

if(isset($cats[0]) && $cats[0]){
	$cats = $cats['data'][0];
}
?>



				<div class="page-content">



					<div class="page-header position-relative">

						<h1>
<?php if($id==59){ ?>
	<?php   echo $report['report_name_pet']; ?>  - <?php echo $cats['category_type']; ?>
<?php }else{ ?>	
	<?php   echo $report['report_name']; ?>  - <?php echo $cats['category_type']; ?>
<?php } ?>
						

                        </h1>

					</div>



				    <div class="row-fluid">

				   		 <div class="span12">

                         

							<div id="demo" style="background-color: #eff3f8;">

								

                                    

										<div class="widget-box">

											<div class="widget-header header-color-blue3">

												<h4>Report Generator</h4>



												<span class="widget-toolbar">

												

													<a href="#" data-action="reload">

														<i class="icon-refresh"></i>

													</a>



													<a href="#" id="collapse_search" data-action="collapse">

														<i class="icon-chevron-up"></i>

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

														<label for="timepicker1">Time</label>

													</div>



													<div class="control-group">

														<div class="input-append bootstrap-timepicker">

														<input id="timepicker1" type="text" name="frmtime" value="00:00:00"  class="input-small" />

															<span class="add-on">

																<i class="icon-time"></i>

															</span>

														</div>

													</div>

                                                    </div>

                                                    </div><!-----first row(frm)-->

                                                    

                                                    

                                                    <div class="row-fluid">

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

                                                    

                                                    <div class="span6">

                                                    <div class="row-fluid">

														<label for="timepicker2">Time </label>

													</div>



													<div class="control-group">

														<div class="input-append bootstrap-timepicker">

														<input id="timepicker2" type="text" name="totime" value="23:59:59" class="input-small" />

															<span class="add-on">

																<i class="icon-time"></i>

															</span>

														</div>

													</div>

                                                    </div>

                                                    

                                                    <hr/>

                                                    </div><!--row-fluid-->

                                                    <?php if($reportid != 15){ ?>

                                                    <div class="row-fluid">

                                                    <div class="span6">

													<div class="row-fluid">

														<label for="vid">Device</label>

													</div>



													<div class="controls">														

                                                            <select name="vid" id="vid" class="form-control chzn-select">

															
                                                             <?php if(isset($dev[0]) && $dev[0]){
																foreach($dev['data'] as $dev){ ?>

																<option value="<?php echo $dev['imie_no']; ?>"><?php echo $dev['device_name']; ?></option>

															<?php } }?>
 
															
														</select>														

													</div>

                                                    </div>	<!--span12-->

                                                    

                                                    </div><!--row-fluid-->
                                                    <?php } ?>
													<input type="hidden" name="cid" value="<?php echo $id;?>"/>
													</fieldset>
                                                    
                                                    <div class="row-fluid" id="og_alert" style="display:none;">
                                                    
                                                    <div class="alert alert-error">
                                                        <button type="button" class="close" data-dismiss="alert">
                                                            <i class="icon-remove"></i>
                                                        </button>
                
                                                        <strong>
                                                            <i class="icon-remove"></i>
                                                            Sorry!
                                                        </strong>
                
                                                       		<span id="disable_msg"></span>
                                                        <br>
                                                    </div>
                                                    
                                                    </div>

													<div class="form-actions center">

														<button  class="btn btn-small btn-primary" onClick="v_d_d_r_submit();return false">

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

	
		
		<script src="<?=base_url();?>dist/js/bootstrap-datepicker.min.js"></script>

		<script src="<?=base_url();?>dist/js/bootstrap-timepicker.min.js"></script>

       
		<script src="<?=base_url();?>assets/js/ace-elements.min.js"></script>



   <script type="text/javascript">



			function v_d_d_r_submit(){
				
				<?php if($reportid==6 || $reportid==4 || $reportid==9){ ?>
				//return false;
				var im=$("#vid").val();
				var rpt="<?php   echo $report['report_name']; ?>";
				
				$.ajax(
						{
							url : "ajax/report_chk_category.php?imei="+im,
							type: "GET",	
							async:false,						
							success:function(response, textStatus, jqXHR)
							{
								if(response!='error'){
									//$("#trip"+id).slideUp("slow");
									
									window.rp=response;	
									//console.log(window.rp+"dty");								
								}
							},
							error: function(jqXHR, textStatus, errorThrown) 
							{
								  alert("Something went wrong!!Please try later");

							}

						});
						//console.log(window.rp+"dty");	
						if(window.rp==10){
							$("#disable_msg").html(rpt+"  is not available for <strong>OGPT-001 </strong> devices");
							$("#og_alert").show();
							console.log("OGPT-001");								
							return false;
						}
						<?php if($reportid!=4){ ?>
						else if(window.rp==24){
						    $("#disable_msg").html(rpt+"  is not available for <strong>OGCT-006 </strong> devices");
							$("#og_alert").show();
							console.log("OGCT006");								
							return false;
						}
						<?php } ?>
						 else if(window.rp==14){
							$("#disable_msg").html(rpt+"  is not available for <strong>OGPT-005 </strong> devices");
							$("#og_alert").show();
							console.log("OGPT-005");	
							return false;
						}else{
							$("#og_alert").hide();
						}
				<?php }?>
				
				
				var postData=$("#v_d_d_r").serializeArray();//alert(postData);
				<?php if($id==295 && $reportid==1){ //esha driving
				?>
				var formURL = "<?=base_url();?>ajax/report_v_daily_driving_esha.php?id=<?=$id?>";	
				<?php }else{ ?>
				var formURL = "<?=base_url();?>ajax/<?php   echo $report['report_link']; ?>.php?id=<?=$id?>";	
				<?php } ?>
                

				$("#load_spin").show();

				$.ajax(

						{

							url : formURL,

							type: "POST",

							data : postData,						

							success:function(response, textStatus, jqXHR) 

							{$("#load_spin").hide();

								//alert(response);
								$('#collapse_search').click();
								//if(!($( "#sidebar" ).hasClass( "menu-min" ))){$(".sidebar-collapse").click();}
								$(".page-header").hide();
								$("#breadcrumbs").hide();
								//$(".main-content").css("margin-left","30px");
								$("#result").html(response);
								
								
								

							},

							error: function(jqXHR, textStatus, errorThrown) 

							{

								$("#load_spin").hide();

								   alert("Change a few things up and try submitting again.");

							}

						});

				

			}

		</script>

        

        		<script>



	$(function(){

		$("#load_spin").hide();

 <?php if($reportid!=15){ ?>
 
		<?php if($id==295 && $reportid==1){//esha gupta 
		?>
			$('.date-picker').datepicker({
			
			}).next().on(ace.click_event, function(){

					$(this).prev().focus();

				});
		<?php }else{ ?>
			$('.date-picker').datepicker({
			startDate: '-2m',
			endDate: '+2d'
			}).next().on(ace.click_event, function(){

					$(this).prev().focus();

				});
		<?php } ?>
		
<?php }else{ ?>

		$('.date-picker').datepicker({
			startDate: '-1d',
			endDate: '+0d'
			}).next().on(ace.click_event, function(){

					$(this).prev().focus();

				});
<?php } ?>				

				$('#timepicker1').timepicker({

					minuteStep: 1,

					showSeconds: true,

					showMeridian: false

				})

				$('#timepicker2').timepicker({

					minuteStep: 1,

					showSeconds: true,

					showMeridian: false

				})

				

						 

				var d=new Date();

				var day=d.getDate();

				var month=d.getMonth() + 1;

				var yr=d.getFullYear();

				var cur=day+"-"+month+"-"+yr;

				

 				$("#id-date-picker-1").val(cur);

				$("#id-date-picker-2").val(cur);

				<?php if($reportid==6){ ?>
				
				$("#vid").change(function(e) {
					var im=$(this).val();
                    //console.log("test"+im);
					
					$.ajax(
						{
							url : "ajax/report_chk_category.php?imei="+im,
							type: "GET",	
							async:false,						
							success:function(response, textStatus, jqXHR)
							{
								if(response=='OGCT006'){
									//$("#trip"+id).slideUp("slow");
									
									window.rp='OGCT006';	
									//console.log(window.rp+"dty");								
								}
							},
							error: function(jqXHR, textStatus, errorThrown) 
							{
								  alert("Something went wrong!!Please try later");

							}

						});
						//console.log(window.rp+"dty");	
						if(window.rp=='OGCT006'){
							$("#og_alert").show();
							console.log("OGCT006");	
							return false;
						}else{
							$("#og_alert").hide();
						}
                });
	

<?php } ?>

//	$('#demo').before( oTableTools.dom.container );



} );



</script>





</body></html>