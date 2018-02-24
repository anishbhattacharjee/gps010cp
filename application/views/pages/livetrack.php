<?php // $sql="select * from geo_fence where customer_id=".$_GET['id']." and device_id=".$_GET['dev']." and fence_status='active'";

function ToDegrees($val){

    $GPRMC2Degrees = intval($val / 100) + ($val - (intval($val / 100) * 100)) / 60;

	return $GPRMC2Degrees;

}



$sql="select * from geo_fence limit 1";



$rs=mysql_query($sql);

$rw=mysql_fetch_assoc($rs);

$latlng=ltrim($rw['points'],"(");

$latlng=rtrim($latlng,")");

$latlng=explode(")(",$latlng);



$model=$_GET['dev'];


$s="SELECT

gps_model_details.imie_number

FROM

gps_model_details

WHERE gps_model_details.model_id=$model";

$r=mysql_query($s);

$w=mysql_fetch_assoc($r);



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







  



  	



	  <div id="main-map" style="width:100%;height:380px;"></div>



 <span id="vid" style="display:none"><?php echo $w['imie_number']; ?></span>



    



  	



	  <div id="myown"style="width:100%;height:250px;">



	  	<div class="span12" style="height:205px; overflow:scroll">


<?php


//var_dump($model);

?>
									<table id="live_data_table" class="table table-striped table-bordered table-hover">

										<thead>

											<tr>

												

												<th>Date Time</th>

                                                <th style="display:none;">Lattitude</th>

												<th style="display:none;">

													Longitude

												</th>

												<th >Speed</th>

												<th>Status</th>

												<th>Location Info</th>

											</tr>



										</thead>







										<tbody id="live_data">

                                        



<?php
//var_dump($w['imie_number']);
$i=0;



$sql_last="SELECT * FROM gps_master where imei='".$w['imie_number']."' ORDER BY time_stamps desc LIMIT 10";
$rs_last=mysql_query($sql_last);

while($rw_last=mysql_fetch_assoc($rs_last)){

	$i++;

$ts=$rw_last['time_stamps'];

$lat=ToDegrees($rw_last['lat']);

$lng=ToDegrees($rw_last['lng']);

$speed=$rw_last['speed']*1.85;

//$status=$rw_last['p7'];

$ts=$rw_last['time_stamps'];
$locinfo=$rw_last['location_info'];

if($rw_last['device_status']=='A'){ $status= "<span class='label label-success '> Active</span>"; }else{ $status= "<span class='label label-important '> In Active</span>";}

//echo "<tr  class=\"dev_loc\" id=\"$i\"><td>$ts</td><td style=\"display:none;\" id=\"lat$i\">$lat</td><td style=\"display:none;\" id=\"lng$i\">$lng</td><td>$speed KM/HR</td><td>$status</td><td id=\"loc$i\"></td></tr>";
echo "<tr  class=\"dev_loc\" id=\"$i\"><td>$ts</td><td style=\"display:none;\" id=\"lat$i\">$lat</td><td style=\"display:none;\" id=\"lng$i\">$lng</td><td>$speed KM/HR</td><td>$status</td><td>$locinfo</td></tr>";

            } ?>							

</tbody>

</table>

</div>



</div>



</div>



  </div><!--/.page-content-->







			



			</div><!--/.main-content-->



		</div><!--/.main-container-->








