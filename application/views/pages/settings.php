<?php 
if(isset($rw[0]) && $rw[0]){
	$rw=$rw['data'][0];
}else{
	$rw='';
}

?>


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
                <div class="page-content">
                

				    <div class="row-fluid">



				    <div class="span12">

                    <div class="page-header position-relative">
						<h1>
							Settings					
						</h1>
					</div>
                    
<?php
if(isset($_POST['submit']) && $_POST['submit']=='submit'){
	
	
$is_sublogin=$_POST['is_sublogin'];
if($is_sublogin==1){
	$sublogin_id=$_POST['sublogin_id'];
	$sublogin_pw=$_POST['sublogin_pw'];
	
	$query_part=",sublogin_id='".$sublogin_id."' ";
	$queryone_part=",device_password='".$sublogin_pw."' ";
}else{
	$query_part="";
	$queryone_part="";
}	
	
if($_POST['idn']!=''){	
$sql="UPDATE installation SET device_name='".$_POST['devname']."', idle_limit='".$_POST['idle_limit']."',speed_limit='".$_POST['speed_limit']."',tank_capacity='".$_POST['tank_capacity']."',formula='".$_POST['formula']."' $queryone_part WHERE instatllation_id=".$_POST['idn'];
//echo $sql;
$rs=mysql_query($sql);
}
$ph=$_POST['mobile'];
$sq=mysql_query("update customers set customer_phone_no='$ph' $query_part where customer_id=$id");

	if($rs!=FALSE){
?>
<div class="row-fluid">



				    <div class="span12">
<div class="alert alert-block alert-success">
								<button type="button" class="close" data-dismiss="alert">
									<i class="icon-remove"></i>
								</button>

								<i class="icon-ok green"></i>

								Settings Updated Successfully
							</div>
                            </div>
                            </div>
<?php }else{ 
?> 
<div class="row-fluid">



				    <div class="span12">
<div class="alert alert-block alert-error">
								<button type="button" class="close" data-dismiss="alert">
									<i class="icon-remove"></i>
								</button>

								<i class="icon-remove"></i>
									Something went wrong!!!Please try later.
							
							</div>
                            </div>
                            </div>
<?php } 
} //form submit
?>  
<div class="row-fluid" id="ctrl_result" style="display:none">



				    <div class="span12">
<div class="alert alert-block alert-success">
								<button type="button" class="close" data-dismiss="alert">
									<i class="icon-remove"></i>
								</button>

								<i class="icon-ok green"></i>

								Alert Control Updated Successfully
							</div>
                            </div>
                            </div>


<div class="row-fluid">                        

                    <div class="span12">
<!--<h4 class="header blue bolder smaller">Alert Settings</h4>
-->
<?php
if(isset($rn[0]) && $rn[0]){
	$rn=$rn['data'][0];
}else{
	$rn='';
}

if(isset($ph[0]) && $ph[0]){
	$ph=$ph['data'][0];
}else{
	$ph='';
}

