<?php
error_reporting(0);
ini_set('memory_limit', '250M');
 
function distance($lat1, $lon1, $lat2, $lon2, $unit) {
  $theta = $lon1 - $lon2;
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
  $dist = acos($dist);
  $dist = rad2deg($dist);
  $miles = $dist * 60 * 1.1515;
  $unit = strtoupper($unit);
  return ($miles * 1.609344);
}
function convertToHoursMins($time, $format = '%d:%d') {
    settype($time, 'integer');
    if ($time < 1) {
        return;
    }
    $hours = floor($time / 60);
    $minutes = ($time % 60);
    return sprintf($format, $hours, $minutes);
}
 $start=date("Y-m-d 00:00:00");
 $end=date("Y-m-d H:i:s");
 $curr=date("Y-m-d");

 $sqlimei="SELECT imie_no,device_name FROM installation where customer_id=$id and installation_status='completed'";
 $rsimei=mysql_query($sqlimei);
?>
	
	

 
 
 <div class="main-content">

				<div class="breadcrumbs" id="breadcrumbs">

					<ul class="breadcrumb">

						<li>

							<i class="icon-home home-icon"></i>

							<a href="index.php?page=dashboard&id=<?php echo $id; ?>">Home</a>



							<span class="divider">

								<i class="icon-angle-right arrow-icon"></i>

							</span>

						</li>



						<li class="active">
							Travel Summary
						</li>

					

					</ul><!--.breadcrumb-->



					

				</div>



				<div class="page-content">
					<div class="page-header position-relative">
						<h1>
							Travel Summary for <?php echo date("d F Y"); ?>
						</h1>
					</div>
					


<div class="row-fluid">
	<div class="span12">
		<table id="sample-table-2" class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th class="center">
												SlNo
											</th>
											<th>Vehicle</th>
											<th>IMEI</th>
											<th>Distance Travelled (km)</th>
											<th>Avg Speed  (km/hr)</th>
											<th>Time travelled</th>
											
										</tr>
									</thead>

									<tbody>
	<?php
	while($rwimei=mysql_fetch_assoc($rsimei)){
 	$imei=$rwimei['imie_no'];
	
	$sqld1="SELECT lat,lng,speed FROM `narayana` WHERE imei='$imei' AND device_time BETWEEN '$start' AND '$end' AND  lat between 7 and 35 and lng between 65 and 95 and device_status='A' group by lat,lng ORDER BY device_time";	
	$r1=mysql_query($sqld1);
	$points=array();
	while($d1=mysql_fetch_assoc($r1)){
		$points[]=$d1;
	}
	
	$cnt=0;
	$speed=0;
	$dev_speed=0;
	$dur=0;	
	$dist=0;
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
	$dev_dist=($dist);

	if($cnt > 0){
	$dev_speed=($speed/$cnt);
	$dur=$dev_dist/$dev_speed;
	$dur=$dur*60;
	}
	
if($dev_dist > 0){
$dur=convertToHoursMins($dur, '%d hrs %d m');	

?>
										<tr >
											<td class="center">												
											</td>
											<td><?php echo $rwimei['device_name']; ?></td>
											<td><?php echo $imei; ?></td>
											<td><?php echo  round($dev_dist); ?></td>		
											<td><?php echo  round($dev_speed); ?></td>		
											<td><?php echo  $dur; ?></td>		
																			
										</tr>
<?php }else{ ?>	

									<tr >
											<td class="center">												
											</td>
											<td><?php echo $rwimei['device_name']; ?></td>
											<td><?php echo $imei; ?></td>
											<td></td>	
											<td></td>
											<td></td>		
																			
										</tr>
<?php }} ?>										
									</tbody>
		</table>		
	</div>
</div>
</div>
</div>



<?php include "include/footer.php";?>
<link rel="stylesheet" type="text/css" href="media/css/TableTools.css">
<script src="http://cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/js/jquery.dataTables.bootstrap.js"></script>
<script type="text/javascript" charset="utf-8" src="media/js/ZeroClipboard.js"></script>
<script src="media/js/TableTools.js"></script>
<script type="text/javascript">
			$(function() {
	//$(".chzn-select").chosen(); 
	
	var t = $('#sample-table-2').DataTable( {					
			        
					"sDom": 'T<"clear">lfrtip',
					"oTableTools": {
						"aButtons": [
							{
								"sExtends": "copy",
								"sButtonText": "Copy",
								
							},

							{
								"sExtends": "csv",
								"sButtonText": "CSV",
								//"sTitle":"<?php echo date('d/m/Y',strtotime($start_req)); ?>",
								"sFileName":"<?php echo 'TravelSummary'.date('d-m-Y',strtotime($start_req)); ?>"+".csv",
								
							},

							{
								"sExtends": "xls",
								"sButtonText": "Excel",
								//"sTitle":"<?php echo date('d/m/Y',strtotime($start_req)); ?>",
								"sFileName":"<?php echo 'TravelSummary'.date('d-m-Y',strtotime($start_req)); ?>"+".xls",
								
							},

							{

								"sExtends": "pdf",
								"sPdfOrientation": "landscape",
								"sPdfMessage": "Travel Summary",
								//"sTitle":"<?php echo date('d/m/Y',strtotime($start_req)); ?>",
								"sFileName":"<?php echo 'TravelSummary'.date('d-m-Y',strtotime($start_req)); ?>"+".pdf",								

							},

							{
                    			"sExtends": "print",
                    			"sInfo": "Please press escape when done"
                			},

						]

					},
					"columnDefs": [ {
			            "searchable": false,
			            "orderable": false,
			            "targets": 0
			        } ]
			    } );
			 
			    t.on( 'order.dt search.dt', function () {
			        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
			            cell.innerHTML = i+1;
			        } );
			    } ).draw();
				
				
				 

				
	});
	
		</script>