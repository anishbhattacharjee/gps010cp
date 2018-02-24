
	

					<div class="main-container container-fluid">



			<a class="menu-toggler" id="menu-toggler" href="#">



				<span class="menu-text"></span>



			</a>



            

            <div class="sidebar" id="sidebar">



				<div class="sidebar-shortcuts" id="sidebar-shortcuts">



					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">






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
				
			


				<?php if($page!='dashboard'){?>
						<li >
						<a href="track.php?page=dashboard&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class="icon-bolt"></i>
							<span class="menu-text"> Live Tracking </span>
						</a>
						</li>
					<?php } ?>
					
                       
                         <li <?php if($page=='oil_orange'){echo "class=\"active\"";}?>>
						<a href="track.php?page=oil_orange&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class="icon-beaker"></i>
							<span class="menu-text"> Fuel Dashboard </span>
						</a>
						</li>						
						
						<li>

                            <a href="#" class="dropdown-toggle">
                            <i class="icon-list-alt"></i>
                            <span class="menu-text"> Orange Reports </span>
                            <b class="arrow icon-angle-down"></b>
                            </a>

                            <ul class="submenu" <?php if($page=='orange_drivers' || $page=='fuel_report' || $page=='fleet_summary' || $page=='orange_drivers_report' || $page=='attendance' || $page=='orange_category'){ ?>style="display: block;"<?php } ?>> 
								<li <?php if($page=='orange_category'){echo "class=\"active\"";}?>>
								<a href="track.php?page=orange_category&id=<?php echo $id; ?>" class="dropdown-toggle">
									<i class="icon-user"></i>
									<span class="menu-text"> Categories </span>
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
									<span class="menu-text"> Driver Report </span>
								</a>
								</li>
		                        <li <?php if($page=='fuel_report'){echo "class=\"active\"";}?>>
								<a href="track.php?page=fuel_report&id=<?php echo $id; ?>" class="dropdown-toggle">
									<i class="icon-list-alt"></i>
									<span class="menu-text"> Fuel Report </span>
								</a>
								</li>
								<li <?php if($page=='fleet_summary'){echo "class=\"active\"";}?>>
								<a href="track.php?page=fleet_summary&id=<?php echo $id; ?>" class="dropdown-toggle">
									<i class="icon-list-alt"></i>
									<span class="menu-text"> Fleet Summary </span>
								</a>
								</li>
								<li <?php if($page=='attendance'){echo "class=\"active\"";}?>>
								<a href="track.php?page=attendance&id=<?php echo $id; ?>" class="dropdown-toggle">
									<i class="icon-list-alt"></i>
									<span class="menu-text"> Attendance Report</span>
								</a>
								</li>
		                    </ul>
                         </li>    
                        
						
						
                       
						
						
                        
						
						

 

                        <?php
                        
                        $serialno=0;
                        $done=array();
 
                        

		$sql_cats="SELECT distinct category FROM `orange_category`";

$rs_cats=mysql_query($sql_cats);

while($cats=mysql_fetch_array($rs_cats)){

		?>

                  <li class="open" <?php //if($page=='live'){echo "class=\"active\"";}?>>

                            <a href="#" class="dropdown-toggle">

                            <i class="icon-bolt"></i>

                            <span class="menu-text"> <?php echo $cats['category']; ?> </span>
                            <b class="arrow icon-angle-down"></b>
                            </a>

                            <ul class="submenu" style="display: block;"  >       


                            	<li class="active" <?php //if($page=='live'){echo "class=\"active\"";}?>>

                              

                                 <ul class="submenu" id="inst_dev">    

                                

                                <?php 						$sql_dev="SELECT
DISTINCT
installation.model_id,
installation.instatllation_id,
device_name,imie_no
FROM
installation
join orange_category o on installation.imie_no=o.imei
WHERE o.category='".$cats['category']."' and customer_id=$id AND installation_status='completed'  order by device_name";

						$rs_dev=mysql_query($sql_dev);

						while($rw_dev=mysql_fetch_assoc($rs_dev)){$serialno++;
						$done[]=$rw_dev['instatllation_id'];
							
				

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

                           

                        

                        


                         </ul>

                        

						</li>

                        <?php } ?>
                        
                        <?php
                        
                      //  $serialno=0;
 
                        

		$sql_cats="SELECT

DISTINCT

installation.category_id,

gps_categories.category_type

FROM

installation

INNER JOIN gps_categories ON installation.category_id = gps_categories.category_id

WHERE customer_id=$id AND installation_status='completed' and type='main' and installation.category_id!=4 and  instatllation_id NOT IN ( '" . implode($done, "', '") . "' )";

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

WHERE category_id=".$cats['category_id']." and customer_id=$id AND installation_status='completed' and  instatllation_id NOT IN ( '" . implode($done, "', '") . "' )  order by device_name";

						$rs_dev=mysql_query($sql_dev);

						while($rw_dev=mysql_fetch_assoc($rs_dev)){$serialno++;
							
				

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

                           

                        

                        


                         </ul>

                        

						</li>

                        <?php } ?>





				</ul><!--/.nav-list-->







				<div class="sidebar-collapse" id="sidebar-collapse">



					<i class="icon-double-angle-left"></i>



				</div>



			</div>
		