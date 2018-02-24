<?php 
$dev_count = $dev_count['data'][0];
$idomer = $userinfo['customer'];
?>

			<div class="main-content">

				<div class="breadcrumbs" id="breadcrumbs">

					<ul class="breadcrumb">

						<li>

							<i class="icon-home home-icon"></i>

							<a href="<?=base_url();?>profile/index/<?php echo $id; ?>">Home</a>



							<span class="divider">

								<i class="icon-angle-right arrow-icon"></i>

							</span>

						</li>



						

						<li class="active">User Profile</li>

					</ul><!--.breadcrumb-->



					

				</div>



				<div class="page-content">

					<div class="page-header position-relative">

						<h1>

							Welcome <?php echo $userinfo['customer_first_name']; ?>,

                            <small>

								

								Your Customer ID is CID<?php echo $id; ?>

							</small>

						</h1>

					</div><!--/.page-header-->



					<div class="row-fluid">

						<div class="span12">

							<!--PAGE CONTENT BEGINS-->



							<div class="clearfix">



								

							</div>





							<div>

								<div id="user-profile-1" class="user-profile row-fluid">

									<div class="span3 center">

										<div>

											<span class="profile-picture">
<?php
if(isset($idomer['profile_image']) && $idomer['profile_image']!=''){
?>
												<img id="avatar" class="editable" alt="<?php echo $idomer['customer_first_name']; ?>'s Avatar" src="assets/uploads/<?php echo $idomer['profile_image']; ?>" />
<?php	
	
}else if(isset($idomer['sex']) && $idomer['sex']=='female'){

?>
												<img id="avatar" class="editable" alt="<?php echo $idomer['customer_first_name']; ?>'s Avatar" src="assets/avatars/avatar3.png" />
<?php } else{ ?>
												<img id="avatar" class="editable" alt="<?php echo $idomer['customer_first_name']; ?>'s Avatar" src="assets/avatars/avatar5.png" />
<?php
} ?>
											</span>



											<div class="space-4"></div>



											<div class="width-80 label label-info label-large arrowed-in arrowed-in-right">

												<div class="inline position-relative">

													<a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">

														<i class="icon-circle light-green middle"></i>

														&nbsp;

														<span class="white middle bigger-120">

														<?php echo $idomer['customer_first_name']; ?>

														<?php echo $idomer['customer_middle_name']; ?>

                                                        <?php echo $idomer['customer_last_name']; ?>

                                                        </span>

													</a>



													<ul class="align-left dropdown-menu dropdown-caret dropdown-lighter">

														<li class="nav-header"> Change Status </li>



														<li>

															<a href="#">

																<i class="icon-circle green"></i>

																&nbsp;

																<span class="green">Available</span>

															</a>

														</li>



														<li>

															<a href="#">

																<i class="icon-circle red"></i>

																&nbsp;

																<span class="red">Busy</span>

															</a>

														</li>



														<li>

															<a href="#">

																<i class="icon-circle grey"></i>

																&nbsp;

																<span class="grey">Invisible</span>

															</a>

														</li>

													</ul>

												</div>

											</div>

										</div>



										<div class="space-6"></div>



										<div class="profile-contact-info">

											<div class="profile-contact-links align-left">

												<p><a class="btn btn-link" href="#">

													<i class="icon-phone bigger-120 green"></i>

													<?php echo $idomer['customer_phone_no'] ; ?>

												</a>

												</p><p>

												<a class="btn btn-link" href="#">

													<i class="icon-envelope bigger-120 pink"></i>

													<?php echo $idomer['customer_emailid'] ; ?>

												</a>

												</p><p>

												<a class="btn btn-link" href="<?php echo $idomer['website'] ; ?>">

													<i class="icon-globe bigger-125 blue"></i>

													<?php echo $idomer['website'] ; ?>

												</a>

                                                </p>

											</div>



											<div class="space-6"></div>



											

										</div>



										<div class="hr hr12 dotted"></div>



										<div class="clearfix">

											<div class="grid4">

												<span class="bigger-175 blue"><?php echo $dev_count['cnt']; ?></span>



												<br />

												Devices Installed

											</div>



										</div>



										<div class="hr hr16 dotted"></div>

									</div>



									<div class="span9">



                                    <div id="friends" class="tab-pane active">

												<div class="profile-users clearfix">

                                                

