<?php
/**
* 
* @var ************hcat
* 
*/
$hcat=array();
$done=array();
$hcat[]="all";
$sql_cats="SELECT distinct category FROM `orange_category`";
$rs_cats=mysql_query($sql_cats);
while($cats=mysql_fetch_array($rs_cats)){
$hcat[]=$cats['category']."_o";
	$sql_dev="SELECT
	DISTINCT
	installation.instatllation_id
	FROM
	installation
	join orange_category o on installation.imie_no=o.imei
	WHERE o.category='".$cats['category']."' and customer_id=$id AND installation_status='completed'  order by device_name";
	$rs_dev=mysql_query($sql_dev);
	while($rw_dev=mysql_fetch_assoc($rs_dev)){$serialno++;
		$done[]=$rw_dev['instatllation_id'];
	}
}
$sql_cats="SELECT
DISTINCT
installation.category_id,
gps_categories.category_type
FROM
installation
INNER JOIN gps_categories ON installation.category_id = gps_categories.category_id
WHERE customer_id=$id AND installation_status='completed' and type='main' and installation.category_id!=4 and  instatllation_id NOT IN ( '" . implode($done, "', '") . "' )";
$rs_cats=mysql_query($sql_cats);
while($cats=mysql_fetch_array($rs_cats)){
	$hcat[]=$cats['category_type'];
}
/**
* 
* @var *************hcat
* 
*/
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
.ddt>td {
    background-color: #D8DCDF !important;
}
		</style>
<?php
error_reporting(0);
$sql="select * from reports where report_id=".$_GET['report'];
$rs=mysql_query($sql);
$report=mysql_fetch_assoc($rs);
/*
$sqln="select * from gps_categories where category_id=$report_cat";
$rsn=mysql_query($sqln);
$cats=mysql_fetch_assoc($rsn);
*/
?>
				<div class="page-content">
 <link rel="stylesheet" type="text/css" href="assets/css/jquery.multiselect.css" />
 <link rel="stylesheet" type="text/css" href="assets/css/jquery-ui.css" /> 
 <style>
				 	input[type=checkbox], input[type=radio]{
						opacity: 1;
					}
h1 {
    padding: 0;
    margin: 0 8px;
    font-size: 24px;
    font-weight: lighter;
    color: #2679b5;
}
				 </style> 
					<div class="page-header position-relative">
						<h1>
	<?php   echo $report['report_name']; ?> <?php //echo $cats['category_type']; ?>
						
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
															<input class="span10 date-picker"  id="id-date-picker-1" type="text"  name="frmdate" data-date-format="dd-mm-yyyy" value="<?php echo date("d-m-Y",strtotime("-1 day")); ?>" />
															<span class="add-on">
																<i class="icon-calendar"></i>
															</span>
														</div>
													</div>
                                                    </div>	<!--span6-->
   <?php if(!($id==784 && isset($_GET['report']) && $_GET['report']==15)){ ?>                                                 
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
<?php } ?>
                                                    </div><!-----first row(frm)-->
                                                    
                                                    
                                                    <div class="row-fluid">
                                                    <div class="span6">
													<div class="row-fluid">
														<label for="id-date-picker-2">To</label>
													</div>
													<div class="control-group">
														<div class="row-fluid input-append">
															<input class="span10 date-picker" id="id-date-picker-2" type="text" name="todate" data-date-format="dd-mm-yyyy"  value="<?php echo date("d-m-Y",strtotime("-1 day")); ?>" />
															<span class="add-on">
																<i class="icon-calendar"></i>
															</span>
														</div>
													</div>
                                                    </div>	<!--span6-->
                                                    
<?php if(!($id==784 && isset($_GET['report']) && $_GET['report']==15)){ ?> 
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
<?php } ?>
                                                    </div><!--row-fluid-->
                                                    <?php //if($_GET['report']!=15){ ?>
                                                    <div class="row-fluid">
