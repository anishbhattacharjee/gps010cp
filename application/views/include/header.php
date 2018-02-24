<?php

$sq_n_od_ct="SELECT

ifnull(Sum(od.noofdevice),0) AS od_dev

FROM 

customer_orders o

INNER JOIN customer_order_details od ON o.order_id = od.order_id

INNER JOIN sfa_response r on od.order_id=r.order_id

WHERE o.customer_id=$id AND  DATE(o.order_date) > CURDATE() - INTERVAL 7 DAY and r.response_code=0 ";

$rs_n_od_ct=mysql_query($sq_n_od_ct);

$new_ord_cnt=mysql_fetch_assoc($rs_n_od_ct);

$new_ord_cnt=$new_ord_cnt['od_dev'];



$sq_od_ct="SELECT

count(customer_orders.order_id) as od_count

FROM

customer_orders

INNER JOIN sfa_response r on customer_orders.order_id=r.order_id

WHERE customer_id=$id AND  DATE(order_date) > CURDATE() - INTERVAL 7 DAY and r.response_code=0 ";

$rs_od_ct=mysql_query($sq_od_ct);

$new_od_cnt=mysql_fetch_assoc($rs_od_ct);

$new_pay_cnt=$new_od_cnt['od_count'];

$new_inv_cnt=$new_od_cnt['od_count'];



$not_ct=$new_ord_cnt+$new_pay_cnt+$new_inv_cnt;
?>




<!DOCTYPE html>

<html lang="en">

	<head>

		<meta charset="utf-8" />

		<title>GPS</title>



		<meta name="description" content="OSS GPS Vehicle Tracking System" />

		<meta name="viewport" content="width=device-width, initial-scale=1.0" />



		<!--basic styles-->



		<link href="assets/css/bootstrap.min.css" type="text/css"  rel="stylesheet" />

		<link href="assets/css/bootstrap-responsive.min.css"  type="text/css" rel="stylesheet" />

		<link rel="stylesheet" type="text/css"  href="assets/css/font-awesome.min.css" />



		<!--[if IE 7]>

		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />

		<![endif]-->



		<!--page specific plugin styles-->



		<link rel="stylesheet" type="text/css"  href="assets/css/jquery-ui-1.10.3.custom.min.css" />

		<link rel="stylesheet" type="text/css"  href="assets/css/jquery.gritter.css" />

		<link rel="stylesheet" type="text/css"  href="assets/css/select2.css" />

        <?php if(isset($page) && $page=='profile'){ ?>

		<link rel="stylesheet" type="text/css"  href="assets/css/bootstrap-editable.css" />

        <?php } ?>

        <?php if(isset($page) && ($page=='notifications' || $page=='trip_calendar')){ ?>

		<link rel="stylesheet" type="text/css"  href="assets/css/fullcalendar.css" />

		<?php } ?>
 		<?php if(isset($page) && $page!='dashboard'){ ?>
		<link rel="stylesheet" type="text/css"  href="assets/css/datepicker.css" />

		<link rel="stylesheet" type="text/css"  href="assets/css/bootstrap-timepicker.css" />		
		<?php } ?>
		
        <?php if(isset($page) && ($page=='playback_print' || $page=='report'|| $page=='reportjss'|| $page=='reportjss2'|| $page=='orig_report'|| $page=='playback_printcopy' || $page=='trip' || $page=='vega_report' || $page=='vtt_trips' || $page=='vtt_trip_download' || $page=='oil' || $page=='national_routes' || $page=='itctags' || $page=='itcreport' || $page=='report_anvis' || $page=='national_report' || $page=='national_report2' || $page=='cola_status' || $page=='cola_trips' || $page=='cola_trans' || $page=='reporttemp')){ ?>

        <link rel="stylesheet" type="text/css"  href="media/css/TableTools.css" />

		<?php } ?>
		

		<!--fonts-->



		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />



		<!--ace styles-->



		<link rel="stylesheet" type="text/css"  href="assets/css/ace.min.css" />

		<link rel="stylesheet" type="text/css"  href="assets/css/ace-responsive.min.css" />

		<link rel="stylesheet" type="text/css"  href="assets/css/ace-skins.min.css" />
		
	    <link rel="stylesheet" type="text/css"  href="assets/css/chosen.css" />
		
        



		<!--[if lte IE 8]>

		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />

		<![endif]-->



		<!--inline styles related to this page-->

        <style  type="text/css" >
		
