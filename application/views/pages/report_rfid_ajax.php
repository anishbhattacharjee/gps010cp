<?php include '../config.php';
error_reporting(0);
$start=$_POST['frmdate']." 00:00:00";
$start=$start_o=date("Y-m-d H:i:s",strtotime($start));

$end=$_POST['todate']." 00:00:00";
$end=$end_o=date("Y-m-d H:i:s",strtotime($end));

$imei=$_POST['vid'];
$id=$_POST['cid'];


 ?>
 


					<div class="row-fluid">

						<div class="span12">

							<!--PAGE CONTENT BEGINS--><!--/row-->
                        
							<div class="row-fluid">
							<?php 
										$sql="SELECT device_name FROM installation where imie_no=$imei and installation_status='completed'"; //echo $sql;
$rs=mysql_query($sql);
if($rs && mysql_num_rows($rs)>0){
$devs=mysql_fetch_assoc($rs);

										
		?>						<table  class="sample-table-2 table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th>SlNo</th>
											<th>Rfid</th>										
											<th>Name</th>										
																					
											<th>InTime</th>
											<th>OutTime</th>
										</tr>
									</thead>

									<tbody>

                                   

                                    <?php
									
									
									$sqlog="select c.tag_id,l.name,c.flag,c.ts from emp_log c join emp_rfid l on c.rfid=l.id where c.imei='$imei' and CAST(c.ts AS DATE) between '$start' and '$end' and c.flag='IN'  order by c.ts,c.imei";
									//echo $sqlog;
											$rslog=mysql_query($sqlog);
											$cnt=mysql_num_rows($rslog);
											if($rslog && $cnt>0){											 
											while($rwlog=mysql_fetch_assoc($rslog)){
											$outtime="--";
												$sqout="select ts from emp_log where imei='$imei' and rfid='".$rwlog['tag_id']."' and ts > '".$rwlog['ts']."'  order by ts limit 1";
												$rsout=mysql_query($sqout);
												$cntout=mysql_num_rows($rsout);
												if($rsout && $cntout>0){											 
													$rwout=mysql_fetch_assoc($rsout);
													$outtime=$rwout['ts'];
												}

												if($outtime=="--"){
													$outtime=date("Y-m-d H:i:s");
												}
												$to_time = strtotime($outtime);
												$from_time = strtotime($rwlog['ts']);
												$dur= ceil(abs($to_time - $from_time) / 60). " minute";
											
											?>
												
												<tr>
													<td></td>										
													<td><?php echo $devs['device_name']; ?></td>
													<td><?php echo $rwlog['name']; ?></td>
													<td><?php echo $dur; ?></td>
													<td><?php echo $rwlog['ts']; ?></td>
													<td><?php echo $outtime; ?></td>
													</tr>
												<?php
													
												
												
												
											}}
											
												
									?>
								</tbody>

									</table>
									<?php } //}//if not ?>

								</div>





						</div><!--/.span-->

					</div><!--/.row-fluid-->

				


		

	</body>

</html>

