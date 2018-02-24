<?php 
if(isset($_POST['submit'])){
	
	//print_r($_POST);
	if($_POST['action']=='activate'){
		$sql="update trip_routes set trip_status='Active' where id=".$_POST['tid'];
		mysql_query($sql);
	}else if($_POST['action']=='deactivate'){
		$sql="update trip_routes set trip_status='Inactive' where id=".$_POST['tid'];
		mysql_query($sql);
	}
	
}
	
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

						<li class="active">Trip Routes </li>

					</ul><!--.breadcrumb-->



					
				</div>



				<div class="page-content">

					<div class="page-header position-relative">

						<h1>

							Trip Routes 

                            <small>

								<i class="icon-double-angle-right"></i>

								Customer CID<?php echo $id; ?>

							</small>

						</h1>

                        

					</div><!--/.page-header-->



					<div class="row-fluid">

						<div class="span12">

							<!--PAGE CONTENT BEGINS--><!--/row-->




                        <button class="btn btn-primary"><a href="track.php?page=trip_route_new&id=<?php echo $id;?>" class="white">Configure Route</a></button>
						<hr />
                        
							<div class="row-fluid">

								<div class="table-header">

									Results for "Latest Routes "

								</div>



								<table id="sample-table-2" class="table table-striped table-bordered table-hover">

									<thead>

										<tr>
											<th>Trip ID</th>
											<th>Trip Name</th>
											<th>Start Location</th>
                                            <th>End Location</th>
											<th>Status</th>
											<th>Created At</th>                                           
                                            <th>Actions</th> 
                                           <!-- <th>Reports</th>-->

										</tr>

									</thead>



									<tbody>

                                    

                                    <?php

									$i=0;
									$nw=date("Y-m-d H:i:s");
									
									$sql="SELECT * from trip_routes t WHERE t.customer_id=$id and t.trip_status!= 'Deleted' order by t.id desc"; 

$rs=mysql_query($sql);

while($trips=mysql_fetch_assoc($rs)){
$stat_label=getStatClass($trips['trip_status']);
$trip_id= $trips['id'];	

									

									?>

										<tr id="trip<?php echo $trips['id']; ?>">
											<td data-order="<?php echo $trips['id']; ?>">TID<?php echo $trips['id']; ?></td>
											
											<td ><a href="track.php?page=trip_route_view&id=<?php echo $id; ?>&id1=<?php echo $trips['id']; ?>"><?php echo $trips['trip_name']; ?></a></td>
											
                                            <td ><?php echo ucfirst($trips['start_point']); ?></td>
											<td ><?php echo ucfirst($trips['end_point']); ?></td>
                                            <td ><span class="label label-<?php echo $stat_label; ?>"><?php echo $trips['trip_status']; ?></span></td>
											<td ><?php echo  date("d-m-Y H:i:s",strtotime($trips['created_at'])); ?></td>
                                            <td class="td-actions ">
												<div class="action-buttons">
													<a class="blue" href="track.php?page=trip_route_view&id=<?php echo $id; ?>&id1=<?php echo $trips['id']; ?>">
														<i class="icon-zoom-in bigger-130"></i>
													</a>
													<?php //if($trips['trip_status']=='Inactive'){ ?>
													<a class="red" href="#" onclick="deleteTrip(<?php echo $trips['id']; ?>);return false;">
														<i class="icon-trash bigger-130"></i>
													</a>
                                                    <?php //} ?>
                                                    <?php if($trips['trip_status']=='Inactive' ){?>
                                            <form action="track.php?page=trip_routes&id=<?php echo $id;?>" method="post" onsubmit="return confirm('Are you sure you want to activate this route?');">
                                            <input type="hidden" name="tid" value="<?php echo $trips['id']; ?>" />
                                            <input type="hidden" name="action" value="activate" />
                                            <button type="submit" name="submit" class="btn btn-minier btn-primary">Activate</button>
                                            </form>
											
											<?php }  if($trips['trip_status']=='Active'){ ?>
                                            <form action="track.php?page=trip_routes&id=<?php echo $id;?>" method="post" onsubmit="return confirm('Are you sure you want to deactivate this route?');">
                                            <input type="hidden" name="tid" value="<?php echo $trips['id']; ?>" />
                                            <input type="hidden" name="action" value="deactivate" />
                                            <button type="submit" name="submit" class="btn btn-minier btn-primary">Deactivate</button>
                                            </form>
											
											<?php } ?>
												</div>

												
											</td>
                                            <!--<td>
											
                                            </td>-->
                                            
										</tr>

<?php } ?>

									</tbody>

								</table>

							</div>





						</div><!--/.span-->

					</div><!--/.row-fluid-->

				</div><!--/.page-content-->



			</div><!--/.main-content-->

		</div><!--/.main-container-->



<?php include "include/footer.php"; ?>

		<!--inline scripts related to this page-->



		<script type="text/javascript">

			$(function() {

				var oTable1 = $('#sample-table-2').dataTable( {
					"aaSorting": [],

				"aoColumns": [

			     null,null, null,null, null, null,null,

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

			})
			function deleteTrip(id){
				var r = confirm("Are you sure, you want to delete Route-"+id+" ??");
							if (r == true) {
								
							
				//console.log(id);
				
				$.ajax(
						{
							url : "ajax/delete_route.php?tid="+id,
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

