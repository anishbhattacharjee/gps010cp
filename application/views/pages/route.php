<?php
function convertToHoursMins($time, $format = '%d:%d') {
    settype($time, 'integer');
    if ($time < 1) {
        return;
    }
    $hours = floor($time / 60);
    $minutes = ($time % 60);
    return sprintf($format, $hours, $minutes);
}
?>			<div class="main-content">
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

		small img{

*width: 60%;

margin-top: -12px;

padding: 0px;

margin-bottom: -12px;

}
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



					<div class="page-header position-relative">

						<h1>

							Route Map

                        </h1>

					</div>



				    <div class="row-fluid">

				   		 <div class="span12">

                         

							<div id="demo">
 <i class="icon-spinner icon-spin orange bigger-125" id="load_spin_map" style="width: 100%;
height: 35px;
font-size: 35px;" ></i>                       
								 <div id="map_rpt" class="google-maps" style="height:350px;"></div>
                                        
<?php if(isset($_POST['submit'])){
	
	$vid=$imei=$_POST['vid'];
	$start=$_POST['frmdate']." ".$_POST['frmtime'];
	$start=date("Y-m-d H:i:s",strtotime($start));
	
	$end=$_POST['todate']." ".$_POST['totime'];
	$end=date("Y-m-d H:i:s",strtotime($end));

	$make='na';
	$a="select make from device_make where imei='$vid'";
	$b=mysql_query($a);
	if($b && mysql_num_rows($b) > 0){		
		$c=mysql_fetch_assoc($b);
		$make=$c['make'];
	}
	if($make=='noran' || $make=='meitrack'){
		$time_field='device_time';
		$alt_time_field='time_stamps';
		/*if($make=='noran'){
			$start=date("Y-m-d H:i:s",strtotime("-330 minutes",strtotime($start)));
			$end=date("Y-m-d H:i:s",strtotime("-330 minutes",strtotime($end)));
		}*/
	}else{
		$time_field='time_stamps';
		$alt_time_field='device_time';
	}

$sqlna="SELECT imei, Last_Status AS msg , SUM(Dur) / 60 AS 'total'  FROM (SELECT a.imei , a.msg , a.$time_field , @last_status := @status AS Last_Status , @status := a.msg , @last_time := @time , @time := a.$time_field , TIME_TO_SEC(TIMEDIFF(a.$time_field , @last_time)) AS Dur FROM gps_master a,(SELECT @status := '') r,(SELECT @time := '') b WHERE imei = '$imei' AND $time_field between '$start' and '$end' ORDER BY $time_field ) AS D WHERE Dur >= 0 GROUP BY imei,Last_Status";
//echo $sqlna;
$rsna=mysql_query($sqlna);
if(mysql_num_rows($rsna) > 0){
?>
<table class="table table-striped table-bordered table-hover">
<tr>
<th></th>
<th>Total Time (Minutes)</th>
</tr>
<?php
while($rwna=mysql_fetch_assoc($rsna)){
	if($rwna['msg']=='acc on' || $rwna['msg']=='acc off'){
		if($rwna['msg']=='acc on'){
			$msg="Engine ON";
		}else if($rwna['msg']=='acc off'){
			$msg="Halt Time";
		}
$dur=convertToHoursMins($rwna['total'], '%d hours %d minutes');		
?>
<tr>
<td><?php echo $msg;?></td>
<td><?php echo $dur;?></td>
</tr>
<?php }} ?>
     </table>       
            
            <?php } } ?>                        

										<div class="widget-box transparent">

											<div class="widget-header header-color-blue3">

												<h4>Route Details</h4>



												<span class="widget-toolbar">

													<a href="#" data-action="settings">

														<i class="icon-cog"></i>

													</a>



													<a href="#" data-action="reload">

														<i class="icon-refresh"></i>

													</a>



													<a href="#" id="collapse_search" data-action="collapse">

														<i class="icon-chevron-up"></i>

													</a>



													<a href="#" data-action="close">

														<i class="icon-remove"></i>

													</a>

												</span>

											</div>



											<div class="widget-body">

												<div class="widget-main no-padding">

                                                

                                                <form id="v_d_d_r" method="post">

                                                <fieldset>

                                                <div class="row-fluid">

                                                <div class="span6">

													<div class="row-fluid">

														<label for="id-date-picker-1">From</label>

													</div>



													<div class="control-group">

														<div class="row-fluid input-append">

															<input class="span10 date-picker"  id="id-date-picker-1" type="text"  name="frmdate" data-date-format="dd-mm-yyyy" <?php if(isset($_POST['frmdate'])){?> value="<?php echo $_POST['frmdate']; ?>" <?php } ?>/>

															<span class="add-on">

																<i class="icon-calendar"></i>

															</span>

														</div>

													</div>

                                                    </div>	<!--span6-->

                                                    

                                                    <div class="span6">

                                                    <div class="row-fluid">

														<label for="timepicker1">Time</label>

													</div>



													<div class="control-group">

														<div class="input-append bootstrap-timepicker">

														<input id="timepicker1" type="text" name="frmtime"  class="input-small" <?php if(isset($_POST['frmtime'])){?> value="<?php echo $_POST['frmtime']; ?>" <?php } else{?> value="00:00:00"<?php } ?>/>

															<span class="add-on">

																<i class="icon-time"></i>

															</span>

														</div>

													</div>

                                                    </div>

                                                    </div><!-----first row(frm)-->

                                                    

                                                    

                                                    <div class="row-fluid">

                                                    <div class="span6">

													<div class="row-fluid">

														<label for="id-date-picker-2">To</label>

													</div>



													<div class="control-group">

														<div class="row-fluid input-append">

															<input class="span10 date-picker" id="id-date-picker-2" type="text" name="todate" data-date-format="dd-mm-yyyy" <?php if(isset($_POST['todate'])){?> value="<?php echo $_POST['todate']; ?>" <?php } ?> />

															<span class="add-on">

																<i class="icon-calendar"></i>

															</span>

														</div>

													</div>

                                                    </div>	<!--span6-->

                                                    

                                                    <div class="span6">

                                                    <div class="row-fluid">

														<label for="timepicker2">Time </label>

													</div>



													<div class="control-group">

														<div class="input-append bootstrap-timepicker">

														<input id="timepicker2" type="text" name="totime" class="input-small" <?php if(isset($_POST['totime'])){?> value="<?php echo $_POST['totime']; ?>" <?php } ?>/>

															<span class="add-on">

																<i class="icon-time"></i>

															</span>

														</div>

													</div>

                                                    </div>

                                                    

                                                    <hr/>

                                                    </div><!--row-fluid-->

                                                    

                                                    <div class="row-fluid">

                                                    <div class="span6">

													<div class="row-fluid">

														<label for="vid">Device</label>

													</div>



													<div class="controls">														

                                                            <select name="vid" id="vid" >

															
                                                              <?php 

														$sql="SELECT

