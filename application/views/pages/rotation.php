<?php 
$model=$_GET['dev'];
$s="SELECT

gps_model_details.imie_number

FROM

gps_model_details

WHERE gps_model_details.model_id=$model";

$r=mysql_query($s);

$w=mysql_fetch_assoc($r);
$imei=$w['imie_number'];


$time_field='device_time';

$sql_last="SELECT lat,lng,speed,'A' as device_status,device_time as $time_field FROM latest_records WHERE imei='$imei'";
$rs_last=mysql_query($sql_last);
if($rs_last && mysql_num_rows($rs_last)>0){
 	$rw=mysql_fetch_assoc($rs_last);
	
}else{	
	
 $sql_last="SELECT lat,lng,speed,device_status,$time_field FROM orange_master where imei='$imei' and YEAR($time_field)=YEAR(NOW()) ORDER BY $time_field desc LIMIT 1";
$rs_last=mysql_query($sql_last);
$rw=mysql_fetch_assoc($rs_last);
}

$lat=$rw['lat'];
$lng=$rw['lng'];
$speed=$rw['speed'];
$ts=$rw[$time_field];

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
<style>

.icon_num{
font-size: 22px;
margin: 2px 0px 0px 4px;
position: relative;
text-shadow: 1px 1px 0 rgba(0,0,0,0.15);
}
</style>


				    <div class="row-fluid">



				    <div class="span12">

                                 <div class="widget-box">
										<div class="widget-header widget-header-small  header-color-blue2">
											<h5 class="bigger lighter">
												<i class="icon-eye-open"></i>
												Live Track
											</h5>
                                        </div>

											
										<div class="widget-body">
											<div class="widget-main no-padding">

	  <div id="main-map" class="google-maps" style="width:100%;height:400px;"></div>
      

</div>
</div>
</div>

      
	  <div id="myown"style="width:100%;">



	  	<div class="span12">



                               
												
											



									<table id="live_data_table" class="table table-striped table-bordered table-hover">

										<thead>

											<tr><th><i class="icon-time"></i> Date Time</th>
												<th >Speed</th>

												<th>GPS Status</th>

												<th>Location Info</th>
												

											</tr>



										</thead>







										<tbody id="live_data">

                                        



<?php

if(mysql_num_rows($rs_last) > 0){
if($rw['device_status']=='A'){ $status= "<span class='label label-success '> Active</span>"; }else{ $status= "<span class='label label-important '> In Active</span>";}

echo "<tr  class=\"dev_loc\" id=\"d_loc\"><td id=\"d_time\">$ts</td><td id=\"d_speed\">$speed KM/HR</td><td id=\"d_status\">$status</td><td id=\"loc\">na</td>".$ct."</tr>";

            }else{?>	
            <tr><td colspan="6">No signals received.</td></tr>
            <?php } ?>						



										</tbody>



									</table>






									



								</div>







</div>

</div>



  </div><!--/.page-content-->







			



			</div><!--/.main-content-->



		</div><!--/.main-container-->