?>
<?php if($id==579){?>	

<form action="orange_admin.php?page=settings&id=<?php echo $id;?>" method="post" class="form-horizontal" onsubmit="return check_warnings()">
<?php }else{ ?>
<form action="track.php?page=settings&id=<?php echo $id;?>" method="post" class="form-horizontal" onsubmit="return check_warnings()">
<?php } ?>
<div class="row-fluid">
															

															

															<div class="span6">
                                                           
                                                            <div class="control-group">
																	<label class="control-label" for="form-field-mobile">Mobile Number</label>

																	<div class="controls">
																		<input type="text" id="form-field-mobile" placeholder="Mobile Number" value="<?php echo $ph['customer_phone_no']; ?>" name="mobile">
																	</div>
																</div>
																<input type="hidden" name="is_sublogin" value="<?php echo $ph['is_sublogin']; ?>"/>
                                                                <?php if($ph['is_sublogin'] == 1){ ?>
																<div class="control-group">
																	<label class="control-label" for="form-field-mobile">Parent Login - User Name</label>

																	<div class="controls">
																		<input type="text" id="form-field-mobile" placeholder="User Name" value="<?php echo $ph['sublogin_id']; ?>" name="sublogin_id">
																	</div>
																</div>
                                                             <?php } ?>   
                                                             <h4 class="header blue bolder smaller">Device</h4>
                                                             <div class="control-group">
                                                             <label class="control-label" for="form-field-idn">Select Device</label>
                                                             <div class="controls">
                                                             <select id="idn" name="idn" class="chzn-select">
                                                             <option value="">Please Select Device</option>
                                                            <?php
															while($dv=mysql_fetch_assoc($rn)){
															?>
                                                           <option value="<?php echo $dv['instatllation_id']; ?>"><?php echo $dv['device_name']; ?></option>
																	
																
                                                                <?php } ?>
                                                                </select>
                                                                </div>
                                                                </div>
																<div class="control-group">
																	<label class="control-label" for="form-field-devname">Device Name</label>

																	<div class="controls">
																		<input type="text" id="form-field-devname" placeholder="Device Name" value="" name="devname">
																	</div>
																</div>
																</div>
																<div class="span6" >

   <div class="row-fluid">
						<div class="span12">
							<!--PAGE CONTENT BEGINS-->
                            
                            	<div class="control-group">
									<label class="control-label"></label>

									<div class="controls" style="background: #F5F5F5;padding: 20px;">                                   
										<div class="row-fluid">
											<div class="span12">
												<label>
                                                	
													<input id="alert1" data-dest="fence" class="ace-switch ace-switch-4" type="checkbox" <?php if($rw['fence']==1){ ?>checked="checked" <?php } ?> >												
                                                    <span class="lbl">Geofence Alerts</span>
												</label>
											</div>
                                         </div>
                                        <hr/>
                                         <div class="row-fluid">
											<div class="span12">
												<label>
                                                	
													<input id="alert2" data-dest="idle" class="ace-switch ace-switch-4" type="checkbox" <?php if($rw['idle']==1){ ?>checked="checked" <?php } ?> >												
                                                    <span class="lbl">Idle Alerts</span>
												</label>
											</div>
											
										</div>                                        
                                        <hr/>
                                        <div class="row-fluid">
											<div class="span12">
												<label>
                                                	
													<input id="alert3" data-dest="speed" class="ace-switch ace-switch-4" type="checkbox" <?php if($rw['speed']==1){ ?>checked="checked" <?php } ?> >												
                                                    <span class="lbl">Speed Alerts</span>
												</label>
											</div>
											
										</div>
									<?php if($id!=583){ ?>	
                                       <hr/>
                                        <div class="row-fluid">
											<div class="span12">
												<label>
                                                	
													<input id="alert4" data-dest="trip" class="ace-switch ace-switch-4" type="checkbox" <?php if($rw['trip']==1){ ?>checked="checked" <?php } ?> >												
                                                    <span class="lbl">Trip Alerts</span>
												</label>
											</div>
											
										</div>
									<?php } ?>   	
									<?php if($ph['is_school']==1)	{ ?>
										
									
                                       <hr/>
                                        <div class="row-fluid">
											<div class="span12">
												<label>
                                                	
													<input id="alert5" data-dest="eta" class="ace-switch ace-switch-5" type="checkbox" <?php if($rw['eta']==1){ ?>checked="checked" <?php } ?> >												
                                                    <span class="lbl">ETA Alerts</span>
												</label>
											</div>
											
										</div>
                                    <?php } ?>   
                                      
										
									</div>
								</div>
                            
                           
                    
							
							<!--PAGE CONTENT ENDS-->
						</div><!--/.span-->
					</div><!--/.row-fluid-->                 
                    </div>
					
					
													  <div class="span12" style="margin-left:0px;">
                                                                <h4 class="header blue bolder smaller">Set Limits</h4>
                                                                <div class="control-group">
																	<label class="control-label" for="form-field-devname">Speed Limit</label>

																	<div class="controls">
																		<input type="text" id="form-field-sl" placeholder="Speed Limit" value="" name="speed_limit">
                                                                        <span class="help-inline">km/hr</span>
																	</div>
																</div>
                                                                 <div class="control-group">
																	<label class="control-label" for="form-field-devname">Idle Limit</label>

																	<div class="controls">
																		<input type="text" id="form-field-il" placeholder="Idle Limit" value="" name="idle_limit">
                                                                        <span class="help-inline">minutes</span>
																	</div>
																</div>
																
																<div class="control-group">
																	<label class="control-label" for="form-field-tc">Fuel Tank Capacity</label>

																	<div class="controls">
																		<input type="text" id="form-field-tc" placeholder="Fuel Tank Capacity"  name="tank_capacity">
                                                                        <span class="help-inline">Litres</span>
																	</div>
																</div>
																<div class="control-group" style="display: none">
																	<label class="control-label" for="form-field-fm">Formula</label>

																	<div class="controls">
																		<!--<input type="text" id="form-field-fm" placeholder="Formula"  name="formula">-->
																		<textarea id="form-field-fm" name="formula"></textarea>
                                                                        <span class="help-inline"></span>
																	</div>
																</div>
																
																
																<?php if($ph['is_sublogin'] == 1){ ?>
																<div class="control-group">
																	<label class="control-label" for="form-field-pw">Parent Login - Device Password</label>

																	<div class="controls">
																		<input type="text" id="form-field-pw" placeholder="Password" name="sublogin_pw">
																	</div>
																</div>
                                                             <?php } ?>  



																
															</div>
														</div>
                                                        
                                           <div class="form-actions" style="margin-right: -572px;">
												<button class="btn btn-info" type="submit" name="submit" value="submit" >
													<i class="icon-ok bigger-110"></i>
													Save
												</button>

												&nbsp; &nbsp; &nbsp; 
                                                <a href="track.php?page=dashboard&id=<?php echo $id; ?>">
												<button class="btn" type="button">
                                               
													<i class="icon-arrow-left bigger-110"></i>
													Back
                                                   
												</button> </a>
											</div>
                                            