installation.model_id,
installation.device_name,
installation.imie_no
FROM
installation
WHERE installation_status='completed' AND customer_id=$id  and category_id!=4";

															$rs=mysql_query($sql);

															while($dev=mysql_fetch_assoc($rs)){
																


															?>

                        <option value="<?php echo $dev['imie_no']; ?>" <?php if(isset($_POST['vid']) && $_POST['vid']==$dev['imie_no']){?> selected="selected" <?php } ?> /><?php echo $dev['device_name']; ?></option>

                        <?php } ?>		

														</select>														

													</div>

                                                    </div>	<!--span12-->

                                                    

                                                    </div><!--row-fluid-->
													<input type="hidden" name="cid" value="<?php echo $id;?>"/>
													</fieldset>

													<div class="form-actions center">

														<button  class="btn btn-small btn-primary" type="submit" name="submit">

															Show Route

															<i class="icon-arrow-right icon-on-right bigger-110"></i>

														</button> 

                                                        <i class="icon-spinner icon-spin orange bigger-125" id="load_spin" style="display:none;"></i>                                                       

													</div>

                                                    				

													</form>	



												</div>

											</div>

										</div>

								




								</div><!--/#demo-->







					</div><!--/.span12-->



					</div><!--/.row-fluid-->

                    

                    <div id="result" ></div>



					</div><!--/.page-content-->







			



			</div><!--/.main-content-->



		</div><!--/.main-container-->





	<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCNMfm4IoavTQbIjDH42fNQF31v4BkT8e0&sensor=false">



