<?php $id1=$_GET['id1']; 
$sqln="select * from trip_schedule where id=$id1";
$rsn=mysql_query($sqln);
$rw=mysql_fetch_assoc($rsn);

function check_status($id,$stat,$extra=""){
$sqls="SELECT id FROM `trip_alert_log` where trip_id=$id and status='$stat' $extra";
$rss=mysql_query($sqls);
	if($rss && mysql_num_rows($rss) > 0){
		return true;
	}else{
		return false;
	}
}

function get_reach_time($id,$stat,$extra=""){
$sqls="SELECT send_at FROM `trip_alert_log` where trip_id=$id and status='$stat' $extra";
$rss=mysql_query($sqls);
$rws=mysql_fetch_assoc($rss);
$reach=date("d-m-Y H:i:s",strtotime($rws['send_at']));
return $reach;
}


?>			<div class="main-content">

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

						<li class="active">Trip Status Report </li>

					</ul><!--.breadcrumb-->



					
				</div>



				<div class="page-content">

					<div class="page-header position-relative">

						<h1>

							Trip Status 

                            <small>

								<i class="icon-double-angle-right"></i>

								Trip T<?php echo $id1; ?> - <?php echo strtoupper($rw['trip_name']); ?>

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
											<th>Trip Tag</th>
											<th>Status</th>
											<th>Scheduled Time</th>
											<th>Schedule Delay</th>
                                            <th>Actual Time</th>
										</tr>

									</thead>



									<tbody>

                                    

                                    <?php

									$i=0;
									?>
                                    <tr>
                                    <td>Start Location</td>
                                    <td> <?php 
									if(check_status($id1,"Started")){
										if(!check_status($id1,"Ended")){
											echo "Started";
										}else{
											echo "Reached Trip End";
										}
									}else{
										echo "Pending";
									}
									
									?>
                                    </td>
                                    <td><?php echo date("d-m-Y H:i:s",strtotime($rw['start_time'])); ?></td>
                                    <td>
                                    <?php if(check_status($id1,"Start Delay")){
											echo "Yes";
										}else{
											echo "No";
										}
										?>
                                    </td>
                                    <td>
                                     <?php									
										if(check_status($id1,"Started")){
											echo get_reach_time($id1,"Started");
										}else{
											echo "--";
										}
									
									?>
                                    </td>
                                    </tr>                                    
                                   
                                     <?php
									  $sq="select id,tag_name,tag_time from trip_tags where trip_id=$id1";
									  $rs=mysql_query($sq);
									  while($row=mysql_fetch_assoc($rs)){ 
									  $tagid=$row['id'];
									?>
                                     
                                    <tr>                                    
                                    <td><?php echo $row['tag_name'];?></td>
                                    <td>
                                    <?php									
										if(check_status($id1,"Reached"," and tag_id=$tagid")){
											echo "Reached";
										}else{
											echo "Pending";
										}								
									
									?>
                                    </td>
                                    <td><?php echo date("d-m-Y H:i:s",strtotime($row['tag_time'])); ?></td>
                                    <td>
                                     <?php if(check_status($id1,"Tag Delay"," and tag_id=$tagid")){
											echo "Yes";
										}else{
											echo "No";
										}
										?>
                                    </td>
                                    <td>
                                    <?php if(check_status($id1,"Reached"," and tag_id=$tagid")){
											echo get_reach_time($id1,"Reached"," and tag_id=$tagid");
										}else{
											echo "--";
										}
									?>
                                    </td>
                                    </tr>
                                    <?php } ?>
                                    
                                    <tr>
                                    <td>End Location</td>
                                    <td >
									<?php									
										if(check_status($id1,"Ended")){
											echo "Ended";
										}else{
											echo "Pending";
										}
									
									
									?>
                                    </td>
                                    <td><?php echo date("d-m-Y H:i:s",strtotime($rw['end_time'])); ?></td>
                                    <td> <?php if(check_status($id1,"End Delay")){
											echo "Yes";
										}else{
											echo "No";
										}
										?>
                                    </td>
                                    <td>
                                    <?php									
										if(check_status($id1,"Ended")){
											echo get_reach_time($id1,"Ended");
										}else{
											echo "--";
										}
									
									?>
                                    </td>
                                    </tr>
                                    
									</tbody>

								</table>

							</div>
                            <div style="float:right">
                                                        <a href="track.php?page=trip&id=<?php echo $id;?>">
														<button class="btn btn-prev">
															<i class="icon-arrow-left"></i>
															Back To Trips
														</button>
                                                        </a> 
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

		</script>

	</body>

</html>

