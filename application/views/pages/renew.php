<?php 
$rid=$_GET['rid'];
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

							<a href="index.php?page=subscription&id=<?php echo $id; ?>">Subscription</a>



							<span class="divider">

								<i class="icon-angle-right arrow-icon"></i>

							</span>

						</li>

						<li class="active">Renew Subscription</li>

					</ul><!--.breadcrumb-->



					

				</div>

<style>
.control-group input[type="text"] {
width: 107px;
}
</style>

				<div class="page-content">

					<div class="page-header position-relative">

						<h1>

							Renew Your Subscription
                           
						</h1>

					</div><!--/.page-header-->



					<div class="row-fluid">

						<div class="span12">

							<!--PAGE CONTENT BEGINS--><!--/row-->

							<div>

								


<form class="form-horizontal" action="index.php?page=gen_rinv&id=<?php echo $id; ?>" method="post">
					
					<?php 
						$installation_id = $rid;
						$customer_id = $id;
					
							$qo=mysql_query("Select *,DATE_ADD(installed_date, INTERVAL submonth MONTH) as expiry_date from r_installation where r_id=$rid");
							$rqo=mysql_fetch_array($qo);
							$order_id = $rqo['order_id'];
							
							?>
                            
						
								<?php
				$cid=$customer_id;
				$ss1=mysql_query("select * from customers where customer_id='$customer_id'");
										while($rsq1=mysql_fetch_array($ss1))
										{
										
										$firstname=$rsq1['customer_first_name'];
										$uid=$rsq1['customer_uid'];
										?>
										<?php }  ?>		
						 <div class="span12">
                         <div class="span0" ></div>
<div class="span3" >
						
							<div class="control-group">
									<label class="control-label" for="form-field-1">Customer Name </label>

									<div class="controls">
			
										<input type="text" value="<?php echo $firstname;?>" readonly="">
										
							</div>
							</div>
							</div>
							<div class="span3" >
							<div class="control-group">
									<label class="control-label" for="form-field-1">Customer ID </label>

									<div class="controls">
									<input type="text" value="<?php echo $uid;?>" readonly="">
									</div>
									</div>
									</div>
								<div class="span3" >
							<div class="control-group">
									<label class="control-label" for="form-field-1">Order ID </label>

									<div class="controls">
					
										<input type="text" value="<?php echo "OD_".$order_id;?>" readonly="">
										
							</div>
							</div>
							</div>
							</div>
							
									
							
									 <div class="span12">
<div class="span3" >
							
							<div class="control-group">
									<label class="control-label" for="form-field-1">Subscription Start Date</label>

									<div class="controls">
										<input type="text" value="<?php echo date("d-m-Y",strtotime($rqo['installed_date']));?>" readonly="" name="ordereddate" id="ordereddate">
									</div>
									</div>
									</div>
								
								<div class="span3" >	
									<div class="control-group">
									<label class="control-label" for="form-field-1">Subscribed Months</label>

									<div class="controls">
										<input type="text" value="<?php echo $rqo['submonth'];?>" readonly="" name="ndev" id="ndev">
									</div>
									</div>
									</div>
									
									<div class="span3" >
									<div class="control-group">
									<label class="control-label" for="form-field-1">Expiry Date</label>

									<div class="controls">
										<input type="text" value="<?php echo date("d-m-Y",strtotime($rqo['expiry_date']));?>" readonly="" name="ndev" id="ndev">
									</div>
									</div>
									</div>
									</div>
									
									
									<?php

								$catid=$rqo['category_id'];
									$devid=$rqo['device_id'];
?>
 <div class="span12">
<div class="span3" >
							
							<div class="control-group">
									<label class="control-label" for="form-field-1">Category</label>

									<div class="controls">
<?php
									$sq=mysql_query("select * from gps_categories where category_id='$catid'");

									while($sqss=mysql_fetch_array($sq))

									{ ?>
							<input type="hidden" value="<?php echo $sqss['category_id'];?>" id="<?php echo "category_id";?>" name="<?php echo "category_id";?>" />
										<input type="text" value="<?php echo $sqss['category_type'];?>" id="<?php echo "cattype";?>" name="<?php echo "cattype";?>" readonly="" />
						<?php 
						
						} 
						
						?>
						</div>
						</div>
						</div>
						<div class="span3" >
							
							<div class="control-group">
									<label class="control-label" for="form-field-1">Device Type</label>

									<div class="controls">
						
						<?php
	$qq=mysql_query("select * from gps_devices where device_id='$devid'");

while($sqss=mysql_fetch_array($qq))

									{

										?>
		<input type="hidden" value="<?php echo $sqss['device_id'];?>" id="<?php echo "device_id";?>" name="<?php echo "device_id";?>" />
										<input type="text" value="<?php echo $sqss['device_type'];?>" id="<?php echo "devtype";?>" name="<?php echo "devtype";?>" readonly="" />
							

										<?php

									}

									?>
									</div>
									</div>
									</div>
									</div>
                                     <div class="span12"><div class="hr hr8 hr-double"></div></div>
									 <div class="span12" style="margin-left:12%; margin-top:20px;">
									 <table>