</form>
</div><!----span6--->



</div><!----row fluid--->
</div>



</div>



  </div><!--/.page-content-->







			



			</div><!--/.main-content-->



		</div><!--/.main-container-->


<script src="assets/js/chosen.jquery.min.js"></script>
<script>
$(function(){
	 $(".chzn-select").chosen();
});
$("#idn").change(function(e) {
	var id=$(this).val();
   $.ajax({

				   type: "GET",

				   url: "ajax/get_alert_settngs.php?inst="+id,

				   dataType: "html",				   		   

				   success:function(data) {
					   var ret=data.split(",");
					   var dn=ret[0];
					   var sl=ret[1];
					   var il=ret[2];
					   var tc=ret[3];
					   var pw=ret[4];
					   var fm=ret[5];
					   
					$("#form-field-devname").val(dn);
					$("#form-field-sl").val(sl);
					$("#form-field-il").val(il);
					$("#form-field-tc").val(tc);
					$("#form-field-fm").html(fm);
					if(document.getElementById("form-field-pw")){
						$("#form-field-pw").val(pw);
					}
				   }

			});
});
$("[id^='alert']").change(function(e) {console.log("click");
	var field=$(this).data("dest");
	//console.log(field);
    if(this.checked){
		//alert("on");
		$.ajax({
			type: "GET",
			url: "ajax/alert_control.php?field="+field+"&val=1&id=<?php echo $id; ?>",
			dataType: 'html',
			success: function(data) {
				if(data=='error'){
					alert("Something went wrong!! please try again.");	
				}else{
					$("#ctrl_result").show();
				}
			}
		});
	}else{
		//alert("off");
		$.ajax({
			type: "GET",
			url: "ajax/alert_control.php?field="+field+"&val=0&id=<?php echo $id; ?>",
			dataType: 'html',
			success: function(data) {
				if(data=='error'){
					alert("Something went wrong!! please try again.");	
				}else{
					$("#ctrl_result").show();
				}
			}
		});
	}
	
});
$("[name='speed_limit']").blur(function(e){
	if(parseInt($(this).val()) < 60){//console.log("test");
		$(this).val("");
		if(!(document.getElementById("speed_warning"))){	
		
		 $(this).parent().append("<span id='speed_warning' style='color: red;vertical-align: middle;'>Please add speed limit greater than 60. </span>");
		 }
	}else{
		$("#speed_warning").remove();
	}

});
$("[name='idle_limit']").blur(function(e){
	if(parseInt($(this).val()) < 5){//console.log("test");
		$(this).val("");
		if(!(document.getElementById("idle_warning"))){	
		 $(this).parent().append("<span id='idle_warning' style='color: red;vertical-align: middle;'>Please add idle limit greater than 5. </span>");
		 }
	}else{
		$("#idle_warning").remove();
	}

});
function check_warnings(){console.log("test");
	if($("#idn").val() > 0){
	
		if($("[name='idle_limit']").val()<5){
			$("[name='idle_limit']").parent().append("<span id='idle_warning' style='color: red;vertical-align: middle;'>Please add idle limit greater than 5. </span>");
			return false;
		}
	}/**/
}
</script>
</body></html>



