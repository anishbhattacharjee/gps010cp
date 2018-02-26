
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
 
    
  	
	  <div id="myown" class="row-fluid" style="width:100%;height:250px;">
	  	<div class="span9">
		 <table data-toggle="table"  data-cache="false" data-pagination="true" data-show-refresh="true" data-search="true" id="table-pagination" data-sort-order="desc">
   
										<thead>
											<tr>
												<th data-field="slno"  data-sortable="true">Sl.No</th>
												<th data-field="name"  data-sortable="true">Device Name</th>
																				
												<th <?php  if($id==509){ ?> style="display:none" <?php } ?>>Imei No.</th>
												<th data-field="datetime"  data-sortable="true">Date Time</th>												
												<th>Speed</th>												
												<th>Location Info</th>
												<th>Status</th>
												<?php if($id==776 || $id==837){?>
												<th>Door Status</th>	
												<?php } ?>
												<?php if($id==38 || $id==785 || $id==831){?>
												<th>Temperature</th>	
												<?php } ?>
												<?php if($id==509){?>
												<th>Sensor1</th>	
												<th>Sensor2</th>
												<th>Door Status</th>	
												<?php } ?>
												<th>GPS Status</th>
                                                <th style="display:none;"></th>
                                                
											</tr>
										</thead>
										<tbody>
<?php
$slno=1;

