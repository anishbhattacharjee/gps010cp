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


  	<div id="panel">

      <input id="address" type="textbox" value="<?php echo $userinfo['customer_city']; ?>, <?php echo $userinfo['customer_state']; ?>">

      <input type="button" value="Search" onclick="codeAddress()">

    </div>



	  <div id="main-map" class="google-maps" style="width:100%;height:380px;"></div>



 



    



  	



	  <div id="myown"style="width:100%;height:250px;">

	  	<div class="span12">

        <div class="row-fluid">

			<div id="device" class="alert alert-block " style="margin-top: 10px; display:none;">

            </div>	



         </div>

         </div>  

          <div class="span12" style="margin-left:0px;">

            <div class="row-fluid"> 

       

            <div class="tabbable">

										<ul class="nav nav-tabs" id="myTab3">

											<li class="active">

												<a data-toggle="tab" href="#home3">

													<i class="pink icon-dashboard bigger-110"></i>

													Create Geofence

												</a>

											</li>



											<li>

												<a data-toggle="tab" href="#profile3">

													<i class="blue icon-user bigger-110"></i>

													Your Fences

												</a>

											</li>



											

										</ul>



										<div class="tab-content">

											<div id="home3" class="tab-pane in active">



                                             <div class="span12">

                                                <div class="row-fluid">

            

				<label for="form-field-select-1">Device</label>

					<select id="fendev">						

                        <?php 
							if(isset($dev[0]) && $dev[0]){
															foreach($dev['data'] as $dev){

															

															?>

                        <option value="<?php echo $dev['model_id']; ?>" /><?php echo $dev['device_name']; ?>	</option>

                        <?php } }?>		

                        												

					</select>

                    

                    <label for="form-field-select-1">Fence</label>

                    <input type="text" id="fname" />

                    

			</div>



            

			<button class="btn btn-small btn-primary" type="button" style="margin-top: 13px;"  id="savee">

				<i class="icon-ok"></i>

				Save

			</button>



			<button class="btn btn-small btn-danger"  id="reset" value="Reset" type="button" style="margin-top: 13px;">

				<i class="icon-remove"></i>

				Reset

			</button>

			<button class="btn btn-small btn-success"  id="showData"  value="Show Paths (class function) " type="button" style="margin-top: 13px;">

				<i class="icon-ok"></i>

				Show Path

			</button>



									

			<div   id="dataPanel" style="border:none;">	</div>

            

            

            </div>





											</div><!--tab 1 -->



											<div id="profile3" class="tab-pane">



             <div class="span12">

            <div class="row-fluid">

								<h3 class="header smaller lighter blue">Geofences</h3>

								



								<table id="sample-table-2" class="table table-striped table-bordered table-hover">

									<thead>

										<tr>

											

											<th>Device</th>

											<th>Fence</th>											

											<th >Status</th>

											<th></th>

										</tr>

									</thead>



									<tbody id="fence_data">

                                    <?php

	if(isset($r[0]) && $r[0]){					
foreach($r['data'] as $r){

									

									?>

										<tr id="row<?php echo $r['fence_id']; ?>">

											

											

											<td><?php echo $r['device_name']; ?></td>

											<td><a id="fnsName<?php echo $r['fence_id']; ?>"  data-id="<?php echo $r['fence_id']; ?>" style="cursor:pointer;" ><?php echo $r['fence_name']; ?></a></td>

											<td>

                                            <a href="#" id="fStatus<?php echo $r['fence_id']; ?>" data-type="select" data-name="fence_status" data-pk="<?php echo $r['fence_id']; ?>" data-value="<?php echo $r['fence_status']; ?>" data-cust="<?php echo $r['customer_id']; ?>" data-dev="<?php echo $r['device_id']; ?>" data-source="{'active': 'active', 'inactive': 'inactive'}" data-original-title="Select Status" class="editable" style="color: green;"><?php echo $r['fence_status']; ?></a>

<!--                                            <span id="fStatus<?php echo $r['fence_id']; ?>" data-id="<?php echo $r['fence_id']; ?>" class="editable label arrowed arrowed-righ label-<?php if($r['fence_status']=='active') echo "success"; else echo "warning";?>">

											<?php echo $r['fence_status']; ?>

                                            </span>

-->                                            </td>



											



											<td class="td-actions">

												<div class="hidden-phone visible-desktop action-buttons">

													<a  class="blue" id="viewF"  data-id="<?php echo $r['fence_id']; ?>" style=" cursor:pointer;">

														<i class="icon-zoom-in bigger-130"></i>

													</a>



<!--													<a class="green" href="#">

														<i class="icon-pencil bigger-130"></i>

													</a>

-->

													<a class="red" id="deleteF"  data-id="<?php echo $r['fence_id']; ?>" style=" cursor:pointer;">

														<i class="icon-trash bigger-130"></i>

													</a>

												</div>



											</td>

										</tr>



<?php } }?>



						

									</tbody>

								</table>

							</div>

                            </div>





											</div><!-- tab 2-->



										</div>

									</div><!--tab-->

            