<?php include("include/footer.php"); ?>



	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

	<script type="text/javascript">



	$(function(){



		  //create map



		 var singapoerCenter=new google.maps.LatLng(12.973152950670608, 77.60289967060089);



		 var myOptions = {

		  	zoom: 17,

		  	center: singapoerCenter,

		  	mapTypeId: google.maps.MapTypeId.ROADMAP

		  }



		 map = new google.maps.Map(document.getElementById('main-map'), myOptions);

		var geocoder = new google.maps.Geocoder();

		 

				var d=new Date();

				var day=d.getDate();

				var month=d.getMonth() + 1;

				var yr=d.getFullYear();

				var cur=day+"-"+month+"-"+yr;

				

				var hr=d.getHours();

				var mins=d.getMinutes();

				var sec=d.getSeconds();

				var tym=hr+":"+mins+":"+sec;

				

	

				

				

		 



//$('#showTrack').click(function(){ 

	var markers = [];

	var flightPlanCoordinates=new Array();

	var i=0;var ct=10;var lid="0";

	var frmdate=cur;

	var frmtime=tym;

	

	var lastUpdate=frmdate+" "+frmtime;

	lastUpdate=encodeURI(lastUpdate);

	var vid=$("#vid").html();	
	//var vid=' 013227007909868';	

	autoUpdate (markers,flightPlanCoordinates,i,vid,lastUpdate,lid);

//});





		 





function autoUpdate(markers,flightPlanCoordinates,i,vid,lastUpdate,lid) { 



//alert("ajax/realtimedata.php?vid="+vid+"&last="+lastUpdate+"&lid="+lid);

	$.ajax({

       type: "GET",

       url: "ajax/realtimedata1.php?vid="+vid+"&last="+lastUpdate+"&lid="+lid,//+"&td="+td+"&tt="+tt,

       dataType: 'xml',

       success: function(xml) { //alert("gxdf");

		   $(xml).find("marker").each(function(){ 

		   	var id = $(this).find('id').text();	lid=id;	//alert(lid);	

			var lat = $(this).find('lat').text();

			var lng = $(this).find('lng').text();

			var point = new google.maps.LatLng(parseFloat(lat),parseFloat(lng));

			var imei = $(this).find('imei').text();

			var DevTime = $(this).find('DevTime').text();

			var color = $(this).find('Color').text();

			var speed = $(this).find('speed').text();

			var status = $(this).find('status').text();

			if(status=='A') status="<span class='label label-success '>Active</span>"; else status="<span class='label label-important '>InActive</span>";

			var state = $(this).find('state').text();

			var ts = $(this).find('ts').text();//alert(ts);
			var loc = $(this).find('loc').text();//alert(ts);

			

			flightPlanCoordinates[i++]=new google.maps.LatLng(parseFloat(lat),parseFloat(lng));

			var angle=0;

			if(!map.getBounds().contains(point))

                                map.panTo(point);		







			var image = new google.maps.MarkerImage(

  				'assets/images/marker-images/image.png',

  				new google.maps.Size(20,21),

  				new google.maps.Point(0,0),

  				new google.maps.Point(10,21)

			);

			

			var marker = new google.maps.Marker({

 				flat: true,

  				icon: image,  				

  				map: map,

  				optimized: false,

  				position: point,

  				title: 'I might be here',

  				visible: true

  

			});

			markers.push(marker);

			

			var infoWindow = new google.maps.InfoWindow();

			google.maps.event.addListener(marker, 'mouseout', function() {

				infoWindow.close();

  			});

			

			

			var html='<strong>'+'IMEI: '+imei+'<br />Latitude: '+lat+'<br />'+'Longitude: '+lng+'<br />Time: '+ts+'<br />Speed: '+speed+'KM/HR'+'<br />Location: '+loc+'</strong>';

			google.maps.event.addListener(marker, 'mouseover', function() {

				infoWindow.setContent(html);

				infoWindow.open(map, marker);

			});

					

			var flightPath;

			 flightPath = new google.maps.Polyline({

   				path: flightPlanCoordinates,

    			strokeColor: color,

    			strokeOpacity: 1.0,

    			strokeWeight: 2,

				map: map

  			});

			 

			for (var j = 0, I = markers.length; j < I && markers[j] != marker; j++){				


      				markers[j].setTitle('I was here');

					}

					

			//add to table		

			if(state=='n'){	

				ct++;	

				

				$('#live_data').prepend("<tr><td>"+ts+"</td><td style=\"display:none;\">"+lat+"</td><td style=\"display:none;\">"+lng+"</td><td>"+speed+"KM/HR</td><td>"+status+"</td><td>"+loc+"</td></tr>");		

				

				if (ct > 11) {

					//$('#live_data_table').closest('tr').remove();

					 $('#live_data tr:last').remove();

					//ct--;

				}

				
/*
				 geocoder.geocode({

                     "latLng":point

                     }, function (results, status) {         // alert("fgb");               

                         if (status == google.maps.GeocoderStatus.OK) {                         

                             var placeName = results[1].formatted_address;  //alert(placeName);

							 $("#loc"+ct).html(placeName);

									 

				} 			

			   });

*/

			}

			

			lastUpdate =ts;

			lastUpdate=encodeURI(lastUpdate);

		});

		



 	//	setTimeout(autoUpdate(markers,flightPlanCoordinates,i,vid,lastUpdate,lid),180000);

             setTimeout(function(){autoUpdate(markers,flightPlanCoordinates,i,vid,lastUpdate,lid)},15000);



		 

	   }//success

    });//ajax

}//function





/*************************************/







//geoloc
/*
	$('.dev_loc').each(function() {

		//alert("dfv");

		var id=this.id;

		var lat=$("#lat"+id).html();		

		var lan =$("#lng"+id).html();	

		

		

		//location

		var point=new google.maps.LatLng(parseFloat(lat), parseFloat(lan));	//alert(point);

		 geocoder.geocode({

                     "latLng":point

                     }, function (results, status) {         // alert("fgb");               

                         if (status == google.maps.GeocoderStatus.OK) {                         

                             var placeName = results[1].formatted_address;  //alert(placeName);

							 $("#loc"+id).html(placeName);

									 

		   } /* else {

			  alert('Geocoder failed due to: ' + status);

			}*/

	/*	});

	}); */



	});	//doc ready

	



	</script>






	











</body></html>



