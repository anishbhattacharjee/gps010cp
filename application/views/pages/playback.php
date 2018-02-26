<link rel="stylesheet" type="text/css" href="<?=base_url()?>dist/css/bootstrap-datepicker.css" />
<link rel="stylesheet" type="text/css" href="<?=base_url()?>dist/css/bootstrap-timepicker.css" />
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

                                                

                                                <form id="v_d_d_r" method="post" action="<?=base_url();?>playback/playback_print/<?php echo $id; ?>">

                                                <fieldset id="search_criteria">

                                                <div class="row-fluid">
                                                
                                                
                                                    <div class="span2">

													<div class="row-fluid">

														<label for="vid">Device</label>

													</div>



													<div class="controls">														

															<select name="vid" id="vid" style="width:100%" >

                                                            

                                                             <?php 
															 if(isset($dev[0]) && $dev[0]){
															foreach($dev['data'] as $dev){
																
$imei=$dev['imie_no'];
$make = $this->playback_model->getMakeDetails($imei);

															?>

                        <option value="<?php echo $dev['imie_no']; ?>,<?php echo $make; ?>"  /><?php echo $dev['device_name']; ?></option>

                        <?php } }?>		

                        

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
<div id="reset_msg_div"> <p style="display:none; color:#f89406;" id="reset_msg">Reset to play next device track</p>

<p id="curr_loc_name"></p>
</div>
													</fieldset>

                                                   

													<div class="form-actions center">

									<button class="btn btn-small btn-success"  id="showTrack"   type="button" >                                                       

                                     <i class="icon-play"></i>	
                                     Play

									</button>



									<button class="btn btn-small btn-success"  id="pauseTrack"  type="button" style="display:none">                                                       

                                     <i class="icon-pause"></i>	

									</button>



									<button class="btn btn-small btn-success"  id="resumeTrack"  type="button" style=" display:none;">                                                       

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



	  <div id="main-map" class="google-maps" style="width:100%;height:380px;"></div>



</div>



</div>



  </div><!--/.page-content-->







			



			</div><!--/.main-content-->



		</div><!--/.main-container-->

		<script src="<?=base_url();?>dist/js/bootstrap-datepicker.min.js"></script>

		<script src="<?=base_url();?>dist/js/bootstrap-timepicker.min.js"></script>

       
		<script src="<?=base_url();?>assets/js/ace-elements.min.js"></script>



<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCNMfm4IoavTQbIjDH42fNQF31v4BkT8e0&sensor=false&v=3.exp"></script>



	<script type="text/javascript">

