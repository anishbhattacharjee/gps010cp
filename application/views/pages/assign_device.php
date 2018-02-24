  <link  href="../gps/ck/style.css" rel="stylesheet" type="text/css"/>
<style>
#branches a+a:before {
  display: inline;
  content: ",";
  margin-left: 1px;
  margin-right: 3px;
  color: #666;
  border-bottom: 1px solid #FFF;
}
.editable-empty{
	color:#DD1144 !important;
}
</style>
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
							<a href="index.php?page=assign_device&id=<?php echo $id; ?>">
							Assign Device</a>



							<span class="divider">

								<i class="icon-angle-right arrow-icon"></i>

							</span>

						</li>

					

					</ul><!--.breadcrumb-->



					

				</div>



				<div class="page-content">
					<div class="page-header position-relative">
						<h1>
							Assign Devices
						</h1>
					</div>
					<div class="row-fluid">

						<div class="span12">
					
	<?php
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
	}/*
	if(isset($_GET['msg']))
	{
		$msg=$_GET['msg'];
		?>
		<div class='alert alert-block alert-success'>
<button type="button" class="close" data-dismiss="alert">
<i class="icon-remove"></i>
</button>
Device Assigned Successfully.
		</div>
		<?php
	}*/
	?>
	<form class="form-horizontal" action="pages/assigned.php" method="POST">

					<div class="control-group">
					<label class="control-label" for="form-field-1">Username </label>
					<div class="controls">
<select class="chzn-select" id="form-field-select-3" name="customer_id" data-placeholder="Choose a Customer...">
<option value="">Please Choose Customer</option>

<?php
$qq=mysql_query("select * from customers where sub_login_createdby=$id");

while($sq=mysql_fetch_array($qq))
{ 
?>
<option value="<?php echo $sq['customer_id'];?>"><?php echo $sq['customer_first_name']."-".$sq['customer_emailid'];?></option>
<?php
}

?>

</select>		
			<input type="hidden" name="id" id="id" value="<?php echo $id;?>"/>			
					</div>
					</div>
					<div class="control-group">
					<label class="control-label" for="form-field-1">Choose Device </label>
					<div class="controls">
					<select multiple="" name="device[]" class="chzn-select" id="form-field-select-4" data-placeholder="Choose a Device...">
					  <?php
        $qqss=mysql_query("select * from installation where customer_id=$id");

while($sqs3=mysql_fetch_array($qqss))
{ 
$imei= $sqs3['imie_no'];
$device_name= $sqs3['device_name'];
$instatllation_id= $sqs3['instatllation_id'];
        ?>
            <option value="<?php echo $instatllation_id;?>"><?php echo $imei."-".$device_name;?></option>
          <?php } ?>
					</select>
					</div>
					</div>
				
				
					
						<div class="control-group">
									<label class="control-label" for="form-field-1"></label>

									<div class="controls">
									<button class="btn btn-small btn-primary" type="submit" name="submit" >
										<i class="icon-ok"></i>
										Submit
									</button>
									</div>
									</div>
	
	</form>

</div>
</div>

<h3 class="header smaller lighter blue">Manage Branches & Devices</h3>

<div class="row-fluid">
	<div class="span12">
		<table id="sample-table-2" class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th class="center">
												SlNo
											</th>
											<th>Vehicle</th>
											<th>IMEI</th>
											<th>Branch</th>
											
										</tr>
									</thead>

									<tbody id="branches">
									<?php
$sqdev=mysql_query("select * from installation where customer_id=$id");
while($devs=mysql_fetch_array($sqdev))
{ 
	$imei_c=$devs['imie_no'];
	$sqbranch="select i.instatllation_id,c.customer_emailid from installation i left join customers c on i.customer_id=c.customer_id where imie_no='$imei_c' and i.customer_id<>$id";
	$rsbranch=mysql_query($sqbranch);
	/*$branches="";
	
		$branches.=$branch['customer_emailid'].",";
	}
	$branches=rtrim($branches,",");
	*/
?>
										<tr >
											<td class="center">												
											</td>
											<td><?php echo $devs['device_name']; ?></td>
											<td><?php echo $imei_c; ?></td>
											<!--<td><?php echo $branches; ?></td>	-->										
											<td>
											<?php 
											if($rsbranch && mysql_num_rows($rsbranch) > 0){
											while($branch=mysql_fetch_assoc($rsbranch)){ ?>
											<a href="#" id="branch_<?php echo $branch['instatllation_id']; ?>" data-type="select" data-name="branch" data-pk="<?php echo $branch['instatllation_id']; ?>" data-value="<?php echo $branch['customer_emailid']; ?>"  data-original-title="Select Branch"  data-imei="<?php echo $imei_c; ?>" class="editable" style="color: green;"><?php echo $branch['customer_emailid']; ?></a>
											<span class="badge badge-transparent tooltip-error" title="" data-original-title="Remove&nbsp;From&nbsp;Branch" style=" cursor:pointer;" onclick="if(confirm('Remove Device From Branch ?')){deleteInstallation(<?php echo $branch['instatllation_id']; ?>)}else{return false;};">
									<i class="icon-remove red "></i>
								</span>
											<?php }}else{ ?>
											<a href="#" id="branch_0" data-type="select" data-name="branch" data-pk="0" data-value=""  data-original-title="Select Branch" data-imei="<?php echo $imei_c; ?>" class="editable editable-empty" style="color: green;">Empty</a>
											<?php } ?>	
											</td>		
																			
										</tr>
<?php } ?>										
									</tbody>
		</table>		
	</div>
</div>
</div>
</div>



<?php include "include/footer.php";?>
<script src="http://cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/js/jquery.dataTables.bootstrap.js"></script>
<script type="text/javascript">
			$(function() {
	$(".chzn-select").chosen(); 
	
	var t = $('#sample-table-2').DataTable( {					
			        "columnDefs": [ {
			            "searchable": false,
			            "orderable": false,
			            "targets": 0
			        } ],
			    } );
			 
			    t.on( 'order.dt search.dt', function () {
			        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
			            cell.innerHTML = i+1;
			        } );
			    } ).draw();
				
				var branches = [];
				$.ajax({
				  method: "POST",
				  url: "ajax/narayana_branch.php",
				  data: { req:"branches_data",id:<?php echo $id; ?> },
				  dataType:'json'
				})
				  .done(function( resp ) {
				    $.each(resp , function(k, v){
						branches.push({id: k, text: v});
					});

				  });
				 

				$("#branches").editable({       
					   selector: '[id^="branch_"]',
   					   url: 'ajax/narayana_branch.php',
					   source: branches,
					   send: 'always',
					   params: function(params) {
							// add additional params from data-attributes of trigger element
							params.imei = $(this).editable().data('imei');
							//params.dev = $(this).editable().data('dev');
							return params;
						},
						success: function(response, newValue) {//console.log("tst");
							//if(!response.success) return response.msg;
							//else{console.log("tst1");
								//reloadStatusS();
							//}
							window.location.reload();
							//console.log("tst1");
							
						},
						error: function(response, newValue) {
					    if(response.status === 500) {
					        return 'Service unavailable. Please try later.';
					    } else {
					        return response.responseText;
					    }
					}
										   
									 
						
					   

			    });
	});
	function deleteInstallation(id){
		$.ajax({
				  method: "POST",
				  url: "ajax/narayana_remove.php",
				  data: { id:id }
				})
				  .done(function( resp ) {
				   //window.location.reload();
					$("#branch_"+id).closest( "tr" ).remove();
				  });
	}
		</script>