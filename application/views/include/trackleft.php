<?php if($id!=500 && $id!=570){//metso ?>
	

					<div class="main-container container-fluid">



			<a class="menu-toggler" id="menu-toggler" href="#">



				<span class="menu-text"></span>



			</a>



            

            <div class="sidebar" id="sidebar">



				<div class="sidebar-shortcuts" id="sidebar-shortcuts">



					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">



						<a href="track.php?page=geofence&id=<?php echo $id; ?>"><button class="btn btn-small btn-success" title="Geo Fence" >



							<i class="icon-hand-down"></i>



						</button></a>



<a href="track.php?page=playback&id=<?php echo $id; ?>">



						<button class="btn btn-small btn-info" title="Route Playback">



							<i class="icon-facetime-video"></i>



						</button></a>





<a href="track.php?page=report_dashboard&id=<?php echo $id; ?>">

						<button class="btn btn-small btn-warning" title="Reports">



							<i class="icon-bar-chart"></i>



						</button></a>

<?php if($id!=863){ //vani school dup ?>

<a href="track.php?page=settings&id=<?php echo $id; ?>">

						<button class="btn btn-small btn-danger" title="Settings">



							<i class="icon-cogs"></i>



						</button></a>
<?php } ?>

					</div>


					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">



						<span class="btn btn-success"></span>







						<span class="btn btn-info"></span>







						<span class="btn btn-warning"></span>







						<span class="btn btn-danger"></span>



					</div>



				</div><!--#sidebar-shortcuts-->







				<ul class="nav nav-list">
				
				<?php if($id==262 || $id==442){ ?>
				<li <?php if($page=='national_flex'){echo "class=\"active\"";}?>>
						<a href="track.php?page=national_flex&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class="icon-list"></i>
							<span class="menu-text"> Flex Grid </span>
						</a>
						</li>
				
				<?php } ?>

<li >







						<a href="track.php?page=overview&id=<?php echo $id; ?>" class="dropdown-toggle">







							<i class="icon-dashboard"></i>







							<span class="menu-text"> Dashboard </span>







						</a>



						</li>

				<?php if($page!='dashboard'){?>
						<li >
						<a href="track.php?page=dashboard&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class="icon-bolt"></i>
							<span class="menu-text"> Live Tracking </span>
						</a>
						</li>
					<?php } ?>
					<?php if($id==504){//jss ?>
                         <li <?php if($page=='oil'){echo "class=\"active\"";}?>>
						<a href="track.php?page=oil&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class="icon-beaker"></i>
							<span class="menu-text"> Fuel Dashboard </span>
						</a>
						</li>
                        <li <?php if($page=='jss_refuel'){echo "class=\"active\"";}?>>
						<a href="track.php?page=jss_refuel&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class="icon-beaker"></i>
							<span class="menu-text"> JSS Refuel </span>
						</a>
						</li>
                        <?php } ?>
                        <?php if($id==745){//kesineni --orange copy for gps master ?>
                         <li <?php if($page=='oildb'){echo "class=\"active\"";}?>>
						<a href="track.php?page=oildb&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class="icon-beaker"></i>
							<span class="menu-text"> Fuel Dashboard </span>
						</a>
						</li>
                        <?php } ?>
                        <?php if($id==860){//Paragon  --orange copy for gps master from orange_mater folder ?>
                         <li <?php if($page=='oil'){echo "class=\"active\"";}?>>
						<a href="track.php?page=oil&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class="icon-beaker"></i>
							<span class="menu-text"> Fuel Dashboard </span>
						</a>
						</li>
                        <?php } ?>
                        <?php if($id==451 || $id==784){//fueltest, cocacola ?>
                         <li <?php if($page=='oil_orange'){echo "class=\"active\"";}?>>
						<a href="track.php?page=oil_orange&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class="icon-beaker"></i>
							<span class="menu-text"> Fuel Dashboard </span>
						</a>
						</li>
                        <?php } ?>
                       <?php if($id==54){//fueltest, cocacola ?>
                        <li>

                            <a href="#" class="dropdown-toggle">
                            <i class="icon-bullhorn"></i>
                            <span class="menu-text"> Orange Trips </span>
                            <b class="arrow icon-angle-down"></b>
                            </a>

                            <ul class="submenu"<?php if($page=='trip_routes' || $page=='trip_calendar' || $page=='trip_route_view' || $page=='trip_route_new'){ ?> style="display: block;" <?php } ?>> 
                                 <li <?php if($page=='trip_routes' || $page=='trip_route_view' || $page=='trip_route_new'){echo "class=\"active\"";}?>>
                                <a href="track.php?page=trip_routes&id=<?php echo $id; ?>" class="dropdown-toggle">
                                    <i class="icon-wrench  "></i>
                                    <span class="menu-text"> Routes </span>
                                </a>
                                </li>
                                <li <?php if($page=='trip_calendar'){echo "class=\"active\"";}?>>
                                <a href="track.php?page=trip_calendar&id=<?php echo $id; ?>" class="dropdown-toggle">
                                    <i class="icon-cog"></i>
                                    <span class="menu-text"> Calendar </span>
                                </a>
                                </li>
                            </ul>
                         </li>                       							
                        
                        <?php } ?>
                        
                        <?php if( $id==543 || $id==557){//srs or dualdemo ?>
                         <li <?php if($page=='oil_orange'){echo "class=\"active\"";}?>>
						<a href="track.php?page=oil_orange&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class="icon-beaker"></i>
							<span class="menu-text"> Fuel Dashboard </span>
						</a>
						</li>
						<li <?php if($page=='orange_drivers'){echo "class=\"active\"";}?>>
						<a href="track.php?page=orange_drivers&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class="icon-user"></i>
							<span class="menu-text"> Drivers </span>
						</a>
						</li>
						<li <?php if($page=='orange_drivers_report'){echo "class=\"active\"";}?>>
						<a href="track.php?page=orange_drivers_report&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class="icon-list-alt"></i>
							<span class="menu-text"> Drivers Report </span>
						</a>
						</li>
                        <?php } ?>
                        <?php if($id==491){//srs or dualdemo ?>
                         <li <?php if($page=='oildashboard'){echo "class=\"active\"";}?>>
						<a href="track.php?page=oildashboard&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class="icon-beaker"></i>
							<span class="menu-text"> Fuel Dashboard </span>
						</a>
						</li>
                        <?php } ?>
                         <?php if($id==831 || $id==785){//-- or temptest//-- or coldcare ?>
                         <li <?php if($page=='reporttemp'){echo "class=\"active\"";}?>>
						<a href="track.php?page=reporttemp&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class="icon-tags"></i>
							<span class="menu-text"> Temperature Report </span>
						</a>
						</li>
                        <?php } ?>
                        <?php if($id==509){ ?>
                         <li <?php if($page=='reporttemp'){echo "class=\"active\"";}?>>
						<a href="track.php?page=reporttemp&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class="icon-tags"></i>
							<span class="menu-text"> Temperature Report </span>
						</a>
						</li>
						
						 <li <?php if($page=='sical_temperature'){echo "class=\"active\"";}?>>
						<a href="track.php?page=sical_temperature&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class=" icon-info-sign"></i>
							<span class="menu-text"> Temp Alert Settings </span>
						</a>
						</li>
                        <?php } ?>
                        <?php if($id!=583 && $id!=860)	{ ?>	
                        <li <?php if($page=='trip' || $page=='trip_new' || $page=='trip_report' || $page=='trip_edit'||  $page=='trip_view'|| $page=='trip_status'){echo "class=\"active\"";}?>>
						<a href="track.php?page=trip&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class="icon-hand-right"></i>
							<span class="menu-text"> Trip Schedules </span>
						</a>
						</li>
						<?php } ?>   	
						<?php
						//schoolbus
						$sqct="select is_school from customers where customer_id=$id";
						$rsct=mysql_query($sqct);
						$rwct=mysql_fetch_assoc($rsct);
						if($rwct['is_school']){	
							$cust_sql="select school_id from school where email1='".$_SESSION['customer']."'";
							$cust_rs=mysql_query($cust_sql);
							$cust_rw=mysql_fetch_assoc($cust_rs);
							$school=$cust_rw['school_id'];
							if($school>0){
									
						?>
						<li >
						<a href="../sc/index.php?page=settings&id=<?php echo $school; ?>" class="dropdown-toggle">
							<i class="icon-cogs"></i>
							<span class="menu-text"> School Settings </span>
						</a>
						</li>
						<?php }}//schoolbus ?>
						
                         <?php if($id==190){?>
                         <li>

                            <a href="#" class="dropdown-toggle">
                            <i class="icon-bullhorn"></i>
                            <span class="menu-text"> Vega Alerts </span>
                            <b class="arrow icon-angle-down"></b>
                            </a>

                            <ul class="submenu"<?php if($page=='vega_alerts' || $page=='vega_report'){ ?> style="display: block;" <?php } ?>> 
                                 <li <?php if($page=='vega_alerts'){echo "class=\"active\"";}?>>
                                <a href="track.php?page=vega_alerts&id=<?php echo $id; ?>" class="dropdown-toggle">
                                    <i class="icon-wrench  "></i>
                                    <span class="menu-text"> Vega Alert Settings </span>
                                </a>
                                </li>
                                <li <?php if($page=='vega_report'){echo "class=\"active\"";}?>>
                                <a href="track.php?page=vega_report&id=<?php echo $id; ?>" class="dropdown-toggle">
                                    <i class="icon-cog"></i>
                                    <span class="menu-text"> Alert Report </span>
                                </a>
                                </li>
                            </ul>
                         </li>                       							
                        
                        <?php } ?>
						
						 <?php if($id==502){?>
                         <li>

                            <a href="#" class="dropdown-toggle">
                            <i class="icon-list"></i>
                            <span class="menu-text"> Fleet Distribution </span>
                            <b class="arrow icon-angle-down"></b>
                            </a>

                            <ul class="submenu"<?php if($page=='sst_locations' || $page=='sst_location' || $page=='sst_overview'){ ?> style="display: block;" <?php } ?>> 
                                 <li <?php if($page=='sst_locations' || $page=='sst_location'){echo "class=\"active\"";}?>>
                                <a href="track.php?page=sst_locations&id=<?php echo $id; ?>" class="dropdown-toggle">
                                    <i class="icon-wrench  "></i>
                                    <span class="menu-text"> Tags </span>
                                </a>
                                </li>
                                <li <?php if($page=='sst_overview'){echo "class=\"active\"";}?>>
                                <a href="track.php?page=sst_overview&id=<?php echo $id; ?>" class="dropdown-toggle">
                                    <i class="icon-cog"></i>
                                    <span class="menu-text"> Report </span>
                                </a>
                                </li>
                            </ul>
                         </li>                       							
                        
                        <?php } ?>
                        
						
						<?php if($id==303 || $id==261){?>
                         <li>

                            <a href="#" class="dropdown-toggle">
                            <i class="icon-bullhorn"></i>
                            <span class="menu-text"> Medplus Trips </span>
                            <b class="arrow icon-angle-down"></b>
                            </a>

                            <ul class="submenu"<?php if($page=='trip_routes' || $page=='trip_calendar' || $page=='trip_route_view' || $page=='trip_route_new'){ ?> style="display: block;" <?php } ?>> 
                                 <li <?php if($page=='trip_routes' || $page=='trip_route_view' || $page=='trip_route_new'){echo "class=\"active\"";}?>>
                                <a href="track.php?page=trip_routes&id=<?php echo $id; ?>" class="dropdown-toggle">
                                    <i class="icon-wrench  "></i>
                                    <span class="menu-text"> Routes </span>
                                </a>
                                </li>
                                <li <?php if($page=='trip_calendar'){echo "class=\"active\"";}?>>
                                <a href="track.php?page=trip_calendar&id=<?php echo $id; ?>" class="dropdown-toggle">
                                    <i class="icon-cog"></i>
                                    <span class="menu-text"> Calendar </span>
                                </a>
                                </li>
                            </ul>
                         </li>                       							
                        
                        <?php } ?>

 <?php if($id==442){ ?>
						 <li>

                            <a href="#" class="dropdown-toggle">
                            <i class="icon-bullhorn"></i>
                            <span class="menu-text"> National Trips </span>
                            <b class="arrow icon-angle-down"></b>
                            </a>
							
							
							<ul class="submenu"<?php if($page=='national_route' || $page=='national_routes' || $page=='national_report' || $page=='national_report2' ){ ?> style="display: block;" <?php } ?>> 
                                 <li <?php if($page=='national_route' || $page=='national_routes'){echo "class=\"active\"";}?>>
                                <a href="track.php?page=national_routes&id=<?php echo $id; ?>" class="dropdown-toggle">
                                    <i class="icon-wrench  "></i>
                                    <span class="menu-text"> Routes</span>
                                </a>
                                </li>
                                <li <?php if($page=='national_report'){echo "class=\"active\"";}?>>
                                <a href="track.php?page=national_report&id=<?php echo $id; ?>" class="dropdown-toggle">
                                    <i class="icon-cog"></i>
                                    <span class="menu-text"> Report </span>
                                </a>
                                </li>
								<!--<li <?php if($page=='national_report2'){echo "class=\"active\"";}?>>
                                <a href="track.php?page=national_report2&id=<?php echo $id; ?>" class="dropdown-toggle">
                                    <i class="icon-cog"></i>
                                    <span class="menu-text"> Report 2 </span>
                                </a>
                                </li>-->
                            </ul>
							
							
						</li>
						 <?php }  ?>


                        <?php
                        
                        $serialno=0;

		$sql_cats="SELECT

DISTINCT

installation.category_id,

gps_categories.category_type

FROM

installation

INNER JOIN gps_categories ON installation.category_id = gps_categories.category_id

WHERE customer_id=$id AND installation_status='completed' and type='main' and installation.category_id!=4 ";

$rs_cats=mysql_query($sql_cats);

while($cats=mysql_fetch_array($rs_cats)){
	if( $cats['category_type']=='Schoolbus'){ $cats['category_type']='Fleet'; }
	else if( $cats['category_type']=='Car' || $cats['category_type']=='Bike'){ $cats['category_type']='Vehicle'; }
		?>

                  <li class="open" <?php //if($page=='live'){echo "class=\"active\"";}?>>

                            <a href="#" class="dropdown-toggle">

                            <i class="icon-bolt"></i>

                            <span class="menu-text"> <?php echo $cats['category_type']; ?> </span>
                            <b class="arrow icon-angle-down"></b>
                            </a>

                            <ul class="submenu" style="display: block;"  >       

                        <?php

		/*				

						$sql="SELECT

DISTINCT

installation.device_id,

gps_devices.device_type

FROM

installation

INNER JOIN gps_devices ON gps_devices.device_id = installation.device_id

WHERE installation.category_id=".$cats['category_id']." and customer_id=$id AND installation_status='completed'";

						$rs=mysql_query($sql);

						while($rw=mysql_fetch_assoc($rs)){						

	*/					

						?>

                        

                       

                            	<li class="active" <?php //if($page=='live'){echo "class=\"active\"";}?>>

                              

                                 <ul class="submenu" id="inst_dev">    

                                

                                <?php 						$sql_dev="SELECT

DISTINCT

installation.model_id,
installation.instatllation_id,
gps_model_details.model_name,device_name,imie_no

FROM

installation

INNER JOIN gps_model_details ON installation.model_id = gps_model_details.model_id

WHERE category_id=".$cats['category_id']." and customer_id=$id AND installation_status='completed'  order by device_name";

						$rs_dev=mysql_query($sql_dev);

						while($rw_dev=mysql_fetch_assoc($rs_dev)){$serialno++;
							
							
							//$sq_stat="SELECT TIMESTAMPDIFF(MINUTE,time_stamps,now())as diff FROM gps_master WHERE imei='".$rw_dev['imie_no']."' order by id desc limit 1";
							//$rs_stat=mysql_query($sq_stat);
							//$rw_stat=mysql_fetch_assoc($rs_stat);
/*							$to_time = time();
							$from_time = strtotime($rw_stat['time_stamps']);
							$minutes = round(($to_time - $from_time) / 60,2);
*/													

 ?>

 

                         

                       

                            	<li <?php if($page=='live' && $_GET['dev']==$rw_dev['model_id']){echo "class=\"active\"";}?> id="live_dev<?php echo $rw_dev['instatllation_id']; ?>">

                                <a href="track.php?page=live&id=<?php echo $id; ?>&dev=<?php echo $rw_dev['model_id']; ?>" >
								   <i class="icon-double-angle-right"></i> 

                                <span class="menu-text"> <?php echo $rw_dev['device_name']; ?> </span>
                                <?php  ?>
                                
								
                                </a> 

								
							

                                </li>



 

 <?php } ?>

                                </ul>

                                </li>                           

                           

                        

                        

                        <?php //} ?>

                         </ul>

                        

						</li>

                        <?php } ?>





				</ul><!--/.nav-list-->







				<div class="sidebar-collapse" id="sidebar-collapse">



					<i class="icon-double-angle-left"></i>



				</div>



			</div>
			<?php }else{/**
						* 
						* @var ************************************************************metso
						* 
						*/ ?>
		<div class="main-container container-fluid">
			<a class="menu-toggler" id="menu-toggler" href="#">
				<span class="menu-text"></span>
			</a>

            <div class="sidebar" id="sidebar">
				<ul class="nav nav-list">
				<?php if($page!='dashboard'){?>
						<li >
						<a href="track.php?page=dashboard&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class="icon-bolt"></i>
							<span class="menu-text"> Live Tracking </span>
						</a>
						</li>
				<?php } ?>
				 		<li <?php if($page=='playback' || $page=='playback_print'){echo "class=\"active\"";}?>>
						<a href="track.php?page=playback&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class="icon-facetime-video"></i>
							<span class="menu-text"> Route Playback </span>
						</a>
						</li>
			            <li>

                            <a href="#" class="dropdown-toggle">
                            <i class="icon-list-alt"></i>
                            <span class="menu-text"> Metso Report </span>
                            <b class="arrow icon-angle-down"></b>
                            </a>

                            <ul class="submenu" style="display: block;" > 
                                 <li <?php if($page=='metso_tags' || $page=='metso_tag' || $page=='metso_view'){echo "class=\"active\"";}?>>
                                <a href="track.php?page=metso_tags&id=<?php echo $id; ?>" class="dropdown-toggle">
                                    <i class="icon-wrench  "></i>
                                    <span class="menu-text"> Tags </span>
                                </a>
                                </li>
                                <li <?php if($page=='metso_in_out_log'){echo "class=\"active\"";}?>>
                                <a href="track.php?page=metso_in_out_log&id=<?php echo $id; ?>" class="dropdown-toggle">
                                    <i class="icon-cog"></i>
                                    <span class="menu-text"> IN/OUT Log </span>
                                </a>
                                </li>
                                 <li <?php if($page=='metso_report'){echo "class=\"active\"";}?>>
                                <a href="track.php?page=metso_report&id=<?php echo $id; ?>" class="dropdown-toggle">
                                    <i class="icon-cog"></i>
                                    <span class="menu-text"> Report </span>
                                </a>
                                </li> 
                                <li <?php if($page=='metso_attendance'){echo "class=\"active\"";}?>>
                                <a href="track.php?page=metso_attendance&id=<?php echo $id; ?>" class="dropdown-toggle">
                                    <i class="icon-cog"></i>
                                    <span class="menu-text"> Attendance Report </span>
                                </a>
                                </li>
                            </ul>
                         </li> 
                         <li <?php if($page=='settings'){echo "class=\"active\"";}?>>
						<a href="track.php?page=settings&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class="icon-cogs"></i>
							<span class="menu-text"> Settings </span>
						</a>
						</li> 
				</ul><!--/.nav-list-->
				<div class="sidebar-collapse" id="sidebar-collapse">
					<i class="icon-double-angle-left"></i>
				</div>
			</div>
			
			<?php }////////////////metso ?>