.help-inline {
color: #b94a48;
}

		small img{

*width: 54%;

margin-top: -12px;

padding: 0px;

margin-bottom: -12px;

}
.nav-list>li>a>[class*="icon-"]{
	color:#C64545;
}
.skin-1 .nav-list>li:hover>a{
	*background-color: rgb(135, 206, 235);
	background-color: rgb(84, 158, 188);
color: #000;
}
.skin-1 .nav-list>li.open>a:hover{
color: #000;
}.skin-1 .sidebar,.skin-1 .sidebar:before{
	background-color:#002E54 !important;
}
.skin-1 .nav-list>li.active>a:hover{
	*color:#000;
}
#main-map{
	
	*z-index: 999999;
top: -99999;
left: -99999;
}
.navbar .navbar-inner{
	border-bottom:none;
}
.navbar .brand{
	padding: 9px 20px 10px;
}
.skin-1 .nav-list>li.open>a:hover{
	color:#fff;
}
		</style>
        <?php 
		if($page=='geofence'|| $page=='orig_geofence'){
		?>
        
	<link rel="stylesheet" type="text/css" href="geofence/style.css"/>



<style>



.tooltip{



   			display: inline;



    		position: relative;



		}



		



		.tooltip:hover:after{



    		background: #333;



    		background: rgba(0,0,0,.8);



    		border-radius: 5px;



    		bottom: 26px;



    		color: #fff;



    		content: attr(title);



    		left: 20%;



    		padding: 5px 15px;



    		position: absolute;



    		z-index: 98;



    		width: 220px;



		}



		



		.tooltip:hover:before{



    		border: solid;



    		border-color: #333 transparent;



    		border-width: 6px 6px 0 6px;



    		bottom: 20px;



    		content: "";



    		left: 50%;



    		position: absolute;



    		z-index: 99;



		}

		 #panel {

        position: absolute;

        top: 49px;

        left: 50%;

        margin-left: -180px;

        z-index: 5;

        background-color: #fff;

        padding: 5px;

        border: 1px solid #999;

      }



</style>


        <?php }else if($page=='live'){ ?>
        <style>

	@-moz-keyframes pulsate {

		from {

			-moz-transform: scale(0.25);

			opacity: 1.0;

		}

		95% {

			-moz-transform: scale(1.3);

			opacity: 0;

		}

		to {

			-moz-transform: scale(0.3);

			opacity: 0;

		}

	}

	@-webkit-keyframes pulsate {

		from {

			-webkit-transform: scale(0.25);

			opacity: 1.0;

		}

		95% {

			-webkit-transform: scale(1.3);

			opacity: 0;

		}

		to {

			-webkit-transform: scale(0.3);

			opacity: 0;

		}

	}

	#main-map div.gmnoprint[title="I might be here"] {

		-moz-animation: pulsate 1.5s ease-in-out infinite;

		-webkit-animation: pulsate 1.5s ease-in-out infinite;

		border:1pt solid #fff;

		-moz-border-radius:51px;

		-webkit-border-radius:51px;

		border-radius:51px;

		-moz-box-shadow:inset 0 0 5px #06f, inset 0 0 5px #06f, inset 0 0 5px #06f, 0 0 5px #06f, 0 0 5px #06f, 0 0 5px #06f;

		-webkit-box-shadow:inset 0 0 5px #06f, inset 0 0 5px #06f, inset 0 0 5px #06f, 0 0 5px #06f, 0 0 5px #06f, 0 0 5px #06f;

		box-shadow:inset 0 0 5px #06f, inset 0 0 5px #06f, inset 0 0 5px #06f, 0 0 5px #06f, 0 0 5px #06f, 0 0 5px #06f;

		height:51px!important;

		margin:-18px 0 0 -18px;

		width:51px!important;

		

	}

	#main-map div.gmnoprint[title="I might be here"] img {

		display:none;
		visibility:false;

	}



	</style>

