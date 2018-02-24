<?php
include 'config.php';
$s = $_GET['s'];
//echo $s;
if($s!='null'){
$s=explode(",",$s);
?>

<h4 class="header blue bolder smaller">Set Timings</h4>

<?php
//print_r($s);
foreach($s as $k=>$v){
$sn="SELECT
trip_name FROM
trip_routes
WHERE id=$v";
$rn=mysqli_query($con,$sn);
$route=mysqli_fetch_assoc($rn);

?>
<div class="well well-large">
<h4 class="blue"><?php echo $route['trip_name']; ?></h4>
<div class="control-group">
																	<label class="control-label" for="form-field-start">Start</label>
																	<div class="controls">
                                                                    	<div class="span4">
                                                                    	<div class="row-fluid input-prepend">
                                                                        	 <span class="add-on">
																				<i class="icon-calendar"></i>
																			 </span>
																			<input type="text" id="id-date-picker-1" class="date-picker" placeholder="Start Time" name="start<?php echo $v; ?>" data-date-format="dd-mm-yyyy">
                                                                       		 
                                                                         </div>
                                                                         </div>
                                                                         <div class="vspace"></div>
                                                                         
                                                                         <div class="span4">
                                                                         <div class="input-prepend bootstrap-timepicker">
                                                                         	<span class="add-on">
                                                                                <i class="icon-time"></i>
                                                                            </span>
                                                                            <input id="timepicker1" type="text" class="timepicker input-small"  name="stime<?php echo $v; ?>"/>
                                                                            
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
																			<input type="text" id="id-date-picker-2" class="date-picker" placeholder="End Time" name="end<?php echo $v; ?>" data-date-format="dd-mm-yyyy">
                                                                      		 
                                                                          </div>
                                                                          </div>
                                                                          
                                                                          <div class="vspace"></div>
                                                                         
                                                                         <div class="span4">
                                                                         <div class="input-prepend bootstrap-timepicker">
                                                                         	<span class="add-on">
                                                                                <i class="icon-time"></i>
                                                                            </span>
                                                                            <input id="timepicker2" type="text" class="timepicker input-small" name="etime<?php echo $v; ?>" />
                                                                            
                                                                        </div>
                                                                        </div>
																	</div>
																</div>
<?php $sq="SELECT
tag_name FROM
trip_route_tags
WHERE trip_id=$v and tag_status='Active'";
$rq=mysqli_query($con,$sq);
while($tags=mysqli_fetch_assoc($rq)){
?>
<div class="control-group">
																	<label class="control-label" for="form-field-start">Tag <?php echo $tags['tag_name']; ?> Time</label>
																	<div class="controls">
                                                                    	<div class="span4">
                                                                    	<div class="row-fluid input-prepend">
                                                                        	 <span class="add-on">
																				<i class="icon-calendar"></i>
																			 </span>
																			<input type="text" id="id-date-picker-1" class="date-picker" placeholder="Tag Time" name="tagd<?php echo $tags['id']; ?>" data-date-format="dd-mm-yyyy">
                                                                       		 
                                                                         </div>
                                                                         </div>
                                                                         <div class="vspace"></div>
                                                                         
                                                                         <div class="span4">
                                                                         <div class="input-prepend bootstrap-timepicker">
                                                                         	<span class="add-on">
                                                                                <i class="icon-time"></i>
                                                                            </span>
                                                                            <input id="timepicker1" type="text" class="timepicker input-small"  name="tagt<?php echo $tags['id']; ?>"/>
                                                                            
                                                                        </div>
                                                                        </div>
                                                                        
																	</div>
																</div>
                                                                
                                                                
<?php } ?>
                                                                
                                                                </div><!-------/well----->
                                                                
                                                                
                                                                
<?php }//foreach ?>
<script>
$(function(e){
	
				$('.date-picker').datepicker().next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
				
				$('.timepicker').timepicker({
					minuteStep: 1,
					showSeconds: true,
					showMeridian: false
				});
				/*var d=new Date();
				var day=d.getDate();
				var month=d.getMonth() + 1;
				var yr=d.getFullYear();
				var cur=day+"-"+month+"-"+yr;				

 				$("#id-date-picker-1").val(cur);
				$("#id-date-picker-2").val(cur);
				$("#id-date-picker-3").val(cur);*/
});
</script>                                                                

<?php }else {//if no routes?>
<div class="alert alert-error">
										<button type="button" class="close" data-dismiss="alert">
											<i class="icon-remove"></i>
										</button>

										<strong>
											<i class="icon-remove"></i>
											!
										</strong>

										Please choose routes to configure trip.
										<br>
									</div>
 <?php } ?>