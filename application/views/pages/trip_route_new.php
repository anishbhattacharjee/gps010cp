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

						<li>
							<a href="track.php?page=trip_routes&id=<?php echo $id; ?>">Trip Routes</a>

							<span class="divider">
								<i class="icon-angle-right arrow-icon"></i>
							</span>
						</li>
						<li class="active">Configure Routes</li>
					</ul><!--.breadcrumb-->

					
				</div>
                <style>
				.widget-body .alert:last-child{
					margin-bottom:20px;
				}
				</style>

				<div class="page-content">
					<div class="page-header position-relative">
						<h1>
							Configure Trip Routes
							<small>
								<i class="icon-double-angle-right"></i>
								and Schedule Trips
							</small>
						</h1>
					</div><!--/.page-header-->

					<div class="row-fluid">
						<div class="span12">
							<!--PAGE CONTENT BEGINS-->

						

							<div class="row-fluid">
								<div class="span12">
									<div class="widget-box">
										<div class="widget-header widget-header-blue widget-header-flat">
											<h4 class="lighter">New Trip Route Details</h4>

											
										</div>

										<div class="widget-body">
                                        <form class="form-horizontal" id="validation-form" method="post" />
											<div class="widget-main">
												<div class="row-fluid">
													<div id="fuelux-wizard" class="row-fluid hide" data-target="#step-container">
														<ul class="wizard-steps">
															<li data-target="#step1" class="active">
																<span class="step">1</span>
																<span class="title">Configuration</span>
															</li>
															<li data-target="#step2">
																<span class="step">2</span>
																<span class="title">Tags</span>
															</li>
															<li data-target="#step3">
																<span class="step">3</span>
																<span class="title">Timing</span>
															</li>
															<li data-target="#step4">
																<span class="step">4</span>
																<span class="title">Activation</span>
															</li>
														</ul>
													</div>

													<hr />
													<div class="step-content row-fluid position-relative" id="step-container">
														<div class="step-pane active" id="step1">
															<h3 class="lighter block green">
																Enter the following information
																<small style="color: #5293C4;">
																	&nbsp;&nbsp;<i class="icon-double-angle-right"></i>
																	Click on the map to mark the area. Use Reset button to clear the tag
																</small>
															</h3>

															
															<input type="hidden" name="cid" value="<?php echo $id; ?>"/>
																

																 <div class="control-group">
																	<label class="control-label" for="form-field-trip">Name Your Route</label>

																	<div class="controls">
																		<input type="text" id="form-field-trip" placeholder="Route Name" value="" name="trip">
                                                                      
																	</div>
																</div>
                                                                

												

																
                                                                
                                                                <div class="hr hr-dotted"></div>
																 <!---------tag1----------->
                                                                
                                                                <div class="control-group">
									<label class="control-label" for="form-field-2">Start Tag</label>

									<div class="controls">
										<input type="hidden" id="form-field-2" placeholder="GeoTag" />
                                         	<div id="panel">

                                              <input id="address" type="textbox" name="add1" value="<?php echo $customer_city; ?>, <?php echo $customer_state; ?>">
                                        
                                             
                                              <input type="button" class="btn btn-small" value="Search" onclick="codeAddress(map,'')">
                                             
                                        
                                            </div>
                                       
                                        
                                        
                                              <div id="main-map" class="google-maps" style="width:100%;height:380px;"></div>
                                              <button class="btn btn-small btn-warning " id="reset" onclick="resetMap()">
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
                                 <div class="hr hr-dotted"></div>
                                <!-- <button class="btn btn-primary btn-block">Add Tags</button>
                                 
                                 <div class="hr hr-dotted"></div>
                                   -------tag2----------->
                                                                <div class="control-group">
									<label class="control-label" for="form-field-2">End Tag</label>

									<div class="controls">
										<input type="hidden" id="form-field-2" placeholder="GeoTag"/>
                                         	<div id="panel">

                                              <input id="address2" type="textbox" name="add2" value="<?php echo $customer_city; ?>, <?php echo $customer_state; ?>">
                                        
                                             <input type="button" class="btn btn-small" value="Search" onclick="codeAddress(map2,2)">
                                        
                                            </div>
                                       
                                        
                                        
                                              <div id="main-map2" class="google-maps" style="width:100%;height:380px;"></div>
                                             <button class="btn btn-small btn-warning" id="reset2" onclick="resetMap2()">
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
                                                                
															
														</div> <!---------/step1----------->
                                                        <div class="step-pane" id="step2">
                                                        	<div class="center">
																<h3 class="blue lighter">Configure Tags</h3>
															</div>
                                                            
                                                            <div id="results"></div>
                                                            
                                                            <div class="control-group">
																<label class="control-label" for="form-field-tag">Name Your Tag</label>
																	<div class="controls">
																		<input type="text" placeholder="Tag Name" value="" name="tag" id="tag_name">                                   
																	</div>
																</div>
                                                                
                                                                
                                                            
                                                             <div class="control-group">
									<label class="control-label" for="form-field-2">Tag</label>
									<div class="controls">										
                                         	<div id="panel">
                                              <input id="address_m" type="textbox" name="add_m" value="<?php echo $customer_city; ?>, <?php echo $customer_state; ?>">           
                                              <input type="button" class="btn btn-small" value="Search" onclick="codeAddress(map3,'_m')">
                                        
                                            </div>
                                        
                                              <div id="main-map-m" class="google-maps" style="width:100%;height:380px;"></div>
                                              <button class="btn btn-small btn-warning " id="reset_m" onclick="resetMap3()">
                                                <i class="icon-undo bigger-110"></i>
                                                Reset
                                            </button>
                                            <button class="btn btn-small btn-primary " id="save_tag">
                                                <i class="icon-save bigger-110"></i>
                                                Save Tag
                                            </button>
                                            <button class="btn btn-small btn-primary " id="create_tag">
                                                <i class="icon-tag bigger-110"></i>
                                                Create New Tag
                                            </button>
                                  <div class="row-fluid">
                                
                                            <div id="device_m" class="alert alert-block " style="margin-top: 10px; display:none;">
                                            </div>
                                            <input type="hidden"  id="dataPanel" name="dp_m" />
                                            <input type="hidden" name="trip_tags" id="trip_tags" />
											<input type="hidden" name="last_trip_tag" id="last_trip_tag" value="0" />
										 	<input type="hidden" name="start_t" id="start_t" value="0" />
										 	<input type="hidden" name="end_t" id="end_t" value="0" />
																						
									</div>
								</div>
                                </div>
                                                            
                                                        </div>
                                                    <!-----/step 2--->
													<div class="step-pane" id="step3">
                                                        	<div class="center">
																<h3 class="blue lighter">Timing</h3>
															</div>
                                                            
                                                            <div id="timing"></div>
                                                            
                                                            
                                                            
                                                        </div>
                                                    <!-----/step 3--->

														<div class="step-pane" id="step4">
															<div class="center">
																<h3 class="green">Activation</h3>
																Your Route is configured! 
                                                                <div class="control-group">
																	
																	 <div class="controls">
																		<span class="span4 offset4" style="text-align: left;
