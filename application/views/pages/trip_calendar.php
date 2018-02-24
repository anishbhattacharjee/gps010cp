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
						<li class="active">Trip Calendar</li>
					</ul><!--.breadcrumb-->

					
				</div>

				<div class="page-content">
					<div class="page-header position-relative">
						<h1>
							Trip Calendar
							<small>
								<i class="icon-double-angle-right"></i>
								drag routes to calendar and schedule trips
							</small>
						</h1>
					</div><!--/.page-header-->

					<div class="row-fluid">
						<div class="span12">
							<!--PAGE CONTENT BEGINS-->

							<div class="row-fluid">
								<div class="span9">
									<div class="space"></div>

									<div id="calendar"></div>
								</div>

								<div class="span3">
									<div class="widget-box transparent">
										<div class="widget-header">
											<h4>Your routes</h4>
										</div>

										<div class="widget-main">
											<div id="external-events">
												<?php
											
												$sql="SELECT * from trip_routes t WHERE t.customer_id=$id and t.trip_status= 'Active' order by t.id desc"; 
$rs=mysql_query($sql);
while($trips=mysql_fetch_assoc($rs)){
$stat_label=$trips['route_color'];	
$trip_id= $trips['id'];	
												
												?>
											
												<div class="external-event label-<?php echo $stat_label; ?>" data-class="label-<?php echo $stat_label; ?>" data-id="<?php echo $trip_id; ?>" data-cid="<?php echo $id; ?>" >
													<i class="icon-move"></i>
													<?php echo $trips['trip_name']; ?>
												</div>

												
							<?php } ?>
												
													
											</div>
										</div>
									</div>
								</div>
							</div>

							<!--PAGE CONTENT ENDS-->
						</div><!--/.span-->
					</div><!--/.row-fluid-->
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

		<script src="assets/js/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="assets/js/fullcalendar.min.js"></script>
		<script src="assets/js/bootbox.min.js"></script>

		<!--ace scripts-->

		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!--inline scripts related to this page-->
		
		<script src="assets/js/date-time/bootstrap-timepicker.min.js"></script>

		<script type="text/javascript">
			$(function() {
			/*
			$( ".bootbox" ).delegate( ".timepicker", "load", function() {
			  $('.timepicker').timepicker({
					minuteStep: 1,
					showSeconds: true,
					showMeridian: false
				});
			});
			*/
			var vehicles="<select name='dev'>";
			<?php
			$sql="SELECT
installation.device_name,
installation.imie_no
FROM
installation
INNER JOIN gps_categories ON installation.category_id = gps_categories.category_id
WHERE customer_id=$id AND installation_status='completed' and gps_categories.category_id!=4";

if($rs=mysql_query($sql)){
while($rw=mysql_fetch_assoc($rs)){
	$imei=$rw['imie_no'];
	$devn=$rw['device_name'];
?>
	vehicles+="<option value='<?php echo $imei; ?>'><?php echo $devn; ?></option>";
<?php
}
} ?>
			vehicles+="</select>";
			

/* initialize the external events
	-----------------------------------------------------------------*/

	$('#external-events div.external-event').each(function() {

		// create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
		// it doesn't need to have a start or end
		var eventObject = {
			title: $.trim($(this).text()), // use the element's text as the event title
			id: $.trim($(this).data("id")),			
			cid: $.trim($(this).data("cid")),
		};

		// store the Event Object in the DOM element so we can get to it later
		$(this).data('eventObject', eventObject);

		// make the event draggable using jQuery UI
		$(this).draggable({
			zIndex: 999,
			revert: true,      // will cause the event to go back to its
			revertDuration: 0  //  original position after the drag
		});
		
	});




	/* initialize the calendar
	-----------------------------------------------------------------*/

	var date = new Date();
	var d = date.getDate();
	var m = date.getMonth();
	var y = date.getFullYear();

	
	var calendar = $('#calendar').fullCalendar({
		 buttonText: {
			prev: '<i class="icon-chevron-left"></i>',
			next: '<i class="icon-chevron-right"></i>'
		},
	
		header: {
			left: 'prev,next today',
			center: 'title',
			//right: 'month,agendaWeek,agendaDay'
		},
		events: "http://ogtslive.com/customer/ajax/trips.php?id=<?php echo $id;?>",
		editable: false,
		droppable: true, // this allows things to be dropped onto the calendar !!!
		drop: function(date,jsEvent, allDay) { // this function is called when something is dropped
			var check = $.fullCalendar.formatDate(date,'yyyy-MM-dd');
   			var today = $.fullCalendar.formatDate(new Date(),'yyyy-MM-dd');
		    if(check < today)
		    {
		        alert("You cannot schedule trips to previous day !!!")
		    }
		    else
		    {
		        
		    
			// retrieve the dropped element's stored Event Object
			var originalEventObject = $(this).data('eventObject');
			var $extraEventClass = $(this).attr('data-class');
			
			
			// we need to copy it, so that multiple events don't have a reference to the same object
			var copiedEventObject = $.extend({}, originalEventObject);
			
			// assign it the date that was reported
			copiedEventObject.start = date;
			copiedEventObject.allDay = allDay;
			
			if($extraEventClass) copiedEventObject['className'] = [$extraEventClass];
			
			// render the event on the calendar
			// the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
			$('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
			
			/*
			// is the "remove after drop" checkbox checked?
			if ($('#').is(':checked')) {
				// if so, remove the element from the "Draggable Events" list
				$(this).remove();
			}
			*/
			//$(this).trigger("click");
			//copiedEventObject.eventClick(copiedEventObject, jsEvent, allDay );
			
			
			}
		}
		,
		selectable: true,
		selectHelper: true,
		/*
		select: function(start, end, allDay) {
			
			bootbox.prompt("New Event Title:", function(title) {
				if (title !== null) {
					calendar.fullCalendar('renderEvent',
						{
							title: title,
							start: start,
							end: end,
							allDay: allDay
						},
						true // make the event "stick"
					);
				}
			});
			

			calendar.fullCalendar('unselect');
			
		}
		,*/
		
		eventClick: function(calEvent, jsEvent, view) {
			var check = $.fullCalendar.formatDate(calEvent.start,'yyyy-MM-dd HH:mm:ss');
   			var today = $.fullCalendar.formatDate(new Date(),'yyyy-MM-dd HH:mm:ss');
			
			var sel="";var tm="00:00:00";var calid=0;
			if(calEvent.imei){
				var re=calEvent.imei+"'";
				var rew=calEvent.imei+"' selected='selected'";
				vehicles=vehicles.replace(re,rew);
			}
		 	if(calEvent.recurring && calEvent.recurring==1){
				sel="checked='checked'";
			}
			if(calEvent.start){
				var dd=calEvent.start;
				var h=dd.getHours();
				var m=dd.getMinutes();
				var s=dd.getSeconds();
				tm=h+":"+m+":"+s;
			}
			if(calEvent.calid){
				calid=calEvent.calid;
			}

			var form = $("<form class='ddd'><label>Route name &nbsp;</label></form>");
			form.append("<input autocomplete=off type=text name='name' value='" + calEvent.title + "' disabled='true' /> ");
			form.append("<label>Vehicle &nbsp;</label>"+vehicles);
			//form.append("<label>Schedule time &nbsp;</label><input type=text name='stime' class='timepicker' /> ");
			form.append("<label>Schedule time &nbsp;</label><div class='control-group'><div class='input-append bootstrap-timepicker'><input id='timepicker' type='text' name='stime' class='input-small' value='"+tm+"'/><span class='add-on'><i class='icon-time'></i></span></div></div>");
			if(!calEvent.calid){
			form.append("<label><input type=checkbox name='recur' value='1' "+sel+"/><span class='lbl'> &nbsp;Recurring Trip</span></label> ");
			}
			form.append("<input type=hidden name='id' value='" + calEvent.id + "'/> ");
			form.append("<input type=hidden name='cid' value='" + calEvent.cid + "'/> ");
			form.append("<input type=hidden name='calid' value='" + calid + "'/> ");
			
			//alert(check);alert(today);
		    if(calEvent.calid && check <= today)
		    {
		        form.append("<button class='btn btn-small btn-success pull-right disabled' onclick='alert(\"Trip already started..\");return false;'><i class='icon-ok'></i> Save</button>");
		    }
		    else
		    {
			form.append("<button type='submit' class='btn btn-small btn-success pull-right'><i class='icon-ok'></i> Save</button>");
			}
			
			var div = bootbox.dialog(form,
				[
				
				{
					"label" : "<i class='icon-trash'></i> Delete Trip",
					"class" : "btn-small btn-danger",
					"callback": function() {
						if(check <= today)
		    			{
							alert("Trip already Started. You cannot delete the trip!!!");
							return false;
						}
						$.ajax({
											type: "GET",
											url: "ajax/trip_schedule_delete.php?id="+calEvent.calid,
											dataType: "html",
											success: function(data) {//alert(data);
												if(data=='error'){			
													alert("Something went wrong !!! Please try again.");			
												}
												else{
													window.location.reload();
												}
											}
								});
								/*
						calendar.fullCalendar('removeEvents' , function(ev){
							return (ev._calid == calEvent._calid);
						})
						*/
					}
				}
				,
				{
					"label" : "<i class='icon-remove'></i> Close",
					"class" : "btn-small"
				}
				]
				,
				{
					// prompts need a few extra options
					"onEscape": function(){div.modal("hide");}
				}
			);
			//alert(div.find('#timepicker').val());
			 div.find('#timepicker').timepicker({
					minuteStep: 1,
					showSeconds: true,
					showMeridian: false
				});
				
			form.on('submit', function(){
				var idd=form.find("input[name=id]").val();
				var devn=form.find("[name=dev]").val();
				var cid=form.find("input[name=cid]").val();
				var recur=0;//alert(form.find("input[name=recur]").is(':checked'));
				if(form.find("input[name=recur]").is(':checked')){recur=1;}else{recur=0;};
				var calid=form.find("[name=calid]").val();
				var dt=calEvent.start;
				var d = dt.getDate();
				var m = parseInt(dt.getMonth())+1;
				var y = dt.getFullYear();
				var timme=y+"-"+m+"-"+d+" "+form.find("input[name=stime]").val();
			
										$.ajax({
											type: "GET",
											url: "ajax/trip_schedule.php?id="+idd+"&time="+timme+"&cid="+cid+"&dev="+devn+"&recur="+recur+"&calid="+calid,
											dataType: "html",
											success: function(data) {//alert(data);
												if(data=='error'){			
													alert("Something went wrong !!! Please try again.");			
												}
												else{
													window.location.reload();
												}
											}
										});
			
				calEvent.title = form.find("input[name=name]").val();
				calendar.fullCalendar('updateEvent', calEvent);
				div.modal("hide");
				return false;
			});
			
		
			//console.log(calEvent.id);
			//console.log(jsEvent);
			//console.log(view);

			// change the border color just for fun
			//$(this).css('border-color', 'red');

		}
		
	});


})

		</script>
	</body>
</html>
