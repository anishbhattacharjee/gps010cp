<?php



if(isset($_POST['devcontrol']))	{
	$_SESSION['oildevcontrol']=$_POST['devcontrol'];
}									
$sql="SELECT
installation.device_name,
installation.imie_no
FROM
installation
INNER JOIN gps_categories ON installation.category_id = gps_categories.category_id
WHERE customer_id=$id AND installation_status='completed' and gps_categories.category_id!=4 and fuel_sensor='yes'";

if($rs=mysql_query($sql)){

while($rw=mysql_fetch_assoc($rs)){
	$devices[]=$rw;
	}
}
	if(!(isset($_SESSION['oildevcontrol']))){
		$_SESSION['oildevcontrol']=$devices[0]['imie_no'];
	}
	
	$vid=$_SESSION['oildevcontrol'];
$tq=mysql_query("SELECT tank_capacity  FROM `installation` where imie_no='$vid'");
$tr=mysql_fetch_array($tq);
$tank_capacity=$tr['tank_capacity'];
$multi_factor=$tank_capacity/100;
//echo "MULTIPLICATION $multi_factor";

$sqcursignal="select avg(oil) as oil from (select oil from gps_master where imei='".$_SESSION['oildevcontrol']."' and oil<=100 and oil>0 and msg='acc on' order by device_time desc limit 10) a";
//echo $sqcursignal;
if($rscur=mysql_query($sqcursignal)){
	$rw_last=mysql_fetch_assoc($rscur);
	$oil=$rw_last['oil'];
	if($oil >0){
		$oil=(($oil-1)/5)*100;
		$oil=$oil*$multi_factor;   
	}else{
		$oil=0;
	}
	 
	
	
	if($oil > 35){
		$stat_color="#59A84B";
		$s_c="green";
	}else if($oil < 25){
		$stat_color="#CA5952";
		$s_c="red";
	}else{
		$stat_color="#F89406";
		$s_c="orange2  ";
	}
}

$sqlcurrdev="SELECT
installation.instatllation_id,
installation.customer_id,
installation.category_id,
installation.device_id,
installation.model_id,
installation.device_name,
installation.imie_no,
gps_categories.category_type,
gps_devices.device_type,
installation.image,
installation.tank_capacity
FROM
installation
INNER JOIN gps_model_details ON installation.model_id = gps_model_details.model_id
INNER JOIN gps_categories ON installation.category_id = gps_categories.category_id
INNER JOIN gps_devices ON gps_devices.device_id = installation.device_id
WHERE imie_no=".$_SESSION['oildevcontrol'];
$rscurd=mysql_query($sqlcurrdev);
if($rscurd && mysql_num_rows($rscurd)>0){
	$rw_curr=mysql_fetch_assoc($rscurd);
}

$curr_fuel_l=$oil;
$tank_capacity=$rw_curr['tank_capacity'];
/*
$curr_fuel_l=0;

if($rw_curr['tank_capacity']!=0){
	$curr_fuel_l=($rw_curr['tank_capacity']*$oil)/100;
}*/

//$maxcap=65;
//if($_SESSION['oildevcontrol']=='013777002510756'){
	$maxcap=$tank_capacity;
//}
//map

$sql_last="SELECT lat,lng FROM latest_records where imei='".$_SESSION['oildevcontrol']."'";
$rs_last=mysql_query($sql_last);
$rw=mysql_fetch_assoc($rs_last);

$lat=$rw['lat'];
$lng=$rw['lng'];



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
				
				
				
<link rel="stylesheet" href="assets/css/daterangepicker.css" />	
<!--<link rel="stylesheet" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css">-->			
<style type="text/css">
/*body { font-family: Verdana, Arial, sans-serif; font-size: 12px; }
h1 { width: 450px; margin: 0 auto; font-size: 12px; text-align: center; }
#placeholder { width: 48%; height: 250px; position: relative; margin: 0 auto;float:left; }*/
.legend table, .legend > div { height: 82px !important; opacity: 1 !important; right: -55px; top: 10px; width: 116px !important; }
.legend table { border: 1px solid #555; padding: 5px; }
#flot-tooltip { font-size: 12px; font-family: Verdana, Arial, sans-serif; position: absolute; display: none; border: 2px solid; padding: 2px; background-color: #FFF; opacity: 0.8; -moz-border-radius: 5px; -webkit-border-radius: 5px; -khtml-border-radius: 5px; border-radius: 5px; }


#content {
	width: 880px;
	margin: 0 auto;
	padding: 10px;
}

