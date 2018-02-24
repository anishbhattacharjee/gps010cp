<?php // $sql="select * from geo_fence where customer_id=".$_GET['id']." and device_id=".$_GET['dev']." and fence_status='active'";



$sql="select * from geo_fence limit 1";



$rs=mysql_query($sql);

$rw=mysql_fetch_assoc($rs);

$latlng=ltrim($rw['points'],"(");

$latlng=rtrim($latlng,")");

$latlng=explode(")(",$latlng);

?>





	<link rel="stylesheet" type="text/css" href="geofence/style.css"/>



	



	



<!--	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

-->     <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=geometry&sensor=false"></script>



		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>





	



 <script>





function initialize() {



  var mapOptions = {

    center: new google.maps.LatLng(12.886436490787712, 77.2685546875),

    zoom: 10,

    mapTypeId: google.maps.MapTypeId.ROADMAP

  };



  var map = new google.maps.Map(document.getElementById('main-map'),

      mapOptions);

	  

	  var polyCoords = [

	  <?php foreach($latlng as $key => $val){ ?>

		new google.maps.LatLng(<?php echo $val; ?>),

		

	<?php } ?>  ];

	

	  var polyFence = new google.maps.Polygon({

		paths: polyCoords

	  });

	polyFence.setMap(map);



	

	$("#startChk").click(function(e) {

        autoCheck(map,polyFence);

    });



}

/*******/

autoCheck = function(map,polyFence) {



	$.ajax({

       type: "GET",

       url: "ajax/lastdata.php",

       dataType: 'xml',

       success: function(xml) { 

		   $(xml).find("marker").each(function(){ 		   	

			var lat = $(this).find('lat').text();

			var lng = $(this).find('lng').text();

			var point = new google.maps.LatLng(parseFloat(lat),parseFloat(lng));				

			

			pointInPoly(point,map,polyFence); 			

			

			});



 			setTimeout(autoCheck(map,polyFence),10000);



		 

	   }//success

    });//ajax

}//function

/***/

 function pointInPoly(latLng,map,polyFence){

    var result;

    if (google.maps.geometry.poly.containsLocation(latLng, polyFence)) {

      result = 'green';

    } else {

      result = 'red';

	  var request =$.ajax({

       type: "GET",

       url: "ajax/send_sms.php",

	   dataType: "html"

	  });

	  request.done(function( msg ) {

  		alert( msg );

		});

    }

	



    var circle = {

      path: google.maps.SymbolPath.CIRCLE,

      fillColor: result,

      fillOpacity: .2,

      strokeColor: 'white',

      strokeWeight: .5,

      scale: 10

    };



    new google.maps.Marker({

      position: latLng,

      map: map,

      icon: circle

    })

/**/ 

}

/**/





/*****/

google.maps.event.addDomListener(window, 'load', initialize);



    </script>

	







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

	  <div id="myown"style="width:100%;height:250px;">

	  	<div class="span12">

            <div id="device" style="position: absolute;top: 500px;width: 325px;"></div>

            <button class="btn btn-small btn-success"  id="startChk"  value="Start Checking Geofence Violation" type="button" style="margin-top: 13px;">

            		<i class="icon-ok"></i>Start Checking Geofence Violation

			</button>





            <div   id="dataPanel" style="border:none;"></div>

		</div>







</div>



</div>



  </div><!--/.page-content-->







			



			</div><!--/.main-content-->



		</div><!--/.main-container-->







		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">



			<i class="icon-double-angle-up icon-only bigger-110"></i>



		</a>







	











</body></html>



