
	

					<div class="main-container container-fluid">



			<a class="menu-toggler" id="menu-toggler" href="#">



				<span class="menu-text"></span>



			</a>


<style>
	.chks{
		float:left;
		    margin: 7px;
    z-index: 10;
	}
</style>
            

            <div class="sidebar" id="sidebar">


				<ul class="nav nav-list">
			


				
						<li>
						<a href="track.php?page=dashboard&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class="icon-dashboard"></i>
							<span class="menu-text"> Dashboard </span>
						</a>
						</li>
					
					
                       
                        
						
								<li <?php if($page=='orange_category'){echo "class=\"active\"";}?>>
								<a href="orange_admin.php?page=orange_category&id=<?php echo $id; ?>" class="dropdown-toggle">
									<i class="icon-cog"></i>
									<span class="menu-text"> Categories </span>
								</a>
								</li>
								
								<li <?php if($page=='orange_drivers'){echo "class=\"active\"";}?>>
								<a href="orange_admin.php?page=orange_drivers&id=<?php echo $id; ?>" class="dropdown-toggle">
									<i class="icon-cog"></i>
									<span class="menu-text"> Drivers </span>
								</a>
								</li>
								<li <?php if($page=='odometer'){echo "class=\"active\"";}?>>
								<a href="orange_admin.php?page=odometer&id=<?php echo $id; ?>" class="dropdown-toggle">
									<i class="icon-cog"></i>
									<span class="menu-text"> Odometer Reading </span>
								</a>
								</li>
								<li>

		                            <a href="#" class="dropdown-toggle">
		                            <i class="icon-cog"></i>
		                            <span class="menu-text"> Maintenance Settings </span>
		                            <b class="arrow icon-angle-down"></b>
		                            </a>
	                            	<ul class="submenu"<?php if($page=='maintenance_category' || $page=='maintenance'){ ?> style="display: block;" <?php } ?>> 
		                                
										<li <?php if($page=='maintenance_category'){echo "class=\"active\"";}?>>
										<a href="orange_admin.php?page=maintenance_category&id=<?php echo $id; ?>" class="dropdown-toggle">
											<i class="icon-cog"></i>
											<span class="menu-text"> Maintenance Category </span>
										</a>
										</li>
										<li <?php if($page=='maintenance'){echo "class=\"active\"";}?>>
										<a href="orange_admin.php?page=maintenance&id=<?php echo $id; ?>" class="dropdown-toggle">
											<i class="icon-cog"></i>
											<span class="menu-text"> Maintenance </span>
										</a>
										</li>
									</ul>
								</li>
								<li <?php if($page=='fuel_rate'){echo "class=\"active\"";}?>>
								<a href="orange_admin.php?page=fuel_rate&id=<?php echo $id; ?>" class="dropdown-toggle">
									<i class="icon-cog"></i>
									<span class="menu-text"> Fuel Rate </span>
								</a>
								</li>
								<li <?php if($page=='mileage'){echo "class=\"active\"";}?>>
								<a href="orange_admin.php?page=mileage&id=<?php echo $id; ?>" class="dropdown-toggle">
									<i class="icon-cog"></i>
									<span class="menu-text"> Avg Mileage </span>
								</a>
								</li>
								<!--<li <?php if($page=='trip' || $page=='trip_new' || $page=='trip_report' || $page=='trip_edit'||  $page=='trip_view'|| $page=='trip_status' || $page=='trip_status_report'){echo "class=\"active\"";}?>>
						<a href="orange_admin.php?page=trip&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class="icon-cog"></i>
							<span class="menu-text"> Trip Schedules </span>
						</a>
						</li>-->
						
								<li <?php if($page=='national_rt' || $page=='national_routes_tags'){echo "class=\"active\"";}?>>
                                <a href="orange_admin.php?page=national_rt&id=<?php echo $id; ?>" class="dropdown-toggle">
                                    <i class="icon-double-angle-right"></i>
                                    <span class="menu-text"> Routes</span>
                                </a>
                                </li>
                                <li <?php if($page=='national_route' || $page=='national_routes' || $page=='national_rview' || $page=='national_tag_edit'){echo "class=\"active\"";}?>>
                                <a href="orange_admin.php?page=national_routes&id=<?php echo $id; ?>" class="dropdown-toggle">
                                    <i class="icon-double-angle-right"></i>
                                    <span class="menu-text"> Route Tags</span>
                                </a>
                                </li>
                                
                               
                         <li>

                            <a href="#" class="dropdown-toggle">
                            <i class="icon-bullhorn"></i>
                            <span class="menu-text"> Orange Trips </span>
                            <b class="arrow icon-angle-down"></b>
                            </a>

                            <ul class="submenu"<?php if($page=='trip_routes' || $page=='trip_calendar' || $page=='trip_route_view' || $page=='trip_route_new'){ ?> style="display: block;" <?php } ?>> 
                                 <li <?php if($page=='trip_routes' || $page=='trip_route_view' || $page=='trip_route_new'){echo "class=\"active\"";}?>>
                                <a href="orange_admin.php?page=trip_routes&id=<?php echo $id; ?>" class="dropdown-toggle">
                                    <i class="icon-wrench  "></i>
                                    <span class="menu-text"> Routes </span>
                                </a>
                                </li>
                                <li <?php if($page=='trip_calendar'){echo "class=\"active\"";}?>>
                                <a href="orange_admin.php?page=trip_calendar&id=<?php echo $id; ?>" class="dropdown-toggle">
                                    <i class="icon-cog"></i>
                                    <span class="menu-text"> Calendar </span>
                                </a>
                                </li>
                            </ul>
                         </li>                       							
                        
                       
                        
								 <li <?php if($page=='settings'){echo "class=\"active\"";}?>>
								<a href="orange_admin.php?page=settings&id=<?php echo $id; ?>" class="dropdown-toggle">
									<i class="icon-cogs"></i>
									<span class="menu-text"> Settings </span>
								</a>
								</li>
 

                        





				</ul><!--/.nav-list-->







				<div class="sidebar-collapse" id="sidebar-collapse">



					<i class="icon-double-angle-left"></i>



				</div>



			</div>
		