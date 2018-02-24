  <link  href="../gps/ck/style.css" rel="stylesheet" type="text/css"/>


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
							<a href="index.php?page=newlogins&id=<?php echo $id; ?>">
							Create Sub Login</a>



							<span class="divider">

								<i class="icon-angle-right arrow-icon"></i>

							</span>

						</li>

					

					</ul><!--.breadcrumb-->



					

				</div>



				<div class="page-content">
					<div class="page-header position-relative">
						<h1>
							Sub-logins
						</h1>
					</div>
					<div class="row-fluid">

						<div class="span12">
						
	<?php
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
	}
	if(isset($_GET['msg']))
	{
		$msg=$_GET['msg'];
		?>
		<div class='alert alert-block alert-success'>
<button type="button" class="close" data-dismiss="alert">
<i class="icon-remove"></i>
</button>
Sub Login Created Successfully.
		</div>
		<?php
	}
	?>
	<form class="form-horizontal" action="pages/sublogins.php" method="POST">
	
	<?php
	$abcq=mysql_query("SELECT last_insert_id(customer_id) as id FROM customers order by customer_id desc limit 1");
		$rsabcq=mysql_fetch_array($abcq);
$ids=$rsabcq['id']+1;
					?>

					<input type="hidden" name="uid" id="uid" value="<?php echo 'CID_'.$ids;?>"/>
	<div class="control-group">
					<label class="control-label" for="form-field-1">Customer Name </label>
					<div class="controls">
			<input type="text" name="customer_name" id="customer_name" />			
			
					</div>
					</div>
					<div class="control-group">
					<label class="control-label" for="form-field-1">Username </label>
					<div class="controls">
			<input type="text" name="username" id="username" />			
			<input type="hidden" name="id" id="id" value="<?php echo $id;?>"/>			
					</div>
					</div>
					
					<div class="control-group">
					<label class="control-label" for="form-field-1">Password </label>
					<div class="controls">
			<input type="text" name="password" id="password" />			
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
</div>
</div>

<?php include "include/footer.php";?>