<tbody><tr><th>&nbsp;&nbsp;Choose Month</th><th style="margin-left: 46px;float: left;">Subscription Cost</th><th style="margin-left: 25px;float: left;">Network</th><th style="margin-left: 70px;float: left;">Sim Charge/Month</th></tr>
 
 </tbody>
 
 </table>
 <br />
 <select name="submonth" id="submonth" onchange="choosesubscription(this.value,<?php echo $catid;?>);" style="width: 172px;">
   <option >Choose Subscription</option>

								<?php 

								$qs=mysql_query("select * from device_subscription where category_id='$catid'");

								while($rss=mysql_fetch_array($qs))

								{

									$ct=$rss['cost'];

									$dis=$rss['discount'];

									

									$val=($ct)*($dis/100);

									$subcost=$ct-$val;

									?>

									

									

								 <option value="<?php echo $rss['month'];?>" id="<?php echo $catid;?>"><?php echo $rss['month']."Months"." - ".$subcost;?></option>	

								

								<?php

								}

								?>

</select>
<input type="text"   name="subcost" id="subcost" style="width:115px;" readonly="readonly" value="0"/>
<select name="network" id="network" onchange="getsimcharge(this,this.value);" style="width:150px;text-transform: capitalize;">

									<option>Choose Network</option>

									<?php

									$sq=mysql_query("select * from network");

									while($sqs=mysql_fetch_array($sq))

									{

										?>

									<option value="<?php echo $sqs['id'];?>" id="<?php echo $sqs['charge'];?>"><?php echo $sqs['network_name'];?></option>	

										<?php

									}

									?>

									

									</select>
						
		<input type="text"  name="simcharge" id="simcharge" style="width:115px;" value="0" readonly="readonly"/>
		
		<br />
		<br />
		<?php
			$ts=mysql_query("select * from settings");

										while($rts=mysql_fetch_array($ts))

										{

											$vat=$rts['vat_percentage'];

											$tax=$rts['service_tax_percentage'];

										}?>
							
	
							
							
							
		<div class="control-group">
									<label class="control-label" for="form-field-1">Service Tax</label>

									<div class="controls">
											<input type="text" name="servicetax" id="servicetax"  class="servicetax" value="<?php echo $tax;?>" style="width:50px" readonly=""/>
									</div>
									</div>
									
			<div class="control-group">
									<label class="control-label" for="form-field-1">Final Cost</label>

									<div class="controls">
											<input type="text" name="finalcost" id="finalcost"   style="width:100px" readonly="" value="0"/>
									</div>
									</div>
									<input type="hidden" name="rid" value="<?php echo $rid; ?>" />
						<div class="control-group">
									<label class="control-label" for="form-field-1"></label>

									<div class="controls">
											<input type="submit" name="submit" value="Renew"   style="width:100px" class="btn btn-success" />
									</div>
									</div>
		
		</div>
		</form>

							</div>





						</div><!--/.span-->

					</div><!--/.row-fluid-->

				

                

               

				</div><!--/.page-content-->



			</div><!--/.main-content-->

		</div><!--/.main-container-->



<?php include "include/footer.php"; ?>

		<!--inline scripts related to this page-->

		<script>
		
function choosesubscription(str,catid)

	{

 

var xmlhttp;    

if (window.XMLHttpRequest)

{// code for IE7+, Firefox, Chrome, Opera, Safari

xmlhttp=new XMLHttpRequest();

}

else



{// code for IE6, IE5



xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");



}



xmlhttp.onreadystatechange=function()



{



if (xmlhttp.readyState==4 && xmlhttp.status==200)



{


document.getElementById('subcost').value=xmlhttp.responseText;

gettotal();


}

}

xmlhttp.open("GET","ajax/getsubcost.php?c="+catid+"&d="+str,true);



xmlhttp.send();



}
function getsimcharge(str,strr)
{
		if(parseInt(document.getElementById('submonth').value)>0){}else{
			//document.getElementById("network").selectedIndex = 12;
			theText="Choose Network";
			$("#network option:contains(" + theText + ")").attr('selected', 'selected');			
			alert("Please Choose Subscription Months!!!");
			return false;
		}
		if($("#network option:selected").text()=='Choose Network'){
			document.getElementById('simcharge').value=0;
		}else{
			var element = $(str).find('option:selected'); 
			var simcharge = element.attr("id"); 
			document.getElementById('simcharge').value=simcharge;
		}
		gettotal();
		
}

function gettotal()
{
	
	submonth=parseFloat(document.getElementById('submonth').value);
	subcost=parseFloat(document.getElementById('subcost').value);
	simcharge=parseFloat(document.getElementById('simcharge').value);
	stax=parseFloat(document.getElementById('servicetax').value);
	simwithmonth=(simcharge*submonth);
	totall=parseFloat(((subcost)+(simwithmonth))*(stax/100));
	//console.log(simwithmonth);
	total=totall+(subcost)+(simwithmonth);
	//console.log(total);
	total=Math.round(total);
			document.getElementById('finalcost').value=parseFloat(total);
		
}
		
		</script>	
						

	</body>

</html>

