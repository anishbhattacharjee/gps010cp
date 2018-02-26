<?php

//$start=date('Y-m-d 00:00:00');
//$end=date("Y-m-d H:i:s");
$dist=0;
$dist_tot=0;
$speed=0;
$speed_tot=0;
$dev_speed=0;
$devices=array();
//$colors=array("#68BC31","#2091CF","#AF4E96","#DA5430","#FEE074");



function distance($lat1, $lon1, $lat2, $lon2, $unit) {



  $theta = $lon1 - $lon2;

  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));

  $dist = acos($dist);

  $dist = rad2deg($dist);

  $miles = $dist * 60 * 1.1515;

  $unit = strtoupper($unit);



  if ($unit == "K") {

    return ($miles * 1.609344);

  } else if ($unit == "N") {

      return ($miles * 0.8684);

    } else {

        return $miles;

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



						<li class="active">Gps</li>



					</ul><!--.breadcrumb-->





				</div>







				<div class="page-content">



				    <div class="row-fluid">



				    <div class="span12">

	  <div id="googleMap" class="google-maps" style="width:100%;height:380px;"></div>

 
	  <div id="myown"style="width:100%;height:250px;">



	  	<div class="span12">



		<!--		<table id="sample-table-1" class="table table-striped table-bordered table-hover">



										<thead>



											<tr>
												<th class="center">Sl.No</th>
												<th>Device Name</th>												
												<th>Imei No.</th>
												<th>Date Time</th>												
												<th>Speed</th>												
												<th>Location Info</th>
                                                <th style="display:none;"></th>
                                                
											</tr>



										</thead>







										<tbody>

                         <tr>
                         	<td>1</td>
                         	<td>testdevice</td>
                         	<td>2342343245</td>
                         	<td>15-02-2015 08:28:12</td>
                         	<td>0KM/HR</td>
                         	<td>vijaynagar,bangalore</td>
                         </tr>

										</tbody>



									</table>-->



								</div>







</div>



</div>





  </div><!--/.page-content-->







			



			</div><!--/.main-content-->



		</div><!--/.main-container-->





		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">

			<i class="icon-double-angle-up icon-only bigger-110"></i>

		</a>



		<!--basic scripts-->



		<!--[if !IE]>-->



		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>



		<!--<![endif]-->



		<!--[if IE]>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

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

		<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>



		<!--page specific plugin scripts-->



		<!--[if lte IE 8]>

		  <script src="assets/js/excanvas.min.js"></script>

		<![endif]-->



		<script type="text/javascript" src="assets/js/jquery-ui-1.10.3.custom.min.js"></script>

		<script type="text/javascript" src="assets/js/jquery.ui.touch-punch.min.js"></script>

		<script type="text/javascript" src="assets/js/jquery.hotkeys.min.js"></script>

		<script type="text/javascript" src="assets/js/ace-elements.min.js"></script>

		<script type="text/javascript" src="assets/js/ace.min.js"></script>




<script src="http://maps.googleapis.com/maps/api/js?key=	AIzaSyCNMfm4IoavTQbIjDH42fNQF31v4BkT8e0&sensor=false&v=3.exp"></script>
<!--<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>-->
<script>
function initialize() {
  var myLatlng = new google.maps.LatLng(12.977008,77.725893);
  var myLatlng1 = new google.maps.LatLng(12.295810,76.639381);
  var myLatlng2 = new google.maps.LatLng(12.941607,77.557853);
  var myLatlng3 = new google.maps.LatLng(11.127123,78.656894);
  var myLatlng4 = new google.maps.LatLng(15.912900,79.739987);
  var myLatlng5 = new google.maps.LatLng(13.082680,80.270718);
  var mapOptions = {
    zoom: 4,
    center: myLatlng
  };

  var map = new google.maps.Map(document.getElementById('googleMap'), mapOptions);

  var contentString = "<p><a href='http://ogtslive.com/customer/track.php?page=dieselindividual&id=451'>ON</a></p>";
  var contentStringplain = "<p>OFF</p>";
  var infowindowgreen = new google.maps.InfoWindow({
      content: contentString
  });
   var infowindow1 = new google.maps.InfoWindow({
      content: contentString
  });
   var infowindow3 = new google.maps.InfoWindow({
      content: contentString
  });
  
   var infowindow = new google.maps.InfoWindow({
      content: contentStringplain
  });
var image = 'assets/images/marker-images/car/green.png';
  var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      icon: image,
      title: 'vijaynagar'
  });
  var image = 'assets/images/marker-images/car/green.png';
  var marker1 = new google.maps.Marker({
      position: myLatlng1,
      map: map,
         icon: image,
      title: 'HAL'
  });
    var image = 'assets/images/marker-images/car/red.png';
    var marker2 = new google.maps.Marker({
      position: myLatlng2,
      map: map,
         icon: image,
      title: 'Banashankari'
  });
   var image = 'assets/images/marker-images/car/green.png';
    var marker3 = new google.maps.Marker({
      position: myLatlng3,
      map: map,
           icon: image,
      title: 'Tamilnad'
  });
   var image = 'assets/images/marker-images/car/red.png';
    var marker4 = new google.maps.Marker({
      position: myLatlng4,
      map: map,
           icon: image,
      title: 'Andhrapradesh'
  });
   var image = 'assets/images/marker-images/car/red.png';
    var marker5 = new google.maps.Marker({
      position: myLatlng5,
      map: map,
           icon: image,
      title: 'Chennai'
  });
  google.maps.event.addListener(marker, 'click', function() {
    infowindowgreen.open(map,marker);
     infowindow.close();
    infowindow1.close();
    infowindow3.close();
  });
    google.maps.event.addListener(marker1, 'click', function() {
    infowindow1.open(map,marker1);
    infowindow.close();
    infowindowgreen.close();
    infowindow3.close();
   
  });
   google.maps.event.addListener(marker2, 'click', function() {
    infowindow.open(map,marker2);
    //infowindow.close();
    infowindow1.close();
    infowindow3.close();
    infowindowgreen.close();
  });
   google.maps.event.addListener(marker3, 'click', function() {
    infowindow3.open(map,marker3);
       infowindow1.close();
    infowindow.close();
    infowindowgreen.close();
  });
   google.maps.event.addListener(marker4, 'click', function() {
    infowindow.open(map,marker4);
       infowindow1.close();
    infowindow3.close();
    infowindowgreen.close();
  });
   google.maps.event.addListener(marker5, 'click', function() {
    infowindow.open(map,marker5);
       infowindow1.close();
    infowindow3.close();
    infowindowgreen.close();
  });
}

google.maps.event.addDomListener(window, 'load', initialize);
    </script>








</body></html>