<?php if($id!=784){ ?>
	
<div class="span6"  id="khhiuhuih">
													<div class="row-fluid">
														<label for="cat">Category</label>
													</div>
													<div class="controls">														
                                                           <select id="cat" name="cat" class="chzn-select">
                                                            
                                                            <?php
															foreach($hcat as $k=>$cat){
																$cat_d=rtrim($cat,"_o");
																
																
															?>
                                                           <option value="<?php echo $cat; ?>" <?php echo $sel; ?>><?php echo ucfirst($cat_d); ?></option>
																	
																
                                                                <?php } ?>
                                                                </select>
																											
													</div>
                                                    </div>	<!--span12-->
<?php }//not cola ?>
                                                    <!----------------------------->
                                                    <div class="span6">
													<div class="row-fluid">
														<label for="vid">Device</label>
													</div>
													<div class="controls" id="catdev">														
 <?php if($_GET['report']!=15){ ?>
                                                            <select name="vid" id="vid" class="chzn-select" >
<?php }else{?>
	 <select name="vid[]" id="vid" multiple="multiple">
<?php } ?>
															
                                                             <?php 
														$sql="SELECT
installation.model_id,
installation.device_name,
installation.imie_no,
gps_model_details.imie_number
FROM
installation
INNER JOIN gps_model_details ON installation.model_id = gps_model_details.model_id
WHERE installation_status='completed' AND customer_id=$id";//" and category_id=$report_cat";
															$rs=mysql_query($sql);
															while($dev=mysql_fetch_assoc($rs)){
															
															?>
                        <option value="<?php echo $dev['imie_no']; ?>" /><?php echo $dev['device_name']; ?></option>
                        <?php } ?>
															<?php //} ?>
														</select>														
													</div>
                                                    </div>	<!--span12-->
                                                    
                                                    </div><!--row-fluid-->
                                                    <?php //////////}consolidated ?>
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
<script src="assets/js/chosen.jquery.min.js"></script>
   <script type="text/javascript" src="assets/js/jquery.multiselect.js"></script>
   <script type="text/javascript">
			function v_d_d_r_submit(){
				
				<?php if($_GET['report']==6 || $_GET['report']==4 || $_GET['report']==9){ ?>
				//return false;
				var im=$("#vid").val();
				var rpt="<?php   echo $report['report_name']; ?>";
				
				$.ajax(
						{
							url : "otravels_ajax/report_chk_category.php?imei="+im,
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
						<?php if($_GET['report']!=4){ ?>
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
<?php if($id==784 && $report['report_link']=="report_v_consolidated"){ ?>
 var formURL = "otravels_ajax/report_v_consolidated_cola.php";
<?php } else{ ?>
	 var formURL = "otravels_ajax/<?php   echo $report['report_link']; ?>.php"; 
<?php } ?>
              //  var formURL = "otravels_ajax/<?php   echo $report['report_link']; ?>.php";
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
 <?php if($_GET['report']!=15){ ?>
		$('.date-picker').datepicker({
			startDate: '-2m',
			endDate: '+2d'
			}).next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
				
				
$("#cat").change(function(){
	var cat = $(this).val();
	$.ajax({
			type: "GET",
			url: "otravels_ajax/get_cat_dev_report.php?cat="+cat+"&id=<?php echo $id; ?>&frm=report_all",
			dataType: 'html',
			success: function(data) {
				if(data!='ERR'){
					$("#catdev").html(data);
					$("#vid").chosen(); 
				}
			}
		});
	
});
<?php }else{ ?>
$("#vid").multiselect({selectedList: 1}); 
	 <?php if($id==784){ ?>
		$('.date-picker').datepicker({
			startDate: '-2m',
			endDate: '-1d'
			}).next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
	<?php }else{ ?>
		$('.date-picker').datepicker({
			startDate: '-1d',
			endDate: '+0d'
			}).next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
	<?php }			 ?>
$("#cat").change(function(){
	var cat = $(this).val();
	$.ajax({
			type: "GET",
			url: "otravels_ajax/get_cat_dev_report.php?cat="+cat+"&id=<?php echo $id; ?>&frm=report",
			dataType: 'html',
			success: function(data) {
				if(data!='ERR'){
					$("#catdev").html(data);
					$("#vid").multiselect({selectedList: 1}); 
				}
			}
		});
	
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
				
$(".chzn-select").chosen(); 
						 
				var d=new Date();
				var day=d.getDate();
				var month=d.getMonth() + 1;
				var yr=d.getFullYear();
				var cur=day+"-"+month+"-"+yr;
				 <?php if(!($id==784 && isset($_GET['report']) && $_GET['report']==15)){ ?>      
 				$("#id-date-picker-1").val(cur);
				$("#id-date-picker-2").val(cur);
				<?php } ?>
				<?php if($_GET['report']==6){ ?>
				
				$("#vid").change(function(e) {
					var im=$(this).val();
                    //console.log("test"+im);
					
					$.ajax(
						{
							url : "otravels_ajax/report_chk_category.php?imei="+im,
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