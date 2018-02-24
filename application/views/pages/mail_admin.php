<?php 

$sql="select * from admin_data";

$rs=mysql_query($sql);

$admin=mysql_fetch_assoc($rs);



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

							<a href="#">Contact</a>



							<span class="divider">

								<i class="icon-angle-right arrow-icon"></i>

							</span>

						</li>

						<li class="active">Contact Admin</li>

					</ul><!--.breadcrumb-->




				</div>



  <div class="page-content">

					<div class="page-header position-relative">

						<h1>

							Mail To Admin

							<small>

								<!--<i class="icon-double-angle-right"></i>-->

								<?php //echo $admin['email_id']; ?>

							</small>

						</h1>

					</div><!--/.page-header-->



					<div class="row-fluid">

					  <div class="span12">

							<!--PAGE CONTENT BEGINS-->

<div id="nots"></div>

							<form class="form-horizontal" id="contact_admin" />

								<div class="control-group" style="display:none;">

									<label class="control-label" for="form-field-1">Recipient</label>



									<div class="controls">

                                     <span class="input-icon">

									  <input type="hidden" id="form-field-1" name="tomail" placeholder="<?php echo $admin['email_id']; ?>" value="<?php echo "swathi@ossgpstracking.com";//echo $admin['email_id']; ?>" readonly="readonly" />

                                        <!--<i class="icon-user"></i>-->

                                      </span>

									</div>

								</div>



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

						</div><!--/.span-->

					</div><!--/.row-fluid-->

	</div><!--/.page-content-->

  </div><!--/.main-content-->

		</div><!--/.main-container-->



<?php include "include/footer.php"; ?>	

	<!--inline scripts related to this page-->

    <script>

    $("#mail_id").click(function(e) {

				var postData=$("#contact_admin").serializeArray();//alert(postData);

                var formURL = "ajax/mail_admin.php";

				//alert(formURL);

						$.ajax(

						{

							url : formURL,

							type: "POST",

							data : postData,						

							success:function(data, textStatus, jqXHR) 

							{							

								if(data=="Success"){

									$("#nots").html("Your mail has been send to the Administrator.");

									$("#nots").addClass("alert alert-success");

									$("#reset").click();

								}else{

									$("#nots").html("There was a problem sending mail to the Administrator.<br/> Please try later");

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