<?php } ?>


	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>



	<body class="skin-1">

		<div class="navbar">

			<div class="navbar-inner" style="background: #002E54;">

				<div class="container-fluid" <?php if($id==388){ ?> style="text-align:center;" <?php } ?>>
<?php if(!$customer_concox){ ?>
	

					<a href="http://ossgpstracking.com" class="brand">

						<small>
<?php if($id==762){ ?> 
							<img src="assets/images/SIK-logo.png"  style=" height:49px;"  />
<?php }else{?>
<img src="assets/images/osslogo.png" <?php if($id==388){ ?> style="margin-top: 12px; height:60px;" <?php } ?> />	
<?php } ?>							


						</small>

					</a><!--/.brand-->
<?php }else{ ?>
					<a href="http://gpsconcox.in" class="brand">

						<small>

							<img src="assets/images/concox_logo.png" style="height: 50px;"  />

						</small>

					</a><!--/.brand-->
<?php } ?>

<?php if($id==388){  ?>
<span >
	<img src="assets/images/bangalore_police_logo.png" style="margin-left:-30px;"/>
</span>
<?php } ?>

					<ul class="nav ace-nav pull-right" <?php if($id==388){ ?> style="margin-top: 30px;" <?php } ?>>

                    <?php if($customer['account_type']!='demo'){ ?>

						
<?php 
	if($id==502){
		$sosalert=false;$speedalert=false;
		$sqalert="SELECT id FROM `sos_sst_alert_log` where status=0";
		$rsalert=mysql_query($sqalert);
		$sosnos=mysql_num_rows($rsalert);
		if($rsalert && $sosnos > 0){
			$sosalert=true;
			$not_ct=$not_ct+$sosnos;
		} 
		
		$sqalert2="SELECT id FROM `speed_alert_log` where customer_id=$id and status=0";
		$rsalert2=mysql_query($sqalert2);
		$speednos=mysql_num_rows($rsalert2);
		if($rsalert2 && $speednos > 0){
			$speedalert=true;
			$not_ct=$not_ct+$speednos;
		} 
	} ?>
						

						<li class="purple" >

							<a data-toggle="dropdown" class="dropdown-toggle" href="#" id="pulsate-crazy-target">

								<i class="icon-bell-alt icon-animated-bell"></i>

								<span class="badge badge-important"><?php echo $not_ct; ?></span>

							</a>



							<ul class="pull-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-closer">

								<li class="nav-header">

									<i class="icon-warning-sign"></i>

									<?php echo $not_ct; ?> Notifications

								</li>



	

<?php
if($id==502){
	//while($rwsos=mysql_fetch_assoc($rsalert)){
		
		?>
	
	<li>

									<a href="track.php?page=sst_sos&id=<?php echo $id; ?>">

										<div class="clearfix">

											<span class="pull-left">

												<i class="btn btn-mini no-hover btn-danger icon-bullhorn"></i>

												SOS Alerts New

											</span>

											<span class="pull-right badge badge-important">+<?php echo $sosnos; ?></span>

										</div>

									</a>

								</li>
								<li>

									<a href="track.php?page=sst_speed&id=<?php echo $id; ?>">

										<div class="clearfix">

											<span class="pull-left">

												<i class="btn btn-mini no-hover btn-danger icon-bullhorn"></i>

												Speed Alerts New

											</span>

											<span class="pull-right badge badge-important">+<?php echo $speednos; ?></span>

										</div>

									</a>

								</li>
	<?php
		
	//}	
}
?>



								<li>

									<a href="#">

										<div class="clearfix">

											<span class="pull-left">

												<i class="btn btn-mini no-hover btn-success icon-shopping-cart"></i>

												New Orders

											</span>

											<span class="pull-right badge badge-success">+<?php echo $new_ord_cnt; ?></span>

										</div>

									</a>

								</li>



								<li>

									<a href="#">

										<div class="clearfix">

											<span class="pull-left">

												<i class="btn btn-mini no-hover btn-info icon-credit-card"></i>

												Payments

											</span>

											<span class="pull-right badge badge-info">+<?php echo $new_pay_cnt; ?></span>

										</div>

									</a>

								</li>

                                

								<li>

									<a href="#">

										<div class="clearfix">

											<span class="pull-left">

												<i class="btn btn-mini no-hover btn-pink icon-list"></i>

												Invoices

											</span>

											<span class="pull-right badge badge-info">+<?php echo $new_inv_cnt; ?></span>

										</div>

									</a>

								</li>



								<li>

									<a href="index.php?page=notifications&id=<?php echo $id; ?>">

										See all notifications

										<i class="icon-arrow-right"></i>

									</a>

								</li>

							</ul>

						</li>

                        <li class="green">

							<a  href="index.php?page=mail_admin&id=<?php echo $id; ?>">

								<i class="icon-envelope icon-animated-vertical"></i>

									

							</a>

                         </li>

                        <li class="grey">

							<a  href="index.php?page=tickets&id=<?php echo $id; ?>">

								<i class="icon-user icon-animated-vertical"></i>

									

							</a>

                         </li>

       <?php } ?>                  





						<li class="light-blue">

							<a data-toggle="dropdown" href="#"   <?php /* if($customer['account_type']!='demo'){ echo 'href="index.php?page=profile&id=$id"'; } else {echo 'href="#"'; } */ ?> class="dropdown-toggle">

