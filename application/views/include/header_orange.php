

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

<script type="text/javascript" src="assets/js/jquery-2.0.3.min.js"></script>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>



	<body>

<script type="text/javascript">
if(localStorage.skin){					
						$("body").className = '';
						$("body").addClass(localStorage.skin);								    
				} 
</script>
		<div class="navbar">

			<div class="navbar-inner">

				<div class="container-fluid" >

					<a href="http://ossgpstracking.com" class="brand">

						<small>

							<img src="assets/images/osslogo.png" />

						</small>

					</a><!--/.brand-->



					<ul class="nav ace-nav pull-right">                   

						
<?php 
		$sosalert=false;
		$speedalert=false;	
		$not_ct=0;
/*
		$todaytamper=date("Y-m-d 00:00:00");
		$sqalert="SELECT l.id FROM `tamper_log` l join installation i on l.imei=i.imie_no where customer_id=$id and l.ts>'$todaytamper'";
		$rsalert=mysql_query($sqalert);
		$tampernos=mysql_num_rows($rsalert);
		if($rsalert && $tampernos > 0){			
			$not_ct=$not_ct+$tampernos;
		}		
		*/
	 ?>
						

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



<li>

									<a href="track.php?page=tamper&id=<?php echo $id; ?>&pg=orange_report">

										<div class="clearfix">

											<span class="pull-left">

												<i class="btn btn-mini no-hover btn-danger icon-bullhorn"></i>

												Tamper Alerts

											</span>

											<span class="pull-right badge badge-important">+<?php echo $tampernos; ?></span>

										</div>

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



								


								<li>

									<a href="index.php?page=profile&id=<?php echo $id; ?>">

									

										<i class="icon-user"></i>

										Profile

									</a>

								</li>								
								
	  



                                

								
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

									<a href="track.php?page=dashboard&id=<?php echo $id; ?>">

										<i class="icon-share-alt"></i>

										Track

									</a>

								</li>
                                 <?php } ?>
                                 
                                 <li>
                                 
                                 <?php
                                 if(isset($_SESSION['orange_admin']) && $_SESSION['orange_admin']='orangeadmin'){
                                 ?>
                                 <a href="orange_admin.php?page=orange_category&id=<?php echo $id; ?>">
                                 <?php }else{ ?>
								 	<a href="otravels/admin.php">
								 <?php } ?>

									

									

										<i class="icon-cog"></i>

										Administration

									</a>

								</li>
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
<?php if($page!='report' && $page!='report_tst'){ ?>
	

	<div class="ace-settings-container" id="ace-settings-container" style="right: 1.6%;top: 45px;">
					<div class="btn btn-app btn-mini btn-warning ace-settings-btn" id="ace-settings-btn">
						<i class="icon-cog bigger-150"></i>
					</div>

					<div class="ace-settings-box" id="ace-settings-box">
						<div>
							<div class="pull-left">
								<select id="skin-colorpicker" class="hide">
									<option data-class="default" value="#438EB9" />#438EB9
									<option data-class="skin-1" value="#222A2D" />#222A2D
									<option data-class="skin-2" value="#48412A" />#48412A<!--#C6487E-->
									<option data-class="skin-3" value="#D0D0D0" />#D0D0D0
								</select>
							</div>
							<span>&nbsp; Choose Skin</span>
						</div>

						
					</div>
				</div><!--/#ace-settings-container-->	
<?php } ?>

<script type="text/javascript">
			$(function() {			
				
				$("#skin-colorpicker").change(function(){
					var skin= $(this).find("option:selected").data("class");									
					localStorage.setItem("skin", skin);
				});
			});
</script>
					



