<?php $id1=$_GET['id1']; 
$sqln="select * from trip_routes where id=$id1";
$rsn=mysql_query($sqln);
$rw=mysql_fetch_assoc($rsn);
$stat_label=getStatClass($rw['trip_status']);

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

						<li>
							<a href="track.php?page=trip_routes&id=<?php echo $id; ?>">Trips</a>

							<span class="divider">
								<i class="icon-angle-right arrow-icon"></i>
							</span>
						</li>
						<li class="active">Routes</li>
					</ul><!--.breadcrumb-->

					
				</div>

				<div class="page-content">
					<div class="page-header position-relative">
						<h1>
							 Route Details
							
						</h1>
					</div><!--/.page-header-->

					<div class="row-fluid">
						<div class="span12">
							<!--PAGE CONTENT BEGINS-->

						

							<div class="row-fluid">
								<div class="span12">
									<div class="widget-box transparent">
										<div class="widget-header widget-header-blue widget-header-flat">
											<h4 class="lighter">Route Details</h4>

											
										</div>

										<div class="widget-body">
                                       
											<div class="widget-main">
												<div class="row-fluid">
													
												
													<div class="step-content row-fluid position-relative" id="step-container">
														<div class="step-pane active" id="step1">
															
																
                                                                
                                          <div class="profile-user-info profile-user-info-striped">
											<div class="profile-info-row">
												<div class="profile-info-name">  Route Name </div>

												<div class="profile-info-value">
													<span ><?php echo $rw['trip_name']; ?></span>
												</div>
											</div>
                                            
                                           
                                            
                                            <div class="profile-info-row">
												<div class="profile-info-name">  Start Location </div>

												<div class="profile-info-value">
													<span ><?php echo $rw['start_point']; ?></span>
												</div>
											</div>
                                            <div class="profile-info-row">
												<div class="profile-info-name">  End Location </div>

												<div class="profile-info-value">
													<span ><?php echo $rw['end_point']; ?></span>
												</div>
											</div>
                                          
                                            <div class="profile-info-row">
												<div class="profile-info-name"> Current Status </div>

												<div class="profile-info-value">
													<span class="label label-<?php echo $stat_label; ?>"><?php echo $rw['trip_status']; ?></span>
												</div>
											</div>
                                            <div class="profile-info-row">
												<div class="profile-info-name">  Created At </div>

												<div class="profile-info-value">
													<span ><?php echo  date("d-m-Y H:i:s",strtotime($rw['created_at'])); ?></span>
												</div>
											</div>
                                            


										</div>

																
                                                                

																
								<div style="width:48%; float:left;">
																
								<!---------tag1----------->
                                                                
                                <div class="control-group">
									<h3>Start Tag</h3>
                                    <div class="hr hr-dotted"></div>
									<div class="controls">
                                       <div id="main-map" class="google-maps" style="width:100%;height:380px;"></div>
                                 	   <div class="row-fluid">
                                            <input type="hidden"  id="dataPanel" name="dp" value="<?php echo $rw['start_tag']; ?>" /> 
									   </div>
									</div>
                                </div>
                                 <!-------------------->
                               </div>
                               <div style="width:48%; float:left;margin-left: 40px;">
                               
                                   <!---------tag2----------->
                               <div class="control-group">
									<h3>End Tag</h3>
                                    <div class="hr hr-dotted"></div>
									<div class="controls">
                                       <div id="main-map2" class="google-maps" style="width:100%;height:380px;"></div>
                                 	   <div class="row-fluid">
                                            <input type="hidden" id="dataPanel2" name="dp2" value="<?php echo $rw['end_tag']; ?>" />	
									   </div>
								</div>
                                </div>
                                 <!-------------------->
                                </div>                          
                                <!---------tags----------->
                                                                
                                <div class="control-group">
									<h3>Tags</h3>
                                    <div class="hr hr-dotted"></div>
									<div class="controls">
                                       
                                 	   <div class="row-fluid">
                                       <?php
									   $start=$rw['start_tag'];
									   $start=explode(")(",$start); 
									   $start=$start[0];
									   $start=str_replace("(","",$start);
									   
									   $end=$rw['end_tag'];
									   $end=explode(")(",$end); 
									   $end=$end[0];
									   $end=str_replace("(","",$end);
									   
									   ?>
                                     <!-- <input type="hidden" class="tag_name" id="tag_start" value="<?php echo $rw['start_tag'];?>" title="Start Tag" data-id="<?php echo $start; ?>"/> <span class="label label-large label-success" style="cursor:pointer" id="triptag_s" data-id="<?php echo $start; ?>">Start Tag</span>-->
                                     
                                      <?php
									  $sq="select id,tag,tag_name,flag,timing from trip_route_tags where trip_id=$id1 order by flag desc";
									  $rs=mysql_query($sq);
									  while($row=mysql_fetch_assoc($rs)){
										  
										  	$tag=$row['tag'];
									   		$tag=explode(")(",$tag); 
									   		$tag=$tag[0];
									   		$tag=str_replace("(","",$tag);	
											
											if($row['flag']=='E'){
												$clr="important";
											}elseif($row['flag']=='S'){
												$clr="success";
											}else{
												$clr="warning";
											}
											
											
									  ?>
                                      <input type="hidden" class="tag_name" id="tag_<?php echo $row['id']; ?>" value="<?php echo $row['tag']; ?>" title="<?php echo $row['tag_name'];?>" data-id="<?php echo $tag; ?>" />  <span class="label label-large label-<?php echo $clr; ?>" style="cursor:pointer" id="triptag_<?php echo $row['id'];?>" data-id="<?php echo $tag; ?>"><?php echo $row['tag_name'];?></span> <?php if($row['flag']!='E'){ ?><span class="badge"><?php echo $row['timing']; ?> mins</span><?php } ?>                   
                                      <?php } ?>
                                      
                                       <!--<input type="hidden" class="tag_name"  id="tag_end"value="<?php echo $rw['end_tag']; ?>" title="End Tag" data-id="<?php echo $end; ?>" />	<span class="label label-large label-important" style="cursor:pointer" id="triptag_e" data-id="<?php echo $end; ?>" >End Tag</span>-->
									   </div>
                                       <div id="main-map3" class="google-maps" style="width:100%;height:380px;"></div>
									</div>
                                </div>
                                 <!-------------------->  
															
														</div> <!---------/step1----------->


														
													</div>

													<hr />
                                                    
                                                    
													<div class="row-fluid wizard-actions">
                                                    <a href="track.php?page=trip_routes&id=<?php echo $id;?>">
														<button class="btn btn-prev">
															<i class="icon-arrow-left"></i>
															Back
														</button>
                                                        </a>
                                                        <?php /*if($rw['trip_status']=='Ended'){ ?>
                                                        <a href="track.php?page=trip_report&id=<?php echo $id;?>&id1=<?php echo $id1; ?>">
                                                        <button class="btn btn-success btn-next" data-last="Finish" id="fm_btn">
															Report
															<i class="icon-arrow-right icon-on-right"></i>
														</button>
                                                        </a>
                                                        <?php }*/ ?>

														
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
        
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
		<script type="text/javascript" src="geofence/polygon.min.js"></script>
        <script type="text/javascript" src="geofence/v3_epoly.js"></script>
