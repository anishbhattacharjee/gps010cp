<?php 


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
                
                
<?php
if($_POST['submit'] && $_POST['submit']=='submit'){
	
$sql="UPDATE installation SET device_name='".$_POST['devname']."', idle_limit='".$_POST['idle_limit']."',speed_limit='".$_POST['speed_limit']."' WHERE instatllation_id=".$_GET['idn'];
//echo $sql;
$rs=mysql_query($sql);

	if($rs!=FALSE){
?>
<div class="row-fluid">



				    <div class="span12">
<div class="alert alert-block alert-success">
								<button type="button" class="close" data-dismiss="alert">
									<i class="icon-remove"></i>
								</button>

								<i class="icon-ok green"></i>

								Device Details Updated Successfully
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
<?php } } 

/*$s="SELECT

installation.device_name,
installation.image,
installation.speed_limit,
installation.idle_limit
FROM

installation

WHERE instatllation_id=$idn";

$r=mysql_query($s);

$w=mysql_fetch_assoc($r);
*/
?>                          




				



				    <div class="row-fluid">



				    <div class="span12">



<h4 class="header blue bolder smaller">Schedule Your Trip</h4>
<form action="track.php?page=trip_add&id=<?php echo $id;?>" method="post" class="form-horizontal">
<div class="row-fluid">
															

															<div class="span12">
																<div class="control-group">
																	<label class="control-label" for="form-field-devname">Select Your Vehicle</label>

																	<div class="controls">
																		<select name="dev">
                                                                        
                        <?php 
														$sql="SELECT
installation.model_id,
installation.device_name
FROM
installation
WHERE installation_status='completed' AND customer_id=$id and category_id in (1,2)";
															$rs=mysql_query($sql);
															while($dev=mysql_fetch_assoc($rs)){														

															?>

                        <option value="<?php echo $dev['model_id']; ?>" /><?php echo $dev['device_name']; ?>	</option>

                        <?php } ?>		
                                                                        </select>
																	</div>
																</div>
                                                                <div class="control-group">
																	<label class="control-label" for="form-field-trip">Name Your Trip</label>

																	<div class="controls">
																		<input type="text" id="form-field-trip" placeholder="Trip Name" value="" name="trip">
                                                                      
																	</div>
																</div>
                                                                
                                                                 <div class="control-group">
																	<label class="control-label" for="form-field-start">Start Time</label>
																	<div class="controls">
                                                                    	<div class="span4">
                                                                    	<div class="row-fluid input-append">
																			<input type="text" id="id-date-picker-1" class="date-picker" placeholder="Start Time" value="" name="start" data-date-format="dd-mm-yyyy">
                                                                       		 <span class="add-on">
																				<i class="icon-calendar"></i>
																			 </span>
                                                                         </div>
                                                                         </div>
                                                                         <div class="vspace"></div>
                                                                         
                                                                         <div class="span4">
                                                                         <div class="input-append bootstrap-timepicker">
                                                                            <input id="timepicker1" type="text" class="timepicker input-small" />
                                                                            <span class="add-on">
                                                                                <i class="icon-time"></i>
                                                                            </span>
                                                                        </div>
                                                                        </div>
                                                                        
																	</div>
																</div>
                                                                
                                                                <div class="control-group">
																	<label class="control-label" for="form-field-end">End Time</label>

																	<div class="controls">
                                                                  	    <div class="span4">
                                                                    	<div class="row-fluid input-append">
																			<input type="text" id="id-date-picker-2" class="date-picker" placeholder="End Time" value="" name="end" data-date-format="dd-mm-yyyy">
                                                                      		 <span class="add-on">
																				<i class="icon-calendar"></i>
																			 </span>
                                                                          </div>
                                                                          </div>
                                                                          
                                                                          <div class="vspace"></div>
                                                                         
                                                                         <div class="span4">
                                                                         <div class="input-append bootstrap-timepicker">
                                                                            <input id="timepicker2" type="text" class="timepicker input-small" />
                                                                            <span class="add-on">
                                                                                <i class="icon-time"></i>
                                                                            </span>
                                                                        </div>
                                                                        </div>
																	</div>
																</div>
                                                                
                                                                <!-------------------->
                                                                <div class="control-group">
									<label class="control-label" for="form-field-2">Start Tag</label>

									<div class="controls">
										<input type="hidden" id="form-field-2" placeholder="GeoTag" name="loc"  value="<?php echo getsetting('geolocation',$id); ?>"/>
                                         	<div id="panel">

                                              <input id="address" type="textbox" value="<?php echo $customer_city; ?>, <?php echo $customer_state; ?>">
                                        
                                              <input type="button" value="Search" onclick="codeAddress(map,'')">
                                        
                                            </div>
                                       
                                        
                                        
                                              <div id="main-map" class="google-maps" style="width:100%;height:380px;"></div>
                                              <button class="btn btn-small btn-warning " id="reset"onclick="resetMap(creator,map,'')" type="reset">
                                                <i class="icon-undo bigger-110"></i>
                                                Reset
                                            </button>
                                  <div class="row-fluid">
                                
                                            <div id="device" class="alert alert-block " style="margin-top: 10px; display:none;">
                                            </div>
                                            <input type="hidden"  id="dataPanel" name="dp" />
										 
									</div>
								</div>
                                </div>
                                 <!-------------------->
                                   <!---------tag2----------->
                                                                <div class="control-group">
									<label class="control-label" for="form-field-2">End Tag</label>

									<div class="controls">
										<input type="hidden" id="form-field-2" placeholder="GeoTag" name="loc"  value="<?php echo getsetting('geolocation',$id); ?>"/>
                                         	<div id="panel">

                                              <input id="address2" type="textbox" value="<?php echo $customer_city; ?>, <?php echo $customer_state; ?>">
                                        
                                              <input type="button" value="Search" onclick="codeAddress(map2,2)">
                                        
                                            </div>
                                       
                                        
                                        
                                              <div id="main-map2" class="google-maps" style="width:100%;height:380px;"></div>
                                             <button class="btn btn-small btn-warning" id="reset2" onclick="resetMap2(creator2,map2,2)" type="reset">
                                                <i class="icon-undo bigger-110"></i>
                                                Reset
                                            </button>
                                  <div class="row-fluid">
                                
                                            <div id="device2" class="alert alert-block " style="margin-top: 10px; display:none;">
                                            </div>
                                            <input type="hidden" id="dataPanel2" name="dp2" />	
										 
									</div>
								</div>
                                </div>
                                 <!-------------------->
                                                                


																
															</div>
														</div>
                                                        
                                           <div class="form-actions">
												<button class="btn btn-info" type="submit" name="submit" value="submit">
													<i class="icon-ok bigger-110"></i>
													Save
												</button>

												&nbsp; &nbsp; &nbsp; 
                                                <a href="track.php?page=trip&id=<?php echo $id; ?>">
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


