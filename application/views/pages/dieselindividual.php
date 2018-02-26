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
WHERE customer_id=$id AND installation_status='completed' and gps_categories.category_id!=4";

if($rs=mysql_query($sql)){

while($rw=mysql_fetch_assoc($rs)){
	$devices[]=$rw;
	}
	}
	if(!(isset($_SESSION['oildevcontrol']))){
		$_SESSION['oildevcontrol']=$devices[0]['imie_no'];
	}
	
	
$sqcursignal="select * from newmetrack where imei='".$_SESSION['oildevcontrol']."' and oil <=100  order by device_time desc limit 1";
//echo $sqcursignal;
if($rscur=mysql_query($sqcursignal)){
	$rw_last=mysql_fetch_assoc($rscur);
	$oil=$rw_last['oil'];
	$oil=$oil;
	
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


$curr_fuel_l=0;
$tank_capacity=$rw_curr['tank_capacity'];
if($rw_curr['tank_capacity']!=0){
	//$curr_fuel_l=($rw_curr['tank_capacity']*$oil)/100;
}

//$maxcap=65;
//if($_SESSION['oildevcontrol']=='013777002510756'){
	$maxcap=$tank_capacity;
//}


$curr_fuel_l=70;

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
	padding: 20px 15px 15px 15px;
	margin: 10px;
	border: 1px solid #ddd;
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
	-webkit-box-shadow: 0 3px 10px rgba(0,0,0,0.1);
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
									FUEL DASHBOARD								
								</strong> &nbsp;&nbsp;&nbsp;&nbsp;
														</div>	
				    <div class="span12" style="margin-left: 0;">

<div class="span2">
<h3 class="header smaller lighter blue">Fuel Level</h3>

<!--<div class="progress progress-<?php echo $stat; ?> progress-striped active" data-percent="<?php echo $oil;?>%">
 <div class="bar" style="width: <?php echo $oil;?>%;"></div>
</div>-->


<div class="demo-container">
			<div id="placeholder" class="demo-placeholder"></div>			
		</div>
		
		<div class="infobox infobox-<?php echo $s_c; ?>" style="margin-bottom: 10px;  width: 125px;">
										<div class="infobox-icon">
											<i class="icon-beaker"></i>
										</div>

										<div class="infobox-data" style="min-width: 55px;">
											<span class="infobox-data-number"><?php echo floor($curr_fuel_l); ?></span>
											<div class="infobox-content">Liters</div>
										</div>
									</div>	
		


</div>


<div class="span5">

<div id="chart_div" style="width: 100%; height: 420px;"></div>	


</div>

<div class="span3" style="margin-left:0px;">                     		
    <div class="span12" >             
		<div class="row-fluid">	
		<h3 class="header smaller lighter blue" style="border: none;"></h3>							
			<div id="main-map" class="google-maps" style="width:100%;height:250px;"></div>	
			
					<span class="label label-info label-large"><div id="loc"></div></span>
			
					
		</div>
    </div>
</div>

<div class="span2">
<h3 class="header smaller lighter blue" style="border: none;"></h3>
<div class="infobox infobox-green infobox-small ">
												<div class="infobox-icon">
                                                    <i class="icon-level-down" style="background-color: #8DAF26;"></i>
                                                </div>
        
                                                <div class="infobox-data">
                                                    <div class="infobox-content">Total Consumption</div>
                                                    <div class="infobox-content" id="totcons">64 L </div>
                                                </div>
											</div>
											<div class="infobox infobox-grey infobox-small ">
												<div class="infobox-icon">
                                                    <i class="icon-warning-sign" style="background-color: #1796C4;"></i>
                                                </div>
        
                                                <div class="infobox-data">
                                                    <div class="infobox-content">Location</div>
                                                    <div class="infobox-content" id="SpV">Bangalore</div>
                                                </div>
											</div>
<div class="infobox infobox-grey infobox-small ">
<div class="infobox-icon">
<i class="icon-beaker" style="background-color: #1D3DA5;"></i>
</div>

<div class="infobox-data">
<div class="infobox-content">Last Filled :</div>
<div class="infobox-content" id="curspeed">100 ltrs </div>
</div>
</div>
<div class="infobox infobox-grey infobox-small ">
<div class="infobox-icon">
<i class="icon-dashboard" style="background-color: #077E79;"></i>
</div>

<div class="infobox-data">
<div class="infobox-content">Last Filled Date/Time </div>
<div class="infobox-content" id="avgspeed">12-03-2015 </div>
</div>
</div>
<div class="infobox infobox-grey infobox-small ">
<div class="infobox-icon">
<i class="icon-tint" style="background-color: #E6A118;"></i>
</div>

<div class="infobox-data">
<div class="infobox-content">Power : </div>
<div class="infobox-content" id="maxspeed">ON / OFF </div>
</div>
</div>

</div>
 
</div> <!--/span12-->



<div class="hr hr-18 dotted hr-double"></div>
  <div class="oil_report" style="text-align:center;">
  <form class="form-inline" id="oilrpt">
 													
														
												
													
														
														
															<label for="id-date-range-picker-1">From - To</label>

															<input type="text"id="id-date-range-picker-1" name="daterange" value="<?php echo date("d/m/Y")." - "."11/03/2015";?>">
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





<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCNMfm4IoavTQbIjDH42fNQF31v4BkT8e0&sensor=false"></script>

<script>

$(function(){

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
	
	$("[id^='fchh']").change(function(e){
		$("#fchhd").datepicker('hide');
		var dt=$("#fchhd").val()+" "+$("#fchht").val();
		$.ajax({
		  type: "POST",
		  url: "metrack_ajax/fuelconsumption.php",
		  data: { dt: dt,imei:"<?php echo $_SESSION['oildevcontrol']; ?>",tc:<?php echo $tank_capacity;?>,type:"c" }
		})
		  .done(function( fc ) {
		    $("#fcp").html(fc);			
			//$('#fcpc').data('easyPieChart').update(fc);
				
		  });
	
	});
	
	$("[id^='rfhh']").change(function(e){
		$("#rfhhd").datepicker('hide');
		var dt=$("#rfhhd").val()+" "+$("#rfhht").val();
		$.ajax({
		  type: "POST",
		  url: "metrack_ajax/fuelconsumption.php",
		  data: { dt: dt,imei:"<?php echo $_SESSION['oildevcontrol']; ?>",tc:<?php echo $tank_capacity;?>,type:"r" }
		})
		  .done(function( fc ) {
		    $("#rfp").html(fc);			
			//$('#rfpc').data('easyPieChart').update(fc);
				
		  });
	
	});
	
	$("[id^='fcmm']").change(function(e){
		$("#fcmmd").datepicker('hide');
		var dt=$("#fcmmd").val()+" "+$("#fcmmt").val();
		$.ajax({
		  type: "POST",
		  url: "metrack_ajax/fuelconsumption.php",
		  data: { dt: dt,imei:"<?php echo $_SESSION['oildevcontrol']; ?>",tc:<?php echo $tank_capacity;?>,type:"m" }
		})
		  .done(function( fc ) {
		  	var hh=fc.split(",");
		    $("#fcm").html(hh[0]);	
			$("#distkm").html(hh[1]);			
			//$('#fcpc').data('easyPieChart').update(fc);
				
		  });
	
	})
	

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
                var formURL = "metrack_ajax/dieselreport.php";
				$("#load_spin").show();
				$.ajax({
							url : formURL,
							type: "POST",
							data : postData,
							success:function(response, textStatus, jqXHR) 
							{$("#load_spin").hide();
								
								$("#result").html(response);
								//$(".infobox-container").focus();
								$('html, body').animate({
									scrollTop: $(".infobox-container").offset().top
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

<script>
function initialize() {
  var myLatlng = new google.maps.LatLng(12.977008,77.725893);

  var mapOptions = {
    zoom: 4,
    center: myLatlng
  };

  var map = new google.maps.Map(document.getElementById('main-map'), mapOptions);

  var contentString = "<p><a href='http://ogtslive.com/customer/track.php?page=dieselindividual&id=451'>ON</a></p>";
  var contentStringplain = "<p>Bangalore</p>";

  
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
 
  google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map,marker);
     
  });
   
}

google.maps.event.addDomListener(window, 'load', initialize);
  </script>


 <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
    google.load('visualization', '1.1', {packages: ['line']});
    google.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = new google.visualization.DataTable();
      data.addColumn('number', 'Day');
      data.addColumn('number', '');
      data.addColumn('number', '');
      data.addColumn('number', '');

      data.addRows([
        [1,  0, 80, 0],
        [7,  0, 70, 0],
        [7,  0, 40, 0],
        [14,  0,  20, 0],
        [14,  0,  90, 0],
        [20,  0,  70, 0]
       
      ]);

      var options = {
        chart: {
          title: 'Fuel Level',
          subtitle: ''
        },
        width: 500,
        height: 350,
        axes: {
          x: {
            0: {side: 'top'}
          }
        }
      };

      var chart = new google.charts.Line(document.getElementById('chart_div'));

      chart.draw(data, options);
    }
  </script>

</body></html>



