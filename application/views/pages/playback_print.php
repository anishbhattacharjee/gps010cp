<?php



$start=$_POST['frmdate']." ".$_POST['frmtime'];

$start=date("Y-m-d H:i:s",strtotime($start));



$end=$_POST['todate']." ".$_POST['totime'];

$end=date("Y-m-d H:i:s",strtotime($end));


$dev=explode(",",$_POST['vid']);
$vid=$imei=$dev[0];
/*
	$make='na';
	$a="select make from device_make where imei='$vid'";
	$b=mysql_query($a);
	if($b && mysql_num_rows($b) > 0){		
		$c=mysql_fetch_assoc($b);
		$make=$c['make'];
	}
if($make=='noran' || $make=='meitrack'){
	$time_field='device_time';
	if($make=='noran'){
		$start=date("Y-m-d H:i:s",strtotime("-330 minutes",strtotime($start)));
		$end=date("Y-m-d H:i:s",strtotime("-330 minutes",strtotime($end)));
	}
}else{
	$time_field='time_stamps';
}


*/

$time_field='device_time';

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







<div id="demo">

<table cellpadding="0" cellspacing="3" border="0" class="table table-striped table-bordered" id="example">



									<thead>

                                    	<tr>

											

                                       
											<th style="display:none;">Lattitude & Longitude</th>

                                           <th>Location</th>

                                            <th>Speed</th>											

                                            <th>Time</th>

										</tr>



									</thead>







									<tbody>

                                    <?php
$ind=0;
//$sql="SELECT * FROM gps_master WHERE imei='$vid' AND device_status='A' AND $time_field > '$start' and $time_field< '$end' group by lat,lng,speed ORDER BY $time_field ";
$sql="SELECT * FROM gps_master WHERE imei='$vid' AND device_status='A' AND $time_field between '$start' and '$end' group by date($time_field),HOUR($time_field), floor(minute($time_field)/30) order by $time_field desc  ";
//echo $sql;
$rs=mysql_query($sql);

while($rw=mysql_fetch_assoc($rs)){

$speed=$rw['speed'];
/*
	if($make=='noran'){
		$ts=date("M-d-Y H:i:s",strtotime("+330 minutes",strtotime($rw[$time_field])));		
	}else{
		$ts=date("M-d-Y H:i:s",strtotime($rw[$time_field]));	
	}

*/
$ts=date("M-d-Y H:i:s",strtotime($rw[$time_field]));	
									?>



									<tr>



                                       <td style="display:none;" class="loc_name" id="<?php echo $ind; ?>" ><?php echo $rw['lat'];?>,<?php echo $rw['lng'];?></td>

                                        <td  id="loc<?php echo $ind; ?>"> </td>

                                        <td><?php echo $speed;?> KM/HR</td>									

                                        <td><?php echo $ts;?></td>

									</tr>



									<?php



									



									$ind++;}



								



									?>



									



									</tbody>



								</table>

	

</div>

</div>



</div>



  </div><!--/.page-content-->







			



			</div><!--/.main-content-->



		</div><!--/.main-container-->







	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>



	

<?php include "include/footer.php"; ?>

<script type="text/javascript" charset="utf-8" src="media/js/ZeroClipboard.js"></script>

<script src="media/js/TableTools.js"></script>





<script type="text/javascript">

var asInitVals = new Array();

/*

$( document ).ready(function() {
	console.log("start");

		var geocoder = new google.maps.Geocoder();

	$('.loc_name').each(function() {

		//alert("dfv");

		var id=this.id;

		var latLng=$(this).html();		

		var lat_lan = latLng.split(",", 2);
		var loc =$("#loc"+id).html();	
		

		var point=new google.maps.LatLng(parseFloat(lat_lan[0]), parseFloat(lat_lan[1]));	
		if(loc=='na' || loc=='' || loc==' ' || loc==null){

		
		console.log("req");
		 geocoder.geocode({

                     "latLng":point

                     }, function (results, status) {                       
console.log(status);
console.log(results);
                         if (status == google.maps.GeocoderStatus.OK) {                           

                             var placeName = results[1].formatted_address;  //alert(placeName);

							 $("#loc"+id).html(placeName);

									 

		   } 

		});
		
		}
		

	//usleep(800000);	

	});

		


		

		$('#example').dataTable( {
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

								"sPdfMessage": "Device Track History."

							},

							"print"

						]

					}

				} );



	

	

	

	});

		function usleep(microseconds) {  
    // Delay for a given number of micro seconds    
    //   
    // version: 902.122  
    // discuss at: http://phpjs.org/functions/usleep  
    // // +   original by: Brett Zamir  
    // %        note 1: For study purposes. Current implementation could lock up the user's browser.  
    // %        note 1: Consider using setTimeout() instead.  
    // %        note 2: Note that this function's argument, contrary to the PHP name, does not  
    // %        note 2: start being significant until 1,000 microseconds (1 millisecond)  
    // *     example 1: usleep(2000000); // delays for 2 seconds  
    // *     returns 1: true  
    var start = new Date().getTime();  
    while (new Date() < (start + microseconds/1000));  
    return true;  
}  	
*/

	$(function(){

var geocoder = new google.maps.Geocoder();
var collection = $('.loc_name')
if( collection.length > 0 ){
    var i = 0;
    var fn = function(){
        var element = $(collection[i]);
        //console.log(i + ' (' + element.text() + ') : %o', element);
		//var id=collection.id;
		var id=i;
		console.log(i);
		var latLng=element.html();		

		var lat_lan = latLng.split(",", 2);
		//var loc =$("#loc"+id).html();	
		console.log(lat_lan[0]+"-"+lat_lan[1]);
		
		var point=new google.maps.LatLng(parseFloat(lat_lan[0]), parseFloat(lat_lan[1]));	
		//if(loc=='na' || loc=='' || loc==' ' || loc==null){
		
			geocoder.geocode({

	                     "latLng":point

	                     }, function (results, status) {                       

	                         if (status == google.maps.GeocoderStatus.OK) {                           

	                             var placeName = results[1].formatted_address;  //alert(placeName);

								 $("#loc"+id).html(placeName);

									console.log(placeName)	;
										 

			   } /* else {

				  alert('Geocoder failed due to: ' + status);

				}*/

			});
		
		
		//}
        // Do whatever
        if( ++i < collection.length ){
            setTimeout(fn, 2000);
        }else{
			$('#example').dataTable( {
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

								"sPdfMessage": "Device Track History.",
								
								"mColumns": [ 1, 2, 3 ],

							},

							"print"

						]

					}

				} );
		}
    };
    fn();
}




		
/**/
		

		

		



	

	

	

	});


</script>