<script src="http://maps.googleapis.com/maps/api/js?key=	AIzaSyCNMfm4IoavTQbIjDH42fNQF31v4BkT8e0&sensor=false"></script>
<script type="text/javascript" src="geofence/polygon.min.js"></script>
<script type="text/javascript" src="geofence/v3_epoly.js"></script>


<script>

$(function(){


				$('.date-picker').datepicker().next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
				
				$('.timepicker').timepicker({
					minuteStep: 1,
					showSeconds: true,
					showMeridian: false
				});
				
						
				 var mapCenter=new google.maps.LatLng(<?php echo $customer_latlng; ?>);		
				 var myOptions = {
					zoom: 7,		
					center: mapCenter,
					mapTypeId: google.maps.MapTypeId.ROADMAP,		
					mapTypeControl: true,		
					mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},		
					navigationControl: true,		
				  }
		
		
		
				 map = new google.maps.Map(document.getElementById('main-map'), myOptions);		
				 map2 = new google.maps.Map(document.getElementById('main-map2'), myOptions);		
				 creator = new PolygonCreator(map);
				 creator2 = new PolygonCreator(map2);
				 
								
				 
				 
				 
				 
				 
});
function resetMap(creator,map,id) {
					//creator=creator+''+id;
					$('#dataPanel').append(creator.showData());
					$('#device'+id).hide();
					creator.destroy();
					creator=null;
					creator=new PolygonCreator(map);
} 
function resetMap2(creator2,map2,id) {
	$('#dataPanel2').append(creator2.showData());
					//creator=creator+''+id;
					$('#device'+id).hide();
					creator2.destroy();
					creator2=null;
					creator2=new PolygonCreator(map2);
} 

function codeAddress(map,c) {

  var geocoder = new google.maps.Geocoder();
  var address = document.getElementById('address'+c).value;//alert(address);
  geocoder.geocode( { 'address': address}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
      map.setCenter(results[0].geometry.location);
      var marker = new google.maps.Marker({
          map: map,
          position: results[0].geometry.location
      });
    } else {
      //alert('Geocode was not successful for the following reason: ' + status);
    }

  });
}

</script>















</body></html>



