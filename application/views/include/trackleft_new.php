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


<a href="track.php?page=settings&id=<?php echo $id; ?>">

						<button class="btn btn-small btn-danger" title="Settings">



							<i class="icon-cogs"></i>



						</button></a>


					</div>


					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">



						<span class="btn btn-success"></span>







						<span class="btn btn-info"></span>







						<span class="btn btn-warning"></span>







						<span class="btn btn-danger"></span>



					</div>



				</div><!--#sidebar-shortcuts-->







				<ul class="nav nav-list">

<li >







						<a href="track.php?page=overview&id=<?php echo $id; ?>" class="dropdown-toggle">







							<i class="icon-dashboard"></i>







							<span class="menu-text"> Dashboard </span>







						</a>



						</li>

				<?php if($page!='dashboard'){?>
						<li >
						<a href="track.php?page=dashboard&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class="icon-eye"></i>
							<span class="menu-text"> Live Tracking </span>
						</a>
						</li>
<?php } ?>
                        <li <?php if($page=='trip' || $page=='trip_new' || $page=='trip_report' || $page=='trip_edit'||  $page=='trip_view'|| $page=='trip_status'){echo "class=\"active\"";}?>>
						<a href="track.php?page=trip&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class="icon-hand-right"></i>
							<span class="menu-text"> Trip Schedules </span>
						</a>
						</li>
						
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
						?>
						<li >
						<a href="../sc/index.php?page=settings&id=<?php echo $school; ?>" class="dropdown-toggle">
							<i class="icon-cogs"></i>
							<span class="menu-text"> School Settings </span>
						</a>
						</li>
						<?php }//schoolbus ?>
						
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




                        <?php

		$sql_cats="SELECT

DISTINCT

installation.category_id,

gps_categories.category_type

FROM

installation

INNER JOIN gps_categories ON installation.category_id = gps_categories.category_id

WHERE customer_id=$id AND installation_status='completed' and type='main'";//" and installation.category_id!=4 ";

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

                            <ul class="submenu" style="display: block;" >       

                        <?php

						

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

						

						?>

                        

                       

                            	<li class="active" <?php //if($page=='live'){echo "class=\"active\"";}?>>

                              

                                 <ul class="submenu" >    

                                

                                <?php 						$sql_dev="SELECT
DISTINCT
installation.instatllation_id,
installation.model_id,
gps_model_details.model_name,device_name,imie_no
FROM
installation
INNER JOIN gps_model_details ON installation.model_id = gps_model_details.model_id
WHERE category_id=".$cats['category_id']." and installation.device_id=". $rw['device_id']." and customer_id=$id AND installation_status='completed'";

						$rs_dev=mysql_query($sql_dev);

						while($rw_dev=mysql_fetch_assoc($rs_dev)){
							
							
							//$sq_stat="SELECT TIMESTAMPDIFF(MINUTE,time_stamps,now())as diff FROM gps_master WHERE imei='".$rw_dev['imie_no']."' order by id desc limit 1";
							//$rs_stat=mysql_query($sq_stat);
							//$rw_stat=mysql_fetch_assoc($rs_stat);
/*							$to_time = time();
							$from_time = strtotime($rw_stat['time_stamps']);
							$minutes = round(($to_time - $from_time) / 60,2);
*/													

 ?>

 

                         

                       

                            	<li <?php if($page=='live' && $_GET['dev']==$rw_dev['model_id']){echo "class=\"active\"";}?>>

                                <!--<a href="track.php?page=live&id=<?php echo $id; ?>&dev=<?php echo $rw_dev['model_id']; ?>" >--><a href="#" id="live_<?php echo $rw_dev['instatllation_id']; ?>" data-id="<?php echo $rw_dev['instatllation_id']; ?>" >
								   <i class="icon-double-angle-right"></i> 

                                <span class="menu-text"> <?php echo $rw_dev['device_name']; ?> </span>
                                <?php  ?>
                                
								
                                </a> 

								
							

                                </li>



 

 <?php } ?>

                                </ul>

                                </li>                           

                           

                        

                        

                        <?php } ?>

                         </ul>

                        

						</li>

                        <?php } ?>





				</ul><!--/.nav-list-->







				<div class="sidebar-collapse" id="sidebar-collapse">



					<i class="icon-double-angle-left"></i>



				</div>



			</div>