if(isset($rs[0]) && $rs[0]){

foreach($rs['data'] as $rw){
	$time_field='device_time';
	$start=date('Y-m-d 00:00:00');
	$end=date("Y-m-d H:i:s");
	
	$rs2=$this->action_model->GetData('latest_records',array("lat","lng","speed","engine_status as msg","device_time as $time_field"),
	array('imei'=>$rw['imie_no']));
	if(isset($rs2[0]) && $rs2[0]){
 	$rw2=$rs2['data'][0];
	if($rw2[$time_field]=='0000-00-00 00:00:00'){
		$rs2=$this->action_model->GetData('gps_master',array("lat","lng","speed","device_status as status","$time_field","msg"),
		array('imei'=>$rw['imie_no']));
		
		$rw2=$rs2['data'];
	}
 }else{
	$rs2=$this->action_model->GetData('gps_master',array("lat","lng","speed","device_status as status","$time_field","msg"),
		array('imei'=>$rw['imie_no']),1,"$time_field");
 
	$rw2=$rs2['data'];
 }
 
	$speed=$rw2['speed'];	
	$msg=$rw2['msg'];	
	
 $lat=$rw2['lat'];
 $lng=$rw2['lng'];

 $res = $this->track_model->someinfo($lat,$lng);

if(isset($res[0]) && $res[0]){
	foreach ($res['data'] as $z) {
		$location=$z['asciiname'];
		$state_code_o=$z['admin1 code'];
		$state_code=intval($z['admin1 code']);
		$city_code=$z['admin2 code'];
		$state='';
		$city='';
		if($state_code>=0){
			$g=$this->action_model->GetData('states',array("*"), array('id'=>$state_code),1);

			if(isset($g[0]) && $g[0]){
				$st=$g['data'][0];
				$state=$st['name'];
			}
		}
		if($state_code_o!='' && $city_code!=''){
			$city_id="IN.$state_code_o.$city_code";
			$gc=$this->action_model->GetData('cities',array("*"), array('city_id'=>$city_id),1);
			if(isset($gc[0]) && $gc[0]){
				$cityr= $gc['data'][0];
				$city=$cityr['name2'];
			}
		}
		$last_location="$location, $city,  $state, INDIA";
	}	                 
}	

	//end of get location
	$last_signal=date("d-m-Y H:i:s",strtotime($rw2[$time_field]));	
	//$last_diff=( strtotime(date("Y-m-d H:i:s")) - strtotime($rw2[$time_field]) )/60/60;
	$rshuy=$this->action_model->GetData('latest_records',array("TIMESTAMPDIFF(HOUR,time_stamp,now())as diff","TIMESTAMPDIFF(MINUTE,device_time,now()) as minutediff"),
	array('imei'=>$rw['imie_no']),1,"time_stamp");
	
	if(isset($rshuy[0]) && $rshuy[0]){
		$rwhg= $rshuy['data'][0];	
	}else{
		$rshuy=$this->action_model->GetData('gps_master',array("TIMESTAMPDIFF(HOUR,time_stamps,now())as diff","TIMESTAMPDIFF(MINUTE,device_time,now()) as minutediff"),
		array('imei'=>$rw['imie_no']),1,"time_stamp DESC");
		
			
		$rwhg=$rshuy['data'][0];	
	}
	$last_diff=$rwhg['diff'];
	$minute_diff=$rwhg['minutediff'];
	$uq="";
	if($minute_diff > 30 && $msg=='acc on'){
		$uq="update latest_records set engine_status='acc off', speed=0 where imei='".$rw['imie_no']."'";
		mysql_query($uq);
		$speed=0;	
		$msg='acc off';	
	}
	
	
	
	if($id==38 || $id==785 || $id==831){//temperature
		$qygyr="SELECT temp FROM gps_master WHERE imei='".$rw['imie_no']."' $time_field DESC LIMIT 1";
		$rgcg=mysql_query($qygyr);
		$rwtemp=mysql_fetch_assoc($rgcg);
	}
	
?>
				<tr class="dev_loc" id="<?php echo $slno; ?>" data-inst="<?php echo $rw['instatllation_id']; ?>">
				<td class="center">	<?php //echo $slno; ?></td>
				<td id="model<?php echo $slno; ?>" data-id="<?php echo $slno; ?>"><a href="#"><?php echo $rw['device_name']; ?></a></td>
				
				<td id="imei_no<?php echo $slno; ?>" <?php  if($id==509){ ?> style="display:none" <?php } ?>		><?php echo $rw['imie_no']; ?></td>
				<td id="l_sig<?php echo $slno; ?>"><?php echo $last_signal;//echo date('d-m-Y h:m:i');?></td>			
				<td id="speed<?php echo $slno; ?>" ><?php echo $speed; ?>KM/HR</td>				
				<td id="loccc<?php echo $slno; ?>"> <?php echo $last_location;?></td>
				<td id="curr_stat<?php echo $slno; ?>" style="text-transform: capitalize;"></td>
				<?php if($id==776 || $id==837){?>
				<!--<td id="sas_door<?php echo $slno;?>" class="center" style="background:chartreuse"><?php echo $rwdoor['door_status']; ?></td>-->	
				<td id="door<?php echo $slno;?>" class="center"><span id="dstat<?php echo $slno;?>" class="<?php //echo $door_class; ?>"><?php //echo $door;?></span><span id="ddate<?php echo $slno;?>"> <?php //echo $doordt; ?></span></td>
				<?php } ?>
				<?php if($id==38 || $id==785 || $id==831){?>
				<td id="temp<?php echo $slno;?>" class="center" style="background:chartreuse"><?php echo $rwtemp['temp']; ?>&deg; c</td>	
				<?php } ?>
				<?php if($id==509){?>
				<td id="temp<?php echo $slno;?>" class="center" style="background:chartreuse">	<?php //echo round($rw2['temperature1'],1); ?>&deg; c</td>
				<td id="sensor<?php echo $slno;?>" class="center" style="background:cornflowerblue">	<?php //echo round($rw2['temperature2'],1); ?>&deg; c</td>
				<td id="door<?php echo $slno;?>" class="center"><span id="dstat<?php echo $slno;?>" class="<?php //echo $door_class; ?>"><?php //echo $door;?></span><span id="ddate<?php echo $slno;?>"> <?php //echo $doordt; ?></span></td>
				<?php } ?>
				<td id="gprs<?php echo $slno; ?>" ><img alt="Everything is fine" border=1 src="<?=base_url();?>assets/images/pages/fine.gif" class="imageStyle" style="vertical-align: middle;"></td>	
				<td style="display:none;"> 		
				<span id="lat<?php echo $slno; ?>"><?php echo $rw2['lat']; ?></span>
				<span id="lng<?php echo $slno; ?>"><?php echo $rw2['lng']; ?></span>
                <span id="spd<?php echo $slno;?>"><?php  echo $speed;?></span>
                <span id="eng<?php echo $slno;?>"><?php  echo $msg;?></span>
                <span id="lssig<?php echo $slno;?>"><?php  echo $last_diff;?></span>
                <span id="cat<?php echo $slno;?>"><?php  echo strtolower($rw['category_type']);?></span>
				<span id="devid<?php echo $slno;?>"><?php  echo $rw['device_id'];?></span>
				<span id="dbcat<?php echo $slno;?>"><?php  echo $rw['category_id'];?></span>
				<span id="img<?php echo $slno;?>"><?php  echo $rw['image'];?></span>				
				</td>
				<input id="latlng"  type="hidden" value="<?php echo $rw2['lat'].",".$rw2['lng']; ?>">
				</tr>
<?php $slno++;}
}else{?>
<tr>
<td colspan="7"> No devices found</td>
</tr>										
<?php } ?>
										</tbody>
									</table>
								</div>
