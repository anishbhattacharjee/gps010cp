


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
.map-shadow-corner {
background: url(images/map_shadow_corner.png) top left no-repeat;
width: 10px;
height: 10px;
position: absolute;
top: 0;
left: 0;
}
.map-shadow-top {
background: url(images/map_shadow_top.png) repeat-x;
width: 98%;
height: 10px;
position: absolute;
top: 0;
left: 10px;
}
.map-shadow-left {
clear: both;
background: url(images/map_shadow_left.png) repeat-y;
width: 10px;
height: 98%;
position: absolute;
top: 10px;
left: 0;
}


</style>



				<div class="page-content">



				    <div class="row-fluid">



				    <div class="span12">
	  <div id="myown" style="width:100%;">



	  	<div class="span12">




<div class="span12">

                                    

										<div class="widget-box">

											<div class="widget-header">

												<h4>Search</h4>


<span id="display_time"></span><span id="display_dist"></span>
												<span class="widget-toolbar">
														
													<a href="#" data-action="settings">

														<i class="icon-cog"></i>

													</a>



													<a href="#" data-action="reload">

														<i class="icon-refresh"></i>

													</a>



													<a href="#" data-action="collapse" id="collapse">

														<i class="icon-chevron-up"></i>

													</a>



													<a href="#" data-action="close">

														<i class="icon-remove"></i>

													</a>

												</span>

											</div>



											<div class="widget-body">

												<div class="widget-main no-padding">

                                                

                                                <form id="v_d_d_r" method="post" action="track.php?page=playback_print&id=<?php echo $id; ?>">

                                                <fieldset>

                                                <div class="row-fluid">
                                                
                                                
                                                    <div class="span2">

													<div class="row-fluid">

														<label for="vid">Device</label>

													</div>



													<div class="controls">														

															<select name="vid" id="vid" style="width:100%" >

                                                            

                                                             <?php 

														$sql="SELECT

installation.model_id,

installation.device_name,
installation.imie_no,

gps_model_details.imie_number

FROM

installation

INNER JOIN gps_model_details ON installation.model_id = gps_model_details.model_id

WHERE installation_status='completed' AND customer_id=$id ";

															$rs=mysql_query($sql);

															while($dev=mysql_fetch_assoc($rs)){

															

															?>

                        <option value="<?php echo $dev['imie_no']; ?>" /><?php echo $dev['device_name']; ?></option>

                        <?php } ?>		

                        

<!--                                                     <option value="359710042138041" />359710042138041

                                                    <option value="359710042134396" />359710042134396

-->                                                     </select>															

													</div>

                                                    </div>	<!--span12-->
                                                

                                                <div class="span2">

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

                                                    

                                                    <div class="span2">

                                                    <div class="row-fluid">

														<label for="timepicker1">Time</label>

													</div>



													<div class="control-group">

														<div class="input-append bootstrap-timepicker">

														<input id="timepicker1" type="text" name="frmtime" class="input-small" value="00:00:00"/>

															<span class="add-on">

																<i class="icon-time"></i>

															</span>

														</div>

													</div>

                                                    </div>

                                                  

                                                    

                                                    

                                                    

                                                    <div class="span2">

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


                                                    <div class="span2">

                                                    <div class="row-fluid">

														<label for="timepicker2">Time </label>

													</div>



													<div class="control-group">

														<div class="input-append bootstrap-timepicker">

														<input id="timepicker2" type="text" name="totime" class="input-small" />

															<span class="add-on">

																<i class="icon-time"></i>

															</span>

														</div>

													</div>

                                                    </div>

                                                    

                                                 

                                                    <div class="span2">
                                                   
                                                    <div class="controls">
                                                        <label> 
                                                    <div class="row-fluid">

														Detailed Playback

													</div>
                                                            <input name="detailed" id="detailed" class="ace-switch ace-switch-7" type="checkbox" value="1" />
                                                            <span class="lbl" style="margin-top:5px;margin-left: 0px;"></span>
                                                        </label>
                                                    </div>
                                                    </div>


                                                    </div><!--row-fluid-->

													</fieldset>

                                                    <p style=" margin-left:20px; display:none; color:#f89406;" id="reset_msg">Reset to play next device track</p>

													<div class="form-actions center">

									<button class="btn btn-small btn-success"  id="showTrack"   type="button" >                                                       

                                     <i class="icon-play"></i>	
                                     Play

									</button>



									<button class="btn btn-small btn-success"  id="pauseTrack"  type="button" style="margin-top: 13px; display:none;">                                                       

                                     <i class="icon-pause"></i>	

									</button>



									<button class="btn btn-small btn-success"  id="resumeTrack"  type="button" style="margin-top: 13px; display:none;">                                                       

                                     <i class="icon-play"></i>
                                     	

									</button>



                                   <!-- <input type="submit" class="btn btn-small btn-warning"  id="printTrack" value="Print" onClick="resetSearch();" >	-->			


                                    <button class="btn btn-small btn-warning"  type="submit" id="printTrack" value="Print" onClick="resetSearch();" >			

                                    <i class="icon-print"></i>

										Print

									</button>


                                    <button class="btn btn-small btn-danger"  id="resetTrack" value="Reset" type="button" >				

                                    <i class="icon-remove"></i>

										Reset

									</button>

													</div>

                                                    				

													</form>	



												</div>

											</div>

										</div>

									</div><!--/.spn11-->



									



									

								</div>

									



								</div>



	 
 <div style="position:relative; height:100%;">
                                 <div id="main-map" class="google-maps" style="width:100%;height:380px;"></div>
                                	<div class="map-shadow-corner"></div>
                                    <div class="map-shadow-top"></div>
                                    <div class="map-shadow-left"></div>
                                    
                             </div>

