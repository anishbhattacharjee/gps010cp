
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

						<li class="active">Trip Schedules </li>

					</ul><!--.breadcrumb-->



					
				</div>



				<div class="page-content">

					<div class="page-header position-relative">

						<h1>

							Trip Schedules 

                            <small>

								<i class="icon-double-angle-right"></i>

								Customer CID<?php echo $id; ?>

							</small>

						</h1>

                        

					</div><!--/.page-header-->



					<div class="row-fluid">

						<div class="span12">

							<!--PAGE CONTENT BEGINS--><!--/row-->




                        <button class="btn btn-primary"><a href="<?=base_url();?>trip/trip_new/<?php echo $id; ?>" class="white">Schedule Trip</a></button>
						<hr />
                        
							<div class="row-fluid">

								<div class="table-header">

									Results for "Latest Trips "

								</div>



								 <table data-toggle="table"  data-cache="false" data-pagination="true" data-show-refresh="true" data-search="true" id="table-pagination" data-sort-order="desc">

									<thead>

										<tr>
											<th data-field="id"  data-sortable="true">Trip ID</th>
											<th data-field="device"  data-sortable="true">Device</th>
											<th data-field="tripname"  data-sortable="true">Trip Name</th>
											<th data-field="starttime"  data-sortable="true">Start Time</th>
                                            <th data-field="endtime"  data-sortable="true">End Time</th>
											<th data-field="starttag"  data-sortable="true">Start Tag</th>
                                            <th data-field="endtag"  data-sortable="true">End Tag</th>
											<th data-field="status"  data-sortable="true">Status</th>
											<th data-field="createdat"  data-sortable="true">Created At</th>                                           
                                            <th>Actions</th> 
                                            <th>Reports</th>

										</tr>

									</thead>



									<tbody>

                                    

<?php
$nw=date("Y-m-d H:i:s");
$trips = $this->trip_model->getTripScheduleInfo();
if(isset($trips[0]) && $trips[0]){
$i=0;									
foreach($trips['data'] as $trips){
$stat_label=$this->commonfunctions_model->getStatClass($trips['trip_status']);
$trip_id= $trips['id'];	

									

									?>

										<tr id="trip<?php echo $trips['id']; ?>">
											<td><?php echo $trips['id']; ?></td>
											<td><?php echo $trips['device_name']; ?></td>
											<td ><a href="<?=base_url();?>trip/trip_view/<?php echo $id; ?>/<?php echo $trips['id']; ?>"><?php echo $trips['trip_name']; ?></a></td>
											<td ><?php echo date("d-m-Y H:i:s",strtotime($trips['start_time'])); ?></td>
											<td ><?php echo date("d-m-Y H:i:s",strtotime($trips['end_time'])); ?></td>
                                            <td ><?php echo $trips['start_point']; ?></td>
											<td ><?php echo $trips['end_point']; ?></td>
                                            <td ><span class="label label-<?php echo $stat_label; ?>"><?php echo $trips['trip_status']; ?></span></td>
											<td ><?php echo  date("d-m-Y H:i:s",strtotime($trips['created_at'])); ?></td>
                                            <td class="td-actions ">
												<div class="action-buttons">
													<a class="blue" href="<?=base_url();?>trip/trip_view/<?php echo $id; ?>/<?php echo $trips['id']; ?>">
														<i class="icon-zoom-in bigger-130"></i>
													</a>
													<?php //if($trips['trip_status']=='Inactive'){ ?>
													<a class="red" href="#" onclick="deleteTrip(<?php echo $trips['id']; ?>);return false;">
														<i class="icon-trash bigger-130"></i>
													</a>
                                                    <?php //} ?>
                                                    <?php if($trips['trip_status']=='Inactive' &&  $trips['start_time'] >  $nw){ ?>
                                            <form action="<?=base_url();?>trip/status_update/<?php echo $id;?>" method="post" onsubmit="return confirm('Are you sure you want to activate this trip?');">
                                            <input type="hidden" name="tid" value="<?php echo $trips['id']; ?>" />
                                            <input type="hidden" name="action" value="activate" />
                                            <button type="submit" name="submit" class="btn btn-minier btn-primary">Activate</button>
                                            </form>
											
											<?php }  if($trips['trip_status']=='Active'){ ?>
                                            <form action="<?=base_url();?>trip/status_update/<?php echo $id;?>" method="post" onsubmit="return confirm('Are you sure you want to deactivate this trip?');">
                                            <input type="hidden" name="tid" value="<?php echo $trips['id']; ?>" />
                                            <input type="hidden" name="action" value="deactivate" />
                                            <button type="submit" name="submit" class="btn btn-minier btn-primary">Deactivate</button>
                                            </form>
											
											<?php } ?>
												</div>

												
											</td>
                                            <td >
											<?php if($trips['trip_status']=='Ended'){?>
                                             <a href="<?=base_url();?>trip/trip_report/<?php echo $id;?>/<?php echo $trip_id;?>">
													  <button class="btn btn-small btn-info">Report</button>
                                             </a>
											<?php }/*else if($trips['trip_status']!='Inactive'){?>
                                             <a href="track.php?page=trip_status&id=<?php echo $id;?>&id1=<?php echo $trip_id;?>">
													  <button class="btn btn-small btn-yellow">Status</button>
                                             </a>
											<?php }*/if($trips['trip_status']!='Inactive'){?>
                                            <div style="margin-top: 5px;">
                                            <a href="track.php?page=trip_status_report&id=<?php echo $id;?>&id1=<?php echo $trip_id;?>">
													  <button class="btn btn-mini">Status Report</button>
                                             </a>
                                             </div>
                                             <?php } ?>
                                            </td>
                                            
										</tr>

<?php } 
}?>

									</tbody>

								</table>

							</div>





						</div><!--/.span-->

					</div><!--/.row-fluid-->

				</div><!--/.page-content-->



			</div><!--/.main-content-->

		</div><!--/.main-container-->




		<script type="text/javascript">

			$(function() {

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

			})
			function deleteTrip(id){
				var r = confirm("Are you sure, you want to delete Trip-"+id+" ??");
							if (r == true) {
								
							
				//console.log(id);
				
				$.ajax(
						{
							url : "ajax/delete_trip.php?tid="+id,
							type: "GET",							
							success:function(response, textStatus, jqXHR)
							{
								if(response=='success'){
									$("#trip"+id).slideUp("slow");									
								}else{
									alert("Something went wrong!!Please try later");
								}
							},
							error: function(jqXHR, textStatus, errorThrown) 
							{
								  alert("Something went wrong!!Please try later");

							}

						});
						
						} else {
								return false;
							}
						
				
			}

		</script>

	</body>

</html>