<div class="span3" style=" margin-left:1%;">
<div class="tabbable">
										<ul class="nav nav-tabs" id="myTab">
											<li class="active" id="nstatus">
												<a data-toggle="tab" href="#nstatussum">
													<i class="green icon-dashboard bigger-110"></i>
													Vehicles
												</a>
											</li>
											<li class="" id="pstatus">
												<a data-toggle="tab" href="#pstatussum">
													Personal Trackers												
												</a>
											</li>
											
										</ul>
										<div class="tab-content">
											<div id="nstatussum" class="tab-pane active">
												<div >
													
													<div class="infobox-container class1" onclick="filterMarkers('moving');" style="cursor: pointer">
														<div class="infobox infobox-green infobox-small span4">
															<div class="infobox-data">
																<div class="infobox-content">Moving</div>
																<div class="infobox-content">vehicles</div>
															</div>
														</div>
														<div class="infobox infobox-green infobox-small span4">
															<div class="infobox-icon icon_num" id="moving">0</div>
															
														</div>
														<div class="infobox infobox-green infobox-small span4">
															<div class="infobox-icon">
					                                            <i class="icon-play icon-2x green"></i>
					                                        </div>
														</div>                                    
													</div>
													<div class="infobox-container class1" onclick="filterMarkers('idle');" style="cursor: pointer">
														<div class="infobox infobox-orange infobox-small span4">
															<div class="infobox-data">
																<div class="infobox-content">Idling</div>
																<div class="infobox-content">vehicles</div>
															</div>
														</div>
														<div class="infobox infobox-orange infobox-small span4">
															<div class="infobox-icon icon_num" id="idling">0</div>
															
														</div>
														<div class="infobox infobox-orange infobox-small span4">
															<div class="infobox-icon">
					                                            <i class="icon-pause icon-2x orange"></i>
					                                        </div>
														</div>                                    
													</div>
													
													<div class="infobox-container class1" onclick="filterMarkers('engine off');" style="cursor: pointer">
														<div class="infobox infobox-blue infobox-small span4">
															<div class="infobox-data">
																<div class="infobox-content">Parked</div>
																<div class="infobox-content">vehicles</div>
															</div>
														</div>
														<div class="infobox infobox-blue infobox-small span4">
															<div class="infobox-icon icon_num" id="stopped">0</div>
															
														</div>
														<div class="infobox infobox-blue infobox-small span4">
															<div class="infobox-icon">
					                                            <i class="icon-stop icon-2x blue"></i>
					                                        </div>
														</div>                                    
													</div>
													
													<div class="infobox-container class1"  onclick="filterMarkers('inactive');" style="cursor: pointer">
														<div class="infobox infobox-red infobox-small span4">
															<div class="infobox-data">
																<div class="infobox-content">Inactive</div>
																<div class="infobox-content">vehicles</div>
															</div>
														</div>
														<div class="infobox infobox-red infobox-small span4">
															<div class="infobox-icon icon_num" id="inactive">0</div>
															
														</div>
														<div class="infobox infobox-red infobox-small span4">
															<div class="infobox-icon">
					                                            <i class="icon-ban-circle icon-2x red"></i>
					                                        </div>
														</div>                                    
													</div>
													<div class="infobox-container class1" onclick="filterMarkers('all');" style="cursor: pointer">
														<div class="infobox infobox-blue2   infobox-small span4">
															<div class="infobox-data">
																<div class="infobox-content">Total</div>
																<div class="infobox-content">vehicles</div>
															</div>
														</div>
														<div class="infobox infobox-blue2 infobox-small span4">
															<div class="infobox-icon icon_num" id="total_status">0</div>
															
														</div>
														<div class="infobox infobox-blue2 infobox-small span4">
															<div class="infobox-icon">
					                                            <i class="icon-car icon-2x blue2"></i>
					                                        </div>
														</div>                                    
													</div>
													
												</div><!----/status---->
											</div><!----/tab1---->
											<div id="pstatussum" class="tab-pane">
												<div >
													
													<div class="infobox-container class1" onclick="filterMarkers('tracker-active');" style="cursor: pointer">
														<div class="infobox infobox-green infobox-small span4">
															<div class="infobox-data">
																<div class="infobox-content">Active</div>
																<div class="infobox-content">devices</div>
															</div>
														</div>
														<div class="infobox infobox-green infobox-small span4">
															<div class="infobox-icon icon_num" id="p_active">0</div>
															
														</div>
														<div class="infobox infobox-green infobox-small span4">
															<div class="infobox-icon">
					                                            <i class="icon-play icon-2x green"></i>
					                                        </div>
														</div>                                    
													</div>
													<div class="infobox-container class1" onclick="filterMarkers('tracker-inactive');" style="cursor: pointer">
														<div class="infobox infobox-red infobox-small span4">
															<div class="infobox-data">
																<div class="infobox-content">Inactive</div>
																<div class="infobox-content">devices</div>
															</div>
														</div>
														<div class="infobox infobox-red infobox-small span4">
															<div class="infobox-icon icon_num" id="p_inactive">0</div>
															
														</div>
														<div class="infobox infobox-red infobox-small span4">
															<div class="infobox-icon">
					                                            <i class="icon-stop icon-2x red"></i>
					                                        </div>
														</div>                                    
													</div>
													<div class="infobox-container class1" onclick="filterMarkers('all');" style="cursor: pointer">
														<div class="infobox infobox-blue2 infobox-small span4">
															<div class="infobox-data">
																<div class="infobox-content">Total</div>
																<div class="infobox-content">devices</div>
															</div>
														</div>
														<div class="infobox infobox-blue2 infobox-small span4">
															<div class="infobox-icon icon_num" id="p_tot_stat">0</div>
															
														</div>
														<div class="infobox infobox-blue2 infobox-small span4">
															<div class="infobox-icon">
					                                            <i class="icon-user icon-2x blue2"></i>
					                                        </div>
														</div>                                    
													</div>
													
													
												</div><!----/personal status-------->
											</div>
											
										</div>
									</div>
									
									
								
								
								
								<div class="space-6"></div>
								
									
								</div>
