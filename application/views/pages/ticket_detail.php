<?php

$tid=$_GET['tkt'];

	$sq_tkt="select * from tickets where id=$tid";

	$r_tkt=mysql_query($sq_tkt);

	$tkt=mysql_fetch_assoc($r_tkt);

if(isset($_POST['message']) && $_POST['message']!=''){

	

	

$sq="select customer_emailid,profile_image from customers where customer_id=".$id;

$r=mysql_query($sq);

$customer=mysql_fetch_assoc($r);



$sql="select * from admin_data";

$rs=mysql_query($sql);

$admin=mysql_fetch_assoc($rs);



$to=$admin['email_id'];

$msg=$_POST['message'];

$subj=$tkt['issue'];

$frm=$customer['customer_emailid'];





$headers  = 'MIME-Version: 1.0' . "\r\n";

$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";



$headers .= 'From: '.$frm. "\r\n";



mail($to, $subj, $msg, $headers);





$sq_tkt_d="INSERT INTO ticket_details(ticket_id,customer_id,support_id,comment) VALUES ($tid,$id,0,'$msg')";

mysql_query($sq_tkt_d);

	



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

                        <a href="index.php?page=tickets&id=<?php echo $id; ?>">Tickets</a>

							

						</li>

							<span class="divider">

								<i class="icon-angle-right arrow-icon"></i>

							</span>

						</li>

						<li class="active">View Ticket</li>

					</ul><!--.breadcrumb-->



					

				</div>



				<div class="page-content">

					<div class="page-header position-relative">

						<h1>

							TICKET<?php echo str_pad($tid, 4, '0', STR_PAD_LEFT); ?>							

						</h1>

                        <p>

                                                                <span class="label label-<?php if($tkt['ticket_status']=='open'){echo "success";}else if($tkt['ticket_status']=='processing'){echo "warning";} else{echo "error";}?> arrowed">

                                                                 <?php echo $tkt['ticket_status']; ?>

                                                                 </span>

                                                                </p>

					</div><!--/.page-header-->





							<div class="row-fluid">



								<div class="span12">

									<div class="widget-box ">

										<div class="widget-header">

											<h4 class="lighter smaller">

												<i class="icon-comment blue"></i>

												Conversation

											</h4>

										</div>



										<div class="widget-body">

											<div class="widget-main no-padding">

												<div class="dialogs">

                                                <?php



$sq_tkt="SELECT * FROM ticket_details WHERE ticket_id=$tid order by time_stamp";

$rs=mysql_query($sq_tkt);

while($ticket=mysql_fetch_assoc($rs)){



?>

													<div class="itemdiv dialogdiv">

														<div class="user">

                                                         <?php if($ticket['customer_id']==0){

															 	$s="SELECT

engineers.engineers_fname,

engineers.engineers_lname,

engineers.photo

FROM `engineers`

WHERE engineer_id=".$ticket['support_id'];

$q=mysql_query($s);

$engg=mysql_fetch_assoc($q);

															 

															  ?>

                                                         

															<img alt="<?php echo $engg['engineers_fname'] ; ?>'s Avatar" src="../gps/uploads/<?php echo $engg['photo'] ; ?>" />

                                                         <?php } else if($customer['profile_image']!=''){?>
															<img alt="Your Avatar" src="assets/uploads/<?php echo $customer['profile_image'] ; ?>" />
                                                          <?php } else{?>   
															<img alt="Your Avatar" src="assets/avatars/user.jpg" />

														 <?php }?>

														</div>



														<div class="body">

															<div class="time">

																<i class="icon-time"></i>

																<span class="green">

                                                                <?php

																	$tstamp = strtotime($ticket['time_stamp']); 

																	$hours = time_elapsed_string($tstamp);

																	echo $hours;

																	?>

                                                                </span>

															</div>



															<div class="name">

																

                                                                <?php if($ticket['customer_id']==0){ ?>

                                                                <a href="#"><?php echo $engg['engineers_fname'] ; ?><?php echo $engg['engineers_lname'] ; ?></a>

                                                                <span class="label label-info arrowed arrowed-in-right">Support</span>

                                                                <?php } else{?>

                                                                <a href="#">You</a>

                                                                <?php } ?>

															</div>

															<div class="text"><?php echo $ticket['comment'];?></div>



														</div>

													</div>

<?php } ?>





												</div>



												<form name="ticket_reply" method="post" action="index.php?page=ticket_detail&id=<?php echo $id; ?>&tkt=<?php echo $tid; ?>" />

													<div class="form-actions input-append">

														<input placeholder="Type your message here ..." type="text" class="width-75" name="message" />

														<button class="btn btn-small btn-info no-radius" onclick="document.ticket_reply.submit();">

															<i class="icon-share-alt"></i>

															<span class="hidden-phone">Send</span>

														</button>

													</div>

												</form>

											</div><!--/widget-main-->

										</div><!--/widget-body-->

									</div><!--/widget-box-->

								</div><!--/span-->

							</div><!--/row-->



				</div><!--/.page-content-->



			</div><!--/.main-content-->

		</div><!--/.main-container-->

<?php include "include/footer.php";?>

	</body>

</html>

