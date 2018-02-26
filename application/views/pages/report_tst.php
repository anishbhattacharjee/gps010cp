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
error_reporting(0);
$sql="select * from reports where report_id=".$_GET['report'];

$rs=mysql_query($sql);

$report=mysql_fetch_assoc($rs);

$sqln="select * from gps_categories where category_id=$report_cat";
$rsn=mysql_query($sqln);
$cats=mysql_fetch_assoc($rsn);

?>



				<div class="page-content">



					<div class="page-header position-relative">

						<h1>

							<?php   echo $report['report_name']; ?>  - <?php echo $cats['category_type']; ?>

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

                                                    <?php if($_GET['report']!=15){ ?>

                                                    <div class="row-fluid">

                                                    <div class="span6">

													<div class="row-fluid">

														<label for="vid">Device</label>

													</div>



													<div class="controls">														

                                                            <select name="vid" id="vid" >

															
                                                             <?php 

														$sql="SELECT

installation.model_id,

installation.device_name,
installation.imie_no,

gps_model_details.imie_number

FROM

installation

INNER JOIN gps_model_details ON installation.model_id = gps_model_details.model_id

WHERE installation_status='completed' AND customer_id=$id ";//and category_id=$report_cat";

															$rs=mysql_query($sql);

															while($dev=mysql_fetch_assoc($rs)){

															

															?>

                        <option value="<?php echo $dev['imie_no']; ?>" /><?php echo $dev['device_name']; ?></option>

                        <?php } ?>
<!--
															<option value="359710042138041" />359710042138041

                                                            <option value="359710042134396" />359710042134396
                                                            <option value=" 013227007909868" />013227007909868
--> 
															<?php //} ?>

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





	<script src="http://maps.googleapis.com/maps/api/js?key=	AIzaSyCNMfm4IoavTQbIjDH42fNQF31v4BkT8e0&sensor=false">



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

		<script src="assets/js/jquery.gritter.min.js"></script>
        <script src="assets/js/jquery.hotkeys.min.js"></script>
        

		<script src="assets/js/bootbox.min.js"></script>

		<script src="assets/js/date-time/bootstrap-datepicker.min.js"></script>

		<script src="assets/js/date-time/bootstrap-timepicker.min.js"></script>

        <script src="assets/js/jquery.dataTables.min.js"></script>

		<script src="assets/js/jquery.dataTables.bootstrap.js"></script>

        <script src="assets/js/jquery.dataTables.min.js"></script>




   

   <script type="text/javascript">



			function v_d_d_r_submit(){
				
				
				
				
				var postData=$("#v_d_d_r").serializeArray();//alert(postData);

                var formURL = "ajax/report_v_daily_driving_tst.php";

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



		$('.date-picker').datepicker({
			startDate: '-2m',
			endDate: '+2d'
			}).next().on(ace.click_event, function(){

					$(this).prev().focus();
});
				

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

				

//	$('#demo').before( oTableTools.dom.container );



} );



</script>





</body></html>