</div>
</div>
<style>
#stats_db .infobox{
	height:auto;
}
.icon_num{
font-size: 22px;
margin: 2px 0px 0px 4px;
position: relative;
text-shadow: 1px 1px 0 rgba(0,0,0,0.15);
}
.class1>.infobox-small {
*width: 104px !important;
margin:0;
}
.infobox-small{	
	height:60px;
}
.infobox-container.class1{	
	height:60px;
}
.gm-style-iw{
	width:auto !important;
	height:auto !important;
}
</style>
  </div><!--/.page-content-->
			
			</div><!--/.main-content-->
		</div><!--/.main-container-->
		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">
			<i class="icon-double-angle-up icon-only bigger-110"></i>
		</a>

<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCNMfm4IoavTQbIjDH42fNQF31v4BkT8e0&sensor=false&v=3.exp"></script>
<script>
var geocoder;
var map;
var infowindow = new google.maps.InfoWindow();
var marker;
var markers=[];
	$(function(){
	
	
		
		var stat_array=new Array();
		var moving = 0;
		var idle = 0;
		var engine_ct=0;
		var engine_ia=0;
								  
								  
		var mapCenter=new google.maps.LatLng(<?php echo $userinfo['customer_latlng']; ?>);
		var mapProp = {
		  center:mapCenter,
		  zoom:10,
		  maxZoom: 18,
		  mapTypeId:google.maps.MapTypeId.ROADMAP
		  };
		 map=new google.maps.Map(document.getElementById("googleMap"),mapProp);	
		var geocoder = new google.maps.Geocoder();
		var bounds = new google.maps.LatLngBounds();
		$("td[id^='model']").click(function(e){ 
			var id=$(this).data('id');//console.log(id);
			var lat=$("#lat"+id).html();
			var lan =$("#lng"+id).html();	
			var point=new google.maps.LatLng(parseFloat(lat), parseFloat(lan));
			
			if(lat && lan){//alert(point);
				if(!map.getBounds().contains(point)){
									map.panTo(point);
				}
				map.setZoom(16);
				google.maps.event.trigger(markers[id], 'mouseover');
	
			}
			
		});
			var image = new google.maps.MarkerImage(
  				'assets/images/marker-images/image.png',
  				new google.maps.Size(20,21),
  				new google.maps.Point(0,0),
  				new google.maps.Point(10,21)
			);
	$('.dev_loc').each(function() {
	
		
		var id=this.id;
		var instid=$(this).data("inst");
		var lat=$("#lat"+id).html();if(lat=='' || lat==null){lat=12.97385;}		
		var lan =$("#lng"+id).html();if(lan=='' || lan==null){lan=77.60374;}	
		var loc =$("#loc"+id).html();
		var engine=$("#eng"+id).html();var engg=engine;if(engine=='' || engine==null){engine='acc off';}
		var speed=$("#spd"+id).html();if(speed=='' || speed==null){speed=0;}
		var last_signal=$("#lssig"+id).html();if(last_signal=='' || last_signal==null){last_signal=1000;}
		var cat=$("#cat"+id).html();
		var devid=$("#devid"+id).html();
		var dbcat=$("#dbcat"+id).html();
		var imei_no=$("#imei_no"+id).html();
		
		//console.log(id);
		var custom_marker=get_custom_marker(engg, speed, last_signal,cat,devid,dbcat);
		var curr_status=get_curr_status(engg, speed, last_signal,devid,dbcat);
		
		
		stat_array.push(curr_status);
		
		$("#curr_stat"+id).html(curr_status);
		$("#live_dev"+instid).attr("data-cat",curr_status);
		if(curr_status=='inactive' || curr_status=='tracker-inactive'){
			$("#gprs"+id+" > img").attr("src","<?=base_url()?>assets/images/pages/open.PNG");
		}
		
		
		
		//location
		var point=new google.maps.LatLng(parseFloat(lat), parseFloat(lan));	//console.log(point);
		//alert(loc);
	
			var marker = new google.maps.Marker({
 				flat: true,
  				icon: custom_marker,
  				map: map,
  				optimized: false,
  				position: point,
  				title: 'I might be here',
  				//visible: true 
  				category: curr_status
			});
			markers[id]=marker;
			
			var infoWindow = new google.maps.InfoWindow();
			google.maps.event.addListener(marker, 'mouseout', function() {
				infoWindow.close();
  			});
			
			//var loc=$("#loc1").html();	
			//var loc=$("#loc"+id).html();
			var speed=$("#speed"+id).html();
			var model=$("#model"+id).html();
			var img=$("#img"+id).html();
			
			var html='<div style="min-width:200px;"><p class="iw"><strong>'+model+'</strong><div><img src="http://ogtslive.com/gps/modeluploads/'+img+'" width="50" height="50" style="margin: 2px;" /><div style="float:right">Status: '+curr_status+'<br />'+'Speed: '+speed+'<br />'+'IMEI: '+imei_no+'<br /></div></div></p></div>';
			google.maps.event.addListener(marker, 'mouseover', function() {
				infoWindow.setContent(html);
				infoWindow.open(map, marker);
			});
			//infoWindow.setContent(html);
			//infoWindow.open(map, marker);
		bounds.extend(point);
        });//each loc
       map.fitBounds(bounds);      
     	// console.log(stat_array);	
		var moving = stat_array.filter(function(value) { return value == 'moving' }).length;
		var idle = stat_array.filter(function(value) { return value == 'idle' }).length;
		var engine_ct = stat_array.filter(function(value) { return value == 'engine off' }).length;
		var engine_ia = stat_array.filter(function(value) { return value == 'inactive' }).length;
		var total_status=parseInt(moving)+parseInt(idle)+parseInt(engine_ct)+parseInt(engine_ia);
		
		var pt_a = stat_array.filter(function(value) { return value == 'tracker-active' }).length;
		var pt_ia = stat_array.filter(function(value) { return value == 'tracker-inactive' }).length;
		var p_tot_stat=parseInt(pt_a)+parseInt(pt_ia);
		$("#moving").html(moving);
		$("#idling").html(idle);
		$("#stopped").html(engine_ct);
		$("#inactive").html(engine_ia);
		$("#total_status").html(total_status);
		
		$("#p_active").html(pt_a);
		$("#p_inactive").html(pt_ia);
		$("#p_tot_stat").html(p_tot_stat);
		
		
		if(moving<=0 && idle<=0 && engine_ct<=0 && engine_ia<=0 && pt_a<=0 && pt_ia<=0){
			$("#pstatussum").hide();
			$("#pstatus").hide();
			$("#nstatussum").addClass("active");
			$("#nstatus").addClass("active");
		}
		else if(moving<=0 && idle<=0 && engine_ct<=0 && engine_ia<=0){
			$("#nstatussum").hide();
			$("#nstatus").hide();
			$("#pstatussum").addClass("active");
			$("#pstatus").addClass("active");			
		}
		else if(pt_a<=0 && pt_ia<=0){
			$("#pstatussum").hide();
			$("#pstatus").hide();
			$("#nstatussum").addClass("active");
			$("#nstatus").addClass("active");	
		}		
		
		
	
	
	
	 
	<?php if($id==502 && $sosalert)	{ ?>
	(function pulse(){
		   		
		        $('#pulsate-crazy-target').delay(200).fadeOut('slow').delay(50).fadeIn('slow',pulse);
		    })();
			/*
			 $('#pulsate-crazy-stp').mouseover(function(e){
			 	$('#pulsate-crazy-target').stop(true, true).fadeIn();
			 });*/	   
		         
	<?php } ?>
	
	<?php if($id==38 || $id==509 || $id==776 || $id==785 || $id==831 || $id==837){ ?>
		live ();
	myVar = setInterval(function(){ live() }, 10000);
	<?php } ?>
	});