.demo-container {
	box-sizing: border-box;
	width: 100px;
	height: 222px;
	/*padding: 20px 15px 15px 15px;
	*margin: 10px;
	*border: 1px solid #ddd;
	background: #fff;
	background: linear-gradient(#f6f6f6 0, #fff 50px);
	background: -o-linear-gradient(#f6f6f6 0, #fff 50px);
	background: -ms-linear-gradient(#f6f6f6 0, #fff 50px);
	background: -moz-linear-gradient(#f6f6f6 0, #fff 50px);
	background: -webkit-linear-gradient(#f6f6f6 0, #fff 50px);
	box-shadow: 0 3px 10px rgba(0,0,0,0.15);
	-o-box-shadow: 0 3px 10px rgba(0,0,0,0.1);
	-ms-box-shadow: 0 3px 10px rgba(0,0,0,0.1);
	-moz-box-shadow: 0 3px 10px rgba(0,0,0,0.1);
	-webkit-box-shadow: 0 3px 10px rgba(0,0,0,0.1);*/
}

.demo-placeholder {
	width: 100%;
	height: 100%;
	font-size: 14px;
	line-height: 1.2em;
}
.infobox-green. {
background-color: #40AE7B;

}
.infobox-small>.infobox-data{
		max-width: 127px;
	}
	.infobox-small{
		width:188px;
	}
/*	
.infobox-grey1>.infobox-icon>[class*="icon-"] {
background-color: #1D3DA5;
}*/



</style>


				    <div class="row-fluid">
					<?php if($rw_curr['tank_capacity']==0 || $rw_curr['tank_capacity']==''){ ?>
					 <div class="span12">
					<div class="alert alert-block alert-danger">
										<button type="button" class="close" data-dismiss="alert">
											<i class="icon-remove"></i>
										</button>

										<p>
											<strong>Warning!</strong>
											You have not added vehicle fuel tank capacity.
										</p>

										<p>
										<a href="track.php?page=device&id=<?php echo $id; ?>&idn=<?php echo $rw_curr['instatllation_id']; ?>">Add tank capacity</a>
										</p>
									</div>
								
									</div>
					<?php } ?>
					
					
					<div class="alert alert-block alert-info" style="background-color:#F0F0F0;">
								

								<i class="icon-calendar blue"></i>
								&nbsp;
								<strong class="blue">
									Fuel Dashboard								
								</strong> &nbsp;&nbsp;&nbsp;&nbsp;
								<?php echo strtoupper(date("M d, Y"));?>
							</div>
							
							
				    <div class="span12" style="margin-left: 0;min-height: 330px;">


<div class="span3">
	<div class="widget-box">
		<div class="widget-header widget-header-flat widget-header-small">
			<div class="widget-toolbar no-border">
											
											
<form method="post" id="devcontrolform">                                               
<select id="dev_select1" class="chzn-select" name="devcontrol" style=" margin-top:0px;">
													
<?php
foreach($devices as $k=>$v){
	$devicen= $v['device_name'];
	$model_idn=$v['imie_no'];
?>
<option value="<?php echo $model_idn; ?>" <?php if($model_idn==$_SESSION['oildevcontrol']){ ?>selected="selected"<?php } ?>><?php echo $devicen; ?></option>
<?php	} ?>														
</select>
</form> 											</div>
										</div>

										<div class="widget-body">
											<div class="widget-main">
												
                                                
                                                <div class="span12" id="dev_img">
                                                <a href="track.php?page=device&id=<?php echo $id; ?>&idn=<?php echo $rw_curr['instatllation_id']; ?>">
												<img id="avatar" data-id="<?php echo $rw_curr['instatllation_id']; ?>"  src="../gps/modeluploads/<?php echo $rw_curr['image']; ?>" />
                                                </a>
                                                
                                                </div>

												<div class="clearfix">
													
												</div>
											</div><!--/widget-main-->
										</div><!--/widget-body-->
									</div><!--/widget-box-->
									
									
									
									
									<div class="infobox " id="statcol" style="padding-left: 37px;border: none !important;">
										<div class="infobox-icon">
											<i class="icon-spinner icon-2x"></i>
										</div>

										<div class="infobox-data">
											<span class="infobox-data-number"><div id="curstat"></div></span>
											<div class="infobox-content"></div>
										</div>
			</div>
