<?php 
$cust=$_GET['id'];
if(isset($_POST['submit'])){
	$r=$_POST['route'];
	$s=$_POST['start'];
	$st=$_POST['startt'];
	$e=$_POST['end'];
	$et=$_POST['endt'];
	
	$vids=$_POST['vid'];
	foreach($vids as $key=>$vid){//each vehicle
	//

	}


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



						<li class="active">Trip Schedule</li>



					</ul><!--.breadcrumb-->







				</div>
                <div class="page-content">
                

				    <div class="row-fluid">



				    <div class="span12">

                    <div class="page-header position-relative">
						<h1>
							Trip Schedule						
						</h1>
					</div>
                    
<?php
/*if($_POST['submit'] && $_POST['submit']=='submit'){
	if($_POST['idn']!=''){
	
$sql="UPDATE installation SET device_name='".$_POST['devname']."', idle_limit='".$_POST['idle_limit']."',speed_limit='".$_POST['speed_limit']."' WHERE instatllation_id=".$_POST['idn'];
//echo $sql;
$rs=mysql_query($sql);
$ph=$_POST['mobile'];
$sq=mysql_query("update customers set customer_phone_no='$ph' where customer_id=$cust");

	if($rs!=FALSE){
?>
<div class="row-fluid">



				    <div class="span12">
<div class="alert alert-block alert-success">
								<button type="button" class="close" data-dismiss="alert">
									<i class="icon-remove"></i>
								</button>

								<i class="icon-ok green"></i>

								Alert Settings Updated Successfully
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
}else{
	?>
    <div class="row-fluid">



				    <div class="span12">
<div class="alert alert-block alert-error">
								<button type="button" class="close" data-dismiss="alert">
									<i class="icon-remove"></i>
								</button>

								<i class="icon-remove"></i>
									Please Select Device!!
							
							</div>
                            </div>
                            </div>

    <?php
}} 
*/?>                          


                    
                    
<!--<h4 class="header blue bolder smaller">Alert Settings</h4>
-->
<?php
$sn="SELECT
* FROM
trip_routes
WHERE customer_id=$cust and trip_status='Active'";
$rn=mysql_query($sn);

$sql="SELECT
installation.model_id,
installation.device_name,
installation.imie_no,
gps_model_details.imie_number
FROM
installation
INNER JOIN gps_model_details ON installation.model_id = gps_model_details.model_id
WHERE installation_status='completed' AND customer_id=$id";//echo $sql;
$rs=mysql_query($sql);
/*

$sqln="select customer_phone_no from customers where customer_id=$cust";
$rsn=mysql_query($sqln);
$ph=mysql_fetch_assoc($rsn);
*/

?>
<form action="track.php?page=b_trip&id=<?php echo $cust;?>" method="post" class="form-horizontal">
<div class="row-fluid">
															

															

															<div class="span12">
                                                           
                                                            <div class="control-group">
																	<label class="control-label" for="form-field-mobile">Vehicle</label>

																	<div class="controls">
																		<select id="route" name="route">
                                                             <option value="">Please Select Vehicle</option>
                                                            <?php
															while($dv=mysql_fetch_assoc($rs)){
															?>
                                                           <option value="<?php echo $dv['imie_no']; ?>"><?php echo $dv['device_name']; ?></option>
																	
																
                                                                <?php } ?>
                                                                </select>
																	</div>
																</div>
                                                                
                                                             <h4 class="header blue bolder smaller">Route</h4>
                                                             <div class="control-group">
                                                             <label class="control-label" for="form-field-idn">Select Routes</label>
                                                             <div class="controls">
                                                             <select multiple="" class="chzn-select" name="vid[]" id="vid" data-placeholder="Choose Routes...">					
                                                             <?php 
														
															while($dev=mysql_fetch_assoc($rn)){
															?>
                        <option value="<?php echo $dev['id']; ?>" /><?php echo $dev['trip_name']; ?></option>

                        <?php } ?>
															<?php //} ?>

														</select>
                                                                </div>
                                                                </div>
                                                                
                                                                <div id="t_f"></div>
																
                                                               <!-- <h4 class="header blue bolder smaller">Set Timings</h4>
                                                                <div class="control-group">
																	<label class="control-label" for="form-field-start">Start</label>
																	<div class="controls">
                                                                    	<div class="span4">
                                                                    	<div class="row-fluid input-prepend">
                                                                        	 <span class="add-on">
																				<i class="icon-calendar"></i>
																			 </span>
																			<input type="text" id="id-date-picker-1" class="date-picker" placeholder="Start Time" name="start" data-date-format="dd-mm-yyyy">
                                                                       		 
                                                                         </div>
                                                                         </div>
                                                                         <div class="vspace"></div>
                                                                         
                                                                         <div class="span4">
                                                                         <div class="input-prepend bootstrap-timepicker">
                                                                         	<span class="add-on">
                                                                                <i class="icon-time"></i>
                                                                            </span>
                                                                            <input id="timepicker1" type="text" class="timepicker input-small"  name="startt"/>
                                                                            
                                                                        </div>
                                                                        </div>
                                                                        
																	</div>
																</div>
                                                                
                                                                <div class="control-group">
																	<label class="control-label" for="form-field-end">End</label>

																	<div class="controls">
                                                                  	    <div class="span4">
                                                                    	<div class="row-fluid input-prepend">
                                                                        	<span class="add-on">
																				<i class="icon-calendar"></i>
																			 </span>
																			<input type="text" id="id-date-picker-2" class="date-picker" placeholder="End Time" name="end" data-date-format="dd-mm-yyyy">
                                                                      		 
                                                                          </div>
                                                                          </div>
                                                                          
                                                                          <div class="vspace"></div>
                                                                         
                                                                         <div class="span4">
                                                                         <div class="input-prepend bootstrap-timepicker">
                                                                         	<span class="add-on">
                                                                                <i class="icon-time"></i>
                                                                            </span>
                                                                            <input id="timepicker2" type="text" class="timepicker input-small" name="endt" />
                                                                            
                                                                        </div>
                                                                        </div>
																	</div>
																</div>-->

																
															</div>
														</div>
                                                        
                                           <div class="form-actions">
												<button class="btn btn-info" type="submit" name="submit" value="submit">
													<i class="icon-ok bigger-110"></i>
													Save
												</button>

												&nbsp; &nbsp; &nbsp; 
                                                <a href="track.php?page=dashboard&id=<?php echo $cust; ?>">
												<button class="btn" type="button">
                                               
													<i class="icon-arrow-left bigger-110"></i>
													Back
                                                   
												</button> </a>
											</div>
                                            
</form>

</div>



</div>



  </div><!--/.page-content-->







			



			</div><!--/.main-content-->



		</div><!--/.main-container-->








<?php include("include/footer.php"); ?>

<script>
$(function(){
	
	$(".chzn-select").chosen().change(function(event) {
		var selctd = $(this).val();
		console.log(selctd);
		$.ajax({

				   type: "GET",

				   url: "ajax/get_trip_fields.php?s="+selctd,

				   dataType: "html",				   		   

				   success:function(data) {
					 $("#t_f").html(data);
				   }

			});
	}); 
	
	

});
/*$("#idn").change(function(e) {
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
					   
					$("#form-field-devname").val(dn);
					$("#form-field-sl").val(sl);
					$("#form-field-il").val(il);
				   }

			});
});
*/</script>
</body></html>