filterMarkers = function (category) {
	var bounds = new google.maps.LatLngBounds();
    for (i = 1; i < markers.length; i++) {
        marker = markers[i];
      //  console.log(category);
       // console.log(markers);
       // console.log(markers[markers.length]);
        // If is same category or category not picked
        if(category=='all'){
			marker.setVisible(true);
		}else{
			 if (marker.category == category || category.length === 0) {
	            marker.setVisible(true);
	        }
	        // Categories don't match 
	        else {
	            marker.setVisible(false);
	        }
		}
       bounds.extend(marker.position);
    }
     map.fitBounds(bounds);    
     
      $('html,body').animate({
        scrollTop: $("#googleMap").offset().top},
        'slow');
     
     if(category=='all'){
	 	$('#sample-table-1').DataTable().search('').draw();
	 	$("#inst_dev > li").show();
	 }else{
	 	$('#sample-table-1').DataTable().search(category).draw();
	 	$("#inst_dev > li").each(function(){
	 		if($(this).data("cat")==category){
				$(this).show();
			}else{
				$(this).hide();
			}
	 	})
	 }
     
    
        
}
    function get_custom_marker(engine, speed, last_signal,cat,devid,dbcat){
		//console.log(engine);
		//console.log(speed);
		//console.log(last_signal);
	/*	
	if(devid==24){//ogct-006
		if(last_signal > 72){//inactive red 24 hrs			
			var img='assets/images/marker-images/'+cat+'/red.png';
		}else{
			var img='assets/images/marker-images/'+cat+'/green.png';
		}
	}else*/ if(dbcat==5  || dbcat==19 || dbcat==10){//personal or gpsid or asset
		if(last_signal > 72){//inactive red 24 hrs			
			var img='assets/images/marker-images/'+cat+'/red.png';
		}else{
			var img='assets/images/marker-images/'+cat+'/green.png';
		}
		
	}else{	
		
		if(last_signal > 72){//inactive red 24 hrs
			//console.log('red');
			var img='http://localhost/gpscustomer/assets/images/marker-images/'+cat+'/red.png';
		}else if(engine=='acc on' && speed>0){//active green
			////console.log('green');
			var img='http://localhost/gpscustomer/assets/images/marker-images/'+cat+'/green.png';
		}else if(engine=='acc on' && speed==0){//idle yellow
			//console.log('yellow');
			var img='http://localhost/gpscustomer/assets/images/marker-images/'+cat+'/orange.png';
		}else if(engine=='acc off'){//engine off  grey
			//console.log('grey');
			var img='http://localhost/gpscustomer/assets/images/marker-images/'+cat+'/yellow.png';
		}else if(engine==''){//engine off  grey
			//console.log('grey');
			if(speed>0){
				var img='http://localhost/gpscustomer/assets/images/marker-images/'+cat+'/green.png';				
			}else{
				var img='http://localhost/gpscustomer/assets/images/marker-images/'+cat+'/yellow.png';
			}
			
		}else{
			var img='http://localhost/gpscustomer/assets/images/marker-images/'+cat+'/red.png';
		}
	}
	
	
		var image = new google.maps.MarkerImage(
  				img,
  				new google.maps.Size(46,42),
  				new google.maps.Point(0,0),
  				new google.maps.Point(23,42)
			);
			return image;
	}