margin-top: 20px;">
																			<label class="blue">
																				<input name="stat" value="Active" type="radio" checked="checked" />
																				<span class="lbl"> Activate Route Now</span>
																			</label>

																			<label class="blue">
																				<input name="stat" value="Inactive" type="radio" />
																				<span class="lbl"> Activate Later</span>
																			</label>
																		</span>
																	</div>
																</div>
                                                                
                                                                Click finish to continue!
															</div>
														</div>
													</div>

													<hr />
													<div class="row-fluid wizard-actions">
														<button class="btn btn-prev">
															<i class="icon-arrow-left"></i>
															Prev
														</button>

														<button class="btn btn-success btn-next" data-last="Finish" id="fm_btn">
															Next
															<i class="icon-arrow-right icon-on-right"></i>
														</button>
													</div>
												</div>
											</div><!--/widget-main-->
                                           </form>
										</div><!--/widget-body-->
									</div>
								</div>
							</div>

							<!--PAGE CONTENT ENDS-->
						</div><!--/.span-->
					</div><!--/.row-fluid-->
				</div><!--/.page-content-->

				
			</div><!--/.main-content-->
		</div><!--/.main-container-->

		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">
			<i class="icon-double-angle-up icon-only bigger-110"></i>
		</a>

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

		<script src="assets/js/fuelux/fuelux.wizard.min.js"></script>
		<script src="assets/js/jquery.validate.min.js"></script>
		<script src="assets/js/additional-methods.min.js"></script>
		<script src="assets/js/bootbox.min.js"></script>
		<script src="assets/js/jquery.maskedinput.min.js"></script>
		<script src="assets/js/select2.min.js"></script>
        
        <script src="assets/js/date-time/bootstrap-datepicker.min.js"></script>
        <script src="assets/js/date-time/bootstrap-timepicker.min.js"></script>

		<!--ace scripts-->

		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!--inline scripts related to this page-->
        
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?libraries=places"></script>
		<script type="text/javascript" src="geofence/polygon.min.js"></script>
        <script type="text/javascript" src="geofence/v3_epoly.js"></script>


		<script type="text/javascript">
			var autocomplete ;var autocomplete2 ;var geocoder;
			function initialize() {
				var input = document.getElementById('address');
				autocomplete = new google.maps.places.Autocomplete(input);
				geocoder = new google.maps.Geocoder();
				google.maps.event.addListener(autocomplete, 'place_changed', function () {
					codeAddress(map,'');
				})
				
				var input2 = document.getElementById('address2');
				autocomplete2 = new google.maps.places.Autocomplete(input2);				
				google.maps.event.addListener(autocomplete2, 'place_changed', function () {
					codeAddress(map2,2);
				})
				
				var input3 = document.getElementById('address_m');
				autocomplete3 = new google.maps.places.Autocomplete(input3);				
				google.maps.event.addListener(autocomplete3, 'place_changed', function () {
					codeAddress(map3,'_m');
				})
				
			}
			google.maps.event.addDomListener(window, 'load', initialize);
			$(function() {
				
				 var mapCenter=new google.maps.LatLng(<?php echo $customer_latlng; ?>);		
				 var myOptions = {
					zoom: 15,		
					center: mapCenter,
					mapTypeId: google.maps.MapTypeId.ROADMAP,		
					mapTypeControl: true,		
					mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},		
					navigationControl: true,		
				  }
				   map = new google.maps.Map(document.getElementById('main-map'), myOptions);	
				   creator = new PolygonCreator(map);
				   map2 = new google.maps.Map(document.getElementById('main-map2'), myOptions);				 
				   creator2 = new PolygonCreator(map2);
				   map3 = new google.maps.Map(document.getElementById('main-map-m'), myOptions);
				   creator3 = new PolygonCreator(map3);	
				 
			
				$('[data-rel=tooltip]').tooltip();
		
				$(".select2").css('width','150px').select2({allowClear:true})
				.on('change', function(){
					$(this).closest('form').validate().element($(this));
				}); 
			
			
				var $validation = true;
				$('#fuelux-wizard').ace_wizard().on('change' , function(e, info){
					//alert(info.step);
					if(info.step == 1 && $validation) {
						if(!$('#validation-form').valid()) return false;
						
							
								
								 $("#dataPanel").val(creator.showData());
							 	 $("#dataPanel2").val(creator2.showData());
								 if( creator.showData()=='Please first create a polygon' || creator.showData()==null){
									$("#device").html('Please create start tag');
									$("#device").addClass(' alert-error');					
									$("#device").show();
									return false;
								}else{
									$("#device").hide();
								}
								if( creator2.showData()=='Please first create a polygon' || creator2.showData()==null){
									$("#device2").html('Please create end tag');
									$("#device2").addClass(' alert-error');					
									$("#device2").show();
									return false;
								}else{
									$("#device2").hide();
									var sttrt="";var eend="";
									if($("#start_t").val()==0){	
										var action="insert";
																
									}else{
										var action="update";
										var sttrt=$("#start_t").val();
										var eend=$("#end_t").val();
											
									}
										$.ajax({
											type: "GET",
											url: "ajax/save_route_start.php?start="+creator.showData()+"&end="+creator2.showData()+"&action="+action+"&startid="+sttrt+"&endid="+eend,
											dataType: "json",
											success: function(data) {
												if(data=='error'){			
													alert("Something went wrong !!! Please try again.");			
												}else if(data=='updated'){			
																
												}
												else{
													
													var tags_added=$("#trip_tags").val();
													tags_added=tags_added+","+data[0]+","+data[1];
													$("#trip_tags").val(tags_added);
													$("#last_trip_tag").val(data[0]);	
													$("#start_t").val(data[0]);
													$("#end_t").val(data[1]);
												}
											}
										});
									
								}
								
								
						
					}else if(info.step == 2){
						tags_addd=$("#trip_tags").val();
						if(tags_addd==''){
						
							var r = confirm("You have not created any route tags!! Press 'OK' to continue without tags or 'Cansel' to stay back.");
							if (r == true) {
								
							} else {
								return false;
							}
						}
						
						var ttags=$("#trip_tags").val();
						var stttag=$("#dataPanel").val();
						var ettag=$("#dataPanel2").val();
						$.ajax({
						type: "GET",
						url: "ajax/gettiming.php?tags="+ttags+"&id=<?php echo $id; ?>",
						dataType: 'html',
						success: function(data) {
							$("#timing").html(data);
						}
						});
						
						
					}else if(info.step == 3){
						
					}
					
					
				}).on('changed' , function(e, info){
					var item = $('#fuelux-wizard').wizard('selectedItem');
					//alert(item.step);
					if(item.step == 2){//alert("test");
						google.maps.event.trigger(map3, "resize");
						var point=new google.maps.LatLng(<?php echo $customer_latlng; ?>);	
						map3.panTo(point);
					}
					
				}).on('finished', function(e) {
					
					$("#fm_btn").addClass("disabled");
					
					var postData=$("#validation-form").serializeArray();//alert(postData);
					var formURL = "ajax/submit_route.php";	
					$.ajax(
						{
							url : formURL,
							type: "POST",
							data : postData,
							success:function(response, textStatus, jqXHR)
							{
								if(response=='success'){
								
									bootbox.dialog("Your information was successfully saved!", [{
										"label" : "OK",
										"class" : "btn-small btn-primary",
										callback: function() {
							window.location.href="http://ogtslive.com/customer/track.php?page=trip_routes&id=<?php echo $id; ?>";
										  }
										}]
									);
								}else{
									bootbox.dialog("Something went wrong! Change a few things up and try submitting again!!", [{
										"label" : "OK",
										"class" : "btn-small btn-danger",
										}]
									);
								}
								

							},

							error: function(jqXHR, textStatus, errorThrown) 

							{

								bootbox.dialog("Change a few things up and try submitting again!", [{
									"label" : "OK",
									"class" : "btn-small btn-danger",
									}]
								);
								  

							}

						});
						
						
					
				}).on('stepclick', function(e){
					//return false;//prevent clicking on steps
				});
			
			
				$('.date-picker').datepicker().next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
				
				$('.timepicker').timepicker({
					minuteStep: 1,
					showSeconds: true,
					showMeridian: false
				});
				var d=new Date();
				var day=d.getDate();
				var month=d.getMonth() + 1;
				var yr=d.getFullYear();
				var cur=day+"-"+month+"-"+yr;				

 				$("#id-date-picker-1").val(cur);
				$("#id-date-picker-2").val(cur);
				$("#id-date-picker-3").val(cur);
				
				$("#create_tag").click(function(e) {
                    $("#tag_name").val('');
					$("#reset_m").click();
					$("#device_m").hide();
                });

				$("#save_tag").click(function(e) {
					
					var path=creator3.showData();
					var tag_name=$("#tag_name").val();
					var loc=$("#address_m").val();
					var tag_time=$("#id-date-picker-3").val();
					var tag_time_t=$("#timepicker3").val();
					var last_trip_tag=$("#last_trip_tag").val();
					//alert(path);
                    if(path=='Please first create a polygon' || creator3.showData()==null){
						$("#device_m").html('Please complete the tag');					
						$("#device_m").addClass(' alert-error');					
						$("#device_m").show();						
						return false;
					}else if(tag_name==''){
						$("#device_m").html('Please name your tag');					
						$("#device_m").addClass(' alert-error');					
						$("#device_m").show();						
						return false;
						
					}else{
						$("#device_m").hide();	
						$("#save_tag").addClass("disabled");
						
						
						$.ajax({
						type: "GET",
						url: "ajax/save_route_tag.php?path="+path+"&tag_name="+tag_name+"&loc="+loc+"&date="+tag_time+"&time="+tag_time_t+"&last_tag="+last_trip_tag,
						dataType: 'html',
						success: function(data) {
							if(data=='error'){			
								alert("Something went wrong !!! Please try again.");			
							}else{
								var succ_div='<div class="alert alert-success"><strong><i class="icon-ok"></i>Done!</strong>  Successfully created Route-Tag '+tag_name+'.<br></div>';
								$("#results").append(succ_div);
								var tags_added=$("#trip_tags").val();
								tags_added=tags_added+","+data;
								$("#trip_tags").val(tags_added);
								$("#last_trip_tag").val(data);
								$("#tag_name").val('');
								$("#reset_m").click();
								$("#save_tag").removeClass("disabled");
							}
						}
						});
					}
					

                });
						
				
		/*
		
				$("[id^='delete_tag']").click(function(e){
					var id=$(this).data("id");
					
					$.ajax({
						type: "GET",
						url: "ajax/delete_route_tag.php?id="+id,
						dataType: 'html',
						success: function(data) {
							if(data=='error'){			
								alert("Something went wrong !!! Please try again.");			
							}else{
							
								
							}
						}
						});
					
					
				});
				
		*/		
				
			
				$('#validation-form').validate({
					errorElement: 'div',
					errorClass: 'help-inline',
					//focusInvalid: false,
					rules: {
						
						trip: {
							required: true,							
						},
						add1:{required: true,	},		
						add2:{required: true,	},			
					},
			
					messages: {
						
						trip: {
							required: "Please name your Route.",
							
						},
						
						add1: "Please enter start point",
						add2: "Please enter end point",
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
			
				
				
				
				
			})
			
function resizeMap(m) {
    x = m.getZoom();alert(x);
    c = m.getCenter();
    google.maps.event.trigger(m, 'resize');
    m.setZoom(x);
    m.setCenter(c);
};		

function largeMap(){
 var largeLatlng = new google.maps.LatLng(51.92475, 4.38206);
 var largeOptions = {zoom: 10, center: largeLatlng,mapTypeId: google.maps.MapTypeId.ROADMAP};
 var largeMap = new google.maps.Map(document.getElementById("main-map"), largeOptions);
 var largeMarker = new google.maps.Marker({position: largeLatlng, map:largeMap, title:"Cherrytrees"});
 largeMarker.setMap(largeMap);
}	
function resetMap() {					
					creator.destroy();
					creator=null;
					creator=new PolygonCreator(map);
} 
function resetMap2() {	
					creator2.destroy();
					creator2=null;
					creator2=new PolygonCreator(map2);
} 
function resetMap3() {
					creator3.destroy();
					creator3=null;
					creator3=new PolygonCreator(map3);
					$("#device_m").hide();
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
	</body>
</html>