</div>
<div class="span3">
	<div class="span5 demo-container">
			<div id="placeholder" class="demo-placeholder"></div>	
						
			<div class="infobox infobox-green" style="padding-left: 37px;border: none !important;">
										<div class="infobox-icon">
											<i class="icon-beaker"></i>
										</div>

										<div class="infobox-data">
											<span class="infobox-data-number"><?php echo floor($curr_fuel_l); ?></span>
											<div class="infobox-content">Liters (approximately)</div>
										</div>
			</div>
	</div>
	<div class="span6 " style="margin-top:6px;display: none;">
		<div class="span12">
										<div class="center">
											
                                            <div class="infobox infobox-green infobox-small ">
												<div class="infobox-icon">
                                                    <i class="icon-level-down" style="background-color: #8DAF26;"></i>
                                                </div>
        
                                                <div class="infobox-data">
                                                    <div class="infobox-content">Total Consumption</div>
                                                    <div class="infobox-content" id="totcons"> L </div>
                                                </div>
											</div>
                                            <!-- <div class="infobox infobox-blue infobox-small ">
												<div class="infobox-icon">
                                                    <i class="icon-level-up " style="background-color: #3CA7EE;"></i>
                                                </div>
        
                                                <div class="infobox-data">
                                                    <div class="infobox-content">Last filled </div>
                                                    <div class="infobox-content" id="rlast"> L </div>
                                                </div>
											</div>-->
											
											<!--<div class="infobox infobox-pink infobox-small ">
												<div class="infobox-icon">
                                                    <i class="icon-beaker " style="background-color: #d53f40;"></i>
                                                </div>
        
                                                <div class="infobox-data">
                                                    <div class="infobox-content">Mileage</div>
                                                    <div class="infobox-content" id="mileage">  </div>
                                                </div>
											</div>
											-->
											<div class="infobox infobox-grey infobox-small ">
												<div class="infobox-icon">
                                                    <i class="icon-car" style="background-color: #1796C4;"></i>
                                                </div>
        
                                                <div class="infobox-data">
                                                    <div class="infobox-content">Total Distance</div>
                                                    <div class="infobox-content" id="Distance"> km </div>
                                                </div>
											</div>
											<div class="infobox infobox-grey infobox-small ">
												<div class="infobox-icon">
                                                    <i class="icon-tint" style="background-color: #E6A118;"></i>
                                                </div>
        
                                                <div class="infobox-data">
                                                    <div class="infobox-content">Fuel Theft</div>
                                                    <div class="infobox-content" id="fTheft">  </div>
                                                </div>
											</div>

														
										</div>

									

									
										

										
									</div>
</div>



		
			
		


</div>
<div class="span4" style="margin-left:0px;">                     		
    <div class="span12" >             
		<div class="row-fluid">								
			<div id="main-map" class="google-maps" style="width:100%;height:250px;"></div>	
			
					<span ><div id="loc" style="  background-color: #3a87ad!important;
  font-size: 13px;
  padding: 3px 8px 5px;
  color: #fff;"></div></span>
			
					
		</div>
    </div>
</div>

