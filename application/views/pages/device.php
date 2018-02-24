<?php 
if(isset($_GET['idn'])){

$idn=$_GET['idn'];
$cust=$_GET['id'];


?>


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
                
                
<?php
if($_POST['submit'] && $_POST['submit']=='submit'){
	
$sql="UPDATE installation SET device_name='".$_POST['devname']."', idle_limit='".$_POST['idle_limit']."',speed_limit='".$_POST['speed_limit']."',tank_capacity='".$_POST['tank_capacity']."',formula='".$_POST['formula']."' WHERE instatllation_id=".$_GET['idn'];
//echo $sql;
$rs=mysql_query($sql);

	if($rs!=FALSE){
?>
<div class="row-fluid">



				    <div class="span12">
<div class="alert alert-block alert-success">
								<button type="button" class="close" data-dismiss="alert">
									<i class="icon-remove"></i>
								</button>

								<i class="icon-ok green"></i>

								Device Details Updated Successfully
							</div>
                            </div>
                            </div>
<?php }else{ 
?> 
<div class="row-fluid">



				    <div class="span12">
<div class="alert alert-block alert-error">
								<button type="button" class="close" data-dismiss="alert">
									<i class="icon-remove"></i>
								</button>

								<i class="icon-remove"></i>
									Something went wrong!!!Please try later.
							
							</div>
                            </div>
                            </div>
<?php } } 
/*echo "SELECT

installation.device_name,
installation.image,
installation.speed_limit,
installation.idle_limit,
installation.tank_capacity
FROM

installation

WHERE instatllation_id=$idn";*/
$s="SELECT

installation.device_name,
installation.image,
installation.speed_limit,
installation.idle_limit,
installation.tank_capacity,
installation.formula
FROM

installation

WHERE instatllation_id=$idn";

$r=mysql_query($s);

$w=mysql_fetch_assoc($r);

?>                          




				



				    <div class="row-fluid">



				    <div class="span12">



<h4 class="header blue bolder smaller">Device Profile</h4>
<form action="track.php?page=device&id=<?php echo $cust;?>&idn=<?php echo $idn;?>" method="post">
<div class="row-fluid">
															<div class="span4">
																
                                                                <img id="avatar" class="editable" alt="<?php echo $w['device_name']; ?>'s Avatar" src="../gps/modeluploads/<?php echo $w['image']; ?>" />
                                                               
                                                               
															</div>

															<div class="vspace"></div>

															<div class="span8">
																<div class="control-group">
																	<label class="control-label" for="form-field-devname">Device Name</label>

																	<div class="controls">
																		<input type="text" id="form-field-devname" placeholder="Device Name" value="<?php echo $w['device_name']; ?>" name="devname">
																	</div>
																</div>
                                                                <div class="control-group">
																	<label class="control-label" for="form-field-devname">Speed Limit</label>

																	<div class="controls">
																		<input type="text" id="form-field-devname" placeholder="Speed Limit" value="<?php echo $w['speed_limit']; ?>" name="speed_limit">
                                                                        <span class="help-inline">km/hr</span>
																	</div>
																</div>
                                                                 <div class="control-group">
																	<label class="control-label" for="form-field-devname">Idle Limit</label>

																	<div class="controls">
																		<input type="text" id="form-field-devname" placeholder="Idle Limit" value="<?php echo $w['idle_limit']; ?>" name="idle_limit">
                                                                        <span class="help-inline">minutes</span>
																	</div>
																</div>
																
																<div class="control-group">
																	<label class="control-label" for="form-field-devname">Fuel Tank Capacity</label>

																	<div class="controls">
																		<input type="text" id="form-field-devname" placeholder="Fuel Tank Capacity" value="<?php echo $w['tank_capacity']; ?>" name="tank_capacity">
                                                                        <span class="help-inline">Litres</span>
																	</div>
																</div>

																<div class="control-group" style="display: none;">
																	<label class="control-label" for="form-field-formula">Formula</label>

																	<div class="controls">
																		<!--<input type="text" id="form-field-formula" placeholder="Formula" value="<?php echo $w['formula']; ?>" name="formula">-->
																		<textarea id="form-field-formula" name="formula"><?php echo $w['formula']; ?></textarea>
                                                                        <span class="help-inline"></span>
																	</div>
																</div>


																
															</div>
														</div>
                                                        
                                           <div class="form-actions">
												<button class="btn btn-info" type="submit" name="submit" value="submit">
													<i class="icon-ok bigger-110"></i>
													Save
												</button>

												&nbsp; &nbsp; &nbsp; 
                                                <a href="track.php?page=dashboard&id=<?php echo $cust; ?>">
												<button class="btn" type="button">
                                               
													<i class="icon-arrow-left bigger-110"></i>
													Back
                                                   
												</button> </a>
											</div>
                                            
</form>

</div>



</div>



  </div><!--/.page-content-->







			



			</div><!--/.main-content-->



		</div><!--/.main-container-->








<?php include("include/footer.php"); ?>





	<script type="text/javascript">



	$(function(){

				$.fn.editable.defaults.mode = 'inline';

				$.fn.editableform.loading = "<div class='editableform-loading'><i class='light-blue icon-2x icon-spinner icon-spin'></i></div>";

			    $.fn.editableform.buttons = '<button type="submit" id="save-btn" class="btn btn-info editable-submit"><i class="icon-ok icon-white"></i></button>'+

			                                '<button type="button" class="btn editable-cancel"><i class="icon-remove"></i></button>';    


	
	// *** editable avatar *** //
				try {//ie8 throws some harmless exception, so let's catch it
			
					//it seems that editable plugin calls appendChild, and as Image doesn't have it, it causes errors on IE at unpredicted points
					//so let's have a fake appendChild for it!
					if( /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase()) ) Image.prototype.appendChild = function(el){}
			
			
					var last_gritter
					$('#avatar').editable({
						type: 'image',
						name: 'image',
						pk: <?php echo $idn; ?>,
						value: null,						
						image: {
							//specify ace file input plugin's options here
							btn_choose: 'Click to Change Device Image',
							droppable: true,
							/**
							//this will override the default before_change that only accepts image files
							before_change: function(files, dropped) {
								return true;
							},
							*/
			
							//and a few extra ones here
							name: 'image',//put the field name here as well, will be used inside the custom plugin
							//max_size: 110000,//~100Kb
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
var submit_url = 'ajax/edit_device_det.php';
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
	//var pk_key=$('#avatar').attr("data-id");
fd.append('pk',<?php echo $idn; ?> );
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
				

				


	});

	</script>






<?php } ?>










</body></html>