<!--        <script src="assets/js/maplabel-compiled.js"></script>
-->       


		<script type="text/javascript">
			$(function() {
				
				 var mapCenter=new google.maps.LatLng(<?php echo $customer_latlng; ?>);		
				 var myOptions = {
					zoom: 10,		
					center: mapCenter,
					mapTypeId: google.maps.MapTypeId.ROADMAP,		
					mapTypeControl: true,		
					mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},		
					navigationControl: true,		
				  }
				 map = new google.maps.Map(document.getElementById('main-map'), myOptions);					
				 map2 = new google.maps.Map(document.getElementById('main-map2'), myOptions);				 
				 map3 = new google.maps.Map(document.getElementById('main-map3'), myOptions);
				 map3.setZoom(7); 			 
				 
			
				$('[data-rel=tooltip]').tooltip();
			
			
			
			$("[id^='triptag'").click(function(e) {
				var lat_lng=$(this).data("id");
				var lat_lan = lat_lng.split(",", 2);		
				//console.log(lat_lng);
                var polyPoint=new google.maps.LatLng(parseFloat(lat_lan[0]), parseFloat(lat_lan[1]) );
				//if(!map3.getBounds().contains(polyPoint)){
					map3.panTo(polyPoint);	
				//}
				//google.maps.event.trigger(markers[id], 'mouseover');	
            });
			
			
			
			/***************/
			 pC=$("[name='dp2']").val();
			 if(pC!=''){
				 
			var polyCoords= new Array();
			 var polyFence = new google.maps.Polygon({
					paths: polyCoords
			 });
			 
			 
				 var matches = pC.split(/[()]+/);
				// var matches = pC.match(/\((.*?)\)/);
				 if (matches) {
					$.each( matches, function(index, value){ //
						if(value!='' && value!=null){
			 					var vals = value.split(',');
								var lat = vals[0];
								var lng = vals[1];//alert(lat);alert(lng);
								var point = new google.maps.LatLng(parseFloat(lat),parseFloat(lng));//alert(point);

								polyCoords.push(point);
						}
					});
						
				}//if matches
				
				
				 var polyFence = new google.maps.Polygon({

							paths: polyCoords,

							strokeColor: "#0000FF",

							 strokeOpacity: 0.8,

							 strokeWeight: 2,

							 fillColor: "#FF0000",

							 fillOpacity: 0.35



						  });

						

						polyFence.setMap(map2);						

						var boundbox = new google.maps.LatLngBounds();
						for ( var i = 0; i < polyCoords.length; i++ )
						{

						  boundbox.extend(polyCoords[i]);

						}
						map2.setCenter(boundbox.getCenter());
						map2.fitBounds(boundbox);
			 }
			
			/*****************/
			/***************/
			 pC=$("[name='dp']").val();
			 if(pC!=''){
				 
			var polyCoords= new Array();
			 var polyFence = new google.maps.Polygon({
					paths: polyCoords
			 });
			 
			 
				 var matches = pC.split(/[()]+/);
				// var matches = pC.match(/\((.*?)\)/);
				 if (matches) {
					$.each( matches, function(index, value){ //
						if(value!='' && value!=null){
			 					var vals = value.split(',');
								var lat = vals[0];
								var lng = vals[1];//alert(lat);alert(lng);
								var point = new google.maps.LatLng(parseFloat(lat),parseFloat(lng));//alert(point);

								polyCoords.push(point);
						}
					});
						
				}//if matches
				
				
				 var polyFence = new google.maps.Polygon({

							paths: polyCoords,

							strokeColor: "#0000FF",

							 strokeOpacity: 0.8,

							 strokeWeight: 2,

							 fillColor: "#FF0000",

							 fillOpacity: 0.35



						  });

						

						polyFence.setMap(map);
						
						var boundbox = new google.maps.LatLngBounds();
						for ( var i = 0; i < polyCoords.length; i++ )
						{

						  boundbox.extend(polyCoords[i]);

						}
						map.setCenter(boundbox.getCenter());
						map.fitBounds(boundbox);
			 }
			
			/*****************/
			$('.tag_name').each(function() {
				var pC=$(this).val();
				var title=$(this).attr("title");
				
				var lat_lng=$(this).data("id");
				var lat_lan = lat_lng.split(",", 2);			
                var polyPoint=new google.maps.LatLng(parseFloat(lat_lan[0]), parseFloat(lat_lan[1]) );
				//console.log(latLng);
				//alert("test");	
				if(pC!=''){				 
				 var polyCoords= new Array();
				 var polyFence = new google.maps.Polygon({
						paths: polyCoords
				 });			 
			 
				 var matches = pC.split(/[()]+/);
				// var matches = pC.match(/\((.*?)\)/);
				 if (matches) {
					$.each( matches, function(index, value){ //
						if(value!='' && value!=null){
			 					var vals = value.split(',');
								var lat = vals[0];
								var lng = vals[1];//alert(lat);alert(lng);
								var point = new google.maps.LatLng(parseFloat(lat),parseFloat(lng));//alert(point);
								polyCoords.push(point);
						}
					});
						
				}//if matches
				
				
				 var polyFence = new google.maps.Polygon({
							 paths: polyCoords,
							 strokeColor: "#0000FF",
							 strokeOpacity: 0.8,
							 strokeWeight: 2,
							 fillColor: "#FF0000",
							 fillOpacity: 0.35
						  });

						

						polyFence.setMap(map3);	
						/*alert(polyFence.LatLngBounds().getCenter());
							
						 var mapLabel = new MapLabel({
						  text: title,
						  position: new google.maps.LatLng(polyPoint),
						  map: map3,
						  fontSize: 25,
						  align: 'right'
						});
						mapLabel.set('position', new google.maps.LatLng(polyPoint));						
				*/ 
					
						var label=title;//alert(label);
						var title="<b>"+label+"</b>";
						createClickablePoly(polyFence, title, label);
						
						

						var boundbox = new google.maps.LatLngBounds();
						for ( var i = 0; i < polyCoords.length; i++ )
						{

						  boundbox.extend(polyCoords[i]);

						}
						map3.setCenter(boundbox.getCenter());
						map3.fitBounds(boundbox);/**/
						
				}
				
			});

				
				
				
				
			})
			
	///click polygon

      function createClickablePoly(poly, html, label, point) {

		gpolys= new Array();
        gpolys.push(poly);

        if (!point && poly.getPath 
                   && poly.getPath().getLength 
                   && (poly.getPath().getLength > 0) 
                   && poly.getPath().getAt(0)) { point = poly.getPath().getAt(0); } //alert(poly);

        var poly_num = gpolys.length - 1;
        if (!html) {html = "";}
        else { html += "<br>";}
        var length = poly.Distance();
	if (length > 1000) {
         // html += "length="+poly.Distance().toFixed(3)/1000+" km";

	} else {
         // html += "length="+poly.Distance().toFixed(3)+" meters";

        }
/*        for (var i=0;i<poly.getPath().getLength();i++) {

           html += "<br>poly["+poly_num+"]["+i+"]="+poly.getPath().getAt(i);

        }

	html += "<br>Area: "+poly.Area()+" sq meters";
*/
        // html += poly.getLength().toFixed(2)+" m; "+(poly.getLength()*3.2808399).toFixed(2)+" ft; ";

        // html += (poly.getLength()*0.000621371192).toFixed(2)+" miles";

        var contentString = html;
		var infowindow = new google.maps.InfoWindow();
        google.maps.event.addListener(poly,'click', function(event) {
          infowindow.setContent(contentString);
          if (event) {
             point = event.latLng;
          }

          infowindow.setPosition(point);
          infowindow.open(map3);

          // map.openInfoWindowHtml(point,html); 

        }); 
        if (!label) {

          label = "polyline #"+poly_num;

        }

        label = "<a href='javascript:google.maps.event.trigger(gpolys["+poly_num+"],\"click\");'>"+label+"</a>";

        // add a line to the sidebar html

        //  side_bar_html += '<input type="checkbox" id="poly'+poly_num+'" checked="checked" onclick="togglePoly('+poly_num+');">' + label + '<br />';

      }


		</script>
	</body>
</html>
>