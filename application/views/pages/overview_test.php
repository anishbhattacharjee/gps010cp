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



					




<style>
.legend {
width: 10px;
vertical-align: middle;
height: 10px;
display: inline-block;
}
.noDataAvailable {
background-color: #ccc;
}
.over {
background-color: #d49f0b;
}
.under {
background-color: #23a0d5;
}
.stats{
	font-size: .6em;
color: #808080;
font-weight: bold;
margin: 5px 0;
list-style:none;
}
h6{
font-size: .9em!important;
color: #999494;
text-transform: uppercase;
font-weight: bold;
font-family: "Gill Sans","Gill Sans MT",Calibri,sans-serif;
}
</style>
<div id="result">

				<div class="row-fluid">
						<div class="span12" id="rsdiv">
                        
<?php
$indx=0;
$sql="SELECT
installation.device_name,
installation.imie_no,
installation.image
FROM
installation
INNER JOIN gps_categories ON installation.category_id = gps_categories.category_id
WHERE customer_id=$id AND installation_status='completed' and gps_categories.category_id!=4";

if($rs=mysql_query($sql)){
while($rw=mysql_fetch_assoc($rs)){
	
$dist=0;
$dist_tot=0;
$speed=0;
$speed_tot=0;
$dev_speed=0;
$devices = array();
$dur="0 sec";

	$devices[]=$rw;
	
	$imei=$rw['imie_no'];
		/******/
	$make='na';
	$a="select make from device_make where imei='".$rw['imie_no']."'";
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
	
	if($make=='noran'){
		$cur=date('Y-m-d 00:00:00');
		//$start=date('Y-m-d 00:00:00',strtotime('-330 minutes'));
		$start=date("Y-m-d H:i:s",strtotime("-330 minutes",strtotime($cur)));
		$end=date('Y-m-d H:i:s',strtotime('-330 minutes'));
		
		
		
	}else{
		$start=date('Y-m-d 00:00:00');
		$end=date("Y-m-d H:i:s");
	}


	
$points=array();	
$sqld1="SELECT lat,lng,speed FROM `gps_master` WHERE imei='".$rw['imie_no']."' AND $time_field BETWEEN '$start' AND '$end' AND  lat between 7 and 35 and lng between 65 and 95 and device_status='A' AND lower(msg) = 'acc on' group by lat,lng ORDER BY $time_field";
//echo $sqld1;
$r1=mysql_query($sqld1);

while($d1=mysql_fetch_assoc($r1)){
	$points[]=$d1;
}
//print_r($points);
$cnt=0;
for($i=0; $i<sizeof($points); $i++){
		$j=$i+1;
		$speed+=$points[$i]['speed'];
		if($points[$i]['speed'] > 0){
			$cnt++;
		}
		if($points[$i]['lat']!=$points[$j]['lat'] && $points[$i]['lng']!=$points[$j]['lng'] && $points[$j]['lat']!='' && $points[$j]['lng']!=''){
			
			$dist+=distance(($points[$i]['lat']), ($points[$i]['lng']), ($points[$j]['lat']), ($points[$j]['lng']), "K");
		}
}
$dev_dist=$dist;
if($cnt > 0){
	$dev_speed=$speed/$cnt;
}
$distance=$dist;
$dev_name=$rw['device_name'];


?>                       		
                        	<div class="span4 rs well" <?php if(($indx%3)==0){echo "style=\"margin-left: 0px !important;\"";}?>>
                            <h6><?php echo $dev_name; ?></h6>
                            <div id="user-profile-1" class="user-profile row-fluid">
									<div class="span6">
										<div>
											<span class="profile-picture">
												<img id="avatar" class="editable editable-click editable-empty" alt="<?php echo $dev_name; ?>" src="../gps/modeluploads/<?php echo $rw['image']; ?>"></img>
											</span>
										</div>

									</div>

									<div class="span6">
										<div class="center">
											<!--<span class="btn btn-app btn-small btn-light no-hover">
												<span class="bigger-150 blue"> <?php echo ceil($distance); ?> km </span>

												<br>
												<span class="smaller-90"> Distance </span>
											</span>
                                            <span class="btn btn-app btn-small btn-pink no-hover">
												<span class="bigger-175"> <?php echo ceil($dev_speed); ?> kmph </span>

												<br>
												<span class="smaller-90"> Avg Speed </span>
											</span>
                                            <span class="btn btn-app btn-small btn-grey no-hover">
												<span class="bigger-175"> 23 </span>

												<br>
												<span class="smaller-90"> Time </span>
											</span>								
                                            -->
                                            <div class="infobox infobox-green infobox-small infobox-dark">
												<div class="infobox-icon">
                                                    <i class="icon-level-up"></i>
                                                </div>
        
                                                <div class="infobox-data">
                                                    <div class="infobox-content">Distance</div>
                                                    <div class="infobox-content"><?php echo ceil($distance); ?> km </div>
                                                </div>
											</div>
                                             <div class="infobox infobox-grey infobox-small infobox-dark">
												<div class="infobox-icon">
                                                    <i class="icon-dashboard "></i>
                                                </div>
        
                                                <div class="infobox-data">
                                                    <div class="infobox-content">Speed Avg</div>
                                                    <div class="infobox-content"><?php echo ceil($dev_speed); ?> kmph </div>
                                                </div>
											</div>
<?php                                            
 $sqlna="SELECT imei, Last_Status AS msg , SUM(Dur) / 60 AS 'total'  FROM (SELECT a.imei , a.msg , a.$time_field , @last_status := @status AS Last_Status , @status := a.msg , @last_time := @time , @time := a.$time_field , TIME_TO_SEC(TIMEDIFF(a.$time_field , @last_time)) AS Dur FROM gps_master a,(SELECT @status := '') r,(SELECT @time := '') b WHERE imei = '$imei' AND $time_field between '$start' and '$end' ORDER BY $time_field ) AS D WHERE Dur >= 0 GROUP BY imei,Last_Status";
$rsna=mysql_query($sqlna);
if(mysql_num_rows($rsna) > 0){
while($rwna=mysql_fetch_assoc($rsna)){	
		if($rwna['msg']=='acc on'){
		
		
$dur=convertToHoursMins($rwna['total'], '%d h %d m');
	
		}
		else{
			$dur="0 sec";
		}}}
?>

                                             <div class="infobox infobox-blue infobox-small infobox-dark">
												<div class="infobox-icon">
                                                    <i class="icon-spinner "></i>
                                                </div>
        
                                                <div class="infobox-data">
                                                    <div class="infobox-content">Avg Time</div>
                                                    <div class="infobox-content"> <?php echo $dur; ?> </div>
                                                </div>
											</div>
											

														
										</div>

									

									
										

										
									</div>
								</div>
                                            
                                           
							</div>
                        	<?php
							$indx++;
							
							}
}