<div class="span2">
 											<div class="infobox infobox-grey infobox-small ">
												<div class="infobox-icon">
                                                    <i class="icon-dashboard" style="background-color: #1D3DA5;"></i>
                                                </div>
        
                                                <div class="infobox-data">
                                                    <div class="infobox-content">Average Speed</div>
                                                    <div class="infobox-content" id="curspeed"> kmph </div>
                                                </div>
											</div>
                                             <div class="infobox infobox-grey infobox-small " style="display: none;">
												<div class="infobox-icon">
                                                    <i class="icon-sort-by-attributes-alt" style="background-color: #077E79;"></i>
                                                </div>
        
                                                <div class="infobox-data">
                                                    <div class="infobox-content">Avg Speed </div>
                                                    <div class="infobox-content" id="avgspeed"> kmph </div>
                                                </div>
											</div>
											<div class="infobox infobox-grey infobox-small ">
												<div class="infobox-icon" >
                                                    <i class="icon-sort-by-attributes" style="background-color: #E6A118;"></i>
                                                </div>
        
                                                <div class="infobox-data">
                                                    <div class="infobox-content">Max Speed</div>
                                                    <div class="infobox-content" id="maxspeed"> kmph </div>
                                                </div>
											</div>
											
											<div class="infobox infobox-grey infobox-small ">
												<div class="infobox-icon">
                                                    <i class="icon-warning-sign" style="background-color: #1796C4;"></i>
                                                </div>
        
                                                <div class="infobox-data">
                                                    <div class="infobox-content">Speed Violation</div>
                                                    <div class="infobox-content" id="SpV">  </div>
                                                </div>
											</div>
											
								 </div> 

 
</div><!--/span12-->


    

  	

<div class="hr hr-18 dotted hr-double"></div>
  <div class="oil_report" style="text-align:center;">
  <form class="form-inline" id="oilrpt">
 													
														
												
													
														
														
															<label for="id-date-range-picker-1">From - To</label>

															<input type="text"id="id-date-range-picker-1" name="daterange" value="<?php echo date('d/m/Y',strtotime("-1 days"))." - ".date("d/m/Y");?>">
															<input type="hidden" name="imei" id="imei" value="<?php echo $_SESSION['oildevcontrol'];?>">
															<button onclick="genoilrpt();return false;" class="btn btn-small">
																Generate Report
																<i class="icon-arrow-right icon-on-right bigger-110"></i>
															</button>
													 <i class="icon-spinner icon-spin orange bigger-125" id="load_spin" style="display:none;"></i>                                
														
</form>

<div id="result"  align="center"></div>
  </div>


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



		<!--[if lte IE 8]>

		  <script src="assets/js/excanvas.min.js"></script>

		<![endif]-->



		<script src="assets/js/jquery-ui-1.10.3.custom.min.js"></script>

		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>

		<script src="assets/js/jquery.gritter.min.js"></script>

		<script src="assets/js/bootbox.min.js"></script>

		<script src="assets/js/jquery.hotkeys.min.js"></script>

		<script src="assets/js/ace-elements.min.js"></script>

		<script src="assets/js/ace.min.js"></script>
		<script src="assets/js/chosen.jquery.min.js"></script>
		<script src="assets/js/date-time/bootstrap-timepicker.min.js"></script>
		<script src="assets/js/date-time/bootstrap-datepicker.min.js"></script>
		<script src="assets/js/jquery.easy-pie-chart.min.js"></script>
		<script src="assets/js/jquery.dataTables.min.js"></script>
		<script src="assets/js/jquery.dataTables.bootstrap.js"></script>
		<script type="text/javascript" charset="utf-8" src="media/js/ZeroClipboard.js"></script>
		<script src="media/js/TableTools.js"></script>		
		<script src="assets/js/date-time/moment.min.js"></script>
		<script src="assets/js/date-time/daterangepicker.min.js"></script>		

<script type="text/javascript" src="../canvasjs.min.js"></script>



<script src="http://maps.googleapis.com/maps/api/js?key=	AIzaSyCNMfm4IoavTQbIjDH42fNQF31v4BkT8e0&sensor=false"></script>