$(document).ready(function(){
		  //create map



		 var mCenter=new google.maps.LatLng(<?php echo $userinfo['customer_latlng']; ?>);



		 var myOptions = {



		  	zoom: 12,
		  	maxZoom: 16,

		  	center: mCenter,

		  	mapTypeId: google.maps.MapTypeId.ROADMAP



		  }



		 map = new google.maps.Map(document.getElementById('main-map'), myOptions);
		 var geocoder = new google.maps.Geocoder();
		 window.off=false;


		 
		 

$("#resetTrack").click(function(e) {

	location.reload();

});

$("#resumeTrack").click(function(e) {

	window.play = true;

	$("#resumeTrack").hide();

	$("#pauseTrack").show();

 

});



$("#pauseTrack").click(function(e) {//alert(timer);
window.play = false;
//timer.pause();

clearTimeout(window.timer);

window.timer=0;

//alert(timer);

	$("#pauseTrack").hide();

	$("#resumeTrack").show();

	//alert("test"+timer);

	

});

$('#showTrack').click(function(){ 
	var markers;

	var flightPlanCoordinates=new Array();

	var i=0;

	var timer=0;

	map = new google.maps.Map(document.getElementById('main-map'), myOptions);

	var frmdate=$("#id-date-picker-1").val();

	var todate=$("#id-date-picker-2").val();

	var frmtime=$("#timepicker1").val();

	var totime=$("#timepicker2").val();

	

	var lastUpdate=$("#id-date-picker-1").val()+" "+$("#timepicker1").val();

	lastUpdate=encodeURI(lastUpdate);

	//alert(lastUpdate);

	var vid=$("#vid").val();
	var split = vid.split(",");
	var vid = split[0];
	var make = split[1];

	var detailed=0;
	if($('#detailed:checked').val()){
		detailed=$('#detailed:checked').val();
	}

	$.ajax({

       type: "GET",

       url: "<?=base_url();?>ajax/check_historydata.php?vid="+vid+"&last="+lastUpdate+"&td="+todate+"&tt="+totime+"&make="+make,

       dataType: 'html',

       success: function(data) {

			if(data=='no data'){

				alert("No signals received for this time interval !!!");

			}else{
				//$("#collapse").click();
				//$("#reset_msg_div").hide();
				//$("#search_criteria").hide();
				

				$("#id-date-picker-1").prop('disabled', true);

				$("#id-date-picker-2").prop('disabled', true);

				$("#timepicker1").prop('disabled', true);

				$("#timepicker2").prop('disabled', true);

				$("#vid").prop('disabled', true);	
				$("#detailed").prop('disabled', true);			

				$("#reset_msg").show();

				$("#showTrack").hide();

				$("#pauseTrack").show();

				//$("#showTrack").button('loading');

				//$("#showTrack").html('Show Track');

			

				points=data.split(",");

				sPoint=new google.maps.LatLng(parseFloat(points[0]),parseFloat(points[1]));

				var image = new google.maps.MarkerImage(

					'http://localhost/gpscustomer/assets/images/marker-images/image.png',

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

				//alert(points[2]);
				var dist_t=" | <span style='color:#DC5181'>Distance Travelled</span>: "+points[2]+" km ";
				$("#display_dist").html(dist_t);
				
				window.play = true;
       
       
				autoUpdate (markers,flightPlanCoordinates,i,vid,lastUpdate,todate,totime,detailed,make);
 				//setTimeout(function(){play = false },2000);
				
				
				
			}

			

	   }

	});

	

});


autoUpdate = function(markers,flightPlanCoordinates,i,vid,lastUpdate,td,tt,detailed,make) { //alert("gvhjgvhb");
alert();
//alert("ajax/historydata.php?vid="+vid+"&last="+lastUpdate+"&td="+td+"&tt="+tt+"&detailed="+detailed);

	$.ajax({

       type: "GET",

       url: "<?=base_url();?>ajax/historydata.php?vid="+vid+"&last="+lastUpdate+"&td="+td+"&tt="+tt+"&detailed="+detailed+"&make="+make,

       dataType: 'xml',

       success: function(xml) { //alert("gxdf");	   
	   		console.log(xml);
		   $(xml).find("marker").each(function(){ 
		  
		   var dest = $(this).find('dest').text();	
		   if(dest=='Reached Destination'){

				//alert("Reached Destination!!!");
			$("#reset_msg").html('<span style="color:red">Reached Destination!!!</span> Reset to play next device track');
				window.off=true;
				//$("#resumeTrack").attr('disabled','disabled');
				//$("#showTrack").attr('disabled','disabled');
				//$("#pauseTrack").attr('disabled','disabled');

			}else{

		   	var id = $(this).find('id').text();			

			var lat = $(this).find('lat').text();

			var lng = $(this).find('lng').text();

			var point = new google.maps.LatLng(parseFloat(lat),parseFloat(lng));
			window.loc=point;

			var imei = $(this).find('imei').text();

			var DevTime = $(this).find('DevTime').text();

			var color = $(this).find('Color').text();
			var speed = $(this).find('speed').text();

			var ts = $(this).find('ts').text();
			var ts_display= $(this).find('ts_display').text();
			
			var dt = new Date(ts_display);
			
			var mnth=dt.getMonth()
			var t_date=dt.getDate()+"-"+(parseInt(mnth)+1)+"-"+dt.getFullYear();
			var t_time=dt.getHours()+":"+dt.getMinutes()+":"+dt.getSeconds();
			//var date = Date.parse('10-Aug-13');
			//var n_date=new Date(dt.getFullYear(), (parseInt(mnth)+1), dt.getDate(), dt.getHours(), dt.getMinutes(), dt.getSeconds()); // yyyy, mm-1, dd, hh, mm, ss

			
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

    			strokeColor: '#228B22',

    			strokeOpacity: 0.5,

    			strokeWeight: 4,

				map: map

  			});

			 

			for (var j = 0, I = markers.length; j < I && markers[j] != marker; j++){

      				markers[j].setTitle('I was here');}



			lastUpdate =ts;

			lastUpdate=encodeURI(lastUpdate);
			}//else

		});
		if(!window.off){
		if(window.play){///console.log("play");
			$("#curr_loc_name").html('');
		//console.log(window.timer);
 		window.timer=setTimeout(autoUpdate(markers,flightPlanCoordinates,i,vid,lastUpdate,td,tt,detailed,make),1000);//6s

		}else{//console.log("pause");
				//console.log(window.loc);
				
				 geocoder.geocode({
                     "latLng":window.loc
                     }, function (results, status) {
                         if (status == google.maps.GeocoderStatus.OK) { 
                             var placeName = results[1].formatted_address;  
							 //console.log(placeName);
							var curr_loc_name="<span style='color:#DC5181'>Current Location</span>: <span style='color:#669FC7'>"+placeName+"</span>";	
							 $("#curr_loc_name").html(curr_loc_name);
						   } /* else {				
							  alert('Geocoder failed due to: ' + status);				
							}*/				
				});
				
				window.timern=0;
				window.timern=setInterval(function(){
					//console.log("new----"+window.timer);
					
					if(window.play){
						clearInterval(window.timern);
						window.timern=0;
						//console.log("play");
						
					 window.timer=autoUpdate(markers,flightPlanCoordinates,i,vid,lastUpdate,td,tt,detailed,make);//6s
					}
				 },1000);
			
		}
		}//if not stop

		 
		  
	   }//success

    });//ajax

}//function





/*************************************/





	});	//doc ready

	

/***************************************************************************/

 function stopTimer(timer) {

       //if (timer) {

            clearTimeout(window.timer);

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