</script>

	



	



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







		<!--inline scripts related to this page-->



		<link rel="stylesheet" href="assets/css/datepicker.css" />

		<link rel="stylesheet" href="assets/css/bootstrap-timepicker.css" />



		<script src="assets/js/jquery-ui-1.10.3.custom.min.js"></script>

		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>

		<script src="assets/js/jquery.gritter.min.js"></script>
        <script src="assets/js/jquery.hotkeys.min.js"></script>
        

		<script src="assets/js/bootbox.min.js"></script>

		<script src="assets/js/date-time/bootstrap-datepicker.min.js"></script>

		<script src="assets/js/date-time/bootstrap-timepicker.min.js"></script>

 <script>



function initialize_map() {

	

	//$("#map_rpt").show();
 var flightPath;


  var mapOptions = {

    zoom: 16,

    center: new google.maps.LatLng(<?php echo $customer_latlng; ?>),

    mapTypeId: google.maps.MapTypeId.ROADMAP

  };



 var Colors = ["#68BC31","#2091CF","#AF4E96","#DA5430","#A47AE2","#16A765","#D06B64","#4986E7"];

  var map = new google.maps.Map(document.getElementById('map_rpt'),

      mapOptions);


<?php if(isset($_POST['submit'])){	
	$i=0;

$sql="SELECT id,$time_field FROM `gps_master` WHERE imei='$imei' AND device_status='A' AND $time_field BETWEEN '$start' AND '$end' AND lower(msg) = 'acc on' ";//echo $sql;
$r=mysql_query($sql);
if($r!=FALSE && mysql_num_rows($r) > 0){
while($rw=mysql_fetch_assoc($r)){
	
$sqln1="SELECT msg FROM `gps_master` WHERE imei='$imei' AND $time_field BETWEEN '$start' AND '$end' AND id < ".$rw['id']." order by id desc limit 1";//echo $sqln1;
$rn1=mysql_query($sqln1);
$rwn1=mysql_fetch_assoc($rn1);

if($rwn1['msg']!='acc on'){

$sql1="SELECT id,$time_field FROM `gps_master` WHERE imei='$imei' AND $time_field BETWEEN '$start' AND '$end' AND lower(msg) = 'acc off' and id > ".$rw['id']." limit 1";
$r1=mysql_query($sql1);
$rw1=mysql_fetch_assoc($r1);
	
$off_time=isset($rw1[$time_field])?$rw1[$time_field]:$end;
$on_time_rc=$rw[$time_field];


$loc_points= "";
$sqla="SELECT lat,lng,$time_field,msg FROM `gps_master` WHERE imei='$vid' AND $time_field BETWEEN '$on_time_rc' AND '$off_time' AND  lat between 7 and 35 and lng between 65 and 95 GROUP BY lat,lng  ORDER BY $time_field";
//echo $sqla;
$rsa=mysql_query($sqla);
$rw_len=mysql_num_rows($rsa);
while($rwa=mysql_fetch_assoc($rsa)){

    $loc_points.= "new google.maps.LatLng(".($rwa['lat']).",".($rwa['lng'])."),";
	/*/*if($rwa['msg']=='acc off'){
	?>
	var point=new google.maps.LatLng(<?php echo $rwa['lat'];?>,<?php echo $rwa['lng']; ?>);
	  var marker = new google.maps.Marker({
					flat: true,
					map: map,
					optimized: false,
					position: point,
					title: 'ttt',
					visible: true,
				});


<?php }*/} ?>
	 var markers = [];
	 var bounds = new google.maps.LatLngBounds();
	  var flightPlanCoordinates = [
		<?php echo  $loc_points; ?>
	  ];
	/* for (var i = 0; i < flightPlanCoordinates.length-1; i++) {
  var PathStyle = new google.maps.Polyline({
    path: [flightPlanCoordinates[i], flightPlanCoordinates[i+1]],
    strokeColor: Colors[i],
    strokeOpacity: 1.0,
    strokeWeight: 2,
    map: map
  });
}

  
*/ 
var clr = Colors[Math.floor(Math.random()*Colors.length)];
 flightPath = new google.maps.Polyline({

    path: flightPlanCoordinates,

    geodesic: true,

    strokeColor: clr,

    strokeOpacity: 1.0,

    strokeWeight: 5,
	

  });


  flightPath.setMap(map);

  <?php
  
mysql_data_seek($rsa, 0);
$row_1 = mysql_fetch_assoc($rsa);
$rw_len=$rw_len-1;
mysql_data_seek($rsa, $rw_len);
$row_n = mysql_fetch_assoc($rsa);

$ts_1=date("M-d-Y H:i:s",strtotime($row_1[$time_field]));
$ts_n=date("M-d-Y H:i:s",strtotime($row_n[$time_field]));
		
/*if($make=='noran'){
		$ts_1=date("M-d-Y H:i:s",strtotime("+330 minutes",strtotime($row_1[$time_field])));
		$ts_n=date("M-d-Y H:i:s",strtotime("+330 minutes",strtotime($row_n[$time_field])));
	}else{
		$ts_1=date("M-d-Y H:i:s",strtotime($row_1[$time_field]));
		$ts_n=date("M-d-Y H:i:s",strtotime($row_n[$time_field]));
	}
*/?>
	var image = new google.maps.MarkerImage(
  				'assets/images/marker-images/image.png',
  				new google.maps.Size(20,21),
  				new google.maps.Point(0,0),
  				new google.maps.Point(10,21)
			);		
  var point=new google.maps.LatLng(<?php echo $row_1['lat'];?>,<?php echo $row_1['lng']; ?>);
	  var marker = new google.maps.Marker({
					flat: true,
					map: map,
					optimized: false,
					position: point,
					title: 'Engine ON',
					visible: true,
					icon:image 
				});
				markers.push(marker);
				//bounds.extend(point);
				
				var html='<strong>'+'Latitude: <?php echo $row_1['lat'];?></strong.><br />'+'Longitude: <?php echo $row_1['lng'];?><br />Time Stamp: <?php echo $ts_1;?>';	
				marker['infowindow'] = new google.maps.InfoWindow({
					 content: html,
				});	
				google.maps.event.addListener(marker, 'mouseout', function() {	
					this['infowindow'].close();	
				});
	
				
				google.maps.event.addListener(marker, 'mouseover', function() {						
					this['infowindow'].open(map, this);	
				});
			
				 var pinColor = "D01A17";
    var pinImage = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|" + pinColor,
        new google.maps.Size(21, 34),
        new google.maps.Point(0,0),
        new google.maps.Point(10, 34));
				var point=new google.maps.LatLng(<?php echo $row_n['lat'];?>,<?php echo $row_n['lng']; ?>);
	  var marker = new google.maps.Marker({
					flat: true,
					map: map,
					optimized: false,
					position: point,
					title: 'Engine OFF',
					visible: true,
					icon:pinImage 
				});
				markers.push(marker);
				
				var html='<strong>'+'Latitude: <?php echo $row_n['lat'];?></strong.><br />'+'Longitude: <?php echo $row_n['lng'];?><br />Time Stamp: <?php echo $ts_n;?>';	
				marker['infowindow'] = new google.maps.InfoWindow({
					 content: html,
				});		
				google.maps.event.addListener(marker, 'mouseout', function() {	
					this['infowindow'].close();	
				});
	
				
				google.maps.event.addListener(marker, 'mouseover', function() {				
					this['infowindow'].open(map, this);	
				});

	<?php }
	
	
}}?>
if(typeof(point) != 'undefined')
map.panTo(point);
<?php }?>  
}





    </script>





   


        		<script>



	$(function(){//alert("dfdfg");
		

		//$("#load_spin").hide();
		$("#load_spin_map").show();

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

				

					<?php if(!(isset($_POST['submit']))){ ?>	 

				var d=new Date();

				var day=d.getDate();

				var month=d.getMonth() + 1;

				var yr=d.getFullYear();

				var cur=day+"-"+month+"-"+yr;

				

 				$("#id-date-picker-1").val(cur);

				$("#id-date-picker-2").val(cur);

				<?php } ?>

	
initialize_map();
$("#load_spin_map").hide();


//	$('#demo').before( oTableTools.dom.container );



} );



</script>





</body></html>