<!--								<img class="nav-user-photo" src="assets/avatars/user.jpg" alt="Jason's Photo" />

-->								<span class="user-info">

									<small>Welcome,</small>

									<?php echo $customer['customer_first_name']; ?>

								</span>



								<i class="icon-caret-down"></i>

							</a>



							<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer">



								

<?php if($id!=482 && $sublogin_created_by!=548){?>
								<li>

									<a href="index.php?page=profile&id=<?php echo $id; ?>">

									

										<i class="icon-user"></i>

										Profile

									</a>

								</li>								
								<?php } ?>
	  <?php if($customer['customer_id']==364 || $customer['customer_id']==548 || $customer['customer_id']==504){ ?>           
	         <li>
								<a href="index.php?page=newlogins&id=<?php echo $id; ?>">
								<i class="icon-user"></i>
										Create Sublogins
									</a>
								</li>
								<li>
								<a href="index.php?page=assign_device&id=<?php echo $id; ?>">
								<i class="icon-user"></i>
										Assign Device
									</a>
								</li>                      
<?php } ?>


  <?php if($customer['account_type']!='demo'){ ?>                              
<?php } ?>
                                

								
 <?php
							  $sq1="SELECT

count(instatllation_id) as cnt

FROM

installation WHERE customer_id=$id AND installation_status='completed' and category_id!=4";

$rs1=mysql_query($sq1);

$dev_count=mysql_fetch_assoc($rs1);
if($dev_count['cnt']>0){

							  ?>  
                                

								<li>

									<a href="track.php?page=overview&id=<?php echo $id; ?>">

										<i class="icon-share-alt"></i>

										Track

									</a>

								</li>
                                 <?php }
								 $sqn="SELECT

count(instatllation_id) as cnt

FROM

installation WHERE customer_id=$id AND installation_status='completed' and category_id=4";

$rsn=mysql_query($sqn);

$dev_count_pet=mysql_fetch_assoc($rsn);
if($dev_count_pet['cnt']>0){ ?>
                                <li>

									<a href="../customer_pet/track.php?page=dashboard&id=<?php echo $id; ?>">

									

										<i class="icon-linux"></i>

										Pet Tracker

									</a>

								</li>


<?php } ?>
								<li class="divider"></li>





								<li>

									<a href="logout.php?id=<?php echo $id;?>">

										<i class="icon-off"></i>

										Logout

									</a>

								</li>

							</ul>

						</li>

					</ul><!--/.ace-nav-->

				</div><!--/.container-fluid-->

			</div><!--/.navbar-inner-->

		</div>

		
	