?>

                            
                            <div class="span9" id="result_bar1" style="display:none;">
                            <h6>Drive Time</h6>
											<div class="progress">                                           
												<div class="bar bar-success" style="width: 35%;"></div>

												<div class="bar bar-warning" style="width: 20%;"></div>

												<div class="bar bar-danger" style="width: 10%;"></div>
											</div>
							</div>
                            
                            <div class="span9" id="result_bar2" style="display:none;">
                            <h6>Distance Travelled</h6>
                                            <div class="progress">
												<div class="bar bar-success" style="width: 35%;"></div>

												<div class="bar bar-warning" style="width: 20%;"></div>

												<div class="bar bar-danger" style="width: 10%;"></div>
											</div>
							</div>
                            
                            <div class="span9" id="result_bar3" style="display:none;">
                            <h6>Idle Time</h6>
                                            <div class="progress">
												<div class="bar bar-success" style="width: 35%;"></div>

												<div class="bar bar-warning" style="width: 20%;"></div>

												<div class="bar bar-danger" style="width: 10%;"></div>
											</div>
							</div>

                            
                            
                        </div>
                 </div>          



</div><!--/result-->




					</div><!--/.page-content-->


			</div><!--/.main-content-->
		</div><!--/.main-container-->

		<!--basic scripts-->



		<link rel="stylesheet" href="assets/css/datepicker.css" />

		<link rel="stylesheet" href="assets/css/bootstrap-timepicker.css" />




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
		<script src="assets/js/jquery-ui-1.10.3.custom.min.js"></script>

		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>

		<script src="assets/js/jquery.gritter.min.js"></script>
        <script src="assets/js/jquery.hotkeys.min.js"></script>
        <script src="assets/js/jquery.easy-pie-chart.min.js"></script>

		<script src="assets/js/bootbox.min.js"></script>

		<script src="assets/js/date-time/bootstrap-datepicker.min.js"></script>

		<script src="assets/js/date-time/bootstrap-timepicker.min.js"></script>

        <script src="assets/js/jquery.dataTables.min.js"></script>

		<script src="assets/js/jquery.dataTables.bootstrap.js"></script>

        <script src="assets/js/jquery.dataTables.min.js"></script>
   <script type="text/javascript">



/*			function v_d_d_r_submit(){

				var postData=$("#v_d_d_r").serializeArray();//alert(postData);

                var formURL = "ajax/<?php   echo $report['report_link']; ?>.php";

				$("#load_spin").show();

				$.ajax(

						{

							url : formURL,

							type: "POST",

							data : postData,						

							success:function(response, textStatus, jqXHR) 

							{$("#load_spin").hide();

								//alert(response);
								$('#collapse_search').click();
								//if(!($( "#sidebar" ).hasClass( "menu-min" ))){$(".sidebar-collapse").click();}
								$(".page-header").hide();
								$("#breadcrumbs").hide();
								//$(".main-content").css("margin-left","30px");
								$("#result").html(response);
								
								
								

							},

							error: function(jqXHR, textStatus, errorThrown) 

							{

								$("#load_spin").hide();

								   alert("Change a few things up and try submitting again.");

							}

						});

				

			}
*/
		</script>

        

        		<script>



	$(function(){
		//$("#overview").submit();
		//$("#result_bar").hide();
		
		

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

				

						 

				var d=new Date();

				var day=d.getDate();

				var month=d.getMonth() + 1;

				var yr=d.getFullYear();

				var cur=day+"-"+month+"-"+yr;

				

 				$("#id-date-picker-1").val(cur);

				$("#id-date-picker-2").val(cur);

				
				var oldie = /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase());
				$('.easy-pie-chart.percentage').each(function(){
					$(this).easyPieChart({
						barColor: $(this).data('color'),
						trackColor: '#EEEEEE',
						scaleColor: false,
						lineCap: 'butt',
						lineWidth: 18,
						animate: oldie ? false : 1000,
						size:150
					}).css('color', $(this).data('color'));
				});
	
				$('[data-rel=popover]').popover({html:true,
				content: function() {
				  //return $('#popover_content_wrapper').html();
				  return "test";
				}
				});
				$('[id^=percentage]').click(function(e) {//alert("fgh");
					var id=$(this).attr("data-id");
                    $(".rs").hide();
					$("#result_bar"+id).show();
					$("#bkbt").show();
                });
				$("#bkbt").click(function(e){
					$("[id^=result_bar]").hide();
					$(".rs").show();					
					$(this).hide();
				});


//	$('#demo').before( oTableTools.dom.container );



} );



</script>





</body></html>