function get_curr_status(engine, speed, last_signal,devid,dbcat){
/*
	if(devid==24){//ogct-006
		if(last_signal > 72){//inactive red 24 hrs			
			var stat='inactive';
		}else{
			var stat='moving';
		}
	}else */ if(dbcat==5 || dbcat==19 || dbcat==10){//personal or gpsid or asset
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
		}else if(engine==''){//engine off  grey
			if(speed>0){
				var stat='moving';
			}else{
				var stat='engine off';
			}
			
		}else{
			var stat='inactive';
		}
	}
		return stat;
	
}
 
<?php if($id==38 || $id==509 || $id==776 || $id==785 || $id==831 || $id==837){ ?>
function live() {       
          	//var duration = 10000;
			
			$.ajax({
		
			   type: "GET",
			   url: "<?=base_url();?>ajax/getlivetemp.php?cid=<?php echo $id; ?>",
			   dataType: 'xml',
			   //async:false,
			   success: function(xml) { 
			   		indxval=0;
				   $(xml).find("marker").each(function(){ indxval++;			   
					
					//console.log(indxval);
					var t1 =$(this).find('t1').text();//console.log(t1);
					<?php if($id==509){ ?>
					var t2 = $(this).find('t2').text();//console.log(t2);					
					var door = $(this).find('door').text();//console.log(door);					
					if(door=='open'){
						cls="label label-important";
					}else{
						door="closed";
						cls="label label-success";
					}
					var doordt = $(this).find('doordt').text();//console.log(doordt);
					var devtime = $(this).find('devtime').text();
					if(t1=="NA"){
					 	$("#temp"+indxval).html(t1);
					 }else{
					 	$("#temp"+indxval).html(t1+"&deg; C");
					 }
					
					// $("#sensor"+indxval).html(t2+"&deg; C");
					if(t2=="NA"){
					 	$("#sensor"+indxval).html(t2);
					 }else{
					 	$("#sensor"+indxval).html(t2+"&deg; C");
					 }
					 $("#dstat"+indxval).html(door);
					 $("#dstat"+indxval).attr('class',cls);
					 $("#ddate"+indxval).html(doordt);
					 $("#l_sig"+indxval).html(devtime);
					 <?php }else if($id==38 || $id==785 || $id==831){ ?>
					 if(t1=="NA"){
					 	$("#temp"+indxval).html(t1);
					 }else{
					 	$("#temp"+indxval).html(t1+"&deg; C");
					 }
					 
					 <?php }else if($id==776 || $id==837){ ?>
					 var t2 = $(this).find('t2').text();//console.log(t2);					
					var door = $(this).find('door').text();//console.log(door);					
					if(door=='open'){
						cls="label label-important";
					}else{
						door="closed";
						cls="label label-success";
					}
					var doordt = $(this).find('doordt').text();//console.log(doordt);
					var devtime = $(this).find('devtime').text();
					
					
					 $("#dstat"+indxval).html(door);
					 $("#dstat"+indxval).attr('class',cls);
					 $("#ddate"+indxval).html(doordt);
					 $("#l_sig"+indxval).html(devtime);
					 <?php } ?>
					 	
	
		 
				 });
			}
			});	
		  
         
        }   
	
<?php } ?>
    </script>
</body></html>