</div>



</div>



  </div><!--/.page-content-->







			



			</div><!--/.main-content-->



		</div><!--/.main-container-->









	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>



	

<?php include "include/footer.php"; ?>



	



	<script type="text/javascript">



	$(function(){



		  //create map



		 var mCenter=new google.maps.LatLng(12.982315,77.612455);



		 var myOptions = {



		  	zoom: 14,

		  	center: mCenter,

		  	mapTypeId: google.maps.MapTypeId.ROADMAP



		  }



		 map = new google.maps.Map(document.getElementById('main-map'), myOptions);



		 

				var d=new Date();

				var day=d.getDate();

				var month=d.getMonth() + 1;

				var yr=d.getFullYear();

				var cur=day+"-"+month+"-"+yr;

				

 				$("#id-date-picker-1").val(cur);

				$("#id-date-picker-2").val(cur);

				

				$('.date-picker').datepicker().next().on(ace.click_event, function(){

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



		 

$("#resetTrack").click(function(e) {

	location.reload();

/*    var markers = [];

	var flightPlanCoordinates=new Array();

	var i=0;

	map = new google.maps.Map(document.getElementById('main-map'), myOptions);

*/



});

$("#resumeTrack").click(function(e) {

 // timer.resume(); 

  	//alert("test"+timer);

	$("#resumeTrack").hide();

	$("#pauseTrack").show();

 

});



$("#pauseTrack").click(function(e) {//alert(timer);

//timer.pause();

clearTimeout(timer);

var timer=0;

//alert(timer);

	$("#pauseTrack").hide();

	$("#resumeTrack").show();

	//alert("test"+timer);

	

});

$('#showTrack').click(function(){ 

//

//$("#resetTrack").click();

		

	var markers;

	var flightPlanCoordinates=new Array();

	var i=0;

	var timer=0;

	map = new google.maps.Map(document.getElementById('main-map'), myOptions);

//alert("dxfbv");

	var frmdate=$("#id-date-picker-1").val();

	var todate=$("#id-date-picker-2").val();

	var frmtime=$("#timepicker1").val();

	var totime=$("#timepicker2").val();

	

	var lastUpdate=$("#id-date-picker-1").val()+" "+$("#timepicker1").val();

	lastUpdate=encodeURI(lastUpdate);

	//alert(lastUpdate);

	var vid=$("#vid").val();
	var detailed=0;
	if($('#detailed:checked').val()){
		detailed=$('#detailed:checked').val();
	}
//alert(detailed);
	

	//alert("test");  

	//alert("ajax/check_historydata.php?vid="+vid+"&last="+lastUpdate+"&td="+td+"&tt="+tt);

	$.ajax({

       type: "GET",

       url: "ajax/check_historydata.php?vid="+vid+"&last="+lastUpdate+"&td="+todate+"&tt="+totime,

       dataType: 'html',

       success: function(data) {

//alert(data);

			if(data=='no data'){

				alert("No signals received for this time interval !!!");

			}else{
				$("#collapse").click();

				$("#id-date-picker-1").prop('disabled', true);

				$("#id-date-picker-2").prop('disabled', true);

				$("#timepicker1").prop('disabled', true);

				$("#timepicker2").prop('disabled', true);

				$("#vid").prop('disabled', true);	
				$("#detailed").prop('disabled', true);			

				$("#reset_msg").show();

				//$("#showTrack").hide();

				//$("#pauseTrack").show();

				$("#showTrack").button('loading');

				$("#showTrack").html('Show Track');

			

				points=data.split(",");

				sPoint=new google.maps.LatLng(parseFloat(points[0]),parseFloat(points[1]));

				var image = new google.maps.MarkerImage(

					'assets/images/marker-images/image.png',

					new google.maps.Size(30,32),

					new google.maps.Point(0,0),

					new google.maps.Point(10,21)

				);

	

		 

				markers = new google.maps.Marker({

							flat: true,  

							icon: image, 				

							map: map,

							optimized: false,

							position: sPoint,  				

							visible: true,		

			  

				});
				if(!map.getBounds().contains(sPoint))
                                map.panTo(sPoint);	

				
				var dist_t=" | <span style='color:#DC5181'>Distance Travelled</span>: "+points[2]+" km ";
				$("#display_dist").html(dist_t);
				autoUpdate (markers,flightPlanCoordinates,i,vid,lastUpdate,todate,totime,detailed);

			}

			

	   }

	});

	

});





		 

var degreesPerRadian = 180.0 / Math.PI;

google.maps.LatLng.prototype.latRadians = function()

{

  return (Math.PI * this.lat()) / 180;

}



google.maps.LatLng.prototype.lngRadians = function()

{

  return (Math.PI * this.lng()) / 180;

}





autoUpdate = function(markers,flightPlanCoordinates,i,vid,lastUpdate,td,tt,detailed) { //alert("gvhjgvhb");

//alert("ajax/historydata.php?vid="+vid+"&last="+lastUpdate+"&td="+td+"&tt="+tt+"&detailed="+detailed);

	$.ajax({

       type: "GET",

       url: "ajax/historydata.php?vid="+vid+"&last="+lastUpdate+"&td="+td+"&tt="+tt+"&detailed="+detailed,

       dataType: 'xml',

       success: function(xml) { //alert("gxdf");

		   $(xml).find("marker").each(function(){ 

		   	var id = $(this).find('id').text();			

			var lat = $(this).find('lat').text();

			var lng = $(this).find('lng').text();

			var point = new google.maps.LatLng(parseFloat(lat),parseFloat(lng));

			var imei = $(this).find('imei').text();

			var DevTime = $(this).find('DevTime').text();

			var color = $(this).find('Color').text();
			var speed = $(this).find('speed').text();

			var ts = $(this).find('ts').text();
			
			var dt = new Date(ts);
			var mnth=dt.getMonth()
			var t_date=dt.getDate()+"-"+(parseInt(mnth)+1)+"-"+dt.getFullYear();
			var t_time=dt.getHours()+":"+dt.getMinutes()+":"+dt.getSeconds();

			var info_display="<span style='color:#DC5181'>Speed</span>: "+speed+"km/hr | <span style='color:#DC5181'>Date</span>: "+t_date+" | <span style='color:#DC5181'>Time</span>: "+t_time+" ";
			
			$("#display_time").html(info_display);
			
			flightPlanCoordinates[i++]=new google.maps.LatLng(parseFloat(lat),parseFloat(lng));

			if(!map.getBounds().contains(point))

                                map.panTo(point);		



			markers.setPosition(point);

			



/*			var marker = new google.maps.Marker({

 				flat: true,

  				icon: GetVehIcon(angle),  				

  				map: map,

  				optimized: false,

  				position: point,

  				title: 'I might be here',

  				visible: true,



  

			});

			

			

			markers.push(marker);

*/



/*			var infoWindow = new google.maps.InfoWindow();

			google.maps.event.addListener(marker, 'mouseout', function() {

				infoWindow.close();

  			});

			

			

			var html='<strong>'+'Latitude: '+lat+'</strong.><br />'+'Longitude: '+lng+'<br />Time Stamp: '+ts;

			google.maps.event.addListener(marker, 'mouseover', function() {

				infoWindow.setContent(html);

				infoWindow.open(map, marker);

			});

*/			

			var flightPath;

			 flightPath = new google.maps.Polyline({

   				path: flightPlanCoordinates,

    			strokeColor: color,

    			strokeOpacity: 1.0,

    			strokeWeight: 2,

				map: map

  			});

			 

			for (var j = 0, I = markers.length; j < I && markers[j] != marker; j++){

      				markers[j].setTitle('I was here');}



			lastUpdate =ts;

			lastUpdate=encodeURI(lastUpdate);

		});

		

 		timer=setTimeout(autoUpdate(markers,flightPlanCoordinates,i,vid,lastUpdate,td,tt,detailed),360000);//6s



		 

	   }//success

    });//ajax

}//function





/*************************************/





	});	//doc ready

	

/***************************************************************************/

 function stopTimer(timer) {

       //if (timer) {

            clearTimeout(timer);

            timer = 0;

			return timer;

       // }

/* */

}



function resetSearch(){

	

		$("#id-date-picker-1").prop('disabled', false);

	$("#id-date-picker-2").prop('disabled', false);

	$("#timepicker1").prop('disabled', false);

	$("#timepicker2").prop('disabled', false);

	$("#vid").prop('disabled', false);

	$("#reset_msg").hide();



}





	</script>

	









</body></html>