<?php 

									

										if(isset($devices[0]) && $devices[0]){
										foreach($devices['data'] as $devices){

										

										?>

													

													



													<div class="itemdiv memberdiv">

														<div class="inline position-relative">

															<div class="user">

																<a href="#">

																	<img src="<?php echo base_url(); ?>gps/modeluploads/<?php echo $devices['image']; ?>" alt="Jim Doe's avatar">

																</a>

															</div>



															<div class="body">

																<div class="name">

																	<a href="#">

																		<span class="user-status status-busy"></span>
<?php
																echo $devices['device_name']; ?>

																	</a>

																</div>

															</div>



															<div class="popover right">

																<div class="arrow"></div>



																<div class="popover-content">

																	<div class="bolder">IMEI: <?php echo $devices['imie_no']; ?></div>



																	<div class="time">

																		<i class="icon-check middle bigger-120 green"></i>

																		<span class="grey"><?php echo $devices['conditions']; ?></span>

																	</div>



																	<div class="hr dotted hr-8"></div>



																	<div class="tools action-buttons">

																		Device for: <?php echo $devices['category_type']; ?>

																	</div>

																</div>

															</div>

														</div>

													</div>



													



											<?php } }?>		

													



												

												</div>

                                                

                                                



												<div class="hr hr10 hr-double"></div>



<!--												<ul class="pager pull-right">

													<li class="previous disabled">

														<a href="#">← Prev</a>

													</li>



													<li class="next">

														<a href="#">Next →</a>

													</li>

												</ul>

-->											</div>

                                            

                                            

                                            <!------------------------------->

										





										<div class="space-20"></div>



										<div class="profile-user-info profile-user-info-striped">

											<div class="profile-info-row">

												<div class="profile-info-name"> Name </div>



												<div class="profile-info-value">

													<span class="editable" id="username">

                                                    	<?php echo $idomer['customer_first_name']; ?> <?php echo $idomer['customer_middle_name']; ?> <?php echo $idomer['customer_last_name']; ?>

                                                    </span>

												</div>                                                

											</div>





											<div class="profile-info-row">

												<div class="profile-info-name" > Gender </div>



												<div class="profile-info-value">

													<span class="editable" id="gender" data-pk="<?php echo $id; ?>" data-value="<?php echo $idomer['sex']; ?>" data-source="{'male': 'male', 'female': 'female'}" data-type="select" data-name="sex" data-original-title="Select Gender">

                                                    	<?php echo $idomer['sex']; ?> 

                                                    </span>

												</div>                                                

											</div>

                                            

											<div class="profile-info-row">

												<div class="profile-info-name"> Date Of Birth </div>



												<div class="profile-info-value">

													<span class="editable" id="dob"><?php echo $idomer['dob']; ?> </span>

												</div>

											</div>

                                            

											<div class="profile-info-row">

												<div class="profile-info-name"> Phone Number </div>



												<div class="profile-info-value">

													<span class="editable" id="phone">

                                                    	<?php echo $idomer['customer_phone_no']; ?> 

                                                    </span>

												</div>                                                

											</div>

	<div class="profile-info-row">

												<div class="profile-info-name"> Telephone Number </div>



												<div class="profile-info-value">

													<span  class="editable" id="tel_phone_no" >

                                                    	<?php echo $idomer['tel_phone_no']; ?> 

                                                    </span>

												</div>                                                

											</div>
    

    											<div class="profile-info-row">

												<div class="profile-info-name"> Email </div>



												<div class="profile-info-value">

													<span class="editable" id="email">

                                                    	<?php echo $idomer['customer_emailid']; ?> 

                                                    </span>

												</div>                                                

											</div>
                                            <div class="profile-info-row">

												<div class="profile-info-name"> Password </div>



												<div class="profile-info-value">

													<span class="editable" id="pw">

                                                    	<?php echo $idomer['password']; ?> 

                                                    </span>

												</div>                                                

											</div>
                            

											<div class="profile-info-row">

												<div class="profile-info-name"> Address </div>



												<div class="profile-info-value">

													<span class="editable" id="addr"><?php echo $idomer['address']; ?></span>

												</div>

											</div>
                                            
                                            <div class="profile-info-row">

												<div class="profile-info-name"> Pin Code </div>



												<div class="profile-info-value">

													<span class="editable" id="pinc"><?php echo $idomer['pin_code']; ?></span>

												</div>

											</div>

										

                                        