</div></div>

							



</div>



  </div><!--/.page-content-->







			



			</div><!--/.main-content-->



		</div><!--/.main-container-->







	<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false&v=3.exp"></script>



	<script type="text/javascript" src="<?=base_url()?>assets/geofence/polygon.min.js"></script>

    <script type="text/javascript" src="<?=base_url()?>assets/geofence/v3_epoly.js"></script>

	<script type="text/javascript">



	$(function(){

		  //create map



		 var mapCenter=new google.maps.LatLng(<?php echo $userinfo['customer_latlng']; ?>);



		 var myOptions = {



		  	zoom: 7,



		  	center: mapCenter,



		  	mapTypeId: google.maps.MapTypeId.ROADMAP,

			mapTypeControl: true,

   			mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},

		    navigationControl: true,





		  }



		 map = new google.maps.Map(document.getElementById('main-map'), myOptions);

codeAddress();



		 var creator = new PolygonCreator(map);



		 



		 //reset



		 $('#reset').click(function(){ 



		 $('#device').hide();



		 		creator.destroy();



		 		creator=null;		 		



		 		creator=new PolygonCreator(map);



		 });		 



		 



		 



		 //show paths



		 $('#savee').click(function(){ 



		 	$('#dataPanel').hide();



		 	$('#dataPanel').append(creator.showData());//alert(creator.showData());

var dev=$("#fendev").val();

var fence=$("#fname").val();

path=document.getElementById("dataPanel").innerHTML;



if(path=='Please first create a polygon' || creator.showData()==null)



{

	$("#device").html('Please complete the fence');

	$("#device").addClass(' alert-error');

	$("#device").show();



	//alert('Please complete the fence');



	return false;



}

else if(dev==null)

{

	$("#device").html('Please select your device');

	$("#device").addClass(' alert-error');

	$("#device").show();

	//alert('Please name your fence');

	return false;

}
else if(fence=='')

{

	$("#device").html('Please name your fence');

	$("#device").addClass(' alert-error');

	$("#device").show();

	//alert('Please name your fence');

	return false;

}

else



{







var xmlhttp;    



if (window.XMLHttpRequest)



{// code for IE7+, Firefox, Chrome, Opera, Safari



xmlhttp=new XMLHttpRequest();



}



else







{// code for IE6, IE5







xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");







}







xmlhttp.onreadystatechange=function()







{







if (xmlhttp.readyState==4 && xmlhttp.status==200)







{

	if(xmlhttp.responseText == 'error'){
	
	$("#device").html('Geofence Not Added Successfully.');

	$("#device").addClass(' alert-error');

	$("#device").show();

	}else{
		
		dev_resp=xmlhttp.responseText;
		dev_rsp=dev_resp.split(",");
		fid=dev_rsp[0];
		cust_i=dev_rsp[1];
		dev_i=dev_rsp[2];
		
	$("#device").html('Geofence has been created successfully.');

	$("#device").removeClass(' alert-error');

	$("#device").addClass(' alert-success');

	$("#device").show();
	
	window.location.reload();
	//update fences table
	var fence=$("#fname").val();
	var dev=$("#fendev option:selected").text();
	var stat='<a href="#" id="fStatus'+fid+'" data-type="select" data-name="fence_status" data-pk="'+fid+'" data-value="active" data-cust="'+cust_i+'" data-dev="'+dev_i+'" data-source="{\'active\': \'active\', \'inactive\': \'inactive\'}" data-original-title="Select Status" class="editable-click" style="color: green;">active</a>';
	var actions='<div class="hidden-phone visible-desktop action-buttons">';
	actions+='<a  class="blue" id="viewF"  data-id="'+fid+'" style=" cursor:pointer">';
	actions+='<i class="icon-zoom-in bigger-130"></i>';
	actions+='</a>';
	actions+='<a class="red" id="deleteF"  data-id="'+fid+'" style=" cursor:pointer">';
	actions+='<i class="icon-trash bigger-130"></i>';
	actions+='</a>';
	actions+='</div>';
	$('#fence_data').append('<tr id="row'+fid+'"><td>'+dev+'</td><td><a id="fnsName'+fid+'" data-id="'+fid+'" style="cursor:pointer;">'+fence+'</a></td><td>'+stat+'</td><td class="td-actions">'+actions+'</td></tr>');		
	if ($('.dataTables_empty').length > 0) {
  		 $(".dataTables_empty").hide();
	}

	}



//document.getElementById("device").innerHTML=xmlhttp.responseText;



	$('#dataPanel').empty();



}



}

xmlhttp.open("GET","<?=base_url();?>ajax/savedata.php?c="+path+"&f="+fence+"&dev="+dev+"&cu=<?php echo $id; ?>",true);







xmlhttp.send();



}







		 		



		 });



		  $('#showData').click(function(){ 



		 		



		 		if(null==creator.showData()){



		 			$('#device').html('Please first create a polygon');

					$("#device").removeClass(' alert-success');

					$("#device").addClass(' alert-error');





		 		}else{



		 			$('#device').html(creator.showData());

					$("#device").removeClass(' alert-error');

					$("#device").addClass(' alert-success');





		 		}

				$('#device').show();

		 });



		 



		 //show color



		 $('#showColor').click(function(){ 



		 		$('#dataPanel').empty();



		 		if(null==creator.showData()){



		 			$('#dataPanel').append('Please first create a polygon');



		 		}else{



		 				$('#dataPanel').append(creator.showColor());



		 		}



		 });

$("#fence_data").delegate( "[id^=viewF]", "click", function() {
		// $("[id^=viewF]").click(function(e) {

			

			 var id=$(this).attr("data-id");

			 var polyCoords= new Array();

			 var polyFence = new google.maps.Polygon({

					paths: polyCoords

			 });

			 	  $.ajax({

				   type: "GET",

				   url: "<?=base_url();?>ajax/get_polygon.php?fence="+id,

				   dataType: "xml",

				   async:false,				   

				   success:function(xml) {

				     $(xml).find("point").each(function(){ 

					 			var lat = $(this).find('lat').text();

								var lng = $(this).find('lng').text();



					 	var point = new google.maps.LatLng(parseFloat(lat),parseFloat(lng));

						polyCoords.push(point);

					 })

					  var polyFence = new google.maps.Polygon({

							paths: polyCoords,

							strokeColor: "#0000FF",

							 strokeOpacity: 0.8,

							 strokeWeight: 2,

							 fillColor: "#FF0000",

							 fillOpacity: 0.35



						  });

						

						polyFence.setMap(map);

						

						var boundbox = new google.maps.LatLngBounds();

						for ( var i = 0; i < polyCoords.length; i++ )

						{

						  boundbox.extend(polyCoords[i]);

						}

						map.setCenter(boundbox.getCenter());

						map.fitBounds(boundbox);

						

						

						var label=$("#fnsName"+id).text();//alert(label);

						var title="<b>"+label+"</b>";

						createClickablePoly(polyFence, title, label);



				   }

				  });

          	 

				



        });
		$("#fence_data").delegate( "[id^=deleteF]", "click", function() {
		//$("[id^=deleteF]").click(function(e) {

			var id=$(this).attr("data-id");

            $.ajax({

				   type: "GET",

				   url: "ajax/rmv_fence.php?fence="+id,

				   dataType: "html",				   		   

				   success:function(data) {

					   if(data=='success'){

					   $("#row"+id).hide();

					   }

				   }

			});

        });

		

		

		
		$("#fence_data").delegate( "[id^=fnsName]", "click", function() {
		 //$("[id^=fnsName]").click(function(e) {

			var id=$(this).attr("data-id");//alert(id);

			//$("#viewF"+id).click();

			var pCoords= new Array();

			var polyFenceN = new google.maps.Polygon({

					paths: pCoords

			 });



			 $.ajax({

				   type: "GET",

				   url: "ajax/get_polygon.php?fence="+id,

				   dataType: "xml",

				   async:false,				   

				   success:function(xml) {

				     $(xml).find("point").each(function(){ 

					 			var lat = $(this).find('lat').text();

								var lng = $(this).find('lng').text();



					 	var point = new google.maps.LatLng(parseFloat(lat),parseFloat(lng));

						pCoords.push(point);

					 })

					 

					 	var polyFenceN = new google.maps.Polygon({

							paths: pCoords,

							strokeColor: "#0000FF",

							 strokeOpacity: 0.8,

							 strokeWeight: 2,

							 fillColor: "#FF0000",

							 fillOpacity: 0.35



						  });

						

						polyFenceN.setMap(map);



					 

					   var boundbox = new google.maps.LatLngBounds();

						for ( var i = 0; i < pCoords.length; i++ )

						{

						  boundbox.extend(pCoords[i]);

						}

						map.setCenter(boundbox.getCenter());

						map.fitBounds(boundbox);

						

												

						var label=$("#fnsName"+id).text();//alert(label);

						var title="<b>"+label+"</b>";

						createClickablePoly(polyFenceN, title, label);



						

				}

			 });

            

        });

		

				//$.fn.editable.defaults.mode = 'inline';

				$.fn.editableform.loading = "<div class='editableform-loading'><i class='light-blue icon-2x icon-spinner icon-spin'></i></div>";

			    $.fn.editableform.buttons = '<button type="submit" id="save-btn" class="btn btn-info editable-submit"><i class="icon-ok icon-white"></i></button>'+

			                                '<button type="button" class="btn editable-cancel"><i class="icon-remove"></i></button>';    

											

/*			var status = [];

			    $.each({ "active": "Active", "inactive": "InActive"}, function(k, v) {

			        status.push({id: k, text: v});

			    });	

*/			// $("[id^=fStatus]").editable({          
					$("#fence_data").editable({       
					   selector: '[id^="fStatus"]',
   					   url: 'ajax/edit_fence_status.php',

					   send: 'always',
					   params: function(params) {
							// add additional params from data-attributes of trigger element
							params.cust = $(this).editable().data('cust');
							params.dev = $(this).editable().data('dev');
							return params;
						},
						success: function(response, newValue) {//console.log("tst");
							//if(!response.success) return response.msg;
							//else{console.log("tst1");
								//reloadStatusS();
							//}
							window.location.reload();
						}
										   
									 
						
					   

			    });



		 

		 

		 var oTable1 = $('#sample-table-2').dataTable( {

				"aoColumns": [

			      

			      null, null,null, 

				  { "bSortable": false }

				] } );

				

				

				$('table th input:checkbox').on('click' , function(){

					var that = this;

					$(this).closest('table').find('tr > td:first-child input:checkbox')

					.each(function(){

						this.checked = that.checked;

						$(this).closest('tr').toggleClass('selected');

					});

						

				});

			

			

				$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});

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



	});	

	

	function reloadStatusS(){
	console.log("change");
	
	 $("div[id^='fStatus']").each(function(){console.log("change_n");
		 var d_v=$(this).attr("data-value");
            console.log(d_v);
        });
	
		
	}

	///click polygon

      function createClickablePoly(poly, html, label, point) {

		  gpolys= new Array();

        gpolys.push(poly);

        if (!point && poly.getPath 

                   && poly.getPath().getLength 

                   && (poly.getPath().getLength > 0) 

                   && poly.getPath().getAt(0)) { point = poly.getPath().getAt(0); } //alert(poly);

        var poly_num = gpolys.length - 1;

        if (!html) {html = "";}

        else { html += "<br>";}

        var length = poly.Distance();

	if (length > 1000) {

          html += "length="+poly.Distance().toFixed(3)/1000+" km";

	} else {

          html += "length="+poly.Distance().toFixed(3)+" meters";

        }

        for (var i=0;i<poly.getPath().getLength();i++) {

           html += "<br>poly["+poly_num+"]["+i+"]="+poly.getPath().getAt(i);

        }

	html += "<br>Area: "+poly.Area()+" sq meters";

        // html += poly.getLength().toFixed(2)+" m; "+(poly.getLength()*3.2808399).toFixed(2)+" ft; ";

        // html += (poly.getLength()*0.000621371192).toFixed(2)+" miles";

        var contentString = html;

		var infowindow = new google.maps.InfoWindow();

        google.maps.event.addListener(poly,'click', function(event) {

          infowindow.setContent(contentString);

          if (event) {

             point = event.latLng;

          }

          infowindow.setPosition(point);

          infowindow.open(map);

          // map.openInfoWindowHtml(point,html); 

        }); 

        if (!label) {

          label = "polyline #"+poly_num;

        }

        label = "<a href='javascript:google.maps.event.trigger(gpolys["+poly_num+"],\"click\");'>"+label+"</a>";

        // add a line to the sidebar html

        //  side_bar_html += '<input type="checkbox" id="poly'+poly_num+'" checked="checked" onclick="togglePoly('+poly_num+');">' + label + '<br />';

      }

	  

//search addr	  

function codeAddress() {

			 var geocoder = new google.maps.Geocoder();



  var address = document.getElementById('address').value;

  geocoder.geocode( { 'address': address}, function(results, status) {

    if (status == google.maps.GeocoderStatus.OK) {

      map.setCenter(results[0].geometry.location);

      var marker = new google.maps.Marker({

          map: map,

          position: results[0].geometry.location

      });

    } else {

      console.log('Geocode was not successful for the following reason: ' + status);

    }

  });

}



	</script>







</body></html>



