<?php 
$trips = $trips['data'][0];

$stat_label=$this->commonfunctions_model->getStatClass($trips['trip_status']);
$imei=$trips['imei'];
$trip_id=$trips['id'];

$dev = $this->action_model->GetData('installation',array('device_name'),array('customer_id'=>$id,'imie_no'=>$imei)); 


$startd = $this->action_model->GetData('trip_alert_log',array('send_at'),array('trip_id'=>$trip_id,'status'=>'Started')); 
$endd = $this->action_model->GetData('trip_alert_log',array('send_at'),array('trip_id'=>$trip_id,'status'=>'Ended')); 

$start=$startd['data'][0]['send_at'];
$end=$endd['data'][0]['send_at'];

/*****start & end point*******/
$rss1 = $this->action_model->GetData('gps_master',array('lat','lng'),array('imei'=>$imei),1,'time_stamps','AND time_stamps BETWEEN "'.$start.'" AND "'.$end.'" AND  lat between 7 and 35 and 
lng between 65 and 95'); 
$rws1 = $rss1['data'][0];

$rse2 = $this->action_model->GetData('gps_master',array('lat','lng'),array('imei'=>$imei),1,'time_stamps desc','AND time_stamps BETWEEN "'.$start.'" AND "'.$end.'" AND  lat between 7 and 35 and 
lng between 65 and 95'); 
$rwe2 = $rse2['data'][0];

/************/


$sqld1="SELECT lat,lng,time_stamps,speed,msg FROM `gps_master` WHERE imei='$imei' AND time_stamps BETWEEN '$start' AND '$end' AND  lat between 7 and 35 and lng between 65 and 95 AND lower(msg) = 'acc on' ORDER BY time_stamps";

//echo $sqld1;
$r1=mysql_query($sqld1);

while($d1=mysql_fetch_assoc($r1)){
	$points[]=$d1;
}

//}}
//print_r($points);
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
function getDuration($tdiff){
	$dur="0 seconds";
	
	$second = 1;
	$minute = 60*$second;
	$hour   = 60*$minute;
	$day    = 24*$hour;
	
	$ans["day"]    = floor($tdiff/$day);
	$ans["hour"]   = floor(($tdiff%$day)/$hour);
	$ans["minute"] = floor((($tdiff%$day)%$hour)/$minute);
	$ans["second"] = floor(((($tdiff%$day)%$hour)%$minute)/$second);
	//$dur =$ans["day"] . " days, " . $ans["hour"] . " hrs, "  . $ans["minute"] . " mins, " . $ans["second"] . " sec";
	if($ans["day"] > 0){
	$dur =$ans["day"] . " days, " . $ans["hour"] . " hrs, "  . $ans["minute"] . " mins, ". $ans["second"] . " sec";
	}else if($ans["hour"] > 0){
	$dur =$ans["hour"] . " hrs, "  . $ans["minute"] . " mins, ". $ans["second"] . " sec";
	}else if($ans["minute"] > 0){
		$dur =$ans["minute"] . " mins, ". $ans["second"] . " sec";
	}else{
		$dur =$ans["second"] . " sec";
	}
	return $dur;	
}

$cnt=0;
$speed=0;
$dev_speed=0;
$dur=0;
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
$dev_speed=($speed/$cnt);
$dur=$dev_dist/$dev_speed;
$dur=$dur*60;
}

?>
			<div class="main-content">

				<div class="breadcrumbs" id="breadcrumbs">

					<ul class="breadcrumb">

						<li>

							<i class="icon-home home-icon"></i>

							<a href="index.php?page=profile&id=<?php echo $id; ?>">Home</a>



							<span class="divider">

								<i class="icon-angle-right arrow-icon"></i>

							</span>

						</li>
                        <li>
							<a href="track.php?page=trip&id=<?php echo $id; ?>">Trips</a>

							<span class="divider">
								<i class="icon-angle-right arrow-icon"></i>
							</span>
						</li>

						<li class="active">Trip Report </li>

					</ul><!--.breadcrumb-->



					
				</div>



				<div class="page-content">

					<div class="page-header position-relative">

						<h1>

							Trip Report 

                            <small>

								<i class="icon-double-angle-right"></i>

								Trip TRID<?php echo $trips['id']; ?>

							</small>

						</h1>

                        

					</div><!--/.page-header-->



					<div class="row-fluid">

						<div class="span12">

							<!--PAGE CONTENT BEGINS--><!--/row-->




                       
						
                        
							<div class="row-fluid">


								<table id="sample-table-2" class="table table-striped table-bordered table-hover">

									<thead>

										<tr>
											
											<th>Device</th>
											<th>Trip Name</th>
											<th>Start Time</th>
                                            <th>End Time</th>
											<th>Start Tag</th>
                                            <th>End Tag</th>
											<th>Status</th>
											<th>Distance Travelled</th>
                                            <th>Time Travelled</th>
                                            <th>Route Map</th>
                                            <th>Stop Time</th>
                                            <th>Idle Time</th>
                                            <th>Over Speeding</th>                                            

										</tr>

									</thead>



									<tbody>

                                    


										<tr>
											
											<td><?php echo $dev['device_name']; ?></td>
											<td ><a href="track.php?page=trip_view&id=<?php echo $id; ?>&id1=<?php echo $trips['id']; ?>"><?php echo $trips['trip_name']; ?></a></td>
											<td ><?php echo date("d-m-Y H:i:s",strtotime($start)); ?></td>
											<td ><?php echo date("d-m-Y H:i:s",strtotime($end)); ?></td>
                                            <td ><?php echo $trips['start_point']; ?></td>
											<td ><?php echo $trips['end_point']; ?></td>
                                            <td ><span class="label label-<?php echo $stat_label; ?>"><?php echo $trips['trip_status']; ?></span></td>
											<td ><?php echo round($dev_dist,2)." Km";?></td>
                                            <td ><?php echo round($dur,2). " minutes";?></td>
                                             <td id="route">
                                            <i class="icon-spinner icon-spin orange bigger-125" id="spin_m"></i>
                                           <button class="btn btn-info btn-small" id="bt_m" style="display:none">	
                                            	<i class="icon-caret-down" id="down_m"></i>  
                                                <i class="icon-caret-up" id="up_m" style="display:none"></i>
                                            </button>
                                          
                                            </td>                                           
                                            <td id="stop" >
                                             <i class="icon-spinner icon-spin orange bigger-125" id="spin_s"></i>
                                            <button class="btn btn-info btn-small" id="bt_s" style="display:none">	
                                         	    <i class="icon-caret-down" id="down_s"></i>  
                                                <i class="icon-caret-up" id="up_s" style="display:none"></i>
                                           </button></td>
                                             <td id="idle">
                                            <i class="icon-spinner icon-spin orange bigger-125" id="spin_i"></i>
                                           <button class="btn btn-info btn-small" id="bt_i" style="display:none">	
                                            	<i class="icon-caret-down" id="down"></i>  
                                                <i class="icon-caret-up" id="up" style="display:none"></i>
                                            </button>
                                          
                                            </td>
                                             <td id="speed">
                                            <i class="icon-spinner icon-spin orange bigger-125" id="spin_o"></i>
                                           <button class="btn btn-info btn-small" id="bt_o" style="display:none">	
                                            	<i class="icon-caret-down" id="down_o"></i>  
                                                <i class="icon-caret-up" id="up_o" style="display:none"></i>
                                            </button>
                                          
                                            </td>
                                            
										</tr>



									</tbody>

								</table>
                                <!--------------------------------------route map----------------->
                                 <div id="trip_map" style="display:none">
                                  <h3 class="header smaller lighter blue">Trip Route</h3>
                                  <div id="map_route" class="google-maps" style="height:250px;"></div>
                                 </div>

                                <!--------------------------------------stop----------------->
                                <div id="stop_data_div" style="display:none">
                                <h3 class="header smaller lighter blue">Stop Time</h3>
                                <div style="width:40%; height:250px; overflow:scroll; float:left; background:#e5e5e5;overflow-x: hidden;">
                                <table cellpadding="0" cellspacing="3" border="0" class="table table-striped table-bordered" id="stop_data"  style="cursor:pointer;">

									<thead>
                                    	<tr>
											<th style="display:none;">Vehicle</th>
											<th>From</th>
											<th>To</th>                                           
                                            <th>Duration</th>
                                            <th style="display:none">Address</th>                                       	
                                            <th style="display:none">Location</th>
									</tr>

									</thead>



									<tbody>
<?php
$sql="SELECT id,time_stamps,location_info,lat,lng FROM `gps_master` WHERE imei='$imei' AND device_status='A' AND time_stamps BETWEEN '$start' AND '$end' AND lower(msg) = 'acc off'";//echo $sql;
//$sql="select temp1.* from ( (SELECT @rownum:=@rownum + 1 as rownumber, s.* FROM ( select * from gps_master where imei = '$vid' and msg in ('acc on','acc off') order by time_stamps desc ) s, (SELECT @rownum := 0) r) temp join (SELECT @rownum1:=@rownum1 + 1 as rownumber, s.* FROM ( select * from gps_master where imei = '$vid' and msg in ('acc on','acc off') order by time_stamps desc ) s, (SELECT @rownum1 := 0) r) temp1 on temp.rownumber + 1 = temp1.rownumber ) where temp.time_stamps BETWEEN '$start' AND '$end' and temp.msg='acc off' and temp1.msg='acc on'";
$r=mysql_query($sql);
if($r!=FALSE){
while($rw=mysql_fetch_assoc($r)){


$sqln1="SELECT msg FROM `gps_master` WHERE imei='$imei' AND time_stamps BETWEEN '$start' AND '$end' AND id < ".$rw['id']." order by id desc limit 1";//;echo $sqln1;
$rn1=mysql_query($sqln1);
$rwn1=mysql_fetch_assoc($rn1);

if($rwn1['msg']!='acc off'){
/**/
$sql1="SELECT id,time_stamps FROM `gps_master` WHERE imei='$imei' AND device_status='A' AND time_stamps BETWEEN '$start' AND '$end' AND lower(msg) = 'acc on' and id > ".$rw['id']." limit 1";
$r1=mysql_query($sql1);
$rw1=mysql_fetch_assoc($r1);

$off_time=$rw['time_stamps'];	
$on_time=isset($rw1['time_stamps'])?$rw1['time_stamps']:((time()<strtotime($end))?date("Y-m-d H:i:s"):$end);

$difference=0;
$difference = strtotime($on_time)-strtotime($off_time);

if($difference > 0 ){
$dur=getDuration($difference);
?>
<tr id="dataRw<?php echo $rw2['id']; ?>" data-id="<?php echo $rw['id']; ?>">
										<td style="display:none;"><?php echo $vid;?></td>	
                                    	<td><?php echo date("M-d-Y H:i:s",strtotime($rw['time_stamps']));?></td>
                                        <td><?php echo date("M-d-Y H:i:s",strtotime($on_time));?></td>
                                        <td id="dur<?php echo $rw['id']; ?>"><?php echo $dur ;?></td>
                                        <td id="loc<?php echo $rw['id']; ?>" style="display:none"><?php echo $rw['location_info']; ?></td>
                                        <td class="loc_name" id="<?php echo $rw['id']; ?>" style="display:none;"><?php echo ($rw['lat']).",".($rw['lng']);?></td>

                                       
									</tr>
<?php							

}}}}

									else{
									?>

                                    <tr><td colspan="4">No over speed data found.</td></tr>

<?php  }?>									</tbody>

								</table>
                                </div> 
                                
                                
                                 <div style=" position:relative; height:100%; margin-left:40%;">
                                <div id="map_rpt" class="google-maps" style="height:250px; width:100%;" ></div>
                                	<div class="map-shadow-corner"></div>
                                    <div class="map-shadow-top"></div>
                                    <div class="map-shadow-left"></div>
                                    
                             </div>
                                
                                </div>
                                <!--------------------------------------/stop----------------->
                                <br/>
                                <!--------------------------------------idle----------------->
                                <div id="idle_data_div" style="display:none">
                                <h3 class="header smaller lighter blue">Idle Time</h3>
                                <div style="width:40%; height:250px; overflow:scroll; float:left; background:#e5e5e5;overflow-x: hidden;">

                                <table cellpadding="0" cellspacing="3" border="0" class="table table-striped table-bordered" id="idle_data" style="cursor:pointer;">

									<thead>
                                    	<tr>                                        	
											<th>From</th> 
                                            <th>To</th>
                                            <th>Idle Duration</th>
                                            <th style="display:none">LatLng</th>
										</tr>

									</thead>



									<tbody>
<?php
/*
$sql="                                                                                                                                            SELECT s.id,s.lat,s.lng,s.speed,s.location_info,s.time_stamps,if((                                                                                                                                            SELECT ifnull(lower(msg),'') from gps_master n where n.msg like '%acc o%' and n.id<s.id
limit 1 )='acc on' , 'on' , 'off' )as stat FROM gps_master s WHERE s.imei ='$vid' and s.time_stamps between '$start' and '$end'";
//echo $sql;

$r=mysql_query($sql);
if($r!=FALSE){
while($rw=mysql_fetch_assoc($r)){
	if($rw['stat']=='on' && $rw['speed']==0){
*/		//$points[]=$rw;


$sql="SELECT id,time_stamps FROM `gps_master` WHERE imei='$imei' AND device_status='A' AND time_stamps BETWEEN '$start' AND '$end' AND lower(msg) = 'acc on' ";//echo $sql;
$r=mysql_query($sql);
if($r!=FALSE && mysql_num_rows($r) > 0){
while($rw=mysql_fetch_assoc($r)){
	
$sqln1="SELECT msg FROM `gps_master` WHERE imei='$imei' AND time_stamps BETWEEN '$start' AND '$end' AND id < ".$rw['id']." order by id desc limit 1";//echo $sqln1;
$rn1=mysql_query($sqln1);
$rwn1=mysql_fetch_assoc($rn1);

if($rwn1['msg']!='acc on'){

$sql1="SELECT id,time_stamps FROM `gps_master` WHERE imei='$imei' AND time_stamps BETWEEN '$start' AND '$end' AND lower(msg) = 'acc off' and id > ".$rw['id']." limit 1";
$r1=mysql_query($sql1);
$rw1=mysql_fetch_assoc($r1);
	
$off_time=isset($rw1['time_stamps'])?$rw1['time_stamps']:$end;
$on_time_idle=$rw['time_stamps'];

$tdiff=0;
$sql_first="select temp.id,temp.lat,temp.lng,temp.speed from (SELECT @rownum:=@rownum + 1 as rownumber, s.* FROM ( select * from gps_master where imei = '$imei' and msg ='acc on' and time_stamps between '$on_time_idle' and '$off_time') s, (SELECT @rownum := 0) r) temp join (SELECT @rownum1:=@rownum1 + 1 as rownumber, s.* FROM ( select * from gps_master where imei = '$imei' and msg ='acc on' and time_stamps between '$on_time_idle' and '$off_time') s, (SELECT @rownum1 := 0) r) temp1 on temp.rownumber +1 = temp1.rownumber group by temp.speed,temp1.speed";
$rs_first=mysql_query($sql_first);
$rw_first=mysql_fetch_assoc($rs_first);
if(mysql_num_rows($rs_first)==1 and $rw_first['speed']==0){//only one idle
$tdiff=strtotime($off_time)-strtotime($on_time_idle);
	
if($tdiff > 0)
{
	$dur=getDuration($tdiff);

	?>
	 <tr id="dataRow<?php echo $rw_first['id']; ?>" data-id="<?php echo $rw_first['id']; ?>">
                                    	<td><?php echo date("M-d-Y H:i:s",strtotime($on_time_idle));?></td>
										<td><?php echo  date("M-d-Y H:i:s",strtotime($off_time)); ?></td>
                                        <td id="idle_dur_<?php echo $rw_first['id']; ?>"><?php echo $dur; ?></td>
                                        <td class="loc_name2" id="<?php echo $rw_first['id']; ?>" style="display:none;"><?php echo ($rw_first['lat']).",".($rw_first['lng']);?></td>
                                        

                                       
									</tr>
    <?php
}
	
}else{

$points=array();
//$sql2="SELECT time_stamps,speed FROM `gps_master` WHERE imei='$vid' AND device_status='A' AND time_stamps BETWEEN '".$rw['time_stamps']."' AND '$off_time'  AND lower(msg) NOT IN ('acc on','acc off')";
//$sql2="SELECT time_stamps,speed FROM `gps_master` WHERE imei='$imei' AND device_status='A' AND time_stamps BETWEEN '".$rw['time_stamps']."' AND '$off_time'";
$sql2="select if(stat='start',id2,id1) as id,if(stat='start',lat2,lat1) as lat,if(stat='start',lng2,lng1) as lng,if(stat='start',t2,t1) as time_stamps,stat from(select temp.id as id1,temp.lat as lat1,temp.lng as lng1,temp.time_stamps as t1,temp1.id as id2,temp1.lat as lat2,temp1.lng as lng2,temp1.time_stamps as t2, case when temp.speed<>0 and temp1.speed=0 then 'start' when temp.speed=0 and temp1.speed<>0 then 'end' end as stat from ((SELECT @rownum:=@rownum + 1 as rownumber, s.* FROM ( select * from gps_master where imei = '$imei' and msg ='acc on' and time_stamps between '$on_time_idle' and '$off_time') s, (SELECT @rownum := 0) r) temp join (SELECT @rownum1:=@rownum1 + 1 as rownumber, s.* FROM ( select * from gps_master where imei = '$imei' and msg ='acc on' and time_stamps between '$on_time_idle' and '$off_time') s, (SELECT @rownum1 := 0) r) temp1 on temp.rownumber +1 = temp1.rownumber )) sn where stat is not null";
//echo $sql2."<br/>";
$r2=mysql_query($sql2);
while($rw2=mysql_fetch_assoc($r2)){
	$points[]=$rw2;
	
}


/////////////////first rw is end
$tdiff=0;
if($points[0]['stat']=='end'){
	$tdiff=strtotime($points[0]['time_stamps'])-strtotime($on_time_idle);
	
if($tdiff > 0)
{
	$dur=getDuration($tdiff);

	?>
	 <tr id="dataRow<?php echo $points[0]['id']; ?>" data-id="<?php echo $points[0]['id']; ?>">
                                    	<td><?php echo date("M-d-Y H:i:s",strtotime($on_time_idle));?></td>
										<td><?php echo  date("M-d-Y H:i:s",strtotime($points[0]['time_stamps'])); ?></td>
                                        <td id="idle_dur_<?php echo $points[0]['id']; ?>"><?php echo $dur; ?></td>
                                        <td class="loc_name2" id="<?php echo $points[0]['id']; ?>" style="display:none;"><?php echo ($points[0]['lat']).",".($points[0]['lng']);?></td>
                                        

                                       
									</tr>
    <?php
}}
////////////first rec end

for($i=0; $i<sizeof($points); $i++){
	$j=$i+1;
	$tdiff=0;
	if($points[$i]['stat']=='start' && $points[$j]['stat']=='end'){
		$tdiff=strtotime($points[$j]['time_stamps'])-strtotime($points[$i]['time_stamps']);
		//$difference+=$tdiff;
		
if($tdiff > 0)
{
$dur=getDuration($tdiff);
?>

                                    <tr id="dataRow<?php echo $points[$i]['id']; ?>" data-id="<?php echo $points[$i]['id']; ?>">
                                    	<td><?php echo date("M-d-Y H:i:s",strtotime($points[$i]['time_stamps']));?></td>
										<td><?php echo  date("M-d-Y H:i:s",strtotime($points[$j]['time_stamps'])); ?></td>
                                        <td id="idle_dur_<?php echo $points[$i]['id']; ?>"><?php echo $dur; ?></td>
                                         <td class="loc_name2" id="<?php echo $points[$i]['id']; ?>" style="display:none;"><?php echo ($points[$i]['lat']).",".($points[$i]['lng']);?></td>
                                        

                                       
									</tr>
 <?php

}//if dur > 0
}
	}//for loop
	////////////////////last point
	$len=sizeof($points)-1;
	$tdiff=0;
	if($points[$len]['stat']=='start'){
	$tdiff=strtotime($off_time)-strtotime($points[$len]['time_stamps']);
	
	if($tdiff > 0)
{
$dur=getDuration($tdiff);
//echo $dur;
	?>
	 <tr id="dataRow<?php echo $points[$len]['id']; ?>" data-id="<?php echo $points[$len]['id']; ?>">
                                    	<td><?php echo date("M-d-Y H:i:s",strtotime($points[$len]['time_stamps']));?></td>
										<td><?php echo  date("M-d-Y H:i:s",strtotime($off_time)); ?></td>
                                        <td id="idle_dur_<?php echo $points[$len]['id']; ?>"><?php echo $dur; ?></td>
                                         <td class="loc_name2" id="<?php echo $points[$len]['id']; ?>" style="display:none;"><?php echo ($points[$len]['lat']).",".($points[$len]['lng']);?></td>
                                        

                                       
									</tr>
    <?php
}}

////////////last rec	
	
}//!only one idle
	
}//prev is not on
}//while on

}//if on

									else{
										$data=false;
									?>

                                    <tr><td colspan="4">No idling data found.</td></tr>

<?php  }?>

									</tbody>

								</table>
                                 </div> 
                                
                                
                                 <div style=" position:relative; height:100%; margin-left:40%;">
                                <div id="map_rpt2" class="google-maps" style="height:250px; width:100%;" ></div>
                                	<div class="map-shadow-corner"></div>
                                    <div class="map-shadow-top"></div>
                                    <div class="map-shadow-left"></div>
                                    
                             </div>

</div>

<!---------------idle end---------------------->
<br />
<!------------over speed--------------------->

<div id="speed_data_div" style="display:none">
<h3 class="header smaller lighter blue">Over Speeding</h3>
<div style="width:40%; height:250px; overflow:scroll; float:left; background:#e5e5e5">
<table cellpadding="0" cellspacing="3" border="0" class="table table-striped table-bordered" id="speeding_data" style="cursor:pointer">
									<thead>
                                    	<tr>
                                        	<th>Date</th>
											<th>Speed</th>
											<th style="display:none;">LatLong</th>
                                            <th style="display:none;">Location</th>
										</tr>
									</thead>
									<tbody>

<?php
$sql="SELECT * FROM speed_alert_log WHERE imei='$imei'  AND time_stamp BETWEEN '$start' AND '$end' ORDER BY time_stamp desc";
$r=mysql_query($sql);
if(mysql_num_rows($r) > 0){
while($rw=mysql_fetch_assoc($r)){
									?>
									<tr id="dataOSpeed<?php echo $rw['id']; ?>" data-id="<?php echo $rw['id']; ?>" >
										<td><?php echo date("M-d-Y H:i:s",strtotime($rw['time_stamp']));?></td>
										<td id="speed<?php echo $rw['id']; ?>"><?php echo $rw['speed'];?> KM/HR</td>
                                        <td class="loc_name_speed" id="<?php echo $rw['id']; ?>" style="display:none;"><?php echo ($rw['lat']).",".($rw['lng']);?></td>
                                        <td id="loc_sp_<?php echo $rw['id']; ?>" style="display:none;" > </td>
									</tr>
									<?php							
									}}

									else{
									?>

                                    <tr><td colspan="4">No over speed data found.</td></tr>

<?php  }?>						</tbody>

								</table>

                                

                                
</div> 
                                
                            <div style=" position:relative; height:100%; margin-left:40%;">
                                <div id="map_speed" class="google-maps" style="height:250px; width:100%;" ></div>
                                	<div class="map-shadow-corner"></div>
                                    <div class="map-shadow-top"></div>
                                    <div class="map-shadow-left"></div>
                                    
                             </div>

	

</div>

<!------------over speed end--------------------->

							</div>





						</div><!--/.span-->

					</div><!--/.row-fluid-->

				</div><!--/.page-content-->



			</div><!--/.main-content-->

		</div><!--/.main-container-->



<?php include "include/footer.php"; ?>
		<script src="assets/js/jquery.dataTables.min.js"></script>

		<script src="assets/js/jquery.dataTables.bootstrap.js"></script>
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

		<!--inline scripts related to this page-->



		<script type="text/javascript">

			$(function() {

/*				var oTable1 = $('#sample-table-2').dataTable( {

				"aoColumns": [

			     null,null, null,null, null,
				  null,null,null,null, null,null,null,

				 

				] } );

				
*/
				$("#spin_i").hide();
				$("#spin_s").hide();
				$("#spin_m").hide();
				$("#spin_o").hide();
				$("#bt_i").show();
				$("#bt_s").show();
				$("#bt_m").show();
				$("#bt_o").show();
				
				var lat_start = <?php echo ($rws1['lat']); ?> ;
	  			var lng_start = <?php echo ($rws1['lng']); ?> ;
	   
				$("#idle").click(function(e) {
                    $("#idle_data_div").toggle();
					$("#down").toggle();
					$("#up").toggle();
					if( $( "#idle" ).is( ":visible" )){
						google.maps.event.trigger(map2, "resize");
						var point=new google.maps.LatLng(lat_start, lng_start);	
						map2.panTo(point);		
					
						$('html, body').animate({
							scrollTop: $("#idle_data_div").offset().top
						}, 1000);
					}
					    
                });
				$("#stop").click(function(e) {
                    $("#stop_data_div").toggle();
					$("#down_s").toggle();
					$("#up_s").toggle();
					if( $( "#stop" ).is( ":visible" )){
						google.maps.event.trigger(map, "resize");
						var point=new google.maps.LatLng(lat_start, lng_start);	
						map.panTo(point);
						$('html, body').animate({
							scrollTop: $("#stop_data_div").offset().top
						}, 1000);
					}
                });
				$("#speed").click(function(e) {
                    $("#speed_data_div").toggle();
					$("#down_o").toggle();
					$("#up_o").toggle();
					if( $( "#speed" ).is( ":visible" )){
						google.maps.event.trigger(map_speed, "resize");
						var point=new google.maps.LatLng(lat_start, lng_start);	
						map_speed.panTo(point);
						$('html, body').animate({
							scrollTop: $("#speed_data_div").offset().top
						}, 1000);
					}
                });
				$("#route").click(function(e) {
                    $("#trip_map").toggle();
					$("#down_m").toggle();
					$("#up_m").toggle();
					if( $( "#route" ).is( ":visible" )){
						google.maps.event.trigger(map_route, "resize");
						
						
		
	   
 	var pinColor = "0F5B0D";
    var pinImage = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|" + pinColor,
        new google.maps.Size(21, 34),
        new google.maps.Point(0,0),
        new google.maps.Point(10, 34));

								var point=new google.maps.LatLng(lat_start, lng_start);	
								var marker_s = new google.maps.Marker({
									position: point,
									map: map_route,
									title:"Start Location",
									icon:pinImage

								  }); 
								   map_route.panTo(point);		

	   var lat_e = <?php echo $rwe2['lat']; ?>;
	   var lng_e = <?php echo $rwe2['lng']; ?> ;
	  
	   
	   var pinColor = "D01A17";
    var pinImage = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|" + pinColor,
        new google.maps.Size(21, 34),
        new google.maps.Point(0,0),
        new google.maps.Point(10, 34));
	   
	  							 var point=new google.maps.LatLng(lat_e, lng_e);	
								var marker_e = new google.maps.Marker({
									position: point,
									map: map_route,
									title:"End Location",
									icon:pinImage

								  }); 
					}//if visible route map
                });
				


				$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});

				/*******stop*********/
				
  var mapOptions = {    zoom: 15,
    center: new google.maps.LatLng(<?php echo $customer_latlng; ?>),
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
    var map = new google.maps.Map(document.getElementById('map_rpt'), mapOptions);
    var map2 = new google.maps.Map(document.getElementById('map_rpt2'), mapOptions);
    var map_speed = new google.maps.Map(document.getElementById('map_speed'), mapOptions);

		var markers=[];
		var image = new google.maps.MarkerImage(
  				'assets/images/marker-images/image.png',
  				new google.maps.Size(20,21),
  				new google.maps.Point(0,0),
  				new google.maps.Point(10,21)
			);


	$('.loc_name').each(function() {
		//alert("dfv");
		var id=this.id;
		var latLng=$(this).html();		

		var lat_lan = latLng.split(",", 2);
		var point=new google.maps.LatLng(parseFloat(lat_lan[0]), parseFloat(lat_lan[1]));
			

			var marker = new google.maps.Marker({
 				flat: true,
  				icon: image, 
  				map: map,
  				optimized: false,
  				position: point,
  				title: 'Stop Point',
  				visible: true

			});
			markers[id]=marker;
			

			var infoWindow = new google.maps.InfoWindow();
			google.maps.event.addListener(marker, 'mouseout', function() {
				infoWindow.close();

  			});

			var dur=$("#dur"+id).html();	
			var html='<strong>Duration: '+dur+'</strong>';
			google.maps.event.addListener(marker, 'mouseover', function() {
				infoWindow.setContent(html);
				infoWindow.open(map, marker);

			});


	});
	
$('[id^="dataRw"]').click(function() {
		var id=$(this).attr("data-id");
		var latLng=$("#"+id).html();	
		var lat_lan = latLng.split(",", 2);
		var point=new google.maps.LatLng(parseFloat(lat_lan[0]), parseFloat(lat_lan[1]));
		//alert(point);
		//if(!map.getBounds().contains(point))
         map.panTo(point);		 
		 google.maps.event.trigger(markers[id], 'mouseover');	
		
});

/******idle******/
		var markers2=[];


	$('.loc_name2').each(function() {
		//alert("dfv");
		var id=this.id;
		var latLng=$(this).html();		

		var lat_lan = latLng.split(",", 2);
		var point=new google.maps.LatLng(parseFloat(lat_lan[0]), parseFloat(lat_lan[1]));

			var marker_n = new google.maps.Marker({
 				flat: true,
  				icon: image, 
  				map: map2,
  				optimized: false,
  				position: point,
  				title: 'Idle Point',
  				visible: true

			});
			markers2[id]=marker_n;
			

			var infoWindow = new google.maps.InfoWindow();
			google.maps.event.addListener(marker_n, 'mouseout', function() {
				infoWindow.close();

  			});

			

			var duratn=$("#idle_dur_"+id).html();	
						
			var labl_html='<strong>Duration: '+duratn+'</strong>';
			google.maps.event.addListener(marker_n, 'mouseover', function() {
				infoWindow.setContent(labl_html);
				infoWindow.open(map2, marker_n);

			});
	});
	
$('[id^="dataRow"]').click(function() {

		var id=$(this).attr("data-id");
		var latLng=$("#"+id).html();	
		var lat_lan = latLng.split(",", 2);
		var point=new google.maps.LatLng(parseFloat(lat_lan[0]), parseFloat(lat_lan[1]));
         map2.panTo(point);		 
		 google.maps.event.trigger(markers2[id], 'mouseover');	
		
});
/**********over speed*************/

$('.loc_name_speed').each(function() {
		var id=this.id;
		var latLng=$(this).html();		
		var lat_lan = latLng.split(",", 2);
		var point=new google.maps.LatLng(parseFloat(lat_lan[0]), parseFloat(lat_lan[1]));
		var loc =$("#loc_sp_"+id).html();	

		var marker = new google.maps.Marker({					
									flat: true,					
									icon: image,
									map: map_speed,					
									optimized: false,					
									position: point,					
									title: 'Over Speed',					
									visible: true
					
								});
								markers[id]=marker;
								
								var infoWindow = new google.maps.InfoWindow();
								google.maps.event.addListener(marker, 'mouseout', function() {					
									infoWindow.close();
					
								});
					
								
					
								var loc=$("#loc_sp_"+id).html();					
								var speed=$("#speed"+id).html();
								var html='<strong>Speed: '+speed+'</strong>';
								google.maps.event.addListener(marker, 'mouseover', function() {
									infoWindow.setContent(html);
									infoWindow.open(map_speed, marker);
					
								});
			
		
		

	});
	
$('[id^="dataOSpeed"]').click(function() {
		var id=$(this).attr("data-id");
		var latLng=$("#"+id).html();		
		var lat_lan = latLng.split(",", 2);
		var point=new google.maps.LatLng(parseFloat(lat_lan[0]), parseFloat(lat_lan[1]));
         map_speed.panTo(point);
		 google.maps.event.trigger(markers[id], 'mouseover');	
		
});

			
			
			/***********route***********/
  var flightPath;


  var mOptions = {
    zoom: 16,
    center: new google.maps.LatLng(<?php echo $customer_latlng; ?>),
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  var map_route = new google.maps.Map(document.getElementById('map_route'),mOptions);

	  


  var flightPlanCoordinates = [

   <?php

$sqla="SELECT lat,lng,time_stamps FROM `gps_master` WHERE imei='$imei' AND time_stamps BETWEEN '$start' AND '$end' AND  lat between 7 and 35 and lng between 65 and 95 GROUP BY lat,lng  ORDER BY time_stamps";
$rsa=mysql_query($sqla);
while($rwa=mysql_fetch_assoc($rsa)){
    echo "new google.maps.LatLng(".($rwa['lat']).",".($rwa['lng'])."),";
	 } ?>
  ];

 var lineSymbol = {
    path: google.maps.SymbolPath.CIRCLE,
    scale: 5,
    strokeColor: '#393'
  };
  
  
   flightPath = new google.maps.Polyline({
    path: flightPlanCoordinates,
    geodesic: true,
    strokeColor: '#307ECC',
    strokeOpacity: 1.0,
    strokeWeight: 2,
/*	icons: [{
      icon: lineSymbol,
      offset: '100%'
    }],
*/
  });



  flightPath.setMap(map_route);

   //animateCircle(flightPath);




/********************/




/**********/
			})


function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('table')
					var off1 = $parent.offset();
					var w1 = $parent.width();
					var off2 = $source.offset();
					var w2 = $source.width();
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
				
		</script>

	</body>

</html>