<?php //include("include/footer.php"); ?>
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




	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/live/jquery_easing.js"></script>
     <script type="text/javascript" src="assets/js/live/markerAnimate.js"></script>

	<script type="text/javascript">

	 var marker, map, ct=0, geocoder ;
      function initialize() {
        var myLatlng = new google.maps.LatLng(<?php echo $lat; ?>, <?php echo $lng; ?>);
        var mapOptions = {
		  zoom: 14,
		  maxZoom: 16,
          center: myLatlng,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        map = new google.maps.Map(document.getElementById('main-map'), mapOptions);
		geocoder = new google.maps.Geocoder();

		
		var image = new google.maps.MarkerImage(
  				'assets/images/marker-images/image.png',
  				new google.maps.Size(20,21),
  				new google.maps.Point(0,0),
  				new google.maps.Point(10,21)
			);


        marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
			icon: image,  	
            title: 'I might be here'
        });
        
      }


      ///////////////////////////////////////////////////

      $(function() {
        initialize();
		live();
		setInterval( live , 10000);
      });  
		
       function live() {       
          	var duration = 10000;
			
			$.ajax({
		
			   type: "GET",
			   url: "otravels_ajax/getlivedata.php?vid=<?php echo $imei; ?>",
			   dataType: 'xml',
			   async:false,
			   success: function(xml) { 
				   $(xml).find("marker").each(function(){ 
				   
					var id = $(this).find('id').text();	lid=id;	//alert(lid);
					var lat = $(this).find('lat').text();
					var lng = $(this).find('lng').text();
					var point = new google.maps.LatLng(parseFloat(lat),parseFloat(lng));//console.log(point);
					
					var ts = $(this).find('ts').text();//alert(ts);
					var speed = $(this).find('speed').text();
					var status = $(this).find('status').text();
					if(status=='A') status="<span class='label label-success '>Active</span>"; else status="<span class='label label-important '>InActive</span>";
					var loc_addr = $(this).find('loc').text();
					var img=$(this).find('img').text();
					/*
					var image = new google.maps.MarkerImage(
		  				img,
		  				new google.maps.Size(46,42),
  						new google.maps.Point(0,0),
  						new google.maps.Point(23,42)
					);	*/
					
					/*
					 var icon = {				        
				        path: "m102,98c4,0 10,0 20,0c1,0 8,0 13,0c7,0 17,0 28,0c7,0 14,0 22,0c9,0 14,0 19,0c5,0 14,0 29,0c8,0 21,0 30,0c18,0 26,0 29,0c5,0 12,0 15,0c2,0 5,0 7,0c1,0 4,0 7,0c2,0 4,0 7,0c1,0 6,0 9,0c4,0 9,0 10,0c5,0 8,0 17,0c2,0 8,0 12,0c7,0 8,0 10,0c2,0 6,0 7,0c2,0 5,0 6,0c3,0 6,0 8,0c2,0 4,0 6,0c1,0 1.69345,-1.4588 3,-2c0.92389,-0.38268 2,0 2,1c0,1 0,3 0,4c0,1 0,2 0,3c0,1 0.4588,1.69344 1,3c1.14804,2.77164 0,4 0,5c0,1 0,2 0,3c0,1 0,2 0,3c0,2 -0.38269,3.07612 0,4c0.5412,1.30656 1,2 1,3c0,1 -0.4588,1.69344 -1,3c-0.38269,0.92387 0,2 0,4c0,1 0,2 0,4c0,2 0,3 0,4c0,2 0,4 0,7c0,3 0,5 0,6c0,2 -1,2 -1,4c0,2 -0.49347,3.87856 -1,7c-0.16019,0.98709 0,3 0,6c0,1 0,3 0,4c0,1 0,2 0,3c0,2 0,4 0,6c0,2 0,3 0,4c0,2 0.22977,3.02675 0,4c-0.51373,2.17625 -1,3 -1,4c0,1 -0.70709,2.29289 0,3c0.70709,0.70711 1,3 1,4c0,1 0,2 0,3c0,1 0,2 0,3c0,1 -1,2 -1,3c0,1 -0.76538,1.84776 0,0c0.5412,-1.30656 0.61731,-2.07613 1,-3c0.5412,-1.30656 1,-3 1,-5c0,-1 0.48627,-1.82375 1,-4c0.22977,-0.97325 1,-1 2,-1c1,0 1,-1 2,-1c1,0 1.69345,-0.4588 3,-1c2.77164,-1.14806 6,0 7,0c3,0 5,0 7,0c2,0 4,0 6,0c3,0 5,0 8,0c1,0 1,1 3,1c1,0 4,0 5,0c4,0 4.58578,0.58578 6,2c1.41422,1.41422 3,0 4,0c1,0 2,0 4,0c2,0 4,0 6,0c1,0 2,0 5,0c1,0 2,0 3,-1c1,-1 1.29291,-1.29289 2,-2c0.70709,-0.70711 4,0 5,0c1,0 0.29291,-1.29289 1,-2c0.70709,-0.70711 1.58578,0.41422 3,-1c1.41422,-1.41422 0.70709,-3.29289 0,-4c-0.70709,-0.70711 -2.41422,-1.58578 -1,-3c0.70709,-0.70711 1.49347,-0.87856 2,-4c0.16019,-0.98709 0,-2 0,-4c0,-3 0,-5 0,-6c0,-2 0,-3 0,-5c0,-1 0,-2 0,-3c0,-1 -0.29291,-2.29289 -1,-3c-0.70709,-0.70711 0,-2 0,-4c0,-2 -1,-3 -1,-4c0,-1 0,-3 0,-4c0,-1 -0.4588,-1.69344 -1,-3c-0.38269,-0.92387 -1.29291,-1.29289 -2,-2c-0.70709,-0.70711 0,-4 0,-5c0,-3 0,-4 0,-5c0,-1 0,-3 0,-4c0,-1 -0.76538,-2.15224 0,-4c1.0824,-2.61313 2,-3 2,-5c0,-1 0,-2 0,-3c0,-1 -0.38269,-2.07612 0,-3c0.5412,-1.30656 1,-2 1,-3c0,-2 0,-3 0,-5c0,-1 0,-2 0,-3c0,-1 0.70709,-2.29289 0,-3c-1.41422,-1.41422 -3.02582,0.32037 -5,0c-3.12143,-0.50654 -4,-1 -7,-1c-1,0 -2,0 -3,0c-3,0 -4,0 -7,0c-1,0 -4,0 -5,0c-2,0 -4,0 -7,0c-2,0 -5,0 -7,0c-3,0 -7,0 -11,0c-1,0 -6,0 -9,0c-2,0 -5,0 -6,0c-1,0 -3,0 -4,0c-1,0 -2,0 -3,0c-1,0 -3,0 -4,0c-1,0 -0.29291,1.29289 -1,2c-0.70709,0.70711 -1,1 -1,2c0,1 0,2 0,3c0,1 0,2 0,3c0,1 0,2 0,3c0,1 0,2 0,3c0,1 0,3 0,4c0,1 0,4 0,5c0,2 0.4588,2.69344 1,4c0.38269,0.92387 0.76538,2.15224 0,4c-0.5412,1.30656 -0.29291,4.29289 -1,5c-1.41422,1.41422 -2.4588,0.69344 -3,2c-0.76538,1.84776 0.22977,3.02675 0,4c-0.51373,2.17625 -0.31073,5.08025 -1,8c-0.51373,2.17625 -1,3 -1,4c0,2 0,3 0,4c0,1 0,2 0,5c0,1 0,4 0,7c0,2 0,3 0,4c0,1 0,2 0,4c0,1 0,2 0,3c0,3 0,4 0,5c0,1 0,2 0,3c0,1 0,2 0,4c0,1 0,2 0,3c0,1 0,2 0,3c0,1 1,1 1,2c0,1 0,2 0,3c0,1 0,2 -3,2c-4,0 -6,0 -10,0c-3,0 -4,0 -5,0c-3,0 -6,0 -10,0c-4,0 -5,0 -8,0c-1,0 -4,0 -8,0c-3,0 -4,0 -5,0c-1,0 -4,0 -8,0c-2,0 -7,0 -9,0c-2,0 -6,0 -9,0c-5,0 -6,0 -13,0c-1,0 -6,0 -7,0c-6,0 -7.87857,-0.49345 -11,-1c-4.93542,-0.80092 -12,0 -16,0c-2,0 -5,0 -8,0c-1,0 -4,0 -5,0c-5,0 -9,0 -14,0c-2,0 -4,0 -7,0c-3,0 -5,0 -9,0c-1,0 -7.94672,-0.49873 -15,-1c-2.99245,-0.21266 -12,0 -19,0c-5,0 -8,0 -9,0c-2,0 -4,0 -9,0c-6,0 -11,0 -16,0c-7,0 -10,0 -17,0c-4,0 -9,0 -12,0c-3,0 -6,0 -9,0c-3,0 -6,0 -7,0c-4,0 -8,0 -10,0c-4,0 -7.07612,0.38269 -8,0c-1.30656,-0.5412 -2,-2 -3,-2c-1,0 -2,0 -3,0c-2,0 -3,0 -4,0c-1,0 -3,0 -4,0c-2,0 -4.29289,0.70711 -5,0c-0.70711,-0.70711 0,-2 0,-4c0,-2 -1.82443,-1.09789 -3,-3c-0.52573,-0.85065 0,-2 0,-3c0,-1 0,-2 0,-4c0,-2 0,-5 0,-7c0,-1 0,-4 0,-6c0,-3 0.77025,-5.02675 1,-6c0.51374,-2.17625 1,-4 1,-5c0,-1 0,-3 0,-5c0,-2 -0.4595,-4.0535 0,-6c0.51374,-2.17625 1,-4 1,-6c0,-3 0,-5 0,-7c0,-1 0,-4 0,-7c0,-2 0,-4 0,-9c0,-3 0,-4 0,-7c0,-3 -0.30745,-5.186 1,-7c0.8269,-1.14727 2,-2 2,-5c0,-2 0,-4 0,-5c0,-1 0,-3 0,-4l1,-3l0,-1",
				        fillColor: '#FFFF00',
				        fillOpacity: .96,
				        anchor: new google.maps.Point(197, 47),
				        strokeWeight: 1,
				        scale: .1,
				        rotation: 90,
				        strokeColor:"#000000"
				    };
*/
   
   
   
					 marker.setIcon(icon);
					 marker.animateTo(point, {easing: 'linear', duration: duration});
					 
					 if(!map.getBounds().contains(point))
					 map.panTo(point);
					 	
					// $('#live_data').html("<tr><td>"+ts+"</td><td>"+speed+"KM/HR</td><td>"+status+"</td><td id=\"loc\">"+loc_addr+"</td></tr>");
					 
					 $("#d_time").html(ts);
					 $("#d_speed").html(speed+"KM/HR");
					 $("#d_status").html(status);
					 
					
					 
					 geocoder.geocode({
                     "latLng":point
                     }, function (results, status) {         // alert("fgb"); 
                         if (status == google.maps.GeocoderStatus.OK) {  
                             var placeName = results[1].formatted_address;  //alert(placeName);
							 $("#loc").html(placeName);
						} 
				    });		
	
		 
				 });
			}
			});	
		  
        }
		   	


