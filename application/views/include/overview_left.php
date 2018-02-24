<?php if($id!=444 && $id!=579 && $id!=449 && $id!=500 && $id!=570){ ?>
					<div class="main-container container-fluid">



			<a class="menu-toggler" id="menu-toggler" href="#">



				<span class="menu-text"></span>



			</a>



            

            <div class="sidebar <?php if($page=='orange'){ echo "menu-min"; }?>" id="sidebar">









				<ul class="nav nav-list">



 <?php if($id==271){?>
 
						 <li <?php if($page=='overview'){echo "class=\"active\"";}?>>
						<a href="track.php?page=overview&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class="icon-dashboard"></i>
							<span class="menu-text"> Dashboard</span>
						</a>
						</li>
						<li <?php if($page=='dashboard'){echo "class=\"active\"";}?>>
						<a href="track.php?page=dashboard&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class="icon-eye-open"></i>
							<span class="menu-text"> Live Tracking</span>
						</a>
						</li>
						<li <?php if($page=='companies'){echo "class=\"active\"";}?>>
						<a href="track.php?page=companies&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class="icon-bolt"></i>
							<span class="menu-text"> Companies </span>
						</a>
						</li>
						<li <?php if($page=='employees' || $page=='emp'){echo "class=\"active\"";}?>>
						<a href="track.php?page=employees&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class="icon-group"></i>
							<span class="menu-text"> Employees </span>
						</a>
						</li>
						<li <?php if($page=='drivers' ){echo "class=\"active\"";}?>>
						<a href="track.php?page=drivers&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class="icon-user"></i>
							<span class="menu-text"> Driver Details </span>
						</a>
						</li>
						<li <?php if($page=='driver_log' ){echo "class=\"active\"";}?>>
						<a href="track.php?page=driver_log&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class="icon-list"></i>
							<span class="menu-text"> Assign Driver </span>
						</a>
						</li>						
                         <li <?php if($page=='vtt_trips' || $page=='vtt_trip_report'){echo "class=\"active\"";}?>>
						<a href="track.php?page=vtt_trips&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class="icon-hand-right"></i>
							<span class="menu-text"> Trips </span>
						</a>
						</li>
						<li <?php if($page=='vtt_trip_download'){echo "class=\"active\"";}?>>
						<a href="track.php?page=vtt_trip_download&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class="icon-list-alt"></i>
							<span class="menu-text"> Daily Trip Report </span>
						</a>
						</li>
						 <li <?php if($page=='settings'){echo "class=\"active\"";}?>>
						<a href="track.php?page=settings&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class="icon-cogs"></i>
							<span class="menu-text"> Settings </span>
						</a>
						</li>
						
 <?php }else{ ?>				
					<?php if($id==262 || $id==442){ ?>
					<li <?php if($page=='national_flex'){echo "class=\"active\"";}?>>
							<a href="track.php?page=national_flex&id=<?php echo $id; ?>" class="dropdown-toggle">
								<i class="icon-list"></i>
								<span class="menu-text"> Flex Grid </span>
							</a>
							</li>
					
					<?php } ?>
					<?php if($id!=887 && $id!=778 && $id!=877 && $id!=878){?>
					<li <?php if($page=='overview'){echo "class=\"active\"";}?>>
						<a href="track.php?page=overview&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class="icon-dashboard"></i>
							<span class="menu-text"> Dashboard</span>
						</a>
						</li>
					<?php } ?>	
					<li <?php if($page=='dashboard'){echo "class=\"active\"";}?>>
						<a href="track.php?page=dashboard&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class="icon-eye-open"></i>
							<span class="menu-text"> Live Tracking</span>
						</a>
						</li>
						
						<?php if($id==887){?>
						 <li <?php if($page=='oil'){echo "class=\"active\"";}?>>
						<a href="track.php?page=oil&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class="icon-beaker"></i>
							<span class="menu-text"> Fuel Dashboard </span>
						</a>
						</li>
						<?php } ?>
						
						<?php if($id==280 || $id==202 || $id==305 || $id==335 || $id==370 || $id==291  || $id==390 || $id==288 || $id==396 || $id==429 || $id==441 || $id==456 || $id==471 || $id==485 || $id==504 || $id==513 || $id==860){//srs or dualdemo ?>
                         <li <?php if($page=='oil'){echo "class=\"active\"";}?>>
						<a href="track.php?page=oil&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class="icon-beaker"></i>
							<span class="menu-text"> Fuel Dashboard </span>
						</a>
						</li>
                        <?php } ?>
                        <?php if($id==504){//jss ?>
                        <li <?php if($page=='jss_refuel'){echo "class=\"active\"";}?>>
						<a href="track.php?page=jss_refuel&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class="icon-beaker"></i>
							<span class="menu-text"> JSS Refuel </span>
						</a>
						</li>
                        <?php } ?>
                         <?php if($id==745 || $id==755){//kesineni,sriram --orange copy for gps master ?>
                         <li <?php if($page=='oildb'){echo "class=\"active\"";}?>>
						<a href="track.php?page=oildb&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class="icon-beaker"></i>
							<span class="menu-text"> Fuel Dashboard </span>
						</a>
						</li>
                        <?php } ?>
                        <?php if($id==784){// , cocacola?>
						<li>

                            <a href="#" class="dropdown-toggle">
                            <i class="icon-double-angle-right"></i>
                            <span class="menu-text"> Coca cola Reports </span>
                            <b class="arrow icon-angle-down"></b>
                            </a>

	

                            <ul class="submenu"<?php if($page=='cola_locations' || $page=='cola_location' || $page=='cola_trips' || $page=='cola_detention'){ ?> style="display: block;" <?php } ?>> 
                                 <li <?php if($page=='cola_locations' || $page=='cola_location' ){echo "class=\"active\"";}?>>
                                <a href="track.php?page=cola_locations&id=<?php echo $id; ?>" class="dropdown-toggle">
                                    <i class="icon-wrench  "></i>
                                    <span class="menu-text"> Locations </span>
                                </a>
                                </li> 
                                <li <?php if($page=='cola_trips'){echo "class=\"active\"";}?>>
                                <a href="track.php?page=cola_trips&id=<?php echo $id; ?>" class="dropdown-toggle">
                                    <i class="icon-list"></i>
                                    <span class="menu-text"> Trip Report </span>
                                </a>
                                </li>
                                <li <?php if($page=='cola_detention'){echo "class=\"active\"";}?>>
                                <a href="track.php?page=cola_detention&id=<?php echo $id; ?>" class="dropdown-toggle">
                                    <i class="icon-list"></i>
                                    <span class="menu-text"> Detention Report </span>
                                </a>
                                </li>
                            </ul>
                        </li>
						<?php } ?>
						<?php if($id==877 || $id==878){// , dalmia?>
						<li>

                            <a href="#" class="dropdown-toggle">
                            <i class="icon-double-angle-right"></i>
                            <span class="menu-text"> Dalmia Reports </span>
                            <b class="arrow icon-angle-down"></b>
                            </a>

	

                            <ul class="submenu"<?php if($page=='trip_locations' || $page=='trip_location' || $page=='trips' || $page=='trip_detention' || $page=='transporter' || $page=='yard_report' || $page=='tracker_health' || $page=='trip_report_dalmia'){ ?> style="display: block;" <?php } ?>> 
                                 <li <?php if($page=='trip_locations' || $page=='trip_location' ){echo "class=\"active\"";}?>>
                                <a href="track.php?page=trip_locations&id=<?php echo $id; ?>" class="dropdown-toggle">
                                    <i class="icon-wrench  "></i>
                                    <span class="menu-text"> Locations </span>
                                </a>
                                </li> 
                                 <li <?php if($page=='transporter'){echo "class=\"active\"";}?>>
                                <a href="track.php?page=transporter&id=<?php echo $id; ?>" class="dropdown-toggle">
                                    <i class="icon-exchange "></i>
                                    <span class="menu-text"> Transporters </span>
                                </a>
                                </li> 
                                 <li <?php if($page=='yard_report'){echo "class=\"active\"";}?>>
                                <a href="track.php?page=yard_report&id=<?php echo $id; ?>" class="dropdown-toggle">
                                    <i class="icon-double-angle-right "></i>
                                    <span class="menu-text"> Yard Status </span>
                                </a>
                                </li> 
                                 <li <?php if($page=='tracker_health'){echo "class=\"active\"";}?>>
                                <a href="track.php?page=tracker_health&id=<?php echo $id; ?>" class="dropdown-toggle">
                                    <i class="icon-double-angle-right"></i>
                                    <span class="menu-text"> Tracker Health </span>
                                </a>
                                </li> 
                                <li <?php if($page=='trips'){echo "class=\"active\"";}?>>
                                <a href="track.php?page=trips&id=<?php echo $id; ?>" class="dropdown-toggle">
                                    <i class="icon-list"></i>
                                    <span class="menu-text"> Trip Report </span>
                                </a>
                                </li>
                                <li <?php if($page=='trip_detention'){echo "class=\"active\"";}?>>
                                <a href="track.php?page=trip_detention&id=<?php echo $id; ?>" class="dropdown-toggle">
                                    <i class="icon-list"></i>
                                    <span class="menu-text"> Detention Report </span>
                                </a>
                                </li>
                                <li <?php if($page=='trip_report_dalmia'){echo "class=\"active\"";}?>>
                                <a href="track.php?page=trip_report_dalmia&id=<?php echo $id; ?>" class="dropdown-toggle">
                                    <i class="icon-list"></i>
                                    <span class="menu-text"> Consolidated Trip Report </span>
                                </a>
                                </li>
                                
                            </ul>
                        </li>
						<?php } ?>
                         <?php if($id==543 || $id==557 ){//orange old ?>
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
						
						<!--<?php if($id==476){//srs or dualdemo ?>
                         <li <?php if($page=='temperature'){echo "class=\"active\"";}?>>
						<a href="track.php?page=temperature&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class="icon-beaker"></i>
							<span class="menu-text"> Temperature Dashboard </span>
						</a>
						</li>
                        <?php } ?>-->
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
						
						<?php if($id==451){/* ?>
						<li <?php if($page=='dieseldashboard' || $page=='dieselindividual'){echo "class=\"active\"";}?>>
						<a href="track.php?page=dieseldashboard&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class="icon-beaker"></i>
							<span class="menu-text"> Diesel Dashboard </span>
						</a>
						</li>	
						<?php */
						?>
						<li <?php if($page=='oil_orange'){echo "class=\"active\"";}?>>
						<a href="track.php?page=oil_orange&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class="icon-beaker"></i>
							<span class="menu-text"> Fuel Dashboard </span>
						</a>
						</li>
						<?php
						} ?>
						<?php if($id==520){?>
                         <li>

                            <a href="#" class="dropdown-toggle">
                            <i class="icon-bullhorn"></i>
                            <span class="menu-text"> RFID Reports </span>
                            <b class="arrow icon-angle-down"></b>
                            </a>

                            <ul class="submenu"<?php if($page=='emp_rfid' || $page=='emp_rfid_report'){ ?> style="display: block;" <?php } ?>> 
                                 <li <?php if($page=='emp_rfid'){echo "class=\"active\"";}?>>
                                <a href="track.php?page=emp_rfid&id=<?php echo $id; ?>" class="dropdown-toggle">
                                    <i class="icon-wrench  "></i>
                                    <span class="menu-text"> Employees & RFIDs </span>
                                </a>
                                </li>
                                <li <?php if($page=='emp_rfid_report'){echo "class=\"active\"";}?>>
                                <a href="track.php?page=emp_rfid_report&id=<?php echo $id; ?>" class="dropdown-toggle">
                                    <i class="icon-cog"></i>
                                    <span class="menu-text"> RFID Report </span>
                                </a>
                                </li>
                            </ul>
                         </li>                       							
                        
                        <?php } ?>
                        <?php if($id==548){ ?>	
						<li <?php if($page=='db_category'){echo "class=\"active\"";}?>>
						<a href="track.php?page=db_category&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class="icon-tag"></i>
							<span class="menu-text"> Categories </span>
						</a>
						</li>
						<?php } ?>
                         <?php if($id==502){?>
                         <li>

                            <a href="#" class="dropdown-toggle">
                            <i class="icon-list"></i>
                            <span class="menu-text"> Fleet Distribution </span>
                            <b class="arrow icon-angle-down"></b>
                            </a>

                            <ul class="submenu"<?php if($page=='sst_locations' || $page=='sst_location' || $page=='sst_overview' || $page=='db_category' || $page=='db'){ ?> style="display: block;" <?php } ?>> 
                                 <li <?php if($page=='db_category'){echo "class=\"active\"";}?>>
                                <a href="track.php?page=db_category&id=<?php echo $id; ?>" class="dropdown-toggle">
                                    <i class="icon-wrench  "></i>
                                    <span class="menu-text"> Categories </span>
                                </a>
                                </li>
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
                                <li <?php if($page=='db'){echo "class=\"active\"";}?>>
                                <a href="track.php?page=db&id=<?php echo $id; ?>" class="dropdown-toggle">
                                    <i class="icon-cog"></i>
                                    <span class="menu-text"> Fleet Distribution </span>
                                </a>
                                </li>
                            </ul>
                         </li>                       							
                        
                        <?php } ?>
                        
						
						<?php if($id==476 || $id==486 || $id==509 || $id==494 || $id==785 || $id==831){?>
                         <li <?php if($page=='reporttemp'){echo "class=\"active\"";}?>>                           
                                <a href="track.php?page=reporttemp&id=<?php echo $id; ?>" class="dropdown-toggle">
                                    <i class="icon-tags "></i>
                                    <span class="menu-text"> Temperature Report </span>
                                </a>                                
                         </li>  
                        <?php } ?>
                        <?php if($id==509){?>
                        <li <?php if($page=='sical_temperature'){echo "class=\"active\"";}?>>
						<a href="track.php?page=sical_temperature&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class=" icon-info-sign"></i>
							<span class="menu-text"> Temp Alert Settings </span>
						</a>
						</li>
                        <?php }?>
                        <li <?php if($page=='playback' || $page=='playback_print'){echo "class=\"active\"";}?>>
						<a href="track.php?page=playback&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class="icon-facetime-video"></i>
							<span class="menu-text"> Route Playback </span>
						</a>
						</li>
                         <li <?php if($page=='geofence'){echo "class=\"active\"";}?>>
						<a href="track.php?page=geofence&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class="icon-hand-down"></i>
							<span class="menu-text"> Geofence </span>
						</a>
						</li>
						
							<?php if($id==439){ ?>					
                        
                         <li>

                            <a href="#" class="dropdown-toggle">
                            <i class="icon-bullhorn"></i>
                            <span class="menu-text"> Coca cola Reports </span>
                            <b class="arrow icon-angle-down"></b>
                            </a>

	

                            <ul class="submenu"<?php if($page=='cola_locations' || $page=='cola_location' || $page=='cola_status' || $page=='cola_trips' || $page=='cola_trans' ){ ?> style="display: block;" <?php } ?>> 
                                 <li <?php if($page=='cola_locations' || $page=='cola_location' ){echo "class=\"active\"";}?>>
                                <a href="track.php?page=cola_locations&id=<?php echo $id; ?>" class="dropdown-toggle">
                                    <i class="icon-wrench  "></i>
                                    <span class="menu-text"> Locations </span>
                                </a>
                                </li>
								<li <?php if($page=='cola_trans' ){echo "class=\"active\"";}?>>
                                <a href="track.php?page=cola_trans&id=<?php echo $id; ?>" class="dropdown-toggle">
                                    <i class="icon-wrench  "></i>
                                    <span class="menu-text"> Transporters </span>
                                </a>
                                </li>
                                <li <?php if($page=='cola_status'){echo "class=\"active\"";}?>>
                                <a href="track.php?page=cola_status&id=<?php echo $id; ?>" class="dropdown-toggle">
                                    <i class="icon-cog"></i>
                                    <span class="menu-text"> Current Status </span>
                                </a>
                                </li>
								<li <?php if($page=='cola_trips'){echo "class=\"active\"";}?>>
                                <a href="track.php?page=cola_trips&id=<?php echo $id; ?>" class="dropdown-toggle">
                                    <i class="icon-cog"></i>
                                    <span class="menu-text"> Trip Report </span>
                                </a>
                                </li>
                            </ul>
                         </li>                       							
                        
                       
	<?php } ?>	  
                       <?php if($id!=442 && $id!=583 && $id!=860 && $id!=778 && $id!=849 && $id!=877 && $id!=878) {?>	
                       <?php if($sublogin_created_by!=579){?>				   	
					   			  
                         <li <?php if($page=='trip' || $page=='trip_new' || $page=='trip_report' || $page=='trip_edit'||  $page=='trip_view'|| $page=='trip_status' || $page=='trip_status_report'){echo "class=\"active\"";}?>>
						<a href="track.php?page=trip&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class="icon-hand-right"></i>
							<span class="menu-text"> Trip Schedules </span>
						</a>
						</li>
						<?php }} ?>
						
                        <?php if($id==308){?>
                         <li <?php if($page=='itctags'){echo "class=\"active\"";}?>>                           
                                <a href="track.php?page=itctags&id=<?php echo $id; ?>" class="dropdown-toggle">
                                    <i class="icon-tags"></i>
                                    <span class="menu-text"> ITC Tags </span>
                                </a>
                                
                         </li>                       							
                        
                        <?php } ?>
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
						
						<?php if($id==318){?> 
                         <li>

                            <a href="#" class="dropdown-toggle">
                            <i class="icon-bullhorn"></i>
                            <span class="menu-text"> Unidad Trips </span>
                            <b class="arrow icon-angle-down"></b>
                            </a>

                            <ul class="submenu"<?php if($page=='unidadtags' || $page=='unidad_view' ){ ?> style="display: block;" <?php } ?>> 
                                 <li <?php if($page=='unidadtags'){echo "class=\"active\"";}?>>
                                <a href="track.php?page=unidadtags&id=<?php echo $id; ?>" class="dropdown-toggle">
                                    <i class="icon-wrench  "></i>
                                    <span class="menu-text"> Create Tags</span>
                                </a>
                                </li>
                                <li <?php if($page=='unidad_view'){echo "class=\"active\"";}?>>
                                <a href="track.php?page=unidad_view&id=<?php echo $id; ?>&id1=1" class="dropdown-toggle">
                                    <i class="icon-cog"></i>
                                    <span class="menu-text"> Route </span>
                                </a>
                                </li>
                            </ul>
                         </li>                       							
                        
                        <?php } ?>
						
						<?php if($id==442){ ?>
						 <li>

                            <a href="#" class="dropdown-toggle">
                            <i class="icon-bullhorn"></i>
                            <span class="menu-text"> National Reports </span>
                            <b class="arrow icon-angle-down"></b>
                            </a>							
							
							<ul class="submenu"<?php if($page=='national_route' || $page=='national_routes' || $page=='national_report' || $page=='national_report2' || $page=='national_tripsheet'  || $page=='national_rview' || $page=='national_rt'  || $page=='national_tag_edit' || $page=='national_routes_tags' ){ ?> style="display: block;" <?php } ?>> 
                                 <li <?php if($page=='national_rt' || $page=='national_routes_tags'){echo "class=\"active\"";}?>>
                                <a href="track.php?page=national_rt&id=<?php echo $id; ?>" class="dropdown-toggle">
                                    <i class="icon-wrench  "></i>
                                    <span class="menu-text"> Routes</span>
                                </a>
                                </li>
                                <li <?php if($page=='national_route' || $page=='national_routes' || $page=='national_rview' || $page=='national_tag_edit'){echo "class=\"active\"";}?>>
                                <a href="track.php?page=national_routes&id=<?php echo $id; ?>" class="dropdown-toggle">
                                    <i class="icon-wrench  "></i>
                                    <span class="menu-text"> Tags</span>
                                </a>
                                </li>
                                <li <?php if($page=='national_report'){echo "class=\"active\"";}?>>
                                <a href="track.php?page=national_report&id=<?php echo $id; ?>" class="dropdown-toggle">
                                    <i class="icon-cog"></i>
                                    <span class="menu-text"> Report </span>
                                </a>
                                </li>
								<li <?php if($page=='national_tripsheet'){echo "class=\"active\"";}?>>
                                <a href="track.php?page=national_tripsheet&id=<?php echo $id; ?>" class="dropdown-toggle">
                                    <i class="icon-cog"></i>
                                    <span class="menu-text"> Trip Sheet </span>
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
						 
						<?php if($id==769){  ?> 						 
                        <li <?php if($page=='gogreen'){echo "class=\"active\"";}?>>
						<a href="track.php?page=gogreen&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class="icon-list-alt"></i>
							<span class="menu-text"> Locations Data </span>
						</a>
						</li>
						<?php }  ?>
						
                        <li <?php if($page=='report_dashboard'){echo "class=\"active\"";}?>>
						<a href="track.php?page=report_dashboard&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class="icon-bar-chart"></i>
							<span class="menu-text"> Reports </span>
						</a>
						</li>
						<?php if($id!=863){ //vani school dup ?>
                        <li <?php if($page=='settings'){echo "class=\"active\"";}?>>
						<a href="track.php?page=settings&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class="icon-cogs"></i>
							<span class="menu-text"> Settings </span>
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
                     

 						<?php if($id==480){ ?>
					    <li <?php if($page=='report_rfid'){echo "class='active'";} ?>>
						<a href="track.php?page=report_rfid&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class="icon-tag"></i>
							<span class="menu-text">  RFID Report </span>
						</a>
					    </li>
					    <?php } ?>
					    		
					    <?php if($id==836){?>
						<li>

                            <a href="#" class="dropdown-toggle">
                            <i class="icon-list"></i>
                            <span class="menu-text"> Cargill Reports </span>
                            <b class="arrow icon-angle-down"></b>
                            </a>							
							
							<ul class="submenu"<?php if($page=='harsh_acceleration' || $page=='harsh_break' || $page=='db' || $page=='employee_performance' ){ ?> style="display: block;" <?php } ?>> 	
								<li <?php if($page=='db'){echo "class='active'";} ?>>
								<a href="track.php?page=db&id=<?php echo $id; ?>" class="dropdown-toggle">
									<i class=" icon-exchange"></i>
									<span class="menu-text"> Violations </span>
								</a>
							    </li> 
								<li <?php if($page=='employee_performance'){echo "class='active'";} ?>>
								<a href="track.php?page=employee_performance&id=<?php echo $id; ?>" class="dropdown-toggle">
									<i class=" icon-exchange"></i>
									<span class="menu-text"> Employee Performance </span>
								</a>
							    </li> 
							    <li <?php if($page=='harsh_acceleration'){echo "class='active'";} ?>>
								<a href="track.php?page=harsh_acceleration&id=<?php echo $id; ?>" class="dropdown-toggle">
									<i class=" icon-exchange"></i>
									<span class="menu-text"> Harsh Acceleration </span>
								</a>
							    </li> 
								<li <?php if($page=='harsh_break'){echo "class='active'";} ?>>
								<a href="track.php?page=harsh_break&id=<?php echo $id; ?>" class="dropdown-toggle">
									<i class=" icon-exchange"></i>
									<span class="menu-text"> Harsh Break </span>
								</a>
							    </li> 
							</ul>
						</li>		
						<?php } ?>



 <?php } ?>





				</ul><!--/.nav-list-->







				<div class="sidebar-collapse" id="sidebar-collapse">



					<i class="icon-double-angle-left"></i>



				</div>



			</div>
			
			
			
		<?php }elseif($id==500 || $id==570){/**
								* 
								* @var *******************************************metso
								* 
								*/ ?>
			<div class="main-container container-fluid">
			<a class="menu-toggler" id="menu-toggler" href="#">
				<span class="menu-text"></span>
			</a>

            <div class="sidebar <?php if($id==444 || $id==449){ echo "menu-min"; }?>" id="sidebar">
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

                            <ul class="submenu" style="display: block;"> 
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
		
		
		<?php }else{ ?>
			<div class="main-container container-fluid">
			<a class="menu-toggler" id="menu-toggler" href="#">
				<span class="menu-text"></span>
			</a>

            <div class="sidebar <?php if($id==444 || $id==449){ echo "menu-min"; }?>" id="sidebar">
				<ul class="nav nav-list">
					
					<?php if($id==579 ){?>
						<li>
						<a href="track.php?page=dashboard&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class="icon-bolt"></i>
							<span class="menu-text"> Live Tracking </span>
						</a>
						</li>
						<li <?php if($page=='oil_orange'){echo "class=\"active\"";}?>>
						<a href="track.php?page=oil_orange&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class="icon-beaker"></i>
							<span class="menu-text"> Fuel Dashboard</span>
						</a>
						</li>
						
					<?php }else{ ?> 
					<li <?php if($page=='orange'){echo "class=\"active\"";}?>>
						<a href="track.php?page=orange&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class="icon-eye-open"></i>
							<span class="menu-text"> Orange Dashboard</span>
						</a>
						</li>
					<?php } ?>	
                        <li <?php if($page=='playback' || $page=='playback_print'){echo "class=\"active\"";}?>>
						<a href="track.php?page=playback&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class="icon-facetime-video"></i>
							<span class="menu-text"> Route Playback </span>
						</a>
						</li>
						<li <?php if($page=='geofence'){echo "class=\"active\"";}?>>
						<a href="track.php?page=geofence&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class="icon-hand-down"></i>
							<span class="menu-text"> Geofence </span>
						</a>
						</li>
						
					<?php if($id==579 ){?>
                        <li <?php if($page=='report'){echo "class=\"active\"";}?>>
						<a href="track.php?page=report&id=<?php echo $id; ?>&report=1" class="dropdown-toggle">
							<i class="icon-bar-chart"></i>
							<span class="menu-text"> Reports </span>
						</a>
						</li> 
						<?php } else{?>	
						<li <?php if($page=='report_dashboard'){echo "class=\"active\"";}?>>
						<a href="track.php?page=report_dashboard&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class="icon-bar-chart"></i>
							<span class="menu-text"> Reports </span>
						</a>
						</li>
						<li <?php if($page=='settings'){echo "class=\"active\"";}?>>
						<a href="track.php?page=settings&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class="icon-cogs"></i>
							<span class="menu-text"> Settings </span>
						</a>
						</li>
						<?php } ?>
						
                        

				</ul><!--/.nav-list-->

				<div class="sidebar-collapse" id="sidebar-collapse">

					<i class="icon-double-angle-left"></i>

				</div>



			</div>	
		
		<?php } ?>