<script>
var marker, map, ct=0, geocoder ;
      function initialize() {
        var myLatlng = new google.maps.LatLng(<?php echo $lat; ?>, <?php echo $lng; ?>);
        var mapOptions = {
		  zoom: 17,
		  maxZoom: 20,
          center: myLatlng,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        map = new google.maps.Map(document.getElementById('main-map'), mapOptions);
		geocoder = new google.maps.Geocoder();

		/*
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
		
		*/
					geocoder.geocode({
                     "latLng":myLatlng
                     }, function (results, status) {         // alert("fgb"); 
                         if (status == google.maps.GeocoderStatus.OK) {  
                             var placeName = results[1].formatted_address;  //alert(placeName);
							 $("#loc").html(placeName);
						} 
				    });	
        
      }
	  
	$.getJSON("ajax/map_data_db.php", function(data){
			if(data.Devices!='NDI'){	
		    $.each(data.Devices, function (index, value) {
		        //console.log(value);				
				if(value.Location!='NSD'){
				
					var lat=value.Location.Latitude;if(lat=='' || lat==null){lat=12.97385;}		
					var lan =value.Location.Longitude;if(lan=='' || lan==null){lan=77.60374;}
					var img=value.Location.CMarker;	
					
					var point=new google.maps.LatLng(parseFloat(lat), parseFloat(lan));
					
					var custom_marker = new google.maps.MarkerImage(
		  				img,
		  				new google.maps.Size(46,42),
		  				new google.maps.Point(0,0),
		  				new google.maps.Point(23,42)
					);
					
					marker = new google.maps.Marker({
		 				flat: true,
		  				icon: custom_marker,
		  				map: map,
		  				optimized: false,
		  				position: point,		  				
		  				visible: true 
					});
					//map.panTo(point);
					/**/
					//markers.push(marker);
					var curr_status=value.Location.CStatus;	$("#curstat").html(curr_status);
					var curspeed=value.Location.Speed;	$("#curspeed").prepend(curspeed);
					//var avgspeed=value.Location.avgSpeed;	$("#avgspeed").prepend(avgspeed);
					//var Distance=value.Location.Distance;	$("#Distance").prepend(Distance);
					var maxspeed=value.Location.maxSpeed;	$("#maxspeed").prepend(maxspeed);
					//var totcons=value.Location.Consumption;	$("#totcons").prepend(totcons);
					//var rlast=value.Location.RefuelLast;	$("#rlast").prepend(rlast);
					//var mileage=value.Location.Mileage;	$("#mileage").prepend(mileage);
					var Color=value.Location.Color;	$("#statcol").addClass(" infobox-"+Color);
					var SpV=value.Location.SpV;	$("#SpV").html(SpV);
					var fTheft=value.Location.fTheftCount;	$("#fTheft").html(fTheft);
					//var talert=value.Location.TAlert;	$("#talert").prepend(talert);
					
					
				}else{
					//no signals
				}			
		    });
			}else{
				//no installation
			}
		
		});
		
      ///////////////////////////////////////////////////

     
$(function(){
 initialize();
//$("#sidebar-collapse").click();
$('.easy-pie-chart.percentage').each(function(){
				var barColor = $(this).data('color') || '#555';
				var trackColor = '#E2E2E2';
				var size = parseInt($(this).data('size')) || 112;
				$(this).easyPieChart({
					barColor: barColor,
					trackColor: trackColor,
					scaleColor: false,
					lineCap: 'butt',
					lineWidth: parseInt(size/10),
					animate:false,
					size: size
				}).css('color', barColor);
				});





	$('.date-picker').datepicker().next().on(ace.click_event, function(){
					$(this).prev().focus();
				}).on(ace.changeDate, function(e){
				 
       //alert("kshfuk");
    });

	$('.timepicker1').timepicker({
					minuteStep: 1,
					showSeconds: true,
					showMeridian: false
	});
	$('#id-date-range-picker-1').daterangepicker({
		format: 'DD/MM/YYYY',
	}).prev().on(ace.click_event, function(){
					$(this).next().focus();
				});
	$(".chzn-select").chosen(); 
	
	$("#dev_select1").change(function(e){
		$("#devcontrolform").submit();
	/*	var imei=$(this).val();
		$.ajax({
		  type: "POST",
		  url: "metrack_ajax/oildev.php",
		  data: { imei: imei }
		})
		  .done(function( msg ) {
		    window.location
		  });
	*/
	});
	
	
	
	

				var d=new Date();
				var day=d.getDate();
				var month=d.getMonth() + 1;
				var yr=d.getFullYear();
				var cur=day+"-"+month+"-"+yr;		

 				$("#fchhd").val(cur);
				$("#rfhhd").val(cur);
				$("#fcmmd").val(cur);
				
				
				
				$('#oiltb').dataTable( {
					"aaSorting": [],
					"sDom": 'T<"clear">lfrtip',
					"oTableTools": {
						"aButtons": [
							"copy",
							"csv",
							"xls",
							{
								"sExtends": "pdf",
								"sPdfOrientation": "landscape",
								"sPdfMessage": "Vehicle Fuel History."
							},
							"print"

						]

					}

				} );

		
			

	
});
function genoilrpt(){
				var postData=$("#oilrpt").serializeArray();
                var formURL = "ajax/report_oildb.php";
				$("#load_spin").show();
				$.ajax({
							url : formURL,
							type: "POST",
							data : postData,
							success:function(response, textStatus, jqXHR) 
							{$("#load_spin").hide();
								
								$("#result").html(response);
								cchart();
								$("#db_report").DataTable({"aaSorting": []});
								//$(".infobox-container").focus();
								$('html, body').animate({
									scrollTop: $("#result").offset().top
								}, 1000);
							},

							error: function(jqXHR, textStatus, errorThrown)
							{
								$("#load_spin").hide();
								   alert("Change a few things up and try submitting again.");

							}

						});
}
</script>

		
		<script type="text/javascript" language="javascript" src="assets/js/flot/jquery.flott.js"></script>


<script>	
	var d2 = [[<?php echo $_SESSION['oildevcontrol']; ?>, <?php echo $curr_fuel_l; ?>]];

		

		$.plot("#placeholder", [{
			data: d2,
			bars: { show: true },
			color: "<?php echo $stat_color; ?>",
			
			
		}],{xaxis: {				
			  ticks: [],
			 
		},
		yaxis: {
				min:0,
				 max:<?php echo $tank_capacity;?>,
			    axisLabel: "Fuel Level",			    
			},
			
		});
		
		</script>




 <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
    
	  
	  function get_custom_marker(engine, speed, last_signal,cat,devid,dbcat){
		//console.log(engine);
		//console.log(speed);
		//console.log(last_signal);
	if(devid==24){//ogct-006
		if(last_signal > 72){//inactive red 24 hrs			
			var img='assets/images/marker-images/'+cat+'/red.png';
		}else{
			var img='assets/images/marker-images/'+cat+'/green.png';
		}
	}else if(dbcat==5 || dbcat==19 || dbcat==10){//personal or gpsid or asset
		if(last_signal > 72){//inactive red 24 hrs			
			var img='assets/images/marker-images/'+cat+'/red.png';
		}else{
			var img='assets/images/marker-images/'+cat+'/green.png';
		}
		
	}else{	
		if(last_signal > 72){//inactive red
			//console.log('red');
			var img='assets/images/marker-images/'+cat+'/red.png';
		}else if(engine=='acc on' && speed>0){//active green
			////console.log('green');
			var img='assets/images/marker-images/'+cat+'/green.png';
		}else if(engine=='acc on' && speed==0){//idle yellow
			//console.log('yellow');
			var img='assets/images/marker-images/'+cat+'/orange.png';
		}else if(engine=='acc off'){//engine off  grey
			//console.log('grey');
			var img='assets/images/marker-images/'+cat+'/yellow.png';
		}else{
			var img='assets/images/marker-images/'+cat+'/red.png';
		}
	}
		var image = new google.maps.MarkerImage(
  				img,
  				new google.maps.Size(46,42),
  				new google.maps.Point(0,0),
  				new google.maps.Point(10,21)
			);
			return image;
}
function get_curr_status(engine, speed, last_signal,devid,dbcat){
	if(devid==24){//ogct-006
		if(last_signal > 72){//inactive red 24 hrs			
			var stat='inactive';
		}else{
			var stat='moving';
		}
	}else if(dbcat==5 || dbcat==19 || dbcat==10){//personal or gpsid or asset
		if(last_signal > 72){//inactive red 24 hrs			
			var stat='tracker-inactive';
		}else{
			var stat='tracker-active';
		}
	
	}else{
		if(last_signal > 72){//inactive red			
			var stat='inactive';
		}else if(engine=='acc on' && speed>0){//active green
			////console.log('green');
			var stat='moving';
		}else if(engine=='acc on' && speed==0){//idle yellow
			//console.log('yellow');
			var stat='idle';
		}else if(engine=='acc off'){//engine off  grey
			//console.log('grey');
			var stat='engine off';
		}else{
			var stat='inactive';
		}
	}
		return stat;
	
}
    </script>







</body></html>