<!--
											<div class="profile-info-row">

												<div class="profile-info-name"> Website </div>



												<div class="profile-info-value">

													<span class="editable" id="web"><?php echo $idomer['website']; ?> </span>

												</div>

											</div>-->

										</div>

										<div class="space-20"></div>



										<div class="widget-box transparent">

											<div class="widget-header widget-header-small">

												<h4 class="blue smaller">

													<i class="icon-rss orange"></i>

													Notifications

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
$rs3 = $this->action_model->GetData('notifications','',array('customer_id'=>$id),'','ts desc,notification_id desc');
$rs3 = $rs3['data'];					
							$limit=0;
										foreach($rs3 as $nots){
if($limit<=15){
$rsinv = $this->action_model->GetData('customers',array('dealers_customer'),array('customer_id'=>$id));			
$rwinv=$rsinv['data'][0];					
if($rwinv['dealers_customer']==1 && ($nots['action']=='invoice' || $nots['action']=='payment' || $nots['action']=='r_exp' || $nots['action']=='r_expd' || $nots['action']=='renewed' || $nots['action']=='renew_fail')){}else{$limit++;
													?>

														<div class="profile-activity clearfix">

                                                             <a href="<?=base_url();?>profile/mail/<?php echo $id; ?>/<?php echo $nots['notification_id']; ?>" style="text-decoration:none;">



															<div>

																

																

																<?php  

																echo $this->commonfunctions_model->limit_words($nots['notification'],5)."...";																

																echo "<i class=\"pull-left thumbicon ".$this->commonfunctions_model->get_nots_icon($nots['action'])." no-hover\"></i>";



/*																	if($nots['action']=='order'){

																	 	echo "Ordered device <a href=\"#\">".$nots['device_type']." (".$nots['count_cost'].")</a> for ".$nots['category_type'];

																		echo "<i class=\"pull-left thumbicon icon-ok btn-success no-hover\"></i>";

																	 }else if($nots['action']=='payment'){

																		 echo "Payment processed successfully for <a href=\"#\">Order ".$nots['order_id']." (Rs.".$nots['count_cost'].")</a>";

																		 echo "<i class=\"pull-left thumbicon icon-credit-card btn-info no-hover\"></i>";

																	 }else if($nots['action']=='invoice'){

																		 echo "Generated Invoice for <a href=\"#\">Order ".$nots['order_id']." (Rs.".$nots['count_cost'].")</a>";

																		 echo "<i class=\"pull-left thumbicon icon-list btn-pink no-hover\"></i>";

																	 }

*/																 ?> 

																



																<div class="time">

																	<i class="icon-time bigger-110"></i>

                                                                    

                                                                    <?php

																	$tstamp = strtotime($nots['ts']); 

																	$hours = $this->commonfunctions_model->time_elapsed_string($tstamp);

																	echo $hours;

																	?>

																	

																</div>

															</div>

                                                            </a>



<!--															<div class="tools action-buttons">

																<a href="#" class="blue">

																	<i class="icon-pencil bigger-125"></i>

																</a>



																<a href="#" class="red">

																	<i class="icon-remove bigger-125"></i>

																</a>

															</div>

-->														</div>

<?php }}} ?>

														



													</div>

												</div>

											</div>

										</div>



										<div class="hr hr2 hr-double"></div>



										<div class="space-6"></div>



										<div class="center">

											<a href="<?=base_url()?>profile/notifications/<?php echo $id; ?>" class="btn btn-small btn-primary">

												<i class="icon-rss bigger-150 middle"></i>



												View more activities

												<i class="icon-on-right icon-arrow-right"></i>

											</a>

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



		<!--inline scripts related to this page-->



		<script type="text/javascript">

			$(function() {

			$('#profile-feed-1').slimScroll({

				height: '250px',

				alwaysVisible : true

				});

				//editables on first profile page

				$.fn.editable.defaults.mode = 'inline';

				$.fn.editableform.loading = "<div class='editableform-loading'><i class='light-blue icon-2x icon-spinner icon-spin'></i></div>";

			    $.fn.editableform.buttons = '<button type="submit" id="save-btn" class="btn btn-info editable-submit"><i class="icon-ok icon-white"></i></button>'+

			                                '<button type="button" class="btn editable-cancel"><i class="icon-remove"></i></button>';    

				

				//editables 

			    $('#username').editable({

			           type: 'text',

			           name: 'username',

					   pk: <?php echo $id; ?>,

   					   url: 'ajax/edituser.php',

					   send: 'always',

					   success: function(response, newValue) {

							if(!response.success) return response.msg;

						}

					   

			    });

				

				$('#gender').editable({


   					   url: 'ajax/edituser.php',

					   send: 'always',
					   

					   

			    });

				

				$('#dob').editable({

					type: 'date',

					name:'dob',

					format: 'yyyy-mm-dd',

					viewformat: 'dd/mm/yyyy',

					datepicker: {

						weekStart: 1

					},

					pk: <?php echo $id; ?>,

   					url: 'ajax/edituser.php',

					send: 'always',

					   

				});

				$('#phone').editable({

			           type: 'text',

			           name: 'customer_phone_no',

					   pk: <?php echo $id; ?>,

   					   url: 'ajax/edituser.php',

					   send: 'always',

					   

			    });

				$('#email').editable({

			           type: 'text',

			           name: 'customer_emailid',

					   pk: <?php echo $id; ?>,

   					   url: 'ajax/edituser.php',

					   send: 'always',
					   validate: function(value) {
						    if($.trim(value) == '') {
						        return 'This field is required';
						    }
						}

					   

			    });



				$('#web').editable({

			           type: 'text',

			           name: 'website',

					   pk: <?php echo $id; ?>,

   					   url: 'ajax/edituser.php',

					   send: 'always',

					   

			    });
				$('#tel_phone_no').editable({

			           type: 'text',

			           name: 'tel_phone_no',

					   pk: <?php echo $id; ?>,

   					   url: 'ajax/edituser.php',

					   send: 'always',

					   

			    });
				$('#pw').editable({

			           type: 'text',

			           name: 'password',

					   pk: <?php echo $id; ?>,

   					   url: 'ajax/edituser.php',

					   send: 'always',

					   

			    });

				$('#addr').editable({

			           type: 'textarea',

			           name: 'address',

					   pk: <?php echo $id; ?>,

   					   url: 'ajax/edituser.php',

					   send: 'always',

					   

			    });
				$('#pinc').editable({

			           type: 'text',

			           name: 'pin_code',

					   pk: <?php echo $id; ?>,

   					   url: 'ajax/edituser.php',

					   send: 'always',

					   

			    });




				

				
// *** editable avatar *** //
				try {//ie8 throws some harmless exception, so let's catch it
			
					//it seems that editable plugin calls appendChild, and as Image doesn't have it, it causes errors on IE at unpredicted points
					//so let's have a fake appendChild for it!
					if( /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase()) ) Image.prototype.appendChild = function(el){}
			
					var last_gritter
					$('#avatar').editable({
						type: 'image',
						name: 'profile_image',
						pk: <?php echo $id; ?>,
						value: null,						
						image: {
							//specify ace file input plugin's options here
							btn_choose: 'Change Avatar',
							droppable: true,
							/**
							//this will override the default before_change that only accepts image files
							before_change: function(files, dropped) {
								return true;
							},
							*/
			
							//and a few extra ones here
							name: 'profile_image',//put the field name here as well, will be used inside the custom plugin
							max_size: 110000,//~100Kb
							on_error : function(code) {//on_error function will be called when the selected file has a problem
								if(last_gritter) $.gritter.remove(last_gritter);
								if(code == 1) {//file format error
									last_gritter = $.gritter.add({
										title: 'File is not an image!',
										text: 'Please choose a jpg|gif|png image!',
										class_name: 'gritter-error gritter-center'
									});
								} else if(code == 2) {//file size rror
									last_gritter = $.gritter.add({
										title: 'File too big!',
										text: 'Image size should not exceed 100Kb!',
										class_name: 'gritter-error gritter-center'
									});
								}
								else {//other error
								}
							},
							on_success : function() {
								$.gritter.removeAll();
							}
						},
					    url: function(params) {
							// ***UPDATE AVATAR HERE*** //
							//You can replace the contents of this function with examples/profile-avatar-update.js for actual upload
			
			
			

//please modify submit_url accordingly
var submit_url = 'ajax/edituser.php';
var deferred;


//if value is empty, means no valid files were selected
//but it may still be submitted by the plugin, because "" (empty string) is different from previous non-empty value whatever it was
//so we return just here to prevent problems
var value = $('#avatar').next().find('input[type=hidden]:eq(0)').val();
if(!value || value.length == 0) {
	deferred = new $.Deferred
	deferred.resolve();
	return deferred.promise();
}

var $form = $('#avatar').next().find('.editableform:eq(0)')
var file_input = $form.find('input[type=file]:eq(0)');

//user iframe for older browsers that don't support file upload via FormData & Ajax
if( !("FormData" in window) ) {
	deferred = new $.Deferred

	var iframe_id = 'temporary-iframe-'+(new Date()).getTime()+'-'+(parseInt(Math.random()*1000));
	$form.after('<iframe id="'+iframe_id+'" name="'+iframe_id+'" frameborder="0" width="0" height="0" src="about:blank" style="position:absolute;z-index:-1;"></iframe>');
	$form.append('<input type="hidden" name="temporary-iframe-id" value="'+iframe_id+'" />');
	$form.next().data('deferrer' , deferred);//save the deferred object to the iframe
	$form.attr({'method' : 'POST', 'enctype' : 'multipart/form-data',
				'target':iframe_id, 'action':submit_url});

	$form.get(0).submit();

	//if we don't receive the response after 60 seconds, declare it as failed!
	setTimeout(function(){
		var iframe = document.getElementById(iframe_id);
		if(iframe != null) {
			iframe.src = "about:blank";
			$(iframe).remove();
			
			deferred.reject({'status':'fail','message':'Timeout!'});
		}
	} , 60000);
}
else {
	var fd = null;
	try {
		fd = new FormData($form.get(0));
	} catch(e) {
		//IE10 throws "SCRIPT5: Access is denied" exception,
		//so we need to add the key/value pairs one by one
		fd = new FormData();		
		$.each($form.serializeArray(), function(index, item) {
			fd.append(item.name, item.value);
		});
		//and then add files because files are not included in serializeArray()'s result
		$form.find('input[type=file]').each(function(){
			if(this.files.length > 0) fd.append(this.getAttribute('name'), this.files[0]);
		});
	}
	
	//if file has been drag&dropped , append it to FormData
	if(file_input.data('ace_input_method') == 'drop') {
		var files = file_input.data('ace_input_files');
		if(files && files.length > 0) {
			fd.append(file_input.attr('name'), files[0]);
		}
	}
fd.append('pk', '<?php echo $id; ?>');
	deferred = $.ajax({
		url: submit_url,
		type: 'POST',
		processData: false,
		contentType: false,
		dataType: 'json',
		data: fd,
		xhr: function() {
			var req = $.ajaxSettings.xhr();
			/*if (req && req.upload) {
				req.upload.addEventListener('progress', function(e) {
					if(e.lengthComputable) {	
						var done = e.loaded || e.position, total = e.total || e.totalSize;
						var percent = parseInt((done/total)*100) + '%';
						//bar.css('width', percent).parent().attr('data-percent', percent);
					}
				}, false);
			}*/
			return req;
		},
		beforeSend : function() {
			//bar.css('width', '0%').parent().attr('data-percent', '0%');
		},
		success : function() {
			//bar.css('width', '100%').parent().attr('data-percent', '100%');
		}
	})
}
								var thumb = $('#avatar').next().find('img').data('thumb');
									if(thumb) $('#avatar').get(0).src = thumb;
								//deferred.resolve({'status':'OK'});
								if(last_gritter) $.gritter.remove(last_gritter);
								last_gritter = $.gritter.add({
									title: 'Profile Image Updated!',
									text: 'Updated your profile picture with new image.',
									class_name: 'gritter-info gritter-center'
								});

/*deferred.done(function(res){
	if(res.status == 'OK') $('#avatar').get(0).src = res.url;
	else alert(res.message);
}).fail(function(res){
	alert("Failure");
});
*/

return deferred.promise();			
			
						}
					})
				}catch(e) {}
				

				

			

				

			

				//////////////////////////////

				

			

				$('.profile-social-links > a').tooltip();

			

				

			  

				///////////////////////////////////////////

			

				

				

				





			});

		</script>

	</body>

</html>

