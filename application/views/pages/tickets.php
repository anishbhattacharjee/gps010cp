

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

							

							<a href="index.php?page=tickets&id=<?php echo $id; ?>">Support</a>



							<span class="divider">

								<i class="icon-angle-right arrow-icon"></i>

							</span>

						</li>



						<li class="active">Tickets</li>

					</ul><!--.breadcrumb-->



					

				</div>



				<div class="page-content">

					<div class="page-header position-relative">

						<h1>

							Tickets 

                            <small>

								<i class="icon-double-angle-right"></i>

								Customer CID<?php echo $id; ?>

							</small>

						</h1>

                        

					</div><!--/.page-header-->



					<div class="row-fluid">

						<div class="span12">







<div class="tabbable tabs-left">

										<ul class="nav nav-tabs" id="myTab3">

											<li class="active">

												<a data-toggle="tab" href="#home3">

													<i class="pink icon-dashboard bigger-110"></i>

													Raise a ticket

												</a>

											</li>



											<li>

												<a data-toggle="tab" href="#profile3">

													<i class="blue icon-user bigger-110"></i>

													View your tickets

												</a>

											</li>



											

										</ul>



										<div class="tab-content">

											<div id="home3" class="tab-pane in active">

                                                <div id="nots"></div>

                                                <form class="form-horizontal" id="ticket_add" />

                    

                                                    <div class="control-group">

                                                        <label class="control-label" for="form-field-2">Subject</label>

                    

                                                        <div class="controls">

                                                        <span class="input-icon">

                                                          <input type="text" id="form-field-2" name="sub" placeholder="Subject" />

                                                          <i class="icon-comment-alt"></i>

                                                        </span>	

                                                        </div>

                                                    </div>

                    

                    

                                                    <div class="control-group">

                                                        <label class="control-label" for="form-field-5">Message</label>

                    

                                                        <div class="controls">

                                                                <textarea class="span12" id="form-field-8" name="message" placeholder="Your message"></textarea>

                                                            <div class="help-block" id="input-span-slider"></div>

                                                        </div>

                                                    </div>

                    

                                                    <input type="hidden" value="<?php echo $id; ?>" name="id"/>

                                                    <div class="form-actions">

                                                        <button class="btn btn-info" type="button" id="mail_id">

                                                            <i class="icon-ok bigger-110"></i>

                                                            Send

                                                        </button>

                    

                                                        &nbsp; &nbsp; &nbsp;

                                                        <button class="btn" type="reset" id="reset">

                                                            <i class="icon-undo bigger-110"></i>

                                                            Reset

                                                        </button>

                                                    </div>

                    

                                                    <div class="hr"></div>

                    

                                                </form>



												

											</div>



											<div id="profile3" class="tab-pane">

                                            

                                            





<div class="widget-box transparent">

											<div class="widget-header widget-header-small">

												<h4 class="blue smaller">

													<i class="icon-rss orange"></i>

													Your Tickets

												</h4>



												<div class="widget-toolbar action-buttons">

													<a href="#" data-action="reload">

														<i class="icon-refresh blue"></i>

													</a>



													&nbsp;

													

												</div>

											</div>



											<div class="widget-body">

												<div class="widget-main padding-8">

													<div id="profile-feed-1" class="profile-feed">

                                                    

                                                    <?php

													$i=0;

										$sq3="SELECT DISTINCT

tickets.id,

tickets.issue,

tickets.ticket_status,

tickets.ts

FROM

tickets

LEFT JOIN ticket_details ON tickets.id = ticket_details.ticket_id

WHERE ticket_details.customer_id=$id ORDER BY ts desc";

										$rs3=mysql_query($sq3);

										while($tickets=mysql_fetch_assoc($rs3)){

													

													?>

														<div class="profile-activity clearfix">

															<div>

																<a href="index.php?page=ticket_detail&id=<?php echo $id; ?>&tkt=<?php echo $tickets['id']; ?>" >

                                                                   <i class="pull-left thumbicon  btn-pink no-hover"><?php echo ++$i; ?></i>

                                                                    TICKET<?php echo str_pad($tickets['id'], 4,'0',STR_PAD_LEFT); ?>	 -	<?php echo $tickets['issue']; ?>														

																</a>

                                                                <p>

                                                                <span class="label label-<?php if($tickets['ticket_status']=='open'){echo "success";}else if($tickets['ticket_status']=='processing'){echo "warning";} else{echo "error";}?> arrowed">

                                                                 <?php echo $tickets['ticket_status']; ?>

                                                                 </span>

                                                                </p>

                                                               

																<div class="time">

																	<i class="icon-time bigger-110"></i>

                                                                    

                                                                    <?php

																	//$sq4="select ts from tickets where ticket_id=$id order by ts limit 1";

																	//$rs4=mysql_query($sq4);

																	//$rw4=mysql_fetch_assoc($rs4);

																	$tstamp = strtotime($tickets['ts']); 

																	$hours = time_elapsed_string($tstamp);

																	echo $hours;

																	?>																	

																</div>

															</div>



<!--															<div class="tools action-buttons">

																<a href="#" class="blue">

																	<i class="icon-pencil bigger-125"></i>

																</a>



																<a href="#" class="red">

																	<i class="icon-remove bigger-125"></i>

																</a>

															</div>

-->														</div>

<?php } ?>

														



													</div>

												</div>

											</div>

										</div>





											</div>



											

										</div>

									</div>







						</div><!--/.span-->

					</div><!--/.row-fluid-->

				</div><!--/.page-content-->



			</div><!--/.main-content-->

		</div><!--/.main-container-->



<?php include "include/footer.php"; ?>	

	<!--inline scripts related to this page-->

    <script>

	

					$('#profile-feed-1').slimScroll({

				height: '300px',

				alwaysVisible : true

				});





    $("#mail_id").click(function(e) {

				var postData=$("#ticket_add").serializeArray();//alert(postData);

                var formURL = "ajax/ticket_add.php";

				//alert(formURL);

						$.ajax(

						{

							url : formURL,

							type: "POST",

							data : postData,						

							success:function(data, textStatus, jqXHR) 

							{							

								if(data > 0){

									$("#nots").html("Ticket Raised.");

									$("#nots").addClass("alert alert-success");

									var issue=$("#form-field-2").val();
									var html='<div class="profile-activity clearfix">';
															html+='<div>';
															html+='<a href="index.php?page=ticket_detail&id=<?php echo $id; ?>&tkt='+data+'" > <i class="pull-left thumbicon  btn-pink no-hover">'+data+'</i>TICKET'+data+'	 -	'+issue+'</a>';
                                                            html+='<p><span class="label label-success arrowed">open</span></p>';
															html+='<div class="time"><i class="icon-time bigger-110"></i> 0 seconds ago</div></div></div>';
									$("#profile-feed-1").append(html);
									$("#reset").click();
								}else{

									$("#nots").html("There was a problem adding ticket to the support.<br/> Please try later");

									$("#nots").addClass("alert alert-error");

								}

							},

							error: function(jqXHR, textStatus, errorThrown) 

							{

								   alert("Change a few things up and try submitting again.");

							}

						});

    });

    

    </script>



	</body>

</html>