function GetVehIcon(Angle)
{
    var icon = "assets/images/icons-school/0.png";
    //alert(Angle);            
    if (Angle > 350 || Angle < 10)
        icon = "assets/images/icons-school/vehicle0.png";
    if (Angle >= 10 && Angle <= 35)
        icon = "assets/images/icons-school/vehicle30.png";
    if (Angle > 35 && Angle < 55)
        icon = "assets/images/icons-school/vehicle45.png";
    if (Angle >= 55 && Angle <= 80)
        icon = "assets/images/icons-school/vehicle45_90.png";
    if (Angle > 80 && Angle < 100)
        icon = "assets/images/icons-school/vehicle90.png";
    if (Angle >= 100 && Angle <= 125)
        icon = "assets/images/icons-school/vehicle90_135.png";
    if (Angle > 125 && Angle < 145)
        icon = "assets/images/icons-school/vehicle135.png";
    if (Angle >= 145 && Angle <= 170)
        icon = "assets/images/icons-school/vehicle135_180.png";
    if (Angle > 170 && Angle < 190)
        icon = "assets/images/icons-school/vehicle180.png";
    if (Angle >= 190 && Angle <= 215)
        icon = "assets/images/icons-school/vehicle180_225.png";
    if (Angle > 215 && Angle < 235)
        icon = "assets/images/icons-school/vehicle225.png";
    if (Angle >= 235 && Angle <= 260)
        icon = "assets/images/icons-school/vehicle225_270.png";
    if (Angle > 260 && Angle < 280)
        icon = "assets/images/icons-school/vehicle270.png";
    if (Angle >= 280 && Angle <= 305)
        icon = "assets/images/icons-school/vehicle270_315.png";
    if (Angle > 305 && Angle < 325)
        icon = "assets/images/icons-school/vehicle315.png";
    if (Angle >= 325 && Angle <= 350)
        icon = "assets/images/icons-school/vehicle315_350.png";
                        
    return icon;
}


	</script>






	











</body></html>



