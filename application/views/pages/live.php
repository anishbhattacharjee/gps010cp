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

/*
$make='na';
$a="select make from device_make where imei='$imei'";
$b=mysql_query($a);
if($b && mysql_num_rows($b) > 0){		
	$c=mysql_fetch_assoc($b);
	$make=$c['make'];
}
if($make=='noran' || $make=='meitrack'){
	$time_field='device_time';
}else{
	$time_field='time_stamps';
}
*/
$time_field='device_time';

$sql_last="SELECT lat,lng,speed,'A' as device_status,device_time as $time_field FROM latest_records WHERE imei='$imei'";
$rs_last=mysql_query($sql_last);
if($rs_last && mysql_num_rows($rs_last)>0){
 	$rw=mysql_fetch_assoc($rs_last);
	
}else{	
	
 $sql_last="SELECT lat,lng,speed,device_status,$time_field FROM gps_master where imei='$imei' and YEAR($time_field)=YEAR(NOW()) ORDER BY $time_field desc LIMIT 1";
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
												<?php if($id==280){ 
												$qdg=mysql_query("SELECT `count` FROM counter");
												$rdhw=mysql_fetch_array($qdg);
												$counter=$rdhw['count'];
												$ct='<td><div class="infobox infobox-green infobox-small infobox-dark">
										<div class="infobox-icon icon_num" id="counter_val">'.$counter.'</div>
										<div class="infobox-data">
											<div class="infobox-content">People</div>
											<div class="infobox-content">Inside</div>
										</div>
									</div></td>';
												?>
												<th>Count</th>
												<?php }else{$ct="";} ?>

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
			   url: "ajax/getlivedata.php?vid=<?php echo $imei; ?>",
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
					
					var image = new google.maps.MarkerImage(
		  				img,
		  				new google.maps.Size(46,42),
  						new google.maps.Point(0,0),
  						new google.maps.Point(23,42)
					);	
					 marker.setIcon(image);
					 marker.animateTo(point, {easing: 'linear', duration: duration});
					 
					 if(!map.getBounds().contains(point))
					 map.panTo(point);
					 	
					// $('#live_data').html("<tr><td>"+ts+"</td><td>"+speed+"KM/HR</td><td>"+status+"</td><td id=\"loc\">"+loc_addr+"</td></tr>");
					 
					 $("#d_time").html(ts);
					 $("#d_speed").html(speed+"KM/HR");
					 $("#d_status").html(status);
					 
					 <?php if($id==280){ ?>
					 var counter = $(this).find('counter').text();
					 $("#counter_val").html(counter);
					 <?php } ?>
					 
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
		   	



	</script>






	











</body></html>



